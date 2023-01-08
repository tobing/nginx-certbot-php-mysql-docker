<?php

$mysqlservername = "mysql";
$mysqlusername = "root";
$mysqlpassword = "0123456789";

try {
  $conn = new PDO("mysql:host=$mysqlservername;dbname=dbname", $mysqlusername, $mysqlpassword);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "MySQL connection to ".$mysqlservername." success";
} catch(PDOException $e) {
  echo "MySQL connection to ".$mysqlservername." failed: " . $e->getMessage();
}


$pgsqlservername = "pgsql";
$pgsqlusername = "postgres";
$pgsqlpassword = "example";

echo "<br>";
echo "<br>";

try {
  $conn = new PDO("pgsql:host=$pgsqlservername;dbname=postgres", $pgsqlusername, $pgsqlpassword);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "PostgreSQL connection to ".$pgsqlservername." success";
} catch(PDOException $e) {
  echo "PostgreSQL connection to ".$pgsqlservername." failed: " . $e->getMessage();
}

echo "<br>";
echo "<br>";

phpinfo();

/*
$url = "https://example.org";
$orignal_parse = parse_url($url, PHP_URL_HOST);
$get = stream_context_create(array("ssl" => array("capture_peer_cert" => TRUE)));
$read = stream_socket_client("ssl://".$orignal_parse.":443", $errno, $errstr, 
30, STREAM_CLIENT_CONNECT, $get);
$cert = stream_context_get_params($read);
$certinfo = openssl_x509_parse($cert['options']['ssl']['peer_certificate']);

$valid_from = date(DATE_RFC2822,$certinfo['validFrom_time_t']);
$valid_to = date(DATE_RFC2822,$certinfo['validTo_time_t']);

echo '<pre>';
echo ($certinfo["issuer"]["O"]);
echo "\r\n";
echo "Valid From: ".$valid_from."<br>";
echo "Valid To:".$valid_to."<br>";
echo '<pre>';
*/