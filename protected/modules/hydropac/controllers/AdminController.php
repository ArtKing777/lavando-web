<?php
class AdminController extends Controller
{
    public function actionIndex()
    {
        $this->layout = 'backend';
        $this->render('index');
    }
}