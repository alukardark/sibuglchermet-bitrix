<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>





<? $i = 0; ?>
<? foreach ($arResult["ITEMS"] as $arItem): ?>
    <?
    $map_coords[$this->GetEditAreaId($arItem['ID'])]['NAME'] = $arItem['NAME'];
    $map_coords[$this->GetEditAreaId($arItem['ID'])]['PROPERTY'] = $arItem['PROPERTIES']['MAP_COORD']['VALUE'];
    $class = "predpriyatiya__" . $i;
    $map_coords[$this->GetEditAreaId($arItem['ID'])]['CLASS'] = $class;
    $i++;
    ?>
<? endforeach; ?>

<div class="predpriyatiya__links-wrap">
    <?
    $ii = 0;
    foreach ($map_coords as $map_coord_key => $map_coord) {
        {
            if ($ii % 2 == 0)
                $arr1[$map_coord_key] = $map_coord;
            else
                $arr2[$map_coord_key] = $map_coord;
        }
        $ii++;
    }
    ?>
    <ul class="predpriyatiya__links">
        <?
        $iii = 0;
        foreach ($arr1 as $map_coord_key => $map_coord) {
            if ($iii == 0){
                $class = 'active';
            }else{
                $class = '';
            }
            $iii++;
            ?>
            <li><a href="<?= "#" . $map_coord_key ?>" class="anchor predpriyatiya__link <?=$class?>"
                   data-class="<?= $map_coord['CLASS'] ?>"><?= $map_coord['NAME'] ?></a></li>

        <? } ?>
    </ul>
    <ul class="predpriyatiya__links">
        <? foreach ($arr2 as $map_coord_key => $map_coord) { ?>

            <li><a href="<?= "#" . $map_coord_key ?>" class="anchor predpriyatiya__link"
                   data-class="<?= $map_coord['CLASS'] ?>"><?= $map_coord['NAME'] ?></a></li>

        <? } ?>
    </ul>
</div>

