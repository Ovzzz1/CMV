<?php
// published: 2026-04-28 08:00
/**
 * nettoyage-facade-javel.php
 * Article : Nettoyage façade javel 9 6 : dosage, dilution et méthode pro
 * Site : cemarenov.fr
 * Date : 2026-04-24
 */

$article_meta = [
    'title'        => 'Nettoyage façade javel 9 6 : dosage, dilution et méthode pro',
    'category'     => 'travaux',
    'slug'         => 'nettoyage-facade-javel',
    'image'        => 'https://www.cemarenov.fr/image/nettoyage-facade-javel-9-61.webp',
    'excerpt'      => 'Comment utiliser l\'extrait de javel 9,6 % pour nettoyer une façade ? Tableau de dilution, méthode pro de pré-mouillage, sécurité et hydrofuge final pour éviter les traces blanches.',
    'date'         => '2026-04-28',
    'reading_time' => 7,
];

// ── Bloc logique CMS, NE JAMAIS MODIFIER ─────────────────────────────────
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

<style>
    /* Styles intégrés pour les vidéos et l'outil UX */
    .video-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; margin: 20px 0; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
    .video-container iframe { position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: none; }
    .ux-tool-container { background: #f8f9fa; border: 1px solid #e9ecef; border-radius: 12px; padding: 30px; margin: 30px 0; box-shadow: 0 4px 15px rgba(0,0,0,0.05); text-align: center; }
    .ux-tool-container h3 { margin-top: 0; color: #2c3e50; }
    .ux-step { display: none; animation: fadeIn 0.4s ease-in-out; }
    .ux-step.active { display: block; }
    .ux-question { font-size: 1.2em; font-weight: bold; margin-bottom: 20px; color: #333; }
    .ux-options { display: flex; flex-wrap: wrap; gap: 10px; justify-content: center; }
    .ux-btn { background: #fff; border: 2px solid #3498db; color: #3498db; padding: 12px 24px; font-size: 1em; border-radius: 8px; cursor: pointer; transition: all 0.3s ease; font-weight: bold; }
    .ux-btn:hover { background: #3498db; color: #fff; }
    .ux-result-box { background: #e8f6f3; border-left: 5px solid #1abc9c; padding: 20px; border-radius: 8px; text-align: left; margin-top: 20px; }
    .ux-warning-box { background: #fdedec; border-left: 5px solid #e74c3c; padding: 20px; border-radius: 8px; text-align: left; margin-top: 20px; }
    .cta-btn { display: inline-block; background: #e74c3c; color: #fff !important; padding: 12px 20px; border-radius: 6px; margin-top: 15px; text-align: center; text-decoration: none !important; }
    .cta-btn:hover { background: #c0392b; }
    .reset-btn { background: transparent; border: none; color: #7f8c8d; text-decoration: underline; margin-top: 20px; cursor: pointer; }
    .hashtag { color: var(--color-primary); font-weight: bold; }

    @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
</style>

<article>

    <section class="article-hero" style="background-image: url('<?php echo $article_meta['image']; ?>');">
        <div class="article-hero-content">

            <nav class="breadcrumb">
                <a href="<?php echo BASE_URL; ?>">Accueil</a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                <a href="<?php echo BASE_URL . $current_cat; ?>"><?php echo htmlspecialchars($category['name']); ?></a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                <span>Nettoyage façade javel 9 6</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Nettoyage</span>
                <span class="article-tag">Façade</span>
                <span class="article-tag">Javel</span>
                <span class="article-tag">Entretien</span>
            </div>

            <h1>Nettoyage façade javel 9 6 :<br><span class="h1-accent">Dosage, dilution et méthode pro</span></h1>

            <div class="article-meta-header" style="flex-wrap: wrap; gap: 15px;">
                <a href="<?php echo BASE_URL; ?>philippe" class="author-badge-top">
                    <img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe">
                    <div class="author-badge-text">
                        Par <strong>Philippe</strong>
                        <span>Artisan RGE</span>
                    </div>
                </a>
                <div class="meta-item">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                    Mis à jour le <?php echo format_date_fr($article_meta['date']); ?>
                </div>
                <div class="meta-item">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
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
                <?php endforeach; ?>
            </div>
        </aside>

        <div class="article-container">

            <p class="article-intro">
                L'extrait de javel à 9,6 % (36° chlorométriques) est l'arme fatale des pros pour désintégrer algues rouges, traces noires et lichens sur une façade. Mais attention : mal dosé ou mal rincé, il ne nettoie pas votre mur, il l'abîme. Ce guide vous donne la recette exacte de dilution, le protocole d'application étape par étape et l'indispensable hydrofuge final pour éviter les traces blanches et les "spectres humides".
            </p>

            <div class="article-content">

                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                        L'essentiel à retenir
                    </div>
                    <ul class="custom-list">
                        <li><strong>Jamais pur :</strong> Diluez toujours l'extrait de javel 9,6 % à l'eau froide, jamais à l'eau chaude (décomposition du chlore + gaz toxique).</li>
                        <li><strong>Pré-mouillage obligatoire :</strong> Arrosez la façade à l'eau claire avant l'application pour saturer les pores et forcer la javel à rester en surface.</li>
                        <li><strong>Application de bas en haut :</strong> Toujours. Rinçage de haut en bas.</li>
                        <li><strong>Joints Viton :</strong> La javel 9,6 % détruit les joints en caoutchouc classique en 20 minutes, utilisez un pulvérisateur équipé de joints Viton.</li>
                        <li><strong>Hydrofuge final :</strong> Obligatoire après séchage complet (48–72 h) pour imperméabiliser et éviter la ré-encrassement rapide.</li>
                    </ul>
                </div>

                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li><a href="#pourquoi-puissant">1. Pourquoi l'extrait de javel 9,6 % est-il si puissant ?</a></li>
                        <li><a href="#tableau-dosage">2. Tableau de dilution selon l'état du mur</a></li>
                        <li><a href="#securite">3. Sécurité : pourquoi les mélanges sont interdits</a></li>
                        <li><a href="#premouillage">4. Le réflexe du pré-mouillage</a></li>
                        <li><a href="#protocole">5. Protocole de nettoyage de A à Z</a></li>
                        <li><a href="#hydrofuge">6. Spectres humides et traces blanches : l'étape de l'hydrofuge</a></li>
                        <li><a href="#ux-outil">⚙️ Outil : Quel dosage pour votre façade ?</a></li>
                        <li><a href="#faq">FAQ, Questions fréquentes</a></li>
                    </ul>
                </div>

                <img src="<?php echo BASE_URL; ?>image/nettoyage-facade-javel-9-61.webp"
                     alt="Bidon de 20 litres d'extrait de javel à 9,6 % sur un échafaudage, mur de façade moitié sale moitié propre"
                     loading="lazy"
                     style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <h2 id="pourquoi-puissant">Pourquoi l'extrait de javel 9,6 % est-il si puissant ?</h2>

                <p>L'hypochlorite de sodium (le vrai nom de la javel) à 9,6 % est le standard sur les chantiers de rénovation. Sa concentration en <strong>chlore actif</strong> est suffisante pour détruire la matière organique instantanément, sans avoir besoin de frotter. C'est presque 4 fois plus puissant que la javel ménagère classique à 2,6 %.</p>

                <div style="background-color: var(--color-light); border-left: 4px solid var(--color-primary); padding: 1.5rem; margin-bottom: 2rem; border-radius: 0 8px 8px 0;">
                    <ul class="custom-list" style="margin: 0;">
                        <li><strong>Les degrés chlorométriques :</strong> Sur les bidons pros, vous verrez souvent "Javel à 36° chlorométriques". C'est l'ancienne unité. 36° chlorométriques = 9,6 % de chlore actif. C'est cette concentration qui est efficace sur les façades.</li>
                    </ul>
                </div>

                <p>Cette puissance est à double tranchant. La javel nettoie, mais elle "ouvre" les pores du support. Si votre mur présente des fissures ou un enduit qui sonne creux, consultez d'abord notre guide sur le <a href="<?php echo BASE_URL; ?>vocabulaire-architecture-facade">vocabulaire de l'architecture de façade</a> pour identifier le vrai problème avant de le tremper de produit chimique.</p>

                <h2 id="tableau-dosage">Dilution javel 9 6 pour nettoyage façade : le tableau de dosage</h2>

                <p>Le dosage se calcule selon le niveau de saleté. Et surtout : <strong>utilisez toujours de l'eau froide</strong>. La chaleur décompose le chlore, dégage un gaz toxique et rend le produit totalement inefficace.</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>État de votre mur</th>
                                <th>Volume d'extrait (9,6 %)</th>
                                <th>Volume d'eau froide</th>
                                <th>Surface traitée</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Très sale</strong> (algues rouges, noir de pollution)</td>
                                <td>1 litre</td>
                                <td>4 litres</td>
                                <td>~ 20 m²</td>
                            </tr>
                            <tr>
                                <td><strong>Entretien courant</strong> (léger grisaillement)</td>
                                <td>1 litre</td>
                                <td>8 litres</td>
                                <td>~ 40 m²</td>
                            </tr>
                            <tr>
                                <td><strong>Nettoyage préventif</strong></td>
                                <td>1 litre</td>
                                <td>10 litres</td>
                                <td>~ 50 m²</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h2 id="securite">Sécurité : pourquoi les mélanges sont interdits</h2>

                <p>Sur les chantiers, certains ajoutent encore du vinaigre blanc ou de l'acide chlorhydrique pour "booster" le nettoyage. C'est une erreur monumentale.</p>

                <p>Mélanger de la javel avec un acide crée instantanément un dégagement de gaz chlore. C'est mortel en milieu clos et extrêmement dangereux pour les voies respiratoires même en extérieur. La chimie de la javel se suffit à elle-même. De la même manière, si vous faites un <a href="<?php echo BASE_URL; ?>nettoyage-demoussage-facade">nettoyage de façade après démoussage</a> avec des produits spécifiques, ne les mélangez jamais avec de la javel.</p>

                <h2 id="premouillage">Est-ce que l'eau de javel abîme le crépi ? Le réflexe du pré-mouillage</h2>

                <p>La réponse est non, <strong>si</strong> vous préparez votre support correctement. L'erreur classique, c'est de pulvériser la javel sur un mur sec. Un enduit sec agit comme une éponge : il aspire la javel en profondeur et le chlore attaque le cœur du matériau.</p>

                <blockquote class="article-blockquote">
                    <p>"La technique de pro, c'est le pré-mouillage. Arrosez abondamment votre façade à l'eau claire avant d'attaquer. En saturant les pores de l'enduit avec de l'eau, vous forcez la javel à rester en surface. Elle va bouffer uniquement la crasse, sans altérer la structure de votre crépi."</p>
                </blockquote>

                <img src="<?php echo BASE_URL; ?>image/nettoyage-facade-javel-9-62.webp"
                     alt="Schéma en coupe d'un crépi : à gauche javel s'infiltrant dans un mur sec, à droite javel restant en surface sur un mur saturé d'eau"
                     loading="lazy"
                     style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <h2 id="protocole">Comment nettoyer une façade très sale : le protocole de A à Z</h2>

                <ol style="margin-bottom: 20px; padding-left: 20px;">
                    <li><strong>Équipement de protection :</strong> Masque à cartouche filtrante, gants nitrile, lunettes de protection. Utilisez un pulvérisateur équipé de <strong>joints Viton</strong>, la javel 9,6 % détruit les joints en caoutchouc classique en 20 minutes.</li>
                    <li><strong>Protection du chantier :</strong> Bâchez vos menuiseries en alu (la javel attaque l'anodisation) et arrosez massivement vos plantes à l'eau claire pour diluer d'éventuelles projections.</li>
                    <li><strong>Pré-mouillage :</strong> Arrosez abondamment toute la surface à traiter avec de l'eau claire avant l'application du produit.</li>
                    <li><strong>Pulvérisation de bas en haut :</strong> Si vous commencez par le haut, le produit coulera sur la saleté sèche et créera des "couloirs" propres impossibles à rattraper.</li>
                    <li><strong>Temps d'action :</strong> Laissez agir 15 à 30 minutes maximum. Le mur ne doit pas sécher pendant ce laps de temps.</li>
                    <li><strong>Rinçage de haut en bas :</strong> À grande eau. Si vous utilisez la pression, gardez la lance à 50 cm minimum pour ne pas abîmer l'enduit.</li>
                </ol>

                <h2 id="hydrofuge">Spectres humides et traces blanches : l'étape de l'hydrofuge</h2>

                <p>Vous avez bien nettoyé, c'est nickel. Mais trois jours plus tard, des traces blanches apparaissent ou votre mur présente des "spectres humides" (zones foncées qui sèchent mal). Pourquoi ?</p>

                <p>L'hypochlorite de sodium est un sel. Si vous rincez mal, le sel reste dans les pores du crépi, il attire et retient l'humidité. De plus, la javel a complètement "ouvert" votre façade, la rendant hydrophile. Pour éviter que votre mur ne se ré-encrasse en six mois, l'application d'un <a href="<?php echo BASE_URL; ?>hydrofuge-incolore-facade">hydrofuge incolore de façade</a> est non négociable. Attendez que le mur soit totalement sec (48 à 72 h) avant de pulvériser.</p>

                <img src="<?php echo BASE_URL; ?>image/nettoyage-facade-javel-9-63.webp"
                     alt="Macro photo d'un enduit de façade propre montrant l'effet perlant des gouttes après application d'hydrofuge"
                     loading="lazy"
                     style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <h2 id="ux-outil">⚙️ Quel dosage pour votre façade ?</h2>

                <div id="ux-tool" class="ux-tool-container">
                    <h3>Calculez votre dilution de javel 9,6 %</h3>

                    <div id="step-1" class="ux-step active">
                        <div class="ux-question">1. Quel est l'état actuel de votre façade ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(1, 'tres-sale')">Algues rouges / mousses épaisses / noir</button>
                            <button class="ux-btn" onclick="saveAnswer(1, 'moyen')">Grisaillement et légères taches</button>
                            <button class="ux-btn" onclick="saveAnswer(1, 'preventif')">Nettoyage préventif (propre mais à entretenir)</button>
                        </div>
                    </div>

                    <div id="step-2" class="ux-step">
                        <div class="ux-question">2. Quel est le matériau de votre façade ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(2, 'enduit')">Enduit / crépi</button>
                            <button class="ux-btn" onclick="saveAnswer(2, 'parpaing')">Parpaing ou béton brut</button>
                            <button class="ux-btn" onclick="saveAnswer(2, 'pierre')">Pierre naturelle</button>
                        </div>
                    </div>

                    <div id="step-3" class="ux-step">
                        <div class="ux-question">3. Y a-t-il des menuiseries aluminium sur la façade à traiter ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(3, 'oui')">Oui, des menuiseries alu</button>
                            <button class="ux-btn" onclick="saveAnswer(3, 'non')">Non (bois, PVC ou aucune)</button>
                        </div>
                    </div>

                    <div id="step-result" class="ux-step">
                        <div id="success-result" class="ux-result-box" style="display: none;">
                            <h4 style="margin-top:0; color:#16a085;">Votre recette de dilution :</h4>
                            <p id="result-text"></p>
                        </div>
                        <div id="warning-result" class="ux-warning-box" style="display: none;">
                            <h4 style="margin-top:0; color:#c0392b;">Attention : Pierre naturelle sensible</h4>
                            <p id="warning-text">Sur pierre naturelle (calcaire, tuffeau, grès), la javel à forte concentration peut modifier la couleur et attaquer les joints anciens. Utilisez une dilution très légère (1 : 15) ou optez pour un produit algicide spécifique compatible pierre. Testez toujours sur une petite zone discrète avant d'attaquer l'ensemble.</p>
                            <a href="<?php echo BASE_URL; ?>contact" class="cta-btn">Demander conseil à Philippe</a>
                        </div>
                        <button class="reset-btn" onclick="resetTool()">Recommencer le test</button>
                    </div>
                </div>

                <h2 id="faq">FAQ, Questions fréquentes</h2>

                <h3>Peut-on utiliser la javel sur un mur en parpaing brut ?</h3>
                <p>Oui, c'est possible pour enlever des algues, mais les sels vont ressortir. Demandez-vous d'abord si laisser un <a href="https://www.cemarenov.fr/mur-parpaing-sans-enduit">mur en parpaing sans enduit</a> à long terme est viable pour vos maçonneries. En règle générale, la réponse est non si vous voulez protéger durablement le béton.</p>

                <h3>Peut-on mélanger la javel 9,6 % avec du bicarbonate de soude ?</h3>
                <p>Chimiquement, ça ne sert à rien. Le bicarbonate n'apporte aucune puissance supplémentaire à un extrait à 9,6 %. Contentez-vous de la dilution à l'eau froide selon le tableau de dosage ci-dessus.</p>

                <h3>Quelle différence entre l'extrait de javel Onyx et le J-Net ?</h3>
                <p>C'est la même molécule de base (hypochlorite de sodium), mais le J-Net contient souvent des tensioactifs. En clair : le produit mousse un peu plus et accroche mieux sur les surfaces verticales, là où l'extrait pur a tendance à couler rapidement avant d'agir.</p>

                <h3>L'extrait de javel est-il utilisable comme désherbant sur les dalles ?</h3>
                <p>Il va effectivement griller les plantes, mais c'est un désastre écologique pour vos sols et son utilisation à cet effet est illégale. Réservez l'extrait de javel exclusivement aux surfaces maçonnées et ne le laissez jamais s'écouler directement dans un drain ou un cours d'eau.</p>

                <h3>Comment traiter les fientes d'oiseaux sur un crépi avec de la javel ?</h3>
                <p>Les fientes doivent d'abord être ramollies à l'eau claire (ne pas les gratter à sec pour éviter d'abîmer l'enduit), puis traitées avec un produit enzymatique ou une solution javel très diluée (1 %). Notre guide <a href="https://www.cemarenov.fr/nettoyer-fientes-oiseaux-crepi">nettoyer fientes d'oiseaux sur crépi</a> détaille le protocole complet et les précautions à prendre pour ne pas altérer la surface.</p>

            </div>

            <div class="author-box-bottom">
                <div class="author-box-img">
                    <img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe">
                </div>
                <div class="author-box-content">
                    <h3>Philippe</h3>
                    <span class="author-role">Expert Rénovation &amp; Artisan RGE</span>
                    <p>Avec des dizaines de chantiers de nettoyage de façade à son actif, Philippe maîtrise parfaitement le dosage de la javel 9,6 % selon les supports et les conditions météo. Il partage ici les techniques qu'il utilise au quotidien sur le terrain.</p>
                    <a href="<?php echo BASE_URL; ?>philippe" class="btn-outline">Voir son profil complet</a>
                </div>
            </div>

            <div class="conclusion-box">
                <h3>Votre façade est encrassée et vous manquez de temps ?</h3>
                <p>Un nettoyage professionnel de façade par Philippe, c'est la garantie d'un résultat durable sans risque d'abîmer votre enduit. Demandez un devis en quelques clics.</p>
                <a href="<?php echo BASE_URL; ?>contact" class="btn-primary">Obtenir un devis gratuit</a>
            </div>

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

        <aside class="sidebar-right">
            <div class="sidebar-sticky">

                <div class="sidebar-block">
                    <h3 class="sidebar-title">Derniers articles, <?php echo htmlspecialchars($category['name'] ?? ''); ?></h3>
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

<script>
    let userAnswers = {};

    function saveAnswer(stepNumber, answer) {
        userAnswers['step' + stepNumber] = answer;
        document.getElementById('step-' + stepNumber).classList.remove('active');
        if (stepNumber < 3) {
            document.getElementById('step-' + (stepNumber + 1)).classList.add('active');
        } else {
            generateResult();
        }
    }

    function generateResult() {
        document.getElementById('step-result').classList.add('active');
        const successBox = document.getElementById('success-result');
        const warningBox = document.getElementById('warning-result');
        const resultText = document.getElementById('result-text');

        successBox.style.display = 'none';
        warningBox.style.display = 'none';

        if (userAnswers.step2 === 'pierre') {
            warningBox.style.display = 'block';
        } else if (userAnswers.step1 === 'tres-sale') {
            successBox.style.display = 'block';
            const precaution = userAnswers.step3 === 'oui' ? '<br><strong>⚠️ Menuiseries alu :</strong> Bâchez soigneusement vos menuiseries, la javel attaque l\'anodisation de l\'aluminium de manière irréversible.' : '';
            resultText.innerHTML = "<strong>Dilution recommandée : 1 volume de javel pour 4 volumes d'eau froide</strong><br>Surface couverte : ~20 m² par seau de 5 litres.<br>Temps d'action : 20 à 30 minutes. N'oubliez pas le pré-mouillage et l'hydrofuge final (48 h après séchage)." + precaution;
        } else if (userAnswers.step1 === 'moyen') {
            successBox.style.display = 'block';
            resultText.innerHTML = "<strong>Dilution recommandée : 1 volume de javel pour 8 volumes d'eau froide</strong><br>Surface couverte : ~40 m² par seau de 9 litres.<br>Temps d'action : 15 à 20 minutes. Le pré-mouillage reste obligatoire même pour ce dosage intermédiaire.";
        } else {
            successBox.style.display = 'block';
            resultText.innerHTML = "<strong>Dilution préventive : 1 volume de javel pour 10 volumes d'eau froide</strong><br>Surface couverte : ~50 m² par seau de 11 litres.<br>Pour un entretien préventif annuel, ce dosage léger suffit. Appliquez au printemps avant la saison humide.";
        }
    }

    function resetTool() {
        userAnswers = {};
        document.getElementById('step-result').classList.remove('active');
        document.getElementById('step-1').classList.add('active');
    }
</script>

<?php
// Schema.org, NE JAMAIS MODIFIER
require_once dirname(__DIR__) . '/schema-data.php';

$faq_schema = [
    [
        'question' => "Peut-on utiliser la javel 9,6 % sur un mur en parpaing brut ?",
        'answer'   => "Oui, c'est possible pour enlever des algues, mais les sels vont ressortir. À long terme, un mur en parpaing sans enduit est difficile à protéger durablement et nécessite un traitement hydrofuge après nettoyage."
    ],
    [
        'question' => "Peut-on mélanger la javel 9,6 % avec du bicarbonate de soude ?",
        'answer'   => "Chimiquement, ça ne sert à rien. Le bicarbonate n'apporte aucune puissance supplémentaire à un extrait à 9,6 %. Contentez-vous de la dilution à l'eau froide selon le tableau de dosage."
    ],
    [
        'question' => "Quelle différence entre l'extrait de javel Onyx et le J-Net pour facade ?",
        'answer'   => "C'est la même molécule de base (hypochlorite de sodium), mais le J-Net contient souvent des tensioactifs qui le font mousser davantage et lui permettent de mieux accrocher sur les surfaces verticales, là où l'extrait pur a tendance à couler avant d'agir."
    ],
    [
        'question' => "Pourquoi des traces blanches apparaissent après nettoyage à la javel ?",
        'answer'   => "L'hypochlorite de sodium est un sel. Si le rinçage est insuffisant, le sel reste dans les pores du crépi, attire l'humidité et crée des efflorescences blanches. La solution : rinçage abondant puis application d'un hydrofuge incolore 48 à 72 heures après séchage complet."
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
