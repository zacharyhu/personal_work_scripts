<?php
$this->pageCaption='Create GpDcDailyGameActive';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Define a new gpdcdailygameactive';
$this->breadcrumbs=array(
	'Gp Dc Daily Game Actives'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Gp Dc Daily Game Actives', 'url'=>array('index')),
	array('label'=>'Manage Gp Dc Daily Game Actives', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>