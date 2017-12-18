var geocoderplace = "";
var postfiles = [];

$(document).ready(function(){

    complete_deal();
    complete_property();
    complete_document();
    complete_contact();

    sale_or_rent();


    $('.delete_energy_popup').magnificPopup({
        type: 'inline',
        midClick: true
    });


    $('.delete_owner_popup').magnificPopup({
        type: 'inline',
        midClick: true
    });

    $('.delete_image_popup').magnificPopup({
        type: 'inline',
        midClick: true
    });


    $("input[name='property_deal']").click(function(){
        sale_or_rent();
    });

    $(".add_location").click(function(){
        $(".popup_map").removeClass("hidden");
        location_map();
    });

    $(".close_map").click(function(){
        $(".popup_map").addClass("hidden");
    });

    $(".add-property__submit").click(function(){

        $(".fild-error").html("").fadeOut(0);
        isvalid = validate_form();


        if(!isvalid)
        {
            return false;
        }
        else {

            $(this).html("Processing ...").attr("disabled", "disabled");
            $(".add_property_loader").show(0);

            $('html, body').animate({
                scrollTop: 0
            }, 0);

            addform = document.getElementById("add_property_form");
            properyform = new FormData(addform);

            jQuery.removeData(properyform, "property_image[]");
            jQuery.removeData(properyform, "property_image");
            //properyform.delete('property_image[]');
            //properyform.delete('property_image');

            for(i in postfiles)
            {
                properyform.append("property_image[]", postfiles[i]);
            }

            $.ajax({
                url: $("#add_property_form").attr("action"),
                type: 'POST',
                data: properyform,
                success: function (res) {
                    res = $.parseJSON(res);

                    if(res.status == 200)
                    {
                        $("#add_property_form")[0].reset();
                    }
                    $(".add_property_loader").hide(0);
                    display_alert(res.status, res.message, true);
                },
                complete:function(){
                    $(this).html("publish listing").removeAttr("disabled");
                },
                cache: false,
                contentType: false,
                processData: false
            });

            return true;
        }
    });

    $("#about").click(function() {
        $('html, body').animate({
            scrollTop: $("#slideToabout").offset().top
        }, 500);
    });
    $('#property').click(function(){
        $('html, body').animate({
            scrollTop: $("#slideToproperty").offset().top
        }, 500);

    });
    $('#document').click(function(){
        $('html, body').animate({
            scrollTop: $("#slideTodocument").offset().top
        }, 500);
    });
    $('#contact').click(function(){
        $('html, body').animate({
            scrollTop: $("#slideTocontact").offset().top
        }, 500);
    });
    $('#publish').click(function(){
        $('html, body').animate({
            scrollTop: $("#slideTopublish").offset().top
        }, 500);
    });
    slideAformsection();
});

function sale_or_rent()
{
    var property_deal=$("input[name='property_deal']:checked").val();
    if(property_deal == 'RENT')
    {
        $('.add-property__only-rent').show();
        $('.add-property__only-sale').hide();
    }
    if(property_deal == 'SALE')
    {
        $('.add-property__only-rent').hide();
        $('.add-property__only-sale').show();
    }
}


