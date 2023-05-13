<?php  
ob_start();
session_start();  
include 'baglan.php';
include '../production/function.php';
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
  if(isset($_POST['kullanicigiris'])){
    $mail=$_POST['kullanici_mail'];
    $password=md5($_POST['kullanici_password']);
    $select=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:kullanici_mail and kullanici_password=:kullanici_password and
    kullanici_yetki=:kullanici_yetki and kullanici_durum=:kullanici_durum");
    $select->execute([
      'kullanici_mail'=>$mail,
      'kullanici_password'=>$password,
      'kullanici_yetki'=>1,
      'kullanici_durum'=>1
    ]); 
    $say=$select->rowCount();
     if($say==1){
       header("Location:../../");
       $_SESSION['userkullanici_mail']=$mail;
       exit;
     } 
     else{
     header("Location:../../?durum=no");
     exit;
     }
   }
  if(isset($_POST['kullanici_düzenle'])){
    $kul=$_POST['kullanici_id'];
    $güncelle=$db->prepare("UPDATE kullanici SET kullanici_tc=:kullanici_tc,kullanici_adsoyad=:kullanici_adsoyad,kullanici_durum=:kullanici_durum
    WHERE kullanici_id=$kul
     ");
    $kontrol=$güncelle->execute([
        'kullanici_adsoyad'=>$_POST['kullanici_adsoyad'],
        'kullanici_tc'=>$_POST['kullanici_tc'],
        'kullanici_durum'=>$_POST['kullanici_durum']
        
     ]);

    if($kontrol){
     
      header("Location:../production/kullanıcı-düzenle.php?id=$kul&?durum=ok");
      
    }
    else {
      header("Location:../production/kullanıcı-düzenle.php?id=$kul&?durum=no");
      
    }
  
  }
  if(isset($_GET['sil'])){

   if($_GET['sil']=="ok"){
    $sil=$db->prepare("DELETE FROM kullanici where kullanici_id=:id");     
    $kontrol=$sil->execute([
      'id'=>$_GET['id']
    ]);   
   if($kontrol){
    header("Location:../production/kullanıcı.php?sil=ok");
   }
   else{
    header("Location:../production/kullanıcı.php?sil=no");
   } 
   }
  }
  if(isset($_POST['menu_düzenle'])){
    $menu_id=$_POST['menu_id']; 
    $menu_seourl=seo_friendly_url($_POST['menu_ad']);

    $güncelle=$db->prepare("UPDATE menu SET menu_ad=:menu_ad,menu_detay=:menu_detay,
    menu_url=:menu_url,menu_sira=:menu_sira,menu_seourl=:menu_seourl,menu_durum=:menu_durum
    WHERE menu_id=$menu_id
     ");
    $kontrol=$güncelle->execute([
        'menu_ad'=>$_POST['menu_ad'],
        'menu_detay'=>$_POST['menu_detay'],
        'menu_url'=>$_POST['menu_url'],
        'menu_sira'=>$_POST['menu_sira'],
        'menu_seourl'=>$menu_seourl,
        'menu_durum'=>$_POST['menu_durum']        
     ]);

    if($kontrol){
      header("Location:../production/menu.php?menu_id=$menu_id&?durum=ok");
      
    }
    else {
      header("Location:../production/menu.php?menu_id=$menu_id&?durum=no");
      
    }
  
  }

  if(isset($_GET['menu_sil'])){

    if($_GET['menu_sil']=="ok"){
     $sil=$db->prepare("DELETE FROM menu where menu_id=:id");     
     $kontrol=$sil->execute([
       'id'=>$_GET['id']
     ]);   
    if($kontrol){
     header("Location:../production/menu.php?sil=ok");
    }
    else{
     header("Location:../production/menu.php?sil=no");
    } 
    }
   }
   if(isset($_POST['menukaydet'])){
   $menu_seourl=seo_friendly_url($_POST['menu_ad']);
   $güncelle=$db->prepare("INSERT INTO menu SET menu_ad=:menu_ad,menu_detay=:menu_detay,
   menu_url=:menu_url,menu_sira=:menu_sira,menu_seourl=:menu_seourl,menu_durum=:menu_durum
    ");
   $kontrol=$güncelle->execute([
       'menu_ad'=>$_POST['menu_ad'],
       'menu_detay'=>$_POST['menu_detay'],
       'menu_url'=>$_POST['menu_url'],
       'menu_sira'=>$_POST['menu_sira'],
       'menu_seourl'=>$menu_seourl,
       'menu_durum'=>$_POST['menu_durum']        
    ]);

   if($kontrol){
     header("Location:../production/menu.php?durum=ok");
     
   }
   else {
     header("Location:../production/menu.php?durum=no");
     
   }

   }

   if(isset($_POST['logoduzenle'])){
         $uploads_dir="../../dimg";
      @$tmp_name=$_FILES['ayar_logo']["tmp_name"];
      @$name=$_FILES['ayar_logo']["name"];
      
      $benzersizsayi4=rand(20000,32000);
      $refimgyol=substr($uploads_dir,6)."/".$benzersizsayi4.$name;
      @move_uploaded_file($tmp_name,"$uploads_dir/$benzersizsayi4$name");
      $duzenle=$db->prepare("UPDATE ayar SET ayar_logo=:logo WHERE ayar_id=1");
      $kontrol=$duzenle->execute([
        'logo'=>$refimgyol
      ]);
      if($kontrol){
        $resim_unlink=$_POST['eski_yol'];
        unlink("../../$resim_unlink");
        header("Location:../production/genel-ayar.php?durum=ok");
    
      }
      else{
        header("Location:../production/genel-ayar.php?durum=no");
    
      }
   }
    if(isset($_POST['sliderkaydet'])){
      $uploads_dir="../../dimg/slider";
      @$tmp_name=$_FILES['slider_resimyol']["tmp_name"];
      @$name=$_FILES['slider_resimyol']["name"];
      $benzersizsayi4=rand(20000,30000);
      $refimgyol=substr($uploads_dir,6)."/". $benzersizsayi4.$name;
      @move_uploaded_file($tmp_name,"$uploads_dir/$benzersizsayi4$name");
      $duzenle=$db->prepare("INSERT INTO slider (slider_ad,slider_resimyol,slider_sira,slider_link,slider_durum) VALUES(:ad,:resim,:sira,:link,:durum)");
      $kontrol=$duzenle->execute([
        'ad'=>$_POST['slider_ad'],
        'resim'=>$refimgyol,
        'sira'=>$_POST['slider_sira'],
        'link'=>$_POST['slider_link'],
        'durum'=>$_POST['slider_durum']
      ]);
      if($kontrol){
        header("Location:../production/slider.php?durum=ok");
    
      }
      else{
        header("Location:../production/slider.php?durum=no");
    
      }
    }
   if(isset($_POST['slider_düzenle'])){
    $uploads_dir="../../dimg/slider";
    @$tmp_name=$_FILES['slider_resimyol']["tmp_name"];
    @$name=$_FILES['slider_resimyol']["name"];
    
    $benzersizsayi4=rand(20000,32000);
    $refimgyol=substr($uploads_dir,6)."/".$benzersizsayi4.$name;
    @move_uploaded_file($tmp_name,"$uploads_dir/$benzersizsayi4$name");
    $slider_id=$_POST['slider_id'];
    $duzenle=$db->prepare("UPDATE slider SET slider_resimyol=:resim,slider_ad=:ad,slider_sira=:sira,slider_durum=:durum
     WHERE slider_id=$slider_id");
    $kontrol=$duzenle->execute([
        'ad'=>$_POST['slider_ad'],
        'resim'=>$refimgyol,
        'sira'=>$_POST['slider_sira'],
 
        'durum'=>$_POST['slider_durum']
    ]);
    if($kontrol){
      $resim_unlink=$_POST['eski_yol'];
      unlink("../../$resim_unlink");
      header("Location:../production/slider.php?durum=ok");
  
    }
    else{
      header("Location:../production/slider.php?durum=no");
  
    }      
   }
   if(isset($_GET['slider_sil'])){

    if($_GET['slider_sil']=="ok"){
     $sil=$db->prepare("DELETE FROM slider where slider_id=:id");     
     $kontrol=$sil->execute([
       'id'=>$_GET['id']
     ]);   
    if($kontrol){
      $img=$_GET['img'];
      unlink("../../$img");
     header("Location:../production/slider.php?sil=ok");
    }
    else{
     header("Location:../production/slider.php?sil=no");
    } 
    }
   }
   if(isset($_POST['register'])){
      $ad=$_POST['kullanici_adsoyad'];
      $şifre1=$_POST['kullanici_password1'];
      $şifre2=$_POST['kullanici_password2'];
      $mail=$_POST['kullanici_mail'];
      if($şifre1==$şifre2 and filter_var($mail, FILTER_VALIDATE_EMAIL)){
       if ($şifre1>=6){
        $s=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail");
        $s->execute([
          'mail'=>$mail
        ]);
        $say=$s->rowCount();
        if($say){
          header("Location:../../register.php?sorun=yes");
        }
        else{
        //SQL COMMAND
        $select=$db->prepare("INSERT INTO kullanici SET kullanici_adsoyad=:ad,kullanici_password=:sifre,kullanici_mail=:mail,
        kullanici_yetki=:yetki");
        $row=$select->execute([
          'ad'=>$ad,
          'sifre'=>md5($şifre1),
          'mail'=>$mail,
          'yetki'=>1
        ]);
        if($row){
        header("Location:../../index.php?kayit=basarili");}
        else{
          header("Location:../../register.php?kayit=yes");
        }}
      }
        else{
          header("Location:../../register.php?boyut=yes");
        }
      }
      else if($şifre1!==$şifre2 and filter_var($mail, FILTER_VALIDATE_EMAIL)){
        header("Location:../../register.php?uyum=yes");
      }
      else if($şifre1==$şifre2 and filter_var($mail, FILTER_VALIDATE_EMAIL)==false){
        header("Location:../../register.php?mail=yes");
      }
      else{
        header("Location:../../register.php?sorun=yes");
      }
   }
   if(isset($_POST['comment'])){
      $img= $_POST['img'];
       $com=$_POST['comment_text'];
      if(empty($_POST['comment_text'])){
          header("Location:../../sipariş.php?img=$img&bos=yes");
      }
      else if(strlen($com)>500){
        header("Location:../../sipariş.php?img=$img&dolu=yes");
      }
      else{
          $ekle=$db->prepare("INSERT INTO comment SET slider_ad=:slider_ad,user_ad=:user_ad,comment_text=:comment_text");         
          $ekle->execute([
            'slider_ad'=>$_POST['slider_ad'],
            'user_ad'=>$_POST['user_ad'],
            'comment_text'=>$_POST['comment_text']
          ]);
          $say=$ekle->rowCount();
         if($say){
          header("Location:../../sipariş.php?img=$img&durum=yes");
         }
         else{
          header("Location:../../sipariş.php?img=$img&durum=no");
         }
      }
   }
?>  
