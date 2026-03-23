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
    'excerpt'      => 'Guide complet sur le dosage béton fondation : proportions ciment/sable/gravier, classes C25/30 et C30/37, calcul des quantités et choix entre bétonnière et toupie.',
    'date'         => '2026-03-23',
    'reading_time' => 10,
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

            <!-- BREADCRUMB -->
            <nav class="breadcrumb">
                <a href="<?php echo BASE_URL; ?>">Accueil</a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                <a href="<?php echo BASE_URL . $current_cat; ?>"><?php echo htmlspecialchars($category['name']); ?></a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                <span>Dosage béton fondation</span>
            </nav>

            <!-- TAGS -->
            <div class="article-tags">
                <span class="article-tag">Fondations</span>
                <span class="article-tag">Béton</span>
                <span class="article-tag">Gros œuvre</span>
            </div>

            <!-- H1 -->
            <h1>Dosage béton fondation :<br>
                <span class="h1-accent">proportions exactes et calculs (2026)</span>
            </h1>

            <!-- META HEADER EEAT -->
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

            <p class="article-intro">Une fondation mal dosée, c'est une maison qui risque de bouger. Le béton n'est pas une recette de cuisine : les proportions comptent au litre près. On vous explique comment calculer les bonnes doses pour des fondations solides qui tiendront 50 ans.</p>

            <div class="article-content">

                <!-- TL;DR -->
                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                        L'essentiel à retenir
                    </div>
                    <ul>
                        <li><strong>Dosage standard fondation :</strong> 350 kg de ciment par m³ de béton (proportion 1-2-3).</li>
                        <li><strong>Classe béton fondation :</strong> C25/30 minimum pour une maison individuelle, C30/37 pour sols argileux.</li>
                        <li><strong>Quantité eau par sac :</strong> 16 à 17 litres d'eau pour un sac de 35 kg de ciment.</li>
                        <li><strong>Prix au m³ :</strong> 90 à 120 €/m³ en bétonnière, 130 à 180 €/m³ en toupie livrée.</li>
                        <li><strong>Marge de perte :</strong> prévoir 10% de volume supplémentaire pour les pertes et le remplissage des coffrages.</li>
                    </ul>
                </div>

                <!-- SOMMAIRE -->
                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li><a href="#quel-beton">Quel béton pour fondation</a></li>
                        <li><a href="#dosage-seau">Dosage béton fondation au seau</a></li>
                        <li><a href="#dosage-m3">Dosage béton fondation au m³</a></li>
                        <li><a href="#beton-pret">Béton prêt à l'emploi vs bétonnière</a></li>
                        <li><a href="#calcul-quantite">Calcul quantité béton</a></li>
                        <li><a href="#faq">FAQ — Questions fréquentes</a></li>
                    </ul>
                </div>

                <!-- H2: Quel béton pour fondation -->
                <h2 id="quel-beton">Quel béton pour fondation</h2>
                
                <p>Pour des fondations, on ne prend pas le premier béton venu. La norme impose des <strong>classes de résistance</strong> minimales selon le type de construction et la nature du sol.</p>

                <h3>Les classes C25/30 et C30/37</h3>
                
                <p>Le béton se classe selon sa résistance à la compression. Cette résistance s'exprime en <strong>MPa</strong> (mégapascal), soit en millions de pascals par mètre carré. En clair : 1 MPa = 10 kg de pression par cm².</p>

                <ul class="custom-list">
                    <li><strong>C25/30 :</strong> 25 MPa de résistance caractéristique. C'est le minimum pour une maison individuelle sur sol stable.</li>
                    <li><strong>C30/37 :</strong> 30 MPa de résistance. À privilégier sur sols argileux, terrains en pente ou constructions lourdes (pierre, brique).</li>
                </ul>

                <div style="background-color: var(--color-light); border-left: 4px solid var(--color-primary); padding: 1.5rem; margin-bottom: 2rem; border-radius: 0 8px 8px 0;">
                    <strong>En clair :</strong> Le chiffre avant le slash (25 ou 30) correspond à la résistance caractéristique à 28 jours. Le chiffre après le slash (30 ou 37) représente la résistance sur cylindre d'essai. Pour vos fondations, retenez simplement : C25/30 = standard, C30/37 = renforcé.
                </div>

                <h3>Étanchéité des fondations</h3>
                
                <p>Les fondations sont en contact permanent avec le sol et l'humidité. Un béton poreux capte l'eau et finit par s'effriter. D'où l'importance du <strong>rapport eau/ciment</strong> : il doit rester inférieur à 0,55 pour garantir l'étanchéité. Plus vous mettez d'eau, plus le béton est poreux.</p>

                <h3>L'étiquette NF béton</h3>
                
                <p>L'étiquette NF (Norme Française) garantit que le béton respecte les spécifications déclarées. Pour vos fondations, exigez un béton certifié NF avec traçabilité. C'est votre assurance qualité en cas de problème structurel.</p>

                <!-- H2: Dosage béton fondation au seau -->
                <h2 id="dosage-seau">Dosage béton fondation au seau</h2>
                
                <p>Sur les petits chantiers, on dosage souvent au seau de maçon (10 litres). La règle d'or des fondations : la proportion <strong>1-2-3</strong>.</p>

                <h3>La proportion 1-2-3 (ciment-sable-gravier)</h3>
                
                <p>Cette proportion est la base du béton de fondation :</p>

                <ul class="custom-list">
                    <li><strong>1 part de ciment</strong> (CPJ 32,5 ou 42,5)</li>
                    <li><strong>2 parts de sable</strong> (granulométrie 0/4 mm)</li>
                    <li><strong>3 parts de gravier</strong> (granulométrie 4/20 mm)</li>
                </ul>

                <h3>Dosage par sac de 35 kg</h3>
                
                <p>Un sac de ciment de 35 kg fait office de référence. Voici les quantités exactes pour un mélange homogène :</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr><th>Matériau</th><th>Quantité</th><th>Équivalent seaux (10L)</th></tr>
                        </thead>
                        <tbody>
                            <tr><td><strong>Ciment</strong></td><td>1 sac de 35 kg</td><td>3 seaux</td></tr>
                            <tr><td><strong>Sable 0/4</strong></td><td>70 kg</td><td>4 à 5 seaux</td></tr>
                            <tr><td><strong>Gravier 4/20</strong></td><td>105 kg</td><td>7 seaux</td></tr>
                            <tr><td><strong>Eau</strong></td><td>16-17 litres</td><td>1,5 à 2 seaux</td></tr>
                        </tbody>
                    </table>
                </div>

                <h3>Quantité d'eau en litres</h3>
                
                <p>L'eau est l'ingrédient le plus délicat. Trop d'eau = béton faible et poreux. Pas assez = béton impossible à travailler. Pour un sac de 35 kg, comptez <strong>16 à 17 litres d'eau</strong> selon l'humidité du sable.</p>

                <div style="background-color: #fbe3cb; border-left: 4px solid #e74c3c; padding: 1.5rem; margin-bottom: 2rem; border-radius: 0 8px 8px 0; color: #3e2e1f;">
                    <strong>Attention :</strong> Le sable de rivière est déjà humide. Réduisez l'eau de 1 à 2 litres si le sable colle aux doigts. Le béton doit être souple mais pas liquide.
                </div>

                <h3>Tableau récapitulatif des dosages au seau</h3>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr><th>Volume visé</th><th>Sacs ciment 35kg</th><th>Sable (seaux 10L)</th><th>Gravier (seaux 10L)</th><th>Eau (litres)</th></tr>
                        </thead>
                        <tbody>
                            <tr><td><strong>0,1 m³</strong></td><td>1 sac</td><td>4-5 seaux</td><td>7 seaux</td><td>16-17 L</td></tr>
                            <tr><td><strong>0,5 m³</strong></td><td>5 sacs</td><td>22-25 seaux</td><td>35 seaux</td><td>80-85 L</td></tr>
                            <tr><td><strong>1 m³</strong></td><td>10 sacs</td><td>45-50 seaux</td><td>70 seaux</td><td>160-170 L</td></tr>
                        </tbody>
                    </table>
                </div>

                <!-- H2: Dosage béton fondation au m³ -->
                <h2 id="dosage-m3">Dosage béton fondation au m³</h2>
                
                <p>Pour les chantiers importants, on raisonne en mètres cubes. Le dosage standard d'une fondation maison se situe autour de <strong>350 kg de ciment par m³</strong>.</p>

                <h3>350 kg de ciment par m³</h3>
                
                <p>Cette dose garantit une résistance C25/30. Pour atteindre du C30/37, montez à 400 kg/m³. Voici la composition exacte pour 1 m³ de béton de fondation :</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr><th>Composant</th><th>Quantité pour 1 m³</th><th>Notes</th></tr>
                        </thead>
                        <tbody>
                            <tr><td><strong>Ciment CPJ 32,5</strong></td><td>350 kg (10 sacs)</td><td>CPJ 42,5 acceptable aussi</td></tr>
                            <tr><td><strong>Sable 0/4</strong></td><td>700 kg</td><td>Sable de rivière lavé</td></tr>
                            <tr><td><strong>Gravier 4/20</strong></td><td>1 050 kg</td><td>Granulats concassés de préférence</td></tr>
                            <tr><td><strong>Eau</strong></td><td>175-180 litres</td><td>Selon humidité des granulats</td></tr>
                        </tbody>
                    </table>
                </div>

                <h3>Les granulats (sable 0/4, gravillon 4/20)</h3>
                
                <p>Les <strong>granulats</strong> désignent l'ensemble des matériaux solides (sable + gravier) incorporés au béton. Leurs caractéristiques influencent directement la résistance finale.</p>

                <ul class="custom-list">
                    <li><strong>Sable 0/4 :</strong> granulométrie de 0 à 4 mm. Il remplit les vides entre les graviers et donne la plasticité au mélange.</li>
                    <li><strong>Gravillon 4/20 :</strong> granulométrie de 4 à 20 mm. Il constitue le squelette du béton et apporte la résistance mécanique.</li>
                </ul>

                <p>Privilégiez les granulats concassés aux granulats roulés pour les fondations. Les arêtes vives des concassés accrochent mieux le ciment.</p>

                <h3>Eau : 180 L/m³ maximum</h3>
                
                <p>Le volume d'eau détermine la résistance finale. Pour 350 kg de ciment, ne dépassez pas <strong>180 litres d'eau par m³</strong>. Cela donne un rapport eau/ciment de 0,51, idéal pour l'étanchéité.</p>

                <h3>Les adjuvants optionnels</h3>
                
                <p>Les <strong>adjuvants</strong> sont des additifs qui modifient les propriétés du béton. Ils se dosent en millilitres par kg de ciment.</p>

                <ul class="custom-list">
                    <li><strong>Plastifiant :</strong> améliore la maniabilité sans ajouter d'eau. Dosage : 5 à 15 ml/kg de ciment.</li>
                    <li><strong>Accélérateur de prise :</strong> pour bétonner par temps frais. Permet de couler à +5°C.</li>
                    <li><strong>Retardateur :</strong> rallonge le temps de prise. Utile en cas de transport long ou de chaleur.</li>
                    <li><strong>Air-entraînant :</strong> améliore la résistance au gel. Indispensable en montagne ou climat rude.</li>
                </ul>

                <!-- ANECDOTE CHANTIER -->
                <blockquote class="article-blockquote">
                    <p>"Chantier de 2019, un particulier voulait économiser sur le ciment. Il a mis 7 sacs au lieu de 10 pour son m³. Résultat : 6 mois plus tard, ses fondations ont fissuré sur toute la longueur. On a dû tout refaire. Le ciment, c'est pas là qu'on économise."</p>
                </blockquote>

                <!-- H2: Béton prêt à l'emploi vs bétonnière -->
                <h2 id="beton-pret">Béton prêt à l'emploi vs bétonnière</h2>
                
                <p>Le choix dépend du volume à couler, du délai et du budget. Voici la comparaison réelle.</p>

                <h3>Avantages du camion toupie</h3>
                
                <ul class="custom-list">
                    <li><strong>Qualité constante :</strong> dosage industriel précis au gramme près.</li>
                    <li><strong>Rapidité :</strong> 6 m³ livrés et coulés en 1 heure.</li>
                    <li><strong>Pas de manutention :</strong> pas de sacs à porter, pas de bétonnière à tourner.</li>
                    <li><strong>Volume illimité :</strong> livraison de 2 à 12 m³ par rotation.</li>
                </ul>

                <h3>Avantages de la bétonnière</h3>
                
                <ul class="custom-list">
                    <li><strong>Coût :</strong> 30 à 50% moins cher sur les petits volumes.</li>
                    <li><strong>Flexibilité :</strong> on avance à son rythme, pas de pression du camion.</li>
                    <li><strong>Accessibilité :</strong> possible en terrain difficile où la toupie ne passe pas.</li>
                    <li><strong>Apprentissage :</strong> on comprend le matériau en le manipulant.</li>
                </ul>

                <h3>Prix comparatif au m³</h3>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr><th>Solution</th><th>Prix matériaux</th><th>Coût total estimé</th><th>Seuil rentable</th></tr>
                        </thead>
                        <tbody>
                            <tr><td><strong>Bétonnière (location)</strong></td><td>70-90 €/m³</td><td>90-120 €/m³</td><td>Jusqu'à 3 m³</td></tr>
                            <tr><td><strong>Toupie livrée</strong></td><td>100-140 €/m³</td><td>130-180 €/m³</td><td>Dès 3 m³</td></tr>
                            <tr><td><strong>Bétonnière (achat)</strong></td><td>70-90 €/m³</td><td>80-100 €/m³</td><td>À partir de 5 m³ cumulés</td></tr>
                        </tbody>
                    </table>
                </div>

                <h3>Quel choix selon le volume</h3>
                
                <ul class="custom-list">
                    <li><strong>Moins de 1 m³ :</strong> bétonnière manuelle ou location courte durée.</li>
                    <li><strong>1 à 3 m³ :</strong> bétonnière électrique louée pour la journée.</li>
                    <li><strong>3 à 6 m³ :</strong> toupie si accès facile, bétonnière si terrain compliqué.</li>
                    <li><strong>Plus de 6 m³ :</strong> toupie obligatoire pour la cohérence du béton.</li>
                </ul>

                <!-- H2: Calcul quantité béton -->
                <h2 id="calcul-quantite">Calcul quantité béton pour fondation</h2>
                
                <p>Le calcul se fait en 3 étapes : mesurer les volumes, additionner, ajouter la marge de perte.</p>

                <h3>Volume des semelles (L x l x h)</h3>
                
                <p>Les semelles filantes se calculent linéairement :</p>

                <p><strong>Volume = Longueur totale × Largeur × Hauteur</strong></p>

                <p>Exemple : une semelle de 50 cm de large (0,50 m) sur 40 cm de haut (0,40 m) pour un mur de 10 mètres :</p>
                <p>10 × 0,50 × 0,40 = <strong>2 m³</strong></p>

                <h3>Volume de la dalle</h3>
                
                <p>Si vous coulez une dalle en même temps :</p>

                <p><strong>Volume = Longueur × Largeur × Épaisseur</strong></p>

                <p>Exemple : dalle de 8 m × 6 m sur 15 cm d'épaisseur (0,15 m) :</p>
                <p>8 × 6 × 0,15 = <strong>7,2 m³</strong></p>

                <h3>Marge de perte : 10%</h3>
                
                <p>Le béton se perd dans les coffrages, reste collé à la bétonnière, s'évapore. Prévoyez systématiquement <strong>10% de volume supplémentaire</strong>.</p>

                <p>Formule complète : <strong>Volume total = (Volume semelles + Volume dalle) × 1,10</strong></p>

                <h3>Exemple calcul pour un garage</h3>
                
                <p>Garage de 6 m × 4 m avec semelles périphériques :</p>

                <ul class="custom-list">
                    <li>Périmètre semelles : (6 + 4) × 2 = <strong>20 m linéaires</strong></li>
                    <li>Section semelle : 0,40 m × 0,30 m = <strong>0,12 m²</strong></li>
                    <li>Volume semelles : 20 × 0,12 = <strong>2,4 m³</strong></li>
                    <li>Volume dalle : 6 × 4 × 0,10 = <strong>2,4 m³</strong></li>
                    <li>Volume brut : 2,4 + 2,4 = <strong>4,8 m³</strong></li>
                    <li>Avec marge 10% : 4,8 × 1,10 = <strong>5,3 m³</strong></li>
                </ul>

                <p>Pour ce garage, commandez <strong>5,5 m³ de béton</strong> (on arrondit au demi-mètre).</p>

                <!-- H2: FAQ -->
                <h2 id="faq">FAQ — Questions fréquentes</h2>

                <h3>Le béton est trop liquide, que faire ?</h3>
                <p>Ne rajoutez jamais de ciment sec dans le camion ou la bétonnière. Un béton trop liquide signifie trop d'eau ou un plastifiant mal dosé. La seule solution acceptable : demander un nouveau malaxage avec moins d'eau. Un béton liquide perd 30 à 50% de sa résistance finale.</p>

                <h3>Combien de temps le béton de fondation met-il à sécher ?</h3>
                <p>Le béton commence à durcir après 4 à 6 heures (prise initiale). La résistance minimale pour charger s'obtient à <strong>7 jours</strong>. La résistance maximale (28 jours) est atteinte après... 28 jours. Attendez 48 heures minimum avant de poser les murs sur les fondations.</p>

                <h3>Peut-on bétonner par -5°C ?</h3>
                <p>Non. Le béton gèle avant de prendre et perd toute sa résistance. La température minimale de coulage est de <strong>+5°C</strong> et doit se maintenir 48 heures après. En hiver, utilisez un accélérateur de prise et protégez les fondations avec des bâches et des bottes de paille.</p>

                <h3>Faut-il ajouter un retardateur de prise ?</h3>
                <p>Le retardateur sert en cas de transport long (plus de 30 minutes) ou de forte chaleur (plus de 25°C). Il rallonge le temps de prise de 1 à 3 heures. En conditions normales, il est inutile et peut même être contre-productif si mal dosé.</p>

                <h3>Que faire du béton non utilisé ?</h3>
                <p>Le béton non coulé durcit rapidement. Ne le versez jamais dans les canalisations ou sur le sol. Solution : préparez une zone de stockage avec des palettes ou des planches pour y verser l'excédent. Une fois durci, ce béton servira de remblai ou de sous-couche. Pour les petites quantités, les bennes à gravats acceptent le béton durci.</p>

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
                <p>Le dosage du béton est critique pour la solidité de votre construction. Une erreur à cette étape peut coûter cher à long terme. Nos artisans qualifiés interviennent dans toute la région pour des fondations conformes aux normes et garanties 10 ans.</p>
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
        'question' => "Le béton est trop liquide, que faire ?",
        'answer'   => "Ne rajoutez jamais de ciment sec. Un béton trop liquide signifie trop d'eau. La seule solution acceptable est de demander un nouveau malaxage avec moins d'eau. Un béton liquide perd 30 à 50% de sa résistance finale."
    ],
    [
        'question' => "Combien de temps le béton de fondation met-il à sécher ?",
        'answer'   => "Le béton commence à durcir après 4 à 6 heures. La résistance minimale pour charger s'obtient à 7 jours. La résistance maximale est atteinte après 28 jours. Attendez 48 heures minimum avant de poser les murs."
    ],
    [
        'question' => "Peut-on bétonner par -5°C ?",
        'answer'   => "Non. La température minimale de coulage est de +5°C et doit se maintenir 48 heures après. En hiver, utilisez un accélérateur de prise et protégez les fondations avec des bâches et des bottes de paille."
    ],
    [
        'question' => "Faut-il ajouter un retardateur de prise ?",
        'answer'   => "Le retardateur sert en cas de transport long (plus de 30 minutes) ou de forte chaleur (plus de 25°C). Il rallonge le temps de prise de 1 à 3 heures. En conditions normales, il est inutile."
    ],
    [
        'question' => "Que faire du béton non utilisé ?",
        'answer'   => "Préparez une zone de stockage avec des palettes pour y verser l'excédent. Une fois durci, ce béton servira de remblai ou de sous-couche. Les bennes à gravats acceptent le béton durci."
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