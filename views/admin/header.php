<!DOCTYPE html>
<html>


<!-- Mirrored from admindesigns.com/demos/absolute/1.1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Oct 2015 13:21:50 GMT -->
<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <title><?=$this->params['title']?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font CSS (Via CDN) -->
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="/assets/skin/default_skin/css/theme.css">

    <!-- Admin Forms CSS -->
    <link rel="stylesheet" type="text/css" href="/assets/admin-tools/admin-forms/css/admin-forms.min.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="/assets/img/favicon.ico">


    <!-- Datatables CSS -->
    <link rel="stylesheet" type="text/css" href="/vendor/plugins/datatables/media/css/dataTables.bootstrap.css">

    <!-- Datatables Editor Addon CSS -->
    <link rel="stylesheet" type="text/css" href="/vendor/plugins/datatables/extensions/Editor/css/dataTables.editor.css">

    <!-- Datatables ColReorder Addon CSS -->
    <link rel="stylesheet" type="text/css" href="/vendor/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="/assets/skin/default_skin/css/theme.css">


    <!-- Admin Forms CSS -->
    <link rel="stylesheet" type="text/css" href="/assets/admin-tools/admin-forms/css/admin-forms.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="/assets/img/favicon.ico">

</head>

<body class="skin-blue dashboard-page">

<!-- Start: Main -->
<div id="main">

    <!-----------------------------------------------------------------+
       ".navbar" Helper Classes:
    -------------------------------------------------------------------+
       * Positioning Classes:
        '.navbar-static-top' - Static top positioned navbar
        '.navbar-static-top' - Fixed top positioned navbar

       * Available Skin Classes:
         .bg-dark    .bg-primary   .bg-success
         .bg-info    .bg-warning   .bg-danger
         .bg-alert   .bg-system
    -------------------------------------------------------------------+
      Example: <header class="navbar navbar-fixed-top bg-primary">
      Results: Fixed top navbar with blue background
    ------------------------------------------------------------------->

    <!-- Start: Header -->
    <header class="navbar navbar-fixed-top navbar-shadow bg-primary">
        <div class="navbar-branding dark bg-primary">
            <a class="navbar-brand" href="/admin">
                <b>Bb</b>Admin
            </a>
            <span id="toggle_sidemenu_l" class="ad ad-lines"></span>
        </div>
    </header>
    <!-- End: Header -->

    <!-- Start: Sidebar -->
    <aside id="sidebar_left" class="nano nano-light affix">

        <!-- Start: Sidebar Left Content -->
        <div class="sidebar-left-content nano-content">

            <!-- Start: Sidebar Header -->
            <header class="sidebar-header">
                <!-- Sidebar Widget - Author -->
                <div class="sidebar-widget author-widget">
                    <div class="media">
                        <a class="media-left" href="/">
                            <img src="/images/<?=$this->params['userData']['photo']?>" class="img-responsive">
                        </a>
                        <div class="media-body">

                            <div class="media-links">
                                <a href="/user/logout">Выйти</a>
                                <div class="media-author">[<?=$this->params['userData']['role']?>] <div class="media-author"><?=$this->params['userData']['last_name']?> <?=$this->params['userData']['first_name']?></div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- End: Sidebar Header -->
            <!-- Start: Sidebar Menu -->
            <ul class="nav sidebar-menu">

                <li class="sidebar-label pt20">Публичная часть</li>
                <li>
                    <a href="/admin">
                        <span class="glyphicon glyphicon-home"></span>
                        <span class="sidebar-title">Рабочий стол</span>
                    </a>
                </li>
                <li>
                    <a href="/">
                        <span class="glyphicon glyphicon-globe"></span>
                        <span class="sidebar-title">Перейти на сайт</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/form_contacts">
                        <span class="glyphicon glyphicon-send"></span>
                        <span class="sidebar-title">Заявки</span>
                    </a>
                </li>

                <li>
                    <a class="accordion-toggle" href="/">
                        <span class="glyphicon glyphicon-th-large"></span>
                        <span class="sidebar-title">Контент</span>
                        <span class="caret"></span>
                    </a>
                    <ul class="nav sub-nav">
                        <li>
                            <a href="/admin/services">
                                <span class="glyphicon glyphicon-book"></span> Услуги </a>
                        </li>
                        <li>
                            <a href="/admin/projects">
                                <span class="glyphicon glyphicon-modal-window"></span> Проекты </a>
                        </li>
                        <li>
                            <a href="/admin/clients">
                                <span class="glyphicon glyphicon-calendar"></span> Заказчики </a>
                        </li>
                        <li>
                            <a href="/admin/workers">
                                <span class="glyphicon glyphicon-equalizer"></span> Команда </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="accordion-toggle" href="/">
                        <span class="glyphicon glyphicon-info-sign"></span>
                        <span class="sidebar-title">О компании</span>
                        <span class="caret"></span>
                    </a>
                    <ul class="nav sub-nav">
                        <li>
                            <a href="/admin/about/text">
                                <span class="glyphicon glyphicon-book"></span> Направления </a>
                        </li>
                        <li>
                            <a href="/admin/about/desc">
                                <span class="glyphicon glyphicon-modal-window"></span> Текст об опыте </a>
                        </li>
                        <li>
                            <a href="/admin/about/photo">
                                <span class="glyphicon glyphicon-calendar"></span> Галерея </a>
                        </li>
                        <li>
                            <a href="/admin/partner">
                                <span class="glyphicon glyphicon-equalizer"></span> Партнеры </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="accordion-toggle" href="/">
                        <span class="glyphicon glyphicon-th-large"></span>
                        <span class="sidebar-title">Хедер и футер</span>
                        <span class="caret"></span>
                    </a>
                    <ul class="nav sub-nav">
                        <li>
                            <a href="/admin/header_footer/title">
                                <span class="glyphicon glyphicon-book"></span> Заголовок </a>
                        </li>
                        <li>
                            <a href="/admin/header_footer/sector">
                                <span class="glyphicon glyphicon-modal-window"></span> Сектора </a>
                        </li>
                        <li>
                            <a href="/admin/header_footer/contact">
                                <span class="glyphicon glyphicon-modal-window"></span> Контакты </a>
                        </li>
                        <li>
                            <a href="/admin/header_footer/requisite">
                                <span class="glyphicon glyphicon-modal-window"></span> Реквизиты </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="accordion-toggle" href="/">
                        <span class="glyphicon glyphicon-wrench"></span>
                        <span class="sidebar-title">Служебное</span>
                        <span class="caret"></span>
                    </a>
                    <ul class="nav sub-nav">
                        <li>
                            <a href="/admin/include">
                                <span class="glyphicon glyphicon-header"></span> Html-область </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- End: Sidebar Left Menu -->

            <!-- Start: Sidebar Collapse Button -->
            <div class="sidebar-toggle-mini">
                <a href="#">
                    <span class="fa fa-sign-out"></span>
                </a>
            </div>
            <!-- End: Sidebar Collapse Button -->

        </div>
        <!-- End: Sidebar Left Content -->

    </aside>
    <!-- End: Sidebar Left -->

    <!-- Start: Content-Wrapper -->
    <section id="content_wrapper">