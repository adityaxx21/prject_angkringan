@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                onclick=" $('#tambahData').modal('show');"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah
                Akun</button>


        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Instansi</h6>
            </div>
            <style>
                .dataTables_filter {
                    text-align: right;
                }
            </style>
            <div class="card-body">
                <!-- Vertically centered modal -->
                {{-- Input Data --}}
                <div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="tambahDataTitle"
                    style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" style="max-width:50%">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Instansi</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <form class="modal-body" method="POST" id="add_data" action="/admin"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Pendafter</label>
                                    <input type="text" class="form-control" id="nama_pendaftar" name="nama_pendaftar"
                                        aria-describedby="emailHelp" placeholder="Masukan Nama Pendaftar">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Instansi</label>
                                    <input type="text" class="form-control" id="nama_instansi" name="nama_instansi"
                                        aria-describedby="emailHelp" placeholder="Masukan Nama Instansi">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Alamat Instansi</label>
                                    <textarea type="text" class="form-control" id="alamat_instansi" name="alamat_instansi" aria-describedby="emailHelp"
                                        placeholder="Masukan Alamat Instansi"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="gambar_instansi_update">Gambar Instansi</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="gambar_instansi"
                                            name="gambar_instansi" onchange="input_gb('1','gambar_instansi')">
                                        <label class="custom-file-label" for="gambar_instansi" id="change_name1">Choose
                                            file</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" name="email_instansi" id="email_instansi"
                                        aria-describedby="emailHelp" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Username</label>
                                    <input type="text" class="form-control" id="username_instansi"
                                        name="username_instansi" aria-describedby="emailHelp" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Jenis</label>
                                    <div class="input-group mb-3">
                                        <select class="custom-select" id="jenis_instansi" name="jenis_instansi">
                                            @foreach ($jenis as $item)
                                                <option value="{{ $item->id }}">{{ $item->role_nama }}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="password_instansi"
                                        name="password_instansi" placeholder="Password">
                                </div>


                            </form>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <button class="btn btn-primary" onclick="$('#add_data').submit()">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Update Data --}}
                <div class="modal fade" id="updateData" tabindex="-1" aria-labelledby="updateDataTitle"
                    style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" style="max-width:50%">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Instansi</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <form id="update_form" method="POST" action="updateAkun" enctype="multipart/form-data"
                                style="
                            margin: 20px;">
                                @csrf
                                <input type="hidden" id="id_data" name="id_data">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Pendafter</label>
                                    <input type="text" class="form-control" id="nama_pendaftar_update"
                                        name="nama_pendaftar_update" aria-describedby="emailHelp"
                                        placeholder="Masukan Nama Pendaftar">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Instansi</label>
                                    <input type="text" class="form-control" id="nama_instansi_update"
                                        name="nama_instansi_update" aria-describedby="emailHelp"
                                        placeholder="Masukan Nama Instansi">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Alamat Instansi</label>
                                    <textarea type="text" class="form-control" id="alamat_instansi_update" name="alamat_instansi_update"
                                        aria-describedby="emailHelp" placeholder="Masukan Alamat Instansi"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="gambar_instansi_update">Gambar Instansi</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="gambar_instansi_update"
                                            name="gambar_instansi_update"
                                            onchange="input_gb('2','gambar_instansi_update')">
                                        <label class="custom-file-label" for="gambar_instansi" id="change_name2">Choose
                                            file</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="email_update" name="email_update"
                                        aria-describedby="emailHelp" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Username</label>
                                    <input type="text" class="form-control" id="username_update"
                                        name="username_update" aria-describedby="emailHelp" placeholder="Enter username">
                                </div>
                                <div class="form-group">
                                    <label for="jenis_instansi_update">Jenis</label>
                                    <div class="input-group mb-3">
                                        <select class="custom-select" id="jenis_instansi_update"
                                            name="jenis_instansi_update">
                                            @foreach ($jenis as $item)
                                                <option value="{{ $item->id }}">{{ $item->role_nama }}</option>
                                            @endforeach

                                        </select>
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="password_update" name="password_update"
                                        placeholder="Kosongkan Jika tidak ingin mengganti password">
                                </div>


                            </form>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <button class="btn btn-primary" onclick="$('#update_form').submit()">Save</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive" style="text-overflow:ellipsis;overflow:hidden;white-space:nowrap;">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nama Pendaftar</th>
                                <th>Instansi</th>
                                <th>Jenis Instansi</th>
                                <th>Email</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($instansi as $item)
                                <tr>
                                    {{-- <th><img src="{{asset($item->gambar_instansi)}}" alt="" srcset=""></th> --}}
                                    <th>{{ $item->id }}</th>
                                    <th>{{ $item->nama_pendaftar }}</th>
                                    <th>{{ $item->nama_instansi }}</th>
                                    <th>{{ $item->role_nama}} </th>
                                    <th>{{ $item->email }}</th>
                                    <th>
                                        <button type="button" class="btn btn-warning"
                                            onclick="get_data({{ $item->id }})"><i class="fas fa-edit fa-sm "></i>
                                            Update</button>
                                        <button type="button" class="btn btn-danger"
                                            onclick="remove({{ $item->id }})"><i class="fas fa-ban fa-sm "></i>
                                            Delete</button>
                                    </th>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                    <form action="/delete_instansi" method="post" id="hapus">
                        @csrf
                        <input type="hidden" id="id_hapus" name="id_hapus">
                    </form>
                </div>
            </div>
        </div>
        <script>
            var id_data;
            var role;
            var gambar;

            function input_gb(i, id) {
                gambar = $('#' + id).val().replace(/C:\\fakepath\\/i, '')
                $("#change_name" + i).html(gambar);
            }

            function get_data(id) {
                id_data = id;

                $('#updateData').modal('show');
                $.ajax({
                    type: 'GET',
                    url: "/find_data/" + id,
                    success: function(data) {

                        if ($.isEmptyObject(data.error)) {
                            // alert(data.data.owner);
                            $('#id_data').val(id);
                            $('#nama_pendaftar_update').val(data.data.nama_pendaftar);
                            $('#nama_instansi_update').val(data.data.nama_instansi);
                            $('#alamat_instansi_update').val(data.data.alamat_instansi);
                            $('#email_update').val(data.data.email);
                            $('#username_update').val(data.data.username);
                            $('#jenis_instansi_update').val(data.data.role);
                        } else {
                            printErrorMsg(data.error);
                        }
                    }
                });
            }

            function remove(id) {
                $('#id_hapus').val(id);
                $('#hapus').submit();
            }
        </script>
    </div>
@endsection
