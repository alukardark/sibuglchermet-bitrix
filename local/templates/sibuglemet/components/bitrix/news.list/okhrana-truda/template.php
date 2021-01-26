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


<? /*?>





<? */ ?>



<? foreach ($arResult["ITEMS"] as $arItem): ?>
    <?
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    ?>


    <div id="<?= $this->GetEditAreaId($arItem['ID']); ?>">

        <div class="okhrana-truda__indicators">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>
                            <? $APPLICATION->IncludeComponent(
                                "bitrix:main.include",
                                ".default",
                                array(
                                    "AREA_FILE_SHOW" => "file",
                                    "AREA_FILE_SUFFIX" => "inc",
                                    "EDIT_TEMPLATE" => "",
                                    "PATH" => "/_include/tselevyye-pokazateli.php",
                                    "COMPONENT_TEMPLATE" => ".default"
                                ),
                                false
                            ); ?>
                        </h2>

                        <div class="okhrana-truda__indicators-list">
                            <? if ($arItem['PROPERTIES']['TARGETS_1']['~VALUE']['TEXT']): ?>
                                <div class="okhrana-truda__indicators-item">
                                    <?= $arItem['PROPERTIES']['TARGETS_1']['~VALUE']['TEXT'] ?>
                                </div>
                            <? endif; ?>
                            <? if ($arItem['PROPERTIES']['TARGETS_2']['~VALUE']['TEXT']): ?>
                                <div class="okhrana-truda__indicators-item">
                                    <?= $arItem['PROPERTIES']['TARGETS_2']['~VALUE']['TEXT'] ?>
                                </div>
                            <? endif; ?>
                            <? if ($arItem['PROPERTIES']['TARGETS_3']['~VALUE']['TEXT']): ?>
                                <div class="okhrana-truda__indicators-item">
                                    <?= $arItem['PROPERTIES']['TARGETS_3']['~VALUE']['TEXT'] ?>
                                </div>
                            <? else: ?>
                                <div class="okhrana-truda__indicators-item" style="height: 0;margin: 0;padding: 0; border: none;"></div>
                            <? endif; ?>




                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12">

                </div>
            </div>
        </div>

        <? /* ?>
        <div class="okhrana-truda__process">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Процесс управления вопросами ОТ, ПБ и экологии</h3>
                        <div class="okhrana-truda__process-list">
                            <div class="okhrana-truda__process-circle"></div>
                            <p><?= $arItem['PROPERTIES']['PROCESS_1']['VALUE'] ?></p>
                            <p><?= $arItem['PROPERTIES']['PROCESS_2']['VALUE'] ?></p>
                            <p><?= $arItem['PROPERTIES']['PROCESS_3']['VALUE'] ?></p>
                            <p><?= $arItem['PROPERTIES']['PROCESS_4']['VALUE'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <? */ ?>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="okhrana-truda__wrapper-text">
                        <?= $arItem['PROPERTIES']['TEXT_1']['~VALUE']['TEXT'] ?>
                    </div>

                    <div class="okhrana-truda__wrapper-text">
                        <?= $arItem['PROPERTIES']['TEXT_2']['~VALUE']['TEXT'] ?>
                    </div>

                    <div class="okhrana-truda__stages">
                        <div class="okhrana-truda__stages-item">
                            <?= $arItem['PROPERTIES']['STAGE_1']['~VALUE']['TEXT'] ?>
                        </div>
                        <div class="okhrana-truda__stages-item">
                            <?= $arItem['PROPERTIES']['STAGE_2']['~VALUE']['TEXT'] ?>
                        </div>
                        <div class="okhrana-truda__stages-item">
                            <?= $arItem['PROPERTIES']['STAGE_3']['~VALUE']['TEXT'] ?>
                        </div>
                        <div class="okhrana-truda__stages-item">
                            <?= $arItem['PROPERTIES']['STAGE_4']['~VALUE']['TEXT'] ?>
                        </div>
                    </div>

                    <div class="okhrana-truda__wrapper-text">
                        <div class="okhrana-truda__ltifr">
                            <h3>Количество несчастный случаев с потерей рабочего времени,
                                LTIFR (на 1 млн рабочих часов) </h3>

                            <div class="okhrana-truda__ltifr-table">
                                <div class="okhrana-truda__ltifr-col">
                                    6,56

                                    <div class="okhrana-truda__ltifr-col-year">2017</div>

                                </div>
                                <div class="okhrana-truda__ltifr-col">
                                    4,18

                                    <div class="okhrana-truda__ltifr-col-year">2018</div>
                                </div>
                                <div class="okhrana-truda__ltifr-col">
                                    2,93

                                    <div class="okhrana-truda__ltifr-col-year">2019</div>
                                </div>

                                <div class="okhrana-truda__ltifr-table-lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>

                                <div class="okhrana-truda__ltifr-table-title">
                                    LTIFR
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="okhrana-truda__documents">
                        <h3>Документы и политики</h3>

                        <div class="okhrana-truda__documents-list">

                            <?
                            $arFilter = Array(
                                "ACTIVE" => "Y",
                                "ID" => $arItem['PROPERTIES']['FILE']['VALUE'],
                            );
                            $arSelect = Array("ID", "NAME", "PROPERTY_FILES");
                            $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize" => 9999), $arSelect);

                            while ($ob = $res->GetNextElement()) :
                                $arFields = $ob->GetFields(); ?>

                                <?
                                $itemsDoc[$arFields['ID']]['NAME'] = $arFields['NAME'];
                                $itemsDoc[$arFields['ID']]['PROPERTY_FILES_VALUE'][] = $arFields['PROPERTY_FILES_VALUE'];
                                ?>

                            <? endwhile; ?>

                            <? foreach ($itemsDoc as $itemDoc) { ?>


                                <div class="okhrana-truda__documents-item">
                                    <h4><?= $itemDoc['NAME'] ?></h4>

                                    <?
                                    foreach ($itemDoc['PROPERTY_FILES_VALUE'] as $fileItem) {
                                        $file_link = CFile::GetPath($fileItem);
                                        $file_name = strip_tags(CFile::GetByID($fileItem)->arResult[0]['ORIGINAL_NAME']);
                                        $file_expansion = new SplFileInfo($file_name);
                                        $file_expansion = $file_expansion->getExtension();
                                        $file_name = str_replace('.' . $file_expansion, '', $file_name);
                                        $file_size = CFile::GetByID($fileItem)->arResult[0]['FILE_SIZE'] / 1000000;
                                        $file_size = number_format($file_size, 2, '.', '');
                                        ?>

                                        <a href="<?= $file_link ?>" target="_blank" class="file">
                                            <div class="file__img file__img--<?= $file_expansion ?>"></div>
                                            <div class="file__info">
                                                <div class="file__title"><?= $file_name ?></div>
                                                <div class="file__size">(<?= $file_size ?> Мб)</div>
                                            </div>
                                        </a>
                                    <? } ?>

                                </div>

                            <? } ?>


                        </div>


                    </div>


                </div>
            </div>
        </div>


    </div>


<? endforeach; ?>
