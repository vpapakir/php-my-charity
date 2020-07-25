<?php

namespace app\modules\volunteer\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\volunteer\models\Volunteer;

/**
 * VolunteerSearch represents the model behind the search form about `app\modules\volunteer\models\Volunteer`.
 */
class VolunteerSearch extends Volunteer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id', 'Country', 'UserId'], 'integer'],
            [['FirstName', 'LastName', 'State', 'City', 'Email', 'Address', 'Pincode', 'EnteredOn'], 'safe'],
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
        $query = Volunteer::find();

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

        $query->andFilterWhere(['like', 'FirstName', $this->FirstName])
            ->andFilterWhere(['like', 'LastName', $this->LastName])
            ->andFilterWhere(['like', 'State', $this->State])
            ->andFilterWhere(['like', 'City', $this->City])
            ->andFilterWhere(['like', 'Email', $this->Email])
            ->andFilterWhere(['like', 'Address', $this->Address])
            ->andFilterWhere(['like', 'Pincode', $this->Pincode]);

        return $dataProvider;
    }
}
