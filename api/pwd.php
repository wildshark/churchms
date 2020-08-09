<?php
$username ="admin";
$password ="admin";
$pwd = "pwd".md5("pwd/".$username.$password."-x")."-X";
echo $pwd;
