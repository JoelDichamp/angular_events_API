<?php
spl_autoload_register( function( $className ) {

    //on liste les dossiers contenant les classes
    $dirs = [
        "models/",
        "repositories/",
        "controllers/"
    ];

    foreach( $dirs as $dir ) {
        $file = $dir . $className . ".php";
        if ( file_exists( $file ) ) {
            require_once $file;
            break;
        }
    }

});