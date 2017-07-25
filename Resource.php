<?php

$service_url = 'http://swapi.co/api/starships/';
$curl = curl_init($service_url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$curl_response = curl_exec($curl);
if ($curl_response === false) {
    $info = curl_getinfo($curl);
    curl_close($curl);
    die('An error occured during curl execution. Additioanl info: ' . var_export($info));
}
curl_close($curl);
$decoded = json_decode($curl_response);
$assoc_array = json_decode($curl_response, true);
if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
    die('error occured: ' . $decoded->response->errormessage);
}

$rows = count($assoc_array['results']);
$page_num = ($rows / 2)+1;
	if (!isset($_GET['page'])) {
		$page = 1;
	} else {
		$page = $_GET['page'];
	}
$start_page = ($page-1)*2;
$myarray = array_values($assoc_array['results']);
$slice = (array_slice($myarray, $start_page, 2));
?>
