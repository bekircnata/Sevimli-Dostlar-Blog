<?php 
    require_once "Admin/pages/inc_fonksiyonlar.php";

    if(@$_POST["submit"]) {

        $isim = htmlspecialchars($_POST["isim"], ENT_QUOTES, "UTF-8");
        $email = htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8");
        $tel = htmlspecialchars($_POST["tel"], ENT_QUOTES, "UTF-8");
        $mesaj = htmlspecialchars($_POST["mesaj"], ENT_QUOTES, "UTF-8");

        $ekle = $db->prepare("INSERT INTO `iletisim` (`isim`, `email`, `tel`, `mesaj`) VALUES (:isim, :email, :tel, :mesaj)");
        $ekle->bindValue(":isim", $isim, PDO::PARAM_STR);
        $ekle->bindValue(":email", $email, PDO::PARAM_STR);
        $ekle->bindValue(":tel", $tel, PDO::PARAM_INT);
        $ekle->bindValue(":mesaj", $mesaj, PDO::PARAM_STR);

        if($ekle->execute()) {
            //Eğer Başarılıyla eklendiyse
            header("Location: iletisim.php?i=ok");
        }else {
            //Eğer hata oluştuysa
            header("Location: iletisim.php?i=hata");
        }
    }
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
    
    <main>
        <div class="container">
            
            <div class="sayfabasi">
            
                <p>İLETİŞİM</p>
        
            </div>

            

            <form action="iletisim.php#bildiri" method="POST" onsubmit="return isValid(this)">
            
                <p class="form-text">Lütfen formu doğru şekilde doldurunuz. Sizinle en kısa sürede iletişime geçeceğiz.</p>

                <label class="form-label">İsim Soyisim (*)</label>
                <input type="text" name="isim" class="form-item">

                <label class="form-label">E-mail adres(*)</label>
                <input type="email" name="email" class="form-item">

                <label class="form-label">telefon numarası (*)</label>
                <input type="telefon numarası" name="tel" class="form-item">

                <label class="form-label">Mesajınız (*)</label>
                <textarea type="text" name="mesaj" class="form-item"></textarea>

                <input type="submit" name="submit" class="btn btn-success btn-xl ilt-btn" value="Gönder">
                <div id="bildiri"></div>
                <?php
                
                    if(@$_GET["i"] == "ok") {
                        echo '<p class="text-center alert alert-success mt-5">Mesaj başarıyla gönderildi.</p>';
                    }elseif(@$_GET["i"] == "hata") {
                        echo '<p class="text-center alert alert-danger mt-5">Mesaj gönderilirken hata oluştu!</p>';
                    }

                ?>
            </form>

        </div>
    </main>


    <!--FOOTER-->

    <?php require_once "includes/inc_footer.php"?>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<script>

    function isValid(frm) {
        
        var isim = frm.isim.value;
        var email = frm.email.value;
        var tel = frm.tel.value;
        var mesaj = frm.mesaj.value;
        
        if(isim == null || isim == "") {
            alert("İsim Soyisim alanını boş bırakmayınız" );
            return false;
        }
        if(email == null || email == "") {
            alert("E-mail alanını boş bırakmayınız" );
            return false;
        }
        if(tel == null || tel == "") {
            alert("Telefon Numarası alanını boş bırakmayınız" );
            return false;
        }
        if(mesaj == null || mesaj == "") {
            alert("Mesaj alanını boş bırakmayınız" );
            return false;
        }

    }

</script>


</body>
</html>