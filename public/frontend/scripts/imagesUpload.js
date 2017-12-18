;
(function ($) {
    window.loquareFiles = {};
    postfiles = [];

    $(document).on('change', '.js-file-multiple', function() {

        var $this = $(this),
        $fileList = $($this.data('filelist')),
        name = $this.data('name'),
        files = $this[0].files,
        previews = [],
        itemClass = $fileList.hasClass('file-input') ? 'file-input__item' : 'dnd__files-item';


        if (files) {
            if (!(loquareFiles[name] instanceof Array)) {
               loquareFiles[name] = [];
            }
            $.each(files, function(i) {
                loquareFiles[name].push(this);
            });
        }

        var count = $fileList.find('.'+ itemClass).length;

        $.each(files, function (i) {

            var file = files[i];
            postfiles.push(file);

            if (this instanceof File) {
                var reader = new FileReader();

                $fileList.prepend('<button data-name="' + name + '" type="button" class="' + itemClass +" "+name.toLowerCase()+'" data-image-id="0" data-id="' + (count + i) + '"></button>');

                reader.onload = (function (theFile, i) {
                    return function (e) {
                        $fileList.find('[data-id='+ (count + i) +']').css({ 'background-image': 'url('+ e.target.result +')' });
                    };
                })(this, i);

                reader.readAsDataURL(this);
            }
        });

        //$this.val('');
    });

    $(document).on('change' , '.js-file-one', function(e){
        var $this = $(this),
            filelist=$this.data('filelist'),
            $fileList = $(filelist),
            name = $this.data('name'),
            files = $this[0].files,
            itemClass = $fileList.hasClass('file-input') ? 'file-input__item' : 'dnd__files-item',
            itemCount= $(filelist +'  .file-input__item ').length,

            extensions = ['pdf','doc','docx','jpeg', 'jpg', 'png','svg','odt'],
            fileExtension=$(this).val().split('.').pop().toLowerCase();

        if (files) {
            if (!(loquareFiles[name] instanceof Array)) {
                loquareFiles[name] = [];
            }
            $.each(files, function(i) {
                loquareFiles[name].push(this);
            });
        }

        var count = $fileList.find('.'+ itemClass).length;

        if(itemCount == 0 || itemCount ==1 )
        {
            count = 1;

            if (this.files && this.files[0]) {
                var reader = new FileReader();

                if(itemCount == 0)
                {
                    $fileList.prepend('<button  data-name="' + name + '" type="button" class="' + itemClass +   '" data-image-id="0" data-id="' + (count) + '"></button>');
                }

                reader.onload = function (e) {
                    if(fileExtension == 'pdf')
                    {
                        $fileList.find('[data-id="'+count+'"]').css({ 'background-image': 'url('+basepath+'/frontend/images/pdfIcon.svg)' });

                    }else if(fileExtension == 'doc' || fileExtension == 'docx' || fileExtension == 'odt')
                    {
                        $fileList.find('[data-id="'+count+'"]').css({ 'background-image': 'url('+basepath+'/frontend/images/docIcon.png)' });
                    }else
                    {
                        $fileList.find('[data-id="'+count+'"]').css({ 'background-image': 'url('+ e.target.result +')' });
                    }
                }
                reader.readAsDataURL(this.files[0]);
            }
        }
    });


    $(document).on('click', '.file-input__item[data-id], .dnd__files-item[data-id]', function() {

            var $this = $(this),
                $fileList = $this.parent(),
                name = $this.data('name');

            fileid = $this.data("id");

            imageId = $this.data("image-id")

            mfp_src = $this.data("mfp-src");

            if(parseInt(imageId) != 0) {
                delete_property_image(mfp_src, imageId, $this);
            }else {
                $this.remove();
            }

            if(!jQuery.isEmptyObject(postfiles))
            {
                if(name == "propertyImages") { postfiles.splice(fileid, 1); };
                if(name == "propertyImages") { postfiles.splice(loquareFiles[name], 1); }

                loquareFiles[name] = loquareFiles[name].filter(function(n){return (n != undefined);});
            }

            $($fileList.find('button').get().reverse()).each(function(i) {
                $(this).data('id', i).attr('data-id', i);
            });


            if(name == "propertyImages")
            {
                var noimage = $(".file-input__item.propertyimages").length;
                if(noimage <= 0)
                {
                    $("#property").removeClass("complete");
                }
            }
            if(name == "ownerCertificate" || name == "energyCertificate")
            {
                var owner = $(".file-input__item.ownerCertificate").length;
                var energy = $(".file-input__item.energyCertificate").length;

                if(owner <= 0 || energy <= 0)
                {
                    $("#document").removeClass("complete");

                    $("#energy_certificate").val("");
                    $("#owner_certificate").val("");
                }
            }
        });

})(jQuery);


function delete_property_image(mfp_src,imageId,$this)
{

    $('#delete-image-file .popup__ok-btn, #delete-energy-certificate .popup__ok-btn, #delete-owner-certificate .popup__ok-btn').off('click');

    $('#delete-image-file .popup__ok-btn, #delete-energy-certificate .popup__ok-btn, #delete-owner-certificate .popup__ok-btn').on('click', function () {

        $.ajax({
            url:basepath+'/image/delete',
            type:'POST',
            data:{
                "property_image_id": imageId,
                "_token" : $('input[name="_token"]').val()
            },
            success: function (res) {
                res = $.parseJSON(res);

                if (res.status == 200) {
                    $.magnificPopup.close();

                    display_alert(res.status, res.message, false);

                    $this.remove();
                }
                else {
                    display_alert(res.status, res.message, false);
                }
            }
        });
    });

    $(mfp_src +" .popup__cancel-btn").on("click", function () {
        $.magnificPopup.close();
    });

}
