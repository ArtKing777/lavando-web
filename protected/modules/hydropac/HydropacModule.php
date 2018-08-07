<?php
class HydropacModule extends WSModule
{
    public function init()
    {
        parent::init();
        $this->setModules(array(
            'backend',
            'frontend'
        ));
        
        $this->setBaseModule('hydropac');
    }
}
