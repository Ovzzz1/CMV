<?php
/**
 * comment-faire-un-toit-en-tuile.php
 * Article : Comment faire un toit en tuile : guide de pose étape par étape (2026)
 * Site : Expert Renov' (cemarenov.fr)
 * Date : 2026-03-30
 */

$article_meta = [
    'title'        => 'Comment faire un toit en tuile : guide de pose étape par étape (2026)',
    'category'     => 'renovation',
    'slug'         => 'comment-faire-un-toit-en-tuile',
    'image'        => 'https://www.cemarenov.fr/image/comment-faire-un-toit-en-tuile-1.webp',
    'excerpt'      => 'Poser une toiture en tuile de A à Z : charpente, écran, liteaux, fixation DTU, faîtage. Le guide complet d\'un artisan RGE, étape par étape.',
    'date'         => '2026-03-30',
    'reading_time' => 9,
];

// ── Bloc logique CMS, NE JAMAIS MODIFIER ─────────────────────────────────
require_once dirname(__DIR__) . '/functions.php';

$page_title       = $article_meta['title'];
$page_description = $article_meta['excerpt'];

$current_cat  = $article_meta['category'];
$current_url  = BASE_URL . str_replace('.php', '', basename($_SERVER['SCRIPT_FILENAME']));
$category     = get_category($current_cat);
$other_cats   = get_other_categories($current_cat);
$cat_articles = array_values(array_filter(get_category_articles($current_cat, 11), fn($a) => ($a['url'] ?? '') !== $current_url));
$cat_articles = array_slice($cat_articles, 0, 10);
$latest_articles = array_values(array_filter(get_latest_articles(11), fn($a) => ($a['url'] ?? '') !== $current_url));
$latest_articles = array_slice($latest_articles, 0, 10);

$current_title_words = array_map('mb_strtolower', explode(' ', $article_meta['title']));
$similar_articles    = [];
foreach ($cat_articles as $art) {
    if (!isset($art['title'])) continue;
    $title_words        = array_map('mb_strtolower', explode(' ', $art['title']));
    $common             = count(array_intersect($current_title_words, $title_words));
    $similar_articles[] = array_merge($art, ['score' => $common]);
}
usort($similar_articles, function ($a, $b) { return $b['score'] - $a['score']; });
$similar_articles = array_slice($similar_articles, 0, 3);
// ── Fin bloc logique CMS ───────────────────────────────────────────────────

include dirname(__DIR__) . '/header.php';
?>

