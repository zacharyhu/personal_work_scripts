<?php
/* @var $this CpGameInfoController */
/* @var $model CpGameInfo */

$this->breadcrumbs=array(
	'Cp Game Infos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CpGameInfo', 'url'=>array('index')),
	array('label'=>'Create CpGameInfo', 'url'=>array('create')),
	array('label'=>'View CpGameInfo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CpGameInfo', 'url'=>array('admin')),
);
?>

<h1>Update CpGameInfo <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>