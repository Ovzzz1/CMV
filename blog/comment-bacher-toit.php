<?php
/**
 * comment-bacher-toit.php
 * Article : Comment bâcher un toit : guide complet pour une protection d'urgence
 * Site : Expert Renov' (cemarenov.fr)
 * Date : 2026-03-21
 */

$article_meta = [
    'title'        => 'Comment bâcher un toit : guide complet pour une protection d\'urgence (2026)',
    'category'     => 'renovation',
    'slug'         => 'comment-bacher-toit',
    'image'        => 'https://www.cemarenov.fr/image/comment-bacher-toit-1.webp',
    'excerpt'      => 'Guide complet pour bâcher un toit en urgence : matériel, étapes de pose, prix et précautions de sécurité. Conseils d\'expert pour une protection efficace.',
    'date'         => '2026-03-21',
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
                <span>Comment bâcher un toit</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Toiture</span>
                <span class="article-tag">Urgence</span>
                <span class="article-tag">Bâchage</span>
            </div>

            <h1>Comment bâcher un toit :<br>
                <span class="h1-accent">guide complet pour une protection d'urgence (2026)</span>
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
                Votre toit a subi une tempête et des tuiles ont volé ? Une fuite soudaine menace votre salon ? Vous devez bâcher rapidement mais vous ne savez pas comment vous y prendre ? Voici tout ce qu'il faut savoir pour <strong>poser une bâche</strong> de protection efficacement et en sécurité. Quand faut-il intervenir, quel matériel choisir, et comment éviter les erreurs qui coûtent cher ?
            </p>

            <div class="article-content">

                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                        L'essentiel à retenir
                    </div>
                    <ul>
                        <li><strong>Coût moyen bâchage professionnel :</strong> 25 à 35 €/m² selon l'urgence et l'accessibilité.</li>
                        <li><strong>Durée maximale recommandée :</strong> 3 à 4 semaines, au-delà les risques augmentent.</li>
                        <li><strong>Personnes requises :</strong> minimum 2 personnes pour la sécurité, 3 si le toit est complexe.</li>
                        <li><strong>Grammage minimum :</strong> 200 g/m² en PVC armé, garantie 5 ans.</li>
                    </ul>
                </div>

                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li><a href="#quand-bacher">Quand bâcher un toit est indispensable</a></li>
                        <li><a href="#materiel">Matériel nécessaire pour bâcher un toit</a></li>
                        <li><a href="#etapes">Comment poser une bâche sur un toit : les étapes</a></li>
                        <li><a href="#duree">Combien de temps laisser une bâche sur un toit ?</a></li>
                        <li><a href="#prix">Prix d'un bâchage de toiture</a></li>
                        <li><a href="#faq">FAQ — Questions fréquentes</a></li>
                    </ul>
                </div>

                <h2 id="quand-bacher">Quand bâcher un toit est indispensable</h2>

                <h3>Protection temporaire après tempête</h3>
                <p>Une toiture endommagée par une tempête ou des vents violents expose votre maison à l'eau, au vent et aux intempéries. <strong>Poser une bâche</strong> permet de <strong>couvrir la zone endommagée</strong> en attendant les réparations définitives. C'est une solution d'urgence qui sauve votre intérieur des dégâts des eaux.</p>

                <h3>Obligation assurance (limiter les dégâts)</h3>
                <p>Votre contrat d'assurance habitation contient une clause dite de "limitation des dégâts". Cela signifie que vous devez faire tout ce qui est possible pour éviter que les dommages ne s'aggravent. Si vous laissez votre toit ouvert sans protection, l'assurance peut refuser de couvrir les dégâts supplémentaires. Prenez des photos avant et après la <strong>pose bâche</strong>, c'est votre preuve.</p>

                <h3>Chantier de rénovation retardé</h3>
                <p>Votre <strong>couvreur professionnel</strong> ne peut pas intervenir avant 3 semaines ? Le bâchage devient obligatoire. Même si la toiture n'est pas directement endommagée, un chantier de rénovation retardé expose la structure aux intempéries. Une <strong>bâche protection</strong> bien installée vous donne ce délai de répit. Si votre toiture est trop dégradée pour un simple bâchage, envisagez un <a href="<?php echo BASE_URL; ?>remaniement-de-couverture">remaniement de couverture</a> pour sauver votre toit à mi-budget avant qu'il ne soit trop tard.</p>

                <h3>Fuites soudaines</h3>
                <p>Une fuite qui apparaît en pleine nuit ou un week-end demande une réaction immédiate. En attendant le professionnel, <strong>fixer une bâche</strong> sur la zone concernée peut stopper l'infiltration. Attention : cela ne remplace pas la réparation, mais ça gagne du temps.</p>

                <h2 id="materiel">Matériel nécessaire pour bâcher un toit</h2>

                <h3>Type de bâche (PVC 200 g/m² minimum, 5 ans garantie)</h3>
                <p>Pour <strong>choisir une bâche</strong> adaptée, vérifiez ces critères :</p>
                <ul class="custom-list">
                    <li><strong>Grammage :</strong> 200 g/m² minimum pour résister au vent et aux UV</li>
                    <li><strong>Matériau :</strong> PVC armé (filet de renfort intégré) ou polyéthylène haute densité</li>
                    <li><strong>Traitement :</strong> anti-UV obligatoire, sinon la bâche pourrit en 2 semaines</li>
                    <li><strong>Garantie :</strong> minimum 5 ans pour les bâches professionnelles</li>
                    <li><strong>Couleur :</strong> privilégiez le transparent ou le blanc pour limiter la condensation</li>
                </ul>

                <div style="background-color: var(--color-light); border-left: 4px solid var(--color-primary); padding: 1.5rem; margin-bottom: 2rem; border-radius: 0 8px 8px 0;">
                    <strong>En clair :</strong> Une bâche de chantier basique à 15 € chez le bricoleur ne tiendra pas 3 jours sur un toit. Investissez dans du PVC armé 200 g/m² minimum.
                </div>

                <h3>Fixations (liteaux, sandows, œillets)</h3>
                <p>Pour <strong>fixer la bâche</strong> solidement, vous aurez besoin de :</p>
                <ul class="custom-list">
                    <li><strong>Liteaux :</strong> planches de bois minces (20×40 mm) servant à maintenir la bâche par le dessus</li>
                    <li><strong>Sandows :</strong> élastiques crochets qui tendent la bâche et absorbent les mouvements du vent</li>
                    <li><strong>Œillets :</strong> trous renforcés sur la bâche pour passer les fixations (vérifier qu'ils sont bien présents tous les 50 cm)</li>
                    <li><strong>Vis et chevilles :</strong> pour fixer les liteaux sans percer la toiture</li>
                </ul>

                <div style="background-color: var(--color-light); border-left: 4px solid var(--color-primary); padding: 1.5rem; margin-bottom: 2rem; border-radius: 0 8px 8px 0;">
                    <strong>En clair :</strong> Un <strong>liteau</strong> est une petite pièce de bois servant à maintenir, caler ou guider. Sur un toit, on le pose par-dessus la bâche et on le visse pour éviter de déchirer le plastique. Un <strong>sandow</strong> est un élastique avec crochets aux extrémités. Il permet de tendre la bâche sans la déchirer, car il absorbe les à-coups du vent. Un <strong>œillet</strong> est un anneau métallique ou plastique renforçant un trou dans la bâche. Il empêche le plastique de se déchirer sous la tension.
                </div>

                <h3>Sécurité (harnais, longe, échelle)</h3>

                <div style="background-color: #fbe3cb; border-left: 4px solid #e74c3c; padding: 1.5rem; margin-bottom: 2rem; border-radius: 0 8px 8px 0; color: #3e2e1f;">
                    <strong>Attention — Sécurité obligatoire :</strong> Monter sur un toit est dangereux. Un <strong>harnais sécurité</strong> avec longe est indispensable dès que vous quittez l'échelle. Une chute de toit peut être mortelle. Si vous n'êtes pas équipé ou formé, appelez un professionnel.
                </div>

                <p>Équipement de sécurité obligatoire :</p>
                <ul class="custom-list">
                    <li><strong>Harnais de toiture :</strong> avec points d'ancrage dorsal et sternal</li>
                    <li><strong>Longe antichute :</strong> 1,50 m maximum, avec absorbeur d'énergie</li>
                    <li><strong>Point d'ancrage :</strong> solide (cheminée, structure métallique), testé avant utilisation</li>
                    <li><strong>Échelle :</strong> stable, pieds antidérapants, dépassant 1 m au-dessus du faîte</li>
                    <li><strong>Chaussures :</strong> antidérapantes avec bonne accroche</li>
                </ul>

                <div style="background-color: var(--color-light); border-left: 4px solid var(--color-primary); padding: 1.5rem; margin-bottom: 2rem; border-radius: 0 8px 8px 0;">
                    <strong>En clair :</strong> Le <strong>faîtage</strong> est la ligne la plus haute du toit, là où les deux pans se rejoignent. C'est souvent là qu'on installe le point d'ancrage pour le harnais. Pour en savoir plus sur cette zone critique de la toiture, consultez notre guide sur le <a href="<?php echo BASE_URL; ?>faitage">faîtage et son importance pour l'étanchéité</a>.
                </div>

                <h3>Outils (mètre, appareil photo)</h3>
                <p>Avant de monter, préparez :</p>
                <ul class="custom-list">
                    <li>Mètre ruban de 10 m minimum</li>
                    <li>Appareil photo ou smartphone (pour l'assurance)</li>
                    <li>Cutter ou ciseaux (si la bâche doit être ajustée)</li>
                    <li>Perceuse-visseuse avec embouts adaptés</li>
                    <li>Niveau à bulle (pour vérifier l'écoulement de l'eau)</li>
                </ul>

                <h2 id="etapes">Comment poser une bâche sur un toit : les étapes</h2>

                <h3>Inspecter et mesurer la zone endommagée</h3>
                <p>Avant d'acheter quoi que ce soit, montez évaluer les dégâts. Identifiez précisément la <strong>zone endommagée</strong> et mesurez-la dans tous les sens. Notez la surface exacte à couvrir, la pente du toit, les obstacles (cheminée, lucarne, antenne), et l'état des tuiles environnantes. Si vos tuiles en terre cuite montrent des signes de vieillissement (mousse, lichens), un <a href="<?php echo BASE_URL; ?>demoussage-tuiles-terre-cuite">démoussage professionnel des tuiles</a> sera nécessaire après le retrait de la bâche.</p>

                <h3>Prendre des photos (preuve assurance)</h3>
                <p>Photographiez tout avant de toucher quoi que ce soit. Ces images serviront de preuve pour votre assurance. Montrez les dégâts généraux (vue d'ensemble), les détails des tuiles cassées ou manquantes, la <strong>zone endommagée</strong> avec un repère (mètre ou main), et l'état après <strong>pose bâche</strong> (pour prouver que vous avez protégé).</p>

                <h3>Choisir la bonne taille de bâche (débord 50 cm min)</h3>
                <p>Pour une protection efficace, la bâche doit dépasser la zone endommagée de <strong>minimum 50 cm de chaque côté</strong>. Si la zone fait 3×2 m, prenez une bâche de 4×3 m minimum. Cela garantit que l'eau ne rentrera pas par les bords, même avec du vent.</p>

                <h3>Nettoyer les débris</h3>
                <p>Avant de <strong>poser la bâche</strong>, retirez les tuiles cassées, les branches et les débris. Une bâche posée sur des aspérités se déchire en 48 heures. La surface doit être la plus lisse possible.</p>

                <h3>Poser la bâche (technique du bas vers le haut)</h3>
                <p>La règle d'or : on commence par le <strong>bas du toit</strong> et on remonte vers le faîte. Pourquoi ? Parce que l'eau coule vers le bas. Si vous posez dans l'autre sens, l'eau s'infiltrera sous les recouvrements.</p>
                <p>Technique :</p>
                <ol>
                    <li>Déployez la bâche au sol pour vérifier son orientation</li>
                    <li>Attachez-la provisoirement en haut avec des sandows</li>
                    <li>Déroulez vers le bas en tendant bien</li>
                    <li>Laissez un débord de 50 cm minimum sur les bords et en bas</li>
                </ol>

                <h3>Fixer solidement (liteaux vissés, pas clous direct)</h3>

                <div style="background-color: #fbe3cb; border-left: 4px solid #e74c3c; padding: 1.5rem; margin-bottom: 2rem; border-radius: 0 8px 8px 0; color: #3e2e1f;">
                    <strong>Erreur fatale à éviter :</strong> Ne fixez jamais la bâche directement avec des clous ou des agrafes dans la toiture. Vous créeriez des trous qui provoqueront des fuites permanentes. Utilisez toujours des liteaux posés par-dessus.
                </div>

                <p>Méthode de fixation correcte :</p>
                <ol>
                    <li>Posez les liteaux par-dessus la bâche, perpendiculairement aux liteaux du toit</li>
                    <li>Vissez les liteaux à travers la bâche dans les liteaux existants</li>
                    <li>Espacement des fixations : tous les 30-40 cm</li>
                    <li>Utilisez des sandows aux angles pour tendre la bâche</li>
                    <li>Vérifiez qu'aucun pli ne retient l'eau</li>
                </ol>

                <h3>Vérifier l'étanchéité</h3>
                <p>Une fois la <strong>bâche toit</strong> posée, arrosez-la avec un tuyau d'arrosage (depuis l'échelle, pas depuis le sol). Vérifiez qu'aucune goutte ne passe. Inspectez aussi l'intérieur de la maison pendant quelques minutes pour confirmer l'étanchéité.</p>

                <blockquote class="article-blockquote">
                    <p>"L'hiver 2019, j'ai dû bâcher une toiture en urgence à 20h un samedi soir. Le propriétaire paniquait, l'eau rentrait par une brèche de 2 m². On a posé la bâche à 3, un collègue en haut avec le harnais, moi au milieu, un troisième en bas pour passer le matériel. En 45 minutes c'était étanche. La leçon ? Sur un toit, on ne travaille jamais seul. Jamais."</p>
                </blockquote>

                <h2 id="duree">Combien de temps laisser une bâche sur un toit ?</h2>

                <h3>Durée recommandée (quelques semaines max)</h3>
                <p>Une <strong>bâche protection</strong> n'est pas une solution permanente. La durée maximale recommandée est de <strong>3 à 4 semaines</strong>. Au-delà, les risques augmentent considérablement : dégradation par les UV, déchirures dues au vent, <strong>poches d'eau</strong> qui s'accumulent, condensation qui moisit la charpente.</p>

                <h3>Vérifications régulières</h3>
                <p>Si la bâche reste plus d'une semaine, inspectez-la tous les 2-3 jours : vérifiez les fixations (vent, dilatation), videz les <strong>poches eau</strong> qui se forment, contrôlez l'état du plastique (déchirures, usure), et assurez-vous que l'eau s'écoule bien.</p>

                <div style="background-color: var(--color-light); border-left: 4px solid var(--color-primary); padding: 1.5rem; margin-bottom: 2rem; border-radius: 0 8px 8px 0;">
                    <strong>En clair :</strong> Une poche d'eau sur une bâche pèse des dizaines de kilos. Elle finit par déchirer la bâche ou endommager la structure sous-jacente. Videz-les immédiatement.
                </div>

                <h3>Risques si prolongé (UV, vent)</h3>
                <p>Même une bâche "5 ans garantie" ne résiste pas éternellement sur un toit exposé. Les <strong>UV</strong> dégradent le plastique en 4-6 semaines, il devient fragile et craquelé. Le <strong>vent</strong> soulève les bords, crée des battements qui usent la bâche. La <strong>condensation</strong> piège l'humidité sous la bâche, favorise les moisissures. La neige ou eau accumulée dépassent la résistance de la bâche.</p>

                <h2 id="prix">Prix d'un bâchage de toiture</h2>

                <h3>Prix au m² (25-35 €/m²)</h3>
                <p>Le tarif d'un <strong>couvreur professionnel</strong> pour bâcher une toiture se situe entre <strong>25 et 35 €/m²</strong>. Ce prix comprend la bâche professionnelle (PVC 200 g/m²), la main-d'œuvre (2 personnes minimum), les fixations (liteaux, sandows), et la mise en sécurité (<strong>harnais sécurité</strong>, longes).</p>

                <h3>Forfait déplacement (300-400 €)</h3>
                <p>La plupart des couvreurs appliquent un forfait déplacement de <strong>300 à 400 €</strong>, surtout en urgence ou le week-end. Ce forfait couvre le déplacement aller-retour, la mise en sécurité du chantier, l'équipement de protection individuelle, et la première heure de travail.</p>

                <h3>Total pour 100 m² (1600-1900 €)</h3>
                <p>Pour une surface de 100 m² à bâcher, on pourrait penser à 100 m² × 30 €/m² = 3 000 €. En réalité, on ne bâche jamais 100 m² d'un seul tenant. On divise en sections de 20-30 m² maximum pour la sécurité et la tenue au vent. Le coût total pour 100 m² se situe plutôt entre <strong>1 600 et 1 900 €</strong> car les économies d'échelle s'appliquent sur le forfait déplacement. Pour une solution permanente, envisagez plutôt un <a href="<?php echo BASE_URL; ?>changement-de-couverture">changement complet de couverture</a> si votre toiture est trop vieillissante.</p>

                <h3>Variables (urgence, accessibilité)</h3>
                <p>Les facteurs qui font varier le prix :</p>
                <ul class="custom-list">
                    <li><strong>Urgence :</strong> +30 à 50 % en soirée, week-end ou jour férié</li>
                    <li><strong>Accessibilité :</strong> toit plat = standard ; toit pentu ou complexe = +20 %</li>
                    <li><strong>Hauteur :</strong> plus de 2 étages = équipement spécifique, tarif majoré</li>
                    <li><strong>Météo :</strong> intervention sous la pluie ou le vent = risque majoré, prix majoré</li>
                    <li><strong>Surface :</strong> moins de 10 m² = forfait minimum souvent appliqué</li>
                </ul>

                <h2 id="faq">FAQ — Questions fréquentes</h2>

                <h3>Peut-on bâcher soi-même ?</h3>
                <p>Oui, si vous êtes bricoleur confirmé, bien équipé et accompagné. Non, si le toit est pentu, haut ou complexe. Le <strong>harnais sécurité</strong> est obligatoire dès que vous quittez l'échelle. Si vous avez le moindre doute sur votre équilibre ou votre équipement, appelez un <strong>couvreur professionnel</strong>. Une chute de toit coûte plus cher qu'une intervention.</p>

                <h3>Quel grammage choisir ?</h3>
                <p>Le grammage minimum est de <strong>200 g/m²</strong> pour une bâche de toiture. En dessous, le vent la déchire en quelques jours. Pour une exposition longue (plus de 2 semaines) ou une zone très ventée, montez à 240-280 g/m². Les bâches de 100-140 g/m² sont réservées au jardinage, pas à la toiture.</p>

                <h3>Bâche avec ou sans œillets ?</h3>
                <p><strong>Avec œillets</strong>, obligatoirement. Les œillets sont des trous renforcés qui permettent de passer les sandows ou les cordes sans déchirer la bâche. Vérifiez qu'ils sont espacés de 50 cm maximum sur le pourtour. Sans œillets, vous serez obligé de percer la bâche, ce qui l'affaiblit et annule souvent la garantie.</p>

                <h3>Comment éviter les poches d'eau ?</h3>
                <p>Les <strong>poches eau</strong> se forment quand la bâche n'est pas assez tendue ou quand un pli retient l'eau. Pour les éviter : tendez la bâche au maximum avec des sandows, posez des liteaux pour maintenir la surface plane, vérifiez que l'eau s'écoule bien vers les gouttières, et videz immédiatement toute poche qui se forme. Une poche d'eau de 1 m² et 5 cm de profondeur pèse 50 kg. Elle finit par déchirer la bâche.</p>

                <h3>L'assurance rembourse-t-elle le bâchage ?</h3>
                <p>Oui, dans la plupart des cas. Le bâchage est considéré comme une "mesure conservatoire" pour limiter les dégâts. Gardez tous les justificatifs (facture, photos avant/après). Attention : si vous ne faites rien pour protéger votre toit et que les dégâts s'aggravent, l'assurance peut refuser de couvrir l'extension des dommages. La <strong>bâche protection</strong> est aussi une protection juridique.</p>

            </div><!-- /.article-content -->

            <div class="author-box-bottom">
                <div class="author-box-img">
                    <img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe">
                </div>
                <div class="author-box-content">
                    <h3>Philippe</h3>
                    <span class="author-role">Expert Rénovation &amp; Artisan RGE</span>
                    <p>Avec plus de 20 ans d'expérience sur les chantiers, Philippe vous partage ses conseils concrets et sans langue de bois. Spécialiste des travaux de rénovation et d'urgence toiture.</p>
                    <a href="<?php echo BASE_URL; ?>philippe" class="btn-outline">Voir son profil complet</a>
                </div>
            </div>

            <div class="conclusion-box">
                <h3>Besoin d'un couvreur en urgence ?</h3>
                <p>Bâcher un toit est une opération technique et dangereuse. Si vous n'êtes pas équipé d'un <strong>harnais sécurité</strong> et accompagné, ne montez pas. Un <strong>couvreur professionnel</strong> posera une <strong>bâche toit</strong> étanche en moins d'une heure, avec les garanties décennales qui protègent votre habitation. N'attendez pas que la prochaine pluie transforme votre salon en piscine. Pour protéger durablement votre toiture sans passer par le bâchage, explorez nos solutions d'<a href="<?php echo BASE_URL; ?>hydrofuge-de-toiture">hydrofuge de toiture</a> qui imperméabilisent et allongent la vie de vos tuiles.</p>
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
        'question' => "Peut-on bâcher soi-même ?",
        'answer'   => "Oui, si vous êtes bricoleur confirmé, bien équipé et accompagné. Non, si le toit est pentu, haut ou complexe. Le harnais de sécurité est obligatoire dès que vous quittez l'échelle. Si vous avez le moindre doute, appelez un couvreur professionnel."
    ],
    [
        'question' => "Quel grammage choisir pour une bâche de toit ?",
        'answer'   => "Le grammage minimum est de 200 g/m² pour une bâche de toiture. En dessous, le vent la déchire en quelques jours. Pour une exposition longue ou une zone très ventée, montez à 240-280 g/m²."
    ],
    [
        'question' => "Faut-il des œillets sur la bâche ?",
        'answer'   => "Avec œillets, obligatoirement. Les œillets sont des trous renforcés qui permettent de passer les sandows ou les cordes sans déchirer la bâche. Vérifiez qu'ils sont espacés de 50 cm maximum sur le pourtour."
    ],
    [
        'question' => "Comment éviter les poches d'eau ?",
        'answer'   => "Les poches d'eau se forment quand la bâche n'est pas assez tendue. Tendez-la au maximum avec des sandows, posez des liteaux pour maintenir la surface plane, et videz immédiatement toute poche qui se forme."
    ],
    [
        'question' => "L'assurance rembourse-t-elle le bâchage ?",
        'answer'   => "Oui, dans la plupart des cas. Le bâchage est considéré comme une mesure conservatoire pour limiter les dégâts. Gardez tous les justificatifs (facture, photos avant/après)."
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
