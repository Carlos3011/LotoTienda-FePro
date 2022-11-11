<footer class="ps-footer">

    <div class="container">

        <div class="ps-footer__widgets">

      	<!--=====================================
		Categories Footer
		======================================-->  

        <div class="ps-footer__links">

            <?php foreach ($menuCategories as $key => $value): ?>
                                    
            <p>
            	<strong><?php echo $value->name_category ?></strong>

                <!--=====================================
                Traer las subcategorías
                ======================================-->

                <?php 

                $url = CurlController::api()."subcategories?linkTo=id_category_subcategory&equalTo=".rawurlencode($value->id_category)."&select=url_subcategory,name_subcategory";
                $method = "GET";
                $fields = array();
                $header = array();

                $menuSubcategories = CurlController::request($url, $method, $fields, $header)->results;

                ?>

                <?php foreach ($menuSubcategories as $key => $value): ?>

                    <a href="<?php echo $path.$value->url_subcategory ?>"><?php echo $value->name_subcategory ?></a>

                <?php endforeach ?>
            	
            </p>

            <?php endforeach ?>
            
        </div>

        <!--=====================================
		CopyRight - Payment method Footer
		======================================-->  

        <div class="ps-footer__copyright">

            <p>© 2022 LoboTienda. Todos los Derechos Reservados.</p>

            <p>
            	<span>Nosotros usamos pagos seguros:</span>

            	<a href="#">
            		<img src="img/payment-method/1.jpg" alt="">
            	</a>

            	<a href="#">
            		<img src="img/payment-method/2.jpg" alt="">
            	</a>

            	<a href="#">
            		<img src="img/payment-method/3.jpg" alt="">
            	</a>

            	<a href="#">
            		<img src="img/payment-method/4.jpg" alt="">
            	</a>

            	<a href="#">
            		<img src="img/payment-method/5.jpg" alt="">
            	</a>

            </p>

        </div>

    </div>

</footer>