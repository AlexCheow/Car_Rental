<?php
header('Access-Control-Allow-Origin:*');
header('Control-Type: application/json');
header('Access-Control-Allow-Method: GET');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');

include("function.php");


	$carList = getCarList();
	echo $carList;

	$carGallery = getGallery();
	echo $carGallery;



	
	/*$data = [
		'status' => 405,
		'message' => "Method Not Allowed",
	];
	header("HTTP/1.0 405 Method Not Allowed");
	echo json_encode($data);*/