function location_map()
{
    mapboxgl.accessToken = AccessToken;

         var latitude_value;
         var longtitude_value;
        if($("#longitude").val() =='' && $("#latitude").val() == '')
        {
                latitude_value='2.1750672821604837';
                longtitude_value='41.37663229212538';
            
        }else{
                latitude_value=$("#latitude").val();
                longtitude_value=$("#longitude").val();
        }
         
    if($("#property_location").html() == "")
    {
          map = new mapboxgl.Map({
            container: 'property_location',
            center: [latitude_value, longtitude_value],
            zoom: 14,
            style: 'mapbox://styles/mapbox/satellite-streets-v9',
            trackResize:true
        });


        map.on("load", function(){
            var el = document.createElement('div');
            el.className = 'marker-home';
            marker = new mapboxgl.Marker(el).setLngLat([latitude_value, longtitude_value]);
            marker.addTo(map);

            geocoderplace = new MapboxGeocoder({ accessToken: mapboxgl.accessToken });
            map.addControl(geocoderplace, "top-left");

            geocoderplace.on("result", function(ev){
                console.log(ev);
                marker.setLngLat(ev.result.geometry.coordinates);

                $("#cops").val(ev.result.context[0].text);
                $("#localidad").val(ev.result.context[1].text);
                $("#provincia").val(ev.result.context[2].text);

                $("#direccion").val(ev.result.text+" "+ev.result.address);
                map.flyTo({ center: ev.result.geometry.coordinates });

                $("#longitude").val(ev.result.geometry.coordinates[0]);
                $("#latitude").val(ev.result.geometry.coordinates[1]);
            });

            map.addControl(new mapboxgl.NavigationControl(), 'top-left');

            $("#how_to_add").removeClass("hidden");
        });


        map.on('click', function (e) {
           
            $("#longitude").val(e.lngLat.lat);
            $("#latitude").val(e.lngLat.lng);
            marker.setLngLat([e.lngLat.lng, e.lngLat.lat]);

            $.ajax({
                "url" : 'https://api.mapbox.com/geocoding/v5/mapbox.places/'+e.lngLat.lng+','+e.lngLat.lat+'.json',
                "type":"GET",
                "data":{ "access_token":AccessToken },
                success:function(res){
                    console.log(res);
                    res = res.features[0];
               
                    $("#cops").val(res.context[0].text);
                    $("#localidad").val(res.context[1].text);
                    $("#provincia").val(res.context[2].text);
                    $("#direccion").val(res.text);
                    $(".popup_map").addClass("hidden");
                    $("#longitude").attr("value",e.lngLat.lat);
                    $("#latitude").attr("value",e.lngLat.lng);
                    
                        
                }
            });

        });

    }

}

