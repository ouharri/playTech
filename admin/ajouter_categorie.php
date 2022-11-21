<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <!-- boxicon link -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <?php
    require_once './connection.php';
    //vérifier que le bouton ajouter a bien été cliqué
    if (isset($_POST['button'])) {
        //extraction des informations envoyé dans des variables par la methode POST
        extract($_POST);
        if (isset($nom) && isset($desc)) {
            //requête d'ajout
            $sql = "INSERT INTO `categorie` (`libelle`, `desc_categorie`, `svg_icon_categorie`) VALUES 
            ('$nom','$desc','$icon')";
            $req = mysqli_query($con, $sql);
            if ($req) {
                //si la requête a été effectuée avec succès , on fait une redirection
                echo `
                    
                `;
                header("location:./gestion.php?id=0");
            } else {
                //si non
                $message = "produit non ajouté";
            }
        } else {
            //si non
            $message = "Veuillez remplir tous les champs !";
        }
    }
    ?>
    <div class="form">
        <a href="../gestion.php?id=0" class="back_btn"><i class='bx bx-arrow-back'></i></a>
        <h2>Ajouter une categorie</h2>
        <p class="erreur_message">
            <?php
            // si la variable message existe , affichons son contenu
            if (isset($message)) {
                echo $message;
            }
            ?>
        </p>
        <form enctype="multipart/form-data" action="" method="POST">
            <label>Nom</label>
            <input type="text" name="nom">
            <label>descrpiption</label>
            <input type="text" name="desc">
            <label>logo<small> ( svg or icone )</small></label>
            <input type="text" name="icon">
            <input type="submit" value="Ajouter" name="button">
        </form>
    </div>
</body>

</html>