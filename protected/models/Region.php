<?php

/**
 * This is the model class for table "region".
 *
 * The followings are the available columns in table 'region':
 * @property integer $id
 * @property integer $root_id
 * @property string $title
 * @property string $create_date
 *
 * The followings are the available model relations:
 * @property Lake[] $lakes
 */
class Region extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'region';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return [
			['title, create_date', 'required'],
			['root_id', 'numerical', 'integerOnly' => true],
			['title', 'length', 'max' => 100],
			['id, root_id, title, create_date', 'safe', 'on' => 'search'],
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
			'lakes' => [self::HAS_MANY, 'Lake', 'region_id'],
			'center' => [self::BELONGS_TO, 'Region', 'root_id'],
		];
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'Порядковый номер',
			'root_id' => 'Райцентр',
			'title' => 'Населенный пункт',
			'create_date' => 'Дата созлания',
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
		$criteria->compare('root_id', $this->root_id);
		$criteria->compare('title', $this->title, true);
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
	 * @return Region the static model class
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
