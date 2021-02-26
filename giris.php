<?php 

    session_start();
    require('mysqlbaglan.php');
    if(isset($_POST['tc_no']) and isset($_POST['sifre'])) {
        extract($_POST);

        $sifre=hash('sha256',$sifre);
        $sql="SELECT * FROM `hasta` WHERE ";
        $sql=$sql."tc_no='$tc_no' and sifre='$sifre'";
        $cevap=mysqli_query($baglanti,$sql);

        //Eger cevap FALSE ise hata yazdır.
        if(!$cevap){
            echo '<br>Hata:'.mysqli_error($baglanti);
        }

        //veritabanından dönen satır sayısını bul.
        $say=mysqli_num_rows($cevap);
        if($say==1){
            $_SESSION['tc_no']=$tc_no;

        } else {
            
            $mesaj="HATALI TC NO veya ŞİFRE!";
        }
    }
 if(isset($_SESSION['tc_no'])) {
      header("Location: anasayfa.php");
   } else {
        //oturum yok ise giris formu görüntüle

        ?>

<!DOCTYPE html>
<html lang="tr">

<head>
  <title>Giriş Yap</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
    body {
      background: #f5f8fa;
    }

    @media (min-width:1200px) {
      .container {
        max-width: 1200px;
      }
    }
  </style>
</head>

<body>

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
            <a class="nav-link" href="index.php">Anasayfa </a>
          </li>
          &emsp;&emsp;&emsp;
          <li class="nav-item">
            <a class="nav-link" href="index.php#hakkımızda">Hakkımızda</a>
          </li>
          &emsp;&emsp;&emsp;
          <li class="nav-item">
            <a class="nav-link" href="index.php#iletisim">İletişim</a>
          </li>
          &emsp;&emsp;&emsp;
          <li class="nav-item">
            <a class="nav-link" href="kayit.php">Kayıt Ol</a>
          </li>
          &emsp;&emsp;&emsp;
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" role="button"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Giriş Yap &ensp;<span class="sr-only">(current)</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="giris.php">Hasta Girişi</a>
              <a class="dropdown-item" href="doktorgiris.php">Doktor Girişi</a>
            </div>
          </li>
          <li class="nav-item">&emsp;&ensp;</li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container" style="margin-top: 6%">
    <div class="row justify-content-center">
      <div class="col-md-5">
        <div class="card shadow-lg p-3 mb-5 bg-body rounded">
          <div class="card-header bg-transparent border-dark ">
            <h3 style="color: #3d3d5c ; margin-left: 30%">Hasta Girişi</h3>
          </div>
          <div class="card-body">
            <form class="" action="<?php $_PHP_SELF ?>" method="POST">

              <?php
                if(isset($mesaj)){
              ?>
              <script>
                alert("<?php echo $mesaj; ?>");
              </script>
              <?php
                }
              ?>
              <div class="mb-3">
                <label for="" class="form-label" style="color: black">
                  <h6>T.C. NO</h6>
                </label>
                <input type="text" class="form-control" name="tc_no" required placeholder="TC NO">
              </div>
              <div class="mb-3">
                <label for="" class="form-label" style="color: black;">
                  <h6>ŞİFRE</h6>
                </label>
                <input type="password" class="form-control" name="sifre" required placeholder="ŞİFRE">
              </div>
              <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1" style="color:black;">Beni Hatırla</label>
              </div>

              <input type="submit" class="btn btn-dark" style="margin-left:35%; background-color:#3d3d5c"
                value="Giriş Yap">
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>
<?php
 }
     ?>
