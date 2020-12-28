<form id="<?=$arResult["TEMPLATE"] ?>" class="feedback_form" action="" method="POST" enctype="multipart/form-data"
      autocomplete="off">





    <?=bitrix_sessid_post() ?>
    <input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"] ?>">
    <input type="hidden" name="EMPTY" value=""/>
    <input type="hidden" name="AJAX" value="Y"/>
    <input type="hidden" name="TEMPLATE" value="<?=$arResult["TEMPLATE"] ?>"/>
    <input type="hidden" name="CURRENT_PAGE_URL" value=""/>
    <input type="hidden" name="CURRENT_PAGE" value=""/>
    <input type="hidden" name="FORM_TITLE" value="Заказ услуги"/>
    <input type="hidden" name="THIS_SERVICE" value="<?=$GLOBALS['this_service']?>"/>




        <?foreach ($arResult["FIELDS"] as $fieldAlias => $fieldName):
            if($fieldAlias == 'ANSWER_TEXT'){
                continue;
            }
            $require = '';
            if (in_array($fieldAlias, $arParams['REQUIRED_FIELDS'])) $require = 'require';
            ?>

                <input type="<?if($fieldAlias=='ANSWER_EMAIL'):?>email<?else:?>text<?endif?>" class="feedback_form__input <?=$require?>" name="<?=$fieldAlias ?>"
                       placeholder="<?=$fieldName ?>" value="" maxlength="30">

        <?endforeach?>


    <?if ($arResult['FIELDS']['ANSWER_TEXT']):
        $require = '';
        if (in_array($fieldAlias, $arParams['REQUIRED_FIELDS'])) $require = 'require';
        ?>

            <textarea class="feedback_form__input <?=$require ?>" name="ANSWER_TEXT" style="resize: none;"
                      placeholder="<?=$arResult['FIELDS']['ANSWER_TEXT']?>"></textarea>

    <?endif?>
    <div class="feedback_form__errors"></div>
    <input type="submit" class="btn-green" value="Отправить заявку">

    <p class="form-personal">
        Нажимая на кнопку вы соглашаетесь
        на обработку <a target="_blank" href="/personal-information/">персональных данных</a>
    </p>

</form>