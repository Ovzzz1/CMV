<?php
// published: 2026-04-03 10:00
 * tarif-voiture-pilote-convoi-exceptionnel.php
 */


$page_title       = "Tarif voiture pilote convoi exceptionnel : prix 2026 et estimation rapide";
$page_description = "Quel est le prix d'une voiture pilote pour convoi exceptionnel en 2026 ? Tarifs au km, escorte moto, frais APRR, calculateur en ligne et exemples de budgets.";


$article = [
    'title'          => "Tarif voiture pilote convoi exceptionnel : prix 2026, facteurs de coût et estimation rapide",
    'subtitle'       => "Le seul tarif public affiché est 1,40 €/km — mais ce chiffre seul ne suffit pas à bâtir un budget réel. Nuit, autoroute, convoi hors-gabarit : voici tous les facteurs qui font varier la facture, avec un calculateur interactif.",
    'category'       => 'permis',
    'category_name'  => 'Permis',
    'category_color' => '#0891b2',
    'tags'           => ['Convoi Exceptionnel', 'Voiture Pilote', 'Tarif Transport', 'APRR'],
    'image'          => '/Image/tarif-voiture-pilote-convoi-exceptionnel.webp',
    'date'          => '3 Avril 2026',
    'author'         => 'Arnaud',
    'author_role'    => 'Rédacteur & Essayeur passionné',
    'author_img'     => '/Image/arnaud.png',
    'author_bio'     => "Tombé dans le cambouis quand il était petit grâce à son père David, Arnaud a transformé sa passion en expertise. Il teste sans concession les derniers modèles et décortique le marché de l'automobile avec honnêteté.",
    'reading_time'   => '7 min',
];


$categories = [
    'assurance'  => ['name' => 'Assurance & Financement', 'color' => '#2563eb', 'slug' => 'assurance'],
    'entretien'  => ['name' => 'Entretien & Réparation',  'color' => '#dc2626', 'slug' => 'entretien'],
    'electrique' => ['name' => 'Électrique & Hybride',    'color' => '#059669', 'slug' => 'electrique'],
    'occasion'   => ['name' => 'Achat & Occasion',        'color' => '#7c3aed', 'slug' => 'occasion'],
    'moto'       => ['name' => 'Moto & 2 Roues',          'color' => '#ea580c', 'slug' => 'moto'],
    'permis'     => ['name' => 'Permis',                  'color' => '#0891b2', 'slug' => 'permis'],
];


// ─── Scan dynamique du Blog/ pour le linking interne ───
$current_slug       = pathinfo(__FILE__, PATHINFO_FILENAME);
$same_cat_articles  = [];
$all_other_articles = [];
$blog_dir           = __DIR__;


if (is_dir($blog_dir)) {
    $files = glob($blog_dir . '/*.php');
    foreach ($files as $file) {
        $file_slug = pathinfo($file, PATHINFO_FILENAME);
        if ($file_slug === $current_slug) continue;


        $other_article = null;
        $content       = file_get_contents($file);


        if (preg_match('/\$article\s*=\s*\[(.+?)\];/s', $content, $matches)) {
            try {
                eval('$other_article = [' . $matches[1] . '];');
            } catch (Throwable $e) {
                continue;
            }
        }


        if ($other_article && isset($other_article['title'])) {
            $other_article['slug']  = $file_slug;
            $other_article['url']   = '/Blog/' . $file_slug;
            $other_article['image'] = '/' . ltrim($other_article['image'] ?? '', '/');


            if (($other_article['category'] ?? '') === $article['category']) {
                $same_cat_articles[] = $other_article;
            }
            $all_other_articles[] = $other_article;
        }
    }
}


include __DIR__ . '/../header.php';
?>


