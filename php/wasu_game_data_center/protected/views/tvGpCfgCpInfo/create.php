<?php
$this->pageCaption='Create TvGpCfgCpInfo';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Define a new tvgpcfgcpinfo';
$this->breadcrumbs=array(
	'Tv Gp Cfg Cp Infos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Tv Gp Cfg Cp Infos', 'url'=>array('index')),
	array('label'=>'Manage Tv Gp Cfg Cp Infos', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>