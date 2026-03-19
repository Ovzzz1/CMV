<?php
/**
 * philippe.php
 * Profil auteur pour Philippe, artisan expert.
 */

require_once __DIR__ . '/functions.php';

$page_title = "Philippe | Artisan Expert Rénovation | Expert Renov'";
$page_description = "Découvrez le profil de Philippe, notre expert terrain. Plus de 20 ans d'expérience dans la rénovation. L'artisanat sans langue de bois.";

include __DIR__ . '/header.php';
?>

<section class="cat-hero" style="background-image: linear-gradient(rgba(62,46,31,0.8), rgba(62,46,31,0.8)), url('https://images.unsplash.com/photo-1504307651254-35680f356dfd?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80'); justify-content: center; text-align: center; min-height: 250px;">
    <div class="cat-hero-content">
        <h1>Notre Expert Bâtiment</h1>
        <p style="margin: 0 auto;">L'expérience du terrain au service de vos travaux.</p>
    </div>
</section>

<div class="about-section" style="padding-top: 4rem; padding-bottom: 4rem;">
    <div class="about-images" style="display: flex; justify-content: center; align-items: flex-start;">
        <img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe - Artisan RGE" class="img-main" style="border-radius: 50%; aspect-ratio: 1/1; width: 300px; height: 300px; object-fit: cover; border: 8px solid var(--color-light); padding: 10px; background: white;">
    </div>
    <div class="about-content">
        <h2 style="font-size: 2.5rem; margin-bottom: 0.5rem;">Philippe</h2>
        <span style="font-size: 1.2rem; color: var(--color-primary); font-weight: 600; display: block; margin-bottom: 1.5rem;">Artisan du Gros Œuvre & Second Œuvre</span>
        <p>
            Avec plus de <strong>20 ans d'expérience</strong> sur le terrain, Philippe est la caution technique de cemarenov.fr. Titulaire d'un BTS Bâtiment, il a commencé sur les chantiers avant de se mettre à son compte. Aujourd'hui, il intervient principalement en rénovation de maisons individuelles et d'appartements : de l'isolation à la plomberie, en passant par la maçonnerie.
        </p>
        <p>
            Ce qui le distingue ? <strong>L'amour du travail bien fait et le respect des normes.</strong> Les DTU (Documents Techniques Unifiés) n'ont aucun secret pour lui. Pour Philippe, un joint mal posé ou une pente d'évacuation mal calculée n'est pas "un détail", mais une bombe à retardement.
        </p>
        
        <h3 style="margin-top: 2rem; margin-bottom: 1rem;">Ses engagements :</h3>
        <ul class="checklist">
            <li>
                <div class="checklist-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg></div>
                La précision avant tout (chiffres exacts, normes respectées)
            </li>
            <li>
                <div class="checklist-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg></div>
                Honnêteté : si c'est compliqué ou risqué, il le dit
            </li>
            <li>
                <div class="checklist-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg></div>
                Pédagogie : pas de jargon technique sans explication claire
            </li>
            <li>
                <div class="checklist-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg></div>
                Aucune langue de bois sur les arnaques de la rénovation
            </li>
        </ul>
    </div>
</div>

<div class="category-band" style="background-color: var(--color-white); padding-top: 4rem;">
    <div class="band-header" style="justify-content: center; text-align: center; border-bottom: none;">
        <h2 style="font-size: 2rem;">"La rénovation, c'est pas de la magie. C'est du bon sens et de la rigueur."</h2>
    </div>
    <div style="text-align: center; max-width: 800px; margin: 0 auto; padding-bottom: 4rem;">
        <p>Père de deux enfants, Philippe met un point d'honneur à rendre le bâtiment compréhensible par tous. Ses guides pratiques sont pensés pour les propriétaires qui veulent arrêter de se faire avoir et comprendre ce qu'ils signent sur un devis.</p>
    </div>
</div>

<?php include __DIR__ . '/footer.php'; ?>
