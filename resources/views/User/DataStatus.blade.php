@extends('User.Layouts.Master')
@section('content')
  <script>
    @if (session('success'))
    swal({
      title   : "Berhasil",
      text    : "{{session('success')}}",
      icon    : "success",
    })
    @endif
  </script>
  <section>
    <!-- Page content-->
    <div class="content-wrapper">
      <h3>Data Status Sekolah</h3>
        <div class="row">
          <div class="col-lg-12">

            <div class="panel well">
              <a href="/data-status-sekolah/tambah">
                <button class="btn btn-labeled btn-info" type="button">
                  <span class="btn-label"><i class="fa fa-plus"></i>
                </span><b>Tambah Data</b></button>
              </a>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-striped table-hover" id="datatable2">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Jenjang</th>
                        <th>Jumlah Sekolah</th>
                        <th style="width:25%;">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                        $no = 0;
                      @endphp
                      @foreach ($Status as $DataStatus)
                        <tr>
                          <td>{{$no+=1}}</td>
                          <td>{{$DataStatus->nama_status}}</td>
                          <td>{{count($DataStatus->Sekolah)}}</td>
                          <td>
                            <button class="btn btn-labeled btn-primary" type="button"
                            onclick="Ubah('{{Crypt::encryptString($DataStatus->id)}}', '{{$DataStatus->nama_status}}')">
                              <span class="btn-label"><i class="fa fa-pencil"></i>
                            </span><b>Edit</b></button>
                            <button class="btn btn-labeled btn-danger" type="button" style=" {{$DataKelurahan->id == '0' ? 'display:none' : ''}} "
                            onclick="{{count($DataStatus->Sekolah) == 0 ? 'Hapus' : 'cantHapus'}}('{{Crypt::encryptString($DataStatus->id)}}', '{{$DataStatus->nama_status}}')">
                              <span class="btn-label"><i class="fa fa-close"></i>
                            </span><b>Hapus</b></button>
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
  </section>
@endsection
<script>
  function Ubah(id,Nama)
  {
    swal({
      title   : "Ubah",
      text    : "Anda Akan di Arahkan ke Halaman Ubah Data Status Sekolah '"+Nama+"'",
      icon    : "info",
    })
    window.location = "/data-status-sekolah/"+id+"/edit";
  }

  function Hapus(id,Nama)
  {
    swal({
      title   : "Hapus",
      text    : "Yakin Ingin Menghapus Data Status Sekolah '"+Nama+"' ?",
      icon    : "warning",
      buttons : [
        "Batal",
        "Hapus",
      ],
    })
    .then((hapus) => {
      if (hapus) {
        swal({
          title  : "Hapus",
          text   : "Data Status Sekolah '"+Nama+"' Akan di Hapus",
          icon   : "info",
          timer  : 2500,
        });
        window.location = "/data-status-sekolah/"+id+"/hapus";
      } else {
        swal({
          title  : "Batal Hapus",
          text   : "Data Status Sekolah '"+Nama+"' Batal di Hapus",
          icon   : "info",
          timer  : 2500,
        })
      }
    });
  }

  function cantHapus(id,Nama)
  {
    swal({
      title   : "Hapus",
      text    : "Data Status Sekolah '"+Nama+"' Tidak dapat di Hapus Karena Ada Data Sekolah",
      icon    : "warning",
    })
  }
</script>
