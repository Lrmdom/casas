<span class="dPicker"></span>
<script>
<?php echo $js ?>
    $(function() {
        $('.dPicker').datepicker({beforeShowDay: Days, numberOfMonths: [2, 3]});
    });
</script>
