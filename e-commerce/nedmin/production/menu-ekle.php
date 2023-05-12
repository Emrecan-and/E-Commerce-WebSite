<?php include 'header.php'; 
 $kullancı=$db->prepare("SELECT * FROM menu WHERE menu_id=:id");

?> 
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add Menu<small>
                      
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
                    <br />
                    <form action="../netting/işlem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        
             

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menu Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="menu_ad"  required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                         
                      <div class="form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü Details <span class="required">*</span>
</label>
 
<div class="col-md-6 col-sm-6 col-xs-12">
 
<textarea class="ckeditor" id="editor2" name="menu_detay"></textarea>
</div>
</div>
 
<script type="text/javascript">
 
CKEDITOR.replace( 'editor2',
 
 {
 
filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
 
filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',
 
filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',
 
filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
 
filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
 
filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
 
forcePasteAsPlainText: true
 
} 
 
);
 
</script>

<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menu Url<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="menu_url"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menu Queue <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="menu_sira"  required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>


                          
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menu Status <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="menu_durum" id="heard" class="form-control" required>
                          <option value="1">Active</option>
                          <option value="0">Passive</option>
                          </select>
                        </div>
                      </div>
                                        

                      <div class="form-group">
                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="menukaydet" class="btn btn-success">ADD</button>
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