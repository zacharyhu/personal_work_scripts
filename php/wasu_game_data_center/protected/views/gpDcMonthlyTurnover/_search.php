<div class="wide form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="clearfix">
		<?php echo $form->label($model,'id'); ?>
		<div class="input">
			<?php echo $form->textField($model,'id'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'month'); ?>
		<div class="input">
			<?php echo $form->textField($model,'month'); ?>
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

	<div class="clearfix">
		<?php echo $form->label($model,'sum'); ?>
		<div class="input">
			<?php echo $form->textField($model,'sum'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'user_no'); ?>
		<div class="input">
			<?php echo $form->textField($model,'user_no'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'user_time'); ?>
		<div class="input">
			<?php echo $form->textField($model,'user_time'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'arpu'); ?>
		<div class="input">
			<?php echo $form->textField($model,'arpu',array('size'=>10,'maxlength'=>10)); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->