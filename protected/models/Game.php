<?php

/**
 * This is the model class for table "chie_game".
 *
 * The followings are the available columns in table 'chie_game':
 * @property integer $id
 * @property string $name
 * @property integer $publisher_id
 * @property string $sort_description
 * @property string $full_descripition
 * @property integer $released_at
 * @property integer $count_game
 * @property integer $count_news
 * @property integer $count_user_rated
 * @property integer $is_hot
 * @property integer $is_featured
 * @property double $rate_point
 * @property string $playnow_title
 */
class Game extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Game the static model class
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
		return 'chie_game';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('publisher_id, released_at, count_game, count_news, count_user_rated, is_hot, is_featured', 'numerical', 'integerOnly'=>true),
			array('rate_point', 'numerical'),
			array('name, sort_description', 'length', 'max'=>200),
			array('playnow_title', 'length', 'max'=>255),
			array('full_descripition', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, publisher_id, sort_description, full_descripition, released_at, count_game, count_news, count_user_rated, is_hot, is_featured, rate_point, playnow_title', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'publisher_id' => 'Publisher',
			'sort_description' => 'Sort Description',
			'full_descripition' => 'Full Descripition',
			'released_at' => 'Released At',
			'count_game' => 'Count Game',
			'count_news' => 'Count News',
			'count_user_rated' => 'Count User Rated',
			'is_hot' => 'Is Hot',
			'is_featured' => 'Is Featured',
			'rate_point' => 'Rate Point',
			'playnow_title' => 'Playnow Title',
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
		$criteria->compare('publisher_id',$this->publisher_id);
		$criteria->compare('sort_description',$this->sort_description,true);
		$criteria->compare('full_descripition',$this->full_descripition,true);
		$criteria->compare('released_at',$this->released_at);
		$criteria->compare('count_game',$this->count_game);
		$criteria->compare('count_news',$this->count_news);
		$criteria->compare('count_user_rated',$this->count_user_rated);
		$criteria->compare('is_hot',$this->is_hot);
		$criteria->compare('is_featured',$this->is_featured);
		$criteria->compare('rate_point',$this->rate_point);
		$criteria->compare('playnow_title',$this->playnow_title,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}