<?php if(!defined('SYSPATH')){die('');} ?>
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Model
 *
 * @author Ervian
 */
function quoteValue($value){

            if ($value === null) {
                $value = `NULL`;
            }
            else if (!is_numeric($value)) {
                $value = $value;
            }
            return $value;
}
function setKeys($key){
    return ":".$key;
}
function bindKeys($key){
    return $key."=:".$key;
}
function stripslashesDeep($value){
    if(is_array($value)){
        $value = array_map('stripslashesDeep', $value);
    }else{
        $value = stripslashes($value);
        //$value = html_entity_decode($value);
        
    }
               

    return $value;
}
class Model {
    public $id;
    public $model;
    public $fields;

    
    
    public function __construct() {
        $this->modelRewrite(lcfirst (get_class()));
        $this->fields = $this->getColumns();
    }
    public function validOptions(array $input_post){

    }
    public function modelRewrite($model){
        $m = explode('_Model', $model);
        $this->model = $m[0];
        $this->fields = $this->getColumns();
    }
    public function getColumns(){
        $pdo = Database::getPDO();
        $stmt = $pdo->prepare("DESCRIBE ".$this->model."");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
    
    public function getById($id){
        $pdo = Database::getPDO();
        $stmt = $pdo->prepare("SELECT * FROM ".$this->model." WHERE ".$this->model."Id='".$id."' LIMIT 1");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return stripslashesDeep($data[0]);
    }
    public function getAll($orderBy = "id", $fetch = PDO::FETCH_ASSOC){
        $pdo = Database::getPDO();
        if(func_num_args ()>0){
            $stmt = $pdo->prepare("SELECT * FROM ".$this->model." ORDER BY ".$orderBy." ASC");
        }else{
            $stmt = $pdo->prepare("SELECT * FROM ".$this->model);
        }
        
        $stmt->execute();
        return stripslashesDeep($stmt->fetchAll($fetch));
        
    }
    public function getAllWhere($orderBy,$fieldWhere,$valueWhere,$fetch = PDO::FETCH_ASSOC){
        $pdo = Database::getPDO();
        $order = "";
        $where = "";
        switch(func_num_args ()){
            case 1:
                $order = " ORDER BY ".$orderBy." ASC";
                break;
            case 3:
                $where = " WHERE ".$fieldWhere."=".$valueWhere;
                break;
        }

        $stmt = $pdo->prepare("SELECT * FROM ".$this->model."".$where." ORDER BY ".$orderBy);
        $stmt->execute();
        return stripslashesDeep($stmt->fetchAll($fetch));
    }
    public function getAllLike($orderBy,$fieldWhere,$valueLike,$limit = "",$fetch = PDO::FETCH_ASSOC){
        $pdo = Database::getPDO();
        $order = "";
        $where = "";
        switch(func_num_args ()){
            case 1:
                $order = " ORDER BY ".$orderBy." ASC";
                break;
            case 3:
                $where = " WHERE ".$fieldWhere." LIKE '".$valueLike."'";
                break;
            case 4:
                $limit = " LIMIT ".$limit;
                break;
        }

        $stmt = $pdo->prepare("SELECT * FROM ".$this->model."".$where." ORDER BY ".$orderBy."".$limit);
        $stmt->execute();
        return stripslashesDeep($stmt->fetchAll($fetch));
    }

    public function isExist($id){
        $pdo = Database::getPDO();
        $stmt = $pdo->prepare("SELECT * FROM ".$this->model." where ".$this->model."Id='".$id."' LIMIT 1");
        $stmt->execute();
        return $stmt->rowCount();
    }
    public function getCount(){
        $pdo = Database::getPDO();
        $stmt = $pdo->prepare("SELECT count(*) as `count` FROM ".$this->model);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //var_dump($data);
        return $data[0]['count'];
    }
    
    public function save(array $post){
        $new = true;
        $id = $this->model."Id";
            if(isset($post['mode'])){
                switch($post['mode']){
                case 'add':
                    $new = true;
                    break;
                case 'update':
                    if(isset($post[$id]) && $this->isExist($post[$id])>0){
                        $new = false;
                    }
                    break;
                }        
            }else{
                
                if(isset($post[$id]) && $this->isExist($post[$id])>0){                  
                    $new = false;
                }
            }
            unset($post['mode']);
            unset($post['saved']);
            if($new){
                return array($id=>$this->add($post),"mode"=>"add");
            }else{
                return array($id=>$this->update($post),"mode"=>"update");
            }
    }
    public function update(array $data){
                
        $set = array();
        foreach ($data as $field => $value) {
            $set[] = $field.'='.quoteValue($value);
        }
        $params = implode(",", array_map("bindKeys",array_keys($data)));
        $set = implode(",", $set);
        $query = "UPDATE ".$this->model." SET ".$params." WHERE ".$this->model."id = ".$data[$this->model."Id"]."";
            $pdo = Database::getPDO();
            $stmt = $pdo->prepare($query);
            $valArray = array_values($data);
            foreach(array_keys($data) as $k => $key){
                $stmt->bindValue(":".$key, $valArray[$k], PDO::PARAM_STR);
            }
            
            $stmt->execute();
            $last = $pdo->lastInsertId();
            return $data[$this->model."Id"];
    }
/*    
    public function update(array $data){
                
        $set = array();
        foreach ($data as $field => $value) {
            $set[] = $field.'='.quoteValue($value);
        }
        $set = implode(",", $set);
        $query = "UPDATE ".$this->model." SET ".$set." WHERE ".$this->model."id = ".$data[$this->model."Id"]."";
            $pdo = Database::getPDO();
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $last = $pdo->lastInsertId();
            return $data[$this->model."Id"];
    }
 */
/*    
    public function add( array $data){
        unset($data[$this->model."Id"]);
        $values = implode(",", array_map("quoteValue",array_values($data)));
        $fields = implode(",", array_keys($data));
            $pdo = Database::getPDO();
            $query = "INSERT INTO ".$this->model." (".$fields.") VALUES(".$values.")";
            
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $last = $pdo->lastInsertId();
            
            return $last;
        
    }
 
 */   
    public function add( array $data){
        unset($data[$this->model."Id"]);
        $params = implode(",", array_map("setKeys",array_keys($data)));
        $fields = implode(",", array_keys($data));
        
            $pdo = Database::getPDO();
            $query = "INSERT INTO `".$this->model."` (".$fields.") VALUES(".$params.")";
            $stmt = $pdo->prepare($query);
            $valArray = array_values($data);
            foreach(array_keys($data) as $k => $key){
                $stmt->bindValue(":".$key, $valArray[$k], PDO::PARAM_STR);
            }
            
            $stmt->execute();
            $last = $pdo->lastInsertId();
            return $last;
        
    }
    public function delete($id){

            $pdo = Database::getPDO();
            $query = "DELETE FROM ".$this->model." WHERE ".$this->model."Id=".$id."";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            return $stmt->rowCount();
   
    }
    public function deleteAllWhere($column,$value){

            $pdo = Database::getPDO();
            $query = "DELETE FROM ".$this->model." WHERE ".$column."=".$value."";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            return $stmt->rowCount();
   
    }
    public function getArrayChunk($input,$size = 3){
        
        $c = -1;
        $array = Array();
        foreach($input as $key => $el){
            
            if($key%$size==0){ $c++; }
            if(array_key_exists('id', $el)){
                $array[$c]['id'] = $el['id'];
            }
            if(array_key_exists('name', $el)){
                $array[$c]['name'] = $el['name'];
            }
            if(array_key_exists('hash', $el)){
                $array[$c]['hash'] = $el['hash'];
            }

        }
       return $array;
    }


    
    public function isExistByColumn($col,$val){
        $pdo = Database::getPDO();
        $stmt = $pdo->prepare("SELECT * FROM ".$this->model." WHERE ".$col."='".$val."' ORDER BY ".$this->model."Id ASC LIMIT 1");
        $stmt->execute();
        if($stmt->rowCount()>0){
            $r =  $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $r[0][$this->model."Id"];
        }else{
            return 0;
        }
        
    }
    

}
