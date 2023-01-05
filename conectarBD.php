<?php

function conectar(){
    $host = "localhost";
    $dbname = "pvisual";
    $username = "root";
    $password = "";

    try{
        return $conn = new PDO('mysql:host='.$host.';dbname='.$dbname, $username, $password);
    }catch(PDOException $pe){
        return die("Could not to connect to the database ".$dbname." : ".$pe->getMessage());
    }

}