<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <section class="post__content">
            <h2><?= the_title() ?></h2>
            <h3>sous-titre</h3>
            <?= the_content(); ?>
        </section>

    <?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>