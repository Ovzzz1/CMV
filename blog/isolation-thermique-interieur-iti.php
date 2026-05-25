<?php
/**
 * isolation-thermique-interieur-iti.php
 * Article: isolation thermique interieur iti
 */

$article_meta = [
    'title' => 'Isolation thermique intérieur ITI : Prix au m² et erreurs qui ruinent vos murs',
    'category' => 'maison',
    'image' => 'https://www.cemarenov.fr/image/isolation thermique interieur iti.webp',
    'excerpt' => 'Factures de chauffage qui explosent ? Découvrez le vrai prix au m² d\'une isolation thermique intérieur (ITI) et le piège technique fatal qui peut faire moisir vos murs.',
    'date' => '2026-03-17',
    'reading_time' => 7,
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
                <a href="<?php echo BASE_URL . $current_cat; ?>">Isolation</a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
                <span>Isolation intérieur (ITI)</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Isolation</span>
                <span class="article-tag">Économies d'énergie</span>
                <span class="article-tag">Guide 2026</span>
            </div>

            <h1>Isolation thermique intérieur ITI :<br>
                <span class="h1-accent">Prix au m² et l'erreur fatale qui détruit vos murs</span>
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
                Vos factures de chauffage explosent. Près de 25 % de la chaleur d'une maison mal isolée s'échappe par
                les murs. L'<a href="<?php echo BASE_URL; ?>isolation-thermique-exterieur-ite"
                    style="text-decoration: underline;">isolation thermique par l'extérieur (ITE)</a> coûte extrêmement
                cher et demande des autorisations
                d'urbanisme. L'isolation thermique par l'intérieur (ITI) reste l'option la plus rapide. Vous traitez
                pièce par pièce. Vous ne modifiez pas la façade.<br><br>Ce guide détaille les coûts réels pratiqués par
                les artisans en 2026. Nous abordons l'impact sur votre surface habitable. Nous listons les défauts de
                pose à surveiller sur votre chantier.
            </p>

            <div class="article-content">

                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                        </svg>
                        L'essentiel à retenir (30 sec)
                    </div>
                    <ul>
                        <li><strong>Budget moyen :</strong> 50 à 90 € par m² (pose et matériaux inclus).</li>
                        <li><strong>Épaisseur visée :</strong> 12 à 16 cm pour atteindre le R = 3,7 exigé par les aides
                            de l'État.</li>
                        <li><strong>Le piège absolu :</strong> L'oubli du pare-vapeur scotché et continu. Sans lui,
                            l'humidité s'infiltre et vos murs moisissent de l'intérieur.</li>
                    </ul>
                </div>

                <div class="toc-box">
                    <div class="toc-title">Sommaire de ce guide</div>
                    <ul>
                        <li>1. Pourquoi choisir l'ITI plutôt que l'ITE ?</li>
                        <li>2. Calcul de la perte de surface : Quelle épaisseur choisir
                                ?</li>
                        <li>3. Les 3 techniques de pose validées par les artisans RGE
                        </li>
                        <li>4. Les erreurs fatales (qui ruinent vos murs)</li>
                        <li>5. FAQ : Oublis fréquents et cas pratiques</li>
                    </ul>
                </div>

                <h2 id="pourquoi-iti">1. Pourquoi choisir l'ITI plutôt que l'ITE ? (Le verdict financier)</h2>
                <p>L'argument principal de l'isolation par l'intérieur est financier. Un chantier d'ITI coûte en moyenne
                    deux à trois fois moins cher qu'une isolation par l'extérieur. Le montage de l'échafaudage et le
                    ravalement de façade font exploser les devis d'ITE. En intérieur, un plaquiste intervient rapidement
                    et sans contraintes météorologiques.</p>

                <div class="en-clair-box"
                    style="background-color: #e6f7ff; padding: 1.5rem; border-left: 4px solid #0056b3; margin-bottom: 1.5rem; border-radius: 4px;">
                    <strong>📈 Impact direct sur votre DPE</strong><br>
                    Depuis le 1er janvier 2025, la location des logements classés G est interdite. L'ITI est
                    l'intervention la plus rentable pour sortir du statut de passoire thermique. Aborder sérieusement
                    l'<a href="<?php echo BASE_URL; ?>isolation-des-murs" style="text-decoration: underline;">isolation
                        de ses murs maçonnés</a> permet
                    en moyenne de <strong>gagner 1 à 2 classes énergétiques</strong> (passer de F à D par exemple).
                    Votre bien se valorise instantanément de 5 à 10 % à la revente.
                </div>

                <h3>Le prix réel au m² selon les isolants en 2026</h3>
                <p>Les devis varient selon le matériau choisi et l'état de vos murs actuels. Voici les tarifs moyens
                    constatés cette année pour une prestation complète (fourniture, pose de l'isolant, ossature et
                    finition plaque de plâtre).</p>

                <div class="table-responsive">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Type d'isolant</th>
                                <th>Avantage principal</th>
                                <th>Prix moyen estimé (Pose comprise)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Laine de verre / roche</strong></td>
                                <td>Rapport qualité/prix imbattable</td>
                                <td>50 € à 65 € / m²</td>
                            </tr>
                            <tr>
                                <td><strong>Polyuréthane (PUR)</strong></td>
                                <td>Gain de place (très fin)</td>
                                <td>70 € à 90 € / m²</td>
                            </tr>
                            <tr>
                                <td><strong>Laine de bois / chanvre</strong></td>
                                <td>Confort d'été (déphasage)</td>
                                <td>80 € à 100 € / m²</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="astuce-box"
                    style="background-color: #f8f9fa; padding: 1.5rem; border: 1px solid #dee2e6; margin-bottom: 1.5rem; border-radius: 4px;">
                    <h4>💡 Étude de cas : Isoler un salon de 20 m²</h4>
                    <p>Pour isoler les deux murs extérieurs (soit 18 m² de surface murale) d'un salon standard avec
                        ossature métallique et laine de verre (R=3.7) :</p>
                    <ul class="custom-list">
                        <li>Fourniture et pose de l'ITI : ~1 250 €</li>
                        <li>Déplacement de 3 prises électriques : ~200 €</li>
                        <li><strong>Coût total avant aides : 1 450 € TTC</strong></li>
                        <li style="color: #28a745;">Prime CEE déduite : - 160 €</li>
                        <li><strong>Reste à charge estimé : 1 290 €</strong></li>
                    </ul>
                </div>

                <h3>MaPrimeRénov' 2026 : Quelles aides pour l'isolation intérieure ?</h3>
                <p>L'État subventionne l'isolation des murs. Vous devez faire appel à une entreprise certifiée RGE
                    (Reconnu Garant de l'Environnement). Les deux aides principales se cumulent.</p>

                <ul class="custom-list">
                    <li><strong>La prime CEE (Certificats d'Économies d'Énergie) :</strong> Accessible à tous les
                        revenus. Elle tourne autour de 8 à 10 € par m² isolé.</li>
                    <li><strong>MaPrimeRénov' :</strong> Versée par l'ANAH. Elle dépend de votre revenu fiscal de
                        référence. Elle varie de 7 €/m² pour les revenus intermédiaires à 25 €/m² pour les revenus très
                        modestes.</li>
                </ul>

                <blockquote class="article-blockquote">
                    <strong>Règle d'or :</strong> L'isolant posé doit justifier d'une résistance thermique (R)
                    supérieure ou égale à 3,7 m².K/W pour débloquer les fonds publics.
                </blockquote>

                <h2 id="epaisseur-surface">2. Calcul de la perte de surface : Quelle épaisseur choisir ?</h2>
                <p>Isoler par l'intérieur signifie avancer vos murs. La perte de mètres carrés habitables est une
                    réalité mathématique.</p>

                <h3>La règle du R = 3.7 m².K/W</h3>
                <p>Ce chiffre dicte l'épaisseur de votre doublage. Pour atteindre ce niveau de résistance thermique, il
                    faut regarder le lambda (la conductivité) du matériau.</p>
                <p>Avec une laine de verre standard (lambda 32), vous avez besoin de 12 centimètres d'isolant. Ajoutez
                    l'ossature métallique et la plaque de plâtre. Le mur final avance de 14 à 15 centimètres vers
                    l'intérieur. Avec du polyuréthane, 8 centimètres suffisent. Vous gagnez de précieux centimètres dans
                    les petites pièces.</p>

                <h3>Simulateur de perte d'espace habitable</h3>
                <p>Faisons le calcul concret pour une chambre standard de 12 m² (3 mètres sur 4). Vous décidez d'isoler
                    les deux murs donnant sur l'extérieur avec un doublage de 15 centimètres.</p>
                <ul class="custom-list">
                    <li>Mur 1 (3 mètres de long) : perte de 0,45 m².</li>
                    <li>Mur 2 (4 mètres de long) : perte de 0,60 m².</li>
                </ul>
                <p>La pièce perd environ 1 m² de surface au sol. Sur l'ensemble d'une maison de 100 m², une ITI
                    périphérique réduit la surface habitable de 4 à 6 m².</p>

                <h2 id="techniques-pose">3. Les 3 techniques de pose validées par les artisans RGE</h2>
                <p>La configuration de la pièce dicte la méthode employée. Voici les trois solutions du marché.</p>

                <h3>L'ossature métallique (système Optima) : la référence</h3>
                <p>L'artisan fixe des lisses au sol et au plafond. Des montants verticaux maintiennent la laine minérale
                    contre le mur. Le pare-vapeur vient recouvrir l'ensemble. La plaque de plâtre se visse sur
                    l'ossature.</p>
                <p><strong>Avantages :</strong> Vide technique parfait pour l'électricité, rattrape les vieux murs très
                    irréguliers.<br><strong>Inconvénient :</strong> Épaisseur totale importante (14 à 15 cm minimum).
                </p>

                <h3>Le doublage collé : économique mais restrictif</h3>
                <p>Le panneau est un "deux-en-un". L'isolant (souvent du polystyrène) est déjà collé à la plaque de
                    plâtre en usine. L'artisan dépose de gros plots de mortier adhésif (MAP) au dos du panneau et le
                    plaque directement contre le mur.</p>
                <p><strong>Avantages :</strong> Pose rapide, budget allégé, faible encombrement.<br><strong>Inconvénient
                        :</strong> Exige un mur de base parfaitement droit et sain.</p>

                <h3>La contre-cloison maçonnée : pour le bâti ancien</h3>
                <p>L'isolant est plaqué contre le mur extérieur. L'artisan monte ensuite une véritable cloison en
                    briques plâtrières ou en carreaux de plâtre par-dessus.</p>
                <p><strong>Avantages :</strong> Excellente inertie thermique, support très solide pour charges
                    lourdes.<br><strong>Inconvénient :</strong> Système lourd, main-d'œuvre coûteuse.</p>

                <h2 id="pieges-techniques">4. Les erreurs fatales (qui ruinent vos murs)</h2>
                <p>Un mauvais chantier d'isolation dégrade la maison. Trois erreurs reviennent systématiquement dans les
                    malfaçons.</p>

                <blockquote class="article-blockquote" style="border-left-color: #d9534f;">
                    <strong>L'erreur fatale selon Philippe :</strong><br>
                    « Sur les maisons anciennes en pierre, ne laissez <strong>jamais</strong> de lame d'air ventilée
                    entre le vieux mur et l'isolant. L'air froid va circuler et annuler 50 % de la performance de votre
                    nouvelle isolation. L'isolant doit être parfaitement jointif avec le support. »
                </blockquote>

                <h3>L'oubli du pare-vapeur continu (Le risque de condensation)</h3>
                <p>L'air intérieur d'une maison est chaud et humide. En hiver, cette vapeur d'eau traverse la plaque de
                    plâtre et s'enfonce dans l'isolant. Arrivée contre le mur extérieur froid, elle condense. L'eau
                    gèle. La laine de verre s'affaisse et moisit.</p>
                <p>La solution existe. L'artisan doit agrafer une membrane pare-vapeur sur toute la surface de
                    l'isolant. Chaque raccord doit être scellé avec un adhésif technique spécifique. Aucun trou n'est
                    permis.</p>

                <h3>Le traitement des retours de fenêtres (Ponts thermiques)</h3>
                <p>Isoler un mur sans traiter l'encadrement des fenêtres crée un passage direct pour le froid. La
                    condensation va se former exactement autour de vos menuiseries.</p>
                <p>L'espace disponible sur l'ébrasement de la fenêtre dépasse rarement 2 ou 3 centimètres. L'astuce
                    consiste à y coller une fine plaque d'isolant très performant, comme le polyuréthane. Le pont
                    thermique est coupé.</p>

                <h3>Gérer les prises électriques et les radiateurs</h3>
                <p>Le mur avance de 15 centimètres. Vos prises de courant actuelles se retrouvent enfouies derrière
                    l'isolant. L'électricien doit intervenir pour tirer de nouveaux câbles et poser des boîtiers
                    d'encastrement étanches. Côté plomberie, il faut vidanger le circuit de chauffage et modifier la
                    tuyauterie pour décaler les radiateurs. Prévoyez ces coûts annexes dans votre budget.</p>

                <h2 id="faq">5. FAQ : Oublis fréquents et cas pratiques</h2>

                <h3>Peut-on isoler un seul mur dans une pièce ?</h3>
                <p>Oui. Isolez toujours le mur qui donne sur l'extérieur. Méfiez-vous cependant des angles de la pièce.
                    Le froid va contourner votre nouvelle isolation par le mur perpendiculaire. La règle de l'art impose
                    de faire un "retour d'isolant" d'au moins 60 centimètres sur les cloisons adjacentes.</p>

                <h3>Comment fixer un meuble lourd sur un mur isolé (Placo) ?</h3>
                <p>Une simple vis arrache le plâtre. Pour une charge inférieure à 30 kg (petit meuble TV, cadre),
                    utilisez des chevilles à expansion métallique (type Molly). Pour fixer un imposant <a
                        href="<?php echo BASE_URL; ?>ballon-thermodynamique" style="text-decoration: underline;">ballon
                        d'eau chaude thermodynamique</a> ou des meubles de
                    cuisine, il faut anticiper. L'artisan doit fixer des renforts en bois massif directement dans
                    l'ossature métallique avant de visser la plaque de plâtre.</p>

                <h3>Quel isolant choisir pour un mur intérieur humide ?</h3>
                <p><strong>Aucun.</strong> Ne posez jamais d'isolation sur un mur présentant des traces d'humidité ou
                    des remontées capillaires. L'eau va se retrouver emprisonnée. Le mur va se dégrader à une vitesse
                    spectaculaire. Faites intervenir un spécialiste pour appliquer un véritable <a
                        href="<?php echo BASE_URL; ?>traitement-humidite" style="text-decoration: underline;">traitement
                        curatif contre l'humidité</a> et assainir la maçonnerie. Isolez seulement après le
                    séchage complet.</p>

                <h3>Une peinture isolante peut-elle remplacer l'ITI ?</h3>
                <p>Non. Les peintures dites "isolantes" ou thermo-réfléchissantes apportent au mieux 1 à 2 cm d'isolant équivalent, loin des 10 à 15 cm nécessaires pour respecter la RE2020. Notre guide sur la <a href="https://www.cemarenov.fr/peinture-thermique-toiture">peinture thermique réfléchissante</a> clarifie ce point et détaille les cas d'usage réels de ce produit (toitures, pas murs intérieurs).</p>

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
                <h3>Estimez le coût de votre isolation intérieure</h3>
                <p>Comparez les prix d'artisans RGE locaux pour votre projet d'isolation, aides déduites. Ne laissez pas
                    les factures augmenter un hiver de plus.</p>
                <a href="<?php echo BASE_URL; ?>contact" class="btn-primary">Obtenir mes devis gratuits</a>
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
                    <h3 class="sidebar-title">Derniers articles —
                        <?php echo htmlspecialchars($category['name'] ?? 'Isolation'); ?>
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

<?php
// --- Schema.org Structured Data ---
require_once dirname(__DIR__) . '/schema-data.php';
$_schema = get_schema_data(basename(__FILE__, '.php'));
echo generate_article_schema($article_meta, $_schema['faq'] ?? [], $_schema['howto'] ?? []);
echo generate_rating_widget();
?>
<?php include dirname(__DIR__) . '/footer.php'; ?>