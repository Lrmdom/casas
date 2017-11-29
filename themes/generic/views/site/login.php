
<div class=" col-xs-12 col-md-12 col-lg-12  ">
    <div class=" col-xs-12 col-md-12  col-lg-12 ">

        <div class="row">
            <?php if ($model->userType == 'Front') :
                ?>
                <?php
                $_SESSION['login'] = 'client';
                ?>
                <button class="btn btn-primary btn-block" id="fb_login_button_id"><span> Facebook</span></button>
            <?php endif ?>
            <?php if ($model->userType == 'Back') : ?>
                <?php
                $_SESSION['login'] = 'owner';
                ?>
                <button class="btn btn-primary btn-block" id="fb_login_button_owner"><span> Facebook</span></button>
            <?php endif ?>


        </div>
    </div>

    <div class="form  col-xs-12 col-lg-12 " id="formLG">
        <?php
        if ($model->userType == 'Back') {
            Yii::app()->session['login'] = 'owner';
            echo CHtml::link('Registrar', Yii::app()->createUrl('proprietario/register'), array('class' => 'btn btn-warning btn-block register'));
            $actio = Yii::app()->createUrl('proprietario/register');
            $actio2 = Yii::app()->createUrl('site/loginOwner');
            $actio3 = Yii::app()->createUrl('facebook/loginowner');
        } else {
            Yii::app()->session['login'] = 'client';
            echo CHtml::link('Registrar', Yii::app()->createUrl('cliente/register'), array('class' => 'btn btn-warning btn-block register'));
            $actio = Yii::app()->createUrl('cliente/register');
            $actio2 = Yii::app()->createUrl('site/login');
            $actio3 = Yii::app()->createUrl('facebook/login');
        }
        ?>
        <div class="col-md-12 col-xs-12 col-lg-12 ">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'login-form',
                'action' => $actio2,
                'enableClientValidation' => true,
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                    'afterValidate' => 'js:function(form,data,hasError){
                        if(!hasError){
                                $.ajax({
                                        "type":"POST",
                                        "url":"' . $actio2 . '",
                                        "data":form.serialize(),
                                        "success":function(data){$(".modal-body,.reservacasaform").html(data);obj = JSON.parse(data);if(obj.status=="700"){ location.reload()};}

                                        });
                                }
                        }'
                ),
            ));
            ?>

            <div class="row">
                <?php echo $form->errorSummary($model); ?>
            </div>
            <div class="row-fluid">
                <?php echo $form->labelEx($model, 'email'); ?>
                <?php echo $form->textField($model, 'email', array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'email'); ?>
            </div>
            <div class="row-fluid">
                <?php echo $form->labelEx($model, 'password'); ?>
                <?php echo $form->passwordField($model, 'password', array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'password'); ?>
            </div>
            <div class="row-fluid rememberMe">
                <?php echo $form->checkBox($model, 'rememberMe'); ?>
                <?php echo $form->label($model, 'rememberMe'); ?>
                <?php echo $form->error($model, 'rememberMe'); ?>
            </div>
            <div class="row-fluid">
                <div >
                    <?php echo CHtml::submitButton('Login', array('class' => 'btn btn-primary btn-block', 'type' => 'button', 'id' => 'submitLg')); ?>
                </div>
            </div>
            <div class="row-fluid ">
                <?php
                if ($model->userType == 'Back') {
                    echo CHtml::link('Recuperar Password ?', Yii::app()->createUrl('proprietario/PwdRecover'), array('class' => ''));
                } else {
                    echo CHtml::link('Recuperar Password ?', Yii::app()->createUrl('cliente/PwdRecover'), array('class' => ''));
                }
                ?>
            </div>
            <?php $this->endWidget(); ?>
            <!-- form -->
        </div>
    </div>
</div>
<script>
    window.fbAsyncInit = function() {
        FB.init({appId: '<?php echo Yii::app()->params['fbAppId'] ?>',
            status: true,
            cookie: true,
            xfbml: true,
            oauth: true
        });
        function updateButton(response) {
            $(document).on('click', '#fb_login_button_id,#fb_login_button_owner',
                    function() {

                        FB.login(function(response) {
                            if (response.authResponse) {
                                FB.api('/me', function(user) {
                                    $.ajax({
                                        type: 'get',
                                        url: '<?php echo $actio3 ?>',
                                        data: ({
                                            name: user.first_name,
                                            surname: user.last_name,
                                            username: user.username,
                                            id: user.id,
                                            email: user.email,
                                            session: "<?php echo Yii::app()->session->sessionID ?>"
                                        }),
                                        dataType: 'json',
                                        success: function(data) {
                                            if (data.error == 0) {
                                                window.location.href = data.redirect;
                                            } else {
                                                alert(data.error);
                                                FB.logout();
                                            }
                                        }
                                    });
                                });
                            }
                        }, {scope: 'email,user_likes'});
                    });
        }
        FB.getLoginStatus(updateButton);
        FB.Event.subscribe('auth.statusChange', updateButton);
        var c = document.getElementById("fblogoutBut");
        if (c) {
            c.onclick = function() {
                FB.logout();
            }
        }
    };
    (function(d) {
        var e, id = "fb-root";
        if (d.getElementById(id) === null) {
            e = d.createElement("div");
            e.id = id;
            d.body.appendChild(e);
        }
    }(document));
    (function(d) {
        var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement('script');
        js.id = id;
        js.async = true;
        js.src = "//connect.facebook.net/en_US/all.js";
        ref.parentNode.insertBefore(js, ref);
    }(document));

</script>