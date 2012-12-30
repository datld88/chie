<?php

/**
 * This is the model class for table "{{news}}".
 *
 * The followings are the available columns in table '{{news}}':
 * @property integer $id
 * @property string $title
 * @property string $summary
 * @property string $content
 * @property integer $created_at
 * @property integer $status
 * @property integer $position
 * @property integer $updated_at
 * @property integer $is_event
 *
 * The followings are the available model relations:
 * @property Game[] $chieGames
 */
class News extends CActiveRecord
{
    const STATUS_DRAFT=0;
    const STATUS_PUBLISHED=1;
    const STATUS_ARCHIEVED=2;
    
    const STATUS_DRAFT_STRING='Draft';
    const STATUS_PUBLISHED_STRING='Pubblished';
    const STATUS_ARCHIEVED_STRING='Archieved';
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return News the static model class
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
		return '{{news}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, status', 'required'),
			array('created_at, updated_at, position', 'numerical', 'integerOnly'=>true),
                        array('status', 'in', 'range'=>array(self::STATUS_ARCHIEVED, self::STATUS_DRAFT, self::STATUS_PUBLISHED), 'allowEmpty'=>false),
			array('title', 'length', 'max'=>200),
			array('summary', 'length', 'max'=>255),
			array('content', 'safe'),
                        array('is_event', 'boolean'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, summary, content, created_at, status, position, is_event', 'safe', 'on'=>'search'),
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
			'chieGames' => array(self::MANY_MANY, 'Game', '{{game_news}}(news_id, game_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'summary' => 'Summary',
			'content' => 'Content',
			'created_at' => 'Created At',
                        'updated_at'=>'Updated At',
			'status' => 'Status',
			'position' => 'Position',
			'is_event' => 'Is Event',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('summary',$this->summary,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('created_at',$this->created_at);
                $criteria->compare('updated_at',$this->updated_at);
		$criteria->compare('status',$this->status);
		$criteria->compare('position',$this->position);
		$criteria->compare('is_event',$this->is_event);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        //override function beforeSave()
        protected function beforeSave() {
            if(parent::beforeSave()){
                $this->updated_at=time();
                if($this->isNewRecord)
                    $this->created_at=time();
                return true;
            }
            return false;
        }
        public function getStatusString(){
            switch($this->status){
                case self::STATUS_DRAFT:
                    return self::STATUS_DRAFT_STRING;
                    break;
                case self::STATUS_PUBLISHED:
                    return self::STATUS_PUBLISHED_STRING;
                    break;
                case self::STATUS_ARCHIEVED:
                    return self::STATUS_ARCHIEVED_STRING;
                    break;
            }
        }
        public static function getStatusOptions(){
            return array(
                self::STATUS_DRAFT=>self::STATUS_DRAFT_STRING,
                self::STATUS_PUBLISHED=>self::STATUS_PUBLISHED_STRING,
                self::STATUS_ARCHIEVED=>self::STATUS_ARCHIEVED_STRING,
            );
        }
}