<div class="ps-section__right">

	 <div class="d-flex justify-content-between">

	 	<div>
            <a href="<?php echo TemplateController::path()  ?>account&my-store?product=new#vendor-store" class="btn btn-lg btn-warning my-3">Crear nuevo producto</a>
        </div>

        <div>
            <ul class="nav nav-tabs">  

                <li class="nav-item">
                  <a class="nav-link" href="<?php echo TemplateController::path() ?>account&my-store">Producto</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="<?php echo TemplateController::path() ?>account&my-store&orders">Ordenes</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="<?php echo TemplateController::path() ?>account&my-store&disputes">Reclamos</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link active" href="<?php echo TemplateController::path() ?>account&my-store&messages">Mensajes</a>
                </li>
               
            </ul>

        </div>

    </div>

    <input type="hidden" id="path" value="<?= TemplateController::path() ?>">
    <input type="hidden" id="idStore" value="<?= $store[0]->id_store ?>">

    <table class="table dt-responsive dt-server-messages" width="100%">

     	<thead>

            <tr>   
                
                <th>#</th>

                <th>Producto</th>     

                <th>Cliente</th>  

                <th>Correo</th>    

                <th>Pregunta</th>   

                <th>Respuesta</th>

                <th>Fecha de Respuesta</th>

                <th>Fecha de Creacion</th>

            </tr>

        </thead>

    </table>

</div>

<!--=====================================
Ventana modal para responder la pregunta
======================================-->

<div class="modal" id="answerMessage">
	
	 <div class="modal-dialog">

        <div class="modal-content">

            <form method="post">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Mensaje de Respuesta</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

                	<input type="hidden" name="idMessage">
                	<input type="hidden" name="clientMessage">
                	<input type="hidden" name="emailMessage">
                	<input type="hidden" name="urlProduct">

                    <div class="form-group">

                        <label>Escriba su respuesta</label>

                        <div class="form-group__content">
                            
                            <textarea 
                            class="form-control" 
                            type="text"
                            name="answerMessage"
                            required></textarea>

                        </div>

                    </div>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">

                    <div class="float-right">
                        <button type="submit" class="btn btn-warning btn-lg">Enviar</button>
                    </div>
                   
                </div>

                <?php 

                $message = new VendorsController();
                $message -> answerMessage();

                ?>

            </form>

        </div>

    </div>

</div>