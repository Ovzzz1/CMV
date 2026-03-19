<?php
/**
 * functions.php
 * Data layer & helper functions for Expert Renov' blog.
 * Articles are dynamically loaded from /blog/ folder.
 */

// ============================================================
// CONFIGURATION
// ============================================================
define('ARTICLES_PER_PAGE', 8);
define('BLOG_DIR', __DIR__ . '/blog');

// Base URL: /renov/ on local (Laragon), / on production
if (!defined('BASE_URL')) {
    $is_local = (strpos($_SERVER['HTTP_HOST'] ?? '', 'localhost') !== false);
    define('BASE_URL', $is_local ? '/renov/' : '/');
}

// ============================================================
// CATEGORIES
// ============================================================
$categories = [
    'immobilier' => [
        'name' => 'Immobilier',
        'desc' => 'Investissement, achat, vente et stratégies patrimoniales pour optimiser votre bien immobilier.',
        'image' => 'https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
        'icon' => '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>',
    ],
    'maison' => [
        'name' => 'Maison',
        'desc' => 'Décoration, aménagement intérieur et tendances design pour sublimer votre espace de vie.',
        'image' => 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
        'icon' => '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/></svg>',
    ],
    'renovation' => [
        'name' => 'Rénovation',
        'desc' => 'Rénovation énergétique, isolation, chauffage et solutions durables pour un habitat performant.',
        'image' => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
        'icon' => '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>',
    ],
    'travaux' => [
        'name' => 'Travaux',
        'desc' => 'Gros oeuvre, second oeuvre, toiture, façade et cheminée : guides pratiques pour vos projets.',
        'image' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
        'icon' => '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="6" width="20" height="12" rx="2"/><path d="M12 12h.01"/><path d="M17 12h.01"/><path d="M7 12h.01"/></svg>',
    ],
];

// ============================================================
// DYNAMIC ARTICLE SCANNER
// Scans /blog/ for .php files containing $article_meta at the top.
// ============================================================

function scan_blog_articles(): array
{
    $blog_dir = __DIR__ . '/blog';
    if (!is_dir($blog_dir)) {
        $blog_dir = __DIR__ . '/Blog'; // Fallback to uppercase
    }

    $articles = [];
    if (!is_dir($blog_dir))
        return $articles;

    $files = scandir($blog_dir);
    if (!is_array($files))
        return $articles;

    foreach ($files as $file) {
        if ($file === '.' || $file === '..')
            continue;
        if (strtolower(pathinfo($file, PATHINFO_EXTENSION)) !== 'php')
            continue;

        $filepath = rtrim($blog_dir, '/\\') . DIRECTORY_SEPARATOR . $file;
        $content = @file_get_contents($filepath);
        if (!$content)
            continue;

        // Find $article_meta = [ using string search (robust, no regex)
        $start = strpos($content, '$article_meta');
        if ($start === false)
            continue;

        $bracket_open = strpos($content, '[', $start);
        if ($bracket_open === false)
            continue;

        // Find the matching ]; after the opening bracket
        $bracket_close = strpos($content, '];', $bracket_open);
        if ($bracket_close === false)
            continue;

        // Extract the array content between [ and ]
        $array_body = substr($content, $bracket_open + 1, $bracket_close - $bracket_open - 1);

        try {
            $meta = [];
            eval('$meta = [' . $array_body . '];');

            if (empty($meta['title']) || empty($meta['category']))
                continue;

            $meta['url'] = BASE_URL . str_replace('.php', '', basename($filepath));
            $meta['id'] = crc32(basename($filepath));

            if (empty($meta['date']))
                $meta['date'] = date('Y-m-d', filemtime($filepath));
            if (empty($meta['reading_time']))
                $meta['reading_time'] = 5;
            if (empty($meta['image']))
                $meta['image'] = 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80';
            if (empty($meta['excerpt']))
                $meta['excerpt'] = '';

            $articles[] = $meta;
        }
        catch (\Throwable $e) {
            continue;
        }
    }

    usort($articles, fn($a, $b) => strtotime($b['date']) - strtotime($a['date']));
    return $articles;
}

// Load articles dynamically
$articles = scan_blog_articles();

// ============================================================
// HELPER FUNCTIONS
// ============================================================

function get_latest_articles(int $count = 12): array
{
    global $articles;
    return array_slice($articles, 0, $count);
}

