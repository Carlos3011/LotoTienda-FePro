<!--=====================================
My Account Content
======================================--> 

<div class="ps-vendor-dashboard pro">

    <div class="container">

        <div class="ps-section__header">

            <!--=====================================
            Profile
            ======================================--> 

            <?php 

            include "views/pages/account/profile/profile.php";

            ?>

            <!--=====================================
            Nav Account
            ======================================--> 

            <div class="ps-section__content">

                <ul class="ps-section__links">
                    <li><a href="<?php echo $path ?>account&wishlist">Lista de Deseos</a></li>
                    <li><a href="<?php echo $path ?>account&my-shopping">Mis Compras</a></li>
                    <li class="active"><a href="<?php echo $path ?>account&my-store">Mi Tienda</a></li>
                    <li><a href="<?php echo $path ?>account&my-sales">Mis Ventas/Trueques</a></li>
                </ul>

                <!--=====================================
                New Store
                ======================================--> 
                 <div class="ps-page__content text-center row">

                    <div class="container">

                        <div class="ps-section__header">

                            <h1>Quieres crear tu tienda?</h1>

                            <h4>Herramienta para la comunidad universida BUAP <br> apoyemos el comercio interunivesitario</h4>

                        </div>

                        <div class="row">

                            <div class="col-lg-4 col-12">

                                <div class="card">

                                    <div class="card-body">
                                
                                        <img src="img/shop-1.jpg" class="img-fluid">

                                    </div>

                                    <div class="card-footer text-center">

                                        <button 
                                        class="btn btn-warning btn-lg"
                                        data-toggle="tab"
                                        href="#terms"
                                        onclick="goTerms()">
                                            <span class="badge badge-secondary">1</span> 
                                            Acepta terminos y condiciones
                                        </button>
                                    
                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-4 col-12">

                                <div class="card">

                                    <div class="card-body">
                                
                                        <img src="img/shop-2.jpg" class="img-fluid">

                                    </div>

                                    <div class="card-footer text-center">

                                        <button 
                                        class="btn btn-warning btn-lg disabled btnCreateStore">
                                            <span class="badge badge-secondary">2</span> 
                                            Crear Tienda
                                        </button>
                                    
                                    </div>

                                </div>

                            </div>

                             <div class="col-lg-4 col-12">

                                <div class="card">

                                    <div class="card-body">
                                
                                        <img src="img/shop-3.jpg" class="img-fluid">

                                    </div>

                                    <div class="card-footer text-center">

                                        <button class="btn btn-warning btn-lg disabled btnCreateProduct">
                                            <span class="badge badge-secondary">3</span>
                                             Crear Producto
                                        </button>
                                    
                                    </div>

                                </div>

                            </div>

                        </div>

                        <!--=====================================
                         Módulos para la creación de nueva tienda
                        ======================================--> 

                        <form class="needs-validation" novalidate method="post" enctype="multipart/form-data">

                            <input type="hidden" value="<?php echo CurlController::api() ?>" id="urlApi">

                            <div class="tab-content" id="tabContent">

                                <?php 

                                    include "modules/terms.php";

                                    include "modules/form-store.php";

                                    include "modules/form-product.php";

                                ?>
                                               
                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>