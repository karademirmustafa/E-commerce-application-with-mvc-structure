<?php require 'views/header.php'; ?>


<?php if (!Session::get("kulad") && !Session::get("uye")) : 
Session::OturumKontrol("uye_panel",Session::get("kulad"),Session::get("uye"));

?>

  <div class="content">
	<div class="container">
		<div class="login-page">
			    <div class="dreamcrub">
			   	 <ul class="breadcrumbs">
                    <li class="home">
                       <a href="<?php echo URL; ?>" title="Anasayfa">Anasayfa</a>&nbsp;
                       <span>&gt;</span>
                    </li>
                    <li class="women">
                       Giriş
                    </li>
                </ul>
                <ul class="previous">
                	<li><a href="<?php echo URL; ?>">Geri Dön</a></li>
                </ul>
                <div class="clearfix"></div>
			   </div>
			   <div class="account_grid">
			   <div class="col-md-6 login-left wow fadeInLeft" data-wow-delay="0.4s">
               
			  	 <h2>HEMEN ÜYE OL</h2>
				 <p>Yeni üye olarak, avantajları yakalayabilirisin.</p>
				 <a class="acount-btn" href="<?php echo URL; ?>/uye/hesapOlustur">ÜYE OL</a>
			   </div>
			   <div class="col-md-6 login-right wow fadeInRight" data-wow-delay="0.4s">
			  	<h3>ÜYE GİRİŞİ</h3>
				<p>Üye girişi yaparak, siparişlerinizi hızlı ve kolay bir şekilde verebilirsiniz.</p>
                <?php
				
				
		
				
				 Form::Olustur("1",array(
					 "action" => URL."/uye/giriskontrol",
					 "method" => "POST"				
					 )); 
				?>
				
				  <div>
					<span>Kullanıcı Adı<label>*</label></span>
<?php Form::Olustur("2",array("type"=>"text","name"=>"ad","required"=>"required")); ?>       
                    
			
				  </div>
				  <div>
					<span>Şifre<label>*</label></span>
<?php Form::Olustur("2",array("type"=>"password","name"=>"sifre","required"=>"required"));?>           
                    
			
				  </div>
                  <div>
					            <?php
								
								
								
								if (isset($veri["bilgi"])) :
								
								echo $veri["bilgi"];
								
								endif;
				
			   
			   ?>
				  </div> 
                  
            
                  
				  <a class="forgot" href="#">Şifremi Unuttum?</a>
                  
<?php
 Form::Olustur("2",array("type"=>"submit","value"=>"GİRİŞ"));
 Form::Olustur("2",array("type"=>"hidden","name"=>"giristipi","value"=>"uye"));
 Form::Olustur("kapat"); 
?>     
                  
            
			   </div>	
			   <div class="clearfix"> </div>
			 </div>
		   </div>
</div>


<?php
else:
	
	header("Location:".URL);
	
	endif;
?>


<?php require 'views/footer.php'; ?> 		
        
        
        
       