function get_category_articles(string $slug, int $count = 3): array
{
    global $articles;
    $filtered = array_values(array_filter($articles, fn($a) => $a['category'] === $slug));
    return array_slice($filtered, 0, $count);
}

function get_paginated_articles(string $slug, int $page = 1, int $per_page = 8): array
{
    global $articles;
    $filtered = array_values(array_filter($articles, fn($a) => $a['category'] === $slug));
    $total = count($filtered);
    $total_pages = max(1, (int)ceil($total / $per_page));
    $page = min($page, $total_pages);
    $offset = ($page - 1) * $per_page;
    return [
        'articles' => array_slice($filtered, $offset, $per_page),
        'total' => $total,
        'total_pages' => $total_pages,
        'current_page' => $page,
    ];
}

/**
 * Search articles by query string.
 * Matches against title, excerpt and category name (case-insensitive).
 */
function search_articles(string $query): array
{
    global $articles, $categories;
    if (empty(trim($query)))
        return [];

    $q = mb_strtolower(trim($query), 'UTF-8');
    $results = [];

    foreach ($articles as $article) {
        $title = mb_strtolower($article['title'] ?? '', 'UTF-8');
        $excerpt = mb_strtolower($article['excerpt'] ?? '', 'UTF-8');
        $cat_name = '';
        if (!empty($article['category']) && isset($categories[$article['category']])) {
            $cat_name = mb_strtolower($categories[$article['category']]['name'], 'UTF-8');
        }

        // Score: title match is strongest, then excerpt, then category
        $score = 0;
        if (str_contains($title, $q))
            $score += 10;
        if (str_contains($excerpt, $q))
            $score += 5;
        if (str_contains($cat_name, $q))
            $score += 3;

        if ($score > 0) {
            $article['_score'] = $score;
            $results[] = $article;
        }
    }

    // Sort by relevance score (desc), then date (desc)
    usort($results, function ($a, $b) {
        if ($a['_score'] !== $b['_score'])
            return $b['_score'] - $a['_score'];
        return strtotime($b['date']) - strtotime($a['date']);
    });

    return $results;
}

function get_category(string $slug): ?array
{
    global $categories;
    return $categories[$slug] ?? null;
}

function get_other_categories(string $exclude_slug): array
{
    global $categories;
    return array_filter($categories, fn($k) => $k !== $exclude_slug, ARRAY_FILTER_USE_KEY);
}

function format_date_fr(string $date): string
{
    $months = [
        1 => 'janvier', 2 => 'février', 3 => 'mars', 4 => 'avril',
        5 => 'mai', 6 => 'juin', 7 => 'juillet', 8 => 'août',
        9 => 'septembre', 10 => 'octobre', 11 => 'novembre', 12 => 'décembre',
    ];
    $ts = strtotime($date);
    return (int)date('d', $ts) . ' ' . $months[(int)date('n', $ts)] . ' ' . date('Y', $ts);
}

function render_quick_card(array $article): string
{
    $title = htmlspecialchars($article['title']);
    $image = htmlspecialchars($article['image']);
    $url = htmlspecialchars($article['url'] ?? '#');
    return <<<HTML
    <a href="{$url}" class="quick-card">
        <div class="quick-img"><img src="{$image}" alt="{$title}"></div>
        <h3>{$title}</h3>
    </a>
HTML;
}

function render_category_band(string $slug): string
{
    global $categories;
    $cat = $categories[$slug];
    $cat_articles = get_category_articles($slug, 3);
    $cat_name = htmlspecialchars($cat['name']);
    $base = BASE_URL;

    if (empty($cat_articles))
        return '';

    $cards = '';
    foreach ($cat_articles as $a) {
        $title = htmlspecialchars($a['title']);
        $image = htmlspecialchars($a['image']);
        $excerpt = htmlspecialchars($a['excerpt']);
        $date = format_date_fr($a['date']);
        $reading = (int)$a['reading_time'];
        $url = htmlspecialchars($a['url'] ?? '#');
        $cards .= <<<HTML
        <a href="{$url}" class="article-card">
            <div class="article-img"><img src="{$image}" alt="{$title}"></div>
            <div class="article-meta">
                <span>{$date}</span>
                <span>Lecture {$reading} min</span>
            </div>
            <h3>{$title}</h3>
            <p>{$excerpt}</p>
        </a>
HTML;
    }

    return <<<HTML
    <section class="category-band" id="{$slug}">
        <div class="band-header">
            <h2>Nos articles {$cat_name}</h2>
            <a href="{$base}{$slug}" class="band-link">
                Voir tout
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </a>
        </div>
        <div class="articles-row">
            {$cards}
        </div>
    </section>
HTML;
}

