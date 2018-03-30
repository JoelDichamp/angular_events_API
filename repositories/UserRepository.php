<?php
class UserRepository extends Repository {

    const SALT = "Lupin813";

    function connectionUser( $username, $pwd ) {
        //Login,pwd : Toto,toto ou Titi,titi

        // SELECT * FROM events
        // JOIN categories ON id_category=categories.id
        // WHERE events.id=2;
        $sql = "SELECT * FROM users 
                WHERE username=:username AND pwd=:pwd";
        $statement = $this->pdo->prepare( $sql );
        
        $pwd = crypt( $pwd, self::SALT );

        $result = $statement->execute([
            "username" => $username,
            "pwd" => $pwd
        ]);
 
        $user = null;
        $data = $statement->fetch();
        if ($data) {
            $user = new User( $data );
        }

        return $user;
    }

    function participateInEvent( $id_user, $id_event ) {
        $sql = "INSERT INTO user_event SET
                id_user=:id_user, id_event=:id_event";
        $statement = $this->pdo->prepare( $sql );
        $result = $statement->execute([
            "id_user" => $id_user,
            "id_event" => $id_event
        ]);

        $ok = false;
        if ($result) {
            $ok = true;
        }

        return $ok;
    }

    function notParticipateInEvent( $id_user, $id_event ) {
        $sql = "DELETE FROM user_event 
                WHERE id_user=:id_user AND id_event=:id_event";
        $statement = $this->pdo->prepare( $sql );
        $result = $statement->execute([
            "id_user" => $id_user,
            "id_event" => $id_event
        ]);

        $deleted = 0;
        if ( $result ) {
            $deleted = $statement->rowCount();
        }

        return $deleted;
    }

    function getCityEventsUser( $id_user ) {
        $sql = "SELECT id, event_name, description, date, spot, id_category FROM events 
                JOIN user_event ON events.id=id_event
                WHERE id_user=:id_user";
        $statement = $this->pdo->prepare( $sql );
        $result = $statement->execute([
            "id_user" => $id_user
        ]);

        $cityEvents = [];
        if ( $result ) {
            $datas = $statement->fetchAll();
            foreach( $datas as $data ) {
                $cityEvents[] = new CityEvent( $data );
            }
        }

        return $cityEvents;
    }
}