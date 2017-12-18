var direccion           = $("#direccion").val();
var provincia           = $("#provincia").val();
var rooms               = $("#rooms").val();
var bathrooms           = $("#bathrooms").val();
var price               = $("#price").val();
var comunidad_autonoma  = $("#comunidad_autonoma").val();
var cops                = $("#cops").val();
var routedirection      = "default";
var agerange            = 100;
var economy             = [];
var markers             = [];
var latitude            = $("#latitude").val();
var longitude           = $("#longitude").val();
var panorama            = "";
var panoramacenter      = "";
var schools = [];
var directions = "";
var demograph = {
    "type": "FeatureCollection",
    "features" : []
};

var buildmap , infosectionMap = servicemap = buildmap = imagemap = schoolmap = "";
var googleapi_key = "AIzaSyDE2E4qimzWXo8pO22QWl7mtu4Vk6rq5ag";
var schooltype = $(".schooltype:checked").val();

var categorylogdata = {
    "category"      : "",
    "logtype"       : "",
    "categoryflag"  : "",
    "logmessage"    : "",
    "property_id"   : $("#property_id").val(),
    "property_from" : "retailer",
    "_token"        : $("input[name='_token']").val()
};


$(document).ready(function(){


    mapboxgl.accessToken = AccessToken;
    L.mapbox.accessToken = AccessToken;
    geocoder =  L.mapbox.geocoder('mapbox.places', { country:"Barcelona" });


    infosectionMap = new mapboxgl.Map({
        container: 'transportation-map',
        center: [latitude,longitude],
        zoom: 13,
        style: 'mapbox://styles/david2681/cj251ctkr000w2roux5glfig1'
    });

    infosectionMap.addControl(new mapboxgl.NavigationControl());
    infosectionMap.scrollZoom.disable();
    infosectionMap.dragRotate.disable();

    infosectionMap.on("load", function(){

        propertyMarker(infosectionMap, "transport-home");
        get_transport();

        routepath = {
            "type": "geojson",
            "data": {
                "type": "Feature",
                "properties": {},
                "geometry": {
                    "type": "LineString",
                    "coordinates": [
                        [latitude,longitude]
                    ]
                }
            }
        };

        infosectionMap.addSource('route', routepath);

        infosectionMap.addLayer({
            "id": "route",
            "type": "line",
            "source": "route",
            "layout": {
                "line-join": "round",
                "line-cap": "round"
            },
            "paint": {
                "line-color": "#7530B2",
                "line-width":6
            }
        });

        $("#transport-change").removeAttr("disabled");

        $("#transport-change").click(function(){
            routedirection = (routedirection == "default")?"backward":"default";

            routeorigin = $("#start").val();
            routedestingation = $("#end").val();

            $("#start").val(routedestingation);
            $("#end").val(routeorigin);

            route_direction();
        });

        $("#get_stop").change(function(){
            get_transport();
        });

    });

    allcategories();
    basic_function();
    loadScript();

});

function loadScript() {
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = "https://maps.googleapis.com/maps/api/js?key=" + googleapi_key + "&callback=googlemapfunction";
    document.body.appendChild(script);
}

function googlemapfunction()
{
    panoramacenter =  new google.maps.LatLng(longitude,latitude);

    panorama = new google.maps.Map(document.getElementById('street-map'),
        {
            position: panoramacenter,
            pov: {heading: 165, pitch: 0},
            zoom: 1
        });

    panorama.setCenter(panoramacenter);

    panorama = new google.maps.StreetViewPanorama(
        document.getElementById('street-map'),
        {
            position: panoramacenter,
            pov: {heading: 165, pitch: 0},
            zoom: 1
        });
}

function propertyMarker(markermap, markerid)
{
    markermap.setCenter([latitude, longitude]);

    var el = document.createElement('div');
    el.className = "marker-home";
    el.id = markerid;
    marker3 = new mapboxgl.Marker(el).setLngLat([latitude, longitude]);
    marker3.addTo(markermap);
}

