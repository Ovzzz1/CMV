<?php
// published: 2026-04-03 08:00
/**
 * 1-hectare-en-m2.php
 * Article : 1 hectare en m2 : convertisseur, formule et tableau de conversion
 * Site : cemarenov.fr
 * Date : 2026-03-31
 */

$article_meta = [
    'title'        => '1 hectare en m2 : convertisseur, formule et tableau de conversion',
    'category'     => 'maison',
    'slug'         => '1-hectare-en-m2',
    'image'        => 'https://www.cemarenov.fr/image/1 hectare en m2-1.webp',
    'excerpt'      => '1 hectare = 10 000 m². Convertisseur instantané hectares ↔ m², formule de calcul, tableau de conversion complet et repères concrets pour enfin visualiser ce que représente un hectare sur le terrain.',
    'date'         => '2026-04-03',
    'reading_time' => 5,
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
    <section class="article-hero" style="background-image: url('<?php echo BASE_URL; ?>image/1 hectare en m2-1.webp');">
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
                <span>1 hectare en m2</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Superficie</span>
                <span class="article-tag">Immobilier</span>
                <span class="article-tag">Maison</span>
            </div>

            <h1>1 hectare en m2 :<br>
                <span class="h1-accent">convertisseur, formule et tableau de conversion</span>
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
                Vous avez reçu un compromis de vente, vous parcourez une annonce immobilière ou votre
                notaire vous parle d'une parcelle de <strong>2 ha 14 a 30 ca</strong>, et vous n'avez
                aucune idée de ce que ça représente en mètres carrés. La réponse courte :
                <strong>1 hectare = 10 000 m²</strong>, exactement. La réponse longue, c'est cet article :
                un convertisseur en temps réel, la formule à retenir en 30 secondes, un tableau de
                conversion complet, et des repères concrets pour enfin visualiser ces surfaces sur
                le terrain avant de signer quoi que ce soit.
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
                        <li><strong>1 ha = 10 000 m²</strong>, un carré de 100 m de côté, ni plus ni
                            moins.</li>
                        <li><strong>Pour convertir :</strong> nombre de ha × 10 000 = m². À l'inverse :
                            m² ÷ 10 000 = ha.</li>
                        <li><strong>La hiérarchie agraire :</strong> 1 centiare = 1 m² → 100 ca = 1 are
                            → 100 ares = 1 ha → 100 ha = 1 km².</li>
                        <li><strong>Dans un acte notarié :</strong> "2 ha 14 a 30 ca" = 21 430 m².
                            On vous montre le calcul plus bas.</li>
                    </ul>
                </div>

                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li><a href="#convertisseur">Convertisseur hectares ↔ m² (temps réel)</a></li>
                        <li><a href="#definition">C'est quoi 1 hectare, concrètement ?</a></li>
                        <li><a href="#formule">La formule de conversion ha en m²</a></li>
                        <li><a href="#tableau">Tableau de conversion complet</a></li>
                        <li><a href="#unites">Are, centiare, hectare : lire un acte notarié</a></li>
                        <li><a href="#faq">FAQ : les questions les plus posées</a></li>
                    </ul>
                </div>


                <h2 id="convertisseur">Convertisseur hectares ↔ mètres carrés</h2>

                <p>Entrez une valeur dans l'un des deux champs. Le résultat et le détail du calcul
                    s'affichent instantanément.</p>

                <div class="converter-block">
                    <div class="converter-grid">
                        <div class="converter-field">
                            <label for="conv-ha">Hectares (ha)</label>
                            <div class="converter-input-wrap">
                                <input type="number" id="conv-ha" placeholder="ex : 2.5" min="0" step="any"
                                    inputmode="decimal" aria-label="Valeur en hectares">
                                <span class="conv-unit">ha</span>
                            </div>
                        </div>
                        <div class="converter-arrow" aria-hidden="true">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5">
                                <path d="M7 16V4m0 0L3 8m4-4l4 4M17 8v12m0 0l4-4m-4 4l-4-4" />
                            </svg>
                        </div>
                        <div class="converter-field">
                            <label for="conv-m2">Mètres carrés (m²)</label>
                            <div class="converter-input-wrap">
                                <input type="number" id="conv-m2" placeholder="ex : 25 000" min="0" step="any"
                                    inputmode="decimal" aria-label="Valeur en mètres carrés">
                                <span class="conv-unit">m²</span>
                            </div>
                        </div>
                    </div>
                    <div class="converter-result" id="conv-result" role="status" aria-live="polite">
                        <span class="conv-result-val" id="conv-result-val">–</span>
                        <span class="conv-result-label" id="conv-result-label">Entrez une valeur ci-dessus</span>
                    </div>
                    <div class="converter-formula-line" id="conv-formula-line" style="display:none">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" aria-hidden="true">
                            <circle cx="12" cy="12" r="10" />
                            <path d="M12 8v4M12 16h.01" />
                        </svg>
                        <span id="conv-formula-text">–</span>
                    </div>
                </div>

                <p><strong>Astuce mémo :</strong> pour passer des hectares aux m², ajoutez mentalement
                    4 zéros. 3 ha → 30 000 m². 0,5 ha → 5 000 m². Pour les valeurs entières,
                    pas besoin de calculatrice.</p>


                <h2 id="definition">C'est quoi 1 hectare, concrètement ?</h2>

                <p>L'<strong>hectare</strong> (symbole <strong>ha</strong>) est une unité de mesure de
                    superficie utilisée dans le système métrique. Son nom vient du grec
                    <em>hecto</em> (= 100) combiné à <em>are</em> (unité de 100 m²) : un hectare,
                    c'est littéralement <strong>100 ares</strong>, soit 10 000 m². L'hectare est accepté
                    par le Système international d'unités (SI) pour les usages fonciers et agricoles.
                </p>

                <figure>
                    <img style="width:100%; border-radius:12px; box-shadow:0 5px 15px rgba(0,0,0,.05);"
                        src="<?php echo BASE_URL; ?>image/1 hectare en m2-2.webp"
                        alt="Schéma d'un carré de 100 m par 100 m représentant 1 hectare avec la conversion en 10 000 m²"
                        loading="eager">
                    <figcaption style="text-align:center; font-size:.9rem; color:#64748b; font-style:italic;">
                        1 hectare = un carré parfait de 100 m × 100 m. C'est le repère géométrique
                        à garder en tête.
                    </figcaption>
                </figure>

                <h3>Le carré de 100 m de côté</h3>

                <p>Visualisez un carré dont chaque côté mesure exactement 100 mètres. Rien de plus.
                    100 × 100 = 10 000 m². C'est la définition exacte de l'hectare, et c'est le seul
                    repère à ancrer dans votre mémoire. Tout le reste en découle.</p>

                <h3>Des repères concrets pour visualiser 1 ha</h3>

                <p>Sur le terrain, 10 000 m² reste abstrait. Voici des comparaisons
                    plus parlantes :</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Repère</th>
                                <th>Surface réelle</th>
                                <th>Rapport à 1 ha</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>⚽ Terrain de football (FIFA)</td>
                                <td>≈ 7 140 m² (105 × 68 m)</td>
                                <td>1 ha ≈ <strong>1,4 terrains</strong></td>
                            </tr>
                            <tr>
                                <td>🏊 Piscine olympique</td>
                                <td>2 500 m² (50 × 25 m)</td>
                                <td>1 ha = <strong>4 piscines exactement</strong></td>
                            </tr>
                            <tr>
                                <td>🏡 Terrain à bâtir moyen (France)</td>
                                <td>≈ 500 m²</td>
                                <td>1 ha ≈ <strong>20 terrains</strong></td>
                            </tr>
                            <tr>
                                <td>🌳 Forêt dense (plantation)</td>
                                <td>—</td>
                                <td>1 ha = <strong>400 à 1 000 arbres</strong></td>
                            </tr>
                            <tr>
                                <td>🚗 Places de parking (allées incluses)</td>
                                <td>≈ 26 m²/place</td>
                                <td>1 ha ≈ <strong>385 places</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Schéma visuel à l'échelle -->
                <div style="background:linear-gradient(135deg,#f0fdf4 0%,#f0f9ff 100%);border:1px solid #d1d5db;border-radius:10px;padding:20px 20px 14px;margin:20px 0;">
                    <p style="text-align:center;font-weight:700;font-size:15px;margin:0 0 16px;color:#111827;">📐 1 hectare en images — à l'échelle</p>
                    <div style="display:flex;gap:12px;align-items:flex-end;justify-content:center;flex-wrap:wrap;">
                        <div style="text-align:center;">
                            <div style="width:150px;height:150px;background:#bbf7d0;border:2px solid #16a34a;border-radius:4px;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:3px;">
                                <strong style="font-size:15px;color:#14532d;">1 ha</strong>
                                <span style="font-size:12px;color:#166534;">10 000 m²</span>
                                <span style="font-size:11px;color:#4b5563;">100 × 100 m</span>
                            </div>
                            <p style="margin:5px 0 0;font-size:11px;color:#6b7280;">← 100 m →</p>
                        </div>
                        <div style="padding-bottom:55px;color:#6b7280;font-size:22px;font-weight:700;">=</div>
                        <div style="text-align:center;">
                            <div style="width:158px;height:102px;background:#bfdbfe;border:2px solid #2563eb;border-radius:4px;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:3px;">
                                <span style="font-size:15px;">⚽</span>
                                <strong style="font-size:12px;color:#1e3a8a;">Terrain de foot</strong>
                                <span style="font-size:11px;color:#1d4ed8;">7 140 m²</span>
                                <span style="font-size:10px;color:#4b5563;">105 × 68 m</span>
                            </div>
                            <p style="margin:5px 0 0;font-size:11px;color:#6b7280;">← 105 m →</p>
                        </div>
                        <div style="padding-bottom:55px;color:#6b7280;font-size:20px;font-weight:700;">× 1,4</div>
                    </div>
                    <p style="text-align:center;font-size:11px;color:#9ca3af;margin:10px 0 0;">Les rectangles sont tracés à l'échelle · 1 px ≈ 0,67 m</p>
                </div>

                <p>En immobilier, un terrain constructible de 1 ha est considéré comme grand.
                    Les PLU limitent généralement la surface minimale des lots à construire entre
                    200 m² et 2 000 m² selon la zone. 1 ha vous laisse en théorie largement de quoi
                    construire, mais la superficie exploitable dépend aussi du coefficient
                    d'emprise au sol (CES) et des reculs obligatoires. Si vous prévoyez
                    un projet de rénovation ou d'aménagement sur votre terrain, consultez notre guide sur
                    <a href="https://www.cemarenov.fr/maison"
                        style="text-decoration:underline;">les travaux maison</a>
                    pour estimer vos besoins.</p>


                <h2 id="formule">Comment convertir des hectares en m² ? La formule</h2>

                <h3>Ha → m² : multipliez par 10 000</h3>

                <p>La formule est l'une des plus simples du système métrique :</p>

                <div class="formula-highlight">
                    <strong>m² = ha × 10 000</strong>
                </div>

                <p>Exemples de calcul :</p>
                <ul class="custom-list">
                    <li><strong>0,5 ha</strong> × 10 000 = <strong>5 000 m²</strong></li>
                    <li><strong>1,5 ha</strong> × 10 000 = <strong>15 000 m²</strong></li>
                    <li><strong>3 ha</strong> × 10 000 = <strong>30 000 m²</strong></li>
                    <li><strong>12,75 ha</strong> × 10 000 = <strong>127 500 m²</strong></li>
                </ul>

                <h3>M² → ha : divisez par 10 000</h3>

                <p>Le calcul inverse est tout aussi immédiat :</p>

                <div class="formula-highlight">
                    <strong>ha = m² ÷ 10 000</strong>
                </div>

                <ul class="custom-list">
                    <li><strong>25 000 m²</strong> ÷ 10 000 = <strong>2,5 ha</strong></li>
                    <li><strong>8 500 m²</strong> ÷ 10 000 = <strong>0,85 ha</strong></li>
                    <li><strong>100 000 m²</strong> ÷ 10 000 = <strong>10 ha</strong></li>
                </ul>

                <p>Pour les valeurs décimales, déplacez simplement la virgule de 4 rangs vers la droite
                    (ha → m²) ou vers la gauche (m² → ha). 0,3 ha → 3 000 m².
                    3 000 m² → 0,3 ha.</p>


                <h2 id="tableau">Tableau de conversion hectares en m²</h2>

                <p>Les valeurs les plus demandées en immobilier, urbanisme et agriculture.
                    La ligne surlignée est la valeur de référence.</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Hectares (ha)</th>
                                <th>Mètres carrés (m²)</th>
                                <th>Ares (a)</th>
                                <th>Km²</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>0,01 ha</td>
                                <td>100 m²</td>
                                <td>1 a</td>
                                <td>0,0001 km²</td>
                            </tr>
                            <tr>
                                <td>0,05 ha</td>
                                <td>500 m²</td>
                                <td>5 a</td>
                                <td>0,0005 km²</td>
                            </tr>
                            <tr>
                                <td>0,1 ha</td>
                                <td>1 000 m²</td>
                                <td>10 a</td>
                                <td>0,001 km²</td>
                            </tr>
                            <tr>
                                <td>0,25 ha</td>
                                <td>2 500 m²</td>
                                <td>25 a</td>
                                <td>0,0025 km²</td>
                            </tr>
                            <tr>
                                <td>0,5 ha</td>
                                <td>5 000 m²</td>
                                <td>50 a</td>
                                <td>0,005 km²</td>
                            </tr>
                            <tr style="background:#f0fdf4; font-weight:700;">
                                <td>1 ha</td>
                                <td>10 000 m²</td>
                                <td>100 a</td>
                                <td>0,01 km²</td>
                            </tr>
                            <tr>
                                <td>2 ha</td>
                                <td>20 000 m²</td>
                                <td>200 a</td>
                                <td>0,02 km²</td>
                            </tr>
                            <tr>
                                <td>3 ha</td>
                                <td>30 000 m²</td>
                                <td>300 a</td>
                                <td>0,03 km²</td>
                            </tr>
                            <tr>
                                <td>5 ha</td>
                                <td>50 000 m²</td>
                                <td>500 a</td>
                                <td>0,05 km²</td>
                            </tr>
                            <tr>
                                <td>10 ha</td>
                                <td>100 000 m²</td>
                                <td>1 000 a</td>
                                <td>0,10 km²</td>
                            </tr>
                            <tr>
                                <td>25 ha</td>
                                <td>250 000 m²</td>
                                <td>2 500 a</td>
                                <td>0,25 km²</td>
                            </tr>
                            <tr>
                                <td>30 ha</td>
                                <td>300 000 m²</td>
                                <td>3 000 a</td>
                                <td>0,30 km²</td>
                            </tr>
                            <tr>
                                <td>50 ha</td>
                                <td>500 000 m²</td>
                                <td>5 000 a</td>
                                <td>0,50 km²</td>
                            </tr>
                            <tr>
                                <td>100 ha</td>
                                <td>1 000 000 m²</td>
                                <td>10 000 a</td>
                                <td>1 km²</td>
                            </tr>
                        </tbody>
                    </table>
                </div>


                <h2 id="unites">Are, centiare, hectare : déchiffrer une surface foncière</h2>

                <p>En France, les actes notariaux et les relevés raux n'expriment pas toujours
                    une superficie en mètres carrés. Ils utilisent le système agraire officiel avec
                    trois unités emboîtées que tout acheteur ou vendeur devrait savoir lire.</p>

                <h3>La hiérarchie complète des unités agraires</h3>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Unité</th>
                                <th>Symbole</th>
                                <th>En m²</th>
                                <th>Repère visuel</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Centiare</strong></td>
                                <td>ca</td>
                                <td>1 m²</td>
                                <td>Une dalle de carrelage 1 m × 1 m</td>
                            </tr>
                            <tr>
                                <td><strong>Are</strong></td>
                                <td>a</td>
                                <td>100 m²</td>
                                <td>Un carré de 10 m × 10 m</td>
                            </tr>
                            <tr style="background:#f0fdf4; font-weight:700;">
                                <td><strong>Hectare</strong></td>
                                <td>ha</td>
                                <td>10 000 m²</td>
                                <td>Un carré de 100 m × 100 m</td>
                            </tr>
                            <tr>
                                <td><strong>Kilomètre carré</strong></td>
                                <td>km²</td>
                                <td>1 000 000 m²</td>
                                <td>100 hectares côte à côte</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h3>Comment lire "2 ha 14 a 30 ca" dans un acte notarié</h3>

                <p>La superficie d'un terrain s'écrit souvent <strong>X ha Y a Z ca</strong> dans
                    les documents officiels. Le calcul en m² est mécanique : on convertit chaque
                    unité séparément, puis on additionne.</p>

                <figure>
                    <img style="width:100%; border-radius:12px; box-shadow:0 5px 15px rgba(0,0,0,.05);"
                        src="<?php echo BASE_URL; ?>image/1 hectare en m2-3.webp"
                        alt="Extrait d'un relevé ral avec la superficie exprimée en hectares, ares et centiares, avec annotations explicatives"
                        loading="lazy">
                    <figcaption style="text-align:center; font-size:.9rem; color:#64748b; font-style:italic;">
                        Sur un titre de propriété ou un relevé ral, la surface foncière
                        s'exprime en ha / a / ca. Une simple multiplication suffit à tout convertir.
                    </figcaption>
                </figure>

                <p><strong>Exemple :</strong> terrain de 2 ha 14 a 30 ca :</p>
                <ul class="custom-list">
                    <li>2 ha × 10 000 = <strong>20 000 m²</strong></li>
                    <li>14 a × 100 = <strong>1 400 m²</strong></li>
                    <li>30 ca × 1 = <strong>30 m²</strong></li>
                    <li>Total : <strong>21 430 m²</strong></li>
                </ul>

                <p>Si votre projet implique des travaux de rénovation, d'assainissement ou
                    d'aménagement sur une propriété de cette taille, les
                    <a href="https://www.cemarenov.fr/assechement-murs-injections"
                        style="text-decoration:underline;">problématiques d'humidité</a>
                    dans les murs peuvent apparaître sur de grandes emprises. Des fondations qui
                    travaillent sur une grande superficie méritent un diagnostic complet avant
                    tout démarrage de chantier.</p>


                <h2 id="faq">FAQ : les questions les plus posées sur l'hectare</h2>

                <h3>Combien de m² dans 1 hectare ?</h3>
                <p><strong>1 hectare = 10 000 m²</strong>, exactement. C'est la surface d'un carré
                    de 100 m de côté. Cette valeur est fixe, définie par le système métrique
                    international, sans arrondi possible.</p>

                <h3>Combien d'ares dans 1 hectare ?</h3>
                <p><strong>1 hectare = 100 ares.</strong> L'are (symbole : a) vaut 100 m². On trouve
                    cette notation dans les actes de vente : "0 ha 75 a" désigne un terrain de
                    7 500 m², un terrain standard pour une maison individuelle en périphérie
                    de ville.</p>

                <h3>Combien d'hectares dans 1 km² ?</h3>
                <p><strong>1 km² = 100 hectares.</strong> Un kilomètre carré représente
                    1 000 × 1 000 = 1 000 000 m², soit 100 ha exactement.
                    Inversement, 1 ha = 0,01 km².</p>

                <h3>C'est grand, 1 hectare ?</h3>
                <p>Tout dépend du contexte. Pour un jardin privatif, c'est
                    <strong>immense</strong>, la majorité des terrains individuels en France font
                    200 à 800 m². Pour une exploitation agricole céréalière, c'est
                    <strong>très petit</strong>, une ferme rentable commence généralement
                    à 50 ha. Pour un domaine viticole ou une forêt en gestion, 1 ha est
                    un début. Repère rapide : <strong>1 ha ≈ 1,4 terrain de football.</strong></p>

                <h3>Un hectare, c'est combien de parcelles ?</h3>
                <p>En France, la surface médiane d'une parcelle cadastrale est d'environ <strong>8 ares (800 m²)</strong>. Sur cette base, 1 hectare correspond à peu près à <strong>12 à 13 parcelles moyennes</strong>. En pratique, une seule tient souvent plusieurs hectares en milieu rural, tandis qu'en zone pavillonnaire, 1 ha peut regrouper 5 à 20 lots selon le PLU. C'est la mention au cadastre (en ha / a / ca) qui fait foi lors d'une vente.</p>

                <h3>Qu'est-ce qu'un mètre carré (m²) ?</h3>
                <p>Le <strong>mètre carré</strong> est l'unité de base de la superficie dans le
                    Système international d'unités. Il correspond à la surface d'un carré de
                    1 m de côté. C'est l'unité de référence en France pour la surface habitable
                    d'un logement et les surfaces de terrain. L'hectare vaut simplement
                    10 000 fois cette unité.</p>

                <h3>Qu'est-ce qu'un hectare (ha) ?</h3>
                <p>L'hectare est une unité de mesure de superficie utilisée principalement en
                    agriculture, sylviculture et immobilier foncier. Son symbole est
                    <strong>ha</strong>. Il équivaut à 100 ares ou 10 000 m². L'hectare
                    n'appartient pas officiellement au Système international d'unités (SI),
                    mais son usage est reconnu et accepté avec lui pour les surfaces
                    foncières.</p>

                <h3>Quel est le symbole de l'hectare ?</h3>
                <p>Le symbole officiel de l'hectare est <strong>ha</strong> — deux lettres minuscules, sans majuscule ni point abréviatif. On écrit donc <em>2 ha</em> et non <em>2 Ha</em> ni <em>2 ha.</em>. Ce symbole est défini par le Bureau international des poids et mesures (BIPM) et reconnu dans tous les pays du système métrique. À ne pas confondre avec <em>h</em> (heure) ou <em>Ha</em> (hafnium en chimie).</p>

                <h3>Comment calculer la surface d'un terrain ?</h3>
                <p>Pour un terrain rectangulaire : longueur × largeur = m². Pour une parcelle
                    irrégulière, le géomètre-expert découpe la surface en formes géométriques
                    simples (triangles, trapèzes), calcule chacune et additionne. Le résultat
                    figure ensuite au cadastre en ha, a et ca. C'est cette mesure officielle
                    qui fait foi lors d'une transaction immobilière, pas un mesurage à la
                    ficelle.</p>

            </div><div class="conclusion-box">
                <h3>Le mot de la fin</h3>
                <p>1 hectare = 10 000 m², et cette seule équation suffit pour 90 % des situations
                    du quotidien. Ce qui change la donne, c'est de savoir la décliner : lire un acte
                    notarié en ha / a / ca, estimer une surface agricole, vérifier la cohérence d'un
                    plan de masse avant de signer. Pour tout projet de rénovation ou d'aménagement
                    sur votre propriété, qu'elle fasse 200 m² ou 2 ha, nos équipes sont là
                    pour vous accompagner.</p>
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

        </div><aside class="sidebar-right">
            <div class="sidebar-sticky">
                <div class="sidebar-block">
                    <h3 class="sidebar-title">Derniers articles,
                        <?php echo htmlspecialchars($category['name']); ?></h3>
                    <?php foreach ($cat_articles as $art): ?>
                        <a href="<?php echo $art['url'] ?? '#'; ?>" class="sidebar-article-card">
                            <img src="<?php echo $art['image']; ?>"
                                alt="<?php echo htmlspecialchars($art['title']); ?>">
                            <span><?php echo htmlspecialchars($art['title']); ?></span>
                        </a>
                    <?php endforeach; ?>
                </div>

                <div class="sidebar-block">
                    <h3 class="sidebar-title">Les plus récents</h3>
                    <?php foreach ($latest_articles as $art): ?>
                        <a href="<?php echo $art['url'] ?? '#'; ?>" class="sidebar-article-card">
                            <img src="<?php echo $art['image']; ?>"
                                alt="<?php echo htmlspecialchars($art['title']); ?>">
                            <span><?php echo htmlspecialchars($art['title']); ?></span>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </aside>

    </div></article>

<style>
/* --- Convertisseur --- */
.converter-block {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 14px;
    padding: 28px;
    margin: 24px 0;
}
.converter-grid {
    display: grid;
    grid-template-columns: 1fr auto 1fr;
    align-items: end;
    gap: 16px;
}
.converter-field label {
    display: block;
    font-size: .8rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: .06em;
    color: #64748b;
    margin-bottom: 8px;
}
.converter-input-wrap {
    display: flex;
    align-items: center;
    border: 1.5px solid #cbd5e1;
    border-radius: 10px;
    overflow: hidden;
    background: #fff;
    transition: border-color .18s;
}
.converter-input-wrap:focus-within {
    border-color: var(--accent, #16a34a);
    box-shadow: 0 0 0 3px rgba(22,163,74,.1);
}
.converter-input-wrap input {
    flex: 1;
    padding: 12px 14px;
    font-size: 1.15rem;
    font-weight: 600;
    border: none;
    background: transparent;
    color: #1e293b;
    min-width: 0;
}
.converter-input-wrap input:focus { outline: none; }
.converter-input-wrap input::placeholder { color: #94a3b8; font-weight: 400; }
.conv-unit {
    padding: 8px 14px;
    background: #f0fdf4;
    color: #16a34a;
    font-size: .85rem;
    font-weight: 700;
    border-left: 1px solid #d1fae5;
    white-space: nowrap;
}
.converter-arrow {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    background: var(--accent, #16a34a);
    color: #fff;
    border-radius: 50%;
    flex-shrink: 0;
    margin-bottom: 2px;
}
.converter-result {
    margin-top: 18px;
    padding: 16px 20px;
    background: #f0fdf4;
    border: 1px solid #bbf7d0;
    border-radius: 10px;
    text-align: center;
}
.conv-result-val {
    display: block;
    font-size: 1.6rem;
    font-weight: 800;
    color: #16a34a;
    margin-bottom: 4px;
}
.conv-result-label {
    font-size: .875rem;
    color: #64748b;
}
.converter-formula-line {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-top: 10px;
    padding: 10px 14px;
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    font-size: .85rem;
    color: #64748b;
    font-family: 'Courier New', monospace;
}
.converter-formula-line svg { flex-shrink: 0; color: #16a34a; }
/* --- Formule --- */
.formula-highlight {
    text-align: center;
    padding: 18px 24px;
    background: #f0fdf4;
    border: 2px dashed #86efac;
    border-radius: 10px;
    font-size: 1.25rem;
    color: #16a34a;
    margin: 18px 0;
    font-family: 'Courier New', monospace;
}
@media (max-width: 640px) {
    .converter-grid {
        grid-template-columns: 1fr;
    }
    .converter-arrow {
        transform: rotate(90deg);
        margin: 0 auto;
    }
}
</style>

<script>
(function () {
    var ha  = document.getElementById('conv-ha');
    var m2  = document.getElementById('conv-m2');
    var resultVal   = document.getElementById('conv-result-val');
    var resultLabel = document.getElementById('conv-result-label');
    var formulaLine = document.getElementById('conv-formula-line');
    var formulaText = document.getElementById('conv-formula-text');

    function fmt(n) {
        if (n === 0) return '0';
        if (n >= 1000) return new Intl.NumberFormat('fr-FR').format(Math.round(n * 1000000) / 1000000);
        return parseFloat(n.toFixed(8)).toString().replace('.', ',');
    }

    ha.addEventListener('input', function () {
        var v = parseFloat(ha.value);
        m2.value = '';
        if (!isNaN(v) && v >= 0) {
            var res = v * 10000;
            resultVal.textContent   = fmt(res) + '\u00a0m\u00b2';
            resultLabel.textContent = fmt(v) + ' ha = ' + fmt(res) + ' m\u00b2';
            formulaText.textContent = fmt(v) + ' ha \u00d7 10\u202f000 = ' + fmt(res) + ' m\u00b2';
            formulaLine.style.display = 'flex';
        } else {
            resultVal.textContent = '\u2013';
            resultLabel.textContent = 'Entrez une valeur ci-dessus';
            formulaLine.style.display = 'none';
        }
    });

    m2.addEventListener('input', function () {
        var v = parseFloat(m2.value);
        ha.value = '';
        if (!isNaN(v) && v >= 0) {
            var res = v / 10000;
            resultVal.textContent   = fmt(res) + '\u00a0ha';
            resultLabel.textContent = fmt(v) + ' m\u00b2 = ' + fmt(res) + ' ha';
            formulaText.textContent = fmt(v) + ' m\u00b2 \u00f7 10\u202f000 = ' + fmt(res) + ' ha';
            formulaLine.style.display = 'flex';
        } else {
            resultVal.textContent = '\u2013';
            resultLabel.textContent = 'Entrez une valeur ci-dessus';
            formulaLine.style.display = 'none';
        }
    });
})();
</script>

<?php
// Schema.org, NE JAMAIS MODIFIER
require_once dirname(__DIR__) . '/schema-data.php';
$_schema = get_schema_data(basename(__FILE__, '.php'));
echo generate_article_schema($article_meta, $_schema['faq'] ?? [], $_schema['howto'] ?? []);
echo generate_rating_widget();
include dirname(__DIR__) . '/footer.php';
?>
