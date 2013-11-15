<?php

/**
 * This is the model class for table "bet".
 *
 * The followings are the available columns in table 'bet':
 * @property string $id
 * @property string $code
 * @property string $opponent
 * @property string $user_id
 * @property string $stack_ids
 * @property string $game_type
 * @property string $possibility
 * @property double $odds
 * @property integer $result
 *
 * The followings are the available model relations:
 * @property User $user
 */
class Bet extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'bet';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('code, opponent, user_id, stack_ids, game_type, possibility, odds', 'required'),
			array('result', 'numerical', 'integerOnly'=>true),
			array('odds', 'numerical'),
			array('code', 'length', 'max'=>20),
			array('opponent', 'length', 'max'=>255),
			array('user_id', 'length', 'max'=>10),
			array('game_type', 'length', 'max'=>128),
			array('possibility', 'length', 'max'=>32),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, code, opponent, user_id, stack_ids, game_type, possibility, odds, result', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'code' => 'Code',
			'opponent' => 'Opponent',
			'user_id' => 'User',
			'stack_ids' => 'Stack Ids',
			'game_type' => 'Game Type',
			'possibility' => 'Possibility',
			'odds' => 'Odds',
			'result' => 'Result',
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
		$criteria->compare('code',$this->code,true);
		$criteria->compare('opponent',$this->opponent,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('stack_ids',$this->stack_ids,true);
		$criteria->compare('game_type',$this->game_type,true);
		$criteria->compare('possibility',$this->possibility,true);
		$criteria->compare('odds',$this->odds);
		$criteria->compare('result',$this->result);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Bet the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
