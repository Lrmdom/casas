<div class="container-fluid">

    <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5">

        <?php
        $uid = Yii::app()->user->name == Yii::app()->params["adminEmail"] ? ">= 1" : "=" . Yii::app()->user->id;

        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'preco-form-available-dates',
            'enableClientValidation' => true,
            'clientOptions' => array('validateOnSubmit' => true,),
            //'enableAjaxValidation' => true,
            'action' => Yii::app()->createUrl('casa/searchDates'), 'htmlOptions' => array(
                'onsubmit' => "return false;", /* Disable normal form submit */
                'onkeypress' => " if(event.keyCode == 13){ send(); } " /* Do ajax call when user presses enter key */
            ),
        ));
        ?>
        <?php echo $form->errorSummary($model); ?>


        <div class="form-group">
            <?php echo $form->labelEx($model, 'cod_casa'); ?>
            <?php echo $form->dropDownList($model, 'cod_casa', CHtml::listData(Casa::model()->findAll("activo=1 and propid $uid"), 'cod_casa', "idTitle"), array('prompt' => Yii::t("content", "Escolha uma casa"), "class" => "form-control")); ?>
            <?php echo $form->error($model, 'cod_casa'); ?>
        </div>


        <h4 class="alert alert-info"><?php echo Yii::t("content", "Pesquisar disponibilidade por datas") ?></h4>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'inicio'); ?>
            <?php echo $form->textField($model, 'inicio', array('size' => 50, 'maxlength' => 50, 'class' => 'datepick datestart required form-control')); ?>
            <?php echo $form->error($model, 'inicio'); ?>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'fim'); ?>
            <?php echo $form->textField($model, 'fim', array('size' => 50, 'maxlength' => 50, 'class' => 'datepick dateend required form-control')); ?>
            <?php echo $form->error($model, 'fim'); ?>
        </div>




        <div class="form-group buttons buttonWrapper">
            <?php echo CHtml::submitButton(Yii::t("content", "Encontrar") . " <span class='glyphicon glyphicon-search'></span>", array('class' => 'searchBut btn btn-lg btn-primary', 'onclick' => 'send();')); ?>

        </div>
        <?php $this->endWidget(); ?>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-7 col-lg-7 ajx">

    </div>
    <div class="mydiv"></div>
    <script>




        $(document).ready(function() {


            function send()
            {
                var data = $("#preco-form-available-dates").serialize();

                $.ajax({
                    type: 'POST',
                    url: '<?php echo Yii::app()->createAbsoluteUrl("casa/searchDates"); ?>',
                    data: data,
                    success: function(data) {
                        $(".ajx").html(data);
                    },
                    error: function(data) { // if error occured
                        alert("Error occured.please try again");
                        alert(data);
                    },
                    dataType: 'html'
                });

            }

            $('#Preco_cod_casa').change(function() {
                $(".ajx").load('<?php echo $this->createUrl("reserva/showAvailability") ?>' + '/' + $(this).val());

            });

            $("#preco-form-available-dates").submit(function(e) {
                send();
            });

            $(".datestart").datepicker({dateFormat: "yy-mm-dd", beforeShow: function() {
                    return{minDate:
                                new Date()
                    }
                }
            });
            $(".dateend").datepicker({dateFormat: "yy-mm-dd", beforeShow: function() {
                    return{minDate:
                                $('.dateend').datepicker('getDate')
                    }
                }
            });
        });



    </script>

</div>