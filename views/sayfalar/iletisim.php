<?php require 'views/header.php'; ?>


<!-- contact-page -->
<div class="contact">
	<div class="container">
	
		<div class="contact-info">
			<h2>BİZE ULAŞIN</h2>
		</div>
		<div class="contact-map">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6632.248000703498!2d151.265683!3d-33.7832959!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b12abc7edcbeb07%3A0x5017d681632bfc0!2sManly+Vale+NSW+2093%2C+Australia!5e0!3m2!1sen!2sin!4v1433329298259" style="border:0"></iframe>
		</div>
		<div class="contact-form">
			<div class="contact-info">
				<h3>İLETİŞİM FORMU</h3>
			</div>
            
            <div id="FormSonuc"></div>
            
          			 <?php   
		   	 
					 Form::Olustur("1",array(
					 "id" => "iletisimForm"	 				
					 ));   ?> 
            
			
				<div class="contact-left">
                      <?php
 Form::Olustur("2",array("type"=>"text","name"=>"ad","required"=>"required","placeholder"=>"Adınız ve soyadınız")); 
 
  Form::Olustur("2",array("type"=>"text","name"=>"mail","required"=>"required","placeholder"=>"Mail adresiniz")); 
 
 
   Form::Olustur("2",array("type"=>"text","name"=>"konu","required"=>"required","placeholder"=>"Konu")); 
 
 
 ?>         
                

				</div>
				<div class="contact-right">
                
<?php				
Form::Olustur("3",array("name"=>"mesaj","placeholder"=>"Mesajınız","required"=>"required")); 
?>
				</div>
				<div class="clearfix"></div>
                
 <?php				
 Form::Olustur("2",array("type"=>"button","value"=>"GÖNDER","id"=>"İletisimbtn"));
 
 Form::Olustur("kapat");
 ?>  
                
				
			
		</div>
	</div>
</div>
<!-- //contact-page -->





<?php require 'views/footer.php'; ?> 		
        
        
        
       