<?php
// Read all

$controller = new UserController();

Flight::route('GET /user/@username/@pwd', [$controller, "connectionUser"]);

Flight::route('POST /user', [$controller, "connectionUser2"]);

Flight::route('OPTIONS /user', [$controller, "preflight"]);

