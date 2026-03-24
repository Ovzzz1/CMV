<?php
/**
 * fondation-puits.php
 * Article : Fondation puits : quand les utiliser, prix et technique (2026)
 * Site : Expert Renov' (cemarenov.fr)
 * Date : 2026-03-23
 */

$article_meta = [
    'title'        => 'Fondation puits : quand les utiliser, prix et technique (2026)',
    'category'     => 'renovation',
    'slug'         => 'fondation-puits',
    'image'        => 'https://www.cemarenov.fr/image/fondation-puits-1.webp',
    'excerpt'      => 'Les puits de fondation : quand les choisir, comment les réaliser et à quel prix. Guide complet avec chiffres exacts et retour d\'expérience terrain.',
    'date'         => '2026-03-23',
    'reading_time' => 10,
];

// ── Bloc logique CMS — NE JAMAIS MODIFIER ─────────────────────────────────
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

            <!-- BREADCRUMB -->
            <nav class="breadcrumb">
                <a href="<?php echo BASE_URL; ?>">Accueil</a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                <a href="<?php echo BASE_URL . $current_cat; ?>"><?php echo htmlspecialchars($category['name']); ?></a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                <span>Fondation puits</span>
            </nav>

            <!-- TAGS -->
            <div class="article-tags">
                <span class="article-tag">Fondations</span>
                <span class="article-tag">Gros œuvre</span>
                <span class="article-tag">Extension</span>
            </div>

            <!-- H1 -->
            <h1>Fondation puits :<br>
                <span class="h1-accent">quand les utiliser, prix et technique (2026)</span>
            </h1>

            <!-- META HEADER EEAT -->
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

            <p class="article-intro">Vous construisez une extension ou votre terrain présente un sol peu stable ? Les <strong>puits de fondation</strong> offrent une solution fiable et économique pour soutenir votre ouvrage. Moins connus que les pieux, ils méritent pourtant qu'on s'y intéresse. Découvrez quand les utiliser, comment les réaliser et combien ça coûte.</p>

            <div class="article-content">

                <!-- TL;DR -->
                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                        L'essentiel à retenir
                    </div>
                    <ul>
                        <li><strong>Profondeur puits fondation :</strong> 2 à 5 mètres selon la qualité du sol porteur.</li>
                        <li><strong>Diamètre standard :</strong> 40 à 60 cm pour une maison individuelle.</li>
                        <li><strong>Coût au ml creusé :</strong> 80 à 150 €/mètre linéaire (main d'œuvre comprise).</li>
                        <li><strong>Délai réalisation :</strong> 2 à 4 jours pour 8 à 12 puits sur un chantier standard.</li>
                        <li><strong>Alternative aux pieux :</strong> 30 à 50 % moins cher, idéal pour les extensions légères.</li>
                    </ul>
                </div>

                <!-- SOMMAIRE -->
                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li><a href="#quest-ce-quun-puits-de-fondation">Qu'est-ce qu'un puits de fondation</a></li>
                        <li><a href="#quand-faire-des-puits-de-fondation">Quand faire des puits de fondation</a></li>
                        <li><a href="#technique-de-realisation-des-puits">Technique de réalisation des puits</a></li>
                        <li><a href="#puits-vs-pieux-quel-choix">Puits de fondation vs pieux</a></li>
                        <li><a href="#cout-des-puits-de-fondation">Coût des puits de fondation</a></li>
                        <li><a href="#faq">FAQ — Questions fréquentes</a></li>
                    </ul>
                </div>

                <!-- H2: Qu'est-ce qu'un puits de fondation -->
                <h2 id="quest-ce-quun-puits-de-fondation">Qu'est-ce qu'un puits de fondation</h2>

                <h3>Définition et principe</h3>
                <p>Un <strong>puits de fondation</strong> est un élément de fondation profonde creusé dans le sol pour atteindre une couche porteuse stable. Contrairement aux <strong><u><a href="<?php echo BASE_URL; ?>garage-fondation">fondations de garage classiques</a></u></strong> qui reposent sur des semelles filantes, le puits descend verticalement jusqu'à trouver un sol suffisamment résistant pour supporter la charge de l'ouvrage.</p>

                <p>Le principe est simple : on creuse un trou cylindrique, on le ferraille, on le cimente. Le puits repose alors sur une couche stable et transmet les charges de la construction vers le sol porteur. On appelle cette base le <strong>radier</strong> — c'est la partie inférieure du puits qui s'évente légèrement pour répartir la charge sur une surface plus grande.</p>

                <div style="background-color: var(--color-light); border-left: 4px solid var(--color-primary); padding: 1.5rem; margin-bottom: 2rem; border-radius: 0 8px 8px 0;">
                    <strong>En clair :</strong> Le puits de fondation joue le rôle d'un pilier enterré. Il traverse les couches de sol faible pour s'ancrer dans le roc ou l'argile compacte situés en profondeur.
                </div>

                <h3>Différence pieux, puits et semelles</h3>
                <p>Beaucoup confondent ces trois techniques. Pourtant, elles répondent à des besoins différents :</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr><th>Élément</th><th>Profondeur</th><th>Usage principal</th><th>Coût indicatif</th></tr>
                        </thead>
                        <tbody>
                            <tr><td><strong>Semelle filante</strong></td><td>50 à 80 cm</td><td>Sol stable, construction standard</td><td>80 à 120 €/ml</td></tr>
                            <tr><td><strong>Puits de fondation</strong></td><td>2 à 5 m</td><td>Sol faible, extension légère</td><td>80 à 150 €/ml creusé</td></tr>
                            <tr><td><strong>Pieu foré</strong></td><td>3 à 15 m</td><td>Sol très compressible, charges lourdes</td><td>150 à 400 €/ml</td></tr>
                            <tr><td><strong>Pieu battu</strong></td><td>6 à 20 m</td><td>Grands ouvrages, viaducs</td><td>200 à 500 €/ml</td></tr>
                        </tbody>
                    </table>
                </div>

                <p>Les <strong>semelles</strong> conviennent aux terrains stables. Les <strong>puits</strong> prennent le relais quand le sol de surface est trop faible mais que la couche porteuse reste accessible (moins de 5 m). Les <strong>pieux</strong> deviennent nécessaires pour les charges très lourdes ou les sols profondément mauvais.</p>

                <h3>Matériaux utilisés</h3>
                <p>Un puits de fondation standard se compose de trois matériaux :</p>

                <ul class="custom-list">
                    <li><strong>Béton :</strong> Dosé à 350 kg/m³ minimum (B25). Le <strong><u><a href="<?php echo BASE_URL; ?>dosage-beton-fondation">dosage du béton pour fondation</a></u></strong> doit être respecté à la lettre pour garantir la solidité du puits.</li>
                    <li><strong>Ferraillage :</strong> Une <strong>cage d'armatures</strong> — soit un assemblage de barres d'acier formant un cylindre — maintient le béton sous les efforts de traction et de compression.</li>
                    <li><strong>Parpaings (optionnel) :</strong> Dans certains cas, on édifie la partie haute du puits en parpaings creux sur une hauteur de 1 à 2 mètres avant de couler le béton.</li>
                </ul>

                <div style="background-color: var(--color-light); border-left: 4px solid var(--color-primary); padding: 1.5rem; margin-bottom: 2rem; border-radius: 0 8px 8px 0;">
                    <strong>En clair :</strong> La cage d'armatures est le squelette métallique du puits. Elle empêche le béton de se fissurer sous la pression du sol ou des charges de l'ouvrage.
                </div>

                <!-- H2: Quand faire des puits de fondation -->
                <h2 id="quand-faire-des-puits-de-fondation">Quand faire des puits de fondation</h2>

                <h3>Sol faible ou compressible</h3>
                <p>C'est le cas le plus fréquent. Votre terrain présente une couche de remblai, de tourbe ou d'argile molle sur les premiers mètres. Ces sols ne supportent pas le poids d'une construction. Le puits traverse ces couches instables pour s'ancrer dans le sol porteur.</p>

                <p>Signes qui doivent vous alerter :</p>
                <ul class="custom-list">
                    <li><strong>Végétation :</strong> Présence de roseaux, de saules ou de carex indique un sol humide et peu stable.</li>
                    <li><strong>Historique :</strong> Ancienne zone marécageuse, carrière comblée ou décharge.</li>
                    <li><strong>Étude de sol :</strong> Rapport G2 (géotechnique) indiquant une portance insuffisante en surface.</li>
                </ul>

                <h3>Extension sur fondations existantes</h3>
                <p>Vous agrandissez votre maison et la nouvelle partie doit s'appuyer sur des fondations différentes de l'existant ? Les puits permettent de créer des points d'appui sans démolir les fondations actuelles.</p>

                <p>Cette technique, appelée <strong><u><a href="<?php echo BASE_URL; ?>reprise-fondation-sous-oeuvre">reprise en sous-œuvre</a></u></strong>, consiste à soutenir temporairement l'ouvrage existant pendant qu'on creuse et coule les puits sous les murs porteurs. Une fois le béton durci, on transfère progressivement les charges sur les nouveaux appuis.</p>

                <div style="background-color: var(--color-light); border-left: 4px solid var(--color-primary); padding: 1.5rem; margin-bottom: 2rem; border-radius: 0 8px 8px 0;">
                    <strong>En clair :</strong> La reprise en sous-œuvre, c'est opérer sous un mur déjà construit sans qu'il s'effondre. Ça demande du matériel spécifique (vérins, cintres) et de l'expérience.
                </div>

                <h3>Décaissement limité</h3>
                <p>Sur un terrain en pente ou en limite de propriété, vous ne pouvez pas creuser de grandes tranchées. Les puits de fondation permettent de foncer verticalement sans toucher au voisinage.</p>

                <p>C'est particulièrement utile pour les extensions en limite séparative où la réglementation impose un respect strict des emprises au sol.</p>

                <h3>Zone inondable ou proche de nappe</h3>
                <p>Dans les zones où la nappe phréatique est haute, une semelle classique risquerait de flotter ou de subir des mouvements dus aux variations du niveau d'eau. Le puits, ancré en profondeur, reste stable quelle que soit la saison.</p>

                <blockquote class="article-blockquote">
                    <p>"Chantier à Saint-Nazaire, sol pourri sur 4 mètres — tourbe, vase, tout ce qu'il ne faut pas. Le client voulait absolument une extension de 20 m². On a posé 10 puits à 4,50 m de profondeur. Le maçon a mis 3 jours à creuser à la pelleteuse avec godet spécial. Résultat : l'extension tient parfaitement, zéro tassement 5 ans après. Quand le sol est mauvais, il faut aller chercher le bon."</p>
                </blockquote>

                <!-- H2: Technique de réalisation -->
                <h2 id="technique-de-realisation-des-puits">Technique de réalisation des puits</h2>

                <h3>Repérage et traçage</h3>
                <p>Avant de creuser, le géomètre ou le chef de chantier trace l'emplacement exact de chaque puits selon le plan de structure. On utilise un théodolite ou un laser pour garantir l'alignement.</p>

                <p>Les puits se situent généralement :</p>
                <ul class="custom-list">
                    <li><strong>Aux angles</strong> de l'ouvrage</li>
                    <li><strong>Sous les murs porteurs</strong>, tous les 2 à 3 mètres</li>
                    <li><strong>Aux intersections</strong> de murs</li>
                </ul>

                <p>L'espacement entre puits dépend de la charge à supporter. Pour une extension légère (bois, ossature métallique), on espacera de 2,50 à 3 mètres. Pour une maison en parpaings, on réduira à 1,80 à 2,20 mètres.</p>

                <h3>Excavation : manuelle ou mécanique</h3>
                <p>Deux méthodes selon la profondeur et l'accessibilité :</p>

                <p><strong>À la main (jusqu'à 3 mètres) :</strong></p>
                <p>Un ouvrier équipé d'une pelle, d'un pic et d'un seau descend dans le trou au fur et à mesure. On évacue la terre avec une benne et un treuil. Cette méthode reste économique pour de petits chantiers (4 à 6 puits) et permet une grande précision.</p>

                <p><strong>À la pelleteuse (au-delà de 2,50 m) :</strong></p>
                <p>Godet spécial étroit (30 à 40 cm de large) monté sur une pelleteuse de 8 à 12 tonnes. Plus rapide, mais nécessite un accès suffisant et un sol stable pour la machine. Compter 20 à 30 minutes par puits contre 2 à 3 heures à la main.</p>

                <div style="background-color: #fbe3cb; border-left: 4px solid #e74c3c; padding: 1.5rem; margin-bottom: 2rem; border-radius: 0 8px 8px 0; color: #3e2e1f;">
                    <strong>Attention :</strong> Au-delà de 1,20 m de profondeur, les parois doivent être étayées ou le puits réalisé en blindage pour éviter les effondrements. Le risque d'accident est réel.
                </div>

                <h3>Ferraillage et cage d'armatures</h3>
                <p>Une fois le trou creusé et nettoyé, on descend la cage d'armatures préfabriquée. Elle se compose de :</p>

                <ul class="custom-list">
                    <li><strong>Barres verticales :</strong> 4 à 8 fer de 12 ou 14 mm selon le diamètre du puits</li>
                    <li><strong>Cadres ou épingles :</strong> Fer de 6 ou 8 mm espacés de 15 à 20 cm</li>
                    <li><strong>Longueur :</strong> La cage dépasse de 30 à 50 cm au-dessus du sol pour s'ancrer dans le futur mur ou la longrine</li>
                </ul>

                <p>On positionne des cales en béton ou des boules plastiques au fond du trou pour maintenir la cage à 5 cm du sol. Cet enrobage protège l'acier de la corrosion.</p>

                <h3>Coulage du béton</h3>
                <p>Le béton est coulé en une seule fois pour garantir la monolithicité du puits. On utilise :</p>

                <ul class="custom-list">
                    <li><strong>Béton B25 (350 kg/m³)</strong> minimum</li>
                    <li><strong>Granulats de 0/20 mm</strong> pour faciliter la mise en œuvre</li>
                    <li><strong>Adjuvant plastifiant</strong> en cas de forte armature ou de section réduite</li>
                </ul>

                <p>Le coulage se fait par benne ou pompe à béton selon l'accessibilité. On vibrte le béton avec une aiguille vibrante pour éliminer les bulles d'air et assurer le contact parfait avec le sol.</p>

                <h3>Reprise en sous-œuvre</h3>
                <p>Quand on doit créer des fondations sous un mur existant, la procédure est plus complexe :</p>

                <ol>
                    <li><strong>Étaiement :</strong> On installe des vérins et des poutres de répartition pour soutenir le mur</li>
                    <li><strong>Découpe :</strong> On ouvre des tranchées dans les fondations existantes tous les 1,50 à 2 mètres</li>
                    <li><strong>Excavation :</strong> On creuse les puits sous les sections étayées</li>
                    <li><strong>Coulage :</strong> On coule le béton et on laisse durcir 48 heures minimum</li>
                    <li><strong>Reprise :</strong> On déplace les étais sur les sections suivantes et on recommence</li>
                </ol>

                <p>Cette opération demande un calcul de structure pour dimensionner les étais. Ne tentez pas ça sans professionnel.</p>

                <!-- H2: Puits vs pieux -->
                <h2 id="puits-vs-pieux-quel-choix">Puits de fondation vs pieux : quel choix</h2>

                <h3>Avantages des puits</h3>
                <ul class="custom-list">
                    <li><strong>Coût :</strong> 30 à 50 % moins cher que les pieux forés</li>
                    <li><strong>Simplicité :</strong> Pas besoin d'engin de forage lourd</li>
                    <li><strong>Accessibilité :</strong> Possible en terrain difficile, près des constructions existantes</li>
                    <li><strong>Visibilité :</strong> On voit le sol porteur, pas de surprise</li>
                    <li><strong>Modulable :</strong> Profondeur ajustable sur chaque puits selon les rencontres</li>
                </ul>

                <h3>Avantages des pieux</h3>
                <ul class="custom-list">
                    <li><strong>Profondeur :</strong> Jusqu'à 20 mètres et plus, là où les puits s'arrêtent</li>
                    <li><strong>Rapidité :</strong> Une foreuse pose 10 pieux par jour contre 3 à 4 puits</li>
                    <li><strong>Charge :</strong> Capacité portante supérieure pour les ouvrages lourds</li>
                    <li><strong>Précision :</strong> Diamètre constant garanti par la machine</li>
                    <li><strong>Tout temps :</strong> Fonctionne même en présence de nappe</li>
                </ul>

                <h3>Quel choix selon le contexte</h3>
                <p>Voici comment orienter votre décision :</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr><th>Situation</th><th>Solution recommandée</th><th>Pourquoi</th></tr>
                        </thead>
                        <tbody>
                            <tr><td>Extension bois/ossature, sol faible < 4 m</td><td><strong>Puits</strong></td><td>Économique, suffisant</td></tr>
                            <tr><td>Maison plain-pied en maçonnerie</td><td><strong>Puits</strong></td><td>Charge supportée, coût maîtrisé</td></tr>
                            <tr><td>Étage supplémentaire sur existant</td><td><strong>Pieux</strong></td><td>Charge trop lourde</td></tr>
                            <tr><td>Sol pourri sur > 5 mètres</td><td><strong>Pieux</strong></td><td>Profondeur nécessaire</td></tr>
                            <tr><td>Zone à fort risque sismique</td><td><strong>Pieux</strong></td><td>Meilleure résistance horizontale</td></tr>
                            <tr><td>Très grand nombre de points d'appui</td><td><strong>Pieux</strong></td><td>Rapidité d'exécution</td></tr>
                        </tbody>
                    </table>
                </div>

                <!-- H2: Coût des puits -->
                <h2 id="cout-des-puits-de-fondation">Coût des puits de fondation</h2>

                <h3>Prix au mètre linéaire creusé</h3>
                <p>Le coût de creusement dépend de la méthode et de la nature du sol :</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr><th>Type de sol</th><th>À la main</th><th>À la pelleteuse</th></tr>
                        </thead>
                        <tbody>
                            <tr><td><strong>Terre végétale / sable</strong></td><td>60 à 80 €/ml</td><td>40 à 60 €/ml</td></tr>
                            <tr><td><strong>Argile compacte</strong></td><td>80 à 120 €/ml</td><td>60 à 90 €/ml</td></tr>
                            <tr><td><strong>Sol rocheux / caillouteux</strong></td><td>120 à 180 €/ml</td><td>90 à 140 €/ml</td></tr>
                        </tbody>
                    </table>
                </div>

                <h3>Prix béton et ferraillage</h3>
                <p>Pour un puits standard de 50 cm de diamètre :</p>

                <ul class="custom-list">
                    <li><strong>Béton B25 :</strong> 0,20 m³ par mètre de profondeur × 120 €/m³ = <strong>24 €/ml</strong></li>
                    <li><strong>Ferraillage :</strong> Cage préfabriquée ou façonnée sur place = <strong>15 à 25 €/ml</strong></li>
                    <li><strong>Transport et pompage :</strong> Forfait selon distance = <strong>200 à 400 €</strong></li>
                </ul>

                <h3>Main d'œuvre</h3>
                <p>Un équipage de 2 ouvriers qualifiés (G1/G2) :</p>

                <ul class="custom-list">
                    <li><strong>Taux horaire :</strong> 45 à 60 €/heure selon la zone</li>
                    <li><strong>Rendement :</strong> 3 à 4 puits par jour à 3 mètres de profondeur</li>
                    <li><strong>Soit :</strong> 60 à 100 € de main d'œuvre par puits</li>
                </ul>

                <h3>Comparatif avec les pieux</h3>
                <p>Budget total pour une extension de 20 m² (8 puits de 3 m vs 8 pieux forés de 6 m) :</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr><th>Poste</th><th>Puits de fondation</th><th>Pieux forés</th></tr>
                        </thead>
                        <tbody>
                            <tr><td><strong>Étude de sol</strong></td><td>800 €</td><td>800 €</td></tr>
                            <tr><td><strong>Excavation / forage</strong></td><td>2 400 €</td><td>4 800 €</td></tr>
                            <tr><td><strong>Béton + ferraillage</strong></td><td>1 200 €</td><td>1 600 €</td></tr>
                            <tr><td><strong>Main d'œuvre</strong></td><td>800 €</td><td>600 €</td></tr>
                            <tr><td><strong>Matériel</strong></td><td>400 €</td><td>1 200 €</td></tr>
                            <tr><td><strong>TOTAL</strong></td><td><strong>5 600 €</strong></td><td><strong>9 000 €</strong></td></tr>
                        </tbody>
                    </table>
                </div>

                <p>Les puits représentent une économie de <strong>35 à 40 %</strong> par rapport aux pieux sur ce type de chantier. L'écart se creuse sur les petits ouvrages où le déplacement d'une foreuse est coûteux.</p>

                <!-- FAQ -->
                <h2 id="faq">FAQ — Questions fréquentes</h2>

                <h3>Faut-il une autorisation pour creuser des puits de fondation ?</h3>
                <p>Non, pas d'autorisation spécifique pour les puits de fondation eux-mêmes. En revanche, votre projet global (extension ou construction neuve) nécessite un permis de construire ou une déclaration préalable selon la surface. L'étude de sol G1 ou G2 (obligatoire pour tout permis) déterminera si les puits sont adaptés à votre terrain.</p>

                <h3>Quelle profondeur maximale pour un puits creusé à la main ?</h3>
                <p>La limite technique se situe autour de 3 à 3,50 mètres. Au-delà, l'évacuation de la terre devient problématique et le risque d'effondrement des parois augmente. Pour les profondeurs supérieures, on utilise une pelleteuse avec godet étroit ou on opte pour des pieux forés.</p>

                <h3>Peut-on faire des puits dans l'eau ou une nappe phréatique ?</h3>
                <p>C'est possible mais technique. Il faut pomper l'eau en continu pendant le creusement et le coulage. On utilise du béton spécial (BHP — Béton Haute Performance) avec un adjuvant hydrofuge. Dans certains cas, on pose un tubage métallique temporaire pour maintenir les parois. Le coût augmente de 30 à 50 %.</p>

                <h3>Combien de temps attendre avant de construire sur les puits ?</h3>
                <p>Le béton atteint 50 % de sa résistance en 7 jours et 100 % en 28 jours. En pratique, on peut poser les longrines et monter les murs au bout de <strong>7 à 10 jours</strong> si le temps est sec et tempéré. En hiver ou par temps humide, compter 14 jours minimum.</p>

                <h3>Les puits de fondation sont-ils couverts par la garantie décennale ?</h3>
                <p>Oui, les puits de fondation entrent dans le périmètre de la garantie décennale comme tout élément de structure. L'entrepreneur qui les réalise est tenu responsable pendant 10 ans en cas de désordre affectant la solidité de l'ouvrage. Conservez bien votre contrat et les justificatifs de l'étude de sol.</p>

            </div><!-- /.article-content -->

            <!-- AUTHOR BOX -->
            <div class="author-box-bottom">
                <div class="author-box-img">
                    <img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe">
                </div>
                <div class="author-box-content">
                    <h3>Philippe</h3>
                    <span class="author-role">Expert Rénovation &amp; Artisan RGE</span>
                    <p>Avec plus de 20 ans d'expérience sur les chantiers, Philippe vous partage ses conseils concrets et sans langue de bois. Spécialiste des fondations et des reprises en sous-œuvre.</p>
                    <a href="<?php echo BASE_URL; ?>philippe" class="btn-outline">Voir son profil complet</a>
                </div>
            </div>

            <!-- CONCLUSION + CTA -->
            <div class="conclusion-box">
                <h3>Besoin d'un devis pour vos fondations ?</h3>
                <p>Les puits de fondation offrent une solution économique et fiable pour les extensions et les terrains à sol faible. Chaque situation est unique — une étude de sol précise détermine la meilleure technique à adopter. Demandez l'avis d'un professionnel avant de vous lancer.</p>
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
                    <h3 class="sidebar-title">Derniers articles — <?php echo htmlspecialchars($category['name'] ?? 'Rénovation'); ?></h3>
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
        'question' => "Faut-il une autorisation pour creuser des puits de fondation ?",
        'answer'   => "Non, pas d'autorisation spécifique pour les puits eux-mêmes. En revanche, votre projet global nécessite un permis de construire ou une déclaration préalable selon la surface. L'étude de sol G1 ou G2 déterminera si les puits sont adaptés."
    ],
    [
        'question' => "Quelle profondeur maximale pour un puits creusé à la main ?",
        'answer'   => "La limite technique se situe autour de 3 à 3,50 mètres. Au-delà, l'évacuation de la terre devient problématique et le risque d'effondrement augmente. Pour les profondeurs supérieures, on utilise une pelleteuse ou des pieux forés."
    ],
    [
        'question' => "Peut-on faire des puits dans l'eau ou une nappe phréatique ?",
        'answer'   => "C'est possible mais technique. Il faut pomper l'eau en continu et utiliser du béton spécial avec adjuvant hydrofuge. Le coût augmente de 30 à 50 %."
    ],
    [
        'question' => "Combien de temps attendre avant de construire sur les puits ?",
        'answer'   => "On peut poser les longrines au bout de 7 à 10 jours si le temps est sec. En hiver ou par temps humide, compter 14 jours minimum pour que le béton atteigne suffisamment de résistance."
    ],
    [
        'question' => "Les puits de fondation sont-ils couverts par la garantie décennale ?",
        'answer'   => "Oui, les puits entrent dans le périmètre de la garantie décennale comme tout élément de structure. L'entrepreneur est tenu responsable pendant 10 ans en cas de désordre affectant la solidité."
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
