<?php if (isset($_GET["product"])): ?>   

<?php 

if($_GET["product"] != "new"){

    include "views/pages/account/my-store/modules/edit-product.php";

}else{

    include "views/pages/account/my-store/modules/new-product.php";
}

?>

<?php else: ?>


<div class="ps-section__right">

    
    <div class="d-flex justify-content-between">
    
        <div>
            <a href="<?php echo TemplateController::path()  ?>account&my-store?product=new#vendor-store" class="btn btn-lg btn-warning my-3">Crear nuevo producto</a>
        </div>
        
        <div>
            <ul class="nav nav-tabs">  

                <li class="nav-item">
                  <a class="nav-link active" href="<?php echo TemplateController::path() ?>account&my-store">Productos</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="<?php echo TemplateController::path() ?>account&my-store&orders">Ordenes</a>
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
    <input type="hidden" id="urlApi" value="<?= CurlController::api() ?>">

    <table class="table dt-responsive dt-server-products" width="100%">
        
        <thead>

            <tr>   
                
                <th>#</th>   

                <th>Acciones</th>

                <th>Retroalimentacion</th>  

                <th>Estado</th>    

                <th>Imagen</th>   

                <th>Nombre</th>

                <th>Categoria</th>

                <th>Subcategoria</th>

                <th>Precio</th>

                <th>En existencia</th>

                <th>Oferta</th>

                <th>Resumen</th>

                <th>Especificacion</th>

                <th>Detalles</th>

               <th>Descripcion</th>      

               <th>Galleria</th>

                <th>Video</th>

                <th>Palabras claves</th>

                <th>Vistas</th>

                <th>Ventas</th>

                <th>Reseñas</th>

                <th>Fecha de creacion</th> 

            </tr>

        </thead>

    </table>
    
       
</div>

<?php endif ?>
