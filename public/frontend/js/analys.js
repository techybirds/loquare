jsondata = {
    "type":"FeatureCollection",
    "features":""
};

var currentRadius   = 0.5;
var fc              = "";
var demodata        = [];
var anlys_category  = ""
var categorydata    = [];
var usermarker, cssIcon, analysmap = "";
category_icon = "star";

$(document).ready(function(){

    $(".search_category").click(function(){
        $("#service-map").next(".map-loader").show(0);

        $(".search_category").removeClass("active");

        if($(this).attr("category") != anlys_category)
        {
            categorydata = [];
            $(this).addClass("active");
            anlys_category = $(this).attr("category");
            category_icon = "star";
            analysis(anlys_category);
        }
        else {
            anlys_category = "";
            categorydata = [];
            createGeojson();
        }
    });

    $("#searchrange").change(function(){
        $("#service-map").next(".map-loader").show(0);
        currentRadius = $(this).val();
        currentRadius = parseFloat(currentRadius);
        if(anlys_category != "")
        {
            createGeojson();
        }
    });

});

function initialize()
{
    categorydata    = [];

    anlys_category  = "";

    $(".analys_category").removeClass("active");

    category_icon = "star";
    $('#service-map path').remove();
    $('#service-map .leaflet-marker-pane *').not(':first').remove();
}


function createanalysCategory()
{


    L.mapbox.accessToken = AccessToken;

    analysmap = L.mapbox.map('service-map', 'mapbox.streets', {
        maxZoom:18,
        dragging:true,
    }).setView([longitude, latitude], 14);


    cssIcon = L.divIcon({
        className: 'marker-home',
        iconSize: [36, 36]
    });

    usermarker = L.marker([longitude, latitude], {
        icon: cssIcon,
        draggable: false,
        zIndexOffset:999
    }).addTo(analysmap);


    setTimeout(function(){
        $("#service-map").next(".map-loader").fadeOut(1000);
    },1000);

  //  L.mapbox.styleLayer('mapbox://styles/david2681/cj250t90u000g2so39yk3952o').addTo(analysmap);

}

function analysis(category)
{
    result = "";
    categorydata = [];

    $.ajax({
        url:basepath+"/search/category",
        type:"post",
        data:{
            "_token":$('input[name="_token"]').val(),
            "category":category,
            "latitude":longitude,
            "longitude":latitude
        },
        success:function(res){
            res = jQuery.parseJSON(res);
            for(i in res)
            {
                place = res[i];

                cafe = {
                    "type":"Feature",
                    "properties":{
                        "phone":place.name,
                        "name" : place.name,
                        "street":place.location.address1,
                        "city":place.location.city,
                        "subcountry":place.location.country,
                        "country":"Spain",
                        "classname":"marker marker-circle"
                    },
                    "geometry":{
                        "type":"Point",
                        "coordinates":[place.coordinates.longitude, place.coordinates.latitude]
                    }
                };

                categorydata.push(cafe);
            }
        },
        complete:function(){
            createGeojson();
        }
    });

}

function createGeojson()
{
    var jsndata = [];

    if(categorydata.length != 0)
    {
        jsndata = jsndata.concat(categorydata);
    }

    if(jsndata.length != 0){
        jsondata.features = jsndata;
        analys(jsondata);
    }
    else
    {
        initialize();
    }


}


function analys(data) {
    fc = (data);
    updateVenues();
    $("#service-map").next(".map-loader").fadeOut(1000);
}

