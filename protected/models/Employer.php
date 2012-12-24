<?php

/**
 * This is the model class for table "chie_employer".
 *
 * The followings are the available columns in table 'chie_employer':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $default_char
 * @property string $email
 * @property string $profile
 * @property string $fullname
 * @property integer $status
 * @property string $admin_code
 */
class Employer extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Employer the static model class
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
		return 'chie_employer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status', 'numerical', 'integerOnly'=>true),
			array('username, default_char', 'length', 'max'=>100),
			array('password, fullname', 'length', 'max'=>200),
			array('email, profile', 'length', 'max'=>255),
			array('admin_code', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, default_char, email, profile, fullname, status, admin_code', 'safe', 'on'=>'search'),
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
			'username' => 'Username',
			'password' => 'Password',
			'default_char' => 'Default Char',
			'email' => 'Email',
			'profile' => 'Profile',
			'fullname' => 'Fullname',
			'status' => 'Status',
			'admin_code' => 'Admin Code',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('default_char',$this->default_char,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('profile',$this->profile,true);
		$criteria->compare('fullname',$this->fullname,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('admin_code',$this->admin_code,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}        
        public function validatePassword($password){
            return ($this->hashPassword($password, $this->default_char) === $this->password) && ($this->status == 1);
        }
}