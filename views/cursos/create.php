<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Cursos $model */

$this->title = 'Cadastrar Cursos';
?>
<div class="cursos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
