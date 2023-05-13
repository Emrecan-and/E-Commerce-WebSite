<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
    <title>Götür</title>
	
	<link rel="shortcut icon" href="images\fav.png">
	
    <!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,400italic,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
	<link href='font-awesome\css\font-awesome.css' rel="stylesheet" type="text/css">
	<!-- Bootstrap -->
    <link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">
	<!-- Main Style -->
	<link rel="stylesheet" href="style.css">
	<!-- fancy Style -->
	<link rel="stylesheet" type="text/css" href="js\product\jquery.fancybox.css?v=2.1.5" media="screen">
	<style>
        .error-message {
            color: red;
        }
    </style>
  </head>
  <body>
  <?php include'header.php'?>
  <div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="page-title-wrap">
					<div class="page-title-inner">
					<div class="row">
						<div class="col-md-4">
							<div class="bread"><a href="#">Home</a> &rsaquo; Register</div>
							<div class="bigtitle">Register</div>
						</div>
					
					</div>
					</div>
				</div>
			</div>
		</div>
       
        <?php   
          if(isset($_GET['kayit']) and $_GET['kayit']=="yes"){?>
             <div class="error-message">Process unsuccesfull..</div>
        <?php  }  ?>
        <?php   
           if(isset($_GET['boyut']) and $_GET['boyut']=="yes"){?>
             <div class="error-message">Password must be more than 5 character!</div>
        <?php  }  ?>
        <?php   
         if(isset($_GET['uyum']) and $_GET['uyum']=="yes"){?>
             <div class="error-message">Passwords are not matchable!</div>
        <?php  }  ?>
        <?php   
          if(isset($_GET['mail']) and $_GET['mail']=="yes"){?>
             <div class="error-message">Invalid mail!</div>
        <?php  }  ?>
        <?php   
          if(isset($_GET['sorun']) and $_GET['sorun']=="yes"){?>
             <div class="error-message">Process unsuccesfull..</div>
        <?php  }  ?>

		<form class="form-horizontal checkout" role="form" action="nedmin/netting/işlem.php" method="POST">
			<div class="row">
				<div class="col-md-6">
					<div class="title-bg">
						<div class="title">Personal Details</div>
					</div>
					<div class="form-group dob">
						<div class="col-sm-12">
							<input type="text" class="form-control" id="name" name="kullanici_adsoyad" placeholder="Name and Surname">
						</div>
    
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<input type="text" class="form-control" id="email" name="kullanici_mail" placeholder="Email">
						</div>
					</div>
					<div class="form-group dob">
						<div class="col-sm-6">
							<input type="password" class="form-control" id="password" name="kullanici_password1" placeholder="Password">
						</div>
						<div class="col-sm-6">
							<input type="password" class="form-control" id="password1" name="kullanici_password2" placeholder="Password again">
						</div>
					</div>
					 
					<button class="btn btn-default btn-red" name="register">Register</button>
				</div>
			<!--	<div class="col-md-6">
					<div class="title-bg">
						<div class="title">Your address</div>
                        <a href=""><button></button></a>
					</div>
				</div> -->
			</div>
		</form>
		<div class="spacer"></div>
	</div>
	<?php include 'footer.php'?> 

  

</body> 
</html>
