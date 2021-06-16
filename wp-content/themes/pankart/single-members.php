<?php get_header();
$members = new WP_Query([
    "post_type" => "members",
    'orderby' => 'menu_order',
    'post__not_in'   => [get_the_ID()],
]);

$instruments = get_field('instrument');

?>
<main class="member-page">
    <h2 class="member-page__title"><?php the_title() ?></h2>
    <section class="played__instruments">
        <h3 class="played__instruments__title sro">Instruments joués</h3>
        <?php if (count($instruments)) : ?>
            <ul class="pi">
                <?php foreach ($instruments as $instrument) : ?>
                    <li class='pi__item pi__item_<?= $instrument['value'] ?>'>
                        <span class="pi__name">
                            <?= $instrument['label'] ?>
                        </span>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        </ul>
    </section>
    <img class="member-page__thumbnail" <?= pk_the_thumbnail_attributes(['album-cover']) ?> alt="">
    <section class="member-decription">
        <h3 class="sro">Informations sur <?php the_title() ?> </h3>
        <?= get_field('description') ?>
    </section>
    <?php if ($members->have_posts()) : ?>
        <section class='members'>
            <h4 class='sro'>Les membres</h4>
            <?php while ($members->have_posts()) : $members->the_post(); ?>
                <?php get_template_part('template-parts/member-part', null) ?>
            <?php endwhile; ?>
        </section>
</main>
<?php endif; ?>
<?php get_footer() ?>