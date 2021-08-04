<?php require 'views/YonPanel/header.php'; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          

          <div class="row">
      <div class="col-xl-12 col-md-12 mb-12 text-center"> 
      
     
       
    
      
      <?php 
	  
	  
	  			if (isset($veri["bilgi"])) :
				
				
				echo $veri["bilgi"];
				
				
				endif;
	  
	  if (isset($veri["KargoGuncelle"])) :
	  
	
	  
	  if (!$_POST) :
	  
	  ?>
      
       <!-- BAŞLIK -->
      
       <div class="row text-left border-bottom-mvc mb-2">  
       
        	 <div class="col-xl-12 col-md-12 mb-12 border-left-mvc text-left p-2 mb-2"><h1 class="h3 mb-0 text-gray-800"> <i class="fas fa-th basliktext"></i> KARGO DURUMU GÜNCELLE </h1></div>
              
 
          </div>
          <!-- BAŞLIK --> 	
      
      <?php
	  
	  Form::Olustur("1",array(
					 "action" => URL."/panel/kargoguncelleSon",
					 "method" => "POST"				
					 ));  
	  ?>
      
            <!--  FORMUN İSKELETİ-->
          
            <div class="col-xl-12 col-md-12  text-center"> 
      
    
      
       <div class="row text-center">  
       
        	 <div class="col-xl-4 col-md-6 mx-auto">
             
             
             			<div class="row bg-gradient-beyazimsi">
             
             		<div class="col-lg-12 col-md-12 col-sm-12 bg-gradient-mvc pt-2 basliktext2"><h3>Kargo Durum Güncelle</h3></div>
                    <div class="col-lg-12 col-md-12 col-sm-12 formeleman">Mevcut Sipariş Durumu</div>
                     <div class="col-lg-12 col-md-12 col-sm-12 formeleman nocizgi">
					 <?php 	
			 Form::OlusturSelect("1",array("name"=>"durum","class"=>"form-control"));
			 	
			 Form::OlusturOption(array("value"=>"0"),$veri["KargoGuncelle"][0]["kargodurum"]=="0" ? "selected" : false,"Tedarik Sürecinde");
			 	
			 Form::OlusturOption(array("value"=>"1"),$veri["KargoGuncelle"][0]["kargodurum"]=="1" ? "selected" : false,"Paketleniyor");
			 
			 Form::OlusturOption(array("value"=>"2"),$veri["KargoGuncelle"][0]["kargodurum"]=="2" ? "selected" : false,"Kargoya Verildi");	
			  
			 Form::OlusturSelect("2",null);	?></div>
             
             
              <div class="col-lg-12 col-md-12 col-sm-12 formeleman nocizgi"><?php 		
		
			 Form::Olustur("2",array("type"=>"submit","value"=>"GÜNCELLE","class"=>"btn btn-success"));		
			 
			 Form::Olustur("2",array("type"=>"hidden","name"=>"sipno","value"=>$veri["KargoGuncelle"][0]["siparis_no"]));	 
					 
			Form::Olustur("kapat");	 ?></div>  
             
             
             
             			</div>
                        
                        
  
                        
             
             
             </div>
              
 
      			 </div>
         </div>
         
           <!--  FORMUN İSKELETİ-->
      
      
      <?php 
	  
	  	 
				
		 
	  
	  
	  
	  endif;
	  	  
	  endif; // KARGO DURUM GÜNCELLEME 
	  
	
	 
	 
	 // SİPARİŞLERİN TÜMÜNÜN GÖRÜNDÜĞÜ YER
	  if (isset($veri["data"])) :
	  
	  $dizim=array();
	  $sayi=0;
	  foreach ($veri["data"] as $value) :
	  
	  if (!in_array($value["siparis_no"],$dizim)):
	  
	  $sayi++;
	  endif;
	  
	  $dizim[]=$value["siparis_no"];
	  
	
	  
	  endforeach;
	  
	  
	  
	  
	   ?>
      
      
      
      
      
      <!-- BAŞLIK -->
      
       <div class="row text-left border-bottom-mvc mb-2">  
       
        	 <div class="col-lg-2 col-xl-2 col-md-12 mb-12 border-left-mvc text-left p-2 mb-2"><h1 class="h3 mb-0 text-gray-800"> <i class="fas fa-th basliktext"></i> SİPARİŞLER </h1></div>
              
 
    <div class="col-lg-3 col-xl-3 col-md-12 mb-12 p-2"><h1 class="h3 mb-0 text-gray-800">Toplam sipariş : <?php echo $sayi; ?></h1></div>  
             
        
     <div class="col-xl-7 col-md-12 mb-12 text-right">
     	<div class="row">
        
        <div class="col-xl-4">
        
            	  <?php
	  
	  Form::Olustur("1",array(
					 "action" => URL."/panel/siparisarama",
					 "method" => "POST"				
					 ));  
				
			 Form::OlusturSelect("1",array("name"=>"aramatercih","class"=>"form-control","id"=>"aramaselect"));
			 	
			 Form::OlusturOption(array("value"=>"sipno"),false,"Sipariş numarası");
			 	
			 Form::OlusturOption(array("value"=>"uyebilgi"),false,"Üye Bilgisi");
		
			 Form::OlusturSelect("2",null);			
				
					 
					 ?>
        
        
        
        </div>
        
        	<div class="col-xl-4">
         	  <?php
	
					 
					 
 Form::Olustur("2",array("type"=>"text","name"=>"aramaverisi","class"=>"form-control","id"=>"aramakutusu"));		 
					 
	  ?>		
		
  

            </div>
        	<div class="col-xl-4">
                   
         <?php    
             
	 Form::Olustur("2",array("type"=>"submit","value"=>"ARA","class"=>"btn btn-sm btn-mvc btn-block mt-1"));		
			 

					 
			Form::Olustur("kapat");	 ?>
             
             
            </div>
        
        </div>
     
     
    
     </div>    
       
          </div>
          <!-- BAŞLIK --> 	
          
          
        <?php 
		
		$dizi2=array();
		$toplam=array();
		$dongusayisi=0;
		$satirsayi=count($veri["data"]);
		$izin=false;
		
		  foreach ($veri["data"] as $value) :
	  
	  if (!in_array($value["siparis_no"],$dizi2)): 
	 
	  
	  $dongusayisi++;
	  
	  if (empty($toplam)) :
	  $toplam[]=$value["toplamfiyat"];
	  
	  else:
	  
	  ?>
      
      
              <!-- TOPLAM FİYAT -->
                     
                   	<div class="row"> 
                      
                    <div class="col-lg-9 text-dark kalinyap p-2"></div>    
                    <div class="col-lg-2  geneltext2 text-right p-2"><span>SİPARİŞ TOPLAMI :</span></div>  
                    <div class="col-lg-1  geneltext2 text-left kalinyap p-2"><span >
					
					<?php
					print_r(array_sum($toplam));
					
					 ?></span></div>        
                        
                    </div>    
                 <!-- TOPLAM FİYAT -->   
                 
               
      
      
      <?php
	  
	  
	    unset($toplam);
	   $toplam=array();
	    $toplam[]=$value["toplamfiyat"];
		
		
	  endif;
	  		
	  
	
	  
	?>
	  

          
          
          
          
                
      	<!-- SİPARİŞİN İSKELETİ BAŞLIYOR -->
        		 <div class="row arkaplan p-1 mt-2 pb-0">
                 	<div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 pt-3 geneltext bg-gradient-mvc">
                    <span>Sipariş No :</span> <span class="spantext"><?php echo $value["siparis_no"]; ?></span>
                    </div>
                    
                    <div class="col-xl-1 col-lg-1 col-md-12 col-sm-12 pt-3 geneltext bg-gradient-mvc">
                    <span>Üye id :</span> <span class="spantext"><?php echo $value["uyeid"]; ?></span>
                    </div>
                    
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 pt-3 geneltext bg-gradient-mvc">
                    <span>Kargo Durumu :</span> <span class="spantext">
					
					<?php 
					switch ($value["kargodurum"]) :
					
					case "0":
					echo "Tedarik Sürecinde"; 
					break;
					case "1":
					echo "Paketleniyor"; 
					break;
					case "2":
					echo "Kargoya verildi"; 
					break;
					
					endswitch;
					
					?>
                    
                    
                    </span>
                    </div>
                    
                    <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 pt-3 geneltext bg-gradient-mvc">
                    <span>Ödeme Türü :</span> <span class="spantext"><?php echo $value["odemeturu"]; ?></span>
                    </div>
                    
                    <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 pt-3 geneltext bg-gradient-mvc">
                    <span>Tarih :</span> <span class="spantext"><?php echo $value["tarih"]; ?></span>
                    </div>
                     <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 geneltext bg-gradient-mvc">
                    <a href="<?php echo URL."/panel/kargoguncelle/".$value["siparis_no"]; ?>" class="btn btn-sm btn-success btn-block mb-1">DURUM GÜNCELLE</a>
                    </div>
                    
                    <!--  ÜRÜNLER-->
           
                     <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-2 p-0">
                     
                     	<div class="row">                      
                        
