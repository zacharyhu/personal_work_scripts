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

	<!-- 	搜索起始时间，使用timepicker控件 -->
	<div class="clearfix"> 
    <?php echo $form->label($model,'begin_date'); ?> 
    <?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker'); 
        $this->widget('CJuiDateTimePicker',array( 
        'attribute' => 'begin_date', 
        'model'=>$model, 
        'name'=>'begin_date', 
    	'mode'=>'datetime',
    	'options' => array( 
                'changeYear' => 'true',
                'showAnim' => 'fold', 
                'dateFormat' => 'yy-mm-dd',
//                  'timeFormat' =>'hh:mm:ss', 
            ), 
    )); 
    ?> 
    </div>

    <div class="clearfix">
    <?php echo $form->label($model,'end_date'); ?> 
    <?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
      $this->widget('CJuiDateTimePicker', array( 
        'attribute' => 'end_date', 
        'model'=>$model, 
        'name'=>'end_date', 
    	'mode'=>'datetime',
        'options' => array( 
                'changeYear' => 'true',
                'showAnim' => 'fold', 
                'dateFormat' => 'yy-mm-dd',
//                 'timeFormat' =>'hh:mm:ss',
            ), 
    )); 
    ?> 
    </div>
	
	<div class="clearfix">
		<?php echo $form->label($model,'lobby_id'); ?>
		<div class="input">
			<?php //echo $form->textField($model,'lobby_id'); 
                echo $form->dropDownList($model,'lobby_id',TvGpCfgGameLobbyInfo::model()->getLobbyList());
            ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'cp_code'); ?>
		<div class="input">
			<?php echo $form->dropDownList($model,'cp_code',TvGpCfgCpInfo::model()->getCpList()); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'action_id'); ?>
		<div class="input">
			<?php echo $form->dropDownList($model,'action_id',TvGpCfgAction::model()->getActionList()); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->