<div class="categorie-gallery">
    <?php

    // connexion a la base de donné
    include_once "connection.php";

    // requette pour afficher la liste des CATEGORIE
    $req = mysqli_query($con, "SELECT * FROM categorie");

    if (mysqli_num_rows($req) == 0) {
        // 
    } else {
    ?>
        <div class="cat_box cart_Box">
            <a href="?id=0">
                <h6>All</h6>
            </a>
        </div>
        <?php
        while ( $row = mysqli_fetch_assoc($req) ) {
        ?>
            <div class="cat_box">
                <a class="cat_type" href="?id=<?= $row['id_categorie'] ?>">
                    <?= $row['svg_icon_categorie'] ?>
                    <h6><?= $row['libelle'] ?></h6>
                </a>
                <div class="cat_box_icon">
                    <a href="./admin/modifier_categorie.php?id=<?= $row['id_categorie'] ?>"><i class='bx bxs-edit'></i></a>
                    <a href="./admin/supprimer_categorie.php?id=<?= $row['id_categorie'] ?>"><i class='bx bxs-trash-alt'></i></a>
                </div>
            </div>
    <?php
        }
    }
    ?>
    <a href="./admin/ajouter_categorie.php" class="ajouter_cat"><i class='bx bx-plus-circle bx-sm add-cart'></i>Ajouter</a>
</div>