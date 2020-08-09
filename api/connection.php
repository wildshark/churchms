<?php
date_default_timezone_set("UTC");

if($_SERVER['HTTP_HOST'] == "localhost"){
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'church_db';
    $port = '3306';
}else{
    $host = '142.93.242.183';
    $username = 'iquipe';
    $password = '@passWD8282';
    $database = 'church_db';
    $port = '3306';
}

// Create connection
$church_db = new mysqli($host, $username, $password, $database, $port);

// Check connection
if ($church_db->connect_error) {
    die("Connection failed: " . $church_db->connect_error);
}else{
    $data['server'] = "start";
    $data['application'] = "churchms";
    $data['clock'] = time();
}