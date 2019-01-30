
<?php
var_dump($this);
?>
<div class="widget__wrap" id="js-widget__company-info" style="display: none;">
    <div class="widget__company-info">
        <div class="widget-c__header">
            <h3 class="widget__main-title">Оценка бизнеса финансовое моделирование</h3>
            <br />
            <p class="widget__desc">Аудит финансовых моделей</p>
        </div>
        <? foreach ($this->params['projects'] as $project):?>
            <div class="widget__c-left">
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
                    <h4 class="widget__title">Выполненные работы:</h4>
                    <ul class="widget__list">
                        <li class="widget-list__element">Комплексный анализ технико-экономических параметров объекта;</li>
                        <li class="widget-list__element">Аудит и корректировка расчетных алгоритмов и структуры имеющейся финансово-экономической модели (ФЭМ);</li>
                        <li class="widget-list__element">Подготовка ФЭМ для двух сценариев реализации Проекта;</li>
                        <li class="widget-list__element">Независимый аудит экономического раздела отчета о подсчетах запасов, выдача замечаний и корректировок к заложенным в расчеты предпосылок.</li>
                    </ul>
                </div>

                <div class="widget-c__block">
                    <h4 class="widget__title">Результаты работ:</h4>
                    <ul class="widget__list">
                        <li class="widget-list__element">Выполнены аудит и корректировка существующей финансово-экономической модели Проекта в части корректности расчетов и логики построения модели. </li>
                        <li class="widget-list__element">Подготовлена многосценарная ФЭМ для представления внешнему инвестору или потенциальному кредитору.</li>
                        <li class="widget-list__element">Произведена оценка стоимости актива на основе мультипликаторов, объектов аналогов и DCF-анализа.</li>
                        <li class="widget-list__element">Заказчику предоставлен отчет с рекомендациями по оптимизации ключевых финансово-экономических параметров объекта для повышения инвестиционной привлекательности актива.</li>
                    </ul>
                </div>
            </div>
        <?endforeach;?>
        <span class="widget__close-btn js-widget__close"></span>
    </div>
</div>