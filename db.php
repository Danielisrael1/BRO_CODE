<?php
//DB CONN DETAILS
$SERVERNAME="localhost";
$USERNAME="root";
$PASSWORD="";
$DBNAME="conn";
$NEWCONN="";

$NEWCONN= mysqli_connect($SERVERNAME,$USERNAME,$PASSWORD,$DBNAME);

if($NEWCONN){
    echo "Connected to the database";
}
?>