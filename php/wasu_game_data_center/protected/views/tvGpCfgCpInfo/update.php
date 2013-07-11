<?php
$this->pageCaption='Update TvGpCfgCpInfo '.$model->l_cp_code;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Tv Gp Cfg Cp Infos'=>array('index'),
	$model->l_cp_code=>array('view','id'=>$model->l_cp_code),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tv Gp Cfg Cp Infos', 'url'=>array('index')),
	array('label'=>'Create TvGpCfgCpInfo', 'url'=>array('create')),
	array('label'=>'View TvGpCfgCpInfo', 'url'=>array('view', 'id'=>$model->l_cp_code)),
	array('label'=>'Manage Tv Gp Cfg Cp Infos', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>