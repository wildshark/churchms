<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 13/08/2019
 * Time: 4:58 PM
 */

$set['endpoint'] = "combo";

if(!isset($position)){
    $set['combo'] = "position";
    $result = config\connection($set);
    $position = json_decode($result);
}

if(!isset($group)){
    $set['combo'] = "group";
    $result = config\connection($set);
    $group = json_decode($result);
}

if(!isset($branch)){
    $set['combo'] = "branch";
    $result = config\connection($set);
    $branch = json_decode($result);
}

if(!isset($income)){
    $set['combo'] = "income";
    $result = config\connection($set);
    $income = json_decode($result);
}

if(!isset($expenses)){
    $set['combo'] = "expenses";
    $result = config\connection($set);
    $expenses = json_decode($result);
}

if(!isset($country)){
    $set['combo'] = "country";
    $result = config\connection($set);
    $country = json_decode($result);
}