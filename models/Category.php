<?php
class Category extends Model implements JsonSerializable {

    private $category_name;

    public function getCategory_name() {
        return $this->category_name;
    }    
 
    public function setCategory_name($category_name) {
        $this->category_name = $category_name;        
        return $this;
    } 

    public function jsonSerialize() {
        return [
             "id" => $this->id,
             "category_name" => $this->category_name
        ];
    }
}