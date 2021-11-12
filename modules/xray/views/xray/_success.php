<div>
    <div class="d-flex flex-column">
        <div class="alert-success p-3 my-2 text-center">
            <h4>ทำรายการสำเร็จ !!!</h4>
        </div>
        <div class="text-center">
            <button class="btn btn-success btn-close" autofocus><i class="far fa-check-square"></i> ตกลง</button>
        </div>
    </div>

</div>
<?php
$js = <<<JS
   $(function(){
       
        $('.btn-close').click(function(){
            window.opener.location.reload();
            window.close();       
        }); 
     
        setTimeout(function(){
            $('.btn-close').trigger('click');
        },500);        
    }); 
   
JS;
$this->registerJs($js);
