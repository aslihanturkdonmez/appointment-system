<?php 
    require_once ('mysqlbaglan.php');
    session_start();
    if($_GET['randevusil']=='ok'){

        $sil=$db->prepare("DELETE from randevu where tarih=:trh");
        $kontrol=$sil->execute(array(
            "trh"=>$_GET['tarih']
        ));
        if($kontrol){

            Header('Location:randevularim.php?durum=ok');
            exit;
        } else {
            Header("Location:randevularim.php?durum=no");
            exit;
        }
    }
?>