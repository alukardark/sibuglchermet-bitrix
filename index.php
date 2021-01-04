<?
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
$APPLICATION->SetPageProperty("title", "Title");
$APPLICATION->SetTitle("Главная");
?>


<? $APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "main_slider",
    array(
        "COMPONENT_TEMPLATE" => "main_slider",
        "IBLOCK_TYPE" => "-",
        "IBLOCK_ID" => "1",
        "NEWS_COUNT" => "10",
        "SORT_BY1" => "SORT",
        "SORT_ORDER1" => "ASC",
        "SORT_BY2" => "ACTIVE_FROM",
        "SORT_ORDER2" => "ASC",
        "FILTER_NAME" => "",
        "FIELD_CODE" => array(
            0 => "",
            1 => "",
        ),
        "PROPERTY_CODE" => array(
            0 => "LINK_BTN",
        ),
        "CHECK_DATES" => "Y",
        "DETAIL_URL" => "",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "CACHE_TYPE" => "A",
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
        "DISPLAY_DATE" => "N",
        "DISPLAY_NAME" => "N",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "N",
        "PAGER_TEMPLATE" => ".default",
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
        "MESSAGE_404" => ""
    ),
    false
); ?>


<?

?>
    <div class="last-news">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="header-row">
                        <h2>Последние новости</h2>
                        <a href="/novosti/">Все новости</a>
                    </div>

                    <? $APPLICATION->IncludeComponent(
                        "bitrix:news",
                        "news",
                        array(
                            "COMPONENT_TEMPLATE" => "news",
                            "IBLOCK_TYPE" => "content",
                            "IBLOCK_ID" => "2",
                            "NEWS_COUNT" => "3",
                            "SORT_BY1" => "SORT",
                            "SORT_ORDER1" => "ASC",
                            "SORT_BY2" => "ACTIVE_FROM",
                            "SORT_ORDER2" => "ASC",
                            "FILTER_NAME" => "",
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
                            "PAGER_TEMPLATE" => ".default",
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
                                0 => "COMPANY",
                                1 => "TAGS",
                                2 => "",
                            ),
                            "META_KEYWORDS" => "-",
                            "META_DESCRIPTION" => "-",
                            "BROWSER_TITLE" => "-",
                            "DETAIL_SET_CANONICAL_URL" => "N",
                            "DETAIL_ACTIVE_DATE_FORMAT" => "j F Y",
                            "DETAIL_FIELD_CODE" => array(
                                0 => "",
                                1 => "",
                            ),
                            "DETAIL_PROPERTY_CODE" => array(
                                0 => "COMPANY",
                                1 => "TAGS",
                                2 => "",
                            ),
                            "DETAIL_DISPLAY_TOP_PAGER" => "N",
                            "DETAIL_DISPLAY_BOTTOM_PAGER" => "N",
                            "DETAIL_PAGER_TITLE" => "Страница",
                            "DETAIL_PAGER_TEMPLATE" => "",
                            "DETAIL_PAGER_SHOW_ALL" => "N",
                            "SEF_URL_TEMPLATES" => array(
                                "news" => "",
                                "section" => "",
                                "detail" => "",
                            )
                        ),
                        false
                    ); ?>

                </div>
            </div>
        </div>
    </div>

    <div class="products">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="header-row">
                        <h2>Продукция</h2>
                        <a href="/produktsiya/">Весь каталог</a>
                    </div>

                    <? $APPLICATION->IncludeComponent(
                        "bitrix:news.list",
                        "produktsiya_main",
                        array(
                            "COMPONENT_TEMPLATE" => "produktsiya_main",
                            "IBLOCK_TYPE" => "-",
                            "IBLOCK_ID" => "3",
                            "NEWS_COUNT" => "6",
                            "SORT_BY1" => "SORT",
                            "SORT_ORDER1" => "ASC",
                            "SORT_BY2" => "ACTIVE_FROM",
                            "SORT_ORDER2" => "ASC",
                            "FILTER_NAME" => "",
                            "FIELD_CODE" => array(
                                0 => "",
                                1 => "",
                            ),
                            "PROPERTY_CODE" => array(
                                0 => "MAIN_PAGE",
                                1 => "FILE",
                            ),
                            "CHECK_DATES" => "Y",
                            "DETAIL_URL" => "",
                            "AJAX_MODE" => "N",
                            "AJAX_OPTION_JUMP" => "N",
                            "AJAX_OPTION_STYLE" => "Y",
                            "AJAX_OPTION_HISTORY" => "N",
                            "AJAX_OPTION_ADDITIONAL" => "",
                            "CACHE_TYPE" => "A",
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
                            "DISPLAY_DATE" => "N",
                            "DISPLAY_NAME" => "N",
                            "DISPLAY_PICTURE" => "Y",
                            "DISPLAY_PREVIEW_TEXT" => "N",
                            "PAGER_TEMPLATE" => ".default",
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
                            "MESSAGE_404" => ""
                        ),
                        false
                    ); ?>


                </div>
            </div>
        </div>
    </div>

    <div class="history">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="header-row">
                        <h2>Наши истории</h2>
                        <a href="#">Все истории</a>
                    </div>
                    <ul class="history__list">
                        <li>
                            <a href="#">
                                <div class="history__img"
                                     style="background-image: url(<?= SITE_TEMPLATE_PATH ?>/dist/assets/img/news-1.jpg);"></div>
                                <div class="history__info">
                                    <div class="history__tag">#Корпоративные новости</div>
                                    <p>Ветеран АО «Междуречье» Александр Никитович Евсеев отметил 80-летний
                                        юбилей!</p>
                                    <div class="history__data">
                                        <div class="history__link">Читать далее</div>
                                        <div class="history__date">12 ноября 2020</div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="history__img"
                                     style="background-image: url(<?= SITE_TEMPLATE_PATH ?>/dist/assets/img/news-2.jpg);"></div>
                                <div class="history__info">
                                    <div class="history__tag">#Корпоративные новости</div>
                                    <p>Ветеран АО «Междуречье» Александр Никитович Евсеев отметил 80-летний
                                        юбилей!</p>
                                    <div class="history__data">
                                        <div class="history__link">Читать далее</div>
                                        <div class="history__date">12 ноября 2020</div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="history__img"
                                     style="background-image: url(<?= SITE_TEMPLATE_PATH ?>/dist/assets/img/news-3.jpg);"></div>
                                <div class="history__info">
                                    <div class="history__tag">#Корпоративные новости</div>
                                    <p>Ветеран АО «Междуречье» Александр Никитович Евсеев отметил 80-летний
                                        юбилей!</p>
                                    <div class="history__data">
                                        <div class="history__link">Читать далее</div>
                                        <div class="history__date">12 ноября 2020</div>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


<?
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php');
?>