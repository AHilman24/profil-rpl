@extends('template.mix')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
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
                            <!-- Modal Tambah Project -->
                            <div class="modal fade" id="addModal" aria-hidden="false" aria-labelledby="addModalLabel">
                                <div class="modal-dialog modal-lg">
                                    <form action="/project/create" method="POST" enctype="multipart/form-data"
                                        class="modal-content">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addModalLabel">Tambah Project</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body row g-3">
                                            <div class="col-md-6">
                                                <label class="form-label">Judul</label>
                                                <input type="text" name="title" class="form-control" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Type</label>
                                                <select name="type" class="form-select form-control" id="">
                                                    <option value="website">Website</option>
                                                    <option value="mobile_application">Mobile Application</option>
                                                    <option value="ui_ux_design">UI/UX Design</option>
                                                    <option value="desktop_application">Desktop Application</option>
                                                    <option value="iot_project">IOT Project</option>
                                                    <option value="game">Game</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label">Thumbnail</label>
                                                <input type="file" name="thumbnail" class="form-control">
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label">Deskripsi</label>
                                                <textarea name="description" class="form-control" rows="3" required></textarea>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label">Tech Stack</label>
                                                <div id="tech-stack-wrapper">
                                                    <div class="input-group mb-2">
                                                        <input type="text" name="tech_stack[]" class="form-control"
                                                            placeholder="Contoh: Laravel" required>
                                                        <button type="button" class="btn btn-success add-stack">+</button>
                                                    </div>
                                                </div>
                                                <small class="text-muted">Klik + untuk menambah Tech Stack baru.</small>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">Link Preview</label>
                                                <input type="text" name="link_preview" class="form-control"
                                                    placeholder="https://">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Github Link</label>
                                                <input type="text" name="github_link" class="form-control"
                                                    placeholder="https://github.com/...">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Status</label>
                                                <select name="status" class="form-select" required>
                                                    <option value="draft">Draft</option>
                                                    <option value="published">Published</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
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
                                            <th>Type</th>
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
                                                <td>
                                                    <img src="{{ asset('images/projects/' . $item->thumbnail) }}"
                                                        alt="Projects Image"
                                                        style="width: 70px; height: 70px; object-fit: cover;">
                                                </td>
                                                <td>{{ $item->title }}</td>
                                                @php
                                                    $typeLabels = [
                                                        'ui_ux_design' => 'UI/UX Design',
                                                        'mobile_application' => 'Mobile Application',
                                                        'iot_project' => 'IOT Project',
                                                        'website' => 'Website',
                                                        'game' => 'Game',
                                                        'desktop_application'=>'Desktop Application'
                                                    ];
                                                @endphp
                                                <td>{{ $typeLabels[$item->type] ?? '' }}</td>
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
                                                <td><a href="{{ $item->link_preview }}"
                                                        target="_blank">{{ $item->link_preview }}</a></td>
                                                <td><a href="{{ $item->github_link }}"
                                                        target="_blank">{{ $item->github_link }}</a></td>
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
                                                        <!-- Modal Edit -->
                                                        <div class="modal fade" id="editModal{{ $item->id }}"
                                                            tabindex="-1">
                                                            <div class="modal-dialog modal-lg">
                                                                <form action="/project/edit/{{ $item->id }}"
                                                                    method="POST" enctype="multipart/form-data"
                                                                    class="modal-content">
                                                                    @csrf
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Edit Project</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"></button>
                                                                    </div>
                                                                    <div class="modal-body row g-3">
                                                                        <div class="col-md-6">
                                                                            <label class="form-label">Judul</label>
                                                                            <input type="text" name="title"
                                                                                class="form-control"
                                                                                value="{{ $item->title }}" required>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label class="form-label">Type</label>
                                                                            <select name="type"
                                                                                class="form-select form-control"
                                                                                id="">
                                                                                <option value="website"
                                                                                    {{ $item->type === 'website' ? 'selected' : '' }}>
                                                                                    Website</option>
                                                                                <option value="mobile_application"
                                                                                    {{ $item->type === 'mobile_application' ? 'selected' : '' }}>
                                                                                    Mobile
                                                                                    Application</option>
                                                                                <option value="ui_ux_design"
                                                                                    {{ $item->type === 'ui_ux_design' ? 'selected' : '' }}>
                                                                                    UI/UX Design
                                                                                </option>
                                                                                <option value="desktop_application"
                                                                                    {{ $item->type === 'desktop_application' ? 'selected' : '' }}>
                                                                                    Desktop
                                                                                    Application</option>
                                                                                <option value="iot_project"
                                                                                    {{ $item->type === 'iot_project' ? 'selected' : '' }}>
                                                                                    IOT Project
                                                                                </option>
                                                                                <option value="game"
                                                                                    {{ $item->type === 'game' ? 'selected' : '' }}>
                                                                                    Game</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <label class="form-label">Thumbnail</label>
                                                                            <input type="file" name="thumbnail"
                                                                                class="form-control">
                                                                            @if ($item->thumbnail)
                                                                                <img src="{{ asset('images/projects/' . $item->thumbnail) }}"
                                                                                    width="80" class="mt-2">
                                                                            @endif
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <label class="form-label">Deskripsi</label>
                                                                            <textarea name="description" class="form-control" rows="3" required>{{ $item->description }}</textarea>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <label class="form-label">Tech Stack</label>
                                                                            @php $stacks = json_decode($item->tech_stack, true) ?? []; @endphp
                                                                            <div
                                                                                id="tech-stack-wrapper-{{ $item->id }}">
                                                                                @foreach ($stacks as $stack)
                                                                                    <div class="input-group mb-2">
                                                                                        <input type="text"
                                                                                            name="tech_stack[]"
                                                                                            class="form-control"
                                                                                            value="{{ $stack }}"
                                                                                            required>
                                                                                        <button type="button"
                                                                                            class="btn btn-danger remove-stack">-</button>
                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                            <button type="button"
                                                                                class="btn btn-success add-stack">+</button>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label class="form-label">Link Preview</label>
                                                                            <input type="text" name="link_preview"
                                                                                class="form-control"
                                                                                value="{{ $item->link_preview }}">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label class="form-label">Github Link</label>
                                                                            <input type="text" name="github_link"
                                                                                class="form-control"
                                                                                value="{{ $item->github_link }}">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label class="form-label">Status</label>
                                                                            <select name="status" class="form-select"
                                                                                required>
                                                                                <option value="draft"
                                                                                    {{ $item->status == 'draft' ? 'selected' : '' }}>
                                                                                    Draft
                                                                                </option>
                                                                                <option value="published"
                                                                                    {{ $item->status == 'published' ? 'selected' : '' }}>
                                                                                    Published</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Batal</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Update</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <form id="deleteForm-{{ $item->id }}"
                                                            action="/project/delete/{{ $item->id }}" method="POST">
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