function validate_form() {
    isvalid = false;

    // property type validations
    $("input[name='property_for']:checked").each(function () {
        isvalid = true;
    });

    if (!isvalid)
    {
        $(".property_for-error").html("Please Select an option").fadeIn(200);
        $('html,body').animate({
                scrollTop: $(".property_for-error").offset().top-30},
            'slow');
        return isvalid;
    }
    else {
        $(".property_for-error").html("").fadeOut(0);
    }


    //property dealing validation
    if(isvalid)
    {
        isvalid =false;
        $("input[name='property_deal']:checked").each(function(){
            $(".property_deal-error").html("").fadeOut(0);
            isvalid = true;
        });
    }

    if (!isvalid)
    {
        $(".property_deal-error").html("Please Select an option").fadeIn(200);
        $('html,body').animate({
                scrollTop: $(".property_deal-error").offset().top-30},
            'slow');
        return isvalid;
    }
    else {
        $(".property_deal-error").html("").fadeOut(0);
    }

    // Rent by validation

    var dealtype = $("input[name='property_deal']:checked").data("type").trim();
    isvalid =false;

    if(dealtype == "rent")
    {
        $("input[name='rent_by']:checked").each(function(){
            isvalid = true;
        });

        if (!isvalid)
        {
            $(".rent_by-error").html("Please Select an option").fadeIn(200);
            $('html,body').animate({
                    scrollTop: $(".rent_by-error").offset().top-30},
                'slow');
            return isvalid;
        }
        else {
            $(".rent_by-error").html("").fadeOut(0);
        }
    }
    else{
        isvalid = true;
        $(".rent_by-error").html("").fadeOut(0);
    }

    // Price validation
    var validprice = $("#price_"+dealtype).val();
    isvalid = false;
    if(validprice.trim() == "")
    {
        $(".price_"+dealtype+"-error").html("What will be price for your property?").fadeIn(200);
        $('html,body').animate({
                scrollTop: $(".property_deal-error").offset().top-30},
            'slow');
        return isvalid;
    }else {
        $(".price_"+dealtype+"-error").html("").fadeOut(0);
    }




    // Comunidad Autónoma validation
    isvalid = false;
    var comunidad_autonoma = $("#comunidad_autonoma").val().trim();
    if(comunidad_autonoma != "") {
        isvalid = true;
    }

    if (!isvalid)
    {
        $(".comunidad_autonoma-error").html("please insert name of comunidad autonoma").fadeIn(200);
        $('html,body').animate({
                scrollTop: $(".comunidad_autonoma-error").offset().top-30},
            'slow');
        return isvalid;
    }
    else {
        $(".comunidad_autonoma-error").html("").fadeOut(0);
    }

    // cops validation
    isvalid = false;
    var cops = $("#cops").val().trim();
    if(cops != "") {
        isvalid = true;
    }

    if (!isvalid)
    {
        $(".cops-error").html("Zipcode in which your property is").fadeIn(200);
        $('html,body').animate({
                scrollTop: $(".cops-error").offset().top-30},
            'slow');
        return isvalid;
    }
    else {
        $(".cops-error").html("").fadeOut(0);
    }

    // Provincia validation
    isvalid = false;
    var provincia = $("#provincia").val().trim();
    if(provincia != "") {
        isvalid = true;
    }

    if (!isvalid)
    {
        $(".provincia-error").html("Please insert Provincia").fadeIn(200);
        $('html,body').animate({
                scrollTop: $(".provincia-error").offset().top-30},
            'slow');
        return isvalid;
    }
    else {
        $(".provincia-error").html("").fadeOut(0);
    }


    // localidad validation
    isvalid = false;
    var localidad = $("#localidad").val().trim();
    if(localidad != "") {
        isvalid = true;
    }

    if (!isvalid)
    {
        $(".localidad-error").html("Please insert localidad").fadeIn(200);
        $('html,body').animate({
                scrollTop: $(".localidad-error").offset().top-30},
            'slow');
        return isvalid;
    }
    else {
        $(".localidad-error").html("").fadeOut(0);
    }

    // Hood validation
    isvalid = false;
    var dist_id = $("#dist_id").val().trim();
    if(dist_id != "") {
        isvalid = true;
    }

    if (!isvalid)
    {
        $(".dist_id-error").html("Please insert District Name").fadeIn(200);
        $('html,body').animate({
                scrollTop: $(".dist_id-error").offset().top-30},
            'slow');
        return isvalid;
    }
    else {
        $(".dist_id-error").html("").fadeOut(0);
    }

    // District validation
    isvalid = false;
    var hood = $("#hood").val().trim();
    if(hood != "") {
        isvalid = true;
    }

    if (!isvalid)
    {
        $(".hood-error").html("Please insert Hood name").fadeIn(200);
        $('html,body').animate({
                scrollTop: $(".hood-error").offset().top-30},
            'slow');
        return isvalid;
    }
    else {
        $(".hood-error").html("").fadeOut(0);
    }

    // direccion validation
    isvalid = false;
    var direccion = $("#direccion").val().trim();
    if(direccion != "") {
        isvalid = true;
    }

    if (!isvalid)
    {
        $(".direccion-error").html("Please insert direccion").fadeIn(200);
        $('html,body').animate({
                scrollTop: $(".direccion-error").offset().top-30},
            'slow');
        return isvalid;
    }
    else {
        $(".direccion-error").html("").fadeOut(0);
    }

    // Map validatioin
    isvalid = false;
    var latitude = $("#latitude").val().trim();
    var longitude = $("#longitude").val().trim();
    if(latitude != "" && longitude != "") {
        isvalid = true;
    }

    if (!isvalid)
    {
        $(".map-error").html("<ol><li>Click on this button</li><li>Search your property location in Map</li><li>Click on your property on map and than close map</li>").fadeIn(200);
        $('html,body').animate({
                scrollTop: $(".map-error").offset().top-30},
            'slow');
        return isvalid;
    }
    else {
        $(".map-error").html("").fadeOut(0);
    }


    // property type validation
    isvalid = false;
    $("input[name='property_type']:checked").each(function () {
        isvalid = true;
    });

    if (!isvalid)
    {
        $(".property_type-error").html("Plase select your property type").fadeIn(200);
        $('html,body').animate({
                scrollTop: $(".property_type-error").offset().top-30},
            'slow');
        return isvalid;
    }
    else {
        $(".property_type-error").html("").fadeOut(0);
    }

    // rooms validation
    isvalid = false;
    $("input[name='rooms']:checked").each(function () {
        isvalid = true;
    });

    if (!isvalid)
    {
        $(".rooms-error").html("Plase select Number of rooms").fadeIn(200);
        $('html,body').animate({
                scrollTop: $(".rooms-error").offset().top-30},
            'slow');
        return isvalid;
    }
    else {
        $(".rooms-error").html("").fadeOut(0);
    }

    // bathrooms validation
    isvalid = false;
    $("input[name='bathrooms']:checked").each(function () {
        isvalid = true;
    });

    if (!isvalid)
    {
        $(".bathrooms-error").html("Plase select number of bathrooms").fadeIn(200);
        $('html,body').animate({
                scrollTop: $(".bathrooms-error").offset().top-30},
            'slow');
        return isvalid;
    }
    else {
        $(".bathrooms-error").html("").fadeOut(0);
    }

    // Size validation
    isvalid = false;
    var sizem2 = $("#sizem2").val().trim();
    if(sizem2 != "") {
        isvalid = true;
    }

    if (!isvalid)
    {
        $(".sizem2-error").html("Insert ground area size of your property in m<sup>2</sup>").fadeIn(200);
        $('html,body').animate({
                scrollTop: $(".sizem2-error").offset().top-30},
            'slow');
        return isvalid;
    }
    else {
        $(".sizem2-error").html("").fadeOut(0);
    }

    // construction validation
    isvalid = false;
    var construction = $("#construction").val().trim();
    if(construction != "") {
        isvalid = true;
    }

    if (!isvalid)
    {
        $(".construction-error").html("In which year your property has been constructed?").fadeIn(200);
        $('html,body').animate({
                scrollTop: $(".construction-error").offset().top-30},
            'slow');
        return isvalid;
    }
    else {
        $(".construction-error").html("").fadeOut(0);
    }

    // property features validation
    isvalid = false;
    $(".feature_inputs:checked").each(function () {
        isvalid = true;
    });

    if (!isvalid)
    {
        $(".property_features-error").html("Select one of the facility in your property").fadeIn(200);
        $('html,body').animate({
                scrollTop: $(".property_features-error").offset().top-30},
            'slow');
        return isvalid;
    }
    else {
        $(".property_features-error").html("").fadeOut(0);
    }

    // discription validation
    isvalid = false;
    var discription = $("#discription").val().trim();
    if(discription != "") {
        isvalid = true;
    }

    if (!isvalid)
    {
        $(".discription-error").html("Write some intresting things about your property <i class='fa fa-smile-o' style='color: ##897b05;font-size: 16px;'></i>").fadeIn(200);
        $('html,body').animate({
                scrollTop: $(".discription-error").offset().top-30},
            'slow');
        return isvalid;
    }
    else {
        $(".discription-error").html("").fadeOut(0);
    }


    // Contact name validation
    isvalid = false;
    var contact_name = $("#contact_name").val().trim();
    if(contact_name != "") {
        isvalid = true;
    }

    if (!isvalid)
    {
        $(".contact_name-error").html("Please provide contact name").fadeIn(200);
        $('html,body').animate({
                scrollTop: $(".contact_name-error").offset().top-30},
            'slow');
        return isvalid;
    }
    else {
        $(".contact_name-error").html("").fadeOut(0);
    }


    // Contact phone number validation
    isvalid = false;
    var contact_phone = $("#contact_phone").val().trim();
    if(contact_phone != "") {
        isvalid = true;
    }

    if (!isvalid)
    {
        $(".contact_phone-error").html("Please provide contact number").fadeIn(200);
        $('html,body').animate({
                scrollTop: $(".contact_phone-error").offset().top-30},
            'slow');
        return isvalid;
    }
    else {
        $(".contact_phone-error").html("").fadeOut(0);
    }



    // Contact Email validation
    isvalid = false;
    var contact_email = $("#contact_email").val().trim();
    if(contact_email != "") {
        isvalid = true;
    }

    if (!isvalid)
    {
        $(".contact_email-error").html("Please provide contact Email").fadeIn(200);
        $('html,body').animate({
                scrollTop: $(".contact_email-error").offset().top-30},
            'slow');
        return isvalid;
    }
    else {
        $(".contact_email-error").html("").fadeOut(0);
    }

    return isvalid;
}


