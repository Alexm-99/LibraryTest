<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Genero;

/**
 * GeneroBuscar represents the model behind the search form of `app\models\Genero`.
 */
class GeneroBuscar extends Genero
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_genero', 'genero', 'id_libro'], 'safe'],
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
        $query = Genero::find();

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

        // grid filtering conditions
        $query->andFilterWhere(['like', 'id_genero', $this->id_genero])
            ->andFilterWhere(['like', 'genero', $this->genero])
            ->andFilterWhere(['like', 'id_libro', $this->id_libro]);

        return $dataProvider;
    }
}
