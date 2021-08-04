<?php require 'views/header.php';  ?>


<?php

/* BU SAYFANIN GÖRÜNTÜLENMESİNDE OTURUM KONTROLÜ YANI SIRA SEPETTE ÜRÜN VARMI DİYE KONTROL
EDİLECEK VE SEPETTE ÜRÜN YOK İSE BU SAYFA GÖRÜNTÜLENEMEYECEK */ 

if (isset($_COOKIE["urun"])) :




 if (Session::get("kulad") && Session::get("uye")) : 
 Session::OturumKontrol("uye_panel",Session::get("kulad"),Session::get("uye"));
 
 ?>

	<div class="container" id="sipTamamlaİskelet" >
    
    	<div class="row">
        
        		<div class="col-md-7" id="soltaraf">
                	<div class="row">
                    
                    	<div class="col-md-6">
                        	<div class="row" id="uyelik">
                            	<div class="col-md-12"><h4>ÜYELİK BİLGİLERİ</h4></div>
<?php Form::Olustur("1",array("method"=>"POST","action"=>URL."/uye/siparisTamamlandi")) ?>
                                
                                
                                <?php $sonuc=$Harici->UyeBilgileriniGetir(); ?>
                                <div class="col-md-3" id="label">Ad</div>
                           		 <div class="col-md-9" id="input"><?php Form::Olustur("2",array("type" => "text", "id" => "sipAd", "name" => "ad", "value"=>$sonuc[0]["ad"],"class"=>"form-control")) ?></div>
                                 <div class="col-md-3" id="label">Soyad</div>
                           		 <div class="col-md-9" id="input"><?php Form::Olustur("2",array("type" => "text", "id" => "sipSoyad","name" => "soyad", "value"=>$sonuc[0]["soyad"],"class"=>"form-control")) ?></div>
                                 
                                       <div class="col-md-3" id="label">Mail</div>
                           		 <div class="col-md-9" id="input"><?php Form::Olustur("2",array("type" => "text", "id" => "sipMail","name" => "mail", "value"=>$sonuc[0]["mail"],"class"=>"form-control")) ?></div>
                                 <div class="col-md-3" id="label">Telefon</div>
                           		 <div class="col-md-9" id="input"><?php Form::Olustur("2",array("type" => "text", "id" => "sipTlf","name" => "telefon", "value"=>$sonuc[0]["telefon"],"class"=>"form-control")) ?></div>
                                 
           
           
           
           <div class="col-md-12" id="radioBtn"><?php Form::Olustur("2",array("type" => "radio", "name" => "bilgiTercih","checked"=>"checked","value"=>0)) ?> Üyelik Bilgilerimi Kullan</div>
           
             <div class="col-md-12" id="radioBtn"><?php Form::Olustur("2",array("type" => "radio", "name" => "bilgiTercih","value"=>1)) ?> Farklı Bilgiler Kullan</div>
                           	
           
                                 
                            
                            </div>
                        </div>
                        
                        
                        <div class="col-md-6">
                        <div class="row" id="uyelik">
                            	<div class="col-md-12"><h4>ADRESLER</h4></div>
                                
                               
                                
                                 <?php 
								 
								 foreach ($Harici->UyeAdresleriniGetir() as $deger) :
								 echo ' <div class="col-md-12" id="adresSatir">
								 
								 <div class="row" id="adressecim">
								 <div class="col-md-9">'.$deger["adres"].'</div>
								 <div class="col-md-3">';
								 
								 if ($deger["varsayilan"]==1) :
	Form::Olustur("2",array("type" => "radio","value" => $deger["id"], "name" => "adrestercih","checked"=>"checked","id"=>"radioBtn"));	
	
	echo "Varsayılan";
	
	
	else:
	
	Form::Olustur("2",array("type" => "radio","value" => $deger["id"], "name" => "adrestercih","id"=>"radioBtn"));			 
								 endif;
								 


