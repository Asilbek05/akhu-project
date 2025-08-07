<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ApplicationRequests;

class ApplicationRequestsSearch extends ApplicationRequests
{
    public $status;
    public $name;
    public $phone;

    public function rules()
    {
        return [
            [['name', 'phone'], 'safe'],
            [['status'], 'integer'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = ApplicationRequests::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 9],
            'sort' => ['defaultOrder' => ['created_at' => SORT_DESC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }
        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'phone', $this->phone]);

        if ($this->status !== null && $this->status !== '') {
            $query->andWhere(['status' => $this->status]);
        }

        return $dataProvider;
    }
}
