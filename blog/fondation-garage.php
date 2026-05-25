<?php
// published: 2026-04-06 08:00
/**
 * fondation-garage.php
 * Article : Fondation de garage : obligatoire, dimensions, types et étapes
 * Site : cemarenov.fr
 * Date : 2026-04-01
 */


$article_meta = [
    'title'        => 'Fondation de garage : obligatoire, dimensions, types et étapes',
    'category'     => 'travaux',
    'slug'         => 'fondation-garage',
    'image'        => 'https://www.cemarenov.fr/image/fondation-garage1.webp',
    'excerpt'      => 'Découvrez si les fondations sont obligatoires pour un garage, quelles dimensions et profondeur respecter, et suivez les 5 étapes clés pour un coulage parfait de votre semelle ou dalle monolithique.',
    'date'         => '2026-04-06',
    'reading_time' => 7,
];


// Bloc logique CMS, NE JAMAIS MODIFIER
require_once dirname(__DIR__) . '/functions.php';


$page_title       = $article_meta['title'];
$page_description = $article_meta['excerpt'];


// Current article category + self-exclusion filter
$current_cat = $article_meta['category'];
$current_url = BASE_URL . str_replace('.php', '', basename($_SERVER['SCRIPT_FILENAME']));
$category    = get_category($current_cat);
$other_cats  = get_other_categories($current_cat);
$cat_articles = array_values(array_filter(get_category_articles($current_cat, 11), fn($a) => ($a['url'] ?? '') !== $current_url));
$cat_articles = array_slice($cat_articles, 0, 10);
$latest_articles = array_values(array_filter(get_latest_articles(11), fn($a) => ($a['url'] ?? '') !== $current_url));
$latest_articles = array_slice($latest_articles, 0, 10);


// Similar articles: pick 3 from category (excluding self)
$current_title_words = array_map('mb_strtolower', explode(' ', $article_meta['title']));
$similar_articles    = [];
foreach ($cat_articles as $art) {
    if (!isset($art['title'])) continue;
    $title_words = array_map('mb_strtolower', explode(' ', $art['title']));
    $common      = count(array_intersect($current_title_words, $title_words));
    $similar_articles[] = array_merge($art, ['score' => $common]);
}
usort($similar_articles, function ($a, $b) { return $b['score'] - $a['score']; });
$similar_articles = array_slice($similar_articles, 0, 3);


// INCLUDE HEADER
include dirname(__DIR__) . '/header.php';
?>


