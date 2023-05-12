<div class="main-slide">
			<div id="sync1" class="owl-carousel">
				
            <?php
             $slider=$db->prepare("SELECT * FROM slider");
             $slider->execute();   
             while($slidercek=$slider->fetch(PDO::FETCH_ASSOC)){   
            ?>
            
            <div class="item">
					<div class="slide-desc">
						<div class="inner">
							<h1><?php echo  $slidercek['slider_ad'] ?></h1>
							
							<a href=<?php echo $slidercek['slider_link'] ?>><button class="btn btn-default btn-red btn-lg">BUY</button></a>
						</div>
						<div class="inner">
							<div class="pro-pricetag big-deal">
								<div class="inner">
										<span class="oldprice">$31</span>
										<span>$14</span>
										<span class="ondeal">Best Deal</span>
								</div>
							</div>
						</div>
					</div>
					<div class="slide-type-1">
						<img  width="800"  src=<?php echo $slidercek['slider_resimyol']  ?> alt="" class="img-responsive">
					</div>
				</div>
				  <?php } ?>
    
				
			</div>
		</div>