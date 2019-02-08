<!-- БЛОКИ С УСЛУГАМИ -->
<article class="services__wrap" id="services">
    <div class="container">
        <h3 class="services__title">Услуги</h3>
        <p class="services__text">Кликните по интересующему текстовому блоку для получения подробнной информации о кейсе услуг</p>


        <!-- desctop version of services -->
        <div class="services__grid services-main">

            <!-- вот тут нужно будет менять фотку сверху или снизу -->
            <!-- получается во 2, 5, 8 (ф-ла 3n+2) блоках фотография находятся сверху, у остальных снизу -->

            <!-- в data-service-id нужно также будет поместить счетчик -->

            <? foreach ($this->params['services'] as $service):?>

                <div class="services__block">

                    <!-- вот этот блок должен перемещаяться. 1 вариант тут. в  2, 5, 8.. блоках -->
                    <div class="service__img-block">
                        <img src="/images/<?=$service['picture']?>" alt="<?=$service['picture']?>" class="js-services__img" width="100%">
                    </div>
                    <!-- вот этот блок должен перемещаяться 1 вариант тутю в  2, 5, 8.. блоках -->

                    <div class="services__text-wrap" data-service-id="<?=$service['id']?>">
                        <h4 class="services-block__title"><?=$service['name']?>: </h4>
                        <ul class="services__list">
                            <? foreach ($service['items'] as $item):?>
                                <li class="services-list__element"><?=$item['name']?></li>
                            <? endforeach;?>
                        </ul>
                    </div>
                    
                    <!--

                    -- 2 вариант тут -- во всех остальных блоках

                    <div class="service__img-block">
                        <img src="/images/<?=$service['picture']?>" alt="<?=$service['picture']?>" class="js-services__img" width="100%">
                    </div>

                    -- 2 вариант тут -- во всех остальных блоках

                    -->

                </div>

                

            <? endforeach;?>

        <!-- desctop version of services -->


        <!-- mobile version of services -->
        <div class="services-mobile">

            <!-- тут фотографии менять местами не нужно, я сделал это с помощью css классов -->

            <!-- счетчик counter должен быть как в этом блоке и в том, что выше, я привязал его к -->
            <!-- полю data-service-id (у services_test-wrap) на 130 строчке -->

            <? foreach ($this->params['services'] as $service):?>

                <div class="services__block">
                    <div class="services__block service__img-block">
                        <img src="/images/<?=$service['picture']?>" alt="<?=$service['picture']?>" class="js-services__img">
                    </div>

                    <div class="services__text-wrap" data-service-id="<?=$service['id']?>">
                        <h4 class="services-block__title"><?=$service['name']?>: </h4>
                        <ul class="services__list">
                            <? foreach ($service['items'] as $item):?>
                                <li class="services-list__element"><?=$item['name']?></li>
                            <? endforeach;?>
                        </ul>
                    </div>
                </div>
            <? endforeach;?>
        </div>
        <!-- //mobile version of services -->
    </div>
</article>
<!-- //БЛОКИ С УСЛУГАМИ -->