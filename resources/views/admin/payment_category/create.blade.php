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
            <h4 class="card-title mb-0">Tambah Kategori</h4>
          </div>
          <form action="" method="post">
            @csrf
            <div class="card-body">
                <div class="mb-4 row align-items-center">
                  <label for="exampleInputText1" class="form-label col-sm-3 col-form-label">Nama Kategori Pembayaran</label>
                  <div class="col-sm-9">
                    <input type="text" name="pyc_name" class="form-control" id="exampleInputText1" placeholder="" required oninvalid="this.setCustomValidity('Nama Jurusan Wajib Diisi')" 
                    onchange="this.setCustomValidity('')">
                  </div>
                  @error('trc_name')
                    <div>error</div>
                  @enderror
                </div>
                <div class="mb-4 row align-items-center">
                    <label for="exampleInputText1" class="form-label col-sm-3 col-form-label">Harga</label>
                    <div class="col-sm-9">
                      <input type="number" name="pyc_price" class="form-control" id="exampleInputText1" placeholder="" required oninvalid="this.setCustomValidity('Nama Jurusan Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('trc_price')
                      <div>error</div>
                    @enderror
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
