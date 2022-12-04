<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \yii\widgets\MaskedInput;
use \kartik\date\DatePicker;

/** @var yii\web\View $this */
/** @var app\models\Cursos $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="cursos-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="form-control">
        <div class="row">
            <div class="col-md-3">
                <?php echo $form->field($model, 'data_inicio')->widget(DatePicker::classname(), [
                    'options' => ['placeholder' => 'Data Início'],
                    'language' => 'pt-BR',
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
                <?php
                if (!$model->isNewRecord){
                    echo Html::a('Delete', ['delete', 'codigo_curso' => $model->codigo_curso], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Você tem certeza que deseja excluir este item?',
                            'method' => 'post',
                        ],
                    ]);
                } ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
