<?php

namespace App\Http\Managers;
use Illuminate\Support\Collection;
use App\Http\Managers\BaseManager;

class TransactionManager extends BaseManager
{
  protected $rules;

  /**
  * @param string $type - determine the kind of data i want to get
  * @param int $id - specifie the id when we want to get onky one data
  * @param int $limit - for define limit of data if liste
  * @param string $title - for other param title
  * @param string $value - other param value
  * @return Collection or Model
  */
   public function getData($type,$id=NULL,$limit=NULL,$title=NULL,$value=NULL,$perPage=NULL)
   {
     $data = new Collection();
     if($type == "liste"):
       if($title && $value) :
          $data = $this->getByParam($title,$value,$limit,$perPage);
       else:
         $data = $this->getAll($limit,$perPage);
       endif;
     elseif($type=="one") :
       $data = $this->getOne($id);
     endif;
     return $data;
   }

   /**
    * @param array $data - data to insert in database
    * @param int $id - the id of existing data
    * @return boolean
    */
   public function createOrUpdate($data,$id=NULL)
   {
     unset($data["_token"]);
     if($id) :
        return self::update($data,$id);
       else :
         unset($data["hidden_id"]);  
        return $this->save($data);
     endif;

     return false;
   }
}
