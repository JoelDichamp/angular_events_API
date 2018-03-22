<?php
use RepositoryManager as RM;

class CategoryController {

    function response( $status ) {
        // header("Access-Control-Allow-Origin: http://localhost:4200");
        header("Access-Control-Allow-Origin: http://localhost:3000");

        echo json_encode( $status );
    }

    function getAll() {
        $categoryRepository = RM::getInstance()->getCategoryRepository();
        $categories = $categoryRepository->getAllCategories();

        $success = !empty( $categories );
        $status = [ 
            "success" => $success,
            "categories" => $categories
        ];

        $this->response( $status );
    }

    function fct_test() {
        echo "test";
    }
}