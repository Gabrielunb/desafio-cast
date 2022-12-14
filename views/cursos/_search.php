<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \kartik\date\DatePicker;

/** @var yii\web\View $this */
/** @var app\models\CursosSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="cursos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="form-control">
        <div class="row">
            <div class="col-md-12">
                <?= $form->field($model, 'descricao_assunto')->textInput() ?>
            </div>
            <div class="col-md-3">
                <?php echo $form->field($model, 'data_inicio')->widget(DatePicker::classname(), [
                    'options' => ['placeholder' => 'Data Início'],
                    'language' => 'pt-BR',
                    'value' => !empty($model->data_inicio) ? $model->data_inicio = date('d/m/Y', strtotime($model->data_inicio)) : '',
                    'pickerIcon' => '<i class="fas fa-calendar-alt text-primary"></i>',
                    'removeIcon' => '<i class="fas fa-trash text-danger"></i>',
                    'pluginOptions' => [
                        'format' => 'dd/mm/yyyy',
                        'autoclose' => true,
                    ]
                ]);
                ?>
            </div>
            <div class="col-md-3">
                <?php echo $form->field($model, 'data_termino')->widget(DatePicker::classname(), [
                    'options' => ['placeholder' => 'Data Término'],
                    'language' => 'pt-BR',
                    'value' => !empty($model->data_termino) ? $model->data_termino = date('d/m/Y', strtotime($model->data_termino)) : '',
                    'pickerIcon' => '<i class="fas fa-calendar-alt text-primary"></i>',
                    'removeIcon' => '<i class="fas fa-trash text-danger"></i>',
                    'pluginOptions' => [
                        'format' => 'dd/mm/yyyy',
                        'autoclose' => true,
                    ]
                ]);
                ?>
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
    </div>
    <?php ActiveForm::end(); ?>

</div>
