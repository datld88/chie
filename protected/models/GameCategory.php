<?php

/**
 * This is the model class for table "{{game_category}}".
 *
 * The followings are the available columns in table '{{game_category}}':
 * @property integer $id
 * @property string $name
 * @property integer $parent_id
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $path
 * @property integer $position
 * @property integer $level
 * @property integer $count_children
 * @property string $image
 * @property string $description
 * @property integer $sort_order
 * @property integer $is_featured
 *
 * The followings are the available model relations:
 * @property GameCategory $parent
 * @property GameCategory[] $gameCategories
 */
class GameCategory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GameCategory the static model class
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
		return '{{game_category}}';
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
			array('parent_id, created_at, updated_at, position, level, count_children, sort_order, is_featured', 'numerical', 'integerOnly'=>true),
			array('name, image, description', 'length', 'max'=>200),
			array('path', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, parent_id, created_at, updated_at, path, position, level, count_children, image, description, sort_order, is_featured', 'safe', 'on'=>'search'),
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
			'parent' => array(self::BELONGS_TO, 'GameCategory', 'parent_id'),
			'gameCategories' => array(self::HAS_MANY, 'GameCategory', 'parent_id'),
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
			'parent_id' => 'Parent',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
			'path' => 'Path',
			'position' => 'Position',
			'level' => 'Level',
			'count_children' => 'Count Children',
			'image' => 'Image',
			'description' => 'Description',
			'sort_order' => 'Sort Order',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('created_at',$this->created_at);
		$criteria->compare('updated_at',$this->updated_at);
		$criteria->compare('path',$this->path,true);
		$criteria->compare('position',$this->position);
		$criteria->compare('level',$this->level);
		$criteria->compare('count_children',$this->count_children);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('sort_order',$this->sort_order);
		$criteria->compare('is_featured',$this->is_featured);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}