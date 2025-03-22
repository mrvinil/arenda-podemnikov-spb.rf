<?
foreach($arResult["ITEMS"] as $arItem):
	if(isset($arItem["PROPERTIES"]["MORE_PHOTO"]["VALUE"]) && is_array($arItem["PROPERTIES"]["MORE_PHOTO"]["VALUE"]))
	{
		foreach($arItem["PROPERTIES"]["MORE_PHOTO"]["VALUE"] as $FILE)
		{
			$FILE = CFile::GetFileArray($FILE);
			if(is_array($FILE))
				$arResult["MORE_PHOTO"][$arItem["ID"]][]=$FILE;
		}
	}
endforeach;
