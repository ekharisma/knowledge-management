
<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
//include('../koneksi/config.php');
//include('aksi/akses.php');
require 'config/db_sql.php';

session_start();

$id_pengguna    = $_SESSION['id_pengguna'];
$nama           = $_SESSION['nama'];
$foto           = $_SESSION['foto'];
$direktorat    = $_SESSION['direktorat'];
$divisi          = $_SESSION['divisi'];
$divisib        = str_replace(" ", "", $divisi);


?>
<!DOCTYPE html>
<!--
Template Name: Midone - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" class="dark">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <link href="dist/images/logo.svg" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Midone admin template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="LEFT4CODE">
        <title>Dashboard - Midone - Tailwind HTML Admin Template</title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="dist/css/app.css" />
        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    <body class="app">
        <!-- BEGIN: Mobile Menu -->
        <div class="mobile-menu md:hidden">
            <div class="mobile-menu-bar">
                <a href="" class="flex mr-auto">
                    <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="dist/images/logo.svg">
                </a>
                <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
            </div>
            <ul class="border-t border-theme-24 py-5 hidden">
                <li>
                    <a href="index.php?home" class="menu menu--active">
                        <div class="menu__icon"> <i data-feather="home"></i> </div>
                        <div class="menu__title"> Home </div>
                    </a>
                </li>
                <li>
                    <a href="index.php?dashboard" class="menu ">
                        <div class="menu__icon"> <i data-feather="hard-drive"></i> </div>
                        <div class="menu__title"> Dashboard </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-feather="box"></i> </div>
                        <div class="menu__title"> Berkas <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="index.php?berkas&id=1" class="film">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Video </div>
                            </a>
                        </li>
                        <li>
                            <a href="index.php?berkas&id=2" class="file-text">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Document </div>
                            </a>
                        </li>
                        <li>
                            <a href="index.php?berkas&id=3" class="music">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Audio </div>
                            </a>
                        </li>
                        <li>
                            <a href="index.php?berkas&id=4" class="database">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Lain-lain </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="index.php?upload" class="menu">
                        <div class="menu__icon"> <i data-feather="sunrise"></i> </div>
                        <div class="menu__title"> Upload </div>
                    </a>
                </li>
                <li>
                    <a href="index.php?profil-detail&id=<?php echo $id_pengguna; ?>&jenis=1" class="user">
                        <div class="menu__icon"> <i data-feather="hard-drive"></i> </div>
                        <div class="menu__title"> Profil </div>
                    </a>
                </li>
                <!-- divider menu FILE-->
                <li class="menu__devider my-6"></li>
                <li>
                    <a href="index.php?private" class="menu">
                        <div class="menu__icon"> <i data-feather="lock"></i> </div>
                        <div class="menu__title"> Private </div>
                    </a>
                </li>
                <li>
                    <a href="index.php?public" class="menu">
                        <div class="menu__icon"> <i data-feather="unlock"></i> </div>
                        <div class="menu__title"> Public </div>
                    </a>
                </li>
            </ul>
        </div>
        <!-- END: Mobile Menu -->
        <div class="flex">
            <!-- BEGIN: Side Menu -->
            <nav class="side-nav">
                <a href="" class="intro-x flex items-center pl-5 pt-4">
                    <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="dist/images/logo.svg">
                    <span class="hidden xl:block text-white text-lg ml-3"> Mid<span class="font-medium">one</span> </span>
                </a>
                <div class="side-nav__devider my-6"></div>
                <ul>
                    <li>
                        <a href="index.php?home" class="side-menu side-menu--active">
                            <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                            <div class="side-menu__title"> Home </div>

                        </a>
                    </li>
                    <li>
                        <a href="index.php?dashboard" class="side-menu">
                            <div class="side-menu__icon"> <i data-feather="hard-drive"></i> </div>
                            <div class="side-menu__title"> Dashboard </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="side-menu">
                            <div class="side-menu__icon"> <i data-feather="box"></i> </div>
                            <div class="side-menu__title"> Berkas <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="index.php?berkas&id=1" class="side-menu">
                                    <div class="side-menu__icon"> <i data-feather="film"></i> </div>
                                    <div class="side-menu__title"> Video </div>
                                </a>
                            </li>
                            <li>
                                <a href="index.php?berkas&id=2" class="side-menu">
                                    <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                                    <div class="side-menu__title"> Dokument </div>
                                </a>
                            </li>
                            <li>
                                <a href="index.php?berkas&id=3" class="side-menu">
                                    <div class="side-menu__icon"> <i data-feather="music"></i> </div>
                                    <div class="side-menu__title"> Audio </div>
                                </a>
                            </li>
                            <li>
                                <a href="index.php?berkas&id=4" class="side-menu">
                                    <div class="side-menu__icon"> <i data-feather="database"></i> </div>
                                    <div class="side-menu__title"> Lain-lain </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="index.php?upload" class="side-menu">
                            <div class="side-menu__icon"> <i data-feather="sunrise"></i> </div>
                            <div class="side-menu__title"> Upload </div>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?profil-detail&id=<?php echo $id_pengguna; ?>&jenis=1" class="side-menu">
                            <div class="side-menu__icon"> <i data-feather="user"></i> </div>
                            <div class="side-menu__title"> Profil </div>
                        </a>
                    </li>
                    
                    <li class="side-nav__devider my-6"></li>
                    <li>
                        <a href="index.php?private" class="side-menu">
                            <div class="side-menu__icon"> <i data-feather="lock"></i> </div>
                            <div class="side-menu__title"> Privete </div>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?public" class="side-menu">
                            <div class="side-menu__icon"> <i data-feather="unlock"></i> </div>
                            <div class="side-menu__title"> Public</div>
                        </a>
                    </li>
                    
                </ul>
            </nav>
            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="" class="">Application</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="" class="breadcrumb--active">Home</a> </div>
                    <!-- END: Breadcrumb --nnti figanti dashboradnya -->
                    <!-- BEGIN: Search -->
                    <div class="intro-x relative mr-3 sm:mr-6">
                        <div class="search hidden sm:block">
                            <input type="text" class="search__input input placeholder-theme-13" placeholder="Search...">
                            <i data-feather="search" class="search__icon dark:text-gray-300"></i> 
                        </div>
                        <a class="notification sm:hidden" href=""> <i data-feather="search" class="notification__icon dark:text-gray-300"></i> </a>
                        <div class="search-result">
                            <div class="search-result__content">
                                <div class="search-result__content__title">Pages</div>
                                <div class="mb-5">
                                    
                                </div>
                                <div class="search-result__content__title">Users</div>
                                <div class="mb-5">
                                    
                                </div>
                                <div class="search-result__content__title">Products</div>
                                <a href="" class="flex items-center mt-2">
                                    <div class="w-8 h-8 image-fit">
                                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/preview-11.jpg">
                                    </div>
                                    <div class="ml-3">Samsung Q90 QLED TV</div>
                                    <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Electronic</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- END: Search -->
                    
                    <!-- BEGIN: Account Menu -->
                    <div class="intro-x dropdown w-8 h-8">
                        <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in">
                            <img alt="Midone Tailwind HTML Admin Template" src="dist/images/profile-10.jpg">
                        </div>
                        <div class="dropdown-box w-56">
                            <div class="dropdown-box__content box bg-theme-38 dark:bg-dark-6 text-white">
                                <div class="p-4 border-b border-theme-40 dark:border-dark-3">
                                    <div class="font-medium">Russell Crowe</div>
                                    <div class="text-xs text-theme-41 dark:text-gray-600">DevOps Engineer</div>
                                </div>
                                <div class="p-2">
                                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile </a>
                                </div>
                                <div class="p-2 border-t border-theme-40 dark:border-dark-3">
                                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Account Menu -->
                </div>
                <!-- END: Top Bar -->
                <!-- BEGIN: Main Content -->
                <?php
                    if (isset($_REQUEST['home'])) {
                      include("page/home.php");
                    } else if (isset($_REQUEST['berkas'])) {
                      include("page/berkas.php");
                    } else if (isset($_REQUEST['upload'])) {
                      include("page/upload.php");
                    } else if (isset($_REQUEST['public'])) {
                      include("page/public.php");
                    } else if (isset($_REQUEST['public-file'])) {
                      include("page/public-file.php");
                    } else if (isset($_REQUEST['private'])) {
                      include("page/private.php");
                    } else if (isset($_REQUEST['profil-detail'])) {
                      include("page/profil-detail.php");
                    } else if (isset($_REQUEST['file'])) {
                      include("page/file.php");
                    } else if (isset($_REQUEST['cari'])) {
                      include("page/cari.php");
                    } else if (isset($_REQUEST['dashboard'])) {
                      include("page/dashboard.php");
                    } else {
                      include("page/home.php");
                    }

                    ?>


                <!-- END: Main Content -->
            </div>
            <!-- END: Content -->
        </div>
        <!-- BEGIN: Dark Mode Switcher-->
        <div data-url="index.html" class="dark-mode-switcher cursor-pointer shadow-md fixed bottom-0 right-0 box dark:bg-dark-2 border rounded-full w-40 h-12 flex items-center justify-center z-50 mb-10 mr-10">
            <div class="mr-4 text-gray-700 dark:text-gray-300">Dark Mode</div>
            <div class="dark-mode-switcher__toggle dark-mode-switcher__toggle--active border"></div>
        </div>
        <!-- END: Dark Mode Switcher-->
        <!-- BEGIN: JS Assets-->
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
        <script src="dist/js/app.js"></script>
        <script>
    $(document).ready(function() {

      $('.sidebar-menu').tree()

      $('.detail').click(function() {

        var id = $(this).attr("id");

        $.ajax({

          url: 'page/public-detail.php',
          method: 'post',
          data: {
            id: id
          },
          success: function(data) {
            $('#detail_file').html(data);
            $('#default').modal("show");
          }

        });

      });

      $('.profil').click(function() {

        var id = $(this).attr("id");

        $.ajax({

          url: 'page/profil.php',
          method: 'post',
          data: {
            id: id
          },
          success: function(data) {
            $('#data_profil').html(data);
            $('#modal-default').modal("show");
          }

        });

      });

      $('.komentar').click(function() {

        var id = $(this).attr("id");

        $.ajax({

          url: 'page/komentar.php',
          method: 'post',
          data: {
            id: id
          },
          success: function(data) {
            $('#komentar_public').html(data);
            $('#comment').modal("show");
          }

        });

      });

      $('#data-berkas').DataTable({
        'paging': true,
        'lengthChange': false,
        'searching': true,
        'ordering': false,
        'info': true,
        'autoWidth': false
      });

      $('.view_data').click(function() {

        var id = $(this).attr("id");

        $.ajax({

          url: 'page/detail.php',
          method: 'post',
          data: {
            id: id
          },
          success: function(data) {
            $('#data_berkas').html(data);
            $('#myModal').modal("show");
          }

        });

      });

      $('.view').click(function() {

        var id = $(this).attr("id");
        var url = $(this).attr("url");

        $.ajax({

          url: 'page/view.php',
          method: 'post',
          data: {
            id: id,
            url: url
          },
          success: function(data) {
            $('#lihat').html(data);
            $('#modal-default').modal("show");
          }

        });

      });

    })

    /* $(document).ready(function(){
      $('#data-berkas').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : true,
        'ordering'    : false,
        'info'        : true,
        'autoWidth'   : false
      });
    });

    $(document).ready(function(){

      $('.view_data').click(function(){

        var id = $(this).attr("id");

        $.ajax({

          url: 'page/detail.php',
          method: 'post',
          data: {id:id},
          success:function(data){
            $('#data_berkas').html(data);
            $('#myModal').modal("show");
          }

        });

      });

    });

    $(document).ready(function(){

      $('.view').click(function(){

        var id = $(this).attr("id");
        var url = $(this).attr("url");

        $.ajax({

          url: 'page/view.php',
          method: 'post',
          data: {id:id , url:url},
          success:function(data){
            $('#lihat').html(data);
            $('#modal-default').modal("show");
          }

        });

      });

    }); */
  </script>
        <!-- END: JS Assets-->
    </body>
</html>
