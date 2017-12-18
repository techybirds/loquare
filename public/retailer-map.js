
var lat = 41.32651488;
var lng = 2.049775145;
var page = 1; nxt = 4, prv = 0;
var flagslide = false;
var features = "";
var property_type = [];
var rooms=[];

var clusters = {
    "type": "FeatureCollection",
    "crs": { "type": "name", "properties": { "name": "urn:ogc:def:crs:OGC:1.3:CRS84" } },
    "features" : []
};
var clusterflag = true;

var Searchquery = {
    "search" : "BARCELONA",
    "zipcode" : "",
    "provincia" : "Barcelona",
    "page" : page,
    "_token": $("input[name='_token']").val(),
    "type"  : "",
    "min_price" : "",
    "max_price" : "",
    "rooms"     : rooms,
    "bathrooms" : [],
    "searchin"  : "area",
    "property_type" : property_type,
    "features"  : features,
    "min_size"	: "",
    "max_size"	: "",
    "sort_by"	: $("#sort_filter").val()
};
var map = "";
var usermarker = "";

$(document).ready(function(){

    mapboxgl.accessToken = AccessToken;
    create_map();

    $("#filteredResults").html($(".loader-container").html());
    common_functions();

});

function create_map()
{
    map = new mapboxgl.Map({
        container: 'retailer_map',
        center: [lng,lat],
        zoom: 11,
        style: 'mapbox://styles/david2681/cj251ctkr000w2roux5glfig1',
        trackResize:true
    });


    map.on("load", function(){
        map.addControl(new mapboxgl.FullscreenControl());

        $(".mapboxgl-ctrl-fullscreen").click(function(){
            map.resize();
        });

        FilterProperties();
    });

}

function init()
{
    $("#pages").html("");
    $("#results").text("Searching ...");
    page = 1; nxt = 4, prv = 0;
    Searchquery.property_type=[];
    Searchquery.rooms=[];
    Searchquery.features = [];
}

function createSearchQuery()
{
    Searchquery.search      = $("#mapbox_search").val();
    Searchquery.sort_by		= $("#sort_filter").val();
    Searchquery.min_price   = $("#minprice").val();
    Searchquery.max_price   = $("#maxprice").val();
    Searchquery.min_size    = $("#minsize").val();
    Searchquery.max_size    = $("#maxsize").val();
    Searchquery.page        = $("#pages a.active").text();
    Searchquery.type        = $(".filter_for.active").data('type');
    Searchquery.searchin    = (Searchquery.search != "")?Searchquery.searchin:"listing";

    if(Searchquery.page=='' || Searchquery.page==undefined){
        Searchquery.page=1;
    }

    $(".property_type_filter").each(function(){
        if($(this).prop('checked'))
        {
            Searchquery.property_type.push($(this).val());
        }
    });

    $(".room_filter").each(function(){
        if($(this).prop('checked'))
        {
            Searchquery.rooms.push($(this).val());
        }
    });

    $(".features").each(function(){
        if($(this).prop('checked'))
        {
            Searchquery.features.push($(this).val());
        }
    });
}

function FilterProperties()
{
    createSearchQuery();
    $("#filteredResults").html($(".loader-container").html());
    $("#pages").html("");

    $.post(basepath + "/retailer/properties", Searchquery, function (response, status, xhr) {
        prop = jQuery.parseJSON(response);
        showResult(prop);
    });
}

var geojson = {
    type: 'FeatureCollection',
    features: []
};
var property_markers = [];

function showResult(prop)
{
    clusters.features   = [];
    property_markers    = [];

    if (prop != false) {

        $("#results").text(prop.total.length+" Properties found");

        var props = prop.details;

        $("#filteredResults").html("");

        for (i in props) {
            showProperties(props[i]);
        }

        $('.open_colleciton_popup').magnificPopup({
            type:'inline',
            midClick: true
        });

        if ($('.card__slider').length < 1){
            return false;
        }else{
            $('.card__slider').each(function() {
                $(this).slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    slide: '.card__slider-img'
                })
            });
        }

        var props = prop.total;


        for (i in props) {

            marker2 = {
                "type": "Feature",
                "properties": props[i],
                "geometry": {
                    "type": "Point",
                    "coordinates": [props[i].latitude, props[i].longitude]
                }
            };

            property_markers.push([props[i].latitude, props[i].longitude]);

            clusters.features.push(marker2);
        }

        if(clusterflag)
        {
            create_cluster();
            clusterflag = false;
        }
        else {
            map.getSource("properties").setData(clusters);
        }

        var bounds = property_markers.reduce(function(bounds, coord) {
            return bounds.extend(coord);
        }, new mapboxgl.LngLatBounds(property_markers[0], property_markers[0]));


        map.fitBounds(bounds, {
            padding: 20
        });


    }
    else {
        $("#filteredResults").html("<h4 style='text-align: center;width: 100%;'>No Result Found</h4>");
        $("#results").text('');
    }

    CreatePagination();
}