<? $i = 0; ?>
<? foreach ($arResult["ITEMS"] as $arItem): ?>
    <?
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    $class = "predpriyatiya__" . $i;
    if ($i == 0) {
        $class .= ' active';
    }
    $i++;
    ?>



    <div id="<?= $this->GetEditAreaId($arItem['ID']); ?>" class="predpriyatiya__item <?= $class ?>">

        <h2 id="block<?= $arItem['ID'] ?>"><?= $arItem['NAME'] ?></h2>
        <div class="predpriyatiya__row">
            <div class="predpriyatiya__col">
                <p><img src="<?= $arItem['DETAIL_PICTURE']['SRC'] ?>"></p>

                <?= $arItem['DETAIL_TEXT'] ?>
            </div>
            <div class="predpriyatiya__col">
                <? if (isset($arItem['PROPERTIES']['ADDRESS']['VALUE'][0]['CONTENT']) || isset($arItem['PROPERTIES']['TEL']['VALUE'][0]['CONTENT']) || isset($arItem['PROPERTIES']['EMAIL']['VALUE'][0]['CONTENT'])): ?>
                    <h3>Контакты</h3>
                    <ul class="predpriyatiya__contacts">

                        <? if (isset($arItem['PROPERTIES']['ADDRESS']['VALUE'][0]['CONTENT'])): ?>
                            <li class="predpriyatiya__address">
                                <? foreach ($arItem['PROPERTIES']['ADDRESS']['VALUE'] as $item) {
                                    if (empty($item)) {
                                        continue;
                                    }
                                    $item = $item['CONTENT'];
                                    echo $item;
                                } ?>
                            </li>
                        <? endif; ?>


                        <? if (isset($arItem['PROPERTIES']['TEL']['VALUE'][0]['CONTENT'])): ?>
                            <li class="predpriyatiya__tel">
                                <? foreach ($arItem['PROPERTIES']['TEL']['VALUE'] as $item) {
                                    if (empty($item)) {
                                        continue;
                                    }
                                    $item = $item['CONTENT'];
                                    ?>
                                    <a href="tel:<?= $item ?>"><?= $item ?></a>
                                <? } ?>
                            </li>
                        <? endif; ?>

                        <? if (isset($arItem['PROPERTIES']['EMAIL']['VALUE'][0]['CONTENT'])): ?>
                            <li class="predpriyatiya__mail">
                                <? foreach ($arItem['PROPERTIES']['EMAIL']['VALUE'] as $item) {
                                    if (empty($item)) {
                                        continue;
                                    }
                                    $item = $item['CONTENT'];
                                    ?>
                                    <a href="mailto:<?= $item ?>"><?= $item ?></a>
                                <? } ?>
                            </li>
                        <? endif; ?>
                    </ul>
                <? endif; ?>


            </div>
        </div>

        <div class="management-mini management-mini--contacts-none">
            <?
            $arFilter = Array(
                "ACTIVE" => "Y",
                "ID" => $arItem['PROPERTIES']['MENEDZHER_LIST']['VALUE'],
            );

            $arSelect = Array("ID", "NAME", "DETAIL_PAGE_URL", "PREVIEW_TEXT", "PREVIEW_PICTURE", "DATE_ACTIVE_FROM", "PROPERTY_CONTACTS", "PROPERTY_SPETSIALNOST");
            $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize" => 9999), $arSelect);

            if ($res->GetNextElement()) { ?>
                <h3>Менеджмент</h3>
                <ul class="management-mini__list">
                    <?
                    while ($ob = $res->GetNextElement()) :
                        $arFields = $ob->GetFields();

                        if (empty($arFields['PROPERTY_CONTACTS_VALUE']['CONTENT'])) {
                            continue;
                        }
                        $manager_items[$arFields['ID']]['NAME'] = $arFields['NAME'];
                        $manager_items[$arFields['ID']]['DETAIL_PAGE_URL'] = $arFields['DETAIL_PAGE_URL'];
                        $manager_items[$arFields['ID']]['PREVIEW_PICTURE'] = CFile::GetPath($arFields['PREVIEW_PICTURE']);
                        $manager_items[$arFields['ID']]['PROPERTY_SPETSIALNOST_VALUE'] = $arFields['PROPERTY_SPETSIALNOST_VALUE'];
                        $manager_items[$arFields['ID']]['PROPERTY_CONTACTS_VALUE'][] = $arFields['PROPERTY_CONTACTS_VALUE']['CONTENT'];
                        ?>
                    <? endwhile; ?>

                    <? foreach ($manager_items as $manager_item): ?>
                        <li>
                            <div class="management-mini__photo"
                                 style="background-image: url(<?= $manager_item['PREVIEW_PICTURE'] ?>);"></div>

                            <div class="management-mini__info">
                                <div class="">
                                    <div class="management-mini__name"><?= $manager_item['NAME']; ?></div>
                                    <div class="management-mini__specialty">
                                        <?= $manager_item['PROPERTY_SPETSIALNOST_VALUE']; ?>
                                    </div>
                                </div>

                                <div class="management-mini__contacts">
                                    <?
                                    $arrayLength = count($manager_item['PROPERTY_CONTACTS_VALUE']);
                                    $counter = 0;
                                    foreach ($manager_item['PROPERTY_CONTACTS_VALUE'] as $contact) {
                                        $counter++;
                                        if (strripos($contact, '@')) {
                                            $href = 'mailto:';
                                        } else {
                                            $href = 'tel:';
                                        }

                                        if ($counter != $arrayLength) {
                                            $comma = ', ';
                                        } else {
                                            $comma = '';
                                        }
                                        ?>
                                        <span><a href="<?= $href . $contact ?>"><?= $contact ?></a><?= $comma ?></span>
                                    <? } ?>
                                </div>
                            </div>
                        </li>
                    <? endforeach; ?>

                    <? $manager_items = []; ?>
                </ul>
            <? } ?>
        </div>

        <div class="predpriyatiya__text">


            <div class="predpriyatiya__history">
                <div class="predpriyatiya__history-list">
                    <?= $arItem['PROPERTIES']['HISTORY']['~VALUE']['TEXT'] ?>
                </div>

            </div>

            <?= $arItem['PROPERTIES']['DOSTIZENIA']['~VALUE']['TEXT'] ?>

            <br>

            <?= $arItem['PROPERTIES']['REKVIZITY_ADRESA']['~VALUE']['TEXT'] ?>


            <div class="predpriyatiya__rekvizity">
                <?= $arItem['PROPERTIES']['REKVIZITY']['~VALUE']['TEXT'] ?>
            </div>


        </div>
    </div>

