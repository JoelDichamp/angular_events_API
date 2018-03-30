<?php
use RepositoryManager as RM;

class CityEventController extends Controller {

    function preflight() {
        $this->response( ["success" => true] );
    }

    // function response( $status ) {
    //     // header("Access-Control-Allow-Origin: http://localhost:3000");
    //     // header("Access-Control-Allow-Origin: http://localhost:4200");
    //     header("Access-Control-Allow-Origin: http://localhost:8100");
    //     // header("Access-Control-Allow-Origin: http://192.168.3.68:8100");
    //     header("Access-Control-Allow-Headers: Content-type");
    //     header("Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS");
    //     header("Content-type: application/json");

    //     echo json_encode( $status );
    // }

    function create() {
        $cityEventRepository = RM::getInstance()->getCityEventRepository();
        $cityEvent = new CityEvent( Flight::request()->data->getData() );

        $success = $cityEventRepository->createCityEvent( $cityEvent );

        $msg = "Impossible de créer l'évènement !";
        if ($success) {
            $msg = "L'évènement '" . $cityEvent->getEvent_name() . "' a bien été crée !";
        }
        $status = [ 
            "success" => $success,
            "id" => $cityEvent->getId(),
            "message" => $msg
        ];

        $this->response( $status );
    }

    function getCityEventById( $id ) {
        $cityEventRepository = RM::getInstance()->getCityEventRepository();
        $cityEvent = $cityEventRepository->getCityEventById( $id );
        $success = false;
        if ($cityEvent) {
            $success = true;
        }

        $status = [ 
            "success" => $success,
            "cityEvent" => $cityEvent
        ];
        
        $this->response( $status );
    }

    function update( $id ) {
        $cityEventRepository = RM::getInstance()->getCityEventRepository();
        $cityEvent = new CityEvent ( Flight::request()->data->getData() );
        $cityEvent->setId( $id );

        $success = $cityEventRepository->updateCityEvent( $cityEvent );
        $status = [ 
            "success" => $success,
        ];

        $this->response( $status );
    }

    function delete( $id ) {
        $cityEventRepository = RM::getInstance()->getcityEventRepository();
        $success = $cityEventRepository->deleteCityEvent( $id );
        $status = [ 
            "success" => $success,
        ];

        $this->response( $status );
    }

    function getAll( $index ) {
        //si on met $index=0 en param et que l'on fait un var_dump on a $index=null!! C'est flight qui a envoyé null
        //donc la valeur par défaut est ignorée !
        //d'ou la ligne ci-dessous
        if ( !$index ) $index = 0;

        $cityEventRepository = RM::getInstance()->getCityEventRepository();
        $cityEvents = $cityEventRepository->getAllCityEvents( $index );

        $success = !empty( $cityEvents );
        $status = [ 
            "success" => $success,
            "cityEvents" => $cityEvents
        ];

        $this->response( $status );
    }

    function getCityEventsByIdCategory( $id_category ) {
        $cityEventRepository = RM::getInstance()->getCityEventRepository();
        $cityEvents = $cityEventRepository->getAllByIdCategory( $id_category );

        $success = !empty( $cityEvents );
        $status = [ 
            "success" => $success,
            "cityEvents" => $cityEvents
        ];

        $this->response( $status );
    }
}