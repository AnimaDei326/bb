<!-- БЛОК С ОПЫТОМ И НАПРАВЛЕНИЯМИ ДЕЯТЕЛЬНОСТИ -->
<article class="expierence-article" id="about_company">
    <div class="container">
        <div class="light__section">
            <div class="section-left__block">
                <h3 class="expierence__title-main">B&B consulting</h3>
                <div class="activity-direction__wrap">
                    <h4 class="expierence-block__title">Направления деятельности:</h4>

                    <ul class="expierence__list">
                        <? foreach ($this->params['text'] as $item):?>
                            <li class="expierence-list__element"><?=$item['name']?></li>
                        <? endforeach;?>
                    </ul>
                    <a class="download_link" href="/upload/presentation.pdf" download="Презентация о B&B Consulting">Скачать презентацию</a>
                </div>
            </div>

            <div class="section-right__block">
                <h4 class="expierence-block__title">О компании</h4>
                <? foreach ($this->params['desc'] as $item):?>
                    <p class="expierence__text"><?=$item['name']?></p>
                <? endforeach;?>

                <div class="expierence-images__wrap">
                    <? foreach ($this->params['photo'] as $item):?>
                        <div class="ex-image__wrap">
                        	<a href="/images/<?=$item['name']?>" class="swipebox" rel="gallery-1" >
                        		<img src="/images/<?=$item['name']?>" alt="<?=$item['name']?>" class="expierence__img">
                        	</a>
                        </div>
                    <? endforeach;?>
                </div>

                <h4 class="expierence-block__title">Партнеры</h4>
                <div class="partners-logo__wrap">
                    <? foreach ($this->params['partner'] as $item):?>
                        <img src="/images/<?=$item['name']?>" alt="images/shaneko.jpg" class="parnter-logo__img">
                    <? endforeach;?>
                </div>
            </div>
        </div>
    </div>
</article>
<!-- // БЛОК С ОПЫТОМ И НАПРАВЛЕНИЯМИ ДЕЯТЕЛЬНОСТИ -->