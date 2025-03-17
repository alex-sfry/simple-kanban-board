<?php

namespace app\models\ar;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "project".
 *
 * @property int $id
 * @property string $name
 * @property int $user_id
 * @property int $created_at
 * @property int $updated_at
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['name', 'required'],
            [['name'], 'string'],
            ['user_id', 'integer'],
            [['name'], 'unique'],
            [['created_at', 'updated_at'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'user_id' => 'User ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
