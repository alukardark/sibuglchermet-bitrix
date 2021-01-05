<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? if (!$thisMainPage): ?>


<? endif; ?>

</div>

<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="footer__wrap">
                    <div class="footer__col">
                        <div class="footer__nav">
                            <? $APPLICATION->IncludeComponent(
                                "bitrix:menu",
                                "footer_menu",
                                array(
                                    "ALLOW_MULTI_SELECT" => "N",
                                    "CHILD_MENU_TYPE" => "podrazdel",
                                    "DELAY" => "N",
                                    "MAX_LEVEL" => "1",
                                    "MENU_CACHE_GET_VARS" => array(),
                                    "MENU_CACHE_TIME" => "3600",
                                    "MENU_CACHE_TYPE" => "N",
                                    "MENU_CACHE_USE_GROUPS" => "Y",
                                    "ROOT_MENU_TYPE" => "top",
                                    "USE_EXT" => "Y",
                                    "COMPONENT_TEMPLATE" => "footer_menu",
                                    "MENU_THEME" => "site"
                                ),
                                false
                            ); ?>
                        </div>
                        <div class="footer__nav">
                            <ul>
                                <li>
                                    <? $APPLICATION->IncludeComponent(
                                        "bitrix:main.include",
                                        ".default",
                                        array(
                                            "AREA_FILE_SHOW" => "file",
                                            "AREA_FILE_SUFFIX" => "inc",
                                            "EDIT_TEMPLATE" => "",
                                            "PATH" => "/_include/menu-add-1.php",
                                            "COMPONENT_TEMPLATE" => ".default"
                                        ),
                                        false
                                    ); ?>
                                </li>
                                <li>
                                    <? $APPLICATION->IncludeComponent(
                                        "bitrix:main.include",
                                        ".default",
                                        array(
                                            "AREA_FILE_SHOW" => "file",
                                            "AREA_FILE_SUFFIX" => "inc",
                                            "EDIT_TEMPLATE" => "",
                                            "PATH" => "/_include/menu-add-2.php",
                                            "COMPONENT_TEMPLATE" => ".default"
                                        ),
                                        false
                                    ); ?>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="footer__info">
                        <a href="tel:" class="footer__tel">
                            <? $APPLICATION->IncludeComponent(
                                "bitrix:main.include",
                                ".default",
                                array(
                                    "AREA_FILE_SHOW" => "file",
                                    "AREA_FILE_SUFFIX" => "inc",
                                    "EDIT_TEMPLATE" => "",
                                    "PATH" => "/_include/tel.php",
                                    "COMPONENT_TEMPLATE" => ".default"
                                ),
                                false
                            ); ?>
                        </a>
                        <div class="footer__tel-desc">
                            <? $APPLICATION->IncludeComponent(
                                "bitrix:main.include",
                                ".default",
                                array(
                                    "AREA_FILE_SHOW" => "file",
                                    "AREA_FILE_SUFFIX" => "inc",
                                    "EDIT_TEMPLATE" => "",
                                    "PATH" => "/_include/tel-desc.php",
                                    "COMPONENT_TEMPLATE" => ".default"
                                ),
                                false
                            ); ?>
                        </div>

                        <div class="footer__soc">
                            <div class="footer__tel-desc">
                                <? $APPLICATION->IncludeComponent(
                                    "bitrix:main.include",
                                    ".default",
                                    array(
                                        "AREA_FILE_SHOW" => "file",
                                        "AREA_FILE_SUFFIX" => "inc",
                                        "EDIT_TEMPLATE" => "",
                                        "PATH" => "/_include/social-networks.php",
                                        "COMPONENT_TEMPLATE" => ".default"
                                    ),
                                    false
                                ); ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer__bottom">
        <div class="footer__up"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="footer__bottom-wrap">
                        <div class="footer__bottom-col">
                            <div class="footer__copy d-none d-md-block">© <?= date('Y') ?> Сибуглемет</div>

                            <div class="footer__bottom-col-nav">
                                <a href="/map/" class="footer__map">Карта сайта</a>
                                <a href="/usloviya-ispolzovaniya-informatsii/" class="footer__terms-information">Условия
                                    использования информации</a>
                            </div>
                        </div>


                        <div class="d-flex justify-content-between">
                            <div class="footer__copy d-md-none">© <?= date('Y') ?> Сибуглемет</div>
                            <div class="footer__development">
                                Разработка и продвижение <a href="//i-complex.ru/"
                                                            target="_blank">i-complex.ru</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>







</body>
</html>