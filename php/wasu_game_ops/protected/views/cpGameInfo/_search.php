<?php
/* @var $this CpGameInfoController */
/* @var $model CpGameInfo */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>


	<div class="row">
		<?php echo $form->label($model,'cp_id'); ?>
		<?php echo $form->dropDownList($model, 'cp_id', CpBaseInfo::model()->getCpNameList()); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'game_name'); ?>
		<?php echo $form->textField($model,'game_name',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'game_id'); ?>
		<?php echo $form->textField($model,'game_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'game_cp_code'); ?>
		<?php echo $form->textField($model,'game_cp_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'game_action_id'); ?>
		<?php echo $form->textField($model,'game_action_id',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'game_desc'); ?>
		<?php echo $form->textField($model,'game_desc',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'game_status'); ?>
		<?php echo $form->dropDownList($model, 'game_status', GpGameStatusCfg::model()->getStatusList()); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'game_lobby'); ?>
		<?php echo $form->dropDownList($model, 'game_lobby', GpLobbyCfg::model()->getLobbyList()); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'game_server_ip'); ?>
		<?php echo $form->textField($model,'game_server_ip',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'game_server_port'); ?>
		<?php echo $form->textField($model,'game_server_port',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->