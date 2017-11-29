<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$casasForSale = Casa::model()->findAll("activo=1 and for_sale=1 group by pais,distrito,concelho,localidade");
$casasForRent = Casa::model()->findAll("activo=1 and for_rent=1 group by pais,distrito,concelho,localidade");
$casasForArrenda = Casa::model()->findAll("activo=1 and for_arrenda=1 group by pais,distrito,concelho,localidade");
?>
<div class="col-lg-3 col-md-3 col-xs-12">


</div>
<div class="col-lg-3 col-md-3 col-xs-12">
    <?php
    foreach ($casasForSale as $casa) {
        echo CHtml::link(
                Yii::t("content", "Casas para venda em ") . $casa->localidade . "-" . $casa->concelho . "-" . $casa->distrito . "-" . $casa->pais . "<br/>", Yii::app()->createUrl("casa/searchLocal", array("sType" => "for_sale",
                    "localidade" => $casa->localidade))
        );
    }
    ?>

</div>
<div class="col-lg-3 col-md-3 col-xs-12">
    <?php
    foreach ($casasForRent as $casa) {
        echo CHtml::link(Yii::t("content", "Casas de férias em ") . $casa->localidade . "-" . $casa->concelho . "-" . $casa->distrito . "-" . $casa->pais . "<br/>", Yii::app()->createUrl("casa/searchLocal", array("sType" => "for_rent",
                    "localidade" => $casa->localidade)));
    }
    ?>

</div>
<div class="col-lg-3 col-md-3 col-xs-12">
    <?php
    foreach ($casasForArrenda as $casa) {
        echo CHtml::link(Yii::t("content", "Casas arrendamento em ") . $casa->localidade . "-" . $casa->concelho . "-" . $casa->distrito . "-" . $casa->pais . "<br/>", Yii::app()->createUrl("casa/searchLocal", array("sType" => "for_arrenda",
                    "localidade" => $casa->localidade)));
    }
    ?>
</div>
<div class="clearfix"></div>