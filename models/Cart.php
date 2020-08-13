<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Cart".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $cat_id
 */
class Cart extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Cart';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'cat_id'], 'integer'],
            [['date'],'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'cat_id' => 'Cat ID',
            'date' => 'Date',   
        ];
    }
}
