<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Продукция");
?>


    <div class="">
        <div class="banner banner--products">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumbs">
                            <li>
                                <a href="/">Главная</a>
                                <span>/</span>
                            </li>
                            <li class="last-breadcrumbs">
                                <a href="/catalog/">Продукция</a>
                            </li>
                        </ul>
                        <h1><? $APPLICATION->ShowTitle(false); ?></h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <? $APPLICATION->IncludeComponent(
                        "bitrix:catalog.section.list",
                        "produktsiya_inner",
                        array(
                            "ADD_SECTIONS_CHAIN" => "Y",
                            "CACHE_GROUPS" => "Y",
                            "CACHE_TIME" => "36000000",
                            "CACHE_TYPE" => "N",
                            "COUNT_ELEMENTS" => "Y",
                            "IBLOCK_ID" => "3",
                            "IBLOCK_TYPE" => "produktsiya",
                            "SECTION_CODE" => "",
                            "SECTION_FIELDS" => array(
                                0 => "DESCRIPTION",
                                1 => "",
                            ),
                            "SECTION_ID" => $_REQUEST["SECTION_ID"],
                            "SECTION_URL" => "#SITE_DIR#/catalog/#SECTION_CODE#/",
                            "SECTION_USER_FIELDS" => array(
                                0 => "",
                                1 => "",
                            ),
                            "SHOW_PARENT_NAME" => "Y",
                            "TOP_DEPTH" => "1",
                            "VIEW_MODE" => "LINE",
                            "COMPONENT_TEMPLATE" => "produktsiya_inner",
                            "COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
                            "FILTER_NAME" => "sectionsFilter",
                            "CACHE_FILTER" => "N"
                        ),
                        false
                    ); ?>


                    <div class="management-mini management-mini--2">
                        <h2>Менеджеры по вопросам покупки продукции</h2>
                        <ul class="management-mini__list ">
                            <li>
                                <div class="management-mini__photo"
                                     style="background-image: url(assets/img/management-1.jpg);"></div>
                                <div class="management-mini__info">
                                    <div class="management-mini__name">Бурцев Сергей Викторович</div>
                                    <div class="management-mini__specialty">Начальник управления по связям с
                                        общественностью «Сибуглемет»
                                    </div>

                                    <div class="management-mini__contacts">
                                        <a href="tel:+7 (3843) 79-36-87">+7 (3843) 79-36-87</a>, <a
                                                href="tel:+7 (3843) 79-36-87">+7 (3843) 79-36-87</a>
                                        <a href="mailto:Ivanov@mail.ru">Ivanov@mail.ru</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="management-mini__photo"
                                     style="background-image: url(assets/img/management-1.jpg);"></div>
                                <div class="management-mini__info">
                                    <div class="management-mini__name">Бурцев Сергей Викторович</div>
                                    <div class="management-mini__specialty">Начальник управления по связям с
                                        общественностью «Сибуглемет»
                                    </div>

                                    <div class="management-mini__contacts">
                                        <a href="tel:+7 (3843) 79-36-87">+7 (3843) 79-36-87</a>, <a
                                                href="tel:+7 (3843) 79-36-87">+7 (3843) 79-36-87</a>
                                        <a href="mailto:Ivanov@mail.ru">Ivanov@mail.ru</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="management-mini__photo"
                                     style="background-image: url(assets/img/management-1.jpg);"></div>
                                <div class="management-mini__info">
                                    <div class="management-mini__name">Бурцев Сергей Викторович</div>
                                    <div class="management-mini__specialty">Начальник управления по связям с
                                        общественностью «Сибуглемет»
                                    </div>

                                    <div class="management-mini__contacts">
                                        <a href="tel:+7 (3843) 79-36-87">+7 (3843) 79-36-87</a>, <a
                                                href="tel:+7 (3843) 79-36-87">+7 (3843) 79-36-87</a>
                                        <a href="mailto:Ivanov@mail.ru">Ivanov@mail.ru</a>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>


<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>