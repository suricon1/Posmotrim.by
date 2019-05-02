@extends('svemi.layouts.layouts')

@section('title', 'Авторские украшения ручной работы из бисера и натуральных камней')
@section('key', 'Авторские украшения ручной работы из бисера и натуральных камней')
@section('desc', 'Авторские украшения ручной работы из бисера и натуральных камней')

@section('breadcrumbs', '')

@section('breadcrumb-content')
    <li class="active">title</li>breadcrumbs
@endsection

@section('h1')
    <h1 class="title text-center">Авторские украшения ручной работы из бисера и натуральных камней</h1>
@endsection

@section('content')

@if ($slaiders)
<section id="slider">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">

                        @foreach($slaiders as $slaider)
                        <li data-target="#slider-carousel" data-slide-to="{{$loop->index}}" @if($loop->first)class="active"@endif></li>
                        @endforeach

                    </ol>

                    <div class="carousel-inner">

                        @foreach($slaiders as $slaider)
                        <div class="item @if($loop->first) active @endif ">
                            <div class="col-sm-6">
                                <h2>{{$slaider->title}}</h2>
                                <p>{{$slaider->text}}</p>
                                <!--<button type="button" class="btn btn-default get">Получи это сейчас</button>-->
                            </div>
                            <div class="col-sm-6 carousel-inner-img" id="">
                                {{Html::image($slaider->getImage('480x480'), $slaider->title)}}
                            <!--<img src="images/home/pricing.png"  class="pricing" alt="" />-->
                            </div>
                        </div>
                        @endforeach

                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>
@endif

<!--category-tab-->
@if($tabs)

<div class="category-tab">
    <div class="col-sm-12">
        <ul class="nav nav-tabs nav-justified">
            <?php foreach($tabs as $tab): ?>
            <li <?php if ($tab->view) echo 'class="active"' ?>><a href="#<?= $tab->id ?>" data-toggle="tab"><?= $tab->title ?></a></li>
            <?php endforeach;?>
        </ul>
    </div>
    <div class="tab-content">
        <?php foreach($tabs as $tab): ?>
        <div class="tab-pane fade <?php if ($tab->view) echo 'active in' ?>" id="<?= $tab->id ?>" >
            <div class="support">
                <?= $tab->text ?>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</div>

@endif
<!--/category-tab-->

@if( !empty($hits) )
<div class="features_items"><!--features_items-->
    <h2 class="title text-center">Новинки на сайте</h2>

    @foreach($hits as $hit)
        @include('svemi.components.product-cart', ['product' => $hit])
    @endforeach


</div><!--features_items-->
@endif

@endsection