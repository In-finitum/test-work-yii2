<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Авторизоваться';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <div style="display: flex; justify-content: center;" class="row">
        <div class="col-md-3">
            <h1><?= Html::encode($this->title) ?></h1>

            <p>Пожалуйста, заполните следующие поля для входа:</p>

            <div class="row">
                <div class="col-md-12">
                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>

                    <?= $form->field($model, 'rememberMe')->checkbox() ?>

                    <!--                <div style="color:#999;margin:1em 0">-->
                    <!--                    If you forgot your password you can --><?//= Html::a('reset it', ['site/request-password-reset']) ?><!--.-->
                    <!--                    <br>-->
                    <!--                    Need new verification email? --><?//= Html::a('Resend', ['site/resend-verification-email']) ?>
                    <!--                </div>-->

                    <div class="form-group">
                        <?= Html::a('зарегаться', ['signup'], ['class' => 'btn btn-primary']) ?>
                        <?= Html::submitButton('войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
        </div>
    </div>

    </div>
</div>
