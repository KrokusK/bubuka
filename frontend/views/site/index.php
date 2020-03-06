<?php

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

                <?php foreach ($continents as $continent): ?>
                <tr>
                    <td>
                        <?php echo  $continent['name']; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>

    </div>
</div>
