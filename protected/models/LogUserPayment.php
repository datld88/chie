<?php

/**
 * This is the model class for table "{{log_user_payment}}".
 *
 * The followings are the available columns in table '{{log_user_payment}}':
 * @property integer $id
 * @property string $type
 * @property string $serial
 * @property string $cardnumber
 * @property string $price
 * @property integer $created_at
 * @property integer $transactionId
 * @property string $gateway
 * @property integer $user_id
 *
 * The followings are the available model relations:
 * @property User $user
 */
class LogUserPayment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LogUserPayment the static model class
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
		return '{{log_user_payment}}';
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
			array('created_at, transactionId, user_id', 'numerical', 'integerOnly'=>true),
			array('type, serial, cardnumber', 'length', 'max'=>100),
			array('price', 'length', 'max'=>16),
			array('gateway', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, type, serial, cardnumber, price, created_at, transactionId, gateway, user_id', 'safe', 'on'=>'search'),
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
			'type' => 'Type',
			'serial' => 'Serial',
			'cardnumber' => 'Cardnumber',
			'price' => 'Price',
			'created_at' => 'Created At',
			'transactionId' => 'Transaction',
			'gateway' => 'Gateway',
			'user_id' => 'User',
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
		$criteria->compare('type',$this->type,true);
		$criteria->compare('serial',$this->serial,true);
		$criteria->compare('cardnumber',$this->cardnumber,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('created_at',$this->created_at);
		$criteria->compare('transactionId',$this->transactionId);
		$criteria->compare('gateway',$this->gateway,true);
		$criteria->compare('user_id',$this->user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}