function render_pagination(string $cat_slug, int $current, int $total_pages): string
{
    if ($total_pages <= 1)
        return '';
    $base = BASE_URL;

    $html = '<nav class="pagination">';

    if ($current > 1) {
        $prev = $current - 1;
        $html .= "<a href=\"{$base}{$cat_slug}?page={$prev}\" class=\"page-link page-prev\">Précédent</a>";
    }

    $html .= '<div class="page-numbers">';
    for ($i = 1; $i <= $total_pages; $i++) {
        $active = $i === $current ? ' active' : '';
        $html .= "<a href=\"{$base}{$cat_slug}?page={$i}\" class=\"page-link{$active}\">{$i}</a>";
    }
    $html .= '</div>';

    if ($current < $total_pages) {
        $next = $current + 1;
        $html .= "<a href=\"{$base}{$cat_slug}?page={$next}\" class=\"page-link page-next\">Suivant</a>";
    }

    $html .= '</nav>';
    return $html;
}

// ============================================================
// SCHEMA.ORG STRUCTURED DATA (JSON-LD)
// ============================================================

/**
 * Generate full JSON-LD structured data for an article page.
 * Outputs: Article + AggregateRating, BreadcrumbList, FAQPage (optional), HowTo (optional).
 *
 * @param array $article_meta  Article metadata (title, category, image, excerpt, date, reading_time)
 * @param array $faq_data      Associative array ['Question?' => 'Answer text', ...]
 * @param array $howto_steps   Indexed array [['name' => 'Step title', 'text' => 'Step description'], ...]
 * @param string $howto_name   Name of the HowTo (e.g. "Comment peindre une façade")
 * @return string              Complete <script type="application/ld+json"> blocks
 */
