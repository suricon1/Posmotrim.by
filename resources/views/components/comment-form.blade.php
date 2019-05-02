<h3>Оставить комментарий</h3>

{!! Form::open(['route' => 'comment.add', 'id' => 'comment-form']) !!}

<input type="hidden" name="post_id" value="{{$id}}">
<input type="hidden" name="product_id" value="{{$id}}">
<input type="hidden" value name="parent_id" id="parent_id">
<input type="hidden" value="0" name="comment_id" id="comment_id">


<p class="comment-note"><span id="email-notes">Ваш электронный адрес не будет опубликован.</span><br> Обязательные для заполнения поля помечены: <span class="red">*</span></p>
<div class="row">

    @guest
    <div class="col-md-6">
        <div class="single-input">
            <label>Имя</label>
            <input name="name" id="name" type="text" value="Гость">
        </div>
    </div>
    <div class="col-md-6">
        <div class="single-input">
            <label>E-mail<span class="red"> *</span></label>
            <input name="email" id="email" type="email">
        </div>
    </div>
    @endguest

    <div class="col-md-12">
        <div class="single-input">
            <label>Коментарий<span class="red"> *</span></label>
            <textarea class="" name="text" placeholder="Ваш комментарий... " id="text" cols="30" rows="5"></textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="single-input">
            <button class="form-button dobcoment" data-url="{{$url}}" type="submit">Добавить комментарий</button>
        </div>
    </div>
    <img id="loader" style="margin: 0 auto; display: none" src="/img/loader.gif">
</div>
{!! Form::close() !!}