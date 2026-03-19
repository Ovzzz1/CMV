<?php
/**
 * vmc-simple-flux.php
 * Article: VMC Simple Flux : Le Guide Complet pour un Air Sain et Sans Moisissures
 */

$article_meta = [
    'title' => 'VMC Simple Flux : Guide Complet, Prix et Conseils d\'Artisan',
    'category' => 'renovation',
    'image' => 'https://www.cemarenov.fr/image/vmc%20simple%20flux1.webp',
    'excerpt' => 'Votre VMC vous coûte de l\'argent et votre maison étouffe ? Découvrez la différence entre VMC autoréglable et hygroréglable, les prix et nos conseils d\'artisan !',
    'date' => '2026-03-10',
    'reading_time' => 8,
];

require_once dirname(__DIR__) . '/functions.php';

$page_title = $article_meta['title'];
$page_description = $article_meta['excerpt'];

// Current article category + self-exclusion filter
$current_cat = $article_meta['category'];
$current_url = BASE_URL . str_replace('.php', '', basename($_SERVER['SCRIPT_FILENAME']));
$category = get_category($current_cat);
$other_cats = get_other_categories($current_cat);
$cat_articles = array_values(array_filter(get_category_articles($current_cat, 11), fn($a) => ($a['url'] ?? '') !== $current_url));
$cat_articles = array_slice($cat_articles, 0, 10);
$latest_articles = array_values(array_filter(get_latest_articles(11), fn($a) => ($a['url'] ?? '') !== $current_url));
$latest_articles = array_slice($latest_articles, 0, 10);

// Similar articles
$current_title_words = array_map('mb_strtolower', explode(' ', $article_meta['title']));
$similar_articles = [];
foreach ($cat_articles as $art) {
    if (!isset($art['title']))
        continue;
    $title_words = array_map('mb_strtolower', explode(' ', $art['title']));
    $common = count(array_intersect($current_title_words, $title_words));
    $similar_articles[] = array_merge($art, ['score' => $common]);
}
usort($similar_articles, function ($a, $b) {
    return $b['score'] - $a['score'];
});
$similar_articles = array_slice($similar_articles, 0, 3);

include dirname(__DIR__) . '/header.php';
?>

<!-- ARTICLE HERO (full width) -->
<article>
    <section class="article-hero" style="background-image: url('<?php echo $article_meta['image']; ?>');">
        <div class="article-hero-content">
            <nav class="breadcrumb">
                <a href="<?php echo BASE_URL; ?>">Accueil</a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                <a href="<?php echo BASE_URL . $current_cat; ?>"><?php echo htmlspecialchars($category['name'] ?? 'Rénovation'); ?></a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                <span>VMC Simple Flux</span>
            </nav>
            
            <div class="article-tags">
                <span class="article-tag">Ventilation</span>
                <span class="article-tag">Énergie</span>
            </div>

            <h1>VMC Simple Flux :<br>
                <span class="h1-accent">Le Guide Complet pour un Air Sain et Sans Moisissures</span>
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

    <!-- 3-COLUMN LAYOUT -->
    <div class="article-layout">

        <!-- LEFT SIDEBAR: Other Categories -->
        <aside class="sidebar-left">
            <div class="sidebar-sticky">
                <h3 class="sidebar-title">Nos Univers</h3>
                <?php foreach ($other_cats as $slug => $cat): ?>
                    <a href="<?php echo BASE_URL . $slug; ?>" class="sidebar-cat-card">
                        <img src="<?php echo $cat['image'] ?? BASE_URL . 'image/default-cat.webp'; ?>" alt="<?php echo htmlspecialchars($cat['name'] ?? ''); ?>">
                        <span class="sidebar-cat-name"><?php echo htmlspecialchars($cat['name'] ?? ''); ?></span>
                    </a>
                <?php
