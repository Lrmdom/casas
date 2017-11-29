<div role="form" class="container-fluid">
    <div class="row">

        <?php
        $this->layout = "search";
        $this->widget('zii.widgets.CListView', array(
            'dataProvider' => $dataProvider,
            'itemView' => '//casa/_viewCompare',
        ));
        ?>

    </div>
</div>
