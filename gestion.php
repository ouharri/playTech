<?php 
session_start();

if (isset($_SESSION['name'])) {

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- style css link  -->
    <link rel="stylesheet" href="./style/style.css?v=<?php echo time(); ?>">
    <title>PlayTech</title>

    <!-- google font  link-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Poppins:ital,wght@0,100;0,200;0,300;1,300;1,400;1,800;1,900&display=swap" rel="stylesheet">

    <!-- font awesome link "icone" -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- boxicon link -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <!-- header (nav bar) -->
    <?php
    include_once "./component/header.php"
    ?>

    <section class="menu">
        <?php
        include_once "./admin/afficher_categorie.php"
        ?>

        <?php
        include_once('./admin/afficher_produit.php');
        ?>
    </section>

    <!-- java-script link -->
    <script src="./java_script/main.js"></script>
</body>

</html>
<?php 
}else{
     header("Location: ../index.php");
     exit();
}
 ?>