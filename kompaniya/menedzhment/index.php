<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Менеджмент");
?>

    <div class="management">
        <div class="container">
            <div class="row">
                <div class="col-md-12">


                    <? $APPLICATION->IncludeComponent(
                        "bitrix:news",
                        "page_nashi-predpriyatiya",
                        array(
                            "COMPONENT_TEMPLATE" => "page_nashi-predpriyatiya",
                            "IBLOCK_TYPE" => "page_nashi-predpriyatiya",
                            "IBLOCK_ID" => "8",
                            "NEWS_COUNT" => "9",
                            "SORT_BY1" => "SORT",
                            "SORT_ORDER1" => "DESC",
                            "SORT_BY2" => "ACTIVE_FROM",
                            "SORT_ORDER2" => "DESC",
                            "FILTER_NAME" => "arrFilter",
                            "FIELD_CODE" => array(
                                0 => "",
                                1 => "",
                            ),
                            "PROPERTY_CODE" => array(
                                0 => "",
                                1 => "",
                                2 => "",
                            ),
                            "CHECK_DATES" => "Y",
                            "DETAIL_URL" => "",
                            "AJAX_MODE" => "N",
                            "AJAX_OPTION_JUMP" => "N",
                            "AJAX_OPTION_STYLE" => "Y",
                            "AJAX_OPTION_HISTORY" => "N",
                            "AJAX_OPTION_ADDITIONAL" => "",
                            "CACHE_TYPE" => "N",
                            "CACHE_TIME" => "36000000",
                            "CACHE_FILTER" => "N",
                            "CACHE_GROUPS" => "Y",
                            "PREVIEW_TRUNCATE_LEN" => "",
                            "ACTIVE_DATE_FORMAT" => "d.m.Y",
                            "SET_TITLE" => "N",
                            "SET_BROWSER_TITLE" => "N",
                            "SET_META_KEYWORDS" => "N",
                            "SET_META_DESCRIPTION" => "N",
                            "SET_LAST_MODIFIED" => "N",
                            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                            "ADD_SECTIONS_CHAIN" => "N",
                            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                            "PARENT_SECTION" => "",
                            "PARENT_SECTION_CODE" => "",
                            "INCLUDE_SUBSECTIONS" => "Y",
                            "STRICT_SECTION_CHECK" => "N",
                            "DISPLAY_DATE" => "Y",
                            "DISPLAY_NAME" => "Y",
                            "DISPLAY_PICTURE" => "Y",
                            "DISPLAY_PREVIEW_TEXT" => "N",
                            "PAGER_TEMPLATE" => "pagination",
                            "DISPLAY_TOP_PAGER" => "N",
                            "DISPLAY_BOTTOM_PAGER" => "Y",
                            "PAGER_TITLE" => "Новости",
                            "PAGER_SHOW_ALWAYS" => "N",
                            "PAGER_DESC_NUMBERING" => "N",
                            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                            "PAGER_SHOW_ALL" => "N",
                            "PAGER_BASE_LINK_ENABLE" => "N",
                            "SET_STATUS_404" => "N",
                            "SHOW_404" => "N",
                            "MESSAGE_404" => "",
                            "USE_SEARCH" => "N",
                            "USE_RSS" => "N",
                            "USE_RATING" => "N",
                            "USE_CATEGORIES" => "N",
                            "USE_FILTER" => "N",
                            "SEF_MODE" => "Y",
                            "SEF_FOLDER" => "",
                            "ADD_ELEMENT_CHAIN" => "N",
                            "USE_PERMISSIONS" => "N",
                            "USE_SHARE" => "N",
                            "LIST_ACTIVE_DATE_FORMAT" => "j F Y",
                            "LIST_FIELD_CODE" => array(
                                0 => "",
                                1 => "",
                            ),
                            "LIST_PROPERTY_CODE" => array(
                                0 => "CONTACTS",
                                1 => "SPETSIALNOST",
                                2 => "",
                            ),
                            "META_KEYWORDS" => "-",
                            "META_DESCRIPTION" => "-",
                            "BROWSER_TITLE" => "-",
                            "DETAIL_SET_CANONICAL_URL" => "N",
                            "DETAIL_ACTIVE_DATE_FORMAT" => "j F Y",
                            "DETAIL_FIELD_CODE" => array(
                                0 => "PREVIEW_PICTURE",
                                1 => "",
                            ),
                            "DETAIL_PROPERTY_CODE" => array(
                                0 => "CONTACTS",
                                1 => "SPETSIALNOST",
                                2 => "",
                            ),
                            "DETAIL_DISPLAY_TOP_PAGER" => "N",
                            "DETAIL_DISPLAY_BOTTOM_PAGER" => "N",
                            "DETAIL_PAGER_TITLE" => "Страница",
                            "DETAIL_PAGER_TEMPLATE" => "",
                            "DETAIL_PAGER_SHOW_ALL" => "N",
                            "FILTER_FIELD_CODE" => array(
                                0 => "DATE_CREATE",
                                1 => "",
                            ),
                            "FILTER_PROPERTY_CODE" => array(
                                0 => "COMPANY",
                                1 => "TAGS",
                                2 => "",
                            ),
                            "SEF_URL_TEMPLATES" => array(
                                "news" => "",
                                "section" => "",
                                "detail" => "#ELEMENT_CODE#/",
                            )
                        ),
                        false
                    ); ?>

                </div>
            </div>
        </div>
    </div>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>