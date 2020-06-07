<?php
$hostname='192.168.0.16';
$username='wollson';
$password='zpF404j9';
$db = 'savrsendan';

$dbh = null;
try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$db",$username,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }
?> 