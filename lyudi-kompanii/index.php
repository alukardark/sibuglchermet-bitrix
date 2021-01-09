<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Люди компании");

header("HTTP/1.1 301 Moved Permanently");
header("Location: /lyudi-kompanii/vakansii/");
exit();

?>



<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"); ?>