<?php
/**
 * isolation-thermique-exterieur-ite.php
 * Article: Isolation thermique par l'extérieur (ITE) : prix, aides et pièges à éviter
 */

// Article metadata — scanned by functions.php to populate homepage/categories/sidebars
$article_meta = [
    'title' => 'Isolation Extérieure (ITE) : Prix 2026, Aides et Pièges',
    'category' => 'renovation',
    'image' => 'https://www.cemarenov.fr/image/isolation thermique exterieur ite2.webp',
    'excerpt' => 'Marre de chauffer le jardin ? 📉 Découvrez le vrai prix au m² de l\'isolation thermique extérieure (ITE), les aides 2026 et les arnaques à éviter !',
    'date' => '2026-03-09',
    'reading_time' => 7,
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
                <span>Isolation extérieure (ITE)</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Énergie</span>
                <span class="article-tag">Façade</span>
            </div>

            <h1>Isolation Thermique par l'Extérieur :<br>
                <span class="h1-accent">Prix au m², Aides (2026) et Pièges</span>
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
                Vous en avez marre de chauffer le jardin en hiver et de suffoquer en été ? L'<strong>isolation thermique
                    par l'extérieur (ITE)</strong> est le seul moyen radical de couper les ponts thermiques sans perdre
                le moindre mètre carré de surface habitable. Mais attention : entre les promesses des commerciaux et la
                réalité du chantier, il y a un gouffre. Voici ce que vous devez vraiment savoir sur les prix, les
                matériaux et les erreurs qui coûtent très cher.
            </p>

            <div class="article-content">

                <!-- TL;DR Box -->
                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                        </svg>
                        L'ITE en 3 points
                    </div>
                    <ul>
                        <li><strong>Le principe :</strong> On enveloppe la maison d'un manteau isolant. 0 perte de place
                            à l'intérieur, ravalement de façade inclus.</li>
                        <li><strong>Le prix 2026 :</strong> Comptez entre 150 € et 250 € du m², pose comprise. C'est
                            lourd, mais MaPrimeRénov' absorbe une grosse partie de la facture.</li>
                        <li><strong>La meilleure technique :</strong> L'ITE sous enduit (avec Polystyrène ou laine
                            minérale) est la plus courante. Le bardage est plus esthétique mais plus cher.</li>
                    </ul>
                </div>

                <!-- Table of Contents -->
                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li><a href="#definition">1. Qu'est-ce que l'ITE et pourquoi la préférer ?</a></li>
                        <li><a href="#solutions">2. Solutions d'ITE : isolation sous enduit ou sous bardage ?</a></li>
                        <li><a href="#isolants">3. Les meilleurs isolants pour sa façade (PSE, Laine, Biosourcé)</a>
                        </li>
                        <li><a href="#prix">4. Prix au m² d'une ITE et nouvelles normes d'aides 2026</a></li>
                        <li><a href="#pieges">5. Inconvénients et pièges à éviter lors des travaux</a></li>
                        <li><a href="#faq">6. FAQ sur l'isolation thermique extérieure</a></li>
                    </ul>
                </div>

                <!-- Section 1 -->
                <h2 id="definition">1. Qu'est-ce que l'ITE et pourquoi la préférer à l'isolation intérieure ?</h2>
                <p>L'isolation thermique par l'extérieur, qu'on appelle plus souvent le "mur manteau", consiste à fixer
                    une couche d'isolant sur toutes les façades de la maison, puis à la recouvrir d'un parement (crépi
                    ou bardage). L'objectif est simple : envelopper complètement la bâtisse pour bloquer le froid dehors
                    et garder la chaleur dedans.</p>

                <img src="<?php echo BASE_URL; ?>image/isolation thermique exterieur ite1.webp"
                    alt="Schéma en coupe d'une façade montrant les différentes couches d'une l'ITE : mur porteur, colle, panneau isolant, treillis et enduit de finition"
                    style="width: 100%; border-radius: 12px; margin: 2rem 0; box-shadow: 0 5px 15px rgba(0,0,0,0.05); object-fit: cover; aspect-ratio: 16/9;">

                <p>Pourquoi tous les experts de l'énergie poussent vers l'extérieur plutôt que de plaquer du placo à
                    l'intérieur (ITI) ? Pour trois raisons majeures :</p>
                <ul class="custom-list">
                    <li><strong>Zéro perte de surface habitable :</strong> Si vous posez 15 cm d'isolant avec une <a
                            href="<?php echo BASE_URL; ?>isolation-thermique-interieur-iti"
                            style="text-decoration: underline;">isolation thermique par l'intérieur (ITI)</a> classique
                        sur tous vos murs, vous perdez facilement l'équivalent d'une petite pièce sur une maison de 100
                        m². L'ITE préserve votre espace de vie vital.</li>
                    <li><strong>L'éradication de tous les ponts thermiques :</strong> Avec une isolation intérieure, le
                        froid passe quand même par les dalles d'étage et les murs de refend. L'enveloppe extérieure
                        coupe net ces fuites thermiques à la source.</li>
                    <li><strong>Le ravalement 2-en-1 :</strong> Vous faites d'une pierre deux coups. L'extérieur de la
                        maison fait peau neuve en même temps que ses performances énergétiques explosent. C'est idéal
                        pour valoriser son bien.</li>
                </ul>

                <!-- Section 2 -->
                <h2 id="solutions">2. Solutions d'ITE : isolation sous enduit ou sous bardage ?</h2>
                <p>Il existe deux grandes familles pour réaliser votre ravalement isolant. Le choix final va dépendre de
                    votre budget, de l'état de vos murs, mais surtout du PLU (Plan Local d'Urbanisme) de votre commune,
                    qui peut interdire certaines finitions (comme le bardage en PVC dans les zones classées).</p>

                <h3>L'isolation extérieure sous enduit (la plus courante)</h3>
                <p>C'est de loin le système le plus posé en France. On vient coller (et parfois cheviller en plus) des
                    panneaux isolants rigides directement sur la maçonnerie existante. Par-dessus, l'artisan applique un
                    sous-enduit technique armé d'un treillis en fibre de verre pour garantir la solidité mécanique
                    (anti-fissuration), puis un enduit de finition (le fameux <a
                        href="<?php echo BASE_URL; ?>crepi-facade" style="text-decoration: underline;">crépi de
                        façade</a>). C'est la solution la plus
                    économique pour retrouver un aspect de maison traditionnelle (finition grattée, talochée, etc.).</p>

                <h3>L'isolation par l'extérieur sous bardage (la plus protectrice)</h3>
                <p>Ici, la méthode change. On fixe une ossature (en bois ou métallique) sur le mur porteur. On insère
                    l'isolant (souvent de la laine minérale) entre les montants, on laisse une petite lame d'air vitale
                    pour ventiler, puis on fixe un parement de revêtement par-dessus. Ce <a
                        href="<?php echo BASE_URL; ?>bardage-decoratif" style="text-decoration: underline;">bardage
                        décoratif</a> peut être en clin de
                    bois naturel, en PVC, ou en matériaux composites. C'est parfait si vos murs d'origine sont très
                    abîmés ou très humides, car la structure "respire" de manière optimale de bas en haut.</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Critère</th>
                                <th>ITE sous enduit mince</th>
                                <th>ITE sous bardage ventilé</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Prix au m²</strong></td>
                                <td>Plus économique (dès 150 €/m²)</td>
                                <td>Plus cher (souvent > 200 €/m²)</td>
                            </tr>
                            <tr>
                                <td><strong>Esthétique</strong></td>
                                <td>Classique (aspect crépi neuf ou ancien refait)</td>
                                <td>Moderne (bois, zinc, composite, fibres-ciment)</td>
                            </tr>
                            <tr>
                                <td><strong>Durée de vie</strong></td>
                                <td>Excellente, craint juste les gros chocs</td>
                                <td>Ultra robuste, mais le bois nécessite de l'entretien</td>
                            </tr>
                            <tr>
                                <td><strong>Respirabilité</strong></td>
                                <td>Dépend de l'isolant (souvent étanche avec le PSE)</td>
                                <td>Toujours parfaite grâce à la lame d'air derrière le bardage</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Section 3 -->
                <h2 id="isolants">3. Les meilleurs isolants pour sa façade (PSE, Laine, Biosourcé)</h2>
                <p>Le choix du matériau est critique. Mettre un mauvais isolant sur un mauvais mur, c'est la garantie
                    absolue de voir de la moisissure apparaître dans quelques années à l'intérieur de la maison. Voici
                    les grandes options sur le marché.</p>

                <img src="<?php echo BASE_URL; ?>image/isolation thermique exterieur ite2.webp"
                    alt="Artisan posant des panneaux rigides de fibre de bois biosourcé sur la façade d'une maison ancienne"
                    style="width: 100%; border-radius: 12px; margin: 2rem 0; box-shadow: 0 5px 15px rgba(0,0,0,0.05); object-fit: cover; aspect-ratio: 16/9;">

                <h3>Le Polystyrène Expansé (PSE) : le choix économique</h3>
                <p>C'est la star incontestée des chantiers d'ITE grand public. Qu'il soit blanc classique ou gris
                    graphité (le gris contient du graphite qui le rend 20% plus performant à épaisseur égale), le PSE
                    est léger, facile à travailler et imbattable sur le prix de revient. <strong>Son énorme défaut ? Il
                        est étanche.</strong> Il ne laisse pas passer la vapeur d'eau.</p>

                <h3>La Laine de roche : le rempart anti-feu et phonique</h3>
                <p>Contrairement au polystyrène, la laine de roche ou la laine minérale est <em>perspirante</em> : elle
                    laisse s'échapper l'humidité du bâti vers l'extérieur. Elle offre également une isolation acoustique
                    bien supérieure pour les maisons situées près des grands axes de circulation, et possède un atout de
                    taille : elle est incombustible (classée A1 au feu). C'est le meilleur compromis technique
                    coût/performance.</p>

                <h3>La Fibre de bois : le confort d'été absolu</h3>
                <p>Pour le biosourcé, c'est la Rolls. Très dense (haute inertie), la fibre de bois offre un "déphasage
                    thermique" exceptionnel. La chaleur du soleil d'août met tellement de temps à traverser l'isolant
                    (souvent plus de 12 heures) qu'elle n'atteint l'intérieur de la maison qu'à la nuit tombée,
                    <em>quand vous pouvez enfin ouvrir les fenêtres pour aérer.</em> C'est la garantie de conserver des
                    pièces fraîches en pleine canicule.
                </p>

                <blockquote class="article-blockquote">
                    <strong>L'avis terrain de l'artisan :</strong><br>
                    Sur mes chantiers, je suis intraitable : je refuse catégoriquement de poser par collage du PSE sur
                    de vieilles bâtisses en pierre ou en grès antérieures à 1950. Ces vieux murs épais ont un besoin
                    vital de transpirer l'humidité qui remonte naturellement du sol par capillarité. Si vous les
                    emballez dans du polystyrène étanche, la condensation va exploser à l'intérieur derrière vos
                    plinthes. Sur l'ancien, c'est laine de roche ou fibre de bois obligatoire !
                </blockquote>

                <!-- Section 4 -->
                <h2 id="prix">4. Prix au m² d'une ITE et nouvelles normes d'aides 2026</h2>
                <p>Le prix moyen d'une isolation thermique par l'extérieur navigue entre <strong>150 € et 250 € par
                        mètre carré</strong>, matériel, montage de l'échafaudage et main-d'œuvre inclus. Oui, le ticket
                    d'entrée pique souvent autour des 15 000 à 25 000 € pour les façades d'une maison standard.
                    Heureusement, c'est le poste de travaux le plus subventionné par l'État.</p>

                <p>Pour faire baisser cette facture astronomique en 2026, vous devez <strong>absolument</strong> passer
                    par une entreprise certifiée RGE (Reconnu Garant de l'Environnement) et poser une épaisseur
                    d'isolant assurant une résistance thermique (le fameux "R") d'au minimum <strong>3,7
                        m².K/W</strong>. Si vous hésitez sur la répartition entre travaux à confier à un pro et ceux que vous pouvez assumer en DIY, notre guide sur la <strong><u><a href="<?php echo BASE_URL; ?>artisan-renovation-conseils-travaux-diy">stratégie artisan/DIY en rénovation</a></u></strong> vous aidera à maximiser les aides tout en préservant votre budget.</p>

                <ul class="custom-list">
                    <li><strong>MaPrimeRénov' :</strong> L'aide de l'Anah, conditionnée à la couleur de vos revenus
                        (Bleu, Jaune, Violet, Rose). Elle plafonne l'aide au m² posé. Elle est souvent plus généreuse si
                        l'ITE s'inscrit dans une rénovation d'ampleur avec un audit énergétique préalable.</li>
                    <li><strong>Les CEE (Certificats d'Économies d'Énergie) :</strong> Les fameuses primes Énergie
                        versées par les pollueurs (fournisseurs de gaz, fioul ou supermarchés). Elles sont tout à fait
                        cumulables avec MPR.</li>
                    <li><strong>L'éco-PTZ et la TVA réduite (5,5%) :</strong> Un prêt immobilier à taux zéro pour étaler
                        le financement de votre reste à charge sans payer un centime d'intérêts à la banque.</li>
                </ul>

                <!-- Section 5 -->
                <h2 id="pieges">5. Inconvénients et pièges à éviter lors des travaux de façade</h2>
                <p>Les plaquettes glacées en papier brillant des gros fabricants vous montrent toujours de belles
                    maisons lisses et achevées. Mais la réalité et la configuration d'un chantier de rénovation
                    demandent un peu plus de technicité et d'anticipation pour éviter de se faire avoir.</p>

                <img src="<?php echo BASE_URL; ?>image/isolation thermique exterieur ite3.webp"
                    alt="Vue rapprochée d'une fenêtre encastrée depuis l'extérieur après la pose d'une ITE, montrant le renfoncement de la vitre"
                    style="width: 100%; border-radius: 12px; margin: 2rem 0; box-shadow: 0 5px 15px rgba(0,0,0,0.05); object-fit: cover; aspect-ratio: 16/9;">

                <div
                    style="background: var(--color-light); padding: 1.5rem; border-left: 4px solid #e74c3c; margin-bottom: 2rem; border-radius: 0 8px 8px 0;">
                    <h4 style="margin-top: 0; color: #c0392b;">Piège n°1 : La gestion bâclée des points singuliers</h4>
                    <p style="margin-bottom: 0;">C'est là qu'on reconnaît les vrais artisans couvreurs ou façadiers.
                        Avec 15 à 20 centimètres d'isolant rajoutés sur vos extérieurs, vos appuis de fenêtres vont être
                        trop courts. Il faut poser de nouvelles bavettes en aluminium laqué. Même chose pour les
                        descentes de gouttières qu'il faut déporter avec de nouveaux colliers, ou le débord de toiture
                        qui, s'il est trop court pour abriter le nouveau mur, obligera le charpentier à intervenir pour
                        y ajouter des planches de rive.</p>
                </div>

                <div
                    style="background: var(--color-light); padding: 1.5rem; border-left: 4px solid #f39c12; margin-bottom: 2rem; border-radius: 0 8px 8px 0;">
                    <h4 style="margin-top: 0; color: #d35400;">Piège n°2 : L'effet "meurtrière" sur la luminosité</h4>
                    <p style="margin-bottom: 0;">L'épaisseur du "mur manteau" modifie la géométrie autour de vos
                        menuiseries existantes. Vos fenêtres se retrouvent beaucoup plus enfoncées "en tunnel", ce qui
                        réduit mécaniquement l'angle de pénétration latéral de la lumière naturelle à l'intérieur du
                        logement. La solution technique (déplacer les fenêtres au nu extérieur) est possible, mais hors
                        de prix.</p>
                </div>

                <div
                    style="background: var(--color-light); padding: 1.5rem; border-left: 4px solid #34495e; margin-bottom: 2rem; border-radius: 0 8px 8px 0;">
                    <h4 style="margin-top: 0; color: #2c3e50;">Piège n°3 : Les devis en ligne expédiés ou au rabais</h4>
                    <p style="margin-bottom: 0;">Fuyez les sociétés qui pratiquent des prix cassés à la chaîne. Leurs
                        devis "oublient" souvent des postes chiffrés critiques comme la sécurisation, le traitement
                        obligatoire des soubassements enterrés (la partie en contact avec le sol, qui demande un
                        polystyrène extrudé XPS hydrofuge résistant aux chocs et à l'eau de la terre), ou la dépose de
                        vos unités de climatisation extérieures.</p>
                </div>

                <!-- Section 6 -->
                <h2 id="faq">6. FAQ sur l'isolation thermique extérieure</h2>

                <h3>Est-il vraiment rentable d'isoler sa maison par l'extérieur ?</h3>
                <p>Absolument, sans le moindre doute. Outre la réduction drastique de votre facture de gaz ou
                    d'électricité pour le chauffage (25 à 30% d'économies en moyenne sur l'année), l'ITE vous fait
                    gagner plusieurs lettres sur votre DPE (Diagnostic de Performance Énergétique). Sous la contrainte
                    de la nouvelle loi Climat, une maison qui passe ainsi d'une étiquette de passoire thermique (F ou G)
                    à une lettre plus vertueuse (C ou D) voit sa valeur de revente sur le marché immobilier bondir
                    immédiatement (la fameuse "valeur verte").</p>

                <h3>Faut-il demander une autorisation à la mairie pour faire une ITE ?</h3>
                <p>Oui, à 100%. Comme l'ITE modifie l'aspect extérieur visuel de la bâtisse (l'épaisseur modifie
                    l'emprise au sol, la couleur du nouveau crépi, ou le bardage masque l'ancien mur en pierre), le
                    dépôt d'une Déclaration Préalable (DP) de travaux au service urbanisme de votre mairie est
                    incontournable. Le délai d'instruction est de 1 mois. Attention, si vous avez le malheur d'être loti
                    en secteur classé et protégé, le choix de la finition extérieure vous sera alors lourdement
                    restreint par les directives des Architectes des Bâtiments de France (ABF) qui exigent des finitions
                    spécifiques.</p>

                <h3>Est-ce que l'isolation par l'extérieur empêche l'humidité ou les moisissures ?</h3>
                <p>L'ITE empêche totalement la condensation liée aux chocs thermiques (l'air de la maison chaud qui
                    percute un mur glacé) de se former sur vos murs intérieurs en hiver. Cette moisissure de surface
                    noire est totalement éradiquée. En revanche, si vous avez des problèmes d'humidité qui remontent du
                    sol via les fondations (remontées capillaires qu'il faudra bloquer via un <a
                        href="<?php echo BASE_URL; ?>traitement-humidite" style="text-decoration: underline;">traitement
                        drastique contre l'humidité</a>), l'ITE ne les règlera jamais. Pire, si
                    l'artisan a collé un isolant 100% étanche (PSE) dessus sans diagnostic, l'ITE va complètement
                    emprisonner et bloquer cette eau dans la maçonnerie, qui finira par pourrir vos solives intérieures.
                </p>

                <h3>Existe-t-il une solution moins invasive que l'ITE pour réduire la chaleur ?</h3>
                <p>Pour les toitures exposées, une <a href="https://www.cemarenov.fr/peinture-thermique-toiture">peinture thermique réfléchissante</a> peut être appliquée sur les tuiles ou le bac acier : elle réfléchit jusqu'à 90 % des rayonnements infrarouges et peut réduire la température sous toiture de 5 à 10 °C. C'est une solution complémentaire à l'ITE, pas un substitut, mais elle ne nécessite pas de travaux lourds.</p>

                <h3>L'ITE fait-elle partie d'une rénovation globale de façade ?</h3>
                <p>Oui, l'ITE s'intègre dans un projet de <a href="https://www.cemarenov.fr/renovation-de-facade">rénovation de façade</a> complète. Elle est généralement réalisée après la reprise des fissures et avant la pose du crépi ou enduit de finition. Le financement est optimisé quand l'ITE est couplée avec d'autres travaux d'amélioration énergétique dans un dossier MaPrimeRénov' global.</p>

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
                <h3>Prêt à offrir un manteau thermique à votre maison ?</h3>
                <p>
                    L'isolation thermique par l'extérieur demeure l'investissement pécuniaire le plus lourd pour refaire
                    sa façade, mais il reste le seul qui tranche significativement dans la facture de chauffage tout en
                    valorisant durablement votre patrimoine à la revente. Ne confiez jamais ce chantier crucial, qui
                    demande une technique pointue, entre les mains de commerciaux agressifs faisant du porte-à-porte.
                </p>
                <a href="<?php echo BASE_URL; ?>contact" class="btn-primary">Comparer des devis certifiés RGE locaux</a>
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