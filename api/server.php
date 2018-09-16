<?php

define('ROOT',dirname(__FILE__));

require_once (ROOT.'/components/autoload.php');
require_once (ROOT.'/config.php');
require_once(ROOT . '/connection.php');

header('Content-Type: application/json');

if($globalConfiguration['isProd']==='false'){
  header('Access-Control-Allow-Origin:http://localhost:8080');
	header('Access-Control-Allow-Headers: Content-Type');
}

$db=Connection::get();

include_once(ROOT . '/endpoints/get.php');
include_once(ROOT . '/endpoints/post.php');
include_once(ROOT . '/endpoints/put.php');
include_once(ROOT . '/endpoints/delete.php');

//print_r($db);

//TODO add connect to database via separated file

//TODO add get responses

//TODO post responses

//TODO put responses

//TODO delete responses