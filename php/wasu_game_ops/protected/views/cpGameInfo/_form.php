<?php
/* @var $this CpGameInfoController */
/* @var $model CpGameInfo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cp-game-info-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'cp_id'); ?>
		<?php echo $form->dropDownList($model, 'cp_id', CpBaseInfo::model()->getCpNameList()); ?>
		<?php echo $form->error($model,'cp_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'game_name'); ?>
		<?php echo $form->textField($model,'game_name',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'game_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'game_id'); ?>
		<?php echo $form->textField($model,'game_id'); ?>
		<?php echo $form->error($model,'game_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'game_cp_code'); ?>
		<?php echo $form->textField($model,'game_cp_code'); ?>
		<?php echo $form->error($model,'game_cp_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'game_action_id'); ?>
		<?php echo $form->textField($model,'game_action_id',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'game_action_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'game_desc'); ?>
		<?php echo $form->textField($model,'game_desc',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'game_desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'game_status'); ?>
		<?php echo $form->dropDownList($model, 'game_status', GpGameStatusCfg::model()->getStatusList()); ?>
		<?php echo $form->error($model,'game_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'game_lobby'); ?>
		<?php echo $form->checkBoxList($model, 'game_lobby', GpLobbyCfg::model()->getLobbyList(),array('separator'=>'&nbsp;')); ?>
		<?php echo $form->error($model,'game_lobby'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'game_server_ip'); ?>
		<?php echo $form->textField($model,'game_server_ip',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'game_server_ip'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'game_server_port'); ?>
		<?php echo $form->textField($model,'game_server_port',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'game_server_port'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->