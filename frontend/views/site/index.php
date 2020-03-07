<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>
    </div>

    <div class="body-content">

        <div class="row">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Collect the nav links, forms, and other content for toggling -->

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-left">
                            <li>
                                <label class="control-label" for="ad-category">Континент</label>
                                <input type="text" class="form-control" placeholder="Search" id="continent-search">
                            </li>
                            <li>
                                <label class="control-label" for="ad-category">Город</label>
                                <input type="text" class="form-control" placeholder="Search" id="city-search">
                            </li>
                            <li>
                                <label class="control-label" for="ad-category">Страна</label>
                                <input type="text" class="form-control" placeholder="Search" id="country-search">
                            </li>
                            <li>
                                <label class="control-label" for="ad-category">Численность</label>
                                <input type="text" class="form-control" placeholder="Search" id="population-search">
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <?php ActiveForm::begin(['class' => 'navbar-form navbar-right','id' => 'form-search', 'action' => Yii::$app->urlManager->createUrl('site/index')]); ?>
                                <table>
                                    <tr>
                                        <td><button type="submit" class="btn btn-default" id="btn-search">Submit</button></td>
                                    </tr>
                                </table>
                                <?php ActiveForm::end(); ?>
                            </li>
                        </ul>

                    </div><!-- /.navbar-collapse -->

                </div><!-- /.container-fluid -->
            </nav>
        </div>
        <div class="row">
            <?php echo var_dump($continents); ?>

            <?php foreach ($continents as $continent): ?>
                <h3><?php echo Html::encode("{$continent["name"]}"); ?></h3>

                <table style="border-width: thin">
                    <?php
                    $i = 1;
                    foreach ($continent["countries"] as $country):

                        //$country = ArrayHelper::multisort($country, ['name'], [SORT_ASC]);
                        ?>
                        <?php foreach ($country["cities"] as $city): ?>
                        <tr>
                            <td>
                                <?php echo Html::encode("{$i}"); ?>
                            </td>
                            <td>
                                <?php echo Html::encode("{$city["name"]}"); ?>
                            </td>
                            <td>
                                <?php echo Html::encode("{$country["name"]}"); ?>
                            </td>
                            <td>
                                <?php echo Html::encode("{$city["population"]}"); ?>
                            </td>
                        </tr>
                        <?php
                        $i++;
                    endforeach;
                        ?>
                    <?php endforeach; ?>
                </table>
            <?php endforeach; ?>
        </div>

    </div>

    <?php
    $script = <<< JS
   $(document).ready(function () {        
        $("#btn-search").on('click', function (event) { 
           var action = $('#form-search').attr('action'); 
           action = action + '?nameContinent=' + $("#continent-search").val(); 
           action = action + '&nameCountry=' + $("#country-search").val(); 
           action = action + '&nameCity=' + $("#city-search").val();
           action = action + '&population=' + $("#population-search").val();
           //alert(action);
           $('#form-search').attr('action', action);
            
           this.form.submit();
        });
    });       

JS;
    $this->registerJs($script);
    ?>
</div>
