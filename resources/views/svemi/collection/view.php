<?php use yii\helpers\Url; ?>

<?php if(Yii::$app->request->get('page') > 1): ?>
    <?php $this->beginBlock('canonical'); ?>
        <link rel="canonical" href="<?= Url::to(['collection/view', 'id' => $collection->id]) ?>" />
    <?php $this->endBlock(); ?>
<?php endif?>

<div class="features_items"><!--features_items-->
<h1 class="title text-center"><?= $collection->name?></h1>

    <div class="register-req">

        <?php if(!Yii::$app->user->isGuest): ?>
            <a href="<?= Url::to(['/admin/collections/update', 'id' => $collection->id])?>" data-toggle="tooltip" data-original-title="Редактировать коллекцию: <?= $collection->name?>" class="pull-right">
                <i class="fa fa-pencil"></i>
            </a>
        <?php endif;?>

        <p><i class="fa fa-hand-o-right"></i><?= $collection->meta_desk?></p>
    </div>

    <div class="row">
    <?php if(!empty($products)): ?>
        <?php $i = 0; foreach($products as $product): ?>

            <?= \Yii::$app->view->renderFile('@app/views/components/product-cart.php', ['product' => $product]); ?>

        <?php endforeach;?>
        <div class="clearfix"></div>
        <?php
            echo \yii\widgets\LinkPager::widget([
                'pagination' => $pages,
            ]);
        ?>
    <?php else :?>
        <h2>Здесь товаров пока нет...</h2>
    <?php endif;?>
    </div>
</div><!--features_items-->