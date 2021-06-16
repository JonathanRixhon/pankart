<?php
?>
<form action="<?php the_permalink(23); ?>" method="post" class="contact-form <?= count($errors) ? "contact-form_error" : "" ?> form-js">
    <h3 class="contact-form__title">Nous contacter</h3>
    <label for="name" class="cf-name contact-form__name-label">Nom</label>
    <input type="text" name="contact-name" id="name" class="cf-name contact-form__name-input" value="<?= $_POST["contact-name"] ?>">
    <?php if ($errors['name']) : ?>
        <p class="contact-form__error-msg contact-form__error-msg_name">
            <?= $errors['name']; ?>
        </p>
    <?php endif; ?>

    <label for="firstname" class="cf-firstname contact-form__firstname-label">Prénom</label>
    <input type="text" name="contact-firstname" id="firstname" class="cf-firstname contact-form__firstname-input" value="<?= $_POST['contact-firstname'] ?>">
    <?php if ($errors['firstname']) : ?>
        <p class="contact-form__error-msg contact-form__error-msg_firstname">
            <?= $errors['firstname']; ?>
        </p>
    <?php endif; ?>

    <select name="contact-obj" id="obj" class="cf-obj contact-form__obj-select">
        <option value="">Sélectionnez une option</option>
        <option value="suggestion">Réserver une date</option>
        <option value="mp">Message pivé</option>
        <option value="other">Autre</option>
    </select>
    <?php if ($errors['obj']) : ?>
        <p class="contact-form__error-msg contact-form__error-msg_obj">
            <?= $errors['obj']; ?>
        </p>
    <?php endif; ?>

    <label for="email" class="cf-mail contact-form__email-label">Adresse mail</label>
    <input type="email" name="contact-email" id="email" class="cf-mail contact-form__email-input" value="<?= $_POST["contact-email"] ?>">
    <?php if ($errors['email']) : ?>
        <p class="contact-form__error-msg contact-form__error-msg_email">
            <?= $errors['email']; ?>
        </p>
    <?php endif; ?>

    <label for="message" class="cf-message contact-form__message-label">Message</label>
    <textarea type="text" name="contact-message" id="message" class="cf-message contact-form__message-input" value="<?= $_POST["contact-message"] ?>"></textarea>
    <?php if ($errors['message']) : ?>
        <p class="contact-form__error-msg contact-form__error-msg_message">
            <?= $errors['message']; ?>
        </p>
    <?php endif; ?>

    <button class="cf-send contact-form__send">Envoyer</button>
</form>