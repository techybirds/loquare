;
(function ($) {

    $(document).on('drag dragstart dragend dragover dragenter dragleave drop', function(e) {
        e.preventDefault();
        e.stopPropagation();
    })
    .on('dragover dragenter', '.dnd', function() {
        $(this).addClass('isDrag');
    })
    .on('dragleave', '.dnd', function() {
        $(this).removeClass('isDrag');
    })
    .on('drop', '.dnd', function(e) {
        var name = $(this).data('name'),
            droppedFiles = e.originalEvent.dataTransfer.files,
            $fileList = $(this).find('.dnd__files');

        $(this).removeClass('isDrag');
        if (droppedFiles) {
            if (!Array.isArray(window.loquareFiles[name])) {
                window.loquareFiles[name] = [];
            }
            $.each(droppedFiles, function(i) {
                window.loquareFiles[name].push(this);
            });

            var count = $fileList.find('.dnd__files-item').length;

            $.each(droppedFiles, function(i) {
                if (this instanceof File) {
                    var reader = new FileReader();

                    $fileList.prepend('<button data-name="'+ name +'" type="button" class="dnd__files-item" data-id="' + (count + i) + '"></button>');

                    reader.onload = (function (theFile, i) {
                        return function (e) {
                           $fileList.find('[data-id='+ (count + i) +']').css({ 'background-image': 'url('+ e.target.result +')' });
                        };
                    })(this, i);

                    reader.readAsDataURL(this);
                }
            });
        }
    });
})(jQuery);