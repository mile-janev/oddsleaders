<?php

/**
 * This is the model class for table "game".
 *
 * The followings are the available columns in table 'game':
 * @property string $id
 * @property string $home_id
 * @property string $guest_id
 * @property string $start
 * @property string $home_goals
 * @property string $guest_goals
 *
 * The followings are the available model relations:
 * @property Coefficient[] $coefficients
 * @property Team $guest
 * @property Team $home
 */
class Game extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'game';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('home_id, guest_id, start, home_goals, guest_goals', 'required'),
			array('home_id, guest_id, home_goals, guest_goals', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, home_id, guest_id, start, home_goals, guest_goals', 'safe', 'on'=>'search'),
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
			'coefficients' => array(self::HAS_MANY, 'Coefficient', 'game_id'),
			'guest' => array(self::BELONGS_TO, 'Team', 'guest_id'),
			'home' => array(self::BELONGS_TO, 'Team', 'home_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'home_id' => 'Home',
			'guest_id' => 'Guest',
			'start' => 'Start',
			'home_goals' => 'Home Goals',
			'guest_goals' => 'Guest Goals',
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
		$criteria->compare('home_id',$this->home_id,true);
		$criteria->compare('guest_id',$this->guest_id,true);
		$criteria->compare('start',$this->start,true);
		$criteria->compare('home_goals',$this->home_goals,true);
		$criteria->compare('guest_goals',$this->guest_goals,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Game the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
