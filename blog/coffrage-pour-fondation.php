<?php
// published: 2026-04-09 08:00
/**
 * coffrage-pour-fondation.php
 * Article : Coffrage pour fondation : Faut-il en faire un et comment réussir son coulage ?
 * Site : Expert Renov' (cemarenov.fr)
 * Date : 2026-04-09
 */

$article_meta = [
    'title'        => 'Coffrage pour fondation : guide complet pour réussir son coulage',
    'category'     => 'travaux',
    'slug'         => 'coffrage-pour-fondation',
    'image'        => 'https://www.cemarenov.fr/image/coffrage-pour-fondation-1.webp',
    'excerpt'      => 'Coffrage bois, coffrage perdu Fundeco, coulage en pleine terre : tout ce qu\'il faut savoir pour réaliser un coffrage de fondation solide et éviter les erreurs classiques sur chantier.',
    'date'         => '2026-04-09',
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
                <span>Coffrage pour fondation</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Gros Œuvre</span>
                <span class="article-tag">Maçonnerie</span>
                <span class="article-tag">Fondations</span>
                <span class="article-tag">Béton</span>
            </div>

            <h1>Coffrage pour fondation<br><span class="h1-accent">Faut-il en faire un et comment réussir son coulage ?</span></h1>

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
                Réaliser un <strong>coffrage pour fondation</strong> est une étape charnière du gros œuvre qui conditionne la pérennité de tout ouvrage, qu'il s'agisse d'une maison individuelle, d'une extension ou d'un simple muret. Entre le choix du bois de coffrage, l'utilisation de plaques de coffrage perdu type Fundeco et les contraintes de pression du béton, le maçon doit arbitrer entre rapidité d'exécution et coût des matériaux. Voici notre guide d'expert pour sécuriser votre chantier et optimiser votre consommation de béton.
            </p>

            <div class="article-content">

                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                        L'essentiel à retenir
                    </div>
                    <ul class="custom-list">
                        <li><strong>Pleine terre possible :</strong> Sur un sol compact et stable avec des parois nettes, le coffrage n'est pas toujours obligatoire.</li>
                        <li><strong>Coffrage vital :</strong> Sol friable, sableux, remblai récent ou terrain en pente, le coffrage devient indispensable pour contenir le béton.</li>
                        <li><strong>Bannissez l'OSB :</strong> Sous l'humidité du béton, l'OSB gonfle et explose. Utilisez uniquement du sapin ou du contreplaqué filmé.</li>
                        <li><strong>Coffrage perdu = gain de temps :</strong> Les plaques polypropylène se laissent en terre, évitant le décoffrage et offrant une barrière anti-humidité.</li>
                        <li><strong>Aiguille vibrante obligatoire :</strong> Vibrer le béton élimine les bulles d'air et garantit l'enrobage parfait des armatures.</li>
                        <li><strong>Calage renforcé :</strong> Ancrez profondément vos piquets, la pression du béton frais est plus forte qu'on ne le croit.</li>
                    </ul>
                </div>

                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li><a href="#fondations">1. Faut-il obligatoirement coffrer ses fondations ?</a></li>
                        <li><a href="#materiaux">2. Bois vs coffrage perdu : bien choisir son matériel</a></li>
                        <li><a href="#types">3. Les différents types de coffrages selon votre projet</a></li>
                        <li><a href="#ux-outil">⚙️ Outil : Quel coffrage pour votre chantier ?</a></li>
                        <li><a href="#coulage">4. Guide pas à pas : réussir son coulage sans encombre</a></li>
                        <li><a href="#logistique">5. Livraison et logistique sur chantier</a></li>
                        <li><a href="#faq">FAQ, Questions fréquentes</a></li>
                    </ul>
                </div>

                <h2 id="fondations">Faut-il obligatoirement coffrer ses fondations ? L'analyse terrain</h2>

                <p>C'est la question qui revient sur tous les chantiers : peut-on se passer de planches ? La réponse dépend exclusivement de la nature de votre fouille et de la stabilité de votre terrain.</p>

                <ul class="custom-list">
                    <li><strong>Le coulage en pleine terre :</strong> Si vous creusez une rigole dans un sol compact et très stable, et que vos parois sont nettes, le coffrage est souvent superflu. On coule directement le béton dans la tranchée. C'est la solution la plus économique en temps et en matériel. Cependant, pour des structures spécifiques nécessitant une descente de charge localisée, la <a href="<?php echo BASE_URL; ?>fondation-puits">fondation en puits</a> peut s'avérer plus adaptée que la simple semelle filante.</li>
                    <li><strong>Les cas où le coffrage est vital :</strong> Dès que le sol est friable (sable, remblai récent), le risque d'éboulement pendant le coulage est réel. De même, si votre terrain présente une pente, vous devrez réaliser des redans. Là, le coffrage est obligatoire pour contenir le béton et assurer une arase parfaitement horizontale.</li>
                </ul>

                <blockquote class="article-blockquote">
                    <p>"Sur un chantier en terrain argileux, j'ai vu des parois tenir parfaitement à sec s'effondrer en quelques minutes sous la vibration du camion-toupie. Ne jugez jamais la stabilité d'un sol à l'œil, testez toujours avec un piquet avant de décider."</p>
                </blockquote>

                <h2 id="materiaux">Bois vs coffrage perdu : bien choisir son matériel</h2>

                <img src="<?php echo BASE_URL; ?>image/coffrage-pour-fondation-2.webp"
                     alt="Différents types de coffrages : semelle, dalle et pilier en bois et coffrage perdu"
                     loading="lazy"
                     style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <p>Le choix du matériau impacte directement votre budget et la solidité de votre structure. Nous avons trop souvent vu des chantiers tourner au désastre à cause de l'utilisation de panneaux d'OSB. Sous l'effet de l'humidité du béton et de la pression hydrostatique, les copeaux de bois gonflent, la colle sature et le panneau explose. Pour un <span class="hashtag">#coffrage-bois</span>, privilégiez toujours la planche de coffrage en sapin ou le contreplaqué filmé.</p>

                <div class="guide-links-box">
                    <h3>Vos fondations, de A à Z</h3>
                    <p>Retrouvez nos guides complets pour maîtriser chaque étape de vos travaux de fondation :</p>
                    <div class="guide-links-grid">
                        <a href="<?php echo BASE_URL; ?>dosage-beton-fondation" class="guide-link-item">Dosage béton fondation</a>
                        <a href="<?php echo BASE_URL; ?>fondation-puits" class="guide-link-item">Fondation en puits</a>
                        <a href="<?php echo BASE_URL; ?>reprise-fondation-sous-oeuvre" class="guide-link-item">Reprise en sous-œuvre</a>
                        <a href="<?php echo BASE_URL; ?>traitement-humidite" class="guide-link-item">Traitement humidité</a>
                    </div>
                </div>

                <p>Le <span class="hashtag">#coffrage-perdu</span> est devenu la norme sur les chantiers performants. Ces plaques légères en polypropylène se laissent en terre après le coulage, offrant une barrière supplémentaire. Cette technique contribue d'ailleurs indirectement au <a href="<?php echo BASE_URL; ?>traitement-humidite">traitement de l'humidité</a> ascensionnelle en limitant le contact direct entre le béton poreux et la terre humide dès la phase de construction.</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr><th>Matériau</th><th>Coût</th><th>Mise en œuvre</th><th>Décoffrage</th><th>Recommandé pour</th></tr>
                        </thead>
                        <tbody>
                            <tr><td><strong>Planche sapin</strong></td><td>Faible</td><td>Rapide</td><td>Obligatoire</td><td>Petits volumes, murets</td></tr>
                            <tr><td><strong>Contreplaqué filmé</strong></td><td>Moyen</td><td>Rapide</td><td>Obligatoire</td><td>Semelles filantes, dalle</td></tr>
                            <tr><td><strong>Coffrage perdu (PP)</strong></td><td>Élevé</td><td>Très rapide</td><td>Aucun</td><td>Maisons, extensions</td></tr>
                            <tr><td><strong>OSB</strong></td><td>Faible</td><td>Rapide</td><td>Obligatoire</td><td>❌ À éviter absolument</td></tr>
                        </tbody>
                    </table>
                </div>

                <h2 id="types">Les différents types de coffrages selon votre projet</h2>

                <h3 id="semelle">Le coffrage de semelle de fondation (maison & muret)</h3>
                <p>Ici, l'enjeu est l'enrobage du ferraillage. Le coffrage doit permettre de maintenir les aciers à au moins 4 ou 5 cm des parois pour éviter la corrosion future. Dans le cas de rénovations lourdes, une <a href="<?php echo BASE_URL; ?>reprise-fondation-sous-oeuvre">reprise en sous-œuvre</a> peut nécessiter un coffrage par passes successives, une technique chirurgicale qui ne supporte aucune approximation.</p>

                <h3 id="dalle">Le coffrage de dalle et radier</h3>
                <p>On parle ici de coffrage de rive. Il doit être parfaitement de niveau car il sert de guide pour tirer la règle de maçon. La planéité finale de votre sol dépend de la précision de ce cadre. Toute erreur de quelques millimètres se retrouvera sous chaque dalle de revêtement.</p>

                <h3 id="pilier">Le coffrage de pilier et poteau</h3>
                <p>C'est le point de pression maximale. Le béton pèse lourd verticalement. Un coffrage de poteau doit être "cerclé" tous les 30 à 50 cm avec des serre-joints pour éviter que le bas ne s'évase. Ne lésinez pas sur les renforts : un poteau qui éclate en cours de coulage, c'est une journée perdue et du béton à reprendre.</p>

                <h3 id="soutenement">Le coffrage de mur de soutènement</h3>
                <p>Un mur de soutènement subit la poussée de la terre et de l'eau. Au-delà du coffrage, prévoyez systématiquement un système de drainage à l'arrière du mur avant de remblayer. Sans cela, même le meilleur béton finira par se fissurer sous la poussée hydrostatique.</p>

                <img src="<?php echo BASE_URL; ?>image/coffrage-pour-fondation-3.webp"
                     alt="Étapes de coulage du béton avec aiguille vibrante sur fondations"
                     loading="lazy"
                     style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <h2 id="ux-outil">⚙️ Quel coffrage pour votre chantier ?</h2>

                <div id="ux-tool" class="ux-tool-container">
                    <h3>Diagnostic express de votre projet de coffrage</h3>

                    <div id="step-1" class="ux-step active">
                        <div class="ux-question">1. Quelle est la nature de votre terrain ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(1, 'stable')">Sol compact et stable (argile ferme, rocher)</button>
                            <button class="ux-btn" onclick="saveAnswer(1, 'friable')">Sol friable ou meuble (sable, remblai, limon)</button>
                            <button class="ux-btn" onclick="saveAnswer(1, 'pente')">Terrain en pente avec redans</button>
                        </div>
                    </div>

                    <div id="step-2" class="ux-step">
                        <div class="ux-question">2. Quel est le type d'ouvrage à couler ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(2, 'semelle')">Semelle filante ou muret</button>
                            <button class="ux-btn" onclick="saveAnswer(2, 'dalle')">Dalle ou radier</button>
                            <button class="ux-btn" onclick="saveAnswer(2, 'pilier')">Pilier, poteau ou mur de soutènement</button>
                        </div>
                    </div>

                    <div id="step-3" class="ux-step">
                        <div class="ux-question">3. Quel est votre niveau d'expérience sur chantier ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(3, 'diy')">Bricoleur (premier chantier)</button>
                            <button class="ux-btn" onclick="saveAnswer(3, 'expert')">Maçon ou expérimenté</button>
                        </div>
                    </div>

                    <div id="step-result" class="ux-step">
                        <div id="success-result" class="ux-result-box" style="display: none;">
                            <h4 style="margin-top:0; color:#16a085;">🎯 Notre recommandation :</h4>
                            <p id="result-text"></p>
                        </div>
                        <div id="warning-result" class="ux-warning-box" style="display: none;">
                            <h4 style="margin-top:0; color:#c0392b;">⚠️ Attention : chantier à risque</h4>
                            <p id="warning-text">Votre configuration (sol friable + ouvrage structurel + peu d'expérience) présente un risque élevé. Un coffrage défaillant sur ce type de chantier peut compromettre toute la structure. Faites-vous accompagner par un professionnel avant de couler.</p>
                            <a href="<?php echo BASE_URL; ?>contact" class="cta-btn">Demander un avis gratuit</a>
                        </div>
                        <button class="reset-btn" onclick="resetTool()">Recommencer le test</button>
                    </div>
                </div>

                <h2 id="coulage">Guide pas à pas : réussir son coulage sans encombre</h2>

                <ol style="margin-bottom: 20px; padding-left: 20px;">
                    <li><strong>Le traçage et le point haut :</strong> Sur une fondation de 10 mètres, oubliez le niveau à bulle. Utilisez un niveau à eau ou un laser de chantier pour marquer votre trait de niveau. C'est la base de tout le reste.</li>
                    <li><strong>Le calage (le "kicking") :</strong> Enfoncez des piquets en bois à l'extérieur de vos planches. Le béton "pousse" vers l'extérieur ; vos renforts doivent être ancrés profondément, au minimum à 40 cm dans le sol.</li>
                    <li><strong>Le dosage et le coulage :</strong> La qualité de votre ouvrage dépend du respect des proportions. Un mauvais <a href="<?php echo BASE_URL; ?>dosage-beton-fondation">dosage du béton de fondation</a> rendra votre structure friable, quel que soit le soin apporté au coffrage.</li>
                    <li><strong>L'utilisation de l'aiguille vibrante :</strong> Vibrer le béton permet d'éliminer les bulles d'air et d'assurer que le mélange enrobe parfaitement les armatures, évitant les redoutables "nids d'abeille" qui fragilisent la structure.</li>
                </ol>

                <div style="background-color: var(--color-light); border-left: 4px solid var(--color-primary); padding: 1.5rem; margin-bottom: 2rem; border-radius: 0 8px 8px 0;">
                    <ul class="custom-list" style="margin: 0;">
                        <li><strong>Temps de décoffrage :</strong> Minimum 24 à 48h par temps chaud, 72h en dessous de 10°C. Ne décoffrez jamais trop tôt.</li>
                        <li><strong>Protection en cas de gel :</strong> Couvrez le béton frais avec une bâche ou des couvertures isolantes si les températures chutent la nuit.</li>
                        <li><strong>Cure du béton :</strong> Humidifiez légèrement le béton les 3 premiers jours pour éviter la fissuration de surface par dessiccation rapide.</li>
                    </ul>
                </div>

                <h2 id="logistique">Livraison et logistique : recevoir son matériel sur chantier</h2>

                <img src="<?php echo BASE_URL; ?>image/coffrage-pour-fondation-4.webp"
                     alt="Livraison de matériel de coffrage sur chantier de fondations par camion-plateau"
                     loading="lazy"
                     style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <p>Pour les gros volumes, la livraison par camion-plateau est indispensable. Pensez à vérifier l'accessibilité de votre terrain pour le déchargement des palettes de plaques ou des bottes de bois. Le coffrage perdu, bien que plus onéreux à l'achat, réduit les allers-retours logistiques car il ne nécessite pas d'enlèvement après séchage, un argument de poids sur les chantiers encombrés.</p>

                <h2 id="faq">FAQ, Questions fréquentes</h2>

                <h3>Peut-on couler du béton de fondation sans coffrage ?</h3>
                <p>Oui, dans certains cas précis : si le sol est très compact, les parois de la fouille nettes et verticales, et le terrain parfaitement stable. Dans toutes les autres situations, sol meuble, sableux, terrain en pente ou remblai, le coffrage est obligatoire pour contenir le béton et garantir des dimensions précises.</p>

                <h3>Quelle est la différence entre coffrage perdu et coffrage traditionnel ?</h3>
                <p>Le coffrage traditionnel en bois est retiré après séchage du béton (décoffrage). Le coffrage perdu, en polypropylène ou en béton cellulaire, reste en place définitivement. Il offre un gain de temps non négligeable et peut jouer un rôle isolant ou anti-humidité supplémentaire. Son coût d'achat est plus élevé, mais le coût global est souvent comparable une fois le temps de décoffrage écarté.</p>

                <h3>Pourquoi l'OSB est-il interdit dans un coffrage de fondation ?</h3>
                <p>L'OSB est composé de copeaux de bois agglomérés par de la colle. Au contact de l'humidité du béton frais, ces copeaux gonflent et la colle se dégrade, provoquant un gonflement brutal du panneau qui peut faire éclater le coffrage en cours de coulage. Le risque de déformation ou d'effondrement est majeur. Utilisez toujours de la planche de sapin rabotée ou du contreplaqué filmé.</p>

                <h3>Combien de temps faut-il attendre avant de décoffrer ?</h3>
                <p>En règle générale, 24 à 48 heures suffisent pour les fondations en conditions estivales (au-dessus de 15°C). En dessous de 10°C, comptez 72 heures minimum. Par temps de gel, il ne faut surtout pas couler sans précautions, le béton n'atteindra jamais sa résistance nominale s'il gèle avant prise complète.</p>

            </div>

            <div class="author-box-bottom">
                <div class="author-box-img">
                    <img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe">
                </div>
                <div class="author-box-content">
                    <h3>Philippe</h3>
                    <span class="author-role">Expert Rénovation &amp; Artisan RGE</span>
                    <p>Avec plus de 20 ans d'expérience sur les chantiers de maçonnerie et de gros œuvre, Philippe vous partage ses conseils concrets et sans langue de bois pour réussir vos fondations, coffrages et coulages de béton.</p>
                    <a href="<?php echo BASE_URL; ?>philippe" class="btn-outline">Voir son profil complet</a>
                </div>
            </div>

            <div class="conclusion-box">
                <h3>Un doute sur votre coffrage ou vos fondations ?</h3>
                <p>Avant de couler du béton sur un terrain difficile ou pour un ouvrage structurel important, il est toujours préférable de faire valider votre projet par un professionnel. Une heure de conseil peut éviter des semaines de reprise.</p>
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
        if (userAnswers.step1 === 'friable' && userAnswers.step2 === 'pilier' && userAnswers.step3 === 'diy') {
            warningBox.style.display = 'block';
        } else if (userAnswers.step1 === 'stable' && userAnswers.step2 === 'semelle') {
            successBox.style.display = 'block';
            resultText.innerHTML = "<strong>Solution :</strong> Coulage en pleine terre possible si les parois sont nettes. Vérifiez le niveau avec un laser et coulez directement. Prévoyez quand même 2 planches de rive pour maintenir les côtés si le sol bouge.<br><strong>Matériel :</strong> Planches de sapin 27 mm, piquets bois, niveau laser, aiguille vibrante.";
        } else {
            successBox.style.display = 'block';
            resultText.innerHTML = "<strong>Solution :</strong> Coffrage perdu polypropylène type Fundeco recommandé. Il s'adapte à la plupart des configurations, ne nécessite pas de décoffrage et protège durablement le béton de l'humidité du sol.<br><strong>Matériel :</strong> Plaques coffrage perdu, serre-joints (tous les 40 cm pour pilier), aiguille vibrante, niveau laser de chantier.";
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
        'question' => "Peut-on couler du béton de fondation sans coffrage ?",
        'answer'   => "Oui, dans certains cas précis : si le sol est très compact, les parois de la fouille nettes et verticales, et le terrain parfaitement stable. Dans toutes les autres situations, sol meuble, sableux, terrain en pente ou remblai, le coffrage est obligatoire pour contenir le béton et garantir des dimensions précises."
    ],
    [
        'question' => "Quelle est la différence entre coffrage perdu et coffrage traditionnel ?",
        'answer'   => "Le coffrage traditionnel en bois est retiré après séchage du béton. Le coffrage perdu, en polypropylène ou en béton cellulaire, reste en place définitivement. Il offre un gain de temps non négligeable et peut jouer un rôle isolant ou anti-humidité supplémentaire. Son coût d'achat est plus élevé, mais le coût global est souvent comparable une fois le temps de décoffrage écarté."
    ],
    [
        'question' => "Pourquoi l'OSB est-il interdit dans un coffrage de fondation ?",
        'answer'   => "L'OSB est composé de copeaux de bois agglomérés par de la colle. Au contact de l'humidité du béton frais, ces copeaux gonflent et la colle se dégrade, provoquant un gonflement brutal du panneau qui peut faire éclater le coffrage en cours de coulage. Utilisez toujours de la planche de sapin rabotée ou du contreplaqué filmé."
    ],
    [
        'question' => "Combien de temps faut-il attendre avant de décoffrer ?",
        'answer'   => "En règle générale, 24 à 48 heures suffisent pour les fondations en conditions estivales (au-dessus de 15°C). En dessous de 10°C, comptez 72 heures minimum. Par temps de gel, il ne faut surtout pas couler sans précautions : le béton n'atteindra jamais sa résistance nominale s'il gèle avant prise complète."
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
