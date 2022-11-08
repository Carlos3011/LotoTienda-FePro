<!--=====================================
Crear Producto
======================================-->

<div class="tab-pane container fade" id="createProduct">
	
	<!-- Modal Header -->
    <div class="modal-header">
        <h4 class="modal-title text-center">3. Create Product</h4>
    </div>

    <!-- Modal body -->
    <div class="modal-body p-5 text-left">

    	<!--=====================================
        Nombre del producto
        ======================================-->

        <div class="form-group">
        
            <label>Product Name<sup class="text-danger">*</sup></label>

            <div class="form-group__content">
                
                <input type="text"
                class="form-control"
                name="nameProduct"
                pattern="[A-Za-z0-9ñÑáéíóúÁÉÍÓÚ ]{1,}"
                onchange="validateDataRepeat(event,'product')"
                required>

                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>

            </div>

        </div>

         <!--=====================================
        Url del producto
        ======================================-->

        <div class="form-group">
        
            <label>Product Url<sup class="text-danger">*</sup></label>

            <div class="form-group__content">
                
                <input type="text"
                class="form-control"
                name="urlProduct"
                readonly
                required>

                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>

            </div>

        </div>

          <!--=====================================
        Categoría del producto
        ======================================-->

        <div class="form-group">
            
            <label>Product Category<sup class="text-danger">*</sup></label>

            <?php 

            $url = CurlController::api()."categories?select=id_category,name_category,url_category";
            $method = "GET";
            $fields = array();
            $header = array();

            $categories = CurlController::request($url, $method, $fields, $header)->results;

            ?>

            <div class="form-group__content">
                
                <select
                class="form-control"
                name="categoryProduct"
                onchange="changeCategory(event)"
                required>

                    <option value="">Select Category</option>

                    <?php foreach ($categories as $key => $value): ?>

                        <option value="<?php echo $value->id_category."_".$value->url_category ?>"><?php echo $value->name_category ?></option>
                        
                    <?php endforeach ?>

                </select>

                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>

            </div>

        </div>

        <!--=====================================
        SubCategoría del producto
        ======================================-->

        <div class="form-group subCategoryProduct" style="display:none">
            
            <label>Product SubCategory<sup class="text-danger">*</sup></label>

            <div class="form-group__content">
                    
                <select
                class="form-control"
                name="subCategoryProduct"
                required>
                    
                    <option value="">Select Subcategory</option>

                </select>

                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>

           </div>

        </div>

          <!--=====================================
        Descripción del producto
        ======================================-->

        <div class="form-group">
            
            <label>Product Description<sup class="text-danger">*</sup></label>

            <textarea
            class="summernote"
            name="descriptionProduct"
            required
            ></textarea>

            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>

        </div>

         <!--=====================================
        Resumen del producto
        ======================================-->

        <div class="form-group">
            
            <label>Product Summary<sup class="text-danger">*</sup> Ex: 20 hours of portable capabilities</label>

            <input type="hidden" name="inputSummary" value="1">

            <div class="form-group__content input-group mb-3 inputSummary">
                 
                <div class="input-group-append">
                    <span class="input-group-text">
                         <button type="button" class="btn btn-danger" onclick="removeInput(0,'inputSummary')">&times;</button>
                    </span>
                </div>

                <input
                class="form-control" 
                type="text"
                name="summaryProduct_0"
                pattern='[-\\(\\)\\=\\%\\&\\$\\;\\_\\*\\"\\#\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]{1,}'
                onchange="validateJS(event,'paragraphs')"
                required>

                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>

            </div>

            <button type="button" class="btn btn-primary mb-2" onclick="addInput(this, 'inputSummary')">Add Summary</button>

        </div>

         <!--=====================================
        Detalles del producto
        ======================================-->

        <div class="form-group">
            
            <label>Product Details<sup class="text-danger">*</sup> Ex: <strong>Title:</strong> Bluetooth, <strong>Value:</strong> Yes</label>

            <input type="hidden" name="inputDetails" value="1">

            <div class="row mb-3 inputDetails">

                <!--=====================================
                Entrada para el título del detalle
                ======================================--> 

                <div class="col-12 col-lg-6 form-group__content input-group">
                     
                    <div class="input-group-append">
                        <span class="input-group-text">
                             <button type="button" class="btn btn-danger" onclick="removeInput(0,'inputDetails')">&times;</button>
                        </span>
                    </div>

                    <div class="input-group-append">
                        <span class="input-group-text">
                            Title:
                        </span>
                    </div>

                    <input
                    class="form-control" 
                    type="text"
                    name="detailsTitleProduct_0"
                    pattern='[-\\(\\)\\=\\%\\&\\$\\;\\_\\*\\"\\#\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]{1,}'
                    onchange="validateJS(event,'paragraphs')"
                    required>

                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>

                </div>

                <!--=====================================
                Entrada para el valor del detalle
                ======================================--> 

                <div class="col-12 col-lg-6 form-group__content input-group">

                    <div class="input-group-append">
                        <span class="input-group-text">
                             Value:
                        </span>
                    </div>

                    <input
                    class="form-control" 
                    type="text"
                    name="detailsValueProduct_0"
                    pattern='[-\\(\\)\\=\\%\\&\\$\\;\\_\\*\\"\\#\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]{1,}'
                    onchange="validateJS(event,'paragraphs')"
                    required>

                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>

                </div>

            </div>

            <button type="button" class="btn btn-primary mb-2" onclick="addInput(this, 'inputDetails')">Add Details</button>

        </div>


        <!--=====================================
        Especificaciones técnicas del producto
        ======================================-->

        <div class="form-group">
            
            <label>Product Specifications Ex: <strong>Type:</strong> Color, <strong>Values:</strong> Black, Red, White</label>

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
                            Type:
                        </span>
                    </div>

                    <input
                    class="form-control" 
                    type="text"
                    name="specificationsTypeProduct_0"
                    pattern='[-\\(\\)\\=\\%\\&\\$\\;\\_\\*\\"\\#\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]{1,}'
                    onchange="validateJS(event,'paragraphs')">

                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>

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

                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>

                </div>

            </div>

            <button type="button" class="btn btn-primary mb-2" onclick="addInput(this, 'inputSpecifications')">Add Specifications</button>

        </div>

        <!--=====================================
        Palabras claves del producto
        ======================================--> 

        <div class="form-group">
            
            <label>Product Tags<sup class="text-danger">*</sup></label>

            <div class="form-group__content">

                <input
                class="form-control tags-input" 
                data-role="tagsinput"
                type="text"
                name="tagsProduct"
                placeholder="Type And Press Enter"
                pattern='[-\\(\\)\\=\\%\\&\\$\\;\\_\\*\\"\\#\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]{1,}'
                onchange="validateJS(event,'paragraphs')"
                required
                >

                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>

            </div>

        </div>

        <!--=====================================
        Imagen del producto
        ======================================-->

        <div class="form-group">
            
            <label>Product Image<sup class="text-danger">*</sup></label> 

            <div class="form-group__content">
                
                <label class="pb-5" for="imageProduct">
                    
                    <img src="img/products/default/default-image.jpg" class="img-fluid changeImage" style="width:150px">

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
                    required>

                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>

                    <label class="custom-file-label" for="imageProduct">Choose file</label>

                </div>


            </div>

        </div>

        <!--=====================================
        Galería del Producto
        ======================================-->    

        <label>Product Gallery: <sup class="text-danger">*</sup></label> 

        <div class="dropzone mb-3">
            
            <div class="dz-message">
                
                 Drop your images here, size max 500px * 500px

            </div>

        </div>

        <input type="hidden" name="galleryProduct">

        <!--=====================================
        Video del producto
        ======================================-->

        <div class="form-group">
             
            <label>Product Video, Ex: <strong>Type:</strong> YouTube, <strong>Id:</strong> Sl5FaskVpD4</label> 

            <div class="row mb-3">
                
                <div class="col-12 col-lg-6 form-group__content input-group mx-0 pr-0">
                  
                    <div class="input-group-append">
                        <span class="input-group-text">
                            Type:
                        </span>
                    </div>

                    <select 
                    class="form-control"                               
                    name="type_video"
                    >
                        <option value="">Select Platform</option>
                        <option value="youtube">YouTube</option>
                        <option value="vimeo">Vimeo</option>

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
                    >

                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>         

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
                    
                    <label>Product Price<sup class="text-danger">*</sup></label>

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
                        required>
                    
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>

                    </div>      

                </div>

                <!--=====================================
                Precio de envío
                ======================================-->

                <div class="col-12 col-lg-3">
                    
                    <label>Product Shipping<sup class="text-danger">*</sup></label>

                    <div class="form-group__content input-group mx-0 pr-0"> 

                        <div class="input-group-append">
                            <span class="input-group-text">
                                Shipping $:
                            </span>
                        </div>

                        <input type="number"
                        class="form-control"
                        name="shipping"
                        min="0"
                        step="any"
                        pattern="[.\\,\\0-9]{1,}"
                         onchange="validateJS(event, 'numbers')"
                        required>
                    
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div> 

                    </div>     

                </div>

                <!--=====================================
                Días de entrega
                ======================================-->

                <!--<div class="col-12 col-lg-3">
                    
                    <label>Product Delivery Time<sup class="text-danger">*</sup></label>

                    <div class="form-group__content input-group mx-0 pr-0"> 

                        <div class="input-group-append">
                            <span class="input-group-text">
                                Days:
                            </span>
                        </div>

                        <input type="number"
                        class="form-control"
                        name="delivery_time"
                        min="0"
                        pattern="[.\\,\\0-9]{1,}"
                        onchange="validateJS(event, 'numbers')"
                        required>
                    
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>  

                    </div>    

                </div> -->

                 <!--=====================================
                Stock
                ======================================-->

                <div class="col-12 col-lg-3">
                    
                    <label>Product Stock<sup class="text-danger">*</sup> (Max:100 unit)</label>

                    <div class="form-group__content input-group mx-0 pr-0"> 

                        <div class="input-group-append">
                            <span class="input-group-text">
                                Stock:
                            </span>
                        </div>

                        <input type="number"
                        class="form-control"
                        name="stock"
                        min="0"
                        max="100"
                        pattern="[0-9]{1,}"
                        onchang onchange="validateJS(event, 'numbers')"
                        required>
                    
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>  

                    </div>    

                </div>

            </div>

        </div>

         <!--=====================================
        Oferta del producto
        ======================================-->

        <div class="form-group">
            
            <label>Product Offer Ex: <strong>Type:</strong> Disccount, <strong>Percent %:</strong> 25, <strong>End offer:</strong> 30/06/2020</label>

            <div class="row mb-3">

                <!--=====================================
                Tipo de Oferta
                ======================================-->
                
                <div class="col-12 col-lg-4 form-group__content input-group mx-0 pr-0">
                    
                    <div class="input-group-append">
                        <span class="input-group-text">
                            Type:
                        </span>
                    </div>

                    <select
                    class="form-control"
                    name="type_offer"
                    onchange="changeOffer(event)">
                        
                        <option value="Discount">Discount</option>
                        <option value="Fixed">Fixed</option>

                    </select>

                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>        

                </div>

                <!--=====================================
                El valor de la oferta
                ======================================-->

                <div class="col-12 col-lg-4 form-group__content input-group mx-0 pr-0">
                
                    <div class="input-group-append">
                       
                        <span 
                        class="input-group-text typeOffer">
                            Percent %:
                        </span>

                    </div>

                    <input type="number"
                    class="form-control"
                    name="value_offer"
                    min="0"
                    step="any"
                    pattern="[.\\,\\0-9]{1,}"
                     onchange="validateJS(event, 'numbers')">

                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>     

                </div>

                <!--=====================================
                Fecha de vencimiento de la oferta
                ======================================-->

                <div class="col-12 col-lg-4 form-group__content input-group mx-0 pr-0">
                    
                    <div class="input-group-append">
                        <span class="input-group-text">
                            End Offer:
                        </span>
                    </div>

                    <input type="date"
                    class="form-control"
                    name="date_offer">

                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>     

                </div>
                  

            </div>   

        </div>

    </div>

    <!-- Modal footer -->
    <div class="modal-footer">
        
        <div class="form-group submtit">
             
            <button
            type="submit"
            class="ps-btn ps-btn--fullwidth saveBtn">Create Store and Product</button>

            <?php 

                $newVendor = new vendorsController();
                $newVendor -> newVendor();
            ?>


        </div>

        
    </div>

</div>