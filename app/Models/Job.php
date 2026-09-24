<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Job
{
    public static function all(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'Full Stack Developer',
                'salary' => 6000,
                'company' => 'Tailwind Labs',
                'location' => 'Remote',
                'type' => 'Full-time',
                'description' => 'We are looking for a Full Stack Developer who can build modern web applications from backend APIs to responsive user interfaces.',
                'requirements' => [
                    'Good knowledge of PHP and Laravel',
                    'Experience with JavaScript and modern frontend development',
                    'Experience with SQL databases such as MySQL or PostgreSQL',
                    'Knowledge of Git and Docker',
                ],
            ],
            [
                'id' => 2,
                'title' => 'Back End Developer',
                'salary' => 4900,
                'company' => 'Backend Studio',
                'location' => 'Baku, Azerbaijan',
                'type' => 'Hybrid',
                'description' => 'Join our backend team to design reliable APIs, business logic, database structures, and scalable Laravel services.',
                'requirements' => [
                    'Strong PHP and Laravel fundamentals',
                    'Experience creating REST APIs',
                    'Good understanding of relational databases and SQL',
                    'Experience with Git and Linux is a plus',
                ],
            ],
            [
                'id' => 3,
                'title' => 'Front End Developer',
                'salary' => 3900,
                'company' => 'Pixel Studio',
                'location' => 'Remote',
                'type' => 'Contract',
                'description' => 'We need a Front End Developer to build polished interfaces with accessible HTML, Tailwind CSS, JavaScript, and modern frontend tooling.',
                'requirements' => [
                    'Strong HTML, CSS, and JavaScript skills',
                    'Experience with Tailwind CSS',
                    'Attention to responsive and accessible UI design',
                    'Experience working with REST APIs',
                ],
            ],
            [
                'id' => 4,
                'title' => 'DevOps Engineer',
                'salary' => 3980,
                'company' => 'CloudOps',
                'location' => 'Remote',
                'type' => 'Full-time',
                'description' => 'Help our engineering team deploy, monitor, secure, and scale Docker-based applications and Linux infrastructure.',
                'requirements' => [
                    'Experience with Docker and Docker Compose',
                    'Linux server administration knowledge',
                    'Knowledge of Nginx and reverse proxies',
                    'Familiarity with CI/CD concepts and Git workflows',
                ],
            ],
        ];
    }

    public static function find(int $id): array
    {
        $job = Arr::first(static::all(), fn ($job) => $job['id'] === $id);

        abort_unless($job, 404);

        return $job;

    }
}

