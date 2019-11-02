<?php
// $ch = curl_init(); 
// $api_url = 'https://htmlpdfapi.com/api/v1/pdf';
// $data = array(
//     "url" => "https://htmlpdfapi.com/registration/sent"
// );

// $client_id = '5eCVWlDNU2Ekef1UFULPIXZn-wUGpfv3';
// $client_secret = 'myclientsecret';
// $ch = curl_init($api_url);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLINFO_HEADER_OUT, true);
// curl_setopt($ch, CURLOPT_POST, true);
// curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
// curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//     'Authentication: Token 5eCVWlDNU2Ekef1UFULPIXZn-wUGpfv3'
// ));

// $result = curl_exec($ch);

// header('Cache-Control: public'); 
// header('Content-type: application/pdf');
// header('Content-Disposition: attachment; filename="new.pdf"');
// header('Content-Length: '.strlen($result));

// print_r($result);
// curl_close($ch);
// // $context = stream_context_create(array(
// //     'http' => array(
// //         'header' => "Authentication" . base64_encode("$client_id"),
// //     ),
// // ));

// // $result = file_get_contents($api_url, false, $context);
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://htmlpdfapi.com/api/v1/pdf');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "url=http://localhost:8096/login.html");

$headers = array();
$headers[] = 'Authentication: Token 5eCVWlDNU2Ekef1UFULPIXZn-wUGpfv3';
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
else{
    header('Cache-Control: public'); 
    header('Content-type: application/pdf');
    header('Content-Disposition: attachment; filename="new.pdf"');
    header('Content-Length: '.strlen($result));
    echo $result;
}
curl_close($ch);
?>