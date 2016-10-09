<?php
/**
 *
 * @var \nullref\dialog\models\Message $model
 */
use yii\helpers\Html;

?>


<div class="message well pull-left">
    <?= nl2br(Html::encode($model->text)) ?>

    <p class="create-at"><?= Yii::$app->formatter->asDatetime($model->created_at, 'short') ?></p>
</div>
<div class="clearfix"></div>
