<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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








<div class="studentam-i-vypusknikam__wrap">
    <div class="studentam-i-vypusknikam__cont" id="article">

        <? $i = 1; ?>
        <? foreach ($arResult["ITEMS"] as $arItem): ?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

            ?>





            <div class="studentam-i-vypusknikam__block" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">

                <h2><?= $arItem['NAME'] ?></h2>
                <p>
                    <img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>">
                </p>
                <?= $arItem['PREVIEW_TEXT'] ?>



                <? if ($arItem['PROPERTIES']['EVENTS_TITLE']['VALUE']) { ?>
                <div class="studentam-i-vypusknikam__events">
                    <h3><?= $arItem['PROPERTIES']['EVENTS_TITLE']['VALUE'] ?></h3>
                    <div class="studentam-i-vypusknikam__events-list">
                        <div class="studentam-i-vypusknikam__events-item">
                            <div class="studentam-i-vypusknikam__events-img" style="background-image: url(<?= CFile::GetPath($arItem['PROPERTIES']['EVENTS_IMG_1']['VALUE']) ?>);"></div>
                            <p><?= $arItem['PROPERTIES']['EVENTS_TXT_1']['VALUE'] ?></p>
                        </div>
                        <div class="studentam-i-vypusknikam__events-item">
                            <div class="studentam-i-vypusknikam__events-img" style="background-image: url(<?= CFile::GetPath($arItem['PROPERTIES']['EVENTS_IMG_2']['VALUE']) ?>);"></div>
                            <p><?= $arItem['PROPERTIES']['EVENTS_TXT_2']['VALUE'] ?></p>
                        </div>
                        <div class="studentam-i-vypusknikam__events-item">
                            <div class="studentam-i-vypusknikam__events-img" style="background-image: url(<?= CFile::GetPath($arItem['PROPERTIES']['EVENTS_IMG_3']['VALUE']) ?>);"></div>
                            <p><?= $arItem['PROPERTIES']['EVENTS_TXT_3']['VALUE'] ?></p>
                        </div>
                        <div class="studentam-i-vypusknikam__events-item">
                            <div class="studentam-i-vypusknikam__events-img" style="background-image: url(<?= CFile::GetPath($arItem['PROPERTIES']['EVENTS_IMG_4']['VALUE']) ?>);"></div>
                            <p><?= $arItem['PROPERTIES']['EVENTS_TXT_4']['VALUE'] ?></p>
                        </div>
                    </div>
                </div>
                <? } ?>













            </div>

        <? endforeach; ?>



    </div>




    <div class="studentam-i-vypusknikam__aside" id="aside-sticky">
        <h3>Программы</h3>
        <ul>
            <? foreach ($arResult["ITEMS"] as $arItem): ?>
                <li><a class="anchor" href="#<?= $this->GetEditAreaId($arItem['ID']); ?>"><?= $arItem['PROPERTIES']['TITLE']['VALUE'] ?></a></li>
            <? endforeach; ?>
        </ul>
    </div>
</div>






