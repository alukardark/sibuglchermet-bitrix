<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$assets = Bitrix\Main\Page\Asset::getInstance();

$assets->addJs("https://maps.googleapis.com/maps/api/js?key="  . 'AIzaSyALIXMyl5TSrTYwkXIk3_94Xof3g3dMznM');
