<?php
/**
 * crepi-facade.php
 * Article: Crépi façade — Guide complet prix, types, pose et erreurs 2026
 */

// Article metadata — scanned by functions.php to populate homepage/categories/sidebars
$article_meta = [
    'title' => 'Crépi façade : le guide complet (Prix, Types, Pose et Erreurs 2026)',
    'category' => 'travaux',
    'image' => 'https://www.cemarenov.fr/image/crepi-facade.webp',
    'excerpt' => 'Prix crépi au m², types de finition (taloché, gratté, projeté), pose DTU 26.1, durée de vie par région et erreurs à éviter. Le guide terrain complet.',
    'date' => '2026-03-05',
    'reading_time' => 14,
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
                <span>Crépi façade</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Façade</span>
                <span class="article-tag">Guide Complet</span>
            </div>

            <h1>Crépi façade : le guide complet<br>
                <span class="h1-accent">Prix, Types, Pose et Erreurs (2026)</span>
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
                Un crépi de façade qui craquelle après 3 ans, ça arrive plus souvent qu'on ne le pense. Obligatoire tous
                les 10 ans en copropriété ou sous garantie décennale, ce revêtement protège votre maison des intempéries
                tout en lui donnant du caractère. <strong>Mais crépi n'est pas enduit, et une pose bâclée coûte cher à
                    réparer.</strong> Prix réels 2026, types de finition selon DTU 26.1, étapes précises de pose, durée
                de vie par région, et les pièges à éviter.
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
                        <li><strong>Prix crépi m² :</strong> 25-50 € sans isolation, 80-150 € avec ITE PSE 15 cm.</li>
                        <li><strong>Crépi vs enduit :</strong> l'enduit est la couche lisse protectrice (10 mm), le
                            crépi est la finition granulée décorative (2-3 mm, grain 1.5-5 mm).</li>
                        <li><strong>Maison 100 m² :</strong> 2 500-5 000 € façade simple ; 8 000-15 000 € ravalement ITE
                            complet.</li>
                        <li><strong>Durée de vie :</strong> 15 ans Nord humide, 25 ans Sud sec (hydrofuge siloxane
                            obligatoire).</li>
                    </ul>
                </div>

                <!-- Table of Contents -->
                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li><a href="#crepi-vs-enduit">Crépi façade vs enduit : la différence qui change tout</a></li>
                        <li><a href="#types">Les 4 types de crépi + finitions</a></li>
                        <li><a href="#prix">Prix crépi façade 2026</a></li>
                        <li><a href="#pose">Pose crépi façade : les 7 étapes DTU 26.1</a></li>
                        <li><a href="#avantages">Avantages, inconvénients et durée de vie</a></li>
                        <li><a href="#valeur">Crépi et valeur de la maison</a></li>
                        <li><a href="#entretien">Entretien crépi : les signaux d'alerte</a></li>
                        <li><a href="#erreurs">Erreurs de pose les plus coûteuses</a></li>
                        <li><a href="#faq">FAQ Crépi Façade</a></li>
                    </ul>
                </div>

                <!-- Section : Crépi vs Enduit -->
                <h2 id="crepi-vs-enduit">Crépi façade vs enduit : la différence qui change tout</h2>
                <p>Beaucoup confondent crépi et enduit parce qu'ils travaillent ensemble. L'<a
                        href="<?php echo BASE_URL; ?>enduit-facade" style="text-decoration: underline;">enduit de
                        façade</a> forme la base protectrice lisse (10-15 mm d'épaisseur, liant hydraulique
                    chaux/ciment), appliqué sur un gobetis qui accroche au mur nu. Le crépi, lui, est la finition
                    décorative granulée (2-3 mm seulement) qu'on pose par-dessus.</p>
                <p>En clair : l'<strong>enduit de corps</strong> prépare et protège (DTU 26.1), sans lui pas de crépi
                    viable. Le <strong>crépi de finition</strong> ajoute texture et esthétique (grain 1.5 mm taloché
                    lisse à 5 mm projeté rustique). Le <strong>crépissage</strong> désigne l'acte d'appliquer le crépi
                    granulé avec taloche ou pistolet.</p>
                <p>Poser du crépi directement sur brique ou béton poreux ? Mauvaise idée. Ça décolle en 2 ans car le
                    support "saigne" (l'eau remonte par capillarité et nécessite souvent un <a
                        href="<?php echo BASE_URL; ?>traitement-humidite" style="text-decoration: underline;">traitement
                        de l'humidité</a> préalable). D'où l'importance du gobetis, cette sous-couche d'1-2 mm qui fait
                    le lien entre le mur brut et le corps d'enduit. Sauter cette étape, c'est construire sur du sable.
                </p>

                <!-- Section : Types -->
                <h2 id="types">Les 4 types de crépi + finitions : choisir selon son mur et son climat</h2>
                <p>Le crépi se décline en 4 familles chimiques, chacune avec ses forces selon l'exposition pluie/soleil.
                    Le grain et l'outil définissent le look final.</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Type</th>
                                <th>Composition</th>
                                <th>Avantages</th>
                                <th>Inconvénients</th>
                                <th>Climat idéal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Minéral</strong></td>
                                <td>Chaux aérienne + silice</td>
                                <td>Respirant (murs bois), écologique, 25 ans Sud</td>
                                <td>Sensible humidité sans hydrofuge</td>
                                <td>Sec (Provence)</td>
                            </tr>
                            <tr>
                                <td><strong>Synthétique</strong></td>
                                <td>Acrylique + granulats</td>
                                <td>Flexible (fissures), adhère béton</td>
                                <td>Algues en zone humide</td>
                                <td>Mi-climat</td>
                            </tr>
                            <tr>
                                <td><strong>Silicone</strong></td>
                                <td>Silicones + silice</td>
                                <td>Hydrofuge naturel, autonettoyant</td>
                                <td>+30 % sur le prix</td>
                                <td>Pluvieux (Nord)</td>
                            </tr>
                            <tr>
                                <td><strong>Acrylique pur</strong></td>
                                <td>Résines pures</td>
                                <td>Bon marché, rapide</td>
                                <td>Vie 12 ans, absorbe pollution</td>
                                <td>Budget serré</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h3>Les finitions (grain + outil)</h3>
                <ul class="custom-list">
                    <li><strong>Taloché (1.5 mm) :</strong> lisse moderne, taloche plastique circulaire. Le rendu le
                        plus contemporain.</li>
                    <li><strong>Gratté (2-3 mm) :</strong> texturé, brosse métallique horizontale. Très courant en
                        rénovation.</li>
                    <li><strong>Projeté (3-5 mm) :</strong> rustique, compresseur 4 bars + peigne. Le classique des
                        maisons des années 70-80.</li>
                    <li><strong>Écrasé (2 mm) :</strong> structuré, rouleau texturé. Un bon compromis entre moderne et
                        traditionnel.</li>
                </ul>

                <p>Pour des murs neufs (béton cellulaire), privilégiez le minéral respirant. Pour des murs anciens
                    (brique), le silicone hydrofuge. Le DTU 26.1 impose une maille alcali-résistante si l'épaisseur
                    totale dépasse 12 mm.</p>

                <!-- Section : Prix -->
                <h2 id="prix">Prix crépi façade 2026 : sans et avec isolation</h2>
                <p><strong>Nu (ravalement simple) :</strong> 25-50 €/m² (matériel 30 %, pose 70 %). Un sac de 25 kg en
                    grande surface de bricolage couvre environ 5 m² pour 15-25 €. <strong><a
                            href="<?php echo BASE_URL; ?>isolation-thermique-exterieur-ite"
                            style="text-decoration: underline;">ITE (Isolation Thermique par l'Extérieur)</a> :</strong>
                    80-150 €/m² (PSE 15 cm Rth 3.7 + crépi monocouche).</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Scénario (maison 100 m²)</th>
                                <th>Coût total HT</th>
                                <th>TVA 5.5 %</th>
                                <th>Aides déductibles</th>
                                <th>Coût net estimé</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Façade simple</strong></td>
                                <td>2 500-5 000 €</td>
                                <td>140-275 €</td>
                                <td>—</td>
                                <td>2 640-5 275 €</td>
                            </tr>
                            <tr>
                                <td><strong>ITE PSE 15 cm</strong></td>
                                <td>8 000-15 000 €</td>
                                <td>440-825 €</td>
                                <td>MaPrimeRénov' jusqu'à 10 000 €</td>
                                <td>Variable selon revenus</td>
                            </tr>
                            <tr>
                                <td><strong>3 façades complètes</strong></td>
                                <td>15 000-30 000 €</td>
                                <td>825-1 650 €</td>
                                <td>CEE + Éco-PTZ</td>
                                <td>5 000-12 000 €</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <p><strong>Aides 2026 :</strong> MaPrimeRénov' jusqu'à 100 €/m² ITE (ménages modestes), TVA 5.5 % sur
                    ravalement, CEE Primes Énergie (jusqu'à 50 €/m² crépi isolant). L'échafaudage roulant est inclus
                    sous 5 m de hauteur ; une nacelle est obligatoire au-delà.</p>

                <!-- Section : Pose -->
                <h2 id="pose">Pose crépi façade : les 7 étapes DTU 26.1</h2>
                <p>La pose respecte le DTU 26.1 (enduits minces organiques). Outils nécessaires : taloche crantée 10 mm,
                    niveau laser, compresseur 4 bars, hydrofuge siloxane. Ne zappez surtout pas le gobetis.</p>

                <h3>Étape par étape</h3>
                <ul class="custom-list">
                    <li><strong>Diagnostic support :</strong> haute-pression anti-mousse, grattage des fissures
                        supérieures à 2 mm, brossage complet du mur.</li>
                    <li><strong>Gobetis (accrochage) :</strong> 1-2 mm de liant hydraulique projeté au balai. Maille
                        alcali-résistante si l'épaisseur totale dépasse 10 mm.</li>
                    <li><strong>Corps d'enduit :</strong> 10 mm appliqué en 2 couches croisées avec 24 h de séchage
                        entre chaque passe.</li>
                    <li><strong>Primaire d'accrochage :</strong> au rouleau, laissé sécher 4 h minimum avant la
                        finition.</li>
                    <li><strong>Crépi finition :</strong> 2 mm taloché ou gratté selon le look choisi, avec 48 h de cure
                        avant toute manipulation.</li>
                    <li><strong>Hydrofuge :</strong> application d'un <a
                            href="<?php echo BASE_URL; ?>hydrofuge-incolore-facade"
                            style="text-decoration: underline;">hydrofuge incolore de façade</a> au siloxane pour
                        imperméabiliser la surface (anti-taches, anti-pluie battante).</li>
                    <li><strong>Protection :</strong> bâche pendant 7 jours contre la pluie et le gel pendant la prise.
                    </li>
                </ul>

                <p>La <strong>pose de crépis</strong> respecte le DTU 26.1 : la température minimale est de 5 °C et aucun gel ne doit survenir pendant la prise, sinon le liant hydraulique gèle et le crépis s'effrite dès le printemps suivant.</p>

                <h3>Quelle épaisseur de crépis pour une façade ?</h3>
                <p>L'épaisseur totale d'un crépis façade se décompose en deux couches : le <strong>corps d'enduit</strong> (10 à 15 mm) et la <strong>finition crépis</strong> (2 à 3 mm). Total constaté sur chantier : <strong>12 à 18 mm</strong>. Le DTU 26.1 impose une armature de maille alcali-résistante dès que l'épaisseur totale dépasse 10 mm. En dessous de 10 mm, le crépis est trop mince pour tenir les chocs et les cycles gel-dégel — c'est la première cause de décollement sur des façades nord et est.</p>

                <!-- Section : Avantages -->
                <h2 id="avantages">Avantages, inconvénients et durée de vie par région</h2>

                <h3>Pourquoi choisir le crépi ?</h3>
                <ul class="custom-list">
                    <li><strong>Esthétique :</strong> plus de 100 textures personnalisables, des dizaines de coloris
                        disponibles.</li>
                    <li><strong>Protection :</strong> pare-pluie intégré, anti-fissures grâce aux fibres dans le
                        mélange.</li>
                    <li><strong>Isolation :</strong> combiné à un PSE, il ajoute un Rth de 3.7 et donne accès aux aides
                        MaPrimeRénov'.</li>
                </ul>

                <h3>Les limites à connaître</h3>
                <ul class="custom-list">
                    <li>Entretien haute-pression nécessaire tous les 3 ans (algues en zone Nord).</li>
                    <li>Poids de l'ITE (étude de structure nécessaire si l'épaisseur dépasse 20 cm).</li>
                    <li>Pose exclusivement professionnelle (échafaudage, nacelle, compresseur).</li>
                </ul>

                <h3>Durée de vie réelle</h3>
                <p><strong>15 ans</strong> en façade Nord/Ouest (climat humide, pluie battante). <strong>20-25
                        ans</strong> en façade Sud/Est (climat sec, fort ensoleillement). L'application d'un hydrofuge
                    siloxane ajoute facilement 10 ans à la durée de vie. En copropriété, la réfection est obligatoire
                    tous les 10 ans.</p>

                <!-- Section : Valeur -->
                <h2 id="valeur">Crépi et valeur de la maison : les chiffres 2025</h2>
                <p>Selon l'étude notaires FNAIM 2025, une maison ravalée récemment affiche un <strong>+12 % sur le prix
                        de vente</strong> par rapport à une maison comparable non ravalée. Avec ITE, le bonus monte à
                    <strong>+15 %</strong>. Le retour sur investissement énergétique se fait en environ 3 ans
                    d'économies de chauffage (norme RT 2020).</p>
                <p>Mais attention : un crépi sale, jauni ou taché fait plutôt <strong>-8 % sur la valeur perçue</strong>
                    par l'acheteur. Un <a href="<?php echo BASE_URL; ?>ravalement-de-facade"
                        style="text-decoration: underline;">ravalement de façade</a> complet est un investissement
                    rentable, à condition de ne pas laisser les murs se dégrader entre deux interventions.</p>

                <!-- Section : Entretien -->
                <h2 id="entretien">Entretien crépi : les signaux d'alerte</h2>
                <p>Un <a href="<?php echo BASE_URL; ?>nettoyage-demoussage-facade"
                        style="text-decoration: underline;">nettoyage et démoussage de façade</a> à moyenne pression
                    (150 bars maximum) est conseillé tous les 3 ans, suivi d'un anti-mousse préventif à base d'algicide
                    siloxane appliqué au pulvérisateur.</p>
                <p><strong>Signaux d'urgence :</strong> fissures supérieures à 2 mm (hydrofuge HS), cloques (ponts d'eau
                    derrière le crépi), décoloration prononcée (pollution accumulée, qui nécessitera au minimum une
                    nouvelle <a href="<?php echo BASE_URL; ?>peinture-de-facade"
                        style="text-decoration: underline;">peinture de façade</a> pour raviver les pigments). Coût
                    d'entretien : 10-20 €/m² tous les 5 ans en moyenne.</p>

                <!-- Section : Erreurs -->
                <h2 id="erreurs">Erreurs de pose les plus coûteuses (expérience terrain)</h2>
                <p>Posé à -5 °C, le liant hydraulique gèle. Résultat : le crépi se fendille et "caille" dès le
                    printemps. J'ai repris un pavillon entier dans ce cas de figure, budget doublé par rapport au
                    chantier initial.</p>
                <p>Pire encore : du crépi sans gobetis sur brique poreuse. Le mur aspire toute l'eau du mélange pendant
                    la prise. Décollement garanti sous 2 ans. Autre piège classique : un grain trop gros sur un mur
                    structurellement faible (béton cellulaire). La surcharge de poids peut provoquer des micro-fissures
                    qui laissent passer l'eau derrière le revêtement.</p>

                <blockquote class="article-blockquote">
                    Un crépi bien posé sur un enduit bien préparé, c'est 25 ans de tranquillité. Un crépi posé à
                    l'arrache en plein hiver sur un mur non préparé, c'est un ravalement à refaire dans 3 ans. La
                    différence, c'est le gobetis, la température et le temps de séchage entre les couches. Rien de
                    sorcier, mais ça demande de la rigueur.
                </blockquote>

                <!-- Section : FAQ -->
                <h2 id="faq">FAQ Crépi Façade</h2>

                <h3>Quel est le prix moyen d'un crépis de façade ?</h3>
                <p>Comptez 30-60 €/m² pour un crépis nu taloché minéral (pose comprise), et environ 100 €/m² si vous
                    combinez le crépis avec une ITE silicone. Pour une maison de 100 m² de façade : 3 000 € en ravalement
                    simple, 10 000 € avec ITE (avant déduction des aides).</p>

                <h3>Quelle est la différence entre enduit et crépissage ?</h3>
                <p>L'enduit est la couche protectrice lisse qui prépare le mur (corps de 10 mm d'épaisseur). Le
                    crépissage est l'application de la finition granulée décorative (2 mm), par-dessus l'enduit durci.
                    Les deux sont indissociables pour un résultat durable.</p>

                <h3>Quels sont les avantages et inconvénients du crépi ?</h3>
                <p>Avantages : grande variété de textures et couleurs, protection pluie et fissures, possibilité d'ITE
                    avec aides financières. Inconvénients : entretien régulier obligatoire, pose professionnelle
                    uniquement, dégradation accélérée en zone très humide sans hydrofuge.</p>

                <h3>Le crépi augmente-t-il la valeur d'une maison ?</h3>
                <p>Oui. Selon la FNAIM, une maison ravalée fraîchement gagne en moyenne +12 % sur son prix de vente (+15
                    % avec ITE). En revanche, un crépi sale ou abîmé fait perdre jusqu'à -8 % de valeur perçue.</p>

                <h3>Combien coûte le crépi d'une maison complète ?</h3>
                <p>Pour une maison de 100 m² de façade : environ 3 000 € en crépi nu (ravalement simple), et jusqu'à 10
                    000 € avec ITE. Les aides (MaPrimeRénov', CEE, TVA 5.5 %) peuvent réduire significativement le reste
                    à charge, surtout pour les ménages aux revenus modestes.</p>

                <h3>Peut-on poser du crépi soi-même ?</h3>
                <p>Techniquement, les crépis en pot prêts à l'emploi existent en grande surface. Mais le résultat dépend
                    entièrement de la préparation du support (gobetis, enduit de corps, primaire). Sans maîtrise du DTU
                    26.1 et sans l'outillage adapté (compresseur, échafaudage), le risque de décollement ou de
                    fissuration est élevé. Pour une façade complète, la pose professionnelle reste la seule option
                    raisonnable.</p>

                <h3>Crépi et rénovation globale de façade : dans quel ordre planifier ?</h3>
                <p>Le crépi intervient en dernière étape d'une <a href="https://www.cemarenov.fr/renovation-de-facade">rénovation de façade</a> complète, après la reprise des fissures structurelles, le traitement de l'humidité et l'éventuelle pose d'une isolation thermique par l'extérieur. Changer l'ordre risque d'annuler les efforts précédents.</p>

                <h3>Comment nettoyer une façade crépi avant de la reprendre ?</h3>
                <p>Un crépi encrassé ou moussu doit être traité avant tout travaux de réfection. Notre guide sur le <a href="https://www.cemarenov.fr/nettoyage-facade-javel">nettoyage façade à la javel</a> détaille les protocoles par type d'enduit et les précautions à respecter pour ne pas altérer le parement existant.</p>

                <h3>Comment obtenir un devis pour la pose de crépi façade ?</h3>
                <p>Pour obtenir un devis pose crépi façade fiable, demandez au moins 3 devis à des artisans RGE ou qualifiés. Précisez la surface en m² à traiter, le type de support (parpaing, béton, brique), l'état de l'existant (enduit en place ou support nu), et le finition souhaitée (grain, couleur). Un devis sérieux détaille séparément la préparation de surface, les couches de fond, la projection du crépi et les finitions. Méfiez-vous des devis inférieurs à 25 €/m² tout compris : la qualité des matériaux ou la préparation sont souvent sacrifiées.</p>

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
                    Le crépi de façade reste le revêtement le plus répandu en France pour une bonne raison : il protège,
                    il embellit, et combiné à une ITE, il transforme le bilan thermique d'une maison. Mais tout se joue
                    à la pose. Gobetis, corps d'enduit, cure de séchage, température au-dessus de 5 °C : chaque étape
                    compte. Budget moyen pour une maison de 100 m² : 3 000 € en simple ravalement, 10 000 € avec ITE
                    (aides déductibles). Choisissez un pro certifié Qualibat et exigez une garantie décennale.
                </p>
                <a href="<?php echo BASE_URL; ?>contact" class="btn-primary">Demander un devis façade</a>
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