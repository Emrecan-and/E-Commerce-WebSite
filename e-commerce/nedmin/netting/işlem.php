<?php  
ob_start();
session_start();  
include 'baglan.php';
if(isset($_POST['genel_ayar'])){
   
  $güncelle=$db->prepare("UPDATE ayar SET ayar_title=:ayar_title, ayar_description=:ayar_description, ayar_keyword=:ayar_keyword,
  ayar_author=:ayar_author
  WHERE ayar_id=1
   ");
  $kontrol=$güncelle->execute([
      'ayar_title'=>$_POST['ayar_title'],
      'ayar_description'=>$_POST['ayar_description'],
      'ayar_keyword'=>$_POST['ayar_keyword'],
      'ayar_author'=>$_POST['ayar_author'],
   ]);

  if($kontrol){
    header("Location:../production/genel-ayar.php?durum=ok");
    
  }
  else {
    header("Location:../production/genel-ayar.php?durum=no");
    
  }

}
  if(isset($_POST['iletişim_ayar'])){
   
    $g=$db->prepare("UPDATE ayar SET ayar_tel=:ayar_tel, ayar_gsm=:ayar_gsm, ayar_faks=:ayar_faks,
    ayar_mail=:ayar_mail,ayar_ilce=:ayar_ilce,ayar_il=:ayar_il,ayar_adres=:ayar_adres,ayar_mesai=:ayar_mesai
    WHERE ayar_id=1
     ");
    $k=$g->execute([
        'ayar_tel'=>$_POST['ayar_tel'],
        'ayar_gsm'=>$_POST['ayar_gsm'],
        'ayar_faks'=>$_POST['ayar_faks'],
        'ayar_mail'=>$_POST['ayar_mail'],
        'ayar_ilce'=>$_POST['ayar_ilce'],
        'ayar_il'=>$_POST['ayar_il'],
        'ayar_adres'=>$_POST['ayar_adres'],
        'ayar_mesai'=>$_POST['ayar_mesai']
     ]);
  
    if($k){
      header("Location:../production/iletişim-ayar.php?durum=ok");
      
    }
    else {
      header("Location:../production/iletişim-ayar.php?durum=no");
      
    }
}
if(isset($_POST['api_ayar'])){
   
    $güncelle=$db->prepare("UPDATE ayar SET ayar_zopim=:ayar_zopim, ayar_maps=:ayar_maps,
    ayar_analystic=:ayar_analystic
    WHERE ayar_id=1
     ");
    $kontrol=$güncelle->execute([
        'ayar_zopim'=>$_POST['ayar_zopim'],
        'ayar_maps'=>$_POST['ayar_maps'],
        'ayar_analystic'=>$_POST['ayar_analystic']      
     ]);
  
    if($kontrol){
      header("Location:../production/api-ayar.php?durum=ok");
      
    }
    else {
      header("Location:../production/api-ayar.php?durum=no");
      
    }
  
  }
  if(isset($_POST['mail_ayar'])){
   
    $güncelle=$db->prepare("UPDATE ayar SET ayar_smtphost=:ayar_smtphost, ayar_smtppassword=:ayar_smtppassword,
    ayar_smtpport=:ayar_smtpport,ayar_smtpuser=:ayar_smtpuser
    WHERE ayar_id=1
     ");
    $kontrol=$güncelle->execute([
        'ayar_smtphost'=>$_POST['ayar_smtphost'],
        'ayar_smtpport'=>$_POST['ayar_smtpport'],
        'ayar_smtppassword'=>$_POST['ayar_smtppassword'],
        'ayar_smtpuser'=>$_POST['ayar_smtpuser']        
     ]);
  
    if($kontrol){
      header("Location:../production/mail-ayar.php?durum=ok");
      
    }
    else {
      header("Location:../production/mail-ayar.php?durum=no");
      
    }
  
  }
  if(isset($_POST['sosyal_ayar'])){
   
    $güncelle=$db->prepare("UPDATE ayar SET ayar_facebook=:ayar_facebook, ayar_twitter=:ayar_twitter,
    ayar_google=:ayar_google,ayar_youtube=:ayar_youtube
    WHERE ayar_id=1
     ");
    $kontrol=$güncelle->execute([
        'ayar_facebook'=>$_POST['ayar_facebook'],
        'ayar_twitter'=>$_POST['ayar_twitter'],
        'ayar_google'=>$_POST['ayar_google'],
        'ayar_youtube'=>$_POST['ayar_youtube']        
     ]);
  
    if($kontrol){
      header("Location:../production/sosyal-ayar.php?durum=ok");
      
    }
    else {
      header("Location:../production/sosyal-ayar.php?durum=no");
      
    }
  
  }

  if(isset($_POST['hakkimizda_ayar'])){
   
    $güncelle=$db->prepare("UPDATE hakkımızda SET hakkimizda_başlık=:hakkimizda_baslik,hakkimizda_içerik=:hakkimizda_icerik,
    hakkimizda_video=:hakkimizda_video,hakkimizda_vizyon=:hakkimizda_vizyon,hakkimizda_misyon=:hakkimizda_misyon
    WHERE hakkimizda_id=1
     ");
    $kontrol=$güncelle->execute([
        'hakkimizda_icerik'=>$_POST['hakkimizda_içerik'],
        'hakkimizda_baslik'=>$_POST['hakkimizda_başlık'],
        'hakkimizda_video'=>$_POST['hakkimizda_video'],
        'hakkimizda_misyon'=>$_POST['hakkimizda_misyon'],
        'hakkimizda_vizyon'=>$_POST['hakkimizda_vizyon']        
     ]);

    if($kontrol){
      header("Location:../production/hakkımızda.php?durum=ok");
      
    }
    else {
      header("Location:../production/hakkımızda.php?durum=no");
      
    }
  
  }
  if(isset($_POST['admingiriş'])){
   $mail=$_POST['kullanici_mail'];
   $password=md5($_POST['kullanici_password']);
   $select=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:kullanici_mail and kullanici_password=:kullanici_password and
   kullanici_yetki=:kullanici_yetki");
   $select->execute([
     'kullanici_mail'=>$mail,
     'kullanici_password'=>$password,
     'kullanici_yetki'=>5
   ]); 
   $say=$select->rowCount();
    if($say==1){
      header("Location:../production/index.php");
      $_SESSION['kullanici_mail']=$mail;
      exit;
    } 
    else{
    header("Location:../production/login.php?durum=no");
    exit;
    }
  }
?>
