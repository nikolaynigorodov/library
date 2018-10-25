<?php
/* @var $searchModel app\modules\admin\models\AuthorsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use app\modules\admin\models\Books;
use yii\helpers\Url;

$counter = 0;
$models = $dataProvider->getModels();
$pagerInfo = alhimik1986\yii2_crud_module\web\Pager::getPagerInfo(Yii::$app->request->queryParams, $dataProvider->totalCount);
$columns = 5;
?>

<!-- Pager -->
<?php if (($pagerInfo['count'] > 5 ) OR ($pagerInfo['count'] > $pagerInfo['limit'])): ?>
<tr class="tr-pager">
	<td colspan="<?php echo $columns; ?>">
		<?php echo $this->render('@vendor/alhimik1986/yii2_crud_module/views/pager/_pager', array('pagerInfo'=>$pagerInfo, 'pageName'=>'page')); ?>
	</td>
</tr>
<?php endIf; ?>
<!-- End Pager -->

<?php foreach($models as $model): ?>

	<?php
	$books = 0;	
	$books = Books::find()->where(['author_id' => $model['id']])->sum('count');
	?>
	<tr data-key="<?=$model['id']?>">
		<td><input type="checkbox" checkbox_id="<?=$model['id']?>" onclick="jQuery(this).parents('tr').toggleClass('danger', jQuery(this).prop('checked'));"></td>
		<td><?=++$counter?></td>
		<td><?=$model['id']?></td>
		<td><?=$model['author']?></td>
		<td><?=$books?></td>
		<td>
			<a class="btn btn-success btn-xs" href="#" view_data_id="<?=$model['id']?>">
				<i class="glyphicon glyphicon-eye-open"></i>
			</a>
			<a class="btn btn-primary btn-xs" href="#" data_id="<?=$model['id']?>">
				<i class="glyphicon glyphicon-pencil"></i>
			</a> 
			<a class="btn btn-danger btn-xs" href="#" delete_data_id="<?=$model['id']?>">
				<i class="glyphicon glyphicon-trash"></i>
			</a>
		</td>
	</tr>
<?php endForeach ?>