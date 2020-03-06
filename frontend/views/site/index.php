<?php

use yii\helpers\Html;

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

            <?php
            $i = 1;
            foreach ($continents as $continent):
            ?>
                <h3><?php echo Html::encode("{$continent["name"]}"); ?></h3>

                <table style="border-width: thin">
                    <?php foreach ($continent["countries"] as $country): ?>
                    <tr>
                        <td>
                            <?php echo Html::encode("{$i}"); ?>
                        </td>
                        <td>
                            <?php echo Html::encode("{$continent["name"]}"); ?>
                        </td>
                        <td>
                            <?php echo Html::encode("{$country["name"]}"); ?>
                        </td>
                        <td>
                            <?php echo Html::encode("{$continent["name"]}"); ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            <?php
             $i++;
             endforeach;
            ?>
        </div>

    </div>
</div>
