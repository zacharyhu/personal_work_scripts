<?php
$this->pageCaption='Update TvGpCfgAction '.$model->l_action_id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Tv Gp Cfg Actions'=>array('index'),
	$model->l_action_id=>array('view','id'=>$model->l_action_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tv Gp Cfg Actions', 'url'=>array('index')),
	array('label'=>'Create TvGpCfgAction', 'url'=>array('create')),
	array('label'=>'View TvGpCfgAction', 'url'=>array('view', 'id'=>$model->l_action_id)),
	array('label'=>'Manage Tv Gp Cfg Actions', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>