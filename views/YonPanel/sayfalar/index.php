
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>MVC-E | E-TİCARET | GİRİŞ</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo URL; ?>/views/YonPanel/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo URL; ?>/views/YonPanel/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-mvc">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-5 col-lg-5 col-md-5 mt-5">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
             
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">YÖNETİCİ GİRİŞİ</h1>
                  </div>
                  <?php 	
					 
           Form::Olustur("1",array(
          "action" => URL."/uye/giriskontrol",
          "method" => "POST"				
          ));  ?>
        
        
        
           
                    <div class="form-group">
                     
              
                   <?php 
                   Form::Olustur("2",array("type"=>"text","class"=>"form-control form-control-user","name"=>"AdminAd","autofocus"=>"autofocus","required"=>"required","placeholder"=>"Kullanıcı adınızı giriniz"));
                    ?>      </div>
                    <div class="form-group">
                    <?php 
                   Form::Olustur("2",array("type"=>"password","class"=>"form-control form-control-user","name"=>"Adminsifre","required"=>"required","placeholder"=>"Şifrenizi Yazınız","id"=>"exampleInputPassword"));
                    ?>
                      
                    </div>
                    
                  <div class="form-group text-center">
                 <?php 
                 
                 Form::Olustur("2",array("type"=>"hidden","name"=>"giristipi","value"=>"yon"));
                 
                 Form::Olustur("2",array("type"=>"submit","value"=>"GİRİŞ YAP","class"=>"btn btn-danger"));	
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
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo URL; ?>/views/YonPanel/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo URL; ?>/views/YonPanel/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo URL; ?>/views/YonPanel/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo URL; ?>/views/YonPanel/js/sb-admin-2.min.js"></script>

</body>

</html>
