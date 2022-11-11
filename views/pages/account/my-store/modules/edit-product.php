<?php 

if(isset($_GET["product"])){

	$select = "id_product,approval_product,state_product,url_product,feedback_product,image_product,name_product,id_category,url_category,name_category,id_subcategory,title_list_subcategory,name_subcategory,price_product,shipping_product,stock_product,delivery_time_product,offer_product,summary_product,specifications_product,details_product,description_product,tags_product,gallery_product,top_banner_product,default_banner_product,horizontal_slider_product,vertical_slider_product,video_product,views_product,sales_product,reviews_product,date_created_product";

	$url = CurlController::api()."relations?rel=products,categories,subcategories&type=product,category,subcategory&linkTo=id_product&equalTo=".$_GET["product"]."&select=".$select;
	$method = "GET";
    $fields = array();
    $header = array();

    $product = CurlController::request($url, $method, $fields, $header)->results[0];

}

?>

<!--=====================================
Editar Producto
======================================-->

<form class="needs-validation" novalidate method="post" enctype="multipart/form-data">   

    <input type="hidden" value="<?php echo CurlController::api() ?>" id="urlApi">
    <input type="hidden" value="<?= $product->id_product ?>" name="id_product">

    <div>
    	
    	<!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title text-center">Editar Producto</h4>
            <a href="<?= TemplateController::path() ?>account&my-store#vendor-store" class="btn btn-dark">Cancelar</a>
        </div>

        <!-- Modal body -->
        <div class="modal-body p-5 text-left">

        	<!--=====================================
            Nombre del producto
            ======================================-->

            <div class="form-group">
            
                <label>Nombre del producto<sup class="text-danger">*</sup></label>

                <div class="form-group__content">
                    
                    <input type="text"
                    class="form-control"
                    name="nameProduct"
                   	value="<?= $product->name_product ?>"
                    readonly
                    required>

                    <div class="valid-feedback">Valido.</div>
                    <div class="invalid-feedback">Por favor rellene este campo.</div>

                </div>

            </div>

             <!--=====================================
            Url del producto
            ======================================-->

            <div class="form-group">
            
                <label>Url del producto<sup class="text-danger">*</sup></label>

                <div class="form-group__content">
                    
                    <input type="text"
                    class="form-control"
                    name="urlProduct"
                     value="<?= $product->url_product ?>"
                    readonly
                    required>

                    <div class="valid-feedback">Valido.</div>
                    <div class="invalid-feedback">Por favor rellene este campo.</div>

                </div>

            </div>

              <!--=====================================
            Categoría del producto
            ======================================-->

            <div class="form-group">
                
                <label>Categoria del producto<sup class="text-danger">*</sup></label>

                <div class="form-group__content">
                    
                    <select
                    class="form-control"
                    name="categoryProduct" 
                    readonly
                    required>        

                        <option value="<?php echo $product->id_category."_".$product->url_category ?>"><?php echo $product->name_category ?></option>                    

                    </select>

                    <div class="valid-feedback">Valido.</div>
                    <div class="invalid-feedback">Por favor rellene este campo.</div>

                </div>
            </div>

            <!--=====================================
            SubCategoría del producto
            ======================================-->

            <div class="form-group">
            
                <label>Subcategoria del producto<sup class="text-danger">*</sup></label>

                <div class="form-group__content">
                    
                    <select
                    class="form-control"
                    name="subCategoryProduct" 
                    readonly
                    required>        

                        <option value="<?php echo $product->id_subcategory."_".$product->title_list_subcategory ?>"><?php echo $product->name_subcategory ?></option>                    

                    </select>

                    <div class="valid-feedback">Valido.</div>
                    <div class="invalid-feedback">Por favor rellene este campo.</div>

                </div>

            </div>

            <!--=====================================
            Descripción del producto
            ======================================-->

            <div class="form-group">
                
                <label>Descripcion del producto<sup class="text-danger">*</sup></label>

                <textarea
                class="summernote editSummernote"
                name="descriptionProduct"
                iDProduct="<?php echo $product->id_product ?>"
                required
                >
    
                </textarea>

                <div class="valid-feedback">Valido.</div>
                <div class="invalid-feedback">Por favor rellene este campo.</div>

            </div>

             <!--=====================================
            Resumen del producto
            ======================================-->

            <div class="form-group">
                
                <label>Resumen del producto<sup class="text-danger">*</sup> Ex: 20 horas de autonomia</label>

                <?php foreach (json_decode($product->summary_product, true) as $key => $value): ?>

	                <input type="hidden" name="inputSummary" value="<?php echo $key+1 ?>">

	                <div class="form-group__content input-group mb-3 inputSummary">
	                     
	                    <div class="input-group-append">
	                        <span class="input-group-text">
	                             <button type="button" class="btn btn-danger" onclick="removeInput(<?php echo $key ?>,'inputSummary')">&times;</button>
	                        </span>
	                    </div>

	                    <input
	                    class="form-control" 
	                    type="text"
	                    name="summaryProduct_<?php echo $key ?>"
	                    pattern='[-\\(\\)\\=\\%\\&\\$\\;\\_\\*\\"\\#\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]{1,}'
	                    onchange="validateJS(event,'paragraphs')"
	                    value="<?= $value ?>"
	                    required>

	                    <div class="valid-feedback">Valido.</div>
	                    <div class="invalid-feedback">Por favor rellene este campo.</div>

                	</div>

                 <?php endforeach ?>

                <button type="button" class="btn btn-primary mb-2" onclick="addInput(this, 'inputSummary')">Agregar Resumen</button>

            </div>

             <!--=====================================
            Detalles del producto
            ======================================-->

            <div class="form-group">
                
                <label>Detalles del producto<sup class="text-danger">*</sup> Ex: <strong>Titulo:</strong> Bluetooth, <strong>Valor:</strong> Si</label>

                <?php foreach (json_decode($product->details_product, true) as $key => $value): ?>

	                <input type="hidden" name="inputDetails" value="<?php echo $key+1 ?>">

	                <div class="row mb-3 inputDetails">

	                    <!--=====================================
	                    Entrada para el título del detalle
	                    ======================================--> 

	                    <div class="col-12 col-lg-6 form-group__content input-group">
	                         
	                        <div class="input-group-append">
	                            <span class="input-group-text">
	                                 <button type="button" class="btn btn-danger" onclick="removeInput(<?php echo $key ?>,'inputDetails')">&times;</button>
	                            </span>
	                        </div>

	                        <div class="input-group-append">
	                            <span class="input-group-text">
	                                Titulo
	                            </span>
	                        </div>

	                        <input
	                        class="form-control" 
	                        type="text"
	                        name="detailsTitleProduct_<?php echo $key ?>"
	                        pattern='[-\\(\\)\\=\\%\\&\\$\\;\\_\\*\\"\\#\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]{1,}'
	                        onchange="validateJS(event,'paragraphs')"
	                        value="<?= $value["title"] ?>"
	                        required>

	                        <div class="valid-feedback">Valido.</div>
	                        <div class="invalid-feedback">Por favor rellene este campo.</div>

	                    </div>

	                    <!--=====================================
	                    Entrada para el valor del detalle
	                    ======================================--> 

	                    <div class="col-12 col-lg-6 form-group__content input-group">

	                        <div class="input-group-append">
	                            <span class="input-group-text">
	                                 Valor:
	                            </span>
	                        </div>

	                        <input
	                        class="form-control" 
	                        type="text"
	                        name="detailsValueProduct_<?php echo $key ?>"
	                        pattern='[-\\(\\)\\=\\%\\&\\$\\;\\_\\*\\"\\#\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]{1,}'
	                        onchange="validateJS(event,'paragraphs')"
	                        value="<?= $value["value"] ?>"
	                        required>

	                        <div class="valid-feedback">Valido.</div>
	                        <div class="invalid-feedback">Por favor rellene este campo.</div>

	                    </div>

	                </div>

	            <?php endforeach ?> 

                <button type="button" class="btn btn-primary mb-2" onclick="addInput(this, 'inputDetails')">Agregar detalles</button>

            </div>


            <!--=====================================
            Especificaciones técnicas del producto
            ======================================-->

            <div class="form-group">
                
                <label>Especificaciones tecnicas del producto Ex: <strong>Tipo:</strong> Color, <strong>Valores:</strong> Negro, Rojo, Blanco</label>

                <?php if ($product->specifications_product != null): ?>

                	<?php foreach (json_decode($product->specifications_product, true) as $key => $value): ?>

		                <input type="hidden" name="inputSpecifications" value="<?php echo $key+1 ?>">

		                <div class="row mb-3 inputSpecifications">

		                    <!--=====================================
		                    Entrada para el tipo de especificación técnica
		                    ======================================--> 

		                    <div class="col-12 col-lg-6 form-group__content input-group">
		                         
		                        <div class="input-group-append">
		                            <span class="input-group-text">
		                                 <button type="button" class="btn btn-danger" onclick="removeInput(<?php echo $key ?>,'inputSpecifications')">&times;</button>
		                            </span>
		                        </div>

		                        <div class="input-group-append">
		                            <span class="input-group-text">
		                                Tipo:
		                            </span>
		                        </div>

		                        <input
		                        class="form-control" 
		                        type="text"
		                        name="specificationsTypeProduct_<?php echo $key ?>"
		                        pattern='[-\\(\\)\\=\\%\\&\\$\\;\\_\\*\\"\\#\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]{1,}'
		                        onchange="validateJS(event,'paragraphs')"
		                        value="<?php echo array_keys($value)[0] ?>" >

		                        <div class="valid-feedback">Valido.</div>
		                        <div class="invalid-feedback">Por favor rellene este campo.</div>

		                    </div>

		                    <!--=====================================
		                    Entrada para el valor de la especificación técnica
		                    ======================================--> 

		                    <div class="col-12 col-lg-6 form-group__content input-group">

		                        <input
		                        class="form-control tags-input" 
		                        data-role="tagsinput"
		                        type="text"
		                        name="specificationsValuesProduct_<?php echo $key ?>"
		                        placeholder="Type And Press Enter"
		                        pattern='[-\\(\\)\\=\\%\\&\\$\\;\\_\\*\\"\\#\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]{1,}'
		                        onchange="validateJS(event,'paragraphs')"
		                        value="<?php echo implode(",", array_values($value)[0]); ?>">
		                        

		                        <div class="valid-feedback">Valido.</div>
		                        <div class="invalid-feedback">Por favor rellene este campo.</div>

		                    </div>

		                </div>

		             <?php endforeach ?>   

	            <?php else: ?>

	            	<input type="hidden" name="inputSpecifications" value="1">

	                <div class="row mb-3 inputSpecifications">

	                    <!--=====================================
	                    Entrada para el tipo de especificación técnica
	                    ======================================--> 

	                    <div class="col-12 col-lg-6 form-group__content input-group">
	                         
	                        <div class="input-group-append">
	                            <span class="input-group-text">
	                                 <button type="button" class="btn btn-danger" onclick="removeInput(0,'inputSpecifications')">&times;</button>
	                            </span>
	                        </div>

	                        <div class="input-group-append">
	                            <span class="input-group-text">
	                                Tipo:
	                            </span>
	                        </div>

	                        <input
	                        class="form-control" 
	                        type="text"
	                        name="specificationsTypeProduct_0"
	                        pattern='[-\\(\\)\\=\\%\\&\\$\\;\\_\\*\\"\\#\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]{1,}'
	                        onchange="validateJS(event,'paragraphs')">

	                        <div class="valid-feedback">Valido.</div>
	                        <div class="invalid-feedback">Por favor rellene este campo.</div>

	                    </div>

	                    <!--=====================================
	                    Entrada para el valor de la especificación técnica
	                    ======================================--> 

	                    <div class="col-12 col-lg-6 form-group__content input-group">

	                        <input
	                        class="form-control tags-input" 
	                        data-role="tagsinput"
	                        type="text"
	                        name="specificationsValuesProduct_0"
	                        placeholder="Type And Press Enter"
	                        pattern='[-\\(\\)\\=\\%\\&\\$\\;\\_\\*\\"\\#\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]{1,}'
	                        onchange="validateJS(event,'paragraphs')">

	                        <div class="valid-feedback">Valido.</div>
	                        <div class="invalid-feedback">Por favor rellene este campo.</div>

	                    </div>

	                </div>


	            <?php endif ?>

                <button type="button" class="btn btn-primary mb-2" onclick="addInput(this, 'inputSpecifications')">Add Specifications</button>

            </div>

            <!--=====================================
            Palabras claves del producto
            ======================================--> 

            <div class="form-group">
                
                <label>Palabras claves<sup class="text-danger">*</sup></label>

                <div class="form-group__content">

                    <input
                    class="form-control tags-input" 
                    data-role="tagsinput"
                    type="text"
                    name="tagsProduct"
                    placeholder="Type And Press Enter"
                    pattern='[-\\(\\)\\=\\%\\&\\$\\;\\_\\*\\"\\#\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]{1,}'
                    onchange="validateJS(event,'paragraphs')"
                    value="<?php echo implode(",", json_decode($product->tags_product,true)); ?>"
                    required
                    >

                    <div class="valid-feedback">Valido.</div>
                    <div class="invalid-feedback">Por favor rellene este campo.</div>

                </div>

            </div>

            <!--=====================================
            Imagen del producto
            ======================================-->

            <div class="form-group">

            	 <input type="hidden" name="imageProductOld" value="<?php echo $product->image_product ?>">
                
                <label>Imagen del producto<sup class="text-danger">*</sup></label> 

                <div class="form-group__content">
                    
                    <label class="pb-5" for="imageProduct">
                        
                        <img src="img/products/<?= $product->url_category ?>/<?= $product->image_product ?>" class="img-fluid changeImage" style="width:150px">

                    </label>

                    <div class="custom-file">       

                        <input 
                        type="file"
                        id="imageProduct"
                        class="custom-file-input"
                        name="imageProduct"
                        accept="image/*"
                        maxSize="2000000"
                        onchange="validateImageJS(event, 'changeImage')"
                        >

                        <div class="valid-feedback">Valido.</div>
                        <div class="invalid-feedback">Por favor rellene este campo.</div>

                        <label class="custom-file-label" for="imageProduct">Elige el archivo</label>

                    </div>


                </div>

            </div>

            <!--=====================================
            Galería del Producto
            ======================================-->    

            <label>Galería del Producto: <sup class="text-danger">*</sup></label> 

            <div class="dropzone mb-3">

            	<?php foreach (json_decode($product->gallery_product,true) as $value): ?>

            		<div class="dz-preview dz-file-preview"> 

            			<div class="dz-image">
            			 	
            			 	<img src="img/products/<?= $product->url_category ?>/gallery/<?= $value ?>">

            			</div>

            			<a class="dz-remove" data-dz-remove remove="<?=$value?>" onclick="removeGallery(this)">Eliminar archivo</a>

            		</div>   
            		
            	<?php endforeach ?>
                
                <div class="dz-message">
                    
                    Suelta tus imágenes aquí, tamaño máximo 500px * 500px

                </div>

            </div>

            <input type="hidden" name="galleryProductOld" value='<?=$product->gallery_product ?>'>

            <input type="hidden" name="galleryProduct">

			<input type="hidden" name="deleteGalleryProduct">


            <!--=====================================
            Video del producto
            ======================================-->

            <div class="form-group">
                 
                <label>Video del producto, Ex: <strong>Tipo:</strong> YouTube, <strong>Id:</strong> Sl5FaskVpD4</label> 

                <div class="row mb-3">
                    
                    <div class="col-12 col-lg-6 form-group__content input-group mx-0 pr-0">
                      
                        <div class="input-group-append">
                            <span class="input-group-text">
                                Tipo:
                            </span>
                        </div>

                        <select 
                        class="form-control"                               
                        name="type_video"
                        >

                        <?php if ($product->video_product != null): ?>

                        	<?php if (json_decode($product->video_product, true)[0] == "youtube"): ?>

                        		<option value="youtube">YouTube</option>
                                <option value="vimeo">Vimeo</option>

                        	<?php else: ?>

                        		<option value="vimeo">Vimeo</option>
                                <option value="youtube">YouTube</option>

                        	<?php endif ?>

                         <?php else: ?>

                            <option value="">Seleccione la plataforma</option>
                            <option value="youtube">YouTube</option>
                            <option value="vimeo">Vimeo</option>

                        <?php endif ?>

                        </select>

                    </div>

                    <div class="col-12 col-lg-6 form-group__content input-group mx-0">
                        
                        <div class="input-group-append">
                            <span class="input-group-text">
                                Id:
                            </span>
                        </div>

                        <input
                        class="form-control"                               
                        name="id_video"
                        pattern="[-\\(\\)\\=\\%\\&\\$\\;\\_\\*\\'\\#\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]{1,100}"
                        maxlength="100"
                        onchange="validateJS(event,'paragraphs')"
                        <?php if ($product->video_product != null): ?>
                        value="<?php echo json_decode($product->video_product, true)[1] ?>"
                        <?php endif ?>
                        >

                        <div class="valid-feedback">Valido.</div>
                        <div class="invalid-feedback">Por favor rellene este campo.</div>         

                    </div>

                </div>

            </div>

             <!--=====================================
            Precio de venta, precio de envío, dias de entrega y stock
            ======================================-->

            <div class="form-group">
                
                <div class="row mb-3">
                   
                    <!--=====================================
                    Precio de venta
                    ======================================-->
                    
                    <div class="col-12 col-lg-3">
                        
                        <label>Precio de venta<sup class="text-danger">*</sup></label>

                        <div class="form-group__content input-group mx-0 pr-0">         

                            <div class="input-group-append">
                                <span class="input-group-text">
                                    Price $:
                                </span>
                            </div>

                            <input type="number"
                            class="form-control"
                            name="price"
                            min="0"
                            step="any"
                            pattern="[.\\,\\0-9]{1,}"
                            onchange="validateJS(event, 'numbers')"
                             value="<?= $product->price_product ?>"
                            required>
                        
                            <div class="valid-feedback">Valido.</div>
                            <div class="invalid-feedback">Por favor rellene este campo.</div>

                        </div>      

                    </div>

                     <!--=====================================
                    Stock
                    ======================================-->

                    <div class="col-12 col-lg-3">
                        
                        <label>Productos en existencia<sup class="text-danger">*</sup> (Max:100 unidades)</label>

                        <div class="form-group__content input-group mx-0 pr-0"> 

                            <div class="input-group-append">
                                <span class="input-group-text">
                                    En existencia:
                                </span>
                            </div>

                            <input type="number"
                            class="form-control"
                            name="stock"
                            min="0"
                            max="100"
                            pattern="[0-9]{1,}"
                            onchang onchange="validateJS(event, 'numbers')"
                            value="<?= $product->stock_product ?>"
                            required>
                        
                            <div class="valid-feedback">Valido.</div>
                            <div class="invalid-feedback">Por favor rellene este campo.</div>  

                        </div>    

                    </div>

                </div>

            </div>

             <!--=====================================
            Oferta del producto
            ======================================-->

            <div class="form-group">
                
                <label>Oferta del producto Ex: <strong>Tipo:</strong> Descuento, <strong>Porcentaje %:</strong> 25, <strong>Fin de la oferta:</strong> 30/06/2022</label>

                <div class="row mb-3">

                    <!--=====================================
                    Tipo de Oferta
                    ======================================-->
                    
                    <div class="col-12 col-lg-4 form-group__content input-group mx-0 pr-0">
                        
                        <div class="input-group-append">
                            <span class="input-group-text">
                                Tipo de Oferta:
                            </span>
                        </div>

                        <select
                        class="form-control"
                        name="type_offer"
                        onchange="changeOffer(event)">

                             <?php if ($product->offer_product != null): ?>

                             	<?php if (json_decode($product->offer_product, true)[0] == "Discount"): ?>

                             		<option value="Discount">Descuento</option>
                                	<option value="Fixed">Fijo</option>

                            <?php else: ?>
            
                                <option value="Fixed">Fijo</option>
                                <option value="Discount">Descuento</option>
                                    
                            <?php endif ?>

                            <?php else: ?>

	                            <option value="Discount">Descuento</option>
	                            <option value="Fixed">Fijo</option>
	                            
	                        <?php endif ?>

                        </select>

                        <div class="valid-feedback">Valido.</div>
                        <div class="invalid-feedback">Por favor rellene este campo.</div>        

                    </div>

                    <!--=====================================
                    El valor de la oferta
                    ======================================-->

                    <div class="col-12 col-lg-4 form-group__content input-group mx-0 pr-0">

                    	<?php if ($product->offer_product != null): ?>

            		   		<div class="input-group-append">

            		   	 		<?php if (json_decode($product->offer_product, true)[0] == "Discount"): ?>

        		   	 			 	<span 
                            		class="input-group-text typeOffer">
	                                	Porcentaje %:
	                            	</span>

	                             <?php else: ?>
            
                                    <span 
                                    class="input-group-text typeOffer">
                                        Precio $:
                                    </span>
                                        
                                <?php endif ?>

            		   		</div>

            		   		<input type="number"
	                        class="form-control"
	                        name="value_offer"
	                        min="0"
	                        step="any"
	                        pattern="[.\\,\\0-9]{1,}"
	                        onchange="validateJS(event, 'numbers')"
	                        value="<?php echo json_decode($product->offer_product, true)[1] ?>">


                    	<?php else: ?>
                    
	                        <div class="input-group-append">
	                           
	                            <span 
	                            class="input-group-text typeOffer">
	                                Porcentaje %:
	                            </span>

	                        </div>

	                        <input type="number"
	                        class="form-control"
	                        name="value_offer"
	                        min="0"
	                        step="any"
	                        pattern="[.\\,\\0-9]{1,}"
	                         onchange="validateJS(event, 'numbers')">

	                     <?php endif ?>

                        <div class="valid-feedback">Valido.</div>
                        <div class="invalid-feedback">Por favor rellene este campo.</div>     

                    </div>

                    <!--=====================================
                    Fecha de vencimiento de la oferta
                    ======================================-->

                    <div class="col-12 col-lg-4 form-group__content input-group mx-0 pr-0">
                        
                        <div class="input-group-append">
                            <span class="input-group-text">
                                Fin de la oferta:
                            </span>
                        </div>

                        <?php if ($product->offer_product != null): ?>

                            <input type="date"
                            class="form-control"
                            name="date_offer"
                            value="<?php echo json_decode($product->offer_product, true)[2] ?>">

                        <?php else: ?>

                            <input type="date"
                            class="form-control"
                            name="date_offer">
                            
                        <?php endif ?>

                        <div class="valid-feedback">Valido.</div>
                        <div class="invalid-feedback">Por favor rellene este campo.</div>     

                    </div>
                      

                </div>   

            </div>

        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            
            <div class="form-group submtit">
                 
                <button
                type="submit"
                class="ps-btn ps-btn--fullwidth">Guardar producto</button>

                <?php 

                    $editProduct = new vendorsController();
                    $editProduct -> editProduct();
                ?>


            </div>


        </div>

    </div>

</form>