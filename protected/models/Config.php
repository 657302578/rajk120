<?php

class Config extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    
    public function tableName()
    {
        return '{{_config}}';
    }
}

?>