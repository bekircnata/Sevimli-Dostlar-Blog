<?php 
    require_once "Admin/pages/inc_fonksiyonlar.php";

    $cek     =  $db->prepare("SELECT * FROM `hakkimizda` ");
    $cek     -> execute();
    $row     =  $cek->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="tr-TR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Contetn-Language" content="tr">
    <meta name="Robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    <meta name="revisit-after" content="7 Days">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <!-- CSS -->
    <link rel="stylesheet" href="blog_style.css">
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">  
    <!-- FAV-İCON -->
    <link type="image/png" rel="icon" href="image/fav-icon.png">
    <script src="https://kit.fontawesome.com/ea5f3cb1db.js" crossorigin="anonymous"></script>
    <!--FONTLAR-->
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Noto+Serif&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <title>Sevimli Dostlar</title>

</head>
<body>
    
    <!-- NAVBAR -->

    <?php require_once 'includes/inc_navbar.php'; ?>
    
    <main class="hakkimizda-page">

        <div class="container">

            <div class="sayfabasi">
            
                <p>HAKKIMIZDA</p>
        
            </div>
        
            <div class="hakkimizda-icon">

               <img src="image/fav-icon.png">
               <h4>SEVİMLİ DOSTLAR</h4>

            </div>

            <hr>

            <div class="hakkimizda-body">

                <div class="hakkimizda-text">
                    <?= htmlspecialchars_decode($row["aciklama"]) ?>
                </div>

            </div>

        </div>

    </main>


    <!--FOOTER-->

   <?php require_once "includes/inc_footer.php"; ?>
    
</body>
</html>