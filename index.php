<?php 

    session_start();
    require('mysqlbaglan.php');

        ?>

<!DOCTYPE html>
<html lang="tr">

<head>
  <title>Karşıyaka Diş</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
    body {
      background: #f5f8fa;

    }

    @media(min-width: 1200px) {
        .container {
          max-width: 1200px;
        }
      }

      .footer {
        background: #3d3d5c;

      height: auto;

      padding-bottom: 30px;

      position: relative;

      width: 100%;

      border-bottom: 1px solid #CCCCCC;
        border-top: 1px solid#DDDDDD;
        margin-top: 50px;
        font-family: cursive;
      }

      .footer h3 {
        color: white;
        font-size: 18px;
        font-weight: 600;
        line-height: 27px;
        padding: 40px 0 0px;
        text-transform: uppercase;
        margin-bottom: 15px;
      }

      .footer h4 {
        color: white;
        font-size: 2em;
        font-weight: 600;
        line-height: 38px;
        padding: 40px 0 10px;
        font-family: cursive;
        font-weight: lighter
      }

      .footer ul {
        font-size: 13px;
        list-style-type: none;
        margin-left: 0;
        padding-left: 0;
        margin-top: 0px;
        color: #7F8C8D;

      padding: 0 0 8px 0;

    }



    .footer ul li a {

      padding: 0 0 12px 0;

      display: block;

    }



    .footer a {

      color: white;

      font-weight: lighter;

    }



    .footer p {

      color: white;

      font-weight: lighter;

    }



    .footer a:hover {

      text-decoration: none;

      font-weight: bold;

    }



    .footer a {

      color: #78828D
      }

      .morButon {
        background: #fff;
        margin-top: 20px;
        padding: 20px 20px 0 20px;
      }

      .morButon li a:link,
      .morButon li a:visited {
        display: table;
        width: 100% ;
        text-align: center;
        height: 100px;
        padding-left: 30px;
        padding-right: 30px;
        font-size: 22px;
        background-color: #3d3d5c;

      color: #666699;
        border-radius: 8px;
      }

    @media(max-width: 767px) {

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



    .morButon li:first-child {

      margin-bottom: 20px;

    }

    .morButon li {

      list-style-type: none !important;

      list-style-position: inside;

    }

    body {

      text-align: center;

    }

    .icons {

      display: inline-flex;

      justify-content: center;

    }

    .icons i {

      padding: 10px;

    }



    .icons a:nth-child(1) {

      color: #4285F4;
      }

      .icons a:nth-child(2) {
        color: #0072b1;

    }



    .icons a:nth-child(3) {

      color: transparent;

      background: radial-gradient(circle at 30% 107%, #fdf497 0% ,
        #fdf497 5% ,
        #fd5949 45% ,
        #d6249f 60% ,
        #285AEB 90%);

      background: -webkit-radial-gradient(circle at 30% 107%, #fdf497 0% ,
        #fdf497 5% ,
        #fd5949 45% ,
        #d6249f 60% ,
        #285AEB 90%);

      background-clip: text;

      -webkit-background-clip: text;

    }



    .icons a:nth-child(4) {

      color: #211F1F;
      }

      .icons i:hover {
        margin-top: -3px;
        text-shadow: 0px 14px 10px rgba(0, 0, 0, 0.4);
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
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Anasayfa <span class="sr-only">(current)</span></a>
          </li>
          &emsp;&emsp;&emsp;
          <li class="nav-item">
            <a class="nav-link" href="#hakkimizda">Hakkımızda</a>
          </li>
          &emsp;&emsp;&emsp;
          <li class="nav-item">
            <a class="nav-link" href="#iletisim">İletişim</a>
          </li>
          &emsp;&emsp;&emsp;
          <li class="nav-item">
            <a class="nav-link" href="anasayfa.php">Profil</a>
          </li>
          &emsp;&emsp;&emsp;
          <li class="nav-item">
            <a class="nav-link" href="kayit.php">Kayıt Ol</a>
          </li>
          &emsp;&emsp;&emsp;
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Giriş Yap
              &ensp;
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="giris.php">Hasta Giriş</a>
              <a class="dropdown-item" href="doktorgiris.php">Doktor Giriş</a>
            </div>
          </li>
          <li class="nav-item">&emsp;&ensp;</li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="row">
      <div class="col">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="images/hastane.jpg" class="d-block w-100" alt="..." height="535px">
            </div>
            <div class="carousel-item">
              <img src="images/h2.jpg" class="d-block w-100" alt="..." width="1920px" height="535px">
            </div>
            <div class="carousel-item">
              <img src="images/dr3.jpg" class="d-block w-100" alt="..." height="535px">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </div>

  <section class="morButon" style="background:#f5f8fa;">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12">
          <ul class="list-unstyled">
            <li><a href="giris.php" class="morButon1" style="background:#c2c2d6;"><span>Giriş
                  Yap</span></a></li>
          </ul>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
          <ul class="list-unstyled">
            <li><a href="kayit.php" class="morButon2" style="background:#c2c2d6;"><span>Kayıt Ol</span></a></li>
          </ul>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
          <ul class="list-unstyled">
            <li>
              <a href="#" class="morButon3" style="background:#c2c2d6;">
                <span>Staj Başvuru</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <div class="container">
    <div class="row">
      <div class="col-lg-8" id="hakkimizda">

        <hr>
        <h2>Dişiniz size iş çıkartıyorsa, gelin biz işimizi yapalım!</h2>

        <hr>
        <img class="img-responsive" src="" alt="">
        <hr>

        <p class="lead">Yoksa siz İzmir'in en iyi diş hastanesiyle tanışmadınız mı? </p>

        <p>Karşıyaka Diş Hastanesi olarak 2015 yılında İzmir'de hizmet vermeye başladık. Kurulduğumuz günden bu zamana
          kadar yenilikçiliğe ve gelişime açık
          bir tutum sergiledik. </p>
        <p>Son teknoloji cihazlarla hizmet sunan hastanemizde, sizlerin memnuniyetini en önemli ilkemiz haline getirdik.
          Gün geçtikçe büyüyen Karşıyaka Diş ailesinin tüm hekimleri alanında uzmanlaşmış ve tecrübe sahibidir. Toplam
          300 kişilik kadromuzla 7/24 hizmete açığız. </p>
        <p>Sosyal yardımlaşma kuruluşları ile iç içe olan hastanemiz, birçok hastaya ücretsiz tedavi imkanı vermektedir.
        </p>
        <p>Güvenilirlik, Topluma Duyarlılık, Müşteri Duyarlılığı, Yenilikçilik ve Mükemmelliyetçilik ilkelerimiz ile
          sizlere hizmet vermeye devam edeceğiz..</p>

        <hr>
      </div>

      <div class="col-md-4">
        <br><br><br><br>
        <div class="card bg-light"> <br><br>
          <h4 align="center">Diş Rahatsızlıkları</h4><br>
          <div class="row">
            <div class="col-lg-6">
              <ul class="list-unstyled">
                <li>
                  <h6>Diş Çürükleri</h6>
                </li>
                <li>
                  <h6>Diş Eti Kanaması</h6>
                </li>
                <li>
                  <h6>Ağız Kokusu </h6>
                </li>
                <li>
                  <h6>Diş Gıcırdatma </h6>
                </li>
                <li>
                  <h6>Çene Kistleri</h6><br>
                </li>
              </ul>
            </div> <br><br>
            <div class="col-lg-6">
              <ul class="list-unstyled">
                <li>
                  <h6>Diş Ağrısı</h6>
                </li>
                <li>
                  <h6>Diş ve Diş eti hastalıkları</h6>
                </li>
                <li>
                  <h6>Diş Eksikliği <br></h6>
                </li>
                <li>
                  <h6>Diş Çapraşıklığı</h6><br> <br>
                </li>
              </ul>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>

  <footer class="page-footer font-small unique-color-dark" style="background: #3d3d5c;">
    <div style="background-color: #c2c2d6;">
      <div class="container">
        <div class="row py-4 d-flex align-items-center">
          <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
            <h6 class="mb-0" align="center">Sosyal medyadan bize ulaşın!</h6>
          </div>

          <div class="icons" align="center">
            <a target="_blank" href="mailto: aslihanturkdonmez@gmail.com"><i class="fa fa-envelope fa-3x"></i></a>

            <a target="_blank" href="https://www.linkedin.com/in/aslihan-turkdonmez/"><i
                class="fa fa-linkedin-square fa-3x"></i></a>

            <a target="_blank" href="https://www.instagram.com/asliturkdonmez/"><i
                class="fa fa-3x fa-instagram"></i></a>

            <a target="_blank" href="https://github.com/aslihanturkdonmez"><i class="fa fa-github-square fa-3x"></i>
          </div></a>
        </div>

      </div>
    </div>

    <div class="container text-center text-md-left mt-5">

      <div class="row mt-3">
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <h6 class="text-uppercase font-weight-bold" style="color:white;">Karşıyaka Diş Hastanesi</h6>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p style=" color:#c2c2d6;">Diş tedavisi,diş bakım ve onarımı, diş estetiği gibi konularda sorularınız için
            bize ulaşabilirsiniz. </p>
        </div>


        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <h6 class="text-uppercase font-weight-bold" style="color:white;">Ürünler</h6>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p style=" color:#c2c2d6;">
            Diş İpi<br>
            Diş eti koruma losyonu <br>
            Kişiye özel diş fırçası <br>
            Kişiye özel diş macunu
          </p>
        </div>


        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

          <h6 class="text-uppercase font-weight-bold" style="color:white;">Linkler</h6>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>
            <a href="anasayfa.php">Hesabınız</a>
          </p>
          <p>
            <a href="#!">Satiş Ortağı Olun</a>
          </p>
          <p>
            <a href="#!">Yardım</a>
          </p>

        </div>


        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4" style="color:white;">


          <h6 class="text-uppercase font-weight-bold" id="iletisim">İletişim</h6>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p style="color:#c2c2d6;">
            <i class="fas fa-home mr-3" style=" color:#c2c2d6;"></i> Cemal Gürsel Caddesi, 2023. Sk. 35590
            Karşıyaka/İzmir, Türkiye</p>
          <p style="color:#c2c2d6;">
            <i class="fas fa-envelope mr-3" style=" color:#c2c2d6;"></i> karsiyakadis@gmail.com</p>
          <p style="color:#c2c2d6;">
            <i class="fas fa-phone mr-3" style=" color:#c2c2d6;"></i> 0 (232) 369 36 36</p>
        </div>
      </div>
    </div>


    <div class="footer-copyright text-center py-3" style="color:#c2c2d6;">© 2020 Copyright:
      <a href="index.php"> KarsiyakaDis.com</a>
    </div>
  </footer>

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
