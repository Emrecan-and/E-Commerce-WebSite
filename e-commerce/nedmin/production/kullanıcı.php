<?php include 'header.php'; ?> 
<?php   
$slect=$db->prepare("SELECT * FROM hakkımızda WHERE hakkimizda_id=:ass");
$slect->execute([
    'ass'=>1
  ]);
 $hakkımızdacek=$slect->fetch(PDO::FETCH_ASSOC); 
?>
<?php  
   $kullancı=$db->prepare("SELECT * FROM kullanici");
   $kullancı->execute();
?>
<head><script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
</head>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>User List<small>
                      
                     <?php 
                     if(isset($_GET['durum'])){
                     if($_GET['durum']=="ok"){?>
                        <b style="color:green;">Process succesful</b>
                     <?php } 
                     else if($_GET['durum']=="no"){ ?>

                        <b style="color:red;">Process unsuccesful</b>
                      <?php } }?>
                    </small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                  <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Registration Date</th>
                          <th>Name Surname</th>
                          <th>Mail</th>
                          <th>GSM</th>
                          <th></th>
                          <th></th>
                         
                        </tr>
                      </thead>
                      <tbody>

                      <?php
                      while($kullanıcıcek=$kullancı->fetch(PDO::FETCH_ASSOC)){?>
                        <tr>
                          <td><?php echo $kullanıcıcek['kullanici_zaman']; ?></td>
                          <td><?php echo $kullanıcıcek['kullanici_adsoyad']; ?></td>
                          <td><?php echo $kullanıcıcek['kullanici_mail']; ?></td>
                          <td><?php echo $kullanıcıcek['kullanici_gsm']; ?></td>
                          <td><center><a href="kullanıcı-düzenle.php?id=<?php echo $kullanıcıcek['kullanici_id']; ?>"><button class="btn btn-primary btn-xs">EDIT</button></a></center></td>
                          <td><center><a href=""><button class="btn btn-danger btn-xs">DELETE</button></a></center></td>
                          
                        </tr>
                     <?php  } ?>
                      </tbody>
                    </table>

              </div>
            </div>
            </div>
            </div>
            

            

        
          </div>
        </div>
        <!-- /page content -->

       <?php include 'footer.php'; ?>