@extends('template.mix')
@section('content')
    @include('sweetalert::alert')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Achievement</h3>
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
                        <a href="#">Achievement</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Management Achievement</h4>
                                <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal"
                                    data-bs-target="#addRowModal">
                                    <i class="fa fa-plus"></i>
                                    Add Data
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Modal -->
                            <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header border">
                                            <h5 class="modal-title">
                                                <span class="fw-bold">Add New Achievement</span>
                                            </h5>
                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="/achievement/create" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-sm-12 mb-2">
                                                        <h6>Student Name</h6>
                                                        <input id="addName" name="name" type="text"
                                                            class="form-control" placeholder="fill name" />
                                                        {{-- <div class="form-group form-group-default">
                                                        </div> --}}
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 mb-2">
                                                        <h6>Title</h6>
                                                        <input id="addPosition" name="title" type="text"
                                                            class="form-control" placeholder="fill title" />
                                                        {{-- <div class="form-group form-group-default">
                                                        </div> --}}
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 mb-2">
                                                        <h6>Category</h6>
                                                        <input id="addCategory" name="category" type="text"
                                                            class="form-control" placeholder="fill category" />
                                                        {{-- <div class="form-group form-group-default">
                                                        </div> --}}
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 mb-2">
                                                        <h6>Year</h6>
                                                        <input id="addYear" name="year" type="number"
                                                            class="form-control" placeholder="e.g. 2025" min="1900"
                                                            max="2100" />
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 mb-2">
                                                        <h6>Level</h6>
                                                        <select id="addLevel" name="level" class="form-select form-control">
                                                            <option value="">Select level</option>
                                                            <option value="kabupaten">Kabupaten</option>
                                                            <option value="provinsi">Provinsi</option>
                                                            <option value="nasional">Nasional</option>
                                                            <option value="internasional">Internasional</option>
                                                        </select>
                                                        {{-- <div class="form-group form-group-default">
                                                        </div> --}}
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 mb-2">
                                                        <h6>Certificate</h6>
                                                        <input id="addCertificate" name="certificate_image" type="file"
                                                            class="form-control" placeholder="fill certificate" />
                                                        {{-- <div class="form-group form-group-default">
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer border w-100">
                                                <button type="submit" id="addRowButton" class="btn btn-primary w-100">
                                                    Add
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>



                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Student</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Level</th>
                                            <th>Year</th>
                                            <th>Certificate</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($achievements as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->category }}</td>
                                                <td>{{ $item->level }}</td>
                                                <td>{{ $item->year }}</td>
                                                <td>
                                                    {{-- @if ($item->foto)
                                                    <img src="{{ asset('storage/foto/' . $item->foto) }}" alt=""
                                                        style="width: 50px;height: 50px;object-fit: cover">
                                                @else
                                                    <img src="{{ asset('IMG-20231004-WA0088.jpg') }}" alt=""
                                                        style="width: 50px;height: 50px;object-fit: cover">
                                                @endif --}}
                                                    <img src="{{ asset('images/achievements/' . $item->certificate_image) }}"
                                                        alt="Certificate Image" style="width: 50px; height: 50px; object-fit: cover;">
                                                </td>
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
                                @foreach ($achievements as $item)
                                    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header border">
                                                    <h5 class="modal-title fw-bold">Edit Achievement</h5>
                                                    <button type="button" class="close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                        <span>&times;</span>
                                                    </button>
                                                </div>

                                                <form action="/achievement/edit/{{ $item->id }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    {{-- @method('PUT') --}}

                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-12 mb-2">
                                                                <h6>Student Name</h6>
                                                                <input name="name" type="text" class="form-control"
                                                                    value="{{ $item->name }}" required>
                                                            </div>
                                                            <div class="col-12 mb-2">
                                                                <h6>Title</h6>
                                                                <input name="title" type="text" class="form-control"
                                                                    value="{{ $item->title }}" required>
                                                            </div>
                                                            <div class="col-12 mb-2">
                                                                <h6>Category</h6>
                                                                <input name="category" type="text"
                                                                    class="form-control" value="{{ $item->category }}"
                                                                    required>
                                                            </div>
                                                            <div class="col-12 mb-2">
                                                                <h6>Year</h6>
                                                                <input name="year" type="number" min="1900"
                                                                    max="2100" class="form-control"
                                                                    value="{{ $item->year }}" required>
                                                            </div>
                                                            <div class="col-12 mb-2">
                                                                <h6>Level</h6>
                                                                <select name="level" class="form-select" required>
                                                                    <option value="">Select level</option>
                                                                    <option value="kabupaten"
                                                                        {{ $item->level === 'kabupaten' ? 'selected' : '' }}>
                                                                        Kabupaten</option>
                                                                    <option value="provinsi"
                                                                        {{ $item->level === 'provinsi' ? 'selected' : '' }}>
                                                                        Provinsi</option>
                                                                    <option value="nasional"
                                                                        {{ $item->level === 'nasional' ? 'selected' : '' }}>
                                                                        Nasional</option>
                                                                    <option value="internasional"
                                                                        {{ $item->level === 'internasional' ? 'selected' : '' }}>
                                                                        Internasional</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-12 mb-2">
                                                                <h6>Certificate</h6>
                                                                @if ($item->certificate_image)
                                                                        <img src="{{ asset('images/achievements/' . $item->certificate_image) }}"
                                                                            alt="Current Image"
                                                                            style="width: 100px; height: 100px; object-fit: cover; margin-bottom: 10px;">
                                                                    @endif
                                                                <input name="certificate_image" type="file"
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer border w-100">
                                                        <button type="submit" class="btn btn-primary w-100">Update</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
