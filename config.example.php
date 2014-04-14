<?php
    $db_host = 'HOSTNAME';
    $db_name = 'DBNAME';
    $db_user = 'USERNAME';
    $db_pass = 'PASS';
    $db = new PDO("mysql:host=$db_host;dbname=$db_name",$db_user,$db_pass);
?>