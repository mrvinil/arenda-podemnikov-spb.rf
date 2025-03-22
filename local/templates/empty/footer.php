<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>



</main>

<footer class="footer gap" id="contacts">
	<div class="section footer__info">
		<div class="footer__logo-wrap">
			<a href="/" class="footer__logo link"></a>
			<p class="footer__address footer__address_type_desktop">Режим работы: Пн–Пт с 9:00 до 19:00</p>
		</div>
		<div class="footer__contacts">
			<a href="tel:<? if(file_exists($phonePath)) require $phonePath; ?>" class="phone-link link">
				<?$APPLICATION->IncludeFile(
						SITE_DIR."/include/phone.php",
						Array(),
						Array("MODE"=>"php")
				);?>
			</a>
			<p class="footer__address footer__address_type_mobile">Режим работы: Пн–Пт с 9:00 до 19:00</p>
		</div>
	</div>
</footer>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/assets/templates/callback.php';?>


</body>
</html>