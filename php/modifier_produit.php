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
    // récupération de l'id de produit a partire de lien
    $id = $_GET['id'];
    //connexion à la base de donnée
    include_once "connection.php";
    //requête d'affichage
    $sql = "SELECT * FROM `produit` WHERE id_produit = $id";
    $req = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($req);

    //vérifier que le bouton ajouter a bien été cliqué
    if (isset($_POST['button'])) {
        //extraction des informations envoyé dans des variables par la methode POST
        extract($_POST);
        // coder l'image
        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        //verifier que tous les champs ont été remplis
        if (isset($nom) && isset($desc) && $prix && isset($quantite)) {
            // requette de modification
            if ($image) {
                $sql = "UPDATE `produit` SET `id_categorie` = $categorie, `libelle_produit` = '$nom', `price_produit` = '$prix' , `quantite_produit` = '$quantite', `desc_produit` = '$desc' , `img_produit` = '$image' WHERE `produit`.`id_produit` = $id";
            } else {
                $sql = "UPDATE `produit` SET `id_categorie` = $categorie, `libelle_produit` = '$nom', `price_produit` = '$prix' , `quantite_produit` = '$quantite', `desc_produit` = '$desc' WHERE `produit`.`id_produit` = $id";
            }
            $req = mysqli_query($con, $sql);

            if ($req) {
                //si la requête a été effectuée avec succès , on fait une redirection
                echo `
                    
                `;
                header("location:../html/gestion.php?id=$categorie");
            } else {
                //si non
                $message = "prodfuit non ajouté";
            }
        } else {
            //si non
            $message = "Veuillez remplir tous les champs !";
        }
    }

    ?>
    <div class="form">
        <a href="../html/gestion.php?id=<?= $row['id_categorie'] ?>" class="back_btn"><i class='bx bx-arrow-back'></i></a>
        <h2>Ajouter un produit</h2>
        <p class="erreur_message">
            <?php
            // si la variable message existe , affichons son contenu
            if (isset($message)) {
                echo $message;
            }
            ?>

        </p>
        <form action="#" method="POST" enctype="multipart/form-data">
            <label>Nom</label>
            <input type="text" name="nom" value="<?= $row['libelle_produit'] ?>">
            <label>descrpiption</label>
            <input type="text" name="desc" value="<?= $row['desc_produit'] ?>">
            <label>prix</label>
            <input type="text" name="prix" value="<?= $row['price_produit'] ?>">
            <label>quantité</label>
            <input type="number" name="quantite" value="<?= $row['quantite_produit'] ?>">
            <label>categorie</label>
            <select name="categorie">
                <?php
                // requette pour afficher la liste des CATEGORIE
                $reQ = mysqli_query($con, "select * FROM categorie");

                if (mysqli_num_rows($reQ) == 0) {
                    // 
                } else {
                    while ($roW = mysqli_fetch_assoc($reQ)) {

                        if ($roW['id_categorie'] != $row['id_categorie']) {
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
            <label for="add_img_input" class="label_image">
                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['img_produit']); ?>" alt="gg">
                <i class='bx bx-image-add'></i>
                <input id="add_img_input" class="none" name='image' type="file" accept="image/png, image/jpg, image/gif, image/jpeg" />
                <span id="imageName"></span>
            </label>
            <input type="submit" value="Modifier" name="button">
        </form>
    </div>
</body>

</html>