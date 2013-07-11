<div class="wide form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="clearfix">
		<?php echo $form->label($model,'date'); ?>
		<div class="input">
			<?php echo $form->textField($model,'date'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'lobby_id'); ?>
		<div class="input">
			<?php echo $form->textField($model,'lobby_id'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'cp_code'); ?>
		<div class="input">
			<?php echo $form->textField($model,'cp_code'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'action_id'); ?>
		<div class="input">
			<?php echo $form->textField($model,'action_id'); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->