<script>
    $(function() {

        $(".xhrResults").load("<?php echo $this->createUrl("feedback/create", array("id" => $model->cod_casa)) ?>")

    });
</script>

