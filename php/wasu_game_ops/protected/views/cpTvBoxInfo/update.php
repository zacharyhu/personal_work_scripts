<?php
/* @var $this CpTvBoxInfoController */
/* @var $model CpTvBoxInfo */

$this->breadcrumbs=array(
	'Cp Tv Box Infos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CpTvBoxInfo', 'url'=>array('index')),
	array('label'=>'Create CpTvBoxInfo', 'url'=>array('create')),
	array('label'=>'View CpTvBoxInfo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CpTvBoxInfo', 'url'=>array('admin')),
);
?>

<h1>Update CpTvBoxInfo <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>