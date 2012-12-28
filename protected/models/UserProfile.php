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
 * @property City $city
 * @property User $user
 */
class UserProfile extends CActiveRecord
{
    //gender const
    const NAM=1;
    const NU=0;
    const STRING_NAM='Nam';
    const STRING_NU='Nữ';
    const MIN_AGE=10;
    
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
                        array('user_id', 'checkUserId', 'on'=>'create'),
			array('user_id, created_at, updated_at, city_id', 'numerical', 'integerOnly'=>true),
                        array('gender', 'boolean'),
			array('full_name, address, avatar, avatar_path, email', 'length', 'max'=>200),
                        array('full_name, email, phone', 'required'),
			array('phone', 'length', 'max'=>15),
                        array('phone', 'numerical', 'integerOnly'=>true),   //only allow digits
                        array('email', 'email'),
                        array('birthday', 'date', 'format'=>'yyyy-M-d'), //birthday format?
			array('birthday', 'validateBirthday'),
                        // The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('user_id, full_name, created_at, updated_at, phone, gender, birthday, city_id, address, avatar, email', 'safe', 'on'=>'search'),
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
                        'city'=>array(self::BELONGS_TO, 'City', 'city_id'),
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
			'city_id' => 'City',
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
                $criteria->compare('city_id',$this->city_id);
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
                self::NAM=>self::STRING_NAM,
                self::NU=>self::STRING_NU,
            );
        }
        
        public function getGenderString(){
            $str=($this->gender==self::NAM ? self::STRING_NAM : sel::STRING_NU);
            return $str;
        }
        
        protected function beforeSave(){
            if(parent::beforeSave()){
                $this->updated_at=time();
                if($this->isNewRecord)
                    $this->created_at=time();
                return true;
            }
            return false;
        }
        
        //check if user_id exists on DB or has post already
        public function checkUserId($attribute, $params){
            $user=User::model()->findByPk($this->user_id);
            if($user===null)
                $this->addError ($attribute, 'User này không tồn tại trong hệ thống');
            $profile=self::model()->find('user_id=:userId', array(':userId'=>$this->user_id));
            if($profile!=null)
                $this->addError($attribute, 'User này đã có profile trong hệ thống rồi');
        }
        public function validateBirthday($attribute, $params){
            //xem người đăng ký acc có tuổi lớn hơn >MIN_AGE không
            $year=strval($this->birthday);
            $year=substr($year, 0, 4);
            $year=(int)$year; $age=(int)date('Y')-$year;
            if($age<self::MIN_AGE)
                $this->addError ($attribute, 'Độ Tuổi thấp nhất là 10 tuổi');
        }
}