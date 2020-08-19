<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property string|null $payment_status
 * @property string|null $status
 * @property int|null $cancel_by
 * @property string|null $date
 * @property int $user_id
 *
 * @property User $user
 * @property OrderDetail[] $orderDetails
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['payment_status', 'status'], 'string'],
            [['cancel_by', 'user_id'], 'integer'],
            [['date'], 'safe'],
            [['user_id'], 'required'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'payment_status' => 'Payment Status',
            'status' => 'Status',
            'cancel_by' => 'Cancel By',
            'date' => 'Date',
            'user_id' => 'User ID',
        ];
    }
    public static function allDataOrder(){
//        Yii::$app->db->createCommand('');
        $dataOrder = Order::find()->select(['DATE_FORMAT([[date]], "%e") as day',
            'DATE_FORMAT([[date]], "%m") as month','DATE_FORMAT([[date]], "%Y") as year',
            'count(order_detail.id) as amount_cat','count(distinct order.id) as amount_order','date as text_date'])
            ->innerJoin( 'order_detail', 'order.id = order_detail.order_id')
            ->groupBy('order.date')
            ->orderBy('order.date')
            ->asArray()
            ->all();

        return $dataOrder;
    }
    public static function getDataForSummaryRevenue(){
        $dataY = Order::find()
            ->select(['join_year.yearlyPrice as yearlyPrice',
                'DATE_FORMAT({{order.date}}, "%Y") as year', 'DATE_FORMAT({{order.date}}, "%m") as month', 'DATE_FORMAT({{order.date}}, "%d") as day'])
            ->innerJoin('order_detail','order.id = order_detail.order_id')
            ->innerJoin('cat','order_detail.cat_id = cat.id')
            ->innerJoin('(
                select `order`.`id` as id ,SUM(`cat`.`price`) as yearlyPrice, DATE_FORMAT(`order`.`date`, "%Y") as year from cat 
                inner join order_detail on `order_detail`.`cat_id` = `cat`.`id` 
                inner join order on `order`.`id` = `order_detail`.`order_id`
                group by year
            ) join_year', 'join_year.id = order.id')
//            ->where(['order.payment_status' => '0'])
            ->groupBy(['year'])
            ->orderBy('year')
            ->asArray()->all();

        $dataM = Order::find()
            ->select(['join_month.monthlyPrice as monthlyPrice',
                'DATE_FORMAT({{order.date}}, "%Y") as year', 'DATE_FORMAT({{order.date}}, "%m") as month', 'DATE_FORMAT({{order.date}}, "%d") as day'])
            ->innerJoin('order_detail','order.id = order_detail.order_id')
            ->innerJoin('cat','order_detail.cat_id = cat.id')
            ->innerJoin('(
                select `order`.`id` as id ,SUM(`cat`.`price`) as monthlyPrice, DATE_FORMAT(`order`.`date`, "%M") as month from cat 
                inner join order_detail on `order_detail`.`cat_id` = `cat`.`id` 
                inner join order on `order`.`id` = `order_detail`.`order_id`
                group by month
            ) join_month', 'join_month.id = order.id')
            ->groupBy(['month'])
            ->orderBy('year, month')
            ->asArray()->all();

        $dataD = Order::find()
            ->select(['join_day.dailyPrice as dailyPrice',
                'DATE_FORMAT({{order.date}}, "%Y") as year', 'DATE_FORMAT({{order.date}}, "%m") as month', 'DATE_FORMAT({{order.date}}, "%d") as day'])
            ->innerJoin('order_detail','order.id = order_detail.order_id')
            ->innerJoin('cat','order_detail.cat_id = cat.id')
            ->innerJoin('(
                select `order`.`id` as id, `order`.`date` ,SUM(`cat`.`price`) as dailyPrice, DATE_FORMAT(`order`.`date`, "%d") as day from cat 
                inner join order_detail on `order_detail`.`cat_id` = `cat`.`id` 
                inner join order on `order`.`id` = `order_detail`.`order_id`
                group by `order`.`date`
            ) join_day', 'join_day.id = order.id')
            ->orderBy('year, month, day')
            ->groupBy(['order.date'])
            ->asArray()->all();

        return ['yearly'=> $dataY, 'monthly' => $dataM, 'daily'=>$dataD];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Gets query for [[OrderDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderDetails()
    {
        return $this->hasMany(OrderDetail::className(), ['order_id' => 'id']);
    }
}
