<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?>

    <div class="contacts">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <? $APPLICATION->IncludeComponent(
                        "bitrix:news.list",
                        "contacts",
                        array(
                            "ACTIVE_DATE_FORMAT" => "j F Y",
                            "ADD_SECTIONS_CHAIN" => "N",
                            "AJAX_MODE" => "N",
                            "AJAX_OPTION_ADDITIONAL" => "",
                            "AJAX_OPTION_HISTORY" => "N",
                            "AJAX_OPTION_JUMP" => "N",
                            "AJAX_OPTION_STYLE" => "Y",
                            "CACHE_FILTER" => "N",
                            "CACHE_GROUPS" => "Y",
                            "CACHE_TIME" => "36000000",
                            "CACHE_TYPE" => "A",
                            "CHECK_DATES" => "Y",
                            "DETAIL_URL" => "",
                            "DISPLAY_BOTTOM_PAGER" => "N",
                            "DISPLAY_DATE" => "Y",
                            "DISPLAY_NAME" => "Y",
                            "DISPLAY_PICTURE" => "N",
                            "DISPLAY_PREVIEW_TEXT" => "N",
                            "DISPLAY_TOP_PAGER" => "N",
                            "FIELD_CODE" => array(
                                0 => "DETAIL_TEXT",
                                1 => "DETAIL_PICTURE",
                                2 => "",
                            ),
                            "FILTER_NAME" => "",
                            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                            "IBLOCK_ID" => "16",
                            "IBLOCK_TYPE" => "kontakty",
                            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                            "INCLUDE_SUBSECTIONS" => "N",
                            "MESSAGE_404" => "",
                            "NEWS_COUNT" => "999",
                            "PAGER_BASE_LINK_ENABLE" => "N",
                            "PAGER_DESC_NUMBERING" => "N",
                            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                            "PAGER_SHOW_ALL" => "N",
                            "PAGER_SHOW_ALWAYS" => "N",
                            "PAGER_TEMPLATE" => ".default",
                            "PAGER_TITLE" => "Новости",
                            "PARENT_SECTION" => "",
                            "PARENT_SECTION_CODE" => "",
                            "PREVIEW_TRUNCATE_LEN" => "",
                            "PROPERTY_CODE" => array(
                                0 => "MAP",
                                1 => "ADDRESS",
                                2 => "TEL",
                                3 => "EMAIL",
                                4 => "",
                            ),
                            "SET_BROWSER_TITLE" => "N",
                            "SET_LAST_MODIFIED" => "N",
                            "SET_META_DESCRIPTION" => "N",
                            "SET_META_KEYWORDS" => "N",
                            "SET_STATUS_404" => "N",
                            "SET_TITLE" => "N",
                            "SHOW_404" => "N",
                            "SORT_BY1" => "SORT",
                            "SORT_BY2" => "ID",
                            "SORT_ORDER1" => "ASC",
                            "SORT_ORDER2" => "ASC",
                            "STRICT_SECTION_CHECK" => "N",
                            "COMPONENT_TEMPLATE" => "contacts"
                        ),
                        false
                    ); ?>


                </div>
            </div>
        </div>


        <div class="contacts__form">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Написать нам</h2>

                        <?
                        $APPLICATION->IncludeComponent(
                            "sibuglemet:feedback",
                            "feedback",
                            array(
                                "EVENT_ALIAS" => FOS_FEEDBACK_EVENT,
                                "STORE_IBLOCK_ID" => 27,
                                "FIELDS" => array(
                                    "ANSWER_NAME" => "ФИО",
                                    "ANSWER_EMAIL" => "E-mail",
                                    "ANSWER_PHONE" => "Телефон",
                                    "ANSWER_TEXT" => "Сообщение",
                                ),
                                "REQUIRED_FIELDS" => array(
                                    "ANSWER_NAME",
                                    "ANSWER_TEXT",
                                ),
                                "UPLOAD_FILE" => "ANSWER_FILE",
                                "OK_MESSAGE" => "Спасибо, ваше сообщение принято!"
                            ),
                            false,
                            array(
                                "HIDE_ICONS" => "Y"
                            )
                        );
                        ?>


                    </div>
                </div>
            </div>
        </div>
    </div>




<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>