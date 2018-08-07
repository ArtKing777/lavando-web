<?php
class BackendModule extends WSModule
{
    public function init()
    {
        parent::init();
        $this->setBaseModule('hydropac');
    }
}
