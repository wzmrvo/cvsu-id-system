<?php

namespace Tests\Feature;

use Tests\TestCase;

class PrototypePagesTest extends TestCase
{
    public function test_demo_screens_render_for_exploration_without_authentication(): void
    {
        $pages = [
            '/' => 'A simpler path to your',
            '/demo/sign-in' => 'Demo sign in',
            '/student' => 'Good morning, Andrea',
            '/student/application' => 'Share your details',
            '/track' => 'Check your demo status',
            '/registrar' => 'Application review queue',
            '/administrator' => 'Administration overview',
        ];

        foreach ($pages as $path => $heading) {
            $response = $this->get($path);

            $response->assertOk();
            $response->assertSee($heading);
        }
    }
}
