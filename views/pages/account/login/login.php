<div class="ps-my-account">

    <div class="container">

        <!--=====================================
         Validar veracidad del correo electrónico
        ======================================--> 

        <?php 

        if(isset($urlParams[2])){
            
            $verify = base64_decode($urlParams[2]);  
            
            /*=============================================
            Validamos que el usuario si exista
            =============================================*/

            $url = CurlController::api()."users?linkTo=email_user&equalTo=".$verify."&select=id_user";
            $method = "GET";
            $fields = array();
            $header = array();

            $item = CurlController::request($url, $method, $fields, $header);   

            if(!empty($item)){

                if($item->status == 200){
                   
                    /*=============================================
                   Actualizar el campo de verificación
                    =============================================*/

                    $url = CurlController::api()."users?id=".$item->results[0]->id_user."&nameId=id_user&token=no&except=verification_user";
                    $method = "PUT";
                    $fields =  "verification_user=1";
                    $header = array();

                    $verificationUser = CurlController::request($url, $method, $fields, $header);   

                    if($verificationUser->status == 200){

                        echo '<div class="alert alert-success text-center">Su cuenta ha sido verificada con éxito, ahora puede iniciar sesión</div>';
                    }
                }

            }else{

                echo '<div class="alert alert-danger text-center">No se pudo verificar la cuenta, el correo electrónico no existe</div>';
            
            }


        }


        ?>

        <form class="ps-form--account ps-tab-root needs-validation" novalidate method="post">

            <ul class="ps-tab-list">

                <li class="active">
                    <p><a href="<?php echo $path ?>account&login">Ingresar</a></p>
                </li>

                <li class="">
                    <p><a href="<?php echo $path ?>account&enrollment">Registrarse</a></p>
                </li>

            </ul>

            <div class="ps-tabs">

                <!--=====================================
                Login Form
                ======================================--> 

                <div class="ps-tab active" id="sign-in">

                    <div class="ps-form__content">

                        <h5>Ingresar a tu cuenta</h5>

                        <div class="form-group">

                            <input 
                            class="form-control" 
                            type="email" 
                            placeholder="Email address"
                            pattern="[^0-9][.a-zA-Z0-9_]+([.][.a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}"
                            onchange="validateJS(event,'email')" 
                            name="loginEmail"
                            required>

                            <div class="valid-feedback">Valido.</div>
                                <div class="invalid-feedback">Por favor complete  el formulario correctamente.</div>

                        </div>

                        <div class="form-group form-forgot">

                            <input 
                            class="form-control" 
                            type="password" 
                            placeholder="Password"
                            pattern="[#\\=\\$\\;\\*\\_\\?\\¿\\!\\¡\\:\\.\\,\\0-9a-zA-Z]{1,}"
                            onchange="validateJS(event, 'password')" 
                            name="loginPassword"
                            required>

                            <div class="valid-feedback">Valido.</div>
                            <div class="invalid-feedback">Por favor complete  el formulario correctamente.</div>

                            <a href="#resetPassword" data-toggle="modal">Olvidor su contraseña?</a>

                        </div>

                        <div class="form-group">

                            <div class="ps-checkbox">

                                <input class="form-control" type="checkbox" id="remember-me" name="remember-me" onchange="remember(event)">

                                <label for="remember-me">Recuerdarme</label>

                            </div>

                        </div>

                        <?php 

                            $login = new UsersController();
                            $login -> login();

                        ?>

                        <div class="form-group submtit">

                            <button type="submit" class="ps-btn ps-btn--fullwidth">Ingresar</button>

                        </div>

                    </div>

                    <div class="ps-form__footer">

                        <p>Conectar con:</p>

                        <ul class="ps-list--social">

                            <li>
                                <a class="facebook" href="<?php echo $path ?>account&enrollment&facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a class="google" href="<?php echo $path ?>account&enrollment&google">
                                    <i class="fab fa-google"></i>
                                </a>
                            </li>

                        </ul>

                    </div>

                </div><!-- End Login Form -->

            </div>

        </form>

    </div>

</div>

<!--=====================================
Ventana modal para recuperar contraseña
======================================-->

<!-- The Modal -->
<div class="modal" id="resetPassword">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Recuperar contraseña</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        
        <form method="post" class="ps-form--account ps-tab-root needs-validation" novalidate>
            
            <div class="form-group">

                <input 
                class="form-control" 
                type="email" 
                placeholder="Email address"
                pattern="[^0-9][.a-zA-Z0-9_]+([.][.a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}"
                onchange="validateJS(event,'email')" 
                name="resetPassword"
                required>

                <div class="valid-feedback">Valido.</div>
                <div class="invalid-feedback">Por favor complete  el formulario correctamente.</div>

            </div>

            <?php 

                $reset = new UsersController();
                $reset -> resetPassword();

            ?>

            <div class="form-group submtit">

                <button type="submit" class="ps-btn ps-btn--fullwidth">Enviar</button>

            </div>


        </form>


      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>