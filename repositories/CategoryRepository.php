<?php
class CategoryRepository extends Repository {

    function getAllCategories() {
        $sql = "SELECT * FROM categories ORDER BY category_name";
        $result = $this->pdo->query( $sql );

        $categories = [];
        if ($result) {
            $datas = $result->fetchAll();
            foreach($datas as $data) {
                $categories[] = new Category( $data );
            }
        }

        return $categories;
    }
}