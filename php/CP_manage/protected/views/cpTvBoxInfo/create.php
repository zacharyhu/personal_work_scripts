<?php
/* @var $this CpTvBoxInfoController */
/* @var $model CpTvBoxInfo */

$this->breadcrumbs=array(
	'Cp Tv Box Infos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CpTvBoxInfo', 'url'=>array('index')),
	array('label'=>'Manage CpTvBoxInfo', 'url'=>array('admin')),
);
?>

<h1>Create CpTvBoxInfo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>