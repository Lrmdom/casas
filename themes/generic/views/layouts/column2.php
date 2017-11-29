<?php $this->beginContent('//layouts/main'); ?>
<div id="content">
    <div class="row-fluid">
        <div class="col-lg-2 col-md-2 col-xs-12">
            <div id="sidebar">
                <?php
                echo $this->renderPartial('//layouts/sidemenu');
                ?>


            </div><!-- sidebar -->
        </div>
        <div class="col-lg-10 col-md-10 col-xs-12">

            <?php echo $content; ?>
        </div>
    </div>
</div><!-- content -->
<?php $this->endContent(); ?>

<script>

    $(".datepick").datepicker({dateFormat: "yy/mm/dd"});

    $(function() {

        $('#side-menu').metisMenu();

    });

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
    $(function() {
        $(window).bind("load resize", function() {
            topOffset = 50;
            width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
            if (width < 768) {
                $('div.navbar-collapse').addClass('collapse')
                topOffset = 100; // 2-row-menu
            } else {
                $('div.navbar-collapse').removeClass('collapse')
            }

            height = (this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height;
            height = height - topOffset;
            if (height < 1)
                height = 1;
            if (height > topOffset) {
                $("#page-wrapper").css("min-height", (height) + "px");
            }
        })
    })
</script>