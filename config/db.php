<?php

$conn = mysqli_connect(
"localhost:3307",
"root",
"",
"hospital_db"
);

if(!$conn){
    die("Connection Failed");
}

?>