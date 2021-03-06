<?php /* Template Name: coup de … */

$cdg = new WP_Query([
    'post_type' => 'cdg',
    'orderby' => 'date',
    'order' => 'desc'
]);

?>
<?php get_header(); ?>
<main class="cdg-page">
    <h2 class="cdg-page__title">Réactions</h2>
    <?php if ($cdg->have_posts()) : ?>
        <section class="cdg__list">
            <h3 class="cdg__title sro">Dernière actualité</h3>
            <?php while ($cdg->have_posts()) :
                $cdg->the_post() ?>
                <?php get_template_part('template-parts/cdg-part', null) ?>
        </section>

    <?php endwhile; ?>
<?php else : ?>
    <p class="cdg-page__empty-message">Il n'y a pas encore d'actualités.</p>
<?php endif; ?>
</main>
<?php get_footer(); ?>