<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(); ?>
                <?= $form->field($model, 'name')->textInput() ?>
               <div class="form-group">
                    <?= Html::submitButton('Add', ['class' => 'btn btn-primary', 'name' => 'add']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div> 