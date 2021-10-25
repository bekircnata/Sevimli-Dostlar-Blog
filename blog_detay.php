<?php 
    require_once "Admin/pages/inc_fonksiyonlar.php";
    @$id     =  intval($_GET["id"]);
    
    $cek     =  $db->prepare("SELECT * FROM `post` WHERE `id` = :id LIMIT 1 ");
    $cek     -> bindValue(":id", $id, PDO::PARAM_INT);
    $cek     -> execute();
    $row     =  $cek->fetch(PDO::FETCH_ASSOC);

    if($row["durum"]==0) {
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
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
<body class="detay-page">


    <!-- NAVBAR -->

    <?php require_once 'includes/inc_navbar.php'; ?>

    <main>       
            <div class="container">

                <div class="detay-image">
                    <img class="detay-image" src=" <?= $row["resim"] ?> ">
                </div>

                <div class="detay-body">
                    
                    <h3 class="detay-header">  <?= $row["baslik"] ?>  </h3>
                    
                    <div class="detay-text">
                        <?= htmlspecialchars_decode($row["aciklama"]) ?>
                    </div>

                </div>
                <div class="detay-footer">
                    <?= $row["tarih"] ?>
                </div>
                <hr>

        
            </div> 
    </main>




    <!--FOOTER-->

   <?php require_once "includes/inc_footer.php"; ?>
    
</body>
</html>