<?php
$this->widget('ext.gaCounter.ExtGoogleAnalyticsCounter', array(
    'strTotalVisits' => 'Total Visitas',
    'strDayVisits' => 'Visitas hoje')
);
?>
<div class="col-lg-12 col-md-12">
    <?php
    $this->widget('ext.gaCounter.ExtGoogleAnalyticsCounter', array(
        'lastYearChart' => true,
        'title' => 'Last year',
        'width' => 660
            )
    );
    ?>
</div>
<div class="col-lg-12 col-md-12">
    <?php
    $this->widget('ext.gaCounter.ExtGoogleAnalyticsCounter', array(
        'lastMonthChart' => true,
        'title' => 'Last month',
        'width' => 400
            )
    );
    ?>
</div>
<div class="col-lg-12 col-md-12">
    <?php
    $this->widget('ext.gaCounter.ExtGoogleAnalyticsCounter', array(
        'customDateChart' => true,
        'startDate' => date('Y-m-d', strtotime('-1 week')),
        'endDate' => date("Y-m-d"),
        'typeChart' => 'day',
        'title' => 'Last week')
    );
    ?>

