<!-- РАБОТНИКИ  -->
<article class="staff-article" id="Team">
    <div class="container">
        <div class="staff__wrap">
            <div class="staff-left__block partners__wrap">
                <h4 class="staff__title">Управляющие партнеры</h4>
                <div class="staff-blocks__wrap">

                    <? foreach ($this->params['team'] as $team): ?>
                        <?if($team['code'] == 'boss'):?>
                            <!-- блок с работницком -->
                            <div class="staff__block">
                                <div class="staff-img" style="background-image: url('/images/<?=$team['picture']?>')"></div>

                                <h5 class="staff__name"><?=$team['first_name']?> <?=$team['second_name']?></h5>
                                <p class="staff__info"><?=$team['institution']?></p>
                                <div class="staff__speciality"><?=$team['speciality']?></div>
                            </div>
                            <!-- //блок с работницком -->
                        <?endif;?>
                   <?endforeach;?>

                </div>
            </div>

            <div class="staff-right__block">
                <h4 class="staff__title">Эксперты</h4>
                <div class="staff-blocks__wrap">
                    <? foreach ($this->params['team'] as $team): ?>
                        <?if($team['code'] == 'expert'):?>
                            <!-- блок с работницком -->
                            <div class="staff__block">
                                <!-- если вдруг фотографии действительно нужны... -->
                                <!-- <div class="staff-img"></div> -->
                                <h5 class="staff__name"><?=$team['first_name']?> <?=$team['second_name']?></h5>
                                <p class="staff__info"><?=$team['institution']?></p>
                                <div class="staff__speciality"><?=$team['speciality']?></div>
                            </div>
                            <!-- //блок с работницком -->
                        <?endif;?>
                    <?endforeach;?>
                </div>


                <h4 class="staff__title">Консультанты</h4>
                <div class="staff-blocks__wrap">
                    <? foreach ($this->params['team'] as $team): ?>
                        <?if($team['code'] == 'consult'):?>
                            <!-- блок с работницком -->
                            <div class="staff__block">
                                <!-- <div class="staff-img"></div> -->

                                <h5 class="staff__name"><?=$team['first_name']?> <?=$team['second_name']?></h5>
                                <p class="staff__info"><?=$team['institution']?></p>
                                <div class="staff__speciality"><?=$team['speciality']?></div>
                            </div>
                            <!-- //блок с работницком -->
                        <?endif;?>
                    <?endforeach;?>
                </div>
            </div>
        </div>
    </div>
</article>
<!-- //РАБОТНИКИ  -->