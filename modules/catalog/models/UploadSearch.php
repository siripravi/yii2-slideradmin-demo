<?php

namespace app\modules\catalog\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * UploadSearch represents the model behind the search form about `app\modules\catalog\models\Upload`.
 */
class UploadSearch extends Upload
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'file_id', 'user_id', 'tmp', 'created_at'], 'integer'],
            [['dir', 'name'], 'safe'],
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
        $query = Upload::find();

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
        $query->andFilterWhere([
            'id' => $this->id,
            'file_id' => $this->file_id,
            'user_id' => $this->user_id,
            'tmp' => $this->tmp,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'dir', $this->dir])
            ->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
