<?php 

require_once ('mysqlbaglan.php');
session_start();
    //Hasta sec
    $hastaSor=$db->prepare("SELECT * from hasta where tc_no=:id");
    $hastaSor->execute(array(
        'id'=> @$_GET['tc_no']
    ));
    $hastaCek=$hastaSor->fetch(PDO::FETCH_ASSOC)

?>
<?php

if(isset($_POST['tarih']) && isset($_POST['aciklama'])){

    extract($_POST);

    if($tarih <= date('Y-m-d')){

            $mesaj="Geçmiş gün için randevu alınamaz! Lütfen gelmek istediğiniz tarihten en geç 1 gün önce randevu alınız..."; 
    }

    else{

    $sql="INSERT INTO `randevu`(tarih,aciklama,tc_no,birim)";
    $sql=$sql."VALUES('$tarih''$saat','$aciklama','$tc_no','$birim')";

        $cevap=mysqli_query($baglanti,$sql);

        //echo $sql;

        if($cevap){
            
            $mesaj="Randevunuz oluşturuldu. Geçmiş olsun...";
        }
        else {
            $mesaj="Randevu almak istediğiniz tarih dolu. Lütfen başka bir gün veya saat seçiniz.";
        }

} 
}

?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <title>Randevu Al</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        body {
            background: #f5f8fa
        }

        @media (min-width:1200px) {
            .container {
                max-width: 1200px;
            }
        }

    </style>

</head>

<?php
if(isset($mesaj)){
    ?>
    <script>
        alert("<?php echo $mesaj; ?>");
    </script>
    <?php
}

?>

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
                        <a class="nav-link" href="index.php">Anasayfa</a>
                    </li>
                    &emsp;&emsp;&emsp;
                    <li class="nav-item">
                        <a class="nav-link" href="anasayfa.php">Profil</a>
                    </li>
                    &emsp;&emsp;&emsp;
                    <li class="nav-item active">
                        <a class="nav-link" href="randevuolustur.php">Randevu Al <span
                                class="sr-only">(current)</span></a>
                    </li>
                    &emsp;&emsp;&emsp;
                    <li class="nav-item">
                        <a class="nav-link" href="randevularim.php">Randevularım</a>
                    </li>
                    &emsp;&emsp;&emsp;
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Çıkış Yap&ensp;
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
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="card shadow-lg p-3 mb-2 bg-body rounded"
                    style="margin-left:55%; width:30rem; margin-top:2%">
                    <div class="card-header bg-transparent border-dark ">
                        <h4 style="color: #350b40 ; text-align:center;">RANDEVU OLUŞTUR</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label"><h6>Tarih Seçiniz</h6></label>
                                <input type="date" id="date" name="tarih" class="form-control"
                                    placeholder="Tarih Seçiniz">
                            </div>
                            <div class="mb-3">

                                <label class="control-label" for="time"><h6>Saat Seçiniz</h6></label>
                                <select id="time" name="saat" class="form-control" style="width:250px">
                                    <option value="08:00" name="saat">08:00</option>
                                    <option value="08:30" name="saat">08:30</option>
                                    <option value="09:00" name="saat">09:00</option>
                                    <option value="09:30" name="saat">09:30</option>
                                    <option value="10:00" name="saat">10:00</option>
                                    <option value="10:30" name="saat">10:30</option>
                                    <option value="11:00" name="saat">11:00</option>
                                    <option value="11:30" name="saat">11:30</option>
                                    <option value="12:00" name="saat">12:00</option>
                                    <option value="13:00" name="saat">13:00</option>
                                    <option value="13:30" name="saat">13:30</option>
                                    <option value="14:00" name="saat">14:00</option>
                                    <option value="14:30" name="saat">14:30</option>
                                    <option value="15:00" name="saat">15:00</option>
                                    <option value="15:30" name="saat">15:30</option>
                                    <option value="16:00" name="">16:00</option>
                                    <option value="16:30" name="">16:30</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="control-label" for="birimm"><h6>Birim Seçiniz</h6></label>
                                <select class="form-control" name="birim">
                                    <option value="Endodonti">Endodonti</option>
                                    <option value="Ortodonti">Ortodonti</option>
                                    <option value="Periodontoloji">Periodontoloji</option>
                                    <option value="Pedodonti">Pedodonti</option>
                                    <option value="Diğer">Diğer</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label"><h6>Açıklama</h6></label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="aciklama"
                                placeholder="Gelmeden önce doktorunuza iletilmesini istediğiniz bir şey var mı?"></textarea>
                            </div>

                            <input type="hidden" name="tc_no" value="<?php echo @$_SESSION['tc_no']?>">
                            
                                    <button type="submit" name="insert" id="kayit" class="btn btn-dark" style="margin-left:32%; width:30%; height:33px; 
                                    padding:0px; background-color:#3d3d5c;">Randevu
                                        Al</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

     
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script> 


</body>

</html>