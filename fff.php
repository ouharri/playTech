<?php
include("pages/cnx.php");
session_start();
if(!isset($_SESSION["Email"]) || empty($_SESSION["Email"]) )
{
    header("location:index.php");
}
if(isset($_POST["submit_club"]))
{
    if(!empty($_POST["nom_club"]) && !empty($_POST["date_club"]) && !empty($_POST["description_club"]) && !empty($_FILES["image"]["name"]))
    {
        $nom_club=htmlspecialchars($_POST["nom_club"]);
        $date_club=htmlspecialchars($_POST["date_club"]);
        $description_club=htmlspecialchars($_POST["description_club"]);
        $logo_club=file_get_contents($_FILES["image"]["tmp_name"]);
        $Nom_exist="select * from club where Nom=?";
        $Nom_exist=$db->prepare($Nom_exist);
        $Nom_exist->execute([$nom_club]);
        if($Nom_exist->rowCount()==0)
        {
            $req="insert into club (Nom,Logo,Date,Description ) values (?,?,?,?)";
            $req=$db->prepare($req);
            $req->execute([$nom_club,$logo_club,$date_club,$description_club]);
        }else{
            $erreur="The club already exists!";
        }
        
    }else
    {
        $erreur="You must fill al the inputs";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <style>
        nav.navbar.navbar-expand-lg.bg-dark.bg-gradient {
        position: relative!important;
        --bs-bg-opacity: 100%!important;
        
        
        }       
        .form-label{
            text-align: center;
            width:100%
        }
        .p-5{
            margin-bottom: 2%;
            background-color: aliceblue;
        }
        .form_login {
            width: 100%!important;
        }
        
    </style>
        <link rel="stylesheet" href="style/style.css?v=<?php echo time(); ?>">
</head>
<body>
<!-- navbar -->
<?php include 'pages/navbar.php'; ?>
<!-- club discription -->
<div class="club_team">
<div class="content">
    <h1 class="content1">
        Team, Club, Group and Class Web Pages and Learning Tools
    </h1>
    </div>
<div class="content-wrapper">
        <div class="classes_groupe">
            <p class="text_club">Les classes et les groupes eChalk offrent aux enseignants, entraîneurs, directeurs de département et chefs de groupe une suite d'outils pour garder leurs membres connectés et informés. Les cours et les groupes comprennent des pages Web publiques et un intranet privé protégé par un mot de passe réservé aux membres. Les étudiants, les familles et le personnel peuvent suivre les actualités et les événements de toutes leurs classes, clubs, équipes et départements à partir de leur tableau de bord eChalk personnalisé.</p>
        </div>
        <div >
            <img src="images/classesgroups.png" alt="" class="classes">
        </div>
    </div>
    <div class="svg1"> <a href="#club" class="svgX"><svg class="svg1" width="100px" fill="none" stroke="currentColor" stroke-linecap="round"
        stroke-linejoin="round" stroke-width="3" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg " style="    cursor: pointer; 
margin-bottom: 40px;">
        <path d="m6 9 6 6 6-6"></path>
    </svg></a></div>
</div>

<!-- end discription -->
<!-- club -->
<div id="club" class="ajout_club">
    <div class="ajout_title"><h3>Ajout Club </h3></div>
            <div class="col-md-4 p-5 shadow-sm border ">
                <form class="form_login" method="POST" action="club.php" enctype="multipart/form-data">
                    <div style="color:red; text-align:center;"><?php if(isset($erreur)) echo $erreur; ?></div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Give the name of the Club:</label>
                        <input type="text" name="nom_club" class="form-control border border-primary" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Club name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Logo du Club:</label>
                        <input type="file" name="image" class="form-control border border-primary" id="exampleInputPassword1" placeholder="Club logo">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Club Logo:</label>
                        <input type="date" name="date_club" class="form-control border border-primary" id="exampleInputPassword1" placeholder="Date">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Club Description:</label>
                        <textarea class="form-control" name="description_club" id="exampleFormControlTextarea1" rows="3" placeholder="Club Discription..."></textarea>
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-primary" name="submit_club" type="submit">create club</button>
                    </div>
                </form>
            </div>
</div><!-- AjoutClubEnd -->

<!-- club end -->
<!-- link for pages -->
<a href="login.php" class="link-primary">login</a>
<a href="index.php" class="link-secondary">index</a>
<a href="club.php" class="link-success">club</a>
<a href="member.php" class="link-danger">member</a>
<a href="recherch.php" class="link-warning">recherch</a>
<!-- footer -->
<footer>

<div class="footer_text"><p><span class="yc-title-1">You</span><span class="yc-title-2">Code</span> © 2020</p></div>
<div class="footer_icone">
        <svg width="30" height="30" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
            stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M7 10v4h3v7h4v-7h3l1-4h-4V8a1 1 0 0 1 1-1h3V3h-3a5 5 0 0 0-5 5v2H7Z"></path>
        </svg>
        <svg width="30" height="30" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
            stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M16 4H8a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V8a4 4 0 0 0-4-4Z"></path>
            <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"></path>
            <path d="M16.5 7.5v.001"></path>
        </svg>
        <svg width="30" height="30" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
            stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M18 4H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2Z"></path>
            <path d="M8 11v5"></path>
            <path d="M8 8v.01"></path>
            <path d="M12 16v-5"></path>
            <path d="M16 16v-3a2 2 0 0 0-4 0"></path>
        </svg>
        <svg width="30" height="30" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
            stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="m8 20 4-9"></path>
            <path
                d="M10.7 13.998c.437 1.263 1.43 2 2.55 2 2.071 0 3.75-1.554 3.75-4a4.999 4.999 0 0 0-7.864-4.104A5 5 0 0 0 7.3 13.698">
            </path>
            <path d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Z"></path>
        </svg>
        </div>
    </footer>
    <!-- footer end -->

</body>
</html>