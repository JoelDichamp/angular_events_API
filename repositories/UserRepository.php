<?php
class UserRepository extends Repository {

    function connectionUser( $username, $pwd ) {
        // SELECT * FROM events
        // JOIN categories ON id_category=categories.id
        // WHERE events.id=2;
        $sql = "SELECT * FROM users 
                WHERE username=:username AND pwd=:pwd";
        $statement = $this->pdo->prepare( $sql );
        $result = $statement->execute([
            "username" => $username,
            "pwd" => $pwd
        ]);

        $user = null;
        if ($result) {
            $data = $statement->fetch();
            $user = new User( $data );
        }

        return $user;
    }
}