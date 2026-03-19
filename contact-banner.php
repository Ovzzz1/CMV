<!-- BANDEAU CONTACT -->
<section class="contact-banner">
    <div class="contact-banner-inner">
        <div class="contact-banner-text">
            <span class="tag-small" style="color: var(--color-primary);">CONTACTEZ-NOUS</span>
            <h2>Une question ? Un besoin d'article invité ?</h2>
            <p>Écrivez-nous directement via ce formulaire. Nous vous répondons sous 48h.</p>
        </div>
        <form class="contact-banner-form" action="<?php echo BASE_URL; ?>send-contact.php" method="POST">
            <div class="contact-fields">
                <div class="contact-field">
                    <label for="contact_email_<?php echo $contact_instance ?? '1'; ?>">Votre adresse e-mail</label>
                    <input type="email" id="contact_email_<?php echo $contact_instance ?? '1'; ?>" name="email" placeholder="nom@exemple.com" required>
                </div>
                <div class="contact-field">
                    <label for="contact_message_<?php echo $contact_instance ?? '1'; ?>">Votre message</label>
                    <textarea id="contact_message_<?php echo $contact_instance ?? '1'; ?>" name="message" rows="3" placeholder="Votre question, demande de partenariat, proposition d'article invité..." required></textarea>
                </div>
            </div>
            <!-- Honeypot anti-spam -->
            <div style="position:absolute;left:-9999px;" aria-hidden="true">
                <input type="text" name="website" tabindex="-1" autocomplete="off">
            </div>
            <button type="submit" class="contact-banner-btn">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                Envoyer le message
            </button>
        </form>
    </div>
</section>
