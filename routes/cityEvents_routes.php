<?php

//crud
// Create Read Update Delete

$controller = new CityEventController();

Flight::route('POST /cityEvent', [$controller, "create"]);

Flight::route('GET /cityEvent/@id',  [$controller, "getCityEventById"]);

Flight::route('GET /cityEvent/category/@id_category',  [$controller, "getCityEventsByIdCategory"]);

//cette route est pré testée par ajax pour vérifier les autorisations 
Flight::route('OPTIONS /cityEvent/@id', [$controller, "preflight"]);

Flight::route('PUT /cityEvent/@id', [$controller, "update"]);

Flight::route('DELETE /cityEvent/@id', [$controller, "delete"]);

Flight::route('GET /cityEvents(/@index)', [$controller, "getAll"]);

/*
Requête     GET     POST        PUT
Données     Url     body        body
envoyées            form_data   raw (json) : 
par                             {
                                    "title": "test",
                                    "content": "test"
                                }
*/