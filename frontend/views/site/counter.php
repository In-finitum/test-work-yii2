<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Счетчик';

?>

<div class="container">
    <div style="display: flex; justify-content: center;"  class="row">
        <div class="col-md-6">
            <div class="row text-center">
                <div class="col-md-12" style="font-size: 25em;">
                    <?= $counter?>
                </div>

                <div class="col-md-6">
                    <?php $form = ActiveForm::begin(['id' => 'counter-form']); ?>
                    <div class="form-group">
                        <?= Html::submitButton('+1', ['class' => 'btn btn-primary btn-block', 'name' => 'add-button', 'value' => 'add-button']) ?>
                        <!--        --><?//= Html::submitButton('Logout', ['class' => 'btn btn-primary', 'name' => 'logout-button', 'value' => 'logout-button']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>

                <div class="col-md-6">
                    <?php $form = ActiveForm::begin(['id' => 'counter-form', 'action' => '/site/logout', 'method' => 'post']); ?>
                    <div class="form-group">
                        <?= Html::submitButton('Выход', ['class' => 'btn btn-primary btn-block']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>

            </div>
        </div>
    </div>
</div>
