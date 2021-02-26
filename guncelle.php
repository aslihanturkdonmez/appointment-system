<?php
ob_start();
require_once ('mysqlbaglan.php');
    $hastaSor=$db->prepare("SELECT * from hasta where hasta_id=:id");
    $hastaSor->execute(array(
        'id'=> @$_GET['hasta_id']
    ));
    $hastaCek=$hastaSor->fetch(PDO::FETCH_ASSOC)
    ?>

<!doctype html>
<html lang="tr">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        @import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);

        body {
            background: #f5f8fa
        }

        @media (min-width:1200px) {
            .container {
                max-width: 1200px;
            }
        }

        .main {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }
    </style>
    <title>Düzenle</title>
</head>

<body>


    <script>
        function tckimlikkontrolu(tcno) {
            var tckontrol, toplam;
            tckontrol = tcno;
            tcno = tcno.value;
            toplam = Number(tcno.substring(0, 1)) + Number(tcno.substring(1, 2)) +
                Number(tcno.substring(2, 3)) + Number(tcno.substring(3, 4)) +
                Number(tcno.substring(4, 5)) + Number(tcno.substring(5, 6)) +
                Number(tcno.substring(6, 7)) + Number(tcno.substring(7, 8)) +
                Number(tcno.substring(8, 9)) + Number(tcno.substring(9, 10));
            strtoplam = String(toplam);
            onunbirlerbas = strtoplam.substring(strtoplam.length, strtoplam.length - 1);

            if (onunbirlerbas == tcno.substring(10, 11)) {
                document.getElementById("kayit").disabled = false;

            } else {
                document.getElementById("kayit").disabled = true;
                alert("TC No hatalı. Lütfen Geçerli bir kimlik numarası giriniz..");

            }

        }
    </script>

    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #3d3d5c;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Karşıyaka Diş Hastanesi</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse w-100 order-3 dual-collapse2" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Anasayfa</a>
                    </li>
                    &emsp;&emsp;&emsp;
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#hakkimizda">Hakkımızda</a>
                    </li>
                    &emsp;&emsp;&emsp;
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#iletisim">İletişim</a>
                    </li>
                    &emsp;&emsp;&emsp;
                    <li class="nav-item active">
                        <a class="nav-link" href="anasayfa.php">Profil <span class="sr-only">(current)</span></a>
                    </li>
                    &emsp;&emsp;&emsp;
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Çıkış Yap&ensp;
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="cikis.php">Hasta Giriş</a>
                        </div>
                    </li>
                    <li class="nav-item">&emsp;&emsp;</li>
                </ul>
            </div>
        </div>
    </nav>


    <main class="main">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow-lg p-3 mb-5 bg-body rounded">
                        <div class="card-header bg-transparent border-dark ">
                            <h3 style="color: #350b40 ; text-align:center;">Bilgileri Düzenle</h3>
                        </div>
                        <div class="card-body">
                            <form name="form" action="<?php $_PHP_SELF ?>" method="POST">
                                <div class="form-group row">
                                    <label for="ad" class="col-md-4 col-form-label text-md-right">Ad </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="ad" placeholder="Ad" required=""
                                            value="<?php echo $hastaCek['ad']?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="soyad" class="col-md-4 col-form-label text-md-right">Soyad</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="soyad" placeholder="Soyad"
                                            required="" value="<?php echo $hastaCek['soyad']?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="tc" class="col-md-4 col-form-label text-md-right">TC NO</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="tc_no" maxlength="11"
                                            onblur=tckimlikkontrolu(this) placeholder="TC NO" required=""
                                            value="<?php echo $hastaCek['tc_no']?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="mail" class="col-md-4 col-form-label text-md-right">E-mail</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="email"
                                            placeholder="_____@gmail.com" required=""
                                            value="<?php echo $hastaCek['email']?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="prarola" class="col-md-4 col-form-label text-md-right">Şifre</label>
                                    <div class="col-md-6">
                                        <input type="password" class="form-control" name="sifre" placeholder="Şifre"
                                            required="" value="<?php echo $hastaCek['sifre']?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone_number"
                                        class="col-md-4 col-form-label text-md-right">Telefon</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="telefon"
                                            placeholder="XXX XXX XX XX" maxlength="12" required=""
                                            value="<?php echo $hastaCek['telefon']?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="bdate" class="col-md-4 col-form-label text-md-right"> Doğum
                                        Tarihi</label>
                                    <div class="col-md-6">
                                        <input type="date" class="form-control" name="dogum_tarihi"
                                            placeholder="Doğum Tarihi" required=""
                                            value="<?php echo $hastaCek['dogum_tarihi']?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="permanent_address"
                                        class="col-md-4 col-form-label text-md-right">Adres</label>
                                    <div class="col-md-6">
                                        <textarea class="form-control" name="adres" required="" placeholder="Adres"
                                            cols="30" rows="5" value=""><?php echo $hastaCek['adres']?></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="bdatee" class="col-md-4 col-form-label text-md-right">Cinsiyet</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="cinsiyet">
                                            <option value="Belirtilmedi">Seçiniz</option>
                                            <option value="Kadın">Kadın</option>
                                            <option value="Erkek">Erkek</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8" align="" style="margin-left:44%">
                                        <button type="submit" class="btn btn-dark" name="updateislemi" id="kayit"
                                            style="background-color:#3d3d5c">
                                            Güncelle
                                        </button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>

<?php

//3
if(isset($_POST["updateislemi"])){

    $hasta_id=$_GET['hasta_id'];
    $kaydet=$db-> prepare("UPDATE hasta set

    ad=:ad,
    soyad=:soyad,
    tc_no=:tc_no,
    email=:email,
    sifre=:sifre,
    telefon=:telefon,
    adres=:adres,
    dogum_tarihi=:dogum_tarihi,
    cinsiyet=:cinsiyet
    where hasta_id={$_GET['hasta_id']}


    ");

    $insert=$kaydet->execute(array(

        'ad'=> $_POST['ad'],
        'soyad'=> $_POST['soyad'],
        'tc_no'=> $_POST['tc_no'],
        'email'=> $_POST['email'],
        'sifre'=> $_POST['sifre'],
        'telefon'=> $_POST['telefon'],
        'adres'=> $_POST['adres'],
        'dogum_tarihi'=> $_POST['dogum_tarihi'],
        'cinsiyet'=> $_POST['cinsiyet']
    ));

    //ekleme başarılı mı
    //geri döndürme
    if($insert){

      //  echo "basarili";
      Header("Location:guncelle.php?durum=ok&hasta_id=$hasta_id");
       exit;

    }
    // else echo "kayıt basarisiz";
    else {

        Header("Location:guncelle.php?durum=no&hasta_id=$hasta_id");
        exit;
    }
}
?>