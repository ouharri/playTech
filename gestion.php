<?php
session_start();
$_SESSION['page'] = 'gestion';
if (isset($_SESSION['name']) && $_SESSION['admin'] == 1) {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- style css link  -->
        <link rel="stylesheet" href="./style/style.css?v=<?php echo time(); ?>">
        <title>PlayTech - Gestion</title>

        <!-- google font  link-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Poppins:ital,wght@0,100;0,200;0,300;1,300;1,400;1,800;1,900&display=swap" rel="stylesheet">

        <!-- font awesome link "icone" -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


        <!-- boxicon link -->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

        <!-- sweet alert  -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <!-- bootstrap link -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- meta data include -->
        <?php
        include "./component/header.php"
        ?>
    </head>

    <body>
        <!-- header (nav bar) -->
        <?php
        include_once "./component/header.php";
        ?>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <?php
        if (isset($_SESSION['ajouterpd'])) {
            echo $_SESSION['ajouterpd'];
            $_SESSION['ajouterpd'] = '';
        }
        ?>
        <section class="menu" id="intro">
            <?php
            include_once "./admin/afficher_categorie.php"
            ?>
            <?php
            include_once('./admin/afficher_produit.php');
            ?>
        </section>
        <a href="#intro" class="sctrooL">
            <i class='bx bxs-up-arrow-circle bx-md'></i>
        </a>
        <?php
        include_once "./component/script.php"
        ?>
    </body>

    </html>
<?php
} else {
    header("Location: ./connection");
    exit();
}
include_once "./component/footer.php"
?>