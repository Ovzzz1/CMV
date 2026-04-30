<?php
// published: 2026-04-26 14:00
/**
 * mur-pierre-seche.php
 * Article : Mur en pierre sèche : Technique, prix au m2 et guide de construction
 * Site : cemarenov.fr
 * Date : 2026-04-24
 */

$article_meta = [
    'title'        => 'Mur en pierre sèche : Technique, prix au m2 et guide pratique',
    'category'     => 'travaux',
    'slug'         => 'mur-pierre-seche',
    'image'        => 'https://www.cemarenov.fr/image/mur-pierre-seche1.webp',
    'excerpt'      => 'Construire un mur en pierre sèche : technique de pose, prix au m2 en 2026, choix des matériaux et étapes de construction pour un muret de jardin durable sans mortier.',
    'date'         => '2026-04-26',
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
                <span>Mur en pierre sèche</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Maçonnerie</span>
                <span class="article-tag">Pierre sèche</span>
                <span class="article-tag">Jardin</span>
                <span class="article-tag">Soutènement</span>
            </div>

            <h1>Mur en pierre sèche :<br><span class="h1-accent">Technique, prix au m2 et guide de construction</span></h1>

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
                Réaliser un <strong>mur en pierre sèche</strong> est une solution à la fois esthétique et écologique pour l'aménagement durable de votre jardin. Cette technique de maçonnerie ancestrale, qui repose sur l'assemblage de pierres naturelles sans aucun mortier, crée un muret de soutènement ou de clôture d'une robustesse remarquable. Les interstices entre les roches garantissent un excellent drainage naturel, évitant toute pression hydrostatique — et offrant une biodiversité précieuse pour la faune locale.
            </p>

            <div class="article-content">

                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                        L'essentiel à retenir
                    </div>
                    <ul class="custom-list">
                        <li><strong>Zéro mortier :</strong> La stabilité repose uniquement sur la gravité, le frottement et l'imbrication des pierres.</li>
                        <li><strong>Le "fruit" est obligatoire :</strong> Le parement doit être incliné d'environ 10 % vers l'arrière pour contrer la poussée des terres.</li>
                        <li><strong>Les boutisses :</strong> Ces pierres transversales qui traversent toute l'épaisseur du mur sont les clés de voûte de la stabilité.</li>
                        <li><strong>Prix en 2026 :</strong> De 50 €/m² (auto-construction) à 500 €/m² (muretier professionnel).</li>
                        <li><strong>Hauteur max :</strong> 1,20 m sans étude technique. Au-delà, consultez un professionnel.</li>
                    </ul>
                </div>

                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li><a href="#principe">1. Qu'est-ce qu'un mur en pierre sèche ?</a></li>
                        <li><a href="#prix">2. Quel est le prix au m2 en 2026 ?</a></li>
                        <li><a href="#materiaux">3. Choix des pierres naturelles</a></li>
                        <li><a href="#fondation">4. La fondation drainante</a></li>
                        <li><a href="#montage">5. Étapes de montage</a></li>
                        <li><a href="#reparation">6. Réparation d'un mur effondré</a></li>
                        <li><a href="#ux-outil">⚙️ Outil : Estimez votre projet</a></li>
                        <li><a href="#faq">FAQ, Questions fréquentes</a></li>
                    </ul>
                </div>

                <h2 id="principe">Qu'est-ce qu'un mur en pierre sèche ? (Principes de la maçonnerie à sec)</h2>

                <p>Le principe fondamental de la maçonnerie à sec réside dans l'imbrication mécanique des roches. Contrairement aux constructions modernes, la stabilité est assurée par la gravité et le frottement entre les éléments. Si cette méthode demande une sélection rigoureuse des matériaux, elle offre une souplesse que le béton n'a pas : le mur peut suivre les légers mouvements du sol sans jamais se fissurer. En choisissant la <span class="hashtag">#pierre-sèche</span>, vous optez pour un ouvrage perméable qui préserve la biodiversité tout en valorisant votre patrimoine immobilier.</p>

                <img src="<?php echo BASE_URL; ?>image/mur-pierre-seche1.webp"
                     alt="Muret de jardin en pierre sèche naturelle calcaire, pierres de différentes tailles parfaitement imbriquées sans mortier"
                     loading="lazy"
                     style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <h2 id="prix">Quel est le prix au m2 d'un muret en pierre sèche en 2026 ?</h2>

                <p>Le budget à prévoir dépend essentiellement de l'origine de la pierre et du recours ou non à une main-d'œuvre spécialisée. Voici les fourchettes de prix constatées pour un projet standard :</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Prestation de pose</th>
                                <th>Prix moyen au m2</th>
                                <th>Détails du budget</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Auto-construction</strong></td>
                                <td>50 € à 150 €</td>
                                <td>Coût des pierres naturelles et livraison uniquement.</td>
                            </tr>
                            <tr>
                                <td><strong>Muretier professionnel</strong></td>
                                <td>250 € à 500 €</td>
                                <td>Main-d'œuvre expert, terrassement et fournitures.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <p>Par exemple, pour un mur de 20 mètres de long avec une hauteur de 1 mètre, l'investissement oscillera entre 5 000 € et 10 000 €. Ce tarif varie selon que vous utilisiez du schiste, du grès ou des pierres locales de récupération.</p>

                <h2 id="materiaux">Choix des pierres naturelles : calcaire, granit ou schiste ?</h2>

                <p>Pour un montage cohérent, sélectionnez des pierres possédant au moins deux faces parallèles (le lit de pose). Le calcaire est très prisé pour sa facilité de taille. Le granit reste le favori pour les ouvrages de soutènement en raison de sa densité et de sa résistance au gel.</p>

                <div style="background-color: var(--color-light); border-left: 4px solid var(--color-primary); padding: 1.5rem; margin-bottom: 2rem; border-radius: 0 8px 8px 0;">
                    <ul class="custom-list" style="margin: 0;">
                        <li><strong>Calculateur de tonnage :</strong> Pour estimer vos besoins, utilisez la formule : (Longueur x Hauteur x Épaisseur) x 2,2. Prévoyez toujours un surplus de 10 % pour compenser les pertes lors de la taille et du calage.</li>
                    </ul>
                </div>

                <h2 id="fondation">La fondation drainante : la base d'un mur sans mortier</h2>

                <p>La solidité d'un ouvrage à sec ne repose pas sur une semelle rigide — le mur doit pouvoir "jouer" avec le terrain. Contrairement à un mur maçonné classique, la pierre sèche s'appuie sur une tranchée de fondation remplie de matériaux drainants.</p>

                <ul class="custom-list">
                    <li><strong>La tranchée de base :</strong> Creusez entre 20 et 30 cm de profondeur hors-gel.</li>
                    <li><strong>Le fruit (inclinaison) :</strong> La règle d'or. Le parement doit être incliné d'environ 10 % vers l'arrière pour contrer la poussée des terres.</li>
                    <li><strong>Le drainage :</strong> Remplissez la tranchée de pierres concassées et gravier compacté. La gestion des eaux est prioritaire pour éviter les affaissements prématurés.</li>
                </ul>

                <img src="<?php echo BASE_URL; ?>image/mur-pierre-seche2.webp"
                     alt="Schéma technique d'une fondation drainante pour mur en pierre sèche avec hérisson de pierres concassées"
                     loading="lazy"
                     style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <h2 id="montage">Étapes de montage : la technique pour un muret durable</h2>

                <p>Le montage d'un mur en pierre sèche est un puzzle vertical. On commence par l'assise (les pierres les plus lourdes), puis on croise les joints pour éviter les "coups de sabre" (joints alignés verticalement qui fragilisent la structure).</p>

                <h3>1. La pose de l'assise et le calage</h3>
                <p>Chaque pierre doit être calée avec de petits éclats de roche pour qu'elle ne bouge pas même sous forte pression. L'assise détermine la solidité de l'ensemble — ne lésinez pas sur le temps passé à la mettre de niveau.</p>

                <h3>2. Les boutisses : lier les deux parements</h3>
                <p>La <strong>boutisse</strong> est une pierre transversale qui traverse toute la largeur du mur. Elle agit comme une véritable clé de voûte horizontale assurant la liaison structurelle entre les deux faces. Posez une boutisse tous les mètres environ.</p>

                <img src="<?php echo BASE_URL; ?>image/mur-pierre-seche3.webp"
                     alt="Illustration du montage d'un mur en pierre sèche avec boutisse transversale et inclinaison du fruit"
                     loading="lazy"
                     style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <h3>3. Le remblai et le couronnement</h3>
                <p>Le remplissage arrière doit être exclusivement minéral (jamais de terre végétale qui gonfle à l'humidité). Enfin, posez des pierres de couronnement lourdes au sommet pour stabiliser l'ensemble par compression.</p>

                <blockquote class="article-blockquote">
                    <p>"La règle d'or que j'enseigne à mes apprentis : un joint vertical ne doit jamais être aligné sur deux rangées successives. Si vous voyez une 'ligne droite' qui monte sur votre mur, c'est un futur point de rupture."</p>
                </blockquote>

                <h2 id="reparation">Réparation : comment refaire un mur qui s'est écroulé ?</h2>

                <p>Si votre mur s'est partiellement effondré, cela signifie souvent que le drainage arrière était bouché ou que les boutisses étaient insuffisantes. Pour réparer, démontez la zone en pyramide inversée jusqu'à la base saine. Triez les pierres d'origine par taille, curez le drainage et remontez en respectant scrupuleusement les règles de croisement des joints.</p>

                <img src="<?php echo BASE_URL; ?>image/mur-pierre-seche4.webp"
                     alt="Chantier de restauration d'un mur en pierre sèche avec effondrement partiel, pierres triées au sol"
                     loading="lazy"
                     style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <h2 id="ux-outil">⚙️ Estimez votre projet de mur en pierre sèche</h2>

                <div id="ux-tool" class="ux-tool-container">
                    <h3>Quel type de muret convient à votre terrain ?</h3>

                    <div id="step-1" class="ux-step active">
                        <div class="ux-question">1. Quelle est la fonction de votre mur ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(1, 'soutenement')">Soutènement (terrain en pente)</button>
                            <button class="ux-btn" onclick="saveAnswer(1, 'cloture')">Clôture décorative</button>
                            <button class="ux-btn" onclick="saveAnswer(1, 'terrasse')">Création de terrasse</button>
                        </div>
                    </div>

                    <div id="step-2" class="ux-step">
                        <div class="ux-question">2. Quelle hauteur envisagez-vous ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(2, 'faible')">Moins de 60 cm</button>
                            <button class="ux-btn" onclick="saveAnswer(2, 'moyen')">60 cm à 1,20 m</button>
                            <button class="ux-btn" onclick="saveAnswer(2, 'eleve')">Plus de 1,20 m</button>
                        </div>
                    </div>

                    <div id="step-3" class="ux-step">
                        <div class="ux-question">3. Avez-vous des pierres disponibles sur place ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(3, 'oui')">Oui, des pierres de récupération</button>
                            <button class="ux-btn" onclick="saveAnswer(3, 'non')">Non, il faudra en acheter</button>
                        </div>
                    </div>

                    <div id="step-result" class="ux-step">
                        <div id="success-result" class="ux-result-box" style="display: none;">
                            <h4 style="margin-top:0; color:#16a085;">Votre plan de projet :</h4>
                            <p id="result-text"></p>
                        </div>
                        <div id="warning-result" class="ux-warning-box" style="display: none;">
                            <h4 style="margin-top:0; color:#c0392b;">Attention : Mur hors norme</h4>
                            <p id="warning-text">Au-delà de 1,20 m de hauteur, un mur en pierre sèche nécessite une étude technique spécifique. La poussée des terres peut être considérable et un mauvais dimensionnement entraîne des risques d'effondrement. Consultez un professionnel avant de commencer.</p>
                            <a href="<?php echo BASE_URL; ?>contact" class="cta-btn">Demander une étude technique</a>
                        </div>
                        <button class="reset-btn" onclick="resetTool()">Recommencer le test</button>
                    </div>
                </div>

                <h2 id="faq">FAQ, Questions fréquentes</h2>

                <h3>Quelle est la hauteur maximale pour un mur en pierre sèche sans mortier ?</h3>
                <p>Il est recommandé de ne pas dépasser 1,20 mètre de haut pour garantir une sécurité structurelle optimale sans études complexes. Au-delà de cette hauteur, la poussée des terres et le risque de basculement deviennent significatifs — faites appel à un muretier professionnel qui pourra dimensionner correctement l'épaisseur de la base et le système de drainage.</p>

                <h3>L'entretien d'un mur en pierre sèche est-il nécessaire contre la mousse ?</h3>
                <p>La pierre sèche vit avec son environnement et la patine naturelle (mousse, lichen) n'altère en rien la solidité de la structure. L'entretien se limite à surveiller que le drainage arrière reste libre et que des végétaux à racines profondes ne s'installent pas dans les interstices, ce qui pourrait écarter les pierres sur le long terme.</p>

                <h3>Peut-on construire un mur en pierre sèche sur une terrasse en béton existante ?</h3>
                <p>Ce n'est pas recommandé. La dalle béton est imperméable et bloquera le drainage naturel qui est le premier atout de la pierre sèche. Si vous souhaitez un muret décoratif sur terrasse, optez pour un mur maçonné au mortier de chaux qui sera plus adapté à ce type de support imperméable.</p>

                <h3>Quelle est la différence entre un mur en pierre sèche et un mur poids en pierre ?</h3>
                <p>Le mur en pierre sèche est monté sans mortier ni liant — la gravité et l'emboîtement des pierres assurent la stabilité. Le <a href="https://www.cemarenov.fr/mur-poids-pierre-paris">mur poids en pierre</a>, lui, est maçonné au mortier de chaux et dimensionné pour retenir des terres importantes (soutènement) : sa base doit mesurer 1/3 à 1/2 de sa hauteur. Pour une simple délimitation de jardin sans charge latérale forte, la pierre sèche suffit ; pour retenir un talus, le mur poids s'impose.</p>

                <h3>Comment finir un mur en pierre maçonné avec du mortier ?</h3>
                <p>Si vous optez finalement pour un mur lié (avec mortier de chaux), la finition "pierre vue" est la plus courante sur le bâti traditionnel. Notre guide sur l'<a href="https://www.cemarenov.fr/enduit-pierre-vue">enduit pierre vue</a> détaille les dosages de chaux, la technique du beurré et le brossage à réaliser avant que le mortier ne tire pour laisser apparaître la texture de la pierre.</p>

            </div>

            <div class="author-box-bottom">
                <div class="author-box-img">
                    <img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe">
                </div>
                <div class="author-box-content">
                    <h3>Philippe</h3>
                    <span class="author-role">Expert Rénovation &amp; Artisan RGE</span>
                    <p>Passionné par les techniques ancestrales de maçonnerie, Philippe réalise et restaure des murs en pierre sèche depuis plus de 15 ans. Il vous transmet ici les secrets des vieux muretiers pour des ouvrages qui traversent les siècles.</p>
                    <a href="<?php echo BASE_URL; ?>philippe" class="btn-outline">Voir son profil complet</a>
                </div>
            </div>

            <div class="conclusion-box">
                <h3>Un projet de muret en pierre sèche dans votre jardin ?</h3>
                <p>Que ce soit pour soutenir un terrain en pente, créer des terrasses ou délimiter votre propriété, la pierre sèche offre une solution à la fois esthétique et durable. Philippe peut vous accompagner de la conception à la réalisation.</p>
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

        if (userAnswers.step2 === 'eleve') {
            warningBox.style.display = 'block';
        } else if (userAnswers.step3 === 'oui' && userAnswers.step2 === 'faible') {
            successBox.style.display = 'block';
            resultText.innerHTML = "<strong>Budget estimé :</strong> Très faible (pierres récupérées).<br>Vous pouvez réaliser ce muret décoratif en auto-construction sur un week-end. Prévoyez : une tranchée de 20 cm de gravier, un cordeau pour aligner les rangées, et le respect des joints croisés. Budget : essentiellement votre temps !";
        } else {
            successBox.style.display = 'block';
            resultText.innerHTML = "<strong>Budget estimé :</strong> 50 à 500 €/m² selon l'option choisie.<br><strong>Pierres recommandées :</strong> Calcaire local (facile à travailler) ou granit (résistance maximale pour le soutènement).<br><strong>Délai :</strong> Comptez 1 journée par mètre linéaire pour un muretier expérimenté, ou 2 à 3 jours en auto-construction pour un débutant.";
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
        'question' => "Quelle est la hauteur maximale pour un mur en pierre sèche sans mortier ?",
        'answer'   => "Il est recommandé de ne pas dépasser 1,20 mètre de haut pour garantir une sécurité structurelle optimale sans études complexes. Au-delà de cette hauteur, la poussée des terres et le risque de basculement deviennent significatifs."
    ],
    [
        'question' => "L'entretien d'un mur en pierre sèche est-il nécessaire contre la mousse ?",
        'answer'   => "La pierre sèche vit avec son environnement et la patine naturelle n'altère en rien la solidité de la structure. L'entretien se limite à surveiller que le drainage arrière reste libre et que des végétaux à racines profondes ne s'installent pas dans les interstices."
    ],
    [
        'question' => "Peut-on construire un mur en pierre sèche sur une terrasse en béton existante ?",
        'answer'   => "Ce n'est pas recommandé. La dalle béton est imperméable et bloquera le drainage naturel qui est le premier atout de la pierre sèche. Pour un muret décoratif sur terrasse, optez pour un mur maçonné au mortier de chaux."
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
