<?php
/**
 * vmc-double-flux.php
 * Article: VMC Double Flux
 */

// Article metadata — scanned by functions.php to populate homepage/categories/sidebars
$article_meta = [
    'title' => 'VMC double flux : guide complet pour un air sain et des économies d\'énergie',
    'category' => 'renovation',
    'image' => 'https://www.cemarenov.fr/image/vmc%20double%20flux2.webp',
    'excerpt' => 'Découvrez notre grand guide sur la VMC double flux : son fonctionnement ingénieux, ses avantages pour votre santé, son installation technique, ses prix, et toutes les aides d\'état pour réduire votre devis.',
    'date' => '2026-03-10',
    'reading_time' => 9,
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
                <span>VMC Double Flux</span>
            </nav>
            
            <div class="article-tags">
                <span class="article-tag">Ventilation</span>
                <span class="article-tag">Économie d'Énergie</span>
            </div>

            <h1>VMC Double Flux :<br>
                <span class="h1-accent">Guide Complet pour un Air Sain et des Économies</span>
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
                À l'heure où la qualité de l'air intérieur devient une préoccupation majeure et l'efficacité énergétique une nécessité absolue face au coût de l'électricité, la <strong>VMC double flux</strong> s'impose comme la solution de référence pour le "Neuf" et les grosses rénovations. Mais au-delà des promesses commerciales, comment ce bijou technologique fonctionne-t-il réellement ?
            </p>

            <figure style="margin: 2rem 0; max-width: 100%;">
                <img style="width: 100%; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); height: auto; display: block;" src="<?php echo BASE_URL; ?>image/vmc%20double%20flux1.webp" alt="Installation d'un réseau de gaines isolées pour une VMC double flux dans les combles d'une grande maison contemporaine">
                <figcaption style="text-align: center; font-size: 0.9rem; color: #64748b; margin-top: 10px; font-style: italic; padding: 0 10px;">L'installation d'une VMC Double flux exige un espace important pour le déploiement de sa tentaculaire "pieuvre" de gaines.</figcaption>
            </figure>

            <div class="article-content">
                
                <!-- TL;DR Box -->
                <div class="tldr-box" style="background-color: #faf3eb; border-left: 4px solid var(--color-primary); padding: 1.5rem 2rem; margin-bottom: 3rem; border-radius: 0 8px 8px 0;">
                    <h2 style="font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 1.2rem; text-transform: uppercase; color: var(--color-dark); margin-top: 0; border: none; padding-bottom: 0; margin-bottom: 1rem;">⚡ En Bref</h2>
                    <ul style="margin-bottom: 0;">
                        <li style="position: relative; padding-left: 1.5rem; margin-bottom: 0.5rem;"><span style="position: absolute; left: 0; color: var(--color-primary);">■</span> La <strong>VMC double flux</strong> assure le croisement intelligent sans se mélanger de l'air chaud sortant et de l'air glacial entrant, récupérant jusqu'à 95% des calories.</li>
                        <li style="position: relative; padding-left: 1.5rem; margin-bottom: 0.5rem;"><span style="position: absolute; left: 0; color: var(--color-primary);">■</span> Fini les grilles d'aération sur les fenêtres ! L'air arrive filtré, chaud et purifié au centre de vos chambres et salons via des diffuseurs plafonniers.</li>
                        <li style="position: relative; padding-left: 1.5rem; margin-bottom: 0.5rem;"><span style="position: absolute; left: 0; color: var(--color-primary);">■</span> Elle requiert un budget important (jusqu'à 6000 €) et des travaux d'envergure, la réservant principalement, en <strong>rénovation énergétique</strong>, aux restructurations lourdes (dépose des murs et plafonds).</li>
                    </ul>
                </div>

                <!-- Table of Contents -->
                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li><a href="#fonctionnement">Comprendre la VMC Double Flux : L'Échangeur Thermique</a></li>
                        <li><a href="#comparatif">Double Flux vs Simple Flux : Le Match Décisif</a></li>
                        <li><a href="#avantages">Inconvénients et Idées Reçues Démystifiées</a></li>
                        <li><a href="#installation">Installation, Entretien et Erreurs à Éviter</a></li>
                        <li><a href="#prix">Prix, Rentabilité et Aides MaPrimeRénov'</a></li>
                        <li><a href="#faq">Vos Questions Fréquentes (FAQ)</a></li>
                    </ul>
                </div>

                <h2 id="fonctionnement">Comprendre la VMC Double Flux : L'Échangeur Thermique</h2>
                <p>La <strong>Ventilation Mécanique Contrôlée double flux</strong> ne se contente plus de vous faire perdre vos précieux degrés Celsius. Contrairement aux systèmes traditionnels "basiques" qui se contentent d'extraire l'air (via les moteurs placés dans les combles) en espérant que de l'air rentre passivement par les persiennes des fenêtres, la <strong>VMC double flux</strong> crée deux autoroutes de l'air totalement mécanisées.</p>

                <p>Au centre de cette machinerie se trouve ce qu'on appelle "l'échangeur thermique". C'est un gros cube (parfois de la taille d'une machine à laver) rempli de milliers de facettes et lamelles ultra minces où les deux flux d'air glissent l'un à côté de l'autre sans jamais se croiser chimiquement.</p>

                <figure style="margin: 2rem 0; max-width: 100%;">
                    <img style="width: 100%; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); height: auto; display: block;" src="<?php echo BASE_URL; ?>image/vmc%20double%20flux2.webp" alt="Gros plan sur l'échangeur de chaleur croisé d'un caisson de vmc double flux en coupe">
                    <figcaption style="text-align: center; font-size: 0.9rem; color: #64748b; margin-top: 10px; font-style: italic; padding: 0 10px;">C'est par simple contact "de paroi à paroi" que l'air crasseux sortant à 22°C va céder sa chaleur à l'air sec hivernal entrant à 0°C.</figcaption>
                </figure>

                <h3>Les filtres : Gardiens de votre santé</h3>
                <p>L'air froid qui rentre de l'extérieur est aspiré souvent depuis une cheminée sur le toit. Avant d'être réchauffé à 19°C par le croisement, cet air est passé au microscope par de gigantesques filtres d'habitacles (souvent classé F7). Votre maison devient littéralement une chambre stérile débarrassée  des particules fines, pollens d'ambroisie et gaz d'échappement.</p>


                <h2 id="comparatif">Double Flux vs Simple Flux : Le Match Décisif</h2>
                <p>Beaucoup se demandent sur les forums de bricolage si investir le triple du prix dans une VMC DF est une hérésie ou un génie. Face aux normes environnementales RT2012 et RE2020, les résultats sont sans appels.</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Critère</th>
                                <th>VMC Simple Flux Autoréglable</th>
                                <th>VMC Simple Flux Hygroréglable</th>
                                <th>VMC Double Flux (Passivhaus)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Dynamique</strong></td>
                                <td>Tire 100% de l'air sans contrôle</td>
                                <td>Tire l'air au coup par coup (Humidité)</td>
                                <td>Pousse l'air et Tire l'air selon la sonde C02 !</td>
                            </tr>
                            <tr>
                                <td><strong>Bilan Thermique</strong></td>
                                <td>Catastrophique en hiver</td>
                                <td>Correct, limite la chauffe</td>
                                <td><strong>Exceptionnel</strong> (96% des degrés sauvés)</td>
                            </tr>
                            <tr>
                                <td><strong>Qualité de l'air</strong></td>
                                <td>Moyen (l'odeur du feu du voisin rentre)</td>
                                <td>Moyen</td>
                                <td>Suprême (Filtration F9 quasi stérile possible)</td>
                            </tr>
                            <tr>
                                <td><strong>Bruit D'ambiance</strong></td>
                                <td>Fort (Air qui siffle dans les volets)</td>
                                <td>Moyen</td>
                                <td>Tolérance Zéro, le silence (si bien posée)</td>
                            </tr>
                            <tr>
                                <td><strong>Prix d'achat</strong></td>
                                <td>150 €</td>
                                <td>400 €</td>
                                <td><strong>3 500 € à 7000 €</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h3>Pourquoi ce prix exorbitant ?</h3>
                <p>Si la machine en elle-même est coûteuse (matériaux nobles pour l'échangeur), le coût colossal de l'<strong>installation vmc</strong> réside dans le réseau "Pieuvre". Pour éviter que l'air entrant fraîchement réchauffé à 18°C ne perde sa chaleur en cheminant 15 mètres dans vos combles à -5°C... IL FAUT SUR-ISOLER CHAQUE CENTIMÈTRE DE TUYAU avec d'épaisses gaines de laine de verre.</p>

                <h2 id="avantages">Inconvénients et Idées Reçues Démystifiées</h2>
                
                <figure style="margin: 2rem 0; max-width: 100%;">
                    <img style="width: 100%; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); height: auto; display: block;" src="<?php echo BASE_URL; ?>image/vmc%20double%20flux4.webp" alt="Tuyaux isolés cheminant dans un plafond rabaissé spécialement en plaques de plâtres">
                    <figcaption style="text-align: center; font-size: 0.9rem; color: #64748b; margin-top: 10px; font-style: italic; padding: 0 10px;">C'est le pire ennemi de la double flux en Rénovation d'anciens bâtiments : Il faut souvent détruire de la hauteur sous-plafond pour camoufler les tubages supplémentaires (Le flux soufflant).</figcaption>
                </figure>

                <h3>Les "pain points" redoutés en rénovation :</h3>
                <ul class="custom-list">
                    <li><strong>L'encombrement impossible :</strong> Dans un petit pavillon des années 70 sans combles aménageables, trouver l'espace pour 2 vastes réseaux parallèles de conduits de diamètre 125/160mm relève du cauchemar. C'est l'équivalent de faire passer des troncs d'arbre dans vos murs !</li>
                    <li><strong>L'Hygiène des conduits :</strong> Que se passe t-il si l'aspiration des graisses de la cuisine vient encrasser les réseaux pendant 20 ans malgré l'entretien des filtres ? Certains propriétaires frileux craignent de développer une aération malsaine.</li>
                    <li><strong>La surconsommation des "Moteurs" :</strong> Deux gros ventilateurs (Insufflation + Extraction) qui tournent 24h/24 ! Eh oui, la facture électrique prend un coup, mais le gain financier sur le chauffage l'emporte toujours par K.O !</li>
                </ul>

                <h2 id="installation">Installation, Entretien et Erreurs à Éviter</h2>
                <p>L'<strong>installation vmc double flux</strong> ne s'improvise JAMAIS. Plus de 60% des plaintes (Problématiques de sifflements, condensation, pannes) sur internet proviennent d'installations faites à l'économie par des particuliers qui n'ont pas respecté l'ingénierie des fluides.</p>

                <ol class="custom-list">
                    <li><strong>Sur-dimensionnement acoustique :</strong> Mieux vaut une grosse VMC qui souffle doucement la bonne quantité qu'une petite VMC qui hurle à fond pour arriver au même résultat de volume/heure !</li>
                    <li><strong>Le Détalonnage des portes :</strong> L'air doit transiter des salons sains (où la VMC souffle) VERS les pièces humides polluées (Où la VMC aspire). Sans 1.5 cm d'ouverture forcée SOUS vos portes de chambre : c'est la condensation assurée à la fenêtre !</li>
                    <li><strong>Le redoutable Entretien Bi-annuel :</strong> Passer l'aspirateur sur de simples bouches d'extraction de sdb ne suffit plus. Il faut s'engager à monter sur un escabeau pour changer les onéreux filtres du caisson central (environ 70€/an de consommables). Omettez ce point, et vos moteurs forceront jusqu'à griller !</li>
                </ol>

                <h2 id="prix">Prix, Rentabilité et Aides MaPrimeRénov'</h2>
                
                <figure style="margin: 2rem 0; max-width: 100%;">
                    <img style="width: 100%; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); height: auto; display: block;" src="<?php echo BASE_URL; ?>image/vmc%20double%20flux5.webp" alt="Opérateur RGE pointant vers un boitier de commande moderne et tactile pour régler une VMC DF Zehnder">
                    <figcaption style="text-align: center; font-size: 0.9rem; color: #64748b; margin-top: 10px; font-style: italic; padding: 0 10px;">Les unités haut de gamme embarquent désormais une électronique folle, ajustant leur vitesse selon la densité humaine (Sonde CO2) d'une salle de réception.</figcaption>
                </figure>

                <p>S'équiper d'une bête de course comme les machines <em>Zehnder</em> ou <em>Helios</em> exige entre 2000 € (machine compacte) et 6000 € (Centrale connectée XXL) rien que pour la ferraille. Ajoutez à cela la compétence pointue d'un frigoriste accrédité "Passivhaus" ou d'un chauffagiste : <strong>Les devis flirtent facilement entre les 4000 € et les 8000 € clefs en mains.</strong></p>

                <p>Heureusement le gouvernement finance lourdement l'éradication des passoires thermiques. L'<strong>installation de votre système de ventilation mécanique</strong> par un artisan RGE débloque de grands droits, tout récemment assujettis aux réformes de "Rénovation Globale". Dans l'idéal avec une simple installation "Monogeste" vous pouvez encore prétendre à des coup de pouce <strong>CEE pouvant atteindre quelques centaines d'Euros</strong>, et dans certains créneaux très Modestes à plus de <strong>2500 € sous MaPrimeRénov'</strong> !</p>

                <h2 id="faq">Vos Questions Fréquentes (FAQ)</h2>
                <div class="faq-section">
                    <h3>Est-ce que la VMC supprime l'humidité ?</h3>
                    <p>Oui de manière radicale. Dès la première pluie en intersaison, une <strong>VMC double flux</strong> active assèche de tout excès de vapeur d'eau rejeté par vos douches brûlantes ou même votre propre respiration nocturne. Le balayage perpétuel empêche l'air "mouillé" de toucher les parois vitrées et de s'y transformer en eau (Condensation).</p>
                    
                    <h3>Est-ce qu'une VMC doit tourner en permanence ?</h3>
                    <p>C'est une obligation légale, de bon sens, et sanitaire ! La coupe et l'arrêt volontaire (Souvent suite aux critiques de nuisances sonores dans les bas de gammes des locataires) engendre à la reprise une infection de la tuyauterie par les particules d'eaux mortes qui ont eu le temps de verdir/moisir. 24h/24h et 7/7J obligatoirement !</p>
                    
                    <h3>Quelle est la durée de vie d'une VMC double flux ?</h3>
                    <p>La pérennité matérielle s'échelonne sur deux fronts. Les tuyauteries isolées sont conçues pour 50 ans (la durée du bâti). En revanche les turbines de ventilation et les roulements à bille du caisson ont une durée de vie observée <strong>entre 12 et 18 ans </strong> si et seulement si les filtres ont été changés régulièrement (moins de stress sur l'aspiration des hélices).</p>
                    
                    <h3>Pourquoi pas de VMC dans une chambre ?</h3>
                    <p>C'est une erreur de vocabulaire ! Historiquement, il n'y avait jamais de "bouches d'extraction crasseuses" VMC des années 90 dans les chambres : c'est réservé aux WC et Cuisine. Avec une Double flux, on a de très belles "bouches blanches d'insufflation" dans la chambre puisque qu'il y pénètre l'air divinement propre venant des alpes et réchauffé par l'échangeur central !</p>
                    
                    <h3>Comment déshumidifier une pièce sans VMC ?</h3>
                    <p>C'est complexe et rudimentaire : il faut chauffer votre pièce à son maximum l'hiver (le point de rosée augmente repoussant le brouillard d'apparition de l'eau) ET... paradoxalement, entre-ouvrir votre fenêtre en grand 3 fois par jours pour remplacer vos dix litres de gaz humide intérieurs par 10 litres d'air sec et glacial venant du dehors... une hérésie thermique !</p>

                    <h3>Un taux d'humidité de 70 % est-il très élevé ?</h3>
                    <p>Oui. Au delà de 65-70% sur le long terme (et non pas durant les 15 minutes des retombées de votre douche), on atteint la zone rouge. Le <a href="<?php echo BASE_URL; ?>traitement-humidite" style="text-decoration: underline;">salpêtre</a> cristallise, les spores de champignons des murs prennent vie et les acariens (allergies cutanées) se reproduisent comme des lapins. L'hygrométrie idéale conseillée par l'OMS se situe entre 40 et 60%.</p>
                    
                    <h3>Quels sont les 3 types de VMC ?</h3>
                    <p>Les 3 grands dinosaures du marché Français sont la Simple Flux Auto-Réglable (Elle crache et avale toujours à 100% de puissance même quand la maison est vide depuis 10 jours). Ensuite sa petite sœur la <a href="<?php echo BASE_URL; ?>vmc-simple-flux" style="text-decoration: underline;">Simple Flux Hygro</a> (Elle analyse une sonde d'humidité interne ou d'humidité du tissus et resserre le clapet seule), et enfin notre grande Dame de cette page : La Double Flux échangeant du chaud et poussant de l'Air !</p>
                    
                    <h3>Est-il possible d'avoir une maison sans VMC ?</h3>
                    <p>Uniquement si votre maison a été bâtie selon les plans de construction d'avant les années 80 ! Ces vieilles dames ne détenaient ni double vitrage ultra scellé, ni par-vapeur colmatant les toitures... Les fenêtres se "faufilaient" de petits courants d'air froid chassant l'anxiété humaine. De nos jours avec un tel "bunker étanche" que représente l'isolation (ITe, Triple vitrages), une simple semaine et vous retrouverez des flaques dégoulinantes sur votre baie vitrée !</p>
                    
                    <h3>Une VMC double flux est-elle compatible avec un poêle à granulés ?</h3>
                    <p>Aussi étonnant que ça puisse paraitre : Oui ! Le Poêle à granulé récent dit "Etanche" ne consomme plus l'oxygène ambiant du canapé des heureux propriétaires. Il capte son oxygène grâce à un tube allant dans les rampants de toiture ou traversant le mur extérieur ! Les deux machineries vivent leur vie en synergie thermique.</p>
                    
                    <h3>Faut-il laisser les portes ouvertes pour une VMC double flux ?</h3>
                    <p>Ce n'est pas "Avoir d'énormes portes ouvertes", mais plutôt "Détalonner" d'1 centimètre sous vos menuiseries intérieures . C'est la loi des fluides à l'oeuvre.</p>

                    <h3>VMC double flux ou ventilation par surpression : laquelle pour ma maison neuve ?</h3>
                    <p>La VMC double flux récupère la chaleur de l'air extrait pour préchauffer l'air entrant — idéale pour les maisons BBC ou passives. La <a href="https://www.cemarenov.fr/ventilation-par-surpression">ventilation par surpression</a> est plus simple à installer et adaptée aux maisons existantes à rénover : elle filtre et injecte de l'air propre sans récupération thermique, à un coût inférieur.</p>
                </div> <!-- .faq-section -->

            </div> <!-- .article-content -->

            <!-- Form/Quote Hook Box -->
            <section class="highlight-box" style="background-color: #f7fcf0; border-left: 4px solid #8cc63f; padding: 25px; margin-top: 30px; margin-bottom: 20px; border-radius: 5px;">
                <h3 style="color: #6aaa1a; margin-top: 0;">Un mauvais choix de VMC annule vos gains en isolation</h3>
                <p>Installer une pompe à chaleur à 15000€ tout en gardant une VMC des années 90, c'est comme laisser le frigo grand ouvert en pleine canicule... Le confort à un prix : Confiez nous vos projets de rénovation thermique et nous diagnostiquerons gratuitement les déperditions liées à vos mauvaises extractions d'air.</p>
                <div style="text-align:center; margin-top:1rem;">
                    <a href="<?php echo BASE_URL; ?>contact" class="cta-button" style="background-color: #8cc63f;">Estimer la prime ou les devis RGE</a>
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
                    <p>Philippe diagnostique les pathologies des bâtiments depuis 20 ans. Il vous accompagne de A à Z : de l'analyse hygrothermique pour l'efficacité des ventilations jusqu'au chiffrage rigoureux de vos Primes Rénov'.</p>
                    <a href="<?php echo BASE_URL; ?>philippe" class="btn-outline">Voir son profil complet</a>
                </div>
            </div>

            <!-- Conclusion Box -->
            <section class="conclusion-box">
                <h2 style="color: #ffffff;">Franchir le pas de la Double Flux ?</h2>
                <p style="margin-bottom: 0;">C'est un incontestable "Oui" si vous bâtissez une maison neuve ou si vous rasez littéralement les cloisons d'une passoire F ou G dans l'optique d'un Label D. En revanche, si vos travaux ne consistent "que" à remplacer l'existant, l'investissement pécuniaire et architectural pour tirer des kilomètres de grosses "toiles de spi isolées" à travers les planchers en bois existants ruinera vos plafonds et votre budget. Le Choix d'un tel investissement doit être justifié par une étude complète de votre bâti.</p>
            </section>

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

