<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?>

    <div class="contacts">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <? $APPLICATION->IncludeComponent(
                        "bitrix:news.list",
                        "contacts",
                        array(
                            "ACTIVE_DATE_FORMAT" => "j F Y",
                            "ADD_SECTIONS_CHAIN" => "N",
                            "AJAX_MODE" => "N",
                            "AJAX_OPTION_ADDITIONAL" => "",
                            "AJAX_OPTION_HISTORY" => "N",
                            "AJAX_OPTION_JUMP" => "N",
                            "AJAX_OPTION_STYLE" => "Y",
                            "CACHE_FILTER" => "N",
                            "CACHE_GROUPS" => "Y",
                            "CACHE_TIME" => "36000000",
                            "CACHE_TYPE" => "A",
                            "CHECK_DATES" => "Y",
                            "DETAIL_URL" => "",
                            "DISPLAY_BOTTOM_PAGER" => "N",
                            "DISPLAY_DATE" => "Y",
                            "DISPLAY_NAME" => "Y",
                            "DISPLAY_PICTURE" => "N",
                            "DISPLAY_PREVIEW_TEXT" => "N",
                            "DISPLAY_TOP_PAGER" => "N",
                            "FIELD_CODE" => array(
                                0 => "DETAIL_TEXT",
                                1 => "DETAIL_PICTURE",
                                2 => "",
                            ),
                            "FILTER_NAME" => "",
                            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                            "IBLOCK_ID" => "16",
                            "IBLOCK_TYPE" => "kontakty",
                            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                            "INCLUDE_SUBSECTIONS" => "N",
                            "MESSAGE_404" => "",
                            "NEWS_COUNT" => "999",
                            "PAGER_BASE_LINK_ENABLE" => "N",
                            "PAGER_DESC_NUMBERING" => "N",
                            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                            "PAGER_SHOW_ALL" => "N",
                            "PAGER_SHOW_ALWAYS" => "N",
                            "PAGER_TEMPLATE" => ".default",
                            "PAGER_TITLE" => "Новости",
                            "PARENT_SECTION" => "",
                            "PARENT_SECTION_CODE" => "",
                            "PREVIEW_TRUNCATE_LEN" => "",
                            "PROPERTY_CODE" => array(
                                0 => "MAP",
                                1 => "ADDRESS",
                                2 => "TEL",
                                3 => "EMAIL",
                                4 => "",
                            ),
                            "SET_BROWSER_TITLE" => "N",
                            "SET_LAST_MODIFIED" => "N",
                            "SET_META_DESCRIPTION" => "N",
                            "SET_META_KEYWORDS" => "N",
                            "SET_STATUS_404" => "N",
                            "SET_TITLE" => "N",
                            "SHOW_404" => "N",
                            "SORT_BY1" => "SORT",
                            "SORT_BY2" => "ID",
                            "SORT_ORDER1" => "ASC",
                            "SORT_ORDER2" => "ASC",
                            "STRICT_SECTION_CHECK" => "N",
                            "COMPONENT_TEMPLATE" => "contacts"
                        ),
                        false
                    ); ?>


                </div>
            </div>
        </div>


        <div class="contacts__form">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Написать нам</h2>
                        <form id="fileupload" action="#" method="GET" enctype="multipart/form-data">
                            <div class="contacts__form-row">
                                <div class="contacts__form-col">
                                    <input type="text" placeholder="ФИО">
                                    <input type="text" placeholder="E-mail">
                                    <label>
                                        <span>Телефон</span>
                                        <input type="tel" placeholder="+7 (999) 999-9999">
                                    </label>
                                </div>
                                <textarea name="" placeholder="Сообщение"></textarea>
                            </div>

                            <div class="contacts__form-col">
                                <div class="contacts__file-upload">
                                    <h4>Прикрепить файл</h4>
                                    <div class="file-list"></div>
                                    <div class="contacts__file-wrap">
                                        <label>
                                            <input type="file" name="file" id="file" multiple="multiple"
                                                   accept="application/msword, text/plain, application/pdf, image/jpeg, image/png">
                                            <div class="contacts__file-btn">Прикрепить</div>
                                        </label>
                                        <div class="contacts__file-formats">
                                            (Форматы: pdf, docx, jpg <br> Общий размер: не больше 30 Мб )
                                        </div>
                                    </div>

                                    <div class="file-error"></div>

                                </div>
                                <input type="submit" value="Отправить письмо">
                                <div class="personal-data">
                                    Нажимая на кнопку, Вы даете согласие на <a href="/personalnye-dannye/"
                                                                               target="_blank">обработку персональных
                                        данных</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>

    <script>
        var isMobile = false;
        if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) ||
            /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0, 4))) isMobile = true;


        function init() {
            <? foreach ($GLOBALS['map_coords'] as $map_key => $map_coord) { ?>

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


<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>