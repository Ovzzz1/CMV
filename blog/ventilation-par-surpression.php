<?php
/**
 * ventilation-par-surpression.php
 * Article: Ventilation par Surpression
 */

// Article metadata — scanned by functions.php to populate homepage/categories/sidebars
$article_meta = [
    'title' => 'Ventilation par surpression (VMI) : prix, avantages et installation',
    'category' => 'renovation',
    'image' => 'https://www.cemarenov.fr/image/ventilation%20par%20surpression1.webp',
    'excerpt' => 'Découvrez la ventilation par surpression (VMI/VPS), une solution efficace pour purifier votre air intérieur, éradiquer la condensation et réaliser des économies de chauffage.',
    'date' => '2026-03-10',
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
                <span>Ventilation par surpression</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Ventilation</span>
                <span class="article-tag">Humidité</span>
            </div>

            <h1>Ventilation par Surpression :<br>
                <span class="h1-accent">Prix, Avantages et Guide d'Installation</span>
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
                Saviez-vous que l'air intérieur de votre logement peut être jusqu'à 5 fois plus pollué que l'air
                extérieur, souvent sans même s'en rendre compte ? Face aux défis persistants de l'humidité, des
                allergènes et d'une facture de chauffage qui s'alourdit, l'installation d'une <strong>ventilation par
                    surpression</strong> devient une approche intelligente. Cette innovation promet bien plus qu'un
                simple renouvellement d'air.
            </p>

            <figure style="margin: 2rem 0; max-width: 100%;">
                <img style="width: 100%; height: auto; border-radius: 12px; display: block; box-shadow: 0 5px 15px rgba(0,0,0,0.05);" src="<?php echo BASE_URL; ?>image/ventilation%20par%20surpression1.webp"
                    alt="Installation d'un caisson de ventilation par surpression dans la buanderie d'une maison">
                <figcaption style="text-align: center; font-size: 0.9rem; color: #64748b; margin-top: 10px; font-style: italic; padding: 0 10px;">L'unité centrale de la VMI est souvent installée dans les combles ou les buanderies pour
                    prélever un air centralisé et le réchauffer discrètement.</figcaption>
            </figure>

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
                            <strong>ventilation par surpression</strong> (VMI ou VPS) insuffle de l'air neuf filtré et
                            préchauffé dans la maison, créant une légère couverture de surpression.</li>
                        <li style="position: relative; padding-left: 1.5rem; margin-bottom: 0.5rem;"><span
                                style="position: absolute; left: 0; color: var(--color-primary);">■</span> Cette action
                            chasse naturellement l'<strong>air vicié</strong> et l'humidité de condensation vers
                            l'extérieur par les bouches d'aération existantes, asséchant totalement vos murs froids.
                        </li>
                        <li style="position: relative; padding-left: 1.5rem; margin-bottom: 0.5rem;"><span
                                style="position: absolute; left: 0; color: var(--color-primary);">■</span> Face à une
                            VMC traditionnelle, elle offre une maîtrise accrue contre les pollens, prévient activement
                            les moisissures et offre un meilleur confort thermique pour un investissement malin de
                            rénovation.</li>
                    </ul>
                </div>

                <!-- Table of Contents -->
                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li>Qu'est-ce que la Ventilation par Surpression (VMI/VPS) ?</li>
                        <li>Les Avantages Incontestables de l'Insufflation</li>
                        <li>Ventilation par Surpression vs VMC : Le Match Détaillé</li>
                        <li>Installation et Entretien : Tout ce qu'il faut savoir</li>
                        <li>Défis spécifiques : Gaz radon et rénovation</li>
                        <li>Vos Questions Fréquentes (FAQ)</li>
                    </ul>
                </div>

                <h2 id="definition">Qu'est-ce que la Ventilation par Surpression (VMI/VPS) ?</h2>
                <p>La <strong>ventilation par surpression</strong>, souvent désignée par les acronymes VMI (Ventilation
                    Mécanique par Insufflation) ou VPS (Ventilation Positive par Surpression), représente une approche
                    novatrice et proactive du renouvellement de l'air ambiant. Contrairement aux VMC traditionnelles qui
                    aspirent l'air (dépression), la surpression se fonde sur l'insufflation mécanique d'air neuf et
                    filtré depuis un point central.</p>

                <p>Le système aspire l'air extérieur, le filtre méticuleusement pour éliminer les <strong>particules
                        fines</strong>, les pollens et les allergènes. L'hiver, une petite résistance intégrée vient
                    préchauffer cet air très froid avant de le diffuser de manière douce dans le "centre" de la maison
                    (souvent via un seul diffuseur placé dans le couloir). Les appareils haut de gamme ajustent
                    automatiquement le débit en analysant l'humidité absolue pour éviter le gaspillage énergétique.</p>

                <figure style="margin: 2rem 0; max-width: 100%;">
                    <img style="width: 100%; height: auto; border-radius: 12px; display: block; box-shadow: 0 5px 15px rgba(0,0,0,0.05);" src="<?php echo BASE_URL; ?>image/ventilation%20par%20surpression2.webp"
                        alt="Les pollens et pollutions extérieurs sont stoppés nets par la surpression qui les empêche de rentrer par les défauts des menuiseries">
                    <figcaption style="text-align: center; font-size: 0.9rem; color: #64748b; margin-top: 10px; font-style: italic; padding: 0 10px;">La surpression crée un bouclier physique : l'air propre chasse continuellement l'air
                        pollué vers la périphérie de la maison.</figcaption>
                </figure>

                <h3>Le mécanisme du bouclier thermique</h3>
                <p>Le fait d'insuffler de l'air de façon modérée met la maison en "légère pression". Résultat : L'air
                    vicié chargé d'<strong>humidité de condensation</strong> présent dans les salles de bain et la
                    cuisine est "poussé" hors du domicile via les bouches de sortie. Fini le froid qui pénètre
                    subitement par les grilles d'aération des fenêtres puisqu'ici... c'est l'air de la maison qui sort
                    par les fenêtres !</p>

                <h2 id="avantages">Les Avantages Incontestables de l'Insufflation</h2>
                <p>Cette approche inverse les codes et offre un bouquet de solutions face aux maladies chroniques du
                    bâtiment mal isolé :</p>
                <ul class="custom-list">
                    <li><strong>Air Ultra purifié :</strong> Les filtres G4 ou F7 plissés arrêtent plus de 90% des
                        pollens avant qu'ils ne touchent votre moquette.</li>
                    <li><strong>Lutte décisive contre l'humidité :</strong> Évacuation de l'air lourd avant qu'il ne
                        condense sur les carreaux en hiver. C'est l'ennemie numéro 1 du <a href="<?php echo BASE_URL; ?>traitement-humidite" style="text-decoration: underline;">Salpêtre</a>.</li>
                    <li><strong>Confort thermique :</strong> Fini l'entrée d'air glacial en rafale sur votre visage
                        quand vous dormez à côté de l'aérateur de la chambre : l'air neuf insufflé est préchauffé à
                        +15°C.</li>
                    <li><strong>Silence de fonctionnement :</strong> Une seule machine logée très loin dans les combles
                        au lieu d'une VMC souvent bruyante qui résonne dans le plafond de la salle de bain.</li>
                    <li><strong>Idéale en Rénovation pure :</strong> Sans grand réseau de gaines en pieuvre
                        (contrairement à la VMC), on perfore très peu la maison pour l'installer.</li>
                </ul>

                <blockquote class="article-blockquote">
                    "Plus de la moitié de nos installations de VMI se font en "recours" suite à l'échec d'une VMC
                    classique incapable de purger de lourds problèmes d'humidité dans les murs anciens. 2 semaines après
                    l'allumage d'une VPS, les murs de pierre sèchent enfin à cœur, et l'odeur de champignon disparait."
                </blockquote>

                <h2 id="comparatif">Ventilation par Surpression vs VMC : Le Match Détaillé</h2>
                <p>Le duel en rénovation se joue souvent entre l'installation d'une nouvelle <strong>VMC (Ventilation
                        Mécanique Contrôlée)</strong> classique et le virage vers la <strong>ventilation par
                        surpression</strong>. Ce n'est pas la même philosophie !</p>

                <ul class="custom-list">
                    <li><strong><a href="<?php echo BASE_URL; ?>vmc-simple-flux" style="text-decoration: underline;">VMC Simple Flux</a> (Dépression) :</strong> Elle aspire, forçant l'air pollué extérieur à
                        pénétrer massivement (et froidement) par les fentes des menuiseries. L'humidité est bien
                        extraite localement de la salle de bain, mais sans aucun égard aux autres pièces.</li>
                    <li><strong><a href="<?php echo BASE_URL; ?>vmc-double-flux" style="text-decoration: underline;">VMC Double Flux</a> (Pression Neutre) :</strong> La Rolls de la ventilation du "Neuf". Elle
                        insuffle et extrait l'air pour un bilan thermique de premier ordre en récupérant la chaleur,
                        mais exige de lourds et immenses caissons d'air et de tubages complexes impossible à passer dans
                        de l'ancien.</li>
                </ul>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Critère</th>
                                <th>Ventilation par Surpression (VMI/VPS)</th>
                                <th>VMC Simple Flux</th>
                                <th>VMC Double Flux</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Dynamique d'Air</strong></td>
                                <td>Insuffle l'air neuf filtré en pression ➕</td>
                                <td>Aspire l'air (Dépression ➖)</td>
                                <td>Équilibre : Insuffle ➕ & Aspire ➖</td>
                            </tr>
                            <tr>
                                <td><strong>Filtration des Polluants</strong></td>
                                <td><strong>Excellente</strong> (Filtres épais centralisés)</td>
                                <td>Nulle pour l'air entrant ! (Passe par le coffre de volet)</td>
                                <td>Excellente (Micro filtrations multiples)</td>
                            </tr>
                            <tr>
                                <td><strong>Gestion du Froid</strong></td>
                                <td>L'air est réchauffé artificiellement ($)</td>
                                <td>Aucune, le froid entre en rafale</td>
                                <td>L'air chaud extrait réchauffe l'air froid entrant (Génie !!)</td>
                            </tr>
                            <tr>
                                <td><strong>Installation Rénovation</strong></td>
                                <td><strong>Très Facile</strong> (Un seul tube descendant)</td>
                                <td>Difficile (Tubes vers toutes les pièces d'eau)</td>
                                <td>Quasi-Impossible (2 fois plus de tubes)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h2 id="installation">Installation et Entretien : Tout ce qu'il faut savoir</h2>

                <figure style="margin: 2rem 0; max-width: 100%;">
                    <img style="width: 100%; height: auto; border-radius: 12px; display: block; box-shadow: 0 5px 15px rgba(0,0,0,0.05);" src="<?php echo BASE_URL; ?>image/ventilation%20par%20surpression4.webp"
                        alt="Installation d'une bouche d'insufflation de grande taille au plafond d'un hall d'entrée central">
                    <figcaption style="text-align: center; font-size: 0.9rem; color: #64748b; margin-top: 10px; font-style: italic; padding: 0 10px;">Ce disque imposant est le "coeur" de la surpression : l'unique orifice d'où proviendra
                        100% de l'air tempéré de toute la maison.</figcaption>
                </figure>

                <p>L'<strong>installation simplifiée</strong> est le plus grand atout à court terme d'une VPS. Il suffit
                    de loger le moteur de quelques kilos dans vos combles, de placer une sortie sur le toit pour aspirer
                    l'air "vierge", et de percer l'axe central de votre plafond pour plaquer votre unique diffuseur
                    soufflant.</p>

                <p>Néanmoins, ne croyez pas les notices de bricolage ! Une habitation, c'est de l'ingénierie des
                    fluides. Un électricien ou frigoriste <strong>certifié RGE</strong> vous fera payer non pas le
                    raccordement en lui-même, mais le diagnostic thermique ! S'il injecte l'air par le plafond et que
                    votre salon a un pont thermique mortel, ou si le bas de vos portes de chambre ne sont pas rabotés de
                    l'épaisseur parfaite (Détalonnage), la condensation va tout bonnement "flipper" de sens pour pourrir
                    une nouvelle zone. Enfin, un mauvais dimensionnement va ruiner votre compteur Linky à cause de la
                    résistance de préchauffage.</p>

                <h2 id="innovations">Défis spécifiques : Gaz radon et rénovation en appartement</h2>
                <p>Autre utilité reconnue : le gaz radon. Inodore et radioactif, il provient de la désintégration de
                    l'uranium du granite (très répandu en Bretagne ou Pays de la Loire). Il s'accumule mortellement dans
                    les pièces fermées du rez-de-chaussée. La <strong>ventilation par surpression</strong>, met en
                    pression ces dalles et refoule purement et simplement ces émanations en les empêchant de sortir de
                    terre. De plus, son format d'unités murales très "design" séduit de plus en plus de jeunes
                    acquéreurs locataires d'appartements de type canuts, démunis face à la mérule des vieux bâtiments de
                    centre-ville impossibles à démolir.</p>

                <h2 id="faq">Vos Questions Fréquentes (FAQ)</h2>
                <div class="faq-section">
                    <h3>Quels sont les 3 types de ventilation les plus courants ?</h3>
                    <p>Les trois principaux types de ventilation sont la <a href="https://www.cemarenov.fr/ventilation-naturelle">ventilation naturelle</a> (simples flux d'air via
                        courant d'air libre), la Ventilation Mécanique Contrôlée (VMC Simple ou Double Flux aspirant
                        l'air vicié) et la Ventilation Positives par Surpression (VMI insufflant sous pression légère de
                        l'air réchauffé).</p>

                    <h3>La VMC double flux fonctionne-t-elle par dépression ou par surpression ?</h3>
                    <p>Fondamentalement : Ni l'un ni l'autre. Une Double flux régulée avec soin se veut "neutre"
                        (Iso-pression). Elle expire un litre dehors pour chaque litre aspiré du dehors et ce.. en même
                        temps afin d'échanger les calories. Un système de surpression lui, n'est composé que de moteurs
                        "soufflant" de l'extérieur vers l'intérieur pour pousser avec force !</p>

                    <h3>Quels sont les inconvénients de la VMC double flux par rapport à la surpression ?</h3>
                    <p>La VMC double flux est hors de prix d'investissement, prend une place gigantesque sous toiture,
                        et son entretien mécanique est coûteux (moteurs doubles, filtres triples). Surtout, impossible
                        en mur massif/pierre en rénovation de dissimuler ces tuyaux sans percer et saccager des
                        centaines de mètres des cloisons, contre 1 seul trou pour la Surpression !</p>

                    <h3>La ventilation par surpression est-elle bruyante ?</h3>
                    <p>Étant donné que l'unique caisson de répartition et de filtration massif est perché le plus loin
                        possible des chambres (comble perdus), avec un diffuseur central installé de plein-pied (sans
                        moteur adjacent), on atteint des niveaux de nuisance sonores inférieurs à une clim, et loin
                        d'une VMC vieillissante, à condition de décrasser les filtres pour ne pas la faire "forcer".</p>

                    <h3>Quel est le prix moyen d'une installation de ventilation par surpression ?</h3>
                    <p>Comptez environ 600€ à 1000€ l'appareil Nu en entrée de gamme jusqu'à 2 200 € en "Moteur
                        intelligent Connecté multi-capteurs" chez les leaders que sont <em>Soler & Palau</em> ou
                        <em>Unelvent</em>. Ajoutez la main d'œuvre pointue (pose capot cheminée, carrotage, détalonnage
                        et réglages électriques du thermobloc) pour un "Panier Moyen" Global autour des 2800 € clef en
                        main.</p>

                    <h3>La ventilation par surpression peut-elle assécher trop l'air intérieur ?</h3>
                    <p>En poussant dehors avec agressivité les taux d'humidité, Oui ! Le risque principal (en
                        particulier en hiver où l'air extérieur est déjà glacial et stérile en molécule d'eau) est
                        d'irriter la gorge des enfants avec un air sous les 35% ! D'où l'importance de fuir les boites à
                        moitiés prix et de miser sur les machines régulées dotées de capteurs H2O stoppant
                        l'insufflation.</p>

                    <h3>Quelles sont les aides disponibles pour l'installation d'une VMI/VPS ?</h3>
                    <p>Étant catégorisée dans la Rénovation Haute Performance d'Isolation des Énergies et Climat, et
                        encadrée par le label RGE, elle devient totalement ou fortement éligible à "MaPrimeRénov'",
                        Prime CEE et même aux prêts ÉCO-PTZ ou à la TVA à taux réduit de 5,5 %, abaissant fortement la
                        barrière du financement !</p>

                    <h3>La ventilation par surpression est-elle efficace contre les mauvaises odeurs ?</h3>
                    <p>Énormément. Outre la fumée classique, si l'air qui refoule des canalisations de votre buanderie
                        n'a plus l'espace physique (pression ambiante plus forte en salle de bain qu'au fond du tuyau
                        PVC) pour pénétrer dans les pièces de vie, les odeurs fétides vont mécaniquement redescendre
                        dans leurs conduits pour s'échapper par les exutoires d'eaux usées communaux.</p>
                </div> <!-- .faq-section -->

            </div> <!-- .article-content -->

            <!-- Form/Quote Hook Box -->
            <section class="highlight-box"
                style="background-color: #f7fcf0; border-left: 4px solid #8cc63f; padding: 25px; margin-top: 30px; margin-bottom: 20px; border-radius: 5px;">
                <h3 style="color: #6aaa1a; margin-top: 0;">L'installation est le secret d'une VMI performante</h3>
                <p>Choisir un artisan charlatan pour cette installation ruine vos économies de chauffage. Une
                    sur-ventilation en hiver fera exploser votre facture d'une surconsommation de centaines d'Euros par
                    le préchauffage de la machine ! <strong>Faites valider votre coefficient thermique du bâti
                        !</strong></p>
                <div style="text-align:center; margin-top:1rem;">
                    <a href="<?php echo BASE_URL; ?>contact" class="cta-button"
                        style="background-color: #8cc63f;">Demander un devis certifié RGE gratuit</a>
                </div>
            </section>

            <!-- Author Box -->
            <div class="author-box-bottom">
                <div class="author-box-img">
                    <img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe">
                </div>
                <div class="author-box-content">
                    <h3>Philippe</h3>
                    <span class="author-role">Expert R&eacute;novation &amp; Artisan RGE</span>
                    <p>Philippe diagnostique les pathologies des bâtiments depuis 20 ans. Il vous accompagne de A à Z :
                        de l'analyse hygrothermique pour l'efficacité des ventilations jusqu'au chiffrage rigoureux de
                        vos Primes Rénov'.</p>
                    <a href="<?php echo BASE_URL; ?>philippe" class="btn-outline">Voir son profil complet</a>
                </div>
            </div>

            <!-- Conclusion Box -->
            <section class="conclusion-box">
                <h2 style="color: #ffffff;">Faut-il franchir le pas de la Surpression ?</h2>
                <p style="margin-bottom: 0;">Si vous avez un projet sérieux de rénovation d'une maison ancienne
                    impossible à équiper de dizaines de mètres de tuyauterie VMC (murs de pierre rurale, plâtre décoré
                    fragile), La surpression <strong>VMI</strong> vous sauve la vie. Les problèmes d'air moisi qui
                    reviennent hiver après hiver vous tuent alors que l'air insaturé est si sain à respirer ! Protégez
                    votre souffle, ainsi que la valeur de votre patrimoine en traitant la pathologie avant de chercher à
                    changer vos fenêtres !</p>
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
