# RÈGLES ÉDITORIALES & DIRECTION ARTISTIQUE (D.A.) - EXPERT RENOV'

Ce document de référence décrit de manière exhaustive la structure technique, le design et les règles de formatage pour la rédaction des articles sur le blog **Expert Renov'**. Toute création de contenu doit se conformer strictement à ces règles pour garantir un rendu ultra-premium ("10x meilleur qu'Imope").

---

## 1. TYPOGRAPHIE & LISIBILITÉ

L'alliance de **Poppins**, **Outfit** et **Inter** est la signature visuelle du site. 

*   **Titres principaux (H1, H2, H3, H4) :** Police `Outfit`. C'est une police géométrique, moderne et très lisible qui donne un aspect "magazine premium". L'approche (letter-spacing) est très légèrement resserrée (`-0.5px`) pour plus d'élégance.
*   **Texte courant (Paragraphes, listes) :** Police `Inter`. Taille de base `1.15rem` (environ 18px) pour un confort de lecture optimal sur mobile et desktop. L'interligne (line-height) est généreux : `1.8` (soit 180%).
*   **Éléments d'interface (Logo, Boutons, Tags) :** Police `Poppins` ou `Outfit` en graisse forte.
*   **Couleur du texte courant :** Jamais de noir pur ! Le texte courant est en brun très foncé/gris (`var(--color-text): #5c4b3a`) pour adoucir le contraste avec le fond coquille d'œuf.

---

## 2. LA PALETTE DE COULEURS

Le site utilise un camaïeu de marrons et beiges chaleureux et luxueux, rappelant la terre, le bois et l'artisanat haut de gamme.

*   🟢 **Background Global (`--color-bg`) :** `#f9f7f4` (Blanc cassé / écru extrêmement léger. Évite la fatigue visuelle du blanc pur).
*   🟤 **Couleur Sombre / Titres (`--color-dark`) :** `#3e2e1f` (Marron café très profond. Utilisé pour tous les titres H1/H2/H3 et les textes importants).
*   🟠 **Couleur Primaire / Accent (`--color-primary`) :** `#bf9469` (Marron clair / saumon / terracotta clair. Utilisé pour les hovers, les liserés, et les mots-clés dans les H2).
*   🪵 **Couleur Secondaire (`--color-secondary`) :** `#7d5f41` (Marron moyen. Utilisé pour les textes secondaires, dates, temps de lecture).
*   🟡 **Couleur Claire / Fond des box (`--color-light`) :** `#fbe3cb` (Beige sable / pêche clair).
*   📝 **Bordures (`--color-border`) :** `#e8dfd5` (Un trait très délicat pour séparer sans alourdir).

---

## 3. STRUCTURE GLOBALE D'UN ARTICLE (LE "TEMPLATE")

Un article parfait doit **OBLIGATOIREMENT** suivre cette colonne vertébrale :

