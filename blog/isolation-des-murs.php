<?php
/**
 * isolation-des-murs.php
 * Article: Isolation des murs (ITI vs ITE) — prix, aides, méthodes
 */

$article_meta = [
    'title' => 'Isolation des murs : Prix 2026, Méthodes (ITI vs ITE) et Aides',
    'category' => 'maison',
    'image' => 'https://www.cemarenov.fr/image/isolation-des-murs.webp',
    'excerpt' => 'Isoler par l\'intérieur (ITI) ou par l\'extérieur (ITE) ? Le comparatif définitif des prix au m², des avantages réels et des aides 2026 (MaPrimeRénov\') pour faire le bon choix.',
    'date' => '2026-03-05',
    'reading_time' => 14,
];

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
    return $b['score'] - $a['score'];
});
$similar_articles = array_slice($similar_articles, 0, 3);

include dirname(__DIR__) . '/header.php';
?>

<article>
    <section class="article-hero" style="background-image: url('<?php echo $article_meta['image']; ?>');">
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
                <span>Traitement murs</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Thermique</span>
                <span class="article-tag">Énergie</span>
            </div>

            <h1>Isolation des murs (ITI vs ITE) :<br>
                <span class="h1-accent">Tarifs 2026, Comparatif et Aides de l'État</span>
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
                    <?php
                endforeach; ?>
            </div>
        </aside>

        <div class="article-container">

            <p class="article-intro">
                Vos murs représentent jusqu'à <strong>25 % des déperditions de chaleur</strong> d'une maison mal isolée.
                Si la sensation de parois froides l'hiver et de chaleur étouffante l'été devient insupportable, c'est le
                chantier prioritaire après l'<a href="<?php echo BASE_URL; ?>isolation-des-combles-perdus"
                    style="text-decoration: underline;">isolation des combles perdus</a> (toiture). Mais vient vite la
                question fatidique : faut-il isoler par l'intérieur (ITI) ou par l'extérieur (ITE) ? Entre la perte de
                m² habitables d'un côté et le coût vertigineux d'un échafaudage de l'autre, le choix est stratégique.
                Décryptage des tarifs 2026 au m², des avantages réels de chaque méthode et des aides "MaPrimeRénov'"
                pour faire fondre la facture.
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
                    <ul>
                        <li><strong>Par l'Intérieur (ITI) :</strong> 40 à 90 €/m² posé. Moins cher, idéal pour rénover
                            pièce par pièce en redécorant. Inconvénient : réduit la surface habitable (perte de 10 à 15
                            cm par mur).</li>
                        <li><strong>Par l'Extérieur (ITE) :</strong> 120 à 270 €/m² posé. Le top de l'efficacité (coupe
                            tous les ponts thermiques) et refait votre façade à neuf. Très lourd et soumis à déclaration
                            Mairie (PLU).</li>
                        <li><strong>Les aides 2026 :</strong> <em>MaPrimeRénov'</em> et <em>Primes CEE</em> financent
                            une grosse partie (jusqu'à 90% pour les plus modestes en parcours global). Artisan RGE
                            obligatoire.</li>
                    </ul>
                </div>

                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li><a href="#comparatif">Le match final : ITI (Intérieur) vs ITE (Extérieur)</a></li>
                        <li><a href="#prix-iti">Prix de l'isolation des murs par l'intérieur (ITI)</a></li>
                        <li><a href="#prix-ite">Prix de l'isolation des murs par l'extérieur (ITE)</a></li>
                        <li><a href="#isolants">Lequel choisir : Laine de verre, Polystyrène, ou Biosourcés ?</a></li>
                        <li><a href="#aides">Aides 2026 : Comment financer vos murs ?</a></li>
                        <li><a href="#faq">Foire Aux Questions (FAQ)</a></li>
                    </ul>
                </div>

                <!-- Section 1 : Comparatif -->
                <h2 id="comparatif">Le match final : ITI (Intérieur) vs ITE (Extérieur)</h2>
                <p>Isoler un mur revient à lui enfiler un manteau. Soit vous l'enfilez sous vos vêtements (intérieur),
                    soit par-dessus (extérieur). Les deux méthodes font chuter la facture de chauffage, mais l'impact
                    sur votre vie quotidienne est radicalement différent.</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Critère</th>
                                <th>Isolation par l'Intérieur (ITI)</th>
                                <th>Isolation par l'Extérieur (ITE)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Performance Thermique</strong></td>
                                <td>Bonne (mais laisse des ponts thermiques aux planchers/plafonds)</td>
                                <td><strong>Excellente</strong> (Supprime 100% des ponts thermiques)</td>
                            </tr>
                            <tr>
                                <td><strong>Espace Habitable</strong></td>
                                <td>❌ Réduit la pièce de 10 à 15 cm sur chaque mur traité</td>
                                <td>✅ 0 m² perdu à l'intérieur</td>
                            </tr>
                            <tr>
                                <td><strong>Travaux et Nuisances</strong></td>
                                <td>Intrusif (Faut vider les pièces, déplacer électricité, prises, radiateurs)</td>
                                <td>Discret (Tout se passe dehors, on vit normalement dedans)</td>
                            </tr>
                            <tr>
                                <td><strong>Esthétique</strong></td>
                                <td>Oblige à refaire peintures et tapisseries (pratique si prévu)</td>
                                <td>Modifie la façade (Ravalement neuf inclus, mais accord PLU Mairie requis)</td>
                            </tr>
                            <tr>
                                <td><strong>Budget</strong></td>
                                <td><strong>Économique</strong></td>
                                <td><strong>Investissement Lourd</strong> (2 à 3x plus cher)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <blockquote class="article-blockquote">
                    <strong>L'avis terrain du thermicien :</strong> Si votre façade est en bon état et que vous avez un
                    budget serré (< 10 000€) : faites de l'ITI. Si votre façade est fissurée, affreuse, et qu'elle doit
                        en réalité subir un indispensable <a href="<?php echo BASE_URL; ?>ravalement-de-facade"
                        style="text-decoration: underline;">ravalement de façade complet</a> de toute urgence : faites
                        un crédit et passez sur l'ITE. Vous ferez d'une pierre deux coups et la plus-value de la maison
                        explosera pour la revente (amélioration massive du DPE).
                </blockquote>

                <!-- Section 2 : Prix ITI -->
                <h2 id="prix-iti">Prix de l'isolation des murs par l'intérieur (ITI)</h2>
                <p>L'<a href="<?php echo BASE_URL; ?>isolation-thermique-interieur-iti"
                        style="text-decoration: underline;">isolation thermique par l'intérieur (ITI)</a> est
                    techniquement et financièrement la star de la rénovation française car elle est réalisable pièce par
                    pièce. On distingue deux grandes méthodes de pose qui conditionnent le devis final.</p>

                <h3>Le Doublage Collé (40 à 60 € / m² posé)</h3>
                <p>C'est la méthode rapide : on colle directement sur le mur brut des panneaux composites (un isolant
                    type polystyrène expansé couplé à une plaque de plâtre BA13) à l'aide de plots de mortier adhésif
                    (MAP).</p>
                <ul class="custom-list">
                    <li><strong>Avantage :</strong> Très rapide, très peu cher en main-d'œuvre.</li>
                    <li><strong>Inconvénient :</strong> Le mur d'origine doit être <em>parfaitement</em> plat et sain
                        (sans humidité vitale). Difficile d'y cacher des grosses gaines électriques.</li>
                </ul>

                <h3>L'Ossature Métallique (60 à 90 € / m² posé)</h3>
                <p>On fixe des rails métalliques au sol et au plafond. On glisse de la laine minérale (rouleaux ou
                    panneaux semi-rigides) contre le mur, puis on vient visser des plaques de plâtre sur les rails.</p>
                <ul class="custom-list">
                    <li><strong>Avantage :</strong> On rattrape les murs tordus des vieilles bâtisses. On passe toute
                        l'électricité et la plomberie derrière facilement. L'isolation phonique est exceptionnelle. Si vous intégrez une <strong><u><a href="<?php echo BASE_URL; ?>epaisseur-cloison-pour-porte-a-galandage">porte à galandage dans la cloison</a></u></strong>, le choix de l'épaisseur de rail conditionne directement le montage.</li>
                    <li><strong>Inconvénient :</strong> Plus cher, plus long, et l'épaisseur totale (rail + laine +
                        placo) grignote un peu plus d'espace vital.</li>
                </ul>

                <!-- Section 3 : Prix ITE -->
                <h2 id="prix-ite">Prix de l'isolation des murs par l'extérieur (ITE)</h2>
                <p>C'est le traitement de luxe. C'est l'équivalent thermique de mettre la maison dans une glacière
                    intégrale de haute performance. L'inertie des murs est conservée : les murs en parpaings restent au
                    chaud l'hiver et gardent la fraîcheur de la nuit l'été.</p>

                <h3>L'ITE sous enduit (120 à 220 € / m²)</h3>
                <p>La méthode la plus courante. Des panneaux de polystyrène (blanc ou expansé graphité gris) sont collés
                    et chevillés sur la façade extérieure. On applique ensuite une trame en fibre de verre noyée dans un
                    sous-enduit, puis on termine par la finition (crépi gratté, taloché).</p>

                <h3>L'ITE sous bardage (180 à 270 € / m²)</h3>
                <p>Une ossature en bois ou métallique est fixée à la façade. L'isolant (souvent de la laine de roche ou
                    de verre) est inséré entre les montants. On referme avec un pare-pluie, puis on habille la maison
                    d'un bardage (bois, fibre-ciment type Cedral, zinc, ou composite).</p>
                <ul class="custom-list">
                    <li><strong>Avantage :</strong> Architecture ultramoderne, résistance exceptionnelle aux chocs,
                        laisse parfaitement respirer les vieux murs humides.</li>
                    <li><strong>Inconvénient :</strong> Coût premium, épaisseur très importante (débords de toiture à
                        prolonger parfois).</li>
                </ul>

                <!-- Section 4 : Choix isolants -->
                <h2 id="isolants">Lequel choisir : Laine, Polystyrène ou Biosourcés ?</h2>
                <p>Dans un devis, l'épaisseur de l'isolant l'emporte sur le type de matériau pour obtenir les aides,
                    mais le <em>choix</em> du produit modifie la facture finale de la fourniture.</p>

                <ul class="custom-list">
                    <li><strong>Les Laines Minérales (Verre, Roche) :</strong> De 10 à 20 €/m². Le standard imbattable
                        en ITI (sur ossature) et sous bardage. Ininflammables, excellentes performances acoustiques,
                        mais craignent l'eau.</li>
                    <li><strong>Le Polystyrène (PSE, XPS, PUR) :</strong> De 15 à 30 €/m². Le roi de l'ITE sous enduit
                        et de l'ITI collée. Imputrescible, très fin pour un gros pouvoir thermique, mais zéro
                        insonorisation et bilan écolo faible.</li>
                    <li><strong>Les Biosourcés (Fibre de bois, Chanvre, Liège) :</strong> De 25 à 50+ €/m². Très chers,
                        mais parfaits pour les maisons anciennes (pisé, vieilles pierres) car ils gèrent formidablement
                        bien l'humidité (perspirants) et empêchent la maison de surchauffer l'été (excellent
                        "déphasage").</li>
                </ul>

                <!-- Section 5 : Aides -->
                <h2 id="aides">Aides 2026 : Comment financer vos murs ?</h2>
                <p>L'État subventionne massivement l'isolation des murs, car c'est là que les passoires thermiques
                    perdent leurs lettres de noblesse (DPE F ou G). Il est crucial de signer le devis
                    <strong>après</strong> avoir monté les dossiers d'aide.</p>

                <p><strong>Conditions absolues pour toucher une aide :</strong> L'artisan doit être certifié RGE
                    (Reconnu Garant de l'Environnement) à la date de la facture. Les isolants doivent atteindre une
                    résistance thermique minimale (souvent <strong>R ≥ 3,7 m².K/W</strong> en ITI).</p>

                <ol>
                    <li><strong>MaPrimeRénov' (Parcours par geste) :</strong> Réservée aux ménages modestes et très
                        modestes s'il s'agit d'un "mono-geste" (isoler un seul mur) en 2026. L'aide est calculée en
                        forfait par mètre carré (ex: 25 à 75€ du m² en ITE selon revenus).</li>
                    <li><strong>MaPrimeRénov' Parcours Accompagné (Rénovation Globale) :</strong> C'est ici qu'est
                        l'argent magique. Si vous réalisez l'isolation des murs ET de la toiture (ou d'une Pompe à
                        chaleur) en gagnant au moins 2 classes DPE, l'État finance un pourcentage global de la facture
                        HT, <strong>pouvant atteindre jusqu'à 80% voire 90% pour les plus précaires !</strong></li>
                    <li><strong>Les Primes CEE (Certificats d'Économies d'Énergie) :</strong> Versées par Total, EDF,
                        Engie, etc. Elles sont cumulables avec MaPrimeRénov' simple et peuvent faire baisser la facture
                        de quelques centaines à milliers d'euros.</li>
                    <li><strong>L'Éco-PTZ et la TVA à 5,5% :</strong> La TVA réduite s'applique directement sur la
                        facture du pro. L'Éco-prêt à taux zéro permet d'emprunter jusqu'à 50 000€ sur 20 ans sans payer
                        1 centime d'intérêt à la banque pour votre ITE.</li>
                </ol>

                <!-- Section 6 : FAQ -->
                <h2 id="faq">Foire Aux Questions (FAQ)</h2>

                <h3>Faut-il isoler tous les murs de la maison en même temps ?</h3>
                <p>Non, c'est l'avantage de l'ITI (intérieur), vous pouvez faire le mur Nord de la chambre cette année,
                    et le salon l'année prochaine. Par contre, pour une isolation extérieure (ITE), les coûts fixes
                    (échafaudage, déplacement) rendent l'opération en plusieurs fois financièrement absurde.</p>

                <h3>Mon mur est très humide, puis-je la cacher avec l'isolation ?</h3>
                <p><strong>Surtout pas !</strong> C'est la pire erreur en rénovation (souvent appelée "cache-misère").
                    Si vous posez du placo expansé sur un mur qui subit des remontées capillaires, l'humidité va pourrir
                    l'isolant, le champignon va s'étendre gravement sans que vous le voyiez, et la structure
                    s'écroulera. Il faut assécher (injection, VMC, drainage) AVANT d'isoler.</p>

                <h3>ITE : Puis-je modifier ma façade comme bon me semble ?</h3>
                <p>Non. Modifier l'aspect d'une façade ou son épaisseur (l'ITE déborde souvent sur les trottoirs)
                    requiert une <strong>Déclaration Préalable de Travaux (DP)</strong> en mairie. Selon le Plan Local
                    d'Urbanisme (PLU) ou si vous êtes près d'un monument historique (ABF), on pourra vous imposer des
                    couleurs d'enduit, vous interdire le bardage bois, ou pire, vous refuser carrément l'ITE (ce qui
                    laisse l'ITI comme unique solution).</p>

                <h3>Quelle isolation des murs choisir pour une vieille maison en pierre ?</h3>
                <p>La pierre doit respirer pour évacuer l'humidité. Fuyez le "Polystyrène", que ce soit dedans ou
                    dehors, c'est du plastique qui créera de la condensation et du salpêtre. En ITI : optez pour une
                    ossature avec laine de roche ménageant une lame d'air, ou mieux, des isolants biosourcés (fibre de
                    bois, chanvre). En ITE : un enduit chaux-chanvre ultra perspirant est l'idéal du bâtisseur ancien.
                </p>

            </div> <!-- .article-content -->

            <!-- Author Box -->
            <div class="author-box-bottom">
                <div class="author-box-img">
                    <img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe">
                </div>
                <div class="author-box-content">
                    <h3>Philippe</h3>
                    <span class="author-role">Expert R&eacute;novation &amp; Artisan RGE</span>
                    <p>Avec plus de 20 ans d&rsquo;exp&eacute;rience sur les chantiers, Philippe vous partage ses
                        conseils concrets et sans langue de bois pour r&eacute;ussir vos travaux et &eacute;viter les
                        arnaques.</p>
                    <a href="<?php echo BASE_URL; ?>philippe" class="btn-outline">Voir son profil complet</a>
                </div>
            </div>

            <!-- Conclusion Box -->
            <div class="conclusion-box">
                <h3>L'essentiel à retenir</h3>
                <p>
                    L'isolation des murs est le deuxième pilier de la rénovation thermique. Pour les budgets serrés (et
                    les amoureux de leur façade extérieure ou ravalement récent), <strong>l'Isolation par l'Intérieur
                        (ITI)</strong> autour de 60 € / m² offre un ratio efficacité-prix écrasant. Pour ceux qui voient
                    à très long terme et veulent moderniser le look de la maison, chasser tous les ponts thermiques tout
                    en gardant 100% de leur espace habitable, <strong>l'<a
                            href="<?php echo BASE_URL; ?>isolation-thermique-exterieur-ite"
                            style="text-decoration: underline;">isolation thermique par l'extérieur (ITE)</a> à 180 € /
                        m² reste la Rolls-Royce absolue du bâtiment.</strong> Montez vos dossiers d'aides
                    (MaPrimeRénov') avant tout devis signé !
                </p>
                <a href="<?php echo BASE_URL; ?>contact" class="btn-primary">Comparer des devis ITI & ITE certifiés
                    RGE</a>
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
                        <?php
                    endforeach; ?>
                </div>
            </section>

        </div>

        <aside class="sidebar-right">
            <div class="sidebar-sticky">
                <div class="sidebar-block">
                    <h3 class="sidebar-title">Derniers articles — <?php echo htmlspecialchars($category['name']); ?>
                    </h3>
                    <?php foreach ($cat_articles as $art): ?>
                        <a href="<?php echo $art['url'] ?? '#'; ?>" class="sidebar-article-card">
                            <img src="<?php echo $art['image']; ?>" alt="<?php echo htmlspecialchars($art['title']); ?>">
                            <span><?php echo htmlspecialchars($art['title']); ?></span>
                        </a>
                        <?php
                    endforeach; ?>
                </div>

                <div class="sidebar-block">
                    <h3 class="sidebar-title">Les plus récents</h3>
                    <?php foreach ($latest_articles as $art): ?>
                        <a href="<?php echo $art['url'] ?? '#'; ?>" class="sidebar-article-card">
                            <img src="<?php echo $art['image']; ?>" alt="<?php echo htmlspecialchars($art['title']); ?>">
                            <span><?php echo htmlspecialchars($art['title']); ?></span>
                        </a>
                        <?php
                    endforeach; ?>
                </div>
            </div>
        </aside>

    </div>
</article>


<?php
// --- Schema.org Structured Data ---
require_once dirname(__DIR__) . '/schema-data.php';
$_schema = get_schema_data(basename(__FILE__, '.php'));
echo generate_article_schema($article_meta, $_schema['faq'] ?? [], $_schema['howto'] ?? []);
echo generate_rating_widget();
?>
<?php include dirname(__DIR__) . '/footer.php'; ?>