function slideAformsection()
{
    //slide to next form section if form_section_1 is filled
    $("input[name='property_for'] , input[name='property_deal'] ,#price_rent,#price_sale, input[name='rent_by'] ").change(function() {
        if(complete_deal())
        {
            $('html, body').animate({
                scrollTop: $("#slideToproperty").offset().top
            }, 500);
        }
    });

    $("input[name='comunidad_autonoma'] , input[name='cops'] ,input[name='provincia'],input[name='localidad'],input[name='hood'],input[name='dist_id'],input[name='direccion'],input[name='latitude'],input[name='longitude'] ,input[name='rooms'],input[name='bathrooms'],input[name='sizem2'],input[name='construction'],#discription,#property_image ").change(function() {


        if(complete_property())
        {
            if(!(this.id == "property_image"))
            {
                $('html, body').animate({
                    scrollTop: $("#slideTodocument").offset().top
                }, 500);
            }
        }
    });

    $("input[name='energy_certificate'] , input[name='owner_certificate'] ").change(function() {
        if(complete_document())
        {
            $('html, body').animate({
                scrollTop: $("#slideTocontact").offset().top
            }, 500);
        }
    });

    $("input[name='contact_phone'], input[name='contact_name'], input[name='contact_email'] ,#duration ").change(function() {
        if(complete_contact())
        {
            $('html, body').animate({
                scrollTop: $("#slideTopublish").offset().top
            }, 500);
        }
    });

}

