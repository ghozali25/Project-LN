<?php

namespace Database\Seeders;

use App\Models\Asset;
use App\Models\Location;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AssetSeeder extends Seeder
{
    private $admin;
    private $locationIds;
    private $supplierIds;

    public function run()
    {
        Asset::truncate();

        $this->ensureLocationsSeeded();
        $this->ensureSuppliersSeeded();

        $this->adminuser = User::where('permissions->superuser', '1')->first() ?? User::factory()->firstAdmin()->create();
        $this->locationIds = Location::all()->pluck('id');
        $this->supplierIds = Supplier::all()->pluck('id');

        Asset::factory()->count(2)->laptopMbp()->state(new Sequence($this->getState()))->create();
        Asset::factory()->count(2)->laptopMbpPending()->state(new Sequence($this->getState()))->create();
        Asset::factory()->count(2)->laptopMbpArchived()->state(new Sequence($this->getState()))->create();
        Asset::factory()->count(2)->laptopAir()->state(new Sequence($this->getState()))->create();
        Asset::factory()->count(2)->laptopSurface()->state(new Sequence($this->getState()))->create();
        Asset::factory()->count(2)->laptopXps()->state(new Sequence($this->getState()))->create();
        Asset::factory()->count(5)->laptopSpectre()->state(new Sequence($this->getState()))->create();
        Asset::factory()->count(1)->laptopZenbook()->state(new Sequence($this->getState()))->create();
        Asset::factory()->count(1)->laptopYoga()->state(new Sequence($this->getState()))->create();


        $del_files = Storage::files('assets');
        foreach ($del_files as $del_file) { // iterate files
            Log::debug('Deleting: ' . $del_files);
            try {
                Storage::disk('public')->delete('assets' . '/' . $del_files);
            } catch (\Exception $e) {
                Log::debug($e);
            }
        }

        DB::table('checkout_requests')->truncate();
    }

    private function ensureLocationsSeeded()
    {
        if (! Location::count()) {
            $this->call(LocationSeeder::class);
        }
    }

    private function ensureSuppliersSeeded()
    {
        if (! Supplier::count()) {
            $this->call(SupplierSeeder::class);
        }
    }

    private function getState()
    {
        return fn($sequence) => [
            'rtd_location_id' => $this->locationIds->random(),
            'supplier_id' => $this->supplierIds->random(),
            'created_by' => $this->adminuser->id,
        ];
    }
}
