<?php
$this->pageCaption='Create GpDcMonthlyGameActive';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Define a new gpdcmonthlygameactive';
$this->breadcrumbs=array(
	'Gp Dc Monthly Game Actives'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Gp Dc Monthly Game Actives', 'url'=>array('index')),
	array('label'=>'Manage Gp Dc Monthly Game Actives', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>