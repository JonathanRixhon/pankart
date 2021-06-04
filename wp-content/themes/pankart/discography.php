<?php /* Template Name: Discographie */ ?>
<?php get_header();

$albums = new WP_Query([
    'post_type' => 'album',
    'orderby' => 'date',
    'order' => 'desc'
]);


$firstAlbum = new WP_Query(array(
    'post_type'            => 'album',
    'posts_per_page'    => 1,
    'meta_key'            => 'date-out',
    'orderby'            => 'meta_value',
    'order'                => 'asc'
));

$firstAlbumDate = intval(date('Y', strtotime(get_field('date-out', $firstAlbum->posts[0]))));
$thisYear = intval(date('Y'));
$postsSorted = [];
for ($date = $firstAlbumDate; $date <= intval(date('Y')); $date++) {
    foreach ($albums->posts as $album) {
        if ($date === intval(date('Y', strtotime(get_field('date-out', $album))))) {
            $postsSorted[$date][] = $album;
        }
    }
}
?>
<main>
    <h2>Discorahpie</h2>
    <?php if (count($postsSorted)) : ?>
        <?php foreach ($postsSorted as $key => $posts) : ?>
            <section>
                <h3><?= $key ?></h3>

                <?php foreach ($posts as $post) : ?>
                    <?php get_template_part('template-parts/album-disco-part', null, ['post' => $post]) ?>
                <?php endforeach; ?>
            </section>
        <?php endforeach; ?>
    <?php else : ?>
        <p class="disco-page__empty-message">Il n'y a pas encore d'album.</p>
    <?php endif; ?>
</main>
<?php get_footer() ?>