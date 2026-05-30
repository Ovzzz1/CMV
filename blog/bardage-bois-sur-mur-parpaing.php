<?php
// published: 2026-04-21 08:00
/**
 * bardage-bois-sur-mur-parpaing.php
 * Article : Bardage bois sur mur parpaing : le guide technique (DTU 41.2 & Pose)
 * Site : cemarenov.fr
 * Date : 2026-04-21
 */

$article_meta = [
    'title' => 'Bardage bois sur mur parpaing : guide technique DTU 41.2',
    'category' => 'travaux',
    'slug' => 'bardage-bois-sur-mur-parpaing',
    'image' => 'https://www.cemarenov.fr/image/bardage-bois-sur-mur-parpaing-1.webp',
    'excerpt' => 'Comment poser un bardage bois sur un mur en parpaing : fixations, ossature, lame d\'air et essences recommandées. Guide complet conforme DTU 41.2.',
    'date' => '2026-04-21',
    'reading_time' => 9,
];

// ── Bloc logique CMS, NE JAMAIS MODIFIER ─────────────────────────────────
require_once dirname(__DIR__) . '/functions.php';

$page_title = $article_meta['title'];
$page_description = $article_meta['excerpt'];

$current_cat = $article_meta['category'];
$current_url = BASE_URL . str_replace('.php', '', basename($_SERVER['SCRIPT_FILENAME']));
$category = get_category($current_cat);
$other_cats = get_other_categories($current_cat);
$cat_articles = array_values(array_filter(get_category_articles($current_cat, 11), fn($a) => ($a['url'] ?? '') !== $current_url));
$cat_articles = array_slice($cat_articles, 0, 10);
$latest_articles = array_values(array_filter(get_latest_articles(11), fn($a) => ($a['url'] ?? '') !== $current_url));
$latest_articles = array_slice($latest_articles, 0, 10);

$current_title_words = array_map('mb_strtolower', explode(' ', $article_meta['title']));
$similar_articles = [];
foreach ($cat_articles as $art) {
    if (!isset($art['title']))
        continue;
    $title_words = array_map('mb_strtolower', explode(' ', $art['title']));
    $common = count(array_intersect($current_title_words, $title_words));
    $similar_articles[] = array_merge($art, ['score' => $common]);
}
usort($similar_articles, function ($a, $b) {
    return $b['score'] - $a['score']; });
$similar_articles = array_slice($similar_articles, 0, 3);
// ── Fin bloc logique CMS ───────────────────────────────────────────────────

include dirname(__DIR__) . '/header.php';
?>

