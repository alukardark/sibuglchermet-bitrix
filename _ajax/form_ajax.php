<?php

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

use Bitrix\Main\Application;

$context = Application::getInstance()->getContext();
$request = $context->getRequest();

$isPost = $request->isPost();
$sAction = $request->getPost("AJAX");
$template = $request->getPost("TEMPLATE");

if (!$isPost) {
    json_result(false, array('alert' => "Ошибочный запрос"));
}

if (empty($sAction)) {
    json_result(false, array('alert' => "Неверное действие", 'request' => $_REQUEST));
}

switch ($template) {
    case FOS_VACANCIES_EVENT:
        $APPLICATION->IncludeComponent(
            "sibuglemet:feedback",
            "vacancies",
            array(
                "EVENT_ALIAS" => FOS_VACANCIES_EVENT,
                "STORE_IBLOCK_ID" => 28,
                "FIELDS" => array(
                    "ANSWER_NAME" => "ФИО",
                    "ANSWER_EMAIL" => "E-mail",
                    "ANSWER_PHONE" => "Телефон",
                    "ANSWER_TEXT" => "Напишите почему вы подходите на вакантную должность, какую пользу можете принести компании и почему должны выбрать именно вас",
                ),
                "REQUIRED_FIELDS" => array(
                    "ANSWER_TEXT",
                    "ANSWER_NAME",
                ),
                "UPLOAD_FILE" => "ANSWER_FILE",
                "OK_MESSAGE" => "Спасибо, ваше сообщение принято!"
            ),
            false,
            array(
                "HIDE_ICONS" => "Y"
            )
        );
        break;
    case FOS_FEEDBACK_EVENT:
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
                    "ANSWER_TEXT",
                    "ANSWER_NAME",
                ),
                "UPLOAD_FILE" => "ANSWER_FILE",
                "OK_MESSAGE" => "Спасибо, ваше сообщение принято!"
            ),
            false,
            array(
                "HIDE_ICONS" => "Y"
            )
        );
        break;
    default:
        json_result(false, ['alert' => "Неизвестная ошибка"]);
}
