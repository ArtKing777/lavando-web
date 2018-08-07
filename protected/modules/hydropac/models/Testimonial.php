<?php

/**
 * This is the model class for table "testimonial".
 *
 * The followings are the available columns in table 'testimonial':
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $title
 * @property string $message
 * @property integer $rating
 * @property string $profile_image
 * @property integer $priority
 * @property integer $status_id
 * @property integer $created_by_user_id
 * @property integer $updated_by_user_id
 * @property string $create_time
 * @property string $update_time
 *
 * The followings are the available model relations:
 * @property User $createdByUser
 * @property Status $status
 * @property User $updatedByUser
 */
class Testimonial extends ModuleActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'testimonial';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rating, priority, status_id, created_by_user_id, updated_by_user_id', 'numerical', 'integerOnly'=>true),
			array('first_name, last_name, title, profile_image', 'length', 'max'=>255),
			array('message, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, first_name, last_name, title, message, rating, profile_image, priority, status_id, created_by_user_id, updated_by_user_id, create_time, update_time', 'safe', 'on'=>'search'),
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
			'status' => array(self::BELONGS_TO, 'Status', 'status_id'),
			'updatedByUser' => array(self::BELONGS_TO, 'User', 'updated_by_user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'title' => 'Title',
			'message' => 'Message',
			'rating' => 'Rating',
			'profile_image' => 'Profile Image',
			'priority' => 'Priority',
			'status_id' => 'Status',
			'created_by_user_id' => 'Created By User',
			'updated_by_user_id' => 'Updated By User',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
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
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('rating',$this->rating);
		$criteria->compare('profile_image',$this->profile_image,true);
		$criteria->compare('priority',$this->priority);
		$criteria->compare('status_id',$this->status_id);
		$criteria->compare('created_by_user_id',$this->created_by_user_id);
		$criteria->compare('updated_by_user_id',$this->updated_by_user_id);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Testimonial the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
