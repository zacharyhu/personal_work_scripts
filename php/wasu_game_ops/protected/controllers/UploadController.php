<?php

class UploadController extends Controller
{
	public function actionIndex()
	{
		$model=new Item;
// 		print_r($_POST);
// 		print_r($_FILES);
// 		exit();
		if(isset($_POST['Item']))
		{
			$model->attributes=$_POST['Item'];
			$model->image=CUploadedFile::getInstance($model,'image');
// 			if($model->save())
// 			{
				$model->image->saveAs(yii::app()->basePath.'/../Upload\a.gif');
				// redirect to success page
// 			}
		}
		$this->render('index', array('model'=>$model));
	}


	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}