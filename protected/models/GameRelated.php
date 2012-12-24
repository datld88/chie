<?php

/**
 * This is the model class for table "chie_game_related".
 *
 * The followings are the available columns in table 'chie_game_related':
 * @property integer $game_id
 * @property integer $game_related_id
 * @property integer $position
 * @property integer $is_featured
 */
class GameRelated extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GameRelated the static model class
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
		return 'chie_game_related';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('game_id, game_related_id, position, is_featured', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('game_id, game_related_id, position, is_featured', 'safe', 'on'=>'search'),
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
			'game_id' => 'Game',
			'game_related_id' => 'Game Related',
			'position' => 'Position',
			'is_featured' => 'Is Featured',
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

		$criteria->compare('game_id',$this->game_id);
		$criteria->compare('game_related_id',$this->game_related_id);
		$criteria->compare('position',$this->position);
		$criteria->compare('is_featured',$this->is_featured);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}