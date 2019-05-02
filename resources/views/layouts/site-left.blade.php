@extends('layouts.site')

@section('breadcrumb')
    <div class="breadcrumb-tow mb-3">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content breadcrumb-content-tow">
                        <ul>
                            <li><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
                            @yield('breadcrumb-content')
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <!--Blog Area Start-->
    <div class="blog-area white-bg pt-4 pb-0 mb-70">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-9 order-lg-2">

                    @yield('section-title')

                    @yield('left-content')

                </div>
                <!--Blog Sidebar Start-->
                <div class="col-lg-3 order-lg-1">
                    <div class="blog_sidebar">
                        <div class="row_products_side">
                            <div class="product_left_sidbar">
                                @section('left_sidbar')
                                    @include('components.left_sidbar')
                                @show
                            </div>
                        </div>
                    </div>
                </div>
                <!--Blog Sidebar End-->
            </div>
        </div>
    </div>
    <!--Blog Area End-->
@endsection