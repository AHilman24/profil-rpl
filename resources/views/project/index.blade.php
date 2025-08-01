@extends('template.mix')
@section('content')
    @include('sweetalert::alert')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Project</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="#">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Project</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Management Project</h4>
                                <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal"
                                    data-bs-target="#addModal">
                                    <i class="fa fa-plus"></i>
                                    Add Data
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Thumbnail</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Tech Stack</th>
                                            <th>Link Preview</th>
                                            <th>Github Link</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($projects as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item->thumbnail }}</td>
                                                <td>{{ $item->title }}</td>
                                                {{-- filepath: d:\iman_folder\Laravel\RPLPORTOFOLIO\resources\views\project\index.blade.php --}}
                                                <td>
                                                    @php
                                                        $maxLength = 25;
                                                        $desc = $item->description;
                                                    @endphp
                                                    @if (strlen($desc) > $maxLength)
                                                        <span
                                                            id="desc-short-{{ $item->id }}">{{ Str::limit($desc, $maxLength) }}</span>
                                                        <span id="desc-full-{{ $item->id }}"
                                                            style="display:none;">{{ $desc }}</span>
                                                        <button type="button" class="btn btn-link p-0"
                                                            onclick="toggleDesc({{ $item->id }})"
                                                            id="btn-desc-{{ $item->id }}">Baca Selengkapnya</button>
                                                    @else
                                                        {{ $desc }}
                                                    @endif
                                                </td>
                                                <td>{{ $item->tech_stack }}</td>
                                                <td><a href="{{ $item->link_preview }}" target="_blank">{{ $item->link_preview }}</a></td>
                                                <td><a href="{{ $item->github_link }}" target="_blank">{{ $item->github_link }}</a></td>
                                                <td>{{ $item->status }}</td>
                                                {{-- <td>
                                                    <img src="{{ asset('images/achievements/' . $item->certificate_image) }}"
                                                        alt="Certificate Image" style="width: 50px; height: 50px; object-fit: cover;">
                                                </td> --}}
                                                <td>
                                                    <div class="d-flex">
                                                        <button type="button" data-bs-toggle="modal"
                                                            data-bs-target="#editModal{{ $item->id }}" title=""
                                                            class="btn btn-link btn-primary btn-lg"
                                                            data-original-title="Edit Task" style="cursor: pointer;">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <form id="deleteForm-{{ $item->id }}"
                                                            action="/achievement/delete/{{ $item->id }}"
                                                            method="POST">
                                                            @csrf
                                                            <button type="button" class="btn btn-link btn-danger pt-3"
                                                                onclick="confirmDelete({{ $item->id }})"
                                                                title="Remove">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
