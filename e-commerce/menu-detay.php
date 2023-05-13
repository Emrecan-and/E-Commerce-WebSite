<?php include 'header.php';
$slect=$db->prepare("SELECT * FROM menu WHERE menu_seourl=:sef");
$slect->execute([
    'sef'=>$_GET['sef']
  ]);
 $menucek=$slect->fetch(PDO::FETCH_ASSOC); 
?>

<div class="container">
	 
		<div class="row">
			<div class="col-md-9"><!--Main content-->
              
				<div class="title-bg">
					<div class="title"><?php echo $menucek['menu_ad']; ?></div>
				</div>
				<div class="page-content">
					<p>
						<?php echo $menucek['menu_detay']; ?>
					</p>
				</div>
                
    
				

			</div>
			<!--sidebar gelecek-->
            
		</div>
		<div class="spacer"></div>
	</div>


<?php include 'footer.php'?>