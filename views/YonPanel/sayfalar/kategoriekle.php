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
				
				
	  
	  
	  
	  
	  
	  if (!$_POST) :
	  ?>
      
       <!-- BAŞLIK -->
      
       <div class="row text-left border-bottom-mvc mb-2">  
       
        	 <div class="col-xl-12 col-md-12 mb-12 border-left-mvc text-left p-2 mb-2"><h1 class="h3 mb-0 text-gray-800"> <i class="fas fa-th basliktext"></i> KATEGORİ EKLEME </h1></div>
              
 
          </div>
          <!-- BAŞLIK --> 	
      
      <?php
	  
	  Form::Olustur("1",array(
					 "action" => URL."/panel/kategoriEkleSon",
					 "method" => "POST"				
					 ));  
	  ?>
      
            <!--  FORMUN İSKELETİ-->
          
            <div class="col-xl-12 col-md-12  text-center"> 
      
    
      
       <div class="row text-center">  
       
        	 <div class="col-xl-4 col-md-6 mx-auto">
             
             
             			<div class="row bg-gradient-beyazimsi">
             
             		<div class="col-lg-12 col-md-12 col-sm-12 bg-gradient-mvc pt-2 basliktext2"><h3>Kategori Güncelle</h3></div>
                <div class="col-lg-12 col-md-12 col-sm-12 formeleman">Kategori Adı</div>    
                   	 <?php 	
					 
					switch ($veri["kriter"]) :
					
					case "ana":
					
echo '<div class="col-lg-12 col-md-12 col-sm-12 formeleman">';
  	
 Form::Olustur("2",array("type"=>"text","name"=>"katad","class"=>"form-control m-2"));	                  
   Form::Olustur("2",array("type"=>"hidden","name"=>"kriter","value"=>$veri["kriter"]));	                  
       echo '</div>';      
					
					break;
					
					case "cocuk":
					
echo '<div class="col-lg-12 col-md-12 col-sm-12 formeleman">';					
  	
 Form::Olustur("2",array("type"=>"text","name"=>"katad","class"=>"form-control m-2"));	
        echo '</div>';   
		
echo '<div class="col-lg-12 col-md-12 col-sm-12 formeleman">Ana kategori';				
		
  
 Form::OlusturSelect("1",array("name"=>"anakatid","class"=>"form-control m-2"));
					 
			 foreach ($veri["AnaktegorilerTumu"] as $deger) :			 
		
		  Form::OlusturOption(array("value"=>$deger["id"]),false,$deger["ad"]); 	
			
			 
			 endforeach;
 
 			  
			 Form::OlusturSelect("2",null); 
   Form::Olustur("2",array("type"=>"hidden","name"=>"kriter","value"=>$veri["kriter"]));	
 		        echo '</div>';  		
					
					
					break;
					
					case "alt":
					
					
echo '<div class="col-lg-12 col-md-12 col-sm-12 formeleman">';					
  	
 Form::Olustur("2",array("type"=>"text","name"=>"katad","class"=>"form-control m-2"));	
        echo '</div>';   
		
echo '<div class="col-lg-12 col-md-12 col-sm-12 formeleman">Ana kategori';				
		
  
 Form::OlusturSelect("1",array("name"=>"anakatid","class"=>"form-control m-2"));
					 
			 foreach ($veri["AnaktegorilerTumu"] as $deger) :
			
			  Form::OlusturOption(array("value"=>$deger["id"]),false,$deger["ad"]); 
		
			 endforeach;
 
 			  
			 Form::OlusturSelect("2",null); 
   Form::Olustur("2",array("type"=>"hidden","name"=>"kriter","value"=>$veri["kriter"]));	
 		        echo '</div>';  
				
				
				
	echo '<div class="col-lg-12 col-md-12 col-sm-12 formeleman">Çocuk kategori';				
		
  
 Form::OlusturSelect("1",array("name"=>"cocukkatid","class"=>"form-control m-2"));
					 
			 foreach ($veri["CocukkategorilerTumu"] as $deger) :	 
				
			  Form::OlusturOption(array("value"=>$deger["id"]),false,$deger["ad"]); 		
			
			 
			 endforeach;
 
 			  
			 Form::OlusturSelect("2",null); 
 
 		        echo '</div>'; 			
				
				
				
					
					
					break;
					
					
					
					
					endswitch;
					
					?>
                   
                   
                    
       
             
              <div class="col-lg-12 col-md-12 col-sm-12 formeleman nocizgi"><?php 		
		
 Form::Olustur("2",array("type"=>"submit","value"=>"EKLE","class"=>"btn btn-success"));		
			 
 			 
			Form::Olustur("kapat");	 ?></div>  
             
             
             
             			</div>
                        
                        
  
                        
             
             
             </div>
              
 
      			 </div>
         </div>
         
           <!--  FORMUN İSKELETİ-->
      
      
      <?php 
	  
	  	 
				
		 
	  
	  
	  
	
	  	  
	  endif; 
	  
	
	 
	?>
          
  </div> 
  
      
        </div>  
<!-- /.row bitiyor -->

        </div>
        <!-- /.container-fluid -->

     

     
     
     <?php require 'views/YonPanel/footer.php'; ?>