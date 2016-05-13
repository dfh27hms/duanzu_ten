<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lx_3_tu".
 *
 * @property integer $id
 * @property string $title
 * @property string $address
 * @property string $url
 * @property string $time_state
 * @property string $time_stop
 * @property integer $states
 * @property string $my_files
 */
class Upload extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lx_3_tu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['states'], 'integer'],
            [['title', 'address', 'url', 'time_state', 'time_stop', 'my_files'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'address' => 'Address',
            'url' => 'Url',
            'time_state' => 'Time State',
            'time_stop' => 'Time Stop',
            'states' => 'States',
            'my_files' => 'My Files',
        ];
    }
}
