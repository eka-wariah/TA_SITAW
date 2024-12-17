@extends('admin.master_admin')

@push('link')
    
@endpush

@section('title')
    SiTAW | Tambah Kategori
@endsection

@section('content')
   <div class="row">
    <div class="col-lg-12">
        <div class="card">
          <div class="px-4 py-3 border-bottom">
            <h4 class="card-title mb-0">Tambah Pengelola Keuangan </h4>
          </div>
          <form action="" method="post">
            @csrf
            <div class="card-body">
                <div class="mb-4 row align-items-center">
                  <label for="Select" class="form-label col-sm-3 col-form-label">Nama</label>
                  <div class="col-sm-9">
                  <select id="Select" name="usr_id" class="form-control" required>
                  <option hidden  value="">Pilih Warga</option>
                  @foreach ($users as  $users)
                    <option value="{{ $users->usr_id }}">{{ $users->name }}</option>
                  @endforeach
                  </select>
                  @error('adm_name_id')
                      <div id="adm_id" class="form-text">{{ $message }}</div>
                  @enderror
                  </div>
              </div>
                <div class="mb-4 row align-items-center">
                    <label for="Select" class="form-label col-sm-3 col-form-label">Pengelola</label>
                    <div class="col-sm-9">
                    <select id="Select" name="scs_id" class="form-control" required>
                    <option hidden  value="">Pilih Kategori Wilayah</option>
                    @foreach ($scope_categories as $scope_categories)
                      <option value="{{ $scope_categories->scs_id }}">{{ $scope_categories->scs_level }} {{$scope_categories->scs_number}}</option>
                    @endforeach
                    </select>
                    @error('adm_management_scope_id')
                        <div id="adm_id" class="form-text">{{ $message }}</div>
                    @enderror
                    </div>
                </div>                
                <div class="row">
                  <div class="col-sm-3"></div>
                  <div class="col-sm-9">
                    <input type="submit" class="btn btn-primary" value="Kirim" id="">
                  </div>
                </div>
              </div>
          </form>
          
        </div>
      </div>
   </div>
    
@endsection



@push('script')
    
@endpush
