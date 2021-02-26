<?php 
require_once ('mysqlbaglan.php');
session_start();
if(!isset($_SESSION['tc_no'])){
    header("Location: giris.php");
    exit;
}
?>

<?php   require_once 'mysqlbaglan.php'; ?>
<!DOCTYPE html>
<html lang="tr">

<head>
  <title>Profil</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
  <style>
    .morButon {
      background: #fff;
      margin-top: 20px;
      padding: 20px 20px 0 20px;
    }

    .morButon li a:link,
    .morButon li a:visited {
      display: table;
      width: 100%;
      text-align: center;
      height: 100px;
      padding-left: 30px;
      padding-right: 30px;
      font-size: 22px;
      background-color: #3d3d5c;
      color: #666699;
      border-radius: 8px;
    }

    @media (max-width:767px) {

      .morButon li a:link,
      .morButon li a:visited {
        height: 80px;
        padding-left: 30px;
        padding-right: 30px;
        font-size: 20px;
      }
    }

    .morButon li a:hover,
    .morButon li a:active {
      color: #fff;
      background-color: rgba(250, 250, 250, 0.7);
      background: #3d3d5c;
    }

    .morButon li a span {
      display: table-cell;
      vertical-align: middle;
    }

    body {
      background: #f5f8fa
    }

    @media (min-width:1200px) {
      .container {
        max-width: 1200px;
      }
    }

    table,
    tr,
    td,
    th {
      border-collapse: collapse;
      border-radius: 20px;

      padding: 10px;
    }

    td {
      width: 50px;
    }

    .even {
      background-color: #fff;
    }

    .odd {
      background-color: #e0e0eb;
    }
  </style>

  <nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background-color: #3d3d5c;">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Karşıyaka Diş Hastanesi</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse w-100 order-3 dual-collapse2" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item ">
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
          <li class="nav-item">
            <a class="nav-link" href="kayit.php">Kayıt Ol</a>
          </li>
          &emsp;&emsp;&emsp;
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Çıkış Yap
              &ensp;
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="cikis.php">Oturumu Kapat</a>
            </div>
          </li>
          <li class="nav-item">&emsp;&ensp;</li>
        </ul>
      </div>
    </div>
  </nav>
  <?php
        
        $a=@$_SESSION['tc_no'];
        //Hastaları listeleme
        $hastaSor=$db->prepare("SELECT * from hasta where tc_no='$a'");
        $hastaSor->execute();
        $hastaCek=$hastaSor->fetch(PDO::FETCH_ASSOC)
?>

  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <section class="morButon" style="background:#f5f8fa; margin-top:45%">

          <ul class="list-unstyled">
            <li style="background:#c2c2d6; border-radius:20px; color: #666699;padding-left: 30px; text-align:center;
        padding-right: 30px;"><span style="font-size:30px;"> Hoşgeldin <?php echo $hastaCek["ad"]?>!<br> Sana hizmet
                verebildiğimiz için gurur duyuyoruz. <br></span></li>
          </ul>
        </section>
      </div>

      <div class="col-md-6">
        <h1 style="text-align:center; color:#fff; margin-top:11px; background-color:#8585ad; border-radius:50px">
          BİLGİLERİM</h1><br>

        <table class="table table-hover" style="margin:auto; width:68%; border-radius:20px;">

          <tr class="odd">
            <th scope="row">Ad</th>
            <td><?php echo $hastaCek["ad"] ?></td>
          </tr>
          <tr class="even">
            <th scope="row">Soyad</th>
            <td><?php echo $hastaCek["soyad"] ?></td>
          </tr>
          <tr class="odd">
            <th scope="row">TC No</th>
            <td><?php echo $hastaCek["tc_no"] ?></td>
          </tr>
          <tr class="even">
            <th scope="row">Doğum Tarihi</th>
            <td><?php echo $hastaCek["dogum_tarihi"] ?></td>
          </tr>
          <tr class="odd">
            <th scope="row">Cinsiyet</th>
            <td><?php echo $hastaCek["cinsiyet"] ?></td>
          </tr>
          <tr class="even">
            <th scope="row">E-mail</th>
            <td><?php echo $hastaCek["email"] ?></td>
          </tr>
          <tr class="odd">
            <th scope="row">Telefon</th>
            <td><?php echo $hastaCek["telefon"] ?></td>
          </tr>
          <tr class="even">
            <th scope="row">Adres</th>
            <td><?php echo $hastaCek["adres"] ?></td>
          </tr>
          <tr class="odd">
            <th scope="row" style="margin:auto;">İşlemler</th>
            <td> &ensp; <a href="guncelle.php?hasta_id=<?php echo $hastaCek['hasta_id']?>"> <button class="btn btn-dark"
                  style="background-color:#3d3d5c; border-radius:20px">Düzenle</button></a>
              <a href="hsil.php?hasta_id=<?php echo $hastaCek['hasta_id']?>&hastasill=ok"> <button class="btn btn-dark"
                  style="background-color:#3d3d5c; border-radius:20px">Hesabı Sil</button></a></td>
        </table>
      </div>
      <div class="col-md-3">
        <section class="morButon" style="background:#f5f8fa;margin-top:50%">
          <ul class="list-unstyled">
            <li><a href="randevularim.php" class="Randevularım insdr-insight-10-9"
                style="background:#c2c2d6;"><span>RANDEVULARIM</span></a></li>
          </ul>

          <ul class="list-unstyled">
            <li><a href="randevuolustur.php" class="RandevuAl" style="background:#c2c2d6;"><span>RANDEVU
                  AL</span></a></li>
          </ul>
        </section>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
  </script>
</body>

</html>
