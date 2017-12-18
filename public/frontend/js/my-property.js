var my_property_options = {
    "total": 0,
    "page": 1,
    "limit": 10,
    "property_for": $(".filter_for.active").data("type"),
    "_token": $("input[name='_token']").val()
};
var property = {};
$(document).ready(function () {

    get_My_Property();

    $(".filter_for").click(function () {
        $(".filter_for").removeClass("active");
        $(this).addClass("active");
        initialize_myproperties();
        get_My_Property();
    });

    $(".load_more").on('click', function () {
        my_property_options.page++;
        get_My_Property();
    });
    publish_property();


});

function deleteAproperty() {

    $('.delete_property_popup').magnificPopup({
        type: 'inline',
        midClick: true
    });

    $(".delete_property_popup").bindFirst("click", function(){
        property.id = $(this).data("id");
        $("#delete-property .popup__subtitle span").text($("#property-"+property.id+" .my-properties__title").text());
    });


    $('#delete-property .popup__ok-btn').on('click', function () {

        $.ajax({
            url: basepath + '/property/delete',
            type: 'POST',
            data: {
                "id": property.id,
                "_token": $('input[name="_token"]').val()
            },
            success: function (res) {
                res = $.parseJSON(res);

                if (res.status == 200) {
                    $.magnificPopup.close();
                    display_alert(res.status, res.message, true);
                }
                else {
                    display_alert(res.status, res.message, false);
                }
            }
        });
    });

    $("#delete-property .popup__cancel-btn").on("click", function () {
        $.magnificPopup.close();
    });

}

function publish_property() {

    $('.property_status').change(function () {
        $.ajax({
            url: basepath + '/property/publish',
            type: 'POST',
            data: {
                "id": $(this).data('id'),
                "status": ($('#property_status_' + property).prop('checked')) ? "1" : "0",
                "_token": $('input[name="_token"]').val()
            }
        });

    });

}

function initialize_myproperties() {
    $("#my_properties").html("");
    $(".load_more").addClass("hidden");

    my_property_options.page = 1;
    my_property_options.limit = 10;
    my_property_options.property_for = $(".filter_for.active").data("type");
}

function get_My_Property() {
    $.ajax({
        url: basepath + "/get-my-properties",
        type: "POST",
        data: my_property_options,
        success: function (res) {
            res = $.parseJSON(res);
            my_property_options.total = res.total;
            res.content = res.content.trim();
            if (res.content != "") {
                $("#my_properties").append(res.content);
                $(".my-properties").fadeIn(1000);
            }
        },
        complete: function () {
            if (my_property_options.total > (my_property_options.page * my_property_options.limit)) {
                $(".load_more").removeClass("hidden");
            }
            else {
                $(".load_more").addClass("hidden");
            }

            deleteAproperty();

        }
    });
}
 