echo'</div>
								 
								 </div>
								 
								 
								 
								 
								  </div>';
								 endforeach;
								 
								 
								 ?>
                                
                            
                            </div>
                        
                        </div>
                        
                    <div class="col-md-12">
                    
                      <div class="row" id="uyelik">
                            	<div class="col-md-12"><h4>ÖDEME YÖNTEMİ</h4></div>
                                
                           <div class="col-md-6" id="adresSatir">
                                
                               <label>
  <?php Form::Olustur("2",array("type" => "radio","value" => "1", "name" => "odeme","checked"=>"checked")); ?> HAVALE / EFT
                               </label>
                            
                            </div>
                            
                             <div class="col-md-6" id="adresSatir">
                                
                                                   <label>
  <?php Form::Olustur("2",array("type" => "radio","disabled" => "disabled")); ?> KREDİ KARTI (Yakında)
                               </label>
                               
                               
                               
                                
                                </div>
                            
                            </div>
                    
                    
                    </div>
                    
                    </div>
                
                
                
                </div>
                
                
                
                <div class="col-md-5">
                		
                        <div class="row" id="sagtaraf">
                        
                    	<div class="col-md-12" id="baslik"><h3>SEPETTEKİ ÜRÜNLERİNİZ</h3></div>
                        <div class="col-md-3" id="icbaslik">Ürün Ad</div>
                        <div class="col-md-3" id="icbaslik">Adet</div>
                        <div class="col-md-3" id="icbaslik">Birim Fiyat</div>
                        <div class="col-md-3" id="icbaslik">Toplam</div>
                        <!-- SEPETTEKİ ÜRÜNLER BURADA LİSTELENECEK -->
                      <?php 
                       $toplamAdet=0;
						$toplamfiyat=0;
					   
					   
                       	foreach ($_COOKIE["urun"] as $id => $adet) :
				
				
				 $GelenUrun=$Harici->UrunCek($id);
				
	 			echo'  <div class="col-md-3" id="icurunler">'.$GelenUrun[0]["urunad"].'</div>
                        <div class="col-md-3" id="icurunler">'.$adet.'</div>
                        <div class="col-md-3" id="icurunler">'.number_format($GelenUrun[0]["fiyat"],2,'.',',').'</div>
                        <div class="col-md-3" id="icurunler">'.number_format($GelenUrun[0]["fiyat"]*$adet,2,',','.').'</div>';
				   
				   

			 
			  
			 $toplamAdet  += $adet;
			 $toplamfiyat += $GelenUrun[0]["fiyat"]*$adet;
			 
				
				endforeach; 
				
				
				echo'<div class="col-md-3" id="toplam">Toplam Adet</div>
                        <div class="col-md-3" id="toplam">'.$toplamAdet.'</div>
                        <div class="col-md-3" id="toplam">Toplam Tutar</div>
                        <div class="col-md-3" id="toplam">'.number_format($toplamfiyat,2,',','.').'</div>';	
				
				
				?>      
                        
                        
                        </div>
                        
                        <div class="row">
                        
                        				
			<div class="col-md-12">
<?php 
Form::Olustur("2",array("type" => "hidden","value"=>$toplamfiyat,"name"=>"toplam"));

Form::Olustur("2",array("type" => "submit","value"=>"TAMAMLA","class"=>"btn btn_1")); 
	  Form::Olustur("kapat");

			
            if (isset($veri["bilgi"])) :			
			echo $veri["bilgi"];		
			
            endif;
?>            
            
			</div>			
						
                        
                        
                        </div>
                        
                        
                
                </div>
                
                
        
        
        
        	

        
        </div>
    
    
	
</div>

<?php
else:
	// BU OTURUM AÇILMIŞMI ONA BAKIYOR
	header("Location:".URL);
	
	endif;
	
	
	
	else:
	// BU SEPETTE ÜRÜN VARMI ONA BAKIYOR
	header("Location:".URL);
	
	
	
	endif;
	
	
?>


<?php require 'views/footer.php'; ?> 		
        
        
        
       