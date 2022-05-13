<?php

namespace Essa\APIToolKit\Repository;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseRepository
 *
 */
trait BaseRepository
{
    /**
     * @var Model Class
     */
    protected $entity;

    /**
     * @var $identify
     */
    protected $identify;

    /**
     * @return Model
     */
    public function getEntityClass()
    {
        return $this->entity;
    }

    /**
     * @param Model $model
     */
    public function setEntityClass(Model $model)
    {
        $this->entity = $model;
    }

    /**
     * @return string
     */
    public function getIdentify()
    {
        return $this->identify;
    }

    /**
     * @param string $identify
     */
    public function setIdentify(string $identify)
    {
        $this->identify = $identify;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function createNewEntity(array $data)
    {
        return $this->entity->create($data);
    }

    /**
     * @return mixed
     */
    public function search()
    {
        return $this->entity->useFilters()->dynamicPaginate();
    }

    /**
     * @return mixed
     */
    public function findAll(){
        return $this->entity->all();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findOneById(int $id)
    {
        return $this->entity->where('id', $id)->firstOrFail();
    }

    /**
     * @param string $uuid
     * @return mixed
     */
    public function findOneByUuid(string $uuid)
    {
        return $this->entity->where('uuid', $uuid)->firstOrFail();
    }

    /**
     * @param mixed $identify
     * @return mixed
     */
    public function findOneByIdentify($identify)
    {
        return $this->entity->where($this->identify, $identify)->firstOrFail();
    }

    /**
     * @param mixed $identify
     * @param array $data
     * @return null
     */
    public function updateByIdentify($identify, array $data)
    {
        $entity = $this->entity->where($this->identify, $identify)->firstOrFail();

        if($entity)
            return tap($entity)->updateOrFail($data);
        return null;
    }

    /**
     * @param int $id
     * @param array $data
     * @return null
     */
    public function updateById(int $id, array $data)
    {
        $entity = $this->entity->where('id', $id)->firstOrFail();
        if ($entity){

            return tap($entity)->updateOrFail($data);
        }
        return null;
    }

    /**
     * @param string $uuid
     * @param array $data
     * @return null
     */
    public function updateByUuid(string $uuid, array $data)
    {
        $entity = $this->entity->where('uuid', $uuid)->firstOrFail();
        if($entity)
            return tap($entity)->updateOrFail($data);
        return null;
    }

    /**
     * @return mixed
     */
    public function deleteAll()
    {
        return $this->findAll()->deleteOrFail();
    }

    /**
     * @param mixed $identify
     * @return mixed
     */
    public function deleteByIdentify($identify)
    {
        return $this->entity->where($this->identify, $identify)->firstOrFail()->deleteOrFail();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function deleteById(int $id)
    {
        return $this->entity->where('id', $id)->firstOrFail()->deleteOrFail();
    }

    /**
     * @param string $uuid
     * @return mixed
     */
    public function deleteByUuid(string $uuid)
    {
        return $this->entity->where('uuid', $uuid)->firstOrFail()->deleteOrFail();
    }
}
