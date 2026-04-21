<?php
$root = __DIR__ . '/../';
$paths = [$root . 'Modules', $root . 'app'];
$files = [];
foreach ($paths as $path) {
     $it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path));
     foreach ($it as $file) {
          if ($file->isFile()) {
               $fn = $file->getPathname();
               if (preg_match('/\.(php|blade.php)$/', $fn)) {
                    $files[] = $fn;
               }
          }
     }
}
$patterns = [
     '/->\s*get\s*\(\s*\)\s*->\s*count\s*\(\s*\)/',
     '/->\s*get\s*\(\s*\)\s*->\s*first\s*\(\s*\)/'
];
$replacements = [
     '->count()',
     '->first()'
];
$changed = [];
foreach ($files as $f) {
     $content = file_get_contents($f);
     $new = preg_replace($patterns, $replacements, $content);
     if ($new !== null && $new !== $content) {
          // backup
          copy($f, $f . '.bak');
          file_put_contents($f, $new);
          $changed[] = $f;
     }
}
echo "Modified " . count($changed) . " files\n";
foreach ($changed as $c) echo $c . "\n";
