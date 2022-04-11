<!-- 
    Den här sidan representerar just nu kategorisidan för produkterna.
-->

<?php echo "page"; ?>

<?php get_header(); ?>

<main>
   
    <?php
    while (have_posts()) {
        the_post(); ?>
         <div class="heroCategory">  

        <!-- Byt ut till kategorins thumbnail sedan. länken funkar ej helelr för den delen -->
        <!-- <img src= "<?php /* get_template_directory_uri(); */?>/assets/product_group_hoodies.png" alt="">  -->
        <!-- <img src="" alt=""> -->
        <?php
                
        ?>
            <div class="categoryTitle"><?php single_term_title('');?></div>
    </div>
        
        <?php  the_content();  ?>
        
    <?php } ?>
              
</main>

<?php get_footer(); ?>



<!-- Från mockup -->


<!--     <main>
        
       
        <div class="productCardInCategory">
            <div class="productInCatImg"> 
                    <img src="./produktbilder/överdel/Cooler_Longsleeve_Women_Black.webp" alt="">
                    <img src="./produktbilder/överdel/Cooler_Longsleeve_Women_Black2.webp" alt="">
                    <div class="heartMark"><img src="./assets/heart.png" alt=""></div>   
            </div>
            <div class="productInCatInfo">
                <div class="productLogo"><img src="./assets/adidas_logo_wbg.webp" alt=""></div>
                <div class="productTitleCat"><h3>Adidas adidas Ultraboost SvartGrå</h3></div>
                <div class="productSizeCat">
                    <strong>Storlekar i lager:</strong> 
                    <div class="sizeGroup">
                        <div class="sizeBox">S</div>
                        <div class="sizeBox">M</div>
                        <div class="sizeBox">L</div>
                        <div class="sizeBox">XL</div>
                    </div>
                </div>
                <div class="productPriceCat"><h3>1 489 kr</h3></div>
            </div>
        </div>

        <div class="productCardInCategory">
            <div class="productInCatImg"> 
                    <img src="./produktbilder/överdel/Marathon_Jacket_Ocean_PBlue_Women_Grey.webp" alt="">
                    <img src="./produktbilder/överdel/Marathon_Jacket_Ocean_PBlue_Women_Grey2.webp" alt="">
                    <div class="heartMark"><img src="./assets/heart.png" alt=""></div>  
            </div>
            <div class="productInCatInfo">
                <div class="productLogo"><img src="./assets/adidas_logo_wbg.webp" alt=""></div>
                <div class="productTitleCat"><h3>Adidas adidas Ultraboost SvartGrå</h3></div>
                <div class="productSizeCat">
                    <strong>Storlekar i lager:</strong> 
                    <div class="sizeGroup">
                        <div class="sizeBox">S</div>
                        <div class="sizeBox">M</div>
                        <div class="sizeBox">L</div>
                        <div class="sizeBox">XL</div>
                    </div>
                </div>
                <div class="productPriceCat"><h3>1 489 kr</h3></div>
            </div>
        </div><div class="productCardInCategory">
            <div class="productInCatImg"> 
                    <img src="./produktbilder/överdel/Marathon_Jacket_Translucent_Men_Black.webp" alt="">
                    <img src="./produktbilder/överdel/Marathon_Jacket_Translucent_Men_Black2.webp" alt="">
                    <div class="heartMark"><img src="./assets/heart.png" alt=""></div> 
                     <div class="saleTag">sale</div> --> <!-- vänstra hörnet längst ner -->   
       <!--      </div>
            <div class="productInCatInfo">
                <div class="productLogo"><img src="./assets/adidas_logo_wbg.webp" alt=""></div>
                <div class="productTitleCat"><h3>Adidas adidas Ultraboost SvartGrå</h3></div>
                <div class="productSizeCat">
                    <strong>Storlekar i lager:</strong> 
                    <div class="sizeGroup">
                        <div class="sizeBox">S</div>
                        <div class="sizeBox">M</div>
                        <div class="sizeBox">L</div>
                        <div class="sizeBox">XL</div>
                    </div>
                </div>
                <div class="productPriceCat"><h3>1 489 kr</h3></div>
            </div>
        </div>

    </main>
 -->
