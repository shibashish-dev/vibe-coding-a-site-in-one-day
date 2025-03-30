<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Circulars extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $circularLinks = [
            'Rigging & Slinging' => 'https://example.com/rigging-slinging',
            'Type D Option Exercise March 2' => 'https://example.com/type-d-option-exercise',
            'March-2025 HRD Seminar' => 'https://example.com/hrd-seminar-march-2025',
            'Data-Intensive Applications' => 'https://example.com/data-intensive-applications',
            'Security Awareness' => 'https://example.com/security-awareness',
            'Advanced AI Techniques' => 'https://example.com/advanced-ai-techniques',
            'Cloud Computing Basics' => 'https://example.com/cloud-computing-basics',
            'Cybersecurity Essentials' => 'https://example.com/cybersecurity-essentials',
            'Blockchain for Beginners' => 'https://example.com/blockchain-for-beginners',
            'Machine Learning Models' => 'https://example.com/machine-learning-models',
            'DevOps Best Practices' => 'https://example.com/devops-best-practices',
            'Web Development Trends' => 'https://example.com/web-development-trends',
            'Digital Marketing 101' => 'https://example.com/digital-marketing-101',
            'Big Data Analytics' => 'https://example.com/big-data-analytics',
            'IoT Innovations' => 'https://example.com/iot-innovations',
        ];

        return view('components.circulars',compact('circularLinks'));
    }
}
