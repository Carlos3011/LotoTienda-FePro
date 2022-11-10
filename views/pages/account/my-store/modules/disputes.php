<div class="ps-section__right">

	 <div class="d-flex justify-content-between">

	 	<div>
            <a href="<?php echo TemplateController::path()  ?>account&my-store?product=new#vendor-store" class="btn btn-lg btn-warning my-3">Crear nuevo producto</a>
        </div>

        <div>
            <ul class="nav nav-tabs">  

                <li class="nav-item">
                  <a class="nav-link" href="<?php echo TemplateController::path() ?>account&my-store">Productos</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="<?php echo TemplateController::path() ?>account&my-store&orders">Ordenes</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link active" href="<?php echo TemplateController::path() ?>account&my-store&disputes">Reclamos</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="<?php echo TemplateController::path() ?>account&my-store&messages">Mesajes</a>
                </li>
               
            </ul>

        </div>

    </div>

    <input type="hidden" id="path" value="<?= TemplateController::path() ?>">
    <input type="hidden" id="idStore" value="<?= $store[0]->id_store ?>">

    <table class="table dt-responsive dt-server-disputes" width="100%">

     	<thead>

            <tr>   
                
                <th>#</th>

                <th>Orden</th>     

                <th>Cliente</th>  

                <th>Correo</th>    

                <th>Contenido</th>   

                <th>Pregunta</th>

                <th>Fecha de pregunta</th>

                <th>Fecha de creacion</th>

            </tr>

        </thead>

    </table>

</div>

<!--=====================================
Ventana modal para responder la disputa
======================================-->

<div class="modal" id="answerDispute">
	
	 <div class="modal-dialog">

        <div class="modal-content">

            <form method="post">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Pregunta de Reclamo</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

                	<input type="hidden" name="idDispute">
                	<input type="hidden" name="clientDispute">
                	<input type="hidden" name="emailDispute">

                    <div class="form-group">

                        <label>Escriba su pregunta</label>

                        <div class="form-group__content">
                            
                            <textarea 
                            class="form-control" 
                            type="text"
                            name="answerDispute"
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

                $dispute = new VendorsController();
                $dispute -> answerDispute();

                ?>

            </form>

        </div>

    </div>

</div>