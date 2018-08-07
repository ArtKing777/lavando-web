<?php

/**
 * This is the model class for table "teammember".
 *
 * The followings are the available columns in table 'teammember':
 * @property integer $id
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
 * @property string $bio
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
class Teammember extends ModuleActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'teammember';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status_id, priority, created_by_user_id, updated_by_user_id', 'numerical', 'integerOnly'=>true),
			array('title, first_name, last_name, company_name, designation, address1, address2, address3, city, state, country, postcode, email, work_phone, home_phone, mobile_number, fax, url, dropbox_email, facebook_handel, twitter_handel, linkedin_handel, youtube_handel, google_plus_handel, skype_handel, profile_image', 'length', 'max'=>255),
			array('bio, remark, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, first_name, last_name, company_name, designation, address1, address2, address3, city, state, country, postcode, email, work_phone, home_phone, mobile_number, fax, url, dropbox_email, facebook_handel, twitter_handel, linkedin_handel, youtube_handel, google_plus_handel, skype_handel, profile_image, bio, status_id, remark, priority, create_time, update_time, created_by_user_id, updated_by_user_id', 'safe', 'on'=>'search'),
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
			'bio' => 'Bio',
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
		$criteria->compare('bio',$this->bio,true);
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
	 * @return Teammember the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
