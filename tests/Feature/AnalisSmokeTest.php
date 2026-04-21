<?php

namespace Tests\Feature;

use App\Models\User;
use Modules\Skpd\Entities\SkpdPembiayaanHistory;
use Tests\TestCase;

class AnalisSmokeTest extends TestCase
{
     public function test_analis_pages_do_not_500(): void
     {
          $user = User::query()->where('email', 'zainal.analis@bprsbtb.co.id')->first();

          if (!$user) {
               $this->markTestSkipped('User zainal.analis@bprsbtb.co.id not found in DB.');
          }

          $this->actingAs($user);

          $urls = [
               '/analis',
               '/analis/p3k',
               '/analis/p3k/proposal',
               '/analis/p3k/komite',
               '/analis/pasar',
               '/analis/pasar/proposal',
               '/analis/pasar/komite',
               '/analis/ppr',
               '/analis/ppr/proposal',
               '/analis/ppr/komite',
               '/analis/skpd',
               '/analis/skpd/proposal',
               '/analis/skpd/komite',
               '/analis/ultra_mikro',
               '/analis/ultra_mikro/proposal',
               '/analis/ultra_mikro/komite',
               '/analis/umkm',
               '/analis/umkm/proposal',
               '/analis/umkm/komite',
          ];

          foreach ($urls as $url) {
               $response = $this->get($url);

               $this->assertTrue(
                    $response->status() < 500,
                    sprintf('Expected %s to be < 500, got %s', $url, $response->status())
               );

               if ($response->status() === 200 && str_ends_with($url, '/proposal')) {
                    $response->assertSee('datatables-basic', false);
               }
          }

          $skpdKomite = SkpdPembiayaanHistory::query()
               ->where('status_id', 11)
               ->where('jabatan_id', 3)
               ->latest('id')
               ->first();

          if ($skpdKomite) {
               $detail = $this->get('/analis/skpd/komite/' . $skpdKomite->skpd_pembiayaan_id);
               $this->assertTrue(
                    $detail->status() < 500,
                    sprintf('Expected SKPD komite detail to be < 500, got %s', $detail->status())
               );
               if ($detail->status() === 200) {
                    $detail->assertSee('Tanggal Pengajuan', false);
                    $detail->assertSee('Proposal Pengajuan Pembiayaan', false);
               }
          }
     }
}
