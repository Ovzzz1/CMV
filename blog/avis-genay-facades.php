<?php
// published: 2026-04-24 08:00
/**
 * avis-genay-facades.php
 * Article : Avis sur Genay Façades : Faut-il leur confier votre ravalement et votre isolation ?
 * Site : cemarenov.fr
 * Date : 2026-04-24
 */

$article_meta = [
    'title'        => 'Avis sur Genay Façades : ravalement et isolation à Genay (69)',
    'category'     => 'travaux',
    'slug'         => 'avis-genay-facades',
    'image'        => 'https://www.cemarenov.fr/image/avis-sur-genay-facades1.webp',
    'excerpt'      => 'Analyse complète de Genay Façades (69730) : données légales SIRET, avis clients terrain, qualité ITE et connaissance du PLU Val de Saône. Notre verdict avant de signer le devis.',
    'date'         => '2026-04-24',
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
                <span>Avis Genay Façades</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Avis</span>
                <span class="article-tag">Ravalement</span>
                <span class="article-tag">Genay (69)</span>
                <span class="article-tag">ITE</span>
            </div>

            <h1>Avis sur Genay Façades :<br><span class="h1-accent">Faut-il leur confier votre ravalement et votre isolation ?</span></h1>

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
                Vous avez un devis de <strong>Genay Façades</strong> sur la table pour refaire votre crépi ou isoler vos murs, et vous cherchez des avis avant de verser l'acompte ? C'est le bon réflexe. Dans le bâtiment, confier un <strong>ravalement de façade</strong> sans vérifications préalables peut vite tourner au cauchemar financier. On ne va pas se contenter de compter les étoiles Google — on décortique ici ce que vaut techniquement cette entreprise implantée à <strong>Genay (69730)</strong>.
            </p>

            <div class="article-content">

                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                        L'essentiel à retenir
                    </div>
                    <ul class="custom-list">
                        <li><strong>Code NAF 4399C :</strong> "Maçonnerie générale et gros œuvre" — une expertise structurelle, pas seulement cosmétique.</li>
                        <li><strong>SIRET actif :</strong> Structure établie, capital social validé — condition indispensable pour une assurance décennale valable.</li>
                        <li><strong>Ancrage local :</strong> Connaissance du PLU Genay et de la Charte QCV (CAUE Rhône Métropole) — un atout majeur pour votre déclaration préalable.</li>
                        <li><strong>ITE :</strong> Exigez la certification RGE pour bénéficier de MaPrimeRénov' et vérifiez le traitement des ponts thermiques dans le devis.</li>
                        <li><strong>3 points à vérifier dans le devis :</strong> Nettoyage/préparation détaillé, échafaudage inclus, évacuation des gravats prévue.</li>
                    </ul>
                </div>

                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li><a href="#donnees-legales">1. Ce que disent les données légales (SIRET et NAF)</a></li>
                        <li><a href="#avis-clients">2. Ce que disent vraiment les avis clients</a></li>
                        <li><a href="#ite">3. ITE : ne prenez pas de risques</a></li>
                        <li><a href="#urbanisme">4. Urbanisme : leur ancrage local, un atout majeur</a></li>
                        <li><a href="#analyse-devis">5. Analyse de devis : 3 points à vérifier avant de signer</a></li>
                        <li><a href="#ux-outil">⚙️ Outil : Évaluez votre devis de ravalement</a></li>
                        <li><a href="#faq">FAQ, Questions fréquentes</a></li>
                    </ul>
                </div>

                <img src="<?php echo BASE_URL; ?>image/avis-sur-genay-facades1.webp"
                     alt="Maison individuelle à Genay (69) avec façade rénovée en enduit minéral ocre clair, échafaudage en cours de démontage"
                     loading="lazy"
                     style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <h2 id="donnees-legales">Genay Façades (69) : Ce que disent les données légales (SIRET et NAF)</h2>

                <p>Avant même de regarder la qualité de l'enduit, assurez-vous que la boîte ne va pas couler pendant les travaux. Genay Façades est enregistrée sous le code NAF <strong>4399C</strong>. Concrètement, ça correspond aux "Travaux de maçonnerie générale et gros œuvre" — une compétence structurelle pour réparer un mur, pas juste passer un coup de peinture dessus.</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Indicateur de fiabilité</th>
                                <th>Données constatées</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Localisation</strong></td>
                                <td>Genay (69) — Proximité immédiate Val de Saône</td>
                            </tr>
                            <tr>
                                <td><strong>Spécialisation</strong></td>
                                <td>Maçonnerie &amp; Ravalement de façade</td>
                            </tr>
                            <tr>
                                <td><strong>Code NAF</strong></td>
                                <td>4399C (Expertise structurelle)</td>
                            </tr>
                            <tr>
                                <td><strong>Santé financière</strong></td>
                                <td>Structure établie, capital social validé</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <p>Sur les registres légaux, l'entreprise affiche un SIRET actif et un capital social établi — condition indispensable pour que leur assurance décennale (qui vous couvre pendant 10 ans contre les malfaçons) soit valable. Un artisan local interviendra aussi toujours plus vite qu'une grande plateforme qui sous-traite à des kilomètres en cas de pépin après le chantier.</p>

                <h2 id="avis-clients">Ce que disent vraiment les avis clients sur leurs chantiers</h2>

                <p>Quand on épluche les retours des propriétaires, un point fort ressort systématiquement : la propreté du chantier. Ça a l'air d'un détail, mais un façadier qui ne bâche pas correctement vos menuiseries ou vos appuis de fenêtre, c'est des heures de grattage pour vous à la fin.</p>

                <p>La vraie qualité d'un façadier se juge sur la préparation du support. Appliquer un enduit neuf sur un mur qui s'effrite, ça tient deux ans maximum. Les avis sur Genay Façades soulignent une bonne préparation technique — ils savent adapter le <a href="<?php echo BASE_URL; ?>dosage-enduit-ciment-chaux-parpaing">dosage enduit ciment chaux sur parpaing</a> pour que le support accroche et respire correctement.</p>

                <ul class="custom-list">
                    <li><strong>Finitions :</strong> Belles arêtes sur les angles et retours de fenêtres propres — signe d'un maçon soigneux.</li>
                    <li><strong>Délais :</strong> Calendrier généralement respecté, sous réserve de la météo (un enduit ne se pose pas sous la pluie ou le gel).</li>
                    <li><strong>Chantier :</strong> Protections sérieuses des sols et des ouvertures signalées par plusieurs clients.</li>
                </ul>

                <h2 id="ite">Isolation Thermique par l'Extérieur (ITE) : Ne prenez pas de risques</h2>

                <p>Aujourd'hui, si vous refaites votre façade, on va forcément vous parler d'<strong>ITE</strong>. Genay Façades propose cette prestation, et c'est une excellente chose de mutualiser l'échafaudage pour faire les deux. Mais l'ITE, c'est de l'horlogerie — une erreur de pose coûte très cher à corriger.</p>

                <blockquote class="article-blockquote">
                    <p>"J'ai récupéré un chantier en cours de route l'année dernière : un client avait fait appel à une entreprise 'low cost' pour une ITE. Les chevilles de fixation de l'isolant n'avaient pas été posées correctement pour traiter les ponts thermiques. Résultat : des condensations à l'intérieur deux hivers plus tard, et des traces de moisissures en bas des murs. Le prix de la réparation a coûté le double du chantier initial."</p>
                </blockquote>

                <img src="<?php echo BASE_URL; ?>image/avis-sur-genay-facades2.webp"
                     alt="Mur extérieur en cours d'isolation thermique ITE : panneaux isolants chevillés, sous-enduit et trame de fibre de verre"
                     loading="lazy"
                     style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <p>Si vous leur confiez l'<a href="<?php echo BASE_URL; ?>isolation-des-murs">isolation de vos murs</a>, exigez de voir leur <strong>certification RGE</strong> (Reconnu Garant de l'Environnement). C'est la preuve qu'ils maîtrisent les normes actuelles, et c'est obligatoire pour accéder aux aides de l'État comme MaPrimeRénov'.</p>

                <h2 id="urbanisme">Urbanisme : Pourquoi leur ancrage à Genay est un atout majeur</h2>

                <p>La ville de Genay applique une charte d'urbanisme très stricte, la <strong>Charte QCV (Qualité du Cadre de Vie)</strong>, pilotée par le CAUE Rhône Métropole. En clair : vous ne pouvez pas crépir votre maison de la couleur que vous voulez.</p>

                <p>L'avantage de prendre une entreprise comme Genay Façades, c'est qu'ils connaissent le <a href="<?php echo BASE_URL; ?>vocabulaire-architecture-facade">vocabulaire de l'architecture de façade</a> exigé par la mairie et savent exactement quel nuancier de couleurs et quel type d'<a href="<?php echo BASE_URL; ?>enduit-facade">enduit de façade</a> (gratté, taloché, finition pierre) passeront sans problème lors de votre Déclaration Préalable de travaux. Un artisan extérieur au Val de Saône pourrait vous faire valider une teinte qui sera refusée par l'urbanisme.</p>

                <img src="<?php echo BASE_URL; ?>image/avis-sur-genay-facades3.webp"
                     alt="Nuancier professionnel de teintes d'enduits minéraux approuvé par le CAUE pour la zone de Genay, tons naturels sable et ocre"
                     loading="lazy"
                     style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <h2 id="analyse-devis">Analyse de devis : 3 points à vérifier avant de signer</h2>

                <p>Le prix global est une chose, mais le détail des prestations en est une autre. Ne signez rien si ces trois lignes n'apparaissent pas clairement dans le devis :</p>

                <ol style="margin-bottom: 20px; padding-left: 20px;">
                    <li><strong>Le nettoyage et la préparation :</strong> S'ils doivent décaper un vieux revêtement, cela doit être chiffré séparément. Un simple <a href="<?php echo BASE_URL; ?>nettoyage-demoussage-facade">nettoyage haute pression et démoussage</a> doit être détaillé en prestation.</li>
                    <li><strong>L'échafaudage :</strong> Son montage, son démontage et sa location doivent être inclus dans le prix. S'il n'y a rien d'écrit, vous risquez une facturation surprise à la fin.</li>
                    <li><strong>L'évacuation des gravats :</strong> Un chantier génère des déchets. Assurez-vous que l'évacuation en déchetterie est bien comprise dans le devis.</li>
                </ol>

                <h2 id="ux-outil">⚙️ Évaluez la qualité de votre devis de ravalement</h2>

                <div id="ux-tool" class="ux-tool-container">
                    <h3>Votre devis de façade est-il complet ?</h3>

                    <div id="step-1" class="ux-step active">
                        <div class="ux-question">1. Le devis mentionne-t-il explicitement le nettoyage et la préparation du support ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(1, 'oui')">Oui, c'est détaillé</button>
                            <button class="ux-btn" onclick="saveAnswer(1, 'non')">Non ou vague</button>
                        </div>
                    </div>

                    <div id="step-2" class="ux-step">
                        <div class="ux-question">2. L'échafaudage (montage + location + démontage) est-il inclus dans le prix ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(2, 'oui')">Oui, clairement mentionné</button>
                            <button class="ux-btn" onclick="saveAnswer(2, 'non')">Non ou pas précisé</button>
                        </div>
                    </div>

                    <div id="step-3" class="ux-step">
                        <div class="ux-question">3. L'entreprise possède-t-elle une certification RGE (si vous demandez une ITE) ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(3, 'oui')">Oui, certification RGE confirmée</button>
                            <button class="ux-btn" onclick="saveAnswer(3, 'non')">Non ou inconnu</button>
                            <button class="ux-btn" onclick="saveAnswer(3, 'pas-ite')">Je ne fais pas d'ITE</button>
                        </div>
                    </div>

                    <div id="step-result" class="ux-step">
                        <div id="success-result" class="ux-result-box" style="display: none;">
                            <h4 style="margin-top:0; color:#16a085;">Évaluation de votre devis :</h4>
                            <p id="result-text"></p>
                        </div>
                        <div id="warning-result" class="ux-warning-box" style="display: none;">
                            <h4 style="margin-top:0; color:#c0392b;">Devis incomplet — Ne signez pas encore</h4>
                            <p id="warning-text">Votre devis présente des lacunes importantes. Demandez une version détaillée avec les 3 postes obligatoires avant de verser tout acompte. Un façadier sérieux n'hésitera pas à compléter son devis sur demande.</p>
                            <a href="<?php echo BASE_URL; ?>contact" class="cta-btn">Demander une contre-expertise gratuite</a>
                        </div>
                        <button class="reset-btn" onclick="resetTool()">Recommencer le test</button>
                    </div>
                </div>

                <h2 id="faq">FAQ, Questions fréquentes</h2>

                <h3>Dois-je faire nettoyer ma toiture avant la façade ?</h3>
                <p>Absolument. Si vos tuiles sont pleines de mousse, la première grosse pluie fera couler des traînées verdâtres sur votre enduit tout neuf. Prévoyez un démoussage de vos tuiles en terre cuite avant que le façadier ne monte son échafaudage — c'est beaucoup moins coûteux de le faire en même temps que la mise en place du matériel.</p>

                <h3>Est-ce que refaire la façade règle les problèmes d'humidité intérieure ?</h3>
                <p>Pas toujours. Si l'eau s'infiltre par des fissures extérieures, oui, le ravalement fera le job. Mais si l'humidité vient du sol (remontées capillaires dans un sous-sol par exemple), refaire l'extérieur ne suffira pas. Il faudra envisager une <a href="<?php echo BASE_URL; ?>etancheite-mur-parpaing-interieur">étanchéité mur parpaing par l'intérieur</a> pour bloquer la pression de l'eau.</p>

                <h3>Font-ils des devis gratuits ?</h3>
                <p>Oui, c'est la norme dans le bâtiment pour ce type de gros travaux. Un façadier sérieux se déplacera toujours pour sonder vos murs avant de vous donner un prix au m². Méfiez-vous des devis réalisés à distance sur simple photo — la préparation du support est impossible à évaluer sans visite terrain.</p>

            </div>

            <div class="author-box-bottom">
                <div class="author-box-img">
                    <img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe">
                </div>
                <div class="author-box-content">
                    <h3>Philippe</h3>
                    <span class="author-role">Expert Rénovation &amp; Artisan RGE</span>
                    <p>Fort de plus de 20 ans d'expérience sur les chantiers de ravalement et d'ITE, Philippe sait exactement quels points vérifier dans un devis de façadier et quelles questions poser pour éviter les mauvaises surprises après signature.</p>
                    <a href="<?php echo BASE_URL; ?>philippe" class="btn-outline">Voir son profil complet</a>
                </div>
            </div>

            <div class="conclusion-box">
                <h3>Besoin d'un second avis avant de signer votre devis de ravalement ?</h3>
                <p>Une contre-expertise par un artisan RGE indépendant vous permet de valider les prix, les techniques proposées et la conformité aux règles du PLU local — avant tout engagement financier.</p>
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

        if (userAnswers.step1 === 'non' || userAnswers.step2 === 'non') {
            warningBox.style.display = 'block';
        } else if (userAnswers.step3 === 'non') {
            successBox.style.display = 'block';
            resultText.innerHTML = "<strong>Devis façade OK, mais attention pour l'ITE :</strong> La préparation et l'échafaudage sont bien inclus. Cependant, sans certification RGE confirmée, vous ne pourrez pas accéder aux aides de l'État (MaPrimeRénov'). Demandez-leur de vous fournir le certificat RGE en cours de validité avant de signer le devis ITE.";
        } else {
            successBox.style.display = 'block';
            resultText.innerHTML = "<strong>Devis complet et conforme :</strong> Votre devis intègre les 3 postes essentiels. Vérifiez encore : les garanties décennale et dommages-ouvrage, la date de début de chantier, les conditions de paiement (l'acompte ne doit pas dépasser 30 % pour les particuliers) et la teinte validée par la mairie si nécessaire.";
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
        'question' => "Dois-je faire nettoyer ma toiture avant de confier ma façade à Genay Façades ?",
        'answer'   => "Absolument. Si vos tuiles sont pleines de mousse, la première grosse pluie fera couler des traînées verdâtres sur votre enduit tout neuf. Prévoyez un démoussage des tuiles avant que le façadier monte son échafaudage — c'est beaucoup moins coûteux en même temps."
    ],
    [
        'question' => "Est-ce que refaire la façade règle les problèmes d'humidité intérieure ?",
        'answer'   => "Pas toujours. Si l'eau s'infiltre par des fissures extérieures, oui. Mais si l'humidité vient du sol (remontées capillaires en sous-sol), refaire l'extérieur ne suffit pas. Une étanchéité intérieure par cuvelage sera nécessaire en complément."
    ],
    [
        'question' => "Genay Façades fait-il des devis gratuits ?",
        'answer'   => "Oui, c'est la norme dans le bâtiment pour les gros travaux de façade. Un façadier sérieux se déplace toujours pour sonder les murs avant de donner un prix au m². Méfiez-vous des devis réalisés à distance sur simple photo."
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
