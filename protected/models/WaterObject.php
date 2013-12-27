<?php

/**
 * This is the model class for table "water_object".
 *
 * The followings are the available columns in table 'water_object':
 * @property integer $id
 * @property string $title
 * @property string $create_date
 *
 * The followings are the available model relations:
 * @property Lake[] $lakes
 */
class WaterObject extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'water_object';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return [
			['title, create_date', 'required'],
			['title', 'length', 'max' => 100],
			['id, title, create_date', 'safe', 'on' => 'search'],
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
			'lakes' => [self::HAS_MANY, 'Lake', 'water_object_id'],
		];
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'Порядковый номер',
			'title' => 'Название',
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
		$criteria->compare('title', $this->title, true);
		$criteria->compare('create_date', $this->create_date, true);

		return new CActiveDataProvider($this, [
			'criteria' => $criteria,
		]);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return WaterObject the static model class
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
