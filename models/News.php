<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "corplbr.news".
 *
 * @property int $id
 * @property string $date
 * @property string $title
 * @property string $content
 * @property int $type
 * @property string $img_icon
 * @property int $id_user
 * @property int $status
 * @property int $like_active
 */
class News extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'corplbr.news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'title', 'content', 'img_icon', 'id_user', 'status', 'like_active'], 'required'],
            [['date', 'title', 'content', 'img_icon'], 'string'],
            [['type', 'id_user', 'status', 'like_active'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Дата добавления',
            'title' => 'Заголовок',
            'content' => 'Содержимое',
            'type' => 'Тип',
            'img_icon' => 'Иконка',
            'id_user' => 'Пользлватель',
            'status' => 'Статус',
            'like_active' => 'Доступ к оцениванию',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
