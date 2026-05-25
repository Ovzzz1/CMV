<?php
// published: 2026-04-27 08:00
/**
 * mur-poids-pierre-paris.php
 * Article : Mur poids en pierre à Paris : Guide du soutènement robuste et durable
 * Site : cemarenov.fr
 * Date : 2026-04-24
 */

$article_meta = [
    'title'        => 'Mur poids en pierre à Paris : guide technique et patrimonial',
    'category'     => 'travaux',
    'slug'         => 'mur-poids-pierre-paris',
    'image'        => 'https://www.cemarenov.fr/image/mur-poids-en-pierre-paris1.webp',
    'excerpt'      => 'Tout savoir sur le mur poids en pierre à Paris : dimensionnement, étude de sol, prix au m² et règles du PLU. Guide technique complet pour un soutènement durable en maçonnerie de pierre.',
    'date'         => '2026-04-27',
    'reading_time' => 8,
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
                <span>Mur poids en pierre à Paris</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Soutènement</span>
                <span class="article-tag">Pierre</span>
                <span class="article-tag">Paris</span>
                <span class="article-tag">Maçonnerie</span>
            </div>

            <h1>Mur poids en pierre à Paris :<br><span class="h1-accent">Guide du soutènement robuste et durable</span></h1>

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
                Construire un <strong>mur de soutènement à Paris</strong> mêle contraintes géotechniques complexes et exigences architecturales strictes. Pour stabiliser un terrain en pente ou créer des terrasses tout en respectant l'élégance du bâti parisien, le <strong>mur poids en pierre</strong> demeure la solution de référence. Ce type d'ouvrage assure la stabilité des terres par sa propre masse volumique, une alternative durable au béton armé, à condition de maîtriser l'étude de sol, le PLU et les règles du dimensionnement.
            </p>

            <div class="article-content">

                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                        L'essentiel à retenir
                    </div>
                    <ul class="custom-list">
                        <li><strong>Principe du mur poids :</strong> La stabilité repose sur la seule gravité de la pierre, la base doit mesurer 1/3 à 1/2 de la hauteur totale.</li>
                        <li><strong>BET obligatoire à Paris :</strong> Le sous-sol parisien (carrières) exige une étude géotechnique pour la garantie décennale.</li>
                        <li><strong>Le fruit :</strong> Inclinaison de ~10 % de la face extérieure vers le talus pour rediriger les forces de pression.</li>
                        <li><strong>8 règles d'or :</strong> Drainage dorsal, barbacanes, fondations hors-gel, mortier de chaux, aucune ne doit être omise.</li>
                        <li><strong>Diagnostic :</strong> Un "ventre de bœuf" ou des fissures en escalier sont des signaux d'alerte d'effondrement imminent.</li>
                    </ul>
                </div>

                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li>1. Qu'est-ce qu'un mur poids et pourquoi choisir la pierre ?</li>
                        <li>2. Dimensionnement : une épaisseur de 10 cm est-elle suffisante ?</li>
                        <li>3. Pourquoi le BET est indispensable à Paris ?</li>
                        <li>4. Les 8 règles d'or pour un soutènement pérenne</li>
                        <li>5. Quel est le prix au m² à Paris ?</li>
                        <li>6. Diagnostic : identifier les fissures et risques d'effondrement</li>
                        <li>⚙️ Outil : Évaluez votre mur de soutènement</li>
                        <li>FAQ, Questions fréquentes</li>
                    </ul>
                </div>

                <img src="<?php echo BASE_URL; ?>image/mur-poids-en-pierre-paris1.webp"
                     alt="Mur de soutènement massif en pierre de taille calcaire dans un jardin en terrasse à Paris"
                     loading="lazy"
                     style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <p>Pour mieux comprendre l'esthétique et les matériaux de la capitale, consultez notre dossier sur le <a href="<?php echo BASE_URL; ?>vocabulaire-architecture-facade">vocabulaire de l'architecture de façade</a>.</p>

                <h2 id="principe">Qu'est-ce qu'un mur poids et pourquoi choisir la maçonnerie de pierre ?</h2>

                <p>Le principe fondamental d'un <strong>mur poids</strong> réside dans sa capacité à résister au basculement et au glissement grâce à sa seule gravité. Contrairement aux structures légères, cet ouvrage utilise l'inertie de la pierre naturelle pour s'opposer à la charge du talus. Une fois maçonnée, la pierre possède une durée de vie séculaire, bien supérieure aux solutions industrielles.</p>

                <p>Si votre besoin est purement paysager et ne nécessite pas de retenir une charge importante, vous pouvez opter pour un <a href="<?php echo BASE_URL; ?>mur-pierre-seche">mur en pierre sèche</a>, une technique traditionnelle qui facilite naturellement le drainage sans mortier.</p>

                <img src="<?php echo BASE_URL; ?>image/mur-poids-en-pierre-paris2.webp"
                     alt="Schéma technique en coupe d'un mur poids en maçonnerie de pierre illustrant la poussée des terres et le poids propre"
                     loading="lazy"
                     style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <h2 id="dimensionnement">Dimensionnement : Une épaisseur de 10 cm est-elle suffisante ?</h2>

                <p>La réponse est sans équivoque : <strong>non</strong>. Une épaisseur de 10 cm correspond à un placage de finition et non à une structure porteuse. Pour qu'un <strong>mur de soutènement en pierre</strong> soit stable, sa base doit généralement mesurer entre un tiers et la moitié de sa hauteur totale.</p>

                <p>En plus de cette largeur d'assise, le maçon doit prévoir un <strong>fruit</strong> : une légère inclinaison (~10 %) de la face extérieure vers le remblai pour rediriger les forces de pression vers le centre de gravité de l'ouvrage. Des fondations spécifiques pour terrain en pente sont impératives pour éviter tout tassement différentiel.</p>

                <img src="<?php echo BASE_URL; ?>image/mur-poids-en-pierre-paris3.webp"
                     alt="Dessin technique d'un mur de soutènement en pierre montrant le ratio d'épaisseur : base large, fruit vers le talus"
                     loading="lazy"
                     style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <h2 id="bet">Pourquoi l'étude d'un Bureau d'Études Structure (BET) est indispensable à Paris ?</h2>

                <p>Le sous-sol parisien est truffé de cavités et d'anciennes <span class="hashtag">#carrières</span>, ce qui rend chaque projet de construction sensible. Faire appel à un <strong>bureau d'études</strong> permet de valider le calcul de stabilité selon les normes <strong>Eurocode 7</strong>. Ce diagnostic est souvent exigé par les assurances pour couvrir la garantie décennale, surtout en cas de mitoyenneté directe.</p>

                <p>Par ailleurs, le <strong>PLU de Paris</strong> impose des règles strictes sur l'aspect des murs visibles depuis l'espace public. Dans de nombreux quartiers historiques, les Architectes des Bâtiments de France (ABF) préconisent un enduit à pierres vues pour protéger le mortier tout en laissant apparaître la noblesse du matériau.</p>

                <h2 id="regles">Les 8 règles d'or pour construire un mur de soutènement pérenne</h2>

                <ul class="custom-list">
                    <li><strong>Étude géotechnique :</strong> Analyser la poussée des terres et la nature du sol avant tout dimensionnement.</li>
                    <li><strong>Drainage dorsal :</strong> Installer un système pour évacuer l'eau accumulée derrière la paroi.</li>
                    <li><strong>Pose de barbacanes :</strong> Percer des ouvertures régulières pour libérer la pression hydrostatique.</li>
                    <li><strong>Fondations hors-gel :</strong> Ancrer l'ouvrage sous la limite de gel (environ 60 cm à Paris).</li>
                    <li><strong>Utilisation de mortier de chaux :</strong> Permettre au mur de conserver une certaine souplesse face aux mouvements du sol.</li>
                    <li><strong>Respect du fruit :</strong> Incliner le mur vers le talus (environ 10 %).</li>
                    <li><strong>Gestion des eaux de pluie :</strong> Prévoir des caniveaux en tête de mur pour limiter le ruissellement sur la paroi.</li>
                    <li><strong>Vérification de la semelle :</strong> Assurer un dosage du béton de fondation adapté à la charge colossale de la pierre.</li>
                </ul>

                <img src="<?php echo BASE_URL; ?>image/mur-poids-en-pierre-paris4.webp"
                     alt="Gros plan sur la base d'un mur en pierre montrant une barbacane et le système de drainage derrière"
                     loading="lazy"
                     style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <h2 id="prix">Quel est le prix au m² pour un mur en pierre naturelle à Paris ?</h2>

                <p>Le budget dépend de la complexité d'accès et du type de pierre choisi. Bien que l'investissement initial soit plus élevé qu'un mur en blocs béton, la valeur ajoutée patrimoniale est immédiate. Un mur bien conçu ne nécessite aucun entretien majeur pendant plusieurs décennies, contrairement aux enduits modernes qui se fissurent.</p>

                <p>Il est fréquent de profiter d'un projet de <a href="<?php echo BASE_URL; ?>ravalement-de-facade">ravalement de façade</a> pour harmoniser les murs de clôture et de soutènement, créant ainsi une cohérence visuelle qui augmente la valeur foncière de la maison de façon significative.</p>

                <h2 id="diagnostic">Diagnostic : Identifier les fissures et les risques d'effondrement</h2>

                <p>Un mur de soutènement qui "travaille" envoie des signaux d'alerte qu'il ne faut pas ignorer. L'apparition d'un <strong>ventre de bœuf</strong> (bombement de la paroi) ou de fissures en escalier indique souvent une défaillance du système de drainage ou un glissement de terrain.</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Symptôme</th>
                                <th>Risque</th>
                                <th>Solution préconisée</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Ventre de bœuf (bombement)</td>
                                <td>Effondrement imminent par poussée excessive.</td>
                                <td>Drainage urgent et renforcement structurel.</td>
                            </tr>
                            <tr>
                                <td>Fissures verticales ou en escalier</td>
                                <td>Mouvement des fondations ou tassement.</td>
                                <td>Reprise de fondation sous œuvre.</td>
                            </tr>
                            <tr>
                                <td>Suintements et salpêtre constants</td>
                                <td>Érosion des joints et saturation d'eau.</td>
                                <td>Traitement de l'humidité et curage du drain.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <img src="<?php echo BASE_URL; ?>image/mur-poids-en-pierre-paris5.webp"
                     alt="Mur de soutènement en pierre présentant un ventre de bœuf et des fissures, risque d'effondrement"
                     loading="lazy"
                     style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <h2 id="ux-outil">⚙️ Évaluez l'état de votre mur de soutènement</h2>

                <div id="ux-tool" class="ux-tool-container">
                    <h3>Votre mur de soutènement a-t-il besoin d'une intervention urgente ?</h3>

                    <div id="step-1" class="ux-step active">
                        <div class="ux-question">1. Observez-vous des signes visibles de déformation ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(1, 'ventre')">Oui, un bombement (ventre de bœuf)</button>
                            <button class="ux-btn" onclick="saveAnswer(1, 'fissures')">Oui, des fissures en escalier</button>
                            <button class="ux-btn" onclick="saveAnswer(1, 'aucun')">Non, le mur semble droit</button>
                        </div>
                    </div>

                    <div id="step-2" class="ux-step">
                        <div class="ux-question">2. Y a-t-il des suintements ou du salpêtre sur le mur ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(2, 'oui')">Oui, des traces blanches ou d'humidité</button>
                            <button class="ux-btn" onclick="saveAnswer(2, 'non')">Non, le mur est sec</button>
                        </div>
                    </div>

                    <div id="step-3" class="ux-step">
                        <div class="ux-question">3. Quel est l'âge estimé du mur ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(3, 'recent')">Moins de 20 ans</button>
                            <button class="ux-btn" onclick="saveAnswer(3, 'ancien')">Plus de 20 ans (ou inconnu)</button>
                        </div>
                    </div>

                    <div id="step-result" class="ux-step">
                        <div id="success-result" class="ux-result-box" style="display: none;">
                            <h4 style="margin-top:0; color:#16a085;">État du mur :</h4>
                            <p id="result-text"></p>
                        </div>
                        <div id="warning-result" class="ux-warning-box" style="display: none;">
                            <h4 style="margin-top:0; color:#c0392b;">Intervention urgente requise</h4>
                            <p id="warning-text">Les déformations constatées (ventre de bœuf ou fissures en escalier) sont des signaux d'effondrement imminent. N'attendez pas : évacuez la zone à risque et faites appel à un professionnel pour une expertise structurelle sans délai.</p>
                            <a href="<?php echo BASE_URL; ?>contact" class="cta-btn">Demander une expertise d'urgence</a>
                        </div>
                        <button class="reset-btn" onclick="resetTool()">Recommencer le test</button>
                    </div>
                </div>

                <h2 id="faq">FAQ, Questions fréquentes</h2>

                <h3>Quelle est l'épaisseur idéale pour un mur de 2 mètres de haut ?</h3>
                <p>Pour une hauteur de 2 mètres, la base de votre mur poids devrait idéalement mesurer entre 70 et 80 cm de largeur pour garantir un équilibre parfait face à la poussée des terres. Ce ratio d'un tiers à la moitié de la hauteur est une règle de base, le BET pourra affiner ce dimensionnement selon la nature du sol.</p>

                <h3>Peut-on construire un mur poids sans béton à Paris ?</h3>
                <p>C'est le principe de la pierre sèche, mais cela demande un savoir-faire rare et une épaisseur encore plus importante. À Paris, pour des raisons de sécurité et d'assurance (sous-sol de carrières), on privilégie la maçonnerie liée au mortier de chaux avec des fondations bétonnées hors-gel.</p>

                <h3>Comment entretenir un vieux mur en pierre meulière à Paris ?</h3>
                <p>L'entretien consiste principalement à surveiller le drainage et à brosser les joints pour éviter que la végétation ne s'y installe. En présence de salpêtre persistant, faites appel à un maçon pour rejointoyer à la chaux avant que l'érosion ne compromette la structure d'ensemble.</p>

            </div>

            <div class="author-box-bottom">
                <div class="author-box-img">
                    <img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe">
                </div>
                <div class="author-box-content">
                    <h3>Philippe</h3>
                    <span class="author-role">Expert Rénovation &amp; Artisan RGE</span>
                    <p>Avec une connaissance approfondie du sous-sol parisien et des exigences des ABF, Philippe intervient sur des chantiers de soutènement en pierre dans tout l'Île-de-France. Il maîtrise les contraintes du PLU et les normes Eurocode pour des ouvrages conformes et durables.</p>
                    <a href="<?php echo BASE_URL; ?>philippe" class="btn-outline">Voir son profil complet</a>
                </div>
            </div>

            <div class="conclusion-box">
                <h3>Un projet de mur de soutènement à Paris ou en Île-de-France ?</h3>
                <p>Le sous-sol parisien exige une expertise spécifique. Avant de lancer votre chantier, faites évaluer votre terrain par un professionnel qui coordonnera l'étude géotechnique et le dimensionnement de votre mur poids.</p>
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

        if (userAnswers.step1 === 'ventre' || userAnswers.step1 === 'fissures') {
            warningBox.style.display = 'block';
        } else if (userAnswers.step2 === 'oui' && userAnswers.step3 === 'ancien') {
            successBox.style.display = 'block';
            resultText.innerHTML = "<strong>État : Surveiller et traiter préventivement</strong><br>Les suintements sur un mur ancien signalent une saturation du drainage. Curez les barbacanes et les drains de pied de mur. Faites rejointoyer à la chaux les zones érodées. Programmez une inspection structurelle dans les 6 mois.";
        } else {
            successBox.style.display = 'block';
            resultText.innerHTML = "<strong>État : Bon état apparent</strong><br>Votre mur ne présente pas de signaux d'alerte immédiats. Maintenez une inspection visuelle annuelle (printemps) et vérifiez que les barbacanes ne sont pas obstruées par la végétation. Un entretien préventif des joints tous les 10 à 15 ans prolongera la durée de vie de l'ouvrage.";
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
        'question' => "Quelle est l'épaisseur idéale pour un mur de soutènement de 2 mètres de haut ?",
        'answer'   => "Pour une hauteur de 2 mètres, la base de votre mur poids devrait idéalement mesurer entre 70 et 80 cm de largeur pour garantir un équilibre parfait face à la poussée des terres. Ce ratio d'un tiers à la moitié de la hauteur est une règle de base que le BET peut affiner selon la nature du sol."
    ],
    [
        'question' => "Peut-on construire un mur poids sans béton à Paris ?",
        'answer'   => "C'est le principe de la pierre sèche, mais cela demande un savoir-faire rare. À Paris, pour des raisons de sécurité et d'assurance liées au sous-sol de carrières, on privilégie la maçonnerie liée au mortier de chaux avec des fondations bétonnées hors-gel."
    ],
    [
        'question' => "Comment entretenir un vieux mur en pierre meulière à Paris ?",
        'answer'   => "L'entretien consiste à surveiller le drainage, brosser les joints et éviter que la végétation s'y installe. En présence de salpêtre persistant, faites rejointoyer à la chaux avant que l'érosion ne compromette la structure d'ensemble."
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
