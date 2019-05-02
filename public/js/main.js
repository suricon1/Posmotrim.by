$(document).ready(function(){

    //$('.select2').select2();

    //	Динамический select
    $('#region').change(function () {
        $('#city').find( 'option:not(:first)' )    // Ищем все теги option, не являющиеся тегом по умолчанию
            .remove()   // Удаляем эти теги
            .end()      // Возвращаемся к исходному объекту
            .prop( 'disabled',true );       // Делаем поля неактивными
        var type_id = $( this ).val();
        if (type_id === 0) {return;}
        /*if (type_id === "dob") {
            //	Добавим новую страну
            $('.region').append("<span class='del'><label>Добавьте название страны:</label><input name='new_region' type='text'> <input id='dob_region' type='submit' value='Ok'></span>");
            return;
        }*/
        FormAjax(type_id);
    });

    function FormAjax(id) {
        $.ajax({
            type: "POST",
            url: "/admin/ajax/" + id,
            headers: {'X-CSRF-Token': $("input[name = '_token']").val()},
            error: function (data) {
                alert( "При выполнении запроса произошла ошибка :(" );
                console.log(data);
            },
            success: function (data) {
                if (data.succes) {
                    $('#city').html(data.succes).prop( 'disabled', false );	//	Грузим полученные данные и Включаем поле
                    $('.select2').select2();
                }
                if (data.error) {
                }
            }
        });
    }

    //	Предпоказ загружаемого заглавного фото статьи
    $('#exampleInputFile').change(function() {
        var input = $(this)[0];
        $('#error_img h3').remove();
        $('#image_preview').attr('src', "");
        if ( input.files && input.files[0] ) {
            if ( input.files[0].type.match('image.*') ) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#image_preview').attr('src', e.target.result);
                    if (input.files[0].size > 500000) {
                        $('#error_img').append("<br /><h3>Размер файла превышает 500kb</h3>");
                    }
                }
                reader.readAsDataURL(input.files[0]);
            } else {$('#error_img').append("<h3>Это не изображение</h3>");}
        } else {$('#error_img').append("<h3>Файла не существует</h3>");}
    });
});