<style>
    /* Styles intégrés pour l'outil UX et la vidéo */
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
    
    /* Style pour la box de linking interne */
    .guide-links-box { background: #edf2f7; border-left: 4px solid #3498db; padding: 1.5em; border-radius: 8px; margin: 2em 0; }
    .guide-links-box h3 { margin-top: 0; font-size: 1.2em; color: #2c3e50; }
    .guide-links-box p { margin-bottom: 1em; }
    .guide-links-grid { display: flex; flex-wrap: wrap; gap: 10px; }
    .guide-link-item { background: #fff; border: 1px solid #cbd5e1; padding: 8px 15px; border-radius: 6px; font-weight: bold; text-decoration: none; color: #3498db; transition: all 0.2s ease; }
    .guide-link-item:hover { background: #3498db; color: #fff; border-color: #3498db; text-decoration: none; }
    
    @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
</style>


<article>
    <section class="article-hero" style="background-image: url('<?php echo BASE_URL; ?>image/fondation-garage1.webp');">
        <div class="article-hero-content">
            <nav class="breadcrumb">
                <a href="<?php echo BASE_URL; ?>">Accueil</a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
                <a href="<?php echo BASE_URL . $current_cat; ?>"><?php echo htmlspecialchars($category['name']); ?></a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
                <span>Fondation de garage</span>
            </nav>


            <div class="article-tags">
                <span class="article-tag">Gros Œuvre</span>
                <span class="article-tag">Maçonnerie</span>
            </div>


            <h1>Fondation de garage : obligatoire,<br>
                <span class="h1-accent">dimensions, types et étapes</span>
            </h1>


            <div class="article-meta-header" style="flex-wrap: wrap; gap: 15px;">
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
                <?php endforeach; ?>
            </div>
        </aside>


        <div class="article-container">
            <p class="article-intro">
                Une fondation de garage suit la même logique qu'une maison : elle nécessite de créer une assise solide (généralement une semelle filante) pour soutenir l'édifice. Dans ce guide, je vous détaille les obligations structurelles, le coût, les dimensions nécessaires ainsi que le déroulé complet des travaux pour assurer la longévité de votre projet.
            </p>


            <div class="article-content">
                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2" />
                        </svg>
                        L'essentiel à retenir
                    </div>
                    <ul>
                        <li><strong>Obligation :</strong> Les fondations sont indispensables, même pour un garage léger, afin d'éviter les fissures et l'affaissement.</li>
                        <li><strong>Dimensions :</strong> L'ancrage doit obligatoirement atteindre la profondeur hors gel (minimum 50 à 80 cm selon la région).</li>
                        <li><strong>Le bon choix :</strong> Dalle monolithique (radier) pour l'ossature bois, et semelles filantes armées pour le parpaing.</li>
                        <li><strong>Règle d'or :</strong> Ne liez jamais les fondations de votre garage à celles de votre maison (prévoyez un joint de dilatation).</li>
                    </ul>
                </div>


                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li>Faut-il obligatoirement des fondations pour un garage ?</li>
                        <li>Outil : Quel type et profondeur pour votre garage ?</li>
                        <li>Quel type de fondation est le mieux adapté ?</li>
                        <li>Les 5 étapes clés pour faire vos fondations</li>
                        <li>Chantier complexe : quand déléguer à un professionnel ?</li>
                        <li>FAQ : Vos questions fréquentes (Coût, mur existant, etc.)</li>
                    </ul>
                </div>


                <h2 id="obligation-fondations">Faut-il obligatoirement des fondations pour un garage ?</h2>
                <p>Oui, les fondations sont indispensables, car elles empêchent l'affaissement et la fissuration de la structure sous le poids des murs, de la toiture et de vos véhicules. Même pour une construction légère, je vous rappelle qu'un ancrage au sol sous la profondeur hors gel reste nécessaire pour garantir la stabilité du bâtiment dans le temps.</p>


                <h2 id="outil-diagnostic">Quel type de fondation et quelle profondeur pour votre garage ?</h2>
                
                <div id="ux-tool" class="ux-tool-container">
                    <h3>Diagnostic express de vos fondations</h3>
                    
                    <div id="step-1" class="ux-step active">
                        <div class="ux-question">1. Quelle est la surface prévue pour votre garage ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(1, 'Moins de 20m²')">Moins de 20m²</button>
                            <button class="ux-btn" onclick="saveAnswer(1, 'Plus de 20m²')">Plus de 20m²</button>
                        </div>
                    </div>


                    <div id="step-2" class="ux-step">
                        <div class="ux-question">2. Quels matériaux pour les murs ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(2, 'Parpaings')">Parpaings</button>
                            <button class="ux-btn" onclick="saveAnswer(2, 'Briques')">Briques</button>
                            <button class="ux-btn" onclick="saveAnswer(2, 'Ossature bois')">Ossature bois</button>
                        </div>
                    </div>


                    <div id="step-3" class="ux-step">
                        <div class="ux-question">3. Quelle est la nature de votre terrain ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(3, 'Standard')">Standard (Terre ferme)</button>
                            <button class="ux-btn" onclick="saveAnswer(3, 'Rocheux')">Rocheux</button>
                            <button class="ux-btn" onclick="saveAnswer(3, 'Argileux')">Argileux</button>
                            <button class="ux-btn" onclick="saveAnswer(3, 'Je ne sais pas')">Je ne sais pas</button>
                        </div>
                    </div>


                    <div id="step-result" class="ux-step">
                        <div id="success-result" class="ux-result-box" style="display: none;">
                            <h4 style="margin-top:0; color:#16a085;">Préconisation Technique :</h4>
                            <p id="result-text"></p>
                        </div>
                        
                        <div id="warning-result" class="ux-warning-box" style="display: none;">
                            <h4 style="margin-top:0; color:#c0392b;">Attention : Terrain ou projet complexe</h4>
                            <p id="warning-text">La nature de votre sol nécessite des précautions particulières pour éviter tout risque de tassement ou de fissure. Une étude de sol (G2) est donc fortement recommandée.</p>
                            <a href="https://www.meilleursartisans.com" target="_blank" class="cta-btn" rel="nofollow">Demander un diagnostic à un maçon expert</a>
                        </div>


                        <button class="reset-btn" onclick="resetTool()">Recommencer le test</button>
                    </div>
                </div>


                <div class="guide-links-box">
                    <h3>Vous cherchez un guide adapté à la taille de votre garage ?</h3>
                    <p>Si vous connaissez déjà la surface exacte de votre futur bâtiment, je vous ai préparé des dossiers dédiés. Vous y trouverez les calculs de volume de béton, les plans d'armature et les coûts précis selon votre projet :</p>
                    <div class="guide-links-grid">
                        <a href="<?php echo BASE_URL; ?>fondation-garage-20m2" class="guide-link-item">Fondation garage 20m2</a>
                        <a href="<?php echo BASE_URL; ?>fondation-garage-30m2" class="guide-link-item">Fondation garage 30m2</a>
                        <a href="<?php echo BASE_URL; ?>fondation-garage-40m2" class="guide-link-item">Fondation garage 40m2</a>
                        <a href="<?php echo BASE_URL; ?>fondation-garage-50m2" class="guide-link-item">Fondation garage 50m2</a>
                    </div>
                </div>


                <h2 id="choix-fondation">Quel type de fondation est le mieux adapté à un garage ?</h2>
                <p>En construction, il existe 3 types de fondations : superficielles, semi-profondes et profondes. Pour un garage classique, on utilise quasi exclusivement des fondations superficielles. Le choix se divise ensuite en deux options selon la charge à supporter :</p>
                <ul class="custom-list">
                    <li><strong>Dalle monolithique (radier) :</strong> Une dalle de béton armé très épaisse coulée d'un seul bloc. Elle convient parfaitement aux garages en ossature bois ou lorsque le sol offre une excellente portance uniforme.</li>
                    <li><strong>Fondation classique (semelle filante) :</strong> Des tranchées périphériques ferraillées dans lesquelles on coule le béton. Les murs reposent directement dessus. C'est la norme incontournable que je recommande pour les garages maçonnés (parpaings ou briques).</li>
                </ul>


                <h2 id="etapes-construction">Comment faire des fondations de garage ? Les 5 étapes clés</h2>


                <div class="video-container">
                    <iframe src="https://www.youtube.com/embed/1HsK-_NmTj4" title="Processus de coulage des fondations" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>


                <h3>Étape 1 : Le terrassement et le fond de fouille</h3>
                <p>Délimitez l'emprise au sol et creusez l'excavation (les tranchées périphériques) jusqu'à atteindre le sol sain et la limite hors gel. Coulez ensuite un béton de propreté au fond de la fouille sur environ 4 cm. Cela permet d'isoler le futur ferraillage de la terre végétale.</p>


                <h3>Étape 2 : Le positionnement des armatures</h3>
                <p>Placez vos armatures en acier (généralement des semelles de type 15-35) dans les tranchées. Petite astuce de pose : utilisez toujours de petites cales pour les surélever d'environ 4 à 5 cm, de sorte que le béton puisse les enrober parfaitement par le dessous.</p>


                <h3>Étape 3 : L'isolation et la protection</h3>
                <p>Si votre zone est à risque, appliquez un traitement antitermite dans le fond de fouille. C'est aussi le moment d'anticiper la mise en place du film polyane. Il sera nécessaire sous la future dalle pour bloquer les remontées d'eau et vous éviter d'avoir recours à un lourd <a href="https://www.cemarenov.fr/traitement-humidite">traitement contre l'humidité</a> par la suite.</p>


                <h3>Étape 4 : Le coulage du béton</h3>
                <p>Coulez le béton (idéalement via un camion toupie pour garantir l'homogénéité) directement dans les tranchées. Le <a href="https://www.cemarenov.fr/dosage-beton-fondation">dosage du béton de fondation</a> doit être précis et adapté à la charge. Vibrez le béton pour chasser les bulles d'air, puis mettez la surface parfaitement de niveau.</p>


                <h3>Étape 5 : Le soubassement</h3>
                <p>Une fois le béton sec, montez le premier rang de parpaings (le soubassement). Appliquez un mortier hydrofuge sur cette arase pour créer une barrière étanche. Pensez également à anticiper la structure supérieure : si vos murs sont hauts, je vous conseille vivement de prévoir un <a href="https://www.cemarenov.fr/chainage-horizontal-mur-parpaing">chaînage horizontal pour votre mur en parpaing</a>.</p>


                <h2 id="deleguer-pro">Chantier complexe : quand déléguer à un professionnel ?</h2>
                <p>Dans la pratique, réaliser ses fondations implique de louer une mini-pelle, d'évacuer d'importants volumes de terre et de maîtriser les bons dosages. Si votre terrain présente un dénivelé ou de l'argile gonflante, je préfère vous le dire directement : ne prenez aucun risque. Passez par un professionnel ou une plateforme comme meilleursartisans.com pour vous garantir un travail couvert par la garantie décennale.</p>


                <h2 id="faq">FAQ : Vos questions fréquentes</h2>


                <h3>Quelle profondeur pour les fondations d'un garage ?</h3>
                <p>Pour garantir la stabilité, la profondeur d'une fondation doit atteindre le sol dur et surtout la zone "hors gel". Selon votre région et votre altitude, comptez généralement entre 50 cm (climat tempéré) et 80 cm ou plus (zone montagneuse).</p>


                <h3>Puis-je couler du béton directement sur la terre ?</h3>
                <p>Non, car couler du béton à même la terre expose votre structure aux remontées d'humidité, au tassement du sol et au gel. Il faut au minimum décaper la terre végétale, créer un fond de fouille, poser un lit de gravier (hérisson) et utiliser un film polyane ou un béton de propreté.</p>


                <h3>Quelle est la fondation la moins chère pour un garage ?</h3>
                <p>La fondation la moins chère est généralement la dalle monolithique (ou dalle sur terre-plein), puisqu'elle combine en une seule opération la fondation et le sol du garage. Elle n'est possible que si votre terrain est parfaitement stable et que la structure du garage est légère (ossature bois, métal).</p>


                <h3>Quel est le coût de la fondation d'un garage ?</h3>
                <p>Le coût varie fortement selon la nature du terrain et le type de fondation. Pour des semelles filantes classiques réalisées par un professionnel, comptez en moyenne entre 60 € et 100 € le mètre linéaire (terrassement, ferraillage et coulage compris). Pour une dalle complète, le prix oscille plutôt entre 65 € et 120 € le m².</p>


                <h3>Comment faire une fondation sous un mur existant ?</h3>
                <p>Il faut procéder par <a href="https://www.cemarenov.fr/reprise-fondation-sous-oeuvre">reprise de fondation en sous-œuvre</a>. C'est-à-dire creuser et couler le béton par petites sections alternées (généralement par passes de 1 mètre) afin de ne pas déstabiliser le mur existant.</p>


                <h3>Puis-je lier ma fondation de garage à celle de ma maison ?</h3>
                <p>Non. Je vois souvent cette erreur sur les chantiers, mais il est impératif de désolidariser les deux bâtiments en créant un joint de dilatation. Chaque construction se tassant à son propre rythme, lier les fondations provoquerait d'inévitables fissures.</p>

                <h3>Quel coffrage prévoir pour les semelles du garage ?</h3>
                <p>Les semelles filantes d'un garage se coffrent généralement avec des planches de bois de 27 mm, maintenues par des cavaliers et des étais. Notre guide <a href="https://www.cemarenov.fr/coffrage-pour-fondation">coffrage pour fondation</a> détaille les techniques de mise en place, les types de parements et les points de contreventement à vérifier avant le coulage.</p>

                <h3>Mon terrain est en pente : dois-je adapter les fondations ?</h3>
                <p>Absolument. Sur un terrain incliné, il est interdit de couler une fondation en oblique, les semelles doivent toujours être horizontales. On procède par <strong>redents</strong> : des paliers successifs en escalier qui descendent jusqu'au sol porteur. Notre dossier <a href="https://www.cemarenov.fr/fondation-pour-terrain-en-pente">fondation pour terrain en pente</a> couvre les techniques d'ancrage et les erreurs classiques à éviter.</p>

            </div><div class="conclusion-box">
                <h3>Le mot de la fin</h3>
                <p>Couler les fondations d'un garage ne s'improvise pas. Du respect de la zone hors gel à la bonne disposition des aciers dans les semelles, chaque étape garantit la solidité de votre futur édifice. Ne négligez jamais l'étude de votre sol avant de commencer l'excavation.</p>
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
                    <h3 class="sidebar-title">Derniers articles, <?php echo htmlspecialchars($category['name']); ?></h3>
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


        if (userAnswers.step3 === 'Argileux' || userAnswers.step3 === 'Je ne sais pas') {
            warningBox.style.display = 'block';
        } else if (userAnswers.step2 === 'Ossature bois' && userAnswers.step3 === 'Standard') {
            successBox.style.display = 'block';
            resultText.innerHTML = "<strong>Type :</strong> Dalle monolithique (Radier).<br>Votre structure légère et votre sol stable vous permettent d'opter pour une dalle épaisse ferraillée coulée d'un seul bloc, qui fera ainsi à la fois office de sol et de fondation.";
        } else {
            successBox.style.display = 'block';
            resultText.innerHTML = "<strong>Type :</strong> Semelle filante armée (Type 15-35).<br><strong>Profondeur estimée :</strong> Niveau hors gel (minimum 50 cm à adapter selon votre région).<br><strong>Largeur conseillée :</strong> Minimum 40 à 50 cm pour supporter la charge maçonnée en toute sécurité.";
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
$_schema = get_schema_data(basename(__FILE__, '.php'));
echo generate_article_schema($article_meta, $_schema['faq'] ?? [], $_schema['howto'] ?? []);
echo generate_rating_widget();
include dirname(__DIR__) . '/footer.php';
