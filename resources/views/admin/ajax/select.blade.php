{{Form::select('city_id',
    $citys,
    null,
    [
        'class' => 'form-control select2',
        'style' => 'width: 100%',
        'placeholder' => '-- Выберите город --',
        'id' => 'city'
    ])
}}