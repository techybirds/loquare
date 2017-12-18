function initMap() {

    var map = new google
        .maps
        .Map(document.getElementById('map'), {
            center: {
                lat: 55.759200,
                lng: 37.611532
            },
            scrollwheel: false,
            mapTypeControl: false,
            streetViewControl: false,
            zoom: 14,
            styles: styles
        });

    var markers = locations.map(function (location, i) {
        return new google
            .maps
            .Marker({position: location, map: map, icon: basepath+'/public/frontend/assets/icons/place-tag.svg'});
    });

}

var locations = [
    { id: 1, lat: 55.760456, lng: 37.607455 },
    { id: 2, lat: 55.730456, lng: 37.607455 },
    { id: 3, lat: 55.720456, lng: 37.607455 },
    { id: 4, lat: 55.710456, lng: 37.607455 },
    { id: 5, lat: 55.700456, lng: 37.607455 }
];

var styles = [
    {
        elementType: "geometry",
        stylers: [
            {
                color: "#212121"
            }
        ]
    }, {
        elementType: "labels.icon",
        stylers: [
            {
                visibility: "off"
            }
        ]
    }, {
        elementType: "labels.text.fill",
        stylers: [
            {
                color: "#757575"
            }
        ]
    }, {
        elementType: "labels.text.stroke",
        stylers: [
            {
                color: "#212121"
            }
        ]
    }, {
        featureType: "administrative",
        elementType: "geometry",
        stylers: [
            {
                color: "#757575 "
            }
        ]
    }, {
        featureType: "administrative.country",
        elementType: "labels.text.fill",
        stylers: [
            {
                color: "#9e9e9e"
            }
        ]
    }, {
        featureType: "administrative.locality",
        elementType: "labels.text.fill",
        stylers: [
            {
                color: "#bdbdbd"
            }
        ]
    }, {
        featureType: "landscape",
        elementType: "geometry.stroke",
        stylers: [
            {
                color: "#494949 "
            }, {
                visibility: "on"
            }
        ]
    }, {
        featureType: "poi",
        elementType: "labels.text.fill",
        stylers: [
            {
                color: "#757575"
            }
        ]
    }, {
        featureType: "poi.park",
        elementType: "geometry",
        stylers: [
            {
                color: "#181818"
            }
        ]
    }, {
        featureType: "poi.park",
        elementType: "labels.text.fill",
        stylers: [
            {
                color: "#616161"
            }
        ]
    }, {
        featureType: "poi.park",
        elementType: "labels.text.stroke",
        stylers: [
            {
                color: "#1b1b1b"
            }
        ]
    }, {
        featureType: "road",
        elementType: "geometry.fill",
        stylers: [
            {
                color: "#2c2c2c"
            }
        ]
    }, {
        featureType: "road",
        elementType: "labels.text.fill",
        stylers: [
            {
                color: "#8a8a8a"
            }
        ]
    }, {
        featureType: "road.arterial",
        elementType: "geometry",
        stylers: [
            {
                color: "#373737"
            }
        ]
    }, {
        featureType: "road.highway",
        elementType: "geometry",
        stylers: [
            {
                color: "#3c3c3c"
            }
        ]
    }, {
        featureType: "road.highway.controlled_access",
        elementType: "geometry",
        stylers: [
            {
                color: "#4e4e4e"
            }
        ]
    }, {
        featureType: "road.local",
        elementType: "labels.text.fill",
        stylers: [
            {
                color: "#616161"
            }
        ]
    }, {
        featureType: "transit",
        elementType: "labels.text.fill",
        stylers: [
            {
                color: "#757575"
            }
        ]
    }, {
        featureType: "water",
        elementType: "geometry",
        stylers: [
            {
                color: "#000000"
            }
        ]
    }, {
        featureType: "water",
        elementType: "labels.text.fill",
        stylers: [
            {
                color: "#3d3d3d "
            }
        ]
    }
];