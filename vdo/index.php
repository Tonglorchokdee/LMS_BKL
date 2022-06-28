
<?php
$titleName = 'ระบบวิดีโอเว็บไซต์';
$formNameModel = 'วิดีโอเว็บไซต์';

$this->breadcrumbs=array($titleName);
	Yii::app()->clientScript->registerScript('search', "
	$('#SearchFormAjax').submit(function(){
	    $.fn.yiiGridView.update('$formNameModel-grid', {
	        data: $(this).serialize()
	    });
	    return false;
	});
");

Yii::app()->clientScript->registerScript('updateGridView', <<<EOD
	$.updateGridView = function(gridID, name, value) {
	    $("#"+gridID+" input[name*="+name+"], #"+gridID+" select[name*="+name+"]").val(value);
	    $.fn.yiiGridView.update(gridID, {data: $.param(
	        $("#"+gridID+" input, #"+gridID+" .filters select")
	    )});
	}
	$.appendFilter = function(name, varName) {
	    var val = eval("$."+varName);
	    $("#$formNameModel-grid").append('<input type="hidden" name="'+name+'" value="">');
	}
	$.appendFilter("Vdo[news_per_page]", "news_per_page");
EOD
, CClientScript::POS_READY);
?>

<div class="innerLR">
	<?php $this->widget('AdvanceSearchForm', array(
		'data'=>$model,
		'route' => $this->route,
		'attributes'=>array(
			array('name'=>'vdo_title','type'=>'text'),
			array('name'=>'vdo_path','type'=>'text'),
		),
	));?>
	<div class="widget" style="margin-top: -1px;">
		<div class="widget-head">
			<h4 class="heading glyphicons show_thumbnails_with_lines"><i></i> <?php echo $titleName;?></h4>
		</div>
		<div class="widget-body">
			<div class="separator bottom form-inline small">
				<span class="pull-right">
					<label class="strong">แสดงแถว:</label>
					<?php echo $this->listPageShow($formNameModel);?>
				</span>	
			</div>
			<div class="clear-div"></div>
			<div class="overflow-table">
				<?php $this->widget('AGridView', array(
					'id'=>$formNameModel.'-grid',
					'dataProvider'=>$model->vdocheck()->search(),
					'filter'=>$model,
					'selectableRows' => 2,	
					'htmlOptions' => array(
						'style'=> "margin-top: -1px;",
					),
					'afterAjaxUpdate'=>'function(id, data){
						$.appendFilter("Vdo[news_per_page]");
						InitialSortTable();	
					}',
					'columns'=>array(
						array(
							'visible'=>Controller::DeleteAll(
								array("Vdo.*", "Vdo.Delete", "Vdo.MultiDelete")
							),
							'class'=>'CCheckBoxColumn',
							'id'=>'chk',
						),
						array(
							'name'=>'vdo_title',
							'type'=>'html',
							'value'=>'UHtml::markSearch($data,"vdo_title")'
						),
						array(
							'name'=>'vdo_path',
							'type'=>'html',
							'value'=>'UHtml::markSearch($data,"vdo_path")'
						),
						array(
                        'header'=>'ภาษา',
                        'value' => function($val) {
                           	$lang = Language::model()->findAll(array('condition' =>'active ="y"'));
                           	$width = (count($lang)*100) + 20;
					        foreach ($lang as $key => $value) {
					    		$menu = Vdo::model()->findByAttributes(array("lang_id" => $value->id,'parent_id'=> $val->vdo_id,'active'=>'y'));
					    		$str = ' (เพิ่ม)';
					    		$link = array("/vdo/create","lang_id"=>$value->id,"parent_id"=>$val->vdo_id);
					    		if($menu || $key == 0){
					    			$id = $menu ? $menu->vdo_id : $val->vdo_id;
					    			$str = ' (แก้ไข)';
					    			$link = array("/vdo/update","id"=>$id,"lang_id" =>$value->id,"parent_id"=>$val->vdo_id);
						    		} 
						            $langStr .= CHtml::link($value->language.$str, $link, array("class"=>"btn btn-primary btn-icon","style" => 'width:100px;'));
						        }
						        return '<div class="btn-group" role="group" aria-label="Basic example">'.$langStr.'</div>';
	                    	},
	                    'type'=>'raw',
	                    'htmlOptions'=>array('style'=>'text-align: center','width'=>$this->getWidthColumnLang().'px;'),
	                		),
						array(            
							'class'=>'AButtonColumn',
							'visible'=>Controller::PButton( 
								array("Vdo.*", "Vdo.View", "Vdo.Update", "Vdo.Delete") 
							),
							'buttons' => array(
								'view'=> array( 
									'visible'=>'Controller::PButton( array("Vdo.*", "Vdo.View") )' 
								),
								'update'=> array( 
									'visible'=>'Controller::PButton( array("Vdo.*", "Vdo.Update") )' 
								),
								'delete'=> array( 
									'visible'=>'Controller::PButton( array("Vdo.*", "Vdo.Delete") )' 
								),
							),
						),
					),
				)); ?>
			</div>
		</div>
	</div>

	<?php if( Controller::DeleteAll(array("Vdo.*", "Vdo.Delete", "Vdo.MultiDelete")) ) : ?>
		<!-- Options -->
		<div class="separator top form-inline small">
			<!-- With selected actions -->
			<div class="buttons pull-left">
				<?php 
				echo CHtml::link("<i></i> ลบข้อมูลทั้งหมด",
					"#",
					array("class"=>"btn btn-primary btn-icon glyphicons circle_minus",
						"onclick"=>"return multipleDeleteNews('".$this->createUrl('//'.$formNameModel.'/MultiDelete')."','$formNameModel-grid');")); 
				?>
			</div>
			<!-- // With selected actions END -->
			<div class="clearfix"></div>
		</div>
		<!-- // Options END -->
	<?php endif; ?>

</div>
