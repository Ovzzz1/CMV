<?php
/**
 * rehausser-mur-parpaing-existant.php
 * Article : Rehausser un mur en parpaing existant
 * Site : [Votre site]
 * Date : 2026-03-29
 */

$article_meta = [
    'title'        => 'Rehausser un mur en parpaing existant : Étapes, ferraillage et astuces de maçon',
    'category'     => 'travaux',
    'slug'         => 'rehausser-mur-parpaing-existant',
    'image'        => 'https://www.cemarenov.fr/image/rehausser un mur en parpaing existant1.webp',
    'excerpt'      => 'Rehausser un muret en parpaing ne se résume pas à empiler de nouveaux blocs. Découvrez la technique de reprise de ferraillage, le rattrapage de niveau et le chaînage final pour un résultat solide et durable.',
    'date'         => '2026-03-29',
    'reading_time' => 8,
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

<article>
    <section class="article-hero" style="background-image: url('<?php echo BASE_URL; ?>image/rehausser un mur en parpaing existant1.webp');">
        <div class="article-hero-content">
            <nav class="breadcrumb">
                <a href="<?php echo BASE_URL; ?>">Accueil</a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
                <a href="<?php echo BASE_URL . $current_cat; ?>"><?php echo htmlspecialchars($category['name']); ?></a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
                <span>Rehausser un mur en parpaing existant</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Maçonnerie</span>
                <span class="article-tag">Travaux</span>
            </div>

            <h1>Rehausser un mur en parpaing existant :<br>
                <span class="h1-accent">Étapes, ferraillage et astuces de maçon</span>
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
                Votre clôture manque de hauteur et vous voulez gagner en intimité, ou votre chien a décidé que la
                limite de propriété, c'est pour les autres. Rehausser un <strong>mur en parpaing existant</strong> est
                un projet de maçonnerie tout à fait faisable, à condition de ne pas commettre l'erreur classique :
                poser des blocs neufs directement sur l'ancienne arase sans aucune liaison.
                <strong>Le résultat est immanquable, une belle fissure horizontale au premier hiver.</strong>
                Voici comment faire les choses correctement.
            </p>

            <div class="article-content">
                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2" />
                        </svg>
                        L'essentiel à retenir
                    </div>
                    <ul>
                        <li><strong>Vérifiez d'abord</strong> que vos fondations et votre PLU autorisent le projet,
                            inutile de couler du béton si c'est à démolir ensuite.</li>
                        <li><strong>La vraie technique :</strong> casser l'arase, descendre des fers à béton de 10 mm
                            sur 40 cm dans les anciennes alvéoles remplies de béton, puis maçonner les nouveaux
                            parpaings par-dessus.</li>
                        <li><strong>Finir obligatoirement</strong> par un chaînage horizontal en parpaings en U coulés
                            de béton armé pour verrouiller l'ensemble.</li>
                    </ul>
                </div>

                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li><a href="#pourquoi-rehausser">Pourquoi surélever son muret (et l'alternative sans maçonnerie)</a></li>
                        <li><a href="#verifications-vitales">Les 2 vérifications vitales avant de rajouter du poids</a></li>
                        <li><a href="#technique-liaison">La technique de pro pour lier la surélévation à l'ancien mur</a></li>
                        <li><a href="#mur-perpendiculaire">Raccorder un nouveau mur perpendiculaire</a></li>
                        <li><a href="#faq">FAQ : Cas particuliers et budget</a></li>
                        <li><a href="#suites-chantier">Suites du chantier : finitions et aménagements</a></li>
                    </ul>
                </div>

                <h2 id="pourquoi-rehausser">Pourquoi surélever son muret (et l'alternative sans maçonnerie)</h2>

                <p>Sur les chantiers, 90 % des demandes de rehaussement viennent du même problème : un nouveau voisin
                    avec une vue plongeante sur la terrasse, ou un grand chien qui a pris l'habitude de sauter la
                    clôture. Deux situations classiques, mais elles n'appellent pas forcément la même solution.</p>

                <figure>
                    <img style="width:100%; border-radius:12px; box-shadow:0 5px 15px rgba(0,0,0,.05);"
                        src="<?php echo BASE_URL; ?>image/rehausser un mur en parpaing existant1.webp"
                        alt="Artisan maçon posant une nouvelle rangée de parpaings neufs sur le sommet d'un ancien muret patiné"
                        loading="eager">
                    <figcaption style="text-align:center; font-size:.9rem; color:#64748b; font-style:italic;">
                        La surélévation démarre toujours par une première rangée soigneusement de niveau, c'est elle
                        qui conditionne toute la suite.
                    </figcaption>
                </figure>

                <p>Si votre seul besoin est de couper le vis-à-vis, fixer des panneaux de bois occultants ou des
                    claustras sur l'arase existante via des platines vissées fera très bien l'affaire. C'est plus
                    rapide, moins physique, et ça s'enlève si vous changez d'avis. En revanche, si vous cherchez la
                    robustesse face aux vents forts, un mur pare-bruit, ou si vous prévoyez de retenir de la terre
                    (soutènement), <strong>la maçonnerie en parpaing reste la seule option viable</strong>.</p>

                <figure>
                    <img style="width:100%; border-radius:12px; box-shadow:0 5px 15px rgba(0,0,0,.05);"
                        src="<?php echo BASE_URL; ?>image/rehausser un mur en parpaing existant2.webp"
                        alt="Muret en parpaing brut sur lequel a été fixée une extension en panneaux de bois claustra sur platines métalliques, jardin verdoyant en arrière-plan"
                        loading="lazy">
                    <figcaption style="text-align:center; font-size:.9rem; color:#64748b; font-style:italic;">
                        Pour un simple besoin d'occultation, des panneaux bois sur platines évitent de ressortir la
                        bétonnière.
                    </figcaption>
                </figure>

                <h2 id="verifications-vitales">Les 2 vérifications vitales avant de rajouter du poids</h2>

                <p>Ajouter des rangées de parpaings sur un muret existant, c'est augmenter la charge sur les fondations
                    et surtout doubler la prise au vent. Un mur qui gagne 60 cm de hauteur n'est pas le même ouvrage
                    qu'avant. Il y a deux points à vérifier avant même d'aller acheter le ciment.</p>

                <ul class="custom-list">
                    <li><strong>L'état des fondations :</strong> Si votre mur actuel fait 80 cm de haut, sa semelle de
                        fondation a probablement été calculée pour ce poids et cette hauteur. S'il penche déjà
                        légèrement ou si des fissures en escalier courent le long des joints, n'ajoutez rien. La base
                        ne supportera pas la surcharge supplémentaire, et si vous constatez en plus des traces
                        d'humidité remontante, consultez notre guide sur l'<a
                            href="https://www.cemarenov.fr/assechement-murs-injections"
                            style="text-decoration: underline;">assèchement des murs par injection</a> avant d'entreprendre quoi que ce soit.</li>
                    <li><strong>La réglementation locale :</strong> Avant d'acheter quoi que ce soit, un saut à la
                        mairie s'impose. Le PLU (Plan Local d'Urbanisme) définit la hauteur maximale autorisée pour une
                        clôture, souvent limitée entre 1m80 et 2m en zone pavillonnaire. Si le mur est mitoyen,
                        <strong>l'accord écrit du voisin est obligatoire</strong>, sous peine de devoir tout démolir à
                        vos frais.</li>
                </ul>

                <figure>
                    <img style="width:100%; border-radius:12px; box-shadow:0 5px 15px rgba(0,0,0,.05);"
                        src="<?php echo BASE_URL; ?>image/rehausser un mur en parpaing existant3.webp"
                        alt="Gros plan sur un vieux mur de clôture en parpaing montrant une fissure caractéristique en escalier le long des joints de mortier"
                        loading="lazy">
                    <figcaption style="text-align:center; font-size:.9rem; color:#64748b; font-style:italic;">
                        Une fissure en escalier le long des joints est un signal d'alarme : les fondations bougent,
                        ne rajoutez aucune charge avant diagnostic.
                    </figcaption>
                </figure>

                <h2 id="technique-liaison">La technique de pro pour lier la surélévation à l'ancien mur</h2>

                <p>L'erreur classique du bricoleur du dimanche : nettoyer vaguement le haut du muret, poser une couche
                    de mortier et empiler les blocs. Une belle fissure horizontale apparaît l'année suivante, pile à la
                    jonction. L'ancien et le nouveau mur travaillent différemment sous les contraintes thermiques et
                    mécaniques. Il faut les coudre ensemble, pas juste les coller.</p>

                <h3>Étape 1 : Ancrage sur mur existant — le piège du parpaing creux</h3>

                <p>Pour solidariser les deux parties, vous devez prolonger les poteaux raidisseurs verticaux (idéalement
                    tous les 2,50 m à 3 m). C'est là que beaucoup se font piéger. Vous percez le haut de votre mur
                    existant, vous préparez votre cartouche de scellement chimique... et vous tombez sur du vide.
                    <strong>Un scellement chimique ne tient pas dans l'air d'une alvéole creuse.</strong>
                    La résine n'a rien à mordre.</p>

                <figure>
                    <img style="width:100%; border-radius:12px; box-shadow:0 5px 15px rgba(0,0,0,.05);"
                        src="<?php echo BASE_URL; ?>image/rehausser un mur en parpaing existant4.webp"
                        alt="Illustration technique macro : sommet cassé d'un parpaing creux avec une tige de fer à béton insérée verticalement dans l'alvéole en cours de remplissage"
                        loading="lazy">
                    <figcaption style="text-align:center; font-size:.9rem; color:#64748b; font-style:italic;">
                        Le scellement chimique dans une alvéole vide ne tient pas. Il faut remplir la cellule de béton
                        pour créer un ancrage massif autour du fer.
                    </figcaption>
                </figure>

                <p>La vraie technique :</p>

                <ol class="custom-list">
                    <li>Cassez le sommet des alvéoles à l'aide d'un marteau et d'un burin (ou d'un perforateur en mode
                        burinement) pour ouvrir l'accès.</li>
                    <li>Descendez un fer à béton de 10 mm de diamètre sur au moins <strong>40 cm de profondeur</strong>
                        dans l'ancien mur.</li>
                    <li>Coulez un béton liquide (gâché bien fluide) directement dans l'alvéole pour noyer le fer sur
                        toute la hauteur. Laissez durcir 24 h minimum. Vous avez maintenant un ancrage indestructible.
                    </li>
                </ol>

                <h3>Étape 2 : Le lit de mortier de rattrapage pour un alignement parfait</h3>

                <p>Les vieux murs ne sont jamais parfaitement droits. Après des années d'intempéries et de cycles
                    gel/dégel, le sommet penche légèrement par endroits. Si vous posez votre première rangée de
                    parpaings sur cette surface irrégulière, tous vos joints vont partir de travers, et vous ne
                    pourrez plus rattraper le niveau ensuite.</p>

                <figure>
                    <img style="width:100%; border-radius:12px; box-shadow:0 5px 15px rgba(0,0,0,.05);"
                        src="<?php echo BASE_URL; ?>image/rehausser un mur en parpaing existant5.webp"
                        alt="Gros plan sur une truelle étalant un lit de mortier épais de 2 à 3 cm sur le sommet irrégulier d'un vieux mur en parpaing, cordeau de maçon tendu au-dessus"
                        loading="lazy">
                    <figcaption style="text-align:center; font-size:.9rem; color:#64748b; font-style:italic;">
                        Un lit de mortier épais sur la première rangée absorbe les défauts de l'ancien mur. Le cordeau
                        tendu garantit un départ parfaitement de niveau.
                    </figcaption>
                </figure>

                <p>Sur la première rangée, n'hésitez pas à charger votre lit de mortier. Une épaisseur de 2 à 3
                    centimètres vous permet d'absorber les défauts et de repartir sur une base parfaitement horizontale.
                    <strong>Tendez un cordeau entre les deux extrémités du mur</strong> et contrôlez avec le niveau à
                    bulle avant que le mortier prenne. C'est cette rangée qui conditionne tout le reste.</p>

                <h3>Étape 3 : L'astuce des blocs à bancher pour le passage des armatures</h3>

                <p>Une fois vos fers en attente plantés et dressés vers le ciel, vous allez vite comprendre le
                    problème : soulever un parpaing de 20 kg par-dessus une tige de ferraille de 80 cm, les bras
                    tendus, en essayant de le faire glisser sans renverser votre lit de mortier... c'est épuisant et
                    approximatif. L'astuce de maçon : utilisez des <strong>blocs à bancher</strong> (ou parpaings
                    d'angle évidés). Au lieu de les soulever par-dessus le fer, vous les faites simplement glisser
                    latéralement dans le lit de mortier. Le fer passe dans l'évidement sans effort. Moins de fatigue,
                    plus de précision dans la pose.</p>

                <h3>Étape 4 : Le chaînage horizontal final (obligatoire)</h3>

                <p>Ne terminez jamais un rehaussement par une rangée de parpaings creux standards. La dernière ligne
                    doit impérativement être réalisée avec des <strong>parpaings en U</strong>, des blocs creusés en
                    forme de gouttière sur toute leur longueur.</p>

                <figure>
                    <img style="width:100%; border-radius:12px; box-shadow:0 5px 15px rgba(0,0,0,.05);"
                        src="<?php echo BASE_URL; ?>image/rehausser un mur en parpaing existant6.webp"
                        alt="Vue plongeante sur une rangée de parpaings en U avec armature triangulaire métallique posée à l'intérieur de la gouttière, prête à être coulée en béton"
                        loading="lazy">
                    <figcaption style="text-align:center; font-size:.9rem; color:#64748b; font-style:italic;">
                        Les parpaings en U forment une gouttière continue dans laquelle on place les armatures
                        horizontales avant de couler le béton. C'est la ceinture qui tient tout le mur.
                    </figcaption>
                </figure>

                <p>Dans cette gouttière, vous déposez des armatures horizontales (des fers torsadés ou des cadres
                    triangulaires), raccordées par ligature aux fers verticaux. Vous coulez ensuite du béton pour tout
                    noyer. <strong>Cette ceinture périphérique soude l'ouvrage</strong> et l'empêche de s'ouvrir sous
                    la pression du vent ou des variations thermiques saisonnières.</p>

                <h2 id="mur-perpendiculaire">Raccorder un nouveau mur perpendiculaire (harpage ou fers ?)</h2>

                <p>Le cas se présente souvent quand on veut créer un angle ou prolonger un muret pour fermer un espace.
                    La première idée, disquer les anciens blocs en escalier pour faire un harpage, est tentante mais
                    laborieuse, et vous risquez d'ébranler la structure existante.</p>

                <p>La méthode plus propre : tracez une ligne verticale au cordeau sur l'ancien mur à l'endroit du
                    raccord. Percez des trous tous les deux rangs dans les joints horizontaux. Scellez chimiquement des
                    fers de liaison horizontaux de 8 ou 10 mm sur une profondeur de 15 à 20 cm. Venez ensuite buter vos
                    nouveaux blocs contre l'ancien mur en noyant ces fers de liaison dans vos joints de mortier. La
                    jonction est rigide, le chantier est propre, et vous n'avez pas touché à la structure d'origine.</p>

                <h2 id="faq">FAQ, Cas particuliers et budget</h2>

                <h3>Comment surélever un mur de parpaings déjà crépi ?</h3>

                <p>Le mortier n'adhère pas sur un enduit de façade existant. Si vous posez vos nouveaux blocs sur le
                    crépi sans retirer ce dernier, la jonction se décollera dans les deux à trois ans. Vous devez
                    retrouver la maçonnerie brute sur la zone de contact.</p>

                <figure>
                    <img style="width:100%; border-radius:12px; box-shadow:0 5px 15px rgba(0,0,0,.05);"
                        src="<?php echo BASE_URL; ?>image/rehausser un mur en parpaing existant7.webp"
                        alt="Personne utilisant une meuleuse avec disque diamant pour entailler horizontalement l'enduit crépi d'un mur, faisant apparaître le parpaing brut gris dessous"
                        loading="lazy">
                    <figcaption style="text-align:center; font-size:.9rem; color:#64748b; font-style:italic;">
                        La meuleuse avec disque diamant permet de découper proprement la bande d'enduit sans toucher à
                        la maçonnerie en dessous.
                    </figcaption>
                </figure>

                <p>Prenez une meuleuse avec un disque diamant et découpez une bande horizontale à environ 10 cm sous le
                    sommet du mur. Burinez et retirez le crépi de cette bande. Votre première couche de mortier
                    accrochera directement sur le parpaing mis à nu. Pour masquer la cicatrice après les travaux, noyez
                    une trame en fibre de verre à la jonction lors de la remise en enduit, elle absorbera les tensions
                    et évitera la fissure horizontale.</p>

                <h3>Quel est le prix pour rehausser un mur de clôture ?</h3>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Scénario</th>
                                <th>Coût estimé au m²</th>
                                <th>Ce qui est inclus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>En DIY (matériaux seuls)</strong></td>
                                <td>30, 45 €/m²</td>
                                <td>Agglos, sable, ciment, fers à béton</td>
                            </tr>
                            <tr>
                                <td><strong>Artisan maçon (fournitures + pose)</strong></td>
                                <td>120, 180 €/m²</td>
                                <td>Préparation de l'arase, ferraillage, maçonnerie, chaînage</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <p>Le parpaing est l'un des matériaux de construction les moins chers du marché. En travaillant
                    vous-même, le poste de coût principal sera la location d'une bétonnière si vous avez un linéaire
                    important. Le tarif artisan monte significativement dès lors que la préparation de l'ancienne arase
                    est complexe (mur crépi, ferraillage à reprendre en profondeur, accès difficile).</p>

                <h2 id="suites-chantier">Suites du chantier : finitions et aménagements</h2>

                <p>Votre mur a gagné ses précieux centimètres. L'étape critique de la structure est derrière vous. Mais
                    visuellement, la cicatrice entre la vieille partie et les parpaings neufs est immanquable. La suite
                    du chantier dépend de ce que vous voulez faire de ce mur.</p>

                <ul class="custom-list">
                    <li><strong>Pour un rendu esthétique :</strong> il va falloir masquer cette jonction avec un enduit de façade. Le <a href="https://www.cemarenov.fr/dosage-enduit-ciment-chaux-parpaing">dosage enduit ciment chaux parpaing</a> détaille les proportions exactes pour obtenir un raccord invisible entre l'ancien et le neuf. Si votre mur est en pierres apparentes, découvrez aussi nos conseils sur l'<a href="https://www.cemarenov.fr/enduit-pierre-vue" style="text-decoration: underline;">enduit pour pierre de vue</a> pour un rendu naturel et durable.</li>
                    <li><strong>Pour une alternative sans enduit :</strong> un <a href="https://www.cemarenov.fr/bardage-bois-sur-mur-parpaing">bardage bois sur parpaing</a> posé sur ossature ventilée est une solution esthétique qui couvre la cicatrice de jonction sans crépi. Notre guide explique les étapes de pose conformes au DTU 41.2.</li>
                    <li><strong>Pour ajouter une charpente :</strong> si la rehausse visait à gagner de la hauteur pour couvrir une extension, notre guide sur la <a href="https://www.cemarenov.fr/charpente-1-pan-sur-parpaing">charpente 1 pan sur parpaing</a> détaille les contraintes d'ancrage et de liaison sur mur existant.</li>
                    <li><strong>Pour finaliser une clôture :</strong> si la rehausse servait de soubassement pour accueillir un grillage rigide ou des panneaux, vérifiez que les <a href="https://www.cemarenov.fr/distance-poteau-raidisseur-mur-parpaing">poteaux raidisseurs</a> existants sont compatibles avec la nouvelle hauteur.</li>
                </ul>

            </div><!-- .article-content -->

            <div class="conclusion-box">
                <h3>Le mot de la fin</h3>
                <p>Rehausser un muret, c'est 20 % de maçonnerie et 80 % de préparation. La reprise de ferraillage dans
                    les anciennes alvéoles, le rattrapage de niveau sur la première rangée, et le chaînage final, ce
                    sont ces trois étapes que personne ne voit mais qui font tenir le mur vingt ans. Bâclez-les, et vous
                    retrouverez votre belle fissure horizontale à la prochaine vague de froid.</p>
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

<?php
// Schema.org, NE JAMAIS MODIFIER
require_once dirname(__DIR__) . '/schema-data.php';
$_schema = get_schema_data(basename(__FILE__, '.php'));
echo generate_article_schema($article_meta, $_schema['faq'] ?? [], $_schema['howto'] ?? []);
echo generate_rating_widget();
include dirname(__DIR__) . '/footer.php';
?>
