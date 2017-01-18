<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable  = ['parent_id','user_id','comment'];

   /* protected $updatableProperties = ['parent_id', 'message'];
    protected $readableProperties = ['id', 'createdAt', 'updatedAt'];*/

    public function mapUpdateData($data = [], $id)
    {
        $entity = $this->find($id);
        if($entity){
            $entity = $this->map($entity,$data);
            $this->save($entity);
            return $entity;
        }else{
            return false;
        }
    }
    /**
     * Mapping array on new entity and saving
     * @param array $data
     * @return EntityInterface
     */
    public function mapStoreData($data = [])
    {
        $entity = new $this->_entityName;
        $entity = $this->map($entity,$data);
        $this->save($entity);
        return $entity;
    }

    /**
     * @param EntityInterface $entity
     * @param $data
     * @return EntityInterface
     */
    protected function map(Comment $entity, $data)
    {
        $updatableProperties = $entity->updatableProperties();
        foreach ($updatableProperties as $propertyName) {
            $methodName = 'set' . ucfirst($propertyName);
            if (method_exists($entity, $methodName)&&isset($data[$propertyName])) {
                $entity->$methodName($data[$propertyName]);
            }
        }
        return $entity;
    }
    /**
     * @return array
     */
    public function updatableProperties(){
        return $this->updatableProperties;
    }

    /**
     * @return array
     */
    public function readableProperties(){
        return $this->readableProperties;
    }
}
