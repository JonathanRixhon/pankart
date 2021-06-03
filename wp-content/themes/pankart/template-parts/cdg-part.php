<article class="cdg-preview">
    <h4 class="cdg__title"><?php the_title() ?></h4>
    <?php echo do_shortcode('[likebtn theme="custom" btn_size="30" f_size="14" icon_size="18" icon_l="hrt1" lang="fr" like_enabled="0" dislike_enabled="0" show_like_label="0" icon_like_show="0" icon_dislike_show="0" popup_width="0" bp_notify="0"]'); ?>
    <dl class="cdg-informations">
        <dt class='sro'>Date</dt>
        <dd class="cdg-info__date">Le <?php the_date('d F Y') ?></dd>
    </dl>
    <p class="cdg-content"><?= get_the_content() ?></p>
    <?php if (has_post_thumbnail()) : ?>
        <img class="cdg__thumbnail" <?= pk_the_thumbnail_attributes(["news-thumbnail", "news-thumbnail-large"]) ?>>
    <?php endif; ?>
</article>