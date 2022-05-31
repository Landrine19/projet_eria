<?php

namespace App\Http\Managers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use App\Http\Managers\TransactionManager;
use ReflectionClass;

class TreatmentManager extends TransactionManager
{
  protected function formatDate($date)
  { 
    if($date) : 
      return \Carbon\Carbon::parse($date)->format('d/m/Y');
    else : 
      return null;  
    endif; 
  } 

  public function all()
  {
    return $this->getData("liste");
  }

  public function one($id)
  {
    return $this->getData("one",$id);
  }

  public function create($data)
  {
    $errors = $this->checkRules($this->setRules($data),$data);
    if(count($errors) > 0 ){
      return ["result" => false,"data" => $errors];
    }else{
      $data['id'] = $this->generateId();
      $data = $this->otherTreatment($data);
      $data = $this->createOrUpdate($data);
    }
    return ["result" => true,"data" => $data];
  }

  /**
   * Generate the id 
   * @return string id
   */
  protected function generateId()
  {
    $name = new ReflectionClass($this->model);
    $id = $name->getShortName();
    
    $data = $this->model::where("id",$name->getShortName()."@".self::generateRandomString(3))->first();

    if($data){
      $id = self::generateId();
    }else{
      $id .= self::generateRandomString(3);
    }  
    return $id;
  }

  public function generateRandomString($longueur, $listeCar = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
  {
      $chaine = '';
      $max = mb_strlen($listeCar, '8bit') - 1;
      for ($i = 0; $i < $longueur; ++$i) {
         $chaine .= $listeCar[random_int(0, $max)];
      }
      return $chaine;
  }

  protected function otherTreatment($data)
  {
      return $data;
  }

  /**
    * check rules
    * @method for check rules before insertion
    * @param array $rules - rules for check if data are valids
    * @param array $value - data to check
    * @return Collection - errors get
    * @return string - succefuly message
    */
  public function update($data,$id)
  {
    $errors = $this->checkRules($this->setUpdateRules($data),$data);
    if($errors->count() > 0 ){
      return ["result" => false,"data" => $errors];
    }else{
      $toUpdate = $this->otherUpdateTreatment($data);
      $this->createOrUpdate($toUpdate,$id);
    }
    return ["result" => true,"data" => $data];

  }

  /**
   * unset the data indesirable
   * @param $data
   * @param $toUnset
   */
  protected function unsetTheUnavailable($data,$toUnset)
  {
    foreach($toUnset as $unset){
      if(array_key_exists($unset,$data)){
        unset($data["$unset"]);
      }
    }
    return $data;
  }

  /**
   * other update treatment to change data for updating 
   */
  protected function otherUpdateTreatment($data)
  {
    return $data;
  }

  /**
   * delete data method
   * @param $type 
   * @param $id
   * @return $response
   */
  public function delete($type,$id){
    $result = self::destroy($type,$id);
    return ["result" =>$result["result"]];
  }

  /**
    * check rules
    * @method for check rules before insertion
    * @param array $rules - rules for check if data are valids
    * @param array $value - data to check
    * @return Collection - errors get
    */
    protected function checkRules($rules,$values)
    {
       $errors = new Collection;
       $data = Validator::make($values,$rules);
       if($data->fails()) :
         $errors = $data->errors();
       endif;
       return $errors;
     }

     /**
      * Set the rules of data
      * @return $rules
      */
     protected function setRules($params =  NULL)
     {
        return $this->rules;
     }

     /**
      * Set the rules of data
      * @return $rules
      */
      protected function setUpdateRules($params =  NULL)
      {
         return $this->rules;
      }

      protected function diffBetween2Date($start,$end)
      {
        $nbJoursTimestamp = strtotime($end) - strtotime($start);

        // ** Pour convertir le timestamp (exprimé en secondes) en jours **
        // On sait que 1 heure = 60 secondes * 60 minutes et que 1 jour = 24 heures donc :
        return $nbJoursTimestamp/86400; // 86 400 = 60*60*24
      }

}
