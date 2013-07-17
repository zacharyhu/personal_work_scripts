<?php
/* @var $this TvGpCfgGameInfoController */
/* @var $model TvGpCfgGameInfo */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'l_game_id'); ?>
		<?php echo $form->textField($model,'l_game_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'l_status'); ?>
		<?php echo $form->textField($model,'l_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'l_func_type'); ?>
		<?php echo $form->textField($model,'l_func_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'l_game_type'); ?>
		<?php echo $form->textField($model,'l_game_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vc_game_name'); ?>
		<?php echo $form->textField($model,'vc_game_name',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vc_game_desc'); ?>
		<?php echo $form->textField($model,'vc_game_desc',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vc_game_image'); ?>
		<?php echo $form->textField($model,'vc_game_image',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'l_date'); ?>
		<?php echo $form->textField($model,'l_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'l_time'); ?>
		<?php echo $form->textField($model,'l_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'l_rank_value'); ?>
		<?php echo $form->textField($model,'l_rank_value'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vc_search_key'); ?>
		<?php echo $form->textField($model,'vc_search_key',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'l_cp_code'); ?>
		<?php echo $form->textField($model,'l_cp_code',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->