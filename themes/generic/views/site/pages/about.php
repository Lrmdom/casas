<?php
$this->pageTitle = Yii::app()->name . ' - About';
$this->breadcrumbs = array(
    'About',
);
if (Yii::app()->user->getState('isAdmin') == 'Back')
    $this->layout = 'column2';
$this->menu = array(
    array('label' => 'Gerir Casa', 'url' => array('casa/admin')),
    array('label' => 'Gerir Proprietario', 'url' => array('proprietario/admin', 'id' => Yii::app()->user->id)),
    array('label' => 'Gerir Cliente', 'url' => array('cliente/admin')),
    array('label' => 'Gerir Reserva', 'url' => array('reserva/admin')),
);
?>


<h4>Casas da Praia Mediação Imobiliária, Lda</h4>
AMI: 9352 
<br><br>
<br><br>
"A sua preferência é a nossa missão! Hoje temos para si o imóvel que procura ao preço que sempre desejou!"  <br> <br>  
<p>A Imobiliária Casas da Praia é uma empresa jovem e dinâmica formada por verdadeiros profissionais especializados nos diferentes segmentos imobiliários. Diariamente trabalhamos de forma a prestar os serviços de mediação imobiliária mais completos e inovadores, identificando as necessidades do mercado e encontrando uma resposta à medida do cliente.
    <br>Através desta página poderá consultar de forma cómoda e rápida os imóveis que seleccionámos para si. Aqui encontrará todo o tipo de apartamentos, moradias, escritórios, lojas, garagens, armazéns e terrenos que acreditamos serem boas oportunidades de negócio.
    <br>Tratamos de todos os procedimentos administrativos de uma forma rápida e profissional, sem qualquer custo para o cliente.
    <br>O escritório da  Imobiliária Casas da Praia está localizado em Alagoa, Altura e também trabalha com arrendamentos para férias assim como gestão de imóveis.
    <br>
    <br>Navegue pelo nosso site e veja o que temos para lhe oferecer.
    <br>
    <br>Com os melhores cumprimentos
    <br>A Gerência </p>


