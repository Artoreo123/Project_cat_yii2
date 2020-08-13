<?php


namespace app\models\search;


use app\models\Cart;

use yii\data\ActiveDataProvider;

class CartSearch extends Cart
{
    public $search;

    public function rules()
    {
        return [
            [['id','user_id','cat_id'], 'integer'],

        ];
    }

    public function search($params)
    {
        $query = Cart::find();

        // add conditions that should always apply here

        $datacartProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->search = \Yii::$app->request->get('search');

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $datacartProvider;
        }
        $query->orFilterWhere(['like', 'user_id', $this->search])
            ->orFilterWhere(['like', 'cat_id', $this->search]);

        return $datacartProvider;
    }

}