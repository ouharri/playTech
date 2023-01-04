<?php
// connection a la base de données
$con = mysqli_connect("localhost","root","","playteh");
if(!$con){
    echo'Ereure coté serveure !';
    die(); 
}
?>