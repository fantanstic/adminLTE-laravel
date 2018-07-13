<?php
/**
 * Created by PhpStorm.
 * User: vital
 * Date: 2017/8/24
 * Time: 13:40
 */

namespace App\InsLog\Repository\UserLogin;


use App\InsLog\Eloquent\BaseRepository;
use App\Models\Success\UserLoginSuccessCount;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class UserLoginSuccessRepository extends BaseRepository
{
    function model()
    {
        return UserLoginSuccessCount::class;
    }

    /**
     * 获取各天的用户登录列表数据并存入缓存中，以便每次查询的时候加快速度获取留存情况
     * @param $date
     * @param $version
     * @return mixed
     */
    public function getUserLoginList($date, $version)
    {
        /* 获取缓存里面存放的所有日期的用户登录数据 */
        $cacheData = Cache::tags("remain_v{$version}")->get('userLogin');
        /* 如果没有缓存任何用户登录的数据则重新添加到缓存 */
        if (empty($cacheData))
        /* 判断是否存在缓存的用户登录数据,没有就重新生成缓存 */
        {
            $totalUsers = [];
            foreach ($date as $key => $value)
            {
                $startDate = $value['date']. ' 00:00:00';
                $endDate = $value['date']. ' 23:59:59';
                $users = $this->findWhere([
                    'version' => $version,
                    ['created_at', '>=', $startDate],
                    ['created_at', '<=', $endDate]
                ], ['tuid', 'username'])->toArray();
                foreach ($users as $key => $user)
                {
                    $users[$key] = json_encode($user);
                }
                $totalUsers[$value['date']] = $users;
            }
            Cache::tags("remain_v{$version}")->put('userLogin', $totalUsers, 100000);
        }
        $cacheData = Cache::tags("remain_v{$version}")->get('userLogin');
        $today = date('Y-m-d');
        $todayData = $this->findWhere([
            'version' => $version,
            ['created_at', '>=', $today . ' 00:00:00']
        ], ['tuid', 'username'])->toArray();
        $todayUsers = [];
        foreach ($todayData as $value)
        {
            $todayUsers[$today][] = json_encode($value);
        }
        return array_merge($todayUsers, $cacheData);
    }

    /**
     * 获取留存的详细信息例如2日留存，3日留存，7日留存...
     * @param $data
     * @param $newUser
     * @return array
     */
    public function getRemainInfo($data, $newUser, $version, $regUser)
    {
        $remainInfo = [];
        foreach ($data as $date => $value)
        {
            $remainInfo[$date]['remain_2'] = $this->getRemainsByDay($date, $data, $regUser, 2);
            $remainInfo[$date]['remain_3'] = $this->getRemainsByDay($date, $data, $regUser, 3);
            $remainInfo[$date]['remain_7'] = $this->getRemainsByDay($date, $data, $regUser, 7);
            $remainInfo[$date]['remain_30'] = $this->getRemainsByDay($date, $data, $regUser, 30);
            $remainInfo[$date]['remain_2_rate'] = $this->getRemainRate($date, $remainInfo[$date]['remain_2'], $newUser, 2);
            $remainInfo[$date]['remain_3_rate'] = $this->getRemainRate($date, $remainInfo[$date]['remain_3'], $newUser, 3);
            $remainInfo[$date]['remain_7_rate'] = $this->getRemainRate($date, $remainInfo[$date]['remain_7'], $newUser, 7);
            $remainInfo[$date]['remain_30_rate'] = $this->getRemainRate($date, $remainInfo[$date]['remain_30'], $newUser, 30);
        }
       return $remainInfo;
    }

    /**
     * 根据传入的day参数获取具体某天的留存情况
     * @param $date 指定日期
     * @param $data  用户登录数据
     * @param $regUser 用户注册数据
     * @param $day  指定留存日期
     * @return int
     */
    protected function getRemainsByDay($date, $data, $regUser, $day)
    {
        $registUser = [];
        $day -= 1;
        $targetDate = date('Y-m-d', strtotime("-{$day} day", strtotime($date)));
        if (!isset($regUser[$targetDate]))
        {
            return 0;
        }
        foreach ($regUser[$targetDate] as $key => $value)
        {
            $registUser[] = json_encode($value);
        }
        /* 指定日期的登录用户数据 - 已去重 */
        $loginUser = array_unique($data[$date]);
        /* 指定日期的注册用户数据 - 已去重 */
        $registUser = array_unique($registUser);
        /* 获取两个数组的交集 */
        $intersect = array_intersect($loginUser, $registUser);
        return count($intersect);
    }

    /**
     * 根据传入的day参数获取具体某天的留存率
     * @param $date
     * @param $remain
     * @param $data
     * @param $day
     * @return float|int
     */
    protected function getRemainRate($date, $remain, $data, $day)
    {
        $day -= 1;
        $targetDate = date('Y-m-d', strtotime("-{$day} day", strtotime($date)));
        if (isset($data[$targetDate]))
        {
            if ($data[$targetDate] == 0)
            {
                return 0;
            }
            else
            {
                return round($remain / $data[$targetDate] * 100, 2) . '%';
            };
        }
        else
        {
            return 0;
        }

    }

}