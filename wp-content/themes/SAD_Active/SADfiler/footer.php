<!-- Temporär footer -->

<footer>

<div class="containerLogoFooter">
    <div class="logoSad">
        <?php the_custom_logo() ?>
    </div>
</div>

<div class="footerInfo">

    <div class="FAQ">
        <?php dynamic_sidebar('footerSidebar1');?>
    </div>
    <div class="social">
        <?php dynamic_sidebar('footerSidebar2');?>
    </div>


</div>

<?php wp_footer(); ?>
</footer>
</body>
</html>