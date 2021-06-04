<?php /* Template Name: Biographie groupe */
$members = new WP_Query([
    "post_type" => "members",
    'orderby' => 'menu_order',
]);



if (count(pk_antecedent())) {
    $antecedents = pk_antecedent();
}
?>
<?php get_header() ?>
<main class="bio-grp-page">
    <hgroup class="grp-title-group">
        <h2 class="grp-title-group__title grp-title-group__titles_title "><?= get_field("title") ?></h2>
        <h3 class="grp-title-group__title grp-title-group__titles_sub-title "><?= get_field("sub-title") ?></h3>
    </hgroup>

    <section>
        <h4 class="sro">Texte expliquatif</h4>
        <?= get_field('first-p') ?>
        <img <?= pk_news_img_attributes(['album-cover'], get_field('img-about-1')) ?>>
        <?php if (isset($antecedents)) : ?>
            <h4>Antécédents</h4>
            <ul>
                <?php foreach (pk_antecedent() as $antecedent) : ?>
                    <li>
                        <dl>
                            <dt><?= $antecedent['style']; ?></dt>
                            <?php foreach ($antecedent['bands'] as $band) : ?>
                                <dd><?= $band; ?></dd>
                            <?php endforeach; ?>
                        </dl>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <?= get_field('prev') ?>
        <?= get_field('sec-p') ?>
        <img <?= pk_news_img_attributes(['album-cover'], get_field('img-about-2')) ?>>
    </section>

    <?php if ($members->have_posts()) : ?>
        <section>
            <h4 class='sro'>Les membres</h4>
            <?php while ($members->have_posts()) : $members->the_post(); ?>
                <?php get_template_part('template-parts/member-part', null) ?>
            <?php endwhile; ?>
        </section>
    <?php endif; ?>
    <section>
        <h4>Retrouvez-nous sur les réseaux</h4>
        <a href="#">Instagram</a>
        <a href="#">Facebook</a>
    </section>

    <section>
        <h4>Nous contacter</h4>
        <img src="" alt="img du logo du groupe">
        <?php get_template_part('template-parts/contact-form', null) ?>
    </section>
</main>
<?php get_footer() ?>