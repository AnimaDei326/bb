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
                </div>
            </div>

            <div class="section-right__block">
                <h4 class="expierence-block__title">Текст об опыте</h4>
                <? foreach ($this->params['desc'] as $item):?>
                    <p class="expierence__text"><?=$item['name']?></p>
                <? endforeach;?>

                <div class="expierence-images__wrap">
                    <? foreach ($this->params['photo'] as $item):?>
                        <div class="ex-image__wrap"><img src="/images/<?=$item['name']?>" alt="<?=$item['name']?>" class="expierence__img"></div>
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



<?

        /*
		<!-- РАБОТНИКИ  -->
		<article class="staff-article" id="Team">
			<div class="container">
				<div class="staff__wrap">
					<div class="staff-left__block partners__wrap">
						<h4 class="staff__title">Управляющие партнеры</h4>
						<div class="staff-blocks__wrap">

							<!-- блок с работницком -->
							<div class="staff__block">
								<div class="staff-img" style="background-image: url(\'/images/Biliy.jpg\')"></div>

								<h5 class="staff__name">Александр Билый</h5>
								<p class="staff__info">Выпускник ВЮЗ филфак</p>
								<div class="staff__speciality">Специалист по построению ВУМ</div>
							</div>
							<!-- //блок с работницком -->

							<!-- блок с работницком -->
							<div class="staff__block">
								<div class="staff-img" style="background-image: url(\'/images/Borisov.jpg\')"></div>

								<h5 class="staff__name">Александр Билый</h5>
								<p class="staff__info">Выпускник ВЮЗ филфак</p>
								<div class="staff__speciality">Специалист по построению ВУМ</div>
							</div>
							<!-- //блок с работницком -->

						</div>
					</div>

					<div class="staff-right__block">
						<h4 class="staff__title">Эксперты</h4>
						<div class="staff-blocks__wrap">

							<!-- блок с работницком -->
							<div class="staff__block">
								<!-- если вдруг фотографии действительно нужны... -->
								<!-- <div class="staff-img"></div> -->

								<h5 class="staff__name">Александр Билый</h5>
								<p class="staff__info">Выпускник ВЮЗ филфак</p>
								<div class="staff__speciality">Специалист по построению ВУМ</div>
							</div>
							<!-- //блок с работницком -->

							<!-- блок с работницком -->
							<div class="staff__block">
								<!-- <div class="staff-img"></div> -->

								<h5 class="staff__name">Александр Билый</h5>
								<p class="staff__info">Выпускник ВЮЗ филфак</p>
								<div class="staff__speciality">Специалист по построению ВУМ</div>
							</div>
							<!-- //блок с работницком -->

							<!-- блок с работницком -->
							<div class="staff__block">
								<!-- <div class="staff-img"></div> -->

								<h5 class="staff__name">Александр Билый</h5>
								<p class="staff__info">Выпускник ВЮЗ филфак</p>
								<div class="staff__speciality">Специалист по построению ВУМ</div>
							</div>
							<!-- //блок с работницком -->

							<!-- блок с работницком -->
							<div class="staff__block">
								<!-- <div class="staff-img"></div> -->

								<h5 class="staff__name">Александр Билый</h5>
								<p class="staff__info">Выпускник ВЮЗ филфак</p>
								<div class="staff__speciality">Специалист по построению ВУМ</div>
							</div>
							<!-- //блок с работницком -->

						</div>


						<h4 class="staff__title">Консультанты</h4>
						<div class="staff-blocks__wrap">

							<!-- блок с работницком -->
							<div class="staff__block">
								<!-- <div class="staff-img"></div> -->

								<h5 class="staff__name">Александр Билый</h5>
								<p class="staff__info">Выпускник ВЮЗ филфак</p>
								<div class="staff__speciality">Специалист по построению ВУМ</div>
							</div>
							<!-- //блок с работницком -->

							<!-- блок с работницком -->
							<div class="staff__block">
								<!-- <div class="staff-img"></div> -->

								<h5 class="staff__name">Александр Билый</h5>
								<p class="staff__info">Выпускник ВЮЗ филфак</p>
								<div class="staff__speciality">Специалист по построению ВУМ</div>
							</div>
							<!-- //блок с работницком -->

							<!-- блок с работницком -->
							<div class="staff__block">
								<!-- <div class="staff-img"></div> -->

								<h5 class="staff__name">Александр Билый</h5>
								<p class="staff__info">Выпускник ВЮЗ филфак</p>
								<div class="staff__speciality">Специалист по построению ВУМ</div>
							</div>
							<!-- //блок с работницком -->

						</div>
					</div>
				</div>
			</div>
		</article>
		<!-- //РАБОТНИКИ  -->
*/

?>