<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\RepositoryInterface;

abstract class BaseRepository implements RepositoryInterface
{
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * EloquentRepository constructor.
     */
    public function __construct()
    {
        $this->setModel();
    }

    /**
     * get model
     * @return string
     */
    abstract public function getModel();

    /**
     * Set model
     */
    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }


    /**
     * Get All
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return $this->model->all();
    }

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find($id, $collums = ['*'])
    {
        $result = $this->model->find($id, $collums);
        if (is_null($result)){
            return ['message',trans('common.errors.not_found_model')];
        }
        return $result;
    }

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return bool|mixed
     */
    public function update($id, array $attributes)
    {
        $model = $this->model->find($id);
        $fillable = $this->model->getFillable();
        $data = array_only($attributes, $fillable);
        foreach ($data as $key => $value) {
            if (empty($value)) {
                unset($data[$key]);
            }
        }
        $model->fill($data);

        return $model->save();
    }

    /**
     * Delete
     *
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $data = null;
        $result = $this->find($id);
        if ($result) {
            $data = $result->delete();
            return $data;
        }
        return $data;
    }
}
