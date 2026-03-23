<?php
/**
 * comment-monter-toit-tuile.php
 * Article : Comment monter sur un toit en tuile en toute securité ?
 * Site : Expert Renov' (cemarenov.fr)
 * Date : 2026-03-22
 */

$article_meta = [
    'title'        => 'Comment monter sur un toit en tuile en toute securité ?',
    'category'     => 'renovation',
    'slug'         => 'comment-monter-toit-tuile',
    'image'        => 'https://www.cemarenov.fr/image/comment-monter-toit-tuile-1.webp',
    'excerpt'      => 'Guide complet pour monter sur un toit en tuile en sécurité : équipement, angle échelle 75°, technique 3 points de contact, et erreurs fatales à éviter.',
    'date'         => '2026-03-22',
    'reading_time' => 10,
];

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

include dirname(__DIR__) . '/header.php';
?>

<article>

    <section class="article-hero" style="background-image: url('<?php echo $article_meta['image']; ?>');">
        <div class="article-hero-content">

            <nav class="breadcrumb">
                <a href="<?php echo BASE_URL; ?>">Accueil</a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                <a href="<?php echo BASE_URL . $current_cat; ?>"><?php echo htmlspecialchars($category['name']); ?></a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                <span>Comment monter sur un toit en tuile</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Toiture</span>
                <span class="article-tag">Sécurité</span>
                <span class="article-tag">Couverture</span>
            </div>

            <h1>Comment monter sur un toit en tuile en toute sécurité<br>
                <span class="h1-accent">On vous guide ! </span>
            </h1>

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
                Vous devez inspecter vos tuiles, nettoyer une gouttière ou poser une antenne ? <strong>Monter sur un toit en tuile</strong> sans préparation, c'est jouer avec sa vie. Chaque année, des centaines de particuliers se blessent gravement — ou pire — sur leur propre toiture. Voici comment faire ça proprement, ou reconnaître quand il faut laisser tomber et <a href="<?php echo BASE_URL; ?>contact" style="text-decoration: underline;"><strong>appeler un pro</strong></a>.
            </p>

            <div class="article-content">

                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                        L'essentiel en 30 secondes
                    </div>
                    <ul>
                        <li><strong>Angle échelle :</strong> 75° (règle du 4:1 — 1 mètre de base pour 4 mètres de hauteur)</li>
                        <li><strong>Débord au faîtage :</strong> minimum 1 mètre au-dessus du point d'appui.</li>
                        <li><strong>Points de contact :</strong> toujours 3 points de contact avec l'échelle (2 mains + 1 pied ou 2 pieds + 1 main).</li>
                        <li><strong>Risque réel :</strong> 40 000 accidents de chute par an en France, dont 600 mortels.</li>
                        <li><strong>Harnais obligatoire :</strong> dès que la pente dépasse 30° ou la hauteur 3 mètres.</li>
                    </ul>
                </div>

                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li><a href="#pourquoi-dangereux">Pourquoi monter sur un toit en tuile est dangereux</a></li>
                        <li><a href="#equipement">Équipement indispensable pour monter sur un toit</a></li>
                        <li><a href="#position-echelle">Comment positionner son échelle correctement</a></li>
                        <li><a href="#technique-montee">Technique de montée sécurisée sur un toit</a></li>
                        <li><a href="#marcher-tuiles">Comment marcher sur des tuiles sans les abîmer</a></li>
                        <li><a href="#erreurs">Erreurs fatales à éviter absolument</a></li>
                        <li><a href="#faq">FAQ — Questions fréquentes</a></li>
                    </ul>
                </div>

                <h2 id="pourquoi-dangereux">Pourquoi monter sur un toit en tuile est dangereux</h2>

                <h3>Le risque de chute : des chiffres qui font réfléchir</h3>
                <p>En France, on dénombre environ <strong>40 000 accidents de chute de hauteur chaque année</strong>. Parmi eux, <strong>600 sont mortels</strong>. La toiture arrive en tête des causes de décès domestiques chez les bricoleurs. Une chute de 4 mètres — la hauteur d'un toit de maison individuelle — suffit à provoquer des blessures irréversibles : fractures du crâne, vertèbres brisées, paraplégie.</p>

                <div style="background-color: #fbe3cb; border-left: 4px solid #e74c3c; padding: 1.5rem; margin-bottom: 2rem; border-radius: 0 8px 8px 0; color: #3e2e1f;">
                    <strong>Mise en garde critique :</strong> Une chute de 3 mètres sur du béton, c'est déjà une chance sur deux de ne pas s'en sortir. Sur un toit, vous n'avez pas de garde-corps. Une seconde d'inattention suffit.
                </div>

                <h3>Les tuiles cassent sous vos pieds</h3>
                <p>Une tuile en terre cuite supporte mal le poids concentré d'un homme. Neuve ou gelée, elle casse net. Usée, elle s'effrite. Dans les deux cas, vous perdez l'équilibre. Et une tuile cassée, c'est une infiltration assurée. Si vos tuiles montrent des signes d'usure, un <strong><u><a href="<?php echo BASE_URL; ?>demoussage-tuiles-terre-cuite">démoussage professionnel des tuiles</a></u></strong> sera nécessaire pour rétablir leur étanchéité avant toute intervention.</p>

                <h3>La pente et la glissade</h3>
                <p>Un toit à 30° de pente, c'est déjà raide. À 45°, une tuile devient une piste de luge. Ajoutez une rosée, de la mousse, ou des feuilles mortes — vous tenez plus debout. Sur une pente, pas de droit à l'erreur. Pas de rattrapage.</p>

                <h3>Quand appeler un professionnel</h3>
                <p>Appelez un <a href="<?php echo BASE_URL; ?>contact" style="text-decoration: underline;"><strong>couvreur</strong></a> dans ces cas :</p>
                <ul class="custom-list">
                    <li>Pente supérieure à 35°</li>
                    <li>Hauteur supérieure à 5 mètres (toiture de R+1)</li>
                    <li>Toiture en ardoise (glissante par nature)</li>
                    <li>Tuiles visiblement abîmées ou anciennes</li>
                    <li>Vent supérieur à 40 km/h</li>
                    <li>Vous n'avez pas de harnais de sécurité adapté</li>
                </ul>

                <div style="background-color: var(--color-light); border-left: 4px solid var(--color-primary); padding: 1.5rem; margin-bottom: 2rem; border-radius: 0 8px 8px 0;">
                    <strong>En clair :</strong> Un devis de couvreur coûte entre 150 et 400 €. Une chute vous coûte bien plus cher. Si vous devez réaliser des travaux sur le faîte, consultez notre guide sur l'<strong><u><a href="<?php echo BASE_URL; ?>faitage">importance du faîtage pour l'étanchéité</a></u></strong>.
                </div>

                <h2 id="equipement">Équipement indispensable pour monter sur un toit</h2>

                <h3>L'échelle : type, longueur et débord</h3>
                <p>Prenez une <strong>échelle de couvreur en aluminium ou fibre de verre</strong>. L'aluminium, c'est léger. La fibre de verre, c'est isolant électrique — indispensable près de lignes électriques.</p>
                <p><strong>Longueur minimum :</strong> hauteur à atteindre + 1 mètre de débord. Pour un toit à 4 mètres, prenez une échelle de 5 mètres. Pour un R+1 (~6-7 mètres), il vous faut 8-9 mètres.</p>
                <p>Vérifiez la charge max : <strong>150 kg minimum</strong>. Regardez les échelons : pas de fissures, pas de déformations.</p>

                <h3>Le harnais de sécurité</h3>
                <p>Sur un toit pentu, le <strong>harnais</strong> n'est pas optionnel. C'est la loi pour les pros, et la survie pour vous. Un harnais complet comprend : baudrier, longe antichute avec absorbeur d'énergie, et point d'ancrage solide.</p>
                <p>Budget : 80 à 200 €. Location possible chez les loueurs BTP (~30 €/jour).</p>

                <h3>Le crochet de faîtage</h3>
                <p>Le <strong>faîtage</strong>, c'est la ligne au sommet du toit où les deux pentes se rejoignent. Le <strong>crochet de faîtage</strong> s'accroche là-dessus pour créer un point d'ancrage. C'est un crochet métallique avec une sangle. Il se pose sans outil : vous le glissez sous une tuile de faîtage, il se bloque sous le poids.</p>
                <p>Prix : 40 à 80 €. Indispensable si vous travaillez sur le haut du toit.</p>

                <div style="background-color: var(--color-light); border-left: 4px solid var(--color-primary); padding: 1.5rem; margin-bottom: 2rem; border-radius: 0 8px 8px 0;">
                    <strong>En clair :</strong> Le faîtage est la ligne de crête du toit. Le crochet de faîtage s'y accroche pour vous sécuriser. Sans point d'ancrage solide, le harnais ne sert à rien.
                </div>

                <h3>Les chaussures antidérapantes</h3>
                <p>Des baskets ou des bottes de chantier classiques glissent sur les tuiles. Il vous faut des <strong>chaussures de couvreur</strong> avec semelle en caoutchouc cramponnée (type S3 SRC). La semelle doit être souple pour épouser la courbe des tuiles. Alternative : des surchaussures antidérapantes (~15 €).</p>
                <p>Le casque protège des chutes d'outils. Prenez un casque de chantier classe A. Les gants en cuir épais protègent des arêtes vives des tuiles.</p>

                <h2 id="position-echelle">Comment positionner son échelle correctement</h2>

                <h3>L'angle des 75° : la règle du 4:1</h3>
                <p>L'angle optimal entre l'échelle et le sol est de <strong>75°</strong>. C'est raide, mais stable. Pour vérifier : la base de l'échelle doit être éloignée du mur d'un quart de la hauteur atteinte. Exemple : si l'échelle dépasse à 4 mètres de hauteur, le pied doit être à 1 mètre du mur (4 ÷ 4 = 1). C'est la <strong>règle du 4:1</strong>.</p>
                <p>Trop vertical (>80°) : l'échelle bascule en arrière. Trop plat (<65°) : elle glisse au sol.</p>

                <h3>Stabiliser l'échelle</h3>
                <p>Le sol doit être <strong>plat et dur</strong>. Pas de terre meuble, pas de gravillon. Si besoin, glissez une planche rigide sous le pied. Utilisez un <strong>butoir d'échelle</strong> en haut : c'est une pièce métallique qui empêche l'échelle de glisser latéralement.</p>
                <p>Vérifiez que l'échelle ne repose pas sur une gouttière fragile.</p>

                <h3>Débord minimum au faîtage : 1 mètre</h3>
                <p>L'échelle doit dépasser le point d'appui (le bord du toit) d'au moins <strong>1 mètre</strong>. Cela vous donne une prise pour basculer du haut de l'échelle vers le toit. Sans ce débord, vous arrivez en haut... et vous ne savez pas comment vous hisser. C'est là que les accidents arrivent.</p>

                <h3>Attacher l'échelle en bas</h3>
                <p>Si possible, <strong>amarrez le pied de l'échelle</strong> à un point fixe (arbre, poteau, gouttière basse solide) avec une sangle ou une corde. Une échelle qui glisse de 20 cm au sol, c'est un décrochage de 1 mètre en haut. Quelqu'un au sol qui tient l'échelle, c'est bien. Une sangle d'ancrage, c'est mieux.</p>

                <h2 id="technique-montee">Technique de montée sécurisée sur un toit</h2>

                <h3>La règle des 3 points de contact</h3>
                <p>C'est la règle d'or. <strong>Toujours 3 points de contact avec l'échelle.</strong> Soit 2 mains + 1 pied, soit 2 pieds + 1 main. Jamais les deux mains occupées (outils, tuiles) sans les pieds bien ancrés. Jamais les deux pieds en mouvement sans une main qui tient.</p>
                <p>Si vous montez avec un outil, accrochez-le à la ceinture ou utilisez une corde pour le hisser après. Pas de transport à la main en montant.</p>
                <p>On monte et on descend <strong>face à l'échelle</strong>, jamais de dos. Une main sur un échelon, l'autre sur l'échelon suivant. Pas de précipitation.</p>

                <h3>Basculer du haut de l'échelle vers le toit</h3>
                <p>Arrivé en haut, vous attrapez le débord de l'échelle des deux mains. Montez encore d'un échelon pour avoir les hanches au niveau du faîtage. Basculez une jambe sur le toit, puis l'autre. <strong>Jamais les deux jambes ensemble</strong> — si la tuile cède, vous restez accroché.</p>

                <blockquote class="article-blockquote">
                    <p>"J'avais 25 ans, premier chantier solo. Je monte sur un toit à 7 mètres, pas de harnais — on faisait comme ça à l'époque. Une tuile casse sous mon pied, je bascule en arrière. J'ai attrapé l'échelle au dernier moment, les ongles en moins. Depuis, je m'ancre au faîtage AVANT de poser le deuxième pied. C'est la règle qui m'a sauvé la vie."</p>
                </blockquote>

                <h3>S'ancrer immédiatement au faîtage</h3>
                <p>Dès que vous êtes sur le toit, <strong>accrochez votre longe au crochet de faîtage</strong>. Avant de lâcher l'échelle, avant de vous déplacer. Si vous glissez, l'absorbeur d'énergie stoppe votre chute sur 1 mètre max.</p>

                <h2 id="marcher-tuiles">Comment marcher sur des tuiles sans les abîmer</h2>

                <h3>Marcher sur les liteaux, pas entre</h3>
                <p>Les tuiles reposent sur des <strong>liteaux</strong> — des planches de bois horizontales fixées sur la charpente. C'est là que ça tient. Entre les liteaux, il n'y a que du vide. Marchez sur les lignes de tuiles qui correspondent aux liteaux. Vous sentez la différence : ferme sous le pied = liteau, creux = entre-deux.</p>

                <div style="background-color: var(--color-light); border-left: 4px solid var(--color-primary); padding: 1.5rem; margin-bottom: 2rem; border-radius: 0 8px 8px 0;">
                    <strong>En clair :</strong> Les liteaux sont espacés de 35 à 45 cm. Regardez depuis les combles pour repérer leur position avant de monter. Pour en savoir plus sur l'entretien de vos tuiles, consultez notre guide sur le <strong><u><a href="<?php echo BASE_URL; ?>comment-bacher-toit">bâchage de toit en urgence</a></u></strong> si vous devez protéger rapidement une zone endommagée.
                </div>

                <h3>Répartition du poids</h3>
                <p>Ne vous tenez jamais sur une seule jambe. Répartissez votre poids sur les deux pieds, perpendiculairement aux liteaux. Avancez pas à pas, sans à-coups. Si vous devez vous baisser, fléchissez les genoux, pas le buste.</p>

                <h3>Éviter les tuiles neuves et glissantes</h3>
                <p>Les tuiles neuves ont une surface lisse. Les anciennes peuvent être poreuses et fragiles. Les tuiles en ciment sont plus résistantes mais plus glissantes. Adaptez votre démarche : plus courte, plus lente, plus prudente.</p>
                <p>Ne marchez jamais sur les tuiles de rive (bord du toit), les tuiles de faîtage (juste posées), ou les zones avec mousse/algues.</p>

                <h3>Tester avant de poser le poids</h3>
                <p>Avant de poser tout votre poids sur une tuile, <strong>testez-la</strong>. Posez le pied doucement, transférez 30% du poids, écoutez si elle craque. Si elle bouge, reculez. Une tuile qui bouge, c'est une tuile qui va casser.</p>

                <h2 id="erreurs">Erreurs fatales à éviter absolument</h2>

                <h3>Échelle trop courte</h3>
                <p>Une échelle qui arrive juste au niveau du toit, c'est une échelle inutilisable. Vous ne pouvez pas basculer en sécurité. Règle : hauteur à atteindre + 1 mètre minimum. Point final.</p>

                <h3>Monter seul sans surveillance</h3>
                <p>Ne montez jamais seul sur un toit. Quelqu'un doit rester au sol, voir l'échelle, et pouvoir appeler les secours. Si vous êtes seul chez vous, appelez un voisin. Si personne n'est disponible, n'y allez pas.</p>

                <h3>Marcher sur les tuiles fragiles</h3>
                <p>Tuile qui sonne creux, tuile fissurée, tuile avec de la mousse dessus — tout ça, c'est interdit. Une tuile en mauvais état ne supporte pas 80 kg. Elle casse, vous tombez. Si votre toiture est trop endommagée, envisagez un <strong><u><a href="<?php echo BASE_URL; ?>changement-de-couverture">changement complet de couverture</a></u></strong> pour garantir votre sécurité.</p>

                <h3>Ignorer la météo</h3>
                <p>Vent supérieur à 40 km/h : reportez. Pluie, rosée, gel : reportez. Orage dans les 2 heures : reportez. Une rafale de vent sur un toit, ça vous déséquilibre instantanément. Une tuile mouillée, c'est une tuile glissante.</p>

                <h3>Pas de harnais sur toit pentu</h3>
                <p>Sur une pente > 30°, pas de harnais = pas de montée. C'est non négociable. Le harnais, c'est pas pour les pros qui travaillent 8 heures sur le toit. C'est pour vous, qui montez 10 minutes. Une chute, c'est 3 secondes. Le harnais, c'est votre assurance-vie.</p>

                <h2 id="faq">FAQ — Questions fréquentes</h2>

                <h3>Peut-on monter seul sur un toit ?</h3>
                <p>Techniquement oui, pratiquement non. La loi ne l'interdit pas, mais la sécurité l'exige : quelqu'un au sol peut voir l'échelle, aider, appeler les secours. Seul sur un toit, une entorse ou un vertige — et vous êtes coincé. Attendez d'avoir un surveillant.</p>

                <h3>Quelle échelle pour un toit à 2 étages ?</h3>
                <p>Un R+1 fait environ 6 à 7 mètres jusqu'au faîtage. Il vous faut une échelle de <strong>8 à 9 mètres</strong> pour avoir le débord de 1 mètre. Budget : 200 à 400 €. Location : ~40 €/jour.</p>

                <h3>Comment reconnaître les liteaux ?</h3>
                <p>Depuis les combles, c'est facile : ce sont les planches de bois horizontales sur lesquelles reposent les tuiles. Depuis l'extérieur, c'est plus dur. Repérez les lignes de fixation des tuiles (clous visibles sur les tuiles anciennes). Les liteaux sont parallèles au sol, espacés de 35 à 45 cm. Quand vous marchez sur le toit, la ligne ferme sous le pied correspond au liteau.</p>

                <h3>Faut-il une autorisation pour monter sur son toit ?</h3>
                <p>Non, pas pour votre propre maison. Si vous êtes locataire, prévenez le propriétaire. Si vous faites intervenir un pro, vérifiez son assurance décennale.</p>

                <h3>Combien de temps peut-on rester sur un toit ?</h3>
                <p>Pas plus que nécessaire. Une inspection rapide : 15-20 minutes max. Un travail long : faites des pauses, redescendez. Mieux vaut 3 montées de 20 minutes qu'une chute après 1 heure.</p>

            </div><!-- /.article-content -->

            <div class="author-box-bottom">
                <div class="author-box-img">
                    <img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe">
                </div>
                <div class="author-box-content">
                    <h3>Philippe</h3>
                    <span class="author-role">Expert Rénovation &amp; Artisan RGE</span>
                    <p>Avec plus de 20 ans d'expérience sur les chantiers, Philippe vous partage ses conseils concrets et sans langue de bois. Spécialiste des travaux de rénovation et de sécurité toiture.</p>
                    <a href="<?php echo BASE_URL; ?>philippe" class="btn-outline">Voir son profil complet</a>
                </div>
            </div>

            <div class="conclusion-box">
                <h3>Besoin d'un couvreur professionnel ?</h3>
                <p>Monter sur un toit en tuile, c'est faisable. Mais ça se prépare. Échelle à 75°, <strong>harnais</strong> sur le dos, <strong>crochet de faîtage</strong>, chaussures qui accrochent — et quelqu'un au sol qui surveille. Si un doute persiste : redescendez. Un couvreur coûte entre 150 et 400 € la journée. C'est le prix de votre sécurité.</p>
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
                    <h3 class="sidebar-title">Derniers articles — <?php echo htmlspecialchars($category['name'] ?? 'Rénovation'); ?></h3>
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
require_once dirname(__DIR__) . '/schema-data.php';

