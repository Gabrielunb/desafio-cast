<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Entrar';
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="container">
        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'layout' => 'horizontal',
            'fieldConfig' => [
                'template' => "{label}\n{input}\n{error}",
                'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
                'inputOptions' => ['class' => 'col-lg-3 form-control'],
                'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
            ],
        ]); ?>
        <div class="row align-items-center">
        <div class="form-group">
                <div class="col-md-3">
                    <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Usuário') ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-3">
                    <?= $form->field($model, 'password')->passwordInput()->label('Senha') ?>
                </div>
            </div>
            <div class="form-group">
                <div class="com-md-3">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            </div>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>
