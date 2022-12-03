<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Cursos $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="cursos-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'data_inicio')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'data_termino')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'qtd_turma')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'codigo_categoria')->dropDownList(
                $model->dropDownListCategorias(),
                ['prompt' => 'Selecione']);
            ?>
        </div>
    </div>
    <div class="row space">
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
