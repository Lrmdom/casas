<?php $this->beginContent('//layouts/main'); ?>
<div id="content">
    <button type="button" class="btn btn-info visible-xs btn-block" data-toggle="collapse" data-target=".searchBar">
        <?php echo Yii::t("content", "Filtros") ?>
        <span class="glyphicon glyphicon-tasks"></span>
    </button>
    <div class="clearfix"></div>
    <div class="well well-sm container-fluid">
        <div class="text-center col-xs-12 col-md-6 col-md-offset-3">
            <?php echo $this->renderPartial('//site/quickSearch') ?>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-xs-4 col-md-2 searchBar">

        <div class="form">
            <?php echo $this->renderPartial('//site/search', array('model' => new Casa, 'inicio' => "", 'fim' => "")) ?>
        </div>

    </div>
    <div class="col-xs-12 col-md-8 xhrResults">
        <?php echo $content; ?>
    </div>
    <div class="hidden-xs col-md-2  servD">

        <?php
        $this->renderPartial('//site/service', array(
            'class' => 'col-sm-12 col-md-12',
            'icon' => 'mediumIcon'
        ));
        ?>
    </div>

</div>
<!-- content -->
<?php $this->endContent(); ?>

<script>

    $(function() {





        function targetFadeOut() {
            $("#Casas").fadeOut();
        }
        function targetFadeIn() {
            $("#Casas").fadeIn();
        }



        $("[name='sType']").change(function() {
            $(".form-group > input[type='checkbox']").removeAttr('checked');
        });


//        $("#search-mapa").addClass("xhrForm");
//        var options = {
//            url: '<?php echo Yii::app()->createUrl('//casa/searchXhr') ?>',
//            type: 'GET',
//            target: '.xhrResults', // target element(s) to be updated with server response
//            beforeSubmit: targetFadeOut, // pre-submit callback
//            success: targetFadeIn,
//        };
//        $('.xhrForm').ajaxForm(options);
//
//        $("[name='sType'],#Casa_fim,.form-group > input[type='checkbox']").change(function() {
//
//            if (($('#Casa_inicio').val().length > 0 && $('#Casa_fim').val().length > 0)) {
//
//                $("#search-mapa").attr('action', '<?php echo Yii::app()->createUrl('//casa/searchByDateXhr') ?>');
//            }
//            else {
//
//                $("#search-mapa").attr('action', '<?php echo Yii::app()->createUrl('//casa/searchXhr') ?>');
//            }
//
//            $('.xhrForm').ajaxSubmit(options);
//        });
//        $('.xhrForm').submit(function() {
//            // submit the form
//            $(this).ajaxSubmit();
//            // return false to prevent normal browser submit and page navigation
//            return false;
//        });
        $('.rentAttr,#Casa_pessoas').hide();
        $('input:radio[name="sType"]').change(function() {
            var param = $(this).val();
            var data = {
                'Casa': {}
            };
            data.Casa[param] = 1;
            $('#Casa_tipoalojamento').load('<?php echo CController::createUrl('Casa/dynamicTipoAloja') ?>',
                    data,
                    function() {
                        $('#Casa_tipo').load('<?php echo CController::createUrl('Casa/dynamicTipo') ?>',
                                data,
                                function() {
                                    $('#Casa_localidade').load('<?php echo CController::createUrl('Casa/dynamicLocalidade') ?>', data);
                                });
                    });
        });
        $('input:radio[value="<?php
if (isset($_GET['sType'])) {
    echo $_GET['sType'];
}
?>"]').attr('checked', 'checked');
        if ($('input:radio[id="Casa_for_rent"]').attr('checked') === 'checked') {
            $('.rentAttr,#Casa_pessoas').show();
        }
        $('input:radio[name="sType"]').live("change", function() {
            if ($(this).val() == 'for_rent') {

                $('.rentAttr,#Casa_pessoas').show();
            }
            else {
                $('#Casa_pessoas').hide();
                $('.rentAttr').hide();
                $('#Casa_inicio,#Casa_fim').val('');
            }

        });
    });

</script>