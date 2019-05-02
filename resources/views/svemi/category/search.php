<?php use yii\helpers\Html; ?>

<div class="features_items"><!--features_items-->
    <h2 class="title text-center">Результаты Поиска по запросу: <?= Html::encode($q)?></h2>
    <?php if(!empty($products)): ?>
        <?php $i = 0; foreach($products as $product): ?>

            <?= \Yii::$app->view->renderFile('@app/views/components/product-cart.php', ['product' => $product]); ?>

            <?php $i++?>
            <?php if($i % 3 == 0): ?>
                <div class="clearfix"></div>
            <?php endif;?>
        <?php endforeach;?>
        <div class="clearfix"></div>
        <?php
        echo \yii\widgets\LinkPager::widget([
            'pagination' => $pages,
        ]);
        ?>
    <?php else :?>
        <h2>Ничего не найдено...</h2>
    <?php endif;?>
</div><!--features_items-->