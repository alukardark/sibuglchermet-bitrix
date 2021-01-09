<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Компания");

header("HTTP/1.1 301 Moved Permanently");
header("Location: /kompaniya/nashi-predpriyatiya/");
exit();

?>



<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"); ?>