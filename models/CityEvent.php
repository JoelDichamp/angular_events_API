<?php
class CityEvent extends Model implements JsonSerializable {

    private $event_name;
    private $description;
    private $date;
    private $spot;
    private $id_category;

    public function getEvent_name() {
        return $this->event_name;
    }    
 
    public function setEvent_name( $event_name ) {
        $this->event_name = $event_name;        
        return $this;
    }  
    
    public function getDescription(){
        return $this->description;
    }

    public function setDescription( $description ) {
        $this->description = $description;
        return $this;
    }

    public function getDate() {
        return $this->date;
    }    
 
    public function setDate( $date ) {
        $this->date = $date;        
        return $this;
    }  

    public function getSpot() {
        return $this->spot;
    }    
 
    public function setSpot( $spot ) {
        $this->spot = $spot;        
        return $this;
    }  

    public function getId_category() {
        return $this->id_category;
    }    
 
    public function setId_category( $id_category ) {
        $this->id_category = $id_category;        
        return $this;
    } 

    public function jsonSerialize() {
        return [
             "id" => $this->id,
             "event_name" => $this->event_name,
             "description" => $this->description,
             "date" => $this->date,
             "spot" => $this->spot,
             "id_category" => $this->id_category
        ];
    }
}