@extends('layouts.admin')


@section('content')
    <div class="container">
        <!-- TITOLO - TORNA AI PROGETTI -->
        <div class="d-flex align-items-center justify-content-between">
            <h1 class="fs-2 py-2">New Project</h1>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-dark">Back to Projects<i
                    class="fa-solid fa-backward ms-3"></i></a>
        </div>
        <!-- /TITOLO - TORNA AI PROGETTI -->
        <!-- FORM -->
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- TITOLO -->
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid  @enderror" id="title"
                    name="title" required value="{{ old('title') }}">
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
                    name="technologies_stack" required value="{{ old('technologies_stack') }}">
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
                    name="description" required>{{ old('description') }}</textarea>
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
            <h5 class="fs-6 mb-2">Project Type</h5>
            <div class="mb-2 form-check">
                <input type="radio" class="form-check-input" id="frontEnd" value="1" name="application_type"
                    required @if (old('application_type') === '1') checked @endif>
                <label class="form-check-label" for="frontEnd">Front End</label>
            </div>
            <div class="mb-2 form-check">
                <input type="radio" class="form-check-input" id="backEnd" value="2" name="application_type"
                    @if (old('application_type') === '2') checked @endif>
                <label class="form-check-label" for="backEnd">Back End</label>
            </div>
            <div class="mb-3 form-check">
                <input type="radio" class="form-check-input" id="fullStack" value="3" name="application_type"
                    @if (old('application_type') === '3') checked @endif>
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
            <!-- UPLOAD IMMAGINE -->
            <div class="mb-4">
                <label class="form-label" for="project_img">Project Picture</label>
                <input type="file" class="form-control" id="project_img" name="project_img">
            </div>
            <!-- /UPLOAD IMMAGINE -->
            @error('project_img')
                @foreach ($errors->get('project_img') as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endforeach
            @enderror
            <!-- SUBMIT -->
            <button type="submit" class="btn btn-dark">Create <i class="fa-regular fa-paper-plane ms-1"></i></button>
            <!-- /SUBMIT -->
        </form>
        <!-- /FORM -->
    </div>
@endsection
