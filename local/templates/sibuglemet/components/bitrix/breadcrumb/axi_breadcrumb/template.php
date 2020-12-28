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
	$arrow = ($index > 0? '<i class="fa fa-angle-right"></i>' : '');

	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
	{
		$strReturn .= '
			<li>
				<a href="'.$arResult[$index]["LINK"].'" title="'.$title.'" >
					'.$title.'
				</a>
				<span></span>
				
			</li>';
	}
	else
	{

        if($GLOBALS['thisSection']){
            $strReturn .= '
			<li >
				<a href="'.$arResult[$index]["LINK"].'" title="'.$title.'" >
					'.$title.'
				</a>
				<span></span>
				
			</li>';
            $strReturn .= '
			<li class="last-breadcrumbs">
				<a href="'.$arResult[$index]["LINK"].$GLOBALS["thisSection"]["CODE"].'" title="'.$GLOBALS['thisSection']['NAME'].'" >
					'.$GLOBALS['thisSection']['NAME'].'
				</a>
				<span></span>
			</li>';
        }else{
            $strReturn .= '
			<li class="last-breadcrumbs">
				<a href="'.$arResult[$index]["LINK"].'" title="'.$title.'" >
					'.$title.'
				</a>
				<span></span>
				
			</li>';
        }


	}
}

$strReturn .= '</ul>';



return $strReturn;


