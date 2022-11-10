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
                  <a class="nav-link active" href="<?php echo TemplateController::path() ?>account&my-store&orders">Ordenes</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="<?php echo TemplateController::path() ?>account&my-store&disputes">Reclamos</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="<?php echo TemplateController::path() ?>account&my-store&messages">Mesajes</a>
                </li>
               
            </ul>

        </div>

    </div>

    <input type="hidden" id="path" value="<?= TemplateController::path() ?>">
    <input type="hidden" id="idStore" value="<?= $store[0]->id_store ?>">

    <table class="table dt-responsive dt-server-orders" width="100%">

     	<thead>

            <tr>   
                
                <th>#</th>   

                <th>Estado</th>

                <th>Cliente</th>  

                <th>Correo</th>    

                <th>Campus</th>   

                <th>Facultad</th>

                <th>Punto de entrega</th>

                <th>Telefono</th>

                <th>Producto</th>

                <th>Cantidad</th>

                <th>Detalles</th>

                <th>Precio</th>

                <th>Proceso</th>

                <th>Fecha</th>

            </tr>

        </thead>

    </table>

</div>

<!--=====================================
Ventana modal para el proceso de entrega
======================================-->

<div class="modal" id="nextProcess">
	
	<div class="modal-dialog modal-lg">
	 	
	 	<div class="modal-content">
	 		
	 		<form method="post">
	 			
	 			<!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Siguiente proceso por <span></span></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

                    <div class="card my-3 orderBody">

                        

                    </div>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">

                    <div class="form-group submtit">
                        
                        <button class="ps-btn ps-btn--fullwidth orderUpdate">Guardar</button>

                    </div>

                </div>  

                <?php

                	$order = new VendorsController();
                	$order -> orderUpdate();

                ?>

	 		</form>


	 	</div>

	</div>

</div>