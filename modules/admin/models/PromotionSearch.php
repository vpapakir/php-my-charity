<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Promotion;

/**
 * PromotionSearch represents the model behind the search form about `app\modules\admin\models\Promotion`.
 */
class PromotionSearch extends Promotion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id', 'CauseId', 'Promoter', 'FlagNgo', 'FlagAdmin'], 'integer'],
            [['Status', 'ApprovedOn', 'EnteredOn', 'Unique'], 'safe'],
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
        $query = Promotion::find();

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
            'CauseId' => $this->CauseId,
            'Promoter' => $this->Promoter,
            'ApprovedOn' => $this->ApprovedOn,
            'EnteredOn' => $this->EnteredOn,
            'FlagNgo' => $this->FlagNgo,
            'FlagAdmin' => $this->FlagAdmin,
        ]);

        $query->andFilterWhere(['like', 'Status', $this->Status])
            ->andFilterWhere(['like', 'Unique', $this->Unique]);

        return $dataProvider;
    }
}
