<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <div style="display: flex; justify-content: center;" class="row">
        <div class="col-md-3">
            <h1><?= Html::encode($this->title) ?></h1>

            <p>Пожалуйста, заполните следующие поля, чтобы зарегистрироваться:</p>

            <? if(isset($ageError)) : ?>
                <div class="alert alert-danger" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Ошибка:</span>
                    <?= $ageError ?>
                </div>
            <? endif; ?>

            <div class="row">
                <div class="col-lg-12">
                    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                    <!--                --><?//= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>

                    <?= $form->field($model, 'date')->widget(DatePicker::classname(),[
                        'name' => 'date',
                        'value' => date('Y-m-d'/*, strtotime('+2 days')*/),
                        'options' => ['placeholder' => 'Выберите дату ...'],
                        'pluginOptions' => [
                            'format' => 'yyyy-mm-dd',
                            'todayHighlight' => true
                        ],
                    ]);?>

                    <div class="form-group">
                        <?= Html::submitButton('зарегаться', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
