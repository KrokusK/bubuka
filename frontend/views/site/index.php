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
                                <input type="text" class="form-control" placeholder="Search" id="continent-search" value="<?php echo (!empty($getParams['nameContinent'])) ? $getParams['nameContinent'] : null; ?>">
                            </li>
                            <li>
                                <label class="control-label" for="ad-category">Страна</label>
                                <input type="text" class="form-control" placeholder="Search" id="country-search" value="<?php echo (!empty($getParams['nameCountry'])) ? $getParams['nameCountry'] : null; ?>">
                            </li>
                            <li>
                                <label class="control-label" for="ad-category">Город</label>
                                <input type="text" class="form-control" placeholder="Search" id="city-search" value="<?php echo (!empty($getParams['nameCity'])) ? $getParams['nameCity'] : null; ?>">
                            </li>
                            <li>
                                <label class="control-label" for="ad-category">Численность</label>
                                <input type="text" class="form-control" placeholder="Search" id="population-search" value="<?php echo (!empty($getParams['population'])) ? $getParams['population'] : null; ?>">
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

            <div class="col-xs-6 col-md-3">
                <a href="#" class="thumbnail">
                    №
                </a>
            </div>
            <div class="col-xs-6 col-md-3">
                <a href="#" class="thumbnail">
                    Город
                </a>
            </div>
            <div class="col-xs-6 col-md-3">
                <a href="#" class="thumbnail">
                    Страна
                </a>
            </div>
            <div class="col-xs-6 col-md-3">
                <a href="#" class="thumbnail">
                    Численность
                </a>
            </div>

            <?php foreach ($continents as $continentKey => $continentVal): ?>
                <h3><?php echo Html::encode("{$continentKey}"); ?></h3>

                <?php
                $i = 0;
                foreach ($continentVal as $row):
                    $i++;
                    ?>
                    <div class="col-xs-6 col-md-3">
                        <?php echo Html::encode("{$i}"); ?>
                    </div>
                    <div class="col-xs-6 col-md-3">
                        <?php echo Html::encode("{$row["city"]}"); ?>
                    </div>
                    <div class="col-xs-6 col-md-3">
                        <?php echo Html::encode("{$row["country"]}"); ?>
                    </div>
                    <div class="col-xs-6 col-md-3">
                        <?php echo Html::encode("{$row["population"]}"); ?>
                    </div>
                <?php endforeach; ?>

                <div class="col-xs-6 col-md-3">
                    <p></p>
                </div>
                <div class="col-xs-6 col-md-3">
                    <p></p>
                </div>
                <div class="col-xs-6 col-md-3">
                    <p></p>
                </div>
                <div class="col-xs-6 col-md-3">
                    <p></p>
                </div>
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
