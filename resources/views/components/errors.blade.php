@if(isset($errors) && $errors->all())
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9 offset-lg-3">
                <div class="alert alert-danger">
                    <ul class="error">
                        @foreach ($errors->all() as $error)
                            <li>{!! $error !!}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endif