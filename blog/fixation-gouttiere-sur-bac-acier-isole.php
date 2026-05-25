<?php
// published: 2026-04-17 16:00
/**
 * fixation-gouttiere-sur-bac-acier-isole.php
 * Article : Fixation gouttière sur bac acier isolé : Guide de pose et choix des crochets
 * Site : cemarenov.fr
 * Date : 2026-04-17
 */

$article_meta = [
    'title'        => 'Fixation gouttière sur bac acier isolé : Guide de pose et crochets',
    'category'     => 'maison',
    'slug'         => 'fixation-gouttiere-sur-bac-acier-isole',
    'image'        => 'https://www.cemarenov.fr/image/fixation-gouttiere-sur-bac-acier-isole-1.webp',
    'excerpt'      => 'Comment fixer une gouttière sur un panneau sandwich sans écraser l\'isolant ? Choix des crochets, perçage sur nervure, joints EPDM et calcul du nombre de fixations : le guide terrain complet.',
    'date'         => '2026-04-17',
    'reading_time' => 6,
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
                <span>Gouttière bac acier isolé</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Toiture</span>
                <span class="article-tag">Gouttière</span>
                <span class="article-tag">Bac acier</span>
                <span class="article-tag">Panneau sandwich</span>
            </div>

            <h1>Fixation gouttière sur bac acier isolé :<br><span class="h1-accent">Guide de pose et choix des crochets</span></h1>

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
                Sécuriser l'évacuation des eaux pluviales sur une toiture isolée en plaques acier demande une approche bien différente de la charpente traditionnelle. Percer un panneau sandwich n'est pas anodin : une mauvaise manipulation peut ruiner votre isolant et créer des infiltrations désastreuses. Voici le guide technique pour réussir votre ancrage et garantir la pérennité de votre installation.
            </p>

            <div class="article-content">

                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                        L'essentiel à retenir
                    </div>
                    <ul class="custom-list">
                        <li><strong>Bon crochet :</strong> Sur panneau sandwich, utilisez un étrier spécial ou un crochet sur hampe chantournée, jamais un crochet standard qui écrase l'isolant.</li>
                        <li><strong>Perçage :</strong> Toujours sur le sommet de la nervure, jamais dans le creux d'onde.</li>
                        <li><strong>Joint EPDM :</strong> Serrer fermement sans écraser, le joint doit garder son élasticité pour absorber les dilatations thermiques.</li>
                        <li><strong>Métaux :</strong> Vis inox A2 ou acier galvanisé à chaud uniquement pour éviter le couple galvanique.</li>
                        <li><strong>Entraxe :</strong> 50 cm maximum entre chaque crochet pour tenir le vent et le poids de l'eau.</li>
                    </ul>
                </div>

                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li>1. Quel type de crochet pour un panneau sandwich ?</li>
                        <li>2. Installation : les étapes clés sur toiture métallique</li>
                        <li>3. Les 3 secrets d'une étanchéité durable</li>
                        <li>4. Sécurité et circulation sur bac acier isolé</li>
                        <li>5. Calcul et calepinage du nombre de fixations</li>
                        <li>⚙️ Outil : Estimez vos besoins en crochets</li>
                        <li>FAQ, Questions fréquentes</li>
                    </ul>
                </div>

                <h2 id="crochet">Quel type de crochet pour un panneau sandwich ? (Bac sec vs Isolé)</h2>
                <p>La principale erreur lors de la préparation du chantier est de confondre la couverture métallique nervurée simple (<span class="hashtag">#bac-sec</span>) et le panneau sandwich à âme isolante.</p>
                <p>Sur un bac sec, une fixation classique suffit. Mais sur un panneau isolé, la présence de mousse polyuréthane, dont l'épaisseur varie souvent de 30 mm à 100 mm, entre les deux parements métalliques change la donne. Si vous utilisez un crochet standard et que vous forcez le vissage, vous allez inévitablement écraser l'âme isolante et déformer le parement métallique extérieur.</p>
                <p>Pour réussir <a href="<?php echo BASE_URL; ?>gouttieres">votre installation de gouttières</a>, vous devez opter pour un maintien structurel adapté :</p>
                <ul class="custom-list">
                    <li><strong>Le crochet à étrier spécial panneau sandwich :</strong> Il vient pincer ou épouser précisément la forme de la nervure sans la compresser.</li>
                    <li><strong>Le crochet sur hampe chantournée :</strong> Idéal si vous disposez d'une planche de rive sous le débord de toit, permettant de déporter la bride de serrage sans toucher au bac acier.</li>
                </ul>

                <blockquote class="article-blockquote">
                    <p>"Assurez-vous d'acheter des modèles compatibles avec le profil exact de vos ondes, chaque fabricant de panneau sandwich a ses propres cotes de nervure."</p>
                </blockquote>

                <h2 id="pose">Installation en vidéo : Les étapes clés sur toiture métallique</h2>

                <p><em>Ce tutoriel illustre les étapes essentielles : traçage au cordeau pour garantir une pente d'écoulement minimale de 5 mm par mètre et alignement des étriers sur les nervures.</em></p>
                <div class="video-container">
                    <iframe src="https://www.youtube.com/embed/xD1b4LHPhpo"
                            title="Pose de gouttière sur toiture en bac acier isolé - étapes clés"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                </div>

                <h2 id="etancheite">Les 3 secrets d'une étanchéité durable : Nervures et joints EPDM</h2>
                <p>Le perçage de la toiture est l'étape la plus redoutée. Pour <a href="<?php echo BASE_URL; ?>traitement-humidite">éviter tout problème d'humidité</a> dans votre bâtiment, le protocole est strict.</p>

                <h3>1. Le perçage exclusif sur le sommet d'onde</h3>
                <p>Ne fixez jamais un crochet dans le creux de l'onde (le "bas d'onde"). C'est par ce canal que l'eau circule à haut débit. Même avec une bonne vis, la pression de l'eau finira par provoquer une infiltration par capillarité. Le sommet de la nervure de recouvrement est la seule zone sûre.</p>

                <h3>2. Maîtriser le serrage des joints EPDM</h3>
                <p>L'ancrage s'effectue avec des vis auto-foreuses de bardage munies d'une rondelle néoprène (ou joint EPDM). Le secret terrain : ne vissez pas avec excès. Le métal "travaille" sous l'effet de la chaleur. Si la rondelle est complètement écrasée au montage, elle se déchirera aux premiers changements de température. Le joint doit être fermement appuyé, mais conserver son élasticité pour absorber les micro-mouvements et bloquer tout <span class="hashtag">#pont-thermique</span>.</p>

                <h3>3. Attention au couple galvanique</h3>
                <p>N'utilisez jamais des vis de récupération. Mettre en contact des métaux incompatibles provoque une réaction électrochimique : la rouille rongera votre toiture en quelques années. Privilégiez l'inox A2 ou l'acier galvanisé à chaud spécifiquement traité.</p>

                <img src="<?php echo BASE_URL; ?>image/fixation-gouttiere-sur-bac-acier-isole-2.webp"
                     alt="Schéma technique en coupe d'un panneau sandwich montrant le point de fixation correct sur le sommet de nervure et l'erreur à éviter en bas d'onde"
                     loading="lazy"
                     style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <h2 id="securite">Sécurité et circulation : Peut-on marcher sur un toit en bac acier isolé ?</h2>
                <p>Si le panneau sandwich offre une excellente rigidité globale, son talon d'Achille est le "poquage" : sous une charge concentrée, la fine tôle supérieure va s'enfoncer de manière irréversible dans la mousse polyuréthane. Pour toute opération d'<a href="<?php echo BASE_URL; ?>changement-de-couverture">entretien ou changement de couverture</a>, voici le protocole obligatoire :</p>
                <ol style="margin-bottom: 20px; padding-left: 20px;">
                    <li><strong>Ligne de vie :</strong> Indispensable avant toute intervention en hauteur.</li>
                    <li><strong>Planche de répartition :</strong> Un madrier de bois posé perpendiculairement à plusieurs nervures pour répartir votre poids.</li>
                    <li><strong>Zones de passage :</strong> Ne marcher que sur les zones où le bac est soutenu par les pannes de la charpente en dessous.</li>
                </ol>

                <img src="<?php echo BASE_URL; ?>image/fixation-gouttiere-sur-bac-acier-isole-3.webp"
                     alt="Technicien se déplaçant sur un toit en bac acier avec une planche de répartition et une ligne de vie pour éviter le poquage du panneau sandwich"
                     loading="lazy"
                     style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <h2 id="calcul">Calcul et calepinage : Combien de fixations pour votre projet ?</h2>
                <p>Pour que votre réseau tienne bon face au vent et au poids de la neige ou des feuilles mortes gorgées d'eau, la règle est de ne pas dépasser un <strong>entraxe de 50 cm maximum</strong> entre chaque crochet.</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Longueur de la façade</th>
                                <th>Nombre de crochets / étriers</th>
                                <th>Nombre de vis auto-foreuses</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>4 mètres</td>
                                <td>9</td>
                                <td>18</td>
                            </tr>
                            <tr>
                                <td>6 mètres</td>
                                <td>13</td>
                                <td>26</td>
                            </tr>
                            <tr>
                                <td>8 mètres</td>
                                <td>17</td>
                                <td>34</td>
                            </tr>
                            <tr>
                                <td>10 mètres</td>
                                <td>21</td>
                                <td>42</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div style="background-color: var(--color-light); border-left: 4px solid var(--color-primary); padding: 1.5rem; margin-bottom: 2rem; border-radius: 0 8px 8px 0;">
                    <ul class="custom-list" style="margin: 0;">
                        <li><strong>À ne pas oublier :</strong> Ajoutez les talons (fonds de gouttière) et les naissances (descentes) à votre commande. Ces accessoires ne sont jamais inclus dans les lots de crochets.</li>
                    </ul>
                </div>

                <h2 id="ux-outil">⚙️ Estimez vos besoins en crochets</h2>

                <div id="ux-tool" class="ux-tool-container">
                    <h3>Calculateur rapide de fixations pour gouttière</h3>

                    <div id="step-1" class="ux-step active">
                        <div class="ux-question">1. Quelle est la longueur totale de votre façade à équiper ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(1, 'small')">Moins de 6 mètres</button>
                            <button class="ux-btn" onclick="saveAnswer(1, 'medium')">6 à 10 mètres</button>
                            <button class="ux-btn" onclick="saveAnswer(1, 'large')">Plus de 10 mètres</button>
                        </div>
                    </div>

                    <div id="step-2" class="ux-step">
                        <div class="ux-question">2. Votre toiture est-elle en bac acier simple ou en panneau sandwich ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(2, 'bacsec')">Bac acier simple</button>
                            <button class="ux-btn" onclick="saveAnswer(2, 'sandwich')">Panneau sandwich isolé</button>
                        </div>
                    </div>

                    <div id="step-3" class="ux-step">
                        <div class="ux-question">3. Votre zone est-elle exposée à des vents forts ou à des chutes de neige importantes ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(3, 'no')">Non, zone normale</button>
                            <button class="ux-btn" onclick="saveAnswer(3, 'yes')">Oui, zone exposée</button>
                        </div>
                    </div>

                    <div id="step-result" class="ux-step">
                        <div id="success-result" class="ux-result-box" style="display: none;">
                            <h4 style="margin-top:0; color:#16a085;">🔧 Votre estimation :</h4>
                            <p id="result-text"></p>
                        </div>
                        <div id="warning-result" class="ux-warning-box" style="display: none;">
                            <h4 style="margin-top:0; color:#c0392b;">⚠️ Configuration exigeante</h4>
                            <p id="warning-text"></p>
                            <a href="<?php echo BASE_URL; ?>contact" class="cta-btn">Demander un devis professionnel</a>
                        </div>
                        <button class="reset-btn" onclick="resetTool()">Recommencer le test</button>
                    </div>
                </div>

                <h2 id="faq">FAQ, Questions fréquentes</h2>

                <h3>Quelle est la durée de vie d'un bac acier isolé ?</h3>
                <p>S'il est correctement posé, un panneau sandwich peut durer de 30 à 50 ans. Ce sont les rondelles d'étanchéité qui vieillissent le plus vite : inspectez-les tous les 10 ans. Si vous envisagez d'ajouter une <a href="<?php echo BASE_URL; ?>isolation-thermique-exterieur-ite">isolation thermique par l'extérieur</a> sur vos murs, la pérennité de vos débords de toit est primordiale.</p>

                <h3>Comment ne pas glisser sur le bac acier pendant les travaux ?</h3>
                <p>Outre l'indispensable baudrier, portez des chaussures de sécurité à semelles plates et tendres. Évitez d'intervenir tôt le matin si la tôle est couverte de rosée. Travaillez toujours en remontant la pente, jamais à reculons.</p>

                <h3>Peut-on utiliser n'importe quelle vis pour fixer les crochets de gouttière ?</h3>
                <p>Non. Les vis de récupération ou les aciers incompatibles avec le métal de votre toiture provoquent un couple galvanique qui accélère la corrosion. Utilisez exclusivement des vis auto-foreuses inox A2 ou acier galvanisé à chaud, accompagnées de leur rondelle EPDM d'origine.</p>

            </div>

            <div class="author-box-bottom">
                <div class="author-box-img">
                    <img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe">
                </div>
                <div class="author-box-content">
                    <h3>Philippe</h3>
                    <span class="author-role">Expert Rénovation &amp; Artisan RGE</span>
                    <p>Avec plus de 20 ans d'expérience sur les chantiers, Philippe vous partage ses conseils concrets et sans langue de bois pour tous vos projets de toiture, couverture et évacuation des eaux pluviales.</p>
                    <a href="<?php echo BASE_URL; ?>philippe" class="btn-outline">Voir son profil complet</a>
                </div>
            </div>

            <div class="conclusion-box">
                <h3>Un projet de gouttière sur toiture métallique ?</h3>
                <p>Entre le choix des crochets adaptés au panneau sandwich, le perçage sur nervure et l'étanchéité des joints, une mauvaise pose peut coûter très cher en infiltrations. Faites valider votre projet par un professionnel avant d'intervenir.</p>
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
        const warningText = document.getElementById('warning-text');

        successBox.style.display = 'none';
        warningBox.style.display = 'none';

        // ── Logique métier ──────────────────────────────────────────────────
        if (userAnswers.step1 === 'large' && userAnswers.step2 === 'sandwich' && userAnswers.step3 === 'yes') {
            warningBox.style.display = 'block';
            warningText.innerHTML = "Longue façade + panneau sandwich + zone exposée : c'est la configuration la plus exigeante. Un professionnel doit calculer les charges et valider le type de crochet avant toute pose. Ne vous lancez pas seul sur ce chantier.";
        } else if (userAnswers.step1 === 'small' && userAnswers.step2 === 'bacsec') {
            successBox.style.display = 'block';
            resultText.innerHTML = "<strong>Matériel estimé :</strong> 13 crochets standard + 26 vis galvanisées suffisent pour couvrir une façade de moins de 6 mètres en bac sec.<br><strong>Conseil :</strong> Prévoir 2 crochets supplémentaires en réserve pour les chutes ou ajustements de pente.";
        } else if (userAnswers.step1 === 'small' && userAnswers.step2 === 'sandwich') {
            successBox.style.display = 'block';
            resultText.innerHTML = "<strong>Matériel estimé :</strong> 13 étriers spéciaux panneau sandwich + 26 vis inox A2 avec rondelle EPDM.<br><strong>Conseil :</strong> Vérifiez le profil exact de vos nervures avant de commander, les étriers ne sont pas universels selon les fabricants.";
        } else if (userAnswers.step1 === 'medium' && userAnswers.step3 === 'yes') {
            successBox.style.display = 'block';
            resultText.innerHTML = "<strong>Matériel estimé :</strong> Passez à un entraxe de 40 cm (au lieu de 50 cm) en zone exposée, soit environ 26 crochets pour 10 mètres + 52 vis.<br><strong>Conseil :</strong> Renforcez également la descente avec un collier supplémentaire à mi-hauteur.";
        } else {
            successBox.style.display = 'block';
            resultText.innerHTML = "<strong>Matériel estimé :</strong> Comptez 1 crochet tous les 50 cm + 2 vis par crochet. Pour une façade de 6 à 10 mètres, prévoyez entre 13 et 21 crochets selon la longueur exacte.<br><strong>Conseil :</strong> Commandez toujours 10 % de plus pour absorber les ajustements de pose.";
        }
        // ───────────────────────────────────────────────────────────────────
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
        'question' => "Quelle est la durée de vie d'un bac acier isolé ?",
        'answer'   => "S'il est correctement posé, un panneau sandwich peut durer de 30 à 50 ans. Ce sont les rondelles d'étanchéité qui vieillissent le plus vite : inspectez-les tous les 10 ans."
    ],
    [
        'question' => "Comment ne pas glisser sur le bac acier pendant les travaux ?",
        'answer'   => "Outre l'indispensable baudrier, portez des chaussures de sécurité à semelles plates et tendres. Évitez d'intervenir tôt le matin si la tôle est couverte de rosée. Travaillez toujours en remontant la pente, jamais à reculons."
    ],
    [
        'question' => "Peut-on utiliser n'importe quelle vis pour fixer les crochets de gouttière ?",
        'answer'   => "Non. Les vis de récupération ou les aciers incompatibles avec le métal de votre toiture provoquent un couple galvanique qui accélère la corrosion. Utilisez exclusivement des vis auto-foreuses inox A2 ou acier galvanisé à chaud, accompagnées de leur rondelle EPDM d'origine."
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
