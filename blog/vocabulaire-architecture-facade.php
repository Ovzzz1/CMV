<?php
// published: 2026-04-29 08:00
/**
 * vocabulaire-architecture-facade.php
 * Article : Vocabulaire architecture façade : Le lexique complet des éléments de bâtiment
 * Site : cemarenov.fr
 * Date : 2026-04-24
 */

$article_meta = [
    'title'        => 'Vocabulaire architecture façade : lexique complet des éléments',
    'category'     => 'travaux',
    'slug'         => 'vocabulaire-architecture-facade',
    'image'        => 'https://www.cemarenov.fr/image/vocabulaire-architecture-facade1.webp',
    'excerpt'      => 'Maîtrisez le vocabulaire de l\'architecture de façade : soubassement, modénature, linteau, jambage, corniche... Le lexique complet pour comprendre et décrire tout élément de bâtiment.',
    'date'         => '2026-04-29',
    'reading_time' => 10,
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
                <span>Vocabulaire architecture façade</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Architecture</span>
                <span class="article-tag">Façade</span>
                <span class="article-tag">Lexique</span>
                <span class="article-tag">Rénovation</span>
            </div>

            <h1>Vocabulaire architecture façade :<br><span class="h1-accent">Le lexique complet des éléments de bâtiment</span></h1>

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
                Le <strong>vocabulaire de l'architecture de façade</strong> est bien plus qu'une liste de termes techniques : c'est un code qui permet de décrypter l'histoire, le style et la structure d'un édifice. Que vous soyez professionnel ou particulier préparant une rénovation, maîtriser ce <strong>lexique architectural</strong> est indispensable pour identifier chaque composant et communiquer avec précision avec les architectes et les artisans du bâtiment.
            </p>

            <div class="article-content">

                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                        L'essentiel à retenir
                    </div>
                    <ul class="custom-list">
                        <li><strong>3 zones d'une façade :</strong> Soubassement (bas), corps de façade (milieu), couronnement (haut).</li>
                        <li><strong>Travée vs trumeau :</strong> La travée est un alignement vertical de fenêtres ; le trumeau est le mur plein entre deux baies.</li>
                        <li><strong>Modénature :</strong> L'ensemble des reliefs décoratifs d'une façade, bandeaux, corniches, consoles.</li>
                        <li><strong>Linteau :</strong> L'élément horizontal qui porte la charge du mur au-dessus d'une fenêtre ou d'une porte.</li>
                        <li><strong>Acrotère :</strong> Le muret en bordure d'une toiture-terrasse, souvent confondu avec la corniche.</li>
                    </ul>
                </div>

                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li><a href="#parties-facade">1. Les différentes parties d'une façade</a></li>
                        <li><a href="#anatomie-verticale">2. L'anatomie verticale : du soubassement au couronnement</a></li>
                        <li><a href="#ouvertures">3. Le lexique technique des ouvertures</a></li>
                        <li><a href="#modenature">4. La modénature : reliefs et ornements</a></li>
                        <li><a href="#surfaces">5. Finitions et protection : le vocabulaire des surfaces</a></li>
                        <li><a href="#dossier-urbanisme">6. Comment décrire une façade pour un dossier d'urbanisme ?</a></li>
                        <li><a href="#tableau-12-mots">7. Les 12 mots-clés à retenir</a></li>
                        <li><a href="#ux-outil">⚙️ Outil : Identifiez les éléments de votre façade</a></li>
                        <li><a href="#faq">FAQ, Questions fréquentes</a></li>
                    </ul>
                </div>

                <div style="background-color: var(--color-light); border-left: 4px solid var(--color-primary); padding: 1.5rem; margin-bottom: 2rem; border-radius: 0 8px 8px 0;">
                    <ul class="custom-list" style="margin: 0;">
                        <li><strong>Checklist, Comment identifier un élément :</strong> Analysez selon 3 axes : la position verticale (soubassement, corps, couronnement), la fonction technique (porteur, décoratif, étanchéité) et le type de relief (saillie ou retrait).</li>
                    </ul>
                </div>

                <img src="<?php echo BASE_URL; ?>image/vocabulaire-architecture-facade1.webp"
                     alt="Schéma architectural technique représentant les trois zones d'une façade classique : soubassement, corps et couronnement"
                     loading="lazy"
                     style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <h2 id="parties-facade">1. Quelles sont les différentes parties d'une façade ?</h2>

                <p>Avant de détailler les ornements, il faut comprendre l'organisation globale de l'enveloppe. On distingue généralement la <strong>façade principale</strong> (souvent sur rue, richement décorée) du <strong>mur pignon</strong>, qui correspond à la face latérale triangulaire. Lors d'un projet d'<a href="<?php echo BASE_URL; ?>isolation-thermique-exterieur-ite">isolation thermique par l'extérieur (ITE)</a>, identifier ces différentes parois est crucial pour traiter les ponts thermiques de manière stratégique.</p>

                <h2 id="anatomie-verticale">2. L'anatomie verticale : du soubassement au couronnement</h2>

                <p>Une analyse architecturale rigoureuse suit toujours une lecture de bas en haut, divisant la façade en trois strates fonctionnelles.</p>

                <h3>Le soubassement : l'assise protectrice</h3>
                <p>Le soubassement constitue la base du bâtiment. Son rôle est d'assurer l'assise visuelle de l'édifice tout en protégeant les murs des remontées capillaires. Cette zone nécessite souvent une <a href="<?php echo BASE_URL; ?>etancheite-mur-parpaing-interieur">étanchéité spécifique</a> pour éviter que l'humidité ne migre vers les étages supérieurs.</p>

                <h3>Le corps de façade : travées et trumeaux</h3>
                <p>Le corps de façade est la partie centrale. Il est rythmé par les <strong>travées</strong> (alignements verticaux de fenêtres) et les <strong>trumeaux</strong> (sections de mur plein situées entre deux baies). C'est ici que l'application d'un enduit de façade ou d'un parement scelle l'identité visuelle de la maison.</p>

                <h3>Le couronnement : la transition avec le toit</h3>
                <p>Le couronnement termine l'élévation. Il comprend souvent une <strong>corniche</strong> dont la saillie rejette les eaux de pluie loin du mur, ou un <strong>acrotère</strong> (muret en bordure de terrasse). Cette partie haute protège la structure des infiltrations par le sommet.</p>

                <h2 id="ouvertures">3. Le lexique technique des ouvertures (baies et fenêtres)</h2>

                <p>Dans le vocabulaire de la maçonnerie, chaque élément entourant une ouverture possède une fonction de soutien ou d'évacuation d'eau bien précise.</p>

                <ul class="custom-list">
                    <li><strong>Le linteau :</strong> Élément horizontal supérieur qui porte la charge du mur au-dessus de la baie. Lié au chaînage horizontal sur les constructions contemporaines.</li>
                    <li><strong>Les jambages :</strong> Montants verticaux qui encadrent la fenêtre ou la porte.</li>
                    <li><strong>L'appui de fenêtre :</strong> Pièce horizontale basse, inclinée pour chasser l'eau vers l'extérieur.</li>
                    <li><strong>L'ébrasement :</strong> Épaisseur du mur vue de l'intérieur, souvent biseautée pour diffuser la lumière naturelle.</li>
                </ul>

                <img src="<?php echo BASE_URL; ?>image/vocabulaire-architecture-facade2.webp"
                     alt="Vue en gros plan d'un encadrement de baie de fenêtre en pierre avec linteau, jambages et appui annotés"
                     loading="lazy"
                     style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <h2 id="modenature">4. La modénature de façade : les éléments de relief et d'ornement</h2>

                <p>La <span class="hashtag">#modénature</span> désigne l'ensemble des reliefs qui animent une façade. Ces détails ne sont pas que décoratifs : ils servent à "couper" le ruissellement de l'eau et à éviter les traces de coulures sur l'enduit.</p>

                <h3>Bandeaux, cordons et corniches</h3>
                <p>Un <strong>bandeau</strong> est une moulure plate qui souligne un étage, tandis que la <strong>corniche</strong> est une saillie prononcée en haut de mur. Ces éléments cassent la verticalité de la façade et évitent les traces de coulures noires sur l'enduit.</p>

                <h3>Balcons, consoles et pilastres</h3>
                <p>Le balcon repose sur des <strong>consoles</strong> (appuis sculptés en saillie). Pour rythmer le mur sans utiliser de colonnes réelles, on utilise des <strong>pilastres</strong>, des piliers plats purement décoratifs intégrés à la maçonnerie.</p>

                <img src="<?php echo BASE_URL; ?>image/vocabulaire-architecture-facade3.webp"
                     alt="Détail architectural d'une console en pierre sculptée soutenant un balcon saillant avec corniche décorative"
                     loading="lazy"
                     style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <h2 id="surfaces">5. Finitions et protection : le vocabulaire des surfaces</h2>

                <p>Le vocabulaire de façade concerne enfin l'aspect de finition du matériau. Qu'il s'agisse d'un crépi, d'un badigeon de chaux ou d'une peinture technique, le traitement de surface est la peau du bâtiment. Pour maintenir la lisibilité de ces éléments, un <a href="<?php echo BASE_URL; ?>nettoyage-demoussage-facade">nettoyage et démoussage de façade</a> régulier est la seule solution pour préserver les modénatures et éviter que l'humidité ne s'installe dans les reliefs.</p>

                <h2 id="dossier-urbanisme">6. Méthodologie : comment décrire une façade pour un dossier d'urbanisme ?</h2>

                <p>Si vous devez rédiger une description pour un permis de construire ou une déclaration préalable, procédez dans cet ordre :</p>

                <ol style="margin-bottom: 20px; padding-left: 20px;">
                    <li><strong>Décrire l'ordonnancement :</strong> Nombre d'étages et nombre de travées (axes verticaux d'ouvertures).</li>
                    <li><strong>Préciser les matériaux :</strong> Nature du mur (pierre, brique) et type de finition (enduit gratté, taloché).</li>
                    <li><strong>Détailler les ouvertures :</strong> Type de linteaux (béton, pierre, métal) et de menuiseries (bois, PVC, aluminium).</li>
                    <li><strong>Lister la modénature :</strong> Présence de bandeaux, de balcons ou de corniches.</li>
                </ol>

                <h2 id="tableau-12-mots">7. Les 12 mots-clés à retenir</h2>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Terme</th>
                                <th>Définition</th>
                                <th>Zone</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Acrotère</strong></td>
                                <td>Muret de bordure de toit-terrasse</td>
                                <td>Sommet</td>
                            </tr>
                            <tr>
                                <td><strong>Appui</strong></td>
                                <td>Rejet d'eau en bas de fenêtre</td>
                                <td>Ouverture</td>
                            </tr>
                            <tr>
                                <td><strong>Bandeau</strong></td>
                                <td>Moulure horizontale entre étages</td>
                                <td>Corps</td>
                            </tr>
                            <tr>
                                <td><strong>Chaînage</strong></td>
                                <td>Renfort d'angle de la maçonnerie</td>
                                <td>Structure</td>
                            </tr>
                            <tr>
                                <td><strong>Console</strong></td>
                                <td>Support en saillie sous un balcon</td>
                                <td>Ornement</td>
                            </tr>
                            <tr>
                                <td><strong>Corniche</strong></td>
                                <td>Couronnement projetant l'eau au loin</td>
                                <td>Sommet</td>
                            </tr>
                            <tr>
                                <td><strong>Ébrasement</strong></td>
                                <td>Côté intérieur d'une baie</td>
                                <td>Ouverture</td>
                            </tr>
                            <tr>
                                <td><strong>Jambage</strong></td>
                                <td>Montant vertical d'une baie</td>
                                <td>Ouverture</td>
                            </tr>
                            <tr>
                                <td><strong>Linteau</strong></td>
                                <td>Traverse supérieure d'une baie</td>
                                <td>Ouverture</td>
                            </tr>
                            <tr>
                                <td><strong>Pignon</strong></td>
                                <td>Partie haute triangulaire du mur latéral</td>
                                <td>Côté</td>
                            </tr>
                            <tr>
                                <td><strong>Soubassement</strong></td>
                                <td>Base du mur assurant l'assise</td>
                                <td>Bas</td>
                            </tr>
                            <tr>
                                <td><strong>Trumeau</strong></td>
                                <td>Mur situé entre deux fenêtres</td>
                                <td>Corps</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h2 id="ux-outil">⚙️ Identifiez les éléments de votre façade</h2>

                <div id="ux-tool" class="ux-tool-container">
                    <h3>Quel est le style architectural de votre bâtiment ?</h3>

                    <div id="step-1" class="ux-step active">
                        <div class="ux-question">1. Quelle est la période de construction estimée de votre bâtiment ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(1, 'haussmann')">Avant 1950 (Haussmannien, ancien)</button>
                            <button class="ux-btn" onclick="saveAnswer(1, 'contemporain')">1950–2000 (Contemporain)</button>
                            <button class="ux-btn" onclick="saveAnswer(1, 'recents')">Après 2000 (Récent)</button>
                        </div>
                    </div>

                    <div id="step-2" class="ux-step">
                        <div class="ux-question">2. Quel matériau domine sur la façade ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(2, 'pierre')">Pierre naturelle</button>
                            <button class="ux-btn" onclick="saveAnswer(2, 'enduit')">Enduit / crépi</button>
                            <button class="ux-btn" onclick="saveAnswer(2, 'brique')">Brique ou béton apparent</button>
                        </div>
                    </div>

                    <div id="step-3" class="ux-step">
                        <div class="ux-question">3. Y a-t-il des éléments décoratifs visibles (bandeaux, balcons, corniches) ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(3, 'riche')">Oui, façade très ornementée</button>
                            <button class="ux-btn" onclick="saveAnswer(3, 'sobre')">Non, façade sobre et lisse</button>
                        </div>
                    </div>

                    <div id="step-result" class="ux-step">
                        <div id="success-result" class="ux-result-box" style="display: none;">
                            <h4 style="margin-top:0; color:#16a085;">Profil architectural de votre façade :</h4>
                            <p id="result-text"></p>
                        </div>
                        <div id="warning-result" class="ux-warning-box" style="display: none;">
                            <h4 style="margin-top:0; color:#c0392b;">Façade patrimoniale protégée</h4>
                            <p id="warning-text">Un bâtiment ancien en pierre avec une modénature riche est probablement soumis à l'avis des Architectes des Bâtiments de France (ABF). Tout travail de ravalement nécessite une déclaration préalable et le respect des matériaux d'origine. Ne commencez pas sans vérifier auprès de votre mairie.</p>
                            <a href="<?php echo BASE_URL; ?>contact" class="cta-btn">Demander conseil à Philippe</a>
                        </div>
                        <button class="reset-btn" onclick="resetTool()">Recommencer le test</button>
                    </div>
                </div>

                <h2 id="faq">FAQ, Questions fréquentes</h2>

                <h3>Quelle est la différence entre un trumeau et une travée ?</h3>
                <p>La travée est l'alignement vertical des ouvertures (fenêtres superposées d'un étage à l'autre). Le trumeau est la partie du mur située horizontalement entre deux fenêtres d'un même niveau. En résumé : la travée se lit verticalement, le trumeau se lit horizontalement.</p>

                <h3>Qu'est-ce qu'une modénature et à quoi sert-elle vraiment ?</h3>
                <p>La modénature désigne l'ensemble des proportions et des profils des moulures d'une façade. Au-delà de l'esthétique, ces reliefs ont un rôle fonctionnel : ils cassent le ruissellement de l'eau de pluie et empêchent les traces de coulures sombres sur l'enduit. C'est la "signature" visuelle d'un bâtiment et la raison pour laquelle les ABF veillent à sa préservation lors des rénovations.</p>

                <h3>Faut-il un architecte pour rénover une façade avec des éléments ornementaux ?</h3>
                <p>Si votre bâtiment est situé en secteur sauvegardé ou à proximité d'un monument historique, oui, l'avis d'un Architecte des Bâtiments de France (ABF) est obligatoire et peut imposer le recours à un architecte du patrimoine pour les travaux sur la modénature. Vérifiez le PLU de votre commune avant d'engager tout chantier.</p>

            </div>

            <div class="author-box-bottom">
                <div class="author-box-img">
                    <img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe">
                </div>
                <div class="author-box-content">
                    <h3>Philippe</h3>
                    <span class="author-role">Expert Rénovation &amp; Artisan RGE</span>
                    <p>Philippe maîtrise parfaitement le vocabulaire architectural et les exigences des ABF. Il vous aide à décrire votre façade avec précision dans vos dossiers d'urbanisme et à choisir les techniques de rénovation adaptées au style de votre bâtiment.</p>
                    <a href="<?php echo BASE_URL; ?>philippe" class="btn-outline">Voir son profil complet</a>
                </div>
            </div>

            <div class="conclusion-box">
                <h3>Préparez votre dossier de rénovation de façade</h3>
                <p>Maîtriser le vocabulaire, c'est bien, mais connaître les techniques et les contraintes réglementaires, c'est encore mieux. Philippe peut vous accompagner dans votre projet de façade, du diagnostic à la réception de chantier.</p>
                <a href="<?php echo BASE_URL; ?>contact" class="btn-primary">Obtenir un avis ou un devis gratuit</a>
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

        if (userAnswers.step1 === 'haussmann' && userAnswers.step3 === 'riche') {
            warningBox.style.display = 'block';
        } else if (userAnswers.step1 === 'recents') {
            successBox.style.display = 'block';
            resultText.innerHTML = "<strong>Façade contemporaine :</strong> Peu d'éléments de modénature à protéger. Votre façade dispose probablement d'un enduit monocouche ou d'un bardage. Les travaux nécessitent généralement une simple déclaration préalable sauf si le bâtiment dépasse 150 m². Aucune contrainte ABF en règle générale.";
        } else {
            successBox.style.display = 'block';
            resultText.innerHTML = "<strong>Façade sobre à surveiller :</strong> Une façade sobre en enduit ne demande pas de contraintes patrimoniales particulières mais peut tout de même nécessiter une déclaration préalable pour le changement de couleur. Vérifiez systématiquement le PLU de votre commune avant de commander la peinture ou l'enduit.";
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
        'question' => "Quelle est la différence entre un trumeau et une travée en architecture ?",
        'answer'   => "La travée est l'alignement vertical des ouvertures (fenêtres superposées d'un étage à l'autre). Le trumeau est la partie du mur située horizontalement entre deux fenêtres d'un même niveau. La travée se lit verticalement, le trumeau horizontalement."
    ],
    [
        'question' => "Qu'est-ce qu'une modénature et à quoi sert-elle ?",
        'answer'   => "La modénature désigne l'ensemble des proportions et des profils des moulures d'une façade. Au-delà de l'esthétique, ces reliefs cassent le ruissellement de l'eau de pluie et empêchent les traces de coulures sur l'enduit. C'est la signature visuelle d'un bâtiment."
    ],
    [
        'question' => "Faut-il un architecte pour rénover une façade avec des éléments ornementaux ?",
        'answer'   => "Si votre bâtiment est situé en secteur sauvegardé ou à proximité d'un monument historique, l'avis d'un Architecte des Bâtiments de France est obligatoire. Pour les travaux sur la modénature, le recours à un architecte du patrimoine peut être imposé. Vérifiez le PLU avant tout chantier."
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
