<?php

abstract class Model {

    protected $id;

    public function setId( $id ) {
        $this->id = (int) $id;
    }

    public function getId() {
        return $this->id;
    }

    function __construct ( array $datas = [] ) {
        $this->hydrate( $datas );
    }

    private function hydrate( array $datas ) {
        foreach ( $datas as $key => $value ) { // "id" => 1

            $method = "set" . ucfirst($key); // setId

            //on vérifie que le setter existe
            if ( method_exists( $this, $method ) ) {

                //interprété en $this->setId par exemple
                $this->$method( $value ); // this->SetId( 1 )
            }
        }
    }
}