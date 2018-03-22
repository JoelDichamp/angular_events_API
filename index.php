<?php
require "flight/Flight.php";
require "autoload.php";
require "routes/cityEvents_routes.php";
require "routes/categories_routes.php";
require "routes/users_routes.php";

Flight::set("flight.handle_errors", false);
Flight::start();
