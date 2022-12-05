<?php

namespace app\modules\api\controllers;

use app\models\Cursos;
use http\Url;
use yii\rest\ActiveController;

/**
 * Default controller for the `api` module
 */
class CursosController extends ActiveController
{
    public $modelClass = 'app\models\Cursos';

    public function actions()
    {
        $actions = parent::actions();
        unset(
            $actions['create'],
            $actions['update'],
            $actions['delete'],
        );
        return $actions;
    }

    public function actionCreate()
    {
        $model = new Cursos();
        $post = \Yii::$app->request->post();

        if ($model->load($post, '')) {
            //Convertendo data para o formato ano, mês e dia para salvar no banco
            $model->data_inicio = date('Y-m-d', strtotime(strtr($model->data_inicio, '/', '-')));
            $model->data_termino = date('Y-m-d', strtotime(strtr($model->data_termino, '/', '-')));
            //Verifica se tem curso com a mesma data
            $verifica = $model->verificaPeriodo();
            if ($verifica > 0) {
                return [
                    'name' => 'Not Found Exception',
                    'message' => 'Existe(m) curso(s) planejados(s) dentro do período informado.',
                    'code' => 0,
                    'status' => 422,
                ];
            } else {
                if ($model->save()) {
                    return $this->redirect(['index']);
                }
            }

        } else {
            $model->loadDefaultValues();
        }
    }

    public function actionUpdate(int $id)
    {
        $model = Cursos::findOne(['codigo_curso' => $id]);
        $post = \Yii::$app->request->post();

        if ($model->load($post, '')) {
            $model->data_inicio = date('Y-m-d', strtotime(strtr($model->data_inicio, '/', '-')));
            $model->data_termino = date('Y-m-d', strtotime(strtr($model->data_termino, '/', '-')));

            $verifica = $model->verificaPeriodo();

            if ($verifica > 0) {
                return [
                    'name' => 'Not Found Exception',
                    'message' => 'Existe(m) curso(s) planejados(s) dentro do período informado.',
                    'code' => 0,
                    'status' => 422,
                ];
            } else {
                if ($model->save()) {
                    return $this->redirect(['index']);
                } elseif ($model->errors) {
                    return $model->validateDateApi();
                }
            }
        } else {
            $model->loadDefaultValues();
        }
    }

    public function actionDelete($id)
    {
        $model = Cursos::findOne(['codigo_curso' => $id]);
        if($model){
            $model->delete();
            return [
                'message' => 'Curso apagado com sucesso.',
                'status' => 200,
            ];
        }else{
            return [
                'message' => 'Curso não entrado.',
                'status' => 423,
            ];
        }
    }
}
