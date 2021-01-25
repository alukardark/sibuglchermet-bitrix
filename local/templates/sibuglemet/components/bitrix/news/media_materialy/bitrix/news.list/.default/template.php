<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>


<? if (empty($arResult["ITEMS"])) { ?>

    <hr>
    <h2>Ничего не найдено</h2>
    <br>

<? } ?>

<ul class="history__list">
    <? foreach ($arResult["ITEMS"] as $arItem): ?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

        if ($arItem['PROPERTIES']['VIDEO_LINK']['VALUE']) {
            $link = $arItem['PROPERTIES']['VIDEO_LINK']['VALUE'];
            if ($arItem['PREVIEW_PICTURE']['SRC']) { ?>
                <li id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                    <a href="<?= $link ?>" class="history__fancy history__video" data-fancybox="">
                        <span class="history__fancy-img"
                              style="background-image: url(<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>);"></span>
                    </a>
                </li>
                <?
            } else {
                $link = $arItem['PROPERTIES']['VIDEO_LINK']['VALUE'];
                parse_str(parse_url($link, PHP_URL_QUERY), $code);
                ?>
                <li id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                    <a href="<?= $link ?>" class="history__fancy history__fancy-img " data-fancybox="">
                        <iframe style="width: 100%; height: 100%; pointer-events: none"
                                src="https://www.youtube.com/embed/<?= $code['v'] ?>?controls=1&modestbranding=0"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen
                        >
                        </iframe>
                    </a>
                </li>
            <? }
        } else {
            $link = $arItem['PREVIEW_PICTURE']['SRC'];
            ?>
            <li id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                <a href="<?= $link ?>" class="history__fancy " data-fancybox="">
                    <span class="history__fancy-img"
                          style="background-image: url(<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>);"></span>
                </a>
            </li>
            <?

        }
        ?>
    <? endforeach; ?>
</ul>


<? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
    <?= $arResult["NAV_STRING"] ?>
<? endif; ?>
