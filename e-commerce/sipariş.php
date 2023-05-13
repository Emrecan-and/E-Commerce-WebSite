<?php include 'header.php'?>
<style>
     .error-message {
    color: red;
    font-weight: bold;
  }
    .center-img {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .comment-textarea {
    width: 70%;
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
  }
    table {
    width: 70%;
    border-collapse: collapse;
  }

  th, td {
    padding: 8px;
    border: 1px solid #ddd;
  }

  th {
    background-color: #f2f2f2;
    font-weight: bold;
  }

  tr {
    background-color: #f9f9f9;
  }

  tr:hover {
    background-color: #e2e2e2;
  }
</style>
  
<?php
             $slider=$db->prepare("SELECT * FROM slider WHERE slider_sira=:sira");
             $slider->execute([
                'sira'=>$_GET['img']
             ]);   
             $slidercek=$slider->fetch(PDO::FETCH_ASSOC);

               
$çek=$db->prepare("SELECT *  FROM comment WHERE slider_ad=:ad");
$çek->execute([
    'ad'=>$slidercek['slider_ad']
]);
// $commentcek=$çek->fetch(PDO::FETCH_ASSOC);
?>
<h1 align="center"><?php echo $slidercek['slider_ad']."  $".$slidercek['slider_link']?></h1>
<br>
<div class="center-img">
<img  width="600" src="<?php echo $slidercek['slider_resimyol'];?>" alt="Image could not found!"> 
</div>
  <?php   
   if(isset($_GET['bos']) and $_GET['bos']=="yes"){ ?>
        <p align="center" class="error-message">Empty comment!</p>
  <?php  }  ?>
  <?php   
   if(isset($_GET['dolu']) and $_GET['dolu']=="yes"){ ?>
        <p align="center" class="error-message">This comment is more than 500 characters!</p>
  <?php  }  ?>
  <?php   
   if(isset($_GET['durum']) and $_GET['durum']=="no"){ ?>
         <p align="center" class="error-message">Process unsuccesfull..</p>
  <?php  }  ?>
<br>
<h3 align="center"><?php echo "FOR GIVING ORDER CALL TO ".$ayarcek['ayar_tel'];?></h3>
<hr>
  <table align="center">
    <tr>
      <th>Name</th>
      <th>Comment</th>  
    </tr>
<?php 
    while($commentcek=$çek->fetch(PDO::FETCH_ASSOC)){ ?>
       <tr>
        <td><?php echo $commentcek['user_ad'] ?></td>
        <td><?php echo $commentcek['comment_text'] ?></td>
       </tr>

 <?php }
?>
</table>
<br>
<form align="center" action="nedmin/netting/işlem.php" method="POST">
<label for="yorum">Write Comment</label><br>
  <textarea id="yorum" class="comment-textarea" name="comment_text" rows="4" cols="50"></textarea><br>
<input type="hidden" name="slider_ad" value="<?php echo $slidercek['slider_ad']?>">
<input type="hidden" name="user_ad" value="<?php echo isset($_SESSION['userkullanici_mail']) ?  $kullanicicek['kullanici_adsoyad'] : "Guest" ?>">
<input type="hidden" name="img" value="<?php echo $_GET['img'] ?>">
<br>
<button type="submit" name="comment" class="btn btn-default btn-red btn-sm">Submit Comment</button>
</form>
    <br>
    



<?php include 'footer.php'?>