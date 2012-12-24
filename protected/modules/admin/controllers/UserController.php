<?php

class UserController extends Controller
{
	public function action_form()
	{
		$this->render('_form');
	}

	public function actionAdmin()
	{
		$this->render('admin');
	}

	public function actionCreate()
	{
		$this->render('create');
	}
}