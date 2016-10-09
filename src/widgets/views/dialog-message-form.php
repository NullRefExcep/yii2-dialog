<?php
/**
 *
 * @var \nullref\dialog\models\MessageForm $messageForm
 * @var \nullref\dialog\widgets\Dialog $dialog
 */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>

<div class="dialog-message-form">
    <?php $form = ActiveForm::begin([
        'action' => ['/dialog/message/create', 'dialog_id' => $dialog->id, 'redirect_url' => Url::current()],
    ]) ?>
    <?= $form->field($messageForm, 'userId')->hiddenInput()->label(false) ?>
    <?= $form->field($messageForm, 'text')->textarea() ?>
    <?= Html::submitButton(Yii::t('dialog', 'Send'), ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end() ?>
</div>
