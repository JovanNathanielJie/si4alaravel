@extends('layout.main')
@section('title','Fakultas')

@section('content')
<!--begin::Row-->
<div class="row">
    <div class="col-12">
        <div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title"><b>Tambah Fakultas</b></div></div>
                  <!--end::Header-->
                  <!--begin::Form-->
                  <form>
                    <!--begin::Body-->
                    <div class="card-body">
                      <div class="mb-3">
                        <label for="nama" class="form-label">Nama Fakultas</label>
                        <input type="text" class="form-control" name="nama">
                      </div>
                      <div class="mb-3">
                        <label for="Singkatan" class="form-label">Singkatan</label>
                        <input type="text" class="form-control" name="singkatan">
                      </div>
                      <div class="mb-3">
                        <label for="Dekan" class="form-label">Dekan</label>
                        <input type="text" class="form-control" name="dekan">
                      </div>
                      <div class="mb-3">
                        <label for="Wakil Dekan" class="form-label">Wakil Dekan</label>
                        <input type="text" class="form-control" name="wakil_dekan">
                      </div>
                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <!--end::Footer-->
                  </form>
                  <!--end::Form-->
                </div>

    </div>
  </div>
  <!--end::Row-->
  @endsection
