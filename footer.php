<?php
/**
 * footer.php
 * Reusable footer include for Expert Renov' blog.
 */
?>

    <footer>
        <div class="footer-grid">
            <div class="footer-col">
                <a href="<?php echo BASE_URL; ?>" class="footer-logo"><img src="<?php echo BASE_URL; ?>logo%20renov.png" alt="Logo Expert Renov'"></a>
                <p style="color: rgba(251, 227, 203, 0.7); margin-top: 1rem; max-width: 90%; line-height: 1.8;">
                    Expert Renov' est le blog de référence dédié aux particuliers souhaitant entreprendre des travaux, entretenir leur maison ou optimiser leurs investissements immobiliers. Nos conseils d'experts vous accompagnent à chaque étape de vos projets pour un habitat sublimé et durable.
                </p>
                <div style="margin-top: 1.5rem;">
                    <a href="mailto:expertise-renov@protonmail.com" style="color: var(--color-light); font-weight: 500; display: inline-flex; align-items: center; gap: 8px;">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                        expertise-renov@protonmail.com
                    </a>
                </div>
            </div>
            <div class="footer-col">
                <h3>Nos Univers</h3>
                <ul>
                    <li><a href="<?php echo BASE_URL; ?>immobilier">Immobilier</a></li>
                    <li><a href="<?php echo BASE_URL; ?>maison">Maison & Décoration</a></li>
                    <li><a href="<?php echo BASE_URL; ?>renovation">Rénovation Énergétique</a></li>
                    <li><a href="<?php echo BASE_URL; ?>travaux">Gros & Second Œuvre</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h3>Informations</h3>
                <ul>
                    <li><a href="<?php echo BASE_URL; ?>a-propos">À Propos de nous</a></li>
                    <li><a href="<?php echo BASE_URL; ?>philippe">Notre équipe : Philippe</a></li>
                    <li><a href="<?php echo BASE_URL; ?>contact">Contactez l'équipe</a></li>
                    <li><a href="<?php echo BASE_URL; ?>mentions-legales">Mentions Légales</a></li>
                    <li><a href="<?php echo BASE_URL; ?>politique-confidentialite">Politique de Confidentialité</a></li>
                </ul>
            </div>
        </div>
        <div class="copyright">
            &copy; <?php echo date('Y'); ?> Expert Renov' - L'expertise, l'immobilier, la maison et vos travaux.
        </div>
    </footer>
</body>
</html>
