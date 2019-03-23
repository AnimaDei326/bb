</main>

<footer>
    <div class="container">
        <div class="footer__top">
            <address>
                <h3 class="footer__title">Контакты</h3>
                Email:
                <span class="email"><?=$this->params['contact_left']['email']?></span>
                <br>
                Тел.:
                <span class="tell-number"><?=$this->params['contact_left']['telephone']?></span>
            </address>
            <nav>
                <h3 class="footer__title">Навигация</h3>
                <ul class="list__menu">
                    <li class="list-menu__element"><a href="/" class="list-menu__link">Главная</a></li>
                    <li class="list-menu__element"><a href="about_company" class="list-menu__link">О Компании</a></li>
                    <li class="list-menu__element"><a href="services" class="list-menu__link">Услуги</a></li>
                    <li class="list-menu__element"><a href="Team" class="list-menu__link">Команда</a></li>
                </ul>
            </nav>
        </div>

        <div class="footer__bottom">
            <p class="footer__text">ИНН 000000000 ОГРН 0000000000000</p>
            <p class="footer__text">© Biliy&Borisov consulting. <br /> Все права защищены. 2016</p>
        </div>
    </div>
</footer>

<!-- по id 'widget__contact-info' будем скрывать/показывать -->
<!-- display: flex; - необходимое свойство -->
<div class="widget__wrap" id="js-widget__contact-info" style="display: none;">
    <div class="widget__contact-info">

        <!-- левая часть виджета -->
        <div class="widget__left">
            <div class="widget__header">
                <div class="widget__staff-img" style="background-image: url('/images/<?=$this->params['contact_left']['picture']?>')"></div>
                <h4 class="widget__staff-name"><?=$this->params['contact_left']['first_name']?> <?=$this->params['contact_left']['second_name']?> </h4>
                <p class="widget__staff-text"><?=$this->params['contact_left']['description']?></p>
            </div>

            <div class="widget__footer">
                <ul class="widget__footer-list">
                    <li class="footer-list__element widget__staff-tell">
                        <i class="widget-ico ico-number">&nbsp;</i>
                        <?=$this->params['contact_left']['telephone']?>
                    </li>

                    <li class="footer-list__element widget__staff-email">
                        <i class="widget-ico ico-email">&nbsp;</i>
                        <?=$this->params['contact_left']['email']?>
                    </li>
                </ul>
            </div>
        </div>

        <!-- права часть виджета -->
        <div class="widget__right">
            <div class="widget__header">
                <div class="widget__staff-img" style="background-image: url('/images/<?=$this->params['contact_right']['picture']?>')"></div>
                <h4 class="widget__staff-name"><?=$this->params['contact_right']['first_name']?> <?=$this->params['contact_right']['second_name']?> </h4>
                <p class="widget__staff-text"><?=$this->params['contact_right']['description']?></p>
            </div>

            <div class="widget__footer">
                <ul class="widget__footer-list">
                    <li class="footer-list__element widget__staff-tell">
                        <i class="widget-ico ico-number">&nbsp;</i>
                        <?=$this->params['contact_right']['telephone']?>
                    </li>

                    <li class="footer-list__element widget__staff-email">
                        <i class="widget-ico ico-email">&nbsp;</i>
                        <?=$this->params['contact_right']['email']?>
                    </li>
                </ul>
            </div>
        </div>

        <span class="widget__close-btn js-widget__close"></span>
    </div>
</div>




<script src="/js/app.js"></script>
<script src="/js/parallax.min.js"></script>

<script src="js/jquery.swipebox.js"></script>

<script type="text/javascript">
( function( $ ) {

    $( '.swipebox' ).swipebox();

} )( jQuery );
</script>

</body>
</html>