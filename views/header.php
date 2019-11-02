<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?=$this->params['title']?></title>
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/media.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/swipebox.min.css">
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>

</head>
<body>
<header class="parallax-window" data-parallax="scroll" data-image-src="images/background.png">
    <div class="header">
        <div class="container">
            <div class="header__top-wrap">
                <div class="header__top container">
                    <img src="/images/logo.png" alt="test" class="header__logo js-to__top">
                    <div class="header__menu">
                        <ul class="list__menu">
                            <li class="list-menu__element"><a href="about_company" class="list-menu__link">О Компании</a></li>
                            <li class="list-menu__element"><a href="services" class="list-menu__link">Услуги</a></li>
                            <li class="list-menu__element"><a href="Team" class="list-menu__link">Команда</a></li>
                            <li class="list-menu__element"><a href="toContact" class="list-menu__link light-btn">Связаться</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="header__top-mobile" id="mobile-menu">
                <img src="/images/logo.png" alt="test" class="header__logo-mobile js-to__top">
                <div class="header__menu-mobile">
                    <ul class="list__menu-mobile">
                        <li class="list-menu__element-mobile">
                            <a href="about_company" class="list-menu__link list-menu__link-mobile">О Компании</a>
                        </li>
                        <li class="list-menu__element-mobile">
                            <a href="services" class="list-menu__link list-menu__link-mobile">Услуги</a>
                        </li>
                        <li class="list-menu__element-mobile">
                            <a href="Team" class="list-menu__link list-menu__link-mobile">Команда</a>
                        </li>
                        <li class="list-menu__element-mobile">
                            <a href="toContact" class="list-menu__link list-menu__link-mobile light-btn">Связаться</a>
                        </li>
                    </ul>
                </div>
            </div>

            <span class="switch-mobile__btn"></span>

            <div class="header__info">
                <h1 class="header__title"><?=$this->params['title_header']?></h1>

                <p>В секторах:</p>

                <nav>
                    <ul class="header-icons__blocks">
                        <?foreach ($this->params['sector'] as $sector):?>
                            <li class="icons-block__element"><i class="header-ico" style="background:  url('../images/<?=$sector['value']?>') no-repeat center center; background-size: cover"></i><?=$sector['title']?></li>
                        <?endforeach;?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>


</header>


<main class="wraper">