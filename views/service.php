<!-- БЛОКИ С УСЛУГАМИ -->
<article class="services__wrap" id="services">
    <div class="container">
        <h3 class="services__title">Услуги</h3>
        <p class="services__text">Кликните по интересующему текстовому блоку для получения подробнной информации о кейсе услуг</p>

        <div class="services__grid services-main">

            

            <div class="services__block2">
                <div class="services__text-wrap" id="1">
                    <h4 class="services-block__title">Финансовое моделирование и аудит моделей: </h4>
                    <ul class="services__list">
                        <li class="services-list__element">Разработка финансовых моделей инвесторов и развитие бизнеса</li>
                        <li class="services-list__element">Экспертиза финансовых моделей</li>
                        <li class="services-list__element">Оценка стоимости проектов и предприятий</li>
                        <li class="services-list__element">Разработка ТЭО инвестиций и Бизнес-планов</li>
                    </ul>
                </div>

                <div class="service__img-block">
                    <img src="/images/service1.jpg" alt="/images/service1.jpg" class="js-services__img" width="100%">
                </div>
            </div>

            <div class="services__block2">
                <div class="service__img-block">
                    <img src="/images/service1.jpg" alt="/images/service1.jpg" class="js-services__img" width="100%">
                </div>

                <div class="services__text-wrap" id="0">
                    <h4 class="services-block__title">Финансовое моделирование и аудит моделей: </h4>
                    <ul class="services__list">
                        <li class="services-list__element">Разработка финансовых моделей инвесторов и развитие бизнеса</li>
                        <li class="services-list__element">Экспертиза финансовых моделей</li>
                        <li class="services-list__element">Оценка стоимости проектов и предприятий</li>
                        <li class="services-list__element">Разработка ТЭО инвестиций и Бизнес-планов</li>
                    </ul>
                </div>
            </div>

            <div class="services__block2">
                <div class="services__text-wrap" id="1">
                    <h4 class="services-block__title">Финансовое моделирование и аудит моделей: </h4>
                    <ul class="services__list">
                        <li class="services-list__element">Разработка финансовых моделей инвесторов и развитие бизнеса</li>
                        <li class="services-list__element">Экспертиза финансовых моделей</li>
                        <li class="services-list__element">Оценка стоимости проектов и предприятий</li>
                        <li class="services-list__element">Разработка ТЭО инвестиций и Бизнес-планов</li>
                    </ul>
                </div>

                <div class="service__img-block">
                    <img src="/images/service1.jpg" alt="/images/service1.jpg" class="js-services__img" width="100%">
                </div>
            </div>
            
            <div class="services__block2">
                <div class="services__text-wrap" id="1">
                    <h4 class="services-block__title">Финансовое моделирование и аудит моделей: </h4>
                    <ul class="services__list">
                        <li class="services-list__element">Разработка финансовых моделей инвесторов и развитие бизнеса</li>
                        <li class="services-list__element">Экспертиза финансовых моделей</li>
                        <li class="services-list__element">Оценка стоимости проектов и предприятий</li>
                        <li class="services-list__element">Разработка ТЭО инвестиций и Бизнес-планов</li>
                    </ul>
                </div>

                <div class="service__img-block">
                    <img src="/images/service1.jpg" alt="/images/service1.jpg" class="js-services__img" width="100%">
                </div>
            </div>

            <div class="services__block2">
                <div class="service__img-block">
                    <img src="/images/service1.jpg" alt="/images/service1.jpg" class="js-services__img" width="100%">
                </div>

                <div class="services__text-wrap" id="0">
                    <h4 class="services-block__title">Финансовое моделирование и аудит моделей: </h4>
                    <ul class="services__list">
                        <li class="services-list__element">Разработка финансовых моделей инвесторов и развитие бизнеса</li>
                        <li class="services-list__element">Экспертиза финансовых моделей</li>
                        <li class="services-list__element">Оценка стоимости проектов и предприятий</li>
                        <li class="services-list__element">Разработка ТЭО инвестиций и Бизнес-планов</li>
                    </ul>
                </div>
            </div>

            <div class="services__block2">
                <div class="services__text-wrap" id="1">
                    <h4 class="services-block__title">Финансовое моделирование и аудит моделей: </h4>
                    <ul class="services__list">
                        <li class="services-list__element">Разработка финансовых моделей инвесторов и развитие бизнеса</li>
                        <li class="services-list__element">Экспертиза финансовых моделей</li>
                        <li class="services-list__element">Оценка стоимости проектов и предприятий</li>
                        <li class="services-list__element">Разработка ТЭО инвестиций и Бизнес-планов</li>
                    </ul>
                </div>

                <div class="service__img-block">
                    <img src="/images/service1.jpg" alt="/images/service1.jpg" class="js-services__img" width="100%">
                </div>
            </div>

        </div>

        <div class="services-mobile">
            <? $counter = 0; ?>

            <? foreach ($this->params['services'] as $service):?>

                <div class="services__block2">
                    <div class="services__block service__img-block">
                        <img src="/images/<?=$service['picture']?>" alt="<?=$service['picture']?>" class="js-services__img">
                    </div>

                    <div class="services__text-wrap" data-service-id="<?= $counter ?>">
                        <h4 class="services-block__title"><?=$service['name']?>: </h4>
                        <ul class="services__list">
                            <? foreach ($service['items'] as $item):?>
                                <li class="services-list__element"><?=$item['name']?></li>
                            <? endforeach;?>
                        </ul>
                    </div>
                </div>

                <? $counter++ ?>

            <? endforeach;?>
        </div>
    </div>
</article>
<!-- //БЛОКИ С УСЛУГАМИ -->