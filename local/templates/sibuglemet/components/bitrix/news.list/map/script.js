var MAP = {
    mapStyles: [],
    markersArray: [],
    mapContainer: {},
    mapObjects: {},
    currentCity: '',
    currentDistrict: false,
    defaultCenter: {lat: 55.34432630867194, lng: 86.06208801269531},
    icons: {},
    infoWindow: {},
    shopsMap: {}
};

MAP.mapStyles = [
    {
        "featureType": "administrative",
        "elementType": "all",
        "stylers": [
            {
                "saturation": "-100"
            }
        ]
    },
    {
        "featureType": "administrative.province",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "all",
        "stylers": [
            {
                "saturation": -100
            },
            {
                "lightness": 65
            },
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "all",
        "stylers": [
            {
                "saturation": "-100"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "labels.icon",
        "stylers": [
            {
                "saturation": "-18"
            },
            {
                "lightness": "-22"
            },
            {
                "gamma": "1.23"
            },
            {
                "weight": "0.01"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "all",
        "stylers": [
            {
                "saturation": "-100"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "all",
        "stylers": [
            {
                "lightness": "30"
            }
        ]
    },
    {
        "featureType": "road.local",
        "elementType": "all",
        "stylers": [
            {
                "lightness": "40"
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "all",
        "stylers": [
            {
                "saturation": -100
            },
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "geometry",
        "stylers": [
            {
                "lightness": -25
            },
            {
                "saturation": -97
            },
            {
                "visibility": "on"
            },
            {
                "color": "#45c387"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "labels",
        "stylers": [
            {
                "lightness": -25
            },
            {
                "saturation": -100
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "labels.text",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#ffffff"
            }
        ]
    }
]

;

var ShopsMapInit = function () {
    MAP.mapContainer = $('#map');
    MAP.mapObjects = $('.city-control-wrap');

    MAP.currentCity = MAP.mapContainer.data('current-city');

    MAP.icons = {
        default: {
            name: 'default',
            url: '/upload/_markers/marker-default.png',
            anchor: new google.maps.Point(41, 70)
        },
        active: {
            name: 'active',
            url: '/upload/_markers/marker-active.png',
            anchor: new google.maps.Point(54, 99)
        }
    };
    MAP.infoWindow = new google.maps.InfoWindow();

    MAP.shopsMap = new google.maps.Map(MAP.mapContainer[0], {
        center: MAP.defaultCenter,
        clickableIcons: false,
        disableDefaultUI: false,
        disableDoubleClickZoom: false,
        draggable: true,
        scrollwheel: false,
        styles: MAP.mapStyles,
        zoom: 12,
        minZoom: 10,
        maxZoom: 16,
        mapTypeControl: false,
        streetViewControl: false
    });

    var markersBounds = new google.maps.LatLngBounds();
    if (MAP.mapObjects) {
        MAP.mapObjects.each(function (index, object) {
            var markerPosition = new google.maps.LatLng($(object).data('lat'), $(object).data('lng'));
            markersBounds.extend(markerPosition);

            var marker = new google.maps.Marker({
                map: MAP.shopsMap,
                position: markerPosition,
                icon: MAP.icons.default,
                city: $(object).data('city'),
                shop: $(object).data('target'),
                name: $(object).data('name'),
                district: $(object).data('district'),
                address: $(object).data('address')
            });

            MAP.markersArray.push(marker);

            marker.addListener('click', function () {
                if (marker.getIcon().name === 'default') {
                    /* Set icon */
                    DropIconsState();
                    marker.setIcon(MAP.icons.active);

                    /* Show shop card */
                    $('.panel-content').not($(marker.shop)).collapse('hide');
                    $(marker.shop).collapse('show');
                }
            });
            // marker.addListener('mouseover', function () {
            //     if (marker.getIcon().name === 'default') {
            //         var content = '<span class="shops__map__infowindow">' + marker.address + '</span>';
            //         MAP.infoWindow.setContent(content);
            //         MAP.infoWindow.open(MAP.shopsMap, marker);
            //     }
            // });
            marker.addListener('mouseout', function () {
                if (marker.getIcon().name === 'default') {
                    MAP.infoWindow.close();
                }
            });
        });

        MAP.shopsMap.addListener('click', function () {
            MAP.infoWindow.close();
        });

        // remove close button from infowindow
        google.maps.event.addListener(MAP.infoWindow, 'domready', function () {
            $('.shops__map__infowindow').parent().parent().parent().next('div').css({'display': 'none'});
        });

        SetActiveMarkers();
    }
};
var ShopSelectHandler = function () {
    var collapsible = $('.panel-content');
    collapsible.on('shown.bs.collapse', function () {
        /* activate current shop marker on map */
        var shop = '#' + $(this).attr('id');
        for (var i = 0; i < MAP.markersArray.length; i++) {
            var marker = MAP.markersArray[i];
            if(marker.shop === shop) {
                DropIconsState();
                marker.setIcon(MAP.icons.active);
                // var content = '<span class="shops__map__infowindow">' + marker.address + '</span>';
                // MAP.infoWindow.setContent(content);
                // MAP.infoWindow.open(MAP.shopsMap, marker);

                MAP.shopsMap.panTo(marker.position);
            }
        }

    });
    collapsible.on('hidden.bs.collapse', function () {
        collapsible.parent().removeClass('active');
        DropIconsState();
        MAP.infoWindow.close();
    });
};
var DropIconsState = function () {
    for (var i = 0; i < MAP.markersArray.length; i++) {
        var marker = MAP.markersArray[i];
        marker.setIcon(MAP.icons.default);
    }
};
var SetActiveMarkers = function () {
    var markersBounds = new google.maps.LatLngBounds();
    for (var i = 0; i < MAP.markersArray.length; i++) {
        var marker = MAP.markersArray[i];
        if ((marker.city === MAP.currentCity && MAP.currentDistrict === false) ||
            (marker.city === MAP.currentCity && marker.district === MAP.currentDistrict)) {
            marker.setVisible(true);
            markersBounds.extend(marker.position);
        } else {
            marker.setVisible(false);
        }
    }
    MAP.shopsMap.setCenter(markersBounds.getCenter(), MAP.shopsMap.fitBounds(markersBounds));

    //$(window).off();
    $(window).on('resize orientationchange', function () {
        MAP.shopsMap.setCenter(markersBounds.getCenter());
    });
};


jQuery(document).ready(function () {
    $('.city-control-wrap').click(function(e){
        e.preventDefault();
    });

    if ($("div").is("#map")) {
        ShopsMapInit();
    }
    ShopSelectHandler();
});
