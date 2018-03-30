<?php

abstract class Controller {

    private $origins = [ "http://localhost",
                         "http://localhost:3000",
                         "http://localhost:4200",
                         "http://localhost:8100",
                         "http://192.168.3.68:8100"
    ];

    private function getHeaderAllowOrigin() {
        $header = "";
        $ok = false;

        if( !empty($_SERVER["HTTP_ORIGIN"]) ) {
            $url = $_SERVER["HTTP_ORIGIN"];
            foreach($this->origins as $domain){
                if($domain === $url){
                   $ok = true;
                   break;
               }
           }
        }

        if ($ok) {
           $header = $url;      
        }  

        return $header;
    }

    public function response( $status ) {
        header("Access-Control-Allow-Origin: " . $this->getHeaderAllowOrigin());
        header("Access-Control-Allow-Headers: Content-type");
        header("Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS");
        header("Content-type: application/json");

        echo json_encode( $status );
    }

}