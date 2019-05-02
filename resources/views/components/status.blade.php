@if(session('status'))
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9 offset-lg-3">
                <div class="alert alert-info">
                    {{session('status')}}
                </div>
            </div>
        </div>
    </div>
@endif