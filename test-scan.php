<?php
require_once __DIR__ . '/functions.php';

$articles = scan_blog_articles();
echo "Number of articles found: " . count($articles) . "\n";

foreach (glob(BLOG_DIR . '/*.php') as $filepath) {
    echo "Found file: $filepath\n";
    $content = file_get_contents($filepath);

    $start = strpos($content, '$article_meta');
    if ($start === false) {
        echo "  - No \$article_meta\n";
        continue;
    }

    $bracket_open = strpos($content, '[', $start);
    $bracket_close = strpos($content, '];', $bracket_open);

    echo "  - start: $start, open: $bracket_open, close: $bracket_close\n";

    if ($bracket_open !== false && $bracket_close !== false) {
        $array_body = substr($content, $bracket_open + 1, $bracket_close - $bracket_open - 1);
        try {
            $meta = [];
            eval('$meta = [' . $array_body . '];');
            echo "  - eval success! Title: " . ($meta['title'] ?? 'N/A') . "\n";
        }
        catch (\Throwable $e) {
            echo "  - eval FAILED: " . $e->getMessage() . "\n";
            echo "  - body was:\n$array_body\n";
        }
    }
}
