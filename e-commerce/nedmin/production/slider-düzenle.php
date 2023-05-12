<?php include 'header.php'; 
 $kullancı=$db->prepare("SELECT * FROM slider WHERE slider_id=:id");
 $kullancı->execute([
     'id'=>$_GET['id']
   ]);
  $slidercek=$kullancı->fetch(PDO::FETCH_ASSOC); 
?> 
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit slider<small>
                      
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
                        <ul class="dropdown-slider" role="slider">
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
                    <br />
                    <form action="../netting/işlem.php" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">slider Id <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="integer" id="first-name" name="slider_id" value="<?php echo $slidercek['slider_id']?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">slider Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="slider_ad" value="<?php echo $slidercek['slider_ad']?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">slider Image <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="first-name" name="slider_resimyol" value="<?php echo $slidercek['slider_resimyol']?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <input type="hidden" id="first-name" name="eski_yol" value="<?php echo $slidercek['slider_resimyol']; ?>">


<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">slider Link<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="slider_url" value="<?php echo $slidercek['slider_link']?>"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">slider Queue <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="slider_sira" value="<?php echo $slidercek['slider_sira']?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>


                          
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">slider Status <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="slider_durum" id="heard" class="form-control" required>
                          <option value="1"<?php echo $slidercek['slider_durum']=='1'?  'selected=""':''; ?>>Active</option>
                          <option value="0"<?php if( $slidercek['slider_durum']=='0'){echo 'selected=""';} ?>>Passive</option>
                          </select>
                        </div>
                      </div>
                                        

                      <div class="form-group">
                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="slider_düzenle" class="btn btn-success">EDIT</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>


            

        
          </div>
        </div>
        <!-- /page content -->

       <?php include 'footer.php'; ?>