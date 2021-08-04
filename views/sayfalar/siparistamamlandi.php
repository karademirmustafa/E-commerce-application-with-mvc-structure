<?php require 'views/header.php';  ?>


<?php


 if (isset($veri["siparisno"]) && isset($veri["toplamtutar"])) :
 
 
 


 if (Session::get("kulad") && Session::get("uye")) :
 
 Session::OturumKontrol("uye_panel",Session::get("kulad"),Session::get("uye"));
 
  ?>

	<div class="container" id="sipTamamlaİskelet" >
    
    	<div class="row" id="tamamlandi">
        
        <div class="col-md-12">
        
        
        
        
        <h3 class="alert alert-success">TEŞEKKÜRLER Siparişiniz başarıyla oluşturulmuştur</h3>
        
        <p class="sipno">Sipariş Numaranız : 
		<?php   if (isset($veri["siparisno"])) :			
			echo $veri["siparisno"];		
			
            endif; ?><br />Ödenecek Tutar : 
            <?php   if (isset($veri["toplamtutar"])) :			
			echo number_format($veri["toplamtutar"],2,',','.')." TL";		
			
            endif; ?>
            
            </p>
          <p>Siparişinizi numaranız ile takip edebilirsiniz. Siparişlerinizin kargoya verilebilmesi için aşağıda bulunan hesap numaralarımıza 3 (üç) iş günü içerisinde ödeme yapmanız ve açıklama kısmına sipariş numaranızı yazmanız gerekmektedir. Belirtilen süre içerisinde ödemesi yapılmayan siparişler sistem tarafından otomatik iptal edilecektir.</p>
        		

        </div>
        
        
        
                  <div class="col-md-12" id="bankalarinAnasi">
                  		<div class="row">
                        
                        		  <div class="col-md-4" id="Bankcerceve">
                                  
                                  			<div class="row" >
                                            		<div class="col-md-12" id="Bankbaslik">İŞ BANKASI</div>
                                                    <div class="col-md-3">Hesap Adı</div> 
                                                    <div class="col-md-9">MVC PROJE-OLCİ</div> 
                                               <div class="col-md-3">İBAN</div> 
                                                    <div class="col-md-9">TR06 0000 0000 0000 0000 0000 0000  </div>      
                                          
                                          
                                          
                                            </div>
                                  
                                  
                                  		
                                  
                                  
                                  
                                  </div>
                                  
                                  
                                  
                                  <div class="col-md-4" id="Bankcerceve">
                       			<div class="row" >
                                            		<div class="col-md-12"  id="Bankbaslik">AKBANK</div>
                                                    <div class="col-md-3">Hesap Adı</div> 
                                                    <div class="col-md-9">MVC PROJE-OLCİ</div> 
                                               <div class="col-md-3">İBAN</div> 
                                                    <div class="col-md-9">TR06 0000 0000 0000 0000 0000 0000  </div>      
                                          
                                          
                                          
                                            </div>
                                  
                                  </div>
                                  
                                  
                                     <div class="col-md-4" id="Bankcerceve"> 
                               			<div class="row" >
                                            		<div class="col-md-12"  id="Bankbaslik">GARANTİ</div>
                                                    <div class="col-md-3">Hesap Adı</div> 
                                                    <div class="col-md-9">MVC PROJE-OLCİ</div> 
                                               <div class="col-md-3">İBAN</div> 
                                                    <div class="col-md-9">TR06 0000 0000 0000 0000 0000 0000  </div>      
                                          
                                          
                                          
                                            </div>
                                  
                                  </div>
                                  
                                  
                        
                        </div>
                  
                
                 </div>
        
        </div>
    
    
	
</div>

<?php
else:
	// OTURUM KONTROLÜ YAPIYOR
	header("Location:".URL);
	
	endif;
	
	
	
				
 else:
	// VERİLER GELİYOR MU BAKIYOR/ GELMİYOR İSE DEMEK Kİ HARİCİ BİR ERİŞİM VAR YÖNLENDİRİYOR
	header("Location:".URL);
 
 endif;
	
?>


<?php require 'views/footer.php'; ?> 		
        
        
        
       