<article>

    <!-- ═══════════════ HERO ═══════════════ -->
    <section class="article-hero" style="background-image: url('<?php echo $article_meta['image']; ?>');">
        <div class="article-hero-content">

            <nav class="breadcrumb">
                <a href="<?php echo BASE_URL; ?>">Accueil</a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                <a href="<?php echo BASE_URL . $current_cat; ?>"><?php echo htmlspecialchars($category['name']); ?></a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                <span>Faire un toit en tuile</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Toiture</span>
                <span class="article-tag">Tuile</span>
                <span class="article-tag">Couverture</span>
                <span class="article-tag">Pose</span>
            </div>

            <h1>Comment faire un toit en tuile :<br>
                <span class="h1-accent">guide de pose étape par étape (2026)</span>
            </h1>

            <div class="article-meta-header" style="flex-wrap: wrap; gap: 15px;">
                <a href="<?php echo BASE_URL; ?>philippe" class="author-badge-top">
                    <img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe">
                    <div class="author-badge-text">
                        Par <strong>Philippe</strong>
                        <span>Artisan RGE</span>
                    </div>
                </a>
                <div class="meta-item">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                    Mis à jour le <?php echo format_date_fr($article_meta['date']); ?>
                </div>
                <div class="meta-item">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    Lecture : <?php echo $article_meta['reading_time']; ?> min
                </div>
            </div>

        </div>
    </section>

    <!-- ═══════════════ 3 COLONNES ═══════════════ -->
    <div class="article-layout">

        <!-- ── SIDEBAR GAUCHE ── -->
        <aside class="sidebar-left">
            <div class="sidebar-sticky">
                <h3 class="sidebar-title">Nos Univers</h3>
                <?php foreach ($other_cats as $slug => $cat): ?>
                    <a href="<?php echo BASE_URL . $slug; ?>" class="sidebar-cat-card">
                        <img src="<?php echo $cat['image']; ?>" alt="<?php echo htmlspecialchars($cat['name']); ?>">
                        <span class="sidebar-cat-name"><?php echo htmlspecialchars($cat['name']); ?></span>
                    </a>
                <?php endforeach; ?>
            </div>
        </aside>

        <!-- ── CONTENU CENTRAL ── -->
        <div class="article-container">

            <p class="article-intro">
                Poser une toiture en tuile ne s'improvise pas. Pureau mal calculé, fixations absentes, écran bâclé : chaque erreur se paie en infiltration. Ce guide suit le DTU 40.21 et détaille chaque étape dans l'ordre, <strong>du premier chevron à la dernière faîtière</strong>.
            </p>

            <div class="article-content">

                <!-- TL;DR -->
                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                        L'essentiel à retenir
                    </div>
                    <ul>
                        <li><strong>Ordre :</strong> charpente → écran → contre-lattes → liteaux → égout → tuiles → fixations → points singuliers → faîtières.</li>
                        <li><strong>Pente min. :</strong> 17° pour une tuile à emboîtement, 25-30° pour une tuile canal, en dessous, l'étanchéité n'est plus garantie.</li>
                        <li><strong>Fixation :</strong> 1 tuile sur 4 minimum en zone standard, toutes en zone exposée, inox obligatoire, jamais galvanisé.</li>
                        <li><strong>Pureau :</strong> valeur fixée par le fabricant dans son guide de pose, ne jamais estimer à l'œil.</li>
                    </ul>
                </div>

                <!-- SOMMAIRE -->
                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li>Ce qu'il faut savoir avant de commencer</li>
                        <li>Étape 1, Inspecter et préparer la charpente</li>
                        <li>Étape 2, Poser l'écran de sous-toiture</li>
                        <li>Étape 3, Contre-lattes et latte de ventilation basse</li>
                        <li>Étape 4, Calculer le pureau et poser les liteaux</li>
                        <li>Étape 5, Préparer l'égout et poser le rang de départ</li>
                        <li>Étape 6, Poser les tuiles courantes rangée par rangée</li>
                        <li>Étape 7, Couper les tuiles aux obstacles et en rive</li>
                        <li>Étape 8, Fixer les tuiles selon la zone de vent</li>
                        <li>Étape 9, Traiter les points singuliers</li>
                        <li>Étape 10, Poser les faîtières et fermer le faîtage</li>
                        <li>Combien coûte une toiture en tuile ?</li>
                        <li>Quelle est la durée de vie d'une toiture en tuile ?</li>
                        <li>FAQ, Questions fréquentes</li>
                    </ul>
                </div>

                <!-- ═══ AVANT DE COMMENCER ═══ -->
                <h2 id="avant-de-commencer">Ce qu'il faut savoir avant de commencer</h2>

                <div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; margin-bottom: 2rem; border-radius: 8px;">
                    <iframe
                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
                        src="https://www.youtube.com/embed/wvkE7EtPQcw"
                        title="Pose toiture en tuile de A à Z"
                        frameborder="0"
                        allowfullscreen
                        loading="lazy">
                    </iframe>
                </div>

                <h3 id="type-tuile-pente">Quel type de tuile pour quelle pente ?</h3>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr><th>Type</th><th>Pente min.</th><th>DTU</th><th>Poids</th></tr>
                        </thead>
                        <tbody>
                            <tr><td><strong>Emboîtement à relief</strong></td><td>17°</td><td>DTU 40.21</td><td>40-50 kg/m²</td></tr>
                            <tr><td><strong>Canal (romane, provençale)</strong></td><td>25-30°</td><td>DTU 40.22</td><td>35-45 kg/m²</td></tr>
                            <tr><td><strong>Plate terre cuite</strong></td><td>45°</td><td>DTU 40.211</td><td>50-60 kg/m²</td></tr>
                            <tr><td><strong>Plate béton</strong></td><td>35-45°</td><td>DTU 40.21</td><td>45-55 kg/m²</td></tr>
                        </tbody>
                    </table>
                </div>

                <div style="background-color: var(--color-light); border-left: 4px solid var(--color-primary); padding: 1.5rem; margin-bottom: 2rem; border-radius: 0 8px 8px 0;">
                    <strong>En clair :</strong> en rénovation, mesurez la pente avant d'acheter vos tuiles.
                </div>

                <h3 id="outils-materiaux">Outils et matériaux nécessaires</h3>

                <img src="<?php echo BASE_URL; ?>image/comment-faire-un-toit-en-tuile-2.webp" alt="Outils nécessaires pour poser une toiture en tuile : scie à disque, cordeau, niveau, visseuse, crochets inox" loading="lazy" style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr><th>Outil / matériau</th><th>Usage</th></tr>
                        </thead>
                        <tbody>
                            <tr><td><strong>Scie à disque + lame diamant</strong></td><td>Couper les tuiles</td></tr>
                            <tr><td><strong>Cordeau + niveau</strong></td><td>Aligner rangs et liteaux</td></tr>
                            <tr><td><strong>Visseuse + vis/crochets inox</strong></td><td>Fixation, jamais acier galvanisé</td></tr>
                            <tr><td><strong>Échafaudage + ligne de vie</strong></td><td>Sécurité, obligatoire</td></tr>
                            <tr><td><strong>Écran de sous-toiture</strong></td><td>Membrane respirante</td></tr>
                            <tr><td><strong>Contre-lattes 27×40 mm</strong></td><td>Ventilation sous couverture</td></tr>
                            <tr><td><strong>Liteaux bois 27×40 mm min.</strong></td><td>Support des tuiles</td></tr>
                            <tr><td><strong>Closoir de faîtage</strong></td><td>Fermeture ventilée du faîte</td></tr>
                            <tr><td><strong>Tuiles faîtières + de rive</strong></td><td>Points singuliers</td></tr>
                        </tbody>
                    </table>
                </div>

                <p>Si vous intervenez sur une couverture existante, consultez notre guide sur le <a href="<?php echo BASE_URL; ?>remaniement-de-couverture" style="text-decoration: underline;"><strong>remaniement de couverture</strong></a> pour savoir ce qui peut être conservé.</p>

                <!-- ═══ ÉTAPE 1 ═══ -->
                <h2 id="etape-1">Étape 1, Inspecter et préparer la charpente</h2>

                <img src="<?php echo BASE_URL; ?>image/comment-faire-un-toit-en-tuile-3.webp" alt="Artisan inspectant les chevrons d'une charpente avant pose de tuiles" loading="lazy" style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <p>Frappez chaque chevron avec un marteau. Son plein = bon. Son creux = remplacement.</p>

                <p>Tendez un cordeau sur les chevrons dans le sens de la pente. Flèche &gt; 5 mm sur 2 m : à corriger avant de continuer.</p>

                <p>Section minimale pour tuile terre cuite (portée 2 m, zone neige normale) : <strong>60×120 mm en sapin</strong>. Doute sur le dimensionnement → faites valider par un charpentier.</p>

                <blockquote class="article-blockquote">
                    <p>"Charpente trop faible sous des tuiles lourdes : panne sablière déformée sur 4 mètres. Une semaine de reprise avant même de parler des tuiles."</p>
                </blockquote>

                <!-- ═══ ÉTAPE 2 ═══ -->
                <h2 id="etape-2">Étape 2, Poser l'écran de sous-toiture</h2>

                <img src="<?php echo BASE_URL; ?>image/comment-faire-un-toit-en-tuile-4.webp" alt="Artisan déroulant un lé d'écran de sous-toiture sur les chevrons" loading="lazy" style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <p>Déroulez les lés <strong>horizontalement</strong>, depuis l'égout vers le faîte. Chevauchement entre lés : <strong>150 mm minimum</strong>.</p>

                <p>Au faîte : repliez l'écran d'un versant sur l'autre, collez au Multi-Tape. Jonctions latérales sur chevron : <strong>100 mm de chevauchement minimum</strong>.</p>

                <p>Ne vissez jamais les contre-lattes à travers la bande d'égouttage de l'écran.</p>

                <div style="background-color: var(--color-light); border-left: 4px solid var(--color-primary); padding: 1.5rem; margin-bottom: 2rem; border-radius: 0 8px 8px 0;">
                    <strong>Tuile canal :</strong> écran encore plus indispensable, étanchéité moindre que la tuile à emboîtement, surtout en régions exposées au vent. L'écran joue également un rôle clé si vous envisagez une <a href="<?php echo BASE_URL; ?>isolation-sous-rampants-toiture" style="text-decoration: underline;"><strong>isolation sous rampants</strong></a>, les deux travaux se coordonnent idéalement en même temps.
                </div>

                <!-- ═══ ÉTAPE 3 ═══ -->
                <h2 id="etape-3">Étape 3, Fixer les contre-lattes et la latte de ventilation basse</h2>

                <img src="<?php echo BASE_URL; ?>image/comment-faire-un-toit-en-tuile-5.webp" alt="Contre-lattes vissées sur chevrons par-dessus l'écran de sous-toiture" loading="lazy" style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <p>Vissez les contre-lattes sur les chevrons, dans le sens de la pente. Section : <strong>27×40 mm</strong> minimum. Lame d'air créée : <strong>40 mm</strong> minimum (DTU 40.21).</p>

                <p>En bas du versant, posez la <strong>latte de ventilation basse</strong> perpendiculairement. Fixez-la au Multi-Fix, attachez à la seconde latte avec un fil inox.</p>

                <p>Cette lame d'air évacue condensation et humidité. Sans elle : la charpente travaille dans l'humidité en permanence.</p>

                <!-- ═══ ÉTAPE 4 ═══ -->
                <h2 id="etape-4">Étape 4, Calculer le pureau et poser les liteaux</h2>

                <img src="<?php echo BASE_URL; ?>image/comment-faire-un-toit-en-tuile-6.webp" alt="Artisan traçant au cordeau la position des liteaux sur les contre-lattes" loading="lazy" style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; margin-bottom: 2rem; border-radius: 8px;">
                    <iframe
                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
                        src="https://www.youtube.com/embed/X8AqZTjAjWk"
                        title="Calcul du pureau et pose des liteaux"
                        frameborder="0"
                        allowfullscreen
                        loading="lazy">
                    </iframe>
                </div>

                <p>Le pureau = écartement entre deux liteaux consécutifs. <strong>Valeur fixée par le fabricant</strong> dans son guide de pose, ne jamais estimer.</p>

                <ol class="custom-list">
                    <li>Calculer le nombre de rangs (hauteur versant ÷ pureau)</li>
                    <li>Tracer chaque liteau au cordeau</li>
                    <li>Vérifier l'horizontalité au niveau avant de visser</li>
                    <li>Fixer dans les contre-lattes et les chevrons en dessous</li>
                </ol>

                <p>Section liteaux : <strong>27×40 mm minimum</strong>. Vérifiez selon zone de neige.</p>

                <div style="background-color: var(--color-light); border-left: 4px solid var(--color-primary); padding: 1.5rem; margin-bottom: 2rem; border-radius: 0 8px 8px 0;">
                    <strong>Tuile canal :</strong> pureau variable selon la pente, plus elle est faible, plus le chevauchement augmente. Voir DTU 40.22.<br>
                    <strong>Tuile plate :</strong> pureau court, recouvrement 2 à 3 épaisseurs. Voir DTU 40.211.
                </div>

                <!-- ═══ ÉTAPE 5 ═══ -->
                <h2 id="etape-5">Étape 5, Préparer l'égout et poser le rang de départ</h2>

                <img src="<?php echo BASE_URL; ?>image/comment-faire-un-toit-en-tuile-7.webp" alt="Premier rang de tuiles posé en bas du versant avec planche biseautée d'égout" loading="lazy" style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <p>Vissez une <strong>planche biseautée</strong> (cale d'égout) sur les chevrons au-dessus du premier liteau. Elle relève les tuiles du premier rang dans le même plan que le reste du versant.</p>

                <p>Tendez un cordeau horizontal bien tendu le long de l'égout. Partez du coin bas droit ou gauche selon l'emboîtement du modèle (voir guide fabricant).</p>

                <p>Vérifiez l'alignement au niveau tous les 4-5 tuiles. Une tuile ¾ peut être nécessaire en départ selon le modèle.</p>

                <p>L'égout, c'est aussi là que se raccordent les <a href="<?php echo BASE_URL; ?>gouttieres" style="text-decoration: underline;"><strong>gouttières</strong></a>, prévoyez le positionnement des crochets avant de poser le premier rang.</p>

                <!-- ═══ ÉTAPE 6 ═══ -->
                <h2 id="etape-6">Étape 6, Poser les tuiles courantes rangée par rangée</h2>

                <img src="<?php echo BASE_URL; ?>image/comment-faire-un-toit-en-tuile-8.webp" alt="Artisan posant les tuiles courantes de bas en haut sur le versant" loading="lazy" style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <p>Montez depuis l'égout vers le faîte. Axe de chaque tuile parallèle à la ligne de plus grande pente.</p>

                <p>Tendez un cordeau vertical tous les 5-6 rangs pour contrôler que les colonnes ne dérivent pas.</p>

                <div style="background-color: var(--color-light); border-left: 4px solid var(--color-primary); padding: 1.5rem; margin-bottom: 2rem; border-radius: 0 8px 8px 0;">
                    <strong>Tuile canal :</strong> deux pièces par position. Sous-tuile concave vers le haut d'abord, puis tuile de couverture convexe par-dessus.<br>
                    <strong>Tuile plate :</strong> pas d'emboîtement latéral. Pose en rangs décalés, alignement au cordeau à chaque rang.
                </div>

                <p>Pour intervenir en sécurité sur le versant à mesure que vous montez, consultez notre guide <a href="<?php echo BASE_URL; ?>comment-monter-toit-tuile" style="text-decoration: underline;"><strong>comment monter sur un toit en tuile</strong></a>.</p>

                <!-- ═══ ÉTAPE 7 ═══ -->
                <h2 id="etape-7">Étape 7, Couper les tuiles aux obstacles et en rive</h2>

                <img src="<?php echo BASE_URL; ?>image/comment-faire-un-toit-en-tuile-9.webp" alt="Artisan coupant une tuile à la scie à disque avec lame diamant, lunettes de protection portées" loading="lazy" style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <p>Scie à disque + lame diamant. Lunettes de protection obligatoires. Tracez le trait de coupe au crayon avant de couper.</p>

                <p>Autour des obstacles (cheminée, sortie VMC) : solins métalliques côté montant, glissés sous les tuiles côté aval. Manchon EPDM ou silicone pour sorties rondes. Pour la cheminée, l'étanchéité repose aussi sur un <a href="<?php echo BASE_URL; ?>abergement-de-cheminee" style="text-decoration: underline;"><strong>abergement de cheminée</strong></a> correctement intégré dans les rangs de tuiles.</p>

                <!-- ═══ ÉTAPE 8 ═══ -->
                <h2 id="etape-8">Étape 8, Fixer les tuiles selon la zone de vent</h2>

                <img src="<?php echo BASE_URL; ?>image/comment-faire-un-toit-en-tuile-10.webp" alt="Gros plan sur un crochet inox vissé sur liteau pour fixer une tuile" loading="lazy" style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <p>Trois modes de fixation : <strong>tenon sur liteau</strong> (maintien de base), <strong>crochet inox</strong> (zones standard à exposées), <strong>vis inox + rondelle</strong> (zones très exposées). Inox obligatoire, le galvanisé corrode sous les tuiles.</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr><th>Zone</th><th>Fréquence minimale</th></tr>
                        </thead>
                        <tbody>
                            <tr><td><strong>Faible (plaine abritée)</strong></td><td>1 tuile sur 4</td></tr>
                            <tr><td><strong>Normale</strong></td><td>1 tuile sur 3-4</td></tr>
                            <tr><td><strong>Forte (côtes, altitude)</strong></td><td>1 tuile sur 2</td></tr>
                            <tr><td><strong>Très exposée</strong></td><td>Toutes les tuiles</td></tr>
                        </tbody>
                    </table>
                </div>

                <p>Les 2-3 premiers rangs, les tuiles de rive et les faîtières : <strong>toujours toutes fixées</strong>, quelle que soit la zone.</p>

                <div style="background-color: var(--color-light); border-left: 4px solid var(--color-primary); padding: 1.5rem; margin-bottom: 2rem; border-radius: 0 8px 8px 0;">
                    <strong>Tuile canal :</strong> la sous-tuile se fixe directement au liteau par clouage ou vissage. La tuile de couverture est maintenue par forme + mortier au faîtage.
                </div>

                <!-- ═══ ÉTAPE 9 ═══ -->
                <h2 id="etape-9">Étape 9, Traiter les points singuliers</h2>

                <img src="<?php echo BASE_URL; ?>image/comment-faire-un-toit-en-tuile-11.webp" alt="Traitement des tuiles de rive et jonction versant mur pignon" loading="lazy" style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <ul class="custom-list">
                    <li><strong>Tuiles de rive :</strong> toutes fixées (vis inox + rondelle). Fixez l'écran en bord de toit avant de poser, puis contre-latte sous les lattes au niveau du mur pignon.</li>
                    <li><strong>Noues :</strong> zone la plus exposée aux infiltrations. Noue ouverte en zinc recommandée, feuille dans l'angle, tuiles coupées en biais des deux côtés.</li>
                    <li><strong>Arêtiers :</strong> tuiles d'arêtier spéciales à sec, ou traitement au mortier. Même principe que le faîtage.</li>
                    <li><strong>Pignons :</strong> solin de rive métallique ou tuile de rive spéciale. Pas d'espace ouvert, pas de mousse expansive.</li>
                </ul>

                <!-- ═══ ÉTAPE 10 ═══ -->
                <h2 id="etape-10">Étape 10, Poser les faîtières et fermer le faîtage</h2>

                <img src="<?php echo BASE_URL; ?>image/comment-faire-un-toit-en-tuile-12.webp" alt="Pose des faîtières sur le faîtage avec closoir de ventilation aluminium" loading="lazy" style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <p>Placez les supports de latte faîtière réglables à chaque extrémité. Tendez un cordeau de niveau. Réglez tous les supports à la même hauteur.</p>

                <ul class="custom-list">
                    <li><strong>Closoir mécanique (recommandé) :</strong> posez le closoir sur les tuiles de part et d'autre du faîte, fixez les faîtières par crochet ou vis à tête colorée. Ventilation garantie, pas de mortier à reprendre.</li>
                    <li><strong>Mortier (méthode traditionnelle) :</strong> scellement au mortier bâtard chaux-ciment. À inspecter tous les 10-15 ans, fissure avec les cycles gel-dégel. Notre guide sur le <a href="<?php echo BASE_URL; ?>faitage" style="text-decoration: underline;"><strong>faîtage</strong></a> détaille les points de vigilance.</li>
                </ul>

                <p>Commencez par la faîtière d'about (bout de faîtage côté pignon) après préperçage. En zone très exposée : combinez crochets et vis.</p>

                <!-- ═══ COÛT ═══ -->
                <h2 id="cout">Combien coûte une toiture en tuile ?</h2>

                <p>Fourniture + pose par un couvreur professionnel :</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr><th>Type</th><th>Prix indicatif/m²</th></tr>
                        </thead>
                        <tbody>
                            <tr><td><strong>Emboîtement béton</strong></td><td>80-120 €</td></tr>
                            <tr><td><strong>Emboîtement terre cuite</strong></td><td>100-180 €</td></tr>
                            <tr><td><strong>Canal terre cuite</strong></td><td>120-200 €</td></tr>
                            <tr><td><strong>Plate terre cuite</strong></td><td>150-250 €</td></tr>
                        </tbody>
                    </table>
                </div>

                <p>Fourchette basse : toit simple deux pans, peu d'obstacles. Fourchette haute : toit complexe, noues, lucarnes, plusieurs versants.</p>

                <!-- ═══ DURÉE DE VIE ═══ -->
                <h2 id="duree-vie">Quelle est la durée de vie d'une toiture en tuile ?</h2>

                <p>Tuile terre cuite sur charpente saine : <strong>50 à 100 ans</strong>. Garantie fabricant : généralement 30 ans.</p>

                <p>Ce qui vieillit avant les tuiles : liteaux bois (30-40 ans), closoirs (20-30 ans), mortier de faîtage (10-15 ans entre reprises).</p>

                <p>En rénovation : remplacez ces éléments même si les tuiles sont encore bonnes. Si la couverture est trop dégradée pour une réfection partielle, un <a href="<?php echo BASE_URL; ?>changement-de-couverture" style="text-decoration: underline;"><strong>changement de couverture</strong></a> complet sera plus rentable à long terme.</p>

                <!-- ═══ FAQ ═══ -->
                <h2 id="faq">FAQ, Questions fréquentes</h2>

                <h3>Quelle est la pente minimale pour un toit en tuile ?</h3>
                <p>17° pour une tuile à emboîtement, 25-30° pour une tuile canal, 45° pour une tuile plate. En dessous : étanchéité non garantie, DTU non respecté.</p>

                <h3>Faut-il obligatoirement un écran de sous-toiture ?</h3>
                <p>Sur une toiture neuve en 2026 : oui dans la quasi-totalité des cas (RE2020, DTU 40.21). En rénovation à l'identique : vérifier le DTU applicable.</p>

                <h3>Peut-on poser des tuiles soi-même ?</h3>
                <p>Remplacement ponctuel de tuiles : oui, avec équipement de sécurité adapté (échafaudage, pas une échelle libre). Toiture neuve complète : non.</p>

                <h3>Combien de tuiles faut-il au m² ?</h3>
                <p>10-16 tuiles/m² pour une tuile à emboîtement. 25-40 pièces/m² pour une tuile canal. 40-60 pièces/m² pour une tuile plate. Ajouter 5-10 % pour les coupes.</p>

                <h3>Quel DTU s'applique pour une toiture en tuile ?</h3>
                <p>DTU 40.21 (emboîtement), DTU 40.22 (canal), DTU 40.211 (plate terre cuite). Publiés par le CSTB.</p>

                <h3>Quelle est la durée de vie d'une toiture en tuile terre cuite ?</h3>
                <p>50 à 100 ans pour la tuile. Les accessoires (liteaux, closoirs, mortier) ont une durée de vie plus courte, à remplacer à chaque rénovation complète.</p>

                <h3>Quel mortier utiliser pour le faîtage et les noues ?</h3>
                <p>Les tuiles de faîtage se scellent obligatoirement au mortier bâtard (ciment + chaux + sable), jamais au ciment pur qui se fissure au premier gel. Notre guide sur le <a href="https://www.cemarenov.fr/dosage-mortier-batard-faitage">dosage du mortier bâtard pour faîtage</a> détaille les proportions exactes et les erreurs de gâchage à éviter pour garantir l'étanchéité sur le long terme.</p>

            </div><!-- /.article-content -->

            <!-- AUTHOR BOX -->
            <div class="author-box-bottom">
                <div class="author-box-img">
                    <img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe">
                </div>
                <div class="author-box-content">
                    <h3>Philippe</h3>
                    <span class="author-role">Expert Rénovation &amp; Artisan RGE</span>
                    <p>Avec plus de 20 ans d'expérience sur les chantiers, Philippe vous partage ses conseils concrets et sans langue de bois.</p>
                    <a href="<?php echo BASE_URL; ?>philippe" class="btn-outline">Voir son profil complet</a>
                </div>
            </div>

            <!-- CONCLUSION CTA -->
            <div class="conclusion-box">
                <h3>Besoin d'un devis ?</h3>
                <p>Une toiture en tuile bien posée, ça se fait dans l'ordre. Charpente saine, pureau respecté, fixations conformes au DTU. Si votre chantier dépasse le simple remplacement, faites intervenir un couvreur RGE.</p>
                <a href="<?php echo BASE_URL; ?>contact" class="btn-primary">Obtenir un devis gratuit</a>
            </div>

            <!-- ARTICLES SIMILAIRES -->
            <section class="similar-articles">
                <h3 class="similar-title">Articles similaires</h3>
                <div class="similar-grid">
                    <?php foreach ($similar_articles as $art): ?>
                        <a href="<?php echo $art['url'] ?? '#'; ?>" class="similar-card">
                            <div class="similar-img">
                                <img src="<?php echo $art['image']; ?>" alt="<?php echo htmlspecialchars($art['title']); ?>">
                            </div>
                            <h4><?php echo htmlspecialchars($art['title']); ?></h4>
                        </a>
                    <?php endforeach; ?>
                </div>
            </section>

        </div>

        <!-- ── SIDEBAR DROITE ── -->
        <aside class="sidebar-right">
            <div class="sidebar-sticky">

                <div class="sidebar-block">
                    <h3 class="sidebar-title">Derniers articles, <?php echo htmlspecialchars($category['name'] ?? 'Rénovation'); ?></h3>
                    <?php foreach ($cat_articles as $art): ?>
                        <a href="<?php echo $art['url'] ?? '#'; ?>" class="sidebar-article-card">
                            <img src="<?php echo $art['image']; ?>" alt="<?php echo htmlspecialchars($art['title']); ?>">
                            <span><?php echo htmlspecialchars($art['title']); ?></span>
                        </a>
                    <?php endforeach; ?>
                </div>

                <div class="sidebar-block">
                    <h3 class="sidebar-title">Les plus récents</h3>
                    <?php foreach ($latest_articles as $art): ?>
                        <a href="<?php echo $art['url'] ?? '#'; ?>" class="sidebar-article-card">
                            <img src="<?php echo $art['image']; ?>" alt="<?php echo htmlspecialchars($art['title']); ?>">
                            <span><?php echo htmlspecialchars($art['title']); ?></span>
                        </a>
                    <?php endforeach; ?>
                </div>

            </div>
        </aside>

    </div>
</article>

<?php
require_once dirname(__DIR__) . '/schema-data.php';

$faq_schema = [
    [
        'question' => "Quelle est la pente minimale pour un toit en tuile ?",
        'answer'   => "17° pour une tuile à emboîtement, 25-30° pour une tuile canal, 45° pour une tuile plate. En dessous de ces valeurs, l'étanchéité n'est plus garantie et le DTU n'est pas respecté."
    ],
    [
        'question' => "Faut-il obligatoirement un écran de sous-toiture ?",
        'answer'   => "Sur une toiture neuve en 2026, oui dans la quasi-totalité des cas. La RE2020 et le DTU 40.21 le rendent incontournable. En rénovation à l'identique, vérifier le DTU applicable."
    ],
    [
        'question' => "Peut-on poser des tuiles soi-même sans couvreur ?",
        'answer'   => "Un remplacement ponctuel de tuiles, oui avec le bon équipement de sécurité. Une toiture neuve complète, non : la mise en œuvre conforme au DTU relève d'un couvreur professionnel."
    ],
    [
        'question' => "Combien de tuiles faut-il au m² ?",
        'answer'   => "10 à 16 tuiles/m² pour une tuile à emboîtement, 25 à 40 pièces/m² pour une tuile canal, 40 à 60 pièces/m² pour une tuile plate. Ajouter 5 à 10 % pour les pertes de coupe."
    ],
    [
        'question' => "Quel DTU s'applique pour une toiture en tuile ?",
        'answer'   => "DTU 40.21 pour les tuiles à emboîtement. DTU 40.22 pour les tuiles canal. DTU 40.211 pour les tuiles plates en terre cuite. Publiés par le CSTB."
    ],
    [
        'question' => "Quelle est la durée de vie d'une toiture en tuile terre cuite ?",
        'answer'   => "50 à 100 ans pour la tuile sur charpente saine. Les accessoires (liteaux, closoirs, mortier) ont une durée de vie plus courte et doivent être remplacés à chaque rénovation complète."
    ],
];

$_schema = get_schema_data(basename(__FILE__, '.php'));
if (!isset($_schema['faq']) || empty($_schema['faq'])) {
    $_schema['faq'] = $faq_schema;
}

echo generate_article_schema($article_meta, $_schema['faq'] ?? [], $_schema['howto'] ?? []);
echo generate_rating_widget();
?>
<?php include dirname(__DIR__) . '/footer.php'; ?>
