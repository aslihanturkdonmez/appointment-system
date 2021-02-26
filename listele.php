<?php 
require_once ('mysqlbaglan.php');
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Randevularım</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
      body {
      background: #f5f8fa
      }
      @media(min-width: 1200px) {
      .container {
      max - width: 1200px;
      }
      }
      table, tr, td {



      border-collapse: collapse;

      padding: 10px;
      }
      .alan {
      width: 90px;
      }
      td {
      width: 30px;
      }

      .even {
      background-color:#FFF;
      }
      .odd {
      background-color:#e0e0eb;
      }
  </style>
</head>

<body>
<div style="margin: auto;">
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#3d3d5c;">
<div class="container-fluid" >
  <a class="navbar-brand" href="index.php">Karşıyaka Diş Hastanesi</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
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
      <li class="nav-item">
        <a class="nav-link" href="kayit.php">Hasta Kayıt</a>
      </li>
      &emsp;&emsp;&emsp;
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Oturumu Kapat
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="doktorcikis.php">Çıkış Yap</a>
        </div>
      </li>
      
    </ul>
  </div>
  </div>
</nav>


<div class="container-fluid">
<div class="col-md-11">
        <h1
          style="text-align:center; color:#fff; margin-top:2%; margin-left:35%; margin-right:23%; background-color:#8585ad; border-radius:50px">
          HASTA LİSTESİ</h1><br>
      </div>
        
  <table class="table table-hover" style="margin:auto; width:70%;" >
    <thead>

     <tr  class="odd"> 
     <th>Numara</th>
        <th>Ad</th>
        <th>Soyad</th>
        <th>TC No</th>
        <th>Doğum Tarihi</th>
        <th>Cinsiyet</th>
        <th>email</th>
        <th>Telefon</th>
        <th>Adres</th>
      </tr>
    </thead>
    <?php
    //Hastaları listeleme
    $hastaSor=$db->prepare("SELECT * from hasta");
    $hastaSor->execute();
    $say=0;
    while($hastaCek=$hastaSor->fetch(PDO::FETCH_ASSOC)){ $say++;

        if($say%2==0){
            $even="odd";
        }
        else{ $even="even";}

?>
    <tbody>

      <tr class=<?php echo $even?> style="border:0px;">
        <td><?php echo $say?></td>
        <td><?php echo $hastaCek["ad"] ?></td>
        <td><?php echo $hastaCek["soyad"] ?></td>
        <td><?php echo $hastaCek["tc_no"] ?></td>
        <td><?php echo $hastaCek["dogum_tarihi"] ?></td>
        <td><?php echo $hastaCek["cinsiyet"] ?></td>
        <td><?php echo $hastaCek["email"] ?></td>
        <td><?php echo $hastaCek["telefon"] ?></td>
        <td><?php echo $hastaCek["adres"] ?></td>
      </tr>

    </tbody>

    <?php }?>
  </table>

</div>

<div><br><br></div>
<div class="container-fluid">
<div class="col-md-11">
        <h1
          style="text-align:center; color:#fff; margin-top:2%; margin-left:35%; margin-right:23%; background-color:#8585ad; border-radius:50px">
          RANDEVU LİSTESİ</h1><br>
      </div>
        
  <table class="table table-hover" style="margin:auto; width:70%;" >
    <thead>

     <tr  class="odd"> 
        <th >NO</th>
        <th>&emsp;TC NO</th>
        <th>&emsp;&emsp;TARİH</th>
        <th>BİRİM</th>
        <th>AÇIKLAMA</th>
      </tr>
    </thead>
    <?php
    //Hastaları listeleme
    $hastaSor=$db->prepare("SELECT * from randevu ");
    $hastaSor->execute();
    $say=0;


    while($hastaCek=$hastaSor->fetch(PDO::FETCH_ASSOC)){ $say++;
        if($say%2==0){
            $even="odd";
        }
        else{ $even="even";}

?>
    <tbody>

      <tr class=<?php echo $even?> style="border:0px;">
      <td><?php echo $say?></td>
        <td><?php echo $hastaCek["tc_no"] ?></td>
        <td class="alan"><?php echo $hastaCek["tarih"] ?></td>
        <td><?php echo $hastaCek["birim"] ?></td>
        <td><?php echo $hastaCek["aciklama"] ?></td>
      </tr>

    </tbody>

    <?php }?>
  </table>

</div>
<div><br><br><br></div>

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