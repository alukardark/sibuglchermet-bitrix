<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Карта сайта");
echo "<div class='container'>";
echo "<div class='row'>";
echo "<div class='col-md-12'>";
?>

<?
$APPLICATION->IncludeComponent(
    "bitrix:main.map",
    ".default",
    array(
        "LEVEL" => "3",
        "COL_NUM" => "2",
        "SHOW_DESCRIPTION" => "Y",
        "SET_TITLE" => "Y",
        "CACHE_TIME" => "36000000",
        "COMPONENT_TEMPLATE" => ".default",
        "CACHE_TYPE" => "A"
    ),
    false
);
?>

<?
echo "<br>";
echo "<br>";
echo "</div>";
echo "</div>";
echo "</div>";
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>


