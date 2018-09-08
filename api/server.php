<?php

require_once ('config.php');

if($globalConfiguration['isProd']==='false'){
    header('Access-Control-Allow-Origin:http://localhost:8080');
}



include_once ('connect.php');

//TODO add connect to database via separated file

//TODO add get responses

//TODO post responses

//TODO put responses

//TODO delete responses