$faq_schema = [
    [
        'question' => "Peut-on monter seul sur un toit ?",
        'answer'   => "Techniquement oui, pratiquement non. La loi ne l'interdit pas, mais la sécurité l'exige : quelqu'un au sol peut voir l'échelle, aider, appeler les secours. Seul sur un toit, une entorse ou un vertige — et vous êtes coincé."
    ],
    [
        'question' => "Quelle échelle pour un toit à 2 étages ?",
        'answer'   => "Un R+1 fait environ 6 à 7 mètres jusqu'au faîtage. Il vous faut une échelle de 8 à 9 mètres pour avoir le débord de 1 mètre. Budget : 200 à 400 €. Location : ~40 €/jour."
    ],
    [
        'question' => "Comment reconnaître les liteaux ?",
        'answer'   => "Depuis les combles, ce sont les planches de bois horizontales sur lesquelles reposent les tuiles. Depuis l'extérieur, repérez les lignes de fixation des tuiles. Les liteaux sont parallèles au sol, espacés de 35 à 45 cm."
    ],
    [
        'question' => "Faut-il une autorisation pour monter sur son toit ?",
        'answer'   => "Non, pas pour votre propre maison. Si vous êtes locataire, prévenez le propriétaire. Si vous faites intervenir un pro, vérifiez son assurance décennale."
    ],
    [
        'question' => "Combien de temps peut-on rester sur un toit ?",
        'answer'   => "Pas plus que nécessaire. Une inspection rapide : 15-20 minutes max. Un travail long : faites des pauses, redescendez. Mieux vaut 3 montées de 20 minutes qu'une chute après 1 heure."
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
