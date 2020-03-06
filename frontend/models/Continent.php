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
     * Because the field names may match within a single query,
     * the parameter names may not match the table field names.
     * To solve this problem let's create an associative array
     */
    protected $assocContinent = [
        'name' => 'nameContinent'
    ];
    protected $assocCountry = [
        'name' => 'nameCountry'
    ];
    protected $assocCity = [
        'name' => 'nameCity',
        'population' => 'population'
    ];
    protected $assocPagination = [
        'limitRec' => 'limit',
        'offsetRec' => 'offset'
    ];

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
        //$queryContinent = Continent::find()
            //->leftJoin('country','country.continent_id = continent.id');
            //->innerJoin('city','city.country_id = country.id');
        $queryContinent = (new \yii\db\Query())
            ->select('*')
            ->from('continent')
            ->join('LEFT JOIN', 'country', 'country.continent_id = continent.id');
        // Add data filter
        //$this->setContinentFilter($queryContinent, $params);
        //$this->setCountryFilter($queryContinent, $params);
        //$this->setCityFilter($queryContinent, $params);
        // Add pagination params
        //$this->setPaginationParams($queryContinent, $params);
        // get data
        $dataContinent = $queryContinent->orderBy('continent.id')
            //->with('countries','countries.cities')
            //->asArray()
            ->all();

        // return data
        return $dataContinent;
    }

    /**
     * Set data filter for continent table
     *
     * @params parameters for filtering
     * @query object with data filter
     */
    private function setContinentFilter($query, $params = [])
    {
        // ilike parameters
        $ilikeParams = ['name'];

        foreach ($this->assocContinent as $name => $value) {
            if (array_key_exists($value, $params) && $this->hasAttribute($name)) {
                $this->$name = $params[$value];
                if ($this->validate($name)) {
                    if (in_array($name, $ilikeParams)) {
                        $query->andWhere(['ilike', 'continent.'.$name, $params[$value]]);
                    } else {
                        $query->andWhere(['continent.'.$name => $params[$value]]);
                    }
                }
            }
        }
    }

    /**
     * Set data filter for country table
     *
     * @params parameters for filtering
     * @query object with data filter
     */
    private function setCountryFilter($query, $params = [])
    {
        // ilike parameters
        $ilikeParams = ['name'];

        $modelValidate = new Country();

        foreach ($this->assocCountry as $name => $value) {
            if (array_key_exists($value, $params) && $modelValidate->hasAttribute($name)) {
                $modelValidate->$name = $params[$value];
                if ($modelValidate->validate($name)) {
                    //$query->andWhere(['country.'.$name => $params[$value]]);
                    if (in_array($name, $ilikeParams)) {
                        $query->andWhere(['ilike', 'country.'.$name, $params[$value]]);
                    } else {
                        $query->andWhere(['country.'.$name => $params[$value]]);
                    }
                }
            }
        }
    }

    /**
     * Set data filter for continent table
     *
     * @params parameters for filtering
     * @query object with data filter
     */
    private function setCityFilter($query, $params = [])
    {
        // ilike parameters
        $ilikeParams = ['name'];

        $modelValidate = new City();

        foreach ($this->assocCity as $name => $value) {
            if (array_key_exists($value, $params) && $modelValidate->hasAttribute($name)) {
                $modelValidate->$name = $params[$value];
                if ($modelValidate->validate($name)) {
                    if (in_array($name, $ilikeParams)) {
                        $query->andWhere(['ilike', 'city.'.$name, $params[$value]]);
                    } else {
                        $query->andWhere(['city.'.$name => $params[$value]]);
                    }
                }
            }
        }
    }

    /**
     * Set pagination params
     *
     * @params parameters for pagination
     * @query object with data filter
     */
    private function setPaginationParams($query, $params = [])
    {
        // default values
        $defauftParams = [
            'limitRec' => 10,
            'offsetRec' => 0
        ];

        foreach ($this->assocPagination as $name => $value) {
            switch ($name) {
                case 'limitRec':
                    if (array_key_exists($value, $params) && preg_match("/^[0-9]*$/",$params[$value])) {
                        $query->limit($params[$value]);
                    } else {
                        // default value
                        $query->limit($defauftParams[$name]);
                    }
                    break;
                case 'offsetRec':
                    if (array_key_exists($value, $params) && preg_match("/^[0-9]*$/",$params[$value])) {
                        $query->offset($params[$value]);
                    } else {
                        // default value
                        $query->offset($defauftParams[$name]);
                    }
            }
        }
    }
}
