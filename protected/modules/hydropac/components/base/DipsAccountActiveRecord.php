<?php
/**
 * ActiveRecord is the customized base activerecord class.
 * All activerecord classes for this application should extend from this base class.
 */
class DipsAccountActiveRecord extends ActiveRecord
{
    public static $DB;

    protected $tbl_prefix = null;

    /**
     * Force the child classes to use our table name prefixer
     */
    final public function tableName()
    {
        // If we haven't retrieved the table prefix yet
        if ($this->tbl_prefix === null)
        {
            // Fetch prefix
            $this->tbl_prefix = Yii::app()->dipsAccountDb->tablePrefix;
        }

        // Prepend prefix, call our new method
        return ($this->tbl_prefix . $this->_tableName());
    }

    /**
     * Function for child classes to implement to return the table name associated with it
     */
    protected function _tableName()
    {
        // Call the original method for our table name stuff
        return parent::tableName();
    }
    
    public function getDbConnection()
    {       
        if(self::$DB!==null)
            return self::$DB;
        else {
            self::$DB = Yii::app()->dipsAccountDb;
            
            if(self::$DB instanceof CDbConnection){
                self::$DB->setActive(true);
                return self::$DB;
            }
            else {
                throw new CDbException(Yii::t('yii','Active Record requires a "db" CDbConnection application component.'));
            }
        }
    }
    
    protected function beforeSave()
    {
        if(parent::beforeSave())
        {       
            if ($this->scenario == 'insert'){
                $this->create_time = date("Y-m-d H:i:s");
            }
            elseif ($this->scenario == 'update'){
                $this->update_time = date("Y-m-d H:i:s");
            }
            
            // Format dates based on the locale
            foreach($this->metadata->tableSchema->columns as $columnName => $column)
            {
                if (trim($this->$columnName) == ""){
                    $this->$columnName = null;
                }
                else {
                    if ($column->dbType == 'date'){                    
                        $this->$columnName = date("Y-m-d", strtotime($this->$columnName));                    
                    }
                    elseif ($column->dbType == 'datetime' || $column->dbType == 'timestamp'){
                        $this->$columnName = date("Y-m-d H:i:s", strtotime($this->$columnName));
                    }
                }
            }
            return parent::beforeSave();
        }
        else
            return parent::beforeSave();
    }

    protected function afterFind()
    {
        // Format dates based on the locale
        foreach($this->metadata->tableSchema->columns as $columnName => $column)
        {
            if ($this->$columnName == null){
                $this->$columnName = "";
            }
            else {
                if ($column->dbType == 'date'){
                    $this->$columnName = date("d-M-Y", strtotime($this->$columnName));                    
                }
                elseif ($column->dbType == 'datetime' || $column->dbType == 'timestamp'){
                    $this->$columnName = date("d-M-Y H:i:s", strtotime($this->$columnName));
                }
            }
        }
        return parent::afterFind();
    }

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}