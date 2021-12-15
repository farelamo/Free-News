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
                        <form action="/admin/profile/{{ $data->id }}" method="post">
                            @method('patch')
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-md-4 p-5">
                                    <div class="avatar-item mb-0">
                                        <img src="{{ $data->picture ? asset('/images/profile/' . $data->picture) : asset('/images/profile/avatar-1.png') }}"
                                            data-toggle="modal" data-target="#editFoto" alt="image" id="fotoprofil"
                                            class="img-fluid" style="width: 100%; object-fit: cover; height: 300px;">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" placeholder="Nama" name="name"
                                            value="{{ $data->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" placeholder="email" name="email"
                                            value="{{ $eUser->email }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" placeholder="username" name="username"
                                            value="{{ $data->username }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Bio</label>
                                        <textarea class="form-control" name="bio" id="bio" cols="30" placeholder="Bio"
                                            name="bio" placeholder="{{ $data->bio }}">{{ $data->bio }}</textarea>
                                    </div>
                                    <div class="text-right mt-5">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal')
     <div class="modal fade" id="editFoto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Foto</h5>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <form action="/admin/profile/{{ $data->id }}" method="post" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <div class="modal-body">
                        <label for="">Upload foto : </label>
                        <input class="form-control" type="file" name="picture">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('js/admin.js') }}"></script>
@endpush
