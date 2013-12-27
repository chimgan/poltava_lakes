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
		return array(
			array('title, create_date', 'required'),
			array('water_object_id, region_id, rent', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			array('lat, long, area', 'length', 'max'=>100),
			array('description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, water_object_id, region_id, title, description, lat, long, area, rent, create_date', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'region' => array(self::BELONGS_TO, 'Region', 'region_id'),
			'waterObject' => array(self::BELONGS_TO, 'WaterObject', 'water_object_id'),
			'photos' => array(self::HAS_MANY, 'Photo', 'lake_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'water_object_id' => 'Water Object',
			'region_id' => 'Region',
			'title' => 'Title',
			'description' => 'Description',
			'lat' => 'Lat',
			'long' => 'Long',
			'area' => 'Area',
			'rent' => 'Rent',
			'create_date' => 'Create Date',
		);
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
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('water_object_id',$this->water_object_id);
		$criteria->compare('region_id',$this->region_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('lat',$this->lat,true);
		$criteria->compare('long',$this->long,true);
		$criteria->compare('area',$this->area,true);
		$criteria->compare('rent',$this->rent);
		$criteria->compare('create_date',$this->create_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Lake the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
