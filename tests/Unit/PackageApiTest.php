<?php

namespace Tests\Unit;

use App\Models\Package;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PackageApiTest extends TestCase
{
    public function testGetAllPackage()
    {
        $this->getJson(route('api.package.index'))->assertStatus(200);
    }

    public function testGetByIdPackage()
    {
        $package = Package::take(1)->first();
        $this->getJson(route('api.package.show', $package->_id))->assertStatus(200);
    }

    public function testCreatePackage()
    {
        $json = Storage::disk('local')->get('public/sample-data.json');
        $data = json_decode($json, true);

        $this->postJson(route('api.package.store'), $data)->assertStatus(201);
    }

    public function testUpdatePackage()
    {
        $json = Storage::disk('local')->get('public/sample-data.json');
        $data = json_decode($json, true);

        $package = Package::take(1)->first();

        $this->putJson(route('api.package.update', $package->_id), $data)->assertStatus(200);
    }

    public function testUpdatePartialPackage()
    {
        $data = [
            'customer_name' => "PT TESTING UPDATE USING PATCH"
        ];
        $package = Package::take(1)->first();

        $this->patchJson(route('api.package.updatePartial', $package->_id), $data)->assertStatus(200);
    }

    public function testDeletePackage()
    {
        $package = Package::take(1)->first();

        $this->deleteJson(route('api.package.destroy', $package->_id))->assertStatus(200);
    }
}
