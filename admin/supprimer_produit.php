<?php
// connnection a la base de donné
include_once "connection.php";

// récupération de l'id de produit a partire de lien
$id = $_GET['id'];

// recuperation de l'id de la categorie
$sql = "SELECT * FROM produit WHERE id_produit = $id";
$req = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($req);
$id_cat = $row['id_categorie'];

//requette de suppression 
$req = mysqli_query($con, "DELETE FROM produit WHERE id_produit = $id");

// redirection vers la page de gestion

header("Location:../gestion.php?id=$id_cat");
?>