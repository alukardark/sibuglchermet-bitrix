<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);



global $arrFilter;
$arrFilter = array();

$activeCompany = isset($_REQUEST['company']) ? $_REQUEST['company'] : null;
$arrFilter["PROPERTY_COMPANY"] = $activeCompany;

$activeCompany = isset($_REQUEST['tags']) ? $_REQUEST['tags'] : null;
$arrFilter["PROPERTY_TAGS"] = $activeCompany;

$url = $_SERVER['REQUEST_URI'];
?>


<ul class="last-news__tags">

    <li><a class="<? if (empty($_GET['tags'])) {
            echo 'active';
        } ?>" href="<?= add_url_get(array('tags' => '')); ?>">#Все</a></li>




    <? $property_enums = CIBlockPropertyEnum::GetList(Array("DEF" => "DESC", "SORT" => "ASC"), Array("IBLOCK_ID" => $arParams["IBLOCK_ID"], "CODE" => "TAGS"));
    while ($enum_fields = $property_enums->GetNext()) { ?>
        <li><a class="<? if ($_GET['tags'] == $enum_fields['ID']) {
                echo 'active';
            } ?>" href="<?= add_url_get(array('tags' => $enum_fields['ID'])); ?>"><?= $enum_fields["VALUE"] ?></a></li>
    <? } ?>
</ul>

<?
$arrMonths = [
    'Январь',
    'Февраль',
    'Март',
    'Апрель',
    'Май',
    'Июнь',
    'Июль',
    'Август',
    'Сентябрь',
    'Октябрь',
    'Ноябрь',
    'Декабрь'
];
$month = date('n') - 1;

$year = 2021;
$year_cur = date('Y');

$BITRIX_DATETIME_FORMAT = 'd.m.Y H:i:s';
$activeYear = isset($_REQUEST['year']) ? (int)$_REQUEST['year'] : null;
$activeMonth = isset($_REQUEST['month']) ? (int)$_REQUEST['month'] : null;
$activeDay = isset($_REQUEST['day']) ? (int)$_REQUEST['day'] : null;

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
if (isset($dateBegin)) {
    $arrFilter['<DATE_ACTIVE_FROM'] = array($dateBegin->format($BITRIX_DATETIME_FORMAT), $dateEnd->format($BITRIX_DATETIME_FORMAT));
}


?>


<div class="last-news__filter">

    <div class="last-news__filter-date">
        <div class="last-news__filter-box">

            <div class="last-news__filter-active">
                <? if (!empty($_GET['year'])) {
                    echo $_GET['year'];
                } else {
                    echo $year_cur;
                } ?>
            </div>


            <ul class="last-news__filter-years">
                <?
                if ($year_cur >= $year) {
                    for ($year_cur; $year_cur >= $year; $year_cur--) { ?>
                        <li><a href="<?= add_url_get(array('year' => $year_cur)); ?>"><?= $year_cur ?></a></li>
                    <? }
                }
                ?>
            </ul>
        </div>

        <div class="last-news__filter-box">
            <div class="last-news__filter-active">
                <?
                if (!empty($_GET['month'])) {
                    echo $arrMonths[$_GET['month'] - 1];
                } else {
                    echo $arrMonths[$month];
                }
                ?>
            </div>

            <ul class="last-news__filter-months">
                <li><a href="<?= add_url_get(array('month' => 1)); ?>"><?= $arrMonths[0] ?></a></li>
                <li><a href="<?= add_url_get(array('month' => 2)); ?>"><?= $arrMonths[1] ?></a></li>
                <li><a href="<?= add_url_get(array('month' => 3)); ?>"><?= $arrMonths[2] ?></a></li>
                <li><a href="<?= add_url_get(array('month' => 4)); ?>"><?= $arrMonths[3] ?></a></li>
                <li><a href="<?= add_url_get(array('month' => 5)); ?>"><?= $arrMonths[4] ?></a></li>
                <li><a href="<?= add_url_get(array('month' => 6)); ?>"><?= $arrMonths[5] ?></a></li>
                <li><a href="<?= add_url_get(array('month' => 7)); ?>"><?= $arrMonths[6] ?></a></li>
                <li><a href="<?= add_url_get(array('month' => 8)); ?>"><?= $arrMonths[7] ?></a></li>
                <li><a href="<?= add_url_get(array('month' => 9)); ?>"><?= $arrMonths[8] ?></a></li>
                <li><a href="<?= add_url_get(array('month' => 10)); ?>"><?= $arrMonths[9] ?></a></li>
                <li><a href="<?= add_url_get(array('month' => 11)); ?>"><?= $arrMonths[10] ?></a></li>
                <li><a href="<?= add_url_get(array('month' => 12)); ?>"><?= $arrMonths[11] ?></a></li>
            </ul>
        </div>
    </div>

    <div class="last-news__filter-enterprises">
        <div class="last-news__filter-box">
            <?
            $property_enums = CIBlockPropertyEnum::GetList(Array("DEF" => "DESC", "SORT" => "ASC"), Array("IBLOCK_ID" => $arParams["IBLOCK_ID"], "CODE" => "COMPANY"));
            $i = 0;
            while ($enum_fields = $property_enums->GetNext()) {
                $fields[$i]['ID'] = $enum_fields['ID'];
                $fields[$i]['VALUE'] = $enum_fields['VALUE'];
                $i++;
            } ?>

            <? foreach ($fields as $field) { ?>
                <? if ($_GET['company'] == $field['ID']) { ?>
                    <div class="last-news__filter-active"><?= $field["VALUE"] ?></div>
                <? } ?>
            <? } ?>

            <? if (empty($_GET['company'])) { ?>
                <div class="last-news__filter-active">Все предприятия</div>
            <? } ?>

            <ul class="">
                <? if (!empty($_GET['company'])) { ?>
                    <li><a href="<?= add_url_get(array('company' => '')); ?>">Все предприятия</a></li>
                <? } ?>

                <? foreach ($fields as $field) { ?>
                    <li>
                        <a href="<?= add_url_get(array('company' => $field['ID'])); ?>"><?= $field["VALUE"] ?></a>
                    </li>
                <? } ?>
            </ul>
        </div>
    </div>
</div>