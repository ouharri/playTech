<?php
session_start();
if (isset($_SESSION['name'])) {

?>
        <!-- header (nav bar) -->
        <?php
        include_once "./component/header.php";
        include_once "./component/head-glo.php";

        ?>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <?php
        if (isset($_SESSION['ajouterpd'])) {
            echo $_SESSION['ajouterpd'];
            $_SESSION['ajouterpd'] = '';
        }
        ?>


        <section class="menu">
            <?php
            include_once "./admin/afficher_categorie.php"
            ?>

            <?php
            include_once('./admin/afficher_produit.php');
            ?>
        </section>

        <?php
        include_once "./component/script.php"
        ?>
    </body>

    </html>
<?php 

    }else{
    header("Location: /index.php");
    exit();
}
?>