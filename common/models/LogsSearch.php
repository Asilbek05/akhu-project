<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Logs;

class LogsSearch extends Logs
{
    public function rules()
    {
        return [
            [['id', 'user_id', 'created_at'], 'integer'],
            [['action', 'message', 'ip', 'user_agent', 'level'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params, $level = null)
    {
        $query = Logs::find();

        if (Yii::$app->user->identity->role !== 'superadmin') {
            $query->andWhere(['user_id' => Yii::$app->user->id]);
        }

        if ($level) {
            $query->andWhere(['level' => $level]);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 10],
            'sort' => ['defaultOrder' => ['created_at' => SORT_DESC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['id' => $this->id]);
        $query->andFilterWhere(['like', 'message', $this->message]);

        return $dataProvider;
    }




}
