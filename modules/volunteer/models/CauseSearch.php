<?php

namespace app\modules\volunteer\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\volunteer\models\Cause;

/**
 * CauseSearch represents the model behind the search form about `app\modules\volunteer\models\Cause`.
 */
class CauseSearch extends Cause
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CauseId', 'NgoName', 'RegisterBy', 'Reason'], 'integer'],
            [['CauseTitle', 'CauseDescription', 'Image', 'RegisterType', 'Promoters', 'RegisterOn', 'ApprovedOn', 'Status', 'EndDate'], 'safe'],
            [['DonationCollected', 'DonationRequired'], 'number'],
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
        $query = Cause::find();

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
            'CauseId' => $this->CauseId,
            'NgoName' => $this->NgoName,
            'RegisterBy' => $this->RegisterBy,
            'DonationCollected' => $this->DonationCollected,
            'RegisterOn' => $this->RegisterOn,
            'Reason' => $this->Reason,
            'ApprovedOn' => $this->ApprovedOn,
            'DonationRequired' => $this->DonationRequired,
            'EndDate' => $this->EndDate,
        ]);

        $query->andFilterWhere(['like', 'CauseTitle', $this->CauseTitle])
            ->andFilterWhere(['like', 'CauseDescription', $this->CauseDescription])
            ->andFilterWhere(['like', 'Image', $this->Image])
            ->andFilterWhere(['like', 'RegisterType', $this->RegisterType])
            ->andFilterWhere(['like', 'Promoters', $this->Promoters])
            ->andFilterWhere(['like', 'Status', $this->Status]);

        return $dataProvider;
    }
}
