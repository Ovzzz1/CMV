<?php
/**
 * isolation-sous-rampants-toiture.php
 * Article: Isolation sous rampants toiture — prix, épaisseur, aides
 */

$article_meta = [
    'title' => 'Isolation sous rampants de toiture : Prix au m², Épaisseurs et Aides 2026',
    'category' => 'isolation',
    'image' => 'https://www.cemarenov.fr/image/isolation-sous-rampants-toiture.webp',
    'excerpt' => '30% des pertes de chaleur se font par le toit. Isoler sous rampants est l\'étape n°1 des combles aménageables. Tableau des prix, R minimal et décryptage des aides 2026.',
    'date' => '2026-03-05',
    'reading_time' => 11,
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
                <span>Toiture & Combles</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Thermique</span>
                <span class="article-tag">Toiture</span>
            </div>

            <h1>Isolation sous rampants de toiture :<br>
                <span class="h1-accent">Prix, Épaisseurs idéales et Aides (2026)</span>
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
                Dans une maison non isolée, la toiture est le pire ennemi de votre facture de chauffage : l'air chaud
                monte et jusqu'à <strong>30 % de la chaleur s'échappe par la couverture</strong>. Si vous souhaitez
                aménager vos combles pour y créer une chambre ou un bureau (contrairement aux espaces inutilisables qui
                nécessiteront une classique <a href="<?php echo BASE_URL; ?>isolation-des-combles-perdus"
                    style="text-decoration: underline;">isolation des combles perdus</a>), <strong>l'isolation sous
                    rampants</strong> est l'étape technique inévitable. Du choix du matériau (pour ne pas étouffer
                l'été) aux épaisseurs requises pour décrocher les aides financières, voici le guide complet pour isoler
                sa toiture, de l'intérieur comme de l'extérieur.
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
                        <li><strong>Le standard (Isolation par l'Intérieur) :</strong> Pose d'isolant entre les chevrons
                            (souvent en double couche), pare-vapeur et finition placo. Coût moyen : <strong>50 à 100
                                €/m²</strong> posé (placo non inclus). Éclipse 20 à 30 cm de hauteur sous plafond.</li>
                        <li><strong>Le premium (Sarking extérieur) :</strong> On isole <em>par-dessus</em> la charpente
                            en déposant les tuiles. Ne réduit pas les combles et détruit tous les ponts thermiques. Très
                            cher : <strong>150 à 250 €/m²</strong>.</li>
                        <li><strong>La condition pour les aides :</strong> L'isolant posé doit avoir une Résistance
                            thermique (R) <strong>≥ 6 m².K/W</strong> (soit souvent 20 à 24 cm de laine minérale ou
                            biosourcée).</li>
                    </ul>
                </div>

                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li><a href="#interieur-exterieur">Les 2 méthodes : Intérieur (Rampants) vs Extérieur
                                (Sarking)</a></li>
                        <li><a href="#prix">Prix de l'isolation de toiture au m² en 2026</a></li>
                        <li><a href="#materiaux">Quels isolants choisir pour ne pas étouffer l'été ?</a></li>
                        <li><a href="#epaisseur-r">La règle absolue : L'épaisseur et la valeur "R"</a></li>
                        <li><a href="#pare-vapeur">Le détail mortel : Le Pare-Vapeur et la Lame d'air</a></li>
                        <li><a href="#aides">Aides financières 2026 : MaPrimeRénov' et CEE</a></li>
                        <li><a href="#faq">Foire Aux Questions (FAQ)</a></li>
                    </ul>
                </div>

                <!-- Section 1 : Méthodes -->
                <h2 id="interieur-exterieur">Les 2 méthodes : Intérieur (Sous rampants) vs Extérieur (Sarking)</h2>

                <h3>1. Isolation par l'intérieur (La plus courante)</h3>
                <p>C'est ce qu'on appelle historiquement "l'isolation sous rampants". On vient se glisser sous la
                    charpente existante, directement dans la pente du toit. On insère une première couche de panneaux
                    (ou rouleaux) entre les chevrons, puis très souvent une deuxième couche croisée vissée sur des
                    suspentes métalliques, avant de refermer avec du BA13.</p>
                <ul class="custom-list">
                    <li><strong>Pour qui ?</strong> Particuliers avec des combles à aménager dont la charpente est belle
                        hauteur.</li>
                    <li><strong>Le Hic :</strong> Si vos combles sont déjà bas de plafond, la double épaisseur de
                        l'isolant peut vous faire perdre 25 cm de hauteur utile... et la qualification "surface Loi
                        Carrez" de la pièce avec.</li>
                </ul>

                <h3>2. Isolation par l'extérieur ou "Sarking" (Le top technique)</h3>
                <p>C'est l'inverse absolu. L'artisan découvre le toit entier (dépose des tuiles). Des plaques d'isolants
                    très denses (souvent de la fibre de bois ou du polyuréthane) sont montées sur les pannes de la
                    charpente <em>par-dessus</em>, formant un immense bouclier continu. Les tuiles sont reposées
                    au-dessus de l'isolant.</p>
                <ul class="custom-list">
                    <li><strong>Pour qui ?</strong> Si vous deviez de toute façon refaire votre toiture avec un
                        indispensable <a href="<?php echo BASE_URL; ?>changement-de-couverture"
                            style="text-decoration: underline;">changement intégral de la couverture</a> (tuiles
                        poreuses ou en fin de vie), ou si la charpente est trop basse pour perdre de l'espace à
                        l'intérieur (ou pour laisser les belles poutres apparentes).</li>
                    <li><strong>Le Hic :</strong> Le chantier est colossal et très coûteux. La toiture d'origine va être
                        surélevée d'une vingtaine de centimètres.</li>
                </ul>

                <!-- Section 2 : Prix -->
                <h2 id="prix">Prix de l'isolation de toiture au m² en 2026</h2>
                <p>Les prix d'isolation des rampants varient principalement en fonction du choix de laisser l'artisan
                    faire la finition (Placo) ou de la faire soi-même.</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Prestation (Artisan RGE)</th>
                                <th>Estimation du Prix / m² TTC</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Isolation par l'Intérieur <em>(Isolant + Ossature + Pare-Vapeur - <b>HORS
                                            PLACO</b>)</em></td>
                                <td><strong>50 € à 90 €</strong></td>
                            </tr>
                            <tr>
                                <td>Isolation par l'Intérieur complète <em>(Isolant repoussé + Finition BA13 prêt à
                                        peindre)</em></td>
                                <td><strong>80 € à 130 €</strong></td>
                            </tr>
                            <tr>
                                <td>Isolation par l'Extérieur (Sarking) <em>(Dépose, Isolant rigide, Repose, Hors tuiles
                                        neuves)</em></td>
                                <td><strong>150 € à 250 €</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <blockquote class="article-blockquote">
                    <strong>Bon à savoir :</strong> Si les suspentes, le placo et les joints coûtent 30€/m² à poser, la
                    perte thermique de 30% d'un toit mal isolé coûte en moyenne 600€ par an sur la facture d'une
                    passoire DPE G. La rentabilité énergétique d'une isolation toiture est la plus rapide de toute la
                    maison (souvent remboursée sur les propres économies en moins de 6 ans).
                </blockquote>

                <!-- Section 3 : Matériaux (Focus Été) -->
                <h2 id="materiaux">Quels isolants choisir pour ne pas étouffer l'été ?</h2>
                <p>C'est l'erreur n°1 de l'aménagement des combles. On bourre le toit de laine de verre bon marché, on a
                    très chaud l'hiver (super)... et en août, la chambre mansardée grimpe à 35°C, obligeant à installer
                    une clim énergivore. C'est la notion de <strong>déphasage thermique</strong>.</p>

                <p>Le <em>déphasage</em>, c'est le temps que met la chaleur du soleil (qui tape à 60°C sur vos tuiles) à
                    traverser l'isolant. S'il est de 4 heures (laine de verre classsique), la chaleur rentrera dans la
                    chambre à 16h (en plein cagnard). S'il est de 10 heures, la chaleur rentrera à 22h, heure où vous
                    ouvrez les fenêtres pour aérer la nuit.</p>

                <ul class="custom-list">
                    <li><strong>Les Laines Minérales (Verre, Roche) :</strong> C'est le standard pas cher (léger,
                        ignifuge). Excellent contre le froid (l'hiver). <u>Mauvais l'été (déphasage court de 4 à
                            5h).</u></li>
                    <li><strong>Les Synthétiques (Plaques de Polyuréthane - PUR) :</strong> Les champions de la minceur.
                        Parfait pour R>7 dans des petits espaces. <u>Le pire l'été (surchauffe de la pièce).</u></li>
                    <li><strong>Les Biosourcés (Ouate de Cellulose, Fibre de bois, Chanvre) :</strong> Le "must-have"
                        sous toiture. L'hiver ils calent le froid comme la laine de verre, et l'été ils bloquent la
                        chaleur du soleil avec un <u>déphasage record de 10 à 12h</u>. Bilan : zéro climatisation
                        nécessaire.</li>
                </ul>

                <!-- Section 4 : Épaisseurs et aides -->
                <h2 id="epaisseur-r">La règle absolue : L'épaisseur et la valeur "R"</h2>
                <p>Pour l'État (et les primes), une bonne isolation ne se mesure pas en "centimètres", mais en
                    <strong>Résistance Thermique (R)</strong>, et elle dépend de la conductivité de l'isolant choisi (le
                    λ).</p>
                <p><strong>En 2026, pour toucher la moindre aide nationale (MaPrimeRénov'), il FAUT impérativement un
                        <span class="h1-accent">R ≥ 6 m².K/W</span> pour l'isolation de combles aménagés (les
                        rampants).</strong></p>

                <p>Concrètement, pour obtenir un R de 6, voici, par ordre croissant, la place que l'isolant va manger
                    dans votre pièce sous la charpente :</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Isolant (Pour R = 6 m².K/W)</th>
                                <th>Épaisseur requise (cm)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Polyuréthane (PUR) expansé</td>
                                <td>Environ 13 à 15 cm <em>(Super mince)</em></td>
                            </tr>
                            <tr>
                                <td>Polystyrène expansé (PSE)</td>
                                <td>Environ 20 cm</td>
                            </tr>
                            <tr>
                                <td>Laine de verre / Laine de roche</td>
                                <td>Environ 21 à 23 cm</td>
                            </tr>
                            <tr>
                                <td>Ouate de cellulose (panneaux semi-rigides)</td>
                                <td>Environ 24 cm</td>
                            </tr>
                            <tr>
                                <td>Fibre de bois (haute densité)</td>
                                <td>Environ 24 à 26 cm <em>(Épais mais déphasage inégalable)</em></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Section 5 : Pare-vapeur -->
                <h2 id="pare-vapeur">Le détail mortel : Le Pare-Vapeur et la Lame d'air</h2>
                <p>Plus on isole fort, plus on rend la toiture hermétique. Et l'air hermétique fait condenser l'humidité
                    de la vie humaine (respiration, douches, cuisine) exactement au pire endroit : <strong>contre la
                        charpente en bois</strong> froide derrière l'isolant.</p>

                <p>Mettre 24 cm de belle laine de verre sans un pare-vapeur <strong>continu et étanchéifié au scotch
                        adhésif spécial</strong> côté intérieur (côté chaud), c'est l'assurance pure de faire pourrir
                    les chevrons de la charpente en 5 hivers par moisissure invisible.</p>
                <p>Enfin, si vous n'avez pas d'écran de sous-toiture HPV (Haute Perméabilité à la Vapeur) derrière vos
                    tuiles (le fameux film noir tendu), l'artisan doit obligatoirement laisser une lame d'air (qui
                    circule depuis le <a href="<?php echo BASE_URL; ?>dessous-de-toit"
                        style="text-decoration: underline;">dessous de toit ou cache-moineaux</a>) ventilée de 2 cm
                    <em>minimum</em> entre vos tuiles et votre isolant, sinon le bois pourrira depuis l'extérieur vers
                    l'intérieur.</p>

                <!-- Section 6 : Aides Financières -->
                <h2 id="aides">Aides financières 2026 : MaPrimeRénov' et CEE</h2>
                <p>L'isolation du toit étant la plus efficace d'une maison passoire, c'est l'un des postes les mieux
                    aidés par les deniers publics ! Mais sous une condition absolue : <strong>Le devis de fourniture ET
                        pose doit émaner d'un artisan RGE (Reconnu Garant de l'Environnement).</strong></p>

                <ol>
                    <li><strong>MaPrimeRénov' (Parcours simple) :</strong> Rouvert depuis février 2026 pour les
                        "mono-gestes". Elle s'adresse aux propriétaires de maisons de + de 15 ans. Réservée
                        principalement aux barèmes de revenus Modestes et Très Modestes. Elle est versée en forfait par
                        mètre carré isolé (de 15€ à l'enveloppe totale maximale autorisée).</li>
                    <li><strong>Les Primes CEE (Énergie) :</strong> Ce sont les fournisseurs historiques (EDF, Total,
                        Leclerc) qui payent pour "racheter" leurs quotas d'émission. Totalement cumulable avec la MPR
                        classique ! Elle ajoute un matelas de quelques euros du m².</li>
                    <li><strong>Le Jackpot "Parcours Accompagné" :</strong> Si votre toiture n'est qu'une étape d'une
                        grosse rénovation énergétique (Isolation de la toiture couplée à une <a
                            href="<?php echo BASE_URL; ?>isolation-des-murs"
                            style="text-decoration: underline;">isolation des murs par l'intérieur ou l'extérieur</a>
                        par exemple) qui vous fait sauter 2 lettres entières sur l'audit DPE, MaPrimeRénov est calculée
                        en Taux (60%, 80% voire 90% du montant total des travaux <strong>pris en charge</strong> pour
                        les ultra-précaires !). C'est là que l'isolation biosourcée ou le coûteux Sarking deviennent
                        très abordables.</li>
                    <li><strong>La TVA à 5,5% et l'Éco-PTZ :</strong> L'artisan facturera avec la TVA la plus basse (au
                        lieu des 20% classiques). Et si vous devez tout de même emprunter 15 000€ pour faire un sarking
                        de toiture, l'Éco-Prêt à Taux Zéro vous permet de faire financer l'opération à 0% d'intérêts sur
                        20 ans par votre banquier (les intérêts sont payés par l'état).</li>
                </ol>

                <!-- Section 7 : Foire aux questions -->
                <h2 id="faq">Foire Aux Questions (FAQ)</h2>

                <h3>Peut-on mettre deux couches d'isolants différents ?</h3>
                <p>Oui, techniquement, mais ce n'est pas le plus recommandé à cause de la différence de perspirance des
                    matériaux. Souvent, la première couche (entre chevrons) est nue, et la seconde couche posée
                    par-dessus (couche croisée sur ossature) est recouverte par le frein-vapeur.</p>

                <h3>Est-ce que je peux isoler mes rampants si je n'ai pas d'écran sous-toiture ?</h3>
                <p>Oui, mais l'artisan doit impérativement ménager une <strong>lame d'air ventilée de 2 centimètres
                        minimum</strong> entre la face inférieure du liteau (sous la tuile) et le haut de l'isolant. Si
                    l'isolant touche une tuile chaude ou glacée, la condensation le dégradera en quelques saisons.</p>

                <h3>Quel est le meilleur isolant thermique mince ?</h3>
                <p>Contre la croyance populaire, les "isolants minces multicouches" métalliques (IMR) type couverture de
                    survie ne <strong>remplacent pas</strong> une isolation épaisse. Ils sont juste un complément. Le
                    matériau traditionnellement reconnu comme le plus "mince" pour un pouvoir isolant maximal est le
                    panneau de Polyuréthane (PUR) compressé.</p>

                <h3>Comment évacuer la chaleur accumulée dans les rampants en été ?</h3>
                <p>L'isolation des rampants améliore le confort hivernal mais n'évacue pas la chaleur estivale par elle-même. Un <a href="https://www.cemarenov.fr/extracteur-dair-solaire-combles">extracteur d'air solaire pour combles</a> couplé à l'isolation est la solution la plus efficace : il fonctionne à l'énergie solaire et renouvelle l'air chaud sans frais d'électricité.</p>

                <h3>Et pour une véranda en polycarbonate : l'isolation des rampants s'applique-t-elle ?</h3>
                <p>Non, les rampants concernent les toitures inclinees en tuiles ou ardoises. Pour une extension vitrée, notre guide <a href="https://www.cemarenov.fr/comment-isoler-toit-veranda-polycarbonate">comment isoler un toit de véranda en polycarbonate</a> détaille les techniques spécifiques (panneaux sandwich, double peau, films thermiques).</p>

                <h3>Peut-on isoler les rampants d'une toiture commune avec un voisin ?</h3>
                <p>Si la toiture est commune (mitoyenne ou partagée), les travaux d'isolation nécessitent l'accord et la participation financière de votre voisin. Notre guide sur la <a href="https://www.cemarenov.fr/toiture-commune-sans-copropriete">toiture commune sans copropriété</a> clarifie les règles de prise de décision et de répartition des coûts dans ce cas particulier.</p>

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
                    L'isolation sous rampants (pour vivre sous la toiture) est de loin l'investissement thermique le
                    plus rentable de toutes les rénovations de la maison. Si vous avez la hauteur sous plafond, la pose
                    classique croisée par l'intérieur sur ossature (60 à 100€/m²) offrira un ROI fulgurant sur votre
                    DPE. Mais le véritable conseil pro se trouve ailleurs : en combles aménagés, <strong>protégez-vous
                        des canicules d'été, pas seulement du froid de l'hiver !</strong> Refusez la laine minérale de
                    base, forcez le devis sur les panneaux de Fibre de bois (champions du déphasage) et exigez qu'ils
                    affichent un R de 6. C'est votre laissez-passer pour toucher "MaPrimeRénov".
                </p>
                <a href="<?php echo BASE_URL; ?>contact" class="btn-primary">Demander des devis Isolation Rampants
                    (RGE)</a>
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