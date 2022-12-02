<div class="categorie-gallery">
    <?php
    // connexion a la base de donné
    include_once "connection.php";
    // récupération de l'id de categorie a partire de lien
    $id = $_GET['id'];
    // requette pour afficher la liste des CATEGORIE
    $req = mysqli_query($con, "SELECT * FROM categorie");
    if (mysqli_num_rows($req) == 0) {
        // 
    } else {
    ?>
        <div class="cat_box <?php if ($id == 0) echo 'active' ?>">
            <a href="?id=0">
                <h6>All</h6>
            </a>
        </div>
        <?php
        while ($row = mysqli_fetch_assoc($req)) {
        ?>
            <div class="cat_box <?php if ($id == $row['id_categorie']) echo 'active' ?>">
                <a class="cat_type" href="?id=<?= $row['id_categorie'] ?>">
                    <?= $row['svg_icon_categorie'] ?>
                    <h6 class='hhhh'><?= $row['libelle'] ?></h6>
                </a>
                <div class="cat_box_icon">
                    <a href="./admin/modifier_categorie.php?id=<?= $row['id_categorie'] ?>"><i class='bx bxs-edit'></i></a>
                    <a href="./admin/supprimer_categorie.php?id=<?= $row['id_categorie'] ?>" onclick="return checkdelet('<?= $row['libelle'] ?>')"><i class='bx bxs-trash-alt'></i></a>
                </div>
            </div>
    <?php
        }
    }
    ?>
    <a href="./admin/ajouter_categorie.php" class="ajouter_cat"><i class='bx bx-plus-circle bx-sm add-cart'></i>Ajouter</a>
</div>