<div class="col-lg-3 bg-gradient-gri text-dark kalinyap p-2">ÜRÜN ADI</div>
<div class="col-lg-3 bg-gradient-gri text-dark kalinyap p-2">ÜRÜN ADET</div>
<div class="col-lg-3 bg-gradient-gri text-dark kalinyap p-2">ÜRÜN FİYAT</div>
<div class="col-lg-3 bg-gradient-gri text-dark kalinyap p-2">TOPLAM FİYAT</div>
						</div>
                        
                        <?php 
						
						else:
						$dongusayisi++;
						
						if ($satirsayi==$dongusayisi) :
						$toplam[]=$value["toplamfiyat"];
						$izin=true;
						else:
						
						$toplam[]=$value["toplamfiyat"];
						
						
						endif;
						
						// burada başka işler var
						
						
						
						endif;
						
						
						echo '<div class="row border border-light">     
<div class="col-lg-3 text-dark kalinyap p-2">'.$value["urunad"].'</div>
<div class="col-lg-3 text-dark kalinyap p-2">'.$value["urunadet"].'</div>
<div class="col-lg-3 text-dark kalinyap p-2">'.$value["urunfiyat"].'</div>
<div class="col-lg-3 text-dark kalinyap p-2">'.$value["toplamfiyat"].'</div>             
                     </div> ';
						
						
						
						if ($izin) :
						
							  ?>
      
      
              <!-- TOPLAM FİYAT -->
                     
                   	<div class="row"> 
                      
                    <div class="col-lg-9 text-dark kalinyap p-2"></div>    
                    <div class="col-lg-2  geneltext2 text-right p-2"><span>SİPARİŞ TOPLAMI :</span></div>  
                    <div class="col-lg-1  geneltext2 text-left kalinyap p-2"><span >
					
					<?php
					print_r(array_sum($toplam));
					
					 ?></span></div>        
                        
                    </div>    
                 <!-- TOPLAM FİYAT -->   
                 
               
      
      
      <?php
						
						  unset($toplam);
	   					  $toplam=array();
						
						
						
						endif;
						
						
						
						
						
						
						  $dizi2[]=$value["siparis_no"];
	  
	
	  
	  					endforeach;
						
						
						 ?>
                        
                         
                         
                      
                        
      
                     
                          
                      
                        
                        
                        
                     
                       
                     
                     
                     </div>
                 
                   <!--  ÜRÜNLER-->
                   
               
                   
                   
                 
                 
                 
                 </div>
        
      	<!-- SİPARİŞİN İSKELETİ BİTİYOR -->
        
        <?php
        
         // SİPARİŞLERİN TÜMÜNÜN GÖRÜNDÜĞÜ YER
         

         endif; ?>  
          
  </div> 
  
      
        </div>  
<!-- /.row bitiyor -->

        </div>
        <!-- /.container-fluid -->

     

     
     
     <?php require 'views/YonPanel/footer.php'; ?>