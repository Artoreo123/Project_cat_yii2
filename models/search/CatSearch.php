<?php


namespace app\models\search;


use app\Helper\Helper;
use app\models\Cat;
use app\models\Test;
use yii\data\ActiveDataProvider;

class CatSearch extends Cat
{
    public $search;

    public function rules()
    {
        return [
            [['id','status'], 'integer'],
            [['name','type','color','weight','birthday','search'], 'safe'], // self คือ จะเป็นค่าอะไรก็ได้

        ];
    }

    public function search($params)
    {
        $query = Cat::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->search = \Yii::$app->request->get('search');

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
//        $query->andFilterWhere([
//            'id' => $this->id,
//        ]);
//        $query->andFilterWhere(['like', 'name', $this->name]);
//        $query->andFilterWhere(['like', 'type', $this->type]);
//        $query->andFilterWhere(['like', 'color', $this->color]);
//        $query->andFilterWhere(['like', 'weight', $this->weight]);
////        $this->birthday = 'yyyy-mm-dd';
//        $query->andFilterWhere(['like', 'birthday', Helper::changeReFormat($this->birthday)]);
        $query->orFilterWhere(['like', 'name', $this->search])
            ->orFilterWhere(['like', 'type', $this->search])
            ->orFilterWhere(['like', 'color', $this->search])
            ->orFilterWhere(['like', 'weight', $this->search])
            ->orFilterWhere(['like', 'price', $this->search])
        ->andFilterWhere(['status'=> 1]);
//            ->Where(['status',1]);

//        $query->where('name', 'like', '%' . $keyword . '%')->paginate($perPage);// WHERE LIKE !!!

        return $dataProvider;
    }
}