<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>
    </div>

    <div class="body-content">

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
</div>
