<?php

/**
 * This is the model class for table "stack".
 *
 * The followings are the available columns in table 'stack':
 * @property string $id
 * @property string $opponent
 * @property string $start
 * @property string $data
 * @property string $tournament_id
 *
 * The followings are the available model relations:
 * @property Tournament $tournament
 */
class Stack extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'stack';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tournament_id,opponent,start,data', 'required'),
                        array('code', 'numerical', 'integerOnly'=>true),
			array('opponent', 'length', 'max'=>256),
			array('tournament_id', 'length', 'max'=>10),
			array('start, result, data', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, code, opponent, start, data, result, tournament_id, active, bet_count', 'safe', 'on'=>'search'),
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
			'tournament' => array(self::BELONGS_TO, 'Tournament', 'tournament_id'),
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
			'opponent' => 'Opponents',
			'start' => 'Start game',
			'data' => 'Data content',
			'result' => 'Match Result',
			'tournament_id' => 'Tournament',
                        'bet_count' => 'Bet Count',
                        'active' => 'Active'
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
		$criteria->compare('start',$this->start,true);
		$criteria->compare('data',$this->data,true);
		$criteria->compare('result',$this->result,true);
		$criteria->compare('tournament_id',$this->tournament_id,true);
                $criteria->compare('active',$this->active,true);
                $criteria->compare('bet_count',$this->bet_count,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Stack the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
