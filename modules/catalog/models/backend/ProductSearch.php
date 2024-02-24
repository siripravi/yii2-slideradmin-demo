<?php

namespace app\modules\catalog\models\backend;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Product;

/**
 * ProductSearch represents the model behind the search form about `app\models\Product`.
 */
class ProductSearch extends Product
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'model_id', 'brand_id', 'available', 'currency_id', 'created_at', 'updated_at', 'position', 'enabled'], 'integer'],
            [['slug', 'code', 'name', 'title', 'keywords', 'description', 'text'], 'safe'],
            [['price', 'old_price'], 'number'],
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
        $query = Product::find();

        $query->joinWith('translations');
        $query->joinWith('modelLang');

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
            'product.id' => $this->id,
            'product.model_id' => $this->model_id,
            'price' => $this->price,
            'old_price' => $this->old_price,
            'available' => $this->available,
            'currency_id' => $this->currency_id,
            'product.created_at' => $this->created_at,
            'product.updated_at' => $this->updated_at,
            'product.position' => $this->position,
            'product.enabled' => $this->enabled,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['or', ['like', 'product_lang.name', $this->name], ['like', 'model_lang.name', $this->name]])
            ->andFilterWhere(['or', ['like', 'product_lang.title', $this->title], ['like', 'model_lang.title', $this->title]])
            ->andFilterWhere(['or', ['like', 'product.url', $this->slug], ['like', 'model.url', $this->slug]])
            ->andFilterWhere(['or', ['=', 'product.brand_id', $this->brand_id], ['=', 'model.brand_id', $this->brand_id]]);

        return $dataProvider;
    }
}