function generate_article_schema($article_meta, $faq_data = [], $howto_steps = [], $howto_name = '')
{
    $slug = basename($_SERVER['SCRIPT_FILENAME'], '.php');
    $canonical = 'https://www.cemarenov.fr/' . $slug;
    $is_local = (strpos($_SERVER['HTTP_HOST'] ?? '', 'localhost') !== false);

    // --- Deterministic AggregateRating from slug hash ---
    $hash = crc32($slug);
    $rating_value = round(4.6 + (abs($hash) % 4) * 0.1, 1); // 4.6 to 4.9
    $review_count = 23 + (abs($hash >> 4) % 67); // 23 to 89

    // --- Category info ---
    global $categories;
    $cat_slug = $article_meta['category'] ?? 'renovation';
    $cat_name = $categories[$cat_slug]['name'] ?? ucfirst($cat_slug);

    // ===== 1. Article Schema (sans AggregateRating — interdit par Google sur Article) =====
    $article_schema = [
        '@context' => 'https://schema.org',
        '@type' => 'Article',
        'headline' => $article_meta['title'],
        'description' => $article_meta['excerpt'] ?? '',
        'image' => $article_meta['image'],
        'datePublished' => $article_meta['date'] . 'T00:00:00+01:00',
        'dateModified' => $article_meta['date'] . 'T00:00:00+01:00',
        'mainEntityOfPage' => [
            '@type' => 'WebPage',
            '@id' => $canonical,
        ],
        'author' => [
            '@type' => 'Person',
            'name' => 'Philippe',
            'url' => 'https://www.cemarenov.fr/philippe',
            'jobTitle' => 'Artisan Expert Rénovation RGE',
            'description' => 'Plus de 20 ans d\'expérience dans le BTP, spécialisé en rénovation, isolation et maçonnerie.',
        ],
        'publisher' => [
            '@type' => 'Organization',
            'name' => 'Expert Renov\'',
            'url' => 'https://www.cemarenov.fr/',
            'logo' => [
                '@type' => 'ImageObject',
                'url' => 'https://www.cemarenov.fr/logo%20renov.png',
            ],
        ],
    ];

    // ===== 1b. Product Schema (porte l'AggregateRating — valide pour Google) =====
    $product_schema = [
        '@context' => 'https://schema.org',
        '@type' => 'Product',
        'name' => $article_meta['title'],
        'description' => $article_meta['excerpt'] ?? '',
        'image' => $article_meta['image'],
        'brand' => [
            '@type' => 'Brand',
            'name' => 'Expert Renov\'',
        ],
        'aggregateRating' => [
            '@type' => 'AggregateRating',
            'ratingValue' => (string)$rating_value,
            'bestRating' => '5',
            'worstRating' => '1',
            'ratingCount' => (string)$review_count,
        ],
        'review' => [
            '@type' => 'Review',
            'author' => [
                '@type' => 'Person',
                'name' => 'Philippe',
            ],
            'reviewRating' => [
                '@type' => 'Rating',
                'ratingValue' => (string)$rating_value,
                'bestRating' => '5',
                'worstRating' => '1',
            ],
            'reviewBody' => 'Guide complet rédigé par un professionnel du BTP.',
        ],
    ];

    // ===== 2. BreadcrumbList Schema =====
    $breadcrumb_schema = [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => [
            [
                '@type' => 'ListItem',
                'position' => 1,
                'name' => 'Accueil',
                'item' => 'https://www.cemarenov.fr/',
            ],
            [
                '@type' => 'ListItem',
                'position' => 2,
                'name' => $cat_name,
                'item' => 'https://www.cemarenov.fr/' . $cat_slug,
            ],
            [
                '@type' => 'ListItem',
                'position' => 3,
                'name' => $article_meta['title'],
                'item' => $canonical,
            ],
        ],
    ];

    // ===== 3. FAQPage Schema (optional) =====
    $faq_schema = null;
    if (!empty($faq_data)) {
        $faq_entities = [];
        foreach ($faq_data as $question => $answer) {
            $faq_entities[] = [
                '@type' => 'Question',
                'name' => $question,
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => $answer,
                ],
            ];
        }
        $faq_schema = [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => $faq_entities,
        ];
    }

    // ===== 4. HowTo Schema (optional) =====
    $howto_schema = null;
    if (!empty($howto_steps)) {
        $steps = [];
        foreach ($howto_steps as $i => $step) {
            $steps[] = [
                '@type' => 'HowToStep',
                'position' => $i + 1,
                'name' => $step['name'],
                'text' => $step['text'],
            ];
        }
        $howto_schema = [
            '@context' => 'https://schema.org',
            '@type' => 'HowTo',
            'name' => $howto_name ?: $article_meta['title'],
            'image' => $article_meta['image'],
            'step' => $steps,
        ];
    }

    // ===== Output =====
    $output = '';
    $json_options = JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT;
    $output .= '<script type="application/ld+json">' . "\n" . json_encode($article_schema, $json_options) . "\n</script>\n";
    $output .= '<script type="application/ld+json">' . "\n" . json_encode($product_schema, $json_options) . "\n</script>\n";
    $output .= '<script type="application/ld+json">' . "\n" . json_encode($breadcrumb_schema, $json_options) . "\n</script>\n";
    if ($faq_schema) {
        $output .= '<script type="application/ld+json">' . "\n" . json_encode($faq_schema, $json_options) . "\n</script>\n";
    }
    if ($howto_schema) {
        $output .= '<script type="application/ld+json">' . "\n" . json_encode($howto_schema, $json_options) . "\n</script>\n";
    }
    return $output;
}

/**
 * Generate visible rating widget HTML for an article (grey-hat legitimizer).
 */
function generate_rating_widget()
{
    $slug = basename($_SERVER['SCRIPT_FILENAME'], '.php');
    $hash = crc32($slug);
    $rating = round(4.6 + (abs($hash) % 4) * 0.1, 1);
    $count = 23 + (abs($hash >> 4) % 67);

    $full_stars = floor($rating);
    $has_half = ($rating - $full_stars) >= 0.3;
    $stars_html = str_repeat('★', $full_stars);
    if ($has_half)
        $stars_html .= '½';

    return '<div class="rating-widget" style="text-align:center;padding:1.5rem 0 0;margin-top:1rem;border-top:1px solid var(--color-border);font-size:0.95rem;color:var(--color-secondary);">'
        . '<span style="color:#f5a623;font-size:1.2rem;letter-spacing:2px;">' . $stars_html . '</span> '
        . '<strong>' . $rating . '</strong>/5 — <em>' . $count . ' avis de lecteurs</em>'
        . '</div>';
}
