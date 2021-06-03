<?php $album = get_field('rel-album')[0]; ?>
<?php if ($album) : ?>
    <dl class="song-album">
        <dt class="song-album__name">Album :</dt>
        <dd class="song-album__content">
            <?= get_the_title($album) ?>
        </dd>
    </dl>
    <article class="last-song">
        <h3 class="last-song__title"><?php the_title() ?></h3>
        <?php if (has_post_thumbnail() || has_post_thumbnail($album)) : ?>
            <img class="last-song__album-cover" <?= has_post_thumbnail() ? pk_the_thumbnail_attributes(['album-cover']) : pk_the_thumbnail_attributes(['album-cover'], $album) ?>>
        <?php endif; ?>
        <?php if (pk_sort_links(get_fields($album), 'listen')) : ?>
            <nav class="ls-nav ls-nav_listen">
                <h4 class="ls-nav__title sro">Liste des sites sur lesquels vous pouvez écouter le titre</h4>
                <button class="ls-nav__button">
                    Écouter l'album à fond !
                </button>
                <ul class="ls-nav__list">
                    <?php foreach (pk_sort_links(get_fields($album), 'listen') as $link) : ?>
                        <li class="ls-nav__item ls-nav__item_<?= $link['class'] ?>">
                            <a class="ls-nav__link ls-nav__link_<?= $link['class'] ?>" href="<?= $link['url'] ?>"><?= $link['title'] ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        <?php endif; ?>
        <?php if (pk_sort_links(get_fields($album), 'buy')) : ?>
            <nav class="ls-nav ls-nav_buy">
                <h4 class="ls-nav__title sro">Liste des sites sur lesquels vous pouvez écouter le titre</h4>
                <button class="ls-nav__button">
                    Écouter l'album à fond !
                </button>
                <ul class="ls-nav__list">
                    <?php foreach (pk_sort_links(get_fields($album), 'buy') as $link) : ?>
                        <li class="ls-nav__item ls-nav__item_<?= $link['class'] ?>">
                            <a class="ls-nav__link ls-nav__link_<?= $link['class'] ?>" href="<?= $link['url'] ?>"><?= $link['title'] ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        <?php endif; ?>
    </article>
<?php else : ?>
    <article>
        <h3 class="last-song__title"><?php the_title() ?></h3>
        <?php if (has_post_thumbnail() || has_post_thumbnail($album)) : ?>
            <img class="last-song__album-cover" <?= pk_the_thumbnail_attributes(['album-cover']) ?>>
        <?php endif; ?>
        <?php if (pk_sort_links(get_fields(), 'listen')) : ?>
            <nav class="ls-nav ls-nav_listen">
                <h4 class="ls-nav__title sro">Liste des sites sur lesquels vous pouvez écouter le titre</h4>
                <button class="ls-nav__button">
                    Écouter l'album à fond !
                </button>
                <ul class="ls-nav__list">
                    <?php foreach (pk_sort_links(get_fields(), 'listen') as $link) : ?>
                        <li class="ls-nav__item ls-nav__item_<?= $link['class'] ?>">
                            <a class="ls-nav__link ls-nav__link_<?= $link['class'] ?>" href="<?= $link['url'] ?>"><?= $link['title'] ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        <?php endif; ?>

        <?php if (pk_sort_links(get_fields(), 'buy')) : ?>
            <nav class="ls-nav ls-nav_buy">
                <h4 class="ls-nav__title sro">Liste des sites sur lesquels vous pouvez écouter le titre</h4>
                <button class="ls-nav__button">
                    Écouter l'album à fond !
                </button>
                <ul class="ls-nav__list">
                    <?php foreach (pk_sort_links(get_fields(), 'buy') as $link) : ?>
                        <li class="ls-nav__item ls-nav__item_<?= $link['class'] ?>">
                            <a class="ls-nav__link ls-nav__link_<?= $link['class'] ?>" href="<?= $link['url'] ?>"><?= $link['title'] ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        <?php endif; ?>
    </article>
<?php endif; ?>