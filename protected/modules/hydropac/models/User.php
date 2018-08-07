<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property integer $account_id
 * @property integer $user_group_id
 * @property string $username
 * @property string $password
 * @property string $title
 * @property string $first_name
 * @property string $last_name
 * @property string $company_name
 * @property string $designation
 * @property string $address1
 * @property string $address2
 * @property string $address3
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $postcode
 * @property string $email
 * @property string $work_phone
 * @property string $home_phone
 * @property string $mobile_number
 * @property string $fax
 * @property string $url
 * @property string $dropbox_email
 * @property string $facebook_handel
 * @property string $twitter_handel
 * @property string $linkedin_handel
 * @property string $youtube_handel
 * @property string $google_plus_handel
 * @property string $skype_handel
 * @property string $profile_image
 * @property integer $timezone_id
 * @property string $actkey
 * @property integer $is_verified
 * @property integer $status_id
 * @property string $ip_last_login
 * @property string $last_login_time
 * @property string $remark
 * @property string $create_time
 * @property string $update_time
 * @property integer $created_by_user_id
 * @property integer $updated_by_user_id
 *
 * The followings are the available model relations:
 * @property Account[] $accounts
 * @property Account[] $accounts1
 * @property AccountType[] $accountTypes
 * @property AccountType[] $accountTypes1
 * @property Advisor[] $advisors
 * @property Advisor[] $advisors1
 * @property Event[] $events
 * @property Event[] $events1
 * @property Inquiry[] $inquiries
 * @property Inquiry[] $inquiries1
 * @property Page[] $pages
 * @property Page[] $pages1
 * @property PageType[] $pageTypes
 * @property PageType[] $pageTypes1
 * @property Property[] $properties
 * @property Property[] $properties1
 * @property Property[] $properties2
 * @property Status[] $statuses
 * @property Status[] $statuses1
 * @property Tenancy[] $tenancies
 * @property Tenancy[] $tenancies1
 * @property TenancyStatus[] $tenancyStatuses
 * @property TenancyStatus[] $tenancyStatuses1
 * @property TenancyType[] $tenancyTypes
 * @property TenancyType[] $tenancyTypes1
 * @property Tenant[] $tenants
 * @property Tenant[] $tenants1
 * @property TenantAddress[] $tenantAddresses
 * @property TenantAddress[] $tenantAddresses1
 * @property TenantDocument[] $tenantDocuments
 * @property TenantDocument[] $tenantDocuments1
 * @property TenantEmployment[] $tenantEmployments
 * @property TenantEmployment[] $tenantEmployments1
 * @property TenantType[] $tenantTypes
 * @property TenantType[] $tenantTypes1
 * @property Account $account
 * @property User $createdByUser
 * @property User[] $users
 * @property Status $status
 * @property User $updatedByUser
 * @property User[] $users1
 * @property UserGroup $userGroup
 * @property UserGroup[] $userGroups
 * @property UserGroup[] $userGroups1
 */
