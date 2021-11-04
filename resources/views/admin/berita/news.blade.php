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
                                                    <td>Kecelakaan di Tol Nganjuk pada tanggal 04/11/2021 menyebabkan 2 orang korban meninggal dunia, di duga terjadi karena sopir mengantuk.</td>
                                                    <td><a href="#" id="blockui-1" class="btn btn-primary">Edit</a></td>
                                                </tr>
                                                <tr>
                                                    <td>002</td>
                                                    <td>Pemain Badminton Indonesia Mendapat Medali Emas</td>
                                                    <td>Minion pemain badminton Indonesia berhasil meraih medali emas pada tournamen Thomas Cup 2021 di Jepang dengan poin unggul 32</td>
                                                    <td><a href="#" id="blockui-1" class="btn btn-primary">Edit</a></td>
                                                </tr>
                                            </tfoot>
                                        </table>
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
                                             
