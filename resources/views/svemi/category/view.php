<?php
    use yii\helpers\Url;
?>

<?php if(Yii::$app->request->get('page') > 1): ?>
    <?php $this->beginBlock('canonical'); ?>
        <link rel="canonical" href="<?= \yii\helpers\Url::to(['category/view', 'id' => $category->id]) ?>" />
    <?php $this->endBlock(); ?>
<?php endif?>

<nav class="breadcrumbs">
    <ol class="breadcrumb">
        <li><a href="<?= Url::home()?>"><i class="fa fa-home"></i></a></li>

        <?php if ($parent_categori): ?>
        <li><a href="<?= Url::to(['category/view', 'id' => $parent_categori->id])?>"><?= $parent_categori->name?></a></li>
        <?php endif; ?>

        <li class="active"><?= $category->name?></li>
    </ol>
</nav>

<div class="features_items"><!--features_items-->
    <h1 class="title text-center"><?= $category->name?></h1>

    <div class="register-req">

        <?php if(!Yii::$app->user->isGuest): ?>
        <a href="<?= Url::to(['/admin/category/update', 'id' => $category->id])?>" data-toggle="tooltip" data-original-title="Редактировать категорию: <?= $category->name?>" class="pull-right">
            <i class="fa fa-pencil"></i>
        </a>
        <?php endif;?>

        <p><i class="fa fa-hand-o-right"></i><?= $category->description?></p>
    </div>

    <div class="row">
        <?php if(!empty($products)): ?>
            <?php foreach($products as $product): ?>

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