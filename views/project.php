<!-- 
    6 строчка, поле id="ervice-id_#"
    вместо # писать соответствующй id сервиса. Например: service-id_1, service-id_2... 
-->

<? foreach ($this->params['projects'] as $projects):?>
    <?
    $keys = array_keys($projects);
    $firstKey = $keys[0];
    $serviceId = $projects[$firstKey]['id_Service'];
    ?>
    <div class="widget__wrap js-widget__company-info" id="service-id_<?=$serviceId?>" style="display: none;">
        
        <!-- вот тут, рядом с widget__company-info нужно будет поместить  -->
        <!-- widget__company-single -->

        <!-- пример для виджета с одним блоком:   <div class="widget__company-info widget__company-single"> -->
        <div class="widget__company-info <? if(count($projects) == 1) { echo 'widget__company-single';}; ?>">
            <div class="widget-c__header">
                <h3 class="widget__main-title"><?=$projects[$firstKey]['title']?></h3>
                <br />
                <p class="widget__desc"><?=$projects[$firstKey]['subtitle']?></p>
            </div>
            <? foreach ($projects as $project):?>
                <div class="widget__c-block_wrap">
                    <div class="widget-c__block c__image-block">
                        <div class="widget-c__logo">
                            <img src="/images/<?=$project['picture']?>" alt="/images<?=$project['picture']?>">
                        </div>

                        <div class="widget__list-wrap">
                            <ul class="widget__list">
                                <li class="widget__list-element">
                                    <span class="text-bold">Проект:</span>
                                    <?=$project['project_Name']?>
                                </li>
                                <li class="widget__list-element">
                                    <span class="text-bold">Заказчик:</span>
                                    <?=$project['client_Name']?>
                                </li>
                                <li class="widget__list-element">
                                    <span class="text-bold">Цель:</span>
                                    <?=$project['goal']?>
                                </li>
                                <li class="widget__list-element">
                                    <span class="text-bold">Срок реализации:</span>
                                    <?=$project['time']?>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <? if (!empty($project['itemsDone'])):?>

                        <div class="widget-c__block">
                            <h4 class="widget__title"><?=$this->params['doneTitle']?>:</h4>
                            <ul class="widget__list">
                                <? $count = count($project['itemsDone']); $i = 0; ?>
                                <? foreach ($project['itemsDone'] as $item):?>
                                    <? $i++; ?>
                                    <li class="widget-list__element">
                                        <?=$item['name']?><?if($i != $count):?>;<?else:?>.<?endif;?>
                                    </li>
                                <?endforeach;?>
                            </ul>
                        </div>
                    <?endif;?>

                    <? if (!empty($project['itemsResult'])):?>

                        <div class="widget-c__block">
                            <h4 class="widget__title"><?=$this->params['resultTitle']?>:</h4>
                            <ul class="widget__list">
                                <? $count = count($project['itemsResult']); $i = 0; ?>
                                <? foreach ($project['itemsResult'] as $item):?>
                                    <? $i++; ?>
                                    <li class="widget-list__element">
                                        <?=$item['name']?><?if($i != $count):?>;<?else:?>.<?endif;?>
                                    </li>
                                <?endforeach;?>
                            </ul>
                        </div>
                    <?endif;?>
                </div>
            <?endforeach;?>
            <span class="widget__close-btn js-widget__close"></span>
        </div>
    </div>
<?endforeach;?>
