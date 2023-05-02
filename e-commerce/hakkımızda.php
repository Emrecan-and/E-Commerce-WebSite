<?php include 'header.php';
$slect=$db->prepare("SELECT * FROM hakkımızda WHERE hakkimizda_id=:ass");
$slect->execute([
    'ass'=>1
  ]);
 $hakkımızdacek=$slect->fetch(PDO::FETCH_ASSOC); 
?>

<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="page-title-wrap">
					<div class="page-title-inner">
					<div class="row">
						<div class="col-md-4">
							<div class="bigtitle">About Us Page</div>
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-9"><!--Main content-->
                <video width="550" height="320" controls><source src="videos/götür.mp4.mp4" type="video/mp4"></video>
				<div class="title-bg">
					<div class="title"><?php echo $hakkımızdacek['hakkimizda_başlık']; ?></div>
				</div>
				<div class="page-content">
					<p>
						<?php echo $hakkımızdacek['hakkimizda_içerik']; ?>
					</p>
				</div>
                
                <div class="title-bg">
					<div class="title"><?php echo "Our Mission"; ?></div>
				</div>
				<div class="page-content">
					<p>
						<?php echo $hakkımızdacek['hakkimizda_misyon']; ?>
					</p>
				</div>
                <div class="title-bg">
					<div class="title"><?php echo "Our Vision"; ?></div>
				</div>
				<div class="page-content">
					<p>
						<?php echo $hakkımızdacek['hakkimizda_vizyon']; ?>
					</p>
				</div> 
                <iframe width="560" height="315" src=<?php echo $hakkımızdacek['hakkimizda_video']; ?> title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>  

			</div>
			<!--sidebar gelecek-->
            <?php  include 'sidebar.php'; ?>
		</div>
		<div class="spacer"></div>
	</div>


<?php include 'footer.php'?>