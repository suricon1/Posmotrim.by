// Avoid `console` errors in browsers that lack a console.
(function() {
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());

// Place any jQuery/helper plugins in here.
/*---------------------------------
    ajax-mail.js
-----------------------------------*/
$(function() {

	// Get the form.
	var form = $('#contact-form');

	// Get the messages div.
	var formMessages = $('.form-messege');

	// Set up an event listener for the contact form.
	$(form).submit(function(e) {
		// Stop the browser from submitting the form.
		e.preventDefault();

		// Serialize the form data.
		var formData = $(form).serialize();

		// Submit the form using AJAX.
		$.ajax({
			type: 'POST',
			url: $(form).attr('action'),
			data: formData
		})
		.done(function(response) {
			// Make sure that the formMessages div has the 'success' class.
			$(formMessages).removeClass('error');
			$(formMessages).addClass('success');

			// Set the message text.
			$(formMessages).text(response);

			// Clear the form.
			$('#contact-form input,#contact-form textarea').val('');
		})
		.fail(function(data) {
			// Make sure that the formMessages div has the 'error' class.
			$(formMessages).removeClass('success');
			$(formMessages).addClass('error');

			// Set the message text.
			if (data.responseText !== '') {
				$(formMessages).text(data.responseText);
			} else {
				$(formMessages).text('Oops! An error occured and your message could not be sent.');
			}
		});
	});
});

$(function() {
    $('#login-modal').on('show.bs.modal', function () {
        $.ajax({
            type: "GET",
            url: "/ajax/login-form",
            error: function () {
                 alert( "При выполнении запроса произошла ошибка :(" );
            },
            success: function (data) {
                $("#login-modal-body").html(data);
            }
        });
    });
});

$(document).on('click', '.open-modal', function (e) {
    e.preventDefault();
    var id = $(this).attr('data-product-id');
    $.ajax({
        type: "GET",
        url: "/ajax/singleProduct",
        data: {product_id: id},
        success: function (data) {
            console.log(data.succes);
            if(data.succes){
                $("#open-modal").html(data.succes);
                singleOwlCarousel();
                $('#open-modal').modal('show');
            }
            if(data.error){
                errors_list(data.error);
            }
        }
    })
    .fail(function(xhr, ajaxOptions, thrownError) {
        fail_list(xhr.responseText);
        //console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
    });
});

function singleOwlCarousel()
{
    $('.single-slide-menu').owlCarousel({
        smartSpeed: 1000,
        nav: false,
        responsive: {
            0: {
                items: 3
            },
            450: {
                items: 3
            },
            768: {
                items: 4
            },
            1000: {
                items: 4
            },
            1200: {
                items: 4
            }
        }
    });
    $('.modal').on('shown.bs.modal', function (e) {
        $('.single-slide-menu').resize();
    });

    $('.single-slide-menu a').on('click',function(e){
        e.preventDefault();

        var $href = $(this).attr('href');

        $('.single-slide-menu a').removeClass('active');
        $(this).addClass('active');

        $('.product-details-large .tab-pane').removeClass('active show');
        $('.product-details-large '+ $href ).addClass('active show');
    });
}

$ (function () {
    $(document).delegate("#login-modal-body #submit", "click", function (e) {
        e.preventDefault();
        $("#login-modal-body #password").removeClass("is-invalid");
        $("#login-modal-body #invalid-password").html('');

        $("#login-modal-body #email").removeClass("is-invalid");
        $("#login-modal-body #invalid-email").html('');

        $("#login-modal-body #error").remove();

        $.ajax({
            method: "POST",
            data: $("form#login").serialize(),
            url: "/ajax/login",
            headers: {'X-CSRF-Token': $("input[name = '_token']").val()}
        })
        .done(function(data) {
            if(data.succes)
            {
                //window.location.replace("/");
                location.reload();
            }
            else if(data.error)
            {
                $("#login-modal-body").prepend(data.error);
            }
            else if(data.errors)
            {
                if (data.errors.email) {
                    $("#login-modal-body #email").addClass("is-invalid");
                    $("#login-modal-body #invalid-email").html(data.errors.email);
                }
                if (data.errors.password) {
                    $("#login-modal-body #password").addClass("is-invalid");
                    $("#login-modal-body #invalid-password").html(data.errors.password);

                }
                resetForm($('#login'));
            }
            else
            {
                data.error = '<div class="alert alert-danger" id="error">Неизвестная ошибка. Повторите попытку, пожалуйста!</div>';
                $("#login-modal-body").prepend(data.error);
            }

        });
    });
});

var tmp_comment = null;
$( document ).ready(function(){

    //	Открывает форму ответа на комментарий под коментом
    $(document).on('click', '.single-comment .reply_comment', function(event) {
        var id = $(event.target).parents("ol").get(0).id;
        $("#email, #text").val("");
        if ($('#form_add_comment').is(':visible')) {
            commentCancel();
            if (tmp_comment) setTimeout(function () { reply_coment(id) }, 1020);
            else  setTimeout(function () { reply_coment(id) }, 500);
        }
        else reply_coment(id);
    });

    //	Редактирование комента
    $(document).on("click", ".single-comment .edit_comment", function(event) {
        var id = $(event.target).parents("ol").get(0).id;
        if ($('#form_add_comment').is(':visible')) {
            commentCancel();
            if (tmp_comment) setTimeout(function () { edit_coment(id) }, 1020);
            else  setTimeout(function () { edit_coment(id) }, 500);
        }
        else edit_coment(id);
    });

    //	Удаление комента
    $(document).on("click", ".single-comment .delete_comment", function(event) {
        //commentCancel();
        if (confirm("Вы уверены, что хотите удалить комментарий?")) {
            var id = $(event.target).parents("ol").get(0).id;
            $.ajax({
                url:     "/ajax/comment-delete",
                headers: {'X-CSRF-Token': $("input[name = '_token']").val()},
                type:     "POST",
                data: {comment_id: id}
            })
            .done(function(data) {
                if(data.succes){
                    $("." + id).hide(500);
                }else if(data.errors){
                    errors_list(data.errors);
                }else{
                    errors_list('Произошла ошибка. Перегрузите страницу и повторите попытку, пожалуйста!');
                }
            })
            .fail(function(xhr, ajaxOptions, thrownError) {
                fail_list(xhr.responseText);
                //console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            });
        }
    });

    //	Обрабатывает кнопку сохранения комента
    $(document).on("click", "#form_add_comment .dobcoment", function(event) {
        //return;
        event.preventDefault();
        var comment_id = $("#comment_id").val();
        var msg = $('#comment-form').serialize();

        if (comment_id != 0)
        {	//	Редактирование комента

            $.ajax({
                url:     "/ajax/comment-edit",
                headers: {'X-CSRF-Token': $("input[name = '_token']").val()},
                type:     "POST",
                data: msg
            })
            .done(function(data) {
                if(data.succes) {
                    $(tmp_comment).find(".comment-info p").html(data.succes);
                    commentCancel();
                    showFormComment();
                } else if(data.errors) {
                    errors_list(data.errors);
                } else {
                    errors_list('Неизвестная ошибка. Повторите попытку, пожалуйста!');
                }
            })
            .fail(function(xhr, ajaxOptions, thrownError) {
                fail_list(xhr.responseText);
                //console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            });
        }
        else
        {	//	Добавление комента
            var parent_id = $("#parent_id").val();
            var url = $(this).attr('data-url');
            $.ajax({
                url:     url,
                headers: {'X-CSRF-Token': $("input[name = '_token']").val()},
                type:     "POST",
                data: msg,
                beforeSend: function() {
                }
            })
            .done(function(data) {
                if(data.succes) {
                    commentCancel();
                    if (parent_id != 0) $(data.succes).appendTo("#" + parent_id).hide();
                    else $(data.succes).appendTo("#parent_coment").hide();
                    setTimeout(function () { $(".coment_blok").show(500) }, 500);
                } else if(data.errors) {
                    errors_list(data.errors);
                } else {
                    errors_list('Неизвестная ошибка. Повторите попытку, пожалуйста!');
                }
            })
            .fail(function(xhr, ajaxOptions, thrownError) {
                fail_list(xhr.responseText);
                //console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            });
        }
    });

    $(document).on("click", "#mc-submit", function(e) {
        e.preventDefault();

        $.ajax({
            url:     "/subscribe",
            headers: {'X-CSRF-Token': $("input[name = '_token']").val()},
            type:     "POST",
            data: {email: $("input[name = 'email']").val()}
        })
        .done(function(data) {
            if(data.succes){
                $("input[name = 'email']").val('');
                succes_list(data.succes);
            }else if(data.errors){
                errors_list(data.errors);
            }else{
                errors_list('Неизвестная ошибка. Повторите попытку, пожалуйста!');
            }
        })
        .fail (function(xhr, ajaxOptions, thrownError) {
            fail_list(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        });
    });
});

//	Функция открытия формы коментария
function showFormComment() {
    $("#form_add_comment").show(500);
    $("#form_add_comment #text").focus();
}
//	Функция закрытия формы коментария
function commentCancel() {
    if (tmp_comment) {
        var form = $("#form_add_comment").clone();
        $("#form_add_comment").hide(500, function() {
            $("#form_add_comment").replaceWith($(tmp_comment));
            $(tmp_comment).hide().show(500, function() {
                tmp_comment = null;
                $(form).appendTo("#parent_coment");
                $("#form_add_comment").hide();
            });
        });
    }
    $("#form_add_comment #parent_id").val(0);
    $("#email, #text").val("");
    $("#form_add_comment #comment_id").val(0);
    if ($('#form_add_comment').is(':visible')) $("#form_add_comment").hide(500);
}
function edit_coment (parent_id) {
    tmp_comment = $("." + parent_id).clone();
    $("#form_add_comment #comment_id").val(parent_id);
    var temp = $("." + parent_id + " .comment-info p").html();
        temp = temp.replace(/</g, "<");
        temp = temp.replace(/>/g, ">");
        temp = temp.replace(/&/g, "&");

    $("." + parent_id).hide(500, function() {
        $($("." + parent_id)).replaceWith($("#form_add_comment"));
        $("#form_add_comment #text").val(temp);
        $("#form_add_comment").show(500);
        $("#comment-form #text").focus();
    });
}

function reply_coment(parent_id) {
    $("#form_add_comment").appendTo("#" + parent_id);
    $("#form_add_comment #parent_id").val(parent_id);
    showFormComment();
}

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

function succes_list(data)
{
    $(function() {
        $("#Succes").html(data);
        $('#SuccesModal').modal('show')
    });
}

$(function(){   //Живой поиск
    $('.who').bind("change keyup input click", function()
    {
        if(this.value.length >= 3)
        {
            $.ajax({
                type: 'post',
                url: "/search",
                headers: {'X-CSRF-Token': $("input[name = '_token']").val()},
                data: {'search':this.value},
                success: function(data){
                    if(data.succes)
                    {
                        $(".search_result").html(data.succes).fadeIn();
                    }
                    else if(data.errors)
                    {
                         $(".search_result").html('<div class="alert alert-danger" role="alert">' + data.errors.search + '</div>')
                    }
                    else {
                        $(".search_result").html('');
                    }
                }
            });
        }
        else
        {
            $(".search_result").html('');
        }
    });

    // $(".search_result").hover(function()
    // {
    //     $(".who").blur(); //Убираем фокус с input
    // });
});