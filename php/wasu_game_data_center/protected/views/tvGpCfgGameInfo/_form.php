<?php
/* @var $this TvGpCfgGameInfoController */
/* @var $model TvGpCfgGameInfo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tv-gp-cfg-game-info-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'l_game_id'); ?>
		<?php echo $form->textField($model,'l_game_id'); ?>
		<?php echo $form->error($model,'l_game_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'l_status'); ?>
		<?php echo $form->textField($model,'l_status'); ?>
		<?php echo $form->error($model,'l_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'l_func_type'); ?>
		<?php echo $form->textField($model,'l_func_type'); ?>
		<?php echo $form->error($model,'l_func_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'l_game_type'); ?>
		<?php echo $form->textField($model,'l_game_type'); ?>
		<?php echo $form->error($model,'l_game_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vc_game_name'); ?>
		<?php echo $form->textField($model,'vc_game_name',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'vc_game_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vc_game_desc'); ?>
		<?php echo $form->textField($model,'vc_game_desc',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'vc_game_desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vc_game_image'); ?>
		<?php echo $form->textField($model,'vc_game_image',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'vc_game_image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'l_date'); ?>
		<?php echo $form->textField($model,'l_date'); ?>
		<?php echo $form->error($model,'l_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'l_time'); ?>
		<?php echo $form->textField($model,'l_time'); ?>
		<?php echo $form->error($model,'l_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'l_rank_value'); ?>
		<?php echo $form->textField($model,'l_rank_value'); ?>
		<?php echo $form->error($model,'l_rank_value'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vc_search_key'); ?>
		<?php echo $form->textField($model,'vc_search_key',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'vc_search_key'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'l_cp_code'); ?>
		<?php echo $form->textField($model,'l_cp_code',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'l_cp_code'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->