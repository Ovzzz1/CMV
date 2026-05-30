<?php
/**
 * ventilation-naturelle.php
 * Article: Ventilation Naturelle
 */

// Article metadata — scanned by functions.php to populate homepage/categories/sidebars
$article_meta = [
    'title' => 'Ventilation naturelle : fonctionnement, avantages et conseils pratiques',
    'category' => 'renovation',
    'image' => 'https://www.cemarenov.fr/image/ventilation%20naturelle3.webp',
    'excerpt' => 'Saviez-vous que l\'air de votre maison est jusqu\'à 8 fois plus pollué que dehors ? Découvrez comment la ventilation naturelle purifie votre logement gratuitement et améliore votre confort.',
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
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
                <a
                    href="<?php echo BASE_URL . $current_cat; ?>"><?php echo htmlspecialchars($category['name'] ?? 'Rénovation'); ?></a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
                <span>Ventilation naturelle</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Ventilation</span>
                <span class="article-tag">Écologie</span>
            </div>

            <h1>Ventilation Naturelle :<br>
                <span class="h1-accent">Fonctionnement, Avantages et Conseils Pratiques</span>
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
                    Mis à jour le <?php echo format_date_fr($article_meta['date']); ?>
                </div>
                <div class="meta-item">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10" />
                        <polyline points="12 6 12 12 16 14" />
                    </svg>
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
                        <img src="<?php echo $cat['image'] ?? BASE_URL . 'image/default-cat.webp'; ?>"
                            alt="<?php echo htmlspecialchars($cat['name'] ?? ''); ?>">
                        <span class="sidebar-cat-name"><?php echo htmlspecialchars($cat['name'] ?? ''); ?></span>
                    </a>
                    <?php
                endforeach; ?>
            </div>
        </aside>

        <!-- MAIN CONTENT (center) -->
        <div class="article-container">

            <p class="article-intro">
                Savez-vous que l'<strong>air intérieur</strong> de votre logement peut être jusqu'à 8 fois plus pollué
                que l'extérieur ? Dans un contexte où l'efficacité énergétique est primordiale, la <strong>ventilation
                    naturelle</strong> réémerge comme une solution ancestrale et pourtant innovante pour garantir un
                <strong>air sain</strong> et un confort optimal, sans surconsommation d'énergie. L'air naturel circule
                en utilisant les différences de pression et l'effet cheminée pour évacuer l'humidité et les polluants
                intérieurs.
            </p>

            <div class="article-content">

                <!-- TL;DR Box -->
                <div class="tldr-box"
                    style="background-color: #faf3eb; border-left: 4px solid var(--color-primary); padding: 1.5rem 2rem; margin-bottom: 3rem; border-radius: 0 8px 8px 0;">
                    <h2
                        style="font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 1.2rem; text-transform: uppercase; color: var(--color-dark); margin-top: 0; border: none; padding-bottom: 0; margin-bottom: 1rem;">
                        ⚡ En Bref</h2>
                    <ul style="margin-bottom: 0;">
                        <li style="position: relative; padding-left: 1.5rem; margin-bottom: 0.5rem;"><span
                                style="position: absolute; left: 0; color: var(--color-primary);">■</span> La
                            <strong>ventilation naturelle</strong> est un système passif de renouvellement de l'air de
                            votre maison, utilisant les forces naturelles comme le vent et les différences de
                            température (tirage thermique).</li>
                        <li style="position: relative; padding-left: 1.5rem; margin-bottom: 0.5rem;"><span
                                style="position: absolute; left: 0; color: var(--color-primary);">■</span> Écologique,
                            silencieuse et peu coûteuse, elle assure la qualité de l'air intérieur en évacuant l'air
                            vicié et en introduisant de l'air neuf sans machinerie électrique.</li>
                        <li style="position: relative; padding-left: 1.5rem; margin-bottom: 0.5rem;"><span
                                style="position: absolute; left: 0; color: var(--color-primary);">■</span> Bien que
                            dépendante des conditions climatiques, des systèmes de <strong>ventilation naturelle
                                assistée</strong> (VNA) existent pour maximiser son efficacité dans les bâtiments
                            modernes.</li>
                    </ul>
                </div>

                <!-- Table of Contents -->
                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li><a href="#principes">Qu'est-ce que la Ventilation Naturelle ? Principes et
                                Fonctionnement</a></li>
                        <li><a href="#avantages">Avantages et Inconvénients : Une Évaluation Équilibrée</a></li>
                        <li><a href="#importance">L'Impératif de Ventiler : Pour votre Santé et la Durabilité de votre
                                Logement</a></li>
                        <li><a href="#hybrides">Au-delà du "Tout Naturel" : Les Systèmes Hybrides et Assistés</a></li>
                        <li><a href="#comparaisons">Ventilation Naturelle vs. VMC : Faire le Bon Choix pour votre
                                Maison</a></li>
                        <li><a href="#prix">Budget et Rentabilité : Quel Coût pour une Ventilation Naturelle ?</a></li>
                        <li><a href="#optimisation">Optimisation et Entretien : Conseils Pratiques pour une Efficacité
                                Maximale</a></li>
                        <li><a href="#faq">FAQ Ventilation Naturelle : Vos Questions</a></li>
                    </ul>
                </div>

                <h2 id="principes">Qu'est-ce que la Ventilation Naturelle ? Principes et Fonctionnement</h2>
                <p>La <strong>ventilation naturelle</strong> représente la méthode la plus ancienne et la plus simple de
                    <strong>renouvellement de l'air</strong> au sein d'une maison. Ce système tire parti des phénomènes
                    physiques pour assurer une circulation d'air constante, essentielle à la qualité de l'air intérieur
                    de votre logement. Son fonctionnement repose sur deux forces principales : le <strong>tirage
                        thermique</strong> et la pression du vent. Comprendre ces mécanismes est fondamental pour
                    apprécier l'efficacité de la ventilation passive.</p>

                <h3>Définition précise</h3>
                <p>La ventilation naturelle est le processus par lequel l'air est renouvelé dans un bâtiment sans l'aide
                    d'appareils mécaniques (ventilateurs, moteurs). Elle utilise les forces motrices naturelles pour
                    évacuer les polluants, l'air vicié des pièces humides (cuisine, salle de bain) et introduire de
                    l'air neuf dans les pièces de vie. C'est une approche passive et écologique, dont l'efficacité
                    dépend fortement de la conception du bâtiment et des conditions climatiques extérieures.</p>

                <figure style="margin: 2rem 0; max-width: 100%;">
                    <img style="width: 100%; height: auto; border-radius: 12px; display: block; box-shadow: 0 5px 15px rgba(0,0,0,0.05);" src="<?php echo BASE_URL; ?>image/ventilation%20naturelle1.webp"
                        alt="Schéma illustrant le principe du tirage thermique dans une maison individuelle">
                    <figcaption style="text-align: center; font-size: 0.9rem; color: #64748b; margin-top: 10px; font-style: italic; padding: 0 10px;">Le tirage thermique permet à l'air chaud et vicié de s'évacuer par le haut de la maison,
                        aspirant naturellement de l'air frais depuis les aérations basses.</figcaption>
                </figure>

                <h3>Les mécanismes clés : Tirage thermique, vent et effet cheminée</h3>
                <p>Le fonctionnement de la ventilation naturelle s'articule autour de plusieurs principes :</p>
                <ul class="custom-list">
                    <li><strong>Le tirage thermique (ou effet cheminée) :</strong> C'est le phénomène où l'air chaud,
                        plus léger, monte et s'échappe par des ouvertures hautes (comme des cheminées de toit ou des
                        bouches d'extraction thermiques). En s'échappant, il crée une dépression qui aspire de l'air
                        frais par des ouvertures basses. Ce principe est d'autant plus efficace que la différence de
                        température entre l'intérieur et l'extérieur est importante.</li>
                    <li><strong>L'effet du vent :</strong> Le vent exerce une pression sur les façades exposées, forçant
                        l'air neuf à entrer par les ouvertures (fenêtres, grilles d'aération). Simultanément, sur les
                        façades opposées (en dépression), le vent "aspire" l'air vicié hors du logement.</li>
                    <li><strong>Le balayage permanent :</strong> C'est la combinaison de ces deux effets pour créer un
                        flux d'air constant traversant les pièces, des zones propres (chambres, séjour) vers les zones
                        humides et polluées (cuisine, salles de bain, WC).</li>
                </ul>

                <h2 id="avantages">Avantages et Inconvénients : Une Évaluation Équilibrée</h2>
                <p>L'évaluation de la <strong>ventilation naturelle</strong> passe par une analyse rigoureuse de ses
                    avantages et inconvénients. Si elle séduit par son approche simple et respectueuse de
                    l'environnement, elle présente aussi des limites importantes, notamment dans nos constructions
                    modernes beaucoup plus étanches que celles d'autrefois.</p>

                <h3>Les atouts d'une ventilation écologique et économique</h3>
                <p>Les avantages de la ventilation naturelle sont nombreux, ce qui en fait une option prisée dans
                    certaines configurations architecturales anciennes :</p>
                <ul class="custom-list">
                    <li><strong>Gratuité énergétique :</strong> Le renouvellement d'air se fait sans consommation
                        électrique, générant des économies immédiates sur la facture d'énergie. On estime que, bien
                        conçue, elle peut permettre jusqu'à 15% d'économies d'énergie par rapport à un système mécanique
                        (VMC).</li>
                    <li><strong>Silence absolu :</strong> Sans moteur ni ventilateur de gaine, la ventilation naturelle
                        est parfaitement silencieuse, contribuant à un confort acoustique total.</li>
                    <li><strong>Impact environnemental réduit :</strong> En n'utilisant pas d'électricité, elle diminue
                        radicalement l'empreinte carbone et l'utilisation de matériaux complexes.</li>
                    <li><strong>Simplicité d'entretien :</strong> Moins de composants (pas de courroie, pas de moteur)
                        signifie moins de maintenance, généralement limitée au nettoyage des grilles.</li>
                </ul>

                <figure style="margin: 2rem 0; max-width: 100%;">
                    <img style="width: 100%; height: auto; border-radius: 12px; display: block; box-shadow: 0 5px 15px rgba(0,0,0,0.05);" src="<?php echo BASE_URL; ?>image/ventilation%20naturelle2.webp"
                        alt="Grille d'aération naturelle située au-dessus d'une fenêtre de chambre">
                    <figcaption style="text-align: center; font-size: 0.9rem; color: #64748b; margin-top: 10px; font-style: italic; padding: 0 10px;">Les grilles situées sur les volets ou les montants de fenêtres sont les points d'entrée
                        cruciaux de l'air neuf.</figcaption>
                </figure>

                <h3>Ses limites : Dépendance climatique et maîtrise du débit</h3>
                <p>Cependant, ce système n'est pas exempt de faiblesses, surtout face aux exigences des bâtiments
                    contemporains :</p>
                <ul class="custom-list">
                    <li><strong>Dépendance aux conditions climatiques :</strong> Son efficacité varie fortement en
                        fonction du vent ou de la température. Une absence de vent ou une trop faible différence de
                        température va réduire drastiquement le renouvellement d'air.</li>
                    <li><strong>Manque de maîtrise des débits :</strong> Il est difficile de contrôler précisément le
                        volume d'air neuf entrant. Les débits peuvent être insuffisants (créant de l'humidité) ou
                        excessifs en cas de grand vent, générant d'énormes déperditions de chaleur.</li>
                    <li><strong>Qualité d'air non garantie :</strong> Sans filtration active mécanique, la poussière
                        fine peut pénétrer dans le logement.</li>
                </ul>

                <h2 id="importance">L'Impératif de Ventiler : Pour votre Santé et la Durabilité de votre Logement</h2>
                <p>Au-delà du simple confort, une bonne ventilation est une nécessité absolue pour la santé des
                    occupants et la pérennité du bâti. Qu'il s'agisse de <strong>ventilation naturelle</strong> ou
                    mécanique, renouveler votre air intérieur est vital pour pallier à la pollution de l'habitat.</p>
                <ul class="custom-list">
                    <li><strong>Santé des occupants :</strong> La ventilation évacue le CO2 issu de la respiration, les
                        COV (Composés Organiques Volatils) émis par les peintures et les meubles, les allergènes
                        (<a href="<?php echo BASE_URL; ?>mites-de-poussiere" style="text-decoration: underline;">acariens</a>) et les virus en circulation.</li>
                    <li><strong>Préservation du bâti :</strong> L'<a href="<?php echo BASE_URL; ?>traitement-humidite" style="text-decoration: underline;">humidité excessive</a> générée par la douche ou la cuisine
                        dégrade les revêtements, pourrit le bois et favorise l'apparition de moisissures (Salpêtre,
                        Mérules) qui détruisent la maison.</li>
                    <li><strong>Confort thermique :</strong> Un air intérieur plus sec est plus facile (et moins cher) à
                        chauffer qu'un air humide !</li>
                </ul>

                <blockquote class="article-blockquote">
                    "Une ventilation insuffisante est le premier facteur aggravant des allergies et de l'asthme
                    chronique chez l'enfant en bas âge. Le confinement de l'air dans des logements trop isolés sans
                    aération est un réel problème de santé publique."
                </blockquote>

                <h2 id="hybrides">Au-delà du "Tout Naturel" : Les Systèmes Hybrides et Assistés</h2>
                <p>Face aux limites de la <strong>ventilation naturelle</strong> pure, notamment dans les rénovations
                    étanches, les systèmes hybrides ou assistés apportent l'innovation qu'il fallait. Ils combinent la
                    simplicité du naturel avec une aide mécanique discrète ponctuelle.</p>

                <h3>Ventilation Naturelle Assistée (VNA) ou Hybride : le meilleur des deux mondes ?</h3>
                <p>La <strong>Ventilation Naturelle Assistée (VNA)</strong> fonctionne majoritairement par tirage
                    thermique naturel, mais intègre un petit extracteur mécanique à ultra basse consommation en sortie
                    de toiture ou dans les bouches, qui va "prendre le relais" uniquement lorsque les forces naturelles
                    sont insuffisantes (journée d'été sans vent par exemple).</p>

                <figure style="margin: 2rem 0; max-width: 100%;">
                    <img style="width: 100%; height: auto; border-radius: 12px; display: block; box-shadow: 0 5px 15px rgba(0,0,0,0.05);" src="<?php echo BASE_URL; ?>image/ventilation%20naturelle4.webp"
                        alt="L'extracteur hybride monté sur toiture pour forcer le tirage thermique">
                    <figcaption style="text-align: center; font-size: 0.9rem; color: #64748b; margin-top: 10px; font-style: italic; padding: 0 10px;">Contrairement à une VMC, l'extracteur hybride d'une VNA ne tourne pas 24h/24 mais
                        uniquement quand les capteurs détectent un manque de tirage naturel.</figcaption>
                </figure>

                <ul class="custom-list">
                    <li>Utilise les forces naturelles à 80% du temps.</li>
                    <li>Activation automatique du micro-ventilateur en cas de besoin absolu.</li>
                    <li>Idéal pour la rénovation de bâtiments anciens équipés de longs conduits maçonnés d'époque.</li>
                    <li>Régule le débit de manière bien plus précise, évitant les sur-consommations de chauffage.</li>
                </ul>

                <h2 id="comparaisons">Ventilation Naturelle vs. VMC : Faire le Bon Choix pour votre Maison</h2>
                <p>Si la ventilation naturelle a du bon, la <strong>VMC (Ventilation Mécanique Contrôlée)</strong> reste
                    le standard imposé dans le neuf (RT2012 / RE2020). Mais en rénovation, le duel est souvent féroce.
                </p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Type de Ventilation</th>
                                <th>Fonctionnement</th>
                                <th>Avantages Clés</th>
                                <th>Inconvénients Clés</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Ventilation Naturelle (VN)</strong></td>
                                <td>Tirage thermique, balayage permanent via des conduits passifs.</td>
                                <td>100% Gratuit, silencieux, indéfectible, aucun entretien.</td>
                                <td>Dépend du climat extérieur, fortes déperditions thermiques si rafales.</td>
                            </tr>
                            <tr>
                                <td><strong>Ventilation Naturelle Assistée (VNA)</strong></td>
                                <td>Forces naturelles + extracteur d'appoint automatique en toiture.</td>
                                <td>Meilleure fiabilité, consommation électrique très faible (5 à 10W).</td>
                                <td>Coût de raccordement des sondes d'hygrométrie et du ventilateur extracteur de
                                    toiture.</td>
                            </tr>
                            <tr>
                                <td><strong><a href="<?php echo BASE_URL; ?>vmc-simple-flux" style="text-decoration: underline;">VMC Simple Flux</a></strong></td>
                                <td>Évacuation 100% motorisée 24h/24, entrée d'air passive aux fenêtres.</td>
                                <td>Débit garanti en tout temps, excellent contrôle de l'humidité.</td>
                                <td>Consommation électrique continue, gaspille les calories du chauffage l'hiver.</td>
                            </tr>
                            <tr>
                                <td><strong><a href="<?php echo BASE_URL; ?>vmc-double-flux" style="text-decoration: underline;">VMC Double Flux</a></strong></td>
                                <td>Évacuation et Insufflation motorisées + Récupérateur de chaleur.</td>
                                <td>Excellente performance énergétique (conserve 90% du chauffage), filtration de l'air.
                                </td>
                                <td>Appareil encombrant, installation très chère, besoin d'entretien des filtres.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <figure style="margin: 2rem 0; max-width: 100%;">
                    <img style="width: 100%; height: auto; border-radius: 12px; display: block; box-shadow: 0 5px 15px rgba(0,0,0,0.05);" src="<?php echo BASE_URL; ?>image/ventilation%20naturelle5.webp"
                        alt="Installation d'un réseau souple de VMC pour remplacer une ventilation naturelle défectueuse">
                    <figcaption style="text-align: center; font-size: 0.9rem; color: #64748b; margin-top: 10px; font-style: italic; padding: 0 10px;">Dans une maison isolée thermiquement moderne, la VMC vient très souvent remplacer la
                        vieille ventilation naturelle inefficace.</figcaption>
                </figure>

                <h2 id="prix">Budget et Rentabilité : Quel Coût pour une Ventilation Naturelle ?</h2>
                <p>Le <strong>prix de la ventilation naturelle</strong> est souvent ce qui la rend si attirante !
                    L'installation de simples grilles d'aération sur des mortaises de menuiserie coûte quelques dizaines
                    d'euros. Si vous disposez déjà d'anciens conduits d'évacuation dans les murs, leur remise en état
                    par le nettoyage et la pose de bouches hygroréglables standardisées vous coûtera moins de 200 € au
                    total.</p>
                <p>En revanche, pour faire créer de toutes pièces un système de <strong>Ventilation Naturelle Assistée
                        (VNA)</strong>, comptez entre <strong>500 € et 1 500 €</strong> pour la fourniture du tourelle
                    de toit et l'installation d'un couvreur zingueur compétent.</p>

                <h2 id="optimisation">Optimisation et Entretien : Conseils Pratiques pour une Efficacité Maximale</h2>
                <p>Avoir une ventilation naturelle est bien, s'assurer qu'elle fonctionne c'est mieux. Beaucoup de
                    ménages n'en tirent pas parti car ils sabotent eux-mêmes le système, souvent pour de fausses bonnes
                    raisons (bruit ou sensation de froid au niveau des fenêtres).</p>

                <figure style="margin: 2rem 0; max-width: 100%;">
                    <img style="width: 100%; height: auto; border-radius: 12px; display: block; box-shadow: 0 5px 15px rgba(0,0,0,0.05);" src="<?php echo BASE_URL; ?>image/ventilation%20naturelle6.webp"
                        alt="Détalonnage d'une porte intérieure de chambre : espace d'air sous la porte">
                    <figcaption style="text-align: center; font-size: 0.9rem; color: #64748b; margin-top: 10px; font-style: italic; padding: 0 10px;">Le "détalonnage" : laisser un jour de 1 à 2 centimètres sous chaque porte est
                        strictement requis pour que l'air circule jusqu'à la cuisine.</figcaption>
                </figure>

                <h3>Les erreurs à éviter et l'entretien régulier</h3>
                <ul class="custom-list">
                    <li><strong>Ne JAMAIS boucher les entrées d'air :</strong> C'est l'erreur la plus tragique de
                        l'hiver en rénovation. En calfeutrant la grille d'aération de sa fenêtre avec du scotch parce
                        qu'il fait froid, vous coupez immédiatement le tirage. Conséquence : les murs autour des
                        fenêtres moisissent noir en seulement quelques semaines !</li>
                    <li><strong>Nettoyer les grilles :</strong> Une grille couverte de poussière est une grille
                        inopérante. Lavez-les à l'eau chaude savonneuse tous les 6 mois.</li>
                    <li><strong>Vérifier le détalonnage :</strong> Si vos portes raclent au sol, l'air n'y passe pas. Il
                        est indispensable de raboter les bas de portes de 1,5 centimètre en bas des portes de chambre,
                        et 2 cm pour les pièces humides.</li>
                </ul>

                <h2 id="faq">FAQ Ventilation Naturelle : Vos Questions, Nos Réponses d'Experts</h2>
                <div class="faq-section">
                    <h3>Quels sont les 3 types de ventilation ?</h3>
                    <p>On distingue principalement trois grandes catégories de ventilation : la ventilation naturelle
                        (passive, s'appuie sur la physique des fluides), la ventilation naturelle assistée (VNA -
                        hybride incluant un petit extracteur), et la ventilation mécanique contrôlée (VMC - motorisée et
                        de flux constant).</p>

                    <h3>Comment ventiler une maison ancienne sans VMC ?</h3>
                    <p>Dans une maison ancienne, souvent moins hermétique (murs perspirants), la ventilation naturelle
                        classique fonctionne de façon plus prononcée. L'idéal est de fluidifier cette circulation en
                        plaçant des bouches hygroréglables passives sur vos conduits de cheminées inutilisés et en
                        veillant au bon dimensionnement des grilles aux fenêtres, sans avoir à casser de plafonds pour
                        passer une VMC.</p>

                    <h3>Qu'est-ce que la ventilation naturelle par balayage ?</h3>
                    <p>C'est le concept de croisement. L'air frais va entrer par les ouïes situées sur les fenêtres des
                        pièces "sèches" (chambre en façade Nord par exemple) et traverser horizontalement la maison pour
                        être logiquement et naturellement expulsé par les bouches présentes dans les pièces "humides"
                        opposées (cuisine en façade Sud par exemple), créant un vrai flux porteur.</p>

                    <h3>Faut-il ouvrir les fenêtres pour une bonne aération ?</h3>
                    <p>Oui, "aérer" en ouvrant complètement les fenêtres 10 minutes chaque jour n'a rien à voir avec le
                        "ventiler". Une ventilation est un flux faible, invisible et continu 24h/24h. Mais ouvrir les
                        fenêtres pour faire "un grand coup de propre" à grande échelle (notamment lors du ménage
                        printanier ou l'aération de couette) est une action complémentaire indispensable à toute
                        ventilation naturelle.</p>

                    <h3>Comment améliorer la ventilation des combles naturellement ?</h3>
                    <p>L'<a href="https://www.cemarenov.fr/extracteur-dair-solaire-combles">extracteur d'air solaire pour combles</a> est la solution naturelle par excellence : alimenté uniquement par le panneau photovoltaïque intégré, il renouvelle l'air des combles sans aucune consommation électrique. Idéal pour éliminer la chaleur accumulée en été et l'humidité hivernale, sans engager de travaux lourds.</p>

                    <h3>Ventilation naturelle ou ventilation par surpression : quelle différence ?</h3>
                    <p>La ventilation naturelle exploite les différences de pression et de température pour créer un flux d'air spontané. La <a href="https://www.cemarenov.fr/ventilation-par-surpression">ventilation par surpression</a> force activement l'entrée d'air filtré dans le logement, créant une légère surpression qui empêche les polluants extérieurs de rentrer, particulièrement utile dans les zones à fort taux de radon ou de particules.</p>
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
                    <p>Avec plus de 20 ans d&rsquo;exp&eacute;rience sur les chantiers, Philippe vous partage ses
                        conseils concrets et pragmatiques pour assainir et maîtriser les flux d'air de votre maison de
                        manière intelligente.</p>
                    <a href="<?php echo BASE_URL; ?>philippe" class="btn-outline">Voir son profil complet</a>
                </div>
            </div>

            <!-- Conclusion Box -->
            <section class="conclusion-box">
                <h2 style="color: #ffffff;">La ventilation est le poumon de votre logement !</h2>
                <p style="margin-bottom: 0;">La <strong>ventilation naturelle</strong> est plus qu'une simple commodité
                    : c'est le garant invisible de votre santé. Bien comprise et optimisée, elle peut parfaitement
                    rivaliser avec une machine tout en préservant l'environnement de votre portefeuille sans nécessiter
                    de maintenance lourde. Le tout est de ne jamais l'étouffer derrière du calfeutrage.</p>
                <div style="margin-top:2rem; text-align:center;">
                    <a href="<?php echo BASE_URL; ?>contact" class="btn-primary"
                        style="display: inline-block; padding: 15px 30px; font-weight: 600; text-decoration: none; transition: 0.3s; color: #fff;">Demander
                        un diagnostic de ventilation</a>
                </div>
            </section>

            <!-- Similar Articles -->
            <section class="similar-articles">
                <h3 class="similar-title">Articles similaires</h3>
                <div class="similar-grid">
                    <?php foreach ($similar_articles as $art): ?>
                        <a href="<?php echo $art['url'] ?? '#'; ?>" class="similar-card">
                            <div class="similar-img">
                                <img src="<?php echo $art['image'] ?? BASE_URL . 'image/default-card.webp'; ?>"
                                    alt="<?php echo htmlspecialchars($art['title'] ?? ''); ?>">
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
                    <h3 class="sidebar-title">Derniers articles —
                        <?php echo htmlspecialchars($category['name'] ?? 'Rénovation'); ?></h3>
                    <?php foreach ($cat_articles as $art): ?>
                        <a href="<?php echo $art['url'] ?? '#'; ?>" class="sidebar-article-card">
                            <img src="<?php echo $art['image'] ?? BASE_URL . 'image/default-card.webp'; ?>"
                                alt="<?php echo htmlspecialchars($art['title'] ?? ''); ?>">
                            <span><?php echo htmlspecialchars($art['title'] ?? ''); ?></span>
                        </a>
                        <?php
                    endforeach; ?>
                </div>

                <div class="sidebar-block">
                    <h3 class="sidebar-title">Les plus récents</h3>
                    <?php foreach ($latest_articles as $art): ?>
                        <a href="<?php echo $art['url'] ?? '#'; ?>" class="sidebar-article-card">
                            <img src="<?php echo $art['image'] ?? BASE_URL . 'image/default-card.webp'; ?>"
                                alt="<?php echo htmlspecialchars($art['title'] ?? ''); ?>">
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