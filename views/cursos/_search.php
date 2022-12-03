<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\CursosSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="cursos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'codigo_curso') ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'data_inicio') ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'data_termino') ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'qtd_turma') ?>
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
            <?= Html::submitButton('Pesquisar', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('Resetar', ['class' => 'btn btn-outline-secondary']) ?>
            <?= Html::a('Cadastrar Curso', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
