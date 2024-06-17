<?php

// namespace app\models\RegistrationForm;

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\RegistrationForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Registration';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-registration">
    <h1><?= Html::encode($this->title) ?></h1>

 
    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin([
                'id' => 'registration-form',
                'fieldConfig' => [
                    // 'template' => "{label}\n{input}\n{error}",
                    'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
                    'inputOptions' => ['class' => 'col-lg-3 form-control'],
                    'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
                ],
            ]); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true])?>
            <?= $form->field($model, 'email')->textInput()?>
            <div class="form-group">
                <div>
                    <?= Html::submitButton('Registration', ['class' => 'btn btn-primary', 'name' => 'registration-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>

          
        </div>
    </div>
</div>
