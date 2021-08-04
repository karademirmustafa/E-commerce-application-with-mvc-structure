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
				
				
		   
	   
	  if (isset($veri["anakategori"])) :		
				
      
      ?>
      
     <!-- BAŞLIK -->
      
       <div class="row text-left border-bottom-mvc mb-2">  
       
        	 <div class="col-xl-12 col-md-12 mb-12 border-left-mvc text-left p-2 mb-2"><h1 class="h3 mb-0 text-gray-800"> <i class="fas fa-th basliktext"></i> KATEGORİ YÖNETİMİ </h1></div>
              
 
          </div>
          <!-- BAŞLIK --> 	
 
 
 
 	<!-- SİPARİŞİN İSKELETİ BAŞLIYOR -->
        		 <div class="row  p-1 mt-2 pb-0">
                 
              <!--******* ANA KATEGORİLER**************** -->                   
                 
<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12  geneltext ">
		<div class="row  m-2 p-2  ">
        
<div class="col-xl-10 col-lg-10 col-md-6 col-sm-6 pt-3 bg-gradient-mvc">ANA KATEGORİLER</div>

        <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 bg-gradient-mvc p-1"> <a href="<?php echo URL."/panel/kategoriEkle/ana/";?>" class="fas fa-plus-square m-0 p-1 eklemebuton "></a></div>

   
        	
        <!-- Eleman -->    
   <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">   
   		<div class="row kategorieleman">
     <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 pt-2 yescizgi Kategoriarkaplan"><h6 class="h6Eleman ">Kategori Adı</h6></div>
     <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 pt-2 Kategoriarkaplan"><h6 class="h6Eleman">İşlemler</h6></div>
      </div> 
   
   </div> 
       <!-- Eleman -->  
       
       <?php 
	   
	
	  
	  foreach ($veri["anakategori"] as $deger) :
	  
	  ?>
      
         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">   
   		<div class="row kategorieleman">
        
          
     	 <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9  pt-3 yescizgi"><?php echo $deger["ad"];?> </div>
             <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3  ">
             <div class="row">
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 text-right"> 
              <a href="<?php echo URL."/panel/kategoriGuncelle/ana/".$deger["id"];?>" class="fas fa-sync mt-2   p-1  guncelbuton"></a></div>
               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 text-left"> 
                <a href="<?php echo URL."/panel/kategoriSil/ana/".$deger["id"];?>" class="fas fa-times mt-1 p-1   silbuton"></a></div>
             
             
             </div>


  
  </div>  



          
             </div> 
   
   </div> 
      
      <?php
	  
	  
	  endforeach;
	   ?>    
   	

   
   <!-- Eleman -->      
   
   
   
   
          
          
        </div>

                    </div>
                    
           <!--********ANA KATEGORİLER BİTTİ*************** -->         
                    
         
   <!--*********ÇOCUK KATEGORİLER************** -->                   
                 
<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12  geneltext ">
		<div class="row  m-2 p-2  ">
        
<div class="col-xl-10 col-lg-10 col-md-6 col-sm-6 pt-3 bg-gradient-mvc">ÇOCUK KATEGORİLER</div>

        <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 bg-gradient-mvc p-1"> <a href="<?php echo URL."/panel/kategoriEkle/cocuk";?>" class="fas fa-plus-square m-0 p-1 eklemebuton "></a></div>

   
        	
        <!-- Eleman -->    
   <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">   
   		<div class="row kategorieleman">
     <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 pt-2 yescizgi Kategoriarkaplan"><h6 class="h6Eleman ">Kategori Adı</h6></div>
     <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 pt-2 Kategoriarkaplan"><h6 class="h6Eleman">İşlemler</h6></div>
      </div> 
   
   </div> 
       <!-- Eleman -->      
   	
   <?php 
	   
	 
	  
	  foreach ($veri["cocukkategori"] as $deger) :
	  
	  ?>
      
         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">   
   		<div class="row kategorieleman">
        
          
     	 <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9  pt-3 yescizgi"><?php echo $deger["ad"];?> </div>
             <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3  ">
             <div class="row">
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 text-right"> 
              <a href="<?php echo URL."/panel/kategoriGuncelle/cocuk/".$deger["id"];?>" class="fas fa-sync mt-2   p-1  guncelbuton"></a></div>
               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 text-left"> 
                <a href="<?php echo URL."/panel/kategoriSil/cocuk/".$deger["id"];?>" class="fas fa-times mt-1 p-1   silbuton"></a></div>
             
             
             </div>


  
  </div>  



          
             </div> 
   
   </div> 
      
      <?php
	  
	  
	  endforeach;
	   ?>    
   	
   
   <!-- Eleman -->      
   
   
   
   
          
          
        </div>

                    </div>
                    
           <!--******ÇOCUK KATEGORİLER BİTTİ***************** -->      
           
           
             <!--*******ALT KATEGORİLER**************** -->                   
                 
<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12  geneltext ">
		<div class="row  m-2 p-2  ">
        
<div class="col-xl-10 col-lg-10 col-md-6 col-sm-6 pt-3 bg-gradient-mvc">ALT KATEGORİLER</div>

        <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 bg-gradient-mvc p-1"> <a href="<?php echo URL."/panel/kategoriEkle/alt" ;?>" class="fas fa-plus-square m-0 p-1 eklemebuton "></a></div>

   
        	
        <!-- Eleman -->    
   <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">   
   		<div class="row kategorieleman">
     <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 pt-2 yescizgi Kategoriarkaplan"><h6 class="h6Eleman ">Kategori Adı</h6></div>
     <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 pt-2 Kategoriarkaplan"><h6 class="h6Eleman">İşlemler</h6></div>
      </div> 
   
   </div> 
       <!-- Eleman -->      
   	
   <?php 
	   
	 
	  
	  foreach ($veri["altkategori"] as $deger) :
	  
	  ?>
      
         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">   
   		<div class="row kategorieleman">
        
          
     	 <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9  pt-3 yescizgi"><?php echo $deger["ad"];?> </div>
             <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3  ">
             <div class="row">
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 text-right"> 
              <a href="<?php echo URL."/panel/kategoriGuncelle/alt/".$deger["id"];?>" class="fas fa-sync mt-2   p-1  guncelbuton"></a></div>
               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 text-left"> 
                <a href=" <?php echo URL."/panel/kategoriSil/alt/".$deger["id"];?>" class="fas fa-times mt-1 p-1   silbuton"></a></div>
             
            
             </div>


  
  </div>  



          
             </div> 
   
   </div> 
      
      <?php
	  
	  
	  endforeach;
	   ?>    
   	
   
   <!-- Eleman -->      
   
   
   
   
          
          
        </div>

                    </div>
                    
           <!--*******ALT KATEGORİLER BİTTİ**************** -->                  
                     
               
               
                   
                   
                 
                 
                 
                 </div>
        
      	<!-- SİPARİŞİN İSKELETİ BİTİYOR -->
 
 
 
 
 <?php  endif; ?>
 
 
 
          
  </div> 
  
      
        </div>  
<!-- /.row bitiyor -->

        </div>
        <!-- /.container-fluid -->

     

     
     
     <?php require 'views/YonPanel/footer.php'; ?>