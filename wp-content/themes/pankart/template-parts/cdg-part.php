<article class="cdg-preview cdg-preview_<?= get_field('cdq') === 'gueule' ? 'cdg' : 'cdc' ?>">
    <h4 class="cdg-preview__title"><?php the_title() ?></h4>

    <?php echo do_shortcode('[wp_ulike for="cdg"]'); ?>
    <dl class="cdg-informations  ">
        <dt class='sro'>Date</dt>
        <dd class="cdg-info__date">Le <?= get_the_date('d F Y', get_the_ID()) ?></dd>
    </dl>
    <p class="cdg-preview__content"><?= get_the_content() ?></p>
    <?php if (has_post_thumbnail()) : ?>
        <img class="cdg-preview__thumbnail" <?= pk_the_thumbnail_attributes(["news-thumbnail", "news-thumbnail-large"]) ?>>
    <?php endif; ?>
</article>