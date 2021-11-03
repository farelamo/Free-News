@extends('admin/master')

@section('isi')
    <div class="page-container">
        <div class="page-content">
            <div class="main-wrapper container">
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col">
                                <div class="">
                                    <p class="font-weight-bold fs-3 d-flex align-items-center mb-0">Profile</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-4 p-5">
                                <div class="avatar-item mb-0">
                                    <img alt="image"
                                        src="https://www.farelamo.com/bem-vokasi/admin/assets/img/avatar/avatar-1.png"
                                        id="fotoprofil" class="img-fluid" data-toggle="tooltip" title="Foto
                                            test" style="width: 100%; object-fit: cover;">
                                    <a class="btn btn-icon btn-primary text-white rounded-circle" data-toggle="modal"
                                        data-target="#exampleModal" title="Edit Foto"
                                        style="position: absolute; bottom: 17%; right: 20%; height: 50px; width: 50px; font-size: 18px">
                                        <i class="fa fa-pen"
                                            style="vertical-align: -webkit-baseline-middle; text-align: center;"></i>
                                    </a>
                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Foto</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <label for="">Upload foto : </label>
                                                    <input class="form-control" type="file">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="avatar-badge" title="" data-toggle="tooltip" data-original-title="Edit foto"><i class="fas fa-pencil-alt"></i></div> -->
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Nama">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Username</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                        placeholder="username">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Bio</label>
                                    <textarea class="form-control" name="bio" id="bio" cols="30"
                                        placeholder="Bio"></textarea>
                                </div>
                                <div class="text-right mt-5">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
