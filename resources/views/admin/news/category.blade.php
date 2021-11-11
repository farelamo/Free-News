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
                                        <h5 class="card-title">Kategori</h5>
                                        <table id="myTable" class="display" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Created at</th>
                                                    <th>Updated at</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>001</td>
                                                    <td>Kamis,04/11/2021 13.30</td>
                                                    <td>Not yet</td>
                                                    <td><a href="#" id="blockui-1" class="btn btn-primary">Edit</a></td>
                                                </tr>
                                                <tr>
                                                    <td>002</td>
                                                    <td>Jumat, 30/10/2021 21.00</td>
                                                    <td>Sabtu, 31/10/2021 08.00</td>
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
                                             
