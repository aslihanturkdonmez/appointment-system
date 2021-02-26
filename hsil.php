<?php 
    require_once ('mysqlbaglan.php');
    session_start();
    if($_GET['hastasill']=='ok'){

        $sil=$db->prepare("DELETE from hasta where hasta_id=:id");
        $kontrol=$sil->execute(array(
            "id"=>$_GET['hasta_id']
        ));
        if($kontrol){
           

                $sil=$db->prepare("DELETE from randevu where tc_no=:tc");
                $kontrol=$sil->execute(array(
                    "tc"=>$_SESSION['tc_no']
                ));
           
            session_destroy();
            header('Location: giris.php');        
            exit;  
        } else {
            Header("Location:ayarlar.php?durum=no");
            exit;
        }
    }
?>