@extends('layouts.admin')


@section('content')
    <div class="container">
        <!-- TITOLO - NUOVO TYPE - ALERT -->
        <div class="d-flex align-items-center justify-content-between">
            <h1 class="fs-2 py-2">My project types</h1>
            <a href="{{ route('admin.types.create') }}" class="btn btn-dark">New Type<i class="fa-solid fa-plus ms-3"></i></a>
        </div>
        @if (session('new_record'))
            <div class="alert alert-success" role="alert">
                {{ session('new_record') }}
            </div>
        @endif
        @if (session('delete_record'))
            <div class="alert alert-danger" role="alert">
                {{ session('delete_record') }}
            </div>
        @endif
        <!-- /TITOLO - NUOVO PROGETTO - ALERT -->
        <!-- TABLE-->
        <table class="table table-bordered table-dark table-striped text-center">
            <!-- TABLE HEAD-->
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Difficulty</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th></th>
                </tr>
            </thead>
            <!-- /TABLE HEAD-->
            <!-- TABLE BODY-->
            <tbody>
                @foreach ($types as $type)
                    <tr class="align-middle">
                        <td>{{ $type->id }}</th>
                        <td>{{ $type->difficulty }}</td>
                        <td>{{ $type->created_at }}</td>
                        <td>{{ $type->updated_at }}</td>
                        <td style="width: 30%">
                            <a href="{{ route('admin.types.show', $type) }}" class="btn btn-secondary btn-sm">Details
                                <i class="fa-solid fa-circle-info ms-1"></i></a>
                            <a href="{{ route('admin.types.edit', $type) }}" class="btn btn-primary btn-sm mx-2">Edit
                                <i class="fa-solid fa-pen-to-square ms-1"></i></a>
                            <!-- FORM CANCELLAZIONE RIGA  -->
                            <form action="{{ route('admin.types.destroy', $type) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <!-- BUTTON CHE APRE LA MODALE -->
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modale-delete{{ $type['id'] }}">
                                    Delete <i class="fa-solid fa-trash-can ms-1"></i>
                                </button>
                                <!-- /BUTTON CHE APRE LA MODALE -->
                                <!-- MODALE -->
                                <div class="modal fade" id="modale-delete{{ $type['id'] }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content text-black">
                                            <!-- MODALE HEADER -->
                                            <div class="modal-header">
                                                <h3 class="modal-title fs-5">Delete type of project Confirmation</h3>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <!-- /MODALE HEADER -->
                                            <!-- MODALE BODY -->
                                            <div class="modal-body text-start">
                                                <p>Are you sure you want to delete {{ $type['title'] }}?</p>
                                            </div>
                                            <!-- /MODALE BODY -->
                                            <!-- MODALE FOOTER -->
                                            <div class="modal-footer">
                                                <!-- BUTTON CHIUSURA MODALE -->
                                                <button type="button" class="btn btn-primary"
                                                    data-bs-dismiss="modal">No</button>
                                                <!-- /BUTTON CHIUSURA MODALE -->
                                                <!-- BUTTON SUBMIT FORM PER CANCELLARE RIGA -->
                                                <button type="submit" class="btn btn-danger">Yes</button>
                                                <!-- /BUTTON SUBMIT FORM PER CANCELLARE RIGA -->
                                            </div>
                                            <!-- /MODALE FOOTER -->
                                        </div>
                                    </div>
                                </div>
                                <!-- /MODALE -->
                            </form>
                            <!-- /FORM CANCELLAZIONE RIGA  -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <!-- /TABLE BODY-->
        </table>
        <!-- /TABLE-->
    </div>
@endsection
