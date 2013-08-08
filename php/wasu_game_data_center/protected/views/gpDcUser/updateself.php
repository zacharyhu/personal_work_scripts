<?php
/* @var $this GpDcUserController */
/* @var $model GpDcUser */

$this->pageCaption='系统用户管理';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='----更新用户';
$this->breadcrumbs=array(
	'系统用户管理'=>array('admin'),
	'更新(id: '.$model->id.')',
);

?>


<?php 
if (GpDcUser::model()->getUserId(Yii::app()->user->name) !=$model->id){//不是本人操作
	echo "WARNING : 你不允许更新他人信息..";
}else{
echo $this->renderPartial('__self', array('model'=>$model)); 
}
?>