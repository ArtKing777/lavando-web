<?php

/**
 * This is the model class for table "tenant_document".
 *
 * The followings are the available columns in table 'tenant_document':
 * @property integer $id
 * @property integer $tenant_id
 * @property string $name
 * @property string $file
 * @property string $file_date
 * @property string $remark
 * @property integer $document_status_id
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
class TenantDocument extends ModuleActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tenant_document';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tenant_id, document_status_id, created_by_user_id, updated_by_user_id', 'numerical', 'integerOnly'=>true),
			array('name, file', 'length', 'max'=>255),
			array('file_date, remark, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, tenant_id, name, file, file_date, remark, document_status_id, created_by_user_id, updated_by_user_id, create_time, update_time', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'file' => 'File',
			'file_date' => 'File Date',
			'remark' => 'Remark',
			'document_status_id' => 'Document Status',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('file',$this->file,true);
		$criteria->compare('file_date',$this->file_date,true);
		$criteria->compare('remark',$this->remark,true);
		$criteria->compare('document_status_id',$this->document_status_id);
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
	 * @return TenantDocument the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
