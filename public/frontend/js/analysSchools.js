jsondata_school = {
    "type":"FeatureCollection",
    "features":""
};

var currentRadius_school   = 0.5;
var fc_school             = "";
var demodata_school        = [];
var anlys_category_school  = ""
var categorydata_school    = [];
var usermarker_school, cssIcon_school, analysmap_school = "";
category_icon_school = "star";

$(document).ready(function(){

    $(".schooltype").click(function(){
        $("#school-map").next(".map-loader").show(0);
        schooltype = $(".schooltype:checked").val();
        analysis_school(schooltype);
    });

    $("#searchrange_school").change(function(){
        $("#school-map").next(".map-loader").show(0);
        currentRadius_school = $(this).val();
        currentRadius_school = parseFloat(currentRadius_school);
        if(anlys_category_school != "")
        {
            createGeojson_school();
        }

        analysis_school(schooltype);
    });

});

function initialize_school()
{
    categorydata_school    = [];

    anlys_category_school  = "";

    category_icon_school = "star";
    $('#school-map path').remove();
    $('#school-map .leaflet-marker-pane *').not(':first').remove();
}


function createanalysSchool()
{


    L.mapbox.accessToken = AccessToken;

    analysmap_school = L.mapbox.map('school-map', 'mapbox.streets',{
        maxZoom:18,
        dragging:true,
    }).setView([longitude, latitude], 14);


    cssIcon_school = L.divIcon({
        className: 'marker-home',
        iconSize: [36, 36]
    });

    usermarker_school = L.marker([longitude, latitude], {
        icon: cssIcon_school,
        draggable: false,
        zIndexOffset:999
    }).addTo(analysmap_school);


}

function analysis_school(category)
{
    result = "";
    categorydata_school = [];

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

                categorydata_school.push(cafe);
            }
        },
        complete:function(){
            createGeojson_school();
        }
    });

}

function createGeojson_school()
{
    var jsndata = [];

    if(categorydata_school.length != 0)
    {
        jsndata = jsndata.concat(categorydata_school);
    }

    if(jsndata.length != 0){
        jsondata_school.features = jsndata;
        analys_school(jsondata_school);
    }
    else
    {
        initialize_school();
    }


}


function analys_school(data) {
    fc_school = (data);
    updateVenues_school();
    $("#school-map").next(".map-loader").fadeOut(1000);
}

function updateVenues_school() {
    $('#school-map path').remove();

    $('#school-map .leaflet-marker-pane *').not(':first').remove();

    var position=usermarker_school.getLatLng();
    var point=turf.point(position.lng, position.lat);

    //draw buffer
    var bufferLayer = L.mapbox.featureLayer().addTo(analysmap_school);



    var buffer = pointBuffer_school(point, currentRadius_school, 'kilometers', 120);

    buffer.properties = {
        "fill": "#7530B2",
        "fill-opacity":0.5,
        "stroke": "#7530B2",
        "stroke-width": 2,
        "stroke-opacity": 0.9
    };

    bufferLayer.setGeoJSON(buffer);

    var within = turf.featurecollection(fc_school.features.filter(function(shop){
        if (turf.distance(shop, point, 'kilometers') <= currentRadius_school) return true;
    }));

    $('#milecount').html(within.features.length);


    within.features.forEach(function(feature) {
        var distance = parseFloat(turf.distance(point, feature, 'kilometers'));
        feature.properties["marker-color"] = "#6E6E6E";
        feature.properties["marker-size"] = "small";
        feature.properties["title"] = '<span>' + mileConvert_school(distance) + '</span><br>' + feature.properties["name"] + ', <br>' + feature.properties["street"] + ' <br>' + feature.properties["city"] + ', ' + feature.properties["subcountry"] + ' ' + feature.properties["country"] + checkPhone_school(feature.properties["phone"]) + '<br><strong>Click for walking route</strong>';
        feature.properties["marker-symbol"] = category_icon_school;

    });

    var nearest = turf.nearest(point, fc_school);
    var nearestdist = parseFloat(turf.distance(point, nearest, 'kilometers'));
    nearest.properties["marker-size"] = "medium";
    nearest.properties["marker-color"] = "#7530B2";

    nearest.properties["title"] = '<span>'+mileConvert_school(nearestdist)+' (nearest)</span><br>'+nearest.properties["name"]+', <br>'+nearest.properties["street"]+'<br>'+nearest.properties["city"]+', '+nearest.properties["subcountry"]+' '+nearest.properties["country"]+ checkPhone_school(nearest.properties["phone"])+'<br><strong>Click for walking route</strong>';
    nearest.properties["marker-symbol"] = category_icon_school;



    var nearest_fc = L.mapbox.featureLayer().setGeoJSON(turf.featurecollection([within, nearest])).addTo(analysmap_school);

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

                $('#school-map .distance-icon').remove();
                analysmap_school.fitBounds(analysmap_school.featureLayer.setGeoJSON(path).getBounds());
                window.setTimeout(function(){$('path').css('stroke-dashoffset',0)},400);
                var duration= parseInt((data.routes[0].duration)/60);
                if (duration<100){
                    L.marker([coords[parseInt(coords.length*0.5)][1],coords[parseInt(coords.length*0.5)][0]],{
                        icon: L.divIcon({
                            className: 'distance-icon',
                            html: '<strong style="color:#7530B2">'+duration+'</strong> <span class="micro">min</span>',
                            iconSize: [45, 23]
                        })})
                        .addTo(analysmap_school);
                }
            })
        });


}

function pointBuffer_school(pt, radius, units, resolution) {
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


function mileConvert_school(miles){
    if (miles<=0.25){
        return (miles*3280.84).toFixed(0)+' ft'
    } else {
        return miles.toFixed(2) +' km'
    }
}

function checkPhone_school(phone){
    if(phone!==null && phone!=='null'){
        return '<br>â˜Ž '+phone
    } else {
        return ''}
}
