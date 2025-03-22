<div class="popup popup-callback">
	<div class="popup__container popup-callback__container" id="callbackFirstForm">
		<button class="popup__close popup-callback__close link" type="button"></button>
		<form action="#" class="popup__form" id="popupcallback" novalidate>
			<h2 class="popup__title">Введите, пожалуйста, свой номер телефона, наши специалисты свяжутся с Вами</h2>
			<fieldset class="popup__input-wrap">
				<label class="popup__label">
					<input type="hidden" name="productName" value="">
					<input type="hidden" name="productPrice" value="">
					<input type="hidden" name="productSize" value="">
					<input type="hidden" name="productUtm" value="<?= $utmMark ?>">
					<input class="popup__input"
					       id="tel-input"
					       name="phone"
					       type="tel"
					       placeholder="+7"
					       data-tel-input
					       minlength="17"
					       maxlength="18"
					       required
					>
					<span class="popup__error tel-input-error"></span>
				</label>
				<button class="btn btn--yellow popup__btn" type="submit">Жду звонка</button>
			</fieldset>
		</form>
	</div>
	<div class="popup__container popup-callback__container popup__success" id="message">
		<button class="popup__close popup-callback__close link" type="button"></button>
		<div class="popup__form">
			<h2 class="popup__title">Спасибо за заявку!</h2>
			<p class="popup__desc">Наши менеджеры уже обрабатывают заявку</p>
			<span href="#" class="btn btn--yellow popup__btn popup-callback__close">Понятно</span>
		</div>
	</div>
</div>