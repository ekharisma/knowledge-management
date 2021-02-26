<?php

require('config/db_sql.php');

session_start();

if (isset($_POST['login'])) {

  $user = $_POST['username'];
  $pass = md5($_POST['password']);

  $query = mysqli_query($mysqli, "SELECT * FROM tb_pengguna, tb_direktorat, tb_divisi, tb_level 
                                WHERE tb_pengguna.id_level = tb_level.id_level AND tb_pengguna.id_direktorat = tb_direktorat.id_direktorat 
                                    AND tb_pengguna.id_divisi = tb_divisi.id_divisi AND tb_pengguna.username='$user' AND tb_pengguna.password='$pass'") or die (mysqli_error());

  if (mysqli_num_rows($query) > 0) {

    $row = mysqli_fetch_assoc($query);
    $_SESSION['id_pengguna']    = $row['id_pengguna'];
    $_SESSION['nama']           = $row['nama_pengguna'];
    $_SESSION['username']       = $row['username'];
    $_SESSION['foto']           = $row['foto'];
    $_SESSION['id_direktorat']  = $row['id_direktorat'];
    $_SESSION['direktorat']     = $row['direktorat'];
    $_SESSION['id_divisi']      = $row['id_divisi'];
    $_SESSION['divisi']         = $row['divisi'];

    if (isset ($_POST['remember']) ) {

    //cookie
    setcookie('login','true', time() + 60);
    setcookie('key', hash('sha256', $row['username']));
}


    if ($row['id_level'] == 2) {

      $_SESSION['admin'] = $user;

      echo "<script language='javascript'>document.location='../admin/index.php';</script>";

    }

    else {

      $_SESSION['super'] = $user;

      echo "<script language='javascript'>document.location='../super/index.php';</script>";

    }

  }

  else {

    echo "<script language='javascript'>alert('User tidak ditemukan');</script>";

  }

}

//remember me

  

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
        <link href="dist/images/logo.svg" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Midone admin template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="LEFT4CODE">
        <title>Knowledge Management PT PAL - Login</title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="dist/css/app.css" />
        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    <body class="login">
        <div class="container sm:px-10">
            <div class="block xl:grid grid-cols-2 gap-4">
                <!-- BEGIN: Login Info -->
                <div class="hidden xl:flex flex-col min-h-screen">
                    <a href="" class="-intro-x flex items-center pt-5">
                        <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="dist/images/logo.svg">
                        <span class="text-white text-lg ml-3"> PT PAL<span class="font-medium"> Indonesia</span> </span>
                    </a>
                    <div class="my-auto">
                        <img alt="Midone Tailwind HTML Admin Template" class="-intro-x w-1/2 -mt-16" src="dist/images/pal.png">
                        <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                            Welcome to 
                            <br>
                            Knowledge Management 
                            <br>
                            PT PAL Indonesia
                        </div>
                        <div class="-intro-x mt-5 text-lg text-white dark:text-gray-500"></div>
                    </div>
                </div>
                <!-- END: Login Info -->
                <!-- BEGIN: Login Form -->
                
                <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                    <div class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                            Sign In
                        </h2>
                        <form method="POST" action="">              
                        <div class="intro-x mt-2 text-gray-500 xl:hidden text-center">A few more clicks to sign in to your account. Manage all your e-commerce accounts in one place</div>
                        <div class="intro-x mt-8">
                            <input type="text" name = "username" class="intro-x login__input input input--lg border border-gray-300 block" placeholder="username">
                            <input type="password" name="password" class="intro-x login__input input input--lg border border-gray-300 block mt-4" placeholder="password">
                        </div>
                        <div class="intro-x flex text-gray-700 dark:text-gray-600 text-xs sm:text-sm mt-4">
                            <div class="flex items-center mr-auto">
                                <input type="checkbox" class="input border mr-2" name = "remember" id="remember-me">
                                <label class="cursor-pointer select-none" for="remember-me">Remember me</label>
                            </div>
                            <a href="">Forgot Password?</a> 
                        </div>
                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                            <button class="button button--lg w-full xl:w-32 text-white bg-theme-1 xl:mr-3 align-top" name ="login">Login</button>
                            <button class="button button--lg w-full xl:w-32 text-gray-700 border border-gray-300 dark:border-dark-5 dark:text-gray-300 mt-3 xl:mt-0 align-top">Sign up</button>
                        </div>
                        <div class="intro-x mt-10 xl:mt-24 text-gray-700 dark:text-gray-600 text-center xl:text-left">
                            By signin up, you agree to our 
                            <br>
                            <a class="text-theme-1 dark:text-theme-10" href="">Terms and Conditions</a> & <a class="text-theme-1 dark:text-theme-10" href="">Privacy Policy</a> 
                        </div>
                    </form>
                    </div>
                </div>
                <!-- END: Login Form -->
            </div>
        </div>
        <!-- BEGIN: Dark Mode Switcher-->
        <div data-url="login-light-login.html" class="dark-mode-switcher cursor-pointer shadow-md fixed bottom-0 right-0 box dark:bg-dark-2 border rounded-full w-40 h-12 flex items-center justify-center z-50 mb-10 mr-10">
            <div class="mr-4 text-gray-700 dark:text-gray-300">Dark Mode</div>
            <div class="dark-mode-switcher__toggle dark-mode-switcher__toggle--active border"></div>
        </div>
        <!-- END: Dark Mode Switcher-->
        <!-- BEGIN: JS Assets-->
        <script src="dist/js/app.js"></script>
        <!-- END: JS Assets-->
    </body>
</html>