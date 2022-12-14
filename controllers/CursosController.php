<?php

namespace app\controllers;

use app\models\Cursos;
use app\models\CursosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use function PHPUnit\Framework\isEmpty;

/**
 * CursosController implements the CRUD actions for Cursos model.
 */
class CursosController extends Controller
{

    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Cursos models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CursosSearch();
        $params = $this->request->queryParams;
        $dataProvider = $searchModel->search($params);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Cursos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Cursos();
        $post = $this->request->post();

        if ($model->load($post)) {
            $model->data_inicio = date('Y-m-d', strtotime(strtr($model->data_inicio, '/', '-')));
            $model->data_termino = date('Y-m-d', strtotime(strtr($model->data_termino, '/', '-')));
            if ($model->save() ) {
                return $this->redirect(['index']);
            }else{
                $model->data_inicio = date('d/m/Y', strtotime($model->data_inicio));
                $model->data_termino = date('d/m/Y', strtotime($model->data_termino));
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Cursos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $codigo_curso Codigo Curso
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($codigo_curso)
    {
        $model = $this->findModel($codigo_curso);
        $post = $this->request->post();

        $model->data_inicio = date('d/m/Y', strtotime($model->data_inicio));
        $model->data_termino = date('d/m/Y', strtotime($model->data_termino));

        if ($model->load($post)) {
            $model->data_inicio = date('Y-m-d', strtotime(strtr($model->data_inicio, '/', '-')));
            $model->data_termino = date('Y-m-d', strtotime(strtr($model->data_termino, '/', '-')));
            if ($model->save()) {
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Cursos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $codigo_curso Codigo Curso
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($codigo_curso)
    {
        $this->findModel($codigo_curso)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Cursos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $codigo_curso Codigo Curso
     * @return Cursos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($codigo_curso)
    {
        if (($model = Cursos::findOne(['codigo_curso' => $codigo_curso])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
