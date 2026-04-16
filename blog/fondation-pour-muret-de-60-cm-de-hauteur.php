<?php
// published: 2026-04-16 08:00

/**
 * fondation-pour-muret-de-60-cm-de-hauteur.php
 * Article : Fondation pour muret de 60 cm : Le guide ultime pour un ouvrage indestructible
 * Site : cemarenov.fr
 * Date : 2026-04-16
 */

$article_meta = [
    'title'        => 'Fondation pour muret de 60 cm : guide complet',
    'category'     => 'travaux',
    'slug'         => 'fondation-pour-muret-de-60-cm-de-hauteur',
    'image'        => 'https://www.cemarenov.fr/image/fondation-pour-muret-de-60-cm-de-hauteur-1.webp',
    'excerpt'      => 'Tout savoir sur la fondation pour muret de 60 cm : dimensions, ferraillage, mise hors-gel et étapes de coulage pour un ouvrage durable.',
    'date'         => '2026-04-16',
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
                <span>Fondation muret 60 cm</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Gros Œuvre</span>
                <span class="article-tag">Maçonnerie</span>
                <span class="article-tag">Fondations</span>
            </div>

            <h1>Fondation pour muret de 60 cm<br><span class="h1-accent">Le guide ultime pour un ouvrage indestructible</span></h1>

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
                On commet souvent l'erreur de penser qu'un muret de 60 cm peut se contenter d'une simple rigole de béton. Pourtant, cette dimension constitue une zone charnière en maçonnerie paysagère : elle subit des contraintes mécaniques invisibles mais redoutables. Ce guide vous donne toutes les clés pour réaliser une <span class="hashtag">#fondation</span> dans les règles de l'art — de l'analyse du sol au premier rang de parpaings.
            </p>

            <div class="article-content">

                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                        L'essentiel à retenir
                    </div>
                    <ul class="custom-list">
                        <li><strong>Semelle obligatoire :</strong> Même pour 60 cm, une fondation armée est indispensable — le sol travaille toujours.</li>
                        <li><strong>Hors-gel :</strong> La semelle doit descendre entre 50 et 80 cm selon votre région pour éviter le soulèvement par le gel.</li>
                        <li><strong>Sol argileux = vigilance :</strong> Vérifiez le risque RGA sur Géorisques avant de creuser.</li>
                        <li><strong>Ferraillage HA8/HA10 :</strong> L'acier Haute Adhérence est indispensable pour absorber les contraintes en traction.</li>
                        <li><strong>28 jours de cure :</strong> N'attendez pas moins avant de remblayer ou mettre en charge le muret.</li>
                        <li><strong>Terrain en pente :</strong> Utilisez la technique des redents, jamais une fondation inclinée.</li>
                    </ul>
                </div>

                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li><a href="#pourquoi-fondation">1. Pourquoi la fondation est critique à 60 cm</a></li>
                        <li><a href="#analyse-terrain">2. Analyse du terrain et cadre légal</a></li>
                        <li><a href="#dimensions">3. Quelles dimensions pour votre fondation ?</a></li>
                        <li><a href="#materiaux">4. Matériaux, outils et sécurité</a></li>
                        <li><a href="#etapes">5. Réaliser sa fondation étape par étape</a></li>
                        <li><a href="#facteurs-x">6. Gérer les facteurs X du chantier</a></li>
                        <li><a href="#ux-outil">⚙️ Outil : Calculez vos besoins en matériaux</a></li>
                        <li><a href="#sechage">7. Temps de séchage et finitions</a></li>
                        <li><a href="#faq">FAQ, Questions fréquentes</a></li>
                    </ul>
                </div>

                <h2 id="pourquoi-fondation">Pourquoi la fondation est-elle critique pour un muret de "seulement" 60 cm ?</h2>

                <p>L'utilité d'une fondation ne se limite pas à supporter le poids vertical des parpaings. Sa fonction première est d'ancrer l'ouvrage dans une couche de sol dont le volume ne varie pas. Un muret de 60 cm pèse environ <strong>150 kg par mètre linéaire</strong> — une charge modeste en apparence, mais qui devient critique dès que le terrain subit un cycle de gel ou une saturation hydrique.</p>

                <img src="<?php echo BASE_URL; ?>image/fondation-pour-muret-de-60-cm-de-hauteur-1.webp"
                     alt="Muret de 60 cm fissuré par insuffisance de fondation hors-gel"
                     loading="lazy"
                     style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <h3>La physique du muret : poids propre vs poussée latérale</h3>
                <p>Si votre muret délimite simplement un jardin, il subit principalement la prise au vent. En revanche, s'il sert de jardinière ou de soutènement léger, la terre humide exerce une <span class="hashtag">#pression-latérale</span> constante qui cherche à faire pivoter le mur sur sa base. La fondation doit agir comme un contrepoids, suffisamment large pour stabiliser cet effet de levier.</p>

                <h3>Les risques de fissures : basculement et déchaussement</h3>
                <p>Sans une base rigide, les micro-mouvements du terrain provoquent des tensions que le mortier — très rigide — ne peut compenser. Des fissures verticales se forment, souvent au niveau des angles. Sur le terrain, le déchaussement du premier rang de parpaings est la cause n°1 de sinistre lorsque la semelle a été coulée trop superficiellement.</p>

                <h3>La répartition des charges par la semelle filante</h3>
                <p>La semelle filante permet de répartir le poids du mur sur une surface de contact deux à trois fois plus grande. La pression exercée reste ainsi inférieure à la capacité de résistance du sol, ce qui évite le <strong>tassement différentiel</strong> — ce phénomène où une partie du muret s'enfonce plus vite que l'autre, brisant la ligne de niveau.</p>

                <h2 id="analyse-terrain">Analyse du terrain et cadre légal : l'indispensable avant-projet</h2>

                <p>Avant de creuser, une observation attentive du sol s'impose : un terrain rocheux ne se traite pas comme une poche d'argile.</p>

                <h3>Identifier votre type de sol : le risque RGA</h3>
                <p>Le risque de <span class="hashtag">#Retrait-Gonflement-des-Argiles</span> (RGA) est le fléau des maçonneries légères. Ce sol agit comme une éponge : il gonfle quand il pleut et se rétracte en été. Vous pouvez anticiper ce comportement en vérifiant la nature de votre parcelle sur le site officiel <a href="https://www.georisques.gouv.fr/mes-risques/retrait-gonflement-des-argiles" rel="nofollow" target="_blank">Géorisques</a>.</p>

                <img src="<?php echo BASE_URL; ?>image/fondation-pour-muret-de-60-cm-de-hauteur-3.webp"
                     alt="Comparaison sol argileux malléable risque RGA versus sol graveleux stable"
                     loading="lazy"
                     style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <h3>La règle d'or de la mise hors-gel</h3>
                <p>Le gel peut soulever des dalles de béton entières s'il parvient à geler l'eau située sous la fondation. La semelle doit descendre <strong>sous le niveau de pénétration du froid</strong>, soit entre 50 cm et 80 cm selon votre région. Descendre à cette profondeur assure que l'assise repose sur un sol à température constante, garantissant l'immobilité de l'ouvrage toute l'année.</p>

                <h3>PLU et Code de l'Urbanisme</h3>
                <p>L'<strong>Article R421-12</strong> du Code de l'urbanisme rappelle que le Plan Local d'Urbanisme (PLU) peut imposer une déclaration préalable même pour des clôtures de faible hauteur. Si vous êtes en limite de propriété, la gestion de la mitoyenneté impose souvent des contraintes sur le débord de la fondation chez le voisin.</p>

                <div class="guide-links-box">
                    <h3>Vos guides complémentaires sur la maçonnerie</h3>
                    <p>Pour aller plus loin dans votre projet, retrouvez nos guides pratiques sur les ouvrages associés.</p>
                    <div class="guide-links-grid">
                        <a href="<?php echo BASE_URL; ?>fondation-garage" class="guide-link-item">Fondation de garage</a>
                        <a href="<?php echo BASE_URL; ?>semelle-beton" class="guide-link-item">Semelle béton armée</a>
                        <a href="<?php echo BASE_URL; ?>parpaing-pose" class="guide-link-item">Poser des parpaings</a>
                    </div>
                </div>

                <h2 id="dimensions">Quelles dimensions pour votre fondation ?</h2>

                <img src="<?php echo BASE_URL; ?>image/fondation-pour-muret-de-60-cm-de-hauteur-2.webp"
                     alt="Schéma des cotes de fondation muret 60 cm : largeur de semelle égale à deux fois la largeur du mur"
                     loading="lazy"
                     style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Type de sol</th>
                                <th>Profondeur de fouille</th>
                                <th>Largeur de semelle</th>
                                <th>Dosage béton recommandé</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Sol stable / Roche</strong></td>
                                <td>30 – 40 cm</td>
                                <td>40 cm</td>
                                <td>300 kg/m³</td>
                            </tr>
                            <tr>
                                <td><strong>Sol argileux / Gélif</strong></td>
                                <td>60 – 100 cm</td>
                                <td>50 – 60 cm</td>
                                <td>350 kg/m³</td>
                            </tr>
                            <tr>
                                <td><strong>Sol humide / Limon</strong></td>
                                <td>50 – 60 cm</td>
                                <td>50 cm</td>
                                <td>350 kg/m³</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h2 id="materiaux">L'arsenal du maçon : matériaux, outils et sécurité</h2>

                <h3>Équipements de protection (EPI)</h3>
                <p>Le béton frais est très caustique (pH élevé). Un contact prolongé provoque des brûlures chimiques parfois indolores sur le moment, mais graves. Le port de <strong>gants en nitrile</strong> et de lunettes est obligatoire, surtout lors de l'utilisation d'une bétonnière où les projections sont fréquentes.</p>

                <h3>Le choix du ferraillage : armatures HA</h3>
                <p>Le béton seul ne résiste pas à la traction. Puisque le sol bouge, il faut armer la semelle avec des aciers <span class="hashtag">#Haute-Adhérence</span> (HA8 ou HA10). Sur le terrain, on privilégie les semelles symétriques (type S35) qui assurent une armature homogène sur toute la largeur de la tranchée.</p>

                <blockquote class="article-blockquote">
                    <p>"Sur un sol argileux, j'ajoute systématiquement 10 cm de profondeur supplémentaires par rapport aux préconisations standard — c'est un investissement de rien du tout qui évite des reprises en sous-œuvre coûteuses cinq ans plus tard."</p>
                </blockquote>

                <h2 id="etapes">Réaliser sa fondation étape par étape</h2>

                <h3>Étape 1 — Piquetage et traçage</h3>
                <p>Utilisez un cordeau bien tendu, mais tracez la largeur de la tranchée et non celle du mur. La semelle dépasse le nu du futur mur de chaque côté.</p>

                <h3>Étape 2 — Excavation</h3>
                <p>Creusez avec soin en gardant des parois verticales. Retirez impérativement les déblais de terre meuble au fond pour éviter tout affaissement futur.</p>

                <h3>Étape 3 — Ferraillage</h3>
                <p>L'acier ne doit jamais toucher la terre. Utilisez des cales pour surélever l'armature de 4 à 5 cm afin de garantir un enrobage parfait du béton.</p>

                <img src="<?php echo BASE_URL; ?>image/fondation-pour-muret-de-60-cm-de-hauteur-4.webp"
                     alt="Détail du calage de l'armature dans la tranchée pour garantir l'enrobage béton"
                     loading="lazy"
                     style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <h3>Étape 4 — Coulage et vibration</h3>
                <p>Versez le béton en une fois. "Piquez" le mélange avec une barre pour chasser les bulles d'air qui fragilisent la structure. Un béton mal vibré perd jusqu'à 20 % de sa résistance nominale.</p>

                <h3>Étape 5 — Premier rang hydrofuge</h3>
                <p>Après 48 h, posez le premier rang avec un <strong>mortier hydrofugé</strong> pour stopper les remontées capillaires qui accéléreraient la dégradation des parpaings.</p>

                <h2 id="facteurs-x">Expertise chantier : gérer les "Facteurs X"</h2>

                <h3>Muret en pente : la technique des redents</h3>
                <p>Si votre terrain est incliné, ne suivez jamais la pente avec votre béton. Créez des <strong>redents</strong> (marches d'escalier). Chaque palier doit être parfaitement horizontal pour que les parpaings reposent à plat, sans quoi le mur finirait par glisser.</p>

                <img src="<?php echo BASE_URL; ?>image/fondation-pour-muret-de-60-cm-de-hauteur-5.webp"
                     alt="Schéma technique de fondation en redents pour terrain en pente incliné"
                     loading="lazy"
                     style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <h3>Proximité des arbres : la barrière anti-racines</h3>
                <p>Si vous construisez près d'une haie, installez une <span class="hashtag">#barrière-anti-racines</span> en PEHD le long de votre fouille. Sans cette précaution, les racines soulèveront votre fondation en quelques années, rendant l'ouvrage irrécupérable.</p>

                <div style="background-color: var(--color-light); border-left: 4px solid var(--color-primary); padding: 1.5rem; margin-bottom: 2rem; border-radius: 0 8px 8px 0;">
                    <ul class="custom-list" style="margin: 0;">
                        <li><strong>Distance aux arbres :</strong> Respectez au minimum 1,5× la hauteur de l'arbre adulte entre le tronc et votre fondation.</li>
                        <li><strong>Terrain en remblai récent :</strong> Attendez au moins 1 an de tassement naturel avant de couler une semelle sur un remblai neuf.</li>
                        <li><strong>Nappe phréatique haute :</strong> Prévoir un drainage périphérique en gravier filtrant avant coulage.</li>
                    </ul>
                </div>

                <h2 id="ux-outil">⚙️ Calculez vos besoins en matériaux</h2>

                <div id="ux-tool" class="ux-tool-container">
                    <h3>Quel type de fondation pour votre projet ?</h3>

                    <div id="step-1" class="ux-step active">
                        <div class="ux-question">1. Quel est votre type de sol ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(1, 'stable')">Sol stable / rocheux</button>
                            <button class="ux-btn" onclick="saveAnswer(1, 'argileux')">Sol argileux / gélif</button>
                            <button class="ux-btn" onclick="saveAnswer(1, 'humide')">Sol humide / limon</button>
                        </div>
                    </div>

                    <div id="step-2" class="ux-step">
                        <div class="ux-question">2. Votre muret sert-il de soutènement (retient de la terre) ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(2, 'oui')">Oui, il retient de la terre</button>
                            <button class="ux-btn" onclick="saveAnswer(2, 'non')">Non, simple délimitation</button>
                        </div>
                    </div>

                    <div id="step-3" class="ux-step">
                        <div class="ux-question">3. Longueur approximative du muret ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(3, 'court')">Moins de 5 m</button>
                            <button class="ux-btn" onclick="saveAnswer(3, 'moyen')">5 à 15 m</button>
                            <button class="ux-btn" onclick="saveAnswer(3, 'long')">Plus de 15 m</button>
                        </div>
                    </div>

                    <div id="step-result" class="ux-step">
                        <div id="success-result" class="ux-result-box" style="display: none;">
                            <h4 style="margin-top:0; color:#16a085;">Votre configuration de fondation recommandée</h4>
                            <p id="result-text"></p>
                        </div>
                        <div id="warning-result" class="ux-warning-box" style="display: none;">
                            <h4 style="margin-top:0; color:#c0392b;">⚠️ Sol argileux avec soutènement : attention !</h4>
                            <p id="warning-text">Votre configuration cumule deux facteurs de risque élevés. Une semelle standard ne suffit pas : il est fortement conseillé de faire appel à un professionnel pour dimensionner correctement la fondation et prévoir un drainage adapté.</p>
                            <a href="<?php echo BASE_URL; ?>contact" class="cta-btn">Demander un avis gratuit</a>
                        </div>
                        <button class="reset-btn" onclick="resetTool()">Recommencer le test</button>
                    </div>
                </div>

                <h2 id="sechage">Temps de séchage et finitions</h2>

                <p>La patience est votre meilleure alliée. Le béton semble dur après 24 heures, mais sa résistance structurelle n'est pas encore acquise.</p>

                <ul class="custom-list">
                    <li><strong>48 heures :</strong> Pose possible du premier rang de parpaings.</li>
                    <li><strong>28 jours :</strong> Résistance nominale atteinte. Attendez ce délai avant de remblayer ou de mettre en charge le muret.</li>
                </ul>

                <h3>La cure du béton : arroser en été</h3>
                <p>Par forte chaleur, l'eau s'évapore trop vite, stoppant la réaction chimique de durcissement. Il faut "arroser" ses fondations ou les couvrir d'une <strong>bâche humide</strong> pendant les premiers jours pour garantir une prise homogène.</p>

                <h2 id="faq">FAQ, Questions fréquentes</h2>

                <h3>Peut-on poser des parpaings directement sur un sol dur ?</h3>
                <p>Non. Même un sol dur travaille en profondeur. Sans semelle armée, le muret se fissurera au moindre choc thermique ou variation d'humidité, souvent dès le deuxième hiver.</p>

                <h3>Faut-il un drain derrière un muret de 60 cm ?</h3>
                <p>Si le mur retient de la terre, oui. La pression hydrostatique d'un remblai saturé peut exercer une force supérieure au poids du mur lui-même. Un drain en gravier filtrant avec géotextile s'impose systématiquement.</p>

                <h3>Quelle différence entre béton de propreté et fondation ?</h3>
                <p>Le béton de propreté est une fine couche maigre (non armée, ~5 cm) coulée uniquement pour travailler au sec et au propre. La fondation, elle, est l'élément structurel ferraillé qui porte et ancre réellement l'ouvrage.</p>

                <h3>Puis-je réaliser cette fondation seul, sans expérience ?</h3>
                <p>Oui, pour un sol stable et un muret simple de délimitation. En revanche, dès que le sol est argileux, en pente ou que le muret fait fonction de soutènement, il est prudent de faire valider le dimensionnement par un professionnel avant de couler.</p>

            </div>

            <div class="author-box-bottom">
                <div class="author-box-img">
                    <img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe">
                </div>
                <div class="author-box-content">
                    <h3>Philippe</h3>
                    <span class="author-role">Expert Rénovation &amp; Artisan RGE</span>
                    <p>Avec plus de 20 ans d'expérience sur les chantiers de maçonnerie et de gros œuvre, Philippe vous partage ses conseils concrets et sans langue de bois pour réaliser des fondations durables et des ouvrages maçonnés dans les règles de l'art.</p>
                    <a href="<?php echo BASE_URL; ?>philippe" class="btn-outline">Voir son profil complet</a>
                </div>
            </div>

            <div class="conclusion-box">
                <h3>Votre projet de muret mérite une fondation solide</h3>
                <p>Un dimensionnement adapté à votre sol fait toute la différence sur 10 ou 20 ans. Si vous avez un doute sur la nature de votre terrain ou la faisabilité du chantier, nos experts peuvent vous orienter rapidement.</p>
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

        // ── Logique métier ────────────────────────────────────────────────
        if (userAnswers.step1 === 'argileux' && userAnswers.step2 === 'oui') {
            warningBox.style.display = 'block';
        } else if (userAnswers.step1 === 'stable') {
            successBox.style.display = 'block';
            resultText.innerHTML = "<strong>Fondation recommandée :</strong> Semelle de 40 cm de large, 30 à 40 cm de profondeur, béton dosé à 300 kg/m³, ferraillage HA8.<br><strong>Astuce :</strong> Sur sol rocheux, un béton de propreté de 5 cm suffit en préparation de fond de fouille.";
        } else {
            successBox.style.display = 'block';
            resultText.innerHTML = "<strong>Fondation recommandée :</strong> Semelle de 50 cm de large, 60 cm de profondeur minimum (hors-gel), béton dosé à 350 kg/m³, ferraillage HA10.<br><strong>Astuce :</strong> Prévoyez un drain en pied de fouille si le sol est humide ou retient de la terre.";
        }
        // ─────────────────────────────────────────────────────────────────
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
        'question' => "Peut-on poser des parpaings directement sur un sol dur ?",
        'answer'   => "Non. Même un sol dur travaille en profondeur. Sans semelle armée, le muret se fissurera au moindre choc thermique ou variation d'humidité, souvent dès le deuxième hiver."
    ],
    [
        'question' => "Faut-il un drain derrière un muret de 60 cm ?",
        'answer'   => "Si le mur retient de la terre, oui. La pression hydrostatique d'un remblai saturé peut exercer une force supérieure au poids du mur lui-même. Un drain en gravier filtrant avec géotextile s'impose systématiquement."
    ],
    [
        'question' => "Quelle différence entre béton de propreté et fondation ?",
        'answer'   => "Le béton de propreté est une fine couche maigre non armée d'environ 5 cm, coulée uniquement pour travailler au sec et au propre. La fondation est l'élément structurel ferraillé qui porte et ancre réellement l'ouvrage."
    ],
    [
        'question' => "Puis-je réaliser cette fondation seul, sans expérience ?",
        'answer'   => "Oui, pour un sol stable et un muret simple de délimitation. En revanche, dès que le sol est argileux, en pente ou que le muret fait fonction de soutènement, il est prudent de faire valider le dimensionnement par un professionnel avant de couler."
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
