<?php /* Template Name: Agenda */

$dates = new WP_Query([
    'post_type' => 'date',
    'orderby' => 'date',
    'order' => 'desc'
]);

?>

<?php get_header() ?>
<main class="agenda-page">
    <h2 class="agenda-page__title">Agenda</h2>
    <?php if ($dates->have_posts()) : while ($dates->have_posts()) : $dates->the_post(); ?>
            <?php get_template_part('template-parts/date-part', null) ?>
        <?php endwhile; ?>
    <?php else : ?>
        <p class="agenda-page__empty-message">Il n'y a pas encore d'actualités.</p>
    <?php endif; ?>
</main>
<?php get_footer() ?>