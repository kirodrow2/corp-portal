<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "corplbr.profile".
 *
 * @property int $id
 * @property string $id_1c
 * @property string $first_name
 * @property string $last_name
 * @property string $middle_name
 * @property string $birthday
 * @property string $date_job
 * @property int $sex
 * @property string $skype
 * @property string $phone1
 * @property string $phone2
 * @property string $branch
 * @property string $position
 * @property string $department
 * @property string $cabinet
 * @property string $phone_cabinet
 * @property string $about
 * @property string $category
 * @property string $service
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'corplbr.profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'sex', 'sip'], 'integer'],
            [['id_1c', 'first_name', 'last_name', 'middle_name', 'skype', 'phone', 'phone1', 'phone2', 'branch', 'position', 'department', 'cabinet', 'phone_cabinet', 'about', 'category', 'service'], 'string'],
            [['birthday', 'date_job'], 'safe'],
            [['id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_1c' => 'Id 1c',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'middle_name' => 'Middle Name',
            'birthday' => 'Дата рождения',
            'date_job' => 'Date Job',
            'sex' => 'Пол',
            'skype' => 'Skype',
            'phone' => 'Телефон',
            'phone1' => 'Телефон 1',
            'phone2' => 'Телефон 2',
            'branch' => 'Филиал',
            'position' => 'Должность',
            'department' => 'Подразделение',
            'cabinet' => 'Кабинет',
            'phone_cabinet' => 'Внутренний телефон',
            'about' => 'О себе',
            'category' => 'Category',
            'service' => 'Service',
            'sip' => 'SIP',
            'name' => 'ФИО',
        ];
    }

    public static function primaryKey()
    {
        return ['id'];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id']);
    }

    public function getName()
    {
        return sprintf("%s %s %s", $this->last_name, $this->first_name, $this->middle_name);
    }

    public function getImage() {

        if ($this->img) {
            $img = "/img/user/thumbnail_" . $this->img;
        }

        if (!$img or $this->img == "noimg.jpg") {
            if ($this->sex == 1) {
                $img = '/img/user/thumbnail_no-profile-m.png';
            } else {
                $img = '/img/user/thumbnail_no-profile-f.png';
            }
        }

        /*if (!$this->img_accept) { // доделать
            $img = $not_img;
            $this->img == "noimg.jpg"
        }*/
        return $img;
    }
}
