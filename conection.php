<?php

$dbuser = "root";
$dbpas = "";
$dsn = "mysql:dbname=blog;host=localhost";

try{
    $pdo = new PDO($dsn, $dbuser, $dbpas);

}
catch(PDOException $e){
    echo "Erro: ".$e->getMessage();
}

?>
