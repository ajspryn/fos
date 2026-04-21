<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\User;
use Tests\TestCase;

class KabagSmokeTest extends TestCase
{
     public function test_kabag_pages_do_not_500(): void
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

          $urls = [
               '/kabag',
               '/kabag/skpd',
               '/kabag/skpd/proposal',
               '/kabag/skpd/komite',
               '/kabag/umkm',
               '/kabag/umkm/proposal',
               '/kabag/umkm/komite',
               '/kabag/pasar',
               '/kabag/pasar/proposal',
               '/kabag/pasar/komite',
               '/kabag/ppr',
               '/kabag/ppr/proposal',
               '/kabag/ppr/komite',
               '/kabag/p3k',
               '/kabag/p3k/proposal',
               '/kabag/p3k/komite',
               '/kabag/ultra_mikro',
               '/kabag/ultra_mikro/proposal',
               '/kabag/ultra_mikro/komite',
          ];

          foreach ($urls as $url) {
               $response = $this->get($url);

               $this->assertTrue(
                    $response->status() < 500,
                    sprintf('Expected %s to be < 500, got %s', $url, $response->status())
               );
          }
     }
}
