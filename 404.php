<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404", "Y");

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

$APPLICATION->SetTitle("Страница не найдена");

?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-not-found-right">
                    <h3>Ошибка 404</h3>
                    <a href="/">Перейти на главную</a>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>

<?

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>