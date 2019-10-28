<?php
	ini_set('memory_limit', '-1');
	ini_set('max_execution_time', 300);
	$data = file_get_contents("http://api.travelpayouts.com/v2/prices/week-matrix?currency=usd&origin=JFK&destination=BOM&show_to_affiliates=true&token=5f0f8efe1a448a3ce74a1cd92902f031");
	$obj = json_decode($data);
	print_r($obj);

?>