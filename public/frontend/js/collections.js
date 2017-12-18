var page = 1, limit = 10;

var collection  = {};
var property = {};

$(document).ready(function(){
    get_collection(page, limit);

    collection.container = $(".collection-nav__item.active");
    collection.id = $(".collection-nav__item.active").data("id");
    collection.of = $(".collection-nav__item.active").data("of");
    collection.name = $(".collection-nav__item-text", collection.container).text().trim();
    collection.total =$("span.total_in_collection", collection.container).text().trim();

    $(".collection-nav__item").click(function(e){
        collection.id   = $(this).data("id");
        collection.of   = $(this).data("of");

        collection.container = this;
        collection.name = $(".collection-nav__item-text", this).text().trim();
        collection.total =$("span.total_in_collection", this).text().trim();

        if(!$(e.target).hasClass("collection-nav__edit") && !$(e.target).hasClass("collection-nav__delete") && !$(e.target).hasClass("collection-nav__item-name"))
        {
            if(!$(this).hasClass("active"))
            { $(location).attr("href", basepath+"/collections/"+collection.of+"/"+collection.id); }
        }

        $(".collection-nav__edit").on("click", function(){
            $(".collection-nav__item-name", collection.container).val(collection.name);
        });

        $("#delete-collection .popup__subtitle span").text(collection.name+" ("+collection.total+")");
    });

    $(".collection-nav__delete").bindFirst("click", function(){
        $("#delete-collection .popup__subtitle span").text(collection.name+" ("+collection.total+")");
    });


    $("#delete-collection .popup__ok-btn").click(function(){

        $delete= {
            "collection" : collection.id,
            "_token":$("input[name='_token']").val()
        };

        $.post(basepath+"/collection/delete", $delete ).done(function(res){
            res = $.parseJSON(res);
            if(res.status == 200){
                $.magnificPopup.close();
                $(collection.container).remove();
            }
            display_alert(res.status, res.message, false);
        });
    });

    $("#delete-collection .popup__cancel-btn").click(function(){
        $.magnificPopup.close();
    });

    $(".collection-nav__item-name").keypress(function(event){

        if ( event.which == 13 ) {
            var colleciton_rename = $(this).val().trim();
            if(colleciton_rename != "")
            {
                rename = {
                    "collection" : collection.id,
                    "name":colleciton_rename,
                    "_token":$("input[name='_token']").val()
                };

                $.post(basepath+"/collection/rename", rename).done(function(res){
                    res = $.parseJSON(res);
                    if(res){
                        $(".collection-nav__item-text", collection.container).text(rename.name).css({width:"auto"});
                        collection.name = rename.name;
                    }
                    else {
                        $(".collection-nav__item-text", collection.container).text(collection.name).css({width:"auto"});
                    }
                });
            }
            $(this).trigger("blur");
        }
    });

    $(".load_more").click(function(){
        page++;
        get_collection(page, limit);
    });

});


function get_collection(page,limit)
{
    $active_collection = $(".collection-nav__item.active").data("id");
    total_in_collection = $(".collection-nav__item.active span.total_in_collection").html();
    total_in_collection = parseInt(total_in_collection);

    if(total_in_collection > (page*limit)){ $(".load_more").removeClass("hidden"); }
    else { $(".load_more").addClass("hidden"); }

    $(".collections").addClass("hidden");
    $("#collection_"+$active_collection).removeClass("hidden");

    $.ajax({
        url:basepath+"/get_collection_property",
        type:"POST",
        data:{
            "type" : "user",
            "_token":$("input[name='_token']").val(),
            "page":page,
            "limit":limit,
            "collection":$active_collection
        },
        success:function(res){
            res = res.trim();
            if(res != "")
            {
                $("#collection_"+$active_collection+" .collection_properties").append(res);
                $("#collection_"+$active_collection+" .collection").fadeIn(500);
            }
        },
        complete:function(){

            $(".share-fb").on("click",function(){
                FBShare($(this).data("share"));
            });

            $(".share-tw").on("click",function(){
                shareTwitter($(this).data("share"));
            });

            $(".collection").on("click",function(){
                property.id = $(this).data("id");
                property.container = $(this);
            });

            $(".collection__unsave").bindFirst("click", function(){
                property.id = $(this).data("id");
                property.container = $("#collection_"+property.id);

                remove_from_collection= {
                    "collection" : collection.id,
                    "property" : property.id,
                    "_token":$("input[name='_token']").val()
                };

                $.post(basepath+"/collection/remove_from_collection", remove_from_collection ).done(function(res){
                    res = $.parseJSON(res);

                    if(res.status == 200){
                        $(property.container).remove();
                        display_alert(res.status, res.message, true);
                    }
                    else
                    {
                        display_alert(res.status, res.message, false);
                    }
                });
            });

            $(".comment__save", property.container).click(function(){
                comment = $(".comment__area", property.container).val();
                $data = {
                    "comment":comment,
                    "collection" : collection.id,
                    "property":property.id,
                    "_token":$("input[name='_token']").val()
                };

                $.post(basepath+"/collection/update_collection_comment", $data).done(function(res){
                    res = $.parseJSON(res);

                    if(res.status == 200 ){
                        $(".comment", property.container).removeClass("editable");

                        $(".comment__text span", property.container).text(comment);
                    }

                    display_alert(res.status, res.message, false);

                });

            });
        }
    })
}