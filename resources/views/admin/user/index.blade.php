@extends('admin/master')

@section('isi')

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="page-content">
                        <div class="page-info container">
                            <nav aria-label="breadcrumb">
                                <div class="main-wrapper container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5 class="card-title">Berita</h5>
                                            <div class="table-responsive">
                                                <table id="myTable" class="display" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Title</th>
                                                            <th>Content</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>001</td>
                                                            <td>Kecelakaan di Tol Nganjuk</td>
                                                            <td>Kecelakaan di Tol Nganjuk pada tanggal 04/11/2021
                                                                menyebabkan 2
                                                                orang korban meninggal dunia, di duga terjadi karena sopir
                                                                mengantuk.</td>
                                                            <td>
                                                                <div class="d-flex">
                                                                <a href="#" class="h3"><i class="fas fa-trash-alt m-1"></i></a>
                                                                <a href="#" class="h3"><i class="fas fa-edit m-1"></i></a>
                                                                <a href="#" class="h3"><i class="fas fa-camera m-1"></i></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>002</td>
                                                            <td>Pemain Badminton Indonesia Mendapat Medali Emas</td>
                                                            <td>Minion pemain badminton Indonesia berhasil meraih medali
                                                                emas
                                                                pada tournamen Thomas Cup 2021 di Jepang dengan poin unggul
                                                                32
                                                            </td>
                                                            <td>
                                                                <div class="d-flex">
                                                                <a href="#" class="h3"
                                                                    data-toggle="modal" data-target="#edit">
                                                                    <i class="fas fa-edit m-1"></i></a>
                                                                <a href="#" class="h3"
                                                                    data-toggle="modal" data-target="#editFoto">
                                                                    <i class="fas fa-camera m-1"></i></a>
                                                                <a href="#" class="h3"
                                                                    data-toggle="modal" data-target="#hapus"><i
                                                                        class="fas fa-trash-alt m-1"></i>
                                                            </a>
                                                            </div></div>
                                                            </td>
                                                        </tr>
                                                        </tfoot>
                                                </table>
                                            </div>
                                            <div class="d-flex align-items-center">
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
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


