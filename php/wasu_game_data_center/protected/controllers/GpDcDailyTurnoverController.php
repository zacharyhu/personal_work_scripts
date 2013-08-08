<?php

class GpDcDailyTurnoverController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1_dc';

// 	/**
// 	 * @return array action filters
// 	 */
// 	public function filters()
// 	{
// 		return array(
// 			'accessControl', // perform access control for CRUD operations
// 		);
// 	}

// 	/**
// 	 * Specifies the access control rules.
// 	 * This method is used by the 'accessControl' filter.
// 	 * @return array access control rules
// 	 */
// 	public function accessRules()
// 	{
// 		return array(
// 			array('allow',  // allow all users to perform 'index' and 'view' actions
// 				'actions'=>array('index','view','api'),
// 				'users'=>array('*'),
// 			),
// 			array('allow', // allow authenticated user to perform 'create' and 'update' actions
// 				'actions'=>array('create','update'),
// 				'users'=>array('@'),
// 			),
// 			array('allow', // allow admin user to perform 'admin' and 'delete' actions
// 				'actions'=>array('admin','delete','viewlist'),
// 				'users'=>array('admin'),
// 			),
// 			array('deny',  // deny all users
// 				'users'=>array('*'),
// 			),
// 		);
// 	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
	

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new GpDcDailyTurnover;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['GpDcDailyTurnover']))
		{
			$model->attributes=$_POST['GpDcDailyTurnover'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['GpDcDailyTurnover']))
		{
			$model->attributes=$_POST['GpDcDailyTurnover'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionApi()
	{
		$get_id=$_GET['uid'];
		echo "get uid: ".$get_id;
		
	}
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('GpDcDailyTurnover');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new GpDcDailyTurnover('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['GpDcDailyTurnover']))
			$model->attributes=$_GET['GpDcDailyTurnover'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	/**
	 * 创建报表列表
	 * 
	 */
	public function actionViewlist()
	{
		$model=new GpDcDailyTurnover('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['GpDcDailyTurnover']))
			$model->attributes=$_GET['GpDcDailyTurnover'];
	
		$this->render('viewlist',array(
				'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=GpDcDailyTurnover::model()->findByPk((int)$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='gp-dc-daily-turnover-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
