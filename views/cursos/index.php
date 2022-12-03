<?php

use app\models\Cursos;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\CursosSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Cursos';
?>
<div class="cursos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>

    </p>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    <br>
    <br>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'attribute' => 'codigo_curso',
            ],
            [
                'attribute' => 'qtd_turma',
            ],
            [
                'attribute' => 'data_inicio',
                'value' => function ($model) {
                    return date('d/m/Y', strtotime($model->data_inicio));
                }
            ],
            [
                'attribute' => 'data_termino',
                'value' => function ($model) {
                    return date('d/m/Y', strtotime($model->data_termino));
                }
            ],
            [
                //Descrição da categoria
                'attribute' => 'relCategorias.descricao',
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Cursos $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'codigo_curso' => $model->codigo_curso]);
                }
            ],
        ],
    ]); ?>
</div>
