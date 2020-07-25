<?php

namespace app\modules\ngo\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\ngo\models\Ngo;

/**
 * NgoSearch represents the model behind the search form about `app\modules\ngo\models\Ngo`.
 */
class NgoSearch extends Ngo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id', 'Country', 'UserId'], 'integer'],
            [['NgoName', 'Name', 'State', 'City', 'Email', 'Address', 'Pincode', 'EnteredOn'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Ngo::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'Id' => $this->Id,
            'Country' => $this->Country,
            'EnteredOn' => $this->EnteredOn,
            'UserId' => $this->UserId,
        ]);

        $query->andFilterWhere(['like', 'NgoName', $this->NgoName])
            ->andFilterWhere(['like', 'Name', $this->Name])
            ->andFilterWhere(['like', 'State', $this->State])
            ->andFilterWhere(['like', 'City', $this->City])
            ->andFilterWhere(['like', 'Email', $this->Email])
            ->andFilterWhere(['like', 'Address', $this->Address])
            ->andFilterWhere(['like', 'Pincode', $this->Pincode]);

        return $dataProvider;
    }
}
