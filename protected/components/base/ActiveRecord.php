<?php
/**
 * ActiveRecord is the customized base activerecord class.
 * All activerecord classes for this application should extend from this base class.
 */
class ActiveRecord extends CActiveRecord
{  
    protected function beforeSave()
    {
        if(parent::beforeSave())
        {       
            if ($this->scenario == 'insert'){
                $this->create_time = date("Y-m-d H:i:s");
                $this->created_by_user_id = Yii::app()->user->id;
            }
            elseif ($this->scenario == 'update'){
                $this->update_time = date("Y-m-d H:i:s");
                $this->updated_by_user_id = Yii::app()->user->id;
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