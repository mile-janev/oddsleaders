<?php

/**
 * This is the model class for table "nickname".
 *
 * The followings are the available columns in table 'nickname':
 * @property string $id
 * @property string $team_id
 * @property string $house_id
 * @property string $name
 *
 * The followings are the available model relations:
 * @property Team $team
 * @property House $house
 */
class Nickname extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'nickname';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('team_id, house_id, name', 'required'),
			array('team_id, house_id', 'length', 'max'=>10),
			array('name', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, team_id, house_id, name', 'safe', 'on'=>'search'),
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
			'team' => array(self::BELONGS_TO, 'Team', 'team_id'),
			'house' => array(self::BELONGS_TO, 'House', 'house_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'team_id' => 'Team',
			'house_id' => 'House',
			'name' => 'Name',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('team_id',$this->team_id,true);
		$criteria->compare('house_id',$this->house_id,true);
		$criteria->compare('name',$this->name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Nickname the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
