<?php
/**
 * enduit-pierre-vue.php
 * Article: Enduit pierre vue ou pierre apparente : différences, étapes et prix
 */

// Article metadata — scanned by functions.php to populate homepage/categories/sidebars
$article_meta = [
    'title' => 'Enduit pierre vue : Le guide 2026 (Prix, Différences & Tutoriel)',
    'category' => 'renovation',
    'image' => 'https://www.cemarenov.fr/image/enduit pierre vue3.webp',
    'excerpt' => 'Enduit pierre vue ou apparente ? 🛑 Stop aux erreurs fatales. Découvrez les vrais prix et la technique artisanale pour sublimer vos murs anciens !',
    'date' => '2026-03-09',
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

// Similar articles: pick 3 from category (excluding self) whose titles share the most words
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
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
                <a href="<?php echo BASE_URL . $current_cat; ?>">
                    <?php echo htmlspecialchars($category['name']); ?>
                </a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
                <span>Enduit pierre vue</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Façade</span>
                <span class="article-tag">Maçonnerie</span>
            </div>

            <h1>Enduit pierre vue : <br>
                <span class="h1-accent">Prix, Différences et Étapes en 2026</span>
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
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
                        <line x1="16" y1="2" x2="16" y2="6" />
                        <line x1="8" y1="2" x2="8" y2="6" />
                        <line x1="3" y1="10" x2="21" y2="10" />
                    </svg>
                    Mis à jour le
                    <?php echo format_date_fr($article_meta['date']); ?>
                </div>
                <div class="meta-item">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10" />
                        <polyline points="12 6 12 12 16 14" />
                    </svg>
                    Lecture :
                    <?php echo $article_meta['reading_time']; ?> min
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
                        <img src="<?php echo $cat['image']; ?>" alt="<?php echo htmlspecialchars($cat['name']); ?>">
                        <span class="sidebar-cat-name">
                            <?php echo htmlspecialchars($cat['name']); ?>
                        </span>
                    </a>
                <?php endforeach; ?>
            </div>
        </aside>

        <!-- MAIN CONTENT (center) -->
        <div class="article-container">

            <p class="article-intro">
                Rénover un vieux mur en pierre est souvent un casse-tête : faut-il tout cacher, ou au contraire, laisser
                les pierres nues au risque de les voir geler en hiver ? L'<strong>enduit pierre vue</strong> est le
                compromis traditionnel parfait. Dès l’accueil d'un enduit sur une façade ancienne, il est vital
                d'employer des techniques artisanales respectueuses du patrimoine. Que l'application soit manuelle ou
                machine, la projection va apporter un véritable bouclier à vos murs tout en préservant leur cachet.
            </p>

            <img src="<?php echo BASE_URL; ?>image/enduit pierre vue1.webp"
                alt="Avant/après d'une façade ancienne montrant la transition entre un mur brut dégradé et un magnifique enduit pierre vue à la chaux claire"
                style="width: 100%; border-radius: 12px; margin: 2rem 0; box-shadow: 0 5px 15px rgba(0,0,0,0.05); object-fit: cover; aspect-ratio: 16/9;">

            <div class="article-content">

                <p>Ce guide expert vous propose des solutions complètes pour comprendre la technique. De la préparation
                    du support aux finitions, nous décortiquons les prix, le rendement (avec notre simulateur intégré),
                    et les étapes d'application.</p>

                <!-- TL;DR Box -->
                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                        </svg>
                        L'essentiel en 30 secondes
                    </div>
                    <ul>
                        <li><strong>Pierre vue :</strong> On recouvre tout le mur d'enduit, puis on brosse pour ne
                            laisser affleurer que la tête des plus belles pierres. <em>Protège le bâti.</em></li>
                        <li><strong>Pierre apparente :</strong> On creuse les joints, la pierre est totalement à nu.
                            <em>Risqué en extérieur si la pierre est poreuse.</em>
                        </li>
                        <li><strong>Prix moyen artisan :</strong> 45 à 80 €/m² (fourniture et pose).</li>
                        <li><strong>Matériau obligatoire :</strong> Uniquement de la chaux (aérienne CL90 ou hydraulique
                            NHL). <strong>Le ciment est à proscrire absolument.</strong></li>
                    </ul>
                </div>

                <!-- Table of Contents -->
                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li><a href="#definition">1. Qu'est-ce qu'un enduit à pierre vue (vs pierre apparente) ?</a>
                        </li>
                        <li><a href="#prix">2. Quel est le prix d'un enduit pierre vue au m² ?</a></li>
                        <li><a href="#etapes">3. Les 4 étapes pour réaliser un enduit à pierre vue</a></li>
                        <li><a href="#rendement">4. Outil : Quelle surface avec un sac de 25 kg d'enduit ?</a></li>
                        <li><a href="#faq">5. FAQ sur l'enduit et les murs en pierres</a></li>
                    </ul>
                </div>

                <!-- Section 1 -->
                <h2 id="definition">1. Qu'est-ce qu'un enduit à pierre vue (et pourquoi le préférer) ?</h2>
                <p>Il y a souvent une énorme confusion chez les particuliers. Sur un chantier de <a
                        href="<?php echo BASE_URL; ?>ravalement-de-facade"
                        style="text-decoration: underline;">ravalement de façade</a> traditionnel,
                    la distinction entre ces deux techniques change radicalement la pérennité de votre maison.
                    <strong>L'enduit pierre vue</strong> n'est pas un simple jointoiement creux. La mise en œuvre
                    consiste à enduire l'<strong>ensemble du mur</strong>, puis à brosser l'excédent pour créer un effet
                    de relief. Les <strong>pierres restent</strong> en grande partie recouvertes, seules les faces les
                    plus saillantes ou les plus belles émergent.
                </p>

                <p>À l'inverse, la technique de la <strong>pierre apparente</strong> consiste à dégarnir les joints en
                    profondeur. Les pierres sont totalement exposées. C'est esthétique, certes, mais cela peut être
                    fatal. En assurant protection et esthétique, l'enduit pierre vue évite le piège classique des murs
                    anciens : l'infiltration d'eau (et les désastres structurels qui obligeraient à terme d'investir
                    lourdement dans un <a href="<?php echo BASE_URL; ?>traitement-humidite"
                        style="text-decoration: underline;">traitement curatif de l'humidité en profondeur</a>).</p>

                <blockquote class="article-blockquote">
                    <strong>Alerte technique : Le danger de la pierre apparente en extérieur</strong><br>
                    On voit trop souvent des particuliers pleurer au printemps après avoir mis leurs moellons à nu en
                    extérieur pour obtenir un "charme naturel sans surcharge". Ce qu'il faut savoir, c'est que beaucoup
                    de vieilles pierres (comme le tuffeau ou certaines pierres calcaires) sont <em>gélives</em>. Elles
                    absorbent la pluie. S'il gèle la nuit, l'eau gonfle dans la pierre et la fait éclater. L'enduit à
                    pierre vue agit comme le manteau d'hiver de votre mur : il gère l'humidité tout en montrant
                    l'ossature de la maison.
                </blockquote>

                <img src="<?php echo BASE_URL; ?>image/enduit pierre vue2.webp"
                    alt="Comparaison : à gauche un mur en pierre apparente avec des joints creux; à droite un mur en pierre vue avec l'enduit affleurant"
                    style="width: 100%; border-radius: 12px; margin: 2rem 0; box-shadow: 0 5px 15px rgba(0,0,0,0.05); object-fit: cover; aspect-ratio: 16/9;">

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Critères</th>
                                <th>Enduit à Pierre Vue</th>
                                <th>Pierre Apparente</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Principe</strong></td>
                                <td>Mur recouvert, on laisse affleurer les reliefs.</td>
                                <td>Joints creusés, pierres totalement dénudées.</td>
                            </tr>
                            <tr>
                                <td><strong>Protection du bâti</strong></td>
                                <td>Excellente (bouclier contre intempéries).</td>
                                <td>Faible (la pierre subit la pluie et la grêle).</td>
                            </tr>
                            <tr>
                                <td><strong>Usage recommandé</strong></td>
                                <td>Extérieur (façades) et intérieur.</td>
                                <td>Strictement en intérieur (sauf granit).</td>
                            </tr>
                            <tr>
                                <td><strong>Mise en œuvre</strong></td>
                                <td>Rapide (technique du "beurré").</td>
                                <td>Chronophage (rejointoiement à la poche).</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Section 2 -->
                <h2 id="prix">2. Quel est le prix d'un enduit pierre vue au m² ?</h2>
                <p>Que vous fassiez appel à un façadier ou que vous montiez vous-même sur l'échafaudage, budgétiser un
                    <strong>enduit neuf</strong> nécessite de prendre en compte l'état initial de vos <strong>façades en
                        pierres</strong>.
                </p>
                <p>L'enveloppe budgétaire globale de votre <a href="<?php echo BASE_URL; ?>enduit-facade"
                        style="text-decoration: underline;">enduit de façade</a> dépendra surtout du temps de piquetage.
                    S'il faut faire sauter un ancien crépi en
                    ciment particulièrement tenace avant d'appliquer l'enduit à la chaux, le temps de main-d'œuvre
                    explose.</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Type de prestation</th>
                                <th>Prix moyen TTC (au m²)</th>
                                <th>Ce qui est inclus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Pro : Préparation + Enduit</strong></td>
                                <td>45 € à 80 €</td>
                                <td>Piquetage léger, fourniture chaux/sable, échafaudage, brossage.</td>
                            </tr>
                            <tr>
                                <td><strong>Pro : Dépose gros ciment + Enduit</strong></td>
                                <td>90 € à 130 €</td>
                                <td>Burinage lourd du ciment (sauvetage manuel de la pierre), évacuation.</td>
                            </tr>
                            <tr>
                                <td><strong>DIY : Matériaux seuls (Vous-même)</strong></td>
                                <td>4 € à 8 €</td>
                                <td>Chaux naturelle, sable, sans compter le temps passé ni les outils.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Section 3 -->
                <h2 id="etapes">3. Les 4 étapes pour réaliser un enduit à pierre vue</h2>
                <p>L'application de l'enduit demande de la méthode. Bien que l'on puisse utiliser des machines à
                    projeter pour aller vite, le travail de finition se fait toujours à la main pour adapter le geste au
                    caractère architectural. Voici le pas-à-pas.</p>

                <h3>1. Piquetage, préparation et arrosage du support</h3>
                <img src="<?php echo BASE_URL; ?>image/enduit pierre vue4.webp"
                    alt="Artisan façadier en train de purger les anciens joints friables d'un mur en moellons"
                    style="width: 100%; border-radius: 12px; margin: 1rem 0; box-shadow: 0 5px 15px rgba(0,0,0,0.05); object-fit: cover; aspect-ratio: 21/9;">

                <p>La préparation du support est la phase la plus ingrate mais la plus vitale. Vous devez purger les
                    anciens joints des pierres et éliminer tout ce qui est friable à l'aide d'un piolet ou d'un burin
                    plat. Évidez sur 2 à 3 cm de profondeur pour que le futur mortier puisse bien s'ancrer dans le mur.
                </p>
                <p><em>L'étape cruciale :</em> Arrosez le mur en pierres à refus (jusqu'à ce que l'eau ruisselle) la
                    veille du chantier, puis réhumidifiez au pulvérisateur juste avant l'application. Une pierre sèche
                    est une éponge qui va "griller" votre chaux en aspirant toute son eau, provoquant un faïençage
                    immédiat.</p>

                <h3>2. Préparation du mortier (Dosage chaux et sable)</h3>
                <p>Pour un enduit pierre traditionnel, fuyez les mortiers bâtards du commerce. Préparez votre mélange à
                    la bétonnière. On utilise généralement de la chaux hydraulique (NHL 2 ou NHL 3.5) pour l'extérieur,
                    ou de la chaux aérienne (CL90) pour l'intérieur.</p>
                <ul class="custom-list">
                    <li><strong>Le dosage classique :</strong> 5 volumes de sable (granulométrie 0/4) pour 2,5 volumes
                        de chaux.</li>
                    <li><strong>L'astuce couleur :</strong> C'est la couleur de votre sable local qui donnera la teinte
                        finale. L'enduit prêt doit avoir une consistance souple, semblable à de la pâte à modeler.</li>
                </ul>

                <h3>3. Application de l'enduit (Technique du beurré)</h3>
                <p>C'est ici que l'application de l'enduit sur l'ensemble prend tout son sens. Que ce soit à la truelle
                    ou à la tyrolienne (projection), vous allez "beurrer" le mur. Vous devez recouvrir les pierres
                    presque totalement, en remplissant généreusement les joints et en aplanissant grossièrement
                    l'ensemble. Ne cherchez surtout pas à détourer les moellons à ce stade.</p>

                <h3>4. Serrage et brossage pour laisser apparaître la pierre</h3>
                <p>Attendez que l'enduit commence à "tirer" (sécher légèrement en surface). Selon la météo, cela prend
                    entre 2h et 24h. S'il y a des micro-fissures, utilisez le dos de votre truelle pour "serrer" la
                    chaux et la compacter.</p>
                <p>Ensuite, prenez une brosse à chiendent ou une brosse métallique douce. Brossez énergiquement la
                    surface pour dégager uniquement la "tête" des pierres. Ne creusez pas les joints ! Le lendemain, un
                    léger coup de balayette dépoussiérera tout l'ensemble.</p>

                <!-- Section 4 -->
                <h2 id="rendement">4. Outil : Quelle surface avec un sac de 25 kg d'enduit ?</h2>
                <p>Pour estimer vos achats chez le fournisseur de matériaux, sachez qu'on consomme environ <strong>17 kg
                        d'enduit par mètre carré pour une épaisseur de 1 cm</strong>.</p>

                <div
                    style="background: #fff; border: 1px solid #e2e8f0; padding: 25px; border-radius: 8px; margin: 30px 0; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
                    <h3 style="margin-top: 0; color: var(--color-primary); font-size: 1.3rem;">🧮 Calculateur Chaux et
                        Sable</h3>
                    <div style="display: flex; flex-direction: column; gap: 15px; margin-bottom: 20px;">
                        <div>
                            <label for="surface" style="display: block; font-weight: 600; margin-bottom: 5px;">Surface à
                                enduire (m²)</label>
                            <input type="number" id="surface" placeholder="Ex: 50"
                                style="width: 100%; max-width: 300px; padding: 10px; border: 1px solid #cbd5e1; border-radius: 4px; font-family: inherit;">
                        </div>
                        <div>
                            <label for="epaisseur"
                                style="display: block; font-weight: 600; margin-bottom: 5px;">Épaisseur estimée
                                (cm)</label>
                            <input type="number" id="epaisseur" placeholder="Ex: 2.5" step="0.5"
                                style="width: 100%; max-width: 300px; padding: 10px; border: 1px solid #cbd5e1; border-radius: 4px; font-family: inherit;">
                        </div>
                        <button onclick="calculerSacs()"
                            style="background: var(--color-accent); color: white; border: none; padding: 12px 24px; font-weight: bold; border-radius: 4px; cursor: pointer; align-self: flex-start;">Calculer
                            le total</button>
                    </div>
                    <div id="resultat-calc"
                        style="display: none; padding: 15px; background: #f0fdf4; border-left: 4px solid #22c55e; border-radius: 4px; line-height: 1.5;">
                    </div>
                </div>

                <script>
                    function calculerSacs() {
                        const surface = parseFloat(document.getElementById('surface').value);
                        const epaisseur = parseFloat(document.getElementById('epaisseur').value);
                        const div = document.getElementById('resultat-calc');

                        if (isNaN(surface) || isNaN(epaisseur) || surface <= 0 || epaisseur <= 0) {
                            div.style.display = 'block';
                            div.style.backgroundColor = '#fef2f2';
                            div.style.borderColor = '#ef4444';
                            div.innerHTML = 'Veuillez saisir une surface et une épaisseur valides.';
                            return;
                        }

                        const kgTotaux = surface * epaisseur * 17;
                        const sacs = Math.ceil((kgTotaux * 1.1) / 25); // +10% de marge pour les pertes et creux

                        div.style.display = 'block';
                        div.style.backgroundColor = '#f0fdf4';
                        div.style.borderColor = '#22c55e';
                        div.innerHTML = '<strong>Résultat :</strong> Pour ' + surface + ' m² sur ' + epaisseur + ' cm d\'épaisseur, il vous faudra environ <strong>' + sacs + ' sacs de 25 kg</strong> (en comptant une marge de sécurité de 10% indispensable pour les murs en pierres irréguliers).';
                    }
                </script>

                <!-- Section 5 -->
                <h2 id="faq">5. FAQ sur l'enduit et les murs en pierres</h2>

                <h3>Peut-on faire un enduit pierre vue sur un mur en parpaing ?</h3>
                <p>Techniquement non, car le principe implique d'avoir de vraies pierres à révéler en dessous.
                    Toutefois, vous pouvez coller des pierres de parement naturelles fines sur votre parpaing, puis
                    appliquer un mortier de chaux très gras pour noyer ces plaquettes avant de les brosser, recréant
                    ainsi l'illusion de l'ancien.</p>

                <h3>Quel enduit utiliser pour recouvrir un mur en pierre en intérieur ?</h3>
                <p>En intérieur, utilisez un enduit très respirant. La chaux aérienne (CL90) est parfaite : elle
                    assainit l'air et gère l'hygrométrie de la maison ancienne. Les enduits chanvre ou terre crue sont
                    aussi recommandés.</p>

                <h3>Comment nettoyer et entretenir un mur en pierre vue ?</h3>
                <p>L'entretien est faible. En extérieur, si des mousses s'installent (façades Nord), profitez-en pour
                    réaliser un <a href="<?php echo BASE_URL; ?>nettoyage-demoussage-facade"
                        style="text-decoration: underline;">nettoyage et démoussage de façade</a> doux au pulvérisateur
                    (produit anti-cryptogamique). N'utilisez <strong>jamais de nettoyeur haute
                        pression</strong> (type Kärcher), l'eau sous forte pression décollera le sable de votre chaux !
                </p>

                <h3>Quelle alternative si je ne veux pas d'enduit du tout ?</h3>
                <p>Pour les murs de jardin ou de délimitation sans impératif esthétique fort, le <a href="https://www.cemarenov.fr/mur-pierre-seche">mur en pierre sèche</a> est une alternative sans mortier ni entretien. La technique ancestrale assure un drainage naturel et s'intègre parfaitement dans les environnements ruraux ou méditerranéens.</p>

                <h3>Mon mur est un mur de soutènement en pierre : des précautions spécifiques ?</h3>
                <p>Sur un mur poids (qui retient des terres), les contraintes sont différentes d'un simple mur de clôture. L'enduit ne doit pas colmater les barbacanes ni bloquer le drainage dorsal. Notre guide sur le <a href="https://www.cemarenov.fr/mur-poids-pierre-paris">mur poids en pierre à Paris</a> détaille les règles spécifiques aux ouvrages de soutènement — dimensionnement, fruit, drainage — avant toute intervention en finition.</p>

            </div> <!-- .article-content -->

            <!-- Author Box -->
            <div class="author-box-bottom">
                <div class="author-box-img">
                    <img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe">
                </div>
                <div class="author-box-content">
                    <h3>Philippe</h3>
                    <span class="author-role">Expert R&eacute;novation &amp; Artisan RGE</span>
                    <p>Avec plus de 20 ans d&rsquo;exp&eacute;rience sur les chantiers, Philippe vous partage ses
                        conseils concrets et sans langue de bois pour r&eacute;ussir vos travaux et &eacute;viter les
                        arnaques.</p>
                    <a href="<?php echo BASE_URL; ?>philippe" class="btn-outline">Voir son profil complet</a>
                </div>
            </div>

            <!-- Conclusion Box -->
            <div class="conclusion-box">
                <h3>Redonnez vie à vos façades dans les règles de l'art</h3>
                <p>
                    L'enduit pierre vue est l'arme ultime de la restauration du patrimoine. Plus qu'un simple choix de
                    décoration, c'est une protection vitale qui s'adapte à l'âme de votre maison ancienne. Assurez-vous
                    simplement qu'il n'y ait pas la moindre once de ciment dans votre bétonnière.
                </p>
                <a href="<?php echo BASE_URL; ?>contact" class="btn-primary">Trouver un façadier spécialiste près de
                    chez vous</a>
            </div>

            <!-- Similar Articles -->
            <section class="similar-articles">
                <h3 class="similar-title">Articles similaires</h3>
                <div class="similar-grid">
                    <?php foreach ($similar_articles as $art): ?>
                        <a href="<?php echo $art['url'] ?? '#'; ?>" class="similar-card">
                            <div class="similar-img">
                                <img src="<?php echo $art['image']; ?>"
                                    alt="<?php echo htmlspecialchars($art['title']); ?>">
                            </div>
                            <h4>
                                <?php echo htmlspecialchars($art['title']); ?>
                            </h4>
                        </a>
                    <?php endforeach; ?>
                </div>
            </section>

        </div> <!-- .article-container -->

        <!-- RIGHT SIDEBAR: Latest Articles -->
        <aside class="sidebar-right">
            <div class="sidebar-sticky">
                <!-- Latest from category -->
                <div class="sidebar-block">
                    <h3 class="sidebar-title">Derniers articles —
                        <?php echo htmlspecialchars($category['name']); ?>
                    </h3>
                    <?php foreach ($cat_articles as $art): ?>
                        <a href="<?php echo $art['url'] ?? '#'; ?>" class="sidebar-article-card">
                            <img src="<?php echo $art['image']; ?>" alt="<?php echo htmlspecialchars($art['title']); ?>">
                            <span>
                                <?php echo htmlspecialchars($art['title']); ?>
                            </span>
                        </a>
                    <?php endforeach; ?>
                </div>

                <!-- Latest globally -->
                <div class="sidebar-block">
                    <h3 class="sidebar-title">Les plus récents</h3>
                    <?php foreach ($latest_articles as $art): ?>
                        <a href="<?php echo $art['url'] ?? '#'; ?>" class="sidebar-article-card">
                            <img src="<?php echo $art['image']; ?>" alt="<?php echo htmlspecialchars($art['title']); ?>">
                            <span>
                                <?php echo htmlspecialchars($art['title']); ?>
                            </span>
                        </a>
                    <?php endforeach; ?>
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