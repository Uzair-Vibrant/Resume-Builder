<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resume;
use App\Models\WorkExperience;
use App\Models\Education;
use App\Models\Skill;
use App\Models\ResumeTemplate;

class ResumeController extends Controller
{
    // Dashboard showing all resumes
    public function index()
    {
        $resumes = auth()->user()->resumes;
        return view('user-dashboard.resume.index', compact('resumes'));
    }

    // Show builder step
    public function create($step = 1)
    {
        $resume = session('resume_data', []);
        $templates = ResumeTemplate::all();
        return view('user-dashboard.resume.builder', compact('step', 'resume', 'templates'));
    }

    // Save step to session
    public function saveStep(Request $request)
    {
        $step = $request->step;

        $data = session('resume_data', []);

        switch ($step) {
            case 1:
                $request->validate([
                    'full_name' => 'required|string',
                    'email' => 'required|email',
                    'phone' => 'nullable|string',
                    'location' => 'nullable|string',
                    'linkedin' => 'nullable|url',
                    'website' => 'nullable|url'
                ]);
                $data['contact'] = $request->only(['full_name', 'email', 'phone', 'location', 'linkedin', 'website']);
                break;

            case 2:
                $data['summary'] = $request->input('summary');
                break;

            case 3:
                $data['experiences'] = $request->input('experiences', []);
                break;

            case 4:
                $data['educations'] = $request->input('educations', []);
                break;

            case 5:
                $data['skills'] = $request->input('skills', []);
                break;

            case 6:
                $request->validate([
                    'template' => 'required|string',
                    'title' => 'required|string'
                ]);
                $data['template'] = $request->template;
                $data['title'] = $request->title;
                break;
        }

        session(['resume_data' => $data]);

        // Redirect to next step
        return redirect()->route('resume.builder', ['step' => $step + 1]);
    }

    // Store all data to database
    public function store(Request $request)
    {
        $data = session('resume_data');

        if (!$data) {
            return redirect()->route('user-dashboard.resume.builder')->with('error', 'No data to save.');
        }

        // Validate final required fields
        $validated = validator($data, [
            'contact.full_name' => 'required|string',
            'contact.email' => 'required|email',
            'contact.phone' => 'required|string',
            'contact.location' => 'required|string',
            'contact.linkedin' => 'required|url',
            'contact.website' => 'required|url',
            'summary' => 'required|string',
            'template' => 'required|string',
            'title' => 'required|string'
        ])->validate();

        $resume = auth()->user()->resumes()->create([
            'full_name' => $data['contact']['full_name'],
            'email' => $data['contact']['email'],
            'phone' => $data['contact']['phone'],
            'location' => $data['contact']['location'],
            'linkedin' => $data['contact']['linkedin'],
            'website' => $data['contact']['website'],
            'summary' => $data['summary'],
            'template' => $data['template'],
            'title' => $data['title'],
        ]);

        // Save experiences
        if (!empty($data['experiences'])) {
            foreach ($data['experiences'] as $exp) {
                $resume->workExperiences()->create($exp);
            }
        }

        // Save educations
        if (!empty($data['educations'])) {
            foreach ($data['educations'] as $edu) {
                $resume->educations()->create($edu);
            }
        }

        // Save skills
        if (!empty($data['skills'])) {
            foreach ($data['skills'] as $skill) {
                $resume->skills()->create($skill);
            }
        }

        // Clear session
        session()->forget('resume_data');

        return redirect()->route('resumes.index')->with('success', 'Resume created successfully!');
    }

    public function edit(Resume $resume)
    {
        return view('resume.edit', compact('resume'));
    }

    public function update(Request $request, Resume $resume)
    {
        $data = $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'location' => 'nullable|string',
            'linkedin' => 'nullable|url',
            'website' => 'nullable|url',
            'summary' => 'nullable|string',
            'template' => 'required|string',
            'title' => 'required|string'
        ]);

        $resume->update($data);
        return redirect()->route('resumes.index')->with('success', 'Resume updated!');
    }

    public function destroy(Resume $resume)
    {
        $resume->delete();
        return redirect()->route('resumes.index')->with('success', 'Resume deleted!');
    }
}
