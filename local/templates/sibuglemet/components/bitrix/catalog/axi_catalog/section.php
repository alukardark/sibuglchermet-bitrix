<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
use Bitrix\Main\ModuleManager;


if (isset($arParams['USE_COMMON_SETTINGS_BASKET_POPUP']) && $arParams['USE_COMMON_SETTINGS_BASKET_POPUP'] === 'Y')
{
    $basketAction = isset($arParams['COMMON_ADD_TO_BASKET_ACTION']) ? $arParams['COMMON_ADD_TO_BASKET_ACTION'] : '';
}
else
{
    $basketAction = isset($arParams['SECTION_ADD_TO_BASKET_ACTION']) ? $arParams['SECTION_ADD_TO_BASKET_ACTION'] : '';
}


//$basket = \Bitrix\Sale\Basket::loadItemsForFUser(
//    \Bitrix\Sale\Fuser::getId(),
//    \Bitrix\Main\Context::getCurrent()->getSite()
//);
use Bitrix\Sale;
$basket = Sale\Basket::loadItemsForFUser(Sale\Fuser::getId(), Bitrix\Main\Context::getCurrent()->getSite());



foreach ($basket as $item) {
    $this_basket[ $item->getField('PRODUCT_ID') ] = ['NAME'=>$item->getField('NAME'), 'COUNT'=>$item->getQuantity()];
}



//$productId =  26;
//$quantity =  1;
//
//if ($item = $basket->getExistsItem('catalog', $productId)) {
//    $item->setField('QUANTITY', $item->getQuantity() + $quantity);
//}
//else {
//    $item = $basket->createItem('catalog', $productId);
//    $item->setFields(array(
//        'QUANTITY' => $quantity,
//        'CURRENCY' => Bitrix\Currency\CurrencyManager::getBaseCurrency(),
//        'LID' => Bitrix\Main\Context::getCurrent()->getSite(),
//        'PRODUCT_PROVIDER_CLASS' => 'CCatalogProductProvider',
//    ));
//}
//$basket->save();






?>






<?
$thisSection = \Bitrix\Iblock\SectionTable::getList([
    'filter' => ['CODE' => $arResult["VARIABLES"]["SECTION_CODE"]],
    'select' => ['ID', 'IBLOCK_ID', 'NAME']
])->fetch();



$res = CIBlockSection::GetList(Array(), Array("IBLOCK_ID" => $thisSection["IBLOCK_ID"],'CODE' => $arResult["VARIABLES"]["SECTION_CODE"]), false, Array("IBLOCK_ID","ID", "NAME", "CODE", "IBLOCK_SECTION_ID","DESCRIPTION", "UF_*",));
while($resArr = $res->GetNext())
{
    $thisSection = $resArr;
}

$GLOBALS['thisSection'] = $thisSection;


$res = CIBlockElement::GetList(Array(), Array("IBLOCK_ID"=>$thisSection['IBLOCK_ID']), false, false, Array("ID", "IBLOCK_ID", "NAME", "IBLOCK_SECTION_ID",
    "PROPERTY_VOLUME",
    "PROPERTY_L_SIZES",
    "PROPERTY_B_SIZES",
    "PROPERTY_H_SIZES",
    "PROPERTY_CLASS",
    "PROPERTY_WEIGHT",
));
while($resArr = $res->GetNext())
{
    $allEllements[] = $resArr;
}


$res = CIBlockSection::GetList(Array(), Array('IBLOCK_ID'=>$thisSection['IBLOCK_ID'], 'DEPTH_LEVEL'=> 2, 'SECTION_ID'=>$thisSection['ID']), true);
while($resArr = $res->GetNext())
{
    foreach ($allEllements as $ellement){
        if($ellement['IBLOCK_SECTION_ID'] == $resArr['ID']){
            $sectionLevelTwo[$resArr['NAME']][$ellement['ID']] = $ellement;
        }else{
            continue;
        }
    }
}




