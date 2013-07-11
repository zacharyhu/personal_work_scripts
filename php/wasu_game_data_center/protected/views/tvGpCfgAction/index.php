<?php
$this->pageCaption='Tv Gp Cfg Actions';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='List of all tv gp cfg actions';
$this->breadcrumbs=array(
	'Tv Gp Cfg Actions',
);

$this->menu=array(
	array('label'=>'Create TvGpCfgAction', 'url'=>array('create')),
	array('label'=>'Manage TvGpCfgAction', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