function updateVenues() {
    $('#service-map path').remove();

    $('#service-map .leaflet-marker-pane *').not(':first').remove();

    var position=usermarker.getLatLng();
    var point=turf.point(position.lng, position.lat);

    //draw buffer
    var bufferLayer = L.mapbox.featureLayer().addTo(analysmap);



    var buffer = pointBuffer(point, currentRadius, 'kilometers', 120);

    buffer.properties = {
        "fill": "#7530B2",
        "fill-opacity":0.5,
        "stroke": "#7530B2",
        "stroke-width": 2,
        "stroke-opacity": 0.9
    };

    bufferLayer.setGeoJSON(buffer);

    var within = turf.featurecollection(fc.features.filter(function(shop){
        if (turf.distance(shop, point, 'kilometers') <= currentRadius) return true;
    }));

    $('#milecount').html(within.features.length);


    within.features.forEach(function(feature) {
        var distance = parseFloat(turf.distance(point, feature, 'kilometers'));
        feature.properties["marker-color"] = "#6E6E6E";
        feature.properties["marker-size"] = "small";
        feature.properties["title"] = '<span>' + mileConvert(distance) + '</span><br>' + feature.properties["name"] + ', <br>' + feature.properties["street"] + ' <br>' + feature.properties["city"] + ', ' + feature.properties["subcountry"] + ' ' + feature.properties["country"] + checkPhone(feature.properties["phone"]) + '<br><strong>Click for walking route</strong>';
        feature.properties["marker-symbol"] = category_icon;

    });

    var nearest = turf.nearest(point, fc);
    var nearestdist = parseFloat(turf.distance(point, nearest, 'kilometers'));
    nearest.properties["marker-size"] = "medium";
    nearest.properties["marker-color"] = "#7530B2";

    nearest.properties["title"] = '<span>'+mileConvert(nearestdist)+' (nearest)</span><br>'+nearest.properties["name"]+', <br>'+nearest.properties["street"]+'<br>'+nearest.properties["city"]+', '+nearest.properties["subcountry"]+' '+nearest.properties["country"]+ checkPhone(nearest.properties["phone"])+'<br><strong>Click for walking route</strong>';
    nearest.properties["marker-symbol"] = category_icon;



    var nearest_fc = L.mapbox.featureLayer().setGeoJSON(turf.featurecollection([within, nearest])).addTo(analysmap);

    // hover tooltips and click to zoom/route functionality
    nearest_fc
        .on('mouseover', function(e) {
            e.layer.openPopup();
        })
        .on('mouseout', function(e) {
            e.layer.closePopup();
        })
        .on('click', function(e){

            // assemble directions URL based on position of user and selected cafe
            var startEnd= position.lng+','+position.lat+';'+e.latlng.lng+','+e.latlng.lat;
            var directionsAPI = 'https://api.tiles.mapbox.com/v4/directions/mapbox.walking/'+startEnd+'.json?access_token='+L.mapbox.accessToken;

            // query for directions and draw the path
            $.get(directionsAPI, function(data){
                var coords= data.routes[0].geometry.coordinates;
                coords.unshift([position.lng, position.lat]);
                coords.push([e.latlng.lng, e.latlng.lat]);
                var path = turf.linestring(coords, {
                    "stroke": "#7530B2",
                    "stroke-width": 4,
                    "opacity":1
                });

                $('#service-map .distance-icon').remove();
                analysmap.fitBounds(analysmap.featureLayer.setGeoJSON(path).getBounds());
                window.setTimeout(function(){$('path').css('stroke-dashoffset',0)},400);
                var duration= parseInt((data.routes[0].duration)/60);
                if (duration<100){
                    L.marker([coords[parseInt(coords.length*0.5)][1],coords[parseInt(coords.length*0.5)][0]],{
                        icon: L.divIcon({
                            className: 'distance-icon',
                            html: '<strong style="color:#7530B2">'+duration+'</strong> <span class="micro">min</span>',
                            iconSize: [45, 23]
                        })})
                        .addTo(analysmap);
                }
            })
        });
}

function pointBuffer (pt, radius, units, resolution) {
    var ring = []
    var resMultiple = 360/resolution;
    for(var i  = 0; i < resolution; i++) {
        var spoke = turf.destination(pt, radius, i*resMultiple, units);
        ring.push(spoke.geometry.coordinates);
    }
    if((ring[0][0] !== ring[ring.length-1][0]) && (ring[0][1] != ring[ring.length-1][1])) {
        ring.push([ring[0][0], ring[0][1]]);
    }
    return turf.polygon([ring])
}


function mileConvert(miles){
    if (miles<=0.25){
        return (miles*3280.84).toFixed(0)+' ft'
    } else {
        return miles.toFixed(2) +' km'
    }
}

function checkPhone(phone){
    if(phone!==null && phone!=='null'){
        return '<br>â˜Ž '+phone
    } else {
        return ''}
}
