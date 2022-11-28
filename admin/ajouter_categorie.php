<?php
session_start();
if (isset($_SESSION['name']) && $_SESSION['admin'] == 1) {
?>

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
            ('" .  addslashes($nom) . "'," . "'" .  addslashes($desc) . "'," . "'" .  addslashes($icon) . "')";
                $req = mysqli_query($con, $sql);
                if ($req) {
                    //si la requête a été effectuée avec succès , on fait une redirection
                    $_SESSION['ajouterpd'] = '
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                <script type="text/javascript">
                swal("categorie", "bien ajouter!", "success");
                </script>';
                    header("location:../gestion.php?id=0");
                } else {
                    //si non
                    $_SESSION['ajouterpd'] = '
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                <script type="text/javascript">
                swal("Ereure categorie non ajouter!");
                </script>';
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
                <input type="text" name="nom" required>
                <label>descrpiption</label>
                <input type="text" name="desc" required>
                <label>logo<small> ( svg or icone )</small></label>
                <input type="text" name="icon" required>
                <input type="submit" value="Ajouter" name="button">
            </form>
        </div>
    </body>

    </html>
<?php
} else {
    header("Location: ../connection");
    exit();
}
?>