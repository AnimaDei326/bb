</main>

<footer>
    <div class="container">
        <div class="footer__top">
            <address>
                <h3 class="footer__title">Контакты</h3>
                Email:
                <span class="email"> info@bbconsulting.ru</span>
                <br>
                Тел.:
                <span class="tell-number"> +7 (916) 804-27-97</span>
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
                <div class="widget__staff-img" style="background-image: url('/images/Biliy.jpg')"></div>
                <h4 class="widget__staff-name">Александр Билый</h4>
                <p class="widget__staff-text">Обсудить новый проект</p>
            </div>

            <div class="widget__footer">
                <ul class="widget__footer-list">
                    <li class="footer-list__element widget__staff-tell">
                        <i class="widget-ico ico-number">&nbsp;</i>
                        +7 (916) 804 - 27 - 97
                    </li>

                    <li class="footer-list__element widget__staff-email">
                        <i class="widget-ico ico-email">&nbsp;</i>
                        info@bbcounsulting.ru
                    </li>
                </ul>
            </div>
        </div>

        <!-- права часть виджета -->
        <div class="widget__right">
            <div class="widget__header">
                <div class="widget__staff-img" style="background-image: url('/images/Borisov.jpg')"></div>
                <h4 class="widget__staff-name">Никита Борисов</h4>
                <p class="widget__staff-text">Получить методологическую консультацию</p>
            </div>

            <div class="widget__footer">
                <ul class="widget__footer-list">
                    <li class="footer-list__element widget__staff-tell">
                        <i class="widget-ico ico-number">&nbsp;</i>
                        +7 (916) 804-27-97
                    </li>

                    <li class="footer-list__element widget__staff-email">
                        <i class="widget-ico ico-email">&nbsp;</i>
                        info@bbcounsulting.ru
                    </li>
                </ul>
            </div>
        </div>

        <span class="widget__close-btn js-widget__close"></span>
    </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="/js/app.js"></script>
<script src="/js/parallax.min.js"></script>
</body>
</html>