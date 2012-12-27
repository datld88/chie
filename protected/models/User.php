<?php

/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $salt
 * @property integer $is_admin
 *
 * The followings are the available model relations:
 * @property LogComment[] $logComments
 * @property LogUserOther[] $logUserOthers
 * @property LogUserPayment[] $logUserPayments
 * @property LogUserPlaygame[] $logUserPlaygames
 * @property UserLogRate[] $userLogRates
 * @property UserProfile $userProfile
 */
class User extends CActiveRecord
{
    const ADMIN=1;
    const NOT_ADMIN=0;
    
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return '{{user}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password', 'required'),
			array('username, password', 'length', 'max'=>200),
                        array('username', 'unique', 'className'=>'User'),
                        array('is_admin', 'boolean'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, created_at, updated_at, is_admin', 'safe', 'on'=>'search'),
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
			'logComments' => array(self::HAS_MANY, 'LogComment', 'user_id'),
			'logUserOthers' => array(self::HAS_MANY, 'LogUserOther', 'user_id'),
			'logUserPayments' => array(self::HAS_MANY, 'LogUserPayment', 'user_id'),
			'logUserPlaygames' => array(self::HAS_MANY, 'LogUserPlaygame', 'user_id'),
			'userLogRates' => array(self::HAS_MANY, 'UserLogRate', 'user_id'),
			'userProfile' => array(self::HAS_ONE, 'UserProfile', 'user_id'),
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
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
			'salt' => 'Salt',
			'is_admin' => 'Phân Quyền Admin?',
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
		$criteria->compare('created_at',$this->created_at);
		$criteria->compare('updated_at',$this->updated_at);
		$criteria->compare('is_admin',$this->is_admin);
                
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function getAdminOptions(){
            return array(
                self::ADMIN =>'Admin',
                self::NOT_ADMIN=>'Không Phải Admin',
            );
        }
        
        protected function beforeSave(){
            if(parent::beforeSave()){
                $salt_len=7;    //declare length(salt)=7
                $this->salt=$this->_randomString($salt_len);//tạo một string 7 ký tự ngẫu nhiên cho salt
                $this->password=md5($this->password.$this->salt);   //lưu password trong DB là md5 của password + salt
                $this->updated_at=time();  
                if($this->isNewRecord)
                    $this->created_at=time();
                return true;
            }
            return false;
        }
        
        protected function _randomString($len){
            $string=array_merge(range(0,9), range('a', 'z'), range('A', 'Z'));
            $string=implode("", $string);
            return substr(str_shuffle($string), 0, $len);
        }
        
        public function isAdmin(){
            return ($this->is_admin==self::ADMIN);
        }
        
        public function validatePassword($password){
            return ($this->password==md5($password.$this->salt));
        }
}