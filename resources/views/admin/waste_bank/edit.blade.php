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
                  <label for="Select" class="form-label col-sm-3 col-form-label">Nama Warga</label>
                  <div class="col-sm-9">
                  <select id="Select" name="usr_id" class="form-control" required>
                  <option hidden  value="{{ $editWasteBanks->wtb_name_id }}">{{ $editWasteBanks->user->name }}</option>
                  @foreach ($users as  $users)
                    <option value="{{ $users->usr_id }}">{{ $users->name }}</option>
                  @endforeach
                  </select>
                  @error('wtb_name_id')
                      <div id="wtb_id" class="form-text">{{ $message }}</div>
                  @enderror
                  </div>
              </div>
                <div class="mb-4 row align-items-center">
                    <label for="Select" class="form-label col-sm-3 col-form-label">Kategori Sampah</label>
                    <div class="col-sm-9">
                    <select id="Select" name="trc_id" class="form-control" required>
                    <option hidden  value="{{ $editWasteBanks->wtb_category_trash_id}}">{{ $editWasteBanks->trash_categories->trc_name}}</option>
                    @foreach ($trash_categories as  $trash_categories)
                      <option value="{{ $trash_categories->trc_id }}">{{ $trash_categories->trc_name }}</option>
                    @endforeach
                    </select>
                    @error('wtb_category_trash_id')
                        <div id="wtb_id" class="form-text">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
                <div class="mb-4 row align-items-center">
                    <label for="exampleInputText1" class="form-label col-sm-3 col-form-label">total sampah/kg</label>
                    <div class="col-sm-9">
                      <input type="number" name="wtb_total_wate" value="{{$editWasteBanks->wtb_total_wate}}" class="form-control" id="exampleInputText1" placeholder="" required oninvalid="this.setCustomValidity('Nama Jurusan Wajib Diisi')" 
                      onchange="this.setCustomValidity('')">
                    </div>
                    @error('wtb_total_wate')
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
