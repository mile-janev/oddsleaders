<?php

/**
 * This is the model class for table "round".
 *
 * The followings are the available columns in table 'round':
 * @property integer $id
 * @property string $identificator
 * @property string $date_from
 * @property string $date_to
 * @property string $date_created
 * @property string $date_modified
 * @property string $game_id
 * @property string $house_id
 *
 * The followings are the available model relations:
 * @property House $house
 * @property Game $game
 */
class Round extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'round';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('identificator, date_from, date_to, date_created, date_modified, game_id, house_id', 'required'),
			array('identificator', 'length', 'max'=>128),
			array('game_id, house_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, identificator, date_from, date_to, date_created, date_modified, game_id, house_id', 'safe', 'on'=>'search'),
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
			'house' => array(self::BELONGS_TO, 'House', 'house_id'),
			'game' => array(self::BELONGS_TO, 'Game', 'game_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'identificator' => 'Identificator',
			'date_from' => 'Date From',
			'date_to' => 'Date To',
			'date_created' => 'Date Created',
			'date_modified' => 'Date Modified',
			'game_id' => 'Game',
			'house_id' => 'House',
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
		$criteria->compare('identificator',$this->identificator,true);
		$criteria->compare('date_from',$this->date_from,true);
		$criteria->compare('date_to',$this->date_to,true);
		$criteria->compare('date_created',$this->date_created,true);
		$criteria->compare('date_modified',$this->date_modified,true);
		$criteria->compare('game_id',$this->game_id,true);
		$criteria->compare('house_id',$this->house_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Round the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
