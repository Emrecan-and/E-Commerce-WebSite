<div class="main-slide">
			<div id="sync1" class="owl-carousel">
				
            <?php
             $slider=$db->prepare("SELECT * FROM slider");
             $slider->execute();   
             while($slidercek=$slider->fetch(PDO::FETCH_ASSOC)){  $ser = $slidercek['slider_sira'];
				$url = "sipariş.php?img=" . urlencode($ser);
				
            ?>
           
            <div class="item">
					<div class="slide-desc">
						<div class="inner">
							<h1><?php echo  $slidercek['slider_ad'] ?></h1>
							
							<a href=<?php echo $url ?>><button class="btn btn-default btn-red btn-lg">BUY</button></a>
						</div>
						<div class="inner">
							<div class="pro-pricetag big-deal">
								<div class="inner">
										<span class="oldprice">$<?php echo rand(10,20);?></span>
										<span>$<?php echo $slidercek['slider_link'];?></span>
										<span class="ondeal">Best Deal</span>
								</div>
							</div>
						</div>
					</div>
					<div class="slide-type-1">
						<img  width="700"  src=<?php echo $slidercek['slider_resimyol']  ?> alt="" class="img-responsive">
					</div>
				</div>
				  <?php } ?>
    
				
			</div>
		</div>