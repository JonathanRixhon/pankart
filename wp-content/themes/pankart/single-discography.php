<?php
$members = new WP_Query([
    "post_type" => "members",
    'orderby' => 'menu_order',
    'post__not_in'   => [get_the_ID()],
]);

?>
<?php get_header(); ?>
<main>
    <h2><?php the_title() ?></h5>
        <section>
            <h3 class="sro">Informations sur <?php the_title() ?></h3>
            <img <?= pk_the_thumbnail_attributes(["news-thumbnail", "news-thumbnail-large"]) ?>>
            <dl>
                <dt class='sro'>Instruments joués</dt>
                <?php foreach (get_field('instrument') as $instrument) : ?>
                    <dd>
                        <img src="sprite" alt="test">
                        <p><?= $instrument['label'] ?></p>
                    </dd>
                <?php endforeach; ?>
            </dl>
            <?= get_field('description') ?>
        </section>
        <?php if ($members->have_posts()) : ?>
            <section>
                <h4 class='sro'>Les membres</h4>
                <?php while ($members->have_posts()) : $members->the_post(); ?>
                    <?php get_template_part('template-parts/member-part', null) ?>
                <?php endwhile; ?>
            </section>
        <?php endif; ?>
</main>
<?php get_footer(); ?>