<style>
    /* Styles intégrés pour les vidéos et l'outil UX */
    .video-container {
        position: relative;
        padding-bottom: 56.25%;
        height: 0;
        overflow: hidden;
        margin: 20px 0;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .video-container iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: none;
    }

    .ux-tool-container {
        background: #f8f9fa;
        border: 1px solid #e9ecef;
        border-radius: 12px;
        padding: 30px;
        margin: 30px 0;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        text-align: center;
    }

    .ux-tool-container h3 {
        margin-top: 0;
        color: #2c3e50;
    }

    .ux-step {
        display: none;
        animation: fadeIn 0.4s ease-in-out;
    }

    .ux-step.active {
        display: block;
    }

    .ux-question {
        font-size: 1.2em;
        font-weight: bold;
        margin-bottom: 20px;
        color: #333;
    }

    .ux-options {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        justify-content: center;
    }

    .ux-btn {
        background: #fff;
        border: 2px solid #3498db;
        color: #3498db;
        padding: 12px 24px;
        font-size: 1em;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-weight: bold;
    }

    .ux-btn:hover {
        background: #3498db;
        color: #fff;
    }

    .ux-result-box {
        background: #e8f6f3;
        border-left: 5px solid #1abc9c;
        padding: 20px;
        border-radius: 8px;
        text-align: left;
        margin-top: 20px;
    }

    .ux-warning-box {
        background: #fdedec;
        border-left: 5px solid #e74c3c;
        padding: 20px;
        border-radius: 8px;
        text-align: left;
        margin-top: 20px;
    }

    .cta-btn {
        display: inline-block;
        background: #e74c3c;
        color: #fff !important;
        padding: 12px 20px;
        border-radius: 6px;
        margin-top: 15px;
        text-align: center;
        text-decoration: none !important;
    }

    .cta-btn:hover {
        background: #c0392b;
    }

    .reset-btn {
        background: transparent;
        border: none;
        color: #7f8c8d;
        text-decoration: underline;
        margin-top: 20px;
        cursor: pointer;
    }

    .hashtag {
        color: var(--color-primary);
        font-weight: bold;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<article>

    <section class="article-hero" style="background-image: url('<?php echo $article_meta['image']; ?>');">
        <div class="article-hero-content">

            <nav class="breadcrumb">
                <a href="<?php echo BASE_URL; ?>">Accueil</a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
                <a href="<?php echo BASE_URL . $current_cat; ?>">
                    <?php echo htmlspecialchars($category['name']); ?>
                </a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
                <span>Bardage bois sur parpaing</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Bardage</span>
                <span class="article-tag">Façade</span>
                <span class="article-tag">Travaux</span>
                <span class="article-tag">DTU 41.2</span>
            </div>

            <h1>Bardage bois sur mur parpaing :<br><span class="h1-accent">le guide technique complet</span></h1>

            <div class="article-meta-header" style="flex-wrap: wrap; gap: 15px;">
                <a href="<?php echo BASE_URL; ?>philippe" class="author-badge-top">
                    <img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe">
                    <div class="author-badge-text">
                        Par <strong>Philippe</strong>
                        <span>Artisan RGE</span>
                    </div>
                </a>
                <div class="meta-item">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
                        <line x1="16" y1="2" x2="16" y2="6" />
                        <line x1="8" y1="2" x2="8" y2="6" />
                        <line x1="3" y1="10" x2="21" y2="10" />
                    </svg>
                    Mis à jour le
                    <?php echo format_date_fr($article_meta['date']); ?>
                </div>
                <div class="meta-item">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10" />
                        <polyline points="12 6 12 12 16 14" />
                    </svg>
                    Lecture :
                    <?php echo $article_meta['reading_time']; ?> min
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
                        <span class="sidebar-cat-name">
                            <?php echo htmlspecialchars($cat['name']); ?>
                        </span>
                    </a>
                <?php endforeach; ?>
            </div>
        </aside>

        <div class="article-container">

            <p class="article-intro">
                Poser un bardage bois sur un mur en parpaings, c'est l'une des transformations les plus efficaces pour
                rénover une façade et la protéger durablement. Mais le parpaing est un support minéral hydrophile et
                souvent creux : la préparation du mur, le choix des fixations et la création d'une lame d'air ne
                souffrent aucune improvisation. Ce guide vous détaille chaque étape, de l'état des lieux au vissage
                final, en conformité avec le DTU 41.2.
            </p>

            <div class="article-content">

                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                        </svg>
                        L'essentiel à retenir
                    </div>
                    <ul class="custom-list">
                        <li><strong>Support à diagnostiquer :</strong> Vérifiez la planéité (règle de 2 m), l'absence
                            d'humidité et la solidité des alvéoles avant toute fixation.</li>
                        <li><strong>Chevilles adaptées :</strong> Sur parpaing creux, utilisez impérativement des
                            chevilles à frapper longues (100–140 mm), jamais des chevilles à expansion simples.</li>
                        <li><strong>Lame d'air obligatoire :</strong> L'ossature en tasseaux (60 cm d'entraxe, 27×40 mm
                            minimum) doit laisser circuler l'air derrière les lames.</li>
                        <li><strong>Inox partout :</strong> Vis A2 en milieu standard, A4 en bord de mer. L'acier
                            standard tache le bois et casse en 2 à 3 ans.</li>
                        <li><strong>Essence de bois :</strong> Douglas (Classe 3) pour le meilleur rapport qualité/prix,
                            Mélèze ou Red Cedar pour les climats exigeants.</li>
                        <li><strong>3 erreurs fatales :</strong> Pas de lame d'air, vis non-inox, lames trop serrées
                            sans jeu de dilatation.</li>
                    </ul>
                </div>

                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li><a href="#diagnostic">1. Diagnostic : votre mur parpaing est-il prêt ?</a></li>
                        <li><a href="#materiel">2. Matériel : outillage et fournitures nécessaires</a></li>
                        <li><a href="#ossature">3. Étape 1 : fixer l'ossature bois sur le parpaing</a></li>
                        <li><a href="#pare-pluie">4. Étape 2 : pare-pluie et lame d'air</a></li>
                        <li><a href="#pose-lames">5. Étape 3 : pose des lames et finitions</a></li>
                        <li><a href="#ux-outil">⚙️ Outil : Trouvez l'essence de bois adaptée à votre façade</a></li>
                        <li><a href="#essence">6. Quelle essence de bois pour durer 30 ans ?</a></li>
                        <li><a href="#erreurs">7. Les 3 erreurs critiques à éviter</a></li>
                        <li><a href="#faq">FAQ, Questions fréquentes</a></li>
                    </ul>
                </div>

                <h2 id="diagnostic">Diagnostic : votre mur en parpaing est-il prêt pour un bardage ?</h2>

                <p>Avant de fixer le moindre tasseau, un état des lieux de la façade est impératif. Le parpaing, bien
                    que robuste, peut présenter des défauts de planéité qui se répercuteraient directement sur
                    l'alignement final du bois.</p>

                <img src="<?php echo BASE_URL; ?>image/bardage-bois-sur-mur-parpaing-1.webp"
                    alt="Artisan vérifiant la planéité d'un mur extérieur en parpaings avec une règle de maçon de 2 mètres et un niveau à bulle avant la pose d'une ossature bardage bois"
                    loading="lazy" style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <ul class="custom-list">
                    <li><strong>Planéité du mur :</strong> Passez une règle de 2 mètres sur la surface. Un écart
                        supérieur à 5 mm doit être rectifié ou compensé lors de la pose de l'ossature via des cales de
                        réglage.</li>
                    <li><strong>Étanchéité du support :</strong> Le mur doit être sain. Traces d'humidité ou remontées capillaires ? Consultez notre guide sur l'<a href="https://www.cemarenov.fr/etancheite-mur-parpaing-interieur">étanchéité mur parpaing intérieur</a>, traiter le problème à la source avant de fermer le mur derrière un bardage est impératif.</li>
                    <li><strong>Solidité des alvéoles :</strong> Le parpaing creux peut être fragile sur les bâtis
                        anciens. Testez toujours la tenue d'une cheville avant de lancer le chantier en série.</li>
                </ul>

                <h2 id="materiel">Inventaire : quel matériel pour fixer du bois sur de l'agglo ?</h2>

                <p>L'outillage doit être adapté à la fois au travail du bois et à la dureté du béton. Voici ce qu'il
                    faut prévoir pour 50 m² de façade (2 à 3 jours de chantier, 2 personnes recommandées).</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Outillage nécessaire</th>
                                <th>Matériaux à prévoir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Perforateur haute performance</strong></td>
                                <td>Tasseaux bois Classe 3 (27×40 mm minimum)</td>
                            </tr>
                            <tr>
                                <td><strong>Niveau laser</strong> (ou à bulle)</td>
                                <td>Chevilles à frapper longues (100 à 140 mm)</td>
                            </tr>
                            <tr>
                                <td><strong>Scie à onglet radiale</strong></td>
                                <td>Vis inox A2 (milieu standard) ou A4 (bord de mer)</td>
                            </tr>
                            <tr>
                                <td><strong>Visseuse à choc</strong></td>
                                <td>Grilles anti-rongeurs et bandes EPDM</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h3>Quelles chevilles choisir pour le parpaing creux ?</h3>

                <img src="<?php echo BASE_URL; ?>image/bardage-bois-sur-mur-parpaing-2.webp"
                    alt="Gros plan sur une cheville à frapper haute performance de 140 mm posée à côté d'une section de parpaing creux, illustrant l'ancrage dans la paroi alvéolaire"
                    loading="lazy" style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <p>C'est le point critique de toute pose sur agglo. Les chevilles à expansion simples risquent d'éclater
                    l'alvéole sous l'effet de la pression. Privilégiez les <strong>chevilles à frapper</strong> ou les
                    <strong>chevilles rallongées à collerette</strong> : elles traversent le tasseau et s'ancrent dans
                    la partie pleine du bloc, garantissant une résistance à l'arrachement efficace face aux charges de
                    vent.</p>

                <p><strong>Le collage est formellement exclu.</strong> Il ne permet pas de créer la lame d'air
                    indispensable à la pérennité du bois, et les mouvements hygrothermiques arracheraient rapidement les
                    points de colle sur un support minéral brut. Seule la fixation mécanique sur ossature est conforme
                    au DTU 41.2.</p>

                <p>Si vos lames ont été poncées et présentent des auréoles avant pose, notre guide sur les <a href="<?php echo BASE_URL; ?>tache-sur-bois-apres-poncage" style="text-decoration: underline;">taches sur bois après ponçage</a> vous donnera la méthode pour partir sur un support parfaitement propre.</p>

                <h2 id="ossature">Étape 1 : fixer l'ossature bois (les tasseaux) sur le parpaing</h2>

                <p>L'ossature constitue la structure porteuse du bardage. Son rôle est de maintenir les lames tout en
                    ménageant la circulation d'air derrière elles, condition sine qua non pour la durabilité du bois.
                </p>

                <img src="<?php echo BASE_URL; ?>image/bardage-bois-sur-mur-parpaing-3.webp"
                    alt="Installation de tasseaux de bois verticaux sur un mur en parpaing brut avec un entraxe régulier de 60 cm, fixés par des chevilles mécaniques apparentes"
                    loading="lazy" style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <ol style="margin-bottom: 20px; padding-left: 20px;">
                    <li><strong>Traçage :</strong> Marquez l'emplacement des tasseaux tous les 60 cm (entraxe standard
                        DTU).</li>
                    <li><strong>Perçage :</strong> Percez à travers le bois directement dans le parpaing avec le
                        perforateur.</li>
                    <li><strong>Fixation :</strong> Insérez la cheville à frapper et verrouillez. Contrôlez le niveau de
                        chaque tasseau.</li>
                    <li><strong>Joints de drainage :</strong> Laissez un espace de 10 mm entre deux tasseaux mis bout à
                        bout verticalement pour permettre l'écoulement de l'eau de condensation.</li>
                </ol>

                <h3>Pose verticale ou horizontale : quel impact sur l'ossature ?</h3>

                <p>Pour un bardage posé <strong>horizontalement</strong> (le classique), les tasseaux sont verticaux.
                    Pour un bardage posé <strong>verticalement</strong> (effet contemporain), il faut installer une
                    <strong>double ossature</strong> (contre-lattage croisé) afin de garantir que l'air circule de bas
                    en haut sans obstruction. Ne pas respecter cette règle annihile la ventilation et condamne le bois à
                    moyen terme.</p>

                <h2 id="pare-pluie">Étape 2 : pose du pare-pluie sur mur parpaing et création de la lame d'air</h2>

                <p>Sur un mur en parpaing, la gestion de l'humidité est le facteur numéro un de réussite. Un mur humide
                    sous un bardage mal ventilé, c'est la garantie de moisissures en moins de cinq ans.</p>

                <img src="<?php echo BASE_URL; ?>image/bardage-bois-sur-mur-parpaing-4.webp"
                    alt="Bande d'étanchéité EPDM noire agrafée sur la face avant d'un tasseau vertical et grille anti-rongeur fixée en pied de mur parpaing avant la pose du bardage bois"
                    loading="lazy" style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <ul class="custom-list">
                    <li><strong>Le pare-pluie :</strong> Même sur un support lourd comme le parpaing, la pose d'un
                        pare-pluie est vivement conseillée dans les régions exposées aux vents dominants. Il protège le
                        mur des infiltrations accidentelles sans bloquer la vapeur d'eau.</li>
                    <li><strong>La grille anti-rongeur :</strong> Fixée en pied de mur, elle ferme l'entrée de la lame
                        d'air contre les souris et les guêpes tout en laissant passer l'air librement.</li>
                    <li><strong>La bande EPDM :</strong> Une bande de caoutchouc noir posée sur chaque tasseau protège
                        le bois de l'ossature de l'humidité stagnante qui s'infiltre entre les lames.</li>
                </ul>

                <h2 id="pose-lames">Étape 3 : la pose des lames de bardage et les finitions</h2>

                <p>Une fois l'ossature prête, la pose du bois peut commencer. C'est l'étape la plus visible, et celle
                    où les petits détails font toute la différence sur la longévité du résultat.</p>

                <img src="<?php echo BASE_URL; ?>image/bardage-bois-sur-mur-parpaing-5.webp"
                    alt="Zoom sur l'emboîtement de deux lames de bardage en bois de Douglas, languette vers le haut, avec fixation par pointe inox dans la rainure"
                    loading="lazy" style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <ul class="custom-list">
                    <li><strong>Le départ :</strong> Installez la première lame à 15–20 cm du sol pour éviter les
                        remontées d'eau et les projections de boue.</li>
                    <li><strong>L'emboîtement :</strong> Placez toujours la languette vers le haut et la rainure vers le
                        bas pour que l'eau de pluie ne s'accumule pas dans le profilé.</li>
                    <li><strong>Le vissage :</strong> Utilisez deux vis inox par point d'appui dès que la lame dépasse
                        125 mm de largeur, pour éviter le tuilage (courbure dans le temps).</li>
                    <li><strong>Le jeu de dilatation :</strong> Ne serrez jamais les lames bord à bord. Un léger jeu est
                        indispensable pour absorber les mouvements hygrothermiques du bois.</li>
                </ul>

                <h3>Comment gérer les angles et les ouvertures ?</h3>

                <img src="<?php echo BASE_URL; ?>image/bardage-bois-sur-mur-parpaing-6.webp"
                    alt="Profilé de finition en aluminium gris sur un angle sortant de maison assurant la jonction entre deux pans de bardage bois horizontaux"
                    loading="lazy" style="width: 100%; border-radius: 8px; margin-bottom: 1.5rem;">

                <p>Pour les angles, deux solutions s'offrent à vous : la <strong>coupe d'onglet</strong> (esthétique
                    mais exigeante techniquement) ou le <strong>profilé d'angle en aluminium</strong>. Cette seconde
                    option est recommandée pour sa durabilité et sa capacité à absorber les légères dilatations du bois
                    sans rouvrir. Autour des fenêtres et des portes, prévoyez des baguettes de finition et veillez à ne
                    jamais obstruer la circulation d'air en pied d'allège.</p>

                <h2 id="ux-outil">⚙️ Trouvez l'essence de bois adaptée à votre façade</h2>

                <div id="ux-tool" class="ux-tool-container">
                    <h3>Quel bois bardage choisir pour votre projet ?</h3>

                    <div id="step-1" class="ux-step active">
                        <div class="ux-question">1. Dans quel type de région se trouve votre maison ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(1, 'mer')">Bord de mer / littoral</button>
                            <button class="ux-btn" onclick="saveAnswer(1, 'montagne')">Altitude / montagne</button>
                            <button class="ux-btn" onclick="saveAnswer(1, 'standard')">Intérieur des terres</button>
                        </div>
                    </div>

                    <div id="step-2" class="ux-step">
                        <div class="ux-question">2. Quel est votre niveau d'exigence en termes d'entretien ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(2, 'zero')">Zéro entretien (je veux
                                oublier)</button>
                            <button class="ux-btn" onclick="saveAnswer(2, 'peu')">Un traitement tous les 5–7 ans, ça
                                va</button>
                        </div>
                    </div>

                    <div id="step-3" class="ux-step">
                        <div class="ux-question">3. Quel est votre budget pour le bois (hors pose) ?</div>
                        <div class="ux-options">
                            <button class="ux-btn" onclick="saveAnswer(3, 'eco')">Économique (20–35 €/m²)</button>
                            <button class="ux-btn" onclick="saveAnswer(3, 'premium')">Premium (45 €/m² et plus)</button>
                        </div>
                    </div>

                    <div id="step-result" class="ux-step">
                        <div id="success-result" class="ux-result-box" style="display: none;">
                            <h4 style="margin-top:0; color:#16a085;">🌲 Notre recommandation :</h4>
                            <p id="result-text"></p>
                        </div>
                        <div id="warning-result" class="ux-warning-box" style="display: none;">
                            <h4 style="margin-top:0; color:#c0392b;">Attention : contrainte spécifique détectée</h4>
                            <p id="warning-text"></p>
                        </div>
                        <button class="reset-btn" onclick="resetTool()">Recommencer le test</button>
                    </div>
                </div>

                <h2 id="essence">Quelle essence de bois choisir pour un bardage qui dure 30 ans ?</h2>

                <p>Le parpaing est éternel, mais le bois ne l'est pas sans un minimum de rigueur au moment du choix.
                    L'essence détermine la durabilité naturelle, la stabilité dimensionnelle et le rythme d'entretien.
                </p>

                <ul class="custom-list">
                    <li><strong>Douglas (Classe 3) :</strong> Le standard du marché français. Son cœur (duramen) est
                        naturellement imputrescible. Excellent rapport qualité/prix, disponible partout en scierie.</li>
                    <li><strong>Mélèze :</strong> Très dense et naturellement résistant à l'humidité. Idéal pour les
                        poses en altitude ou dans les régions à pluviométrie élevée.</li>
                    <li><strong>Red Cedar :</strong> Très stable dimensionnellement, il résiste aux chocs
                        hygrothermiques. Plus onéreux, mais quasi-zéro entretien sur 20 ans.</li>
                    <li><strong>Bois brûlé (Shou Sugi Ban) :</strong> Technique ancestrale japonaise qui carbonise
                        superficiellement le bois pour le rendre insensible aux UV, aux insectes et à l'humidité.
                        Esthétique unique, durabilité exceptionnelle sans traitement chimique.</li>
                </ul>

                <h2 id="erreurs">Les 3 erreurs critiques qui font pourrir un bardage sur agglo</h2>

                <ul class="custom-list">
                    <li><strong>Erreur 1, L'absence de lame d'air :</strong> Si l'air ne circule pas, l'humidité reste
                        prisonnière entre le parpaing et le bois. Moisissures et pourrissement apparaissent en moins de
                        cinq ans. C'est la cause n°1 des bardages ratés.</li>
                    <li><strong>Erreur 2, Les vis standard :</strong> Le bois extérieur oxyde l'acier ordinaire. Des
                        coulures noires apparaîtront sur vos lames avant même que les vis ne commencent à casser. Vis
                        inox A2 obligatoire, A4 en milieu marin.</li>
                    <li><strong>Erreur 3, Brider les lames :</strong> Le bois gonfle en hiver et se rétracte en été.
                        Des lames posées sans jeu de dilatation gondolent, se fendillent ou arrachent leurs fixations.
                        Ce mouvement est normal et prévisible, anticipez-le.</li>
                </ul>

                <h2 id="faq">FAQ, Questions fréquentes</h2>

                <h3>Comment fixer du bois sur parpaing sans vis ?</h3>
                <p>C'est impossible pour un bardage extérieur durable. Des systèmes de clips existent sur le marché,
                    mais ils doivent eux-mêmes être mécaniquement fixés dans l'ossature. Le collage direct sur parpaing
                    est formellement exclu par le DTU 41.2.</p>

                <h3>Peut-on poser un bardage bois sur un mur déjà enduit ?</h3>
                <p>Oui, à condition que l'enduit soit sain, adhérent et ne se décolle pas. Il faudra utiliser des
                    chevilles plus longues pour compenser l'épaisseur de l'enduit et atteindre le parpaing avec un
                    ancrage suffisant. Un test de traction préalable sur quelques points est conseillé.</p>

                <h3>Quel est le bardage bois le plus résistant ?</h3>
                <p>Le Robinier (faux-acacia) est l'essence naturellement la plus durable en Europe, mais sa
                    disponibilité en lames calibrées reste limitée. Le Douglas traité en Classe 3 ou 4 demeure la
                    référence la plus utilisée en France pour sa stabilité sur support minéral et son excellente
                    disponibilité en négoce.</p>

                <h3>Faut-il un permis de construire pour poser un bardage bois ?</h3>
                <p>Dans la plupart des cas, une simple déclaration préalable de travaux suffit dès lors que le bardage modifie l'aspect extérieur de la construction. En zone protégée (ABF, secteur sauvegardé) ou pour un bâtiment classé, vérifiez systématiquement les règles auprès de votre mairie avant de commander les matériaux. Si vous envisagez également de couvrir la construction, notre guide sur la <a href="https://www.cemarenov.fr/charpente-1-pan-sur-parpaing">charpente 1 pan sur parpaing</a> détaille les contraintes structurelles pour ajouter un toit monopente sur un mur existant.</p>

                <h3>Bardage bois ou enduit : comment choisir ?</h3>
                <p>L'enduit classique reste la solution la plus économique à court terme, mais elle contraint à un rejointoiement régulier. Le bardage bois, une fois bien posé sur ossature ventilée, demande peu d'entretien pendant 20 à 30 ans. Si vous hésitez encore, notre dossier <a href="https://www.cemarenov.fr/mur-parpaing-sans-enduit">peut-on laisser un mur en parpaing sans enduit</a> expose les risques du béton brut non protégé et les alternatives disponibles.</p>
