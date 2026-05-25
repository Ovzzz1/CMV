<?php
// published: 2026-04-25 08:00
/**
 * etancheite-mur-parpaing-interieur.php
 * Article : Étanchéité mur parpaing intérieur : Le guide pour un sous-sol sain et sec
 * Site : cemarenov.fr
 * Date : 2026-04-24
 */

$article_meta = [
    'title'        => 'Étanchéité mur parpaing intérieur : guide pour un sous-sol sec',
    'category'     => 'travaux',
    'slug'         => 'etancheite-mur-parpaing-interieur',
    'image'        => 'https://www.cemarenov.fr/image/etancheite-mur-parpaing-interieur1.webp',
    'excerpt'      => 'Comment imperméabiliser un mur en parpaing de l\'intérieur ? Cuvelage, hydrofuge, traitement anti-salpêtre : le guide complet pour un sous-sol sec et sain.',
    'date'         => '2026-04-25',
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
                <span>Étanchéité mur parpaing intérieur</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Humidité</span>
                <span class="article-tag">Parpaing</span>
                <span class="article-tag">Sous-sol</span>
                <span class="article-tag">Cuvelage</span>
            </div>

            <h1>Étanchéité mur parpaing intérieur :<br><span class="h1-accent">Le guide pour un sous-sol sain et sec</span></h1>

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
                Un sous-sol ou un garage humide n'est pas une fatalité, même si le parpaing est naturellement poreux et agit comme une éponge. Lorsque l'humidité s'installe, elle menace la structure de votre maison et la santé des occupants. Quand il est impossible d'intervenir par l'extérieur (murs enterrés), l'<strong>étanchéité intérieure par cuvelage</strong> est la solution technique la plus efficace, à condition de maîtriser les bons produits et les bons gestes.
            </p>

            <div class="article-content">

                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                        L'essentiel à retenir
                    </div>
                    <ul class="custom-list">
                        <li><strong>Le cuvelage fonctionne :</strong> C'est la seule technique qui résiste à la contre-pression hydrostatique sur les murs enterrés.</li>
                        <li><strong>Test préalable obligatoire :</strong> Distinguez infiltration (eau traverse le mur) et condensation (problème de ventilation) avant de traiter.</li>
                        <li><strong>Anti-salpêtre d'abord :</strong> Les sels minéraux emprisonnés feront éclater tout traitement appliqué dessus.</li>
                        <li><strong>Congé d'onglet :</strong> L'angle sol-mur est le point le plus vulnérable, il doit être arrondi avant d'appliquer l'enduit.</li>
                        <li><strong>Couches croisées :</strong> Deux passes perpendiculaires (horizontale + verticale) pour ne laisser aucun micro-pore non traité.</li>
                    </ul>
                </div>

                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li>1. Peut-on imperméabiliser un mur en parpaing de l'intérieur ?</li>
                        <li>2. Diagnostic : pourquoi votre mur est-il humide ?</li>
                        <li>3. Hydrofuge vs imperméabilisant : quelle solution choisir ?</li>
                        <li>4. Étape 1 : Préparer le support et traiter le salpêtre</li>
                        <li>5. Étape 2 : Le congé d'étanchéité sol-mur</li>
                        <li>6. Étape 3 : Application en couches croisées</li>
                        <li>7. Que mettre sur le mur après le traitement ?</li>
                        <li>⚙️ Outil : Diagnostiquez votre problème d'humidité</li>
                        <li>FAQ, Questions fréquentes</li>
                    </ul>
                </div>

                <h2 id="faisabilite">Peut-on réellement imperméabiliser un mur en parpaing de l'intérieur ?</h2>

                <p>La réponse est <strong>oui</strong>, mais cela demande une approche spécifique appelée le <span class="hashtag">#cuvelage</span>. Contrairement à une simple peinture qui finirait par cloquer sous la pression, un traitement d'étanchéité intérieur sérieux est conçu pour résister à la <strong>contre-pression hydrostatique</strong>.</p>

                <p>L'étanchéité intérieure ne fait pas disparaître l'eau présente dans le parpaing, mais elle crée une barrière infranchissable qui garde votre pièce au sec. C'est une solution curative fiable, utilisée quotidiennement par les professionnels pour réhabiliter des caves totalement inondées.</p>

                <img src="<?php echo BASE_URL; ?>image/etancheite-mur-parpaing-interieur1.webp"
                     alt="Application d'un enduit de cuvelage sur un mur en parpaing humide en sous-sol"
                     loading="lazy"
                     style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <h2 id="diagnostic">Diagnostic : Pourquoi votre mur en parpaings est-il humide ?</h2>

                <p>Avant de vous précipiter sur le premier pot de résine, identifiez l'origine du problème. Le parpaing laisse passer l'humidité de trois manières : par les <strong>infiltrations</strong> (eau de pluie ou nappes), par les <strong>remontées capillaires</strong> (l'eau remonte du sol) ou par simple <strong>condensation</strong> (vapeur d'eau de la pièce).</p>

                <div style="background-color: var(--color-light); border-left: 4px solid var(--color-primary); padding: 1.5rem; margin-bottom: 2rem; border-radius: 0 8px 8px 0;">
                    <ul class="custom-list" style="margin: 0;">
                        <li><strong>L'astuce du film plastique :</strong> Scotchez un carré de film plastique (50x50 cm) sur votre mur. Attendez 48 h. Si la buée est <em>sous</em> le plastique : infiltration (besoin d'étanchéité). Si la buée est <em>sur</em> le plastique : condensation (besoin de ventilation, pas d'étanchéité).</li>
                    </ul>
                </div>

                <h2 id="hydrofuge-vs-cuvelage">Hydrofuge vs Imperméabilisant : Quelle solution choisir ?</h2>

                <p>Choisir le mauvais produit garantit l'échec de vos travaux. Voici un comparatif pour vous aider à trancher.</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Caractéristique</th>
                                <th>Hydrofuge de surface</th>
                                <th>Enduit de cuvelage</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Action</strong></td>
                                <td>Laisse respirer le support, repousse l'eau.</td>
                                <td>Bloque totalement l'eau et la vapeur.</td>
                            </tr>
                            <tr>
                                <td><strong>Usage idéal</strong></td>
                                <td>Garage avec légers suintements.</td>
                                <td>Murs enterrés, caves, sous-sol sous pression.</td>
                            </tr>
                            <tr>
                                <td><strong>Résistance</strong></td>
                                <td>Faible contre la pression hydrostatique.</td>
                                <td>Très élevée (résiste à la contre-pression).</td>
                            </tr>
                            <tr>
                                <td><strong>Finition</strong></td>
                                <td>Souvent invisible.</td>
                                <td>Aspect ciment (gris ou blanc).</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h2 id="etape1">Étape 1 : Préparer le support et traiter le salpêtre</h2>

                <p>C'est ici que 80 % des échecs se jouent. Appliquer un produit d'étanchéité sur un mur sale ou friable est une perte de temps totale. Brossez les restes de peinture ou d'enduit précédent pour mettre le parpaing à nu.</p>

                <p>Portez une attention particulière au <span class="hashtag">#salpêtre</span>. Ces "fleurs de sel" blanches sont des sels minéraux transportés par l'eau. S'ils restent emprisonnés derrière votre étanchéité, ils finiront par la faire éclater de l'intérieur. Appliquez un <strong>traitement anti-salpêtre</strong> spécifique après avoir brossé, pour neutraliser chimiquement ces sels.</p>

                <h2 id="etape2">Étape 2 : Traitement de la jonction sol-mur (Le "Congé d'étanchéité")</h2>

                <p>Le point le plus vulnérable d'un sous-sol n'est pas le centre du mur, mais l'angle où le mur rencontre le sol. C'est là que l'eau s'engouffre le plus facilement. Les professionnels réalisent un <strong>congé d'onglet</strong> (ou solin) : au lieu d'un angle droit à 90°, on utilise un mortier hydrofuge pour créer un arrondi en "petite rampe".</p>

                <img src="<?php echo BASE_URL; ?>image/etancheite-mur-parpaing-interieur2.webp"
                     alt="Schéma technique du congé d'onglet au mortier hydrofuge à la jonction sol-mur en parpaing"
                     loading="lazy"
                     style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <h2 id="etape3">Étape 3 : Application de l'enduit d'étanchéité en couches croisées</h2>

                <p>Une fois le mur propre et le congé d'onglet sec, passez à l'application de l'<strong>enduit de cuvelage</strong>. Ce produit se présente généralement sous forme de poudre à mélanger avec de l'eau ou une résine de gâchée.</p>

                <ul class="custom-list">
                    <li><strong>Première passe :</strong> Humidifiez légèrement votre mur (sans détremper) et appliquez l'enduit de manière horizontale.</li>
                    <li><strong>Temps de séchage :</strong> Respectez scrupuleusement les indications du fabricant (souvent 6 à 24 h).</li>
                    <li><strong>Deuxième passe :</strong> Appliquez la seconde couche de manière verticale. Ce croisement est vital pour boucher les micro-pores manqués lors de la première couche.</li>
                </ul>

                <blockquote class="article-blockquote">
                    <p>"Le croisement des couches n'est pas optionnel. Sur parpaing, les pores sont très irréguliers. Une seule passe laissera toujours des zones non traitées qui deviendront des points de faiblesse."</p>
                </blockquote>

                <h2 id="apres-traitement">Que mettre sur un mur en parpaing après le traitement ?</h2>

                <p>Une fois l'étanchéité terminée, votre mur a un aspect ciment. Vous pouvez le laisser tel quel ou décider de le finir. N'utilisez jamais une peinture à l'huile classique qui bloquerait les derniers échanges gazeux. Privilégiez une <strong>peinture microporeuse</strong>. Pour les murs extérieurs accessibles, un <a href="https://www.cemarenov.fr/bardage-bois-sur-mur-parpaing">bardage bois sur ossature ventilée</a> est une alternative qui cumule protection et esthétique, la lame d'air intégrée évite précisément ce problème de condensation.</p>

                <p>Concernant l'isolation, méfiance : si vous posez un isolant (laine de verre + placo) directement contre votre mur étanche, vous risquez de créer un "point de rosée" entre les deux. Laissez toujours une lame d'air ventilée entre votre mur traité et votre doublage.</p>

                <img src="<?php echo BASE_URL; ?>image/etancheite-mur-parpaing-interieur3.webp"
                     alt="Finition avec peinture microporeuse sur un mur de cave traité par cuvelage"
                     loading="lazy"
                     style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <h2 id="ux-outil">⚙️ Diagnostiquez votre problème d'humidité</h2>

                <div id="ux-tool" class="ux-tool-container">
                    <h3>Quel traitement pour votre sous-sol ?</h3>

                    <div id="step-1" class="ux-step active">
                        <div class="ux-question">1. Quelle est la nature de votre mur humide ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(1, 'enterré')">Mur enterré (sous-sol, cave)</button>
                            <button class="ux-btn" onclick="saveAnswer(1, 'garage')">Mur de garage avec suintements</button>
                            <button class="ux-btn" onclick="saveAnswer(1, 'condensation')">Buée sur les murs (condensation)</button>
                        </div>
                    </div>

                    <div id="step-2" class="ux-step">
                        <div class="ux-question">2. Y a-t-il du salpêtre (dépôts blancs) visible sur les murs ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(2, 'oui')">Oui, des efflorescences blanches</button>
                            <button class="ux-btn" onclick="saveAnswer(2, 'non')">Non, le mur est propre</button>
                        </div>
                    </div>

                    <div id="step-3" class="ux-step">
                        <div class="ux-question">3. L'accès extérieur au mur est-il possible ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(3, 'oui')">Oui, par l'extérieur aussi</button>
                            <button class="ux-btn" onclick="saveAnswer(3, 'non')">Non, mur inaccessible de l'extérieur</button>
                        </div>
                    </div>

                    <div id="step-result" class="ux-step">
                        <div id="success-result" class="ux-result-box" style="display: none;">
                            <h4 style="margin-top:0; color:#16a085;">Votre plan d'action :</h4>
                            <p id="result-text"></p>
                        </div>
                        <div id="warning-result" class="ux-warning-box" style="display: none;">
                            <h4 style="margin-top:0; color:#c0392b;">Attention : Problème de ventilation</h4>
                            <p id="warning-text">La condensation sur les murs n'est pas un problème d'étanchéité mais de ventilation. Installez ou vérifiez votre VMC avant tout traitement. Un enduit de cuvelage n'aidera pas et pourrait aggraver la situation en bloquant les échanges gazeux.</p>
                            <a href="<?php echo BASE_URL; ?>contact" class="cta-btn">Obtenir un diagnostic gratuit</a>
                        </div>
                        <button class="reset-btn" onclick="resetTool()">Recommencer le test</button>
                    </div>
                </div>

                <h2 id="faq">FAQ, Questions fréquentes</h2>

                <h3>Quel est le prix au m² pour une étanchéité intérieure ?</h3>
                <p>En comptant les produits (anti-salpêtre + enduit de cuvelage), prévoyez entre 15 € et 30 € par m² en auto-réalisation. Faire appel à un professionnel peut monter jusqu'à 100 €/m² selon la complexité du chantier et la garantie décennale offerte.</p>

                <h3>Peut-on utiliser les produits Sika ou Leroy Merlin ?</h3>
                <p>Oui, les gammes comme Sika Foundation ou les enduits Axton sont d'excellentes options pour le grand public. Assurez-vous simplement que le produit mentionne explicitement "résistance à la contre-pression" sur l'emballage, sinon ce n'est pas du cuvelage.</p>

                <h3>Combien de temps dure un traitement par cuvelage ?</h3>
                <p>Si la préparation a été faite dans les règles de l'art (décapage, anti-salpêtre, congé d'onglet), une étanchéité intérieure peut durer plus de 15 à 20 ans. Son point faible reste les mouvements de terrain importants qui pourraient fissurer le mur par la suite.</p>

                <h3>Doit-on enduire le mur après le cuvelage ?</h3>
                <p>Pas obligatoirement. Sur un mur de garage ou de cave utilitaire, l'enduit de cuvelage brut suffit. Si vous souhaitez une finition plus soignée pour un espace de vie, veillez à ce que le revêtement reste micropore. Pour les murs extérieurs non enterrés où l'enduit n'est pas souhaité, notre guide <a href="https://www.cemarenov.fr/mur-parpaing-sans-enduit">peut-on laisser un mur en parpaing sans enduit</a> présente les protections alternatives. Et si le chaînage horizontal présente des traces d'humidité, consultez également notre article sur le <a href="https://www.cemarenov.fr/chainage-horizontal-mur-parpaing">chaînage horizontal mur parpaing</a>, une fissuration à l'interface chaînage/bloc est souvent le vrai point d'entrée de l'eau.</p>

            </div>

            <div class="author-box-bottom">
                <div class="author-box-img">
                    <img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe">
                </div>
                <div class="author-box-content">
                    <h3>Philippe</h3>
                    <span class="author-role">Expert Rénovation &amp; Artisan RGE</span>
                    <p>Spécialisé dans le traitement de l'humidité, Philippe intervient régulièrement sur des caves et des sous-sols inondés. Il a développé une méthode de cuvelage éprouvée qui garantit un résultat sec et durable sur tous types de parpaings.</p>
                    <a href="<?php echo BASE_URL; ?>philippe" class="btn-outline">Voir son profil complet</a>
                </div>
            </div>

            <div class="conclusion-box">
                <h3>Votre sous-sol souffre d'humidité persistante ?</h3>
                <p>Un diagnostic sur place est indispensable pour identifier l'origine exacte des infiltrations et choisir le bon produit. Philippe se déplace pour évaluer votre situation.</p>
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

        if (userAnswers.step1 === 'condensation') {
            warningBox.style.display = 'block';
        } else if (userAnswers.step1 === 'garage' && userAnswers.step2 === 'non') {
            successBox.style.display = 'block';
            resultText.innerHTML = "<strong>Solution recommandée : Hydrofuge de surface</strong><br>Pour un garage avec de légers suintements et sans salpêtre, un hydrofuge incolore est suffisant. Appliquez-le au pulvérisateur sur mur sec en deux couches croisées. Moins invasif et moins coûteux que le cuvelage complet.";
        } else {
            successBox.style.display = 'block';
            resultText.innerHTML = "<strong>Solution recommandée : Cuvelage complet</strong><br>1. Brossez et dégraissez le support. 2. Appliquez un anti-salpêtre si dépôts blancs présents. 3. Réalisez le congé d'onglet à l'angle sol-mur. 4. Appliquez 2 couches croisées d'enduit de cuvelage. Budget : 15 à 30 €/m² en auto-réalisation.";
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
        'question' => "Quel est le prix au m² pour une étanchéité intérieure ?",
        'answer'   => "En comptant les produits (anti-salpêtre + enduit de cuvelage), prévoyez entre 15 € et 30 € par m² en auto-réalisation. Faire appel à un professionnel peut monter jusqu'à 100 €/m² selon la complexité du chantier et la garantie décennale offerte."
    ],
    [
        'question' => "Peut-on utiliser les produits Sika ou Leroy Merlin pour imperméabiliser un parpaing ?",
        'answer'   => "Oui, les gammes comme Sika Foundation ou les enduits Axton sont d'excellentes options. Assurez-vous simplement que le produit mentionne explicitement la résistance à la contre-pression sur l'emballage, sinon ce n'est pas du cuvelage véritable."
    ],
    [
        'question' => "Combien de temps dure un traitement par cuvelage ?",
        'answer'   => "Si la préparation a été faite dans les règles de l'art, une étanchéité intérieure peut durer plus de 15 à 20 ans. Son point faible reste les mouvements de terrain importants qui pourraient fissurer le mur par la suite."
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
