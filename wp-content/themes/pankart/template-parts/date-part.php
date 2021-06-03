<article class="date-elt <?= get_field('sold_out') ? "date_elt_sold-out" : '' ?>">
    <h3 class="date-elt__title"><?php the_title() ?></h3>
    <dl>
        <dt>Date:</dt>
        <dd><?php get_field("date") ?></dd>
    </dl>

    <a class="date-elt__link" href="<?php get_field('event-link') ?>">
        <span class="sro">Vers le site de l'évènement</span>
    </a>
    <p aria-hidden="true">Vers le site de l'évènement</p>
</article>