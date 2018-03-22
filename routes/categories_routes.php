<?php
// Read all

$controller = new CategoryController();

Flight::route('GET /categories', [$controller, "getAll"]);

Flight::route('GET /', [$controller, "fct_test"]);