if($thisSection){
?>
<div class="catalog-item ">
    <div class="wrapper">
        <div class="catalog-item-head">

            <div class="catalog-item-slider">
                <? foreach ($thisSection['UF_GALLERY'] as $thisSectionGallery) {?>
                    <div class="catalog-item-slider-item" style="background-image: url(<?=CFile::GetPath($thisSectionGallery)?>);"></div>
                <?}?>

            </div>
            <?if( $thisSection['UF_GALLERY'] && count($thisSection['UF_GALLERY']) > 1):?>
                <div class="arrow-wrap">
                    <div class="arrow-prev"><i class="ion-chevron-down"></i></div>
                    <div class="arrow-next"><i class="ion-chevron-down"></i></div>
                </div>
            <?endif;?>
            <div class="catalog-item-desc"><?=$thisSection['DESCRIPTION']?></div>

        </div>
    </div>

    <div class="catalog-item-body ">



        <?foreach ($sectionLevelTwo as $sectionLevelTwoName => $sectionLevelTwoItem):?>
            <h3 class="wrapper"><?=$sectionLevelTwoName?></h3>
            <div class="catalog-table">
                <div class="catalog-table-row-head">
                    <div class="col-3" >&nbsp;</div>
                    <div class="col-1" >Объем, м3</div>
                    <div class="col-3 catalog-table-size">Габаритные размеры, мм</div>
                    <div class="col-1" >Класс бетона</div>
                    <div class="col-1" >Масса, т</div>
                    <div class="col-1 catalog-table-basket" >&nbsp;</div>
                </div>
                <?foreach ($sectionLevelTwoItem as $item):
                    if($this_basket):
                        foreach($this_basket as $key=>$item_basket):
                            if($key==$item['ID']):
                                $this_count = $item_basket['COUNT'];
                                $flag_vis = '';
                                $flag_hid = 'vis-basket';
                                break;
                            elseif($key!=$item['ID']):
                                $flag_vis = 'vis-basket';
                                $flag_hid = '';
                                $this_count = 1;
                                continue;
                            endif;
                        endforeach;
                    else:
                        $flag_vis = 'vis-basket';
                        $flag_hid = '';
                        $this_count = 1;
                    endif?>
                    <div class="catalog-table-row" data-id="<?=$item['ID']?>">
                        <div class="col-3 col catalog-table-name" >
                            <div class="res"><?=$item['NAME']?></div>

                            <div class="icon-basket-wrap icon-basket <?=$flag_vis?>"></div>

                            <div class="basket-quantity-wrap basket-quantity <?=$flag_hid?>">
                                <span class="basket-quantity-minus"></span>
                                <input class="basket-quantity-input" type="text" maxlength="3" min="0" step="1" value="<?=$this_count?>" name="QUANTITY_<?=$item['ID']?>" data-ratio="1">
                                <span class="basket-quantity-plus"></span>
                            </div>
                        </div>
                        <div class="col-1 col catalog-table-qnt" >
                            <div class="hidden-head-name">Объем, м3</div>
                            <div class="res"><?=$item['PROPERTY_VOLUME_VALUE']?></div>
                        </div>
                        <div class="col-3 col catalog-table-size" >
                            <div class="hidden-head-name">Габаритные размеры, мм</div>
                            <div class="res"><span>L <?=$item['PROPERTY_L_SIZES_VALUE']?></span> <span>B <?=$item['PROPERTY_B_SIZES_VALUE']?></span> <span>H <?=$item['PROPERTY_H_SIZES_VALUE']?></span></div>
                        </div>
                        <div class="col-1 col catalog-table-class">
                            <div class="hidden-head-name">Класс бетона</div>
                            <div class="res"><?=$item['PROPERTY_CLASS_VALUE']?></div>
                        </div>
                        <div class="col-1 col catalog-table-mass" >
                            <div class="hidden-head-name">Масса, т</div>
                            <div class="res"><?=$item['PROPERTY_WEIGHT_VALUE']?></div>
                        </div>
                        <div class="col-1 col catalog-table-basket">
                            <span class="icon-basket <?=$flag_vis?>"></span>

                            <div class="basket-quantity <?=$flag_hid?>">
                                <span class="basket-quantity-minus"></span>
                                <input class="basket-quantity-input" type="text" maxlength="3" min="0" step="1" value="<?=$this_count?>" name="QUANTITY_<?=$item['ID']?>" data-ratio="1">

                                <span class="basket-quantity-plus"></span>
                            </div>
                        </div>
                    </div>
                <?endforeach;?>
            </div>
        <?endforeach;?>






    </div>


</div>

<?
unset($basketAction);
?>

<script>

    $('h1').text($('.last-breadcrumbs').text());

</script>

<?
}else{
CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Ошибка 404");
?>

<div class="inner-wrapper">
    <div class="inner-content">
        <div class="page-not-found">
            <div class="page-not-found-left">
                <img src="<?=SITE_TEMPLATE_PATH?>/img/404.jpg" alt="Ошибка 404 - Страница не найдена">
            </div>
            <div class="page-not-found-right">
                <h3>Страница не найдена</h3>
                <a href="/"><h3>Перейти на главную</h3></a>
            </div>
        </div>
    </div>
</div>
<?}?>