<!-- ARTICLE HERO -->
<article>
    <section class="art-hero">
        <img src="<?php echo $article['image']; ?>"
             alt="Voiture pilote accompagnant un convoi exceptionnel sur route nationale"
             class="art-hero-bg"
             width="1200" height="675" decoding="async">
        <div class="art-hero-overlay"></div>


        <div class="art-hero-container">
            <div class="art-hero-content">
                <nav class="art-breadcrumb">
                    <a href="/">Accueil</a>
                    <span class="art-bc-sep">/</span>
                    <a href="/<?php echo $article['category']; ?>"><?php echo $article['category_name']; ?></a>
                    <span class="art-bc-sep">/</span>
                    <span>Tarifs & Prix</span>
                </nav>


                <div class="art-hero-tags">
                    <?php foreach ($article['tags'] as $tag): ?>
                        <span class="art-tag"><?php echo $tag; ?></span>
                    <?php endforeach; ?>
                </div>


                <h1><?php echo $article['title']; ?></h1>
                <p class="art-hero-sub"><?php echo $article['subtitle']; ?></p>


                <div class="art-hero-meta">
                    <div class="art-author-pill">
                        <img src="<?php echo $article['author_img']; ?>"
                             alt="<?php echo $article['author']; ?>"
                             width="40" height="40">
                        <div>
                            <strong>Par <?php echo $article['author']; ?></strong>
                            <span><?php echo $article['author_role']; ?></span>
                        </div>
                    </div>
                    <div class="art-meta-infos">
                        <span><?php echo $article['date']; ?></span>
                        <span>&bull;</span>
                        <span>Lecture <?php echo $article['reading_time']; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- HORIZONTAL CATEGORY NAV -->
    <nav class="art-cat-nav">
        <div class="art-cat-nav-inner">
            <?php foreach ($categories as $slug_cat => $cat): ?>
                <a href="/<?php echo $slug_cat; ?>"
                    class="art-cat-link <?php echo $slug_cat === $article['category'] ? 'active' : ''; ?>"
                    style="--link-color: <?php echo $cat['color']; ?>">
                    <span class="art-cat-dot" style="background-color: <?php echo $cat['color']; ?>"></span>
                    <?php echo $cat['name']; ?>
                </a>
            <?php endforeach; ?>
        </div>
    </nav>


    <!-- ASYMMETRIC LAYOUT (70 / 30) -->
    <div class="art-layout-wrapper">


        <!-- MAIN CONTENT -->
        <div class="art-main-col">


            <!-- TL;DR Dashboard Box -->
            <div class="art-tldr">
                <div class="art-tldr-title">L'essentiel (TL;DR)</div>
                <ul>
                    <li><strong>Prix repère :</strong> une voiture pilote privée coûte généralement <strong>1,40 €/km</strong>, avec un minimum de facturation autour de 150–200 €.</li>
                    <li><strong>Escorte moto :</strong> compter environ <strong>700–900 €/jour</strong> selon les prestataires.</li>
                    <li><strong>Ce qui fait vraiment monter la facture :</strong> mission de nuit (+50 %), convoi hors-gabarit, autoroute à traverser (frais de dossier + de passage), reconnaissance d'itinéraire.</li>
                    <li><strong>Frais autoroutiers :</strong> à part entière — frais de dossier fixe (~180 €) + frais de passage selon distance et catégorie du convoi (110 € à 3 400 € selon les paliers APRR).</li>
                    <li><strong>Pour un devis précis :</strong> distance, type de convoi (largeur, masse, longueur), itinéraire, créneau horaire et nombre de véhicules d'accompagnement sont les 5 infos indispensables.</li>
                </ul>
            </div>


            <!-- Table of Contents -->
            <div class="art-toc">
                <div class="art-toc-title">Dans ce dossier</div>
                <ol>
                    <li><a href="#prix-moyen">Quel est le prix d'une voiture pilote en 2026 ?</a></li>
                    <li><a href="#facteurs">Quels facteurs font varier le tarif ?</a></li>
                    <li><a href="#tableaux">Tableaux des prix indicatifs</a></li>
                    <li><a href="#calculateur">Estimer le prix : le calculateur</a></li>
                    <li><a href="#exemples">Exemples de budgets selon le type de mission</a></li>
                    <li><a href="#inclus">Ce que comprend la prestation</a></li>
                    <li><a href="#formation">Tarif prestation vs tarif formation : ne pas confondre</a></li>
                    <li><a href="#faq">Questions fréquentes</a></li>
                </ol>
            </div>


            <!-- Article Content -->
            <div class="art-content">


                <!-- ══════════════════════════════════ -->
                <h2 id="prix-moyen">Quel est le prix d'une voiture pilote en 2026 ?</h2>


                <p>Le prix d'une voiture pilote pour convoi exceptionnel est presque toujours calculé <strong>au kilomètre</strong>, parfois complété d'une majoration à la journée pour les longues missions. Le seul tarif public clairement affiché côté prestataires en 2026 est <strong>1,40 €/km pour la voiture pilote</strong> et <strong>environ 800 €/jour pour l'escorte moto</strong>.</p>


                <p>Ce chiffre au kilomètre ne couvre que la prestation de conduite elle-même. Il faut y ajouter les éventuels frais de déplacement du pilote, les frais autoroutiers si le convoi traverse un réseau à péages, et les majorations liées aux contraintes du convoi. Un budget réaliste pour une mission courante de 150 km en semaine de jour, voiture seule, tourne donc entre <strong>250 et 350 €</strong> tout compris.</p>


                <div class="art-info" style="background: #fffbeb; border: 1px solid #fcd34d; border-radius: 8px; padding: 14px 18px; margin: 20px 0; font-size: 14px; color: #78350f;">
                    <strong>⚠️ Données partielles sur la SERP</strong>
                    La plupart des prestataires de voiture pilote ne publient pas leurs tarifs en ligne. Les chiffres ci-dessous sont issus des données publiquement disponibles (Guidage Express, captures APRR 2023) et sont des <em>ordres de grandeur indicatifs</em>. Seul un devis sur dossier permet d'obtenir un prix ferme.
                </div>


                <!-- ══════════════════════════════════ -->
                <h2 id="facteurs">Quels facteurs font varier le tarif d'un convoi exceptionnel ?</h2>


                <p>Le tarif d'une voiture pilote peut doubler ou tripler selon la nature du convoi. Voici les variables qui pèsent le plus dans la facture finale :</p>


                <ul>
                    <li><strong>La distance :</strong> facteur N°1, directement proportionnel au prix (1,40 €/km en référence). Plus le trajet est long, plus la base augmente — mais le taux au km peut baisser sur les très longues missions.</li>
                    <li><strong>Le créneau horaire :</strong> une mission de nuit (21h–6h) ou un dimanche/jour férié entraîne une majoration d'environ +50 % sur la main-d'œuvre.</li>
                    <li><strong>La catégorie du convoi :</strong> un convoi standard ne nécessite qu'une voiture pilote. Un convoi de 2ème ou 3ème catégorie (largeur > 3 m, masse > 72 t, longueur > 25 m) requiert plus de moyens et des études spécifiques.</li>
                    <li><strong>Le nombre de véhicules d'accompagnement :</strong> voiture pilote seule, voiture + moto, ou plusieurs véhicules — chaque unité supplémentaire est facturée séparément.</li>
                    <li><strong>Le passage sur autoroute :</strong> les sociétés autoroutières (type APRR) facturent des frais de dossier fixes (~180 €) + des frais de passage qui varient selon la distance et le nombre de passages.</li>
                    <li><strong>La reconnaissance d'itinéraire :</strong> si la route doit être vérifiée au préalable (gabarit, obstacles, virages), c'est une prestation supplémentaire (200–400 €).</li>
                    <li><strong>L'urgence :</strong> un dossier en urgence (convoi immobilisé faute d'autorisation) peut doubler les frais administratifs.</li>
                    <li><strong>Les matières sensibles ou dangereuses :</strong> transports nucléaires, matières dangereuses — exigent des pilotes habilités spécifiquement, ce qui justifie un surcoût.</li>
                </ul>


                <!-- ══════════════════════════════════ -->
                <h2 id="tableaux">Tableaux des prix indicatifs</h2>


                <h3>Tarifs de prestation privée (marché visible 2026)</h3>


                <div class="art-table-wrap">
                    <table class="art-table">
                        <thead>
                            <tr>
                                <th>Type de prestation</th>
                                <th>Mode de facturation</th>
                                <th>Prix indicatif</th>
                                <th>Niveau de coût</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Voiture pilote seule</strong></td>
                                <td>Au kilomètre</td>
                                <td><strong>~1,40 €/km</strong> (min. ~150–200 €)</td>
                                <td><span style="background:#d1fae5;color:#065f46;border-radius:4px;padding:2px 8px;font-size:12px;font-weight:600;">BAS</span></td>
                            </tr>
                            <tr>
                                <td><strong>Escorte moto</strong></td>
                                <td>À la journée</td>
                                <td><strong>~700–900 €/jour</strong></td>
                                <td><span style="background:#fef3c7;color:#92400e;border-radius:4px;padding:2px 8px;font-size:12px;font-weight:600;">MOYEN</span></td>
                            </tr>
                            <tr>
                                <td><strong>Voiture pilote + moto</strong></td>
                                <td>Km + jour</td>
                                <td>~1,40 €/km + 700–900 €/moto</td>
                                <td><span style="background:#fef3c7;color:#92400e;border-radius:4px;padding:2px 8px;font-size:12px;font-weight:600;">MOYEN</span></td>
                            </tr>
                            <tr>
                                <td><strong>Mission nuit / dimanche / férié</strong></td>
                                <td>Base + majoration</td>
                                <td>+50 % sur la main-d'œuvre</td>
                                <td><span style="background:#fee2e2;color:#991b1b;border-radius:4px;padding:2px 8px;font-size:12px;font-weight:600;">MAJORÉ</span></td>
                            </tr>
                            <tr>
                                <td><strong>Reconnaissance d'itinéraire</strong></td>
                                <td>Forfait</td>
                                <td>~200–400 €</td>
                                <td><span style="background:#fef3c7;color:#92400e;border-radius:4px;padding:2px 8px;font-size:12px;font-weight:600;">OPTION</span></td>
                            </tr>
                            <tr>
                                <td><strong>Traitement en urgence</strong></td>
                                <td>Supplément dossier</td>
                                <td>+180 € (frais de dossier doublés)</td>
                                <td><span style="background:#fee2e2;color:#991b1b;border-radius:4px;padding:2px 8px;font-size:12px;font-weight:600;">OPTION</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>


                <h3>Barème autoroutier APRR — moyens humains et matériels (source : captures 01/01/2023)</h3>


                <div class="art-info" style="background: #fffbeb; border: 1px solid #fcd34d; border-radius: 8px; padding: 14px 18px; margin: 20px 0; font-size: 14px; color: #78350f;">
                    <strong>Note :</strong> Ces tarifs sont issus des captures APRR disponibles au 01/01/2023. Ils sont indicatifs et doivent être revalidés auprès d'APRR avant toute publication ou devis 2026.
                </div>


                <div class="art-table-wrap">
                    <table class="art-table">
                        <thead>
                            <tr>
                                <th>Poste</th>
                                <th>Coût horaire journée</th>
                                <th>Coût horaire majoré (nuit, dim., jours fériés)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Ouvrier autoroutier</strong></td>
                                <td>40,96 €/h</td>
                                <td>61,46 €/h</td>
                            </tr>
                            <tr>
                                <td><strong>Encadrement / agent de maîtrise</strong></td>
                                <td>54,74 €/h</td>
                                <td>82,09 €/h</td>
                            </tr>
                            <tr>
                                <td><strong>Fourgon d'intervention équipé</strong></td>
                                <td>45,88 €/h</td>
                                <td>—</td>
                            </tr>
                            <tr>
                                <td><strong>Camion</strong></td>
                                <td>117,37 €/h</td>
                                <td>—</td>
                            </tr>
                            <tr>
                                <td><strong>Remorque Flèche Lumineuse de Rabattement</strong></td>
                                <td>38,24 €/h</td>
                                <td>—</td>
                            </tr>
                        </tbody>
                    </table>
                </div>


                <h3>Frais de passage convois en section courante — autoroute (source : captures APRR 2023)</h3>


                <div class="art-table-wrap">
                    <table class="art-table">
                        <thead>
                            <tr>
                                <th>Distance sur autoroute</th>
                                <th>1 passage</th>
                                <th>2 à 10 passages</th>
                                <th>Plus de 10 passages</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>50 km max</strong></td>
                                <td>110 €</td>
                                <td>420 €</td>
                                <td>840 €</td>
                            </tr>
                            <tr>
                                <td><strong>100 km max</strong></td>
                                <td>220 €</td>
                                <td>850 €</td>
                                <td>1 700 €</td>
                            </tr>
                            <tr>
                                <td><strong>200 km max</strong></td>
                                <td>440 €</td>
                                <td>1 700 €</td>
                                <td>3 400 €</td>
                            </tr>
                            <tr>
                                <td><strong>Plus de 200 km</strong></td>
                                <td>620 €</td>
                                <td>2 600 €</td>
                                <td>5 200 €</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p style="font-size:13px; color:#666;">+ Frais de dossier : 180 € (360 € si urgence) + Coordination et administration : 30 €/district traversé. Source : APRR, tarifs au 01/01/2023 — à revalider en 2026.</p>


                <!-- ══════════════════════════════════ -->
                <h2 id="calculateur">Estimer le prix : le calculateur</h2>


                <p>Ce calculateur donne une fourchette indicative basée sur les tarifs de marché disponibles. Il ne remplace pas un devis sur dossier, mais permet d'anticiper un budget avant de contacter un prestataire.</p>


                <!-- CALCULATEUR -->
                <div class="calc-wrap">
                    <h3 style="margin-top:0; color:inherit;">Calculateur de tarif voiture pilote</h3>
                    <p class="calc-subtitle">Renseignez les caractéristiques de votre mission pour obtenir une estimation basse / médiane / haute.</p>


                    <div class="calc-grid">


                        <div class="calc-field">
                            <label class="calc-label" for="distance">Distance totale</label>
                            <p class="calc-sublabel">Trajet complet aller (km)</p>
                            <input type="number" id="distance" class="calc-input-km" placeholder="ex : 150" min="1" max="2000">
                        </div>


                        <div class="calc-field">
                            <span class="calc-label">Type d'escorte</span>
                            <div class="calc-radio-group">
                                <label><input type="radio" name="type_escorte" value="voiture" checked><span>Voiture seule</span></label>
                                <label><input type="radio" name="type_escorte" value="voiture_moto"><span>Voiture + moto</span></label>
                                <label><input type="radio" name="type_escorte" value="multiple"><span>Plusieurs véhicules</span></label>
                            </div>
                        </div>


                        <div class="calc-field">
                            <span class="calc-label">Créneau de mission</span>
                            <div class="calc-radio-group">
                                <label><input type="radio" name="creneau" value="jour" checked><span>Jour ouvré</span></label>
                                <label><input type="radio" name="creneau" value="nuit"><span>Nuit (21h–6h)</span></label>
                                <label><input type="radio" name="creneau" value="dimanche_ferie"><span>Dimanche / Férié</span></label>
                            </div>
                        </div>


                        <div class="calc-field">
                            <span class="calc-label">Catégorie du convoi</span>
                            <div class="calc-radio-group">
                                <label><input type="radio" name="convoi" value="standard" checked><span>Standard</span></label>
                                <label><input type="radio" name="convoi" value="large"><span>Largeur &gt; 3 m</span></label>
                                <label><input type="radio" name="convoi" value="tres_technique"><span>Très technique (≥ 4 m / 25 m)</span></label>
                            </div>
                        </div>


                        <div class="calc-field full-width">
                            <span class="calc-label">Options &amp; contraintes</span>
                            <div class="calc-checkbox-group">
                                <label><input type="checkbox" id="autoroute"> <span><strong>Passage sur autoroute</strong> — ajoute frais de dossier APRR (~180 €) + frais de passage selon distance</span></label>
                                <label><input type="checkbox" id="reconnaissance"> <span><strong>Reconnaissance d'itinéraire</strong> — vérification préalable du tracé (~300 € forfait)</span></label>
                                <label><input type="checkbox" id="urgence"> <span><strong>Traitement en urgence</strong> — dossier prioritaire, frais doublés (+180 €)</span></label>
                                <label><input type="checkbox" id="admin"> <span><strong>Accompagnement administratif</strong> — suivi des autorisations, coordination (+120 €)</span></label>
                            </div>
                        </div>


                    </div>


                    <button class="calc-btn" onclick="calculer()">Calculer mon estimation →</button>


                    <div class="calc-result" id="calculator-result">
                        <div class="calc-result-title">Estimation indicative</div>
                        <div class="calc-estimates">
                            <div class="calc-estimate low">
                                <div class="calc-estimate-label">Basse</div>
                                <div class="calc-estimate-price" id="result-low">—</div>
                                <div class="calc-estimate-note">Conditions favorables</div>
                            </div>
                            <div class="calc-estimate mid">
                                <div class="calc-estimate-label">Médiane</div>
                                <div class="calc-estimate-price" id="result-mid">—</div>
                                <div class="calc-estimate-note">Estimation centrale</div>
                            </div>
                            <div class="calc-estimate high">
                                <div class="calc-estimate-label">Haute</div>
                                <div class="calc-estimate-price" id="result-high">—</div>
                                <div class="calc-estimate-note">Avec imprévus</div>
                            </div>
                        </div>


                        <div class="calc-detail-block">
                            <div class="calc-detail-title">Décomposition estimée</div>
                            <ul id="result-detail"></ul>
                        </div>


                        <div class="calc-detail-block">
                            <div class="calc-detail-title">Facteurs de majoration actifs</div>
                            <ul id="result-facteurs"></ul>
                        </div>


                        <p class="calc-disclaimer">⚠️ <strong>Estimation indicative uniquement.</strong> Les tarifs réels dépendent du prestataire, des autorisations préfectorales, de la configuration exacte du convoi et des conditions d'intervention. Seul un devis sur dossier complet permet d'obtenir un prix ferme et engageant.</p>
                    </div>


                </div><!-- .calc-wrap -->


                <!-- ══════════════════════════════════ -->
                <h2 id="exemples">Exemples de budgets selon le type de mission</h2>


                <div class="art-table-wrap">
                    <table class="art-table">
                        <thead>
                            <tr>
                                <th>Scénario</th>
                                <th>Caractéristiques</th>
                                <th>Budget estimé</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Mission courte, voiture seule</strong></td>
                                <td>100 km, jour ouvré, convoi standard, sans autoroute</td>
                                <td><strong>150–200 €</strong></td>
                            </tr>
                            <tr>
                                <td><strong>Mission moyenne, voiture seule</strong></td>
                                <td>300 km, jour ouvré, convoi standard, sans autoroute</td>
                                <td><strong>400–500 €</strong></td>
                            </tr>
                            <tr>
                                <td><strong>Mission avec passage autoroute</strong></td>
                                <td>200 km dont 100 km APRR, 1 passage, convoi 2ème catégorie</td>
                                <td><strong>700–900 €</strong></td>
                            </tr>
                            <tr>
                                <td><strong>Mission nuit + moto</strong></td>
                                <td>200 km, nuit, voiture + 1 moto, convoi standard</td>
                                <td><strong>1 200–1 600 €</strong></td>
                            </tr>
                            <tr>
                                <td><strong>Convoi très technique, longue distance</strong></td>
                                <td>400 km, largeur > 4 m, autoroute, reconnaissance + urgence</td>
                                <td><strong>2 500–4 000 €</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>


                <!-- ══════════════════════════════════ -->
                <h2 id="inclus">Ce que comprend la prestation d'une voiture pilote</h2>


                <p>Le prix au kilomètre ou à la journée couvre généralement l'ensemble de la mission de terrain. Voici ce qui est typiquement inclus :</p>


                <ul>
                    <li><strong>Accompagnement physique du convoi</strong> — positionnement avant ou arrière du convoi selon les besoins.</li>
                    <li><strong>Signalisation et sécurisation</strong> — gyrophares, panneaux, balisage aux intersections critiques.</li>
                    <li><strong>Coordination avec les forces de l'ordre</strong> si escorte de gendarmerie prévue dans l'arrêté.</li>
                    <li><strong>Gestion des obstacles en temps réel</strong> — feux de circulation, ouvrages d'art, virages serrés.</li>
                    <li><strong>Retour du pilote</strong> à son point de départ — le coût du trajet retour est intégré dans la plupart des devis.</li>
                </ul>


                <p>Ce qui n'est <strong>pas inclus</strong> par défaut : les frais d'autorisation préfectorale, les frais autoroutiers (facturés séparément par la société d'autoroute), la reconnaissance d'itinéraire, les nuitées en cas de mission longue durée.</p>


                <!-- ══════════════════════════════════ -->
                <h2 id="formation">Tarif prestation vs tarif formation : ne pas confondre</h2>


                <p>La recherche "tarif voiture pilote convoi exceptionnel" renvoie souvent vers des pages sur la <strong>formation FIP/FCP</strong> (Formation Initiale et Complémentaire des conducteurs de véhicules de Protection). Ce sont deux choses très différentes :</p>


                <div class="art-table-wrap">
                    <table class="art-table">
                        <thead>
                            <tr>
                                <th>Sujet</th>
                                <th>À qui s'adresse</th>
                                <th>Prix indicatif</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Tarif de prestation</strong> (cette page)</td>
                                <td>Donneurs d'ordre qui commandent une escorte</td>
                                <td>1,40 €/km + options</td>
                            </tr>
                            <tr>
                                <td><strong>Tarif de la formation FIP</strong></td>
                                <td>Futurs conducteurs de véhicules de protection qui veulent exercer ce métier</td>
                                <td>Variable selon organisme, finançable CPF</td>
                            </tr>
                        </tbody>
                    </table>
                </div>


                <!-- ══════════════════════════════════ -->
                <h2 id="faq">Questions fréquentes</h2>


                <div class="faq-item">
                    <button class="faq-question" onclick="toggleFaq(this)" aria-expanded="false">
                        Qui paie la voiture pilote lors d'un convoi exceptionnel ?
                    </button>
                    <div class="faq-answer">
                        C'est systématiquement le <strong>transporteur ou le donneur d'ordre</strong> (chargeur, entreprise de travaux, industriel) qui prend en charge l'ensemble des frais d'escorte. Ces coûts font partie de l'organisation du transport exceptionnel au même titre que les autorisations préfectorales.
                    </div>
                </div>


                <div class="faq-item">
                    <button class="faq-question" onclick="toggleFaq(this)" aria-expanded="false">
                        Quelle est la différence entre une voiture pilote et une escorte de gendarmerie ?
                    </button>
                    <div class="faq-answer">
                        La voiture pilote est un <strong>prestataire privé</strong> qui accompagne le convoi et assure la sécurisation du trajet. L'escorte de gendarmerie ou police est une obligation réglementaire pour certaines catégories de convois très lourds ou très larges : elle est organisée par les forces de l'ordre et ne remplace pas la voiture pilote, elle s'y ajoute.
                    </div>
                </div>


                <div class="faq-item">
                    <button class="faq-question" onclick="toggleFaq(this)" aria-expanded="false">
                        Peut-on circuler sans voiture pilote pour un convoi exceptionnel ?
                    </button>
                    <div class="faq-answer">
                        Non, dès que le convoi dépasse les dimensions réglementaires standard, l'arrêté de circulation impose le nombre et le type de véhicules d'accompagnement. Circuler sans voiture pilote quand elle est obligatoire expose le transporteur à des sanctions et à une immobilisation du convoi.
                    </div>
                </div>


                <div class="faq-item">
                    <button class="faq-question" onclick="toggleFaq(this)" aria-expanded="false">
                        Est-ce que le tarif au km change sur longue distance ?
                    </button>
                    <div class="faq-answer">
                        Oui, certains prestataires appliquent des tarifs dégressifs au-delà d'un certain kilométrage (par exemple au-delà de 300 ou 500 km), ou proposent des forfaits journaliers qui peuvent être plus avantageux sur les très longues missions. Il faut toujours demander un devis adapté à votre configuration.
                    </div>
                </div>


                <!-- ══════════════════════════════════ -->
                <h2>Prestataires de référence</h2>


                <p>Ces acteurs figurent dans les résultats de recherche Google pour cette requête. Leurs tarifs ou formulaires de contact sont accessibles directement sur leurs sites :</p>


                <div class="acteurs-grid">
                    <div class="acteur-card">
                        <a href="https://www.guidageexpress.com/" target="_blank" rel="nofollow noopener noreferrer">Guidage Express →</a>
                        <p>Tarifs au km et à la journée affichés publiquement. Voiture et moto.</p>
                    </div>
                    <div class="acteur-card">
                        <a href="https://voyage.aprr.fr/aide-contact/mon-voyage-sur-autoroute/convois-exceptionnels/quels-sont-les-tarifs-des-convois" target="_blank" rel="nofollow noopener noreferrer">APRR — Tarifs convois →</a>
                        <p>Barème officiel des frais de passage et de dossier sur le réseau autoroutier APRR.</p>
                    </div>
                    <div class="acteur-card">
                        <a href="https://www.europilotcar.com/devis-voiture-pilote/" target="_blank" rel="nofollow noopener noreferrer">Euro Pilot Car →</a>
                        <p>Formulaire de devis en ligne. Acteur spécialisé en accompagnement convoi.</p>
                    </div>
                </div>


            </div><!-- .art-content -->


            <!-- Premium Author Box -->
            <div class="art-author-box">
                <img src="<?php echo $article['author_img']; ?>"
                     alt="<?php echo $article['author']; ?>"
                     class="art-author-avatar"
                     width="80" height="80">
                <div class="art-author-info">
                    <span class="art-author-label">La Parole à L'expert</span>
                    <h3><?php echo $article['author']; ?></h3>
                    <span class="art-author-role"><?php echo $article['author_role']; ?></span>
                    <p><?php echo $article['author_bio']; ?></p>
                    <a href="/equipe" class="art-author-link">Découvrir toute la rédaction</a>
                </div>
            </div>


            <!-- Heavy Conclusion Box -->
            <div class="art-conclusion" style="background-color: #111111; color: #ffffff;">
                <h2 style="color: #ffffff;">Le mot de la fin</h2>
                <p style="color: #ffffff;">Le prix d'une voiture pilote pour convoi exceptionnel dépend avant tout de la distance, du créneau et de la complexité du convoi. Le tarif de référence est de 1,40 €/km, mais ce chiffre seul ne suffit pas à bâtir un budget réel : les frais autoroutiers, les majorations de nuit et les options (moto, reconnaissance, urgence) peuvent facilement multiplier la facture par deux. Pour toute mission, demandez un devis sur dossier complet avec les 5 informations clés : distance, dimensions du convoi, itinéraire, créneau, nombre de véhicules.</p>
            </div>


            <!-- Similar Articles Grid (dynamique) -->
            <section class="art-related">
                <h2 class="art-related-title">Poursuivre la lecture dans <a href="/<?php echo $article['category']; ?>"><?php echo $article['category_name']; ?></a></h2>
                <div class="art-related-grid">
                    <?php if (!empty($same_cat_articles)): ?>
                        <?php foreach (array_slice($same_cat_articles, 0, 3) as $rel): ?>
                            <a href="<?php echo $rel['url']; ?>" class="art-related-card">
                                <div class="art-related-img">
                                    <img src="<?php echo htmlspecialchars($rel['image']); ?>"
                                         alt="<?php echo htmlspecialchars($rel['title']); ?>"
                                         width="400" height="225" loading="lazy">
                                </div>
                                <div class="art-related-body">
                                    <h3><?php echo htmlspecialchars($rel['title']); ?></h3>
                                    <p><?php echo htmlspecialchars($rel['subtitle'] ?? ''); ?></p>
                                    <span class="art-related-meta"><?php echo htmlspecialchars($rel['author'] ?? 'Rédaction'); ?> &bull; <?php echo htmlspecialchars($rel['date'] ?? ''); ?></span>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    <?php elseif (!empty($all_other_articles)): ?>
                        <?php foreach (array_slice($all_other_articles, 0, 3) as $rel): ?>
                            <a href="<?php echo $rel['url']; ?>" class="art-related-card">
                                <div class="art-related-img">
                                    <img src="<?php echo htmlspecialchars($rel['image']); ?>"
                                         alt="<?php echo htmlspecialchars($rel['title']); ?>"
                                         width="400" height="225" loading="lazy">
                                </div>
                                <div class="art-related-body">
                                    <h3><?php echo htmlspecialchars($rel['title']); ?></h3>
                                    <p><?php echo htmlspecialchars($rel['subtitle'] ?? ''); ?></p>
                                    <span class="art-related-meta"><?php echo htmlspecialchars($rel['author'] ?? 'Rédaction'); ?> &bull; <?php echo htmlspecialchars($rel['date'] ?? ''); ?></span>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p style="color: #666; padding: 20px 0;">D'autres articles arrivent bientôt dans cette catégorie !</p>
                    <?php endif; ?>
                </div>
            </section>


        </div><!-- .art-main-col -->


        <!-- ASYMMETRIC RIGHT SIDEBAR (dynamique) -->
        <aside class="art-sidebar-right">
            <div class="art-sidebar-sticky">


                <?php if (!empty($same_cat_articles)): ?>
                    <div class="art-sidebar-block">
                        <div class="art-sidebar-block-title">Dans ce dossier</div>
                        <?php foreach (array_slice($same_cat_articles, 0, 3) as $sa): ?>
                            <a href="<?php echo $sa['url']; ?>" class="art-side-card">
                                <div class="art-side-img">
                                    <img src="<?php echo htmlspecialchars($sa['image']); ?>"
                                         alt="<?php echo htmlspecialchars($sa['title']); ?>"
                                         width="160" height="90" loading="lazy">
                                    <span class="art-side-cat-pill"
                                          style="background: <?php echo $article['category_color']; ?>"><?php echo $article['category_name']; ?></span>
                                </div>
                                <h4><?php echo htmlspecialchars($sa['title']); ?></h4>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>


                <?php if (!empty($all_other_articles)): ?>
                    <div class="art-sidebar-block">
                        <div class="art-sidebar-block-title">À la Une</div>
                        <?php foreach (array_slice($all_other_articles, 0, 3) as $ra): ?>
                            <a href="<?php echo $ra['url']; ?>" class="art-side-card">
                                <div class="art-side-img">
                                    <img src="<?php echo htmlspecialchars($ra['image']); ?>"
                                         alt="<?php echo htmlspecialchars($ra['title']); ?>"
                                         width="160" height="90" loading="lazy">
                                </div>
                                <h4><?php echo htmlspecialchars($ra['title']); ?></h4>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>


                <?php if (empty($same_cat_articles) && empty($all_other_articles)): ?>
                    <div class="art-sidebar-block">
                        <div class="art-sidebar-block-title">Explorer</div>
                        <a href="/<?php echo $article['category']; ?>" class="btn-primary"
                           style="display:block; text-align:center; background-color: <?php echo $article['category_color']; ?>; border-color: <?php echo $article['category_color']; ?>; margin-top: 15px;">
                            Voir tous les articles <?php echo $article['category_name']; ?>
                        </a>
                    </div>
                <?php endif; ?>


            </div>
        </aside>


    </div><!-- .art-layout-wrapper -->
</article>


<!-- ══════════════════════════════════ -->
<!-- STYLES SPÉCIFIQUES À CET ARTICLE  -->
<!-- ══════════════════════════════════ -->
<style>
/* ─── Calculateur ─── */
.calc-wrap { background: var(--color-surface, #fff); border: 1.5px solid var(--color-border, #e5e2dc); border-radius: 12px; padding: 28px 28px 32px; margin: 20px 0 32px; box-shadow: 0 4px 20px rgba(0,0,0,.05); }
.calc-wrap h3 { margin-top: 0; font-size: 1.05rem; font-weight: 700; }
.calc-subtitle { font-size: 13px; color: #7a7974; margin-bottom: 24px; margin-top: 4px; }
.calc-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px 28px; }
@media (max-width: 620px) { .calc-grid { grid-template-columns: 1fr; } .calc-wrap { padding: 20px 16px; } }
.calc-field { display: flex; flex-direction: column; gap: 6px; }
.calc-field.full-width { grid-column: 1 / -1; }
.calc-label { font-size: 13px; font-weight: 600; color: #28251d; text-transform: uppercase; letter-spacing: .05em; }
.calc-sublabel { font-size: 12px; color: #7a7974; margin-top: -4px; }
.calc-input-km { border: 1.5px solid #d4d1ca; border-radius: 8px; padding: 10px 14px; font-size: 16px; font-family: inherit; width: 100%; max-width: 180px; transition: border-color 180ms; }
.calc-input-km:focus { outline: none; border-color: #0891b2; box-shadow: 0 0 0 3px rgba(8,145,178,.12); }
.calc-radio-group { display: flex; flex-wrap: wrap; gap: 8px; }
.calc-radio-group label { display: flex; align-items: center; gap: 6px; background: #f3f0ec; border: 1.5px solid #d4d1ca; border-radius: 8px; padding: 7px 12px; cursor: pointer; font-size: 13.5px; font-weight: 500; transition: all 180ms; }
.calc-radio-group input[type="radio"] { display: none; }
.calc-radio-group input[type="radio"]:checked + span { color: #0891b2; }
.calc-radio-group label:has(input:checked) { background: #e0f2fe; border-color: #0891b2; color: #0891b2; }
.calc-checkbox-group { display: flex; flex-direction: column; gap: 10px; }
.calc-checkbox-group label { display: flex; align-items: flex-start; gap: 10px; cursor: pointer; font-size: 14px; }
.calc-checkbox-group input[type="checkbox"] { width: 18px; height: 18px; flex-shrink: 0; margin-top: 1px; accent-color: #0891b2; cursor: pointer; }
.calc-btn { margin-top: 24px; background: #0891b2; color: #fff; border: none; border-radius: 8px; padding: 13px 28px; font-size: 15px; font-weight: 600; cursor: pointer; width: 100%; letter-spacing: .02em; transition: background 180ms; }
.calc-btn:hover { background: #0e7490; }
.calc-btn:active { background: #164e63; }
.calc-result { display: none; margin-top: 28px; border-top: 1px solid #e5e2dc; padding-top: 24px; }
.calc-result-title { font-weight: 700; font-size: 14px; text-transform: uppercase; letter-spacing: .06em; color: #7a7974; margin-bottom: 16px; }
.calc-estimates { display: grid; grid-template-columns: repeat(3, 1fr); gap: 12px; margin-bottom: 20px; }
@media (max-width: 500px) { .calc-estimates { grid-template-columns: 1fr; } }
.calc-estimate { border-radius: 10px; padding: 14px 16px; text-align: center; }
.calc-estimate.low { background: #f0fdf4; border: 1px solid #86efac; }
.calc-estimate.mid { background: #e0f2fe; border: 1.5px solid #0891b2; }
.calc-estimate.high { background: #fff7ed; border: 1px solid #fdba74; }
.calc-estimate-label { font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: .06em; margin-bottom: 6px; color: #7a7974; }
.calc-estimate.mid .calc-estimate-label { color: #0891b2; }
.calc-estimate-price { font-size: 22px; font-weight: 700; font-variant-numeric: tabular-nums; }
.calc-estimate.low .calc-estimate-price { color: #16a34a; }
.calc-estimate.mid .calc-estimate-price { color: #0891b2; }
.calc-estimate.high .calc-estimate-price { color: #ea580c; }
.calc-estimate-note { font-size: 11px; color: #7a7974; margin-top: 4px; }
.calc-detail-block { background: #f8f7f4; border-radius: 8px; padding: 14px 16px; margin-bottom: 12px; }
.calc-detail-title { font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: .06em; color: #7a7974; margin-bottom: 8px; }
.calc-detail-block ul { padding-left: 18px; }
.calc-detail-block li { font-size: 13.5px; color: #4a4744; margin-bottom: 4px; }
.calc-disclaimer { font-size: 12px; color: #7a7974; background: #f3f0ec; border-radius: 6px; padding: 10px 14px; margin-top: 12px; }


/* ─── FAQ ─── */
.faq-item { border-bottom: 1px solid #e5e2dc; }
.faq-question { width: 100%; text-align: left; background: none; border: none; cursor: pointer; padding: 16px 0; font-size: 15px; font-weight: 600; color: #1a1a1a; display: flex; justify-content: space-between; align-items: center; gap: 12px; font-family: inherit; }
.faq-question::after { content: '+'; font-size: 20px; font-weight: 400; color: #0891b2; flex-shrink: 0; transition: transform 180ms; }
.faq-question[aria-expanded="true"]::after { transform: rotate(45deg); }
.faq-answer { display: none; padding: 0 0 16px; font-size: 14.5px; color: #4a4744; }
.faq-answer.open { display: block; }


/* ─── Acteurs ─── */
.acteurs-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 12px; margin-top: 16px; }
.acteur-card { background: #fff; border: 1px solid #e5e2dc; border-radius: 8px; padding: 16px; }
.acteur-card a { color: #0891b2; font-weight: 600; font-size: 14px; text-decoration: none; }
.acteur-card a:hover { text-decoration: underline; }
.acteur-card p { font-size: 13px; color: #7a7974; margin-top: 4px; margin-bottom: 0; }
</style>


<!-- ══════════════════════════════════ -->
<!-- SCRIPTS CALCULATEUR + FAQ         -->
<!-- ══════════════════════════════════ -->
<script>
function calculer() {
    const distance = parseFloat(document.getElementById('distance').value);
    if (!distance || distance <= 0) {
        alert('Veuillez entrer une distance en kilomètres.');
        document.getElementById('distance').focus();
        return;
    }


    const typeEscorte = document.querySelector('input[name="type_escorte"]:checked')?.value || 'voiture';
    const creneau     = document.querySelector('input[name="creneau"]:checked')?.value || 'jour';
    const convoi      = document.querySelector('input[name="convoi"]:checked')?.value || 'standard';
    const autoroute   = document.getElementById('autoroute').checked;
    const recon       = document.getElementById('reconnaissance').checked;
    const urgence     = document.getElementById('urgence').checked;
    const admin       = document.getElementById('admin').checked;


    let prixVoiture = Math.max(distance * 1.40, 150);


    let majCreneau = 1.0;
    if (creneau === 'nuit' || creneau === 'dimanche_ferie') majCreneau = 1.5;


    let majConvoi = 1.0;
    if (convoi === 'large')          majConvoi = 1.25;
    if (convoi === 'tres_technique') majConvoi = 1.50;


    prixVoiture = prixVoiture * majCreneau * majConvoi;


    let prixMoto = 0;
    const nbJoursMoto = distance <= 400 ? 1 : 2;
    if (typeEscorte === 'voiture_moto') {
        prixMoto = 800 * nbJoursMoto * majCreneau;
    }
    if (typeEscorte === 'multiple') {
        prixVoiture *= 2;
        prixMoto = 800 * nbJoursMoto * majCreneau;
    }


    let fraisAutoroute = 0;
    if (autoroute) {
        const fraisDossier = urgence ? 360 : 180;
        const fraisCoord   = 30 * Math.ceil(distance / 80);
        let fraisPassage   = 0;
        if      (distance <= 50)  fraisPassage = 110;
        else if (distance <= 100) fraisPassage = 220;
        else if (distance <= 200) fraisPassage = 440;
        else                      fraisPassage = 620;
        fraisAutoroute = fraisDossier + fraisCoord + fraisPassage;
    }


    let fraisOptions = 0;
    if (recon)    fraisOptions += 300;
    if (urgence && !autoroute) fraisOptions += 180;
    if (admin)    fraisOptions += 120;


    const total = prixVoiture + prixMoto + fraisAutoroute + fraisOptions;


    const low  = Math.round(total * 0.82 / 10) * 10;
    const mid  = Math.round(total / 10) * 10;
    const high = Math.round(total * 1.28 / 10) * 10;


    document.getElementById('result-low').textContent  = low.toLocaleString('fr-FR') + ' €';
    document.getElementById('result-mid').textContent  = mid.toLocaleString('fr-FR') + ' €';
    document.getElementById('result-high').textContent = high.toLocaleString('fr-FR') + ' €';


    const details = [];
    details.push(`Voiture pilote : <strong>${Math.round(prixVoiture).toLocaleString('fr-FR')} €</strong>
        (base : ${distance} km × 1,40 €/km${typeEscorte === 'multiple' ? ' × 2 véhicules' : ''}
        ${majCreneau > 1 ? ' — majoré nuit/dimanche (+50 %)' : ''}
        ${majConvoi > 1 ? ` — majoré convoi ${convoi === 'large' ? 'large (+25 %)' : 'très technique (+50 %)'}` : ''})`);
    if (prixMoto > 0)
        details.push(`Escorte moto : <strong>${Math.round(prixMoto).toLocaleString('fr-FR')} €</strong> (${nbJoursMoto} jour${nbJoursMoto > 1 ? 's' : ''} × 800 €${majCreneau > 1 ? ' majoré' : ''})`);
    if (fraisAutoroute > 0)
        details.push(`Frais autoroutiers APRR estimés : <strong>${Math.round(fraisAutoroute).toLocaleString('fr-FR')} €</strong> (dossier + coordination + passage)`);
    if (fraisOptions > 0)
        details.push(`Options (reconnaissance, urgence, admin) : <strong>${Math.round(fraisOptions).toLocaleString('fr-FR')} €</strong>`);


    const facteurs = [];
    if (majCreneau > 1)               facteurs.push('Mission de nuit ou dimanche/jour férié → +50 % sur la main-d\'œuvre');
    if (convoi === 'large')           facteurs.push('Convoi largeur > 3 m → +25 % sur la base voiture');
    if (convoi === 'tres_technique')  facteurs.push('Convoi très technique (≥ 4 m ou ≥ 25 m) → +50 % sur la base voiture');
    if (typeEscorte === 'multiple')   facteurs.push('Plusieurs véhicules d\'accompagnement → base voiture ×2');
    if (autoroute)                    facteurs.push('Passage autoroute → frais de dossier APRR + frais de passage');
    if (recon)                        facteurs.push('Reconnaissance d\'itinéraire → +300 € forfait estimé');
    if (urgence)                      facteurs.push('Traitement en urgence → frais de dossier doublés');
    if (admin)                        facteurs.push('Accompagnement administratif → +120 €');


    document.getElementById('result-detail').innerHTML =
        details.map(d => `<li>${d}</li>`).join('');
    document.getElementById('result-facteurs').innerHTML =
        facteurs.length
            ? facteurs.map(f => `<li>${f}</li>`).join('')
            : '<li>Aucune majoration active — estimation en conditions standard.</li>';


    const box = document.getElementById('calculator-result');
    box.style.display = 'block';
    setTimeout(() => box.scrollIntoView({ behavior: 'smooth', block: 'nearest' }), 50);
}


function toggleFaq(btn) {
    const answer = btn.nextElementSibling;
    const isOpen = answer.classList.contains('open');
    document.querySelectorAll('.faq-answer.open').forEach(a => a.classList.remove('open'));
    document.querySelectorAll('.faq-question[aria-expanded="true"]').forEach(b => b.setAttribute('aria-expanded', 'false'));
    if (!isOpen) {
        answer.classList.add('open');
        btn.setAttribute('aria-expanded', 'true');
    }
}
</script>


<!-- Schema JSON-LD (Article) -->
<script type="application/ld+json">
<?php
$schema = [
    "@context" => "https://schema.org",
    "@graph"   => [
        [
            "@type"            => "Article",
            "mainEntityOfPage" => [
                "@type" => "WebPage",
                "@id"   => "https://garageraymond.fr/Blog/" . $current_slug
            ],
            "headline"      => $article['title'],
            "description"   => $article['subtitle'],
            "image"         => ["https://garageraymond.fr" . $article['image']],
            "datePublished" => "2026-04-03T10:00:00+02:00",
            "dateModified"  => "2026-04-03T10:00:00+02:00",
            "author"        => [
                "@type"    => "Person",
                "name"     => $article['author'],
                "url"      => "https://garageraymond.fr/equipe",
                "jobTitle" => $article['author_role']
            ],
            "publisher" => [
                "@type" => "Organization",
                "name"  => "Le garage expert Auto",
                "url"   => "https://garageraymond.fr",
                "logo"  => [
                    "@type"  => "ImageObject",
                    "url"    => "https://garageraymond.fr/Image/favicon.png",
                    "width"  => "512",
                    "height" => "512"
                ]
            ]
        ]
    ]
];
echo json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
?>
</script>


<?php include __DIR__ . '/../footer.php'; ?>
