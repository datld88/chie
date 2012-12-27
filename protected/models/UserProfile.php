<?php

/**
 * This is the model class for table "{{user_profile}}".
 *
 * The followings are the available columns in table '{{user_profile}}':
 * @property integer $user_id
 * @property string $full_name
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $phone
 * @property integer $gender
 * @property string $birthday
 * @property string $city
 * @property string $address
 * @property string $avatar
 * @property string $email
 *
 * The followings are the available model relations:
 * @property User $user
 */
class UserProfile extends CActiveRecord
{
    //gender const
    const NAM=1;
    const NU=0;
    const STRING_NAM='Nam';
    const STRING_NU='Nữ';
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserProfile the static model class
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
		return '{{user_profile}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id', 'required'),
			array('user_id, created_at, updated_at, gender', 'numerical', 'integerOnly'=>true),
			array('full_name, address, avatar, email', 'length', 'max'=>200),
			array('phone', 'length', 'max'=>15),
			array('city', 'length', 'max'=>100),
			array('birthday', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('user_id, full_name, created_at, updated_at, phone, gender, birthday, city, address, avatar, email', 'safe', 'on'=>'search'),
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
			'user_id' => 'User',
			'full_name' => 'Full Name',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
			'phone' => 'Phone',
			'gender' => 'Gender',
			'birthday' => 'Birthday',
			'city' => 'City',
			'address' => 'Address',
			'avatar' => 'Avatar',
			'email' => 'Email',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('full_name',$this->full_name,true);
		$criteria->compare('created_at',$this->created_at);
		$criteria->compare('updated_at',$this->updated_at);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('gender',$this->gender);
		$criteria->compare('birthday',$this->birthday,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('address',$this->address,true);
//		$criteria->compare('avatar',$this->avatar,true);
		$criteria->compare('email',$this->email,true);
                
                //load with user account
                $criteria->with='user';
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        public function getGenderOptions(){
            return array(
                self::Nam=>self::STRING_NAM,
                self::NU=>self::STRING_NU,
            );
        }
        
        public function getGenderString(){
            $str=($this->gender==self::NAM ? self::STRING_NAM : sel::STRING_NU);
            return $str;
        }
}