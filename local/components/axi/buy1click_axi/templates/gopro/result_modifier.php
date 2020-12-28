<?php
if (!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED !== true)
	die();

global $USER;

foreach ($arResult['SHOW_FIELDS'] as &$arField) {
	if ($arField['CODE'] == "FIO" && empty($arField['HTML_VALUE'])) $arField['HTML_VALUE'] = $USER->GetFullName();
	if ($arField['CODE'] == "EMAIL" && empty($arField['HTML_VALUE'])) $arField['HTML_VALUE'] = $USER->GetEmail();
}