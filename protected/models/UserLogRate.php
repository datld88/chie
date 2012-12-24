<?php

/**
 * This is the model class for table "chie_user_log_rate".
 *
 * The followings are the available columns in table 'chie_user_log_rate':
 * @property integer $id
 * @property integer $game_id
 * @property integer $user_id
 * @property integer $rate_point
 * @property integer $rated_at
 */
class UserLogRate extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserLogRate the static model class
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
		return 'chie_user_log_rate';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('game_id, user_id, rate_point, rated_at', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, game_id, user_id, rate_point, rated_at', 'safe', 'on'=>'search'),
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
			'game_id' => 'Game',
			'user_id' => 'User',
			'rate_point' => 'Rate Point',
			'rated_at' => 'Rated At',
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
		$criteria->compare('game_id',$this->game_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('rate_point',$this->rate_point);
		$criteria->compare('rated_at',$this->rated_at);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}