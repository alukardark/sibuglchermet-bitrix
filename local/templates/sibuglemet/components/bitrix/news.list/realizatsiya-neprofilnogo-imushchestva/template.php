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






<? foreach ($arResult["ITEMS"] as $arItem): ?>
    <?
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    ?>

    <div class="realizatsiya-neprofilnogo-imushchestva__row" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
        <div class="realizatsiya-neprofilnogo-imushchestva__box">
            <?= $arItem['DETAIL_TEXT'] ?>
                <?
                foreach ($arItem['PROPERTIES']['FILE']['VALUE'] as $fileItem) {
                    $file_link = CFile::GetPath($fileItem);
                    $file_name = strip_tags(CFile::GetByID($fileItem)->arResult[0]['ORIGINAL_NAME']);
                    $file_expansion = new SplFileInfo($file_name);
                    $file_expansion = $file_expansion->getExtension();
                    $file_name = str_replace('.' . $file_expansion, '', $file_name);
                    $file_size = CFile::GetByID($fileItem)->arResult[0]['FILE_SIZE']/1000000;
                    $file_size = number_format($file_size, 2, '.', '');
                    ?>

                    <a href="<?= $file_link ?>" target="_blank" class="file">
                        <div class="file__img file__img--<?= $file_expansion ?>"></div>
                        <div class="file__info">
                            <div class="file__title"><?= $file_name ?></div>
                            <div class="file__size">(<?=$file_size?> Мб)</div>
                        </div>
                    </a>
                <? } ?>


            <img class="realizatsiya-neprofilnogo-imushchestva__img d-lg-none"
                 src="<?= $arItem['DETAIL_PICTURE']['SRC'] ?>" alt="">

            <div class="">
                <a href="//nelikvidi.com/org-ooo-uk-evraz-mezhdurechensk-11959.html" target="_blank" class="link">Перейти на сайт nelikvidi.com</a>
            </div>
        </div>

        <img class="realizatsiya-neprofilnogo-imushchestva__img d-none d-lg-block"
             src="<?= $arItem['DETAIL_PICTURE']['SRC'] ?>" alt="">
    </div>


<? endforeach; ?>
