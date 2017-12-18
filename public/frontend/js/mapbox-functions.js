/**
 * Created by abc on 15/12/16.
 */

var controller = "searchresult";
var action = {"residential" : 'searchresult', "retailer" : 'searchretail'};

$(document).ready(function(){

    $("body").click(function(){
        $("#searchlist").html("");
        $("#searchresults").addClass("hidden");
    });

    $(".filter").css({"height":($(window).height() - $("header").height())});

    $(".user_category").click(function(){
        $(".user_category").removeClass("active");
        $(this).addClass("active");
        controller = action[$(this).attr('id')];

    });

    $('#mapbox_search').keyup(function(event) {
        var donnotsearch = [13,17,37,38,39,40];
        if((jQuery.inArray(event.which, donnotsearch) <= -1) && !event.ctrlKey)
        {
            showSearchList();
        }
    });
    $('#mapbox_search').click(function() { showSearchList(); });

    $('#mapbox_search').keypress(function(event) {
        if(event.which == 13)
        {
            searchin();
        }
    });


    $("#search_property").click(function(){
        init();
        FilterProperties();
    });

    $("#states").change(function(){
        showSearchList();
    });
});

function showSearchList()
{
    if($("#mapbox_search").val().length >= 3) {
        $.ajax({
            "url": basepath + "/"+controller,
            "type": "post",
            "data": {
                "_token": $('input[name="_token"]').val(),
                "states" : "Barcelona",
                "query": $("#mapbox_search").val()
            },
            success: function (response) {
                $("#searchlist").html("");
                res = $.parseJSON(response);
                $("#searchlist").show(0);

                district    = res.district;
                hoods       = res.hoods;
                cops        = res.cops;
                listing     = res.listing;
                areas       = res.areas;

                if(district.length != 0 || listing.length != 0)
                {
                    $("#searchresults").removeClass("hidden");
                }
                else {
                    $("#searchresults").addClass("hidden");
                }

                if(district.length != 0)
                {
                    $("#searchlist").append("<li class='list_title'><span>Search homes in District </span><ul>");
                    for(i in district)
                    {
                        $("#searchlist").append("<li class='list-item district' searchin = 'district' place='"+district[i].district+"'>"+district[i].district+"</li>");
                    }
                    $("#searchlist").append("</ul></li>");
                }

                if(hoods.length != 0)
                {
                    $("#searchlist").append("<li class='list_title'><span>Search homes in Hood</span><ul>");
                    for(i in hoods)
                    {
                        $("#searchlist").append("<li class='list-item hoods' searchin = 'hoods' place='"+hoods[i].hoods+"'>"+hoods[i].hoods+"</li>");
                    }
                    $("#searchlist").append("</ul></li>");
                }

                if(cops.length != 0)
                {
                    $("#searchlist").append("<li class='list_title'><span>Search homes in Cop area</span><ul>");
                    for(i in cops)
                    {
                        $("#searchlist").append("<li class='list-item cops' searchin = 'cops' place='"+cops[i].cops+"'>"+cops[i].cops+"</li>");
                    }
                    $("#searchlist").append("</ul></li>");
                }

                if(areas.length != 0)
                {
                    $("#searchlist").append("<li class='list_title'><span>Search In Area </span><ul>");
                    for(i in areas)
                    {
                        $("#searchlist").append("<li class='list-item areas' searchin = 'areas' place='"+areas[i].provincia+"'>"+areas[i].provincia+"</li>");
                    }
                    $("#searchlist").append("</ul></li>");
                }

                if(listing.length != 0)
                {
                    $("#searchlist").append("<li class='list_title'><span>Listing</span><ul>");
                    for(i in listing)
                    {
                        item = "<li class='list-item listing' searchin='listing' place='"+listing[i].direccion+";"+listing[i].cops+" "+listing[i].provincia+"'>"+listing[i].direccion+"<span> - ";
                        item += "Bed "+listing[i].rooms+" | ";
                        item += "Bath "+listing[i].bathrooms+" | ";
                        item += "Price $"+listing[i].price+"</span></li>";

                        $("#searchlist").append(item);
                    }
                    $("#searchlist").append("</ul></li>");
                }


                $("#searchlist li.list-item").click(function(){

                    searchtext = $(this).text();
                    searchtext = $(this).attr("place");

                    $("#mapbox_search").val(searchtext);
                    $("#searchlist").html("");

                    page = 1;
                    $("#pages .pagenum a").removeClass("active");
                    $("#page1").addClass("active");

                    Searchquery.search = $(this).attr("place");
                    Searchquery.searchin = $(this).attr("searchin");
                    $("#searchresults").addClass("hidden");

                    init();
                    FilterProperties();

                });

            }

        });
    }
    else {
        $("#searchlist").html("");
        $("#searchresults").addClass("hidden");
    }
}

function gotoResult(funsession, routecall)
{
    if(Searchquery.search.trim() == "")
    {
        Searchquery.search = $("#mapbox_search").val();
    }
    Searchquery.provincia = $("#states").val();

    if($("#mapbox_search").val().length >= 3)
    {
        $.ajax({
            url:basepath+"/"+funsession,
            type:"post",
            data:Searchquery,
            success:function(res){
                if(res)
                {
                    $(location).attr("href", basepath+"/"+routecall);
                }
            }
        });
    }
}