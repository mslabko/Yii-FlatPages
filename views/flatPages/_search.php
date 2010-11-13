<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
        'action'=>Yii::app()->createUrl($this->route),
        'method'=>'get',
)); ?>

        <div class="row">
                <?php echo $form->label($model,'url'); ?>
                <?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>100)); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'content'); ?>
                <?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'title'); ?>
                <?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>200)); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'keywords'); ?>
                <?php echo $form->textArea($model,'keywords',array('rows'=>6, 'cols'=>50)); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'description'); ?>
                <?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'template_name'); ?>
                <?php echo $form->textField($model,'template_name',array('size'=>60,'maxlength'=>70)); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'registration_required'); ?>
                <?php echo $form->textField($model,'registration_required',array('size'=>1,'maxlength'=>1)); ?>
        </div>

        <div class="row buttons">
                <?php echo CHtml::submitButton(Yii::t('fp', 'Search')); ?>
        </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
