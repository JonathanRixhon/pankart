<?php
date_default_timezone_set('Europe/Brussels');
define('CURRENT_DATE', date('Ymd', time()));
/* *****
 * trier les liens d'achats 
 * *****/
function pk_sort_links($fields, $extention = '')
{
    $links = [];
    foreach ($fields as $name => $value) {

        if (preg_match('/' . $extention . '-link$/', $name) && $value !== "") {
            if ($value['title'] === "") {
                $name = explode('-', $name)[0];
                $value['class'] = $name;
                $name = explode('_', $name);
                foreach ($name as $word) {
                    $value['title'] .= ucfirst($word) . ' ';
                }
                $value['title'] = rtrim($value['title']);
                unset($value['target']);
            }
            $links[] = $value;
        }
    }
    return $links;
}


/* *****
 * menu
 * *****/
function pk_menu($location)
{
    //1. Récupérer l'objet du menu
    $locations = get_nav_menu_locations();
    $menu = $locations[$location];
    //2. Récupérer les liens
    $links = wp_get_nav_menu_items($menu);
    //3. Formater les liens pour qu'ils soient utilisables
    $links = array_map(function ($result) {
        global $post;

        $link = new \stdClass();
        //formater l'objet $link
        $link->url = $result->url;
        $link->label = $result->title;
        $link->modifiers = [];

        // Page courante ?
        if (intval($result->object_id) === intval($post->ID)) {
            $link->modifiers[] = 'current';
        }

        return $link;
    }, $links);
    //4. retourner l'array
    return $links;
}
add_action('init', 'pk_custom_nav_menus');
function pk_custom_nav_menus()
{
    register_nav_menus([
        'main' => 'Navigation principale',
        'about' => 'À propos',
        'social_media' => 'Réseaux sociaux dans le pied de page',

    ]);
}

/* *****
 * Return a menu structure for display
 * *****/
function pk_bem($base, $modifiers = [])
{
    $classes = array_map(function ($modifier) use ($base) {
        return $base . '_' . $modifier;
    }, $modifiers);
    return implode(' ', $classes);
}

/* *****
 * link to public path
 * *****/

function pk_asset($path)
{
    return rtrim(get_template_directory_uri(), '/') . '/public/' . ltrim($path, '/');
}

/* *****
 * Disable the Wordpress Gutenberg Editor
 * *****/

add_filter("use_block_editor_for_post_type", "disable_gutenberg_editor");
function disable_gutenberg_editor()
{
    return false;
}

/* *****
 * Create custom post type
 * *****/

add_action('init', 'pk_custom_post_type');
function pk_custom_post_type()
{
    /*  Actus */
    register_post_type('news', [
        'label' => 'Actualités',
        'labels' => [
            'singular_name' => 'Actualité',
            'add_new_item' => 'Ajouter une actualité',
            'add_new' => 'Ajouter une actualité',
        ],
        'description' => 'Toutes les actualités publiées jusqu’à maintenant.',
        'public' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-welcome-widgets-menus',
        'supports' => ['title', 'editor', 'thumbnail'],
    ]);
    /*  Agenda */
    register_post_type('date', [
        'label' => 'Dates',
        'labels' => [
            'singular_name' => 'Date',
            'add_new_item' => 'Ajouter une date',
            'add_new' => 'Ajouter une dates',
        ],
        'description' => 'Toutes les dates existantes.',
        'public' => true,
        'menu_position' => 6,
        'menu_icon' => 'dashicons-calendar-alt',
        'supports' => ['title', 'editor', 'thumbnail'],
    ]);

    /* Album */
    register_post_type('album', [
        'label' => 'Album',
        'labels' => [
            'singular_name' => 'Album',
            'add_new_item' => 'Ajouter une date',
            'add_new' => 'Ajouter un album',
        ],
        'description' => 'Tout les albums existant.',
        'public' => true,
        'menu_position' => 7,
        'menu_icon' => 'dashicons-album',
        'supports' => ['title', 'thumbnail'],
    ]);
    /* Song */
    register_post_type('song', [
        'label' => 'Chanson',
        'labels' => [
            'singular_name' => 'Chanson',
            'add_new_item' => 'Ajouter une date',
            'add_new' => 'Ajouter une chanson',
        ],
        'description' => 'Toutes les chansons existantes.',
        'public' => true,
        'menu_position' => 8,
        'menu_icon' => 'dashicons-format-audio',
        'supports' => ['title', 'thumbnail'],
    ]);
    /* COUP DE GUEULE */
    register_post_type('cdg', [
        'label' => 'Coup de …',
        'labels' => [
            'singular_name' => 'Coup de …',
            'add_new_item' => 'Ajouter coup de …',
            'add_new' => 'Ajouter coup de …',
        ],
        'description' => 'Tous les coups de…',
        'public' => true,
        'menu_position' => 8,
        'menu_icon' => 'dashicons-format-chat',
        'supports' => ['title', 'editor', 'thumbnail'],
    ]);

    /* COUP DE GUEULE */
    register_post_type('members', [
        'label' => 'Membres',
        'labels' => [
            'singular_name' => 'Membre',
            'add_new_item' => 'Ajouter un membre',
            'add_new' => 'Ajouter membre',
        ],
        'description' => 'Tous les membres',
        'public' => true,
        'menu_position' => 9,
        'menu_icon' => 'dashicons-admin-users',
        'supports' => ['title', 'thumbnail'],
    ]);
}

