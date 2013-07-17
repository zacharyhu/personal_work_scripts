<?php
/* @var $this TvGpCfgGameInfoController */
/* @var $data TvGpCfgGameInfo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('l_game_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->l_game_id), array('view', 'id'=>$data->l_game_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('l_status')); ?>:</b>
	<?php echo CHtml::encode($data->l_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('l_func_type')); ?>:</b>
	<?php echo CHtml::encode($data->l_func_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('l_game_type')); ?>:</b>
	<?php echo CHtml::encode($data->l_game_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vc_game_name')); ?>:</b>
	<?php echo CHtml::encode($data->vc_game_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vc_game_desc')); ?>:</b>
	<?php echo CHtml::encode($data->vc_game_desc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vc_game_image')); ?>:</b>
	<?php echo CHtml::encode($data->vc_game_image); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('l_date')); ?>:</b>
	<?php echo CHtml::encode($data->l_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('l_time')); ?>:</b>
	<?php echo CHtml::encode($data->l_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('l_rank_value')); ?>:</b>
	<?php echo CHtml::encode($data->l_rank_value); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vc_search_key')); ?>:</b>
	<?php echo CHtml::encode($data->vc_search_key); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('l_cp_code')); ?>:</b>
	<?php echo CHtml::encode($data->l_cp_code); ?>
	<br />

	*/ ?>

</div>