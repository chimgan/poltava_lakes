<?php

/**
 * This is the model class for table "lake".
 *
 * The followings are the available columns in table 'lake':
 * @property integer $id
 * @property integer $water_object_id
 * @property integer $region_id
 * @property string $title
 * @property string $description
 * @property string $lat
 * @property string $long
 * @property string $area
 * @property integer $rent
 * @property string $create_date
 *
 * The followings are the available model relations:
 * @property Region $region
 * @property WaterObject $waterObject
 * @property Photo[] $photos
 */
class Lake extends CActiveRecord
{
    public $areaFrom;
    public $areaTo;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'lake';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return [
			['water_object_id, region_id, title, lat, long, area, create_date', 'required'],
			['water_object_id, region_id, rent', 'numerical', 'integerOnly' => true],
			['title', 'length', 'max' => 255],
			['lat, long, area', 'length', 'max' => 100],
			['description', 'safe'],
			['id, water_object_id, region_id, title, description, lat, long, area, rent, create_date', 'safe', 'on' => 'search'],
		];
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return [
			'region' => [self::BELONGS_TO, 'Region', 'region_id'],
			'waterObject' => [self::BELONGS_TO, 'WaterObject', 'water_object_id'],
			'photos' => [self::HAS_MANY, 'Photo', 'lake_id'],
		];
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'Порядковый номер',
			'water_object_id' => 'Тип водного объекта',
			'region_id' => 'Населенный пункт',
			'title' => 'Название',
			'description' => 'Описание',
			'lat' => 'Долгота',
			'long' => 'Широта',
			'area' => 'Площадь',
			'rent' => 'Аренда',
			'create_date' => 'Дата добавления',
		];
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('water_object_id', $this->water_object_id);
		$criteria->compare('region_id', $this->region_id);
		$criteria->compare('title', $this->title, true);
		$criteria->compare('description', $this->description, true);
		$criteria->compare('lat', $this->lat, true);
		$criteria->compare('long', $this->long, true);
		$criteria->compare('area', $this->area, true);
        if (!empty($this->areaFrom) && !empty($this->areaTo)) {

            $criteria->addBetweenCondition('area', $this->areaFrom, $this->areaTo);
        }
        if (!empty($this->areaFrom) && empty($this->areaTo)) {

            $criteria->addCondition('area > ' . $this->areaFrom);
        }
        if (empty($this->areaFrom) && !empty($this->areaTo)) {

            $criteria->addCondition('area < ' . $this->areaTo);
        }
		$criteria->compare('rent', $this->rent);
		$criteria->compare('create_date', $this->create_date, true);
        $criteria->order = 'id DESC';

        return new CActiveDataProvider($this, [
            'criteria' => $criteria,
            'pagination' => [
                'pageSize' => 100,
            ],
        ]);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Lake the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

    /**
     * @return bool
     */
    public function beforeValidate()
    {
        if (parent::beforeValidate()) {

            if ($this->isNewRecord) {

                $this->create_date = new CDbExpression('NOW()');
            }
            return true;
        }
        return false;
    }
}
