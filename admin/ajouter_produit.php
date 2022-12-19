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
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>

    <body>
        <?php
        require_once './connection.php';
        // récupération de l'id de categorie a partire de lien
        $id = $_GET['id'];
        //vérifier que le bouton ajouter a bien été cliqué
        if (isset($_POST['button'])) {
            //extraction des informations envoyé dans des variables par la methode POST
            extract($_POST);
            if (isset($nom) && isset($desc) && isset($prix) && isset($quantite)) {
                $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                //requête d'ajout
                $sql = "INSERT INTO produit(id_categorie, libelle_produit, quantite_produit, price_produit, img_produit, desc_produit) VALUES 
            ('" .  addslashes($categorie) . "', " . "'" .  addslashes($nom) . "' ,$quantite,$prix," . "'" .  $image . "'," . "'" .  addslashes($desc) . "')";
                $req = mysqli_query($con, $sql);
                if ($req) {
                    // sleep(3);
                    //si la requête a été effectuée avec succès , on fait une redirection
                    $_SESSION['ajouterpd'] = '
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                <script type="text/javascript">
                swal("produit ", "bien ajouter!", "success");
                </script>';
                    header("location:../gestion.php?id=$categorie");
                } else {
                    //si non
                    $_SESSION['ajouterpd'] = '
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                <script type="text/javascript">
                swal("ereure! produit  non ajouter");
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
            <a href="../gestion.php?id=<?= $id ?>" class="back_btn"><i class='bx bx-arrow-back'></i></a>
            <h2>Ajouter un produit</h2>
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
                <label>prix</label>
                <input type="text" name="prix" required>
                <label>quantité</label>
                <input type="number" name="quantite" required>
                <label>categorie</label>
                <select name="categorie" id="">
                    <?php
                    // requette pour afficher la liste des CATEGORIE
                    $reQ = mysqli_query($con, "select * FROM categorie");
                    if (mysqli_num_rows($reQ) == 0) {
                        // 
                    } else {
                        while ($roW = mysqli_fetch_assoc($reQ)) {
                            if ($id != $roW['id_categorie']) {
                    ?>
                                <option value="<?= $roW['id_categorie'] ?>"><?= $roW['libelle'] ?></option>
                            <?php
                            } else {
                            ?>
                                <option value="<?= $roW['id_categorie'] ?>" selected><?= $roW['libelle'] ?> </option>
                    <?php
                            }
                        }
                    }
                    ?>
                </select>
                <label>image</label>
                <input id="add_img_input" name='image' type="file" accept="image/png, image/jpg, image/gif, image/jpeg" required/>
                <input type="submit" value="Ajouter" name="button">
            </form>
        </div>
    </body>
    <?php
    include_once "../component/script.php"
    ?>

    </html>
<?php
} else {
    header("Location: ../connection");
    exit();
}
?>