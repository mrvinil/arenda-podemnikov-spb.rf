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


<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();
   for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
   k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(98979835, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/98979835" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</body>
</html>