<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Cursos $model */

$this->title = 'Update Cursos: ' . $model->codigo_curso;
$this->params['breadcrumbs'][] = ['label' => 'Cursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->codigo_curso, 'url' => ['view', 'codigo_curso' => $model->codigo_curso]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cursos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
