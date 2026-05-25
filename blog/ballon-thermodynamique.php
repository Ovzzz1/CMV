<?php
/**
 * ballon-thermodynamique.php
 * Article: Ballon thermodynamique — prix, fonctionnement, installation et rentabilité
 */

// Article metadata — scanned by functions.php to populate homepage/categories/sidebars
$article_meta = [
    'title' => 'Ballon thermodynamique : prix, fonctionnement, installation et rentabilité',
    'category' => 'renovation',
    'image' => 'https://www.cemarenov.fr/image/ballon-thermodynamique.webp',
    'excerpt' => 'Le ballon thermodynamique s\'impose comme l\'un des systèmes les plus efficaces pour produire l\'eau chaude sanitaire. Prix, COP, dimensionnement et aides : le guide complet.',
    'date' => '2026-03-05',
    'reading_time' => 12,
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
                <a href="<?php echo BASE_URL . $current_cat; ?>"><?php echo htmlspecialchars($category['name']); ?></a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
                <span>Ballon thermodynamique</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Chauffage</span>
                <span class="article-tag">Eau chaude sanitaire</span>
            </div>

            <h1>Ballon thermodynamique :<br>
                <span class="h1-accent">Prix, Fonctionnement, Installation et Rentabilité</span>
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
                        <img src="<?php echo $cat['image']; ?>" alt="<?php echo htmlspecialchars($cat['name']); ?>">
                        <span class="sidebar-cat-name"><?php echo htmlspecialchars($cat['name']); ?></span>
                    </a>
                    <?php
                endforeach; ?>
            </div>
        </aside>

        <!-- MAIN CONTENT (center) -->
        <div class="article-container">

            <p class="article-intro">
                Le ballon thermodynamique s'impose comme l'un des systèmes les plus efficaces pour produire l'eau chaude
                sanitaire dans une maison chauffée à l'électricité. Il associe une cuve classique à une petite pompe à
                chaleur, ce qui permet de réduire fortement la consommation par rapport à un chauffe-eau électrique
                standard. <strong>Avant de se lancer, il faut comprendre comment l'appareil fonctionne, combien il coûte
                    posé, quelles sont ses contraintes d'installation et dans quels cas il est réellement
                    intéressant.</strong>
            </p>

            <div class="article-content">

                <!-- TL;DR Box -->
                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                        </svg>
                        L'essentiel à retenir
                    </div>
                    <ul>
                        <li>Un ballon thermodynamique utilise les calories de l'air pour chauffer l'eau, avec un
                            <strong>COP de 2,5 à 3</strong> en conditions normales.</li>
                        <li>Budget fourni-posé pour un 200 L : entre <strong>2 500 et 3 500 € TTC</strong>, avant aides.
                        </li>
                        <li>MaPrimeRénov' + CEE + TVA 5,5 % peuvent réduire le reste à charge de <strong>800 à 1 500
                                €</strong>.</li>
                        <li>Durée de vie observée : <strong>15 à 20 ans</strong> avec un entretien régulier.</li>
                    </ul>
                </div>

                <!-- Table of Contents -->
                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li>Chauffe-eau thermodynamique : comment ça fonctionne ?</li>
                        <li>Les principales configurations d'installation</li>
                        <li>Chauffe-eau électrique vs ballon thermodynamique</li>
                        <li>Bien dimensionner : capacité et V40</li>
                        <li>Prix d'un ballon thermodynamique en 2026</li>
                        <li>Aides financières en 2026</li>
                        <li>Avantages d'un ballon thermodynamique</li>
                        <li>Inconvénients et contraintes</li>
                        <li>Heures creuses et production solaire</li>
                        <li>Entretien et durée de vie</li>
                        <li>Rentabilité : dans quels cas l'investissement est pertinent ?
                        </li>
                        <li>FAQ</li>
                    </ul>
                </div>

                <!-- Section 1 -->
                <h2 id="fonctionnement">Chauffe-eau thermodynamique : comment ça fonctionne ?</h2>
                <p>Un ballon thermodynamique est un chauffe-eau qui récupère les calories présentes dans l'air pour
                    chauffer l'eau. Le système combine une cuve d'eau chaude (en général 150 à 300 litres), un module
                    thermodynamique fonctionnant sur le même principe inversé qu'une <a
                        href="<?php echo BASE_URL; ?>pompe-a-chaleur-air-eau" style="text-decoration: underline;">pompe
                        à chaleur air-eau</a> (compresseur, ventilateur, fluide frigorigène) et une résistance
                    électrique d'appoint classique.</p>
                <p>Le ventilateur aspire l'air, le fluide frigorigène capte les calories, puis le compresseur augmente
                    la température de ce fluide. La chaleur est transférée à l'eau contenue dans la cuve par un
                    échangeur. Ce principe permet d'atteindre un COP (Coefficient de Performance) d'environ 2,5 à 3 en
                    conditions normales : <strong>1 kWh d'électricité consommé permet de produire jusqu'à 3 kWh de
                        chaleur</strong> pour l'eau chaude sanitaire.</p>

                <h3>Le rôle de la résistance d'appoint</h3>
                <p>Lorsque la demande en eau chaude dépasse la capacité de la pompe à chaleur (retour de vacances,
                    plusieurs douches rapprochées) ou quand l'air est trop froid, la résistance électrique prend le
                    relais. Sous des températures extérieures basses, notamment proches de 0 °C, le COP diminue
                    nettement et le fonctionnement se rapproche de celui d'un chauffe-eau électrique classique.</p>

                <!-- Section 2 -->
                <h2 id="configurations">Les principales configurations d'installation</h2>
                <p>Un ballon thermodynamique doit être choisi en fonction de l'air qu'il va utiliser. Trois grandes
                    configurations existent sur le terrain.</p>

                <h3>Modèle sur air ambiant (local non chauffé)</h3>
                <p>L'appareil puise directement l'air de la pièce où il est installé et y rejette un air refroidi. Cette
                    solution est adaptée à un volume de local suffisant (souvent au moins 20 m³) et à une pièce non
                    chauffée (garage, buanderie, grand cellier). Si le volume d'air est trop faible, la machine
                    refroidit rapidement la pièce. Le rendement baisse, la résistance électrique fonctionne davantage,
                    et le confort diminue.</p>

                <blockquote class="article-blockquote">
                    Exemple vécu : ballon thermodynamique posé dans un cellier fermé d'environ 8 m², en mode air
                    ambiant. Pendant l'hiver, la température de la pièce est descendue autour de 2–3 °C. Le congélateur
                    placé à côté a commencé à forcer en continu et de la condensation est apparue sur les murs.
                    L'appareil n'avait pas de problème technique, il manquait simplement de volume d'air. On a dû créer
                    des prises d'air vers l'extérieur et modifier l'installation.
                </blockquote>

                <h3>Modèle sur air extérieur (gaines ou split)</h3>
                <p>Le ballon est installé à l'intérieur, mais il est relié à l'extérieur par deux gaines : une pour
                    l'aspiration de l'air et une pour le rejet de l'air refroidi. C'est la solution la plus fréquente en
                    rénovation, car elle évite de refroidir la pièce intérieure.</p>
                <p>Les versions "split" (à l'image de la gamme réversible complète du <a
                        href="<?php echo BASE_URL; ?>chauffe-eau-thermodynamique-triple-c"
                        style="text-decoration: underline;">chauffe-eau thermodynamique Hitachi Triple C</a>)
                    délocalisent le groupe thermodynamique à l'extérieur, comme une unité de climatisation, et
                    n'ajoutent uniquement que la cuve à l'intérieur du logement. On réduit ainsi le bruit dans la
                    maison, au prix d'une installation plus technique. En climat tempéré, le COP saisonnier reste proche
                    de 3, mais il peut descendre autour de 1,5 lors des périodes de froid marqué.</p>

                <h3>Modèle sur air extrait (raccordé à la VMC)</h3>
                <p>Certains modèles font d'une pierre deux coups et remplacent purement et simplement votre <a
                        href="<?php echo BASE_URL; ?>vmc-simple-flux" style="text-decoration: underline;">VMC simple
                        flux</a>. Les bouches d'extraction de la maison sont reliées au chauffe-eau : la pompe à chaleur
                    capte ainsi les calories de l'air extrait des pièces humides (salle de bain, WC, cuisine), qui est
                    plus chaud et dont la température est constante toute l'année. L'avantage est un excellent rendement
                    moyen annuel. En contrepartie, l'installation est plus exigeante et doit scrupuleusement préserver
                    le renouvellement d'air réglementaire du logement.</p>

                <!-- Section 3 -->
                <h2 id="comparaison">Chauffe-eau électrique vs ballon thermodynamique</h2>
                <p>Avec un chauffe-eau électrique classique, 1 kWh consommé donne 1 kWh de chaleur dans l'eau. Avec un
                    ballon thermodynamique, une partie de la chaleur vient de l'air. En conditions favorables, 1 kWh
                    électrique acheté permet de produire 2,5 à 3 kWh de chaleur.</p>
                <p>Sur une année, la consommation dédiée à l'eau chaude sanitaire peut donc être réduite d'un facteur 2
                    à 3, à installation bien pensée. Il faut cependant garder en tête que le COP varie selon la
                    température de l'air utilisé. Le rendement est plus élevé en mi-saison que par grand froid.</p>

                <h3>Temps de chauffe</h3>
                <p>Le temps nécessaire pour chauffer la cuve est généralement plus long avec un ballon thermodynamique
                    qu'avec un simple cumulus électrique. La pompe à chaleur travaille avec une puissance plus faible,
                    ce qui rend le système économe mais plus lent. Il n'est pas rare qu'il faille 6 à 8 heures pour
                    remonter complètement une cuve froide, contre 4 à 5 heures pour un chauffe-eau électrique.</p>

                <!-- Section 4 -->
                <h2 id="dimensionnement">Bien dimensionner : capacité et V40</h2>
                <p>Les capacités courantes vont de 150 à 300 litres. On pourrait croire qu'il suffit de reprendre la
                    même taille que le ballon électrique existant, mais un paramètre compte encore plus : le
                    <strong>volume à 40 °C (V40)</strong>. Le V40 correspond au volume d'eau réellement disponible au
                    robinet à 40 °C.</p>
                <p>Comme certains ballons thermodynamiques limitent la température de consigne (par exemple à 50–55 °C
                    au lieu de 65 °C) pour préserver le rendement, le V40 peut être inférieur à litrage identique.</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Taille du foyer</th>
                                <th>Capacité recommandée</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2 personnes</td>
                                <td>150 à 200 L</td>
                            </tr>
                            <tr>
                                <td>3 à 4 personnes</td>
                                <td>200 L, parfois 250 L selon les habitudes</td>
                            </tr>
                            <tr>
                                <td>5 personnes et plus</td>
                                <td>250 à 300 L</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <p>L'idée est d'éviter un ballon trop petit (manque d'eau chaude) comme un modèle trop grand qui
                    chauffera de l'eau inutilement.</p>

                <!-- Section 5 -->
                <h2 id="prix">Prix d'un ballon thermodynamique en 2026</h2>

                <h3>Prix du matériel</h3>
                <p>En 2026, les ordres de grandeur pour le matériel seul, sur des marques reconnues, sont les suivants :
                </p>
                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Modèle</th>
                                <th>Fourchette de prix TTC</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>150–200 L</td>
                                <td>2 000 à 3 000 €</td>
                            </tr>
                            <tr>
                                <td>250–300 L</td>
                                <td>2 500 à 4 000 €</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p>Ces fourchettes varient selon le type (air ambiant, air extérieur, split, VMC), le niveau de gamme et
                    les options (programmation avancée, connectivité, préparation solaire).</p>

                <h3>Prix d'un 200 L avec installation</h3>
                <p>Pour un chauffe-eau thermodynamique de 200 L fourni et posé, le budget global se situe en moyenne
                    entre <strong>2 500 et 3 500 € TTC</strong>, installation comprise. Cela correspond à un
                    remplacement d'ancien ballon avec adaptation raisonnable de la plomberie et de l'alimentation
                    électrique. Les chantiers nécessitant des percements complexes, de longues gaines ou un système
                    split peuvent dépasser ces montants.</p>

                <h3>Coût d'installation</h3>
                <p>La main-d'œuvre représente généralement entre <strong>800 et 1 500 € TTC</strong> selon la
                    configuration (accès, percements, liaisons frigorifiques pour les modèles split, évacuation de
                    condensats à créer). Plus l'installation s'éloigne d'un simple "remplacement à l'identique", plus ce
                    poste augmente.</p>

                <!-- Section 6 -->
                <h2 id="aides">Aides financières en 2026 : MaPrimeRénov', CEE et TVA</h2>
                <p>Le chauffe-eau thermodynamique bénéficie d'aides publiques, sous conditions, en 2026 :</p>
                <ul class="custom-list">
                    <li><strong>MaPrimeRénov' :</strong> montant compris entre 400 et 1 200 € selon le niveau de revenus
                        du ménage.</li>
                    <li><strong>Primes CEE (Certificats d'Économies d'Énergie) :</strong> prime versée par les
                        fournisseurs d'énergie, généralement cumulable avec MaPrimeRénov'.</li>
                    <li><strong>TVA à 5,5 %</strong> sur la fourniture et la pose, pour un logement achevé depuis plus
                        de 2 ans.</li>
                </ul>
                <p>Les principaux critères d'éligibilité : logement en résidence principale, bâtiment de plus de 15 ans
                    pour MaPrimeRénov' (sauf exceptions), et installation réalisée par une entreprise RGE (Reconnu
                    Garant de l'Environnement).</p>
                <p>Sur un projet à 3 000 € TTC, cumuler MaPrimeRénov' et les primes CEE permet, dans certains cas, de
                    réduire le coût à charge de 800 à 1 500 €.</p>

                <!-- Section 7 -->
                <h2 id="avantages">Avantages d'un ballon thermodynamique</h2>
                <p>Les points forts, lorsqu'il est bien dimensionné et posé dans de bonnes conditions, sont les suivants
                    :</p>
                <ul class="custom-list">
                    <li><strong>Baisse importante de la consommation d'électricité</strong> pour l'eau chaude, souvent
                        par un facteur 2 à 3.</li>
                    <li><strong>Éligibilité aux principales aides publiques</strong>, ce qui réduit le coût net pour le
                        ménage.</li>
                    <li><strong>Durée de vie comparable</strong> à celle d'un chauffe-eau classique (15 à 20 ans en
                        moyenne).</li>
                </ul>
                <p>Sur plusieurs années, la différence sur les factures finit par compenser le surcoût à l'achat par
                    rapport à un cumulus.</p>

                <!-- Section 8 -->
                <h2 id="inconvenients">Inconvénients et contraintes à prendre en compte</h2>

                <h3>Bruit</h3>
                <p>Le groupe thermodynamique (ventilateur et compresseur) produit un bruit comparable à celui d'un
                    réfrigérateur ou d'une VMC un peu sonore. Installé trop proche des pièces de nuit, il peut être
                    perçu comme gênant. Il est donc préférable de le placer dans un local technique, un garage ou une
                    buanderie, ou d'opter pour un modèle split pour éloigner la source sonore.</p>

                <h3>Encombrement</h3>
                <p>Le ballon thermodynamique est plus volumineux qu'un chauffe-eau électrique simple. Il faut vérifier
                    la hauteur disponible, l'espace tout autour pour les raccordements d'air et d'eau, et l'emplacement
                    de l'évacuation des condensats.</p>

                <h3>Rendement variable</h3>
                <p>Le rendement dépend directement de la température de l'air. Sur air extérieur, les performances sont
                    très bonnes en mi-saison, mais se dégradent lors des périodes de froid : le COP baisse, les temps de
                    chauffe s'allongent, et la résistance électrique intervient plus souvent.</p>

                <h3>Entretien</h3>
                <p>L'entretien reste limité mais non nul. Sur la durée, il est important de nettoyer les grilles et
                    filtres d'aspiration d'air, de vérifier le bon écoulement des condensats et de faire contrôler
                    l'installation selon les préconisations du fabricant. Un entretien négligé peut réduire la durée de
                    vie de l'appareil.</p>

                <!-- Section 9 -->
                <h2 id="heures-creuses">Heures pleines, heures creuses et production solaire</h2>
                <p>Avec un cumulus classique, le pilotage en heures creuses est quasi systématique. Avec un ballon
                    thermodynamique sur air extérieur, concentrer le fonctionnement la nuit, quand l'air est le plus
                    froid, peut diminuer le COP et réduire l'intérêt économique du système.</p>
                <p>Il est souvent plus pertinent de laisser l'appareil fonctionner sur une plage horaire élargie, de
                    profiter des périodes où l'air extérieur est le plus doux en pleine journée et, si votre toit est
                    équipé, de synchroniser les cycles de chauffe avec la production d'électricité générée par vos <a
                        href="<?php echo BASE_URL; ?>panneaux-photovoltaiques"
                        style="text-decoration: underline;">panneaux photovoltaïques</a>. Presque tous les modèles
                    récents intègrent d'ailleurs un contact "Smart Grid" conçu sur mesure pour avaler gratuitement le
                    surplus de la production solaire.</p>

                <!-- Section 10 -->
                <h2 id="entretien">Entretien et durée de vie</h2>
                <p>Sur un ballon thermodynamique bien posé et entretenu, la durée de vie observée est de l'ordre de
                    <strong>15 à 20 ans</strong>.</p>
                <p>Pour y parvenir, il est recommandé de nettoyer régulièrement les entrées d'air, de surveiller les
                    éventuels messages de défaut sur l'afficheur et de faire réviser l'ensemble au moins tous les 2 ans.
                    Dans les régions dures, poser un <a href="<?php echo BASE_URL; ?>adoucisseur-deau"
                        style="text-decoration: underline;">adoucisseur d'eau professionnel</a> sur l'arrivée générale
                    est souvent conseillé, car le calcaire reste la cause numéro un de casse prématurée sur les
                    serpentins d'échange thermique.</p>

                <!-- Section 11 -->
                <h2 id="rentabilite">Rentabilité : dans quels cas l'investissement est pertinent ?</h2>
                <p>Le ballon thermodynamique est particulièrement adapté aux maisons chauffées à l'électricité, aux
                    foyers de 3 à 5 personnes et aux logements disposant d'un local compatible (volume suffisant ou
                    accès simple à l'air extérieur).</p>
                <p>Pour ce type de profil, l'investissement net après aides et les économies d'énergie annuelles
                    permettent généralement un amortissement en quelques années, puis une réduction durable des charges.
                </p>
                <p>Dans un logement mal adapté (pas de volume disponible, impossibilité de passer des gaines, climat
                    très froid), le gain peut être beaucoup plus limité. Il faut alors comparer avec d'autres solutions
                    (cumulus optimisé, solaire, etc.).</p>

                <!-- Section 12 FAQ -->
                <h2 id="faq">FAQ</h2>

                <h3>Quels sont les principaux inconvénients d'un ballon thermodynamique ?</h3>
                <p>Le bruit du groupe thermodynamique, l'encombrement, la dépendance à la température de l'air et la
                    nécessité d'un emplacement adapté. Une installation mal étudiée peut fortement dégrader les
                    performances et le confort.</p>

                <h3>Est-il rentable d'investir dans un chauffe-eau thermodynamique ?</h3>
                <p>Pour un foyer tout électrique de taille moyenne, l'appareil devient généralement rentable sur
                    quelques années grâce à la baisse de consommation et aux aides publiques, si l'installation est bien
                    dimensionnée et bien placée.</p>

                <h3>Est-ce qu'un ballon thermodynamique consomme beaucoup d'électricité ?</h3>
                <p>Il consomme moins qu'un chauffe-eau classique pour un service équivalent, avec un COP moyen annuel
                    souvent compris entre 2,5 et 3, même si ce COP baisse lors des périodes de froid.</p>

                <h3>Quel est le prix d'un ballon thermodynamique de 200 litres avec installation ?</h3>
                <p>En 2026, le budget typique pour un 200 L fourni et posé se situe entre 2 500 et 3 500 € TTC, selon la
                    marque et la complexité du chantier.</p>

                <h3>Quelle est la durée de vie d'un ballon thermodynamique ?</h3>
                <p>La durée de vie observée se situe généralement entre 15 et 20 ans, à condition de respecter les
                    préconisations d'entretien et d'adapter l'installation aux contraintes du logement.</p>

                <h3>Quel est le coût d'installation d'un chauffe-eau thermodynamique ?</h3>
                <p>La main-d'œuvre représente en moyenne 800 à 1 500 € TTC, selon que l'on se trouve sur un simple
                    remplacement ou sur une installation plus lourde avec percements et liaisons spécifiques.</p>

                <h3>Quelle différence entre un ballon thermodynamique et un chauffe-eau thermodynamique triple C ?</h3>
                <p>Le <a href="https://www.cemarenov.fr/chauffe-eau-thermodynamique-triple-c">chauffe-eau thermodynamique Triple C</a> est une évolution du ballon thermodynamique standard qui combine trois échangeurs : un échangeur air-eau, un échangeur solaire et un appoint électrique. Il atteint des COP plus élevés et peut fonctionner en complément d'un système photovoltaïque, notre guide détaille ses avantages spécifiques par rapport à un ballon thermodynamique classique.</p>

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
                <h3>L'essentiel à retenir</h3>
                <p>
                    Le ballon thermodynamique est une solution efficace pour réduire la facture d'eau chaude, à
                    condition de respecter les règles d'installation : un volume d'air suffisant, un dimensionnement
                    adapté au foyer et un entretien régulier. Avec les aides disponibles en 2026, le reste à charge
                    devient raisonnable pour la majorité des ménages. L'investissement se rentabilise en quelques
                    années, puis vous profitez d'économies durables sur vos factures.
                </p>
                <a href="<?php echo BASE_URL; ?>contact" class="btn-primary">Demander un devis chauffe-eau</a>
            </div>

            <!-- Similar Articles (below conclusion) -->
            <section class="similar-articles">
                <h3 class="similar-title">Articles similaires</h3>
                <div class="similar-grid">
                    <?php foreach ($similar_articles as $art): ?>
                        <a href="<?php echo $art['url'] ?? '#'; ?>" class="similar-card">
                            <div class="similar-img">
                                <img src="<?php echo $art['image']; ?>"
                                    alt="<?php echo htmlspecialchars($art['title']); ?>">
                            </div>
                            <h4><?php echo htmlspecialchars($art['title']); ?></h4>
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
                    <h3 class="sidebar-title">Derniers articles — <?php echo htmlspecialchars($category['name']); ?>
                    </h3>
                    <?php foreach ($cat_articles as $art): ?>
                        <a href="<?php echo $art['url'] ?? '#'; ?>" class="sidebar-article-card">
                            <img src="<?php echo $art['image']; ?>" alt="<?php echo htmlspecialchars($art['title']); ?>">
                            <span><?php echo htmlspecialchars($art['title']); ?></span>
                        </a>
                        <?php
                    endforeach; ?>
                </div>

                <div class="sidebar-block">
                    <h3 class="sidebar-title">Les plus récents</h3>
                    <?php foreach ($latest_articles as $art): ?>
                        <a href="<?php echo $art['url'] ?? '#'; ?>" class="sidebar-article-card">
                            <img src="<?php echo $art['image']; ?>" alt="<?php echo htmlspecialchars($art['title']); ?>">
                            <span><?php echo htmlspecialchars($art['title']); ?></span>
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