class User extends ModuleActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username', 'required'),
			array('account_id, user_group_id, timezone_id, is_verified, status_id, created_by_user_id, updated_by_user_id', 'numerical', 'integerOnly'=>true),
			array('username, password, title, first_name, last_name, company_name, designation, address1, address2, address3, city, state, country, postcode, email, work_phone, home_phone, mobile_number, fax, url, dropbox_email, facebook_handel, twitter_handel, linkedin_handel, youtube_handel, google_plus_handel, skype_handel, profile_image, actkey, ip_last_login', 'length', 'max'=>255),
			array('last_login_time, remark, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, account_id, user_group_id, username, password, title, first_name, last_name, company_name, designation, address1, address2, address3, city, state, country, postcode, email, work_phone, home_phone, mobile_number, fax, url, dropbox_email, facebook_handel, twitter_handel, linkedin_handel, youtube_handel, google_plus_handel, skype_handel, profile_image, timezone_id, actkey, is_verified, status_id, ip_last_login, last_login_time, remark, create_time, update_time, created_by_user_id, updated_by_user_id', 'safe', 'on'=>'search'),
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
			'accounts' => array(self::HAS_MANY, 'Account', 'created_by_user_id'),
			'accounts1' => array(self::HAS_MANY, 'Account', 'updated_by_user_id'),
			'accountTypes' => array(self::HAS_MANY, 'AccountType', 'created_by_user_id'),
			'accountTypes1' => array(self::HAS_MANY, 'AccountType', 'updated_by_user_id'),
			'advisors' => array(self::HAS_MANY, 'Advisor', 'created_by_user_id'),
			'advisors1' => array(self::HAS_MANY, 'Advisor', 'updated_by_user_id'),
			'events' => array(self::HAS_MANY, 'Event', 'created_by_user_id'),
			'events1' => array(self::HAS_MANY, 'Event', 'updated_by_user_id'),
			'inquiries' => array(self::HAS_MANY, 'Inquiry', 'created_by_user_id'),
			'inquiries1' => array(self::HAS_MANY, 'Inquiry', 'updated_by_user_id'),
			'pages' => array(self::HAS_MANY, 'Page', 'created_by_user_id'),
			'pages1' => array(self::HAS_MANY, 'Page', 'updated_by_user_id'),
			'pageTypes' => array(self::HAS_MANY, 'PageType', 'created_by_user_id'),
			'pageTypes1' => array(self::HAS_MANY, 'PageType', 'updated_by_user_id'),
			'properties' => array(self::HAS_MANY, 'Property', 'created_by_user_id'),
			'properties1' => array(self::HAS_MANY, 'Property', 'updated_by_user_id'),
			'properties2' => array(self::HAS_MANY, 'Property', 'user_id'),
			'statuses' => array(self::HAS_MANY, 'Status', 'created_by_user_id'),
			'statuses1' => array(self::HAS_MANY, 'Status', 'updated_by_user_id'),
			'tenancies' => array(self::HAS_MANY, 'Tenancy', 'created_by_user_id'),
			'tenancies1' => array(self::HAS_MANY, 'Tenancy', 'updated_by_user_id'),
			'tenancyStatuses' => array(self::HAS_MANY, 'TenancyStatus', 'created_by_user_id'),
			'tenancyStatuses1' => array(self::HAS_MANY, 'TenancyStatus', 'updated_by_user_id'),
			'tenancyTypes' => array(self::HAS_MANY, 'TenancyType', 'created_by_user_id'),
			'tenancyTypes1' => array(self::HAS_MANY, 'TenancyType', 'updated_by_user_id'),
			'tenants' => array(self::HAS_MANY, 'Tenant', 'created_by_user_id'),
			'tenants1' => array(self::HAS_MANY, 'Tenant', 'updated_by_user_id'),
			'tenantAddresses' => array(self::HAS_MANY, 'TenantAddress', 'created_by_user_id'),
			'tenantAddresses1' => array(self::HAS_MANY, 'TenantAddress', 'updated_by_user_id'),
			'tenantDocuments' => array(self::HAS_MANY, 'TenantDocument', 'created_by_user_id'),
			'tenantDocuments1' => array(self::HAS_MANY, 'TenantDocument', 'updated_by_user_id'),
			'tenantEmployments' => array(self::HAS_MANY, 'TenantEmployment', 'created_by_user_id'),
			'tenantEmployments1' => array(self::HAS_MANY, 'TenantEmployment', 'updated_by_user_id'),
			'tenantTypes' => array(self::HAS_MANY, 'TenantType', 'created_by_user_id'),
			'tenantTypes1' => array(self::HAS_MANY, 'TenantType', 'updated_by_user_id'),
			'account' => array(self::BELONGS_TO, 'Account', 'account_id'),
			'createdByUser' => array(self::BELONGS_TO, 'User', 'created_by_user_id'),
			'users' => array(self::HAS_MANY, 'User', 'created_by_user_id'),
			'status' => array(self::BELONGS_TO, 'Status', 'status_id'),
			'updatedByUser' => array(self::BELONGS_TO, 'User', 'updated_by_user_id'),
			'users1' => array(self::HAS_MANY, 'User', 'updated_by_user_id'),
			'userGroup' => array(self::BELONGS_TO, 'UserGroup', 'user_group_id'),
			'userGroups' => array(self::HAS_MANY, 'UserGroup', 'created_by_user_id'),
			'userGroups1' => array(self::HAS_MANY, 'UserGroup', 'updated_by_user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'account_id' => 'Account',
			'user_group_id' => 'User Group',
			'username' => 'Username',
			'password' => 'Password',
			'title' => 'Title',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'company_name' => 'Company Name',
			'designation' => 'Designation',
			'address1' => 'Address1',
			'address2' => 'Address2',
			'address3' => 'Address3',
			'city' => 'City',
			'state' => 'State',
			'country' => 'Country',
			'postcode' => 'Postcode',
			'email' => 'Email',
			'work_phone' => 'Work Phone',
			'home_phone' => 'Home Phone',
			'mobile_number' => 'Mobile Number',
			'fax' => 'Fax',
			'url' => 'Url',
			'dropbox_email' => 'Dropbox Email',
			'facebook_handel' => 'Facebook Handel',
			'twitter_handel' => 'Twitter Handel',
			'linkedin_handel' => 'Linkedin Handel',
			'youtube_handel' => 'Youtube Handel',
			'google_plus_handel' => 'Google Plus Handel',
			'skype_handel' => 'Skype Handel',
			'profile_image' => 'Profile Image',
			'timezone_id' => 'Timezone',
			'actkey' => 'Actkey',
			'is_verified' => 'Is Verified',
			'status_id' => 'Status',
			'ip_last_login' => 'Ip Last Login',
			'last_login_time' => 'Last Login Time',
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
		$criteria->compare('account_id',$this->account_id);
		$criteria->compare('user_group_id',$this->user_group_id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('company_name',$this->company_name,true);
		$criteria->compare('designation',$this->designation,true);
		$criteria->compare('address1',$this->address1,true);
		$criteria->compare('address2',$this->address2,true);
		$criteria->compare('address3',$this->address3,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('state',$this->state,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('postcode',$this->postcode,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('work_phone',$this->work_phone,true);
		$criteria->compare('home_phone',$this->home_phone,true);
		$criteria->compare('mobile_number',$this->mobile_number,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('dropbox_email',$this->dropbox_email,true);
		$criteria->compare('facebook_handel',$this->facebook_handel,true);
		$criteria->compare('twitter_handel',$this->twitter_handel,true);
		$criteria->compare('linkedin_handel',$this->linkedin_handel,true);
		$criteria->compare('youtube_handel',$this->youtube_handel,true);
		$criteria->compare('google_plus_handel',$this->google_plus_handel,true);
		$criteria->compare('skype_handel',$this->skype_handel,true);
		$criteria->compare('profile_image',$this->profile_image,true);
		$criteria->compare('timezone_id',$this->timezone_id);
		$criteria->compare('actkey',$this->actkey,true);
		$criteria->compare('is_verified',$this->is_verified);
		$criteria->compare('status_id',$this->status_id);
		$criteria->compare('ip_last_login',$this->ip_last_login,true);
		$criteria->compare('last_login_time',$this->last_login_time,true);
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
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
