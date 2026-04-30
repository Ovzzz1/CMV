<?php
// published: 2026-04-17 08:00
/**
 * distance-poteau-raidisseur-mur-parpaing.php
 * Article : Distance poteau raidisseur mur parpaing : Normes DTU, calculs et guide terrain
 * Site : cemarenov.fr
 * Date : 2026-04-17
 */

$article_meta = [
    'title'        => 'Distance poteau raidisseur mur parpaing : Normes DTU et guide terrain',
    'category'     => 'travaux',
    'slug'         => 'distance-poteau-raidisseur-mur-parpaing',
    'image'        => 'https://www.cemarenov.fr/image/distance-poteau-raidisseur-mur-parpaing1.webp',
    'excerpt'      => 'Quelle distance entre deux poteaux raidisseurs dans un mur en parpaing ? Normes DTU 20.1, tableau selon épaisseur et hauteur, calcul du nombre de poteaux et secrets de mise en œuvre.',
    'date'         => '2026-04-17',
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
                <span>Poteau raidisseur parpaing</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Maçonnerie</span>
                <span class="article-tag">Parpaing</span>
                <span class="article-tag">DTU</span>
                <span class="article-tag">Clôture</span>
            </div>

            <h1>Distance poteau raidisseur mur parpaing :<br><span class="h1-accent">Normes DTU, calculs et guide terrain</span></h1>

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
                Mal espacés, les poteaux raidisseurs ne servent à rien. Trop rapprochés, vous perdez du temps et de l'argent. La distance entre deux raidisseurs verticaux est l'une des questions les plus critiques d'un chantier de maçonnerie en parpaing — et pourtant, elle est souvent approximée. Voici ce que dit vraiment le DTU, comment calculer votre chantier et où placer chaque poteau sans erreur.
            </p>

            <div class="article-content">

                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                        L'essentiel à retenir
                    </div>
                    <ul class="custom-list">
                        <li><strong>Distance standard :</strong> Un poteau raidisseur tous les 3 à 4 mètres maximum selon la norme NF DTU 20.1.</li>
                        <li><strong>Ça dépend du parpaing :</strong> Un bloc de 15 cm exige des poteaux plus rapprochés (2,5 m dès 1,50 m de hauteur).</li>
                        <li><strong>Emplacements obligatoires :</strong> Angles, extrémités libres et de part et d'autre de chaque ouverture.</li>
                        <li><strong>Ferraillage :</strong> L'armature verticale doit toujours être liée aux fers d'attente de la semelle.</li>
                        <li><strong>Béton :</strong> Appliquer la règle du 1/2/3 (ciment/sable/gravillons) pour couler vos poteaux.</li>
                    </ul>
                </div>

                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li><a href="#role">1. Qu'est-ce qu'un poteau raidisseur et à quoi sert-il ?</a></li>
                        <li><a href="#distance">2. La distance standard entre deux poteaux</a></li>
                        <li><a href="#tableau">3. Tableau de référence selon hauteur et épaisseur</a></li>
                        <li><a href="#implantation">4. Où placer les raidisseurs : les points stratégiques</a></li>
                        <li><a href="#calcul">5. Combien de poteaux pour votre mur ?</a></li>
                        <li><a href="#ux-outil">⚙️ Outil : Calculez votre configuration de raidisseurs</a></li>
                        <li><a href="#ferraillage">6. Ferraillage et dosage du béton</a></li>
                        <li><a href="#faq">FAQ, Questions fréquentes</a></li>
                    </ul>
                </div>

                <h2 id="role">Qu'est-ce qu'un poteau raidisseur et à quoi sert-il vraiment ?</h2>
                <p>En maçonnerie, on confond souvent le simple montage des blocs avec l'intégrité structurelle de l'ouvrage. Un <strong>poteau raidisseur</strong> (ou chaînage vertical) est l'ossature en béton armé qui vient rigidifier votre mur de l'intérieur.</p>
                <p>Contrairement aux parpaings qui supportent très bien l'écrasement (<span class="hashtag">#compression</span>), ils sont très fragiles face aux pressions latérales (traction et flexion). Le rôle du raidisseur est simple : <strong>empêcher votre mur de se fissurer, de se tordre ou de basculer</strong> sous l'effet du vent, d'un choc ou de la poussée des terres. Il forme, avec le chaînage horizontal en haut du mur, un cadre rigide indispensable à la stabilité de l'ensemble, directement ancré dans votre fondation.</p>

                <p><em>Découvrez en vidéo le rôle crucial des raidisseurs dans la tenue de votre maçonnerie.</em></p>
                <div class="video-container">
                    <iframe src="https://www.youtube.com/embed/CFkNA8hMnlg"
                            title="Rôle des raidisseurs verticaux dans un mur en parpaing"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                </div>

                <h2 id="distance">L'essentiel : Quelle est la distance standard entre deux poteaux ?</h2>
                <p>Si vous cherchez la règle d'or pour un mur de clôture standard, la voici : <strong>vous devez implanter un poteau raidisseur tous les 3 à 4 mètres maximum</strong>.</p>
                <p>Cette distance de sécurité est dictée par la norme officielle <strong>NF DTU 20.1</strong> (Ouvrages en maçonnerie de petits éléments). Sur certains forums ou selon le guide CERIB, vous lirez parfois qu'il est possible d'espacer les poteaux jusqu'à 8 mètres. Attention : cette exception est <strong>uniquement tolérée après une étude structurelle complexe</strong> réalisée par un bureau d'études. Pour un particulier ou un artisan sécurisant son chantier, dépasser 4 mètres est un risque majeur de voir le mur se fissurer à la première tempête.</p>

                <img src="<?php echo BASE_URL; ?>image/distance-poteau-raidisseur-mur-parpaing2.webp"
                     alt="Schéma technique entraxe poteaux raidisseurs mur parpaing 3 à 4 mètres"
                     loading="lazy"
                     style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <h2 id="tableau">Tableau de référence : Distance selon la hauteur et l'épaisseur du parpaing</h2>
                <p>La règle des 4 mètres s'applique pour un mur classique. Cependant, l'épaisseur de vos blocs et la hauteur totale de votre ouvrage modifient sa prise au vent et sa résistance. Un parpaing de 15 cm offre beaucoup moins d'inertie qu'un bloc de 20 cm.</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Épaisseur du parpaing</th>
                                <th>Hauteur du mur</th>
                                <th>Distance max. entre poteaux</th>
                                <th>Remarques spécifiques</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Parpaing 15 cm</strong></td>
                                <td>Moins de 1,50 m</td>
                                <td>3 mètres</td>
                                <td>Prise au vent modérée.</td>
                            </tr>
                            <tr>
                                <td><strong>Parpaing 15 cm</strong></td>
                                <td>1,50 m à 1,80 m</td>
                                <td>2,5 mètres</td>
                                <td><strong>Hauteur critique</strong> pour du 15 cm.</td>
                            </tr>
                            <tr>
                                <td><strong>Parpaing 20 cm</strong></td>
                                <td>Moins de 1,50 m</td>
                                <td>4 mètres</td>
                                <td>Cas le plus standard et sécurisé.</td>
                            </tr>
                            <tr>
                                <td><strong>Parpaing 20 cm</strong></td>
                                <td>1,50 m à 2,00 m</td>
                                <td>3 à 3,5 mètres</td>
                                <td>Nécessite de solides fondations.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div style="background-color: var(--color-light); border-left: 4px solid var(--color-primary); padding: 1.5rem; margin-bottom: 2rem; border-radius: 0 8px 8px 0;">
                    <ul class="custom-list" style="margin: 0;">
                        <li><strong>Petit muret :</strong> Si vous concevez une <a href="<?php echo BASE_URL; ?>fondation-pour-muret-de-60-cm-de-hauteur">fondation pour un petit muret</a> (moins de 60 cm), les contraintes d'espacement sont plus souples.</li>
                        <li><strong>Rehaussement :</strong> Si votre projet implique de <a href="<?php echo BASE_URL; ?>rehausser-un-mur-en-parpaing-existant">rehausser un mur existant</a>, vérifiez impérativement que les raidisseurs d'origine peuvent être prolongés.</li>
                    </ul>
                </div>

                <h2 id="implantation">Où placer les raidisseurs ? La règle des points stratégiques</h2>
                <p>La distance ne fait pas tout. Pour que le squelette de votre mur soit aux normes, le DTU impose la présence de raidisseurs verticaux à des emplacements géométriques précis, <strong>qui remettent le compteur de distance à zéro</strong> :</p>
                <ul class="custom-list">
                    <li><strong>Aux angles :</strong> Chaque angle (rentrant ou sortant) doit comporter un raidisseur.</li>
                    <li><strong>Aux extrémités libres :</strong> Si votre mur s'arrête net, la dernière colonne de blocs doit être ferraillée.</li>
                    <li><strong>Aux ouvertures :</strong> Vous devez placer un poteau de part et d'autre d'un portillon ou d'un encadrement.</li>
                    <li><strong>Le cas du portail :</strong> Un pilier de portail indépendant n'est pas un raidisseur de mur. Laissez un joint de dilatation entre le mur de clôture et le pilier du portail pour éviter que les vibrations ne fendent la maçonnerie.</li>
                </ul>

                <img src="<?php echo BASE_URL; ?>image/distance-poteau-raidisseur-mur-parpaing3.webp"
                     alt="Plan d'implantation stratégique des poteaux raidisseurs sur un mur de clôture en parpaing"
                     loading="lazy"
                     style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <h2 id="calcul">Logistique chantier : Combien de poteaux pour votre mur ?</h2>
                <p>Pour commander vos blocs d'angle et vos armatures en acier, vous devez calculer le nombre exact de poteaux nécessaires. La formule de base est la suivante :</p>

                <blockquote class="article-blockquote">
                    <p>"(Longueur du mur ÷ Distance souhaitée entre poteaux) + 1 (pour l'extrémité finale) + Poteaux d'angles ou d'ouvertures."</p>
                </blockquote>

                <p><strong>Exemple concret :</strong> Vous construisez un mur droit de 20 mètres linéaires avec des parpaings de 20 cm. Vous choisissez un entraxe sécuritaire de 4 mètres. Calcul : (20 ÷ 4) + 1 = <strong>6 poteaux.</strong></p>

                <h2 id="ux-outil">⚙️ Calculez votre configuration de raidisseurs</h2>

                <div id="ux-tool" class="ux-tool-container">
                    <h3>Trouvez l'espacement idéal pour votre mur</h3>

                    <div id="step-1" class="ux-step active">
                        <div class="ux-question">1. Quelle épaisseur de parpaing utilisez-vous ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(1, '15cm')">Parpaing 15 cm</button>
                            <button class="ux-btn" onclick="saveAnswer(1, '20cm')">Parpaing 20 cm</button>
                        </div>
                    </div>

                    <div id="step-2" class="ux-step">
                        <div class="ux-question">2. Quelle sera la hauteur de votre mur ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(2, 'low')">Moins de 1,50 m</button>
                            <button class="ux-btn" onclick="saveAnswer(2, 'high')">1,50 m à 2,00 m</button>
                        </div>
                    </div>

                    <div id="step-3" class="ux-step">
                        <div class="ux-question">3. Votre zone est-elle exposée au vent (bord de mer, plaine ouverte) ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(3, 'no')">Non, zone abritée</button>
                            <button class="ux-btn" onclick="saveAnswer(3, 'yes')">Oui, zone exposée</button>
                        </div>
                    </div>

                    <div id="step-result" class="ux-step">
                        <div id="success-result" class="ux-result-box" style="display: none;">
                            <h4 style="margin-top:0; color:#16a085;">📐 Votre configuration recommandée :</h4>
                            <p id="result-text"></p>
                        </div>
                        <div id="warning-result" class="ux-warning-box" style="display: none;">
                            <h4 style="margin-top:0; color:#c0392b;">⚠️ Configuration critique</h4>
                            <p id="warning-text"></p>
                            <a href="<?php echo BASE_URL; ?>contact" class="cta-btn">Demander un avis professionnel</a>
                        </div>
                        <button class="reset-btn" onclick="resetTool()">Recommencer le test</button>
                    </div>
                </div>

                <h2 id="ferraillage">Les secrets de mise en œuvre : Ferraillage et dosage du béton</h2>
                <p>L'armature verticale (généralement un chaînage carré de 4 fers HA10) doit obligatoirement <strong>être liée aux fers d'attente</strong> laissés lors du coulage de la semelle. En haut du mur, ces fers verticaux viendront se ligaturer à l'armature horizontale. C'est pourquoi <a href="<?php echo BASE_URL; ?>chainage-horizontal-mur-parpaing">réaliser le chaînage horizontal du mur</a> est une étape indissociable de la pose de vos poteaux.</p>

                <img src="<?php echo BASE_URL; ?>image/distance-poteau-raidisseur-mur-parpaing4.webp"
                     alt="Coupe technique de la liaison entre fers d'attente de fondation et raidisseur vertical en parpaing"
                     loading="lazy"
                     style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <div style="background-color: var(--color-light); border-left: 4px solid var(--color-primary); padding: 1.5rem; margin-bottom: 2rem; border-radius: 0 8px 8px 0;">
                    <ul class="custom-list" style="margin: 0;">
                        <li><strong>Le Mémo du Maçon — Règle du 1/2/3 :</strong> 1 seau de ciment, 2 seaux de sable, 3 seaux de gravillons et environ ½ seau d'eau claire. Ce principe s'applique également pour le <a href="<?php echo BASE_URL; ?>dosage-beton-fondation">dosage parfait de vos fondations</a>.</li>
                    </ul>
                </div>

                <h2 id="faq">FAQ, Questions fréquentes</h2>

                <h3>Qu'est-ce qu'un poteau raidisseur ?</h3>
                <p>C'est la colonne vertébrale verticale de votre mur. Coulé à l'intérieur de parpaings d'angle empilés, ce poteau en béton armé empêche le mur de s'effondrer sous la pression latérale.</p>

                <h3>Quelle distance de dégagement prévoir entre un mur et un pilier de portail ?</h3>
                <p>Il faut désolidariser le mur du pilier supportant le portail. Laissez un espace de 2 à 4 cm, souvent comblé par un joint de dilatation pour éviter que les vibrations ne fendent la maçonnerie.</p>

                <h3>Peut-on couler les poteaux en même temps que la fondation ?</h3>
                <p>Non. La fondation se coule en premier avec des fers d'attente. Vous monterez ensuite vos parpaings et coulerez le béton du poteau une fois l'armature verticalement installée.</p>

                <h3>Quelles finitions choisir une fois les poteaux coulés ?</h3>
                <p>Une fois la structure stabilisée, deux grandes options s'offrent à vous. L'enduit est la finition classique — notre guide sur le <a href="https://www.cemarenov.fr/dosage-enduit-ciment-chaux-parpaing">dosage enduit ciment chaux parpaing</a> détaille les proportions à respecter selon le support. Le <a href="https://www.cemarenov.fr/bardage-bois-sur-mur-parpaing">bardage bois sur parpaing</a> est l'alternative ventilée, idéale si vous souhaitez éviter l'enduit tout en protégeant le béton. Dans les deux cas, vérifiez l'état du mur avant d'appliquer quoi que ce soit — un parpaing humide exige d'abord un traitement d'<a href="https://www.cemarenov.fr/etancheite-mur-parpaing-interieur">étanchéité intérieure</a>.</p>

                <h3>Les raidisseurs peuvent-ils supporter une charpente directement ?</h3>
                <p>Oui, à condition que les poteaux soient correctement dimensionnés et que les ancrages (platines ou tiges filetées) aient été intégrés dans le béton frais. Notre article sur la <a href="https://www.cemarenov.fr/charpente-1-pan-sur-parpaing">charpente 1 pan sur parpaing</a> détaille comment ancrer une charpente monopente sur des murs en blocs — les contraintes de liaison poteaux/fermes y sont couvertes en détail.</p>

            </div>

            <div class="author-box-bottom">
                <div class="author-box-img">
                    <img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe">
                </div>
                <div class="author-box-content">
                    <h3>Philippe</h3>
                    <span class="author-role">Expert Rénovation &amp; Artisan RGE</span>
                    <p>Avec plus de 20 ans d'expérience sur les chantiers, Philippe vous partage ses conseils concrets et sans langue de bois pour tous vos projets de maçonnerie, de clôture et de gros œuvre.</p>
                    <a href="<?php echo BASE_URL; ?>philippe" class="btn-outline">Voir son profil complet</a>
                </div>
            </div>

            <div class="conclusion-box">
                <h3>Un doute sur la structure de votre mur en parpaing ?</h3>
                <p>Un raidisseur mal positionné ou sous-dimensionné peut conduire à des fissures coûteuses dès la première tempête. Faites valider votre projet par un professionnel avant de couler vos poteaux.</p>
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
        const warningText = document.getElementById('warning-text');

        successBox.style.display = 'none';
        warningBox.style.display = 'none';

        // ── Logique métier ──────────────────────────────────────────────────
        if (userAnswers.step1 === '15cm' && userAnswers.step2 === 'high') {
            warningBox.style.display = 'block';
            warningText.innerHTML = "Parpaing 15 cm + hauteur supérieure à 1,50 m : c'est la configuration la plus fragile. L'espacement maximum tombe à <strong>2,5 mètres</strong>. En zone exposée au vent, descendez à 2 mètres et faites valider votre projet par un professionnel.";
        } else if (userAnswers.step1 === '15cm' && userAnswers.step2 === 'low' && userAnswers.step3 === 'yes') {
            successBox.style.display = 'block';
            resultText.innerHTML = "<strong>Espacement recommandé : 2,5 mètres.</strong> Parpaing 15 cm en zone exposée : même sous 1,50 m de hauteur, réduisez l'entraxe pour compenser la prise au vent. Assurez-vous que vos fondations sont bien dimensionnées.";
        } else if (userAnswers.step1 === '20cm' && userAnswers.step2 === 'high' && userAnswers.step3 === 'yes') {
            successBox.style.display = 'block';
            resultText.innerHTML = "<strong>Espacement recommandé : 3 mètres.</strong> Parpaing 20 cm en hauteur et en zone exposée : restez à 3 mètres maximum. Veillez à des fondations solides (semelle filante d'au moins 40 cm de large) et à un chaînage horizontal soigné en couronnement.";
        } else if (userAnswers.step1 === '20cm') {
            successBox.style.display = 'block';
            resultText.innerHTML = "<strong>Espacement recommandé : 4 mètres.</strong> C'est la configuration optimale et la plus courante sur chantier. Un poteau tous les 4 mètres avec des parpaings de 20 cm en zone abritée offre un rapport sécurité/coût excellent. N'oubliez pas les poteaux aux angles et de part et d'autre de chaque ouverture.";
        } else {
            successBox.style.display = 'block';
            resultText.innerHTML = "<strong>Espacement recommandé : 3 mètres.</strong> Pour ce type de configuration, restez prudent et adoptez un entraxe de 3 mètres. Vérifiez également la présence de fers d'attente dans votre semelle avant de monter vos parpaings.";
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
        'question' => "Qu'est-ce qu'un poteau raidisseur ?",
        'answer'   => "C'est la colonne vertébrale verticale de votre mur. Coulé à l'intérieur de parpaings d'angle empilés, ce poteau en béton armé empêche le mur de s'effondrer sous la pression latérale."
    ],
    [
        'question' => "Quelle distance de dégagement prévoir entre un mur et un pilier de portail ?",
        'answer'   => "Il faut désolidariser le mur du pilier supportant le portail. Laissez un espace de 2 à 4 cm, souvent comblé par un joint de dilatation pour éviter que les vibrations ne fendent la maçonnerie."
    ],
    [
        'question' => "Peut-on couler les poteaux en même temps que la fondation ?",
        'answer'   => "Non. La fondation se coule en premier avec des fers d'attente. Vous monterez ensuite vos parpaings et coulerez le béton du poteau une fois l'armature verticalement installée."
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
