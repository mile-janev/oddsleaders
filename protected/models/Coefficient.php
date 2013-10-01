<?php

/**
 * This is the model class for table "coefficient".
 *
 * The followings are the available columns in table 'coefficient':
 * @property string $id
 * @property string $game_id
 * @property string $house_id
 * @property double $home_win
 * @property double $guest_win
 * @property double $draw
 *
 * The followings are the available model relations:
 * @property Game $game
 * @property House $house
 */
class Coefficient extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'coefficient';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('game_id, house_id, home_win, guest_win, draw', 'required'),
			array('home_win, guest_win, draw', 'numerical'),
			array('game_id, house_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, game_id, house_id, home_win, guest_win, draw', 'safe', 'on'=>'search'),
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
			'game' => array(self::BELONGS_TO, 'Game', 'game_id'),
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
			'game_id' => 'Game',
			'house_id' => 'House',
			'home_win' => 'Home Win',
			'guest_win' => 'Guest Win',
			'draw' => 'Draw',
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
		$criteria->compare('game_id',$this->game_id,true);
		$criteria->compare('house_id',$this->house_id,true);
		$criteria->compare('home_win',$this->home_win);
		$criteria->compare('guest_win',$this->guest_win);
		$criteria->compare('draw',$this->draw);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Coefficient the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
