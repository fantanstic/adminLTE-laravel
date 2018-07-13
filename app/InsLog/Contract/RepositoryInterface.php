<?php
/**
 * Created by PhpStorm.
 * User: vital
 * Date: 2017/8/24
 * Time: 11:30
 */

namespace App\InsLog\Contract;


interface RepositoryInterface
{
    public function all($columns = ['*']);

    public function find($id, $columns = ['*']);

    public function findByField($field, $value, $columns = ['*']);

    public function findWhere(array $where, $columns = ['*']);

    public function findWhereIn($field, array $values, $columns = ['*']);

    public function findWhereNotIn($field, array $values, $columns = ['*']);

    public function create(array $attributes);

    public function orderBy($column, $direction = 'asc');

    public function update(array $attributes, $id);

    public function firstOrCreate(array $attributes);

    public function groupBy($column);

}