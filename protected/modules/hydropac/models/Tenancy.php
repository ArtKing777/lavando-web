<?php

/**
 * This is the model class for table "tenancy".
 *
 * The followings are the available columns in table 'tenancy':
 * @property integer $id
 * @property integer $property_id
 * @property string $ref_no
 * @property integer $tenancy_type_id
 * @property integer $no_of_tenant
 * @property integer $tenant_type_id
 * @property string $tenancy_date
 * @property double $rent
 * @property string $rent_date
 * @property string $paymode
 * @property string $start_date
 * @property string $end_date
 * @property integer $tenancy_status_id
 * @property integer $created_by_user_id
 * @property integer $updated_by_user_id
 * @property string $create_time
 * @property string $update_time
 *
 * The followings are the available model relations:
 * @property User $createdByUser
 * @property Property $property
 * @property TenancyStatus $tenancyStatus
 * @property TenancyType $tenancyType
 * @property TenantType $tenantType
 * @property User $updatedByUser
 * @property Tenant[] $tenants
 */
class Tenancy extends ModuleActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tenancy';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('property_id, tenancy_type_id, no_of_tenant, tenant_type_id, tenancy_status_id, created_by_user_id, updated_by_user_id', 'numerical', 'integerOnly'=>true),
			array('rent', 'numerical'),
			array('ref_no, paymode', 'length', 'max'=>255),
			array('tenancy_date, rent_date, start_date, end_date, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, property_id, ref_no, tenancy_type_id, no_of_tenant, tenant_type_id, tenancy_date, rent, rent_date, paymode, start_date, end_date, tenancy_status_id, created_by_user_id, updated_by_user_id, create_time, update_time', 'safe', 'on'=>'search'),
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
			'property' => array(self::BELONGS_TO, 'Property', 'property_id'),
			'tenancyStatus' => array(self::BELONGS_TO, 'TenancyStatus', 'tenancy_status_id'),
			'tenancyType' => array(self::BELONGS_TO, 'TenancyType', 'tenancy_type_id'),
			'tenantType' => array(self::BELONGS_TO, 'TenantType', 'tenant_type_id'),
			'updatedByUser' => array(self::BELONGS_TO, 'User', 'updated_by_user_id'),
			'tenants' => array(self::HAS_MANY, 'Tenant', 'tenancy_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'property_id' => 'Property',
			'ref_no' => 'Ref No',
			'tenancy_type_id' => 'Tenancy Type',
			'no_of_tenant' => 'No Of Tenant',
			'tenant_type_id' => 'Tenant Type',
			'tenancy_date' => 'Tenancy Date',
			'rent' => 'Rent',
			'rent_date' => 'Rent Date',
			'paymode' => 'Paymode',
			'start_date' => 'Start Date',
			'end_date' => 'End Date',
			'tenancy_status_id' => 'Tenancy Status',
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
		$criteria->compare('property_id',$this->property_id);
		$criteria->compare('ref_no',$this->ref_no,true);
		$criteria->compare('tenancy_type_id',$this->tenancy_type_id);
		$criteria->compare('no_of_tenant',$this->no_of_tenant);
		$criteria->compare('tenant_type_id',$this->tenant_type_id);
		$criteria->compare('tenancy_date',$this->tenancy_date,true);
		$criteria->compare('rent',$this->rent);
		$criteria->compare('rent_date',$this->rent_date,true);
		$criteria->compare('paymode',$this->paymode,true);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('tenancy_status_id',$this->tenancy_status_id);
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
	 * @return Tenancy the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
