<?php

use yii\helpers\Html;
use yii\helpers\Url;

$mainImg = $product->getImage();
$gallery = $product->getImages();

$this->registerCssFile( '@web/css/style.css' );
$this->registerJsFile( '@web/js/jquery.browser.min.js', [ 'depends' => 'yii\web\YiiAsset' ] );
$js = <<<JS
    $(document).ready(function(){
        $('.sliderpr').click(function(e){					/*------ 			Обрабатываем событие "Клик по элементу" 				------*/
            e.preventDefault();								/*------ 			Запрещаем запуск стандартного обработчика 				------*/
            var source = $(this).find('img').attr('src');	/*------ 			Берем изображение из аттрибута alt 					------*/
            $('#bigimage').attr('href',source);				/*------ 			Записываем изображение в большую картинку 				------*/
            $('#bigimageimg').attr('src',source);			/*------ 			Записываем изображение в ссылку на большую картинку 	------*/
            return false;									/*------ 			Возвращаем false 										------*/
        });
    });

    (function(d){
        var f = d.getElementsByTagName('SCRIPT')[0], p = d.createElement('SCRIPT');
        p.type = 'text/javascript';
        p.async = true;
        p.src = '//assets.pinterest.com/js/pinit.js';
        f.parentNode.insertBefore(p, f);
    }(document));
JS;
$this->registerJs( $js );
?>

<div class="product-details">
	<!--product-details-->
	<div class="row">
		<div class="col-sm-7">
			<div class="slidercontainer">
				<!-- крупное изображение -->
				<div class="img">
					<?= Html::img($mainImg->getUrl(), ['alt' => $product->name, 'id' => 'bigimageimg'])?>
				</div>
				<?php if(count($gallery) > 1):?>
				<!-- Миниатюры -->
				<div class="thumbs" style="max-height: 100px">
					<?php foreach($gallery as $img): ?>
					<div class="thumb">
						<a href="<?= $img->getUrl('700x') ?>" class='sliderpr fresco' data-fresco-group='example'>
                        <?= Html::img($img->getUrl('700x'), ['alt' => ''])?>
                        <div class="overlayit"></div>
                    </a>
					</div>
					<?php endforeach;?>
				</div>
				<?php endif;?>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="col-sm-5">
			<div class="product-information">
				<!--/product-information-->
				<?php if($product->new): ?>
				<?= Html::img("@web/images/home/new.png", ['alt' => 'Новинка', 'class' => 'newarrival'])?>
				<?php endif?>
				<?php if($product->sale): ?>
				<?= Html::img("@web/images/home/sale.png", ['alt' => 'Распродажа', 'class' => 'newarrival'])?>
				<?php endif?>
				<h1><?= $product->name?></h1>
				<span>
                    <?php if($product->price): ?>

                        <?php if(Yii::$app->params['sale']): ?>
                    <span>Стоимость: <nobr class="old-price"><?= $product->price?> Руб.</nobr></span>
                    <span>Новая цена со скидкой <?= Yii::$app->params['sale']?>%<br><?= $product->price * (100 - Yii::$app->params['sale'])/ 100?> Руб.</span>
                        <?php else: ?>
                    <span>Стоимость: <?= $product->price?> Руб.</span>
                        <?php endif?>

                    <?php endif?>
                    <!--<label>Quantity:</label>
                    <input type="text" value="1" id="qty" />
                    <a href="<?= Url::to(['cart/add', 'id' => $product->id])?>" data-id="<?= $product->id?>" class="btn btn-fefault add-to-cart cart">
                        <i class="fa fa-shopping-cart"></i>
                        Добавить в корзину
                    </a>-->
				</span>
				<!--<p><b>Condition:</b> New</p>-->
				<p><b>Категория:</b> <a href="<?= Url::to(['category/view', 'id' => $product->category->id]) ?>"><?= $product->category->name?></a></p>
                <a href="<?=Url::to(['/payment']) ?>">Доставка и оплата</a>
                <?php if($product->buy): ?>
				<h2> Где можно купить:</h2>
				<p><?= $product->buy?></p>
				<?php endif;?>
			</div>
			<!--/product-information -->
            <a href="https://www.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark"></a>
		</div>
	</div>
	<div class="row product-details-content">

        <div class="category-tab shop-details-tab"><!--category-tab-->
            <div class="col-sm-12">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#details" data-toggle="tab">Описание</a></li>
                    <li><a href="#reviews" data-toggle="tab">Отзывы (<?= count($comments) ?>)</a></li>
                </ul>
            </div>
            <div class="tab-content">

                <div class="tab-pane fade active in" id="details">
                    <div class="text-justify register-req">

                        <?php if(!Yii::$app->user->isGuest): ?>
                            <a href="<?= Url::to(['admin/product/update', 'id' => $product->id])?>" data-toggle="tooltip" data-original-title="Редактировать товар" class="pull-right">
                                <i class="fa fa-pencil"></i>
                            </a>
                        <?php endif;?>

                        <i class="fa fa-hand-o-right"></i>
                        <?= $product->content?>
                    </div>

                </div>

                <div class="tab-pane fade" id="reviews">
<!--                    <div class="col-sm-12">-->
                        <?= $this->render('@app/views/components/comments.php', compact('comments', 'product')); ?>
<!--                    </div>-->
                </div>
            </div>
        </div>
	</div>

</div> <!--/product-details-->
<div class="clearfix"></div>
<div class="recommended_items">
	<!--recommended_items-->
	<h2 class="title text-center">Самые новинки на сайте</h2>
	<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<?php $count = count($hits); $i = 0; foreach($hits as $hit): ?>
			<?php $img = $hit->getImage(); ?>

			<?php if($i % 3 == 0): ?>
			<div class="item <?php if($i == 0) echo 'active' ?>">
            <?php endif; ?>

            <?= \Yii::$app->view->renderFile('@app/views/components/product-cart.php', ['product' => $hit]); ?>

            <?php $i++; if($i % 3 == 0 || $i == $count): ?>
			</div>
			<?php endif; ?>

			<?php endforeach; ?>
		</div>
		<a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
		<a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
	</div>
</div> <!--/recommended_items-->