<?php
session_start();
if (!$_SESSION['role'])
{
    header('location:login.php?pesan=1');
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>ADMINISTRASI | SMK MANDALA SEMARANG</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      <link rel="icon" href="images/fevicon.png" type="image/png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <!-- site css -->
      <link rel="stylesheet" href="style.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="css/responsive.css" />
      <!-- color css -->
      <link rel="stylesheet" href="css/colors.css" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="css/custom.css" />
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->

   </head>
   <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            <nav id="sidebar">
               <div class="sidebar_blog_1">
                  <div class="sidebar-header">
                     <div class="logo_section">
                        <a href="index.html"><img class="logo_icon img-responsive" src="images/logo/logo_icon.png" alt="#" /></a>
                     </div>
                  </div>
                  <div class="sidebar_user_info">
                     <div class="icon_setting"></div>
                     <div class="user_profle_side">
                        <div class="user_img"><img class="img-responsive" src="images/layout_img/user_img.jpg" alt="#" /></div>
                        <div class="user_info">
                           <h6><?php echo $_SESSION['nama'];?></h6>
                           <p><span class="online_animation"></span> Online</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="sidebar_blog_2">
                  <h4><?= $_SESSION['role'];?></h4>
                  <ul class="list-unstyled components">
                     <li class="active">
                     <a href="./"><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a>
                     </li>
                     <li class="active">
                        <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-dashboard yellow_color"></i> <span>Master Data</span></a>
                        <ul class="collapse list-unstyled" id="dashboard">
                           <li>
                              <a href="index.php?page=datapengguna"><i class="fa fa-users orange_color"></i> <span>Pengguna</span></a>
                           </li>
                           <li>
                              <a href="index.php?page=datakelas"><i class="fa fa-users orange_color"></i> <span>Kelas</span></a>
                           </li>
                           <li>
                              <a href="index.php?page=datasiswa"><i class="fa fa-users orange_color"></i> <span>Siswa</span></a>
                           </li>
                           <li>
                              <a href="index.php?page=dataspp"><i class="fa fa-users orange_color"></i> <span>SPP</span></a>
                           </li>
                        </ul>
                     </li>
                     <li><a href="index.php?page=datapengeluaran"><i class="fa fa-bar-chart-o green_color"></i> <span>Pengeluaran</span></a></li>
                     <li><a href="index.php?page=laporan"><i class="fa fa-file purple_color2"></i> <span>Laporan</span></a></li>
                     <li><a href="logout.php" onclick="return confirmLogout()"><i class="fa fa-power-off red_color"></i> <span>Logout</span></a></li>

                     <script>
                        function confirmLogout() {
                           return confirm("Apakah Anda yakin ingin keluar?");
                        }
                     </script>
                                          
                   
                  </ul>
               </div>
            </nav>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <div class="topbar">
                  <nav class="navbar navbar-expand-lg navbar-light">
                     <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                        <div class="logo_section">
                           <a href="index.html"><img class="img-responsive" src="images/logo/logo.png" alt="#" /></a>
                        </div>
                        <div class="right_topbar">
                           <div class="icon_info">
                             
                              <ul class="user_profile_dd">
                                 <li>
                                    <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src="images/layout_img/user_img.jpg" alt="#" /><span class="name_user"><?= $_SESSION['nama'];?></span></a>
                                    <div class="dropdown-menu">
                                       <a class="dropdown-item" href="#">My Profile</a>
                                       <a class="dropdown-item" href="#">Settings</a>
                                       <a class="dropdown-item" href="#">Help</a>
                                       <a class="dropdown-item" href="logout.php"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </nav>
               </div>
               <!-- end topbar -->
               <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                  <?php
                     if (!isset($_GET['page'])) {
                        include 'home.php';
                     } elseif ($_GET['page'] == 'datapengguna') {
                        include 'datapengguna.php';
                     }elseif ($_GET['page'] == 'tambahpengguna') {
                        include 'tambahpengguna.php';
                     } elseif ($_GET['page'] == 'editpengguna') {
                        include 'editpengguna.php';
                     }elseif ($_GET['page'] == 'hapuspengguna') {
                        include 'hapuspengguna.php';
                     }
                     //Kelas
                     elseif ($_GET['page'] == 'datakelas') {
                        include 'datakelas.php';
                     }elseif ($_GET['page'] == 'tambahkelas') {
                        include 'tambahkelas.php';
                     } elseif ($_GET['page'] == 'editkelas') {
                        include 'editkelas.php';
                     }elseif ($_GET['page'] == 'hapuskelas') {
                        include 'hapuskelas.php';
                     }
                     //Siswa
                     elseif ($_GET['page'] == 'datasiswa') {
                        include 'datasiswa.php';
                     }elseif ($_GET['page'] == 'tambahsiswa') {
                        include 'tambahsiswa.php';
                     } elseif ($_GET['page'] == 'editsiswa') {
                        include 'editsiswa.php';
                     }elseif ($_GET['page'] == 'hapussiswa') {
                        include 'hapussiswa.php';
                     }
                     //SPP
                     elseif ($_GET['page'] == 'dataspp') {
                        include 'dataspp.php';
                     }elseif ($_GET['page'] == 'tambahspp') {
                        include 'tambahspp.php';
                     } elseif ($_GET['page'] == 'editspp') {
                        include 'editspp.php';
                     }elseif ($_GET['page'] == 'hapusspp') {
                        include 'hapusspp.php';
                     }
                   
                     
                     elseif ($_GET['page'] == 'laporan') {
                        include 'laporan.php';
                     }
                     
                     ?>
                  </div>
                  <!-- footer -->
                  <div class="container-fluid">
                     <div class="footer">
                     <p>Hak Cipta © 2025 Dikembangkan oleh Kudus Jitmau. Semua hak dilindungi.<br><br>
                        Didistribusikan oleh: <a href="https://www.amikjtc.com/">AMIK JTC SEMARANG</a>
                     </p>
                     </div>
                  </div>
               </div>
               <!-- end dashboard inner -->
            </div>
         </div>
      </div>
      <!-- jQuery -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="js/animate.js"></script>
      <!-- select country -->
      <script src="js/bootstrap-select.js"></script>
      <!-- owl carousel -->
      <script src="js/owl.carousel.js"></script> 
      <!-- chart js -->
      <script src="js/Chart.min.js"></script>
      <script src="js/Chart.bundle.min.js"></script>
      <script src="js/utils.js"></script>
      <script src="js/analyser.js"></script>
      <!-- nice scrollbar -->
      <script src="js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
      <script src="js/chart_custom_style1.js"></script>

   </body>
</html>