<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CountrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Страны';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать страну', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'code',
            //'name',
            //'population',

            [
                //'class' => DataColumn::className(), // Не обязательно
                'attribute' => 'code',
                'format' => 'text',
                'label' => 'Код страны',
            ],
            [
                //'class' => DataColumn::className(), // Не обязательно
                'attribute' => 'name',
                'format' => 'text',
                'label' => 'Название',
            ],
            [
                //'class' => DataColumn::className(), // Не обязательно
                'attribute' => 'population',
                'format' => 'text',
                'label' => 'Численность',
            ],



            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
