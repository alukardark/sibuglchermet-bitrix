<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
global $USER;

$assets = Bitrix\Main\Page\Asset::getInstance();
$assets->addCss(SITE_TEMPLATE_PATH . "/dist/styles/main.css");
$assets->addString('<link href="' . SITE_DIR . 'favicon.ico?v=3" rel="shortcut icon"  type="image/x-icon" />');

$assets->addJs(SITE_TEMPLATE_PATH . "/dist/js/vendors~main.js");
$assets->addJs(SITE_TEMPLATE_PATH . "/dist/js/main.js");
?>


    <!DOCTYPE html>
    <html xml:lang="<?= LANGUAGE_ID ?>" lang="<?= LANGUAGE_ID ?>">

    <head>
        <title><?= SITE_NAME . " — " ?><? $APPLICATION->ShowTitle('', true); ?></title>

        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="format-detection" content="telephone=no"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta name="HandheldFriendly" content="true"/>
        <meta name="MobileOptimized" content="width"/>
        <? $APPLICATION->ShowHead(true); ?>
        <!--[if IE]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js" data-skip-moving="true"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js" data-skip-moving="true"></script>
        <![endif]-->
    </head>

<body>
<? if ($USER->IsAdmin()) : ?>
    <div id="panel"><? $APPLICATION->ShowPanel(); ?></div>
<? endif; ?>


<div class="wrapper">

    <div class="wrapper-content">

    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="header__contain">
                        <a href="/" class="header__logo"></a>
                        <div class="burger">
                            <span></span>
                        </div>

                        <div class="header__mobile">
                            <div class="header__wrap">
                                <div class="header__top">
                                    <div class="header__menu-add d-none d-md-flex">
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
                                    </div>

                                    <div class="header__add-nav">
                                        <a href="#" class="header__personal-area">Личный кабинет</a>
                                        <a href="#" class="header__lang">EN</a>
                                        <a href="#" class="header__visually-impaired"></a>
                                    </div>
                                </div>

                                <? $APPLICATION->IncludeComponent(
                                    "bitrix:menu",
                                    "header_menu",
                                    array(
                                        "ALLOW_MULTI_SELECT" => "N",
                                        "CHILD_MENU_TYPE" => "podrazdel",
                                        "DELAY" => "N",
                                        "MAX_LEVEL" => "2",
                                        "MENU_CACHE_GET_VARS" => array(),
                                        "MENU_CACHE_TIME" => "3600",
                                        "MENU_CACHE_TYPE" => "N",
                                        "MENU_CACHE_USE_GROUPS" => "Y",
                                        "ROOT_MENU_TYPE" => "top",
                                        "USE_EXT" => "Y",
                                        "COMPONENT_TEMPLATE" => "header_menu",
                                        "MENU_THEME" => "site"
                                    ),
                                    false
                                ); ?>

                                <div class="header__menu-add d-md-none">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<? if (!$thisMainPage): ?>

        <div class="banner banner--<?=$banner?>">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                         <?$APPLICATION->IncludeComponent(
                                        "bitrix:breadcrumb",
                                        "breadcrumb",
                                        array(
                                            "PATH" => "",
                                            "SITE_ID" => "s1",
                                            "START_FROM" => "0",
                                            "COMPONENT_TEMPLATE" => "breadcrumb"
                                        ),
                                        false
                                    );?>

                        <h1><? $APPLICATION->ShowTitle(false); ?></h1>
                    </div>
                </div>
            </div>
        </div>

<? endif; ?>