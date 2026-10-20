<?php

namespace Tests\Feature;

use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CourseTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Course::create([
            'title' => 'Full Stack Web Development dengan Laravel 13',
            'slug' => 'full-stack-web-development-laravel-13',
            'instructor' => 'Sandhika Galih',
            'duration' => '36 Jam (8 Minggu)',
            'image' => 'course-laravel.svg',
            'price' => 350000,
            'category' => 'Web Development',
            'description' => 'Pelajari cara membangun aplikasi web modern berskala besar.',
        ]);

        Course::create([
            'title' => 'Python untuk Data Science',
            'slug' => 'python-untuk-data-science',
            'instructor' => 'Afif Efendi, M.Kom.',
            'duration' => '28 Jam (6 Minggu)',
            'image' => 'course-python.svg',
            'price' => 299000,
            'category' => 'Data Science',
            'description' => 'Kuasai analisis data dan visualisasi.',
        ]);
    }

    public function test_home_page_displays_platform_and_courses(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Platform Belajar Online');
        $response->assertSee('CourseHub');
        $response->assertSee('Full Stack Web Development dengan Laravel 13');
        $response->assertSee('Sandhika Galih');
        $response->assertSee('Login');
        $response->assertSee('Register');
    }

    public function test_course_detail_page_displays_complete_information(): void
    {
        $course = Course::first();

        // Test access by slug
        $response = $this->get('/courses/' . $course->slug);

        $response->assertStatus(200);
        $response->assertSee($course->title);
        $response->assertSee($course->instructor);
        $response->assertSee($course->duration);
        $response->assertSee($course->category);
        $response->assertSee('Rp 350.000');
        $response->assertSee($course->description);

        // Test fallback access by id also works
        $responseById = $this->get('/courses/' . $course->id);
        $responseById->assertStatus(200);
    }

    public function test_filter_by_category_works(): void
    {
        $response = $this->get('/?category=Web Development');

        $response->assertStatus(200);
        $response->assertSee('Full Stack Web Development dengan Laravel 13');
        $response->assertDontSee('Python untuk Data Science');
    }
}

