<!-- 
    Den här sidan representerar sidan för en butik.
-->


<?php
get_header();
$post_meta = get_post_meta(get_the_ID());
// echo '<pre>',var_dump($post_meta),'</pre>';
?>
<main class="singleButikMain flex">
    <div class="containerButik">
            <div class="contentButiker">
                <h1><?php the_title() ?></h1>
                <h4>Information:</h4>

                <table class="table table-striped">
                    <tr>
                        <th>Adress :</th>
                        <td><?php echo $post_meta["adress"][0] ?></td>
                    </tr>
                    <tr>
                        <th>Butiksansvarig :</th>
                        <td><?php echo $post_meta["butiksansvarig"][0] ?></td>
                    </tr>
                    <tr>
                        <th>e-mail :</th>
                        <td><?php echo $post_meta["e-mail"][0] ?></td>
                    </tr>
                    <tr>
                        <th>Telefonnummer :</th>
                        <td><?php echo $post_meta["telefonnummer"][0] ?></td>
                    </tr>
                    <tr>
                        <th>Öppettider :</th>
                        <td><?php echo $post_meta["oppettider"][0] ?></td>
                    </tr>
                </table>

                <br>
                <a href="../" class="btn btn-dark btn-sm">All Butiker</a>
            </div>
            <div class="kartaButik">
                <?php echo $post_meta["karta"][0] ?>
            </div>
    </div>
</main>

























<!-- <main>

 

        <?php the_post_thumbnail(null, ['class' => 'img-responsive responsive--full', 'title' => 'Feature image']); ?>
        
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
        

</main> -->

<?php get_footer(); ?>