<?php


namespace app\models;


use trntv\filekit\behaviors\UploadBehavior;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class Cat extends ActiveRecord // extends ActiveRecord ทำให้ใช้คำสั่ง sql หรือ query ต่างๆได้ (เอาของเค้ามาใช้ได้เลย)
{
    public $img_path = '';
    public $img_url = '';
    public $img_name = '';
    public $search;

//    public $image = '';

    public static function tableName()
    {
        return 'cat';
    }

    public function rules()
    {
        return [
            [['name','type','color','weight','price'], 'required','message' => 'กรุณากรอกข้อมูล..{attribute}'],
            [['name','type','color'], 'string','max' => 255],
            [['weight'], 'double'],
            [['price','status'], 'integer'],
            [['image','image_path'], 'string','max' => 255],
            [['birthday','status','search'], 'safe'],
            [['img_path','img_url','img_name'],'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'type' => 'Breeds',
            'color' => 'Color',
            'birthday' => 'Birthday',
            'weight' => 'Weight',
            'price' => 'Price',
            'search' => 'ค้นหา',
            // image
            'image' => 'Image',
            'image_path' => 'image_path',
            'img_url' => 'image_url',
            'img_path' => 'image_path',
            'img_name' => 'image_name',

            'status' => 'Status',
        ];
    }
    public static function getDetail($id)
    {
        $modelcat = self::find()
            ->select(['name'])
            ->where(['id' => $id])
            ->asArray() // แปลงเป็น array
            ->all();

        return $modelcat;
    }

    public static function getIdTestSelect()
    {
        $data = self::find()->select(['id'])->asArray()->all();
        return ArrayHelper::map($data,'id','id');
    }

    public function behaviors()
    {
        return [
             [
                'class' => UploadBehavior::className(),
                'attribute' => 'image',
                'pathAttribute' => 'img_path',
                'nameAttribute' => 'img_name',
                'baseUrlAttribute' => 'img_url',

            ],
        ];
    }
}