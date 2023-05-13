<?php include 'header.php'; ?> 
<?php   
$slect=$db->prepare("SELECT * FROM hakkımızda WHERE hakkimizda_id=:ass");
$slect->execute([
    'ass'=>1
  ]);
 $hakkımızdacek=$slect->fetch(PDO::FETCH_ASSOC); 
?>
<?php  
   $kullancı=$db->prepare("SELECT * FROM slider");
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
                    <h2>slider List<small>
                      
                     <?php 
                     if(isset($_GET['durum'])){
                     if($_GET['durum']=="ok"){?>
                        <b style="color:green;">Process succesful</b>
                     <?php } 
                     else if($_GET['durum']=="no"){ ?>

                        <b style="color:red;">Process unsuccesful</b>
                      <?php } }?>
                    </small></h2>
                    
                    <div class="clearfix"></div>
                    <div align="right">
                    <a href="slider-ekle.php"><button class="btn btn-success btn-xs">ADD NEW</button></a>
                    </div>
                </div>
                  <div class="x_content">

                  <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th width=20>Queue No</th>
                          <th>Slider Image</th>
                          <th>Slider Name</th>
                          <th>Slider Price</th>
                          <th>Slider Queue</th>
                          <th>Slider Status</th>
                          <th></th>
                          <th></th>
                         
                        </tr>
                      </thead>
                      <tbody>

                      <?php $say=0;
                      while($slidercek=$kullancı->fetch(PDO::FETCH_ASSOC)){ $say++; ?>
                        <tr>
                            <td><?php echo $say;  ?></td>
                           <td><img width="200" src="../../<?php echo $slidercek['slider_resimyol']; ?>" ></td>
                          <td><?php echo $slidercek['slider_ad']; ?></td>
                          <td><?php echo $slidercek['slider_link']; ?></td>
                          <td><?php echo $slidercek['slider_sira']; ?></td>
                          <td><center><?php 
                          
                          if($slidercek['slider_durum']==1){?>
                              <button class="btn btn-success btn-xs">Active</button>
                         <?php }
                         else{ ?>
                            <button class="btn btn-danger btn-xs">Passive</button>
                                
                          <?php }  ?>
                          </center>
                          </td>
                          <td><center><a href="slider-düzenle.php?id=<?php echo $slidercek['slider_id']; ?>"><button class="btn btn-primary btn-xs">EDIT</button></a></center></td>
                          <td><center><a href="../netting/işlem.php?id=<?php echo $slidercek['slider_id'];?>&slider_sil=ok&img=<?php echo $slidercek['slider_resimyol'];?>"><button class="btn btn-danger btn-xs">DELETE</button></a></center></td>
                          
                        </tr>
                     <?php  } ?>
                      </tbody>
                    </table

              </div>
            </div>
            </div>
            </div>
            

            

        
          </div>
        </div>
        <!-- /page content -->

       <?php include 'footer.php'; ?>