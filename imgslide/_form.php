
<!-- innerLR -->
<div class="innerLR">
	<div class="widget widget-tabs border-bottom-none">
		<div class="widget-head">
			<ul>
				<li class="active">
					<a class="glyphicons edit" href="#account-details" data-toggle="tab">
						<i></i><?php echo $formtext;?>
					</a>
				</li>
			</ul>
		</div>
		<div class="widget-body">
			<div class="form">
				<?php $form = $this->beginWidget('AActiveForm', array(
					'id'=>'imgslide-form',
			        'enableClientValidation'=>true,
			        'clientOptions'=>array(
			            'validateOnSubmit'=>true
			        ),
			         'errorMessageCssClass' => 'label label-important',
			        'htmlOptions' => array('enctype' => 'multipart/form-data')
				)); ?>
				<?php  
				$lang_id = isset($_GET['lang_id']) ? $_GET['lang_id'] : 1 ;
				$parent_id = isset($_GET['parent_id']) ? $_GET['parent_id'] : 0 ;
				$modelLang = Language::model()->findByPk($lang_id);
                ?>
				<?php if ($lang_id != 1){ ?>
				<p class="note"><span style="color:red;font-size: 20px;">เพิ่มเนื้อหาของภาษา <?= $modelLang->language; ?></span></p>
				<?php 
					}
				?>
				<p class="note">ค่าที่มี <?php echo $this->NotEmpty();?> จำเป็นต้องใส่ให้ครบ</p>
					<div class="row">
						<div class="col-md-12">
							<?php echo $form->labelEx($model,'imgslide_title'); ?>
							<?php echo $form->textField($model,'imgslide_title',array('size'=>60,'maxlength'=>250, 'class'=>'span8')); ?>
							<?php echo $form->error($model,'imgslide_title'); ?>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<?php echo $form->labelEx($model,'imgslide_link'); ?>
							<?php echo $form->textField($model,'imgslide_link',array('size'=>60,'maxlength'=>250, 'class'=>'span8')); ?>
							<?php echo $form->error($model,'imgslide_link'); ?>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							
							<?php echo $form->labelEx($model, 'imgslide_detail'); ?>
							<?php echo $form->textArea($model, 'imgslide_detail', array('rows' => 6, 'cols' => 50, 'class' => 'span8 tinymce')); ?>
							<?php echo $form->error($model, 'imgslide_detail'); ?>
						</div>
					</div>
					<!-- <div class="row">
						<font color="#990000">
							<?php echo $this->NotEmpty();?> ตัวอย่าง http://www.cpdland.com/
						</font>
					</div> -->
					<div class="row">
						<div class="col-md-12">
							<?php
							if(isset($imageShow)){
								echo CHtml::image(Yush::getUrl($model, Yush::SIZE_THUMB, $imageShow), $imageShow,array(
									"class"=>"thumbnail"
								));
							}
						?>
						</div>
					</div>
					<br>

					<div class="row">
						<div class="col-md-12">
							<?php echo $form->labelEx($model,'imgslide_picture'); ?>
							<div class="fileupload fileupload-new" data-provides="fileupload">
								<div class="input-append">
									<div class="uneditable-input span3"><i class="icon-file fileupload-exists"></i> <span class="fileupload-preview"></span></div><span class="btn btn-default btn-file"><span class="fileupload-new">    Select file</span><span class="fileupload-exists">Change</span><?php echo $form->fileField($model, 'imgslide_picture'); ?></span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
								</div>
							</div>
							<?php echo $form->error($model,'imgslide_picture'); ?>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<font color="#990000">
								<?php echo $this->NotEmpty();?> รูปภาพควรมีขนาด 750X416
							</font>
						</div>
					</div>
					<?php if ($notsave == 1) { ?>
						<p class="note"><font color="red">*ขนาดของรูปภาพไม่ถูกต้อง </font></p>
						 <?php }else{} ?> 
					<br>

					<div class="row buttons">
						<div class="col-md-12">
							<?php echo CHtml::tag('button',array('class' => 'btn btn-primary btn-icon glyphicons ok_2'),'<i></i>บันทึกข้อมูล');?>
						</div>
					</div>
				<?php $this->endWidget(); ?>
			</div><!-- form -->
		</div>
	</div>
</div>
<!-- END innerLR -->
<script>
    $(function () {
        init_tinymce();
    });
</script>

