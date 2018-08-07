<?php
class FrontendModule extends WSModule
{
    public function init()
    {
        parent::init();
        $this->setBaseModule('hydropac');
    }
}