function create_cluster()
{
    map.addSource("properties", {
        type: "geojson",
        data: clusters,
        cluster: true,
        clusterMaxZoom: 14, // Max zoom to cluster points on
        clusterRadius: 50 // Radius of each cluster when clustering points (defaults to 50)
    });


    map.addLayer({
        id: "clusters",
        type: "circle",
        source: "properties",
        filter: ["has", "point_count"],
        paint: {
            "circle-color": {
                property: "point_count",
                type: "interval",
                stops: [
                    [0, "#7530B2"],
                    [30, "#00AB8A"],
                    [50, "#FF9700"],
                    [150, "#EC644B"],
                    [300, "#FFED21"],
                ]
            },
            "circle-radius": {
                property: "point_count",
                type: "interval",
                stops: [
                    [0, 20],
                    [30, 30],
                    [50, 40],
                    [150, 50],
                    [300, 60]
                ]
            }
        }
    });

    map.addLayer({
        id: "cluster-count",
        type: "symbol",
        source: "properties",
        filter: ["has", "point_count"],
        layout: {
            "text-field": "{point_count_abbreviated}",
            "text-font": ["DIN Offc Pro Medium", "Arial Unicode MS Bold"],
            "text-size": 12
        }
    });





    map.addLayer({
        "id": "unclustered-points",
        "type": "symbol",
        "source": "properties",
        "filter": ["!has", "point_count"],
        "layout": {
            "icon-image": "place-tag",
            "icon-size" : 1,
        }
    });

    var popup = new mapboxgl.Popup({
        closeButton: false,
        closeOnClick: false
    });


    bounds = [clusters.features[0].geometry.coordinates,clusters.features[clusters.features.length - 1].geometry.coordinates];
    map.fitBounds(bounds,{top: 10, bottom:10, left: 10, right: 10});


    map.on('mousemove', function (e) {
        var features = map.queryRenderedFeatures(e.point, { layers: ['unclustered-points'] });


        map.getCanvas().style.cursor = (features.length) ? 'pointer' : '';

        if (!features.length) {
            popup.remove();
            return;
        }

        var feature = features[0];
        popup.setLngLat(feature.geometry.coordinates).setHTML(FetchInfo(feature.properties)).addTo(map);

    });

    setTimeout(function(){  $(".page_loader").fadeOut(500); }, 1000);

}



function FetchInfo(property)
{
    var block = '<div class="col-xs-12 apartinfo">';
    block += '<div class="results">';
    block += '<div class="property_image">';
    block +=  '<div class="prop_img info-img">';
    propertyImg = basepath+'/storage/Property/'+property.id+'/thumbs/'+images[0].filename;
    block += '<img src="'+propertyImg+'">';
    block += '</div>';
    block += '<div class="property_details">';
    block += '<div class="pdetail">';
    block += '<a href="'+basepath+'/rent/property/'+property.id+'" class="property_name pull-left">'+property.direccion+'</a>';
    block += '<div class="clearfix"></div>';
    block += '<span class="address">'+property.comunidad_autonoma+','+property.provincia+'</span>';
    block += '<ul class="services">';
    block += '<li>'+property.rooms+' <img src="'+basepath+'/public/frontend/assets/icons/room.png" /></li>';
    block += '<li>'+property.bathrooms+' <img src="'+basepath+'/public/frontend/assets/icons/bath.png" /></li>';
    block += '</ul>';
    block += '</div>';
    block +=  '<div class="pprice">';
    block += '<span class="amount pull-right">€ '+property.price+'</span>';
    block += '</div>';
    block += '</div>';

    block += '</div>';
    block += '</div>';
    block += '</div>';

    return block;
}


function showProperties(property)
{
    var block = '';

    block += '<div class="grid__item">';
    block += '<div class="card">';
    block += '<a href="'+basepath+'/rent/property/'+property.id+'" class="card__link"></a>';
    block += '<a href="#save-to-collection" class="open_colleciton_popup"><button type="button" class="card__save save_to_collection" data-id="'+property.id+'">Save</button></a>';
    block += '<div class="card__top">';
    block += '<div class="card__slider">';
    images = property.images;

    for(i in images) {
        propertyImg = basepath+'/storage/Property/'+property.id+'/thumbs/'+images[i].filename;
        block += '<div class="card__slider-img lazyload" data-sizes="auto" data-bgset="'+propertyImg+' 1x, '+propertyImg+' 2x"></div>';
    }

    block += '</div>'
    block += '</div>';
    block += '<div class="card__bottom">';
    block += '<div class="card__title">'+property.direccion+'</div>';
    block += '<div class="card__footer">';
    block += '<div class="card__desc">'+property.sizem2+' m<sup>2</sup></div>';
    block += '<div class="card__price">&euro;'+property.price+((property.property_deal == "RENT"?'/mo':''))+'</div>';
    block += '</div>';
    block += '</div>';
    block += '</div>';
    block += '</div>';

    $("#filteredResults").append(block);

}



