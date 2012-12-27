<?php

/**
 * This is the model class for table "{{game_media}}".
 *
 * The followings are the available columns in table '{{game_media}}':
 * @property integer $id
 * @property integer $game_id
 * @property string $type
 * @property string $link
 * @property integer $position
 * @property integer $is_avatar
 *
 * The followings are the available model relations:
 * @property Game $game
 */
class GameMedia extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GameMedia the static model class
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
		return '{{game_media}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('game_id', 'required'),
			array('game_id, position, is_avatar', 'numerical', 'integerOnly'=>true),
			array('type, link', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, game_id, type, link, position, is_avatar', 'safe', 'on'=>'search'),
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
			'game' => array(self::BELONGS_TO, 'Game', 'game_id'),
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
			'type' => 'Type',
			'link' => 'Link',
			'position' => 'Position',
			'is_avatar' => 'Is Avatar',
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
		$criteria->compare('type',$this->type,true);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('position',$this->position);
		$criteria->compare('is_avatar',$this->is_avatar);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}