<?php 

require_once ('mysqlbaglan.php');

    if(isset($_POST['tc_no']) && isset($_POST['sifre'])){

        extract($_POST);
        //sifre metni SHA256 ile sifreleniyor.
        $sifre=hash('sha256',$sifre);

        $sql="INSERT INTO `hasta`(tc_no,sifre,email,ad,soyad,telefon,cinsiyet,adres,dogum_tarihi)";
        $sql=$sql."VALUES('$tc_no','$sifre','$email','$ad','$soyad','$telefon','$cinsiyet','$adres','$dogum_tarihi')";

            $cevap=mysqli_query($baglanti,$sql);
            //echo $sql;

            if($cevap){
                $mesaj="Hasta Kaydı Yapıldı.";
            }
            else {
                $mesaj="Hasta kaydı oluşturulamadı! T.C. kimlik numaranıza dikkat ediniz.";
            }
    } 
?>


<!doctype html>
<html lang="tr">

<head>
    <title>Kayıt Ol</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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


    <nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background-color: #3d3d5c;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Karşıyaka Diş Hastanesi</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse w-100 order-3 dual-collapse2" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Anasayfa </a>
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
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Kayıt Ol<span class="sr-only">(current)</span></a>
                    </li>
                    &emsp;&emsp;&emsp;
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Giriş Yap&ensp;
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="giris.php">Hasta Giriş</a>
                            <a class="dropdown-item" href="doktorgiris.php">Doktor Giriş</a>
                        </div>
                    </li>
                    <li class="nav-item">&emsp;&emsp;</li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="col-md-7" style="margin:auto; text-size:5px;">
        <?php
if(isset($mesaj)){
    ?>
        <script>
            alert("<?php echo $mesaj; ?>");
        </script>
        <?php
}
?>
    </div>

    <main class="main">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow-lg p-3 mb-5 bg-body rounded">
                        <div class="card-header bg-transparent border-dark ">
                            <h3 style="color: #350b40 ; text-align:center;">Hesap Oluştur</h3>
                        </div>
                        <div class="card-body">
                            <form name="form" action="<?php $_PHP_SELF ?>" method="POST">
                                <div class="form-group row">
                                    <label for="ad" class="col-md-4 col-form-label text-md-right">Ad </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="ad" placeholder="Ad" required="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="soyad" class="col-md-4 col-form-label text-md-right">Soyad</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="soyad" placeholder="Soyad"
                                            required="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="parola" class="col-md-4 col-form-label text-md-right">TC NO</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="tc_no" maxlength="11"
                                            onblur=tckimlikkontrolu(this) placeholder="TC NO" required="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="mail" class="col-md-4 col-form-label text-md-right">E-mail</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="email"
                                            placeholder="_____@gmail.com" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="prarola" class="col-md-4 col-form-label text-md-right">Şifre</label>
                                    <div class="col-md-6">
                                        <input type="password" class="form-control" name="sifre" placeholder="Şifre"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone_number"
                                        class="col-md-4 col-form-label text-md-right">Telefon</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="telefon"
                                            placeholder="XXX XXX XX XX" maxlength="12" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="bdate" class="col-md-4 col-form-label text-md-right"> Doğum
                                        Tarihi</label>
                                    <div class="col-md-6">
                                        <input type="date" class="form-control" name="dogum_tarihi"
                                            placeholder="Doğum Tarihi" required="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="permanent_address"
                                        class="col-md-4 col-form-label text-md-right">Adres</label>
                                    <div class="col-md-6">
                                        <textarea class="form-control" name="adres" required="" placeholder="Adres"
                                            cols="30" rows="5"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="bdate" class="col-md-4 col-form-label text-md-right">Cinsiyet</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="cinsiyet">
                                            <option value="Belirtilmedi">Seçiniz</option>
                                            <option value="Kadın">Kadın</option>
                                            <option value="Erkek">Erkek</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6" style="margin-left:33%;">
                                        <div class="input-group-text" id="btnGroupAddon" style="padding-left:20%">
                                            <a href="giris.php" id="girisButon" style="color: #b34180;"
                                                onmouseover="this.style.color='#845ec2'"
                                                onmouseout="this.style.color='#b34180'">Hesabınız var mı?</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8" align="" style="margin-left:44%">
                                        <button type="submit" class="btn btn-dark" id="kayit"
                                            style="background-color:#3d3d5c">
                                            Kayıt Ol
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