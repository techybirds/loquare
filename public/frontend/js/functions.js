var userLocation = {
    latitude:"",
    longitude:""
}

$.fn.bindFirst = function(name, fn) {
    // bind as you normally would
    // don't want to miss out on any jQuery magic
    this.on(name, fn);

    // Thanks to a comment by @Martin, adding support for
    // namespaced events too.
    this.each(function() {
        var handlers = $._data(this, 'events')[name.split('.')[0]];
        // take out the handler we just inserted from the end
        var handler = handlers.pop();
        // move it at the beginning
        handlers.splice(0, 0, handler);
    });
};


window.fbAsyncInit = function() {
    FB.init({
        appId            : '151273565510156',
        autoLogAppEvents : true,
        xfbml            : true,
        version          : 'v2.11'
    });
};

(function(d, s, id){
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {return;}
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));



$(document).ready(function(){
    $(document).on("click", ".save_to_collection", function(){
        $(".popup-form--save-to-collection #collect_property").val($(this).data('id'));
    });

    $(".search-add__btn").click(function(){
        search_collcetion();
    });


    $('.open_colleciton_popup').magnificPopup({
        type:'inline',
        midClick: true
    });

});

function search_collcetion()
{
    var collect_property = $(".popup-form--save-to-collection #collect_property").val();
    $(".list-checks").html("");
    collection = $(".search-add__field").val();
    if(collection.trim() != "")
    {
        $.ajax({
            "url":basepath+"/search_add_collection",
            "type":"post",
            "data":{
                "collection" : collection,
                "property"  : collect_property,
                "_token" : $('input[name="_token"]').val()
            },
            success:function(res) {
                res = jQuery.parseJSON(res);
                if (res != false)
                {
                    $(".list-checks").html(res);
                }
            }
        });
    }
}

function get_userLocation(callback)
{
    navigator.geolocation.getCurrentPosition(function(pos){

        userLocation.latitude = pos.coords.latitude;
        userLocation.longitude = pos.coords.longitude;

        if(callback != "")
        {
            callback();
        }

    }, function (err) {
        console.warn('ERROR'+err.code+':'+err.message);
    }, {
        enableHighAccuracy: true
    });
}

function display_alert(type, message, reload)
{
    type = (type == 200) ?"success":"error";
    $("#alert-"+type+" .visit-react__desc").html(message);

    options = {
        items: {
            src: '#alert-'+type
        },
        type: 'inline'
    };

    if(reload)
    {
        options.callbacks =  {
            close: function(){
                location.reload();
            }
        }
    }

    $.magnificPopup.open(options);
}


function FBShare(shareid)
{
    FB.ui({
        method: 'share',
        href: basepath+'/rent/property/'+shareid,
    }, function(response){
        console.log(response);
    });
}

function shareTwitter(shareid)
{

    $.post(basepath+"/property/get/json", { "id":shareid, "_token":$("input[name='_token']").val() },function(){

    }).done(function(res){
        res = jQuery.parseJSON(res);
        if(res != false)
        {
            var url = basepath+'/rent/property/'+res[0].id;
            var text = res[0].discription.substring(0,250)+" ...\n";
            window.open('http://twitter.com/share?url='+encodeURIComponent(url)+'&text='+encodeURIComponent(text), '', 'left=0,top=0,width=550,height=450,personalbar=0,toolbar=0,scrollbars=0,resizable=0');
        }
    });
}