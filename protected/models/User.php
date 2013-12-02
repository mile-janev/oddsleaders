<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $id
 * @property string $username
 * @property string $password
 * @property string $name
 * @property string $date_created
 *
 * The followings are the available model relations:
 * @property Role[] $Role
 */
class User extends CActiveRecord
{
    public $password_repeat;
    
    public function beforeSave() { // 06adb4cbaa2eabbc41f8f2af3b095bf65d67d7b8
            if ($this->isNewRecord) {
                $this->date_created = new CDbExpression('NOW()');
            }
            
            $bcrypt = new Bcrypt();
            $this->password = $bcrypt->hash($this->password);

            return parent::beforeSave();
        }
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, password_repeat, email', 'required'),
			array('username, password, email', 'length', 'max'=>64),
			array('name', 'length', 'max'=>255),
                        array('image', 'length', 'max'=>255),
                        array('email', 'email'),
                        array('email', 'unique'), 
                        array('username', 'unique'),
                        array('password, password_repeat', 'length', 'min'=>4, 'max'=>64),
                        array('password_repeat', 'compare', 'compareAttribute'=>'password'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, name, email, image, date_created, oauth_provider', 'safe', 'on'=>'search'),
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
			'roles' => array(self::HAS_MANY, 'Role', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
                        'password_repeat' => 'Repeat password',
			'name' => 'Name',
			'image'=> 'Avatar',
			'date_created' => 'Date Created',
                        'email' => 'E-mail',
                        'oauth_provider'=>'Provider',
                        'oauth_uid'=>'User id from provider',
                        'conto'=>'Conto this month',
                        'conto_all'=>'Conto all time'
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('name',$this->name,true);
                $criteria->compare('email',$this->email,true);
		$criteria->compare('date_created',$this->date_created,true);
                $criteria->compare('oauth_provider',$this->oauth_provider,true);
                $criteria->compare('oauth_uid',$this->oauth_uid,true);
                $criteria->compare('conto',$this->conto,true);
                $criteria->compare('conto_all',$this->conto_all,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'sort'=>array(
                            'defaultOrder'=>'conto DESC',
                        ),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        //This method will be used to save User to database
        public function saveUser($postParams)
        {
            $bool = false;
            
            $this->attributes = $postParams;
            
            if($this->save())
            {
                $user_role = $postParams['role'];
                $role = new Role();
                $role->role = $user_role;
                $role->user_id = $this->id;
                $role->save();
                
                $bool = true;
            }
            
            return $bool;
        }
}
