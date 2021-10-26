<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Test");
?><?$APPLICATION->IncludeComponent(
	"biv:ekzam",
	"",
        [
          'AJAX_MODE' => 'Y'
        ]
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>