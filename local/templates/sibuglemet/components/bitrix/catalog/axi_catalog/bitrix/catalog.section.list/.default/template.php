<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$this->setFrameMode(true);


$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));


$newArResult = array_merge($GLOBALS['CATALOG'], $arResult['SECTIONS']);
?>
<div class="catalog-list wrapper">

    <div class="catalog-menu-wrap">
        <div class="catalog-menu" id="accordion">
            <div class="panel catalog-menu-list" data-filter-group="categories">
                <div class="is-checked city-control city-control-all" data-filter="" style="display: none;">Все категории</div>
                <a href="#collapseOne" class="city-control-wrap collapsed" data-toggle="collapse" data-parent="#accordion">
                    <div data-filter=".<?=$GLOBALS['CATALOG'][0]['IBLOCK_CODE']?>" class="city-control">Строительные материалы <i class="ion-chevron-down"></i></div>
                </a>
                <div id="collapseOne" class="panel-content collapse">
                    <ul>
                        <?foreach ($GLOBALS['CATALOG'] as &$arSection):?>
                            <li> <a class="city-control-child" href="<?=$arSection["SECTION_PAGE_URL"]; ?>"><?=$arSection["NAME"];?></a> </li>
                        <?endforeach;?>
                    </ul>
                </div>
            </div>

            <div class="panel catalog-menu-list" data-filter-group="categories">
                <a href="#collapseTwo" class="city-control-wrap collapsed" data-toggle="collapse" data-parent="#accordion">
                    <div data-filter=".<?=$arResult['SECTIONS'][0]['IBLOCK_CODE']?>" class="city-control">Добавки для бетона <i class="ion-chevron-down"></i></div>
                </a>
                <div id="collapseTwo" class="panel-content collapse">
                    <ul>
                        <?foreach ($arResult['SECTIONS'] as &$arSection):?>
                            <li> <a class="city-control-child" href="<?=$arSection["SECTION_PAGE_URL"]; ?>"><?=$arSection["NAME"];?></a> </li>
                        <?endforeach;?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="catalog-list-cont">
        <ul class="catalog-list-items">
            <?foreach ($GLOBALS['CATALOG'] as &$arSection):
                $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
                $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);?>
                <li class="catalog-list-item <?=$GLOBALS['CATALOG'][0]['IBLOCK_CODE']?>" id="<?=$this->GetEditAreaId($arSection['ID']);?>">
                    <a href="<?=$arSection["SECTION_PAGE_URL"]; ?>">
                        <div class="catalog-main-list-img" style="background-image: url(<?=$arSection['PICTURE']['SRC']?>);"></div>
                        <div class="catalog-main-list-text"><?=$arSection["NAME"];?></div>
                    </a>
                </li>
            <?endforeach;?>
            <?foreach ($arResult['SECTIONS'] as &$arSection):
                $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
                $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);?>
                <li class="catalog-list-item <?=$arResult['SECTIONS'][0]['IBLOCK_CODE']?>" id="<?=$this->GetEditAreaId($arSection['ID']);?>">
                    <a href="<?=$arSection["SECTION_PAGE_URL"]; ?>">
                        <div class="catalog-main-list-img" style="background-image: url(<?=$arSection['PICTURE']['SRC']?>);"></div>
                        <div class="catalog-main-list-text"><?=$arSection["NAME"];?></div>
                    </a>
                </li>
            <?endforeach;?>
        </ul>
    </div>

</div>