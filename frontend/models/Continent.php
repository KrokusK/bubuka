<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use yii\base\InvalidArgumentException;

/**
 * This is the model class for table "continent".
 *
 * @property int $id
 * @property string $name
 *
 * @property Country[] $countries
 */
class Continent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'continent';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * Gets query for [[Countries]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCountries()
    {
        return $this->hasMany(Country::className(), ['continent_id' => 'id']);
    }

    /**
     * Gets data about Continent, countries and cities.
     *
     */
    public function getDataContinent($params = [])
    {
        // Search data
        $queryContinent = Continent::find();
        // Add data filter
        //$this->setDataFilter($query, $params);
        // Add pagination params
        //$this->setPaginationParams($query, $params);
        // get data
        $dataContinent = $queryContinent->orderBy('id')
            ->asArray()
            ->all();

        // return data
        return $dataContinent;
    }
}
