<?php   
ob_start();
session_start();
include'nedmin/netting/baglan.php';
include 'nedmin/production/function.php';
?>
<?php   
$select=$db->prepare("SELECT * FROM ayar WHERE ayar_id=:ayar_id");
$select->execute([
    'ayar_id'=>1
  ]);
 $ayarcek=$select->fetch(PDO::FETCH_ASSOC); 
?>
<?php  
   if(isset($_SESSION['userkullanici_mail'])){
   $kullancı=$db->prepare("SELECT * FROM kullanici WHERE kullanici_mail=:mail");
   $kullancı->execute([
       'mail'=>$_SESSION['userkullanici_mail']
     ]);
    $say=$kullancı->rowCount();
    $kullanicicek=$kullancı->fetch(PDO::FETCH_ASSOC); 
   }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $ayarcek['ayar_title'];?></title>
    <meta name="description" content=<?php echo $ayarcek['ayar_description'];?>>
    <meta name="keywords" content=<?php echo $ayarcek['ayar_keyword'];?>>
    <meta name="author" content=<?php echo $ayarcek['ayar_author'];?>>

    <!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,400italic,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
	<link href='font-awesome\css\font-awesome.css' rel="stylesheet" type="text/css">
	<!-- Bootstrap -->
    <link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">
	
	<!-- Main Style -->
	<link rel="stylesheet" href="style.css">
	
	<!-- owl Style -->
	<link rel="stylesheet" href="css\owl.carousel.css">
	<link rel="stylesheet" href="css\owl.transitions.css">
	

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <div id="wrapper">
	<div class="header"><!--Header -->
		<div class="container">
			<div class="row">
				<div class="col-xs-6 col-md-4 main-logo">
					<a href="index.php"><img width="80" src=<?php echo $ayarcek['ayar_logo'] ?> alt="logo" class="logo img-responsive"></a>
				</div>
				<div class="col-md-8">
					<div class="pushright">
						<div class="top">
							<?php 
							if(!isset($_SESSION['userkullanici_mail'])){?> 
							
							<a href="#" id="reg" class="btn btn-default btn-dark">Login<span>-- Or --</span>Register</a>
							<?php } else { ?>
								<a href="#"  class="btn btn-default btn-dark">WELCOME<span>--</span><?php echo $kullanicicek['kullanici_adsoyad'] ?></a> <?php } ?>
							<div class="regwrap">
								<div class="r	ow">
									<div class="col-md-6 regform">
										<div class="title-widget-bg">
											<div class="title-widget">Login</div>
										</div>

										<form action="nedmin/netting/işlem.php" method="POST"role="form">
											<div class="form-group">
												<input type="text" class="form-control"name="kullanici_mail" id="username" placeholder="Username(Mail Adress)">
											</div>
											<div class="form-group">
												<input type="password" name="kullanici_password"class="form-control" id="password" placeholder="password">
											</div>
											<div class="form-group">
												<button type="submit" name="kullanicigiris"class="btn btn-default btn-red btn-sm">Sign In</button>
											</div>
										</form>


									</div>
									<div class="col-md-6">
										<div class="title-widget-bg">
											<div class="title-widget">Register</div>
										</div>
										<p>
											New User? By creating an account you be able to shop faster, be up to date on an order's status...
										</p>
										<a href="register.php"><button class="btn btn-default btn-yellow">Register Now</button></a>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="dashed"></div>
	</div><!--Header -->
	<div class="main-nav"><!--end main-nav -->
		<div class="navbar navbar-default navbar-static-top">
			<div class="container">
				<div class="row">
					<div class="col-md-10">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="navbar-collapse collapse">
							<ul class="nav navbar-nav">
								<li><a href="index.php" class="active">Home</a><div class="curve"></div></li>
							    <?php 
								 $menu=$db->prepare("SELECT * FROM menu where menu_durum=:durum order by  menu_sira ASC limit 5");
								 $menu->execute([
									'durum'=>1
								 ]);
								
								while($menucek=$menu->fetch(PDO::FETCH_ASSOC)){ ?>
                                  
								<li><a href="
								
								<?php   
							  	
                               if(!empty($menucek['menu_url'])){
                                  echo $menucek['menu_url'];
							   }
                                else{
									echo "sayfa-".seo_friendly_url($menucek['menu_ad']);
								}
								?>
								
								"><?php echo $menucek['menu_ad']  ?></a></li>
								<?php  } ?>
							</ul>
						</div>
					</div>
					
					<?php 
					if(isset($_SESSION['userkullanici_mail'])){?> 
					<ul class="small-menu">
			<li><a href="" class="myacc"><?php echo $kullanicicek['kullanici_adsoyad'] ?></a></li>
			<li><a href="logout.php" class="mycheck">Safety LogOut</a></li>
		</ul>  <?php } ?>
				</div>
			</div>
		</div>
	</div><!--end main-nav -->