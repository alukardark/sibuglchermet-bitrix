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

<div class="management-item__wrap">
    <div class="management-item__photo"
         style="background-image: url(<?= $arResult['PREVIEW_PICTURE']['SRC']; ?>);"></div>
    <div class="management-item__info">
        <h2 class="management-item__name"><?= $arResult['NAME']; ?></h2>
        <div class="management-item__specialty"><?= $arResult['PROPERTIES']['SPETSIALNOST']['VALUE']; ?></div>

        <ul class="management-item__contacts">

            <?
            $arrayLength = count($arResult['PROPERTIES']['CONTACTS']['VALUE']);
            $counter = 0;

            foreach ($arResult['PROPERTIES']['CONTACTS']['VALUE'] as $item):
                $counter++;
                if (strripos($item['CONTENT'], '@')) {
                    $href = 'mailto:';
                } else {
                    $href = 'tel:';
                }
                if ($counter != $arrayLength) {
                    $comma = ', ';
                } else {
                    $comma = '';
                } ?>

                <li><a href="<?= $href . $item['CONTENT'] ?>"><?= $item['CONTENT'] ?></a><?= $comma ?></li>
            <? endforeach; ?>
        </ul>

        <div class="list-style-cont">
            <?= $arResult["DETAIL_TEXT"] ?>
        </div>

        <a href="<?= $arResult['LIST_PAGE_URL'] ?>" class="management-item__back back-link">Вернуться к списку</a>
    </div>
</div>




