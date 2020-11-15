<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use App\Models\Service;
use App\Models\User;

class UploadServiceImageTest extends TestCase
{
    public function testServiceImageUpload()
    {
        Storage::fake('public');

        $file = UploadedFile::fake()->create('test.txt','1024');

        $service = Service::factory()->make()->toArray();
        
        $service['service_image'] = $file;
        
        $admin = User::factory()->create(['role' => 'admin']);
        $response = $this->actingAs($admin)
            ->post( route('services.store'), $service);

        $new_file_name = 'services_files/' . $file->hashName();
        $service['service_image'] = $new_file_name;

        // Assert the file was stored...
        Storage::disk('public')->assertExists($new_file_name);

        $this->assertDatabaseHas('services', $service);
    }
}
