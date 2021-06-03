<?php /* Template Name: coup de … */

$cdg = new WP_Query([
    'post_type' => 'cdg',
    'orderby' => 'date',
    'order' => 'desc'
]);

?>
<?php get_header(); ?>
<main class="cdg-page">
    <h2 class="cdg-page__title">Actualités</h2>
    <?php if ($cdg->have_posts()) : ?>
        <section class="last-new">
            <h3 class="last-new__title sro">Dernière actualité</h3>
            <?php $cdg->have_posts();
            $cdg->the_post(); ?>
            <?php get_template_part('template-parts/cdg-part', null) ?>
        </section>

    <?php else : ?>
        <p class="cdg-page__empty-message">Il n'y a pas encore d'actualités.</p>
    <?php endif; ?>
</main>
<?php get_footer(); ?>