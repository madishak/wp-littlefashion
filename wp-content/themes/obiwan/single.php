<?php get_header('page'); ?>

<main>
    This is page_blog
<?php
$query_args = array(
    'post_per_page' => 4,
    'paged' => get_query_var('pages')
);
?>

    <?php wp_reset_query(); $query = new WP_Query($query_args); ?>
    <?php if ($query->have_posts()) {while ($query->have_posts()) {
        $query->the_post();
        ?>
<a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a>
        <?php
    }}
    ?>
</main>

<?php get_footer(); ?>