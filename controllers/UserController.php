<?php
use RepositoryManager as RM;

class UserController {

    function preflight() {
        $this->response( ["success" => true] );
    }

    function response( $status ) {
        // header("Access-Control-Allow-Origin: http://localhost:4200");
        header("Access-Control-Allow-Origin: http://localhost:3000");
        header("Access-Control-Allow-Headers: Content-type");
        header("Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS");
        header("Content-type: application/json");

        echo json_encode( $status );
    }

    function connectionUser( $username, $pwd ) {
        $userRepository = RM::getInstance()->getUserRepository();
        $user = $userRepository->connectionUser( $username, $pwd );
        $success = false;
        if ($user) {
            $success = true;
        }

        $status = [ 
            "success" => $success,
            "id" => $user->getId()
        ];

        $this->response( $status );
    }

    function connectionUser2() {
        $userRepository = RM::getInstance()->getUserRepository();
        $datas = Flight::request()->data;
        $user = $userRepository->connectionUser( $datas->username, $datas->pwd );
        $success = false;
        if ($user) {
            $success = true;
        }

        $status = [ 
            "success" => $success,
            "id" => $user->getId()
        ];

        $this->response( $status );
    }
}