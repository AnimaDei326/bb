<?
var_dump($this);
?>
<!-- БЛОК С ОПЫТОМ И НАПРАВЛЕНИЯМИ ДЕЯТЕЛЬНОСТИ -->
		<article class="expierence-article" id="about_company">
			<div class="container">
				<div class="light__section">
					<div class="section-left__block">
						<h3 class="expierence__title-main">B&B consulting</h3>
						<div class="activity-direction__wrap">
							<h4 class="expierence-block__title">Направления деятельности:</h4>

							<ul class="expierence__list">
                                <? foreach ($this->params['about'] as $item):?>
                                    <li class="expierence-list__element"><?=$item['name']?></li>
								<? endforeach;?>
							</ul>
						</div>
					</div>

					<div class="section-right__block">
						<h4 class="expierence-block__title">Текст об опыте</h4>
						<p class="expierence__text">Практический опыт показывает, что социально-экономическое развитие играет важную роль в формировании направлений прогрессивного развития?</p>
						<p class="expierence__text">Не следует, однако, о том, что постоянный количественный рост и сфера нашей активности требует определеня и уточнения форм воздействия!</p>

						<div class="expierence-images__wrap">
							<div class="ex-image__wrap"><img src="images/experience.jpg" alt="experience" class="expierence__img"></div>
							<div class="ex-image__wrap"><img src="images/experience1.jpg" alt="experience" class="expierence__img"></div>
							<div class="ex-image__wrap"><img src="images/experience.jpg" alt="experience" class="expierence__img" height="500" width="800"></div>
						</div>

						<h4 class="expierence-block__title">Партнеры</h4>
						<div class="partners-logo__wrap">
							<img src="images/shaneko.jpg" alt="images/shaneko.jpg" class="parnter-logo__img">
							<img src="images/Prologics.jpg" alt="Prologics.jpg" class="parnter-logo__img">
							<img src="images/image007.jpg" alt="image007.jpg" class="parnter-logo__img">
						</div>
					</div>
				</div>
			</div>
		</article>
<!-- // БЛОК С ОПЫТОМ И НАПРАВЛЕНИЯМИ ДЕЯТЕЛЬНОСТИ -->
<?
/*
		<!-- БЛОКИ С УСЛУГАМИ -->
		<article class="services__wrap" id="services">
			<div class="container">
				<h3 class="services__title">Услуги</h3>
				<p class="services__text">Кликните по интересующему текстовому блоку для получения подробнной информации о кейсе услуг</p>

				<div class="services__grid">
					<div class="services__block">
						<div class="services__text-wrap">
							<h4 class="services-block__title">Финансовое моделирование и аудит моделей: </h4>

							<ul class="services__list">
								<li class="services-list__element">Разработка финансовых моделей инвесторов и развитие бизнеса</li>
								<li class="services-list__element">Экспертиза финансовых моделей</li>
								<li class="services-list__element">Оценка стоимости проектов и предприятий</li>
								<li class="services-list__element">Разработка ТЭО инвестиций и Бизнес-планов</li>
							</ul>
						</div>
					</div>

					<div class="services__block service__img-block">
						<img src="images/grid_test.png" alt="grid_test.png" class="js-services__img">
						<!-- <div class="s-services__img k-services__img"></div> -->
					</div>

					<div class="services__block">
						<div class="services__text-wrap">
							<h4 class="services-block__title">Финансовое моделирование и аудит моделей: </h4>

							<ul class="services__list">
								<li class="services-list__element">Разработка финансовых моделей инвесторов и развитие бизнеса</li>
								<li class="services-list__element">Экспертиза финансовых моделей</li>
								<li class="services-list__element">Оценка стоимости проектов и предприятий</li>
								<li class="services-list__element">Разработка ТЭО инвестиций и Бизнес-планов</li>
							</ul>
						</div>
					</div>

					<div class="services__block service__img-block">
						<img src="images/grid_test.png" alt="grid_test.png" class="js-services__img">
					</div>

					<div class="services__block">
						<div class="services__text-wrap">
							<h4 class="services-block__title">Финансовое моделирование и аудит моделей: </h4>

							<ul class="services__list">
								<li class="services-list__element">Разработка финансовых моделей инвесторов и развитие бизнеса</li>
								<li class="services-list__element">Экспертиза финансовых моделей</li>
								<li class="services-list__element">Оценка стоимости проектов и предприятий</li>
								<li class="services-list__element">Разработка ТЭО инвестиций и Бизнес-планов</li>
							</ul>
						</div>
					</div>

					<div class="services__block service__img-block">
						<img src="images/grid_test.png" alt="grid_test.png" class="js-services__img">
					</div>

					<div class="services__block">
						<div class="services__text-wrap">
							<h4 class="services-block__title">Финансовое моделирование и аудит моделей: </h4>

							<ul class="services__list">
								<li class="services-list__element">Разработка финансовых моделей инвесторов и развитие бизнеса</li>
								<li class="services-list__element">Экспертиза финансовых моделей</li>
								<li class="services-list__element">Оценка стоимости проектов и предприятий</li>
								<li class="services-list__element">Разработка ТЭО инвестиций и Бизнес-планов</li>
							</ul>
						</div>
					</div>

					<div class="services__block service__img-block">
						<img src="images/grid_test.png" alt="grid_test.png" class="js-services__img">
					</div>

					<div class="services__block">
						<div class="services__text-wrap">
							<h4 class="services-block__title">Финансовое моделирование и аудит моделей: </h4>

							<ul class="services__list">
								<li class="services-list__element">Разработка финансовых моделей инвесторов и развитие бизнеса</li>
								<li class="services-list__element">Экспертиза финансовых моделей</li>
								<li class="services-list__element">Оценка стоимости проектов и предприятий</li>
								<li class="services-list__element">Разработка ТЭО инвестиций и Бизнес-планов</li>
							</ul>
						</div>
					</div>

					<div class="services__block service__img-block">
						<img src="images/grid_test.png" alt="grid_test.png" class="js-services__img">
					</div>

					<div class="services__block">
						<div class="services__text-wrap">
							<h4 class="services-block__title">Финансовое моделирование и аудит моделей: </h4>

							<ul class="services__list">
								<li class="services-list__element">Разработка финансовых моделей инвесторов и развитие бизнеса</li>
								<li class="services-list__element">Экспертиза финансовых моделей</li>
								<li class="services-list__element">Оценка стоимости проектов и предприятий</li>
								<li class="services-list__element">Разработка ТЭО инвестиций и Бизнес-планов</li>
							</ul>
						</div>
					</div>

					<div class="services__block service__img-block">
						<img src="images/grid_test.png" alt="grid_test.png" class="js-services__img">
					</div>
				</div>
			</div>
		</article>
		<!-- //БЛОКИ С УСЛУГАМИ -->





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