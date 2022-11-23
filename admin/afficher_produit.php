<?php
include_once "connection.php";
// récupération de l'id de produit a partire de lien
$id = $_GET['id'];
// requette pour afficher la liste des produit
if ($id != 0) {
    $req = mysqli_query($con, "SELECT * FROM `produit` WHERE produit.id_categorie = $id;");
    $reQ = mysqli_query($con, "SELECT * FROM `categorie` WHERE id_categorie = $id");
    if (mysqli_num_rows($reQ) == 0) {
        // 
    } else {
        $row = mysqli_fetch_assoc($reQ);
?>
        <div class="mainText" id="platType">
            <div class="add_prod">
                <h2><?= $row['libelle'] ?></h2>
                <h2 class="add-ntn"><a href="./admin/ajouter_produit.php?id=<?= $row['id_categorie'] ?>">Ajouter <i class='bx bx-plus-circle add-cart add-cart-one'></i></a></h2>
            </div>
            <p><?= $row['desc_categorie'] ?></p>
        </div>
        <div class="menu-content" id='plat'>
        <?php
    }
} else {
    $req = mysqli_query($con, "SELECT * FROM `produit`");
        ?>
        <div class="mainText" id="platType">
            <div class="add_prod">
                <h2>Nos produit</h2>
                <h2 class="add-ntn"><a href="./admin/ajouter_produit.php?id=0">Ajouter <i class='bx bx-plus-circle add-cart add-cart-one'></i></a></h2>
            </div>
            <p>Vous trouver içi tous ce que vous vouler !</p>
        </div>
        <div class="menu-content" id='plat'>
            <?php
        }
        if (mysqli_num_rows($req) == 0) {
            // 
        } else {
            include "./component/script.php";
            while ($row = mysqli_fetch_assoc($req)) {
            ?>
                <div class="roW">
                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['img_produit']); ?>" alt="gg">
                    <div class="menu-text">
                        <div class="menu-left">
                            <h4><?= $row['libelle_produit'] ?></h4>
                        </div>
                        <div class="menu-right">
                            <h5><?= $row['price_produit'] ?>DH</h5>
                        </div>
                    </div>
                    <p><?= $row['desc_produit'] ?></p>
                    <div class="foteerPlat">
                        <div class="addPlat">
                            <a href="./admin/modifier_produit.php?id=<?= $row['id_produit'] ?>"><i class='bx bxs-edit'></i></a>
                            <a href="./admin/supprimer_produit.php?id=<?= $row['id_produit'] ?>" onclick="return checkdelet()"><i class='bx bxs-trash-alt'></i></a>
                        </div>
                    </div>
                </div>
        <?php
            }
        }
        include "./component/script.php";
        ?>
        </div>
        <script>
            function checkdelet() {
                return confirm('vous etes sure de suprimer');
            }
        </script>