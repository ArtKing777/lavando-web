<?php
/**
 * ActiveRecord is the customized base activerecord class.
 * All activerecord classes for this application should extend from this base class.
 */
class ModuleActiveRecord extends ActiveRecord
{
    public static $DB;
    
    public function getDbConnection()
    {       
        if(self::$DB!==null)
            return self::$DB;
        else {
            self::$DB = Yii::app()->db;
            
            if(self::$DB instanceof CDbConnection){
                self::$DB->setActive(true);
                return self::$DB;
            }
            else {
                throw new CDbException(Yii::t('yii','Active Record requires a "db" CDbConnection application component.'));
            }
        }
    }
}