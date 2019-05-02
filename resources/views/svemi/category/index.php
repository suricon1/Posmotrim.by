<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

//$this->title = 'Создание товара';
//$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
//$this->params['breadcrumbs'][] = 'Создание товара';  

?>
<?php $this->beginBlock('h1'); ?>
    <h1 class="title text-center">
        Авторские украшения ручной работы из бисера и натуральных камней
    </h1>
<?php $this->endBlock(); ?>

<?php if (count($slaiders) > 0): ?>
<section id="slider"><!--slider-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">

				    <?php for($i=0; $i<count($slaiders); $i++): ?>
                        <li data-target="#slider-carousel" data-slide-to="<?= $i ?>" <?php if($i == 0) echo 'class="active"'; ?>></li>
					<?php endfor;?>

                    </ol>

                    <div class="carousel-inner">
                      
                       <?php foreach($slaiders as $slaider): ?>
                       <?php $slaiderImg = $slaider->getImage(); ?>
                        <div class="item <?php if ($slaider->id == 1 ) echo 'active' ?>">
                            <div class="col-sm-6">
                                <h2><?= $slaider->title ?></h2>
                                <p><?= $slaider->text ?></p>
                                <!--<button type="button" class="btn btn-default get">Получи это сейчас</button>-->
                            </div>
                            <div class="col-sm-6 carousel-inner-img" id="">
                                <?= Html::img($slaiderImg->getUrl('480x'), ['alt' => $slaider->title])?>
                                <!--<img src="images/home/pricing.png"  class="pricing" alt="" />-->
                            </div>
                        </div>
                        <?php endforeach;?>

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
</section><!--/slider-->
<?php endif; ?>

<!--category-tab-->
<?php if($tabs): ?>

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

<?php endif; ?>
<!--/category-tab-->

<?php if( !empty($hits) ): ?>
<div class="features_items"><!--features_items-->
    <h2 class="title text-center">Новинки на сайте</h2>

    <?php foreach($hits as $hit): ?>
        <?= \Yii::$app->view->renderFile('@app/views/components/product-cart.php', ['product' => $hit]); ?>
    <?php endforeach;?>


</div><!--features_items-->
<?php endif; ?>