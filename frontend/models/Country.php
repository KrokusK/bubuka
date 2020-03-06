<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property int $id
 * @property int $continent_id
 * @property string $name
 *
 * @property City[] $cities
 * @property Continent $continent
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['continent_id', 'name'], 'required'],
            [['continent_id'], 'default', 'value' => null],
            [['continent_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['continent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Continent::className(), 'targetAttribute' => ['continent_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'continent_id' => 'Continent ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[Cities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCities()
    {
        return $this->hasMany(City::className(), ['country_id' => 'id']);
    }

    /**
     * Gets query for [[Continent]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getContinent()
    {
        return $this->hasOne(Continent::className(), ['id' => 'continent_id']);
    }
}
