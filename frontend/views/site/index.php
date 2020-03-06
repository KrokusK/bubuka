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
            <table>
                <tr>
                    <td>
                        <?php echo var_dump($continents); ?>
                    </td>
                </tr>
                <?php
                    $i = 1;
                    foreach ($continents as $continent):
                ?>
                    <tr>
                        <td collspan="2">
                            <?php echo Html::encode("{$i}"); ?>
                        </td>
                    </tr>
                <tr>
                    <td>
                        <?php echo Html::encode("{$continent["name"]}"); ?>
                    </td>
                    <td>
                        <?php echo Html::encode("{$continent["name"]}"); ?>
                    </td>
                </tr>
                <?php
                    $i++;
                    endforeach;
                ?>
            </table>
        </div>

    </div>
</div>
