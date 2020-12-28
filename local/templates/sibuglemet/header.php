<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
global $USER;

$assets = Bitrix\Main\Page\Asset::getInstance();
$assets->addCss(SITE_TEMPLATE_PATH . "/dist/styles/main.css");
$assets->addString('<link href="' . SITE_DIR . 'favicon.ico?v=3" rel="shortcut icon"  type="image/x-icon" />');
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

                            <div class="header__wrap">
                                <div class="header__menu-add">
                                    <a href="#">Охрана труда и промышленная безопасность</a>
                                    <a href="#">Реализация непрофильного имущества и ТМЦ</a>
                                </div>

                                <div class="header__menu">
                                    <ul>
                                        <li class="active header__menu-dropdown">
                                            <a href="#">Компания</a>
                                            <ul>
                                                <li><a href="#">Подпункт 1</a></li>
                                                <li><a href="#">Подпункт 2</a></li>
                                                <li><a href="#">Подпункт 3</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">Продукция</a>
                                        </li>
                                        <li class="header__menu-dropdown">
                                            <a href="#">Люди компании</a>
                                            <ul>
                                                <li><a href="#">Подпункт 1</a></li>
                                                <li><a href="#">Подпункт 2</a></li>
                                                <li><a href="#">Подпункт 3</a></li>
                                            </ul>
                                        </li>
                                        <li class="header__menu-dropdown">
                                            <a href="#">Новости</a>
                                            <ul>
                                                <li><a href="#">Подпункт 1</a></li>
                                                <li><a href="#">Подпункт 2</a></li>
                                                <li><a href="#">Подпункт 3</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">Контакты</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="header__add-nav">
                                <a href="#" class="header__personal-area">Личный кабинет</a>
                                <a href="#" class="header__lang">EN</a>
                                <a href="#" class="header__visually-impaired"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>