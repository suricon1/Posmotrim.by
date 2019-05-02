jQuery(document).ready(function ($) {

    var maxFileSize = 0.5 * 1024 * 1024; //Максимальный размер файла (500 Kб)
    var queue = {};
    var form = $('form#uploadImages');
    var imagesList = $('#uploadImagesList');

    var itemPreviewTemplate = imagesList.find('.item.template').clone();
    itemPreviewTemplate.removeClass('template');
    imagesList.find('.item.template').remove();

    $('#exampleGallery').on('change', function () {
        var files = this.files;

        for (var i = 0; i < files.length; i++) {
            var file = files[i];

            if ( !file.type.match(/image\/(jpeg|jpg|png|gif)/) ) {
                errors_list('Фотография должна быть в формате jpg, png или gif');
                continue;
            }

            if ( file.size > maxFileSize ) {
                errors_list('Размер фотографии не должен превышать 500 Kб');
                continue;
            }
            preview(files[i]);
        }
    });

    // Создание превью
    function preview(file) {

        var reader = new FileReader();
        reader.addEventListener('load', function(event) {
            var img = document.createElement('img');

            var itemPreview = itemPreviewTemplate.clone();

            itemPreview.find('.img-wrap img').attr('src', event.target.result);
            itemPreview.data('id', file.name);

            imagesList.append(itemPreview);

            queue[file.name] = file;
        });
        reader.readAsDataURL(file);
    }

    // Удаление фотографий
    imagesList.on('click', '.delete-link', function () {
        var item = $(this).closest('.item'),
            id = item.data('id');
        delete queue[id];
        item.remove();
    });

    // Отправка формы
    form.on('submit', function(event) {

        var formData = new FormData(this);
        var redirect = $(this).attr('data-redirect');

        //alert(redirect);

        for (var id in queue) {
            formData.append('images[]', queue[id]);
        }

        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            async: true,
            success: function (data) {
                if(data.succes)
                {
                    document.location.href=redirect;
                }
                else if(data.errors)
                {
                    errors_list(data.errors);
                }
                else
                {
                    //console.log(data);
                    errors_list('Неизвестная ошибка. Повторите попытку, пожалуйста!');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                //alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                fail_list(xhr.responseText);
            },
            cache: false,
            contentType: false,
            processData: false
        });
        return false;
    });
});

$(function() {
    var formModificAdd = $('form#modificAdd');

    formModificAdd.on('submit', function(event) {
        var formData = new FormData(this);
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            async: true,
            success: function (data) {
                if(data.succes)
                {
                    //console.log(data.succes);
                    $(data.succes).appendTo('.modification');
                    $('#modificationModal').modal('hide');
                }
                else if(data.errors)
                {
                    errors_list(data.errors);
                }
                else
                {
                    //console.log(data);
                    errors_list('Неизвестная ошибка. Повторите попытку, пожалуйста!');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                //alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                fail_list(xhr.responseText);
            },
            cache: false,
            contentType: false,
            processData: false
        });
        return false;
    });
});

function fail_list(data)
{
    data = jQuery.parseJSON(data);
    if(data.errors){
        errors_list(data.errors);
    }
}

function errors_list(data)
{
    if((typeof data) != 'string'){
        var temp = '';
        for (var error in data)
        {
            temp = temp + '<li>' + data[error] + "</li>";
        }
    }else{
        temp = '<li>' + data + "</li>";
    }
    $(function() {
        $("#Errors").html(temp);
        $('#ErrorModal').modal('show')
    });
}