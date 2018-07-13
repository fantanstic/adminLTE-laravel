<?php
/**
 * Created by PhpStorm.
 * User: vital
 * Date: 2017/8/24
 * Time: 11:27
 */

namespace App\InsLog\Eloquent;


use App\InsLog\Contract\RepositoryInterface;
use Illuminate\Container\Container as Application;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class BaseRepository
 * @package App\InsLog\Eloquent
 */
abstract class BaseRepository implements RepositoryInterface
{
    protected $app;
    
    protected $model;

    /**
     * BaseRepository constructor.
     * @param $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    /**
     * @return mixed
     */
    abstract function model();

    public function makeModel()
    {
        $model = $this->app->make($this->model());
        if (!$model instanceof Model) {
            throw new RepositoryException("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }
        return $this->model = $model;
    }

    public function resetModel()
    {
        $this->makeModel();
    }

    public function all($columns = ['*'])
    {
        // TODO: Implement all() method.
        if ($this->model instanceof Builder)
        {
            $results = $this->model->get($columns);
        }
        else
        {
            $results = $this->model->all($columns);
        }
        $this->resetModel();
        return $results;
    }

    public function find($id, $columns = ['*'])
    {
        // TODO: Implement find() method.
        $model = $this->model->findOrFail($id, $columns);
        $this->resetModel();
        return $model;
    }

    public function findByField($field, $value, $columns = ['*'])
    {
        // TODO: Implement findByField() method.
        $model = $this->model->where($field, '=', $value)->get($columns);
        $this->resetModel();
        return $model;
    }

    public function findWhere(array $where, $columns = ['*'])
    {
        // TODO: Implement findWhere() method.
        $this->applyConditions($where);
        $model = $this->model->get($columns);
        $this->resetModel();
        return $model;
    }

    public function findWhereIn($field, array $values, $columns = ['*'])
    {
        // TODO: Implement findWhereIn() method.
        $model = $this->model->whereIn($field, $values)->get($columns);
        $this->resetModel();
        return $model;
    }

    public function findWhereNotIn($field, array $values, $columns = ['*'])
    {
        // TODO: Implement findWhereNotIn() method.
        $model = $this->model->whereNotIn($field, $values)->get($columns);
        $this->resetModel();
        return $model;
    }

    public function firstOrCreate(array $attributes = [])
    {
        $model = $this->model->firstOrCreate($attributes);
        $this->resetModel();
        return $model;
    }

    public function create(array $attributes)
    {
        // TODO: Implement create() method.
        $model = $this->model->newInstance($attributes);
        $model->save();
        $this->resetModel();
        return $model;
    }

    public function orderBy($column, $direction = 'asc')
    {
        // TODO: Implement orderBy() method.
        $this->model = $this->model->orderBy($column, $direction);
        $this->resetModel();
        return $this;
    }

    public function update(array $attributes, $id)
    {
        $model = $this->model->findOrFail($id);
        $model->fill($attributes);
        $model->save();
        $this->resetModel();
        return $model;
    }

    public function groupBy($column)
    {
        $this->model = $this->model->groupBy($column);
        return $this;
    }
    
    protected function applyConditions(array $where)
    {
        foreach ($where as $field => $value)
        {

            if (is_array($value))
            {
                list($field, $condition, $val) = $value;
                $this->model = $this->model->where($field, $condition, $val);
            }
            else
            {
                $this->model = $this->model->where($field, '=', $value);
            }
        }
    }
}