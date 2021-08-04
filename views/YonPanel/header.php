<?php  ob_start();  ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

 <title>MVC | E-TİCARET | KONTROL PANELİ</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo URL; ?>/views/YonPanel/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<script src="<?php echo URL; ?>/views/design/js/jquery.min.js"></script>
<script src="<?php echo URL; ?>/views/design/js/bizim.js"></script>
  <!-- Custom styles for this template-->
  <link href="<?php echo URL; ?>/views/YonPanel/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?php echo URL; ?>/views/YonPanel/css/bizim.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-mvc sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="control.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-store"></i>
        </div>
        <div class="sidebar-brand-text mx-3">MVC Ticaret</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

     
      
      
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URL."/panel/siparisler";  ?>">
          <i class="fas fa-donate"></i>
          <span>Sipariş Yönetimi</span></a>
      </li>
      
       <li class="nav-item">
        <a class="nav-link" href="<?php echo URL."/panel/kategoriler";  ?>">
          <i class="fas fa-sliders-h"></i>
          <span>Kategori Yönetimi</span></a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="<?php echo URL."/panel/uyeler";  ?>">
          <i class="fas fa-user"></i>
          <span>Üye Yönetimi</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URL."/panel/yonetici";  ?>">
          <i class="fas fa-user-lock"></i>
          <span>Kullanıcı Yönetimi</span></a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="<?php echo URL."/panel/urunler";  ?>">
          <i class="fas  fa-award"></i>
          <span>Ürün Yönetimi</span></a>
      </li>
      
      
    
      
       <li class="nav-item">
        <a class="nav-link" href="">
          <i class="fas  fa-envelope-square"></i>
          <span>Bülten Yönetimi</span></a>
      </li>
      
       <li class="nav-item">
        <a class="nav-link" href="">
          <i class="fas  fa-cogs"></i>
          <span>Sistem Ayarları</span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="">
          <i class="fas  fa-wrench"></i>
          <span>Sistem Bakım</span></a>
      </li>
      
     
       
    

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

                    <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo Session::get("AdminAd"); ?></span>
                <img class="img-profile rounded-circle" src="<?php echo URL; ?>/views/YonPanel/img/user.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?php echo URL."/panel/sifredegistir"; ?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Şifre Değiştir
                </a>
               
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo URL."/panel/cikis"; ?>" >
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Çıkış
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

       