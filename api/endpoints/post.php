<?php

if (!empty($_REQUEST['add_user'])&& $db){

  $userData=json_decode($_REQUEST['formData'],true);

  $isExists=isUserExists($userData,$db);

  if($isExists){
  	echo json_encode([
		  'result' => false,
		  'errors' => ['email']
	  ]);
  	return;
  }

  $sql = 'INSERT INTO users(name, email, user_name, password)'
	      .'VALUES(:name, :email, :user_name, :password)';

  $passwordHash=password_hash($userData['password'],PASSWORD_DEFAULT);

  $result=$db->prepare($sql);
  $result->bindParam(':name',$userData['name'], PDO::PARAM_STR);
  $result->bindParam(':email',$userData['email'], PDO::PARAM_STR);
  $result->bindParam(':user_name',$userData['user_name'], PDO::PARAM_STR);
  $result->bindParam(':password',$passwordHash, PDO::PARAM_STR);

  $responseResult = $result->execute();

	echo json_encode([
		'result' => (bool)$responseResult,
		'errors' => $responseResult ? [] : ['failed']
	]);

  return;
}

if  (!empty($_REQUEST['auth_user']) && $db ){
	$userData=json_decode($_REQUEST['formData'],true);
	$checkEmail=isUserExists($userData,$db);
	$res=isPasswordValid($userData,$db);

	if(!$checkEmail){
		echo json_encode([
			'result' => false,
			'errors' => ['email']
		]);

	}
	echo json_encode([
		'result' => $res,
		'errors' => $res ? [] : ['password']
	]);

	return;
}

function isUserExists($userData,$connect){
	$userEmail=$userData['email'];

	$sql ="SELECT id, name FROM users WHERE email = '".$userEmail."'";

	$response = $connect->query($sql, PDO::FETCH_ASSOC);

	$dataFromDatabase=array();

	$i=0;
	while ($row = $response -> fetch()){
		$dataFromDatabase[$i]['id'] = $row['id'];
		$dataFromDatabase[$i]['name'] = $row['name'];
		$i++;
	}

	return (bool)count($dataFromDatabase);
}

function isPasswordValid($userData,$connect){
	$sql = "SELECT * FROM users WHERE email = '" .$userData['email']. "'";

	$response = $connect->query($sql, PDO::FETCH_ASSOC);
	$dataFromDatabase=array();

	$i=0;
	while ($row = $response -> fetch()){
		$dataFromDatabase[$i]['id'] = $row['id'];
		$dataFromDatabase[$i]['email'] = $row['email'];
		$dataFromDatabase[$i]['password'] = $row['password'];
		$i++;
	}
	if ((bool)count($dataFromDatabase)){
		return password_verify($userData['password'],$dataFromDatabase[0]['password']);
	}


}