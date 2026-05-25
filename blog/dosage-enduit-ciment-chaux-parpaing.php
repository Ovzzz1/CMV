<?php
// published: 2026-04-24 14:00
/**
 * dosage-enduit-ciment-chaux-parpaing.php
 * Article : Dosage enduit ciment chaux sur parpaing : Guide complet et proportions
 * Site : cemarenov.fr
 * Date : 2026-04-24
 */

$article_meta = [
    'title'        => 'Dosage enduit ciment chaux sur parpaing : Guide et Proportions',
    'category'     => 'travaux',
    'slug'         => 'dosage-enduit-ciment-chaux-parpaing',
    'image'        => 'https://www.cemarenov.fr/image/dosage-enduit-ciment-chaux-sur-parpaing1.webp',
    'excerpt'      => 'Découvrez les bonnes proportions pour réussir votre dosage enduit ciment chaux sur parpaing : tableau seau par seau, technique d\'application en 3 couches et erreurs à éviter.',
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
                <span>Dosage enduit ciment chaux parpaing</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Enduit</span>
                <span class="article-tag">Parpaing</span>
                <span class="article-tag">Maçonnerie</span>
                <span class="article-tag">Façade</span>
            </div>

            <h1>Dosage enduit ciment chaux sur parpaing :<br><span class="h1-accent">Guide complet et proportions</span></h1>

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
                Réussir un enduit sur un mur en parpaings est un exercice d'équilibre délicat : trop de ciment, et votre façade risque de fissurer sous les tensions thermiques ; trop de chaux, et l'adhérence sur ce support industriel sera insuffisante. C'est ici qu'intervient le <strong>mortier bâtard</strong>, solution hybride alliant robustesse du ciment et souplesse de la chaux. Ce guide décortique le dosage enduit ciment chaux sur parpaing pour un résultat professionnel, durable et esthétique.
            </p>

            <div class="article-content">

                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                        L'essentiel à retenir
                    </div>
                    <ul class="custom-list">
                        <li><strong>Le mortier bâtard :</strong> Le mélange ciment + chaux hydraulique est la référence sur parpaing pour allier adhérence et perspirance.</li>
                        <li><strong>3 couches obligatoires :</strong> Gobetis (accroche), corps d'enduit (dégrossi), finition, chacune plus souple que la précédente.</li>
                        <li><strong>Règle "maigre sur gras" :</strong> Chaque couche successive contient moins de liant, pour éviter fissures et décollements.</li>
                        <li><strong>Humidifier avant d'enduire :</strong> Le parpaing sec "brûle" l'enduit en absorbant son eau de gâchage.</li>
                        <li><strong>Chaux NHL 3.5 ou 5 :</strong> Jamais de chaux aérienne seule sur parpaing ; elle n'accroche pas sur ce support fermé.</li>
                    </ul>
                </div>

                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li>1. Pourquoi le mélange ciment et chaux est idéal sur le parpaing ?</li>
                        <li>2. Tableau des dosages : proportions seau par seau</li>
                        <li>3. Matériaux et outils : faire les bons choix</li>
                        <li>4. Application étape par étape : maîtriser les 3 couches</li>
                        <li>5. Mur en parpaing vs mur en pierre : attention au piège</li>
                        <li>6. Checklist : 5 erreurs fatales à éviter</li>
                        <li>⚙️ Outil : Calculez votre dosage sur-mesure</li>
                        <li>FAQ, Questions fréquentes</li>
                    </ul>
                </div>

                <h2 id="pourquoi-melange">Pourquoi le mélange ciment et chaux est-il idéal sur le parpaing ?</h2>

                <p>Le parpaing (ou bloc béton) est un matériau stable mais "fermé". Pour le protéger efficacement, il lui faut un revêtement à la fois étanche à la pluie battante et capable de laisser respirer le mur. L'utilisation d'un enduit chaux pur est déconseillée car la chaux aérienne ne ferait pas sa prise correctement sur un support aussi peu poreux. En revanche, en ajoutant du ciment, on crée une réaction chimique qui renforce l'accrochage initial.</p>

                <p>La <span class="hashtag">#chaux-hydraulique</span> (NHL) apporte la fameuse "perspirance" : elle permet à la vapeur d'eau de s'évacuer, évitant que l'humidité reste piégée derrière l'enduit, ce qui causerait des décollements ou du faïençage. Le mortier bâtard absorbe les micro-mouvements du mur sans casser, contrairement à un enduit 100% ciment qui s'avère trop cassant.</p>

                <h2 id="tableau-dosages">Le tableau des dosages : proportions seau par seau pour votre enduit</h2>

                <p>Pour réussir votre dosage, on raisonne en volumes (seaux de 10 ou 12 litres). Voici les proportions recommandées par étape, selon les règles de l'art.</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Étape de l'enduit</th>
                                <th>Ciment (Gris ou Blanc)</th>
                                <th>Chaux (NHL 3.5)</th>
                                <th>Sable (0/4 ou 0/2)</th>
                                <th>Consistance visuelle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>1. Gobetis</strong> (Accroche)</td>
                                <td>1 volume</td>
                                <td>0,5 volume</td>
                                <td>2 à 3 volumes</td>
                                <td>Soupe épaisse</td>
                            </tr>
                            <tr>
                                <td><strong>2. Corps d'enduit</strong> (Dégrossi)</td>
                                <td>1 volume</td>
                                <td>1 volume</td>
                                <td>5 volumes</td>
                                <td>Pâte à modeler</td>
                            </tr>
                            <tr>
                                <td><strong>3. Finition</strong> (Décoration)</td>
                                <td>0,5 volume</td>
                                <td>1,5 volume</td>
                                <td>4 à 5 volumes</td>
                                <td>Beurre onctueux</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div style="background-color: var(--color-light); border-left: 4px solid var(--color-primary); padding: 1.5rem; margin-bottom: 2rem; border-radius: 0 8px 8px 0;">
                    <ul class="custom-list" style="margin: 0;">
                        <li><strong>Estimation pratique :</strong> Pour 10 m², prévoyez environ 2 sacs de ciment et 2 sacs de chaux pour une épaisseur totale de 20 mm.</li>
                    </ul>
                </div>

                <h2 id="materiaux">Matériaux et outils : faire les bons choix au magasin</h2>

                <ul class="custom-list">
                    <li><strong>La Chaux :</strong> Privilégiez impérativement une chaux hydraulique naturelle (NHL 3.5 ou NHL 5). La chaux aérienne seule ne convient pas au parpaing.</li>
                    <li><strong>Le Ciment :</strong> Le ciment gris convient pour la structure. Pour une finition "ton pierre", utilisez du ciment blanc.</li>
                    <li><strong>Le Sable :</strong> Sable de rivière lavé. Granulométrie 0/4 pour le corps d'enduit et 0/2 pour la finition.</li>
                    <li><strong>La bétonnière :</strong> Indispensable pour les grands linéaires. Le malaxage doit durer au minimum 3 à 5 minutes pour activer la chaux.</li>
                </ul>

                <img src="<?php echo BASE_URL; ?>image/dosage-enduit-ciment-chaux-sur-parpaing1.webp"
                     alt="Artisan préparant un mélange de mortier bâtard à la bétonnière pour enduire un mur en parpaing"
                     loading="lazy"
                     style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <h2 id="application">Application étape par étape : maîtriser les 3 couches</h2>

                <p>Respectez la règle du <strong>"maigre sur gras"</strong> : chaque couche successive doit être moins riche en liant et plus souple que la précédente pour garantir une épaisseur totale conforme au DTU 26.1 (environ 20 mm).</p>

                <h3>1. Le gobetis : la couche d'accroche</h3>
                <p>Cette couche fait le lien entre le parpaing et l'enduit. Elle doit être projetée avec force pour créer une surface rugueuse et "mouchetée".</p>
                <ul class="custom-list">
                    <li><strong>Épaisseur :</strong> 5 mm.</li>
                    <li><strong>Séchage :</strong> 48 heures minimum avant d'appliquer la couche suivante.</li>
                    <li><strong>Astuce :</strong> Ne pas lisser, la rugosité est volontaire pour favoriser l'accrochage du corps d'enduit.</li>
                </ul>

                <img src="<?php echo BASE_URL; ?>image/dosage-enduit-ciment-chaux-sur-parpaing2.webp"
                     alt="Application du gobetis projeté sur un mur en parpaing, couche d'accroche mouchetée"
                     loading="lazy"
                     style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <h3>2. Le corps d'enduit (dégrossi)</h3>
                <p>Cette couche structurelle permet de redresser le mur et d'assurer l'imperméabilité. On tire le mortier à la règle pour obtenir une surface plane mais griffée.</p>
                <ul class="custom-list">
                    <li><strong>Épaisseur :</strong> 10 à 15 mm.</li>
                    <li><strong>Séchage :</strong> 4 à 7 jours avant la finition.</li>
                    <li><strong>Griffe :</strong> Utilisez un peigne ou un outil griffé pour préparer l'accrochage de la finition.</li>
                </ul>

                <h3>3. La finition</h3>
                <p>Plus riche en chaux, elle protège des micro-fissures et définit l'esthétique finale. Plusieurs textures sont possibles selon l'effet souhaité : finition <strong>talochée</strong> (lisse et mate), <strong>brossée</strong> (texture linéaire) ou <strong>grattée</strong> (aspect rustique granuleux).</p>

                <blockquote class="article-blockquote">
                    <p>"Sur parpaing, j'insiste toujours pour mouiller le support avant chaque couche. C'est ennuyeux mais ça fait toute la différence : l'enduit reste plastique plus longtemps et accroche infiniment mieux."</p>
                </blockquote>

                <h2 id="parpaing-vs-pierre">Mur en parpaing vs Mur en pierre : attention au piège !</h2>

                <p>Le parpaing nécessite du ciment pour l'accroche car c'est un support inerte et peu poreux. À l'inverse, sur de la <span class="hashtag">#pierre-ancienne</span>, le ciment est interdit : il bloque l'humidité et fait éclater les joints par des cycles de gel-dégel. Pour le bâti ancien en pierre, utilisez exclusivement un mortier 100% chaux sans aucun ajout de ciment.</p>

                <img src="<?php echo BASE_URL; ?>image/dosage-enduit-ciment-chaux-sur-parpaing3.webp"
                     alt="Zoom sur une finition talochée à la chaux sur parpaing, texture finale de l'enduit bâtard"
                     loading="lazy"
                     style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <h2 id="erreurs">Checklist : 5 erreurs fatales à éviter</h2>

                <ul class="custom-list">
                    <li><strong>Oublier d'humidifier le support :</strong> Le parpaing sec "brûle" l'enduit en absorbant son eau de gâchage, provoquant un séchage trop rapide et des fissures de retrait.</li>
                    <li><strong>Travailler en plein soleil ou par vent fort :</strong> Le séchage trop rapide provoque des fissures de retrait. Tendez un filet ombrant si nécessaire.</li>
                    <li><strong>Le sur-dosage en ciment :</strong> Un enduit trop dur finit par se décoller par plaques sous les contraintes thermiques.</li>
                    <li><strong>Malaxage trop court :</strong> La chaux doit tourner au moins 3 à 5 minutes dans la bétonnière pour s'activer chimiquement.</li>
                    <li><strong>Ignorer la météo :</strong> Évitez toute application par gel (en dessous de 5 °C) ou par vent violent qui assèche la surface.</li>
                </ul>

                <h2 id="ux-outil">⚙️ Calculez votre dosage enduit sur-mesure</h2>

                <div id="ux-tool" class="ux-tool-container">
                    <h3>Quel mortier pour votre chantier ?</h3>

                    <div id="step-1" class="ux-step active">
                        <div class="ux-question">1. Quel est votre type de mur ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(1, 'parpaing')">Parpaing / Bloc béton</button>
                            <button class="ux-btn" onclick="saveAnswer(1, 'pierre')">Pierre ancienne</button>
                            <button class="ux-btn" onclick="saveAnswer(1, 'brique')">Brique</button>
                        </div>
                    </div>

                    <div id="step-2" class="ux-step">
                        <div class="ux-question">2. Quelle finition souhaitez-vous ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(2, 'taloche')">Taloché (lisse)</button>
                            <button class="ux-btn" onclick="saveAnswer(2, 'gratte')">Gratté (rustique)</button>
                            <button class="ux-btn" onclick="saveAnswer(2, 'projete')">Projeté (texturé)</button>
                        </div>
                    </div>

                    <div id="step-3" class="ux-step">
                        <div class="ux-question">3. Votre niveau d'expérience en maçonnerie ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(3, 'debutant')">Débutant (premier chantier)</button>
                            <button class="ux-btn" onclick="saveAnswer(3, 'confirme')">Confirmé (déjà pratiqué)</button>
                            <button class="ux-btn" onclick="saveAnswer(3, 'pro')">Professionnel</button>
                        </div>
                    </div>

                    <div id="step-result" class="ux-step">
                        <div id="success-result" class="ux-result-box" style="display: none;">
                            <h4 style="margin-top:0; color:#16a085;">Votre recette sur-mesure :</h4>
                            <p id="result-text"></p>
                        </div>
                        <div id="warning-result" class="ux-warning-box" style="display: none;">
                            <h4 style="margin-top:0; color:#c0392b;">Attention : Support sensible</h4>
                            <p id="warning-text">Sur pierre ancienne, ne jamais ajouter de ciment. Utilisez un mortier 100% chaux NHL 3.5 (1 volume de chaux + 3 volumes de sable). Le ciment bloquerait l'humidité et ferait éclater les pierres.</p>
                            <a href="<?php echo BASE_URL; ?>contact" class="cta-btn">Demander conseil à Philippe</a>
                        </div>
                        <button class="reset-btn" onclick="resetTool()">Recommencer le test</button>
                    </div>
                </div>

                <h2 id="faq">FAQ, Questions fréquentes</h2>

                <h3>Peut-on utiliser du ciment blanc et du sable jaune pour un effet "ton pierre" ?</h3>
                <p>Oui, c'est la technique idéale pour obtenir un aspect naturel sans <a href="https://www.cemarenov.fr/peinture-de-facade">peinture de façade</a>. Associez du ciment blanc (0,5 volume) à de la chaux NHL (1,5 volume) et du sable de rivière ocre (4 à 5 volumes) pour la couche de finition. Le rendu est très proche d'une pierre calcaire naturelle.</p>

                <h3>Combien de temps attendre entre chaque couche d'enduit ?</h3>
                <p>Comptez minimum 48 heures après le gobetis (couche d'accroche) et environ une semaine après le corps d'enduit avant d'appliquer la finition. Ces délais varient selon la température et l'hygrométrie : par temps humide, doublez les temps d'attente.</p>

                <h3>Quelle épaisseur totale pour un enduit sur parpaing conforme au DTU 26.1 ?</h3>
                <p>L'épaisseur totale doit être d'environ 20 mm, répartis en 5 mm pour le gobetis, 10 à 15 mm pour le corps d'enduit et quelques millimètres pour la finition. Un enduit trop épais (plus de 25 mm d'un coup) risque de fissurer sous son propre poids lors du séchage.</p>

                <h3>Et si je ne veux pas enduire mon mur en parpaing ?</h3>
                <p>C'est légalement possible dans certains cas, notre dossier <a href="https://www.cemarenov.fr/mur-parpaing-sans-enduit">peut-on laisser un mur en parpaing sans enduit</a> détaille les obligations selon votre PLU et les alternatives (hydrofuge incolore, bardage, peinture façade). Pour les murs humides ou les parties enterrées, mieux vaut consulter d'abord notre guide sur l'<a href="https://www.cemarenov.fr/etancheite-mur-parpaing-interieur">étanchéité mur parpaing intérieur</a> avant d'appliquer quoi que ce soit.</p>

            </div>

            <div class="author-box-bottom">
                <div class="author-box-img">
                    <img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe">
                </div>
                <div class="author-box-content">
                    <h3>Philippe</h3>
                    <span class="author-role">Expert Rénovation &amp; Artisan RGE</span>
                    <p>Maçon de métier, Philippe réalise des enduits sur parpaing, pierre et brique depuis plus de 20 ans. Il partage ici ses proportions éprouvées sur le terrain pour éviter les fissures et les décollements.</p>
                    <a href="<?php echo BASE_URL; ?>philippe" class="btn-outline">Voir son profil complet</a>
                </div>
            </div>

            <div class="conclusion-box">
                <h3>Besoin d'un artisan pour votre enduit de façade ?</h3>
                <p>Un dosage parfait ne suffit pas : l'application exige de l'expérience, notamment pour tirer le corps d'enduit à la règle et obtenir une surface parfaitement plane. Demandez un devis à Philippe.</p>
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

        if (userAnswers.step1 === 'pierre') {
            warningBox.style.display = 'block';
        } else if (userAnswers.step1 === 'parpaing' && userAnswers.step3 === 'debutant') {
            successBox.style.display = 'block';
            resultText.innerHTML = "<strong>Recette conseillée (débutant sur parpaing) :</strong><br>Gobetis : 1 ciment + 0,5 chaux + 2 sable. Corps : 1 ciment + 1 chaux + 5 sable.<br><strong>Conseil :</strong> Commencez par une petite surface test de 1 m² avant d'attaquer tout le mur. Utilisez une taloche en plastique souple pour la finition.";
        } else {
            successBox.style.display = 'block';
            resultText.innerHTML = "<strong>Recette mortier bâtard :</strong><br>Gobetis (1 : 0,5 : 2,5) → Corps d'enduit (1 : 1 : 5) → Finition (0,5 : 1,5 : 4,5).<br><strong>Rappel :</strong> Humidifiez le support avant chaque couche, malaxez 5 min minimum, respectez les temps de séchage entre couches.";
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
        'question' => "Peut-on utiliser du ciment blanc et du sable jaune pour un effet ton pierre ?",
        'answer'   => "Oui, c'est la technique idéale pour un aspect naturel sans peinture de façade. Associez du ciment blanc (0,5 volume) à de la chaux NHL (1,5 volume) et du sable de rivière ocre (4 à 5 volumes) pour la couche de finition."
    ],
    [
        'question' => "Combien de temps attendre entre chaque couche d'enduit ?",
        'answer'   => "Comptez minimum 48 heures après le gobetis et environ une semaine après le corps d'enduit. Par temps humide, doublez les temps d'attente pour éviter les fissures de retrait."
    ],
    [
        'question' => "Quelle épaisseur totale pour un enduit sur parpaing conforme au DTU 26.1 ?",
        'answer'   => "L'épaisseur totale doit être d'environ 20 mm, répartis en 5 mm pour le gobetis, 10 à 15 mm pour le corps d'enduit et quelques millimètres pour la finition. Un enduit trop épais risque de fissurer sous son propre poids."
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
