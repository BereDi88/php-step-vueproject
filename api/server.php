<?php

define('ROOT',dirname(__FILE__));

require_once (ROOT.'/components/autoload.php');
require_once (ROOT.'/config.php');
//require_once(ROOT . '/connection.php');

if($globalConfiguration['isProd']==='false'){
  header('Access-Control-Allow-Origin:http://localhost:8080');
}

$db=Connection::get();



include_once (ROOT . '/endpoints/endpoints_GET.php');
include_once (ROOT . '/endpoints/endpoints_POST.php');
include_once (ROOT . '/endpoints/endpoints_PUT.php');
include_once (ROOT . '/endpoints/endpoints_DELETE.php');

print_r($db);




//TODO add connect to database via separated file

//TODO add get responses

//TODO post responses

//TODO put responses

//TODO delete responses