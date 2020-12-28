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
?>

<div class="reviews">

    <div class="wrapper">
        <?foreach($arResult["ITEMS"] as $arItem):?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));


            if($arItem['PREVIEW_TEXT']){
                $attr = 'data-fancybox data-src="#'.$arItem['CODE'].'" href="javascript:;"';
                $rsTxtBlock = "
                            <div id=\"".$arItem['CODE']."\" style=\"display: none;\" class=\"reviews-item\">
                                <div class=\"reviews-item-title\">".$arItem['NAME']."</div>
                                <div class=\"reviews-item-text\">".$arItem['PREVIEW_TEXT']."</div>
                            </div>
                        ";
            }elseif($arItem['PREVIEW_PICTURE']['SRC']){
                $attr = 'data-fancybox href="'.$arItem['PREVIEW_PICTURE']['SRC'].'"';
            }
            ?>

            <a id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="reviews-item" <?=$attr?>>
                <div class="reviews-item-title"><?=$arItem['NAME']?></div>
                <?if($arItem['PREVIEW_TEXT']){?>
                    <div class="reviews-item-text"><?=$arItem['PREVIEW_TEXT']?></div>
                <?}elseif ($arItem['PREVIEW_PICTURE']['SRC']){?>
                    <div class="reviews-item-img" style="background-image: url(<?=$arItem['PREVIEW_PICTURE']['SRC']?>)"></div>
                <?}?>
                <div class="reviews-item-date"><?=$arItem['ACTIVE_FROM']?></div>
            </a>
            <?if($rsTxtBlock){
                echo $rsTxtBlock;
            }

        endforeach;
        ?>








        <div class="reviews-item reviews-item-hidden" style="height: 0;padding: 0;margin: 0;"></div>
        <div class="reviews-item reviews-item-hidden" style="height: 0;padding: 0;margin: 0;"></div>
    </div>
    <button class="btn-more" data-max-page="<?=$arResult['NAV_RESULT']->NavPageCount?>" data-curpage="1">
        <span class="btn-more-plus">+ </span>
        <span class="btn-more-text">Посмотреть еще</span>
        <span class="btn-preloader">
            <figure style="margin:0">
                <svg width="20px" height="20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="uil-ring-alt">
                    <rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect>
                    <circle cx="50" cy="50" r="40" stroke="#0eab4b" fill="none" stroke-width="10" stroke-linecap="round"></circle>
                    <circle cx="50" cy="50" r="40" stroke="#f5f2f2" fill="none" stroke-width="20" stroke-linecap="round">
                        <animate attributeName="stroke-dashoffset" dur="2s" repeatCount="indefinite" from="0" to="502"></animate>
                        <animate attributeName="stroke-dasharray" dur="2s" repeatCount="indefinite" values="150.6 100.4;1 250;150.6 100.4"></animate>
                    </circle>
                </svg>
            </figure>
        </span>
    </button>
    <hr>
    <div class="form-review ">
        <h3 class="wrapper">Оставить отзыв</h3>
        <?
        $APPLICATION->IncludeComponent(
            "axi:feedback",
            "feedback",
            array(
                "EVENT_ALIAS" => FOS_FEEDBACK_EVENT,
                "STORE_IBLOCK_ID" => 10,
                "FIELDS" => array(
                    "ANSWER_NAME" => "Имя",
                    "ANSWER_EMAIL" => "E-mail",
                    "ANSWER_PHONE" => "Телефон*",
                    "ANSWER_TEXT" => "Текст отзыва*",
                ),
                "REQUIRED_FIELDS" => array(
                    "ANSWER_PHONE",
                    "ANSWER_TEXT",
                ),
                "UPLOAD_FILE" => false,
                "OK_MESSAGE" => "Спасибо, ваше сообщение принято!"
            ),
            false,
            array(
                "HIDE_ICONS" => "Y"
            )
        );
        ?>
    </div>


</div>