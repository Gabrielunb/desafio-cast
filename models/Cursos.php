<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "cursos".
 *
 * @property int $codigo_curso
 * @property string $descricao_assunto
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
            [['descricao_assunto', 'data_inicio', 'data_termino', 'codigo_categoria'], 'required'],
            [['data_inicio', 'data_termino'], 'validateDate'],
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
            'descricao_assunto' => 'Descrição Assunto',
            'data_inicio' => 'Data Inicio',
            'data_termino' => 'Data Término',
            'qtd_turma' => 'Quantidade Turma',
            'codigo_categoria' => 'Codigo Categoria',
        ];
    }

    public function fields()
    {
        return [
            'Codigo Curso' => 'codigo_curso',
            'Descrição Assunto' => 'descricao_assunto',
            'Data Inicio' => 'data_inicio',
            'Data Término' => 'data_termino',
            'Quantidade Turma' => 'qtd_turma',
            'Codigo Categoria' => 'codigo_categoria',
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


    public function dropDownListCategorias()
    {
        $query = (new \yii\db\Query())
            ->select(['codigo_categoria', 'descricao'])
            ->from(Categorias::tableName())
            ->all();

        return ArrayHelper::map($query, 'codigo_categoria', 'descricao');
    }

    /**
     * Gets query for [descricao].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRelCategorias()
    {
        return $this->hasOne(Categorias::class, ['codigo_categoria' => 'codigo_categoria']);
    }

    public function validateDate($attribute, $params, $validator)
    {
        $inicio = strtotime(strtr($this->data_inicio, '/', '-'));
        $termino = strtotime(strtr($this->data_termino, '/', '-'));
        if (($inicio) > ($termino)) {
            $this->addError('data_inicio', 'Data início tem que ser menor que a data de término');
        } elseif ($inicio < strtotime(date('Y-m-d'))) {
            $this->addError('data_inicio', 'Data início menor que a data atual');
        }
    }

    public function verificaPeriodo()
    {
        $rows = (new \yii\db\Query())
            ->select('COUNT(*)')
            ->from(Cursos::tableName())
            ->where(['data_inicio' => $this->data_inicio])
            ->andFilterWhere(['data_termino' => $this->data_termino])
            ->count();

        return $rows;
    }

    public function validateDateApi()
    {
        $inicio = strtotime(strtr($this->data_inicio, '/', '-'));
        $termino = strtotime(strtr($this->data_termino, '/', '-'));
        if (($inicio) > ($termino)) {
            return [
                'error' => 'Data início tem que ser menor que a data de término.'
            ];
        } elseif ($inicio < strtotime(date('Y-m-d'))) {
            return [
                'error' => 'Data início menor que a data atual.'
            ];
        }
    }
}
