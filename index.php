<?php 
    require_once "Admin/pages/inc_fonksiyonlar.php";
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

    <!--SLİDER-->

    <section id="slider">
        <div class="container">

                <div id="anaCarousel" class="carousel slide" data-ride="carousel">

                    <ol class="carousel-indicators">
                        <li data-target="#anaCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#anaCarousel" data-slide-to="1"></li>
                        <li data-target="#anaCarousel" data-slide-to="2"></li>
                        <li data-target="#anaCarousel" data-slide-to="3"></li>
                    </ol>

                    <div class="carousel-inner">

                        <div class="carousel-item active">
                            <img class="d-block w-100 carouse-img" src="image/slider_1.jpeg" />
                        </div>

                        <div class="carousel-item ">
                            <img class="d-block w-100 carouse-img" src="image/slider_2.jpg" />
                        </div>

                        <div class="carousel-item ">
                            <img class="d-block w-100 carouse-img" src="image/slider_3.jpg" />
                        </div>

                        <div class="carousel-item ">
                            <img class="d-block w-100 carouse-img" src="image/slider_4.jpg" />
                        </div>

                    </div>

                    <a href="#anaCarousel" class="carousel-control-prev" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>

                    <a href="#anaCarousel" class="carousel-control-next" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>

                </div>

            </div>
    </section>

    <!--İCERİKLERİN ÇEKİLDİĞİ ALAN -->

    <main>

        <section>

            <div id="anasayfa" class="container">

                <div class="row">
        
                    <!--POST KISMI-->
        
                    <div class="col-md-8">

                        <div class="row">    
                            
                            <?php

                                @$kelime = $_GET["search"];
                                @$kategori=$_GET["kategori"];

                                if($kelime != ""){
                                    //Eğer arama yapıldıysa aramaya uygun kayıtları çek
                                    $cek = $db->prepare("SELECT * FROM `post` WHERE `durum` = :durum && `baslik` LIKE :aranan ORDER BY `id` DESC ");
                                    $cek->bindValue(":durum", 1, PDO::PARAM_INT);
                                    $cek->bindValue(":aranan", "%$kelime%", PDO::PARAM_STR);
                                }
                                elseif($kategori != "") {
                                    $cek=$db->prepare("SELECT * FROM `post` WHERE `kategori` = :kategori ORDER BY `id` DESC ");
                                    $cek->bindValue(":kategori", $kategori, PDO::PARAM_STR);
                                }
                                else {
                                    //Eğer arama yapılmadıysa varsayılan kayıtları çek
                                    $cek = $db->prepare("SELECT * FROM `post` WHERE `durum` = :durum ORDER BY `id` DESC ");
                                    $cek->bindValue(":durum", 1, PDO::PARAM_INT);
                                }
                                $cek -> execute();
                                while($row = $cek -> fetch(PDO::FETCH_ASSOC)) {
                                    ?>

                                        <div class="col-md-6 post">                           
                                            <div class="post-image">
                                                <img class="post-image" src=" <?= $row["resim"] ?> ">
                                            </div>       
                                            <div class="post-footer">
                                                    <?= $row["tarih"] ?>
                                            </div>   
                                            <div class="post-content">       
                                                <div class="post-title">        
                                                    <h4>
                                                        <a> <?= $row["baslik"] ?> </a>
                                                    </h4>        
                                                </div>        
                                                <div class="post-text">        
                                                    <?php echo htmlspecialchars_decode(substr($row["aciklama"], 0,300 )) ?>...        
                                                </div>     

                                                <a type="button" class="btn btn-success post-button" href="blog_detay.php?id=<?= $row["id"] ?> ">Devamını oku</a>
        
                                            </div>                           
                                        </div>

                                    <?php
                                }
                            ?>


                              
                        </div>
        
                    </div>

                    <!--SAĞ KISIM-->

                    <div class="col-md-4">

                            <!--ARAMA KISIMI-->

                        <div class="card mt-4">

                            <div class="card-header">               
                                <h4>Arama</h4>                   
                            </div>

                            <div class="card-body">

                                <form action="index.php" method="get"  class="form-inline d-flex justify-content-center md-form form-sm mt-0">
                                    <input name="search" class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Ara..."
                                        aria-label="Search">
                                    <i class="fas fa-search ml-2" aria-hidden="true"></i>
                                </form>
                            </div>

                        </div>

                        <!--KATEGORİ KISMI-->

                        <div class="card mt-4">
                            <div class="card-header">               
                                <h4>Kategori</h4>                   
                            </div>    
                            <div class="card-body">    
                                <ul class="list-unstyled kategori-list">    
                                    <li class="card-item kategori-list-item">
                                        
                                        <?php
                                            $cek    =   $db->prepare("SELECT * FROM `kategori` ORDER BY `id`");
                                            $cek    ->  execute();
                                            while($row = $cek -> fetch(PDO::FETCH_ASSOC)){
                                                ?>
                                                    <a href="index.php?kategori=<?= $row["kategori"]?>" class="list-link"> <?= $row["kategori"]?> </a>
                                                <?php
                                            }
                                        
                                        ?>
                                        
                                    </li>   
                                </ul>    
                            </div>                    
                        </div>    

                    </div>               
                </div>

                <hr>  

                <div class="card mt-4">

                    <div class="card-header">               
                        <h4>Veterinerler</h4>                   
                    </div>

                    <div class="card-body">
                        <iframe src="https://www.google.com/maps/d/embed?mid=1r6xaQTF28m95Z08zdUPZ_DO_JU1nSZf0" width="100%" height="480"></iframe>
                    </div>

                </div>  

            </div>
        </section>

    </main>

    <!--FOOTER-->

   <?php require_once "includes/inc_footer.php"?>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>




</body>
</html>