var stopsobj = [];
var transmarkers = [];
function get_transport()
{
    $("ol.transport__list").html("");
    stopsobj = [];

    if(transmarkers.length != 0)
    {
        for(i in transmarkers)
        {
            transmarkers[i].remove();
        }
        transmarkers = [];
    }

    stoptype = $("#get_stop").val();
    stopnames = $("#get_stop option:selected").data("category");

    $.ajax({
        url: "https://api.foursquare.com/v2/venues/explore",
        type: "get",
        data: {
            ll : longitude+","+latitude,
            query : stopnames,
            limit : 10,
            categoryId: stoptype,
            oauth_token:"CEMNVOMCDY55QMLPRWP30UTDAQ2YUBWZH4NQ4KM0BNQKD431",
            v:"20171011"
        },
        success: function (res) {

            foundstops = res.response.totalResults;

            if(foundstops > 0)
            {
                busstops = res.response.groups[0].items;

                for(i in busstops)
                {
                    stopsobj.push({
                        "id":busstops[i].venue.id,
                        "name" : busstops[i].venue.name,
                        "location" : (busstops[i].venue.location.hasOwnProperty("address")?busstops[i].venue.location.address+', ':''),
                        "distance" : busstops[i].venue.location.distance,
                        "lat":busstops[i].venue.location.lat,
                        "lng":busstops[i].venue.location.lng,
                        "data":busstops[i].venue
                    });

                    var place = busstops[i].venue;

                    var el = document.createElement('div');
                    el.className = "marker-violate marker-transport";
                    el.id = place.id;
                    stopmarker = new mapboxgl.Marker(el).setLngLat([place.location.lng, place.location.lat]);

                    var block = '<div class="col-xs-12 plaseinfo">';
                    block += '<div class="results">';
                    block += '<div class="place_details">';
                    block += '<div class="placename">';
                    block += '<a href="javascript:void(0)" class="property_name">'+place.name+'</a>';
                    block += '<div class="clearfix"></div>';
                    if(place.location.hasOwnProperty('address'))
                    { block += '<span class="address">'+place.location.address+','+place.location.city+'</span>'; }
                    block += '</div>';
                    block +=  '<div class="placemeta">';
                    block += '<span class="amount">'+((place.location.distance.toFixed(2)))+' (Meter)</span>';
                    block += '</div>';
                    block += '</div>';
                    block += '</div>';
                    block += '</div>';
                    block += '</div>';


                    var popup = new mapboxgl.Popup().setHTML(block);
                    stopmarker.setPopup(popup);

                    transmarkers.push(stopmarker);

                    stopmarker.addTo(infosectionMap);



                }
            }
        },
        complete:function(){
            showtransport();

            $("li.transport__num").click(function(){
                $("#transportation-map").next(".map-loader").show(0);
                $("li.transport__num").removeClass("active");
                $(this).addClass("active");
                route_direction();
            });

            $("#stop_0").trigger("click");
        }
    });

}

function route_direction()
{
    var routefor =  $("li.transport__num.active");
    var busstop = routefor.attr("route");
    origin = [latitude,longitude];
    destination = [stopsobj[busstop].lng,stopsobj[busstop].lat];

    if(routedirection == "default")
    { $("#end").val(stopsobj[busstop].name); }
    else
    { $("#start").val(stopsobj[busstop].name); }

    get_direction_stop(origin, destination,routefor);
}

function showtransport()
{

    for(i in stopsobj)
    {
        var routedetail = '<li class="transport__num" route="'+i+'" id="stop_'+i+'" data-transport="'+stopsobj[i].id+'">'+
                '<div class="transport__accord">'+
                '<div class="transport__head">'+
                '<div class="transport__name">'+stopsobj[i].name+' ('+stopsobj[i].distance+' Meter)</div>'+
                '</div>'+
                '<div class="transport__info"></div>'+
                '</div>'+
                '</li>';
        $("ol.transport__list").append(routedetail);
    }

}

function allcategories()
{
    $(".search_category").each(function(){
        markers[$(this).attr('category')] = [];
    });
}


function search_category(term)
{
    $.ajax({
        url:basepath+"/search/category",
        type:"post",
        data:{
            "_token":$('input[name="_token"]').val(),
            "category":term,
            "latitude":longitude,
            "longitude":latitude
        },
        success:function(res){
            res = jQuery.parseJSON(res);
            for(i in res)
            {
                place = res[i];
                categoryMark(place, term);
            }
        }
    });
}


function categoryMark(data, category)
{

    var el = document.createElement('div');
    el.className = "marker marker-"+category.split(" ").join("_").toLowerCase();
    marker = new mapboxgl.Marker(el).setLngLat([data.coordinates.longitude, data.coordinates.latitude]);

    info = placeinfo(data);
    var popup = new mapboxgl.Popup().setHTML(info);
    marker.setPopup(popup);
    markers[category].push(marker);

    marker.addTo(servicemap);

}

function placeinfo(place)
{
    var block = '<div class="col-xs-12 plaseinfo">';
    block += '<div class="results">';
    block += '<div class="place_details">';
    block += '<div class="placename">';
    block += '<a href="javascript:void(0)" class="property_name">'+place.name+'</a>';
    block += '<div class="clearfix"></div>';
    if(place.location.hasOwnProperty('address1'))
    { block += '<span class="address">'+place.location.address1+','+place.location.city+'</span>'; }
    block += '</div>';
    block +=  '<div class="placemeta">';
    block += '<span class="amount">'+((place.distance.toFixed(2)))+' (Meter)</span>';
    block += '</div>';
    block += '</div>';

    block += '</div>';
    block += '</div>';
    block += '</div>';

    return block;
}

