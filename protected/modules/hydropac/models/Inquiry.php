<?php

/**
 * This is the model class for table "inquiry".
 *
 * The followings are the available columns in table 'inquiry':
 * @property integer $id
 * @property string $inquiry_date
 * @property string $first_name
 * @property string $last_name
 * @property string $company_name
 * @property string $address1
 * @property string $address2
 * @property string $address3
 * @property string $city
 * @property string $state
 * @property integer $country_id
 * @property string $postcode
 * @property string $email
 * @property string $work_phone
 * @property string $home_phone
 * @property string $mobile_number
 * @property string $fax
 * @property string $url
 * @property integer $status_id
 * @property string $remark
 * @property integer $priority
 * @property string $create_time
 * @property string $update_time
 * @property integer $created_by_user_id
 * @property integer $updated_by_user_id
 *
 * The followings are the available model relations:
 * @property User $createdByUser
 * @property Status $status
 * @property User $updatedByUser
 */
class Inquiry extends ModuleActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'inquiry';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('country_id, status_id, priority, created_by_user_id, updated_by_user_id', 'numerical', 'integerOnly'=>true),
			array('first_name, last_name, company_name, address1, address2, address3, city, state, postcode, email, work_phone, home_phone, mobile_number, fax, url', 'length', 'max'=>255),
			array('inquiry_date, remark, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, inquiry_date, first_name, last_name, company_name, address1, address2, address3, city, state, country_id, postcode, email, work_phone, home_phone, mobile_number, fax, url, status_id, remark, priority, create_time, update_time, created_by_user_id, updated_by_user_id', 'safe', 'on'=>'search'),
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
			'inquiry_date' => 'Inquiry Date',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'company_name' => 'Company Name',
			'address1' => 'Address1',
			'address2' => 'Address2',
			'address3' => 'Address3',
			'city' => 'City',
			'state' => 'State',
			'country_id' => 'Country',
			'postcode' => 'Postcode',
			'email' => 'Email',
			'work_phone' => 'Work Phone',
			'home_phone' => 'Home Phone',
			'mobile_number' => 'Mobile Number',
			'fax' => 'Fax',
			'url' => 'Url',
			'status_id' => 'Status',
			'remark' => 'Remark',
			'priority' => 'Priority',
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
		$criteria->compare('inquiry_date',$this->inquiry_date,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('company_name',$this->company_name,true);
		$criteria->compare('address1',$this->address1,true);
		$criteria->compare('address2',$this->address2,true);
		$criteria->compare('address3',$this->address3,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('state',$this->state,true);
		$criteria->compare('country_id',$this->country_id);
		$criteria->compare('postcode',$this->postcode,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('work_phone',$this->work_phone,true);
		$criteria->compare('home_phone',$this->home_phone,true);
		$criteria->compare('mobile_number',$this->mobile_number,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('status_id',$this->status_id);
		$criteria->compare('remark',$this->remark,true);
		$criteria->compare('priority',$this->priority);
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
	 * @return Inquiry the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
