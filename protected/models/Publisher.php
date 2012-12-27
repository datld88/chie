<?php

/**
 * This is the model class for table "{{publisher}}".
 *
 * The followings are the available columns in table '{{publisher}}':
 * @property integer $id
 * @property string $name
 * @property integer $status
 * @property string $logo
 * @property string $logo_path
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $address
 * @property string $phone
 * @property string $hotline
 * @property string $website
 * @property integer $level
 * @property integer $is_vip
 * @property integer $count_game
 *
 * The followings are the available model relations:
 * @property Game[] $games
 */
class Publisher extends CActiveRecord
{
    const VIP=1;
    const NOT_VIP=0;
    	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Publisher the static model class
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
		return '{{publisher}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('status, created_at, updated_at, level, is_vip, count_game', 'numerical', 'integerOnly'=>true),
			array('name, logo_path, address', 'length', 'max'=>200),
			array('logo, website', 'length', 'max'=>100),
			array('phone, hotline', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, status, logo, logo_path, created_at, updated_at, address, phone, hotline, website, level, is_vip, count_game', 'safe', 'on'=>'search'),
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
			'games' => array(self::HAS_MANY, 'Game', 'publisher_id'),
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
			'status' => 'Status',
			'logo' => 'Logo',
			'logo_path' => 'Logo Path',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
			'address' => 'Address',
			'phone' => 'Phone',
			'hotline' => 'Hotline',
			'website' => 'Website',
			'level' => 'Level',
			'is_vip' => 'Is Vip',
			'count_game' => 'Count Game',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('logo',$this->logo,true);
		$criteria->compare('logo_path',$this->logo_path,true);
		$criteria->compare('created_at',$this->created_at);
		$criteria->compare('updated_at',$this->updated_at);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('hotline',$this->hotline,true);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('level',$this->level);
		$criteria->compare('is_vip',$this->is_vip);
		$criteria->compare('count_game',$this->count_game);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}