@extends('layout.main')
@section('title','Program Studi')

@section('content')
<!--begin::Row-->
<div class="row">
    <div class="col-12">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><b>List Program Studi</b></h3>
          <div class="card-tools">
            <button
              type="button"
              class="btn btn-tool"
              data-lte-toggle="card-collapse"
              title="Collapse"
            >
              <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
              <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
            </button>
            <button
              type="button"
              class="btn btn-tool"
              data-lte-toggle="card-remove"
              title="Remove"
            >
              <i class="bi bi-x-lg"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tr class="text-center">
                    <th>Nama</th>
                    <th>Singkatan</th>
                    <th>Kaprodi</th>
                    <th>Sekretaris</th>
                    <th>Fakultas</th>
                    <th>Aksi</th>
                </tr>
                @foreach ($prodi as $item)
                <tr class="text-center">
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->singkatan}}</td>
                    <td>{{ $item->kaprodi}}</td>
                    <td>{{ $item->sekretaris}}</td>
                    <td>{{ $item->fakultas->nama}}</td>
                    <td>
                        <a href="{{ route('prodi.show', $item->id) }}" class="btn btn-info">Show</a>
                        @can('update', $item)
                        <a href="{{ route('prodi.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                        @endcan
                        @can('delete', $item)
                        <form action="{{ route('prodi.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger show_confirm"
                            data-toggle="tooltip" title='Delete'
                            data-nama='{{ $item->nama }}'>Delete</button>
                        </form>
                        @endcan
                    </td>
                </tr>
                @endforeach
            </table>
            @can('create', App\Models\Prodi::class)
            <div class="mt-3 text-end">
                <a href="{{ route('prodi.create')}}" class="btn btn-primary">Tambah</a>
            </div>
            @endcan
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
  <!--end::Row-->
  @endsection
