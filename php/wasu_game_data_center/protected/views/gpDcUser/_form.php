<?php
/* @var $this GpDcUserController */
/* @var $model GpDcUser */
/* @var $form CActiveForm */
?>

<div class="form">

 <?php //$form=$this->beginWidget('CActiveForm', array(
// 	'id'=>'gp-dc-user-form',
// 	// Please note: When you enable ajax validation, make sure the corresponding
// 	// controller action is handling ajax validation correctly.
// 	// There is a call to performAjaxValidation() commented in generated controller code.
// 	// See class documentation of CActiveForm for details on this.
// 	'enableAjaxValidation'=>false,
// )); ?>

<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'verticalForm',
    'htmlOptions'=>array('class'=>'well'),
)); ?>

	<p class="note">标记 <span class="required">*</span> 为必填项. 组编号默认为0</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model, 'login_name', array('class'=>'span3')); ?>
	<?php echo $form->textFieldRow($model, 'username', array('class'=>'span3')); ?>
	<?php echo $form->textFieldRow($model, 'password', array('class'=>'span3')); ?>
    <?php echo $form->textFieldRow($model, 'groupid', array('class'=>'span3')); ?>
    <?php echo $form->textFieldRow($model, 'email', array('class'=>'span3')); ?>
    <?php echo $form->textFieldRow($model, 'phone', array('class'=>'span3')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>$model->isNewRecord ? 'Create' : 'Save')); ?>

<?php $this->endWidget(); ?>

</div><!-- form -->