1.  **Hero Section Article (`.article-hero`) :** Grande image de fond assombrie, Breadcrumbs (Fil d'ariane), Tags de catégorie, Grand Titre H1 percutant, et les Métadonnées (Date + Temps de lecture).
2.  **Introduction Courte (`.article-intro`) :** 2 à 3 lignes maximum en police légèrement agrandie (`font-size: 1.25rem`) et en gras partiel. Elle accroche tout de suite le lecteur.
3.  **La Quick Answer Box (`.tldr-box`) :** Une boîte beige dès le début. Elle offre la réponse immédiate à l'intention de recherche. Cruciale pour le SEO et le taux de rebond.
4.  **Le Sommaire (`.toc-box`) :** Une box au design épuré avec fond blanc et liens de navigation ancre fluides.
5.  **Le Contenu Structuré (`.article-content`) :** Alternance de H2 travaillés (`<h3>` avec soulignement primaire pointillé/solide), de paragraphes aérés, de listes à puces esthétiques et de tableaux comparatifs clairs.
6.  **La Conclusion (`.conclusion-box`) :** Une dernière boîte inversée (fond sombre, texte clair) pour le mot de la fin et l'appel à l'action.

---

## 4. RÈGLES DÉTAILLÉES DES BLOCS (CSS & HTML)

### A. Titres (h2 / h3 / h4) au sein de .article-content
*   **Les H2 (`<h2>`) :** Ils sont imposants (`2.2rem`), margés généreusement au-dessus (`3.5rem`). Ils possèdent un trait visuel (`border-bottom: 2px solid var(--color-primary)`) partiel (par exemple sur 60px de large) pour marquer la séparation avec élégance.
*   **Les H3 (`<h3>`) :** Intermédiaires (`1.6rem`), couleur sombre, marge modérée. Structurent le contenu d'un H2.
*   *Astuce SEO/DA* : Ne jamais mettre un H3 juste après un H2 sans au moins une ligne de texte (paragraphe) entre les deux.

### B. Mises en évidence
*   Textes en **gras** (`<strong>`) : Ils héritent de la couleur `--color-dark` au lieu du texte gris par défaut, pour créer un "pop" visuel de lecture en diagonale.
*   Citations (`<blockquote>`) : Barre verticale épaisse à gauche, texte en italique légèrement plus grand, marges indentées.

### C. La Quick Answer Box (.tldr-box)
*   **Design :** Fond très clair (`#faf3eb`), bordure gauche épaisse (4px) couleur `--color-primary`.
*   **En-tête :** Titre en majuscule, gras, petite taille (+ icône d'éclair SVG).
*   **Contenu :** Liste à puces de 3 points, très concis.
*   **ATTENTION - Règle critique :** Les `<li>` de la TLDR box utilisent un positionnement `position: relative` + `padding-left` avec un pseudo-element `::before` en position absolue pour la puce. **NE JAMAIS utiliser `display: flex` sur les `<li>`**, car cela casse le flux du texte lorsqu'il contient des balises `<strong>` ou `<a>` en ligne, créant des "trous" visuels entre les mots.

### D. Le Sommaire (.toc-box)
*   **Design :** Fond blanc pur (`#ffffff`), radius arrondi, ombre très subtile, bordure complète fine (`1px solid var(--color-border)`).
*   **Liens :** Les liens sont numérotés 1., 2., 3. Au survol (`:hover`), le texte devient saumon (`--color-primary`) et se translade légèrement vers la droite (`transform: translateX(5px)` avec une `transition` douce).

### E. Les Tableaux de Données (.table-wrapper + .content-table)
*   **Obligation :** Toujours wrapper un `<table>` dans une `<div class="table-wrapper">` avec `overflow-x: auto` pour les téléphones.
*   **Design (`.content-table`) :**
    *   `width: 100%`, `border-collapse: collapse`.
    *   Le `<thead>` a un background sombre (`--color-dark`) et le texte blanc. Les coins hauts sont arrondis (via border-radius).
    *   Les cellules (`td`) ont du padding aéré (1rem).
    *   Les lignes `<tbody> tr` ont un fond alterné (Zebra-striping : une ligne blanche, une ligne très légèrement grisée `#fcfaf8`) pour la lisibilité horizontale.
    *   Bordures horizontales fines `1px solid var(--color-border)`.

### F. Listes à puces (Bullet points)
*   **Design propre :** Les `ul` dans le contenu n'ont pas de gros ronds noirs baveux. On utilise le pseudo-élément `::before` pour injecter, par exemple, une puce carrée pointée de couleur `--color-primary` (ex: `content: '■'; color: var(--color-primary)` ou un SVG custom d'encoche orange).

### G. Boîte de Conclusion (.conclusion-box)
*   **Design Inversé :** Background plein couleur café (`--color-dark`), texte clair (`var(--color-bg)`).
*   **Relief :** Ombre interne ou légère bordure dorée.
*   **Typo :** Titre H3 à l'intérieur en blanc, texte final percutant, parfait pour clore l'expérience utilisateur et encourager le clic sur l'espace commentaires ou les articles similaires en dessous.

---

## 5. RÈGLES ICONOGRAPHIQUES & MÉDIAS
*   **Images in-text (`<img>`) :** Toujours dotées d'un `border-radius: 12px` et d'un comportement `max-width: 100%; height: auto;`. Jamais d'images collées au texte sans marge inférieure de 2rem.
*   **Légendes (Captions) :** Sous une image, la légende est en italique gras (`style="font-style: italic; font-size: 0.9rem; color: var(--color-secondary); text-align: center"`)
*   **PAS D'EMOJIS :** L'usage abusif d'emojis est **strictement proscrit**. On utilise des SVG vectoriels natifs colorés via CSS pour préserver l'image de marque et l'ADN esthétique de la rénovation haut de gamme.

---

## 6. MÉTADONNÉES OBLIGATOIRES (`$article_meta`)

Chaque fichier PHP d'article placé dans `/blog/` **DOIT** commencer par un bloc `$article_meta` AVANT tout `require` ou sortie HTML. C'est ce bloc que `functions.php` scanne automatiquement pour alimenter la homepage, les pages catégorie et les sidebars.

**Structure obligatoire :**
```php
<?php
$article_meta = [
    'title' => 'Mon titre d\'article SEO',
    'category' => 'renovation',           // slug exact : immobilier, maison, renovation, travaux
    'image' => 'https://...',              // URL de l'image mise en avant (min. 800px de large)
    'excerpt' => 'Description courte...',  // 1-2 phrases pour les listings
    'date' => '2025-03-01',               // Format YYYY-MM-DD
    'reading_time' => 7,                  // En minutes
];

require_once dirname(__DIR__) . '/functions.php';
// ... suite de l'article
```

**Règles :**
*   Le champ `category` doit correspondre exactement à un slug défini dans `$categories` de `functions.php`.
*   Le champ `date` détermine l'ordre d'affichage (les plus récents en premier).
*   L'URL de l'article est générée automatiquement à partir du nom du fichier (`/renov/blog/mon-article.php`).
*   Si un champ manque, des valeurs par défaut sont appliquées, mais `title` et `category` sont **obligatoires**.