function removeCategory(category)
{
    marks = markers[category];

    for(i in marks)
    {
        marks[i].remove();
    }
}

function basic_function()
{
    $('button[data-target="#target5"]').click(function(){
        if($("#service-map").html().trim() == "")
        {
            setTimeout(function(){
                createanalysCategory();
            },1000);
        }
    });

    $('button[data-target="#target4"]').click(function(){
        if($("#school-map").html().trim() == "")
        {
            setTimeout(function(){
                createanalysSchool();
                analysis_school(schooltype);
            },1000);
        }
    });


    $('button[data-target="#target6"]').click(function(){
        if($("#satelite-map").html().trim() == "")
        {
            setTimeout(function(){
                imagemap = new mapboxgl.Map({
                    container: 'satelite-map',
                    center: [latitude,longitude],
                    zoom: 14,
                    style: 'mapbox://styles/mapbox/satellite-streets-v9'
                });

                imagemap.addControl(new mapboxgl.NavigationControl());
                imagemap.scrollZoom.disable();
                propertyMarker(imagemap, "imagemap-home");

            },1000);
        }
    });

    $('button[data-target="#target7"]').click(function(){
        if($("#buildings").html().trim() == "")
        {
            setTimeout(function(){
                buildmap = new mapboxgl.Map({
                    container: 'buildings',
                    center: [latitude, longitude], // starting position
                    zoom: 16, // starting zoom
                    style: 'mapbox://styles/mapbox/light-v9',
                    pitch: 45,
                    bearing: -17.6,
                });

                buildmap.addControl(new mapboxgl.NavigationControl());
                buildmap.scrollZoom.disable();

                viewbuildings();
                propertyMarker(buildmap, "building-home");
            },1000);

        }
    });

    mapposition = $("#service_tab").position();

    $(window).scroll(function() {
        mapheight = $(".infosection").height();
        if($(window).scrollTop() >= (mapposition.top-30) && ($(window).scrollTop() <= (mapposition.top+mapheight)))
        {
            $(".infosection__tabs-fixed").fadeIn(500);
        }
        else {
            $(".infosection__tabs-fixed").fadeOut(0);
        }
    });
}

function viewbuildings()
{
    buildmap.on('load', function() {
        buildmap.addLayer({
            'id': '3d-buildings',
            'source': 'composite',
            'source-layer': 'building',
            'filter': ['==', 'extrude', 'true'],
            'type': 'fill-extrusion',
            'minzoom': 2,
            'paint': {
                'fill-extrusion-color': '#7530B2',
                'fill-extrusion-height': {
                    'type': 'identity',
                    'property': 'height'
                },
                'fill-extrusion-base': {
                    'type': 'identity',
                    'property': 'min_height'
                },
                'fill-extrusion-opacity': .6
            }
        });
    });
}


function get_direction_stop(originpoint,destinationpoint,routefor)
{

    homemarker = $("#transport-home");
    stopmarker = $(".transport__num.active").data("transport");
    $(".marker-transport").removeClass("marker-home marker-violate").addClass("marker-violate");

    if(routedirection == "default")
    {
        origin = originpoint.toString();
        destination = destinationpoint.toString();

        homemarker.removeClass("marker-violate").addClass("marker-home");
    }
    else {

        homemarker.removeClass("marker-home").addClass("marker-violate");
        $("#"+stopmarker).removeClass("marker-violate").addClass("marker-home");

        origin = destinationpoint.toString();
        destination = originpoint.toString();
    }


    var pathroute = "";

    $.ajax({
        url:"https://api.mapbox.com/directions/v5/mapbox/walking/"+origin+";"+destination+".json",
        type:"get",
        data:{
            "access_token":AccessToken,
            "steps":true,
            "geometries":"geojson"
        },
        success:function(res){
            pathroute = res.routes[0];
        },
        complete:function(){
            infosectionMap.getSource('route').setData(pathroute.geometry);

            $("#transportation-map").next(".map-loader").fadeOut(1000);

            routesteps = pathroute.legs[0].steps;
            var instruction = "";
            for(i in routesteps)
            {
                var step = routesteps[i];

                dist_time = step.maneuver.instruction+" "+step.distance+' Meter '+Math.round(parseFloat(step.duration)/60)+' mins';

                if(step.maneuver.type != "arrive")
                {
                    instruction += '<div class="transport__line">'+
                        '<span class="transport__icons">'+
                        '<img src="https://maps.gstatic.com/mapfiles/transit/iw2/6/walk.png" class="transport__image">'+
                        '</span> '+dist_time+
                        '</div>';
                }
            }

            $(".transport__info",  routefor).html(instruction);

        }
    });
}