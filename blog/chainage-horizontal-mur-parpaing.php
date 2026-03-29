<?php
/**
 * chainage-horizontal-mur-parpaing.php
 * Article : Chainage horizontal mur parpaing : mise en œuvre et règles de pose (2026)
 * Site : Expert Renov' (cemarenov.fr)
 * Date : 2026-03-29
 */

$article_meta = [
    'title'        => 'Chainage horizontal mur parpaing : mise en œuvre et règles de pose (2026)',
    'category'     => 'travaux',
    'slug'         => 'chainage-horizontal-mur-parpaing',
    'image'        => 'https://www.cemarenov.fr/image/chainage horizontal mur parpaing1.webp',
    'excerpt'      => 'Comment réaliser un chaînage horizontal sur un mur en parpaing : bloc en U, ferraillage, nombre de ceintures selon hauteur et calcul du béton nécessaire.',
    'date'         => '2026-03-29',
    'reading_time' => 7,
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
    <section class="article-hero" style="background-image: url('<?php echo BASE_URL; ?>image/chainage horizontal mur parpaing1.webp');">
        <div class="article-hero-content">

            <nav class="breadcrumb">
                <a href="<?php echo BASE_URL; ?>">Accueil</a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                <a href="<?php echo BASE_URL . $current_cat; ?>"><?php echo htmlspecialchars($category['name']); ?></a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                <span>Chaînage horizontal mur parpaing</span>
            </nav>

            <div class="article-tags">
                <span class="article-tag">Maçonnerie</span>
                <span class="article-tag">Parpaing</span>
                <span class="article-tag">Gros œuvre</span>
            </div>

            <h1>Chainage horizontal mur parpaing :<br>
                <span class="h1-accent">mise en œuvre, ferraillage et règles de pose (2026)</span>
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

            <p class="article-intro">
                Le chaînage horizontal, c'est la ceinture de béton armé qui solidarise les murs d'un parpaing et les empêche de s'écarter. Sans lui, les murs "font tonneau" — ils bombent et fissurent sous leur propre poids. <strong>Combien en prévoir, où les placer, et combien de béton commander : tout est ici.</strong>
            </p>

            <div class="article-content">

                <!-- TL;DR -->
                <div class="tldr-box">
                    <div class="tldr-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                        L'essentiel à retenir
                    </div>
                    <ul>
                        <li><strong>Rôle :</strong> le chaînage horizontal relie et solidarise les murs, s'oppose aux efforts de traction et répartit les charges verticales sur toute la structure.</li>
                        <li><strong>Matériau :</strong> blocs en U de même matière que le parpaing (150 ou 200 mm d'épaisseur, hauteur min. 15 cm selon DTU 20.1) — arroser avant de couler.</li>
                        <li><strong>Ferraillage :</strong> 4 barres HA10 (chaînage 4×10, nuance E40/EP4/10) par rang, équerres dans les angles, enrobage assuré par des cales plastique.</li>
                        <li><strong>Nombre :</strong> 1 couronnement pour une murette ≤ 1,2 m ; 2 chaînages pour une clôture jusqu'à 2 m ; 1 chaînage par niveau de plancher pour une maison.</li>
                    </ul>
                </div>

                <!-- SOMMAIRE -->
                <div class="toc-box">
                    <div class="toc-title">Sommaire</div>
                    <ul>
                        <li><a href="#calculateur">Calculateur — nombre de chaînages et béton</a></li>
                        <li><a href="#role-chainage">À quoi sert le chaînage horizontal ?</a></li>
                        <li><a href="#types-chainage">Les différents types de chaînage</a></li>
                        <li><a href="#realisation">Comment réaliser un chaînage horizontal</a></li>
                        <li><a href="#hauteur-quantite">Hauteur, nombre et règles DTU</a></li>
                        <li><a href="#faq">FAQ — Questions fréquentes</a></li>
                    </ul>
                </div>

                <!-- ═══════════════ CALCULATEUR UX (remonté) ═══════════════ -->
                <h2 id="calculateur">Calculateur — combien de chaînages et de béton pour mon mur ?</h2>

                <p>Renseignez les dimensions de votre mur. L'outil calcule instantanément le nombre de chaînages à poser, leur position et le volume de béton à commander — avec les règles du DTU 20.1 appliquées à votre cas.</p>

                <div style="background-color: var(--color-light); border: 1px solid var(--color-border); border-radius: 12px; padding: 2rem; margin: 1.5rem 0 2rem;">

                    <div style="display:flex; align-items:center; gap:12px; margin-bottom:1.5rem;">
                        <div style="background-color: var(--color-primary); border-radius:8px; width:40px; height:40px; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="2" width="16" height="20" rx="2"/><line x1="8" y1="6" x2="16" y2="6"/><line x1="8" y1="10" x2="16" y2="10"/><line x1="8" y1="14" x2="12" y2="14"/></svg>
                        </div>
                        <div>
                            <p style="font-weight:600; font-size:1rem; margin:0; color: var(--color-dark);">Calculateur chaînage & béton</p>
                            <p style="font-size:0.85rem; color:#666; margin:0;">Ajustez les sliders — les résultats et le schéma se mettent à jour en temps réel.</p>
                        </div>
                    </div>

                    <!-- LIGNE 1 : sliders -->
                    <div style="display:grid; grid-template-columns:1fr 1fr; gap:1.25rem; margin-bottom:1.25rem;">

                        <div>
                            <label style="display:flex; justify-content:space-between; font-size:0.85rem; color:#555; margin-bottom:6px;">
                                <span>Longueur du mur</span>
                                <strong id="calc-longueur-out" style="color: var(--color-dark);">8 m</strong>
                            </label>
                            <input type="range" id="calc-longueur" min="1" max="30" value="8" step="0.5"
                                   style="width:100%; accent-color: var(--color-primary);"
                                   oninput="calcChain()">
                        </div>

                        <div>
                            <label style="display:flex; justify-content:space-between; font-size:0.85rem; color:#555; margin-bottom:6px;">
                                <span>Hauteur du mur</span>
                                <strong id="calc-hauteur-out" style="color: var(--color-dark);">2,0 m</strong>
                            </label>
                            <input type="range" id="calc-hauteur" min="0.5" max="4" value="2" step="0.1"
                                   style="width:100%; accent-color: var(--color-primary);"
                                   oninput="calcChain()">
                        </div>

                    </div>

                    <!-- LIGNE 2 : boutons épaisseur + hauteur chaînage -->
                    <div style="display:grid; grid-template-columns:1fr 1fr; gap:1.25rem; margin-bottom:1.5rem;">

                        <div>
                            <p style="font-size:0.85rem; color:#555; margin:0 0 6px;">Épaisseur du parpaing</p>
                            <div style="display:flex; gap:0; border-radius:8px; overflow:hidden; border:1px solid var(--color-border);">
                                <button id="ep-10" onclick="setEp(10)" style="flex:1; padding:8px 0; font-size:0.85rem; background:var(--color-bg); border:none; cursor:pointer; color:#555; transition:all .15s;">10 cm</button>
                                <button id="ep-15" onclick="setEp(15)" style="flex:1; padding:8px 0; font-size:0.85rem; background:var(--color-primary); border:none; cursor:pointer; color:white; font-weight:600; transition:all .15s;">15 cm</button>
                                <button id="ep-20" onclick="setEp(20)" style="flex:1; padding:8px 0; font-size:0.85rem; background:var(--color-bg); border:none; cursor:pointer; color:#555; transition:all .15s;">20 cm</button>
                            </div>
                        </div>

                        <div>
                            <p style="font-size:0.85rem; color:#555; margin:0 0 6px;">Hauteur du chaînage</p>
                            <div style="display:flex; gap:0; border-radius:8px; overflow:hidden; border:1px solid var(--color-border);">
                                <button id="hc-15" onclick="setHc(15)" style="flex:1; padding:8px 0; font-size:0.85rem; background:var(--color-primary); border:none; cursor:pointer; color:white; font-weight:600; transition:all .15s;">15 cm</button>
                                <button id="hc-20" onclick="setHc(20)" style="flex:1; padding:8px 0; font-size:0.85rem; background:var(--color-bg); border:none; cursor:pointer; color:#555; transition:all .15s;">20 cm</button>
                                <button id="hc-25" onclick="setHc(25)" style="flex:1; padding:8px 0; font-size:0.85rem; background:var(--color-bg); border:none; cursor:pointer; color:#555; transition:all .15s;">25 cm</button>
                            </div>
                        </div>

                    </div>

                    <!-- RÉSULTATS -->
                    <div style="display:grid; grid-template-columns:repeat(3,1fr); gap:0.75rem; margin-bottom:1.25rem;">

                        <div style="background:white; border-radius:10px; padding:1rem; text-align:center; border:1px solid var(--color-border);">
                            <p style="font-size:0.75rem; color:#888; margin:0 0 4px; text-transform:uppercase; letter-spacing:.05em;">Chaînages</p>
                            <p id="calc-nb" style="font-size:2rem; font-weight:700; color: var(--color-primary); margin:0; line-height:1;">2</p>
                            <p style="font-size:0.75rem; color:#aaa; margin:4px 0 0;">ceintures à poser</p>
                        </div>

                        <div style="background:white; border-radius:10px; padding:1rem; text-align:center; border:1px solid var(--color-border);">
                            <p style="font-size:0.75rem; color:#888; margin:0 0 4px; text-transform:uppercase; letter-spacing:.05em;">Béton total</p>
                            <p id="calc-vol" style="font-size:2rem; font-weight:700; color: var(--color-primary); margin:0; line-height:1;">36</p>
                            <p style="font-size:0.75rem; color:#aaa; margin:4px 0 0;">litres à couler</p>
                        </div>

                        <div style="background:white; border-radius:10px; padding:1rem; text-align:center; border:1px solid var(--color-border);">
                            <p style="font-size:0.75rem; color:#888; margin:0 0 4px; text-transform:uppercase; letter-spacing:.05em;">Ciment</p>
                            <p id="calc-ciment" style="font-size:2rem; font-weight:700; color: var(--color-primary); margin:0; line-height:1;">13</p>
                            <p style="font-size:0.75rem; color:#aaa; margin:4px 0 0;">kg à prévoir</p>
                        </div>

                    </div>

                    <!-- SCHÉMA MUR -->
                    <div style="background:white; border-radius:10px; padding:1rem; border:1px solid var(--color-border); margin-bottom:1rem;">
                        <p style="font-size:0.8rem; color:#888; margin:0 0 8px;">Position des chaînages (vue de face)</p>
                        <svg id="calc-wall-svg" width="100%" viewBox="0 0 500 140" style="display:block;">
                            <g id="calc-wall-g"></g>
                        </svg>
                    </div>

                    <!-- NOTE DTU -->
                    <div id="calc-dtu-note" style="font-size:0.82rem; color:#555; background:white; border-left:3px solid var(--color-primary); border-radius:0 6px 6px 0; padding:0.75rem 1rem;"></div>

                </div>

                <script>
                var _ep = 15, _hc = 15;

                function setEp(v) {
                    _ep = v;
                    [10,15,20].forEach(function(x) {
                        var btn = document.getElementById('ep-'+x);
                        btn.style.background = (x === v) ? 'var(--color-primary)' : 'var(--color-bg)';
                        btn.style.color = (x === v) ? 'white' : '#555';
                        btn.style.fontWeight = (x === v) ? '600' : 'normal';
                    });
                    calcChain();
                }

                function setHc(v) {
                    _hc = v;
                    [15,20,25].forEach(function(x) {
                        var btn = document.getElementById('hc-'+x);
                        btn.style.background = (x === v) ? 'var(--color-primary)' : 'var(--color-bg)';
                        btn.style.color = (x === v) ? 'white' : '#555';
                        btn.style.fontWeight = (x === v) ? '600' : 'normal';
                    });
                    calcChain();
                }

                function calcNb(h) {
                    if (h <= 0.5) return 0;
                    if (h <= 1.2) return 1;
                    if (h <= 2.0) return 2;
                    if (h <= 3.0) return 3;
                    return Math.ceil(h / 1.0);
                }

                function calcPositions(h, n) {
                    if (n === 0) return [];
                    if (n === 1) return [h];
                    if (n === 2) return [parseFloat((h / 2).toFixed(1)), h];
                    var pos = [], step = h / (n - 1);
                    for (var i = 1; i <= n; i++) pos.push(parseFloat((step * i).toFixed(1)));
                    return pos;
                }

                function calcChain() {
                    var L = parseFloat(document.getElementById('calc-longueur').value);
                    var H = parseFloat(document.getElementById('calc-hauteur').value);

                    document.getElementById('calc-longueur-out').textContent = L.toFixed(1).replace('.', ',') + ' m';
                    document.getElementById('calc-hauteur-out').textContent = H.toFixed(1).replace('.', ',') + ' m';

                    var n = calcNb(H);
                    var volM3 = L * (_ep / 100) * (_hc / 100) * n;
                    var volL = Math.round(volM3 * 1000);
                    var kg = Math.round(volM3 * 350);

                    document.getElementById('calc-nb').textContent = n;
                    document.getElementById('calc-vol').textContent = volL;
                    document.getElementById('calc-ciment').textContent = kg;

                    drawWall(H, n);
                    updateDtu(H);
                }

                function drawWall(h, n) {
                    var g = document.getElementById('calc-wall-g');
                    g.innerHTML = '';
                    var ns = 'http://www.w3.org/2000/svg';
                    var W = 420, wallH = 110, x0 = 60, y0 = 15;
                    var scaleY = wallH / h;
                    var positions = calcPositions(h, n);

                    function el(tag, attrs) {
                        var e = document.createElementNS(ns, tag);
                        for (var k in attrs) e.setAttribute(k, attrs[k]);
                        return e;
                    }

                    g.appendChild(el('rect', {x:x0, y:y0, width:W, height:wallH, rx:4, fill:'#f5f0eb', stroke:'#d4c5b2', 'stroke-width':'1'}));

                    var rowH = 14;
                    for (var ry = y0 + wallH - rowH; ry >= y0; ry -= rowH) {
                        for (var rx2 = x0; rx2 < x0 + W; rx2 += 50) {
                            var rw = Math.min(48, x0 + W - rx2);
                            g.appendChild(el('rect', {x:rx2+1, y:ry+1, width:rw-2, height:rowH-2, rx:1, fill:'#ede5d8', stroke:'#c8b89a', 'stroke-width':'0.5'}));
                        }
                    }

                    var chainH = Math.max(6, _hc * scaleY / 100 * 12);
                    positions.forEach(function(pos) {
                        var cy = y0 + wallH - pos * scaleY;
                        g.appendChild(el('rect', {x:x0, y:cy - chainH/2, width:W, height:chainH, rx:1, fill:'rgba(191,148,105,0.45)', stroke:'#bf9469', 'stroke-width':'1.5'}));
                        g.appendChild(el('line', {x1:x0+6, y1:cy, x2:x0+W-6, y2:cy, stroke:'#7a6040', 'stroke-width':'2', 'stroke-dasharray':'6 4'}));
                        var txt = el('text', {x:x0-6, y:cy+1, 'text-anchor':'end', 'dominant-baseline':'middle', fill:'#888', 'font-size':'10', 'font-family':'sans-serif'});
                        txt.textContent = pos.toFixed(1).replace('.', ',') + ' m';
                        g.appendChild(txt);
                    });

                    var leg = el('text', {x:x0+W+8, y:y0+wallH/2, 'dominant-baseline':'middle', fill:'#aaa', 'font-size':'10', 'font-family':'sans-serif'});
                    leg.textContent = h.toFixed(1).replace('.',',') + ' m';
                    g.appendChild(leg);

                    g.appendChild(el('line', {x1:x0+W+4, y1:y0, x2:x0+W+4, y2:y0+wallH, stroke:'#ccc', 'stroke-width':'0.5'}));

                    if (n === 0) {
                        var info = el('text', {x:x0+W/2, y:y0+wallH/2, 'text-anchor':'middle', 'dominant-baseline':'middle', fill:'#aaa', 'font-size':'11', 'font-family':'sans-serif'});
                        info.textContent = 'Aucun chaînage requis';
                        g.appendChild(info);
                    }

                    g.appendChild(el('rect', {x:x0, y:y0+wallH+10, width:12, height:8, rx:1, fill:'rgba(191,148,105,0.45)', stroke:'#bf9469', 'stroke-width':'1.5'}));
                    var legTxt = el('text', {x:x0+16, y:y0+wallH+14, 'dominant-baseline':'middle', fill:'#888', 'font-size':'10', 'font-family':'sans-serif'});
                    legTxt.textContent = 'Chaînage horizontal (béton armé)';
                    g.appendChild(legTxt);
                }

                function updateDtu(h) {
                    var msg;
                    if (h <= 0.5) {
                        msg = '📐 DTU 20.1 : aucun chaînage obligatoire sur une murette ≤ 0,5 m. Un couronnement reste conseillé pour la finition et la durabilité.';
                    } else if (h <= 1.2) {
                        msg = '📐 DTU 20.1 : 1 chaînage de couronnement sur la dernière rangée. Hauteur minimum du chaînage : 15 cm.';
                    } else if (h <= 2.0) {
                        msg = '📐 DTU 20.1 : 2 chaînages. Pour un mur de 2 m : chaînage intermédiaire à ~1 m (5e rang, ferraillage 4×10 / E40/EP4/10) + couronnement en tête.';
                    } else if (h <= 3.0) {
                        msg = '📐 DTU 20.1 : 3 chaînages minimum. Au-delà de 2 m, prévoir aussi des poteaux raidisseurs tous les 3 à 4 m.';
                    } else {
                        msg = '📐 DTU 20.1 : mur > 3 m — 1 chaînage par mètre de hauteur. Faire vérifier le calcul par un professionnel, notamment en zone sismique.';
                    }
                    document.getElementById('calc-dtu-note').textContent = msg;
                }

                document.addEventListener('DOMContentLoaded', function() { calcChain(); });
                if (document.readyState !== 'loading') { calcChain(); }
                </script>

                <!-- ═══════════════ H2 #1 — RÔLE ═══════════════ -->
                <h2 id="role-chainage">À quoi sert le chaînage horizontal dans un mur en parpaing ?</h2>

                <img src="<?php echo BASE_URL; ?>image/chainage horizontal mur parpaing1.webp"
                     alt="chainage horizontal mur parpaing bloc en U béton armé chantier"
                     loading="lazy"
                     style="width:100%; border-radius:8px; margin-bottom:1.5rem;">

                <p>Le chaînage horizontal, c'est une bande de béton armé coulée en continu dans l'épaisseur du mur. Sur le principe d'une ceinture, elle relie toutes les parois entre elles et les empêche de s'écarter. Un mur en parpaing non chaîné, sous l'effet des charges verticales et des variations thermiques, va progressivement travailler. Les blocs bougent de quelques millimètres par an. Sur dix ans, c'est une fissure franche qui s'ouvre.</p>

                <p>Concrètement, le chaînage horizontal remplit quatre fonctions dans la maçonnerie porteuse et de remplissage :</p>

                <ul class="custom-list">
                    <li><strong>Relier horizontalement</strong> les murs et les poteaux entre eux sur tout le périmètre de la construction.</li>
                    <li><strong>S'opposer aux efforts de traction</strong> qui écartent les parois sous les charges verticales et latérales.</li>
                    <li><strong>Répartir les charges</strong> de façon uniforme sur l'ensemble de la structure.</li>
                    <li><strong>Contribuer à la stabilité</strong> globale de l'ouvrage, en zone courante comme en zone sismique.</li>
                </ul>

                <div style="background-color: var(--color-light); border-left: 4px solid var(--color-primary); padding: 1.5rem; margin-bottom: 2rem; border-radius: 0 8px 8px 0;">
                    <strong>En clair :</strong> un mur en parpaing sans chaînage horizontal, c'est une pile de livres sans serre-livres. Ça tient sur une surface plane. Dès qu'il y a une contrainte latérale ou un tassement différentiel, l'ensemble part de travers.
                </div>

                <p>Le chaînage horizontal n'est pas le seul type de chaînage en maçonnerie. Il travaille en binôme avec le chaînage vertical (dans les angles et poteaux raidisseurs) et le chaînage incliné (sous les rampants de toiture). Les trois sont complémentaires — mais c'est le chaînage horizontal qui assure la cohésion en plan de l'ouvrage, à chaque niveau.</p>

                <!-- ═══════════════ H2 #2 — TYPES ═══════════════ -->
                <h2 id="types-chainage">Les différents types de chaînage en maçonnerie</h2>

                <img src="<?php echo BASE_URL; ?>image/chainage horizontal mur parpaing2.webp"
                     alt="types de chaînage maçonnerie parpaing horizontal vertical linteau schéma"
                     loading="lazy"
                     style="width:100%; border-radius:8px; margin-bottom:1.5rem;">

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Type</th>
                                <th>Position</th>
                                <th>Rôle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Chaînage horizontal</strong></td>
                                <td>Chaque niveau de plancher + couronnement</td>
                                <td>Solidarise les murs en plan, empêche l'écartement</td>
                            </tr>
                            <tr>
                                <td><strong>Chaînage vertical</strong></td>
                                <td>Angles, poteaux raidisseurs, tous les 4 m env.</td>
                                <td>Relie les chaînages horizontaux de bas en haut</td>
                            </tr>
                            <tr>
                                <td><strong>Chaînage incliné</strong></td>
                                <td>Sous les rampants de toiture</td>
                                <td>Reprend les poussées obliques de la charpente</td>
                            </tr>
                            <tr>
                                <td><strong>Chaînage fondation</strong></td>
                                <td>En pied de mur / infrastructure</td>
                                <td>Lie les semelles et distribue les charges au sol</td>
                            </tr>
                            <tr>
                                <td><strong>Linteau</strong></td>
                                <td>Au-dessus des ouvertures (portes, fenêtres)</td>
                                <td>Reprend les charges au-dessus du vide</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <p>Le chaînage horizontal et le chaînage vertical fonctionnent en binôme. Le vertical ancre la structure de bas en haut ; l'horizontal la boucle à chaque étage. En béton armé, les armatures des deux types sont reliées entre elles par des équerres et des ligatures pour former une cage continue. Si vous prévoyez des poteaux raidisseurs dans votre mur — obligatoires dès que la hauteur dépasse 2 m sans chaînage — les sorties d'armatures verticales doivent être intégrées avant de couler chaque chaînage horizontal.</p>

                <!-- ═══════════════ H2 #3 — RÉALISATION ═══════════════ -->
                <h2 id="realisation">Comment réaliser un chaînage horizontal sur un mur en parpaing</h2>

                <h3>Choisir son matériau : le bloc en U et ses alternatives</h3>

                <p>Le standard sur chantier, c'est le <strong>bloc en U</strong> (aussi appelé parpaing de chaînage). Ce bloc en forme de gouttière ouverte sur le dessus reçoit les armatures, puis le béton coulé vient les noyer. Dimensions courantes : 500 × 150 × 200 mm ou 500 × 200 × 200 mm selon l'épaisseur du mur.</p>

                <p>L'avantage du bloc en U sur le coffrage bois classique : il est de la même matière que le parpaing. Quand on vient enduire le mur, la continuité de matériau entre le parpaing et le chaînage évite les fissurations à l'interface. Avec un coffrage bois coulé en place, on obtient une zone béton pleine entourée de parpaing creux — deux matériaux aux comportements thermiques différents, et une ligne de fissure presque garantie dans l'enduit au bout de deux ou trois hivers.</p>

                <p>Pour les murs en brique creuse, en béton cellulaire ou en brique de terre cuite, il existe des blocs en U adaptés à chaque matériau — planelles en terre cuite, coffrages perdus, blocs spéciaux. Le principe reste identique : créer un canal continu sur toute la longueur du mur, ferraillé et coulé en béton. Une fois le chaînage posé et le mur monté, la question de la finition se pose rapidement — notre guide sur l'<a href="https://www.cemarenov.fr/enduit-pierre-vue" style="text-decoration: underline;"><strong>enduit pierre vue</strong></a> couvre les techniques adaptées aux maçonneries apparentes.</p>

                <h3>Les étapes de mise en œuvre</h3>

                <img src="<?php echo BASE_URL; ?>image/chainage horizontal mur parpaing3.webp"
                     alt="ferraillage chaînage horizontal bloc en U angle parpaing armatures acier"
                     loading="lazy"
                     style="width:100%; border-radius:8px; margin-bottom:1.5rem;">

                <ol style="padding-left: 1.5rem; line-height: 2;">
                    <li style="margin-bottom: 0.75rem;"><strong>Poser les blocs en U</strong> comme des parpaings classiques, alignés par la face intérieure (pas l'extérieure). Le bloc en U est légèrement plus large que le parpaing standard — la face extérieure peut dépasser de 2 à 3 mm, c'est normal.</li>
                    <li style="margin-bottom: 0.75rem;"><strong>Commencer par les angles.</strong> Découper le fond du U dans l'élément d'angle pour assurer la continuité du béton et le passage des armatures d'une rangée à l'autre. Une demi-planelle vient fermer le coffrage en angle. C'est un détail que beaucoup sautent — et c'est là que les fissurations d'angle démarrent.</li>
                    <li style="margin-bottom: 0.75rem;"><strong>Tendre un cordeau</strong> pour aligner les éléments intermédiaires. Même logique que pour la pose des parpaings courants : les extrémités d'abord, le cordeau ensuite, les éléments du milieu en dernier.</li>
                    <li style="margin-bottom: 0.75rem;"><strong>Arroser les blocs en U</strong> avant de couler. Le bloc est poreux — s'il est sec, il absorbe l'eau du béton et le mélange se dessèche trop vite. La résistance finale chute. Saturer à l'eau propre, laisser égoutter deux minutes, puis couler.</li>
                    <li style="margin-bottom: 0.75rem;"><strong>Mettre en place le ferraillage</strong> : 4 barres HA10 (ferraillage 4×10, nuance E40/EP4/10) posées sur des cales plastique pour assurer l'enrobage. Dans les angles, 2 à 3 équerres par liaison. Si des poteaux raidisseurs sont prévus, ménager les sorties d'armatures verticales avant de couler.</li>
                    <li style="margin-bottom: 0.75rem;"><strong>Couler le béton</strong> dosé à 350 kg de ciment par m³, par couches successives. Vibrer avec une aiguille ou secouer légèrement les armatures pour chasser les bulles d'air qui créent des points faibles.</li>
                    <li style="margin-bottom: 0.75rem;"><strong>Araser</strong> à hauteur du mur avec une taloche ou un bout de règle. La surface doit être plane pour recevoir la prochaine rangée de parpaings ou la finition de couronnement.</li>
                </ol>

                <div style="background-color: #fbe3cb; border-left: 4px solid #e74c3c; padding: 1.5rem; margin-bottom: 2rem; border-radius: 0 8px 8px 0; color: #3e2e1f;">
                    <strong>Attention :</strong> si le chaînage est destiné à recevoir une charpente, intégrer les ancrages (platines, tiges filetées ou formes trapézoïdales) dans le béton frais avant la prise. Une fois le béton durci, sceller un ancrage coûte trois fois plus cher et tient deux fois moins bien.
                </div>

                <blockquote class="article-blockquote">
                    <p>"Sur un chantier de clôture, j'ai récupéré un mur où le client avait tout bien fait — bloc en U, ferraillage, béton dosé correctement. Mais il n'avait pas arrosé les blocs avant de couler. Six mois après, l'enduit présentait des fissurations fines sur tout le rang de chaînage. Les blocs secs avaient pompé l'eau du béton. Depuis, c'est la première chose que je vérifie avant de couler : arroser, attendre deux minutes, puis couler. Pas négociable."</p>
                </blockquote>

                <p>Pour les murs longs dépassant 8 à 10 mètres, prévoir un joint de dilatation avant de monter. Le chaînage horizontal, rigide sur toute la longueur, peut générer des contraintes thermiques qui fissurent le mur si aucune discontinuité n'est prévue. Si le mur présente déjà des remontées d'humidité, traiter le problème avant de couler les chaînages — notre guide sur l'<a href="https://www.cemarenov.fr/assechement-murs-injections" style="text-decoration: underline;"><strong>assèchement des murs par injection</strong></a> détaille les solutions adaptées.</p>

                <!-- ═══════════════ H2 #4 — HAUTEUR + CALCULATEUR ═══════════════ -->
                <h2 id="hauteur-quantite">Combien de chaînages, à quelle hauteur — et combien de béton ?</h2>

                <p>La règle de base selon le <strong>NF DTU 20.1</strong> (juillet 2020, norme de référence pour la maçonnerie de petits éléments) : un chaînage horizontal à chaque niveau de plancher, plus un chaînage de couronnement en tête de mur. Hauteur minimum du chaînage : 15 cm. Le chaînage bas (pied de mur) n'est pas obligatoire — c'est la fondation qui joue ce rôle.</p>

                <div class="table-wrapper">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Hauteur du mur</th>
                                <th>Nombre de chaînages</th>
                                <th>Position</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>≤ 0,5 m</td>
                                <td>0 (couronnement conseillé)</td>
                                <td>En tête</td>
                            </tr>
                            <tr>
                                <td>0,5 à 1,2 m</td>
                                <td><strong>1</strong></td>
                                <td>Couronnement (dernière rangée)</td>
                            </tr>
                            <tr>
                                <td>1,2 à 2 m</td>
                                <td><strong>2</strong></td>
                                <td>Intermédiaire (~1 m / 5e rang) + couronnement</td>
                            </tr>
                            <tr>
                                <td>2 à 3 m</td>
                                <td><strong>3</strong></td>
                                <td>Bas de mur, mi-hauteur, couronnement</td>
                            </tr>
                            <tr>
                                <td>Construction à étage</td>
                                <td><strong>1 par niveau</strong></td>
                                <td>~2,50 m + ~5,20 m selon hauteurs d'étage</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- VIDÉO YOUTUBE -->
                <div style="margin: 2rem 0; border-radius: 8px; overflow: hidden; aspect-ratio: 16/9;">
                    <iframe
                        src="https://www.youtube.com/embed/uFJTKztO9mw"
                        title="Mise en œuvre du chaînage horizontal — démonstration de chantier"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                        loading="lazy"
                        style="width:100%; height:100%; display:block;">
                    </iframe>
                </div>

                <p>En zones sismiques 3, 4 et 5 (Antilles, certaines zones alpines et pyrénéennes), les chaînages doivent être renforcés : armatures plus nombreuses, ancrages aux poteaux raidisseurs obligatoires, liaison mécanique entre les chaînages horizontaux et verticaux. Vérifier sa zone sur le géoportail BRGM avant de démarrer.</p>

                <!-- ═══════════════ H2 #5 — FAQ ═══════════════ -->
                <h2 id="faq">FAQ — Questions fréquentes</h2>

                <h3>Quelle est la différence entre un chaînage horizontal et un chaînage vertical ?</h3>
                <p>Le chaînage horizontal court à l'horizontale dans l'épaisseur du mur, à chaque niveau de plancher et en couronnement. Il relie les parois en plan et empêche leur écartement. Le chaînage vertical, lui, court de bas en haut dans les angles et poteaux raidisseurs — il relie les chaînages horizontaux de chaque niveau entre eux. Le vertical ancre, l'horizontal boucle. Les armatures des deux sont reliées entre elles par des équerres pour former une cage continue.</p>

                <h3>Combien de chaînages horizontaux pour un mur de clôture de 2 m ?</h3>
                <p>Deux. Un chaînage intermédiaire à environ 1 m de hauteur (5e rang de parpaing), ferraillé avec 4 barres HA10, et un chaînage de couronnement sur la dernière rangée. Pour une clôture inférieure à 1,2 m, le seul couronnement suffit en règle générale.</p>

                <h3>Le chaînage horizontal est-il obligatoire en pied de mur ?</h3>
                <p>Non. Selon le NF DTU 20.1 et les praticiens expérimentés, le chaînage bas n'est pas obligatoire en pied de mur — c'est la fondation qui joue ce rôle. Le chaînage se positionne en tête de mur et à chaque niveau de plancher. Sur terrain instable ou en zone argileuse, certains maçons l'ajoutent par précaution, mais ce n'est pas une obligation réglementaire pour un mur courant.</p>

                <h3>Je rehausse un mur existant : dois-je refaire un chaînage horizontal ?</h3>
                <p>Oui. Le couronnement existant ne vaut plus comme couronnement dès lors que vous montez de nouveaux rangs par-dessus. Il faut un nouveau chaînage en tête de la hauteur totale finale. Si vous rehaussez de plus d'un mètre, prévoir aussi un chaînage intermédiaire dans la nouvelle partie. Notre guide sur <a href="https://www.cemarenov.fr/rehausser-un-mur-en-parpaing-existant" style="text-decoration: underline;"><strong>rehausser un mur en parpaing existant</strong></a> couvre l'ensemble du processus, de la liaison avec l'ancien chaînage aux finitions.</p>

                <h3>Peut-on faire un chaînage horizontal sans bloc en U ?</h3>
                <p>Oui. Le coffrage bois traditionnel (deux joues maintenues par des pointes et des cales, coulage avec les armatures en place) donne un résultat structurel équivalent. L'inconvénient : la zone coulée est en béton plein, les parpaings adjacents sont creux — deux comportements thermiques différents, et une ligne de fissure probable dans l'enduit à l'interface. Le bloc en U, de même matière que le parpaing, évite ce problème.</p>

            </div><!-- /.article-content -->

            <!-- AUTHOR BOX -->
            <div class="author-box-bottom">
                <div class="author-box-img">
                    <img src="<?php echo BASE_URL; ?>image/phil.png" alt="Philippe">
                </div>
                <div class="author-box-content">
                    <h3>Philippe</h3>
                    <span class="author-role">Expert Rénovation &amp; Artisan RGE</span>
                    <p>Avec plus de 20 ans d'expérience sur les chantiers, Philippe vous partage ses conseils concrets et sans langue de bois.</p>
                    <a href="<?php echo BASE_URL; ?>philippe" class="btn-outline">Voir son profil complet</a>
                </div>
            </div>

            <!-- CONCLUSION CTA -->
            <div class="conclusion-box">
                <h3>Un projet de mur ou de clôture en parpaing ?</h3>
                <p>Un chaînage bien posé, c'est dix ans de tranquillité. Mal fait ou oublié, c'est une fissure qui s'ouvre au premier hiver. Si vous avez un doute sur le nombre de chaînages nécessaires ou sur les règles en zone sismique, on peut regarder ça ensemble.</p>
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

        </div>

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

    </div>
</article>

<?php
require_once dirname(__DIR__) . '/schema-data.php';

$faq_schema = [
    [
        'question' => "Quelle est la différence entre un chaînage horizontal et un chaînage vertical ?",
        'answer'   => "Le chaînage horizontal court à l'horizontale dans l'épaisseur du mur à chaque niveau de plancher — il relie les parois en plan et empêche leur écartement. Le chaînage vertical court de bas en haut dans les angles et poteaux raidisseurs — il relie les chaînages horizontaux de chaque niveau entre eux. Les armatures des deux sont reliées par des équerres pour former une cage continue."
    ],
    [
        'question' => "Combien de chaînages horizontaux pour un mur de clôture de 2 m ?",
        'answer'   => "Deux chaînages : un intermédiaire à environ 1 m de hauteur (5e rang de parpaing, ferraillage 4 barres HA10) et un couronnement sur la dernière rangée. Pour une clôture inférieure à 1,2 m, le seul couronnement suffit."
    ],
    [
        'question' => "Le chaînage horizontal est-il obligatoire en pied de mur ?",
        'answer'   => "Non. Selon le NF DTU 20.1, le chaînage bas n'est pas obligatoire en pied de mur — la fondation joue ce rôle. Le chaînage se positionne en tête de mur et à chaque niveau de plancher."
    ],
    [
        'question' => "Je rehausse un mur existant : dois-je refaire un chaînage horizontal ?",
        'answer'   => "Oui. Le couronnement existant ne compte plus dès lors que vous montez de nouveaux rangs par-dessus. Il faut un nouveau chaînage en tête de la hauteur totale finale, et un intermédiaire si vous rehaussez de plus d'un mètre."
    ],
    [
        'question' => "Peut-on faire un chaînage horizontal sans bloc en U ?",
        'answer'   => "Oui, avec un coffrage bois traditionnel. Mais le bloc en U est préférable : de même matière que le parpaing, il évite les fissurations d'enduit à l'interface entre le chaînage béton plein et les parpaings creux adjacents."
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
