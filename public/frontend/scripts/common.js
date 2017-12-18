 (function($) {

    $('textarea.js-auto-size').textareaAutoSize();

     /*
    var cardSlider = (function() {
        if ($('.card__slider').length < 1) return false;

        $('.card__slider').each(function() {
            $(this).slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                slide: '.card__slider-img'
            })
        });

    })();
    */


    $(".comment__text").dotdotdot({
        height: 50,
        after : "a.comment__readmore"
    });
        // var getPixelPosition = function (marker) {
        //     console.log(marker);
        //     var scale = Math.pow(2, map.getZoom());
        //     var nw = new google.maps.LatLng(
        //         map.getBounds().getNorthEast().lat(),
        //         map.getBounds().getSouthWest().lng()
        //     );
        //     var worldCoordinateNW = map.getProjection().fromLatLngToPoint(nw);
        //     var worldCoordinate = map.getProjection().fromLatLngToPoint(marker.position);
        //     var pixelOffset = new google.maps.Point(
        //         Math.floor((worldCoordinate.x - worldCoordinateNW.x) * scale),
        //         Math.floor((worldCoordinate.y - worldCoordinateNW.y) * scale)
        //     );

        //     return pixelOffset;
        // };

    $('.js-popup-open').magnificPopup({
        type:'inline',
        midClick: true
    });



    var stackedCharts = (function() {
        var $box = $('.js-chartstacked');
        if ($box.length == 0) return false;
        var stackedChart = new myStackedChart($box[0], $box.data('data'), $box.data('labels'));

        $(document).on('click', '.js-chart-toggle', function() {
            var $this = $(this),
                data = $this.data('data'),
                labels = $this.data('labels');

            $('.js-chart-toggle').removeClass('active');
            $this.addClass('active');
            stackedChart.update(data, labels);
        });

    })();


    var tabs = (function() {
        $(document).on('click', '.js-tab', function() {
            var $this = $(this),
                $target = $($this.data('target'));

            $('.js-tab, .js-tab__content').removeClass('active');
            $this.addClass('active');
            $target.addClass('active');

            acttab = $(this).data("class");

            $("."+acttab).each(function(){
                $(this).addClass("active");
            });

            $('html, body').animate({
                scrollTop: $(".infosection").offset().top
            }, 500);

        });
    })();

    var bigSlider = (function() {
        if ($('.big-slider').length < 1) return false;

        $('.big-slider').each(function() {
            $(this).slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                slide: '.big-slider__item'
            })
        });
    })();

    var nearbySlider = (function() {
        if ($('.nearby__slider').length < 1) return false;

        $('.nearby__slider').each(function() {
            $(this).slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                slide: '.nearby__item'
            })
        });
    })();
    
    var extraFeaturesBlock = (function() {
        var $block = $('.filter__toggle-box'),
            h = 0,
            tmpHeight = $block.innerHeight();

        $block.css({height: 'auto'});
        setTimeout(function() {
            h = $block.innerHeight();
            $block.css({height: tmpHeight + 'px'});
        }, 0);


        $(document).on('click', '.filter__toggle-box-btn', function() {
            if ($block.hasClass('open')) {
                $block.removeClass('open');
                $block.css({ height: tmpHeight + 'px' });
            } else {
                $block.addClass('open');
                $block.css({ height: h + 'px' });
            }
        });

    })();

    var customSelects = (function() {
        $('.custom-select').select2({
            minimumResultsForSearch : Infinity,
            theme: 'custom'
        });
    })();


    var datepickerInit = (function() {
        var picker = new Pikaday({
            field: document.getElementById('datepicker'),
            format: 'D MMM YYYY',
        });
    })();

    var timepickerInit = (function() {
        $('.timepicker').wickedpicker({
            now : "12:35",
            twentyFour : true,
            upArrow : 'wickedpicker__controls__control-up', //The up arrow class selector to use, for custom CSS
            downArrow : 'wickedpicker__controls__control-down', //The down arrow class selector to use, for custom CSS
            close : 'wickedpicker__close', //The close class selector to use, for custom CSS
            hoverState : 'hover-state', //The hover state class to use, for custom CSS
            title : 'Timepicker', //The Wickedpicker's title,
            showSeconds : false, //Whether or not to show seconds,
            timeSeparator : ' : ', // The string to put in between hours and minutes (and seconds)
            secondsInterval : 1, //Change interval for seconds, defaults to 1,
            minutesInterval : 1, //Change interval for minutes, defaults to 1
        });
    })();

    var amountInputWidth = function () {
        var $input = $('.input-autosize'),
            $buffer = $('.input-autosize-buffer');

        setTimeout(function () {
            $buffer.text($input.val());
            $input.width($buffer.width());
        }, 10);
    };

    amountInputWidth();

    var listPriceSlider = (function () {
        if (!$('#list-price').length) return false;
        var slider = document.getElementById('list-price'),
            min = parseInt(slider.dataset.min),
            max = parseInt(slider.dataset.max),
            input = document.getElementById('amount');

        input.addEventListener('change', function () {
            slider.noUiSlider.set(this.value);
        });

        noUiSlider.create(slider, {
            start : [parseInt(input.value)],
            connect: true,
            range: {
                'min': min,
                'max': max
            },
            format : wNumb({
                decimals: 0, 
                thousand: ',',
            })
        })
        .on('update', function (values, handle) {
            amountInputWidth();

            input.value = values[handle];
        });
    })();

    var refundTableHeight = (function() {
        var $refund = $('.refund'),
            $table = $refund.find('table'),
            paddingBottom = parseInt($refund.css('padding-bottom'));

        $refund.data({'max-height': $table.height() + paddingBottom, 'height': $refund.height() + paddingBottom});
    })();

    $("#contact-us-form").validate({
        submitHandler: function (form) {
            var $formDiv = $(form).find('.form')
            //after ajax
            $formDiv.addClass('form--success');

            setTimeout(function() {
                $(form)[0].reset();
            }, 1000);

            setTimeout(function() {
                $formDiv.removeClass('form--success');
            }, 4000);
        }
    });

    $('#visit-form').validate({
        submitHandler: function (form) {
            //if success
            form.reset();
            $.magnificPopup.open({
                items: {
                    src: '#visit-form-success' 
                },
                type: 'inline'
            });
            //if error
            // $.magnificPopup.open({
            //     items: {
            //         src: '#visit-form-fail' 
            //     },
            //     type: 'inline'
            // });
        }
    });

    $(document)
        .on('click', '.js-show-table', function() {
            var $target = $($(this).data('target')),
                isShow = $target.hasClass('show');

            if (isShow) {
                $target.removeClass('show').css({
                    'height': $target.data('height') + 'px'
                });
            }
            else {
                $target.addClass('show').css({
                    'height': $target.data('max-height') + 'px'
                });
            }
        })
        .on('click', '.js-toggle-trunc', function() {
            var $this = $(this),
                $box = $this.parent(),
                isTruncated = $box.triggerHandler("isTruncated");

            if (isTruncated) {
                $box.trigger("destroy");
            } else {
                $box.dotdotdot({
                    height: 50,
                    after: $this
                });
            }
            return false;
        })
        .on('click', '.js-toggle-edit-comment', function() {
            var $comment = $(this).closest('.comment');

            if ($comment.hasClass('editable')) {
                $comment.removeClass('editable');
            } else {
                $comment.addClass('editable');
                $comment.find('.js-auto-size').trigger('input');
            }
        })
        .on('click', '.js-comment-cancel', function() {
            $(this).closest('.comment').removeClass('editable');
        })
        .on('click', '.js-toggle-share', function() {
            var $this = $(this),
                $list = $this.parent().find('.js-share-list');

            if ($list.hasClass('show')) {
                $list.removeClass('show');
                $this.removeClass('active');
                $(document).off('click.share');
            } else {
                $list.addClass('show');
                $this.addClass('active');

                $(document).on('click.share', function(e) {
                    if ($(e.target).closest('.js-share-list').length == 0 && !$(e.target).hasClass('js-share-list')) {
                        $list.removeClass('show');
                        $this.removeClass('active');
                        $(document).off('click.share');
                    }
                });
            }
        })
        .on('click', '.js-rename-collection', function() {
            var $this = $(this),
                $text = $this.closest('.collection-nav__item').find('.collection-nav__item-text'),
                $input = $this.closest('.collection-nav__item').find('.collection-nav__item-name');

            $text.css({width: '300px'});
            $input[0].focus();
        })
        .on('blur', '.collection-nav__item-name', function() {
            var $box = $(this).closest('.collection-nav__item')
                $text = $box.find('.collection-nav__item-text');

            $text.css({width: ''});
        })
        .on('keyup', '.js-format', function() {
            var format = wNumb({decimals: 0, thousand: ','}),
                val = format.from($(this).val());
                if(val != false && val != "")
                {
                    $(this).val(format.to(val));
                }
        })
        .on('change', '.js-toggle-add-property-fields', function() {
            var $this = $(this),
                type = $this.data('type');

            $('.add-property').removeClass('add-property--sale add-property--rent');

            if (type === 'rent') {
                 $('.add-property').addClass('add-property--rent');
            } else if (type === 'sale') {
                 $('.add-property').addClass('add-property--sale');
            }
        });

})(jQuery);