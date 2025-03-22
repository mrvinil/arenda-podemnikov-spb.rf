<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
{
	die();
}

/**
 * @var array $arResult
 */

if ($arResult["isFormErrors"] == "Y"):?>
	<?=$arResult["FORM_ERRORS_TEXT"];?>
<?endif;?>

<div class="product--form-arenda--form">
	<?= $arResult["FORM_NOTE"] ?? '' ?>

	<?if ($arResult["isFormNote"] != "Y"): ?>
		<?=$arResult["FORM_HEADER"]?>
		<div class="error-msg"></div>
		<? foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion): ?>
			<? if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden'): ?>
				<?=$arQuestion["HTML_CODE"]; ?>
			<? elseif($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'checkbox'): ?>
				<? if (isset($arResult["FORM_ERRORS"][$FIELD_SID])): ?>
					<span class="error-fld" title="<?=htmlspecialcharsbx($arResult["FORM_ERRORS"][$FIELD_SID])?>"></span>
				<?endif;?>

				<div class="form-check">
					<?=$arQuestion["HTML_CODE"]?>
				</div>
			<? else: ?>
				<? if (isset($arResult["FORM_ERRORS"][$FIELD_SID])): ?>
					<span class="error-fld" title="<?=htmlspecialcharsbx($arResult["FORM_ERRORS"][$FIELD_SID])?>"></span>
				<?endif;?>

				<div class="form-group">
					<?=$arQuestion["HTML_CODE"]?>
				</div>
			<? endif; ?>
		<? endforeach; ?>

		<input <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?> type="submit" name="web_form_submit" value="<?=htmlspecialcharsbx(trim($arResult["arForm"]["BUTTON"]) == '' ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?>" />
		<?=$arResult["FORM_FOOTER"]?>
	<? endif; ?>
</div>

<div class="modal" id="modalSuccessMessage" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Сообщение успешно отправлено</h5>
      </div>
      <div class="modal-body">
        <p>Сообщение успешно отправлено! Мы с Вами свяжемся позже!</p>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="modalErrorMessage" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ошибка в процессе отправки сообщения</h5>
      </div>
      <div class="modal-body">
        <p>В процессе отправки сообщения возникла ошибка. Попробуйте отправить сообщение позже.</p>
      </div>
    </div>
  </div>
</div>

<script>
    ajaxForm(document.getElementsByName('<?=$arResult['arForm']['SID']?>')[0], '<?=$templateFolder?>/ajax.php')
</script>

<? 
$this->addExternalCss(SITE_TEMPLATE_PATH . "/assets/libs/air-datepicker/dist/air-datepicker.css");
$this->addExternalJS(SITE_TEMPLATE_PATH . "/assets/libs/air-datepicker/dist/air-datepicker.js");
//$this->addExternalJS(SITE_TEMPLATE_PATH . "/assets/libs/inputmask/dist/jquery.inputmask.min.js");
?>

<script>
	/*var im = new Inputmask("+7 (999) 999-99-99");
	im.mask("#phonepck");*/

	let today=new Date();
	new AirDatepicker('#dpckinput', {
		range:true,
		minDate:today,
		multipleDatesSeparator:' - ',
		onSelect:({date})=>{
			if(date.length==2) {
					firstDate=date[0].setDate(date[0].getDate());
					secondDate=date[1].setDate(date[1].getDate());
					afterFive=date[0].setDate(date[0].getDate()+4);
					if(secondDate<afterFive){
						datepicker.unselectDate(secondDate);
					}
			}
		}
	});
</script>

