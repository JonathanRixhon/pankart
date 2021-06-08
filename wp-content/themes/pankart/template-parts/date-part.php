<?php
$textDate = strftime('%d %B %G', strtotime(get_field('event-date')));
?>
<article class="date-elt <?= get_field('sold_out') ? "date_elt_sold-out" : '' ?>">
    <h3 class="date-elt__title"><?php the_title() ?></h3>
    <dl class="date-content">
        <dt class="sro">Date:</dt>
        <dd class="date-content__date">
            <time datetime="<?= get_field("event-date") ?>">
                Le <?= $textDate ?>
            </time>
        </dd>
    </dl>
    <a class="date-elt__link " href="<?php get_field('event-link') ?>">
        <span class="sro">Vers le site de l'évènement</span>
    </a>
    <p class="date-elt__fake-link <?= get_field('sold_out') ? "date-elt__fake-link_sold-out" : "" ?>" aria-hidden="true">Vers le site de l'évènement</p>
</article>