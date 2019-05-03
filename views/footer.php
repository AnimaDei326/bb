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

       <div class="widget__body">
            <form>
                <div class="widget__header">
                    <h1 class="widget__staff-name">Укажите Ваши контактные данные</h1>
                    <div class="widget-c__block">
                        <input name="name" type="hidden">
                        <input name="email" type="hidden">
                        <input name="phone" type="hidden">
                        <input name="message" type="hidden">

                        <input id="supername" name="supername" class="widget__input" type="text" placeholder="Имя">
                        <input id="superemail" name="superemail" class="widget__input"  type="email" placeholder="E-mail">
                        <span style="display: block; margin-bottom:37px ;">или</span>
                        <input id="superphone" name="superphone"  class="widget__input"  type="text" placeholder="Телефон">

                        <div class="checkbox">
                            <input id="agreement" type="checkbox" name="agreement" checked>
                            <label class="widget__label" for="agreement">Согласен с обработкой данных <b><u>Политика конфединциальности</u></b></label>
                        </div>

                    </div>
                </div>

               <div class="widget__footer">
                    <button onclick="sendForm()" type="button" class="widget__btn">Отправить</button>
                </div>
            </form>

        </div>
        <span class="widget__close-btn js-widget__close"></span>
    </div>
</div>







<script src="/js/app.js"></script>
<script src="/js/parallax.min.js"></script>

<script src="js/jquery.swipebox.js"></script>

<script type="text/javascript">
    let name, email, phone;

    function sendForm(){
        if (checkFields()){
            $.ajax({
                url: "/ajax/contact_form",
                method: 'POST',
                data: {
                    name: name,
                    email: email,
                    phone: phone,
                },
                success: function(response){

                    if(response !== 'true'){
                        alert('Произошла ошибка: ' + response);
                    }else{
                        alert('Спасибо');
                    }
                },
            });
        }
    }

    function checkFields(){
        if($('#supername')[0].value === ''){
            $('#supername').attr('style', 'border: 1px solid red');
            return false;
        }else{
            $('#supername').attr('style', 'border: 1px solid gray');
            name =  $('#supername')[0].value;
        }

        if($('#superemail')[0].value === '' && $('#superphone')[0].value === ''){
            $('#superphone').attr('style', 'border: 1px solid red');
            return false;
        }else{
            $('#superemail').attr('style', 'border: 1px solid gray');
            $('#superphone').attr('style', 'border: 1px solid gray');
            email =  $('#superemail')[0].value;
            phone =  $('#superphone')[0].value;
        }
        if($('#agreement')[0].checked === false){
            $('.widget__label').removeClass('widget__label').addClass('widget__label_error');
            return false;
        }else{
            $('.widget__label_error').removeClass('widget__label_error').addClass('widget__label');
        }

        if( $('input[name=name]')[0].value !== '' ||
            $('input[name=phone]')[0].value !== '' ||
            $('input[name=email]')[0].value !== '' ||
            $('input[name=message]')[0].value !== ''
        ){
            return false;
        }
        return true;
    }
( function( $ ) {

    $( '.swipebox' ).swipebox();

} )( jQuery );
</script>

</body>
</html>