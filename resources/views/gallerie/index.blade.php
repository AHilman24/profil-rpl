@extends('template.mix')
@section('content')
    @include('sweetalert::alert')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Galleries</h3>
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
                        <a href="#">Galleries</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Management Gallerie</h4>
                                <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal"
                                    data-bs-target="#addRowModal">
                                    <i class="fa fa-plus"></i>
                                    Add Data
                                </button>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header border">
                                            <h5 class="modal-title">
                                                <span class="fw-bold">Add New Gallerie</span>
                                            </h5>
                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="/gallerie/create" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 mb-2">
                                                        <h6>Title</h6>
                                                        <input id="addPosition" name="title" type="text"
                                                            class="form-control" placeholder="fill title" />
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 mb-2">
                                                        <h6>Image</h6>
                                                        <input id="addCertificate" name="image" type="file"
                                                            class="form-control" placeholder="fill image" />
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-sm-12 mb-2">
                                                        <h6>Description</h6>
                                                        <textarea name="description" class="form-control" placeholder="fill description" id="" cols="30"
                                                            rows="10"></textarea>
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
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($galleries as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>
                                                    <img src="{{ asset('images/galleries/' . $item->image) }}"
                                                        alt="Gallery Image"
                                                        style="width: 70px; height: 70px; object-fit: cover;">
                                                </td>
                                                <td>{{ $item->title }}</td>
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
                                                <td>
                                                    <div class="d-flex">
                                                        <button type="button" data-bs-toggle="modal"
                                                            data-bs-target="#editModal{{ $item->id }}" title=""
                                                            class="btn btn-link btn-primary btn-lg"
                                                            data-original-title="Edit Task" style="cursor: pointer;">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <form id="deleteForm-{{ $item->id }}"
                                                            action="/gallerie/delete/{{ $item->id }}" method="POST">
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
                                    @foreach ($galleries as $item)
                                        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header border">
                                                        <h5 class="modal-title fw-bold">Edit Gallerie</h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <span>&times;</span>
                                                        </button>
                                                    </div>

                                                    <form action="/gallerie/edit/{{ $item->id }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        {{-- @method('PUT') --}}

                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 mb-2">
                                                                    <h6>Title</h6>
                                                                    <input id="addPosition" name="title" type="text"
                                                                        class="form-control" value="{{ $item->title }}"
                                                                        placeholder="fill title" />
                                                                </div>
                                                                <div class="col-md-12 col-sm-12 mb-2">
                                                                    <h6>Image</h6>
                                                                    @if ($item->image)
                                                                        <img src="{{ asset('images/galleries/' . $item->image) }}"
                                                                            alt="Current Image"
                                                                            style="width: 100px; height: 100px; object-fit: cover; margin-bottom: 10px;">
                                                                    @endif
                                                                    <input id="addCertificate" name="image"
                                                                        type="file" class="form-control"
                                                                        placeholder="fill image" />
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-sm-12 mb-2">
                                                                    <h6>Description</h6>
                                                                    <textarea name="description" class="form-control" placeholder="fill description" id="" cols="30"
                                                                        rows="10">{{ $item->description }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer border w-100">
                                                            <button type="submit"
                                                                class="btn btn-primary w-100">Update</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
