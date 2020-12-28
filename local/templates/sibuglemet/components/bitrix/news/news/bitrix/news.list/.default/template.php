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


<?
$year = 2020;
$year_cur = date('Y');

if ($year_cur >= $year) {
    for ($item_year = $year_cur; $item_year >= $year; $year++) {
        echo $year;
    }
}

echo "Январь";
echo "Февраль";
echo "Март";
echo "Апрель";
echo "Май";
echo "Июнь";
echo "Июль";
echo "Август";
echo "Сентябрь";
echo "Октябрь";
echo "Ноябрь";
echo "Декабрь";


$property_enums = CIBlockPropertyEnum::GetList(Array("DEF" => "DESC", "SORT" => "ASC"), Array("IBLOCK_ID" => $arResult["ID"], "CODE" => "COMPANY"));
while ($enum_fields = $property_enums->GetNext()) {
    echo "<br>";
    echo '<a href="/novosti/?company='.$enum_fields['ID'].'">'.$enum_fields["VALUE"].'</a>';
    echo "<br>";
}


?>







<?
$BITRIX_DATETIME_FORMAT = 'd.m.Y H:i:s';
$activeYear = isset($_REQUEST['year']) ? (int)$_REQUEST['year'] : null;
$activeMonth = isset($_REQUEST['month']) ? (int)$_REQUEST['month'] : null;
$activeDay = isset($_REQUEST['day']) ? (int)$_REQUEST['day'] : null;

$activeCompany = isset($_REQUEST['company']) ? $_REQUEST['company'] : null;

switch (true) {
    case isset($activeDay) && isset($activeMonth) && isset($activeYear): // новости за день
        $dateBegin = new DateTime(sprintf('%1$04d-%2$02d-%3$02d 00:00:00', $activeYear, $activeMonth, $activeDay), new DateTimeZone('UTC'));
        $dateEnd = clone $dateBegin;
        $dateEnd->modify('+1 day -1 second');
        break;
    case isset($activeMonth) && isset($activeYear): // новости за месяц
        $dateBegin = new DateTime(sprintf('%1$04d-%2$02d-%3$02d 00:00:00', $activeYear, $activeMonth, $activeDay), new DateTimeZone('UTC'));
        $dateEnd = clone $dateBegin;
        $dateEnd->modify('+1 month -1 second');
        break;
    default:
}

$arFilter = Array(
    "ACTIVE" => "Y",
    "IBLOCK_ID" => $arResult["ID"],

);

if($activeCompany){
    $arFilter["PROPERTY_COMPANY"] = $activeCompany;
}

print_r($activeCompany);







if (isset($dateBegin)) {
    $arFilter['<DATE_ACTIVE_FROM'] = array($dateBegin->format($BITRIX_DATETIME_FORMAT), $dateEnd->format($BITRIX_DATETIME_FORMAT));
}



$arSelect = Array("ID", "NAME", "DETAIL_PAGE_URL", "PREVIEW_TEXT", "DATE_ACTIVE_FROM", "PROPERTY_TAGS", "PROPERTY_COMPANY");
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize" => 9999), $arSelect);
?>


<ul class="last-news__list">
    <?
    while ($ob = $res->GetNextElement()) {
        $arFields = $ob->GetFields();

        //--Редактирование в режиме правки
            $arButtons = CIBlock::GetPanelButtons(
                $arResult["ID"],
                $arFields["ID"],
                0,
                array("SECTION_BUTTONS"=>false, "SESSID"=>false)
            );
            $arItem["EDIT_LINK"] = $arButtons["edit"]["edit_element"]["ACTION_URL"];
            $arItem["DELETE_LINK"] = $arButtons["edit"]["delete_element"]["ACTION_URL"];


            $this->AddEditAction($arFields['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arResult["ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arFields['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arResult["ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        //--Редактирование в режиме правки
        ?>
        <li id="<?= $this->GetEditAreaId($arFields['ID']); ?>">
            <a href="<?= $arFields['DETAIL_PAGE_URL'] ?>">
                <?
                $arDATE = ParseDateTime($arFields["DATE_ACTIVE_FROM"], FORMAT_DATETIME);
                $arDATE = $arDATE["DD"] . " " . GetMessage("MONTH_" . intval($arDATE["MM"]) . "_S") . " " . $arDATE["YYYY"];
                ?>

                <div class="last-news__data">
                    <div class="last-news__date"><?= $arDATE ?></div>
                    <div class="last-news__tag"><?= $arFields['PROPERTY_TAGS_VALUE']; ?></div>
                </div>
                <p><?= $arFields['NAME'] ?></p>
                <div class="last-news__link">Читать далее</div>
            </a>
        </li>
        <?
    }
    ?>


</ul>