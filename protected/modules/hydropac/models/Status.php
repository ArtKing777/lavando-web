<?php

/**
 * This is the model class for table "status".
 *
 * The followings are the available columns in table 'status':
 * @property integer $id
 * @property string $name
 * @property string $create_time
 * @property string $update_time
 * @property integer $created_by_user_id
 * @property integer $updated_by_user_id
 *
 * The followings are the available model relations:
 * @property Account[] $accounts
 * @property Advisor[] $advisors
 * @property Event[] $events
 * @property Inquiry[] $inquiries
 * @property Page[] $pages
 * @property Property[] $properties
 * @property Registration[] $registrations
 * @property User $createdByUser
 * @property User $updatedByUser
 * @property User[] $users
 */
class Status extends ModuleActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'status';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('created_by_user_id, updated_by_user_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('create_time, update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, create_time, update_time, created_by_user_id, updated_by_user_id', 'safe', 'on'=>'search'),
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
			'accounts' => array(self::HAS_MANY, 'Account', 'status_id'),
			'advisors' => array(self::HAS_MANY, 'Advisor', 'status_id'),
			'events' => array(self::HAS_MANY, 'Event', 'status_id'),
			'inquiries' => array(self::HAS_MANY, 'Inquiry', 'status_id'),
			'pages' => array(self::HAS_MANY, 'Page', 'status_id'),
			'properties' => array(self::HAS_MANY, 'Property', 'status_id'),
			'registrations' => array(self::HAS_MANY, 'Registration', 'status_id'),
			'createdByUser' => array(self::BELONGS_TO, 'User', 'created_by_user_id'),
			'updatedByUser' => array(self::BELONGS_TO, 'User', 'updated_by_user_id'),
			'users' => array(self::HAS_MANY, 'User', 'status_id'),
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
		$criteria->compare('name',$this->name,true);
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
	 * @return Status the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
