<?php
/**
 * dosage-beton-fondation.php
 * Article : Dosage béton fondation : proportions exactes et calculs (2026)
 * Site : Expert Renov' (cemarenov.fr)
 * Date : 2026-03-23
 */

$article_meta = [
    'title'        => 'Dosage béton fondation : proportions exactes et calculs (2026)',
    'category'     => 'travaux',
    'slug'         => 'dosage-beton-fondation',
    'image'        => 'https://www.cemarenov.fr/image/dosage-beton-fondation-1.webp',
    'excerpt'      => 'Guide complet sur le dosage béton fondation : béton de propreté, proportions ciment/sable/gravier selon le DTU 13.1, classes C25/30 et C30/37, calculateur de quantités et choix entre bétonnière et toupie.',
    'date'         => '2026-03-23',
    'reading_time' => 12,
];

// ── Bloc logique CMS — NE JAMAIS MODIFIER ─────────────────────────────────
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

<article>

    <!-- ═══════════════ HERO ═══════════════ -->
    <section class="article-hero" style="background-image: url('<?php echo $article_meta['image']; ?>');">
        <div class="article-hero-content">

            <nav class="breadcrumb">
                <a href="<?php echo BASE_URL; ?>">Accueil</a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                <a href="<?php echo BASE_URL . $current_cat; ?>"><?php echo htmlspecialchars($category['name']); ?></a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                <span>Dosage béton fondation</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Fondations</span>
                <span class="article-tag">Béton</span>
                <span class="article-tag">Gros œuvre</span>
            </div>

            <h1>Dosage béton fondation :<br>
                <span class="h1-accent">proportions exactes et calculs (2026)</span>
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

    <!-- ═══════════════ 3 COLONNES ═══════════════ -->
    <div class="article-layout">

        <!-- ── SIDEBAR GAUCHE ── -->
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

        <!-- ── CONTENU CENTRAL ── -->
        <div class="article-container">

            <p class="article-intro">Une fondation mal dosée, c'est une maison qui risque de bouger. Le béton n'est pas une recette de cuisine : les proportions comptent au litre près. On vous explique comment calculer les bonnes doses pour des fondations solides qui tiendront 50 ans, avec les dosages exacts du DTU 13.1 et un calculateur interactif pour chiffrer vos quantités.</p>

            <div class="article-content">

                <!-- TL;DR -->
                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                        L'essentiel à retenir
                    </div>
                    <ul>
                        <li><strong>Béton de propreté :</strong> 150–200 kg/m³, couche de 4 cm min à poser avant toute semelle armée (DTU 13.1).</li>
                        <li><strong>Semelle non armée :</strong> 250 kg/m³ minimum. Semelle filante avec chaînage : 300 kg/m³. Semelle armée : 350 kg/m³.</li>
                        <li><strong>Coulage dans l'eau :</strong> ajouter 50 kg/m³ de ciment dans chaque cas (nappe phréatique, terrain humide).</li>
                        <li><strong>Classe béton :</strong> C25/30 minimum sur sol stable, C30/37 sur sol argileux ou construction lourde.</li>
                        <li><strong>Eau :</strong> 175–180 L/m³ maximum. Rapport eau/ciment ≤ 0,55 pour l'étanchéité.</li>
                        <li><strong>Bétonnière :</strong> ne jamais dépasser 80% de la capacité. Ne pas mesurer le ciment au seau.</li>
                        <li><strong>Marge de perte :</strong> prévoir 10% de volume supplémentaire systématiquement.</li>
                    </ul>
                </div>

                <!-- SOMMAIRE -->
                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li>Types de fondations et bétons adaptés</li>
                        <li>Le béton de propreté (obligatoire DTU 13.1)</li>
                        <li>Classes C25/30 et C30/37</li>
                        <li>Dosage selon le type de semelle</li>
                        <li>Dosage béton fondation au seau</li>
                        <li>Dosage béton fondation au m³</li>
                        <li>Calculateur de quantités</li>
                        <li>Béton prêt à l'emploi vs bétonnière</li>
                        <li>Ordre de gâchage à la bétonnière</li>
                        <li>Calcul des volumes</li>
                        <li>FAQ</li>
                    </ul>
                </div>

                <!-- ═══ H2 : Types de fondations ═══ -->
                <h2 id="types-fondations">Types de fondations et bétons adaptés</h2>

                <p>Avant de parler dosage, il faut savoir de quelle fondation on parle. Le DTU 13.1 (norme française des fondations superficielles) distingue deux grandes familles, avec des dosages différents pour chacune.</p>

                <h3>Fondations superficielles</h3>
                <p>Ce sont les plus courantes en construction individuelle. Elles reposent directement sur le sol porteur à faible profondeur :</p>
                <ul class="custom-list">
                    <li><strong>Semelle isolée :</strong> sous un poteau ou un pilier. Section carrée ou rectangulaire, généralement non armée ou légèrement armée.</li>
                    <li><strong>Semelle filante (ou continue) :</strong> sous un mur porteur. C'est la fondation la plus fréquente en maison individuelle.</li>
                    <li><strong>Radier de fondation :</strong> dalle béton couvrant toute l'emprise du bâtiment. Utilisé sur sol compressible ou en présence de nappe.</li>
                </ul>

                <h3>Fondations profondes</h3>
                <p>Réservées aux terrains instables ou aux charges importantes :</p>
                <ul class="custom-list">
                    <li><strong>Pieux :</strong> colonnes béton forées ou battues jusqu'au sol porteur.</li>
                    <li><strong>Micro-pieux :</strong> pieux de petit diamètre, sous bâtiments existants ou terrain difficile d'accès.</li>
                    <li><strong>Puits :</strong> excavations de grand diamètre remplies de béton.</li>
                </ul>

                <div style="background-color: var(--color-light); border-left: 4px solid var(--color-primary); padding: 1.5rem; margin-bottom: 2rem; border-radius: 0 8px 8px 0;">
                    <strong>Ce guide traite des fondations superficielles</strong>, qui représentent plus de 90% des chantiers de maison individuelle. Pour les fondations profondes, la conception relève systématiquement d'un bureau d'études.
                </div>

                <!-- ═══ H2 : Béton de propreté ═══ -->
                <h2 id="beton-proprete">Le béton de propreté — obligatoire avant toute semelle armée</h2>

                <p>C'est l'étape que tout le monde oublie dans les guides grand public, et que tout maçon connaît. Le <strong>béton de propreté</strong> est une couche mince coulée au fond de la fouille, avant de poser les armatures et de couler le béton de fondation.</p>

                <h3>À quoi ça sert ?</h3>
                <p>Quand vous posez des aciers directement sur la terre, ils se salissent et rouillent avant même que le béton soit coulé. Le béton de propreté crée une surface propre et plane qui :</p>
                <ul class="custom-list">
                    <li>évite tout contact entre l'acier et la terre (protection contre la corrosion);</li>
                    <li>garantit l'enrobage minimal des armatures côté fouille;</li>
                    <li>facilite la mise en place et le calage des aciers.</li>
                </ul>

                <h3>Dosage et épaisseur (DTU 13.1)</h3>
                <p>Le DTU 13.1 impose les spécifications suivantes pour le béton de propreté :</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr><th>Paramètre</th><th>Valeur DTU 13.1</th></tr>
                        </thead>
                        <tbody>
                            <tr><td><strong>Épaisseur minimale</strong></td><td>4 cm</td></tr>
                            <tr><td><strong>Dosage ciment minimal</strong></td><td>150 kg/m³</td></tr>
                            <tr><td><strong>Dosage courant</strong></td><td>150 à 200 kg/m³</td></tr>
                            <tr><td><strong>Classe de résistance</strong></td><td>Non applicable (hors NF EN 206)</td></tr>
                        </tbody>
                    </table>
                </div>

                <div style="background-color: #fbe3cb; border-left: 4px solid #e74c3c; padding: 1.5rem; margin-bottom: 2rem; border-radius: 0 8px 8px 0; color: #3e2e1f;">
                    <strong>Important :</strong> Le béton de propreté n'est pas un béton structurel. Il n'a pas de classe de résistance requise selon la norme NF EN 206. Son rôle est uniquement de protéger les armatures et d'offrir une surface de travail propre. Ne le confondez pas avec le béton de fondation.
                </div>

                <p>Pour un chantier de maison individuelle standard, comptez environ <strong>0,04 m³ de béton de propreté par mètre linéaire</strong> de semelle (pour une semelle de 60 cm de large).</p>

                <!-- ═══ H2 : Classes béton ═══ -->
                <h2 id="quel-beton">Classes de béton : C25/30 et C30/37</h2>

                <p>Pour des fondations, on ne prend pas le premier béton venu. La norme impose des <strong>classes de résistance</strong> minimales selon le type de construction et la nature du sol.</p>

                <h3>Comment lire une classe de béton</h3>
                <p>La résistance s'exprime en <strong>MPa</strong> (mégapascal). Le chiffre avant le slash = résistance caractéristique sur cylindre à 28 jours. Le chiffre après = résistance sur cube d'essai.</p>

                <ul class="custom-list">
                    <li><strong>C25/30 :</strong> résistance de 25 MPa. Minimum requis pour une maison individuelle sur sol stable. C'est le standard en construction neuve.</li>
                    <li><strong>C30/37 :</strong> résistance de 30 MPa. À privilégier sur sols argileux, terrains en pente, nappes phréatiques ou constructions lourdes (pierre, brique).</li>
                </ul>

                <h3>Étanchéité et rapport eau/ciment</h3>
                <p>Les fondations étant en contact permanent avec l'humidité du sol, le <strong>rapport eau/ciment</strong> est crucial : il doit rester inférieur à <strong>0,55</strong>. Au-delà, le béton devient poreux et capte l'eau, ce qui accélère la corrosion des armatures et la dégradation du béton.</p>

                <h3>Sol chimiquement agressif</h3>
                <p>En sol acide ou riche en sulfates (terrains argileux, marécageux, certaines zones industrielles), le ciment CPJ standard est contre-indiqué. Utilisez un <strong>ciment résistant aux sulfates (CEM III ou CEM V)</strong>, prévu pour les environnements agressifs. Demandez une analyse de sol à votre maître d'œuvre si vous avez le moindre doute.</p>

                <!-- ═══ H2 : Dosage par type de semelle ═══ -->
                <h2 id="dosage-par-semelle">Dosage béton selon le type de semelle (DTU 13.1)</h2>

                <p>C'est l'erreur la plus fréquente dans les articles sur le sujet : préconiser uniformément 350 kg/m³ pour toutes les fondations. Le DTU 13.1 est plus précis. Les dosages minimaux varient selon l'armature de la semelle et les conditions de coulage.</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr><th>Type de semelle</th><th>Sol sec (kg/m³)</th><th>Coulage dans l'eau (kg/m³)</th><th>Exemple d'usage</th></tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Béton de propreté</strong></td>
                                <td>150–200</td>
                                <td>—</td>
                                <td>Couche de fond avant semelle armée</td>
                            </tr>
                            <tr>
                                <td><strong>Semelle non armée</strong></td>
                                <td>250 min</td>
                                <td>300 min</td>
                                <td>Sous murs pleins, poteaux légers</td>
                            </tr>
                            <tr>
                                <td><strong>Semelle filante avec chaînage seul</strong></td>
                                <td>300 min</td>
                                <td>350 min</td>
                                <td>Sous murs porteurs, maison individuelle courante</td>
                            </tr>
                            <tr>
                                <td><strong>Semelle armée (BA)</strong></td>
                                <td>350 min</td>
                                <td>400 min</td>
                                <td>Radier, semelle portant charges importantes</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div style="background-color: var(--color-light); border-left: 4px solid var(--color-primary); padding: 1.5rem; margin-bottom: 2rem; border-radius: 0 8px 8px 0;">
                    <strong>Règle pratique :</strong> En construction de maison individuelle, la quasi-totalité des semelles filantes comporte au minimum une armature de chaînage. Partez donc sur <strong>350 kg/m³</strong> comme valeur par défaut, vous êtes dans les clous dans tous les cas, et vous avez de la marge en cas de sol humide.
                </div>

                <h3>Cas particulier : nappe phréatique et terrain humide</h3>
                <p>Si votre fouille se remplit d'eau (nappe phréatique, sol argileux gorgé d'eau), le béton est dilué au coulage. Le DTU 13.1 impose alors d'ajouter <strong>50 kg/m³ supplémentaires</strong> de ciment dans chaque catégorie. Un béton de 350 kg/m³ en sol sec passe donc à 400 kg/m³ en présence d'eau. Épuisez la fouille au maximum avant coulage.</p>

                <!-- ═══ H2 : Dosage au seau ═══ -->
                <h2 id="dosage-seau">Dosage béton fondation au seau</h2>

                <p>Sur les petits chantiers, on dose souvent au seau de maçon (10 litres). La règle d'or des fondations armées : la proportion <strong>1-2-3</strong>.</p>

                <h3>La proportion 1-2-3 (ciment-sable-gravier)</h3>
                <ul class="custom-list">
                    <li><strong>1 part de ciment</strong> (CPJ 32,5 ou 42,5)</li>
                    <li><strong>2 parts de sable</strong> (granulométrie 0/4 mm)</li>
                    <li><strong>3 parts de gravier</strong> (granulométrie 4/20 mm)</li>
                </ul>

                <div style="background-color: #fbe3cb; border-left: 4px solid #e74c3c; padding: 1.5rem; margin-bottom: 2rem; border-radius: 0 8px 8px 0; color: #3e2e1f;">
                    <strong>Ne mesurez jamais le ciment au seau.</strong> Le ciment prend de l'expansion quand on le manipule : transvasé dans un seau, il se tasse puis gonfle et fausse le dosage. Référencez-vous toujours au sac entier (1 sac, ½ sac, ⅓ sac). Vous serez certain de votre quantité.
                </div>

                <h3>Dosage par sac de 35 kg (semelle armée — 350 kg/m³)</h3>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr><th>Matériau</th><th>Quantité</th><th>Équivalent seaux (10 L)</th></tr>
                        </thead>
                        <tbody>
                            <tr><td><strong>Ciment</strong></td><td>1 sac de 35 kg</td><td>— (toujours au sac)</td></tr>
                            <tr><td><strong>Sable 0/4</strong></td><td>70 kg</td><td>5 seaux</td></tr>
                            <tr><td><strong>Gravier 4/20</strong></td><td>80 kg</td><td>8 seaux</td></tr>
                            <tr><td><strong>Eau</strong></td><td>17–17,5 litres</td><td>1,5 à 2 seaux</td></tr>
                            <tr><td colspan="2"><em>Volume béton obtenu</em></td><td>≈ 100 litres</td></tr>
                        </tbody>
                    </table>
                </div>

                <h3>Tableau récapitulatif multi-dosages au seau</h3>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr><th>Dosage</th><th>Usage</th><th>Sable (seaux 10L)</th><th>Gravier (seaux 10L)</th><th>Eau (L)</th><th>Volume obtenu</th></tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>200 kg/m³</strong></td>
                                <td>Béton de propreté</td>
                                <td>13 seaux</td>
                                <td>17 seaux</td>
                                <td>20 L</td>
                                <td>~230 L</td>
                            </tr>
                            <tr>
                                <td><strong>300 kg/m³</strong></td>
                                <td>Semelle non armée</td>
                                <td>6 seaux</td>
                                <td>9 seaux</td>
                                <td>17 L</td>
                                <td>~120 L</td>
                            </tr>
                            <tr>
                                <td><strong>350 kg/m³</strong></td>
                                <td>Semelle armée (courant)</td>
                                <td>5 seaux</td>
                                <td>8 seaux</td>
                                <td>17,5 L</td>
                                <td>~100 L</td>
                            </tr>
                            <tr>
                                <td><strong>400 kg/m³</strong></td>
                                <td>BA renforcé / eau</td>
                                <td>4 seaux</td>
                                <td>7 seaux</td>
                                <td>17 L</td>
                                <td>~87 L</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- ═══ H2 : Dosage au m³ ═══ -->
                <h2 id="dosage-m3">Dosage béton fondation au m³</h2>

                <p>Pour les chantiers importants, on raisonne en mètres cubes. Voici la composition exacte pour 1 m³ selon le dosage cible.</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr><th>Composant</th><th>300 kg/m³</th><th>350 kg/m³</th><th>400 kg/m³</th></tr>
                        </thead>
                        <tbody>
                            <tr><td><strong>Ciment CPJ 32,5</strong></td><td>300 kg (9 sacs)</td><td>350 kg (10 sacs)</td><td>400 kg (12 sacs)</td></tr>
                            <tr><td><strong>Sable 0/4</strong></td><td>800 kg</td><td>700 kg</td><td>620 kg</td></tr>
                            <tr><td><strong>Gravier 4/20</strong></td><td>1 100 kg</td><td>1 050 kg</td><td>1 000 kg</td></tr>
                            <tr><td><strong>Eau</strong></td><td>175 L</td><td>175–180 L</td><td>175 L</td></tr>
                        </tbody>
                    </table>
                </div>

                <h3>Les granulats : sable 0/4 et gravier 4/20</h3>
                <ul class="custom-list">
                    <li><strong>Sable 0/4 :</strong> granulométrie de 0 à 4 mm. Il remplit les vides entre les graviers et donne la plasticité au mélange.</li>
                    <li><strong>Gravillon 4/20 :</strong> granulométrie de 4 à 20 mm. Il constitue le squelette du béton et apporte la résistance mécanique. Préférez les granulats concassés aux roulés : leurs arêtes vives accrochent mieux le ciment.</li>
                </ul>

                <h3>Eau : 180 L/m³ maximum</h3>
                <p>Trop d'eau = béton poreux et résistance divisée par deux. Pour 350 kg/m³ de ciment, ne dépassez pas <strong>180 litres par m³</strong> (rapport eau/ciment de 0,51). Si le béton semble trop raide, ajoutez un plastifiant plutôt que de l'eau.</p>

                <h3>Les adjuvants optionnels</h3>
                <ul class="custom-list">
                    <li><strong>Plastifiant :</strong> améliore la maniabilité sans eau. Dosage : 5 à 15 ml/kg de ciment.</li>
                    <li><strong>Accélérateur de prise :</strong> bétonner par temps frais, jusqu'à +5°C.</li>
                    <li><strong>Retardateur :</strong> transport long ou forte chaleur (>25°C). Rallonge la prise de 1 à 3h.</li>
                    <li><strong>Air-entraînant :</strong> résistance au gel, indispensable en montagne ou régions à hivers sévères.</li>
                </ul>

                <blockquote class="article-blockquote">
                    <p>"Chantier de 2019, un particulier voulait économiser sur le ciment. Il a mis 7 sacs au lieu de 10 pour son m³. Résultat : 6 mois plus tard, ses fondations ont fissuré sur toute la longueur. On a dû tout reprendre. Le ciment, c'est pas là qu'on économise."</p>
                </blockquote>

                <!-- ═══ CALCULATEUR ═══ -->
                <h2 id="calculateur">Calculateur de dosage béton fondation</h2>

                <p>Entrez les dimensions de votre ouvrage ou directement un volume, choisissez votre type de fondation : le calculateur vous donne les quantités exactes de matériaux et une estimation du coût.</p>

                <!-- CALCULATEUR WIDGET -->
                <div id="beton-calc" style="background: var(--color-card-bg, #fff); border: 1px solid var(--color-border, #e5e7eb); border-radius: 12px; overflow: hidden; margin: 2rem 0; font-family: inherit;">

                    <div style="background: #1a3a2a; padding: 1.25rem 1.5rem;">
                        <div style="display:flex; align-items:center; gap:10px;">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#6ee7b7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="18" rx="2"/><line x1="8" y1="12" x2="16" y2="12"/><line x1="8" y1="8" x2="16" y2="8"/><line x1="8" y1="16" x2="12" y2="16"/></svg>
                            <span style="color:#fff; font-weight:600; font-size:1rem;">Calculateur de dosage béton fondation</span>
                        </div>
                        <p style="color:#9ca3af; font-size:0.82rem; margin:6px 0 0;">Quantités et prix selon le DTU 13.1</p>
                    </div>

                    <div style="padding: 1.5rem;">

                        <!-- TYPE DE FONDATION -->
                        <div style="margin-bottom:1.25rem;">
                            <label style="display:block; font-weight:600; font-size:0.9rem; margin-bottom:0.5rem; color:var(--color-text,#1f2937);">Type de fondation</label>
                            <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(180px,1fr)); gap:8px;">
                                <label class="calc-type-card" data-dos="200" style="cursor:pointer; border:2px solid #e5e7eb; border-radius:8px; padding:10px 12px; display:flex; align-items:flex-start; gap:8px;">
                                    <input type="radio" name="calc-type" value="200" style="margin-top:3px; accent-color:#16a34a;">
                                    <div>
                                        <div style="font-weight:600; font-size:0.85rem; color:var(--color-text,#1f2937);">Béton de propreté</div>
                                        <div style="font-size:0.78rem; color:#6b7280;">150–200 kg/m³ · Couche de fond</div>
                                    </div>
                                </label>
                                <label class="calc-type-card" data-dos="300" style="cursor:pointer; border:2px solid #e5e7eb; border-radius:8px; padding:10px 12px; display:flex; align-items:flex-start; gap:8px;">
                                    <input type="radio" name="calc-type" value="300" style="margin-top:3px; accent-color:#16a34a;">
                                    <div>
                                        <div style="font-weight:600; font-size:0.85rem; color:var(--color-text,#1f2937);">Semelle non armée</div>
                                        <div style="font-size:0.78rem; color:#6b7280;">300 kg/m³ · Sous murs pleins</div>
                                    </div>
                                </label>
                                <label class="calc-type-card selected" data-dos="350" style="cursor:pointer; border:2px solid #16a34a; background:#f0fdf4; border-radius:8px; padding:10px 12px; display:flex; align-items:flex-start; gap:8px;">
                                    <input type="radio" name="calc-type" value="350" checked style="margin-top:3px; accent-color:#16a34a;">
                                    <div>
                                        <div style="font-weight:600; font-size:0.85rem; color:var(--color-text,#1f2937);">Semelle armée <span style="background:#bbf7d0;color:#14532d;font-size:0.7rem;padding:1px 5px;border-radius:3px;margin-left:4px;">Courant</span></div>
                                        <div style="font-size:0.78rem; color:#6b7280;">350 kg/m³ · Maison individuelle</div>
                                    </div>
                                </label>
                                <label class="calc-type-card" data-dos="400" style="cursor:pointer; border:2px solid #e5e7eb; border-radius:8px; padding:10px 12px; display:flex; align-items:flex-start; gap:8px;">
                                    <input type="radio" name="calc-type" value="400" style="margin-top:3px; accent-color:#16a34a;">
                                    <div>
                                        <div style="font-weight:600; font-size:0.85rem; color:var(--color-text,#1f2937);">BA renforcé / eau</div>
                                        <div style="font-size:0.78rem; color:#6b7280;">400 kg/m³ · Nappe phréatique</div>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <!-- SAISIE VOLUME -->
                        <div style="margin-bottom:1.25rem;">
                            <label style="display:block; font-weight:600; font-size:0.9rem; margin-bottom:0.5rem; color:var(--color-text,#1f2937);">Mode de calcul</label>
                            <div style="display:flex; gap:8px; margin-bottom:0.75rem;">
                                <button onclick="setMode('dims')" id="btn-dims" style="flex:1; padding:8px; border-radius:6px; border:2px solid #16a34a; background:#f0fdf4; font-size:0.85rem; font-weight:600; cursor:pointer; color:#15803d;">Par dimensions</button>
                                <button onclick="setMode('vol')" id="btn-vol" style="flex:1; padding:8px; border-radius:6px; border:2px solid #e5e7eb; background:#fff; font-size:0.85rem; font-weight:600; cursor:pointer; color:#6b7280;">Par volume connu</button>
                            </div>

                            <div id="mode-dims">
                                <div style="display:grid; grid-template-columns:1fr 1fr 1fr; gap:10px;">
                                    <div>
                                        <label style="font-size:0.8rem; color:#6b7280; display:block; margin-bottom:3px;">Longueur (m)</label>
                                        <input id="inp-L" type="number" min="0" step="0.1" value="10" oninput="calc()" style="width:100%; padding:8px 10px; border:1px solid #d1d5db; border-radius:6px; font-size:0.9rem; box-sizing:border-box;">
                                    </div>
                                    <div>
                                        <label style="font-size:0.8rem; color:#6b7280; display:block; margin-bottom:3px;">Largeur (m)</label>
                                        <input id="inp-l" type="number" min="0" step="0.05" value="0.50" oninput="calc()" style="width:100%; padding:8px 10px; border:1px solid #d1d5db; border-radius:6px; font-size:0.9rem; box-sizing:border-box;">
                                    </div>
                                    <div>
                                        <label style="font-size:0.8rem; color:#6b7280; display:block; margin-bottom:3px;">Hauteur (m)</label>
                                        <input id="inp-h" type="number" min="0" step="0.05" value="0.40" oninput="calc()" style="width:100%; padding:8px 10px; border:1px solid #d1d5db; border-radius:6px; font-size:0.9rem; box-sizing:border-box;">
                                    </div>
                                </div>
                            </div>

                            <div id="mode-vol" style="display:none;">
                                <label style="font-size:0.8rem; color:#6b7280; display:block; margin-bottom:3px;">Volume total en m³</label>
                                <input id="inp-vol" type="number" min="0" step="0.1" value="2" oninput="calc()" style="width:100%; padding:8px 10px; border:1px solid #d1d5db; border-radius:6px; font-size:0.9rem; box-sizing:border-box;">
                            </div>
                        </div>

                        <!-- OPTIONS -->
                        <div style="display:flex; gap:1.5rem; margin-bottom:1.25rem; flex-wrap:wrap;">
                            <label style="display:flex; align-items:center; gap:6px; font-size:0.85rem; cursor:pointer; color:var(--color-text,#1f2937);">
                                <input type="checkbox" id="chk-marge" checked onchange="calc()" style="accent-color:#16a34a; width:15px; height:15px;">
                                Ajouter marge 10%
                            </label>
                            <label style="display:flex; align-items:center; gap:6px; font-size:0.85rem; cursor:pointer; color:var(--color-text,#1f2937);">
                                <input type="checkbox" id="chk-eau" onchange="calc()" style="accent-color:#16a34a; width:15px; height:15px;">
                                Coulage dans l'eau (+50 kg/m³)
                            </label>
                        </div>

                        <!-- RÉSULTATS -->
                        <div id="calc-results" style="background:#f8fafc; border:1px solid #e2e8f0; border-radius:10px; padding:1.25rem; display:none;">

                            <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:1rem; flex-wrap:wrap; gap:8px;">
                                <div>
                                    <div style="font-size:0.8rem; color:#6b7280; margin-bottom:2px;">Volume béton à couler</div>
                                    <div id="res-vol" style="font-size:1.5rem; font-weight:700; color:#1a3a2a;"></div>
                                </div>
                                <div style="text-align:right;">
                                    <div style="font-size:0.8rem; color:#6b7280; margin-bottom:2px;">Dosage appliqué</div>
                                    <div id="res-dos" style="font-size:1.1rem; font-weight:700; color:#16a34a;"></div>
                                </div>
                            </div>

                            <!-- Matériaux -->
                            <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(130px,1fr)); gap:8px; margin-bottom:1rem;">
                                <div style="background:#fff; border:1px solid #e2e8f0; border-radius:8px; padding:12px; text-align:center;">
                                    <div style="font-size:1.4rem; margin-bottom:4px;">🪣</div>
                                    <div id="res-ciment" style="font-weight:700; font-size:1.1rem; color:#1f2937;"></div>
                                    <div style="font-size:0.78rem; color:#6b7280;">Ciment (sacs 35 kg)</div>
                                </div>
                                <div style="background:#fff; border:1px solid #e2e8f0; border-radius:8px; padding:12px; text-align:center;">
                                    <div style="font-size:1.4rem; margin-bottom:4px;">🏖️</div>
                                    <div id="res-sable" style="font-weight:700; font-size:1.1rem; color:#1f2937;"></div>
                                    <div style="font-size:0.78rem; color:#6b7280;">Sable 0/4 (kg)</div>
                                </div>
                                <div style="background:#fff; border:1px solid #e2e8f0; border-radius:8px; padding:12px; text-align:center;">
                                    <div style="font-size:1.4rem; margin-bottom:4px;">⛏️</div>
                                    <div id="res-gravier" style="font-weight:700; font-size:1.1rem; color:#1f2937;"></div>
                                    <div style="font-size:0.78rem; color:#6b7280;">Gravier 4/20 (kg)</div>
                                </div>
                                <div style="background:#fff; border:1px solid #e2e8f0; border-radius:8px; padding:12px; text-align:center;">
                                    <div style="font-size:1.4rem; margin-bottom:4px;">💧</div>
                                    <div id="res-eau" style="font-weight:700; font-size:1.1rem; color:#1f2937;"></div>
                                    <div style="font-size:0.78rem; color:#6b7280;">Eau (litres)</div>
                                </div>
                            </div>

                            <!-- Prix -->
                            <div style="border-top:1px solid #e2e8f0; padding-top:1rem; display:grid; grid-template-columns:1fr 1fr; gap:8px;">
                                <div style="background:#fffbeb; border:1px solid #fde68a; border-radius:8px; padding:12px;">
                                    <div style="font-size:0.78rem; color:#92400e; margin-bottom:4px;">🏗️ Bétonnière (location)</div>
                                    <div id="res-prix-bet" style="font-weight:700; font-size:1.2rem; color:#92400e;"></div>
                                    <div style="font-size:0.72rem; color:#b45309;">Matériaux + location</div>
                                </div>
                                <div style="background:#f0fdf4; border:1px solid #bbf7d0; border-radius:8px; padding:12px;">
                                    <div style="font-size:0.78rem; color:#166534; margin-bottom:4px;">🚛 Camion toupie</div>
                                    <div id="res-prix-tou" style="font-weight:700; font-size:1.2rem; color:#166534;"></div>
                                    <div style="font-size:0.72rem; color:#16a34a;">BPE livré chantier</div>
                                </div>
                            </div>

                            <p style="font-size:0.75rem; color:#9ca3af; margin-top:0.75rem; margin-bottom:0;">Estimations indicatives. Prix matériaux 2026, hors main d'œuvre et transport.</p>
                        </div>

                        <button onclick="calc()" style="width:100%; margin-top:1rem; padding:12px; background:#16a34a; color:#fff; border:none; border-radius:8px; font-size:1rem; font-weight:600; cursor:pointer; transition:background .2s;" onmouseover="this.style.background='#15803d'" onmouseout="this.style.background='#16a34a'">Calculer les quantités →</button>
                    </div>
                </div>

                <style>
                .calc-type-card.selected { border-color: #16a34a !important; background: #f0fdf4 !important; }
                </style>
                <script>
                // ── Données de dosage par type ─────────────────────────────────
                const DOSAGES = {
                    200: { ciment:200, sable:1100, gravier:1400, eau:190 },
                    300: { ciment:300, sable:800,  gravier:1100, eau:175 },
                    350: { ciment:350, sable:700,  gravier:1050, eau:178 },
                    400: { ciment:400, sable:620,  gravier:1000, eau:175 },
                };
                // Prix au m³ (bétonnière = matériaux + location jour, toupie = BPE livré)
                const PRIX_BET = { 200:60, 300:85, 350:105, 400:120 };
                const PRIX_TOU = { 200:90, 300:135, 350:155, 400:175 };

                let currentMode = 'dims';

                function setMode(m) {
                    currentMode = m;
                    document.getElementById('mode-dims').style.display = m === 'dims' ? '' : 'none';
                    document.getElementById('mode-vol').style.display  = m === 'vol'  ? '' : 'none';
                    const btnD = document.getElementById('btn-dims');
                    const btnV = document.getElementById('btn-vol');
                    btnD.style.border = m === 'dims' ? '2px solid #16a34a' : '2px solid #e5e7eb';
                    btnD.style.background = m === 'dims' ? '#f0fdf4' : '#fff';
                    btnD.style.color = m === 'dims' ? '#15803d' : '#6b7280';
                    btnV.style.border = m === 'vol' ? '2px solid #16a34a' : '2px solid #e5e7eb';
                    btnV.style.background = m === 'vol' ? '#f0fdf4' : '#fff';
                    btnV.style.color = m === 'vol' ? '#15803d' : '#6b7280';
                    calc();
                }

                // Sélection visuelle des cards
                document.querySelectorAll('.calc-type-card').forEach(card => {
                    card.addEventListener('click', () => {
                        document.querySelectorAll('.calc-type-card').forEach(c => {
                            c.style.border = '2px solid #e5e7eb';
                            c.style.background = '';
                            c.classList.remove('selected');
                        });
                        card.style.border = '2px solid #16a34a';
                        card.style.background = '#f0fdf4';
                        card.classList.add('selected');
                        setTimeout(calc, 50);
                    });
                });

                function calc() {
                    const dos = parseInt(document.querySelector('input[name="calc-type"]:checked')?.value || 350);
                    const avecEau = document.getElementById('chk-eau')?.checked;
                    const avecMarge = document.getElementById('chk-marge')?.checked;

                    const dosEffectif = avecEau && dos < 400 ? Math.min(dos + 50, 400) : dos;
                    const d = DOSAGES[dosEffectif] || DOSAGES[350];

                    let volBrut = 0;
                    if (currentMode === 'dims') {
                        const L = parseFloat(document.getElementById('inp-L')?.value) || 0;
                        const l = parseFloat(document.getElementById('inp-l')?.value) || 0;
                        const h = parseFloat(document.getElementById('inp-h')?.value) || 0;
                        volBrut = L * l * h;
                    } else {
                        volBrut = parseFloat(document.getElementById('inp-vol')?.value) || 0;
                    }

                    if (volBrut <= 0) {
                        document.getElementById('calc-results').style.display = 'none';
                        return;
                    }

                    const vol = avecMarge ? volBrut * 1.10 : volBrut;

                    const cimentKg   = Math.ceil(vol * d.ciment);
                    const cimentSacs = Math.ceil(cimentKg / 35);
                    const sableKg    = Math.round(vol * d.sable);
                    const gravierKg  = Math.round(vol * d.gravier);
                    const eauL       = Math.round(vol * d.eau);
                    const prixBet    = Math.round(vol * (PRIX_BET[dos] || PRIX_BET[350]));
                    const prixTou    = Math.round(vol * (PRIX_TOU[dos] || PRIX_TOU[350]));

                    document.getElementById('res-vol').textContent    = vol.toFixed(2) + ' m³' + (avecMarge ? ' (+10% marge)' : '');
                    document.getElementById('res-dos').textContent    = dosEffectif + ' kg/m³' + (avecEau ? ' (dont +50 eau)' : '');
                    document.getElementById('res-ciment').textContent  = cimentSacs + ' sac' + (cimentSacs > 1 ? 's' : '') + '\n(' + cimentKg + ' kg)';
                    document.getElementById('res-sable').textContent   = sableKg.toLocaleString('fr-FR') + ' kg';
                    document.getElementById('res-gravier').textContent = gravierKg.toLocaleString('fr-FR') + ' kg';
                    document.getElementById('res-eau').textContent     = eauL + ' L';
                    document.getElementById('res-prix-bet').textContent = prixBet.toLocaleString('fr-FR') + ' €';
                    document.getElementById('res-prix-tou').textContent = prixTou.toLocaleString('fr-FR') + ' €';

                    document.getElementById('calc-results').style.display = 'block';
                }

                // Calcul initial au chargement
                document.addEventListener('DOMContentLoaded', calc);
                setTimeout(calc, 200);
                </script>

                <!-- ═══ H2 : BPE vs Bétonnière ═══ -->
                <h2 id="beton-pret">Béton prêt à l'emploi vs bétonnière</h2>

                <p>Le choix dépend du volume à couler, du délai et du budget. Voici la comparaison réelle.</p>

                <h3>Avantages du camion toupie</h3>
                <ul class="custom-list">
                    <li><strong>Qualité constante :</strong> dosage industriel précis, certifié NF BPE (béton à Propriétés Spécifiées selon la NF EN 206).</li>
                    <li><strong>Rapidité :</strong> 6 m³ livrés et coulés en 1 heure.</li>
                    <li><strong>Pas de manutention :</strong> pas de sacs à porter, pas de bétonnière à tourner.</li>
                    <li><strong>Volume illimité :</strong> livraison de 2 à 12 m³ par rotation.</li>
                </ul>

                <h3>Avantages de la bétonnière</h3>
                <ul class="custom-list">
                    <li><strong>Coût :</strong> 30 à 50% moins cher sur les petits volumes.</li>
                    <li><strong>Flexibilité :</strong> on avance à son rythme, pas de pression du camion.</li>
                    <li><strong>Accessibilité :</strong> possible en terrain difficile où la toupie ne passe pas.</li>
                </ul>

                <h3>Prix comparatif au m³</h3>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr><th>Solution</th><th>Prix matériaux</th><th>Coût total estimé</th><th>Seuil rentable</th></tr>
                        </thead>
                        <tbody>
                            <tr><td><strong>Bétonnière (location)</strong></td><td>70–90 €/m³</td><td>90–120 €/m³</td><td>Jusqu'à 3 m³</td></tr>
                            <tr><td><strong>Toupie livrée (BPE)</strong></td><td>100–140 €/m³</td><td>130–180 €/m³</td><td>Dès 3 m³</td></tr>
                            <tr><td><strong>Bétonnière (achat)</strong></td><td>70–90 €/m³</td><td>80–100 €/m³</td><td>À partir de 5 m³ cumulés</td></tr>
                        </tbody>
                    </table>
                </div>

                <h3>Quel choix selon le volume</h3>
                <ul class="custom-list">
                    <li><strong>Moins de 1 m³ :</strong> bétonnière manuelle ou location courte durée.</li>
                    <li><strong>1 à 3 m³ :</strong> bétonnière électrique louée pour la journée.</li>
                    <li><strong>3 à 6 m³ :</strong> toupie si accès facile, bétonnière si terrain compliqué.</li>
                    <li><strong>Plus de 6 m³ :</strong> toupie obligatoire pour la cohérence du béton sur gros chantier.</li>
                </ul>

                <!-- ═══ H2 : Gâchage bétonnière ═══ -->
                <h2 id="gachage">Ordre de gâchage à la bétonnière</h2>

                <p>L'ordre d'introduction des matériaux n'est pas anodin. Un mauvais ordre = des grumeaux de ciment ou un mélange inhomogène.</p>

                <h3>Règle des 80%</h3>
                <p>Ne remplissez jamais une bétonnière à plus de <strong>80% de sa capacité nominale</strong>. Une bétonnière de 150 litres ne produit que 120 litres de béton utilisable. Au-delà, le mélange ne tourne pas correctement et le béton reste inhomogène.</p>

                <h3>L'ordre correct en 5 étapes</h3>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr><th>Étape</th><th>Matériau</th><th>Durée de malaxage</th><th>Pourquoi</th></tr>
                        </thead>
                        <tbody>
                            <tr><td><strong>1</strong></td><td>La moitié de l'eau</td><td>—</td><td>Mouille les palettes, évite que le ciment colle</td></tr>
                            <tr><td><strong>2</strong></td><td>Gravier (totalité)</td><td>1 min</td><td>Nettoie les parois, premier tour de malaxage</td></tr>
                            <tr><td><strong>3</strong></td><td>Sable (totalité)</td><td>1 min</td><td>Se mélange uniformément avec le gravier</td></tr>
                            <tr><td><strong>4</strong></td><td>Ciment (totalité)</td><td>1–2 min</td><td>S'enrobe sur granulats secs, pas de grumeaux</td></tr>
                            <tr><td><strong>5</strong></td><td>Reste d'eau progressivement</td><td>2–3 min</td><td>Ajuster la consistance sans sur-mouiller</td></tr>
                        </tbody>
                    </table>
                </div>

                <div style="background-color: var(--color-light); border-left: 4px solid var(--color-primary); padding: 1.5rem; margin-bottom: 2rem; border-radius: 0 8px 8px 0;">
                    <strong>Astuce pro :</strong> Ajoutez l'eau en deux fois. La première moitié avant les granulats (mouille les parois), la seconde progressivement à la fin. Arrêtez d'ajouter de l'eau quand le béton se détache proprement des parois en formant un boudin, c'est la consistance idéale pour les fondations.
                </div>

                <h3>Gâchage manuel au sol</h3>
                <p>Pour les très petits volumes sans bétonnière : mélangez d'abord le sable et le gravier à sec à la pelle, ajoutez le ciment (toujours au sac entier), homogénéisez, puis formez un cratère au centre et versez l'eau progressivement en ramenant les bords vers le centre. Ne gâchez jamais sur une surface absorbante (terre nue).</p>

                <!-- ═══ H2 : Calcul volumes ═══ -->
                <h2 id="calcul-quantite">Calcul de la quantité de béton pour vos fondations</h2>

                <p>Le calcul se fait en 3 étapes : mesurer les volumes, additionner, ajouter la marge de perte. Utilisez le calculateur ci-dessus pour les résultats automatiques, ou faites le calcul à la main.</p>

                <h3>Volume des semelles filantes</h3>
                <p><strong>Volume = Longueur totale × Largeur × Hauteur</strong></p>
                <p>Exemple : semelle de 50 cm × 40 cm sur 10 mètres : 10 × 0,50 × 0,40 = <strong>2 m³</strong></p>

                <h3>Volume de la dalle</h3>
                <p><strong>Volume = Longueur × Largeur × Épaisseur</strong></p>
                <p>Exemple : dalle 8 m × 6 m sur 15 cm : 8 × 6 × 0,15 = <strong>7,2 m³</strong></p>

                <h3>Marge de perte : toujours 10%</h3>
                <p>Le béton se perd dans les coffrages irréguliers, reste collé à la bétonnière, se déverse au sol. Prévoyez systématiquement <strong>10% de volume supplémentaire</strong>.</p>
                <p><strong>Volume total = (Volume semelles + Volume dalle) × 1,10</strong></p>

                <h3>Exemple : garage 6 m × 4 m</h3>
                <ul class="custom-list">
                    <li>Périmètre semelles : (6 + 4) × 2 = <strong>20 m linéaires</strong></li>
                    <li>Section semelle 0,40 m × 0,30 m = 0,12 m²</li>
                    <li>Volume semelles : 20 × 0,12 = <strong>2,4 m³</strong></li>
                    <li>Volume dalle : 6 × 4 × 0,10 = <strong>2,4 m³</strong></li>
                    <li>Volume brut : 2,4 + 2,4 = 4,8 m³</li>
                    <li>Avec marge 10% : 4,8 × 1,10 = <strong>5,3 m³</strong> → commander <strong>5,5 m³</strong></li>
                </ul>

                <!-- ═══ H2 : FAQ ═══ -->
                <h2 id="faq">FAQ — Questions fréquentes</h2>

                <h3>Le béton est trop liquide, que faire ?</h3>
                <p>Ne rajoutez jamais de ciment sec dans le camion ou la bétonnière en cours de rotation. Un béton trop liquide signifie trop d'eau. La seule solution : demander un nouveau malaxage avec moins d'eau, ou rejeter la gâchée. Un béton liquide perd 30 à 50% de sa résistance finale.</p>

                <h3>Combien de temps le béton de fondation met-il à sécher ?</h3>
                <p>La prise initiale commence après 4 à 6 heures. La résistance minimale pour charger s'obtient à <strong>7 jours</strong>. La résistance maximale (classe C25/30 ou C30/37) est atteinte à <strong>28 jours</strong>. Attendez 48 heures minimum avant de poser les murs sur les fondations.</p>

                <h3>Peut-on bétonner par -5°C ?</h3>
                <p>Non. Le béton gèle avant de prendre et perd toute sa résistance. La température minimale de coulage est de <strong>+5°C</strong> et doit se maintenir 48 heures. En hiver, utilisez un accélérateur de prise et protégez les fondations avec des bâches et de la paille.</p>

                <h3>Faut-il toujours couler un béton de propreté ?</h3>
                <p>Le DTU 13.1 le rend obligatoire dès que les semelles comportent des armatures situées au voisinage de leur sous-face. En pratique : toutes les semelles armées. Pour une semelle non armée sur sol très stable et propre, il peut être omis, mais c'est une prise de risque non recommandée.</p>

                <h3>Faut-il ajouter un retardateur de prise ?</h3>
                <p>Uniquement en cas de transport long (plus de 30 minutes) ou de forte chaleur (plus de 25°C). Il rallonge le temps de prise de 1 à 3 heures. En conditions normales, il est inutile et peut même être contre-productif si mal dosé.</p>

                <h3>Que faire du béton non utilisé ?</h3>
                <p>Ne versez jamais le béton excédentaire dans les canalisations ou sur le sol nu. Préparez une zone de stockage avec des palettes pour y vider la bétonnière. Une fois durci, ce béton servira de remblai ou de sous-couche. Les bennes à gravats acceptent le béton durci.</p>

                <h3>Quel coffrage utiliser pour couler mes fondations ?</h3>
                <p>Pour les semelles filantes, le coffrage bois classique (planches de 27 mm maintenues par des étrésillons) reste la référence. Pour les fondations plus complexes ou les angles rentrants, les banches métal offrent une meilleure rectitude. Notre guide sur le <a href="https://www.cemarenov.fr/coffrage-pour-fondation">coffrage pour fondation</a> détaille les techniques de mise en œuvre, les types de parements et les erreurs de contreventement à éviter. Pour un muret de clôture ou de jardin, les dimensions et le ferraillage sont spécifiques, notre guide <a href="https://www.cemarenov.fr/fondation-pour-muret-de-60-cm-de-hauteur">fondation pour muret de 60 cm</a> couvre ces cas.</p>

                <h3>Quels dosages pour les fondations d'un garage ?</h3>
                <p>Un garage en parpaings nécessite des semelles filantes en C25/30 (350 kg/m³), identiques à celles d'une maison. Notre guide complet sur la <a href="https://www.cemarenov.fr/fondation-garage">fondation de garage</a> détaille les dimensions de tranchées, le ferraillage et les volumes à commander selon la surface du projet.</p>

                <h3>Les dosages sont-ils les mêmes sur un terrain en pente ?</h3>
                <p>Le dosage du béton lui-même ne change pas, mais les fondations sur terrain en pente nécessitent un découpage en plots horizontaux reliés par des longrines inclinées, avec des armatures d'attente à chaque niveau. Le risque de glissement impose souvent un béton légèrement plus riche (400 kg/m³). Notre dossier <a href="https://www.cemarenov.fr/fondation-pour-terrain-en-pente">fondation pour terrain en pente</a> couvre les techniques d'ancrage adaptées à chaque type de sol.</p>

                <h3>Quand préférer des puits de fondation à des semelles filantes ?</h3>
                <p>Dès que le sol porteur est trop profond pour des semelles classiques, sol compressible, remblai ou présence d'une nappe phréatique haute. Les <a href="https://www.cemarenov.fr/fondation-puits">puits de fondation</a> descendent chercher le bon sol à 1,5 à 4 mètres de profondeur, là où les semelles filantes seraient trop coûteuses à excaver.</p>

            </div><!-- /.article-content -->

            <!-- AUTHOR BOX -->
            <div class="author-box-bottom">
                <div class="author-box-img">
                    <img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe">
                </div>
                <div class="author-box-content">
                    <h3>Philippe</h3>
                    <span class="author-role">Expert Rénovation &amp; Artisan RGE</span>
                    <p>Avec plus de 20 ans d'expérience sur les chantiers, Philippe vous partage ses conseils concrets et sans langue de bois. Spécialiste des fondations et du gros œuvre, il a supervisé plus de 200 chantiers de construction et rénovation.</p>
                    <a href="<?php echo BASE_URL; ?>philippe" class="btn-outline">Voir son profil complet</a>
                </div>
            </div>

            <!-- CONCLUSION + CTA -->
            <div class="conclusion-box">
                <h3>Besoin d'un devis pour vos fondations ?</h3>
                <p>Le dosage du béton est critique pour la solidité de votre construction. Une erreur à cette étape peut coûter cher à long terme. Nos artisans qualifiés interviennent dans toute la région pour des fondations conformes aux normes DTU 13.1 et garanties 10 ans.</p>
                <a href="<?php echo BASE_URL; ?>contact" class="btn-primary">Obtenir un devis gratuit</a>
            </div>

            <!-- ARTICLES SIMILAIRES -->
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

        </div><!-- /.article-container -->

        <!-- ── SIDEBAR DROITE ── -->
        <aside class="sidebar-right">
            <div class="sidebar-sticky">

                <div class="sidebar-block">
                    <h3 class="sidebar-title">Derniers articles — <?php echo htmlspecialchars($category['name'] ?? 'Travaux'); ?></h3>
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

    </div><!-- /.article-layout -->
</article>

<?php
require_once dirname(__DIR__) . '/schema-data.php';

$faq_schema = [
    [
        'question' => "Faut-il toujours couler un béton de propreté avant les fondations ?",
        'answer'   => "Oui, le DTU 13.1 l'impose pour toutes les semelles armées. Cette couche de 4 cm minimum dosée à 150–200 kg/m³ empêche les aciers de se souiller au contact de la terre, protégeant ainsi contre la corrosion."
    ],
    [
        'question' => "Quel dosage béton pour une semelle de fondation ?",
        'answer'   => "Selon le DTU 13.1 : 250 kg/m³ pour une semelle non armée, 300 kg/m³ pour une semelle filante avec chaînage, 350 kg/m³ pour une semelle en béton armé. Ajoutez 50 kg/m³ si le coulage se fait en présence d'eau."
    ],
    [
        'question' => "Le béton est trop liquide, que faire ?",
        'answer'   => "Ne rajoutez jamais de ciment sec. Un béton trop liquide perd 30 à 50% de sa résistance finale. La seule solution acceptable est de demander un nouveau malaxage avec moins d'eau."
    ],
    [
        'question' => "Combien de temps le béton de fondation met-il à sécher ?",
        'answer'   => "La prise commence après 4 à 6 heures. La résistance minimale pour charger s'obtient à 7 jours. La résistance maximale est atteinte à 28 jours. Attendez 48 heures minimum avant de poser les murs."
    ],
    [
        'question' => "Peut-on bétonner par -5°C ?",
        'answer'   => "Non. La température minimale de coulage est de +5°C et doit se maintenir 48 heures. En hiver, utilisez un accélérateur de prise et protégez les fondations avec des bâches et de la paille."
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
