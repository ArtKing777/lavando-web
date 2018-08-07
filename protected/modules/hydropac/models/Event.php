<?php

/**
 * This is the model class for table "event".
 *
 * The followings are the available columns in table 'event':
 * @property integer $id
 * @property integer $event_type_id
 * @property string $title
 * @property string $event_date
 * @property string $event_time
 * @property string $instructor
 * @property string $address1
 * @property string $address2
 * @property string $address3
 * @property string $city
 * @property string $state
 * @property double $price
 * @property string $title1
 * @property string $content1
 * @property string $image1
 * @property string $title2
 * @property string $content2
 * @property string $image2
 * @property string $title3
 * @property string $content3
 * @property string $image3
 * @property integer $priority
 * @property integer $status_id
 * @property string $create_time
 * @property string $update_time
 * @property integer $created_by_user_id
 * @property integer $updated_by_user_id
 *
 * The followings are the available model relations:
 * @property User $createdByUser
 * @property EventType $eventType
 * @property Status $status
 * @property User $updatedByUser
 * @property Registration[] $registrations
 * @property Registration[] $registrations1
 * @property Registration[] $registrations2
 */
class Event extends ModuleActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'event';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('event_type_id, priority, status_id, created_by_user_id, updated_by_user_id', 'numerical', 'integerOnly'=>true),
			array('price', 'numerical'),
			array('title, event_time, instructor, address1, address2, address3, city, state, title1, image1, title2, image2, title3, image3', 'length', 'max'=>255),
			array('event_date, content1, content2, content3, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, event_type_id, title, event_date, event_time, instructor, address1, address2, address3, city, state, price, title1, content1, image1, title2, content2, image2, title3, content3, image3, priority, status_id, create_time, update_time, created_by_user_id, updated_by_user_id', 'safe', 'on'=>'search'),
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
			'createdByUser' => array(self::BELONGS_TO, 'User', 'created_by_user_id'),
			'eventType' => array(self::BELONGS_TO, 'EventType', 'event_type_id'),
			'status' => array(self::BELONGS_TO, 'Status', 'status_id'),
			'updatedByUser' => array(self::BELONGS_TO, 'User', 'updated_by_user_id'),
			'registrations' => array(self::HAS_MANY, 'Registration', 'created_by_user_id'),
			'registrations1' => array(self::HAS_MANY, 'Registration', 'event_id'),
			'registrations2' => array(self::HAS_MANY, 'Registration', 'updated_by_user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'event_type_id' => 'Event Type',
			'title' => 'Title',
			'event_date' => 'Event Date',
			'event_time' => 'Event Time',
			'instructor' => 'Instructor',
			'address1' => 'Address1',
			'address2' => 'Address2',
			'address3' => 'Address3',
			'city' => 'City',
			'state' => 'State',
			'price' => 'Price',
			'title1' => 'Title1',
			'content1' => 'Content1',
			'image1' => 'Image1',
			'title2' => 'Title2',
			'content2' => 'Content2',
			'image2' => 'Image2',
			'title3' => 'Title3',
			'content3' => 'Content3',
			'image3' => 'Image3',
			'priority' => 'Priority',
			'status_id' => 'Status',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
			'created_by_user_id' => 'Created By User',
			'updated_by_user_id' => 'Updated By User',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('event_type_id',$this->event_type_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('event_date',$this->event_date,true);
		$criteria->compare('event_time',$this->event_time,true);
		$criteria->compare('instructor',$this->instructor,true);
		$criteria->compare('address1',$this->address1,true);
		$criteria->compare('address2',$this->address2,true);
		$criteria->compare('address3',$this->address3,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('state',$this->state,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('title1',$this->title1,true);
		$criteria->compare('content1',$this->content1,true);
		$criteria->compare('image1',$this->image1,true);
		$criteria->compare('title2',$this->title2,true);
		$criteria->compare('content2',$this->content2,true);
		$criteria->compare('image2',$this->image2,true);
		$criteria->compare('title3',$this->title3,true);
		$criteria->compare('content3',$this->content3,true);
		$criteria->compare('image3',$this->image3,true);
		$criteria->compare('priority',$this->priority);
		$criteria->compare('status_id',$this->status_id);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('created_by_user_id',$this->created_by_user_id);
		$criteria->compare('updated_by_user_id',$this->updated_by_user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Event the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
