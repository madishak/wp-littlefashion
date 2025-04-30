<?php get_header('page'); ?>

<main>
    This is page_blog
<?php
$query_args = array(
    'post_per_page' => 4,
    'paged' => get_query_var('pages')
);
?>

    <?php if (have_posts()) {while (have_posts()) {
       the_post();
        ?>
<a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a>
        <?php
    }}
    ?>
</main>

<?php get_footer(); ?>