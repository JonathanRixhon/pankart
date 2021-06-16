<?php /* Template Name: Biographie groupe */
$members = new WP_Query([
    "post_type" => "members",
    'orderby' => 'menu_order',
]);
if (count(pk_antecedent())) {
    $antecedents = pk_antecedent();
}
$imgAbout = [get_field('img-about-1'), get_field('img-about-2')];

$errors = [];
$msg = [
    'empty' => 'Veuillez remplir ce champ.',
];

$data = $_POST;
if (isset($_POST) && count($error)) {
    if ($_POST['contact-name'] === '') {
        $errors['name'] = $msg['empty'];
    }
    if ($_POST['contact-firstname'] === '') {
        $errors['firstname'] = $msg['empty'];
    }
    if ($_POST['contact-email'] === '') {
        $errors['email'] = $msg['empty'];
    }
    if ($_POST['contact-obj'] === '') {
        $errors['obj'] = $msg['empty'];
    }
    if ($_POST['contact-message'] === '') {
        $errors['message'] = $msg['empty'];
    }

    if (!count($errors) && $_SERVER['REQUEST_METHOD'] === "POST") {
        $formatedMessage = '
        Message de ' . $data["contact-firstname"] . ' ' . $data["contact-name"] . '
        ' . 'Adresse mail: ' . $data['contact-email'] . '
        Message :
        ' . $data['contact-message'];
        if (wp_mail("reception@jonathanrixhon.me", $data['contact-obj'], $formatedMessage)) {
            header('Location: ' . get_home_url());
            exit();
        } else {
            $errors['crash'] = $msg['crash'];
        }
    }
}
?>
<?php get_header() ?>
<main class="bio-grp-page">
    <section class="bio-content">

        <hgroup class="grp-title-group">
            <h2 class="grp-title-group__title grp-title-group__title_title "><?= get_field("title") ?></h2>
            <h3 class="grp-title-group__title grp-title-group__title_sub-title "><?= get_field("sub-title") ?></h3>
        </hgroup>
        <?php if (count($imgAbout)) : ?>
            <figure class="img-about">
                <?php foreach ($imgAbout as  $key => $img) : ?>
                    <img class="img-about__img img-about__img_<?= $key ?>" <?= pk_news_img_attributes(['new-img'], $img) ?>>
                <?php endforeach; ?>
            </figure>
        <?php endif; ?>
        <section class="bio-txt">
            <h4 class="sro">Texte expliquatif</h4>
            <?= get_field('first-p') ?>
            <?php if (isset($antecedents)) : ?>
                <h4 class="bio-txt__ante-title">Antécédents</h4>
                <ul class="ante">
                    <?php foreach (pk_antecedent() as $antecedent) : ?>
                        <li class="ante__item">
                            <dl class="ante-def">
                                <dt class="ante-def__style"><?= $antecedent['style']; ?></dt>
                                <?php foreach ($antecedent['bands'] as $band) : ?>
                                    <dd class="ante-def__bands"><?= $band; ?></dd>
                                <?php endforeach; ?>
                            </dl>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <?= get_field('sec-p') ?>
            <img class="bio-txt__deco-img bio-txt__deco-img_first" <?= pk_news_img_attributes(['album-cover'], get_field('img-right')) ?>>
            <img class="bio-txt__deco-img bio-txt__deco-img_second" <?= pk_news_img_attributes(['album-cover'], get_field('img-left')) ?>>
        </section>
        <?php if ($members->have_posts()) : ?>
            <section class='members'>
                <h4 class='sro'>Les membres</h4>
                <?php while ($members->have_posts()) : $members->the_post(); ?>
                    <?php get_template_part('template-parts/member-part', null) ?>
                <?php endwhile; ?>
            </section>
        <?php endif; ?>
    </section>
    <section class="bio-social-media">
        <h2 class="bio-social-media__title">Retrouvez-nous sur les réseaux</h2>
        <a href="#" class="bio-social-media__link bio-social-media__link_instagram ">Instagram</a>
        <a href="#" class="bio-social-media__link bio-social-media__link_facebook ">Facebook</a>
    </section>
    <section class="contact-form-section" id="contact-form">
        <h2 class="contact-form-section__title sro">Contact</h2>
        <figure class="contact-form-section__img"><img class="contact-form-section__img__item" src="<?= pk_asset('/img/only_letters_logo.png') ?>" alt="img du logo du groupe"></figure>
        <?php get_template_part('template-parts/contact-form', null) ?>
    </section>
</main>
<?php get_footer() ?>