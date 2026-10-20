<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::truncate();

        $courses = [
            [
                'title' => 'Full Stack Web Development dengan Laravel 13 & Vue 3',
                'instructor' => 'Sandhika Galih',
                'duration' => '36 Jam (8 Minggu)',
                'image' => 'course-laravel.svg',
                'price' => 350000,
                'category' => 'Web Development',
                'description' => 'Pelajari cara membangun aplikasi web modern berskala besar dari nol hingga tahap deployment menggunakan Laravel 13 dan Vue.js 3 secara terstruktur.',
            ],
            [
                'title' => 'Python untuk Data Science & Machine Learning',
                'instructor' => 'Afif Efendi, M.Kom.',
                'duration' => '28 Jam (6 Minggu)',
                'image' => 'course-python.svg',
                'price' => 299000,
                'category' => 'Data Science',
                'description' => 'Kuasai analisis data, visualisasi dengan Pandas & Matplotlib, hingga membangun model machine learning prediktif menggunakan scikit-learn.',
            ],
            [
                'title' => 'UI/UX Design Mastery dari Wireframe ke Prototype Interaktif',
                'instructor' => 'Sarah Amanda, S.Kom.',
                'duration' => '20 Jam (4 Minggu)',
                'image' => 'course-uiux.svg',
                'price' => 220000,
                'category' => 'UI/UX Design',
                'description' => 'Panduan komprehensif riset pengguna, perancangan design system, serta pembuatan prototype interaktif profesional menggunakan Figma.',
            ],
            [
                'title' => 'Flutter & Dart: Bangun Aplikasi Mobile iOS & Android',
                'instructor' => 'Dimas Arya',
                'duration' => '32 Jam (7 Minggu)',
                'image' => 'course-flutter.svg',
                'price' => 325000,
                'category' => 'Mobile Development',
                'description' => 'Membangun aplikasi mobile multiplatform dengan satu codebase Flutter, integrasi REST API, state management Bloc/Riverpod, dan publishing.',
            ],
            [
                'title' => 'DevOps & Containerization dengan Docker & CI/CD Pipeline',
                'instructor' => 'Rizky Pratama',
                'duration' => '24 Jam (5 Minggu)',
                'image' => 'course-devops.svg',
                'price' => 450000,
                'category' => 'Cloud & DevOps',
                'description' => 'Automasi alur deployment perangkat lunak menggunakan Docker container, GitHub Actions, serta pengenalan deployment cloud server modern.',
            ],
            [
                'title' => 'Cyber Security Fundamentals & Ethical Hacking Praktis',
                'instructor' => 'Ahmad Fauzi, CEH',
                'duration' => '26 Jam (6 Minggu)',
                'image' => 'course-security.svg',
                'price' => 380000,
                'category' => 'Cyber Security',
                'description' => 'Pelajari konsep dasar keamanan siber, teknik vulnerability assessment, penetration testing beretika, serta mitigasi ancaman web.',
            ],
            [
                'title' => 'Database Design, Optimization & SQL Mastery (MySQL/PostgreSQL)',
                'instructor' => 'Budi Santoso, M.Kom.',
                'duration' => '18 Jam (4 Minggu)',
                'image' => 'course-sql.svg',
                'price' => 180000,
                'category' => 'Database',
                'description' => 'Mendalami perancangan relasi database efisien, normalisasi tingkat lanjut, teknik indexing, serta optimasi query kompleks untuk aplikasi skala besar.',
            ],
            [
                'title' => 'React.js & Next.js Modern Frontend Architecture',
                'instructor' => 'Nadia Utami',
                'duration' => '30 Jam (6 Minggu)',
                'image' => 'course-react.svg',
                'price' => 310000,
                'category' => 'Web Development',
                'description' => 'Kuasai Server-Side Rendering (SSR), Static Site Generation (SSG), React Server Components, serta optimasi performa web menggunakan Next.js.',
            ],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}
