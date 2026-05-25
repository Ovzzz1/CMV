<?php
/**
 * enduit-facade.php
 * Article: Enduit façade — Classification NF, prix, pose DTU 26.1 et erreurs
 */

$article_meta = [
    'title' => 'Enduit façade : le guide complet (Classification NF, Prix, Pose et Erreurs 2026)',
    'category' => 'travaux',
    'image' => 'https://www.cemarenov.fr/image/enduit-facade.webp',
    'excerpt' => 'RME, RPE ou RSE ? Calcul des sacs au m², prix réalistes, liants chaux vs ciment, finitions DTU 26.1 et erreurs de chantier à éviter. Le guide terrain complet.',
    'date' => '2026-03-05',
    'reading_time' => 16,
];

require_once dirname(__DIR__) . '/functions.php';

$page_title = $article_meta['title'];
$page_description = $article_meta['excerpt'];

$current_cat = $article_meta['category'];
$current_url = BASE_URL . str_replace('.php', '', basename($_SERVER['SCRIPT_FILENAME']));
$category = get_category($current_cat);
$other_cats = get_other_categories($current_cat);
$cat_articles = array_values(array_filter(get_category_articles($current_cat, 11), fn($a) => ($a['url'] ?? '') !== $current_url));
$cat_articles = array_slice($cat_articles, 0, 10);
$latest_articles = array_values(array_filter(get_latest_articles(11), fn($a) => ($a['url'] ?? '') !== $current_url));
$latest_articles = array_slice($latest_articles, 0, 10);

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
                <span>Enduit façade</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Façade</span>
                <span class="article-tag">Guide Technique</span>
            </div>

            <h1>Enduit façade : le guide complet<br>
                <span class="h1-accent">Classification NF, Prix, Pose et Erreurs (2026)</span>
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

    <div class="article-layout">

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

        <div class="article-container">

            <p class="article-intro">
                Un enduit de façade, c'est la peau de votre maison. Il protège la maçonnerie des intempéries, des UV, du
                gel et de la pollution. Il définit aussi le style définitif de votre bâtisse. <strong>Mais choisir le
                    mauvais liant, la mauvaise finition ou sous-estimer la quantité de sacs nécessaires, c'est garantir
                    des fissures, des cloques et des reprises coûteuses dans deux ans.</strong>
            </p>

            <div class="article-content">

                <!-- TL;DR -->
                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                        </svg>
                        L'essentiel à retenir
                    </div>
                    <ul>
                        <li><strong>RPE monocouche :</strong> 15-25 €/m² (le plus économique, neuf béton/parpaing).</li>
                        <li><strong>RME multicouche :</strong> 25-35 €/m² (chaux, patrimoine ancien, respirant).</li>
                        <li><strong>RSE élastique :</strong> 30-45 €/m² (anti-fissures, supports instables).</li>
                        <li><strong>Total ravalement :</strong> 50-100 €/m² tout compris (prépa + enduit + finition +
                            échafaudage).</li>
                        <li><strong>Règle d'or :</strong> bâti ancien = chaux. Neuf = ciment/chaux mixte. Jamais ciment
                            pur sur pierre.</li>
                    </ul>
                </div>

                <!-- TOC -->
                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li>Classification NF P15-201 : RME, RPE, RSE</li>
                        <li>Crépi vs enduit : la différence technique</li>
                        <li>Les liants : chaux, ciment, glypse</li>
                        <li>Finition enduit : gratté, taloché, écrasé, ribbé</li>
                        <li>Combien de sacs d'enduit au m² ?</li>
                        <li>Prix enduit façade 2026</li>
                        <li>Préparation support et gobetis (DTU 26.1)</li>
                        <li>Hydrofuge de masse + teintes (CAS, PLU)</li>
                        <li>Monocouche vs multicouche</li>
                        <li>Erreurs courantes + DIY vs entreprise</li>
                        <li>FAQ</li>
                    </ul>
                </div>

                <!-- Section : Classification -->
                <h2 id="classification">Classification NF P15-201 : RME, RPE, RSE</h2>
                <p>La norme française NF P15-201 classe les enduits de façade en trois grandes familles selon leur
                    composition chimique et leurs propriétés mécaniques. Cette classification détermine l'usage, la
                    durabilité et le coût de votre ravalement.</p>

                <h3>RME (Résineux Minéral Emulsionné)</h3>
                <p>C'est l'enduit traditionnel à base de chaux ou de ciment avec émulsions minérales. Respirant,
                    écologique, parfait pour les bâtiments anciens en pierre ou moellon. Application multicouche
                    obligatoire (gobetis 5-8 mm + corps d'enduit 15 mm + parement 5 mm), pose manuelle ou mécanique,
                    temps de séchage long (48 h minimum entre couches). Usage recommandé : rénovation patrimoine,
                    façades poreuses, zones humides. Prix matériel : <strong>25-35 €/m²</strong>.</p>

                <blockquote class="article-blockquote">
                    Sur le chantier, j'ai vu trop de RME posés sur béton neuf sans gobetis. Résultat : décollement total
                    au premier hiver. Le gobetis n'est pas optionnel.
                </blockquote>

                <h3>RPE (Résineux Plastique Emulsionné)</h3>
                <p>Enduits monocouche prêts à l'emploi, à base de résines acryliques ou silicates avec pigments intégrés
                    dans la masse. Pose en 1-2 couches épaisses (12-25 mm), teinté d'usine, aspect lisse homogène,
                    application mécanique rapide (pompe à mortier). Usage recommandé : façades neuves planes, béton,
                    parpaing. Prix matériel : <strong>15-25 €/m²</strong> (le plus économique). Attention : moins
                    respirant que le RME. Sur support humide, risque de cloques importantes.</p>

                <h3>RSE (Résineux Souple Emulsionné)</h3>
                <p>Enduits élastiques avec résines vinyliques ou siloxanes, conçus pour absorber les micro-mouvements du
                    support. Grande élasticité (anti-fissures jusqu'à 2 mm), mais finition limitée (gratté uniquement).
                    Usage recommandé : façades fissurées, maison bois/bardage, zones sismiques, murs instables. Prix
                    matériel : <strong>30-45 €/m²</strong>.</p>

                <p><strong>Conseil de terrain :</strong> pour une maison des années 70 en parpaing bien plane, prenez
                    RPE monocouche. Pour une longère en pierre du 19e avec joints dégradés, RME multicouche à la chaux
                    hydraulique. Ne mélangez jamais les deux sur le même chantier.</p>

                <!-- Section : Crépi vs Enduit -->
                <h2 id="crepi-vs-enduit">Crépi vs enduit : la différence technique</h2>
                <p>Ces deux termes reviennent constamment dans les devis et au rayon bricolage. Techniquement, ce n'est
                    pas la même chose, même si le langage courant mélange tout.</p>
                <p>L'<strong>enduit</strong> désigne la couche de mortier protecteur qui uniformise la surface et
                    imperméabilise le mur. On parle de gobetis (accrochage), corps d'enduit (épaisseur principale) et
                    parement (finition). Le <a href="<?php echo BASE_URL; ?>crepi-facade"
                        style="text-decoration: underline;"><strong>crépi de façade</strong></a> est quant à lui le
                    parement décoratif rugueux appliqué en toute dernière surface de l'enduit (gratté, taloché,
                    rustique).</p>
                <p>Dans la pratique courante, un "crépi monocouche taloché" = enduit + parement décoratif en une seule
                    opération. Un "enduit monocouche RPE gratté fin" = exactement la même chose. Sur un devis, exigez la
                    fiche technique : NF P15-201, liant dominant, épaisseur d'application minimale/maximale, finition
                    proposée. Ça vous évitera les mauvaises surprises.</p>

                <!-- Section : Liants -->
                <h2 id="liants">Les liants : chaux hydraulique/aérienne vs ciment vs glypse</h2>
                <p>Le liant détermine la résistance mécanique, la perméabilité à la vapeur d'eau et la longévité de
                    votre enduit.</p>

                <h3>Chaux aérienne (NF P15-311)</h3>
                <p>Prend uniquement à l'air par carbonatation (réaction CO2). Extrêmement souple, auto-réparatrice
                    (cristallisation dans les microfissures), parfaitement perméable. Dosage type : 1 volume chaux + 3
                    volumes sable fin 0/4. Temps de prise : 24-48 h par couche. Usage : bâti ancien (pierre, moellon),
                    façades protégées.</p>

                <h3>Chaux hydraulique NHL (Naturelle Hydraulique Liant)</h3>
                <p>Prend à l'eau (hydratation) ET à l'air. Plus résistante que l'aérienne, excellente adhérence. NHL 2 :
                    très faible hydraulique, hyper souple (torchis, pisé). NHL 3.5 : standard ravalement extérieur. NHL
                    5 : très hydraulique, zones très exposées. Usage : <strong>80 % des chantiers de façade</strong>
                    (neuf + rénovation).</p>

                <h3>Ciment (NF EN 197-1 CEM I/II)</h3>
                <p>Prise rapide par hydratation (eau uniquement). Économique, très dur, mais rigide, ce qui provoque des
                    microfissures sur supports souples ou déformables. Dosage sécurisé : toujours mélangé avec chaux (1
                    ciment / 1 chaux). Jamais pur sur pierre. Usage : monocouche RPE, béton cellulaire, supports neufs
                    lisses.</p>

                <h3>Glypse (plâtre extérieur modifié)</h3>
                <p>Plâtre synthétique résistant humidité. Pose ultra-rapide, finition lisse parfaite. Usage : façades
                    très abritées uniquement (sous auvent). Pas pour exposition pluie directe.</p>

                <p><strong>Règle d'or apprise sur les chantiers :</strong> bâti ancien = chaux hydraulique NHL 3.5. Neuf
                    béton/parpaing = monocouche RPE ciment/chaux. Jamais ciment pur sur pierre, jamais.</p>

                <!-- Section : Finitions -->
                <h2 id="finitions">Finition enduit façade : gratté, taloché, écrasé, ribbé</h2>
                <p>La finition définit l'esthétique, l'entretien et la durabilité. Chaque technique a ses contraintes
                    techniques précises (DTU 26.1).</p>

                <h3>Gratté fin (0.5-1 mm) vs gratté moyen (2-3 mm)</h3>
                <p>On projette l'enduit, on attend 3 à 16 heures de prise superficielle, puis on gratte horizontalement
                    avec une règle crantée. Drainage pluie excellent, aspect contemporain. Contrainte : interdit sur
                    supports trop lisses (risque de pelage).</p>

                <h3>Taloché</h3>
                <p>On lisse la surface fraîche avec une taloche éponge en mouvements circulaires. Aspect satiné
                    irrégulier avec traces d'outil visibles. Contre-indication majeure : <strong>interdit sur béton
                        cellulaire ou Ytong</strong> (surface trop lisse, décollement garanti).</p>

                <h3>Écrasé rustique ou projeté</h3>
                <p>Première couche projetée grossièrement au jet, seconde couche écrasée au rouleau métallique ou
                    taloche. Aspect brut authentique, pose très rapide. Usage : fermes, longères, style campagne.</p>

                <h3>Ribbé ou structuré</h3>
                <p>Rouleau texturé ou gabarit pour créer des lignes verticales/horizontales ou motifs. Très décoratif,
                    mais accumule vite la pollution environnementale et reste complexe à entretenir, obligeant souvent à
                    faire réaliser un <a href="<?php echo BASE_URL; ?>nettoyage-demoussage-facade"
                        style="text-decoration: underline;">nettoyage et démoussage de façade</a> régulier.</p>

                <p><strong>Astuce de pro :</strong> gratté fin pour moderne économique. Taloché pour classique chic
                    (mais vérifiez le support). Évitez le ribbé sauf si vous aimez laver votre façade tous les 3 ans.
                </p>

                <!-- Section : Calcul sacs -->
                <h2 id="calcul-sacs">Combien de sacs d'enduit au m² ? Calcul précis</h2>
                <p>Règle empirique de base : 1 sac de 25 kg couvre 1 à 2 m² selon l'épaisseur et la porosité du support.
                </p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Type enduit</th>
                                <th>Épaisseur totale</th>
                                <th>Sacs/m²</th>
                                <th>Surface/sac 25 kg</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Monocouche RPE gratté</strong></td>
                                <td>18 mm</td>
                                <td>1.2</td>
                                <td>1.5 m²</td>
                            </tr>
                            <tr>
                                <td><strong>Multicouche RME</strong></td>
                                <td>25 mm (total)</td>
                                <td>2.0</td>
                                <td>1 m²</td>
                            </tr>
                            <tr>
                                <td><strong>Rebouchage local</strong></td>
                                <td>5 mm</td>
                                <td>0.3</td>
                                <td>4 m²</td>
                            </tr>
                            <tr>
                                <td><strong>RSE élastique</strong></td>
                                <td>15 mm</td>
                                <td>1.0</td>
                                <td>1.8 m²</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <p><strong>Formule technique :</strong> Sacs nécessaires = Surface (m²) x épaisseur (mm) x densité (1.6
                    t/m³) / 25 kg. Exemple concret : façade 100 m² à 20 mm monocouche = 100 x 0.02 x 1.6 / 0.025 =
                    <strong>128 sacs</strong>.</p>

                <blockquote class="article-blockquote">
                    Un client a calculé 50 sacs pour ses 100 m². Il avait oublié la porosité du support ancien et les
                    pertes de projection. Résultat : 75 sacs au total. Toujours prévoir +20 % de marge.
                </blockquote>

                <p><strong>Combien de sacs 25 kg dans 1 m³ d'enduit ?</strong> 40 à 50 sacs (densité moyenne 1.6
                    tonnes/m³).</p>

                <!-- Section : Prix -->
                <h2 id="prix">Prix enduit façade 2026</h2>

                <h3>Matériau seul (HT, sacs 25 kg inclus)</h3>
                <ul class="custom-list">
                    <li><strong>RPE monocouche :</strong> 15-25 €/m² (le plus courant).</li>
                    <li><strong>RME multicouche :</strong> 25-35 €/m².</li>
                    <li><strong>RSE élastique :</strong> 30-45 €/m².</li>
                </ul>

                <h3>Main-d'œuvre (pose)</h3>
                <ul class="custom-list">
                    <li><strong>Manuel (taloché traditionnel) :</strong> 30-50 €/m².</li>
                    <li><strong>Mécanique (pompe projection) :</strong> 20-35 €/m² (économies sur surfaces supérieures à
                        200 m²).</li>
                </ul>

                <h3>Total ravalement complet</h3>
                <p>Préparation + enduit + échafaudage pour un <a href="<?php echo BASE_URL; ?>ravalement-de-facade"
                        style="text-decoration: underline;">ravalement de façade</a> classique : <strong>50-80
                        €/m²</strong> pour une maison individuelle de moins de 150 m², <strong>40-60 €/m²</strong> pour
                    les grandes surfaces. Facteurs qui font exploser le prix : échafaudage complexe, diagnostic amiante
                    obligatoire, reprises importantes, PLU contraignant (couleurs spécifiques).</p>
                <p><em>Astuce d'artisan :</em> Sachez que profiter de l'échafaudage pour <a
                        href="<?php echo BASE_URL; ?>isolation-thermique-exterieur-ite"
                        style="text-decoration: underline;">coupler votre enduit avec une véritable isolation thermique
                        par l'extérieur (ITE)</a> s'avère bien souvent le meilleur calcul financier à long terme grâce
                    aux aides de l'État.</p>

                <!-- Section : Préparation -->
                <h2 id="preparation">Préparation support : gobetis obligatoire ? (DTU 26.1)</h2>
                <p>Le DTU 26.1 (enduits à base de mortiers) impose un support propre, plan (écart règle 2 m inférieur à
                    5 mm), dépoussiéré, et humidifié 24 h avant pose.</p>

                <h3>Étapes multicouche obligatoires</h3>
                <ul class="custom-list">
                    <li><strong>Gobetis d'accrochage (5-8 mm) :</strong> obligatoire sur béton lisse, brique neuve,
                        vieux enduit sain. Dosage chaux/ciment sable 1/4. Séchage 48 h.</li>
                    <li><strong>Corps d'enduit (15 mm) :</strong> épaisseur principale, régularisation de la surface.
                    </li>
                    <li><strong>Parement/finition (5 mm) :</strong> couche décorative. Délai minimum 7 jours après
                        corps.</li>
                </ul>
                <p>Le dosage en eau doit rester constant entre les couches (trop d'eau = retrait/fissures). Sur supports
                    très poreux (pierre naturelle) : pas de gobetis, juste une humidification abondante.</p>

                <!-- Section : Hydrofuge -->
                <h2 id="hydrofuge">Hydrofuge de masse + teintes (CAS, PLU)</h2>
                <p>L'hydrofuge de masse (incorporé dans le liant dès la fabrication) est toujours supérieur à
                    l'hydrofuge de surface (pulvérisé après, lessivable par la pluie).</p>
                <p><strong>Coefficient d'Absorption Solaire (CAS) :</strong> CAS inférieur à 0.7 obligatoire (couleurs
                    claires : blanc, beige, gris clair). Un CAS supérieur à 0.7 (couleur foncée) provoque une surchauffe
                    estivale qui entraîne microfissures et cloques.</p>
                <p><strong>PLU et urbanisme :</strong> les couleurs de façade sont souvent imposées par la commune (pas
                    de rouge vif en zone pavillonnaire, par exemple). Déclaration préalable de travaux obligatoire dès 5
                    m² de façade modifiée. Diagnostic amiante obligatoire avant tout ravalement (DTA valide 3 ans).</p>

                <!-- Section : Monocouche vs Multicouche -->
                <h2 id="monocouche-multicouche">Monocouche vs multicouche : manuel ou pompe ?</h2>

                <h3>Monocouche RPE</h3>
                <p>1-2 couches épaisses (12-25 mm). Application machine (pompe mortier) sur grande surface. 1 jour de
                    chantier pour 100 m².</p>

                <h3>Multicouche RME</h3>
                <p>2-3 couches fines. Application manuelle (taloche, règle). 3-5 jours (48 h entre gobetis et corps, 7
                    jours entre corps et parement).</p>

                <p><strong>Machine vs manuel :</strong> la pompe offre rapidité et uniformité (+20 % d'économie de
                    sacs). Le manuel offre la précision pour les finitions talochées de qualité.</p>

                <!-- Section : Erreurs -->
                <h2 id="erreurs">Erreurs courantes + DIY vs entreprise</h2>

                <h3>Erreurs fatales vues sur chantier</h3>
                <ul class="custom-list">
                    <li><strong>Dosage eau variable entre couches</strong> → retrait et fissures.</li>
                    <li><strong>Épaisseur supérieure à 25 mm</strong> → décollement par poids.</li>
                    <li><strong>Taloché sur béton cellulaire/Ytong</strong> → pelage garanti.</li>
                    <li><strong>Oubli du gobetis sur béton neuf</strong> → non-accrochage.</li>
                    <li><strong>Pigments CAS supérieur à 0.7</strong> → faïençage au soleil.</li>
                </ul>

                <blockquote class="article-blockquote">
                    Un client pose du taloché sur béton cellulaire. 18 mois après, faïençage total sur toute la façade
                    sud. Le taloché est strictement interdit sur ce support. Reprise complète obligatoire. Toujours
                    vérifier la compatibilité support/finition avant de commencer.
                </blockquote>

                <p><strong>DIY possible ?</strong> Petit mur de moins de 50 m², support sain, monocouche RPE gratté.
                    <strong>Entreprise obligatoire :</strong> grande façade (échafaudage, diagnostic amiante, PLU).</p>

                <!-- Section : FAQ -->
                <h2 id="faq">FAQ</h2>

                <h3>Quelle surface avec un sac d'enduit de 25 kg ?</h3>
                <p>1 à 2 m² selon l'épaisseur. Comptez 1.2 m² pour un monocouche 18 mm standard, et 1 m² pour un
                    multicouche 25 mm.</p>

                <h3>Combien de sacs de 25 kg y a-t-il dans 1 mètre cube ?</h3>
                <p>40 à 50 sacs (densité enduit fini 1.6 tonnes/m³).</p>

                <h3>Comment calculer l'enduit d'une façade ?</h3>
                <p>Surface (m²) x épaisseur (mm) x 0.0016 t/m³ / 0.025 kg/sac. Exemple : 100 m² x 20 mm = 128 sacs.</p>

                <h3>Quel est le rendement d'un enduit multi-finitions de 25 kg ?</h3>
                <p>1.2 m² à 18 mm d'épaisseur en conditions optimales sur support moyen.</p>

                <h3>Crépi ou enduit, lequel choisir ?</h3>
                <p>Les deux travaillent ensemble : l'enduit protège (corps), le crépi décore (parement). Un "monocouche"
                    combine les deux en une seule opération. Sur un devis, demandez toujours la fiche technique NF
                    P15-201.</p>

                <h3>L'enduit de façade fait-il partie d'une rénovation complète ?</h3>
                <p>Oui, l'enduit est la finition d'un projet plus large. Notre guide sur la <a href="https://www.cemarenov.fr/renovation-de-facade">rénovation de façade</a> présente la séquence complète des travaux (reprise des fissures, traitement humidité, ITE éventuelle) avant d'appliquer l'enduit de finition.</p>

                <h3>Quel mortier pour les joints de façade en pierre ?</h3>
                <p>Pour les murs en pierre ancienne, n'utilisez jamais de ciment pur. Notre guide sur le <a href="https://www.cemarenov.fr/dosage-mortier-batard-faitage">dosage du mortier bâtard</a> détaille les proportions chaux-ciment-sable adaptées aux différents types de parements, y compris les murs en pierre taillée ou en moellons.</p>

                <h3>Et pour un enduit sur parpaing : quels dosages spécifiques ?</h3>
                <p>Le parpaing est un support cimentaire inerte qui nécessite des proportions précises de ciment, chaux et sable pour une bonne accroche sans fissuration. Notre guide <a href="https://www.cemarenov.fr/dosage-enduit-ciment-chaux-parpaing">dosage enduit ciment chaux sur parpaing</a> détaille les ratios pour chaque couche (gobetis, corps d'enduit, finition) avec les erreurs de gâchage à éviter.</p>

                <h3>Comment préparer l'agenda des travaux de façade ?</h3>
                <p>Une rénovation de façade s'anticipe : choix des artisans, commandes de matériaux, période de séchage, démarches administratives. L'outil <a href="https://www.cemarenov.fr/travaux-planning-ma-gestion-renovation">planning de gestion de travaux de rénovation</a> peut vous aider à séquencer et suivre chaque étape du chantier.</p>

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
                    L'enduit de façade protège et embellit votre maison pour 20 à 30 ans, à condition de respecter les
                    fondamentaux. Choisissez le bon liant (chaux pour l'ancien, RPE ciment/chaux pour le neuf),
                    respectez les couches DTU 26.1 (gobetis, corps, parement), prévoyez +20 % de sacs, et ne posez
                    jamais par temps de gel. Un ravalement bien fait, c'est un investissement qui se rembourse en
                    protection, en confort et en valeur immobilière.
                </p>
                <a href="<?php echo BASE_URL; ?>contact" class="btn-primary">Demander un devis ravalement</a>
            </div>

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

        </div>

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

    </div>
</article>


<?php
// --- Schema.org Structured Data ---
require_once dirname(__DIR__) . '/schema-data.php';
$_schema = get_schema_data(basename(__FILE__, '.php'));
echo generate_article_schema($article_meta, $_schema['faq'] ?? [], $_schema['howto'] ?? []);
echo generate_rating_widget();
?>
<?php include dirname(__DIR__) . '/footer.php'; ?>