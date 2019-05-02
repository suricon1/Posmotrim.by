<div class="input-group input-group-sm mb-2">
    <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">{{$modification->name}}</span>
        <span class="input-group-text" id="">Цена</span>
    </div>
    <input type="number" value="{{$modification->price}}" class="form-control">
    <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon2">шт</span>
    </div>
    <input type="number" value="{{$modification->quantity}}" class="form-control">
    <div class="input-group-append" id="button-addon4">
        <button class="btn btn-outline-secondary" type="button"><i class="fa fa-refresh"></i></button>
        <button class="btn btn-outline-secondary" type="button"><i class="fa fa-times"></i></button>
    </div>
</div>