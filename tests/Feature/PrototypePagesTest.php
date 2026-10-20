<?php

namespace Tests\Feature;

use Tests\TestCase;

class PrototypePagesTest extends TestCase
{
    public function test_public_and_workspace_screens_render_without_authentication(): void
    {
        $pages = [
            '/' => 'A clear path to your',
            '/demo/sign-in' => 'Sign in',
            '/student' => 'Student ID overview',
            '/student/application' => 'Share your details',
            '/track' => 'Track an application',
            '/registrar' => 'Application review queue',
            '/administrator' => 'Administration overview',
        ];

        foreach ($pages as $path => $heading) {
            $response = $this->get($path);

            $response->assertOk();
            $response->assertSee($heading);
            $response->assertSee('src="'.asset('images/cvsu-logo-transparent.png').'"', false);
            $response->assertSee('alt="Cavite State University seal"', false);
            $response->assertDontSee('DEMO-2026-');
            $response->assertDontSee('Andrea Sample Student');
        }
    }

    public function test_tracking_page_explains_that_no_application_lookup_is_performed(): void
    {
        $response = $this->get('/track');

        $response->assertOk();
        $response->assertSee('No search is performed or sent from this page.');
        $response->assertSee('not the progress of an individual application.');
        $response->assertDontSee('Under review');
        $response->assertDontSee('DEMO-2026-');
    }

    public function test_application_form_has_no_prefilled_student_information(): void
    {
        $response = $this->get('/student/application');

        $response->assertOk();
        $response->assertSee('Do not enter real student information');
        $response->assertDontSee('Andrea Sample Student');
        $response->assertDontSee('DEMO-2026-');
        $response->assertDontSee('andrea.demo@example.test');
    }

    public function test_workspaces_report_records_as_unavailable_instead_of_showing_fabricated_data(): void
    {
        foreach ([
            '/student' => 'No profile lookup is performed.',
            '/registrar' => 'Application records are not connected',
            '/administrator' => 'No account directory is connected',
        ] as $path => $message) {
            $response = $this->get($path);

            $response->assertOk();
            $response->assertSee($message);
            $response->assertDontSee('Sample Student');
            $response->assertDontSee('DEMO-2026-');
        }
    }

    public function test_student_workspace_marks_only_the_current_route_active(): void
    {
        $response = $this->get('/student/application');

        $response->assertOk();

        preg_match_all(
            '/<a\b(?=[^>]*\bclass="workspace-link is-active")(?=[^>]*\bhref="([^"]+)")[^>]*>/s',
            $response->getContent(),
            $activeLinks,
        );

        $this->assertSame([route('student.application.create')], $activeLinks[1]);
    }
}
