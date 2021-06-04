<?php
get_header();
$errors = [];
$msg = [
    'empty' => 'Veuillez remplir ce champ.',
];

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
    }
}

?>
<form action="<?php the_permalink(); ?>" method="post" class="contact-form <?= count($errors) ? "contact-form_error" : "" ?> form-js">
    <label for="name" class="contact-form__name-label">Nom</label>
    <input type="text" name="contact-name" id="name" class="contact-form__name-input" value="<?= $_POST["contact-name"] ?>">
    <?php if ($errors['name']) : ?>
        <p class="contact-form__error-msg contact-form__error-msg_name">
            <?= $errors['name']; ?>
        </p>
    <?php endif; ?>

    <label for="firstname" class="contact-form__firstname-label">Prénom</label>
    <input type="text" name="contact-firstname" id="firstname" class="contact-form__firstname-input" value="<?= $_POST['contact-firstname'] ?>">
    <?php if ($errors['firstname']) : ?>
        <p class="contact-form__error-msg contact-form__error-msg_firstname">
            <?= $errors['firstname']; ?>
        </p>
    <?php endif; ?>

    <label for="obj" class="contact-form__obj-label">Sélectionnez un objet</label>
    <select name="contact-obj" id="obj" class="contact-form__obj-select">
        <option value="">Sélectionnez une option</option>
        <option value="suggestion">Suggérer un thème</option>
        <option value="theme">Suggestion de thème</option>
        <option value="mp">Message pivé</option>
        <option value="presse">Presse</option>
        <option value="other">Autre</option>
    </select>
    <?php if ($errors['obj']) : ?>
        <p class="contact-form__error-msg contact-form__error-msg_obj">
            <?= $errors['obj']; ?>
        </p>
    <?php endif; ?>

    <label for="email" class="contact-form__email-label">Adresse mail</label>
    <input type="email" name="contact-email" id="email" class="contact-form__email-input" value="<?= $_POST["contact-email"] ?>">
    <?php if ($errors['email']) : ?>
        <p class="contact-form__error-msg contact-form__error-msg_email">
            <?= $errors['email']; ?>
        </p>
    <?php endif; ?>

    <label for="message" class="contact-form__message-label">Message</label>
    <textarea type="text" name="contact-message" id="message" class="contact-form__message-input" value="<?= $_POST["contact-message"] ?>"></textarea>
    <?php if ($errors['message']) : ?>
        <p class="contact-form__error-msg contact-form__error-msg_message">
            <?= $errors['message']; ?>
        </p>
    <?php endif; ?>

    <button class="contact-form__send">Envoyer</button>
</form>