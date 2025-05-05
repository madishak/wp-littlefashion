<!-- 
 Template Name: Product
-->

<?php get_header() ?>

<header class="site-header section-padding d-flex justify-content-center align-items-center">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-10 col-12">
                            <h1>
                                <span class="d-block text-primary">Choose your</span>
                                <span class="d-block text-dark">favorite stuffs</span>
                            </h1>
                        </div>
                    </div>
                </div>
            </header>

            <?php
$query_args = array(
    'post_per_page' => 3,
    'paged' => get_query_var('pages'),
    'category_name' => 'new_arrivals',
    'order' => 'ASC',
    'orderby' => 'date'
);
?>

    

            <section class="products section-padding">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-12">
                            <h2 class="mb-5">New Arrivals</h2>
                        </div>
 <?php wp_reset_query(); $query = new WP_Query($query_args); ?>
                    
    <?php if ($query->have_posts()) {while ($query->have_posts()) {
        $query->the_post();
        ?>
<div class="col-lg-4 col-12 mb-3">

                            <div class="product-thumb">
                                <a href="<?php the_permalink(); ?>">
                                  
                                <div class="img-fluid product-image"><?php the_post_thumbnail('goods_img') ?></div>
                                </a>

                                <div class="product-top d-flex">
                           
                                    <?php $tags_arr = get_the_tags(); ?>

                                    <?php echo $tags_arr ? "<span class=\"product-alert me-auto\">{$tags_arr[0]->name}</span>" : null; ?>

                                    <a href="#" class="bi-heart-fill product-icon"></a>
                                </div>

                                <div class="product-info d-flex">
                                    <div>
                                        <h5 class="product-title mb-0">
                                            <a href="<?php the_permalink(); ?>" class="product-title-link"><?php the_title(); ?></a>
                                        </h5>

                                        <p class="product-p"><?php echo get_the_excerpt($post) ?></p>
                                    </div>

                                    <small class="product-price text-muted ms-auto">$25</small>
                                </div>
                            </div>
                        </div>


        <?php
    }}

    wp_reset_postdata();
    ?>

                    
                        <div class="col-12">
                            <h2 class="mb-5">Popular</h2>
                        </div>
                        <?php
$query_args_popular = array(
    'post_per_page' => 3,
    'paged' => get_query_var('pages'),
    'category_name' => 'popular',
    'order' => 'ASC',
    'orderby' => 'date'
);
?>
<?php wp_reset_query(); $query_popular = new WP_Query($query_args_popular); ?>
                    
 <?php if ($query_popular->have_posts()) {while ($query_popular->have_posts()) {
 $query_popular->the_post();
?>
                        <div class="col-lg-4 col-12 mb-3">
                            <div class="product-thumb">
                                <a href="<?php the_permalink(); ?>">
                                <div class="img-fluid product-image"><?php the_post_thumbnail('goods_img') ?></div>
                                </a>

                                <div class="product-top d-flex">
                                    <!-- <span class="product-alert">Trending</span> -->
                                    <?php $tags_arr_popular = get_the_tags(); ?>
                                    <?php echo $tags_arr_popular ? "<span class=\"product-alert me-auto\">{$tags_arr_popular[0]->name}</span>" : null; ?>

                                    <a href="#" class="bi-heart-fill product-icon ms-auto"></a>
                                </div>

                                <div class="product-info d-flex">
                                    <div>
                                        <h5 class="product-title mb-0">
                                            <a href="<?php the_permalink(); ?>" class="product-title-link"><?php the_title(); ?></a>
                                        </h5>

                                        <p class="product-p"><?php echo get_the_excerpt($post) ?></p>
                                    </div>

                                    <small class="product-price text-muted ms-auto">$50</small>
                                </div>
                            </div>
                        </div>
                        <?php
    }}

    wp_reset_postdata();
    ?>
                     

                    </div>
                </div>
            </section>

        </main>

<?php get_footer() ?>