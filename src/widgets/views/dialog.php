<?php
/**
 * @var  $this            \yii\web\View
 * @var  $dialog           \nullref\dialog\models\Dialog
 * @var  $newMessageForm  \nullref\dialog\models\MessageForm
 * @var  $widget          \nullref\dialog\widgets\Dialog
 * @var  $user            \nullref\dialog\interfaces\UserModel|null
 */
use nullref\dialog\widgets\DialogMessageForm;
use nullref\dialog\widgets\Messages;

?>

<div class="dialog" data-dialog-id="<?= $dialog->id ?>" id="<?= $widget->getId() ?>">
    <?= Messages::widget([
        'dialog' => $dialog,
        'user' => $user,
        'canDelete' => $widget->canDelete,
    ]) ?>
    <?php if ($widget->canWrite): ?>
        <?= DialogMessageForm::widget(['dialog' => $dialog, 'user' => $user]) ?>
    <?php endif ?>
</div>
