<?php
require_once('../../config/db_sql.php');
require_once('../../helper/FileManager.php');
$sql = "SELECT tb_berkas.id_berkas, tb_berkas.nama, tb_berkas.file, tb_berkas.deskripsi, tb_jenis.jenis FROM tb_berkas, tb_jenis, tb_pengguna WHERE tb_berkas.id_jenis = tb_jenis.id_jenis AND tb_berkas.id_pengguna = tb_pengguna.id_pengguna AND tb_jenis.id_jenis = 4 ORDER BY id_berkas ASC LIMIT 5";
$berkas = $mysqli->query($sql);
//file manager;
$manager = new FileManager;
$id = $_POST['id'];
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
    <link href="../../dist/images/logo.svg" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Midone admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>File Manager - Midone - Tailwind HTML Admin Template</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="../../dist/css/app.css" />
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="app">
    <!-- BEGIN: Mobile Menu -->
    <!-- BEGIN VIEW MODAL -->
    <div class="modal" id="button-modal-preview">
        <div class="modal__content modal__content--lg text-center p-5"> <a data-dismiss="modal" href="javascript:;" class="absolute right-0 top-0 mt-3 mr-3"> <i data-feather="x" class="w-8 h-8 text-gray-500"></i> </a>
            <div class=container>
                <p>Detail Modal</p>
            </div>
            <div class="px-5 pb-8 text-center mt-5"> <button type="button" data-dismiss="modal" class="button w-24 bg-theme-6 text-white">Tutup</button> </div>
        </div>
    </div>
        <div class='modal' id='delete-modal'>
            <div class='modal__content'>
                <div class='p-5 text-center'> <i data-feather='x-circle' class='w-16 h-16 text-theme-6 mx-auto mt-3'></i>
                    <div class='text-3xl mt-5'>Apakah Anda Yakin?</div>
                    <div class='text-gray-600 mt-2'>File yang telah dihapus tidak dapat dikembalikan</div>
                </div>
                <div class='px-5 pb-8 text-center'> <button type='button' data-dismiss='modal' class='button w-24 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1'>Cancel</button> <button type='button' class='button w-24 bg-theme-6 text-white hapus_btn'>Delete</button> </div>
            </div>
        </div>
    <!-- END VIEW MODAL -->
    <div class="mobile-menu md:hidden">
        <div class="mobile-menu-bar">
            <a href="" class="flex mr-auto">
                <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="../../dist/images/logo.svg">
            </a>
            <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
        </div>
        <ul class="border-t border-theme-24 py-5 hidden">
            <li>
                <a href="side-menu-dark-dashboard.html" class="menu">
                    <div class="menu__icon"> <i data-feather="home"></i> </div>
                    <div class="menu__title"> Dashboard </div>
                </a>
            </li>
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"> <i data-feather="box"></i> </div>
                    <div class="menu__title"> Menu Layout <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                </a>
                <ul class="">
                    <li>
                        <a href="side-menu-dark-dashboard.html" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Side Menu </div>
                        </a>
                    </li>
                    <li>
                        <a href="simple-menu-dark-dashboard.html" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Simple Menu </div>
                        </a>
                    </li>
                    <li>
                        <a href="top-menu-dark-dashboard.html" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Top Menu </div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="side-menu-dark-inbox.html" class="menu">
                    <div class="menu__icon"> <i data-feather="inbox"></i> </div>
                    <div class="menu__title"> Inbox </div>
                </a>
            </li>
            <li>
                <a href="side-menu-dark-file-manager.html" class="menu menu--active">
                    <div class="menu__icon"> <i data-feather="hard-drive"></i> </div>
                    <div class="menu__title"> File Manager </div>
                </a>
            </li>
            <li>
                <a href="side-menu-dark-point-of-sale.html" class="menu">
                    <div class="menu__icon"> <i data-feather="credit-card"></i> </div>
                    <div class="menu__title"> Point of Sale </div>
                </a>
            </li>
            <li>
                <a href="side-menu-dark-chat.html" class="menu">
                    <div class="menu__icon"> <i data-feather="message-square"></i> </div>
                    <div class="menu__title"> Chat </div>
                </a>
            </li>
            <li>
                <a href="side-menu-dark-post.html" class="menu">
                    <div class="menu__icon"> <i data-feather="file-text"></i> </div>
                    <div class="menu__title"> Post </div>
                </a>
            </li>
            <li class="menu__devider my-6"></li>
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"> <i data-feather="edit"></i> </div>
                    <div class="menu__title"> Crud <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                </a>
                <ul class="">
                    <li>
                        <a href="side-menu-dark-crud-data-list.html" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Data List </div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-dark-crud-form.html" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Form </div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"> <i data-feather="users"></i> </div>
                    <div class="menu__title"> Users <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                </a>
                <ul class="">
                    <li>
                        <a href="side-menu-dark-users-layout-1.html" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Layout 1 </div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-dark-users-layout-2.html" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Layout 2 </div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-dark-users-layout-3.html" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Layout 3 </div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"> <i data-feather="trello"></i> </div>
                    <div class="menu__title"> Profile <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                </a>
                <ul class="">
                    <li>
                        <a href="side-menu-dark-profile-overview-1.html" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Overview 1 </div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-dark-profile-overview-2.html" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Overview 2 </div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-dark-profile-overview-3.html" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Overview 3 </div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"> <i data-feather="layout"></i> </div>
                    <div class="menu__title"> Pages <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                </a>
                <ul class="">
                    <li>
                        <a href="javascript:;" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Wizards <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="side-menu-dark-wizard-layout-1.html" class="menu">
                                    <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                    <div class="menu__title">Layout 1</div>
                                </a>
                            </li>
                            <li>
                                <a href="side-menu-dark-wizard-layout-2.html" class="menu">
                                    <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                    <div class="menu__title">Layout 2</div>
                                </a>
                            </li>
                            <li>
                                <a href="side-menu-dark-wizard-layout-3.html" class="menu">
                                    <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                    <div class="menu__title">Layout 3</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Blog <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="side-menu-dark-blog-layout-1.html" class="menu">
                                    <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                    <div class="menu__title">Layout 1</div>
                                </a>
                            </li>
                            <li>
                                <a href="side-menu-dark-blog-layout-2.html" class="menu">
                                    <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                    <div class="menu__title">Layout 2</div>
                                </a>
                            </li>
                            <li>
                                <a href="side-menu-dark-blog-layout-3.html" class="menu">
                                    <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                    <div class="menu__title">Layout 3</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Pricing <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="side-menu-dark-pricing-layout-1.html" class="menu">
                                    <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                    <div class="menu__title">Layout 1</div>
                                </a>
                            </li>
                            <li>
                                <a href="side-menu-dark-pricing-layout-2.html" class="menu">
                                    <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                    <div class="menu__title">Layout 2</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Invoice <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="side-menu-dark-invoice-layout-1.html" class="menu">
                                    <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                    <div class="menu__title">Layout 1</div>
                                </a>
                            </li>
                            <li>
                                <a href="side-menu-dark-invoice-layout-2.html" class="menu">
                                    <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                    <div class="menu__title">Layout 2</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> FAQ <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="side-menu-dark-faq-layout-1.html" class="menu">
                                    <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                    <div class="menu__title">Layout 1</div>
                                </a>
                            </li>
                            <li>
                                <a href="side-menu-dark-faq-layout-2.html" class="menu">
                                    <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                    <div class="menu__title">Layout 2</div>
                                </a>
                            </li>
                            <li>
                                <a href="side-menu-dark-faq-layout-3.html" class="menu">
                                    <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                    <div class="menu__title">Layout 3</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="login-dark-login.html" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Login </div>
                        </a>
                    </li>
                    <li>
                        <a href="login-dark-register.html" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Register </div>
                        </a>
                    </li>
                    <li>
                        <a href="main-dark-error-page.html" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Error Page </div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-dark-update-profile.html" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Update profile </div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-dark-change-password.html" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Change Password </div>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu__devider my-6"></li>
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"> <i data-feather="inbox"></i> </div>
                    <div class="menu__title"> Components <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                </a>
                <ul class="">
                    <li>
                        <a href="javascript:;" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Grid <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="side-menu-dark-regular-table.html" class="menu">
                                    <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                    <div class="menu__title">Regular Table</div>
                                </a>
                            </li>
                            <li>
                                <a href="side-menu-dark-tabulator.html" class="menu">
                                    <div class="menu__icon"> <i data-feather="zap"></i> </div>
                                    <div class="menu__title">Tabulator</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="side-menu-dark-accordion.html" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Accordion </div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-dark-button.html" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Button </div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-dark-modal.html" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Modal </div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-dark-alert.html" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Alert </div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-dark-progress-bar.html" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Progress Bar </div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-dark-tooltip.html" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Tooltip </div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-dark-dropdown.html" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Dropdown </div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-dark-toast.html" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Toast </div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-dark-typography.html" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Typography </div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-dark-icon.html" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Icon </div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-dark-loading-icon.html" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Loading Icon </div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"> <i data-feather="sidebar"></i> </div>
                    <div class="menu__title"> Forms <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                </a>
                <ul class="">
                    <li>
                        <a href="side-menu-dark-regular-form.html" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Regular Form </div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-dark-datepicker.html" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Datepicker </div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-dark-tail-select.html" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Tail Select </div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-dark-file-upload.html" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> File Upload </div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-dark-wysiwyg-editor.html" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Wysiwyg Editor </div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-dark-validation.html" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Validation </div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"> <i data-feather="hard-drive"></i> </div>
                    <div class="menu__title"> Widgets <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                </a>
                <ul class="">
                    <li>
                        <a href="side-menu-dark-chart.html" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Chart </div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-dark-slider.html" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Slider </div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-dark-image-zoom.html" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Image Zoom </div>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- END: Mobile Menu -->
    <div class="flex">
        <!-- BEGIN: Simple Menu -->
        <nav class="side-nav side-nav--simple">
            <a href="" class="intro-x flex items-center pl-5 pt-4">
                <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="../../dist/images/logo.svg">
            </a>
            <div class="side-nav__devider my-6"></div>
            <ul>
                <li>
                    <a href="simple-menu-dark-dashboard.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                        <div class="side-menu__title"> Dashboard </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="box"></i> </div>
                        <div class="side-menu__title"> Menu Layout <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="side-menu-dark-dashboard.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> Side Menu </div>
                            </a>
                        </li>
                        <li>
                            <a href="simple-menu-dark-dashboard.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> Simple Menu </div>
                            </a>
                        </li>
                        <li>
                            <a href="top-menu-dark-dashboard.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> Top Menu </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="simple-menu-dark-inbox.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                        <div class="side-menu__title"> Inbox </div>
                    </a>
                </li>
                <li>
                    <a href="simple-menu-dark-file-manager.html" class="side-menu side-menu--active">
                        <div class="side-menu__icon"> <i data-feather="hard-drive"></i> </div>
                        <div class="side-menu__title"> File Manager </div>
                    </a>
                </li>
                <li>
                    <a href="simple-menu-dark-point-of-sale.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="credit-card"></i> </div>
                        <div class="side-menu__title"> Point of Sale </div>
                    </a>
                </li>
                <li>
                    <a href="simple-menu-dark-chat.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="message-square"></i> </div>
                        <div class="side-menu__title"> Chat </div>
                    </a>
                </li>
                <li>
                    <a href="simple-menu-dark-post.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                        <div class="side-menu__title"> Post </div>
                    </a>
                </li>
                <li class="side-nav__devider my-6"></li>
                <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="edit"></i> </div>
                        <div class="side-menu__title"> Crud <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="side-menu-dark-crud-data-list.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> Data List </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-dark-crud-form.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> Form </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                        <div class="side-menu__title"> Users <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="simple-menu-dark-users-layout-1.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> Layout 1 </div>
                            </a>
                        </li>
                        <li>
                            <a href="simple-menu-dark-users-layout-2.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> Layout 2 </div>
                            </a>
                        </li>
                        <li>
                            <a href="simple-menu-dark-users-layout-3.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> Layout 3 </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="trello"></i> </div>
                        <div class="side-menu__title"> Profile <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="simple-menu-dark-profile-overview-1.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> Overview 1 </div>
                            </a>
                        </li>
                        <li>
                            <a href="simple-menu-dark-profile-overview-2.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> Overview 2 </div>
                            </a>
                        </li>
                        <li>
                            <a href="simple-menu-dark-profile-overview-3.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> Overview 3 </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="layout"></i> </div>
                        <div class="side-menu__title"> Pages <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="javascript:;" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> Wizards <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="simple-menu-dark-wizard-layout-1.html" class="side-menu">
                                        <div class="side-menu__icon"> <i data-feather="zap"></i> </div>
                                        <div class="side-menu__title">Layout 1</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="simple-menu-dark-wizard-layout-2.html" class="side-menu">
                                        <div class="side-menu__icon"> <i data-feather="zap"></i> </div>
                                        <div class="side-menu__title">Layout 2</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="simple-menu-dark-wizard-layout-3.html" class="side-menu">
                                        <div class="side-menu__icon"> <i data-feather="zap"></i> </div>
                                        <div class="side-menu__title">Layout 3</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> Blog <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="simple-menu-dark-blog-layout-1.html" class="side-menu">
                                        <div class="side-menu__icon"> <i data-feather="zap"></i> </div>
                                        <div class="side-menu__title">Layout 1</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="simple-menu-dark-blog-layout-2.html" class="side-menu">
                                        <div class="side-menu__icon"> <i data-feather="zap"></i> </div>
                                        <div class="side-menu__title">Layout 2</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="simple-menu-dark-blog-layout-3.html" class="side-menu">
                                        <div class="side-menu__icon"> <i data-feather="zap"></i> </div>
                                        <div class="side-menu__title">Layout 3</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> Pricing <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="simple-menu-dark-pricing-layout-1.html" class="side-menu">
                                        <div class="side-menu__icon"> <i data-feather="zap"></i> </div>
                                        <div class="side-menu__title">Layout 1</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="simple-menu-dark-pricing-layout-2.html" class="side-menu">
                                        <div class="side-menu__icon"> <i data-feather="zap"></i> </div>
                                        <div class="side-menu__title">Layout 2</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> Invoice <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="simple-menu-dark-invoice-layout-1.html" class="side-menu">
                                        <div class="side-menu__icon"> <i data-feather="zap"></i> </div>
                                        <div class="side-menu__title">Layout 1</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="simple-menu-dark-invoice-layout-2.html" class="side-menu">
                                        <div class="side-menu__icon"> <i data-feather="zap"></i> </div>
                                        <div class="side-menu__title">Layout 2</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> FAQ <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="simple-menu-dark-faq-layout-1.html" class="side-menu">
                                        <div class="side-menu__icon"> <i data-feather="zap"></i> </div>
                                        <div class="side-menu__title">Layout 1</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="simple-menu-dark-faq-layout-2.html" class="side-menu">
                                        <div class="side-menu__icon"> <i data-feather="zap"></i> </div>
                                        <div class="side-menu__title">Layout 2</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="simple-menu-dark-faq-layout-3.html" class="side-menu">
                                        <div class="side-menu__icon"> <i data-feather="zap"></i> </div>
                                        <div class="side-menu__title">Layout 3</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="login-dark-login.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> Login </div>
                            </a>
                        </li>
                        <li>
                            <a href="login-dark-register.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> Register </div>
                            </a>
                        </li>
                        <li>
                            <a href="main-dark-error-page.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> Error Page </div>
                            </a>
                        </li>
                        <li>
                            <a href="simple-menu-dark-update-profile.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> Update profile </div>
                            </a>
                        </li>
                        <li>
                            <a href="simple-menu-dark-change-password.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> Change Password </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="side-nav__devider my-6"></li>
                <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                        <div class="side-menu__title"> Components <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="javascript:;" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> Grid <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="simple-menu-dark-regular-table.html" class="side-menu">
                                        <div class="side-menu__icon"> <i data-feather="zap"></i> </div>
                                        <div class="side-menu__title">Regular Table</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="simple-menu-dark-tabulator.html" class="side-menu">
                                        <div class="side-menu__icon"> <i data-feather="zap"></i> </div>
                                        <div class="side-menu__title">Tabulator</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="simple-menu-dark-accordion.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> Accordion </div>
                            </a>
                        </li>
                        <li>
                            <a href="simple-menu-dark-button.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> Button </div>
                            </a>
                        </li>
                        <li>
                            <a href="simple-menu-dark-modal.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> Modal </div>
                            </a>
                        </li>
                        <li>
                            <a href="simple-menu-dark-alert.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> Alert </div>
                            </a>
                        </li>
                        <li>
                            <a href="simple-menu-dark-progress-bar.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> Progress Bar </div>
                            </a>
                        </li>
                        <li>
                            <a href="simple-menu-dark-tooltip.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> Tooltip </div>
                            </a>
                        </li>
                        <li>
                            <a href="simple-menu-dark-dropdown.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> Dropdown </div>
                            </a>
                        </li>
                        <li>
                            <a href="simple-menu-dark-toast.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> Toast </div>
                            </a>
                        </li>
                        <li>
                            <a href="simple-menu-dark-typography.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> Typography </div>
                            </a>
                        </li>
                        <li>
                            <a href="simple-menu-dark-icon.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> Icon </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-dark-loading-icon.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> Loading Icon </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="sidebar"></i> </div>
                        <div class="side-menu__title"> Forms <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="simple-menu-dark-regular-form.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> Regular Form </div>
                            </a>
                        </li>
                        <li>
                            <a href="simple-menu-dark-datepicker.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> Datepicker </div>
                            </a>
                        </li>
                        <li>
                            <a href="simple-menu-dark-tail-select.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> Tail Select </div>
                            </a>
                        </li>
                        <li>
                            <a href="simple-menu-dark-file-upload.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> File Upload </div>
                            </a>
                        </li>
                        <li>
                            <a href="simple-menu-dark-wysiwyg-editor.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> Wysiwyg Editor </div>
                            </a>
                        </li>
                        <li>
                            <a href="simple-menu-dark-validation.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> Validation </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="hard-drive"></i> </div>
                        <div class="side-menu__title"> Widgets <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="simple-menu-dark-chart.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> Chart </div>
                            </a>
                        </li>
                        <li>
                            <a href="simple-menu-dark-slider.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> Slider </div>
                            </a>
                        </li>
                        <li>
                            <a href="simple-menu-dark-image-zoom.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> Image Zoom </div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- END: Simple Menu -->
        <!-- BEGIN: Content -->
        <div class="content">
            <!-- BEGIN: Top Bar -->
            <div class="top-bar">
                <!-- BEGIN: Breadcrumb -->
                <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="" class="">Application</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="" class="breadcrumb--active">Dashboard</a> </div>
                <!-- END: Breadcrumb -->
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
                                <a href="" class="flex items-center">
                                    <div class="w-8 h-8 bg-theme-18 text-theme-9 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-feather="inbox"></i> </div>
                                    <div class="ml-3">Mail Settings</div>
                                </a>
                                <a href="" class="flex items-center mt-2">
                                    <div class="w-8 h-8 bg-theme-17 text-theme-11 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-feather="users"></i> </div>
                                    <div class="ml-3">Users & Permissions</div>
                                </a>
                                <a href="" class="flex items-center mt-2">
                                    <div class="w-8 h-8 bg-theme-14 text-theme-10 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-feather="credit-card"></i> </div>
                                    <div class="ml-3">Transactions Report</div>
                                </a>
                            </div>
                            <div class="search-result__content__title">Users</div>
                            <div class="mb-5">
                                <a href="" class="flex items-center mt-2">
                                    <div class="w-8 h-8 image-fit">
                                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="../../dist/images/profile-10.jpg">
                                    </div>
                                    <div class="ml-3">Tom Cruise</div>
                                    <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">tomcruise@left4code.com</div>
                                </a>
                                <a href="" class="flex items-center mt-2">
                                    <div class="w-8 h-8 image-fit">
                                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="../../dist/images/profile-9.jpg">
                                    </div>
                                    <div class="ml-3">Keanu Reeves</div>
                                    <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">keanureeves@left4code.com</div>
                                </a>
                                <a href="" class="flex items-center mt-2">
                                    <div class="w-8 h-8 image-fit">
                                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="../../dist/images/profile-13.jpg">
                                    </div>
                                    <div class="ml-3">Denzel Washington</div>
                                    <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">denzelwashington@left4code.com</div>
                                </a>
                                <a href="" class="flex items-center mt-2">
                                    <div class="w-8 h-8 image-fit">
                                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="../../dist/images/profile-8.jpg">
                                    </div>
                                    <div class="ml-3">Angelina Jolie</div>
                                    <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">angelinajolie@left4code.com</div>
                                </a>
                            </div>
                            <div class="search-result__content__title">Products</div>
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="../../dist/images/preview-2.jpg">
                                </div>
                                <div class="ml-3">Nike Air Max 270</div>
                                <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Sport &amp; Outdoor</div>
                            </a>
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="../../dist/images/preview-10.jpg">
                                </div>
                                <div class="ml-3">Nikon Z6</div>
                                <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Photography</div>
                            </a>
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="../../dist/images/preview-1.jpg">
                                </div>
                                <div class="ml-3">Nikon Z6</div>
                                <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Photography</div>
                            </a>
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="../../dist/images/preview-14.jpg">
                                </div>
                                <div class="ml-3">Sony A7 III</div>
                                <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Photography</div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- END: Search -->
                <!-- BEGIN: Notifications -->
                <div class="intro-x dropdown mr-auto sm:mr-6">
                    <div class="dropdown-toggle notification notification--bullet cursor-pointer"> <i data-feather="bell" class="notification__icon dark:text-gray-300"></i> </div>
                    <div class="notification-content pt-2 dropdown-box">
                        <div class="notification-content__box dropdown-box__content box dark:bg-dark-6">
                            <div class="notification-content__title">Notifications</div>
                            <div class="cursor-pointer relative flex items-center ">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="../../dist/images/profile-10.jpg">
                                    <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium truncate mr-5">Tom Cruise</a>
                                        <div class="text-xs text-gray-500 ml-auto whitespace-no-wrap">01:10 PM</div>
                                    </div>
                                    <div class="w-full truncate text-gray-600">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 20</div>
                                </div>
                            </div>
                            <div class="cursor-pointer relative flex items-center mt-5">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="../../dist/images/profile-9.jpg">
                                    <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium truncate mr-5">Keanu Reeves</a>
                                        <div class="text-xs text-gray-500 ml-auto whitespace-no-wrap">01:10 PM</div>
                                    </div>
                                    <div class="w-full truncate text-gray-600">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500</div>
                                </div>
                            </div>
                            <div class="cursor-pointer relative flex items-center mt-5">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="../../dist/images/profile-13.jpg">
                                    <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium truncate mr-5">Denzel Washington</a>
                                        <div class="text-xs text-gray-500 ml-auto whitespace-no-wrap">01:10 PM</div>
                                    </div>
                                    <div class="w-full truncate text-gray-600">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 20</div>
                                </div>
                            </div>
                            <div class="cursor-pointer relative flex items-center mt-5">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="../../dist/images/profile-8.jpg">
                                    <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium truncate mr-5">Angelina Jolie</a>
                                        <div class="text-xs text-gray-500 ml-auto whitespace-no-wrap">01:10 PM</div>
                                    </div>
                                    <div class="w-full truncate text-gray-600">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 20</div>
                                </div>
                            </div>
                            <div class="cursor-pointer relative flex items-center mt-5">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="../../dist/images/profile-7.jpg">
                                    <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium truncate mr-5">Al Pacino</a>
                                        <div class="text-xs text-gray-500 ml-auto whitespace-no-wrap">01:10 PM</div>
                                    </div>
                                    <div class="w-full truncate text-gray-600">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomi</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Notifications -->
                <!-- BEGIN: Account Menu -->
                <div class="intro-x dropdown w-8 h-8">
                    <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in">
                        <img alt="Midone Tailwind HTML Admin Template" src="../../dist/images/profile-12.jpg">
                    </div>
                    <div class="dropdown-box w-56">
                        <div class="dropdown-box__content box bg-theme-38 dark:bg-dark-6 text-white">
                            <div class="p-4 border-b border-theme-40 dark:border-dark-3">
                                <div class="font-medium">Tom Cruise</div>
                                <div class="text-xs text-theme-41 dark:text-gray-600">Software Engineer</div>
                            </div>
                            <div class="p-2">
                                <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile </a>
                                <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="edit" class="w-4 h-4 mr-2"></i> Add Account </a>
                                <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="lock" class="w-4 h-4 mr-2"></i> Reset Password </a>
                                <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="help-circle" class="w-4 h-4 mr-2"></i> Help </a>
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
            <div class="grid grid-cols-12 gap-6 mt-8">
                <div class="col-span-12 lg:col-span-3 xxl:col-span-2">
                    <h2 class="intro-y text-lg font-medium mr-auto mt-2">
                        File Manager
                    </h2>
                    <!-- BEGIN: File Manager Menu -->
                    <div class="intro-y box p-5 mt-6">
                        <div class="mt-1">
                            <a href="/pages/berkas/gambar.php" class="flex items-center px-3 py-2 rounded-md bg-theme-1 text-white font-medium"> <i class="w-4 h-4 mr-2" data-feather="image"></i> Gambar </a>
                            <a href="/pages/berkas/video.php" class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2" data-feather="video"></i> Videos </a>
                            <a href="/pages/berkas/dokumen.php" class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2" data-feather="file"></i> Dokumen </a>
                            <a href="/pages/berkas/audio.php" class="flex items-center px-3 py-2 mt-2 rounded-md ">  <i class="w-4 h-4 mr-2" data-feather="message-square"></i> Audio </a>
                            <a href="/pages/berkas/lain.php" class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2" data-feather="box"></i> Lain - lain </a>
                        </div>
                    </div>
                    <!-- END: File Manager Menu -->
                </div>
                <div class="col-span-12 lg:col-span-9 xxl:col-span-10">
                    <!-- BEGIN: File Manager Filter -->
                    <div class="intro-y flex flex-col-reverse sm:flex-row items-center">
                        <div class="w-full sm:w-auto relative mr-auto mt-3 sm:mt-0">
                            <i class="w-4 h-4 absolute my-auto inset-y-0 ml-3 left-0 z-10 text-gray-700 dark:text-gray-300" data-feather="search"></i>
                            <input type="text" class="input w-full sm:w-64 box px-10 text-gray-700 dark:text-gray-300 placeholder-theme-13" placeholder="Search files">
                            <div class="inbox-filter dropdown absolute inset-y-0 mr-3 right-0 flex items-center" data-placement="bottom-start">
                                <i class="dropdown-toggle w-4 h-4 cursor-pointer text-gray-700 dark:text-gray-300" data-feather="chevron-down"></i>
                                <div class="inbox-filter__dropdown-box dropdown-box pt-2">
                                    <div class="dropdown-box__content box p-5">
                                        <div class="grid grid-cols-12 gap-4 row-gap-3">
                                            <div class="col-span-6">
                                                <div class="text-xs">File Name</div>
                                                <input type="text" class="input w-full border mt-2 flex-1" placeholder="Type the file name">
                                            </div>
                                            <div class="col-span-6">
                                                <div class="text-xs">Shared With</div>
                                                <input type="text" class="input w-full border mt-2 flex-1" placeholder="example@gmail.com">
                                            </div>
                                            <div class="col-span-6">
                                                <div class="text-xs">Created At</div>
                                                <input type="text" class="input w-full border mt-2 flex-1" placeholder="Important Meeting">
                                            </div>
                                            <div class="col-span-6">
                                                <div class="text-xs">Size</div>
                                                <select class="input w-full border mt-2 flex-1">
                                                    <option>10</option>
                                                    <option>25</option>
                                                    <option>35</option>
                                                    <option>50</option>
                                                </select>
                                            </div>
                                            <div class="col-span-12 flex items-center mt-3">
                                                <button class="button w-32 justify-center block bg-gray-200 dark:bg-dark-1 text-gray-600 dark:text-gray-300 ml-auto">Create Filter</button>
                                                <button class="button w-32 justify-center block bg-theme-1 text-white ml-2">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full sm:w-auto flex">
                            <button class="button text-white bg-theme-1 shadow-md mr-2">Upload New Files</button>
                            <div class="dropdown">
                                <button class="dropdown-toggle button px-2 box text-gray-700 dark:text-gray-300">
                                    <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i> </span>
                                </button>
                                <div class="dropdown-box w-40">
                                    <div class="dropdown-box__content box dark:bg-dark-1 p-2">
                                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="file" class="w-4 h-4 mr-2"></i> Share Files </a>
                                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="settings" class="w-4 h-4 mr-2"></i> Settings </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: File Manager Filter -->
                    <!-- BEGIN: Directory & Files -->
                    <div class="intro-y grid grid-cols-12 gap-3 sm:gap-6 mt-5">
                        <?php foreach ($berkas as $row) : ?>
                            <div class="intro-y col-span-6 sm:col-span-4 md:col-span-3 xxl:col-span-2">
                                <div class="file box rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in">
                                    <div class="absolute left-0 top-0 mt-3 ml-3">
                                        <input class="input border border-gray-500" type="checkbox">
                                    </div>
                                    <a href="" class="w-3/5 file__icon file__icon--empty-directory mx-auto"></a> <a href="" class="block font-medium mt-4 text-center truncate"><?= $row['nama'] ?></a>
                                    <div class="text-gray-600 text-xs text-center">4 MB</div>
                                    <div class="absolute top-0 right-0 mr-2 mt-2 dropdown ml-auto">
                                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-vertical" class="w-5 h-5 text-gray-500"></i> </a>
                                        <div class="dropdown-box w-40">
                                            <div class="dropdown-box__content box dark:bg-dark-1 p-2">
                                                <a id="<?=$row['id_berkas'] ?>" href="javascript:;" data-toggle="modal" data-target="#button-modal-preview" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md lihat"> <i data-feather="trello" class="w-4 h-4 mr-2"></i>Lihat</a>
                                                <a id="<?=$row['id_berkas']?>" href="javascript:;" data-toggle="modal" data-target="#button-modal-preview" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md detail"> <i data-feather="trello" class="w-4 h-4 mr-2"></i>Detail</a>
                                                <a id="<?=$row['id_berkas']?>" href="<?="../../uploads/" . $row['file'] ?>" download data-toggle="modal" data-target="#button-modal-preview" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md unduh"> <i data-feather="box" class="w-4 h-4 mr-2"></i>Unduh</a>
                                                <a id="<?=$row['id_berkas']?>" href="javascript:;" data-toggle="modal" data-target="#delete-modal" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md hapus"> <i data-feather="trash" class="w-4 h-4 mr-2"></i>Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                    <!-- END: Directory & Files -->
                    <!-- BEGIN: Pagination -->
                    <div class="intro-y flex flex-wrap sm:flex-row sm:flex-no-wrap items-center mt-6">
                        <ul class="pagination">
                            <li>
                                <a class="pagination__link" href=""> <i class="w-4 h-4" data-feather="chevrons-left"></i> </a>
                            </li>
                            <li>
                                <a class="pagination__link" href=""> <i class="w-4 h-4" data-feather="chevron-left"></i> </a>
                            </li>
                            <li> <a class="pagination__link" href="">...</a> </li>
                            <li> <a class="pagination__link" href="">1</a> </li>
                            <li> <a class="pagination__link pagination__link--active" href="">2</a> </li>
                            <li> <a class="pagination__link" href="">3</a> </li>
                            <li> <a class="pagination__link" href="">...</a> </li>
                            <li>
                                <a class="pagination__link" href=""> <i class="w-4 h-4" data-feather="chevron-right"></i> </a>
                            </li>
                            <li>
                                <a class="pagination__link" href=""> <i class="w-4 h-4" data-feather="chevrons-right"></i> </a>
                            </li>
                        </ul>
                        <select class="w-20 input box mt-3 sm:mt-0">
                            <option>10</option>
                            <option>25</option>
                            <option>35</option>
                            <option>50</option>
                        </select>
                    </div>
                    <!-- END: Pagination -->
                </div>
            </div>
        </div>
        <!-- END: Content -->
    </div>
    <!-- BEGIN: Dark Mode Switcher-->
    <div data-url="simple-menu-light-file-manager.html" class="dark-mode-switcher cursor-pointer shadow-md fixed bottom-0 right-0 box dark:bg-dark-2 border rounded-full w-40 h-12 flex items-center justify-center z-50 mb-10 mr-10">
        <div class="mr-4 text-gray-700 dark:text-gray-300">Dark Mode</div>
        <div class="dark-mode-switcher__toggle dark-mode-switcher__toggle--active border"></div>
    </div>
    <!-- END: Dark Mode Switcher-->
    <!-- BEGIN: JS Assets-->
    <script src="../../dist/js/app.js"></script>
    <script src="../../dist/js/jquery.js"></script>
    <script src="../../dist/js/dokumen.js"></script>
    <!-- END: JS Assets-->
</body>
</html>