<p>Si vous préférez une finition plus homogène sur l'ensemble de la façade, le <a href="https://www.cemarenov.fr/crepi-facade">crépi façade</a> offre une protection imperméable et durable à un coût généralement inférieur au bardage bois.</p>

            </div>

            <div class="author-box-bottom">
                <div class="author-box-img">
                    <img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe">
                </div>
                <div class="author-box-content">
                    <h3>Philippe</h3>
                    <span class="author-role">Expert Rénovation &amp; Artisan RGE</span>
                    <p>Avec plus de 20 ans d'expérience sur les chantiers de ravalement et d'isolation, Philippe
                        maîtrise la pose de bardage bois sur tous types de supports maçonnés, du parpaing au béton
                        banché.</p>
                    <a href="<?php echo BASE_URL; ?>philippe" class="btn-outline">Voir son profil complet</a>
                </div>
            </div>

            <div class="conclusion-box">
                <h3>Votre façade mérite un diagnostic professionnel</h3>
                <p>Avant de vous lancer, une évaluation du support (planéité, humidité, état des alvéoles) par un
                    artisan qualifié vous évitera les mauvaises surprises en cours de chantier.</p>
                <a href="<?php echo BASE_URL; ?>contact" class="btn-primary">Obtenir un devis gratuit</a>
            </div>

            <section class="similar-articles">
                <h3 class="similar-title">Articles similaires</h3>
                <div class="similar-grid">
                    <?php foreach ($similar_articles as $art): ?>
                        <a href="<?php echo $art['url'] ?? '#'; ?>" class="similar-card">
                            <div class="similar-img">
                                <img src="<?php echo $art['image']; ?>"
                                    alt="<?php echo htmlspecialchars($art['title']); ?>">
                            </div>
                            <h4>
                                <?php echo htmlspecialchars($art['title']); ?>
                            </h4>
                        </a>
                    <?php endforeach; ?>
                </div>
            </section>

        </div>

        <aside class="sidebar-right">
            <div class="sidebar-sticky">

                <div class="sidebar-block">
                    <h3 class="sidebar-title">Derniers articles,
                        <?php echo htmlspecialchars($category['name'] ?? ''); ?>
                    </h3>
                    <?php foreach ($cat_articles as $art): ?>
                        <a href="<?php echo $art['url'] ?? '#'; ?>" class="sidebar-article-card">
                            <img src="<?php echo $art['image']; ?>" alt="<?php echo htmlspecialchars($art['title']); ?>">
                            <span>
                                <?php echo htmlspecialchars($art['title']); ?>
                            </span>
                        </a>
                    <?php endforeach; ?>
                </div>

                <div class="sidebar-block">
                    <h3 class="sidebar-title">Les plus récents</h3>
                    <?php foreach ($latest_articles as $art): ?>
                        <a href="<?php echo $art['url'] ?? '#'; ?>" class="sidebar-article-card">
                            <img src="<?php echo $art['image']; ?>" alt="<?php echo htmlspecialchars($art['title']); ?>">
                            <span>
                                <?php echo htmlspecialchars($art['title']); ?>
                            </span>
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
        if (userAnswers.step1 === 'mer') {
            warningBox.style.display = 'block';
            warningText.innerHTML = "<strong>Environnement marin :</strong> Le sel et l'humidité exigent du <strong>Red Cedar</strong> ou du <strong>bois brûlé (Shou Sugi Ban)</strong>. Visserie inox <strong>A4 obligatoire</strong>. Oubliez le Douglas en traitement standard dans cette zone, sa durabilité sera divisée par deux.";
        } else if (userAnswers.step1 === 'montagne' || userAnswers.step2 === 'zero') {
            successBox.style.display = 'block';
            resultText.innerHTML = "<strong>Notre choix :</strong> <strong>Mélèze naturel ou bois brûlé</strong>. Dense, imputrescible sans traitement, il encaisse les cycles gel/dégel sans se délaminer. Zéro entretien chimique sur 25 ans si la lame d'air est bien réalisée.";
        } else if (userAnswers.step3 === 'eco') {
            successBox.style.display = 'block';
            resultText.innerHTML = "<strong>Notre choix :</strong> <strong>Douglas Classe 3</strong>. C'est la référence du marché français : rapport qualité/prix imbattable, disponible en toute scierie, cœur naturellement imputrescible. Un traitement lasure tous les 5–7 ans suffit à maintenir l'aspect.";
        } else {
            successBox.style.display = 'block';
            resultText.innerHTML = "<strong>Notre choix :</strong> <strong>Red Cedar ou Robinier</strong>. Stabilité dimensionnelle maximale, très peu de mouvement avec les variations d'humidité. Idéal si vous souhaitez une pose soignée avec des joints réguliers qui restent réguliers dans le temps.";
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
        'question' => "Comment fixer du bois sur parpaing sans vis ?",
        'answer' => "C'est impossible pour un bardage extérieur durable. Des systèmes de clips existent sur le marché, mais ils doivent eux-mêmes être mécaniquement fixés dans l'ossature. Le collage direct sur parpaing est formellement exclu par le DTU 41.2."
    ],
    [
        'question' => "Peut-on poser un bardage bois sur un mur déjà enduit ?",
        'answer' => "Oui, à condition que l'enduit soit sain, adhérent et ne se décolle pas. Il faudra utiliser des chevilles plus longues pour compenser l'épaisseur de l'enduit et atteindre le parpaing avec un ancrage suffisant. Un test de traction préalable sur quelques points est conseillé."
    ],
    [
        'question' => "Quel est le bardage bois le plus résistant ?",
        'answer' => "Le Robinier (faux-acacia) est l'essence naturellement la plus durable en Europe, mais sa disponibilité en lames calibrées reste limitée. Le Douglas traité en Classe 3 ou 4 demeure la référence la plus utilisée en France pour sa stabilité sur support minéral et son excellente disponibilité en négoce."
    ],
    [
        'question' => "Faut-il un permis de construire pour poser un bardage bois ?",
        'answer' => "Dans la plupart des cas, une simple déclaration préalable de travaux suffit dès lors que le bardage modifie l'aspect extérieur de la construction. En zone protégée (ABF, secteur sauvegardé) ou pour un bâtiment classé, vérifiez systématiquement les règles auprès de votre mairie avant de commander les matériaux."
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