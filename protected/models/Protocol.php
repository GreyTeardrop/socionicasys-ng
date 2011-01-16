<?php

/**
 * This is the model class for table "{{protocol}}".
 *
 * The followings are the available columns in table '{{protocol}}':
 * @property integer $id
 * @property string $name
 * @property string $tim
 * @property string $date
 * @property string $url
 * @property string $comment
 */
class Protocol extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Protocol the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{protocol}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('name, tim, date, url, comment', 'length', 'max' => 255, 'encoding' => 'UTF-8'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, tim, date, url', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Имя (псевдоним)',
			'tim' => 'ТИМ',
			'date' => 'Дата',
			'url' => 'Ссылка',
			'comment' => 'Комментарий',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('tim',$this->tim,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('url',$this->url,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}
