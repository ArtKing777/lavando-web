<?php

/**
 * This is the model class for table "registration".
 *
 * The followings are the available columns in table 'registration':
 * @property integer $id
 * @property integer $event_id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $mobile_number
 * @property integer $is_someone
 * @property string $remark
 * @property integer $is_paid
 * @property string $payment_details
 * @property string $register_date
 * @property integer $status_id
 * @property string $create_time
 * @property string $update_time
 * @property integer $created_by_user_id
 * @property integer $updated_by_user_id
 *
 * The followings are the available model relations:
 * @property Event $createdByUser
 * @property Event $event
 * @property Status $status
 * @property Event $updatedByUser
 */
class Registration extends ModuleActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'registration';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('event_id, is_someone, is_paid, status_id, created_by_user_id, updated_by_user_id', 'numerical', 'integerOnly'=>true),
			array('first_name, last_name, email, mobile_number', 'length', 'max'=>255),
			array('remark, payment_details, register_date, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, event_id, first_name, last_name, email, mobile_number, is_someone, remark, is_paid, payment_details, register_date, status_id, create_time, update_time, created_by_user_id, updated_by_user_id', 'safe', 'on'=>'search'),
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
			'createdByUser' => array(self::BELONGS_TO, 'Event', 'created_by_user_id'),
			'event' => array(self::BELONGS_TO, 'Event', 'event_id'),
			'status' => array(self::BELONGS_TO, 'Status', 'status_id'),
			'updatedByUser' => array(self::BELONGS_TO, 'Event', 'updated_by_user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'event_id' => 'Event',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'email' => 'Email',
			'mobile_number' => 'Mobile Number',
			'is_someone' => 'Is Someone',
			'remark' => 'Remark',
			'is_paid' => 'Is Paid',
			'payment_details' => 'Payment Details',
			'register_date' => 'Register Date',
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
		$criteria->compare('event_id',$this->event_id);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('mobile_number',$this->mobile_number,true);
		$criteria->compare('is_someone',$this->is_someone);
		$criteria->compare('remark',$this->remark,true);
		$criteria->compare('is_paid',$this->is_paid);
		$criteria->compare('payment_details',$this->payment_details,true);
		$criteria->compare('register_date',$this->register_date,true);
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
	 * @return Registration the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
