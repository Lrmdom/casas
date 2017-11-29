


<?php
$this->layout='column1';
$model->isearch()->getPagination()->pageVar = 'p';

$this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$model->isearch(),
        'itemView'=>'_view',
        'id'=>'Casa',
 'ajaxUpdate'=>true,       
        'sortableAttributes'=>array('cod_casa','tipo','pessoas','destino'),
    
    
    
));

?>
<script>
        $('.btMylistCreate').click(function(event){
            event.stopImmediatePropagation();
            var answer=confirm('Tem que estar logado para guardar nos favoritos.');
                
            if (answer){
        		
                window.location = "<?php echo Yii::app()->createUrl('site/login') ?>";
            }
        });
            
    </script>
<script>
    $(document).ready(function(){
        
       
        
        $('.view').live('mouseover',function(){
  
            $(this).children('.divbuttons').show();
        });
        $('.view').live('mouseout',function(){
            $(this).children('.divbuttons').hide();
        });  
  
        $(".btMylistCreate").livequery(function() {
            $(this).button({
                icons: {
                    primary: "ui-icon-heart"
                
                }
            }).attr('title','Adcionar favoritos');
        
        });  
        $('.btViewCasa').livequery(function() {
            $(this).button({
        
                icons: {
                    primary: "ui-icon-circle-zoomin"
                
                }
            }).attr('title','Adcionar favoritos');
        });  
        
        $('.btAgVisitaCasa').livequery(function() {
            $(this).button({
                icons: {
                    primary: "ui-icon-clock"
                
                }
            }).attr('title','Agendar Visita'); 
        });
        
        $('.btClassificaCasa').livequery(function() {
            $(this).button({
                icons: {
                    primary: "ui-icon-star"
                
                }
            }).attr('title','Classificar Casa');
        });
    }); 
</script>
