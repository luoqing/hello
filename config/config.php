<?php

    ini_set("error_reprorting", "E_ALL");
    ini_set("display_errors", "Off");
    ini_set("log_errors", "On");
    ini_set("error_log", LOG_PATH . "error_log.log");


    $g_databases = array(
            'test' => array(
                 'host'    => "127.0.0.1",
                 'port'    => 3306,
                 'dbname'  => 'test',
                 'usr'     => 'root',
                 'pwd'     => 'root',
            ),
    ); 
