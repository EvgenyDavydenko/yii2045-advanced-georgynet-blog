<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var yii\web\View $this */
/* @var yii\widgets\ActiveForm $form */
/* @var \frontend\models\CommentForm $model */
?>

<div class="comment-form">

    <?php
    $form = ActiveForm::begin(['action' => $model->action]);
    ?>

    <?= $form->field($model, 'pid')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>
    <?= $form->field($model, 'content')->textarea(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton('Publish', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>