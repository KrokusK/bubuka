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
                                <input type="text" class="form-control" placeholder="Search" id="continent-search" value="<?php echo $getParams['nameContinent']; ?>">
                            </li>
                            <li>
                                <label class="control-label" for="ad-category">Страна</label>
                                <input type="text" class="form-control" placeholder="Search" id="country-search" value="<?php echo $getParams['nameCountry']; ?>">
                            </li>
                            <li>
                                <label class="control-label" for="ad-category">Город</label>
                                <input type="text" class="form-control" placeholder="Search" id="city-search" value="<?php echo $getParams['nameCity']; ?>">
                            </li>
                            <li>
                                <label class="control-label" for="ad-category">Численность</label>
                                <input type="text" class="form-control" placeholder="Search" id="population-search" value="<?php echo $getParams['population']; ?>">
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
