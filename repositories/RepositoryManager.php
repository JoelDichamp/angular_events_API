<?php
class RepositoryManager {

    private $cityEventRepository;
    private $categoryRepository;
    private $userRepository;

    private static $instance = null;

    public static function getInstance() {
        if ( !self::$instance ) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct() {
        $pdo = (new Bdd())->getPdo();

        $this->cityEventRepository = new CityEventRepository( $pdo );
        $this->categoryRepository = new CategoryRepository( $pdo );
        $this->userRepository = new UserRepository( $pdo );
    }

    public function getCityEventRepository() {
        return $this->cityEventRepository;
    }

    public function getCategoryRepository() {
        return $this->categoryRepository;
    }

    public function getUserRepository() {
        return $this->userRepository;
    }
}