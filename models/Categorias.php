<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categorias".
 *
 * @property int $codigo_categoria
 * @property string $descricao
 *
 * @property Cursos[] $cursos
 */
class Categorias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categorias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descricao'], 'required'],
            [['descricao'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'codigo_categoria' => 'Codigo Categoria',
            'descricao' => 'Descricao',
        ];
    }

    /**
     * Gets query for [[Cursos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCursos()
    {
        return $this->hasMany(Cursos::class, ['codigo_categoria' => 'codigo_categoria']);
    }
}
