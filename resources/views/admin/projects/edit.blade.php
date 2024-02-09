@extends('layouts.admin')


@section('content')
    <div class="container">
        <!-- TITOLO - TORNA AI PROGETTI -->
        <div class="d-flex align-items-center justify-content-between">
            <h1 class="fs-2 py-2">Edit {{ $project->slug }}</h1>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-dark">Back to Projects<i
                    class="fa-solid fa-backward ms-3"></i></a>
        </div>
        <!-- /TITOLO - TORNA AI PROGETTI -->
        <!-- FORM -->
        <form action="{{ route('admin.projects.update', $project) }}" method="POST">
            @csrf
            @method('PUT')
            <!-- TITOLO -->
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid  @enderror" id="title"
                    name="title" required value="{{ old('title', $project->title) }}">
            </div>
            @error('title')
                @foreach ($errors->get('title') as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endforeach
            @enderror
            <!-- TITOLO -->
            <!-- STACK -->
            <div class="mb-3">
                <label for="stack" class="form-label">Technologies Stack</label>
                <input type="text" class="form-control @error('technologies_stack') is-invalid  @enderror" id="stack"
                    name="technologies_stack" required
                    value="{{ old('technologies_stack', $project->technologies_stack) }}">
            </div>
            @error('technologies_stack')
                @foreach ($errors->get('technologies_stack') as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endforeach
            @enderror
            <!-- /STACK -->
            <!-- DESCRIPTION -->
            <div class="mb-3">
                <label for="description" class="form-label">Project Description</label>
                <textarea class="form-control @error('description') is-invalid  @enderror" style="height: 100px" id="description"
                    name="description" required>{{ old('description', $project->description) }}</textarea>
            </div>
            @error('description')
                @foreach ($errors->get('description') as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endforeach
            @enderror
            <!-- /DESCRIPTION -->
            <!-- TYPE RADIO -->
            <h5 class="fw-lighter">Project Type</h5>
            <div class="mb-2 form-check">
                <input type="radio" class="form-check-input" id="frontEnd" value="1" name="application_type"
                    required @if (old('application_type') === '1' || old('application_type', $project->is_frontend)) checked @endif>
                <label class="form-check-label" for="frontEnd">Front End</label>
            </div>
            <div class="mb-2 form-check">
                <input type="radio" class="form-check-input" id="backEnd" value="2" name="application_type"
                    @if (old('application_type') === '2' || old('application_type', $project->is_backend)) checked @endif>
                <label class="form-check-label" for="backEnd">Back End</label>
            </div>
            <div class="mb-4 form-check">
                <input type="radio" class="form-check-input" id="fullStack" value="3" name="application_type"
                    @if (old('application_type') === '3' || old('application_type', $project->is_monolith)) checked @endif>
                <label class="form-check-label" for="fullStack">Full Stack</label>
            </div>
            @error('application_type')
                @foreach ($errors->get('application_type') as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endforeach
            @enderror
            <!-- TYPE RADIO -->
            <!-- SUBMIT -->
            <button type="submit" class="btn btn-dark">Edit <i class="fa-regular fa-paper-plane ms-1"></i></button>
            <!-- /SUBMIT -->
        </form>
        <!-- /FORM -->
    </div>
@endsection
