@extends('admin/master')

@section('isi')
    <div class="page-container">
        <div class="page-content">
            <div class="page-info container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pengaturan Admin</li>
                    </ol>
                </nav>
            </div>
            <div class="main-wrapper container">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <table id="zero-conf" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Approve</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>
                                                <p class="p-3 bg-success text-white rounded-pill">Sudah ACC</p>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <button type="button" class="btn p-2 fs-3" data-toggle="modal"
                                                        data-target="#edit"><i class="fa fa-edit" style="color:#3646C9;"></i></button>
                                                    <div class="modal fade" id="edit" tabindex="-1"
                                                        aria-labelledby="editLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="editLabel">Edit
                                                                        User</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="">Email : </label>
                                                                        <input class="form-control" type="email">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div>
                                                                            <label for="">Approve</label><br>
                                                                            <label class="switch">
                                                                                <input type="checkbox">
                                                                                <span class="slider"></span>
                                                                            </label> ACC
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-primary">Save
                                                                        changes</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn p-2 fs-3" data-toggle="modal"
                                                    data-target="#editFoto"><i class="fa fa-camera" style="color:#3646C9;"></i></button>
                                                    <div class="modal fade" id="editFoto" tabindex="-1"
                                                        aria-labelledby="editFotoLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="editFotoLabel">Edit
                                                                        Foto</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="">Foto : </label>
                                                                        <input class="form-control" type="file">
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-primary">Save
                                                                        changes</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn p-2 fs-3" data-toggle="modal"
                                                    data-target="#hapus"><i class="fa fa-trash-alt" style="color:#3646C9;"></i> </button>
                                                    <div class="modal fade" id="hapus" tabindex="-1"
                                                        aria-labelledby="hapusLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="hapusLabel">Hapus User
                                                                        </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Apakah anda yakin untuk menghapus ?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-danger">Delete</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Garrett Winters</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>63</td>
                                            <td>2011/07/25</td>
                                        </tr>
                                        <tr>
                                            <td>Ashton Cox</td>
                                            <td>Junior Technical Author</td>
                                            <td>San Francisco</td>
                                            <td>66</td>
                                            <td>2009/01/12</td>
                                        </tr>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@push('js')
    <script src="{{ asset('/js/admin.js') }}"></script>
@endpush
<i class="fas fa-trash-alt"></i>
<i class="fas fa-edit"></i>
<i class="fas fa-camera"></i>
