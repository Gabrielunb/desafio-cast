<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "cursos".
 *
 * @property int $codigo_curso
 * @property string $data_inicio
 * @property string $data_termino
 * @property int|null $qtd_turma
 * @property int $codigo_categoria
 *
 * @property Categorias $codigoCategoria
 */
class Cursos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cursos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data_inicio', 'data_termino', 'codigo_categoria'], 'required'],
            [['data_inicio', 'data_termino'], 'safe'],
            [['qtd_turma', 'codigo_categoria'], 'integer'],
            [['codigo_categoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categorias::class, 'targetAttribute' => ['codigo_categoria' => 'codigo_categoria']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'codigo_curso' => 'Codigo Curso',
            'data_inicio' => 'Data Inicio',
            'data_termino' => 'Data Termino',
            'qtd_turma' => 'Quantidade Turma',
            'codigo_categoria' => 'Codigo Categoria',
        ];
    }

    /**
     * Gets query for [[CodigoCategoria]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCodigoCategoria()
    {
        return $this->hasOne(Categorias::class, ['codigo_categoria' => 'codigo_categoria']);
    }

    public function dropDownListCategorias(){
        $query = (new \yii\db\Query())
            ->select(['codigo_categoria', 'descricao'])
            ->from(Categorias::tableName())
            ->all();

        return ArrayHelper::map($query, 'codigo_categoria', 'descricao');
    }

    public function validaDatas(){
        if(strtotime($this->data_inicio) < strtotime($this->data_termino)){
            $this->addError('start_date','Please give correct Start and End dates');
            $this->addError('end_date','Please give correct Start and End dates');
        }
    }
}
