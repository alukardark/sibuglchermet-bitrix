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




<? foreach ($arResult["ITEMS"] as $arItem): ?>
    <?
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

    $map_coords[$arItem['ID']] = $arItem['PROPERTIES']['MAP']['VALUE'];
    ?>

    <div class="contacts__row" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
        <div class="contacts__info">
            <h2><?= $arItem['NAME'] ?></h2>
            <ul class="contacts__contacts">
                <li class="contacts__address">
                    <? foreach ($arItem['PROPERTIES']['ADDRESS']['VALUE'] as $item) {
                        if (empty($item)) {
                            continue;
                        }
                        $item = $item['CONTENT'];
                        echo $item;
                    } ?>
                </li>
                <li class="contacts__tel">
                    <? foreach ($arItem['PROPERTIES']['TEL']['VALUE'] as $item) {
                        if (empty($item)) {
                            continue;
                        }
                        $item = $item['CONTENT'];
                        ?>

                        <a href="tel:<?= $item ?>"><?= $item ?></a>
                    <? } ?>
                </li>
                <li class="contacts__mail">
                    <? foreach ($arItem['PROPERTIES']['EMAIL']['VALUE'] as $item) {
                        if (empty($item)) {
                            continue;
                        }
                        $item = $item['CONTENT'];
                        ?>

                        <a href="mailto:<?= $item ?>"><?= $item ?></a>
                    <? } ?>
                </li>
            </ul>
        </div>
        <div id="map<?= $arItem['ID'] ?>" class="contacts__map"></div>
    </div>


<? endforeach; ?>




<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>

<script>
    var isMobile = false;
    if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) ||
        /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0, 4))) isMobile = true;



    function init() {



        <? foreach ($map_coords as $map_key => $map_coord) { ?>

        var myMap<?=$map_key?> = new ymaps.Map('map' +<?=$map_key?>, {
                center: [<?=$map_coord?>],
                zoom: 16,
                // controls: ['zoomControl']
                controls: []
            }),

            myPlacemark<?=$map_key?> = new ymaps.Placemark([<?=$map_coord?>], {
                hintContent: '',
                balloonContent: '',
                iconContent: ''
            }, {
                // Опции.
                // Необходимо указать данный тип макета.
                iconLayout: 'default#imageWithContent',
                // Своё изображение иконки метки.
                iconImageHref: "<?=SITE_TEMPLATE_PATH . '/dist/assets/img/marker.svg'?>",
                // Размеры метки.
                iconImageSize: [60, 75],
                // Смещение левого верхнего угла иконки относительно
                // её "ножки" (точки привязки).
                iconImageOffset: [-30, -75],
                // Смещение слоя с содержимым относительно слоя с картинкой.
            });

        myMap<?=$map_key?>.geoObjects.add(myPlacemark<?=$map_key?>);

        myMap<?=$map_key?>.behaviors.disable('scrollZoom');
        if (isMobile) {
            myMap<?=$map_key?>.behaviors.disable('drag');
        }

        <? } ?>
    }

    ymaps.ready(init);
</script>

