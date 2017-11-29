<form class="formautcplt form-inline form-search" action="<?php echo Yii::app()->createUrl('//casa/search'); ?>" method="get">
    <div class="form-group">
        <div class="input-group">
            <input type="text" name="Casa[localidade]" class="autCpltSearch  form-control" placeholder="Para onde?  Nº da casa?" lenght="100"/>


            <input type="hidden" id="caconc" name="Casa[concelho]" />
            <span class="input-group-btn">
                <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search icon-warning"></span></button>
            </span>
        </div>
    </div>
</form>

<!--<script>
    $('.autCpltSearch').bind('autocompleteselect', function(event, ui) {
        $('.formautcplt').submit();
    });

</script>-->