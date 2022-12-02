<?php
session_start();
$_SESSION['page'] = 'gallery';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- style css link  -->
    <link rel="stylesheet" href="./style/style.css?v=<?php echo time(); ?>">
    <title>PlayTech - Shop</title>

    <!-- google font  link-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Poppins:ital,wght@0,100;0,200;0,300;1,300;1,400;1,800;1,900&display=swap" rel="stylesheet">

    <!-- font awesome link "icone" -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- boxicon link -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- meta data include -->
    <?php
    include "./component/header.php"
    ?>
</head>

<body>
    <!-- header (nav bar) -->
    <?php
    include_once "./component/header.php"
    ?>

    <section class="menu" id="intro">
        <div class="categorie-gallery">
            <?php
            // récupération de l'id de produit a partire de lien
            $id = $_GET['id'];
            // connexion a la base de donné
            include_once "./admin/connection.php";
            // requette pour afficher la liste des CATEGORIE
            $req = mysqli_query($con, "SELECT * FROM categorie");
            if (mysqli_num_rows($req) == 0) {
                // 
            } else {
            ?>
                <div class="cat_box <?php if ($id == 0) echo 'active' ?>" style="justify-content: center;">
                    <a href="?id=0">
                        <h6>All</h6>
                    </a>
                </div>
                <?php
                while ($row = mysqli_fetch_assoc($req)) {
                ?>
                    <div class="cat_box <?php if ($id == $row['id_categorie']) echo 'active' ?>" style="justify-content: center;">
                        <a class="cat_type" href="?id=<?= $row['id_categorie'] ?>">
                            <?= $row['svg_icon_categorie'] ?>
                            <h6><?= $row['libelle'] ?></h6>
                        </a>
                    </div>
            <?php
                }
            }
            ?>
        </div>
        <?php
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
                    </div>
                    <p>Vous trouver içi tous ce que vous vouler !</p>
                </div>
                <div class="menu-content" id='plat'>
                    <?php
                }
                if (mysqli_num_rows($req) == 0) {
                    // 
                } else {
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
                                    <i class='bx bx-plus-circle bx-sm'></i>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
                </div>
    </section>
    <a href="#intro" class="sctrooL">
        <i class='bx bxs-up-arrow-circle bx-md'></i>
    </a>
    <?php
    include_once "./component/footer.php";

    include_once "./component/script.php";
    ?>
</body>

</html>