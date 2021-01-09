<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if(empty($arResult))
	return "";

$strReturn = '';


if (defined('ERROR_404') && ERROR_404=='Y' && !defined('ADMIN_SECTION')){
    $strReturn .= '<ul style="opacity: 0; visibility: hidden" class="breadcrumbs">';
}else{
    $strReturn .= '<ul class="breadcrumbs">';
}




$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	$link = $arResult[$index]["LINK"];


	if($link == '/novosti/' || $link == '/kompaniya/' || $link == '/lyudi-kompanii/'){
        $li_class = 'last-breadcrumbs';
    }

	$arrow = ($index > 0? '<i class="fa fa-angle-right"></i>' : '');

	if($link <> "" && $index != $itemSize-1)
	{
		$strReturn .= '
			<li class="'.$li_class.'">
				<a href="'.$link.'" title="'.$title.'" >
					'.$title.'
				</a>
				<span>/</span>
				
			</li>';
	}
	else
	{
        $strReturn .= '
        <li class="last-breadcrumbs">
            <a href="'.$link.'" title="'.$title.'" >
                '.$title.'
            </a>
        </li>';
	}
}





$strReturn .= '</ul>';




return $strReturn;


