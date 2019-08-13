<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 15/07/2019
 * Time: 5:08 PM
 */

// create curl resource
$ch = curl_init();

// set url
curl_setopt($ch, CURLOPT_URL, "http://localhost/krypton/api/?application=church-ms&token=W-259dea1ec8a88f807acc8f0fc743020b1efed568X&endpoint=expenses-financial-report&church_id=1&start=2019-8-1&end=2019-8-30");

//return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// $output contains the output string
$output = curl_exec($ch);

// close curl resource to free up system resources
curl_close($ch);

echo $output;
