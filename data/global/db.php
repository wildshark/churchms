<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 14/06/2019
 * Time: 10:42 AM
 */

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
    $_SERVER['start'] = "start";
}
 