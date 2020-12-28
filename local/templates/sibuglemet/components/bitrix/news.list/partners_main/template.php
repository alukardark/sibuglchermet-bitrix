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
<div class="partners-main wrapper">
<div class="partners-main-left" data-aos="fade-right" data-aos-duration="1200" data-aos-offset="0">
    <h2>Партнеры</h2>
    <div class="partners-main-desc">
        <?=$arResult['DESCRIPTION']?>
    </div>

    <a href="/company/partnery/" class="btn-white">Все партнеры</a>
</div>
<div class="partners-main-right" data-aos="fade" data-aos-duration="900" data-aos-offset="0">
    <?foreach($arResult["ITEMS"] as $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <div id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <?
            $res = CIBlockElement::GetByID( $arItem['PROPERTIES']['FEEDBACK']['VALUE'] );
            if($ar_res = $res->GetNext())
                $rsTxt = $ar_res['PREVIEW_TEXT'];
                $rsImg = CFile::GetPath($ar_res['PREVIEW_PICTURE']);



            if($rsTxt){
                $attr = 'data-fancybox data-src="#'.$ar_res['CODE'].'" href="javascript:;"';
                $rsTxtBlock = "
                            <div id=\"".$ar_res['CODE']."\" style=\"display: none;\">
                                <div class=\"reviews-item-title\">".$ar_res['NAME']."</div>
                                <div class=\"reviews-item-text\">".$ar_res['PREVIEW_TEXT']."</div>
                            </div>
                        ";
            }elseif($rsImg){
                $attr = 'data-fancybox href="'.$rsImg.'"';
            }else{
                $attr = ' style="pointer-events: none" ';
            }
            ?>
            <a <?=$attr?> class="partners-main-item">
                <img class="partners-main-img" src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" alt="<?=$arItem['NAME']?>">
                <?if($rsImg || $rsTxt):?>
                    <span class="read-review">Читать отзыв</span>
                <?endif;?>
            </a>
        </div>
        <?if($rsTxtBlock){
            echo $rsTxtBlock;
        }

        unset($rsImg);
        unset($rsTxt);
    endforeach;
    ?>
</div>
<a href="/company/partnery/" class="btn-white">Все партнеры</a></div>