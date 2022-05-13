<?php

namespace Essa\APIToolKit\Services;

trait BaseService
{
    /**
     * @var
     */
    protected $baseService;

    /**
     * @return mixed
     */
    public function getBaseServiceClass()
    {
        return $this->baseService;
    }

    /**
     * @param mixed $model
     */
    public function setBaseServiceClass($class)
    {
        $this->baseService = $class;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function storeNew(array $data){
        return $this->baseService->createNewEntity($data);
    }

    /**
     * @param string $identify
     * @return mixed
     */
    public function findOneByIdentify(string $identify){
        return $this->baseService->findOneByIdentify($identify);
    }

    /**
     * @param string $identify
     * @param array $data
     * @return mixed
     */
    public function changeByIdentify(string $identify, array $data){
        return $this->baseService->updateByIdentify($identify, $data);
    }

    /**
     * @return mixed
     */
    public function search(){
        return $this->baseService->search();
    }

    /**
     * @param string $identify
     */
    public function deleteByIdentify(string $identify){
        return $this->baseService->deleteByIdentify($identify);
    }

    /**
     * @return mixed
     */
    public function findAll(){
        return $this->baseService->findAll();
    }

    /**
     * @param string $uuid
     * @return mixed
     */
    public function findOneByUuid(string $uuid){
        return $this->baseService->findOneByUuid($uuid);
    }

    /**
     * @param string $uuid
     * @param array $data
     * @return mixed
     */
    public function changeByUuid(string $uuid, array $data){
        return $this->baseService->updateByUuid($uuid, $data);
    }

    /**
     * @param string $uuid
     */
    public function deleteByUuid(string $uuid){
        return $this->baseService->deleteByUuid($uuid);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findOneById(int $id){
        return $this->baseService->findOneById($id);
    }

    /**
     * @param int $id
     * @param array $data
     * @return mixed
     */
    public function changeById(int $id, array $data){
        return $this->baseService->updateById($id, $data);
    }

    /**
     * @param int $id
     */
    public function deleteById(int $id){
        return $this->baseService->deleteById($id);
    }
}
