<?php

use yii\helpers\Html;

?>
			<?php if (!empty($article)): ?>
                <div class="blog-post-area">
                    <h2 class="title text-center"><?= $article->title ?></h2>
                    <div class="single-blog-post">
                        <div class="post-meta">
                            <ul>
                                <li><i class="fa fa-user"></i> <?= $article->user->username ?></li>
                                <li><i class="fa fa-clock-o"></i><?= date("g:i a", $article->date) ?> </li>
                                <li><i class="fa fa-calendar"></i><?= getDates($article->date) ?></li>
                            </ul>

                        </div>

                        <?= Html::img($article->getImage()->getUrl('1200x500'), ['alt' => $article->title])?>

                        <p><?= $article->text ?></p>

                        <!-- <div class="pager-area">
                            <ul class="pager pull-right">
                               <li><a href="#">Pre</a></li>
                                <li><a href="#">Next</a></li>
                            </ul>
                        </div>-->
                    </div>
                </div><!--/blog-post-area-->

                <div class="rating-area"></div><!--/rating-area-->

                <?= $this->render('@app/views/components/comments.php', compact('comments', 'article')); ?>

			<?php else: ?>
                <h2>Статьи не существует!</h2>
			<?php endif;?>
