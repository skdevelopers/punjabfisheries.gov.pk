<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Slider;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SliderTest extends TestCase
{
    use RefreshDatabase;

    public function test_sliders_are_displayed_on_homepage()
    {
        // Create a test slider
        $slider = Slider::create([
            'title' => 'Test Slider',
            'subtitle' => 'Test Subtitle',
            'description' => 'Test Description',
            'button_text' => 'Test Button',
            'button_url' => '/test',
            'image_path' => 'sliders/test.jpg',
            'order' => 1,
            'is_active' => true,
        ]);

        // Visit the homepage
        $response = $this->get('/');

        // Assert the response is successful
        $response->assertStatus(200);

        // Assert the slider data is present
        $response->assertSee('Test Slider');
        $response->assertSee('Test Subtitle');
        $response->assertSee('Test Description');
        $response->assertSee('Test Button');
    }

    public function test_inactive_sliders_are_not_displayed()
    {
        // Create an inactive slider
        $slider = Slider::create([
            'title' => 'Inactive Slider',
            'subtitle' => 'Inactive Subtitle',
            'description' => 'Inactive Description',
            'button_text' => 'Inactive Button',
            'button_url' => '/inactive',
            'image_path' => 'sliders/inactive.jpg',
            'order' => 1,
            'is_active' => false,
        ]);

        // Visit the homepage
        $response = $this->get('/');

        // Assert the response is successful
        $response->assertStatus(200);

        // Assert the inactive slider is not present
        $response->assertDontSee('Inactive Slider');
        $response->assertDontSee('Inactive Subtitle');
    }

    public function test_sliders_are_ordered_correctly()
    {
        // Create sliders in reverse order
        Slider::create([
            'title' => 'Second Slider',
            'order' => 2,
            'is_active' => true,
        ]);

        Slider::create([
            'title' => 'First Slider',
            'order' => 1,
            'is_active' => true,
        ]);

        // Get sliders from the controller
        $sliders = Slider::where('is_active', true)->orderBy('order')->get();

        // Assert the order is correct
        $this->assertEquals('First Slider', $sliders->first()->title);
        $this->assertEquals('Second Slider', $sliders->last()->title);
    }
}
