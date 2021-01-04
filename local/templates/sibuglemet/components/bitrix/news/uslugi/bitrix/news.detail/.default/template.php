<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
$GLOBALS['this_service'] = $arResult['NAME'];
?>
<div class="services-item">
    <div class="inner-wrapper">
        <div class="inner-content">


            <img src="<?=$arResult['DETAIL_PICTURE']['SRC']?>" alt="">
            <div class="services-text">
                <?=$arResult['DETAIL_TEXT']?>
            </div>
            <a href="<?=$arResult['LIST_PAGE_URL']?>" class="link-all-services"><i class="ion-chevron-left"></i><span>Перейти ко всем услугам</span></a>
        </div>

    </div>
    <div class="order-service">
        <h3>Заказать услугу</h3>
        <? $APPLICATION->IncludeComponent(
            "axi:feedback",
            "order_service",
            array(
                "EVENT_ALIAS" => FOS_SERVICES_EVENT,
                "STORE_IBLOCK_ID" => 9,
                "FIELDS" => array(
                    "ANSWER_NAME" => "Имя",
                    "ANSWER_EMAIL" => "E-mail",
                    "ANSWER_PHONE" => "Телефон*",
                    "ANSWER_TEXT" => "Комментарий к заказу",
                ),
                "REQUIRED_FIELDS" => array(
                    "ANSWER_PHONE",
                ),
                "UPLOAD_FILE" => false,
                "OK_MESSAGE" => "Спасибо, ваше сообщение принято!"
            ),
            false,
            array(
                "HIDE_ICONS" => "Y"
            )
        ); ?>
    </div>
</div>