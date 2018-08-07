<?php

/**
 * This is the model class for table "tenant_employment".
 *
 * The followings are the available columns in table 'tenant_employment':
 * @property integer $id
 * @property integer $tenant_id
 * @property string $company_name
 * @property string $designation
 * @property string $address1
 * @property string $address2
 * @property string $city
 * @property string $state
 * @property string $postcode
 * @property string $from_date
 * @property string $to_date
 * @property integer $employment_status_id
 * @property integer $created_by_user_id
 * @property integer $updated_by_user_id
 * @property string $create_time
 * @property string $update_time
 *
 * The followings are the available model relations:
 * @property User $createdByUser
 * @property Tenant $tenant
 * @property User $updatedByUser
 */
class TenantEmployment extends ModuleActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tenant_employment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tenant_id, employment_status_id, created_by_user_id, updated_by_user_id', 'numerical', 'integerOnly'=>true),
			array('company_name, designation, address1, address2, city, state, postcode', 'length', 'max'=>255),
			array('from_date, to_date, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, tenant_id, company_name, designation, address1, address2, city, state, postcode, from_date, to_date, employment_status_id, created_by_user_id, updated_by_user_id, create_time, update_time', 'safe', 'on'=>'search'),
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
			'tenant' => array(self::BELONGS_TO, 'Tenant', 'tenant_id'),
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
			'tenant_id' => 'Tenant',
			'company_name' => 'Company Name',
			'designation' => 'Designation',
			'address1' => 'Address1',
			'address2' => 'Address2',
			'city' => 'City',
			'state' => 'State',
			'postcode' => 'Postcode',
			'from_date' => 'From Date',
			'to_date' => 'To Date',
			'employment_status_id' => 'Employment Status',
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
		$criteria->compare('tenant_id',$this->tenant_id);
		$criteria->compare('company_name',$this->company_name,true);
		$criteria->compare('designation',$this->designation,true);
		$criteria->compare('address1',$this->address1,true);
		$criteria->compare('address2',$this->address2,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('state',$this->state,true);
		$criteria->compare('postcode',$this->postcode,true);
		$criteria->compare('from_date',$this->from_date,true);
		$criteria->compare('to_date',$this->to_date,true);
		$criteria->compare('employment_status_id',$this->employment_status_id);
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
	 * @return TenantEmployment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
