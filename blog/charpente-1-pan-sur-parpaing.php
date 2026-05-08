<?php
// published: 2026-04-21 08:00
/**
 * charpente-1-pan-sur-parpaing.php
 * Article : Charpente 1 pan sur parpaing : réussir l'ancrage et le montage
 * Site : cemarenov.fr
 * Date : 2026-04-21
 */

$article_meta = [
    'title'        => 'Charpente 1 pan sur parpaing : ancrage et montage',
    'category'     => 'travaux',
    'slug'         => 'charpente-1-pan-sur-parpaing',
    'image'        => 'https://www.cemarenov.fr/image/charpente-1-pan-sur-parpaing-1.webp',
    'excerpt'      => 'Comment fixer une charpente 1 pan sur un mur en parpaing creux ou plein : scellement chimique, muralière, arase de pente et montage des chevrons étape par étape.',
    'date'         => '2026-04-21',
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
                <span>Charpente 1 pan sur parpaing</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Charpente</span>
                <span class="article-tag">Parpaing</span>
                <span class="article-tag">Travaux</span>
                <span class="article-tag">DTU 31.1</span>
            </div>

            <h1>Charpente 1 pan sur parpaing :<br><span class="h1-accent">ancrage, montage et étanchéité</span></h1>

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
                Construire un garage, un appentis ou une extension adossée à votre maison sur des murs en parpaing ? La charpente monopente est la solution la plus logique, simple, économique, adaptée. Mais le parpaing creux ne se fixe pas comme du béton plein : un mauvais choix de cheville ou une muralière mal ancrée, et c'est toute la structure qui bouge au premier coup de vent. Ce guide entre dans le détail de ce que les autres n'approfondissent pas : le scellement chimique, l'arase de pente et l'ordre d'exécution rigoureux du montage.
            </p>

            <div class="article-content">

                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                        L'essentiel à retenir
                    </div>
                    <ul class="custom-list">
                        <li><strong>Zéro cheville à expansion sur parpaing creux :</strong> le bossage interne s'effrite sous charge. Scellement chimique + tamis métallique obligatoire (Hilti HIT-RE 500, Fischer FIS V Plus).</li>
                        <li><strong>Arase de pente indispensable :</strong> une couche de béton B20 ferraillée sur les pignons avant toute pose de panne. Sans elle, les efforts se concentrent sur quelques cm² de béton creux, l'éclatement est inévitable.</li>
                        <li><strong>Douglas Classe 3 :</strong> l'essence de référence pour une charpente 1 pan exposée. Classement C24, durabilité naturelle sans traitement autoclave lourd.</li>
                        <li><strong>Laser traversant obligatoire :</strong> alignez muralière et faîtière au niveau laser avant de sceller la moindre tige. 5 mm de décalage = torsion sur chaque chevron.</li>
                        <li><strong>Solin maçonné DTU 40.11 :</strong> saignée dans le mur existant + bande plomb ou alu, recouvrement 15 cm minimum sur la couverture.</li>
                        <li><strong>Budget DIY 30 m² :</strong> 800 à 1 500 € selon couverture. Avec artisan : 2 500 à 4 500 € tout compris.</li>
                    </ul>
                </div>

                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li><a href="#dimensionnement">1. Dimensionnement : sections de bois et choix de l'essence</a></li>
                        <li><a href="#fixation">2. Fixation sur parpaing : scellement chimique vs sabots directs</a></li>
                        <li><a href="#montage">3. Étapes de montage : de l'arase au dernier chevron</a></li>
                        <li><a href="#ux-outil">⚙️ Outil : Choisissez votre méthode de fixation</a></li>
                        <li><a href="#etancheite">4. Étanchéité : la jonction avec le mur existant</a></li>
                        <li><a href="#faq">FAQ, Questions fréquentes</a></li>
                    </ul>
                </div>

                <h2 id="dimensionnement">Dimensionnement : quelle section de bois pour votre charpente 1 pan ?</h2>

                <p>Avant de toucher à une cheville ou à un sabot, le dimensionnement s'impose. Sur une charpente monopente, deux éléments portent tout : la <strong>panne sablière</strong> (en bas, ancrée dans le mur le plus bas) et la <strong>panne faîtière</strong> (en haut, côté mur). Les chevrons courent entre les deux, perpendiculairement à la pente.</p>

                <img src="<?php echo BASE_URL; ?>image/charpente-1-pan-sur-parpaing-1.webp"
                     alt="Charpente 1 pan sur parpaing avec muralière et chevrons Douglas, vue de chantier"
                     loading="lazy"
                     style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <h3>Portée et entraxe : les règles de base</h3>

                <p>La section des chevrons dépend de trois variables : la portée (distance entre les deux appuis), l'entraxe (espacement entre chevrons) et le poids de la couverture. Entraxe standard : <strong>40 à 60 cm</strong> selon le type de couverture (60 cm max pour bac acier, 40 à 45 cm pour tuiles lourdes en terre cuite). Pour une portée supérieure à 3 m, des pannes intermédiaires espacées de 120 à 180 cm sont nécessaires.</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Portée des chevrons</th>
                                <th>Entraxe 40 cm</th>
                                <th>Entraxe 60 cm</th>
                                <th>Panne intermédiaire ?</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td>Jusqu'à 2 m</td><td>63 × 150 mm</td><td>75 × 150 mm</td><td>Non</td></tr>
                            <tr><td>2 à 3 m</td><td>63 × 175 mm</td><td>75 × 200 mm</td><td>Non</td></tr>
                            <tr><td>3 à 4 m</td><td>75 × 200 mm</td><td>75 × 225 mm</td><td>Recommandée</td></tr>
                            <tr><td>4 à 5 m</td><td>100 × 225 mm</td><td>100 × 250 mm</td><td>Obligatoire</td></tr>
                        </tbody>
                    </table>
                </div>

                <p>Pour des portées au-delà de 4,5 m ou en zone de montagne (charges neige significatives), faites valider votre calcul par un charpentier ou un bureau d'études. Le <strong>DTU 31.1</strong> encadre les constructions bois en France et fixe les charges de référence par zone climatique.</p>

                <h3>Pourquoi le Douglas s'impose</h3>

                <p>Le <strong>Douglas</strong> est l'essence de référence pour une charpente 1 pan exposée aux intempéries. Sa résistance mécanique (classement C24 fréquent) et sa durabilité naturelle en <strong>classe d'emploi 3</strong>, sans traitement autoclave lourd, en font le choix idéal pour une structure adossée à un mur en parpaing, partiellement exposée à l'humidité. Le sapin et l'épicéa restent acceptables à condition d'être traités classe 3 minimum en cas de contact direct avec la pluie ou l'humidité remontant du mur.</p>

                <p>Conseil terrain : pré-percez vos muralières et pannes <strong>au sol avant la pose</strong>. Vous gagnerez facilement une heure de travail en hauteur et réduirez le risque de fissuration du bois sur un échafaudage instable. Tout about coupé sur chantier doit être immédiatement traité au pinceau avec un produit classe 3 (perméthrine ou propiconazole), le Douglas ne pardonne pas les coupes fraîches laissées sans protection.</p>

                <div class="guide-links-box">
                    <h3>Guides complémentaires</h3>
                    <p>Pour aller plus loin sur l'entretien et la structure de votre charpente :</p>
                    <div class="guide-links-grid">
                        <a href="<?php echo BASE_URL; ?>traitement-preventif-charpente" class="guide-link-item">Traitement préventif charpente</a>
                        <a href="<?php echo BASE_URL; ?>chainage-horizontal-mur-parpaing" class="guide-link-item">Chaînage horizontal mur parpaing</a>
                        <a href="<?php echo BASE_URL; ?>isolation-sous-rampants-toiture" class="guide-link-item">Isolation sous rampants de toiture</a>
                    </div>
                </div>

                <h2 id="fixation">Fixation sur parpaing : scellement chimique vs sabots directs</h2>

                <p>C'est le cœur du sujet et la zone où la majorité des erreurs se produisent. Le parpaing creux, le type le plus courant en France, est composé à 50 % de vide. Il <strong>ne tolère pas les chevilles à expansion classiques</strong> : sous effort de traction ou de cisaillement, le bossage interne s'effrite et la fixation lâche sans avertissement préalable.</p>

                <h3>Scellement chimique sur parpaing creux : la seule méthode fiable</h3>

                <p>Le <strong>scellement chimique</strong> par résine époxyde ou vinylester est la seule solution fiable sur parpaing creux. Un tamis métallique inséré dans le trou de forage permet à la résine injectée de diffuser dans le vide du bloc et de créer un ancrage massif. Marques de référence : Hilti HIT-RE 500, Fischer FIS V Plus, Spit Epcon.</p>

                <ol style="margin-bottom: 20px; padding-left: 20px;">
                    <li><strong>Percer</strong> au bon diamètre (12 à 16 mm selon la tige filetée).</li>
                    <li><strong>Souffler et brosser</strong> soigneusement le trou, les poussières empêchent l'adhérence de la résine.</li>
                    <li><strong>Insérer le tamis métallique</strong> dans le trou.</li>
                    <li><strong>Injecter la résine</strong> depuis le fond vers l'entrée avec un pistolet bi-composant.</li>
                    <li><strong>Visser la tige filetée</strong> en tournant légèrement pendant l'injection pour saturer la cavité.</li>
                    <li><strong>Respecter le temps de polymérisation</strong> : 20 à 30 min à 20 °C, plus long par temps froid.</li>
                </ol>

                <h3>Fixation mécanique : quand la réserver au parpaing plein</h3>

                <p>Sur parpaing plein (type R20, béton cellulaire dense ou béton banché), les sabots métalliques avec tirefonds ou les chevilles lourdes à expansion (type Rawlbolt) sont acceptables. La solution la plus propre reste la <strong>muralière avec sabots de charpente</strong> (type Simpson Strong-Tie) : une pièce de bois horizontale scellée dans le mur, sur laquelle vous montez vos sabots d'appui pour les pannes. Avantage clé : vous pouvez vérifier l'horizontalité au niveau laser et corriger avant de tout bloquer, là où l'ancrage direct laisse peu de marge.</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Type de support</th>
                                <th>Méthode recommandée</th>
                                <th>Produits de référence</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td>Parpaing creux standard</td><td>Scellement chimique + tamis métallique</td><td>Hilti HIT-RE 500, Fischer FIS V Plus</td></tr>
                            <tr><td>Parpaing plein / béton armé</td><td>Cheville à expansion ou scellement chimique</td><td>Rawlbolt, Spit Pulsa, tout chimique</td></tr>
                            <tr><td>Béton cellulaire (Siporex)</td><td>Cheville spéciale BC ou chimique légère</td><td>Fischer SXR, Hilti HIT-Z-R</td></tr>
                            <tr><td>Maçonnerie ancienne / irrégulière</td><td>Arase béton armé + platine soudée</td><td>Solution sur mesure, faire appel à un artisan</td></tr>
                        </tbody>
                    </table>
                </div>

                <p>Pour toute maçonnerie en parpaing, intercalez un <strong>film EPDM ou une natte caoutchouc</strong> entre la muralière et le mur. Ce joint évite les remontées capillaires qui dégradent silencieusement le bois sur plusieurs années.</p>

                <h2 id="montage">Étapes de montage : de l'arase au dernier chevron</h2>

                <p>Vous avez votre plan de charpente, vos sections calculées, vos fixations adaptées au type de parpaing. Voici l'ordre d'exécution pour ne pas avoir à tout reprendre.</p>

                <h3>Réalisation de l'arase de pente — le fondement de tout</h3>

                <p>Sur les deux murs pignons, le dessus des parpaings doit suivre exactement la pente souhaitée. <strong>L'arase de pente</strong> est une couche de béton (5 à 8 cm d'épaisseur) coulée sur le dessus des parpaings en suivant cette inclinaison, créant une surface d'appui continue, plane et inclinée. Sans arase, les efforts se concentrent sur quelques cm² de béton creux, l'éclatement est inévitable. Avec une arase ferraillée (fers HA8 en épingle), vous répartissez les charges sur toute la longueur.</p>

                <img src="<?php echo BASE_URL; ?>image/charpente-1-pan-sur-parpaing-2.webp"
                     alt="Arase de pente ferraillée coulée sur parpaing avant la pose de la panne sablière d'une charpente 1 pan"
                     loading="lazy"
                     style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <ol style="margin-bottom: 20px; padding-left: 20px;">
                    <li><strong>Coffrage</strong> bois ou polystyrène sur les deux pignons, pente vérifiée au niveau laser traversant.</li>
                    <li><strong>Coulage béton B20</strong> minimum, dressage à la règle métallique, séchage 48 h minimum avant toute charge.</li>
                </ol>

                <h3>Pose de la panne sablière et de la panne faîtière</h3>

                <p>Une fois l'arase durcie, percez les trous de scellement, brossez-les soigneusement, injectez la résine. Le geste professionnel que les tutoriels vidéo ne montrent pas : <strong>alignez les deux muralières au niveau laser traversant avant de sceller la moindre tige</strong>. Deux muralières décalées de 5 mm en hauteur sur des murs opposés, c'est une torsion que vous retrouvez sur chaque chevron. Au cordeau seul, cette erreur est fréquente. Au laser, elle est impossible.</p>

                <p>Pour un ouvrage adossé au mur de la maison principale, la panne faîtière peut être directement encastrée dans une saignée de 10 cm de profondeur creusée dans le mur existant. Mortier au fond, panne insérée en laissant 1 cm d'espace en bout pour la dilatation du bois, rebouchage au mortier bâtard.</p>

                <h3>Alignement des chevrons, bec d'oiseau et débords de toit</h3>

                <ul class="custom-list">
                    <li><strong>Bec d'oiseau :</strong> encoche en angle taillée en pied de chevron, permettant un appui horizontal sur la muralière. Elle améliore la tenue à l'arrachement et évite la concentration des efforts sur l'arête. La hauteur du talon ne doit pas dépasser 30 % de la hauteur du chevron pour ne pas l'affaiblir.</li>
                    <li><strong>Débord de toit :</strong> laissez les chevrons dépasser de 40 à 60 cm côté bas pour former l'avant-toit. Ne les coupez pas au fur et à mesure, attendez que toute la structure soit posée, puis coupez au cordeau traceur d'un seul trait pour un alignement parfait.</li>
                    <li><strong>Contreventements :</strong> dès que le 1 pan dépasse 3 m de large, ajoutez des croix de Saint-André entre les pannes (équerres d'assemblage). Elles rigidifient la structure contre les efforts de vent latéraux et évitent l'effet "parallélogramme" qui déforme progressivement la toiture.</li>
                </ul>

                <h2 id="ux-outil">⚙️ Choisissez votre méthode de fixation</h2>

                <div id="ux-tool" class="ux-tool-container">
                    <h3>Quel ancrage pour votre charpente 1 pan ?</h3>

                    <div id="step-1" class="ux-step active">
                        <div class="ux-question">1. Quel est votre type de mur porteur ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(1, 'creux')">Parpaing creux standard</button>
                            <button class="ux-btn" onclick="saveAnswer(1, 'plein')">Parpaing plein / béton armé</button>
                            <button class="ux-btn" onclick="saveAnswer(1, 'cellulaire')">Béton cellulaire (Siporex)</button>
                        </div>
                    </div>

                    <div id="step-2" class="ux-step">
                        <div class="ux-question">2. Quelle est la portée de votre charpente ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(2, 'courte')">Moins de 3 m</button>
                            <button class="ux-btn" onclick="saveAnswer(2, 'moyenne')">3 à 5 m</button>
                            <button class="ux-btn" onclick="saveAnswer(2, 'longue')">Plus de 5 m</button>
                        </div>
                    </div>

                    <div id="step-3" class="ux-step">
                        <div class="ux-question">3. Réalisez-vous les travaux vous-même ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(3, 'diy')">Oui, en DIY</button>
                            <button class="ux-btn" onclick="saveAnswer(3, 'pro')">Non, avec un artisan</button>
                        </div>
                    </div>

                    <div id="step-result" class="ux-step">
                        <div id="success-result" class="ux-result-box" style="display: none;">
                            <h4 style="margin-top:0; color:#16a085;">✅ Notre recommandation :</h4>
                            <p id="result-text"></p>
                        </div>
                        <div id="warning-result" class="ux-warning-box" style="display: none;">
                            <h4 style="margin-top:0; color:#c0392b;">⚠️ Attention : cas complexe</h4>
                            <p id="warning-text"></p>
                        </div>
                        <button class="reset-btn" onclick="resetTool()">Recommencer le test</button>
                    </div>
                </div>

                <h2 id="etancheite">Étanchéité : la jonction avec le mur existant</h2>

                <p>Le point de fuite chronique d'une charpente 1 pan adossée à un mur existant, c'est toujours la même zone : <strong>la jonction entre la couverture et le mur</strong>. L'eau ruisselle le long du mur, se glisse derrière les dernières rangées de couverture et finit dans votre garage ou appentis. La réponse : le solin à bavette.</p>

                <ul class="custom-list">
                    <li><strong>Solin maçonné (solution durable, DTU 40.11) :</strong> saignée horizontale creusée dans le mur existant (3 cm de profondeur, 3 cm de hauteur minimum), dans laquelle on chasse une bande de plomb ou d'aluminium prépliée. Le bord supérieur est scellé au mortier bâtard, le bord inférieur chevauche la couverture d'au moins 15 cm. En zone venteuse, portez ce recouvrement à 20 cm.</li>
                    <li><strong>Bavette autocollante + mastic polyuréthane :</strong> solution de rattrapage quand la saignée est impossible (mur en pierre, enduit ancien). Moins pérenne mais efficace si le mastic est de qualité et régulièrement inspecté.</li>
                </ul>

                <p>Même réflexion pour les gouttières : une charpente 1 pan sans système d'évacuation des eaux pluviales, c'est un mur en parpaing qui travaille dans l'humidité en permanence. La gouttière se fixe en pied de toiture sur les chevrons avant-toit ou sur un bandeau fermant la tête des chevrons. Pente minimale : 3 mm/ml vers la descente.</p>

                <h2 id="faq">FAQ, Questions fréquentes</h2>

                <h3>Peut-on poser une panne directement sur un parpaing sans arase ni muralière ?</h3>
                <p>Non. Poser une panne sur l'arête vive d'un parpaing concentre les efforts sur quelques cm² de béton creux. L'éclatement du bossage sous charge est quasi inévitable. L'arase béton ferraillée ou la muralière scellée chimiquement sont toujours indispensables.</p>

                <h3>Quelle pente minimale pour un toit 1 pan selon le type de couverture ?</h3>
                <p>5 % (3°) pour un bac acier nervuré, 15 % (8,5°) pour des tuiles mécaniques, 25 % (14°) pour des tuiles canal. En dessous de ces seuils, l'étanchéité n'est pas garantie selon les DTU de couverture respectifs.</p>

                <h3>Comment calculer l'angle de coupe des chevrons ?</h3>
                <p>L'angle de coupe en pied de chevron est égal à l'angle de pente de la toiture. Pour une pente de 20 % (≈ 11,3°), la coupe de pied se réalise à 11,3° par rapport à la verticale. Une équerre de charpentier réglable (type Pythagore) est l'outil adapté pour ce tracé.</p>

                <h3>Quel budget pour une charpente 1 pan sur parpaing en 2026 ?</h3>
                <p>Pour une structure de 20 à 40 m², comptez entre <strong>800 et 1 500 €</strong> en DIY complet (matériaux seuls) selon le type de couverture choisi. Avec un charpentier, le budget tout compris se situe entre <strong>2 500 et 4 500 €</strong>. Les fixations, sabots et résine chimique représentent 150 à 350 € de fournitures sur l'ensemble du chantier.</p>

                <h3>Faut-il un permis de construire pour une charpente 1 pan ?</h3>
                <p>Pour une surface au sol inférieure à 20 m² (ou 40 m² en zone couverte par un PLU favorable), une déclaration préalable de travaux suffit dans la majorité des cas. Au-delà, un permis de construire est obligatoire. Consultez votre mairie avant de démarrer le chantier.</p>

                <h3>Quel mortier pour sceller la charpente au mur en parpaing ?</h3>
                <p>La liaison de la sablière ou des sabots métalliques au mur nécessite un mortier bâtard (ciment + chaux + sable), jamais du ciment pur qui fragilise les ancrages aux cycles gel-dégel. Notre guide sur le <a href="https://www.cemarenov.fr/dosage-mortier-batard-faitage">dosage du mortier bâtard pour faîtage</a> couvre les proportions adaptées aux assemblages bois-maçonnerie exposés aux intempéries.</p>

            </div>

            <div class="author-box-bottom">
                <div class="author-box-img">
                    <img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe">
                </div>
                <div class="author-box-content">
                    <h3>Philippe</h3>
                    <span class="author-role">Expert Rénovation &amp; Artisan RGE</span>
                    <p>Avec plus de 20 ans d'expérience sur les chantiers de charpente et de maçonnerie, Philippe intervient régulièrement sur des projets d'extension et de garage en parpaing, du scellement chimique jusqu'à la pose de couverture.</p>
                    <a href="<?php echo BASE_URL; ?>philippe" class="btn-outline">Voir son profil complet</a>
                </div>
            </div>

            <div class="conclusion-box">
                <h3>Votre projet de charpente mérite un regard professionnel</h3>
                <p>Portée importante, mur ancien, zone venteuse ou neigeuse : certaines configurations nécessitent un calcul de structure validé par un artisan avant de commander vos bois.</p>
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

        // ── Logique métier ────────────────────────────────────────────────
        if (userAnswers.step2 === 'longue') {
            warningBox.style.display = 'block';
            warningText.innerHTML = "Une portée supérieure à 5 m nécessite un calcul de structure validé par un charpentier ou un bureau d'études. Le DTU 31.1 impose une vérification des charges de neige et de vent par zone climatique. Ne dimensionnez pas seul, faites appel à un professionnel.";
        } else if (userAnswers.step1 === 'creux') {
            successBox.style.display = 'block';
            resultText.innerHTML = "<strong>Méthode :</strong> Scellement chimique + tamis métallique obligatoire.<br><strong>Produits :</strong> Hilti HIT-RE 500 ou Fischer FIS V Plus. Diamètre de perçage : 12 à 16 mm selon tige filetée.<br><strong>Rappel :</strong> Souffler et brosser le trou avant injection. Temps de polymérisation : 20–30 min à 20 °C.";
        } else if (userAnswers.step1 === 'cellulaire') {
            successBox.style.display = 'block';
            resultText.innerHTML = "<strong>Méthode :</strong> Cheville spéciale béton cellulaire ou scellement chimique léger.<br><strong>Produits :</strong> Fischer SXR ou Hilti HIT-Z-R. Attention : les charges admissibles sont inférieures au parpaing plein, vérifiez les fiches techniques pour votre portée.";
        } else {
            successBox.style.display = 'block';
            resultText.innerHTML = "<strong>Méthode :</strong> Cheville à expansion lourde ou scellement chimique acceptables sur parpaing plein.<br><strong>Produits :</strong> Rawlbolt, Spit Pulsa ou tout système chimique.<br><strong>Conseil :</strong> La muralière avec sabots de charpente Simpson Strong-Tie reste la solution la plus propre, elle permet le réglage au laser avant blocage définitif.";
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
        'question' => "Peut-on poser une panne directement sur un parpaing sans arase ni muralière ?",
        'answer'   => "Non. Poser une panne sur l'arête vive d'un parpaing concentre les efforts sur quelques cm² de béton creux. L'éclatement du bossage sous charge est quasi inévitable. L'arase béton ferraillée ou la muralière scellée chimiquement sont toujours indispensables."
    ],
    [
        'question' => "Quelle pente minimale pour un toit 1 pan selon le type de couverture ?",
        'answer'   => "5 % (3°) pour un bac acier nervuré, 15 % (8,5°) pour des tuiles mécaniques, 25 % (14°) pour des tuiles canal. En dessous de ces seuils, l'étanchéité n'est pas garantie selon les DTU de couverture respectifs."
    ],
    [
        'question' => "Comment calculer l'angle de coupe des chevrons ?",
        'answer'   => "L'angle de coupe en pied de chevron est égal à l'angle de pente de la toiture. Pour une pente de 20 % (environ 11,3°), la coupe de pied se réalise à 11,3° par rapport à la verticale. Une équerre de charpentier réglable (type Pythagore) est l'outil adapté."
    ],
    [
        'question' => "Quel budget pour une charpente 1 pan sur parpaing en 2026 ?",
        'answer'   => "Pour une structure de 20 à 40 m², comptez entre 800 et 1 500 € en DIY complet selon le type de couverture. Avec un charpentier, le budget tout compris se situe entre 2 500 et 4 500 €. Les fixations, sabots et résine chimique représentent 150 à 350 € de fournitures sur l'ensemble du chantier."
    ],
    [
        'question' => "Faut-il un permis de construire pour une charpente 1 pan ?",
        'answer'   => "Pour une surface au sol inférieure à 20 m² (ou 40 m² en zone couverte par un PLU favorable), une déclaration préalable de travaux suffit dans la majorité des cas. Au-delà, un permis de construire est obligatoire. Consultez votre mairie avant de démarrer le chantier."
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
