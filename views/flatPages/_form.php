<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php
if(!$model->isNewRecord){ ?>
    <div class="row">
    <?php echo CHtml::link(Yii::t('fp', 'See page'), 
            Yii::app()->createUrl('/site/page', array('view'=>$model->url)),
            array('target'=>'_blank')
            )?>
    </div>
<?php
}
?>

<div class="row">
		
<?php echo $form->labelEx($model,'url'); ?>
        <div class="hint"> Адрес страницы. Например: <b>contacts</b>
            по умолчанию будет доступен по адресу <br/> <b>http://example.com/index.php?r=site/page&view=contacts</b> </div>
<?php echo $form->textField($model,'url'); ?>
<?php echo $form->error($model,'url'); ?>
	</div>

<div class="row">
<?php echo $form->labelEx($model,'content'); ?>

<?php
if(FlatPages::$wysiwyg){

  $this->widget(FlatPages::$wysiwyg, array(
        'model'=>$model,
        'attribute'=>'content',
        'options'=>array(
            'width'=>'100%',
            'height'=>350,
            'useCSS'=>true,
        ),
        'value'=>$model->content, 
    ));
}
else{
    echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50));
}
?>


<?php echo $form->error($model,'content'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'template_name'); ?>
        <div class="hint">  Например: <b>flatpages/my_template</b>. <br/>
            По умолчанию шаблон должен размещатся в   <b>protected/views/site/flatpages/my_template.php</b> </div>
<?php echo $form->textField($model,'template_name',array('size'=>60,'maxlength'=>70)); ?>
<?php echo $form->error($model,'template_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'registration_required'); ?>
<?php echo $form->dropDownList($model,'registration_required',
         FlatPages::registrationRequired()
        ,  array('size'=>1,'maxlength'=>1)); ?>
<?php echo $form->error($model,'registration_required'); ?>
	</div>




<div class="row">
    <?php echo Yii::t('fp', 'Seo tools'); ?>
</div>
	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>200)); ?>
<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'keywords'); ?>
<?php echo $form->textArea($model,'keywords',array('rows'=>3, 'cols'=>50)); ?>
<?php echo $form->error($model,'keywords'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
<?php echo $form->textArea($model,'description',array('rows'=>3, 'cols'=>50)); ?>
<?php echo $form->error($model,'description'); ?>
	</div>
