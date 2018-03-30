<?php
use RepositoryManager as RM;

class UserController extends Controller {

    function preflight() {
        $this->response( ["success" => true] );
    }

    // function response( $status ) {
    //     header("Access-Control-Allow-Origin: http://localhost:4200");
    //     // header("Access-Control-Allow-Origin: http://localhost:3000");
    //     header("Access-Control-Allow-Headers: Content-type");
    //     header("Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS");
    //     header("Content-type: application/json");

    //     echo json_encode( $status );
    // }

    function connectionUser( $username, $pwd ) {
        $userRepository = RM::getInstance()->getUserRepository();
        $user = $userRepository->connectionUser( $username, $pwd );
        $status = [ 
            "success" => false,
            "id" => 0
        ];

        if ($user) {
            $status = [ 
                "success" => true,
                "id" => $user->getId()
            ];
        }

        $this->response( $status );
    }

    function connectionUser2() {
        $userRepository = RM::getInstance()->getUserRepository();
        $datas = Flight::request()->data;
        $user = $userRepository->connectionUser( $datas->username, $datas->pwd );
        $success = false;
        $status = [ 
            "success" => false,
            "id" => 0
        ];

        if ($user) {
            $status = [ 
                "success" => true,
                "id" => $user->getId()
            ];
        }

        $this->response( $status );
    }

    function participateInEvent( $id_user, $id_event ) {
        $userRepository = RM::getInstance()->getUserRepository();
        $success = $userRepository->participateInEvent( $id_user, $id_event );
        $status = [ 
            "success" => $success,
        ];

        $this->response( $status );
    }

    function notParticipateInEvent( $id_user, $id_event ) {
        $userRepository = RM::getInstance()->getUserRepository();
        $success = $userRepository->notParticipateInEvent( $id_user, $id_event );
        $status = [ 
            "success" => $success,
        ];

        $this->response( $status );
    }

    function getCityEventsUser( $id_user ) {
        $userRepository = RM::getInstance()->getUserRepository();
        $cityEvents = $userRepository->getCityEventsUser( $id_user );

        $success = !empty( $cityEvents );
        $status = [ 
            "success" => $success,
            "cityEvents" => $cityEvents
        ];

        $this->response( $status );
    }
}