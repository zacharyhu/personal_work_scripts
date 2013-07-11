<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('month')); ?>:</b>
	<?php echo CHtml::encode($data->month); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lobby_id')); ?>:</b>
	<?php echo CHtml::encode($data->lobby_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cp_code')); ?>:</b>
	<?php echo CHtml::encode($data->cp_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('action_id')); ?>:</b>
	<?php echo CHtml::encode($data->action_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sum')); ?>:</b>
	<?php echo CHtml::encode($data->sum); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_no')); ?>:</b>
	<?php echo CHtml::encode($data->user_no); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('user_time')); ?>:</b>
	<?php echo CHtml::encode($data->user_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('arpu')); ?>:</b>
	<?php echo CHtml::encode($data->arpu); ?>
	<br />

	*/ ?>

</div>