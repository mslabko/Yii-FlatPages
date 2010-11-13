<?php
$this->breadcrumbs = array(
	'Flat Pages',
	Yii::t('fp', 'Index'),
);

$this->menu=array(
	array('label'=>Yii::t('fp', 'Create') . ' FlatPages', 'url'=>array('create')),
	array('label'=>Yii::t('fp', 'Manage') . ' FlatPages', 'url'=>array('admin')),
);
?>

<h1>Flat Pages</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