endforeach; ?>
            </div>
        </aside>

        <!-- MAIN CONTENT (center) -->
        <div class="article-container">
            
            <p class="article-intro">
                On me dit souvent sur les chantiers : "Philippe, j'ouvre mes fenêtres 10 minutes tous les matins, pourquoi j'ai de la moisissure dans ma salle de bain ?". La réponse est simple : la ventilation manuelle ne suffit plus. Avec nos fenêtres double vitrage et nos maisons de mieux en mieux isolées, l'humidité (douches, cuisine, respiration) et l'air vicié restent prisonniers à l'intérieur. La VMC (Ventilation Mécanique Contrôlée) simple flux est le système de base pour faire respirer votre logement en continu. Voyons comment ça marche, combien ça coûte et surtout, comment ne pas se tromper de modèle.
            </p>

            <figure>
                <img src="<?php echo BASE_URL; ?>image/vmc%20simple%20flux2.webp" alt="Bouche d'extraction design d'une VMC simple flux installée au plafond d'une salle de bain moderne">
                <figcaption>Une bonne ventilation est invisible, silencieuse, mais absolument indispensable pour la santé de votre maison.</figcaption>
            </figure>

            <div class="article-content">
                
                <!-- TL;DR Box -->
                <div class="tldr-box" style="background-color: #faf3eb; border-left: 4px solid var(--color-primary); padding: 1.5rem 2rem; margin-bottom: 3rem; border-radius: 0 8px 8px 0;">
                    <h2 style="font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 1.2rem; text-transform: uppercase; color: var(--color-dark); margin-top: 0; border: none; padding-bottom: 0; margin-bottom: 1rem;">⚡ En Bref</h2>
                    <p style="margin-bottom: 0;">La VMC simple flux extrait l'air humide des pièces d'eau (cuisine, salle de bain, WC) et fait entrer l'air frais extérieur par les pièces de vie (salon, chambres). Le modèle <strong>autoréglable</strong> fonctionne à débit constant (pas cher, mais fait perdre de la chaleur l'hiver). Le modèle <strong>hygroréglable</strong> (Type A ou B) adapte son aspiration au taux d'humidité : c'est le standard actuel pour faire de vraies économies sur votre facture de chauffage.</p>
                </div>

                <!-- Table of Contents -->
                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li><a href="#section1">Comment fonctionne vraiment une VMC ?</a></li>
                        <li><a href="#section2">Autoréglable ou Hygroréglable : Lequel choisir ?</a></li>
                        <li><a href="#section3">Avantages et Inconvénients à connaître</a></li>
                        <li><a href="#section4">Le Budget : Prix, Pose et Aides (Calculateur)</a></li>
                        <li><a href="#section5">Installation et Entretien courant</a></li>
                        <li><a href="#faq">Vos Questions Fréquentes (FAQ)</a></li>
                    </ul>
                </div>

                <h2 id="section1">Comment fonctionne vraiment une VMC ?</h2>
                <p>Le principe est celui du "balayage". Un gros ventilateur (le bloc moteur), généralement suspendu dans vos combles, crée une légère dépression dans la maison en aspirant l'air par des bouches situées dans les pièces polluées ou humides (cuisine, toilettes, buanderie). </p>
                <p>En aspirant cet air vicié pour le rejeter dehors par le toit, la machine force l'air neuf extérieur à entrer par les petites grilles (les entrées d'air) situées au-dessus des fenêtres de vos chambres et de votre salon. L'air traverse donc les pièces de vie, passe sous vos portes (qu'on aura pris soin de "détalonner" d'environ 1 cm), et finit sa course dans la salle de bain où il est extrait.</p>

                <figure>
                    <img src="<?php echo BASE_URL; ?>image/vmc%20simple%20flux3.webp" alt="Schéma 3D d'une maison montrant la circulation de l'air d'une VMC simple flux des chambres vers les pièces humides">
                    <figcaption>L'air frais entre par les pièces sèches, balaye le logement, et est extrait par les pièces humides.</figcaption>
                </figure>

                <h3>Pourquoi "Simple Flux" ?</h3>
                <p>On l'appelle "simple flux" par opposition à la <a href="<?php echo BASE_URL; ?>vmc-double-flux" style="text-decoration: underline;">VMC "double flux"</a>. En simple flux, l'air froid de dehors rentre directement dans vos chambres, et l'air chaud de votre maison est rejeté dehors. Une double flux, beaucoup plus chère et complexe, croise ces deux airs dans un échangeur thermique pour réchauffer l'air entrant. Dans 80% des rénovations classiques, on pose du simple flux.</p>


                <h2 id="section2">Autoréglable ou Hygroréglable : Lequel choisir ?</h2>
                <p>C'est la grande question quand on achète son matériel. Il existe deux grandes familles de VMC simple flux.</p>

                <h3>La VMC Autoréglable : Le basique</h3>
                <p>Elle aspire le même volume d'air 24h/24, 7j/7, que vous soyez en train de prendre trois douches d'affilée ou que la maison soit vide pendant une semaine. C'est fiable, c'est peu coûteux à l'achat, mais c'est une catastrophe thermique en hiver : vous faites entrer de l'air glacial en continu sans aucune régulation, ce qui fait forcer vos radiateurs.</p>

                <h3>La VMC Hygroréglable : L'intelligence au service du chauffage</h3>
                <p>C'est le standard d'aujourd'hui. Les bouches d'aspiration sont équipées de petites tresses en nylon qui réagissent à l'humidité ambiante. Quand vous cuisinez ou prenez une douche, le taux d'humidité grimpe : la bouche s'ouvre en grand pour aspirer fort. Quand la pièce est sèche, elle se referme quasiment pour garder la chaleur dans la maison.</p>
                <p>Il en existe deux sous-catégories :</p>
                <ul class="custom-list">
                    <li><strong>Hygro A :</strong> Seules les bouches d'extraction (dans la salle de bain/cuisine) réagissent à l'humidité. Les entrées d'air sur les fenêtres restent fixes.</li>
                    <li><strong>Hygro B :</strong> Les bouches d'extraction ET les entrées d'air des fenêtres sont sensibles à l'humidité. C'est le système le plus performant pour faire baisser la facture de chauffage.</li>
                </ul>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Critère</th>
                                <th>Autoréglable</th>
                                <th>Hygroréglable (Type B)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Principe</strong></td>
                                <td>Débit fixe en permanence</td>
                                <td>S'adapte à l'humidité de chaque pièce</td>
                            </tr>
                            <tr>
                                <td><strong>Perte de chaleur</strong></td>
                                <td>Importante en hiver</td>
                                <td>Limitée (la machine freine l'air froid)</td>
                            </tr>
                            <tr>
                                <td><strong>Éligibilité aux aides</strong></td>
                                <td>Non</td>
                                <td>Oui (MaPrimeRénov', CEE)</td>
                            </tr>
                            <tr>
                                <td><strong>Budget matériel</strong></td>
                                <td>Bas (dès 150€)</td>
                                <td>Moyen/Haut (300€ à 600€)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h2 id="section3">Avantages et Inconvénients à connaître</h2>
                <p>Avant de vous lancer, voici un résumé objectif de ce qui vous attend avec un tel système.</p>
                
                <ul class="custom-list">
                    <li><strong>Les points forts :</strong> Fini les <a href="<?php echo BASE_URL; ?>traitement-humidite" style="text-decoration: underline;">moisissures</a> sur les joints de carrelage, les odeurs de renfermé ou la condensation sur les vitres au matin. Le coût d'installation reste très raisonnable et les travaux sont souvent bouclés en une journée.</li>
                    <li><strong>Les points faibles :</strong> Il faut accepter de faire des trous au-dessus de ses fenêtres (ce qui peut parfois créer une légère sensation de courant d'air si on est assis juste en dessous). Et si les gaines sont mal posées dans les combles, le moteur peut transmettre de légères vibrations (bruit de fond).</li>
                </ul>

                <h2 id="section4">Le Budget : Prix, Pose et Aides (Calculateur)</h2>
                
                <figure>
                    <img src="<?php echo BASE_URL; ?>image/vmc%20simple%20flux4.webp" alt="Caisson moteur d'une VMC simple flux suspendu par des cordelettes dans des combles perdus">
                    <figcaption>Le caisson moteur est généralement suspendu dans les combles pour éviter de transmettre les vibrations au plafond.</figcaption>
                </figure>

                <p>Le budget global d'un chantier VMC dépend surtout du fait que vous soyez de plain-pied ou à étages, car c'est le passage des grosses gaines (125mm et 80mm) dans les cloisons ou les plafonds qui prend du temps à l'artisan.</p>

                <p>La bonne nouvelle, c'est que si vous faites poser une VMC <strong>Hygroréglable</strong> par un artisan certifié RGE (Reconnu Garant de l'Environnement), vous avez droit à des aides. MaPrimeRénov' et les Primes Énergie (CEE) peuvent financer une bonne partie de l'installation, sans parler de la TVA réduite à 5,5%.</p>

                <div style="background-color: var(--color-bg, #f9f7f4); border: 1px solid var(--color-border, #e8dfd5); padding: 2rem; border-radius: 8px; margin: 2.5rem 0; box-shadow: 0 2px 10px rgba(0,0,0,0.02);">
                    <h4 style="margin-top: 0; color: var(--color-dark); border-bottom: 2px solid var(--color-primary, #bf9469); padding-bottom: 10px; display: inline-block;">Estimateur de budget VMC (Matériel + Pose par un Pro)</h4>
                    <p>Découvrez une fourchette de prix indicative pour votre VMC.</p>
                    
                    <label for="vmc-type" style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--color-dark);">Quel type de VMC souhaitez-vous installer ?</label>
                    <select id="vmc-type" style="width: 100%; padding: 12px; margin-bottom: 1.5rem; border: 1px solid var(--color-border); border-radius: 6px; box-sizing: border-box; font-size: 1rem;">
                        <option value="auto">Simple Flux Autoréglable (Débit fixe)</option>
                        <option value="hygro">Simple Flux Hygroréglable (Intelligente - Recommandé)</option>
                    </select>
                    
                    <label for="complexity" style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--color-dark);">Niveau de difficulté des travaux :</label>
                    <select id="complexity" style="width: 100%; padding: 12px; margin-bottom: 1.5rem; border: 1px solid var(--color-border); border-radius: 6px; box-sizing: border-box; font-size: 1rem;">
                        <option value="facile">Maison de plain-pied (combles accessibles)</option>
                        <option value="difficile">Maison à étages (gaines à passer dans les murs)</option>
                    </select>
                    
                    <button onclick="calculateVMC()" style="background-color: var(--color-primary, #bf9469); color: #fff; padding: 12px 25px; border: none; border-radius: 6px; cursor: pointer; font-weight: 600; font-size: 1.1rem; width: 100%; transition: 0.3s;">Estimer le budget brut</button>
                    
                    <div id="result-estimation" style="background-color: #fff; padding: 15px; border-radius: 6px; border: 1px dashed var(--color-border); margin-top: 1.5rem; font-size: 1.1rem; font-weight: 600; color: var(--color-dark); display: none;"></div>
                    
                    <script>
                        function calculateVMC() {
                            const type = document.getElementById('vmc-type').value;
                            const complexity = document.getElementById('complexity').value;
                            const resultDiv = document.getElementById('result-estimation');
                            
                            let minKit, maxKit, minPose, maxPose;

                            if (type === 'auto') {
                                minKit = 150; maxKit = 250;
                            } else {
                                minKit = 350; maxKit = 600;
                            }

                            if (complexity === 'facile') {
                                minPose = 400; maxPose = 600;
                            } else {
                                minPose = 700; maxPose = 1200;
                            }

                            const totalMin = minKit + minPose;
                            const totalMax = maxKit + maxPose;
                            
                            let eligibleText = type === 'hygro' ? "<br><span style='color: #2ecc71; font-size:0.9rem;'>✓ Éligible aux aides de l'État (MaPrimeRénov' / CEE)</span>" : "<br><span style='color: #e74c3c; font-size:0.9rem;'>✗ Non éligible aux aides principales</span>";

                            resultDiv.style.display = 'block';
                            resultDiv.innerHTML = `Budget estimé (Fourchette TTC) : <br><strong style="font-size: 1.2rem; color: var(--color-primary);">entre ${totalMin} € et ${totalMax} €</strong><br><span style="font-size: 0.9rem; font-weight: normal;">(Comprend le caisson, les bouches, les gaines et la main d'œuvre)</span>${eligibleText}`;
                        }
                    </script>
                </div>

                <h2 id="section5">Installation et Entretien courant</h2>
                
                <blockquote class="article-blockquote">
                    L'anecdote de chantier : L'hiver dernier, un client m'appelle pour des taches noires sur les murs de ses chambres. En arrivant, je lève la tête : il avait bouché toutes les entrées d'air de ses fenêtres avec du gros ruban adhésif "pour ne pas faire rentrer le froid", et carrément mis du papier journal dans la bouche d'extraction des WC. Résultat : l'air ne circulait plus du tout, la maison s'est transformée en cocotte-minute et la condensation a fait pourrir le placo. Règle d'or : ne bouchez jamais vos aérations, même s'il fait -5°C dehors !
                </blockquote>

                <figure>
                    <img src="<?php echo BASE_URL; ?>image/vmc%20simple%20flux1.webp" alt="Mains d'un particulier nettoyant la grille d'une bouche d'extraction de VMC couverte de poussière avec une éponge">
                    <figcaption>L'entretien des bouches d'extraction est l'affaire du particulier : un nettoyage tous les 6 mois évite la surchauffe du moteur.</figcaption>
                </figure>

                <p>Un moteur de VMC a une durée de vie moyenne de 12 à 15 ans. Mais s'il force parce que ses conduits sont bouchés, il grillera en 5 ans. L'entretien est minimal mais obligatoire :</p>
                <ol>
                    <li><strong>Tous les 6 mois :</strong> Déclipsez les façades plastiques des bouches dans la cuisine et la salle de bain. Lavez-les à l'eau chaude savonneuse. La poussière grasse de cuisine obstrue très vite l'aspiration. Passez aussi un coup de chiffon sec sur les grilles de vos fenêtres.</li>
                    <li><strong>Tous les ans :</strong> Coupez le courant de la VMC au tableau, montez dans les combles, ouvrez le caisson et passez un coup d'aspirateur doux sur les pales du grand ventilateur.</li>
                </ol>


                <h2 id="faq">Vos Questions Fréquentes (FAQ)</h2>
                <div class="faq-section">
                    <h3>La VMC est-elle obligatoire en rénovation ?</h3>
                    <p>Légalement, si vous ne touchez pas à la structure globale, non. Mais techniquement, si vous changez vos vieilles fenêtres pour du double vitrage étanche ou si vous isolez vos murs, l'installation d'une VMC devient indispensable sous peine de voir votre maison pourrir de l'intérieur en quelques mois.</p>

                    <h3>Faut-il installer une bouche dans les chambres ?</h3>
                    <p>Non ! Les chambres et les salons sont des "pièces sèches". On n'y installe jamais de bouche d'aspiration (reliée au moteur), mais uniquement de petites grilles d'entrée d'air frais au-dessus des fenêtres.</p>

                    <h3>Puis-je couper ma VMC la nuit pour ne pas avoir de bruit ?</h3>
                    <p>C'est une très mauvaise idée. C'est la nuit que nous passons le plus de temps dans la maison, que nous rejetons de l'humidité en respirant, et que les températures baissent (favorisant la condensation). Une VMC est conçue pour tourner 24h/24. Si elle fait trop de bruit, le problème vient de l'installation (moteur posé à même le sol, gaines non tendues), pas de la machine elle-même.</p>
                </div>

            </div> <!-- .article-content -->

            <!-- Author Box -->
            <div class="author-box-bottom">
                <div class="author-box-img">
                    <img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe">
                </div>
                <div class="author-box-content">
                    <h3>Philippe</h3>
                    <span class="author-role">Expert R&eacute;novation &amp; Artisan RGE</span>
                    <p>Avec plus de 20 ans d&rsquo;exp&eacute;rience sur les chantiers, Philippe vous partage ses conseils concrets et sans langue de bois pour r&eacute;ussir vos travaux et &eacute;viter les arnaques.</p>
                    <a href="<?php echo BASE_URL; ?>philippe" class="btn-outline">Voir son profil complet</a>
                </div>
            </div>

            <!-- Conclusion Box -->
            <div class="conclusion-box">
                <h3>Ne laissez plus votre maison s'asphyxier</h3>
                <p style="margin-bottom: 0;">Remplacer une vieille VMC hors d'âge ou en installer une lors du changement de vos fenêtres est le meilleur moyen de protéger votre bâti et vos poumons. L'option hygroréglable est aujourd'hui un choix de bon sens : elle conjugue air sain et respect de vos factures de chauffage. Les professionnels RGE gèrent ce type de chantier au quotidien avec un reste à charge souvent très intéressant grâce aux subventions.</p>
                <div style="margin-top:2rem; text-align:center;">
                    <a href="<?php echo BASE_URL; ?>contact" class="btn-primary" style="display: inline-block; padding: 15px 30px; font-weight: 600; text-decoration: none; transition: 0.3s; color: #fff;">Demander un diagnostic de votre ventilation (Gratuit)</a>
                </div>
            </div>

            <!-- Similar Articles -->
            <section class="similar-articles">
                <h3 class="similar-title">Articles similaires</h3>
                <div class="similar-grid">
                    <?php foreach ($similar_articles as $art): ?>
                        <a href="<?php echo $art['url'] ?? '#'; ?>" class="similar-card">
                            <div class="similar-img">
                                <img src="<?php echo $art['image'] ?? BASE_URL . 'image/default-card.webp'; ?>" alt="<?php echo htmlspecialchars($art['title'] ?? ''); ?>">
                            </div>
                            <h4><?php echo htmlspecialchars($art['title'] ?? ''); ?></h4>
                        </a>
                    <?php
