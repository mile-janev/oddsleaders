<?php

/**
 * This is the model class for table "team".
 *
 * The followings are the available columns in table 'team':
 * @property string $id
 * @property string $name
 * @property string $slug
 * @property string $league_id
 *
 * The followings are the available model relations:
 * @property Game[] $games
 * @property Game[] $games1
 * @property Nickname[] $nicknames
 * @property League $league
 */
class Team extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'team';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, slug, league_id', 'required'),
			array('name, slug', 'length', 'max'=>128),
			array('league_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, slug, league_id', 'safe', 'on'=>'search'),
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
			'games' => array(self::HAS_MANY, 'Game', 'guest_id'),
			'games1' => array(self::HAS_MANY, 'Game', 'home_id'),
			'nicknames' => array(self::HAS_MANY, 'Nickname', 'team_id'),
			'league' => array(self::BELONGS_TO, 'League', 'league_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'slug' => 'Slug',
			'league_id' => 'League',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('league_id',$this->league_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Team the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
