<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

//$this->title = 'Создание товара';
//$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
//$this->params['breadcrumbs'][] = 'Создание товара';

?>

<?php if(Yii::$app->request->get('page') > 1): ?>
	<?php $this->beginBlock('canonical'); ?>
	<link rel="canonical" href="<?= \yii\helpers\Url::to(['blog/']) ?>" />
	<?php $this->endBlock(); ?>
<?php endif; ?>

					<div class="blog-post-area">
					<?php if (!empty($articles)): ?>
						<h2 class="title text-center">Новые записи Блога</h2>
						<?php foreach($articles as $article): ?>
						<div class="single-blog-post">
							<h3><?= $article->title ?></h3>
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-user"></i> <?= $article->user->username ?></li>
									<li><i class="fa fa-clock-o"></i><?= date("g:i a", $article->date) ?></li>
									<li><i class="fa fa-calendar"></i> <?= getDates($article->date) ?></li>
								</ul>
								
							</div>
							<a href="<?= \yii\helpers\Url::to(['blog/view', 'id' => $article->id]) ?>">
								<?php $img = $article->getImage(); ?>
								<?= Html::img($img->getUrl('1200x500'), ['alt' => $article->title])?>
							</a>
							<p><?= $article->small_text ?></p>
							<a class="btn btn-primary" href="<?= \yii\helpers\Url::to(['blog/view', 'id' => $article->id]) ?>">Читать статью полностью</a>
						</div>
						<?php endforeach;?>

						<div class="pagination-area">
							<?php echo \yii\widgets\LinkPager::widget(['pagination' => $pages,]); ?>
						</div>
						
					<?php else: ?>
						<h2>
							Пока нет записей в блоге!
						</h2>
					<?php endif;?>
 					</div>