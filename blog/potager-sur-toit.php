<?php
// published: 2026-04-05 08:00
/**
 * potager-sur-toit.php
 * Article : Comment faire un potager sur le toit : le guide pas-à-pas anti-galères
 * Site : Expert Renov' (cemarenov.fr)
 * Date : 2026-04-05
 */


$article_meta = [
    'title'        => 'Comment faire un potager sur le toit : le guide pas-à-pas',
    'category'     => 'maison',
    'slug'         => 'potager-sur-toit',
    'image'        => 'https://www.cemarenov.fr/image/potager-toit-1.webp',
    'excerpt'      => 'Transformer votre toit en potager urbain ? Découvrez notre guide pas-à-pas pour vérifier la portance, choisir les bons bacs, et anticiper les galères liées à la météo et aux nuisibles.',
    'date'         => '2026-04-05',
    'reading_time' => 9,
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
    .ux-module { background-color: var(--color-light, #f9f9f9); border: 2px solid var(--color-primary, #27ae60); border-radius: 10px; padding: 25px; margin: 40px 0; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
    .ux-module h3 { margin-top: 0; color: var(--color-primary, #27ae60); display: flex; align-items: center; }
    .ux-module label { display: block; margin: 15px 0 5px; font-weight: bold; }
    .ux-module select { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 16px; margin-bottom: 15px; }
    .ux-btn { display: block; width: 100%; background-color: var(--color-primary, #27ae60); color: white; border: none; padding: 15px; font-size: 18px; font-weight: bold; border-radius: 5px; margin-top: 10px; cursor: pointer; transition: opacity 0.3s; }
    .ux-btn:hover { opacity: 0.9; }
    #ux-result { display: none; margin-top: 20px; padding: 20px; background-color: #fff; border-left: 5px solid var(--color-primary, #27ae60); border-radius: 5px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); }
    .hashtag { color: var(--color-primary, #2980b9); font-weight: bold; }
</style>


<article>


    <section class="article-hero" style="background-image: url('<?php echo $article_meta['image']; ?>');">
        <div class="article-hero-content">

            <nav class="breadcrumb">
                <a href="<?php echo BASE_URL; ?>">Accueil</a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                <a href="<?php echo BASE_URL . $current_cat; ?>"><?php echo htmlspecialchars($category['name']); ?></a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                <span>Potager sur toit</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Toiture</span>
                <span class="article-tag">Potager</span>
                <span class="article-tag">Aménagement</span>
                <span class="article-tag">Écologie</span>
            </div>

            <h1>Comment faire un potager sur le toit : je vous guide !</h1>

            <div class="article-meta-header" style="flex-wrap: wrap; gap: 15px;">
                <a href="<?php echo BASE_URL; ?>philippe" class="author-badge-top">
                    <img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe" width="40" height="40">
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
                        <img src="<?php echo $cat['image']; ?>" alt="<?php echo htmlspecialchars($cat['name']); ?>" width="60" height="60" loading="lazy">
                        <span class="sidebar-cat-name"><?php echo htmlspecialchars($cat['name']); ?></span>
                    </a>
                <?php endforeach; ?>
            </div>
        </aside>

        <div class="article-container">

            <p class="article-intro">
                Cultiver un potager sur votre toit-terrasse, c'est possible, mais ça demande de la méthode. Vent fort, soleil direct, contraintes de poids : les défis sont réels. Voici un plan d'action concret pour installer votre potager en hauteur, choisir le bon matériel et éviter les erreurs classiques.
            </p>

            <div class="article-content">

                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                        L'essentiel à retenir
                    </div>
                    <ul class="custom-list">
                        <li><strong>Sécurité absolue :</strong> Valider la portance du toit (kg/m²) et son étanchéité avant d'installer le moindre bac.</li>
                        <li><strong>Le bon équipement :</strong> Utiliser des bacs hors-sol avec feutre géotextile.</li>
                        <li><strong>Le piège du poids :</strong> Ne jamais utiliser 100% de terre. Créer un substrat très allégé (billes d'argile, perlite, compost).</li>
                        <li><strong>Défenses :</strong> Anticiper le vent avec des fixations et les oiseaux avec des filets de protection.</li>
                        <li><strong>Cultures recommandées :</strong> Salades, aromates, tomates cerises et fraises. Éviter les légumes à racines profondes.</li>
                    </ul>
                </div>

                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li>1. Quel est votre budget ? 3 options pour se lancer</li>
                        <li>2. Étape 1 : Vérifier la faisabilité et la sécurité du toit</li>
                        <li>3. Étape 2 : Le choix et l'installation des bacs de culture</li>
                        <li>⚙️ Outil : Obtenez votre plan d'action sur-mesure</li>
                        <li>4. Étape 3 : Remplir avec un substrat léger</li>
                        <li>5. Étape 4 : Gérer l'irrigation face au vent et au soleil</li>
                        <li>6. Anticiper les galères : météo, oiseaux et rongeurs</li>
                        <li>7. Quels légumes et fruits faire pousser en hauteur ?</li>
                        <li>FAQ, Questions fréquentes</li>
                    </ul>
                </div>

                <h2 id="budget">1. Quel est votre budget ? 3 options pour lancer son potager urbain</h2>

                <p>Avant d'acheter le moindre sac de <span class="hashtag">#terre</span>, définissez votre budget. Voici trois approches pour adapter le projet à votre portefeuille :</p>

                <ul class="custom-list">
                    <li><strong>L'option Low Cost (0 - 100 €) :</strong> Utilisez des matériaux de récupération. Transformez des palettes en bois (non traité) ou de vieux fûts en contenants. Optez pour des pots en plastique (plus légers que la terre cuite) et un terreau universel basique.</li>
                    <li><strong>L'option Normale (100 - 300 €) :</strong> Achetez des carrés potagers en bois FSC en kit, prêts à monter. Investissez dans un bon mélange de terre et de compost, ainsi que dans quelques outils de base.</li>
                    <li><strong>L'option Premium (+ 300 €) :</strong> Faites sur-mesure. Optez pour des bacs surélevés (pour épargner votre dos) intégrant une réserve d'<span class="hashtag">#eau</span>, installez un système d'irrigation en goutte-à-goutte automatisé et utilisez un substrat professionnel ultra-allégé.</li>
                </ul>

                <h2 id="etape1">2. Étape 1 : Vérifier la faisabilité (Sécurité et poids du toit)</h2>

                <!-- FIX PERF : width + height explicites sur toutes les images -->
                <img src="<?php echo BASE_URL; ?>image/potager-toit-2.webp"
                     alt="Vérification de la portance d'un toit plat avant l'installation de bacs de culture"
                     loading="lazy" width="800" height="450"
                     style="width: 100%; height: auto; border-radius: 8px; margin-bottom: 1.5rem;">

                <p>C'est l'étape incontournable. Un toit n'est pas toujours conçu pour supporter des tonnes de terre mouillée.</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr><th>Point de contrôle</th><th>Pourquoi c'est vital</th></tr>
                        </thead>
                        <tbody>
                            <tr><td><strong>La portance (kg/m²)</strong></td><td>Un toit classique supporte 140 à 160 kg/m², nécessitant peu de terre. Un toit renforcé peut aller jusqu'à 400 kg/m². À vérifier avec un architecte.</td></tr>
                            <tr><td><strong>L'étanchéité</strong></td><td>La membrane d'étanchéité doit être impeccable pour que l'eau d'arrosage ne s'infiltre pas dans l'immeuble.</td></tr>
                            <tr><td><strong>Les autorisations</strong></td><td>En copropriété, l'accord formel du syndicat est obligatoire avant toute installation en toiture.</td></tr>
                        </tbody>
                    </table>
                </div>

                <p><em>Exemple d'aménagement sur une petite structure (idéal pour comprendre les contraintes de poids avant de s'attaquer à un grand toit) :</em></p>

                <!-- FIX PERF : YouTube facade, zéro JS/cookie YouTube au chargement, iframe créée au clic uniquement -->
                <div class="yt-facade" data-id="UUvLkYvu_mM" data-title="Alternative : potager sur toit de garage"></div>

                <h2 id="etape2">3. Étape 2 : Le choix et l'installation des bacs de culture</h2>

                <p>Puisque vous ne pouvez pas creuser, la culture hors-sol est obligatoire.</p>

                <ul class="custom-list">
                    <li><strong>La profondeur :</strong> Pour alléger la structure, privilégiez un <span class="hashtag">#bac</span> ou une <span class="hashtag">#jardinière</span> d'environ 20 à 30 cm de profondeur. C'est suffisant pour la majorité des cultures de toit.</li>
                    <li><strong>Le géotextile :</strong> Indispensable. Agrafez un feutre géotextile au fond et sur les parois intérieures de vos bacs en bois. Cela empêche la terre de s'échapper par les fentes tout en drainant l'eau.</li>
                    <li><strong>L'espacement :</strong> Laissez au moins 80 cm d'allée entre vos bacs pour pouvoir circuler, arroser et récolter confortablement.</li>
                </ul>

                <p><em>Voici deux tutoriels simples pour monter vos bacs de façon optimale :</em></p>

                <!-- FIX PERF : YouTube facades -->
                <div class="yt-facade" data-id="vX_uGsGbLJs" data-title="Tutoriel carré potager 1"></div>
                <div class="yt-facade" data-id="F4G6Er-lxEU" data-title="Tutoriel carré potager 2"></div>

                <div id="ux-outil" class="ux-module">
                    <h3>⚙️ Obtenez votre plan d'action sur-mesure</h3>
                    <p>Répondez à ces 3 questions rapides pour recevoir une liste de courses et une recommandation personnalisée pour votre <span class="hashtag">#projet</span>.</p>

                    <label for="ux-surface">1. De quelle surface disposez-vous ?</label>
                    <select id="ux-surface">
                        <option value="small">Moins de 5 m² (Petit balcon / toit exigu)</option>
                        <option value="medium">Entre 5 et 15 m² (Terrasse standard)</option>
                        <option value="large">Plus de 15 m² (Grand toit plat)</option>
                    </select>

                    <label for="ux-budget">2. Quel est votre budget maximum ?</label>
                    <select id="ux-budget">
                        <option value="low">0 - 150 € (Mode débrouille & récup)</option>
                        <option value="mid">150 - 400 € (Confort standard)</option>
                        <option value="high">Plus de 400 € (Installation Premium)</option>
                    </select>

                    <label for="ux-time">3. Quel temps pouvez-vous y consacrer par semaine ?</label>
                    <select id="ux-time">
                        <option value="low_time">1h maximum (Je veux du facile)</option>
                        <option value="high_time">3h et plus (J'ai la main verte)</option>
                    </select>

                    <button class="ux-btn" onclick="generatePlan()">Générer mon plan d'action</button>
                    <div id="ux-result"></div>
                </div>

                <h2 id="etape3">4. Étape 3 : Remplir avec un substrat léger (pour soulager la toiture)</h2>

                <p>Ne remplissez jamais vos bacs uniquement avec de la terre végétale classique : une fois gorgée d'eau, elle pèse extrêmement lourd et risque de surcharger la structure. Créez un <span class="hashtag">#sol</span> léger, drainant et nourrissant :</p>

                <ol style="margin-bottom: 20px; padding-left: 20px;">
                    <li><strong>Le drainage (au fond) :</strong> Étalez une couche de 5 à 10 cm de billes d'argile ou de pouzzolane au fond du bac.</li>
                    <li><strong>Le <span class="hashtag">#substrat</span> (au-dessus) :</strong> Préparez un mélange composé à parts égales de terreau léger, de <span class="hashtag">#compost</span> naturel et d'un peu de perlite pour aérer le tout et alléger considérablement le poids final.</li>
                </ol>

                <h2 id="etape4">5. Étape 4 : Gérer l'irrigation face au vent et au soleil</h2>

                <!-- FIX PERF : width + height explicites -->
                <img src="<?php echo BASE_URL; ?>image/potager-toit-3.webp"
                     alt="Système de goutte-à-goutte installé dans un carré potager sur un toit"
                     loading="lazy" width="800" height="450"
                     style="width: 100%; height: auto; border-radius: 8px; margin-bottom: 1.5rem;">

                <p>Sur un toit, l'exposition est maximale. L'eau s'évapore à une vitesse folle.</p>

                <ul class="custom-list">
                    <li><strong>Le paillage est obligatoire :</strong> Recouvrez toujours la terre de copeaux de bois, de chanvre ou même de cartons bruts. Cela garde la fraîcheur du sol et divise vos besoins en eau par deux.</li>
                    <li><strong>L'arrosage stratégique :</strong> Oubliez l'arrosoir manuel si vous manquez de temps. Installez un réseau de goutte-à-goutte relié à un programmateur.</li>
                    <li><strong>Récupération :</strong> Si possible, installez un petit récupérateur d'eau de <span class="hashtag">#pluie</span> pour faire des économies et offrir une eau non chlorée à vos plants.</li>
                </ul>

                <h2 id="galeres">6. Anticiper les galères : météo, oiseaux et rongeurs</h2>

                <blockquote class="article-blockquote">
                    <p>"J'ai vu de superbes potagers anéantis en une nuit de tempête ou picorés par des pigeons au petit matin. En toiture, l'anticipation est la clé : fixez, protégez et ombragez avant que le problème n'arrive !"</p>
                </blockquote>

                <p>Un potager en hauteur est extrêmement exposé. Prenez les devants :</p>

                <ul class="custom-list">
                    <li><strong>Le vent :</strong> Les rafales peuvent coucher vos plants et assécher les feuilles. Fixez solidement vos structures et installez des brise-vents (toile tendue ou haie <span class="hashtag">#végétal</span> en périphérie).</li>
                    <li><strong>Le cagnard :</strong> Un toit en plein été peut se transformer en four. Prévoyez une toile d'ombrage à déployer lors des canicules pour éviter de brûler vos cultures.</li>
                    <li><strong>Les oiseaux et nuisibles :</strong> Les pigeons et corneilles adorent les jeunes pousses. Dès le semis, installez des filets de protection ou utilisez des fûts en plastique coupés en deux en guise de cloches protectrices.</li>
                </ul>

                <h2 id="legumes">7. Quels légumes et fruits faire pousser en hauteur ?</h2>

                <p>Avec une profondeur de bac limitée (souvent 15 à 20 cm), ciblez les bonnes espèces pour ne pas essuyer d'échecs frustrants :</p>

                <div style="background-color: var(--color-light); border-left: 4px solid var(--color-primary); padding: 1.5rem; margin-bottom: 2rem; border-radius: 0 8px 8px 0;">
                    <ul class="custom-list" style="margin: 0;">
                        <li><strong>Les stars du toit :</strong> Misez sur tout ce qui est <span class="hashtag">#aromatique</span> (basilic, thym, menthe) et le <span class="hashtag">#légume</span> feuille (salades, épinards, blettes).</li>
                        <li><strong>Pour picorer :</strong> Les tomates cerises, les radis (croissance extrêmement rapide) et les fraisiers s'adaptent parfaitement à la vie en bacs.</li>
                        <li><strong>À éviter absolument :</strong> Fuyez les légumes à racines très profondes comme les carottes longues, ou les grandes cultures très lourdes et sensibles au vent comme le maïs.</li>
                    </ul>
                </div>

                <h2 id="faq">FAQ, Questions fréquentes</h2>

                <h3>Mon immeuble ancien peut-il supporter un potager en bac ?</h3>
                <p>La portance varie énormément d'un bâtiment à l'autre. Un bac rempli de terre humide pèse très lourd. Demandez systématiquement l'avis d'un professionnel (architecte ou bureau d'études de la copropriété) pour valider la charge au mètre carré.</p>

                <h3>Puis-je utiliser l'eau de pluie qui ruisselle sur mon toit en asphalte ?</h3>
                <p>C'est déconseillé pour un usage alimentaire. Les toitures en bardeaux d'asphalte ou goudronnées peuvent relâcher des hydrocarbures et des métaux lourds dans l'eau. Privilégiez l'eau du réseau ou la pluie récoltée directement dans des contenants propres aériens.</p>

                <h3>Que faire de mes déchets végétaux sur le toit ?</h3>
                <p>Intégrez un petit bac à compost fermé (type lombricomposteur) dans un coin ombragé de votre terrasse. Cela vous permettra de recycler vos déchets organiques directement sur place et de recréer du terreau riche pour la saison suivante.</p>

            </div>

            <div class="author-box-bottom">
                <div class="author-box-img">
                    <img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe" width="80" height="80">
                </div>
                <div class="author-box-content">
                    <h3>Philippe</h3>
                    <span class="author-role">Expert Rénovation &amp; Artisan RGE</span>
                    <p>Avec plus de 20 ans d'expérience sur les chantiers, Philippe vous partage ses conseils concrets et sans langue de bois pour tous vos projets d'aménagement et de toiture.</p>
                    <a href="<?php echo BASE_URL; ?>philippe" class="btn-outline">Voir son profil complet</a>
                </div>
            </div>

            <div class="conclusion-box">
                <h3>Besoin de vérifier la structure de votre toiture ?</h3>
                <p>Avant de lancer un grand projet de végétalisation ou de potager sur votre toit, il est parfois nécessaire de faire contrôler l'étanchéité et la charpente par des professionnels.</p>
                <a href="<?php echo BASE_URL; ?>contact" class="btn-primary">Obtenir un avis ou un devis gratuit</a>
            </div>

            <section class="similar-articles">
                <h3 class="similar-title">Articles similaires</h3>
                <div class="similar-grid">
                    <?php foreach ($similar_articles as $art): ?>
                        <a href="<?php echo $art['url'] ?? '#'; ?>" class="similar-card">
                            <div class="similar-img">
                                <img src="<?php echo $art['image']; ?>" alt="<?php echo htmlspecialchars($art['title']); ?>" width="300" height="200" loading="lazy" style="width:100%;height:auto;">
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
                    <h3 class="sidebar-title">Derniers articles, <?php echo htmlspecialchars($category['name'] ?? 'Aménagement'); ?></h3>
                    <?php foreach ($cat_articles as $art): ?>
                        <a href="<?php echo $art['url'] ?? '#'; ?>" class="sidebar-article-card">
                            <img src="<?php echo $art['image']; ?>" alt="<?php echo htmlspecialchars($art['title']); ?>" width="80" height="60" loading="lazy" style="width:80px;height:60px;object-fit:cover;">
                            <span><?php echo htmlspecialchars($art['title']); ?></span>
                        </a>
                    <?php endforeach; ?>
                </div>

                <div class="sidebar-block">
                    <h3 class="sidebar-title">Les plus récents</h3>
                    <?php foreach ($latest_articles as $art): ?>
                        <a href="<?php echo $art['url'] ?? '#'; ?>" class="sidebar-article-card">
                            <img src="<?php echo $art['image']; ?>" alt="<?php echo htmlspecialchars($art['title']); ?>" width="80" height="60" loading="lazy" style="width:80px;height:60px;object-fit:cover;">
                            <span><?php echo htmlspecialchars($art['title']); ?></span>
                        </a>
                    <?php endforeach; ?>
                </div>

            </div>
        </aside>

    </div>
</article>


<script>
    function generatePlan() {
        const budget = document.getElementById('ux-budget').value;
        const time   = document.getElementById('ux-time').value;
        const resultDiv = document.getElementById('ux-result');

        let content = '<h4 style="margin-top:0; color:var(--color-primary);">🎯 Voici votre Plan d\'Action :</h4><ul class="custom-list">';

        if (budget === 'low') {
            content += '<li><strong>Matériel :</strong> Récupérez 2 ou 3 palettes solides. Achetez uniquement du géotextile (10€) et 100L de terreau universel basique.</li>';
            content += '<li><strong>Le conseil budget :</strong> Réutilisez des bouteilles d\'eau percées et plantées dans la terre pour faire un goutte-à-goutte 100% gratuit.</li>';
        } else if (budget === 'mid') {
            content += '<li><strong>Matériel :</strong> Achetez 2 carrés potagers en bois FSC (env. 60€/pièce). Commandez un vrai mélange 50% terre / 50% <span class="hashtag">#compost</span>.</li>';
            content += '<li><strong>Le conseil budget :</strong> Investissez dans un kit d\'arrosage simple à brancher sur un robinet existant.</li>';
        } else {
            content += '<li><strong>Matériel :</strong> Optez pour des bacs surélevés en bois traité autoclave ou métal corten. Achetez un <span class="hashtag">#substrat</span> ultra-léger (perlite, fibre de coco, compost).</li>';
            content += '<li><strong>Le conseil budget :</strong> Installez un programmateur d\'arrosage solaire automatisé pour une tranquillité totale, même pendant vos vacances.</li>';
        }

        if (time === 'low_time') {
            content += '<li><strong>Vos plantations idéales :</strong> Radis, tomates cerises et herbes <span class="hashtag">#aromatique</span>. Ce sont des cultures qui poussent presque toutes seules !</li>';
            content += '<li><strong>L\'astuce gain de temps :</strong> Mettez une épaisse couche de paillage (chanvre) dès le premier jour. Vous n\'aurez presque plus besoin de désherber ni d\'arroser.</li>';
        } else {
            content += '<li><strong>Vos plantations idéales :</strong> Vous pouvez tenter des légumes plus exigeants comme les courgettes (si bac profond), les aubergines, et gérer vos propres semis de salades.</li>';
            content += '<li><strong>L\'astuce du passionné :</strong> Installez un lombricomposteur sur le toit pour fabriquer votre propre engrais liquide tout au long de l\'année.</li>';
        }

        content += '</ul><p><em>Prêt à vous lancer ? Poursuivez la lecture à l\'étape 3 pour remplir vos bacs correctement !</em></p>';

        resultDiv.innerHTML = content;
        resultDiv.style.display = 'block';
    }
</script>


<?php
require_once dirname(__DIR__) . '/schema-data.php';

$faq_schema = [
    [
        'question' => "Mon immeuble ancien peut-il supporter un potager en bac ?",
        'answer'   => "La portance varie énormément d'un bâtiment à l'autre. Un bac rempli de terre humide pèse très lourd. Demandez systématiquement l'avis d'un professionnel (architecte ou bureau d'études de la copropriété) pour valider la charge au mètre carré."
    ],
    [
        'question' => "Puis-je utiliser l'eau de pluie qui ruisselle sur mon toit en asphalte ?",
        'answer'   => "C'est déconseillé pour un usage alimentaire. Les toitures en bardeaux d'asphalte ou goudronnées peuvent relâcher des hydrocarbures et des métaux lourds dans l'eau. Privilégiez l'eau du réseau ou la pluie récoltée directement dans des contenants propres aériens."
    ],
    [
        'question' => "Que faire de mes déchets végétaux sur le toit ?",
        'answer'   => "Intégrez un petit bac à compost fermé (type lombricomposteur) dans un coin ombragé de votre terrasse. Cela vous permettra de recycler vos déchets organiques directement sur place et de recréer du terreau riche pour la saison suivante."
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
