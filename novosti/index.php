<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Новости");

header("HTTP/1.1 301 Moved Permanently");
header("Location: /novosti/press-relizy/");
exit();

?>



<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"); ?>