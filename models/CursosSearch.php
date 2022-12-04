<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cursos;

/**
 * CursosSearch represents the model behind the search form of `app\models\Cursos`.
 */
class CursosSearch extends Cursos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codigo_curso', 'qtd_turma', 'codigo_categoria'], 'integer'],
            [['data_inicio', 'data_termino'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Cursos::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        $this->load($params);


        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        if ($this->data_inicio){
            $this->data_inicio = date('Y-m-d', strtotime(strtr($this->data_inicio, '/', '-')));
        }
        if ($this->data_termino){
            $this->data_termino = date('Y-m-d', strtotime(strtr($this->data_termino, '/', '-')));
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'codigo_curso' => $this->codigo_curso,
            'data_inicio' => $this->data_inicio,
            'data_termino' => $this->data_termino,
            'qtd_turma' => $this->qtd_turma,
            'codigo_categoria' => $this->codigo_categoria,
        ]);

        return $dataProvider;
    }
}
