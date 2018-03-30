<?php
// Read all

$controller = new UserController();

Flight::route('GET /user/@username/@pwd', [$controller, "connectionUser"]);

Flight::route('POST /user', [$controller, "connectionUser2"]);

Flight::route('OPTIONS /*', [$controller, "preflight"]);

Flight::route('GET /user_event/@id_user/@id_event', [$controller, "participateInEvent"]);

Flight::route('DELETE /user_event/@id_user/@id_event', [$controller, "notParticipateInEvent"]);

Flight::route('GET /user_event/@id_user', [$controller, "getCityEventsUser"]);