function CreatePagination()
{
    var totalsrecords = parseInt($("#results").text());

    pages = totalsrecords / 10;

    if((totalsrecords % 10) > 0)
    {
        pages += 1;
    }
    pages = parseInt(pages);

    lists = '<li><a href="javascript:void(0)" class="previous_page"><i class="fa fa-chevron-left"></i></a></li>';

    for(i = 1;i <= pages;i++ )
    {
        var activePage = "";
        if(i == page){ activePage = "active"; }
        lists += '<li class="pagenum"><a href="javascript:void(0)" id="page'+i+'" class="pages '+activePage+'">'+i+'</a></li>';
    }

    lists += ' <li><a href="javascript:void(0)" class="next_page"><i class="fa fa-chevron-right"></i></a></li>';
    $("#pages").html(lists);

    $( "#pages li.pagenum:lt("+prv+")" ).css( "display", "none" );
    $( "#pages li.pagenum:gt("+nxt+")" ).css( "display", "none" );


    $("#pages a:not('.active')").click(function(){

        $('html,body').animate({scrollTop: 0},0);

        if($(this).hasClass("previous_page") && page > 1)
        {
            page = page - 1;
            $("#pages a").removeClass("active");
            $("#page"+page).addClass("active");

            blk = parseInt(page / 5);
            if(Number.isInteger((page) / 5)) {
                nxt = (blk * 5) - 1;
                prv = (blk * 5) - 5;
            }

            FilterProperties();
        }
        else if($(this).hasClass("next_page") && page != pages)
        {
            page = page + 1;

            $("#pages a").removeClass("active");
            $("#page"+page).addClass("active");

            blk = parseInt(page / 5)+1;
            if(!Number.isInteger((page) / 5)) {
                nxt = (blk * 5) - 1;
                prv = (blk * 5) - 5;
            }

            FilterProperties();
        }
        else if($(this).hasClass("pages")){
            $("#pages a").removeClass("active");
            $(this).addClass("active");
            page = parseInt($(this).text());

            FilterProperties();
        }
        else{  }

    });

    $('#dashmenu_container').animate({
        scrollTop: 0
    }, 1000);
}

function searchin()
{
    $("#searchresults").addClass("hidden");
    $.ajax({
        "url":basepath+"/searchin",
        "type":"post",
        "data":{
            "search":$("#mapbox_search").val(),
            "_token":$("input[name='_token']").val()
        },
        "success":function(res){
            res = jQuery.parseJSON(res);
            if(res.status = 200)
            {
                Searchquery.searchin = res.searchin;
            }
            else {
                Searchquery.searchin = "listing";
            }
        },
        complete:function(){
            init();
            FilterProperties();
        }
    });
}

function common_functions()
{
    setpricerange();
    $("#minprice, #minsize, #maxprice, #maxsize").change(function(){ init(); FilterProperties(); });

    $(".property_type_filter").change(function () {
        init();
        FilterProperties();
    });

    $(".room_filter").click(function(){
        init();
        FilterProperties();
    });
    $("#sort_filter").change(function(){
        init();
        FilterProperties();
    });

    $(".features").click(function(){
        init();
        FilterProperties();
    });

    $("#find_address").click(function(){
        searchin();
    });



    $(".filter_for").click(function(e){
        e.preventDefault();
        $(".filter_for").removeClass("active");
        $(this).addClass("active");
        setpricerange();
        init();
        FilterProperties();
    });

}

function setpricerange()
{
    $propertyfor = $(".filter_for.active").data("type");

    $("#minprice").html('<option value="">- min -</option>');
    $("#maxprice").html('<option value="">- max -</option>');

    var gap = 500;
    var initprice = 500;
    $prices = [];
    while(initprice <= 4000000)
    {
        $prices.push(initprice);
        initprice = initprice+gap;
        if(initprice >= 1000){ gap = 1000; }
        if(initprice >= 5000){ gap = 45000; }
        if(initprice >= 50000){ gap = 25000; }
        if(initprice >= 500000){ gap = 50000; }
        if(initprice >= 1000000){ gap = 100000; }
        if(initprice >= 2000000){ gap = 250000; }
        if(initprice >= 3000000){ gap = 500000; }
    }

    if($propertyfor == "RENT")
    {
        $prices = [500,1000,2000,3000,4000,5000];
    }
    if($propertyfor == "SALE") {
        var gap = 5000;
        var initprice = 50000;
        $prices = [];
        while(initprice <= 4000000)
        {
            $prices.push(initprice);
            initprice = initprice+gap;
            if(initprice >= 50000){ gap = 25000; }
            if(initprice >= 500000){ gap = 50000; }
            if(initprice >= 1000000){ gap = 100000; }
            if(initprice >= 2000000){ gap = 250000; }
            if(initprice >= 3000000){ gap = 500000; }
        }
    }

    for(i in $prices)
    {
        selectedprice = (parseInt(Searchquery.min_price) == $prices[i])?"selected":"";

        $("#minprice").append('<option '+selectedprice+' value="'+$prices[i]+'">&euro;'+$prices[i]+'</option>');
        selectedprice = (parseInt(Searchquery.max_price) == $prices[i])?"selected":"";
        $("#maxprice").append('<option '+selectedprice+' value="'+$prices[i]+'">&euro;'+$prices[i]+'</option>');
    }
}
