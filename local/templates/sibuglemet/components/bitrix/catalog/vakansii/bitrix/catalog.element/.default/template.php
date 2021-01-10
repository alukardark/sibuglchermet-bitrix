<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 * @var string $templateFolder
 */

$this->setFrameMode(true);


?>
<div class="vacancies__wrap">
    <div class="vacancies__cont" id="article">
        <div class="vacancies__work-experience">
            Требуемый опыт работы: <strong><?= $arResult['PROPERTIES']['EXPERIENCE']['VALUE'] ?></strong>
        </div>

        <?= $arResult['DETAIL_TEXT'] ?>

        <a href="<?= $arResult['LIST_PAGE_URL'] ?>" class="back-link">Вернуться к списку вакансий</a>
    </div>

    <div class="vacancies__aside" id="aside-sticky">
        <div class="vacancies__aside-wrap">
            <div class="vacancies__aside-place">
                <?= $arResult['PROPERTIES']['PLACE']['VALUE'] ?>
            </div>
            <div class="vacancies__aside-city">
                <?= $arResult['PROPERTIES']['CITY']['VALUE'] ?>
            </div>
            <a data-fancybox="" data-auto-focus="false" data-src="#callback" href="javascript:"
               class="vacancies__aside-link">Откликнуться на вакансию</a>
        </div>
    </div>
</div>


<div data-toolbar="false" style="display: none;" id="callback" class="fancy-modal">
    <div class="fancy-modal__wrap">
        <h2>Отправить резюме</h2>

        <?

        $GLOBALS['vacancies_name'] = $arResult['NAME'];
        $APPLICATION->IncludeComponent(
            "sibuglemet:feedback",
            "vacancies",
            array(
                "EVENT_ALIAS" => FOS_VACANCIES_EVENT,
                "STORE_IBLOCK_ID" => 28,
                "FIELDS" => array(
                    "ANSWER_NAME" => "ФИО",
                    "ANSWER_EMAIL" => "E-mail",
                    "ANSWER_PHONE" => "Телефон",
                    "ANSWER_TEXT" => "Напишите почему вы подходите на вакантную должность, какую пользу можете принести компании и почему должны выбрать именно вас",
                ),
                "REQUIRED_FIELDS" => array(
                    "ANSWER_TEXT",
                    "ANSWER_NAME",
                ),
                "UPLOAD_FILE" => "ANSWER_FILE",
                "OK_MESSAGE" => "Спасибо, ваше сообщение принято!"
            ),
            false,
            array(
                "HIDE_ICONS" => "Y"
            )
        );
        ?>



        <!--<div data-fancybox-close class="fancy-modal__close"></div>-->
    </div>
</div>