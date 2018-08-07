<?php

/**
 * This is the model class for table "tenant".
 *
 * The followings are the available columns in table 'tenant':
 * @property integer $id
 * @property integer $tenancy_id
 * @property integer $tenant_type_id
 * @property string $first_name
 * @property string $last_name
 * @property string $mobile_number
 * @property string $email
 * @property string $date_of_birth
 * @property integer $rent_share
 * @property string $ni_number
 * @property string $profile_image
 * @property string $bank_name
 * @property string $bank_account_number
 * @property string $bank_sort_code
 * @property string $credit_check_details
 * @property string $credit_check_file
 * @property string $credit_check_date
 * @property string $parent_first_name
 * @property string $parent_last_name
 * @property string $parent_mobile_number
 * @property string $parent_email
 * @property string $parent_ni_number
 * @property string $parent_bank_name
 * @property string $parent_bank_account_number
 * @property string $parent_bank_sort_code
 * @property string $parent_credit_check_details
 * @property string $parent_credit_check_file
 * @property integer $is_main_tenant
 * @property string $remark
 * @property string $create_time
 * @property string $update_time
 * @property integer $created_by_user_id
 * @property integer $updated_by_user_id
 *
 * The followings are the available model relations:
 * @property User $createdByUser
 * @property Tenancy $tenancy
 * @property TenancyType $tenantType
 * @property User $updatedByUser
 * @property TenantAddress[] $tenantAddresses
 * @property TenantDocument[] $tenantDocuments
 * @property TenantEmployment[] $tenantEmployments
 */
class Tenant extends ModuleActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tenant';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tenancy_id, tenant_type_id, rent_share, is_main_tenant, created_by_user_id, updated_by_user_id', 'numerical', 'integerOnly'=>true),
			array('first_name, last_name, mobile_number, email, ni_number, profile_image, bank_name, bank_account_number, bank_sort_code, credit_check_details, credit_check_file, parent_first_name, parent_last_name, parent_mobile_number, parent_email, parent_ni_number, parent_bank_name, parent_bank_account_number, parent_bank_sort_code, parent_credit_check_file', 'length', 'max'=>255),
			array('date_of_birth, credit_check_date, parent_credit_check_details, remark, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, tenancy_id, tenant_type_id, first_name, last_name, mobile_number, email, date_of_birth, rent_share, ni_number, profile_image, bank_name, bank_account_number, bank_sort_code, credit_check_details, credit_check_file, credit_check_date, parent_first_name, parent_last_name, parent_mobile_number, parent_email, parent_ni_number, parent_bank_name, parent_bank_account_number, parent_bank_sort_code, parent_credit_check_details, parent_credit_check_file, is_main_tenant, remark, create_time, update_time, created_by_user_id, updated_by_user_id', 'safe', 'on'=>'search'),
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
			'tenancy' => array(self::BELONGS_TO, 'Tenancy', 'tenancy_id'),
			'tenantType' => array(self::BELONGS_TO, 'TenancyType', 'tenant_type_id'),
			'updatedByUser' => array(self::BELONGS_TO, 'User', 'updated_by_user_id'),
			'tenantAddresses' => array(self::HAS_MANY, 'TenantAddress', 'tenant_id'),
			'tenantDocuments' => array(self::HAS_MANY, 'TenantDocument', 'tenant_id'),
			'tenantEmployments' => array(self::HAS_MANY, 'TenantEmployment', 'tenant_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'tenancy_id' => 'Tenancy',
			'tenant_type_id' => 'Tenant Type',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'mobile_number' => 'Mobile Number',
			'email' => 'Email',
			'date_of_birth' => 'Date Of Birth',
			'rent_share' => 'Rent Share',
			'ni_number' => 'Ni Number',
			'profile_image' => 'Profile Image',
			'bank_name' => 'Bank Name',
			'bank_account_number' => 'Bank Account Number',
			'bank_sort_code' => 'Bank Sort Code',
			'credit_check_details' => 'Credit Check Details',
			'credit_check_file' => 'Credit Check File',
			'credit_check_date' => 'Credit Check Date',
			'parent_first_name' => 'Parent First Name',
			'parent_last_name' => 'Parent Last Name',
			'parent_mobile_number' => 'Parent Mobile Number',
			'parent_email' => 'Parent Email',
			'parent_ni_number' => 'Parent Ni Number',
			'parent_bank_name' => 'Parent Bank Name',
			'parent_bank_account_number' => 'Parent Bank Account Number',
			'parent_bank_sort_code' => 'Parent Bank Sort Code',
			'parent_credit_check_details' => 'Parent Credit Check Details',
			'parent_credit_check_file' => 'Parent Credit Check File',
			'is_main_tenant' => 'Is Main Tenant',
			'remark' => 'Remark',
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
		$criteria->compare('tenancy_id',$this->tenancy_id);
		$criteria->compare('tenant_type_id',$this->tenant_type_id);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('mobile_number',$this->mobile_number,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('date_of_birth',$this->date_of_birth,true);
		$criteria->compare('rent_share',$this->rent_share);
		$criteria->compare('ni_number',$this->ni_number,true);
		$criteria->compare('profile_image',$this->profile_image,true);
		$criteria->compare('bank_name',$this->bank_name,true);
		$criteria->compare('bank_account_number',$this->bank_account_number,true);
		$criteria->compare('bank_sort_code',$this->bank_sort_code,true);
		$criteria->compare('credit_check_details',$this->credit_check_details,true);
		$criteria->compare('credit_check_file',$this->credit_check_file,true);
		$criteria->compare('credit_check_date',$this->credit_check_date,true);
		$criteria->compare('parent_first_name',$this->parent_first_name,true);
		$criteria->compare('parent_last_name',$this->parent_last_name,true);
		$criteria->compare('parent_mobile_number',$this->parent_mobile_number,true);
		$criteria->compare('parent_email',$this->parent_email,true);
		$criteria->compare('parent_ni_number',$this->parent_ni_number,true);
		$criteria->compare('parent_bank_name',$this->parent_bank_name,true);
		$criteria->compare('parent_bank_account_number',$this->parent_bank_account_number,true);
		$criteria->compare('parent_bank_sort_code',$this->parent_bank_sort_code,true);
		$criteria->compare('parent_credit_check_details',$this->parent_credit_check_details,true);
		$criteria->compare('parent_credit_check_file',$this->parent_credit_check_file,true);
		$criteria->compare('is_main_tenant',$this->is_main_tenant);
		$criteria->compare('remark',$this->remark,true);
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
	 * @return Tenant the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
