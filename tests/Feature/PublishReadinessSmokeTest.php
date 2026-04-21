<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Tests\TestCase;

class PublishReadinessSmokeTest extends TestCase
{
     private function qaUser(string $email, string $name, int $roleId, int $divisiId, int $jabatanId): User
     {
          $user = User::query()->firstOrCreate(
               ['email' => $email],
               ['name' => $name, 'password' => bcrypt('qa123456')]
          );

          if (!$user->hasVerifiedEmail()) {
               $user->forceFill(['email_verified_at' => now()])->save();
          }

          Role::query()->updateOrCreate(
               ['user_id' => $user->id],
               ['role_id' => $roleId, 'divisi_id' => $divisiId, 'jabatan_id' => $jabatanId]
          );

          return $user;
     }

     private function assertUrlsOk(array $urls): void
     {
          foreach ($urls as $url) {
               $response = $this->get($url);

               $this->assertTrue(
                    $response->status() < 500,
                    sprintf('Expected %s to be < 500, got %s', $url, $response->status())
               );

               if ($response->status() === 200 && (Str::endsWith($url, '/proposal') || Str::endsWith($url, '/komite'))) {
                    $response->assertSee('datatables-basic', false);
               }
          }
     }

     public function test_key_role_pages_do_not_500(): void
     {
          // Admin
          $admin = $this->qaUser('qa.admin@local.test', 'QA Admin', 1, 0, 0);
          $this->actingAs($admin);
          $this->assertUrlsOk([
               '/admin',
               '/admin/user',
               '/admin/status',
          ]);

          // Staff Akad
          $staff = $this->qaUser('qa.staff@local.test', 'QA Staff', 1, 5, 1);
          $this->actingAs($staff);
          $this->assertUrlsOk([
               '/staff',
               '/staff/proposal',
               '/staff/register-akad',
               '/staff/selesai',
          ]);

          // Kabag
          $kabag = $this->qaUser('qa.kabag@local.test', 'QA Kabag', 2, 0, 2);
          $this->actingAs($kabag);
          $this->assertUrlsOk([
               '/kabag',
               '/kabag/skpd/proposal',
               '/kabag/skpd/komite',
               '/kabag/umkm/proposal',
               '/kabag/umkm/komite',
               '/kabag/pasar/proposal',
               '/kabag/pasar/komite',
               '/kabag/ppr/proposal',
               '/kabag/ppr/komite',
               '/kabag/p3k/proposal',
               '/kabag/p3k/komite',
               '/kabag/ultra_mikro/proposal',
               '/kabag/ultra_mikro/komite',
          ]);

          // Analis
          $analis = $this->qaUser('qa.analis@local.test', 'QA Analis', 2, 0, 3);
          $this->actingAs($analis);
          $this->assertUrlsOk([
               '/analis',
               '/analis/skpd/proposal',
               '/analis/skpd/komite',
               '/analis/umkm/proposal',
               '/analis/umkm/komite',
               '/analis/pasar/proposal',
               '/analis/pasar/komite',
               '/analis/ppr/proposal',
               '/analis/ppr/komite',
               '/analis/p3k/proposal',
               '/analis/p3k/komite',
               '/analis/ultra_mikro/proposal',
               '/analis/ultra_mikro/komite',
          ]);

          // Dirbis
          $dirbis = $this->qaUser('qa.dirbis@local.test', 'QA Dirbis', 2, 0, 4);
          $this->actingAs($dirbis);
          $this->assertUrlsOk([
               '/dirbis',
               '/dirbis/skpd/proposal',
               '/dirbis/skpd/komite',
               '/dirbis/umkm/proposal',
               '/dirbis/umkm/komite',
               '/dirbis/pasar/proposal',
               '/dirbis/pasar/komite',
               '/dirbis/ppr/proposal',
               '/dirbis/ppr/komite',
               '/dirbis/p3k/proposal',
               '/dirbis/p3k/komite',
          ]);

          // Dirut
          $dirut = $this->qaUser('qa.dirut@local.test', 'QA Dirut', 2, 0, 5);
          $this->actingAs($dirut);
          $this->assertUrlsOk([
               '/dirut',
               '/dirut/skpd',
               '/dirut/umkm',
               '/dirut/pasar',
               '/dirut/ppr',
          ]);
     }
}
