<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_detail".
 *
 * @property int $id
 * @property string|null $status
 * @property string|null $created_at
 * @property int|null $create_by
 * @property string|null $order_detailcol
 * @property int $order_id
 * @property int $cat_id
 *
 * @property Cat $cat
 * @property Order $order
 */
class OrderDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'order_id', 'cat_id'], 'required'],
            [['id', 'created_by', 'order_id', 'cat_id'], 'integer'],
            [['status'], 'string'],
            [['created_at'], 'safe'],
            [['id', 'order_id', 'cat_id'], 'unique', 'targetAttribute' => ['id', 'order_id', 'cat_id']],
            [['cat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cat::className(), 'targetAttribute' => ['cat_id' => 'id']],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['order_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'order_id' => 'Order ID',
            'cat_id' => 'Cat ID',
        ];
    }

    /**
     * Gets query for [[Cat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCat()
    {
        return $this->hasOne(Cat::className(), ['id' => 'cat_id']);
    }

    /**
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }
}