<? endforeach; ?>


<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
<script>
    var isMobile = false;
    if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) ||
        /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0, 4))) isMobile = true;

    function init() {


        var myMap = new ymaps.Map('map-predpriyatiya', {
                center: [59.917192, 30.311715],
                zoom: 10,
                // controls: ['zoomControl']
                controls: []
            }),

            <? $i = 0; ?>
            <? foreach ($map_coords as $map_coord_key => $map_coord) { ?>

            <? if (empty($map_coord['PROPERTY'])) {
                continue;
            } ?>



            // Создаём макет содержимого.
            MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
                '<a href="<?="#" . $map_coord_key?>" class="predpriyatiya__marker anchor" data-class="<?=$map_coord['CLASS']?>"><span>$[properties.iconContent]</span></a>'
            ),

            myPlacemark<?=$map_coord_key?> = new ymaps.Placemark([<?=$map_coord['PROPERTY']?>], {
                hintContent: '',
                balloonContent: '',
                iconContent: '<?=$map_coord['NAME']?>'
            }, {
                // Опции.
                // Необходимо указать данный тип макета.
                iconLayout: 'default#imageWithContent',
                // Своё изображение иконки метки.
                iconImageHref: '',
                // Размеры метки.
                iconImageSize: [10, 10],
                // Смещение левого верхнего угла иконки относительно
                // её "ножки" (точки привязки).
                iconImageOffset: [-5, -5],
                // Смещение слоя с содержимым относительно слоя с картинкой.
                iconContentOffset: [5, 0],
                // Макет содержимого.
                iconContentLayout: MyIconContentLayout
            });

        myMap.geoObjects.add(myPlacemark<?=$map_coord_key?>);

        <? } ?>



        // myMap.setBounds(myMap.geoObjects.getBounds(), {checkZoomRange: true, zoomMargin: 9});
        myMap.setBounds(myMap.geoObjects.getBounds()); //Установить границы карты по объектам
        myMap.setZoom(myMap.getZoom() - 1.4); //Чуть-чуть уменьшить зум для красоты


        myMap.behaviors.disable('scrollZoom');
        if (isMobile) {
            myMap.behaviors.disable('drag');
        }


        setTimeout(function () {

            $('.predpriyatiya__marker, .predpriyatiya__link').click(function () {
                var className = $(this).attr('data-class');


                $(".predpriyatiya__links .predpriyatiya__link").removeClass('active');
                $(".predpriyatiya__links .predpriyatiya__link[data-class="+className+"]").addClass('active');


                $('.predpriyatiya__item.' + className).siblings().removeClass('active');
                $('.predpriyatiya__item.' + className).addClass('active');

            });


            const anchors = document.querySelectorAll('a[href*="#"]');

            for (let anchor of anchors) {
                if (anchor.classList.contains('anchor')) {
                    anchor.addEventListener('click', function (e) {
                        e.preventDefault();


                        let blockID = anchor.getAttribute('href');
                        blockID = blockID.substring(blockID.lastIndexOf("#"));


                        document.querySelector('' + blockID).scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        })
                    })
                }
            }


        }, 500);

    }

    ymaps.ready(init);


</script>
