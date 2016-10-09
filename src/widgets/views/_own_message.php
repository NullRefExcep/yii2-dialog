<?php
/**
 *
 * @var  $canDelete        boolean
 * @var \nullref\dialog\models\Message $model
 */
use rmrevin\yii\fontawesome\FA;
use yii\helpers\Html;
use yii\helpers\Url;

?>


<div class="message pull-right well">
    <?php if ($canDelete): ?>
        <p>
            <?= Html::a(FA::i(FA::_TRASH), [
                '/dialog/message/delete',
                'id' => $model->id,
                'redirect_url' => Url::current(),
            ], [
                'class' => 'btn btn-xs btn-danger pull-right',
                'data-method' => 'post',
            ]) ?>
        </p>
    <?php endif ?>
    <?= nl2br(Html::encode($model->text)) ?>
    <p class="create-at"><?= Yii::$app->formatter->asDatetime($model->created_at, 'short') ?></p>
</div>
<div class="clearfix"></div>