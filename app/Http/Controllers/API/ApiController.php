<?php

namespace App\Http\Controllers\API;

use App\InsLog\Repository\UserLogin\UserLoginFailedRepository;
use App\InsLog\Repository\UserLogin\UserLoginNormalRepository;
use App\InsLog\Repository\UserLogin\UserLoginSuccessRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    protected $userLoginSuccessRepository;
    protected $userLoginNormalRepository;
    protected $userLoginFailedRespository;
    protected $db;

    /**
     * ApiController constructor.
     * @param $userLoginSuccessRepository
     * @param $userLoginNormalRepository
     * @param $userLoginFailedRespository
     */
    public function __construct(UserLoginSuccessRepository $userLoginSuccessRepository,
                                UserLoginNormalRepository $userLoginNormalRepository,
                                UserLoginFailedRepository $userLoginFailedRespository)
    {
        $this->userLoginSuccessRepository = $userLoginSuccessRepository;
        $this->userLoginNormalRepository = $userLoginNormalRepository;
        $this->userLoginFailedRespository = $userLoginFailedRespository;
        $this->db = DB::connection('origin_mysql');
    }


    /**
     * 获取Version1的留存信息情况
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getVersion1RemainList()
    {
        $remainInfo = $this->db->table('zeai_dayutc')->where('version', 'version_v1')
            ->orderBy('date', 'desc')->get()->toArray();
        return view('admin.remain.index', compact('remainInfo'));
    }


    /**
     * 获取Version2的留存信息情况
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getVersion2RemainList()
    {
        $remainInfo = $this->db->table('zeai_dayutc')->where('version', 'version_v2')
            ->orderBy('date', 'desc')->get()->toArray();
        return view('admin.remain.index', compact('remainInfo'));
    }

    /**
     * 获取Version4的留存信息情况
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getVersion4RemainList()
    {
        $remainInfo = $this->db->table('zeai_dayutc')->where('version', 'version_v4')
            ->orderBy('date', 'desc')->get()->toArray();
        return view('admin.remain.index', compact('remainInfo'));
    }
    /**
     * 获取Version5的留存信息情况
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getVersion5RemainList()
    {
        $remainInfo = $this->db->table('zeai_dayutc')->where('version', 'version_v5')
            ->orderBy('date', 'desc')->get()->toArray();
        return view('admin.remain.index', compact('remainInfo'));
    }
    /**
     * 获取Version5的留存信息情况
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getVersion7RemainList()
    {
        $remainInfo = $this->db->table('zeai_dayutc')->where('version', 'version_v7')
            ->orderBy('date', 'desc')->get()->toArray();
        return view('admin.remain.index', compact('remainInfo'));
    }
    /**
     * 获取Version5的留存信息情况
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getVersion6RemainList()
    {
        $remainInfo = $this->db->table('zeai_dayutc')->where('version', 'version_v6')
            ->orderBy('date', 'desc')->get()->toArray();
        return view('admin.remain.index', compact('remainInfo'));
    }
    /**
     * 获取Version5的留存信息情况
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getVersion10RemainList()
    {
        $remainInfo = $this->db->table('zeai_dayutc')->where('version', 'version_v10')
            ->orderBy('date', 'desc')->get()->toArray();
        return view('admin.remain.index', compact('remainInfo'));
    }
    /**
     * 获取Version5的留存信息情况
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getVersion3RemainList()
    {
        $remainInfo = $this->db->table('zeai_dayutc')->where('version', 'version_v3')
            ->orderBy('date', 'desc')->get()->toArray();
        return view('admin.remain.index', compact('remainInfo'));
    }
    /**
     * 获取Version8的留存信息情况
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getVersion8RemainList()
    {
        $remainInfo = $this->db->table('zeai_dayutc')->where('version', 'version_v8')
            ->orderBy('date', 'desc')->get()->toArray();
        return view('admin.remain.index', compact('remainInfo'));
    }
    /**
     * 获取Version9的留存信息情况
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getVersion9RemainList()
    {
        $remainInfo = $this->db->table('zeai_dayutc')->where('version', 'version_v9')
            ->orderBy('date', 'desc')->get()->toArray();
        return view('admin.remain.index', compact('remainInfo'));
    }
}
