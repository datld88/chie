<?php

/**
 * This is the model class for table "chie_log_user_payment".
 *
 * The followings are the available columns in table 'chie_log_user_payment':
 * @property integer $id
 * @property string $type
 * @property string $serial
 * @property string $cardnumber
 * @property string $price
 * @property integer $created_at
 * @property integer $transactionId
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
		return 'chie_log_user_payment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('created_at, transactionId', 'numerical', 'integerOnly'=>true),
			array('type, serial, cardnumber', 'length', 'max'=>100),
			array('price', 'length', 'max'=>16),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, type, serial, cardnumber, price, created_at, transactionId', 'safe', 'on'=>'search'),
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
			'type' => 'Type',
			'serial' => 'Serial',
			'cardnumber' => 'Cardnumber',
			'price' => 'Price',
			'created_at' => 'Created At',
			'transactionId' => 'Transaction',
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

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}