// published: 2026-04-09 08:00

/**
 * fondation-pour-terrain-en-pente.php
 * Article : Fondation pour terrain en pente : Guide des solutions et normes techniques
 * Site : cemarenov.fr
 * Date : 2026-04-09
 */

$article_meta = [
    'title'        => 'Fondation pour terrain en pente : solutions et normes techniques',
    'category'     => 'travaux',
    'slug'         => 'fondation-pour-terrain-en-pente',
    'image'        => 'https://www.cemarenov.fr/image/fondation-pour-terrain-en-pente1.webp',
    'excerpt'      => 'Construire sur un terrain en pente nécessite une approche spécifique : gradins, plots, gestion des eaux. Découvrez les solutions et normes techniques pour réussir vos fondations.',
    'date'         => '2026-04-09',
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

    <section class="article-hero" style="background-image: url('<?php echo $article_meta['image']; ?>');">
        <div class="article-hero-content">

            <nav class="breadcrumb">
                <a href="<?php echo BASE_URL; ?>">Accueil</a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                <a href="<?php echo BASE_URL . $current_cat; ?>"><?php echo htmlspecialchars($category['name']); ?></a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                <span>Fondation terrain en pente</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Gros Œuvre</span>
                <span class="article-tag">Maçonnerie</span>
                <span class="article-tag">Fondations</span>
            </div>

            <h1>Fondation pour terrain en pente<br><span class="h1-accent">Guide des solutions et normes techniques</span></h1>

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
                Construire sur un relief incliné ne s'improvise pas. Que votre projet porte sur une maison à ossature bois ou une construction traditionnelle en maçonnerie, l'ancrage au sol conditionne la pérennité de l'ouvrage. Face à une déclivité, deux philosophies s'affrontent : s'adapter au terrain via des structures légères comme les plots, ou transformer le relief par un terrassement conséquent pour y asseoir des fondations classiques. Ce guide vous présente les solutions adaptées, les normes à respecter et les pièges à éviter.
            </p>

            <div class="article-content">

                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                        L'essentiel à retenir
                    </div>
                    <ul class="custom-list">
                        <li><strong>Étude de sol G2 obligatoire :</strong> Sur un terrain en pente, elle est incontournable pour éviter tout sinistre et obtenir la couverture assurance.</li>
                        <li><strong>Fondations en gradins :</strong> Solution de référence pour les constructions lourdes, avec le ratio réglementaire 2V/3H entre paliers.</li>
                        <li><strong>Maison sur plots :</strong> Idéale pour les pentes supérieures à 15-20 %, notamment pour les maisons à ossature bois.</li>
                        <li><strong>Gestion des eaux :</strong> Un drainage périphérique irréprochable est impératif pour neutraliser la pression hydrostatique.</li>
                        <li><strong>Surcoûts à anticiper :</strong> Logistique, blindage de fouilles et évacuation des terres peuvent alourdir la facture de 20 à 40 %.</li>
                        <li><strong>Jamais sur remblai :</strong> Les fondations doivent toujours atteindre le sol naturel en place, quelle que soit la profondeur requise.</li>
                    </ul>
                </div>

                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li><a href="#etude-sol">1. L'étude de sol G2 : le préalable non négociable</a></li>
                        <li><a href="#fondations-gradins">2. Les fondations en gradins pour la maçonnerie classique</a></li>
                        <li><a href="#maison-sur-plots">3. La maison sur plots ou pilotis (ossature bois)</a></li>
                        <li><a href="#gestion-eau">4. Terrassement et gestion de l'eau</a></li>
                        <li><a href="#budget">5. Budget et logistique : les surcoûts cachés</a></li>
                        <li><a href="#ux-outil">⚙️ Outil : Quelle fondation pour mon terrain en pente ?</a></li>
                        <li><a href="#faq">FAQ, Questions fréquentes</a></li>
                    </ul>
                </div>

                <h2 id="etude-sol">L'étude de sol G2 et les assurances : le préalable non négociable</h2>

                <p>Avant de couler le moindre mètre cube de béton, l'analyse de la nature de votre sol est une obligation de fait. Sur un terrain présentant une pente, les risques de tassement différentiel ou de glissement de terrain sont démultipliés par la pression hydrostatique et la gravité.</p>

                <p>L'étude géotechnique de conception (G2) permet de déterminer la portance du sol et de définir la profondeur d'ancrage nécessaire pour atteindre le "bon sol". Au-delà de l'aspect technique, cette étude est la clé de voûte de votre sécurité financière. En effet, en cas de défaut de stabilité futur, une <a href="<?php echo BASE_URL; ?>reprise-fondation-sous-oeuvre">reprise de fondation sous œuvre</a> s'avère extrêmement coûteuse et complexe à mettre en place sur un terrain accidenté.</p>

                <p>De plus, la quasi-totalité des assureurs refusent de couvrir un sinistre sur pente si aucune étude de sol n'a été réalisée au préalable. L'investissement dans cette étude — entre 800 et 2 500 € selon la complexité — est systématiquement rentabilisé par les économies réalisées sur le dimensionnement des fondations et la sécurisation de votre garantie décennale.</p>

                <div class="guide-links-box">
                    <h3>Guides complémentaires sur les fondations</h3>
                    <p>Pour aller plus loin dans la préparation de votre projet de gros œuvre :</p>
                    <div class="guide-links-grid">
                        <a href="<?php echo BASE_URL; ?>dosage-beton-fondation" class="guide-link-item">Dosage béton de fondation</a>
                        <a href="<?php echo BASE_URL; ?>reprise-fondation-sous-oeuvre" class="guide-link-item">Reprise en sous-œuvre</a>
                        <a href="<?php echo BASE_URL; ?>chainage-horizontal-mur-parpaing" class="guide-link-item">Chaînage horizontal parpaing</a>
                        <a href="<?php echo BASE_URL; ?>traitement-humidite" class="guide-link-item">Traitement de l'humidité</a>
                    </div>
                </div>

                <h2 id="fondations-gradins">Les fondations en gradins (redans) pour la maçonnerie classique</h2>

                <img src="<?php echo BASE_URL; ?>image/fondation-pour-terrain-en-pente1.webp"
                     alt="Chantier de fondation pour terrain en pente avec semelles filantes en gradins"
                     loading="lazy"
                     style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <p>Pour les constructions lourdes ou les maisons avec sous-sol, la technique des fondations en gradins — également appelées <strong>redans</strong> — est la solution de référence. Elle consiste à réaliser des semelles filantes par paliers successifs pour accompagner la pente naturelle sans avoir à décaisser la totalité du terrain.</p>

                <p>La règle d'or pour la liaison des semelles est le respect du ratio <strong>2V/3H</strong> : pour un décalage vertical (V), la longueur de la liaison horizontale (H) doit être au moins 1,5 fois supérieure. Cette méthode permet d'éviter les ruptures de continuité dans l'armature.</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr><th>Décalage vertical (V)</th><th>Longueur horizontale minimale (H)</th><th>Exemple concret</th></tr>
                        </thead>
                        <tbody>
                            <tr><td><strong>20 cm</strong></td><td>30 cm</td><td>Pente douce à 10 %</td></tr>
                            <tr><td><strong>40 cm</strong></td><td>60 cm</td><td>Pente modérée à 20 %</td></tr>
                            <tr><td><strong>60 cm</strong></td><td>90 cm</td><td>Pente forte à 30 %</td></tr>
                        </tbody>
                    </table>
                </div>

                <p>Pour ces structures, la mise en place d'un <a href="<?php echo BASE_URL; ?>chainage-horizontal-mur-parpaing">chaînage horizontal sur mur en parpaing</a> est indispensable pour solidariser les différents niveaux et absorber les tensions structurelles liées à l'inclinaison. Le <a href="<?php echo BASE_URL; ?>dosage-beton-fondation">dosage du béton de fondation</a> doit par ailleurs garantir une résistance minimale C25/30 pour faire face aux poussées latérales spécifiques aux terrains en pente.</p>

                <h2 id="maison-sur-plots">La maison sur plots ou pilotis (ossature bois)</h2>

                <img src="<?php echo BASE_URL; ?>image/fondation-pour-terrain-en-pente2.webp"
                     alt="Construction d'une maison en bois sur plots béton sur un terrain à forte pente"
                     loading="lazy"
                     style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <p>Si votre terrain présente une pente forte (supérieure à 15-20 %), le terrassement traditionnel devient vite prohibitif. La maison sur plots béton ou pieux vissés s'impose alors comme l'alternative la plus performante, particulièrement pour les extensions ou les maisons à ossature bois.</p>

                <p>Cette solution limite l'impact sur le sol naturel et réduit drastiquement les frais de terrassement. Les principaux avantages sont :</p>

                <ul class="custom-list">
                    <li><strong>Impact environnemental réduit :</strong> Le sol naturel est préservé entre les points d'appui, limitant l'érosion et le ruissellement.</li>
                    <li><strong>Rapidité d'exécution :</strong> La pose de plots préfabriqués ou de pieux vissés est deux à trois fois plus rapide qu'un terrassement complet.</li>
                    <li><strong>Ventilation naturelle :</strong> En élevant la structure, on favorise une <a href="<?php echo BASE_URL; ?>ventilation-naturelle">ventilation naturelle</a> sous le plancher bas. Ce vide sanitaire ouvert élimine les risques d'humidité ascensionnelle et protège durablement l'ossature bois des agressions du sol.</li>
                    <li><strong>Adaptabilité :</strong> Les pieux vissés permettent de compenser des différences de niveau importantes sans décaissement.</li>
                </ul>

                <h2 id="gestion-eau">Terrassement et gestion de l'eau : attention à la poussée des terres</h2>

                <p>Le plus grand danger pour une fondation en pente n'est pas le poids de la maison, mais la force exercée par le terrain lui-même. Le mur situé du côté haut de la pente (mur amont) subit une pression latérale colossale. Si ce mur fait partie de l'habitation, il doit être traité comme un véritable mur de soutènement en béton banché.</p>

                <p>Sans un drainage périphérique irréprochable, l'eau de ruissellement s'accumule contre les fondations, créant des infiltrations qui nécessitent parfois un <a href="<?php echo BASE_URL; ?>traitement-humidite">traitement de l'humidité</a> curatif lourd. Le dispositif de drainage efficace comprend systématiquement :</p>

                <ol style="margin-bottom: 20px; padding-left: 20px;">
                    <li><strong>Une nappe à excroissances (nubuck) :</strong> Posée contre le mur amont, elle crée un plan de glissement qui évacue l'eau vers le bas.</li>
                    <li><strong>Un drain géotextile en pied de mur :</strong> Tuyau perforé enrobé dans du gravier propre, raccordé à un exutoire.</li>
                    <li><strong>Un exutoire gravitaire éloigné :</strong> Pour évacuer les eaux drainées loin de la construction, vers le réseau ou un espace vert.</li>
                </ol>

                <h2 id="budget">Budget et logistique : les surcoûts cachés du gros œuvre</h2>

                <img src="<?php echo BASE_URL; ?>image/fondation-pour-terrain-en-pente3.webp"
                     alt="Logistique de chantier difficile pour fondations sur terrain accidenté"
                     loading="lazy"
                     style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <p>Anticiper le budget d'un terrain en pente demande de regarder au-delà du prix des matériaux. Plusieurs facteurs peuvent alourdir la facture de 20 à 40 % :</p>

                <ul class="custom-list">
                    <li><strong>L'accessibilité :</strong> Si les camions-toupies ne peuvent approcher des fouilles, la location d'une pompe à béton avec bras articulé est obligatoire. Comptez entre 800 et 1 500 € par journée de pompage.</li>
                    <li><strong>L'évacuation des terres :</strong> Le volume de déblais peut être massif pour des fondations en gradins. Chaque mètre cube de terre évacuée représente un coût de transport et de mise en décharge.</li>
                    <li><strong>La sécurité :</strong> La mise en place de blindages provisoires pour éviter les éboulements durant les fouilles est une dépense critique et réglementaire pour la sécurité des ouvriers.</li>
                </ul>

                <h2 id="ux-outil">⚙️ Quelle fondation pour mon terrain en pente ?</h2>

                <div id="ux-tool" class="ux-tool-container">
                    <h3>Trouvez la solution adaptée à votre projet</h3>

                    <div id="step-1" class="ux-step active">
                        <div class="ux-question">1. Quelle est l'inclinaison approximative de votre terrain ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(1, 'douce')">Douce (moins de 10 %)</button>
                            <button class="ux-btn" onclick="saveAnswer(1, 'moderee')">Modérée (10 à 20 %)</button>
                            <button class="ux-btn" onclick="saveAnswer(1, 'forte')">Forte (plus de 20 %)</button>
                        </div>
                    </div>

                    <div id="step-2" class="ux-step">
                        <div class="ux-question">2. Quel type de construction envisagez-vous ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(2, 'bois')">Maison ossature bois / extension</button>
                            <button class="ux-btn" onclick="saveAnswer(2, 'maconnerie')">Construction maçonnerie / parpaing</button>
                        </div>
                    </div>

                    <div id="step-3" class="ux-step">
                        <div class="ux-question">3. Avez-vous réalisé ou prévu une étude de sol G2 ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(3, 'oui')">Oui, déjà réalisée</button>
                            <button class="ux-btn" onclick="saveAnswer(3, 'non')">Non, pas encore</button>
                        </div>
                    </div>

                    <div id="step-result" class="ux-step">
                        <div id="success-result" class="ux-result-box" style="display: none;">
                            <h4 style="margin-top:0; color:#16a085;">Solution recommandée pour votre projet</h4>
                            <p id="result-text"></p>
                        </div>
                        <div id="warning-result" class="ux-warning-box" style="display: none;">
                            <h4 style="margin-top:0; color:#c0392b;">Attention : étude de sol indispensable avant de commencer</h4>
                            <p id="warning-text">Sans étude géotechnique G2, votre projet sur terrain en pente est exposé à des risques majeurs de tassement différentiel et à un refus de couverture assurance. Faites réaliser cette étude en priorité — elle conditionne toutes les décisions techniques qui suivront.</p>
                            <a href="<?php echo BASE_URL; ?>contact" class="cta-btn">Demander un accompagnement</a>
                        </div>
                        <button class="reset-btn" onclick="resetTool()">Recommencer le test</button>
                    </div>
                </div>

                <h2 id="faq">FAQ, Questions fréquentes</h2>

                <h3>Peut-on construire les fondations sur la partie remblayée du terrain ?</h3>
                <p>Absolument pas. Le remblai n'offre aucune garantie de stabilité dans le temps. Les fondations doivent toujours descendre jusqu'au sol naturel "en place", même si cela nécessite de creuser plus profondément sur certains points. Un tassement différentiel sur remblai peut provoquer des fissurations structurelles irréparables dans les années suivant la construction.</p>

                <h3>Faut-il lier le mur de soutènement extérieur à la maison ?</h3>
                <p>Il est recommandé de désolidariser un mur de soutènement de jardin des fondations de l'habitation via un joint de dilatation. Cela permet aux deux structures de travailler indépendamment sans générer de fissures. Les poussées de terre exercées sur un mur de soutènement peuvent être considérables et ne doivent pas être transmises directement aux fondations de la maison.</p>

                <h3>Le risque sismique modifie-t-il les fondations en gradins ?</h3>
                <p>Oui. En zone sismique, le recouvrement des aciers entre deux gradins doit être plus important et le chaînage doit être parfaitement continu pour assurer la ductilité de l'ensemble du bâti. Les règles parasismiques EC8 imposent des dispositions spécifiques que seul un bureau d'études structure est habilité à dimensionner correctement.</p>

            </div>

            <div class="author-box-bottom">
                <div class="author-box-img">
                    <img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe">
                </div>
                <div class="author-box-content">
                    <h3>Philippe</h3>
                    <span class="author-role">Expert Rénovation &amp; Artisan RGE</span>
                    <p>Avec plus de 20 ans d'expérience sur les chantiers de gros œuvre et de maçonnerie, Philippe vous partage ses conseils concrets pour réussir vos fondations, même sur les terrains les plus complexes.</p>
                    <a href="<?php echo BASE_URL; ?>philippe" class="btn-outline">Voir son profil complet</a>
                </div>
            </div>

            <div class="conclusion-box">
                <h3>Votre terrain en pente mérite une analyse sérieuse</h3>
                <p>Chaque terrain incliné est unique. Avant de vous engager sur une solution technique, faites évaluer votre situation par un professionnel du gros œuvre pour éviter les mauvaises surprises.</p>
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

        if (userAnswers.step3 === 'non') {
            warningBox.style.display = 'block';
        } else if (userAnswers.step2 === 'bois') {
            successBox.style.display = 'block';
            resultText.innerHTML = "<strong>Solution recommandée : plots béton ou pieux vissés.</strong><br>Votre configuration (ossature bois) est parfaitement adaptée à une fondation sur plots. Cette solution limite le terrassement, protège l'ossature bois de l'humidité grâce au vide sanitaire ventilé, et est économiquement avantageuse sur les pentes importantes. Faites réaliser un plan d'implantation par un charpentier ou un bureau d'études.";
        } else {
            successBox.style.display = 'block';
            resultText.innerHTML = "<strong>Solution recommandée : fondations en gradins (redans).</strong><br>Pour une construction en maçonnerie, les semelles filantes en gradins sont la technique de référence. Respectez impérativement le ratio 2V/3H entre chaque palier et prévoyez un chaînage horizontal continu. Le mur amont devra être dimensionné comme un mur de soutènement avec drainage périphérique.";
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
        'question' => "Peut-on construire les fondations sur la partie remblayée du terrain ?",
        'answer'   => "Absolument pas. Le remblai n'offre aucune garantie de stabilité dans le temps. Les fondations doivent toujours descendre jusqu'au sol naturel en place, même si cela nécessite de creuser plus profondément sur certains points. Un tassement différentiel sur remblai peut provoquer des fissurations structurelles irréparables dans les années suivant la construction."
    ],
    [
        'question' => "Faut-il lier le mur de soutènement extérieur à la maison ?",
        'answer'   => "Il est recommandé de désolidariser un mur de soutènement de jardin des fondations de l'habitation via un joint de dilatation. Cela permet aux deux structures de travailler indépendamment sans générer de fissures. Les poussées de terre exercées sur un mur de soutènement peuvent être considérables et ne doivent pas être transmises directement aux fondations de la maison."
    ],
    [
        'question' => "Le risque sismique modifie-t-il les fondations en gradins ?",
        'answer'   => "Oui. En zone sismique, le recouvrement des aciers entre deux gradins doit être plus important et le chaînage doit être parfaitement continu pour assurer la ductilité de l'ensemble du bâti. Les règles parasismiques EC8 imposent des dispositions spécifiques que seul un bureau d'études structure est habilité à dimensionner correctement."
    ]
];

$_schema = get_schema_data(basename(__FILE__, '.php'));
if (!isset($_schema['faq']) || empty($_schema['faq'])) {
    $_schema['faq'] = $faq_schema;
}

echo generate_article_schema($article_meta, $_schema['faq'] ?? [], $_schema['howto'] ?? []);
echo generate_rating_widget();
?>
<?php include dirname(__DIR__) . '/footer.php'; ?>
