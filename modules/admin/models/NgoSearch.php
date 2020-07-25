<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Ngo;

/**
 * NgoSearch represents the model behind the search form about `app\modules\admin\models\Ngo`.
 */
class NgoSearch extends Ngo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id', 'Beneficiaries', 'Expenditure', 'PrimaryArea', 'OperatingState', 'UserId'], 'integer'],
            [['NgoName', 'City', 'State', 'Website', 'FirstName', 'LastName', 'Mobile', 'Email', 'RegistrationType', 'Valid12A', 'PanNumber', 'ProfilePic', 'EnteredOn'], 'safe'],
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
            'Beneficiaries' => $this->Beneficiaries,
            'Expenditure' => $this->Expenditure,
            'PrimaryArea' => $this->PrimaryArea,
            'OperatingState' => $this->OperatingState,
            'EnteredOn' => $this->EnteredOn,
            'UserId' => $this->UserId,
        ]);

        $query->andFilterWhere(['like', 'NgoName', $this->NgoName])
            ->andFilterWhere(['like', 'City', $this->City])
            ->andFilterWhere(['like', 'State', $this->State])
            ->andFilterWhere(['like', 'Website', $this->Website])
            ->andFilterWhere(['like', 'FirstName', $this->FirstName])
            ->andFilterWhere(['like', 'LastName', $this->LastName])
            ->andFilterWhere(['like', 'Mobile', $this->Mobile])
            ->andFilterWhere(['like', 'Email', $this->Email])
            ->andFilterWhere(['like', 'RegistrationType', $this->RegistrationType])
            ->andFilterWhere(['like', 'Valid12A', $this->Valid12A])
            ->andFilterWhere(['like', 'PanNumber', $this->PanNumber])
            ->andFilterWhere(['like', 'ProfilePic', $this->ProfilePic]);

        return $dataProvider;
    }
}