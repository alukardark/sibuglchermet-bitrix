<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 * @var string $templateFolder
 */

$this->setFrameMode(true);





?>
<div class="vacancies__wrap">
    <div class="vacancies__cont" id="article">
        <div class="vacancies__work-experience">
            Требуемый опыт работы: <strong><?=$arResult['PROPERTIES']['EXPERIENCE']['VALUE']?></strong>
        </div>

        <?=$arResult['DETAIL_TEXT']?>

        <a href="<?= $arResult['LIST_PAGE_URL'] ?>" class="back-link">Вернуться к списку вакансий</a>
    </div>

    <div class="vacancies__aside" id="aside-sticky">
        <div class="vacancies__aside-wrap">
            <div class="vacancies__aside-place">
                <?=$arResult['PROPERTIES']['PLACE']['VALUE']?>
            </div>
            <div class="vacancies__aside-city">
                <?=$arResult['PROPERTIES']['CITY']['VALUE']?>
            </div>
            <a data-fancybox="" data-auto-focus="false" data-src="#callback" href="javascript:" class="vacancies__aside-link">Откликнуться на вакансию</a>
        </div>
    </div>
</div>



<div data-toolbar="false" style="display: none;" id="callback" class="fancy-modal">
    <div class="fancy-modal__wrap">
        <h2>Отправить резюме</h2>
        <form id="fileupload" action="#" method="GET" enctype="multipart/form-data">
            <input type="hidden" name="TITLE" value="<?=$arResult['NAME']?>">
            <input type="text" placeholder="ФИО">
            <input type="text" placeholder="E-mail">
            <label>
                <span>Телефон</span>
                <input type="tel" placeholder="+7 (999) 999-9999">
            </label>

            <div class="fancy-modal__file-upload">

                <h4>Прикрепить документы</h4>
                <p>Резюме, Свидетельство о профессии, Сопроводительное письмо</p>

                <div class="file-list"></div>
                <div class="fancy-modal__file-wrap">
                    <label>
                        <input type="file" name="file" id="file" multiple="multiple" accept="application/msword, text/plain, application/pdf, image/jpeg, image/png">
                        <div class="fancy-modal__file-btn">Прикрепить</div>
                    </label>
                    <div class="fancy-modal__file-formats">
                        (Форматы: pdf, docx, jpg <br> Общий размер: не больше 30 Мб )
                    </div>
                </div>

                <div class="file-error"></div>

            </div>

            <h4>Сопроводительное письмо</h4>
            <textarea name="" placeholder="Напишите почему вы подходите на вакантную должность, какую пользу можете принести компании и почему должны выбрать именно вас"></textarea>


            <input type="submit" value="Отправить резюме">
            <div class="personal-data">
                Нажимая на кнопку, Вы даете согласие на <a href="/personalnye-dannye/" target="_blank">обработку персональных данных</a>
            </div>
        </form>

        <!--<div data-fancybox-close class="fancy-modal__close"></div>-->
    </div>
</div>