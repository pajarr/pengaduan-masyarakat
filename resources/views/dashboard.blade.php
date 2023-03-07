<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             Welcome, {{ Auth::user()->name }}!
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          @if (Auth::user()->role === 'Admin')
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="card-group">
              <div class="card" style="width: 18rem; margin:20px;">
                <div class="card-body">
                  @if ($total)
                  <h5 class="card-title">{{ $total }} Laporan Masuk</h5>
                  <p class="card-text">Total Masuk</p>
                  @else
                  <h5 class="card-title">0 Laporan Masuk</h5>
                  <p class="card-text">Total Masuk</p>
                  @endif
                </div>
              </div>
              <div class="card" style="width: 18rem; margin:20px;">
                <div class="card-body">
                  @if ($belum)
                  <h5 class="card-title">{{ $belum }} Belum ditanggapi</h5>
                  <p class="card-text">Belum Ditanggapi</p>
                  @else
                  <h5 class="card-title">0 Belum Ditanggapi</h5>
                  <p class="card-text">Belum Ditanggapi</p>
                  @endif
                </div>
              </div>
              <div class="card" style="width: 18rem; margin:20px;">
                <div class="card-body">
                  @if ($sudah)
                  <h5 class="card-title">{{ $sudah }} Sudah Ditanggapi</h5>
                  <p class="card-text">Sudah Ditanggapi</p>
                  @else
                  <h5 class="card-title">0 Sudah Ditanggapi</h5>
                  <p class="card-text">Sudah Ditanggapi</p>
                  @endif
                </div>
              </div>
            </div>
           
              <div class="p-6 text-gray-900">
                  <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">id</th>
                          <th scope="col">Tanggal</th>
                          <th scope="col">Nik</th>
                          <th scope="col">Laporan</th>
                          <th scope="col">Foto</th>
                          <th scope="col">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if ($data)
                          @foreach ($data as $datas)
                          <tr>
                            <td> {{ ++$i }} </td>
                            <td> {{ $datas->id }} </td>
                            <td> {{ $datas->tgl_pengaduan }} </td>
                            <td> {{ $datas->nik }} </td>
                            <td> {{ $datas->isi_laporan }} </td>
                            <td>
                              @if ($datas->foto)
                              <img src="{{ Storage::url($datas->foto) }}" height="75" width="75" alt="" />
                              @endif
                          </td>
                            <td> {{ $datas->status }} </td>
                          </tr>
                        @endforeach
                        @else
                            no data
                        @endif
                          
                      </tbody>
                    </table>   
                  </div>
                </div>
          </div>
          @elseif (Auth::user()->role === 'Petugas')
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="card-group">
              <div class="card" style="width: 18rem; margin:20px;">
                <div class="card-body">
                  @if ($total)
                  <h5 class="card-title">{{ $total }} Laporan Masuk</h5>
                  <p class="card-text">Total Masuk</p>
                  @else
                  <h5 class="card-title">0 Laporan Masuk</h5>
                  <p class="card-text">Total Masuk</p>
                  @endif
                </div>
              </div>
              <div class="card" style="width: 18rem; margin:20px;">
                <div class="card-body">
                  @if ($belum)
                  <h5 class="card-title">{{ $belum }} Belum ditanggapi</h5>
                  <p class="card-text">Belum Ditanggapi</p>
                  @else
                  <h5 class="card-title">0 Belum Ditanggapi</h5>
                  <p class="card-text">Belum Ditanggapi</p>
                  @endif
                </div>
              </div>
              <div class="card" style="width: 18rem; margin:20px;">
                <div class="card-body">
                  @if ($sudah)
                  <h5 class="card-title">{{ $sudah }} Sudah Ditanggapi</h5>
                  <p class="card-text">Sudah Ditanggapi</p>
                  @else
                  <h5 class="card-title">0 Sudah Ditanggapi</h5>
                  <p class="card-text">Sudah Ditanggapi</p>
                  @endif
                </div>
              </div>
            </div>
           
              <div class="p-6 text-gray-900">
                  <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">id</th>
                          <th scope="col">Tanggal</th>
                          <th scope="col">Nik</th>
                          <th scope="col">Laporan</th>
                          <th scope="col">Foto</th>
                          <th scope="col">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if ($data)
                          @foreach ($data as $datas)
                          <tr>
                            <td> {{ ++$i }} </td>
                            <td> {{ $datas->id }} </td>
                            <td> {{ $datas->tgl_pengaduan }} </td>
                            <td> {{ $datas->nik }} </td>
                            <td> {{ $datas->isi_laporan }} </td>
                            <td>
                              @if ($datas->foto)
                              <img src="{{ Storage::url($datas->foto) }}" height="75" width="75" alt="" />
                              @endif
                          </td>
                            <td> {{ $datas->status }} </td>
                          </tr>
                        @endforeach
                        @else
                            no data
                        @endif
                          
                      </tbody>
                    </table>   
                  </div>
                </div>
          </div>
          @else
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <br>
            @if ($latest === NULL)
              <div class="card text-center">
                <div class="card-header">
                  Laporan Terakhir
                </div>
                <div class="card-body">
                  <h5 class="card-title">-</h5>
                  <p class="card-text">-</p>
                  <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Buat Pengaduan
                  </button>
                </div>
                <div class="card-footer text-muted">
                  -
                </div>
              </div>
            @else  
            <div class="card text-center">
              <div class="card-header">
                Laporan Terakhir
              </div>
              <div class="card-body">
                <h5 class="card-title">{{ $latest->nama_pengadu }}</h5>
                <p class="card-text">{{ $latest->isi_laporan }}</p>
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  Buat Pengaduan
                </button>
              </div>
              <div class="card-footer text-muted">
                {{ $latest->created_at }}
              </div>
            </div>
                
            @endif
            
          </div>

          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('masyarakat.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    @method('POST')
                    <div class="form-group">
                      <input type="hidden" name="nama_pengadu" value="{{ Auth::user()->name }}" class="">
                      <input type="hidden" name="nik" value="{{ Auth::user()->nik }}" class="">
                      <input type="hidden" name="tgl_pengaduan" value="{{ now()->timestamp }}" class="">
                      <input type="hidden" name="updated_at" value="{{ now()->timestamp }}" class="">
                      <input type="hidden" name="created_at" value="{{ now()->timestamp }}" class="">
                      <input type="hidden" name="tanggapan" value="belum ada tanggapan" class="">
                    </div>
                    <div class="form-group">
                      <label>Isi Laporan: </label>
                      <input type="text" name="isi_laporan" class="">
                    </div>
                    <div class="form-group">
                      <label>Foto: </label>
                      <input type="file" name="foto" class="">
                    </div>
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-outline-primary">Save changes</button>
                </div>
              </form>
              </div>
            </div>
          </div>

          @endif
            
        </div>
    </div>
</x-app-layout>
