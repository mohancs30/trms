<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Alert;
use kartik\widgets\Growl;
$this->title="Upload";
?>
<?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>
<div class="row">
     <?php if($error == 'error'){
               echo Alert::widget([
                'type' => Alert::TYPE_DANGER,
                'title' => 'Please Select Valid Data',
                'icon' => 'glyphicon glyphicon-remove-sign',
                'body' => 'Check group and try submitting again.',
                'showSeparator' => true,
                'delay' => 9000
            ]); 
         }       
             ?>
         <?php if($error == 'success'){
               echo Growl::widget([
    'type' => Growl::TYPE_SUCCESS,
    'title' => 'Well done!',
    'icon' => 'glyphicon glyphicon-ok-sign',
    'body' => 'You successfully uploaded the data.',
    'showSeparator' => true,
    'delay' => 0,
    'pluginOptions' => [
        'showProgressbar' => true,
        'placement' => [
            'from' => 'top',
            'align' => 'center',
        ]
    ]
]);
         }       
             ?>
         <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">GroupCode</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
           <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> -->
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-lg-2"> <?= $form->field($model,'file')->fileInput() ?> </div>
                    </div>
                </div>
           
         
             <div>&nbsp;</div>       
            
        <?= Html::submitButton('upload',['class'=>'button']) ?> <br /><br />
        
        <?= Html::a('TemplateDownload',['mstgroupcode/templatedownload']) ?> 
        
  
         
          </div>
       </div>
</div> 
        <br />
   <?php ActiveForm::end(); ?>

