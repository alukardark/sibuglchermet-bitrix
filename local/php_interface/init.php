<?php

//use Bitrix\Main\Loader;


//date_default_timezone_set("Asia/Novokuznetsk");

//Loader::includeModule("main");
//Loader::includeModule("iblock");

function getSiteInfo($siteId = SITE_ID)
{
    return \CSite::GetByID($siteId)->Fetch();
}

$arSite = getSiteInfo();
define("SITE_NAME", $arSite['NAME']);

if ($APPLICATION->GetCurPage(false) === '/') {
    $thisMainPage = true;
}


if(strpos($APPLICATION->GetCurPage(false), 'novosti')){
    $banner = 'news';
}
if(strpos($APPLICATION->GetCurPage(false), 'produktsiya')){
    $banner = 'products';
}
if(strpos($APPLICATION->GetCurPage(false), 'kompaniya')){
    $banner = 'company';
}
if(strpos($APPLICATION->GetCurPage(false), 'nashi-predpriyatiya')){
    $banner = 'predpriyatiya';
}

if(strpos($APPLICATION->GetCurPage(false), 'kontakty')){
    $banner = 'contacts';
}
if(strpos($APPLICATION->GetCurPage(false), 'realizatsiya-neprofilnogo-imushchestva')){
    $banner = 'realizatsiya-neprofilnogo-imushchestva';
}
if(strpos($APPLICATION->GetCurPage(false), 'okhrana-truda-i-promyshlennaya-bezopasnost')){
    $banner = 'okhrana-truda-i-promyshlennaya-bezopasnost';
}

if(strpos($APPLICATION->GetCurPage(false), 'lyudi-kompanii')){
    $banner = 'company-people';
}







function add_url_get($a_data,$url = false){
    $http = $_SERVER['HTTPS'] ? 'https':'http';

    if($url === false){
        $url = $http.'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    }
    $query_str = parse_url($url);
    $path = !empty($query_str['path']) ? $query_str['path'] : '';
    $return_url = $query_str['scheme'].'://'.$query_str['host'].$path;
    $query_str = !empty($query_str['query']) ? $query_str['query'] : false;
    $a_query = array();
    if($query_str) {
        parse_str($query_str,$a_query);
    }
    $a_query = array_merge($a_query,$a_data);
    $s_query = http_build_query($a_query);
    if($s_query){
        $s_query = '?'.$s_query;
    }
    return $return_url.$s_query;
}