/* *****
* Delete intermediate img sizes
* *****/
function remove_default_image_sizes($sizes)
{
    unset($sizes['large']); // Added to remove 1024
    unset($sizes['thumbnail']);
    unset($sizes['medium']);
    unset($sizes['medium_large']);
    unset($sizes['1536x1536']);
    unset($sizes['2048x2048']);
    return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'remove_default_image_sizes');

/* *****
* Add custom img sizes
* *****/
add_action('after_setup_theme', 'pk_image_sizes');
function pk_image_sizes()
{
    //news-thumbnais
    add_image_size('news-thumbnail', 754, 445, true);
    add_image_size('news-thumbnail-large', 560, 270, true);
    //album cover
    add_image_size('album-cover', 270, 270, true);
    //news img
    add_image_size('new-img', 270, 270, true);
    //news img
    add_image_size('home-img', 720, 850, true);
    add_image_size('home-img-large', 1440, 1700, true);
}
/* *****
* Enable thumbnails support
* *****/
add_action("after_setup_theme", "pk_add_theme_supports");
function pk_add_theme_supports()
{
    add_theme_support('post-thumbnails', ['post', 'members']);
    add_theme_support('post-thumbnails', ['post', 'album']);
    add_theme_support('post-thumbnails', ['post', 'news']);
    add_theme_support('post-thumbnails', ['post', 'date']);
    add_theme_support('post-thumbnails', ['post', 'song']);
    add_theme_support('post-thumbnails', ['post', 'cdg']);
}


/* *****
* thumbnail srcset attr
* *****/
function pk_the_thumbnail_attributes($sizes = [], $currentPost = null)
{
    // 1. Récupérer le thumbnail pour le post courant dans the loop
    if (isset($currentPost)) {
        $thumbnail = get_post(get_post_thumbnail_id($currentPost));
    } else {
        $thumbnail = get_post(get_post_thumbnail_id());
    }
    $thumbnail_meta = get_post_meta($thumbnail->ID);
    $src = null;

    // 2. Récupérer les tailles d'image qui nous intéressent & formater les tailles pour qu'elles soient utilisables dans srcset
    $sizes = array_map(function ($size) use ($thumbnail, &$src) {
        $data = wp_get_attachment_image_src($thumbnail->ID, $size);

        if (is_null($src)) {
            $src = $data[0];
        }

        return $data[0] . ' ' . $data[1] . 'w';
    }, $sizes);

    // 4. Formater les attributs
    $srcset = implode(', ', $sizes);
    $alt = $thumbnail_meta['_wp_attachment_image_alt'][0] ?? null;

    // 5. Retourner les attributs générés
    return 'src="' . $src . '" srcset="' . $srcset . '" alt="' . $alt . '"';
}
function pk_news_img_attributes($sizes = [], $img)
{
    // 1. Récupérer le thumbnail pour le post courant dans the loop
    $src = $img['url'];
    $alt = $img['alt'];
    $srcset = $img['size'][$sizes[0]];
    // 2. Récupérer les tailles d'image qui nous intéressent & formater les tailles pour qu'elles soient utilisables dans srcset
    foreach ($sizes as $size) {
        $srcset[] = $img['sizes'][$size] . " " . $img['sizes'][$size . "-width"] . "w";
    }
    return 'src="' . $src . '" srcset="' . implode(', ', $srcset) . '" alt="' . $alt . '"';
}

function pk_create_image_array()
{
    $nbr = 4;
    $imageNames = [];
    for ($i = 1; $i <= $nbr; $i++) {
        if (get_field('image' . $i)) {
            $imageNames[] = 'image' . $i;
        };
    }
    return $imageNames;
}
function pk_antecedent()
{
    $data = get_fields();
    $content = [];
    foreach ($data as $key => $value) {
        if (preg_match('/^prev-/', $key)) {
            $value = explode(':', $value);
            $value["style"] = trim($value[0]);
            $bands = explode(',', $value[1]);
            foreach ($bands as $band => $name) {
                $name = trim($name);
                $value['bands'][] = $name;
            }
            array_splice($value, 0, 2);
            $content[] = $value;
        }
    }
    return $content;
}
