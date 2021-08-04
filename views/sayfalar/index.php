<?php require 'views/header.php'; ?>


  <?php  
   
  /* if (is_array($data)) :
   
   echo '<div class="alert alert-danger mt-5">';
   
			   foreach ($data as $value) :
			   
			   echo $value."<br>";
			   
			   
			   endforeach;
   echo '</div>';
   
   else:
   
   echo $data;
   
   endif;*/
   ?>

<div class="banner">
		<div class="container">
<div class="banner-bottom">
	<div class="banner-bottom-left">
		
	</div>
	<div class="banner-bottom-right">
		<div  class="callbacks_container">
					<ul class="rslides" id="slider4">
					<li>
								<div class="banner-info">
		<h3>
									<?php echo $Harici->sloganUst1;  ?></h3>
									<p><?php echo $Harici->sloganAlt1;						 ?></p>
								</div>
							</li>
							<li>
								<div class="banner-info">
								   <h3><?php echo $Harici->sloganUst2;	  ?></h3>
									<p><?php echo $Harici->sloganAlt2;	  ?></p>
								</div>
							</li>
							<li>
								<div class="banner-info">
								  <h3><?php echo $Harici->sloganUst3;	  ?></h3>
									<p><?php echo $Harici->sloganAlt3;	 ?></p>
								</div>								
							</li>
						</ul>
					</div>
					<!--banner-->
	  			<script src="<?php echo URL; ?>/views/design/js/responsiveslides.min.js"></script>
			 <script>
			    // You can also use "$(window).load(function() {"
			    $(function () {
			      // Slideshow 4
			      $("#slider4").responsiveSlides({
			        auto: true,
			        pager:true,
			        nav:false,
			        speed: 500,
			        namespace: "callbacks",
			        before: function () {
			          $('.events').append("<li>before event fired.</li>");
			        },
			        after: function () {
			          $('.events').append("<li>after event fired.</li>");
			        }
			      });
			
			    });
			  </script>
	</div>
	<div class="clearfix"> </div>
</div>
	<div class="shop">
		<a href="<?PHP echo URL."/urunler/kategori/2/pantolon";?>">HEMEN BAŞLA</a>
	</div>
	</div>
		</div>
		<!-- content-section-starts-here -->
		<div class="container">
			<div class="main-content">
            
			
                
                
				<div class="products-grid">
				<header>
					<h3 class="head text-center">YENİ ÜRÜNLER</h3>
				</header>
                
                
                <?php
				
			   foreach ($veri["data1"] as $value) :
			   ?>
			   
               	<div class="col-md-4 product simpleCart_shelfItem text-center">
						<a href="<?php echo URL; ?>/urunler/detay/<?php  echo $value["id"]; ?>/<?php  echo $Harici->seo($value["urunad"]); ?>"><img src="<?php echo URL; ?>/views/design/images/<?php  echo $value["res1"]; ?>" alt="<?php  echo $value["urunad"]; ?>" /></a>
						<div class="mask">
							<a href="<?php echo URL; ?>/urunler/detay/<?php  echo $value["id"]; ?>/<?php  echo $Harici->seo($value["urunad"]); ?>">İNCELE</a>
						</div>
						<a class="product_name" href="<?php echo URL; ?>/urunler/detay/<?php  echo $value["id"]; ?>/<?php  echo $Harici->seo($value["urunad"]); ?>"><?php  echo $value["urunad"]; ?></a>
						<p><a class="item_add" href="<?php echo URL; ?>/urunler/detay/<?php  echo $value["id"]; ?>/<?php  echo $Harici->seo($value["urunad"]); ?>"><i></i> <span class="item_price"><?php  echo  number_format($value["fiyat"],2,'.',','); ?></span></a></p>
					</div>
               
           
			   <?php
			   
		
			   
			   
			   endforeach;
				
				
				?>
                
                
                
		
                    
					<div class="clearfix"></div>
				</div>
			</div>

		</div>
		<div class="other-products">
		<div class="container">
			<h3 class="like text-center">EN ÇOK SATANLAR</h3>        			
				     <ul id="flexiselDemo3">
                     
                     
                          <?php
				
			   foreach ($veri["data2"] as $value2) :
			   ?>
			   
               
			<li><a href="<?php echo URL; ?>/urunler/detay/<?php  echo $value2["id"]; ?>/<?php  echo $Harici->seo($value2["urunad"]); ?>"><img src="<?php echo URL; ?>/views/design/images/<?php  echo $value2["res2"]; ?>" class="img-responsive" alt="<?php  echo $value2["urunad"]; ?>" /></a>
							<div class="product liked-product simpleCart_shelfItem">
							<a class="like_name" href="<?php echo URL; ?>/urunler/detay/<?php  echo $value2["id"]; ?>/<?php  echo $Harici->seo($value2["urunad"]); ?>"><?php  echo $value2["urunad"]; ?></a>
							<p><a class="item_add" href="<?php echo URL; ?>/urunler/detay/<?php  echo $value2["id"]; ?>/<?php  echo $Harici->seo($value2["urunad"]); ?>"><i></i> <span class=" item_price"><?php  echo  number_format($value2["fiyat"],2,'.',','); ?></span></a></p>
							</div>
						</li>
       
               
			   <?php
			   
		
			   
			   
			   endforeach;
				
				
				?>
                     
                    
                        
                        
                        
                        
				     </ul>
				    <script type="text/javascript">
					 $(window).load(function() {
						$("#flexiselDemo3").flexisel({
							visibleItems: 4,
							animationSpeed: 1000,
							autoPlay: true,
							autoPlaySpeed: 3000,    		
							pauseOnHover: true,
							enableResponsiveBreakpoints: true,
					    	responsiveBreakpoints: { 
					    		portrait: { 
					    			changePoint:480,
					    			visibleItems: 1
					    		}, 
					    		landscape: { 
					    			changePoint:640,
					    			visibleItems: 2
					    		},
					    		tablet: { 
					    			changePoint:768,
					    			visibleItems: 3
					    		}
					    	}
					    });
					    
					});
				   </script>
				   <script type="text/javascript" src="<?php echo URL; ?>/views/design/js/jquery.flexisel.js"></script>
				   </div>
				   </div>
		<!-- content-section-ends-here -->
			<div class="news-letter">
			<div class="container">
            
            
            
		 <?php $Harici->bulten(); ?>
                
                
                
                
			</div>
		</div>

<?php require 'views/footer.php'; ?> 		
        
        
        
       