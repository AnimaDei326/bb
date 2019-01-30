<!-- БЛОКИ С УСЛУГАМИ -->
<article class="services__wrap" id="services">
    <div class="container">
        <h3 class="services__title">Услуги</h3>
        <p class="services__text">Кликните по интересующему текстовому блоку для получения подробнной информации о кейсе услуг</p>

        <div class="services__grid">
            <? foreach ($this->params['services'] as $service):?>

                <div class="services__block">
                    <div class="services__text-wrap">
                        <h4 class="services-block__title"><?=$service['name']?>: </h4>
                        <ul class="services__list">
                            <? foreach ($service['items'] as $item):?>
                                <li class="services-list__element"><?=$item['name']?></li>
                            <? endforeach;?>
                        </ul>
                    </div>
                </div>

                <div class="services__block service__img-block">
                    <img src="/images/<?=$service['picture']?>" alt="<?=$service['picture']?>" class="js-services__img">
                </div>

            <? endforeach;?>

        </div>
    </div>
</article>
<!-- //БЛОКИ С УСЛУГАМИ -->