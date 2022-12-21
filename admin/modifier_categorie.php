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
        // récupération de l'id de produit a partire de lien
        $id = $_GET['id'];
        //requête d'affichage
        $sql = "SELECT * FROM categorie WHERE id_categorie = $id";
        $req = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($req);
        //vérifier que le bouton ajouter a bien été cliqué
        if (isset($_POST['button'])) {
            //extraction des informations envoyé dans des variables par la methode POST
            extract($_POST);
            if (isset($nom) && isset($desc)) {
                if( !empty($icon) ) $icon = `<i class='bx bx-error-circle'></i>`;
                //requête d'ajout
                $sql = "UPDATE `categorie` SET `libelle` = " . "'" .  addslashes($nom) . "', `desc_categorie` = " . "'" .  addslashes($desc) . "', `svg_icon_categorie` = " . "'" .  addslashes($icon) . "' WHERE `categorie`.`id_categorie` = $id";
                $req = mysqli_query($con, $sql);
                if ($req) {
                    //si la requête a été effectuée avec succès , on fait une redirection
                $_SESSION['ajouterpd'] = '
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                <script type="text/javascript">
                swal("categorie ", "bien modifier!", "success");
                </script>';
                    header("location:../gestion.php?id=0");
                } else {
                    //si non
                    $_SESSION['ajouterpd'] = '
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                <script type="text/javascript">
                swal("Hello world!");
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
            <a href="../gestion.php?id=<?= $row['id_categorie'] ?>" class="back_btn"><i class='bx bx-arrow-back'></i></a>
            <h2>Modifier une categorie</h2>
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
                <input type="text" name="nom" value="<?= htmlentities($row['libelle']) ?>" required>
                <label>descrpiption</label>
                <input type="text" name="desc" value="<?= $row['desc_categorie'] ?>" require>
                <label>logo<small> ( svg or icone )</small></label>
                <div class="svg_update">
                    <input type="text" name="icon" value="<?= $row['svg_icon_categorie']?>" required></input>
                    <?= $row['svg_icon_categorie'] ?>
                </div>
                <input type="submit" value="Modifier" name="button">
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