function complete_deal()
{
    var property_for  = $('input[name="property_for"]').is(':checked');
    var property_deal = $('input[name="property_deal"]:checked').val();

    if(property_deal != '' && property_deal != null) {

        var price = (property_deal == "RENT") ? $('#price_rent').val() : $('#price_sale').val();
        var isrent = (property_deal == "RENT")?$("input[name='rent_by']").is(':checked'):true;

        if (property_for && price != '' && isrent) {
            $('#about').addClass('complete');
            return true;
        }
        else {
            $('#about').removeClass('complete');
            return false;
        }
    }
}
function complete_property()
{
    var comunidad_autonoma = $("#comunidad_autonoma").val();
    var cops = $("#cops").val();
    var provincia = $("#provincia").val();
    var localidad = $("#localidad").val();
    var hood = $("#hood").val();
    var dist_id = $("#dist_id").val();
    var direccion = $("#direccion").val();
    var latitude = $("#latitude").val();
    var longitude = $("#longitude").val();
    var rooms = $('input[name="rooms"]').is(':checked');
    var bathrooms = $('input[name="bathrooms"]').is(':checked');
    var sizem2 = $("#sizem2").val();

    var construction = $("#construction").val();
    var discription = $("textarea#discription").val();

    var property_image = $(".file-input__item[data-name='propertyImages']").length;

    var propimage = $("#property_image").val();

    if(comunidad_autonoma != '' && cops != '' && provincia != ''  && localidad != '' && hood != '' && dist_id != '' && direccion.trim() != '' && latitude !='' && longitude !='' && rooms == true && bathrooms == true && sizem2 != '' && construction != '' && discription.trim() != '' && (property_image > 0 || propimage != ""))
    {
        $('#property').addClass('complete');
        return true;
    }
    else {
        $('#property').removeClass('complete');
        return false;
    }
}
function complete_document()
{
    var energy_certificate = $(".file-input__item[data-name='energyCertificate']").length;
    var owner_certificate = $(".file-input__item[data-name='ownerCertificate']").length;

    var onwer   = $("#energy_certificate").val();
    var energy  = $("#owner_certificate").val();

    if((energy_certificate > 0 || owner != "") && (owner_certificate > 0 || energy != ""))
    {
        $('#document').addClass('complete');
        return true;
    }
    else {
        $('#document').removeClass('complete');
        return false;
    }
}
function complete_contact()
{
    var contact_phone = $("input[name='contact_phone']").val();
    var contact_name = $("input[name='contact_name']").val();
    var contact_email = $("input[name='contact_email']").val();
    var duration = $('#duration').val();
    if(contact_phone != '' && contact_name != '' && contact_email != '' && duration != '')
    {

        $('#contact').addClass('complete');
        return true;
    }
    else {
        $('#contact').removeClass('complete');
        return false;
    }
}
