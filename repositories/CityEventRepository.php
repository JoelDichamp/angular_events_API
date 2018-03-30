<?php
class CityEventRepository extends Repository {

    const CITY_EVENT_BY_PAGE = 30;

    function createCityEvent( CityEvent $cityEvent ) {
        $sql = "INSERT INTO events SET 
                event_name=:event_name, description=:event_description, spot=:spot, date=:date_event, id_category=:id_category";
        $statement = $this->pdo->prepare( $sql );
        $result = $statement->execute([
            "event_name" => $cityEvent->getEvent_name(),
            "event_description" => $cityEvent->getDescription(),
            "spot" => $cityEvent->getSpot(),
            "date_event" => $cityEvent->getDate(),
            "id_category" => $cityEvent->getId_category()
        ]);

        $id = 0;
        if ($result) {
            $id = $this->pdo->lastInsertId();
            $cityEvent->setId( $id );
        }

        return $id;
    }

    function getCityEventById( $id ) {
        // SELECT * FROM events
        // JOIN categories ON id_category=categories.id
        // WHERE events.id=2;
        $sql = "SELECT * FROM events 
                JOIN categories ON id_category=categories.id
                WHERE events.id=:id";
        $statement = $this->pdo->prepare( $sql );
        $result = $statement->execute([
            "id" => $id
        ]);

        $cityEvent = null;
        $data = $statement->fetch();
        if ($data) {
            $cityEvent = new CityEvent( $data );
        }

        return $cityEvent;
    }

    function updateCityEvent( CityEvent $cityEvent ) {
        $sql = "UPDATE events SET 
                event_name=:event_name, description=:event_description, spot=:spot, id_category=:id_category, date=:date_event WHERE id=:id";
        $statement = $this->pdo->prepare( $sql );
        $result = $statement->execute([
            "event_name" => $cityEvent->getEvent_name(),
            "event_description" => $cityEvent->getDescription(),
            "spot" => $cityEvent->getSpot(),
            "id_category" => $cityEvent->getId_category(),
            "date_event" => $cityEvent->getDate(),
            "id" => $cityEvent->getId()
        ]);

        $updated = 0;
        if ($result) {
            $updated = $statement->rowCount();
        }

        return $updated;
    }

    function deleteCityEvent( $id ) {
        $sql = "DELETE FROM events WHERE id=:id";
        $statement = $this->pdo->prepare( $sql );
        $result = $statement->execute([
            "id" => $id
        ]);

        $deleted = 0;
        if ( $result ) {
            $deleted = $statement->rowCount();
        }

        return $deleted;
    }

    function getAllCityEvents( $index = 0 ) {
        $sql = "SELECT * FROM events 
                LIMIT :index, :offset";
        $statement = $this->pdo->prepare( $sql );
        $statement->bindValue( ":index", $index * self::CITY_EVENT_BY_PAGE, PDO::PARAM_INT );
        $statement->bindValue( ":offset", self::CITY_EVENT_BY_PAGE, PDO::PARAM_INT );
        $result = $statement->execute();

        $cityEvents = [];
        if ($result) {
            $datas = $statement->fetchAll();
            foreach($datas as $data) {
                $cityEvents[] = new CityEvent( $data );
            }
        }

        return $cityEvents;
    }

    function getAllByIdCategory ( $id_category, $index = 0 ) {
        $sql = "SELECT * FROM events
                WHERE id_category=:id
                LIMIT :index, :offset";
        $statement = $this->pdo->prepare( $sql );
        $statement->bindValue( ":index", $index * self::CITY_EVENT_BY_PAGE, PDO::PARAM_INT );
        $statement->bindValue( ":offset", self::CITY_EVENT_BY_PAGE, PDO::PARAM_INT );
        $statement->bindValue( ":id", $id_category, PDO::PARAM_INT );
        $result = $statement->execute();

        $cityEvents = [];
        if ($result) {
            $datas = $statement->fetchAll();
            foreach($datas as $data) {
                $cityEvents[] = new CityEvent( $data );
            }
        }

        return $cityEvents;
    }
}