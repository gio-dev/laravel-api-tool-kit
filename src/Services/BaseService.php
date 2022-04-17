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

}
