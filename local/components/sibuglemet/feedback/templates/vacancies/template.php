




<form id="<?= $arResult["TEMPLATE"] ?>" class="feedback_form" action="" method="POST" enctype="multipart/form-data"
      autocomplete="off">
    <?= bitrix_sessid_post() ?>
    <input type="hidden" name="PARAMS_HASH" value="<?= $arResult["PARAMS_HASH"] ?>">
    <input type="hidden" name="EMPTY" value=""/>
    <input type="hidden" name="AJAX" value="Y"/>
    <input type="hidden" name="TEMPLATE" value="<?= $arResult["TEMPLATE"] ?>"/>
    <input type="hidden" name="CURRENT_PAGE_URL" value=""/>
    <input type="hidden" name="CURRENT_PAGE" value=""/>
    <input type="hidden" name="FORM_TITLE" value="Форма 'Написать нам'"/>
    <input type="hidden" name="THIS_VACANCIE" value="<?= $GLOBALS['vacancies_name'] ?>">


    <? foreach ($arResult["FIELDS"] as $fieldAlias => $fieldName):
        if ($fieldAlias == 'ANSWER_TEXT' || $fieldAlias == 'ANSWER_PHONE') {
            continue;
        }
        $require = '';
        if (in_array($fieldAlias, $arParams['REQUIRED_FIELDS'])) $require = 'require';
        ?>

        <input type="<? if ($fieldAlias == 'ANSWER_EMAIL'): ?>email<? else: ?>text<? endif ?>"
               class="feedback_form__input <?= $require ?>" name="<?= $fieldAlias ?>"
               placeholder="<?= $fieldName ?>"
               value="" maxlength="30">
    <? endforeach ?>


    <?
    if ($arResult['FIELDS']['ANSWER_PHONE']):
        $require = '';
        if (in_array($fieldAlias, $arParams['REQUIRED_FIELDS'])) $require = 'require';
        ?>
        <label>
            <span>Телефон</span>
            <input type="tel"
                   class="feedback_form__input <?= $require ?>" name="ANSWER_PHONE"
                   placeholder="+7 (___) ___-____" value="">
        </label>
    <? endif ?>



    <div class="fancy-modal__file-upload">

        <h4>Прикрепить документы</h4>
        <p>Резюме, Свидетельство о профессии, Сопроводительное письмо</p>

        <div class="file-list"></div>
        <div class="fancy-modal__file-wrap">
            <label class="feedback_form__file">
                <input class="feedback_form__file-input" type="file" name="ANSWER_FILE[]" id="file" multiple="multiple" accept="application/msword, text/plain, application/pdf, image/jpeg, image/png">
                <div class="fancy-modal__file-btn">Прикрепить</div>
            </label>
            <div class="fancy-modal__file-formats">
                (Форматы: pdf, docx, jpg <br> Общий размер: не больше 30 Мб )
            </div>
        </div>

        <div class="file-error"></div>

    </div>









    <?
    if ($arResult['FIELDS']['ANSWER_TEXT']):
        $require = '';
        if (in_array($fieldAlias, $arParams['REQUIRED_FIELDS'])) $require = 'require';
        ?>
        <h4>Сопроводительное письмо</h4>
        <textarea class="feedback_form__input <?= $require ?>" name="ANSWER_TEXT" style="resize: none;" placeholder="<?= $arResult['FIELDS']['ANSWER_TEXT'] ?>"></textarea>
    <? endif ?>


    <div class="feedback_form__errors"></div>

    <input type="submit" class="btn-green" value="Отправить резюме">

    <div class="personal-data">
        Нажимая на кнопку, Вы даете согласие на <a href="/personalnye-dannye/" target="_blank">обработку
            персональных данных</a>
    </div>


</form>