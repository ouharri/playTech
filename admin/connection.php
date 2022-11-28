<?php
// connection a la base de données
$con = mysqli_connect("localhost","root","","playtech");
if(!$con){
    echo'Ereure coté serveure !';
    die(); 
}
?>