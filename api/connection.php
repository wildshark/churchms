<?php
date_default_timezone_set("UTC");

    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'church_db';
    $port = '3306';

// Create connection
$church_db = new mysqli($host, $username, $password, $database, $port);

// Check connection
if ($church_db->connect_error) {
    die("Connection failed: " . $church_db->connect_error);
}else{
    $data['server'] = "start";
    $data['clock'] = time();
}