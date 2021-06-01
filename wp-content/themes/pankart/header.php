<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= is_front_page() ? bloginfo('description') : bloginfo('description') . wp_title("•", false); ?></title>
    <link rel="stylesheet" href="<?= pk_asset("css/theme.css") ?>">

    <?php wp_head(); ?>
</head>
<header>
    <h1>Pankart</h1>
    <nav>
        <ul>
            <li><a href="#">Liens dans le site</a></li>
            <li><a href="#">Liens dans le site</a></li>
            <li><a href="#">Liens dans le site</a></li>
        </ul>
    </nav>
</header>