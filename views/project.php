<!-- 
    6 строчка, поле id="ervice-id_#"
    вместо # писать соответствующй id сервиса. Например: service-id_1, service-id_2... 
-->
<?
var_dump($this->params['projects']);
?>
<div class="widget__wrap" id="js-widget__company-info service-id_#" style="display: none;">
    <div class="widget__company-info">
        <div class="widget-c__header">
            <h3 class="widget__main-title">Оценка бизнеса финансовое моделирование</h3>
            <br />
            <p class="widget__desc">Аудит финансовых моделей</p>
        </div>
        <? foreach ($this->params['projects'] as $project):?>
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
            </div>
        <?endforeach;?>
        <span class="widget__close-btn js-widget__close"></span>
    </div>
</div>