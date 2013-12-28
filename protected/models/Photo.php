<?php

/**
 * This is the model class for table "photo".
 *
 * The followings are the available columns in table 'photo':
 * @property integer $id
 * @property integer $lake_id
 * @property string $source
 * @property string $create_date
 *
 * The followings are the available model relations:
 * @property Lake $lake
 */
class Photo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'photo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return [
			['lake_id, source, create_date', 'required'],
			['lake_id', 'numerical', 'integerOnly' => true],
			['source', 'length', 'max' => 100],
			['id, lake_id, source, create_date', 'safe', 'on' => 'search'],
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
			'lake' => [self::BELONGS_TO, 'Lake', 'lake_id'],
		];
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'Порядковый номер',
			'lake_id' => 'Название водного объекта',
			'source' => 'Фотография',
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
		$criteria->compare('lake_id', $this->lake_id);
		$criteria->compare('source', $this->source, true);
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
	 * @return Photo the static model class
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
