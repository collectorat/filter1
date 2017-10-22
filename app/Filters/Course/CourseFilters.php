<?php

namespace App\Filters\Course;

use App\Filters\FiltersAbstract;
use App\Subject;

use App\Filters\Course\{
    AccessFilter,
    DifficultyFilter,
    StartedFilter,
    SubjectFilter,
    TypeFilter,
    Ordering\ViewsOrder
};

class CourseFilters extends FiltersAbstract
{
    /**
     * Default course filters.
     *
     * @var array
     */
    protected $filters = [
        'access' => AccessFilter::class,
        'difficulty' => DifficultyFilter::class,
        'started' => StartedFilter::class,
        'subject' => SubjectFilter::class,
        'type' => TypeFilter::class,
        'views' => ViewsOrder::class
    ];

    public static function mappings()
    {
        $map = [
            'access' => [
                'free' => 'Free',
                'premium' => 'Premium',
            ],
            'difficulty' => [
                'beginner' => 'Beginner',
                'intermediate' => 'Intermediate',
                'advanced' => 'Advanced',
            ],
            'type' => [
                'snippet' => 'Snippet',
                'project' => 'Project',
                'theory' => 'Theory',
            ],
            'subjects' => Subject::get()->pluck('name', 'slug')->toArray()
        ];

        if (auth()->check()) {
            $map = array_merge($map, [
                'started' => [
                    'true' => 'Started',
                    'false' => 'Not started',
                ]
            ]);
        }

        return $map;
    }
}
