<!-- innerLR -->
<div class="innerLR">
	<div class="widget widget-tabs border-bottom-none">
		<div class="widget-head">
			<ul>
				<li class="active">
					<a class="glyphicons edit" href="#account-details" data-toggle="tab">
						<i></i>จัดการเวลา boost force attack
					</a>
				</li>
			</ul>
		</div>
		<div class="widget-body">
			<div class="form">
				<?php
				$form = $this->beginWidget('AActiveForm', array(
					'id' => 'time-form',
					'enableClientValidation' => true,
					'clientOptions' => array(
						'validateOnSubmit' => true
					),
					'errorMessageCssClass' => 'label label-important',
					'htmlOptions' => array('enctype' => 'multipart/form-data')
				));

				?>
				<p class="note">ค่าที่มี <?php echo $this->NotEmpty(); ?> จำเป็นต้องใส่ให้ครบ</p>

				<?php echo $form->errorSummary($model); ?>

				<div class="row">
					<div class="col-md-12">
						<label for="Timespam_time">เวลา (นาที)</label>
						<?php echo $form->textField($model, 'time', array('size' => 60, 'maxlength' => 255, 'class' => 'span8', 'type' => 'number')); ?>
						<?php echo $this->NotEmpty(); ?>
						<?php echo $form->error($model, 'time'); ?>
					</div>
				</div>

				<div class="row buttons">
					<div class="col-md-12">
						<?php echo CHtml::tag('button', array('class' => 'btn btn-primary btn-icon glyphicons ok_2'), '<i></i>บันทึกข้อมูล'); ?>
					</div>
				</div>

				<?php $this->endWidget(); ?>

			</div><!-- form -->
		</div>
	</div>
</div>