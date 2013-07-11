<?php
$this->pageCaption='Tv Gp Cfg Cp Infos';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='List of all tv gp cfg cp infos';
$this->breadcrumbs=array(
	'Tv Gp Cfg Cp Infos',
);

$this->menu=array(
	array('label'=>'Create TvGpCfgCpInfo', 'url'=>array('create')),
	array('label'=>'Manage TvGpCfgCpInfo', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
