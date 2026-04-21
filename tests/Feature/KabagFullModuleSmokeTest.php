<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class KabagFullModuleSmokeTest extends TestCase
{
     public function test_kabag_get_routes_do_not_500_and_basic_pages_render(): void
     {
          $user = User::query()->where('email', 'Kabag@bprsbtb.com')->first();

          if (!$user) {
               $role = Role::query()
                    ->where('role_id', 2)
                    ->where('divisi_id', 0)
                    ->where('jabatan_id', 2)
                    ->latest('id')
                    ->first();

               $user = $role?->user;
          }

          if (!$user) {
               $this->markTestSkipped('No Kabag user (role_id=2, divisi_id=0, jabatan_id=2) found in DB.');
          }

          $this->actingAs($user);

          // 1) Hit known key entry points (more informative failures than the generic route loop)
          $entryPoints = [
               '/kabag',
               '/kabag/skpd',
               '/kabag/skpd/nasabah',
               '/kabag/skpd/proposal',
               '/kabag/skpd/komite',
               '/kabag/umkm',
               '/kabag/umkm/nasabah',
               '/kabag/umkm/proposal',
               '/kabag/umkm/komite',
               '/kabag/pasar',
               '/kabag/pasar/nasabah',
               '/kabag/pasar/proposal',
               '/kabag/pasar/komite',
               '/kabag/ppr',
               '/kabag/ppr/nasabah',
               '/kabag/ppr/proposal',
               '/kabag/ppr/komite',
               '/kabag/p3k',
               '/kabag/p3k/nasabah',
               '/kabag/p3k/proposal',
               '/kabag/p3k/komite',
               '/kabag/ultra_mikro',
               '/kabag/ultra_mikro/nasabah',
               '/kabag/ultra_mikro/proposal',
               '/kabag/ultra_mikro/komite',
          ];

          $seenDetailTargets = [];

          foreach ($entryPoints as $path) {
               $response = $this->get($path);
               $this->assertLessThan(500, $response->getStatusCode(), "GET {$path} returned {$response->getStatusCode()}");

               // Try to discover detail pages from rendered HTML to test show pages with real IDs.
               $body = (string) $response->getContent();
               foreach ($this->extractDetailUrlsFromHtml($body) as $detailUrl) {
                    $seenDetailTargets[$detailUrl] = true;
               }
          }

          // 2) Hit discovered detail pages (limit so we don't explode runtime)
          $detailUrls = array_keys($seenDetailTargets);
          sort($detailUrls);
          $detailUrls = array_slice($detailUrls, 0, 50);

          foreach ($detailUrls as $url) {
               $response = $this->get($url);
               $this->assertLessThan(500, $response->getStatusCode(), "GET {$url} returned {$response->getStatusCode()}");
          }

          // 3) Generic safety: all Kabag GET routes that have no params should not 500.
          $allRoutes = Route::getRoutes();
          foreach ($allRoutes as $route) {
               $uri = $route->uri();
               if (!str_starts_with($uri, 'kabag')) {
                    continue;
               }

               $methods = $route->methods();
               if (!in_array('GET', $methods, true) && !in_array('HEAD', $methods, true)) {
                    continue;
               }

               if (str_contains($uri, '{')) {
                    continue; // handled via discovered detail URLs
               }

               $path = '/' . ltrim($uri, '/');
               $response = $this->get($path);
               $this->assertLessThan(500, $response->getStatusCode(), "Route GET {$path} returned {$response->getStatusCode()}");
          }
     }

     /**
      * Extract first-order Kabag detail URLs from HTML.
      * Keeps it conservative to avoid hitting destructive actions.
      *
      * @return list<string>
      */
     private function extractDetailUrlsFromHtml(string $html): array
     {
          $urls = [];

          // Match common resource show paths.
          $patterns = [
               '~href=["\"](/kabag/(?:skpd|umkm|pasar|ppr|p3k|ultra_mikro)/(?:nasabah|proposal|komite)/\d+)["\"]~i',
               '~href=["\"](/kabag/(?:skpd|umkm|pasar|ppr|p3k|ultra_mikro)/(?:nasabah|proposal|komite)/\d+/lihat)["\"]~i',
          ];

          foreach ($patterns as $pattern) {
               if (preg_match_all($pattern, $html, $matches)) {
                    foreach ($matches[1] as $match) {
                         // Avoid edit/create routes.
                         if (str_contains($match, '/edit') || str_contains($match, '/create')) {
                              continue;
                         }
                         $urls[] = $match;
                    }
               }
          }

          $urls = array_values(array_unique($urls));
          return $urls;
     }
}
