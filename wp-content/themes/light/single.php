<!-- 
 Template Name: Product detail
-->

<?php get_header() ?>

<header class="site-header section-padding d-flex justify-content-center align-items-center">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-10 col-12">
                            <h1>
                                <span class="d-block text-primary">We provide you</span>
                                <span class="d-block text-dark">Fashionable Stuffs</span>
                            </h1>
                        </div>
                    </div>
                </div>
            </header>

            <section class="product-detail section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-12">
                            <div class="product-thumb">
                                <div class="img-fluid product-image product-image__single"><?php the_post_thumbnail('goods_img') ?></div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="product-info d-flex">
                                <div>
                                    <h2 class="product-title mb-0"><?php the_title(); ?></h2>

                                    <p class="product-p"><?php echo get_the_excerpt($post) ?></p>
                                </div>

                                <small class="product-price text-muted ms-auto mt-auto mb-5">$25</small>
                            </div>

                            <div class="product-description">

                                <strong class="d-block mt-4 mb-2">Description</strong>

                                <p class="lead mb-5">Over three years in business, We’ve had the chance to work on a variety of projects, with companies</p>
                            </div>

                            <div class="product-cart-thumb row">
                                <div class="col-lg-6 col-12">
                                    
                                    <select class="form-select cart-form-select" id="inputGroupSelect01">
                                        <option selected>Quantity</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>

                                <div class="col-lg-6 col-12 mt-4 mt-lg-0">
                                    <button type="submit" class="btn custom-btn cart-btn" data-bs-toggle="modal" data-bs-target="#cart-modal">Add to Cart</button>
                                </div>

                                <p>
                                    <a href="#" class="product-additional-link">Details</a>

                                    <a href="#" class="product-additional-link">Delivery and Payment</a>
                                </p>
                            </div>

                        </div>

                    </div>
                </div>
            </section>

            <section class="related-product section-padding border-top">
                <div class="container">
                    <div class="row">

                        <div class="col-12">
                            <h3 class="mb-5">You might also like</h3>
                        </div>

                        <?php
$query_might_like_products = array(
    'post_per_page' => 3,
    'paged' => get_query_var('pages'),
    'category_name' => 'new_arrivals',
    'order' => 'ASC',
    'orderby' => 'date'
);
?>

                        <?php wp_reset_query(); $query_like_products = new WP_Query($query_might_like_products); ?>
                    
                    <?php if ($query_like_products->have_posts()) {while ($query_like_products->have_posts()) {
                        $query_like_products->the_post();
                        ?>

                        <div class="col-lg-4 col-12 mb-3">
                            <div class="product-thumb">
                                <a href="<?php the_permalink(); ?>">
                                    <div class="img-fluid product-image"><?php the_post_thumbnail('goods_img') ?></div>
                                </a>

                                <div class="product-top d-flex">
                        
                                    <?php $tags_arr_might_like = get_the_tags(); ?>

                                    <?php echo $tags_arr_might_like ? "<span class=\"product-alert me-auto\">{$tags_arr_might_like[0]->name}</span>" : null; ?>

                                    <a href="#" class="bi-heart-fill product-icon"></a>
                                </div>

                                <div class="product-info d-flex">
                                    <div>
                                        <h5 class="product-title mb-0">
                                            <a href="<?php the_permalink(); ?>" class="product-title-link"><?php the_title(); ?></a>
                                        </h5>

                                        <p class="product-p"><?php echo get_the_excerpt($post) ?></p>
                                    </div>

                                    <small class="product-price text-muted ms-auto mt-auto mb-5">$25</small>
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