endforeach; ?>
                </div>
            </section>

        </div> <!-- .article-container -->

        <!-- RIGHT SIDEBAR: Latest Articles -->
        <aside class="sidebar-right">
            <div class="sidebar-sticky">
                <div class="sidebar-block">
                    <h3 class="sidebar-title">Derniers articles — <?php echo htmlspecialchars($category['name'] ?? 'Rénovation'); ?></h3>
                    <?php foreach ($cat_articles as $art): ?>
                        <a href="<?php echo $art['url'] ?? '#'; ?>" class="sidebar-article-card">
                            <img src="<?php echo $art['image'] ?? BASE_URL . 'image/default-card.webp'; ?>" alt="<?php echo htmlspecialchars($art['title'] ?? ''); ?>">
                            <span><?php echo htmlspecialchars($art['title'] ?? ''); ?></span>
                        </a>
                    <?php
endforeach; ?>
                </div>

                <div class="sidebar-block">
                    <h3 class="sidebar-title">Les plus récents</h3>
                    <?php foreach ($latest_articles as $art): ?>
                        <a href="<?php echo $art['url'] ?? '#'; ?>" class="sidebar-article-card">
                            <img src="<?php echo $art['image'] ?? BASE_URL . 'image/default-card.webp'; ?>" alt="<?php echo htmlspecialchars($art['title'] ?? ''); ?>">
                            <span><?php echo htmlspecialchars($art['title'] ?? ''); ?></span>
                        </a>
                    <?php
endforeach; ?>
                </div>
            </div>
        </aside>

    </div> <!-- .article-layout -->
</article>

<?php
// --- Schema.org Structured Data ---
require_once dirname(__DIR__) . '/schema-data.php';
$_schema = get_schema_data(basename(__FILE__, '.php'));
echo generate_article_schema($article_meta, $_schema['faq'] ?? [], $_schema['howto'] ?? []);
echo generate_rating_widget();
?>
<?php include dirname(__DIR__) . '/footer.php'; ?>
