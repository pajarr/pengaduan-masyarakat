<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             Welcome, {{ Auth::user()->name }}!!    
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('masyarakat.update',$data->id) }}" method="POST" style="margin: 20px;" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                      <label>Nama Pelapor: {{ old('nama_pengadu', $data->nama_pengadu) }}</label>
                      <input type="hidden" name="id_petugas" value="{{ Auth::user()->id }}">
                      <input type="hidden" name="id_pengaduan" value="{{ $data->id }}">
                      <p></p>
                    </div>
                    <div class="form-group">
                      <label>Isi Laporan: "{{ old('isi_laporan', $data->isi_laporan) }}"</label>
                     <p></p>
                    </div>
                    <div class="form-group">
                      <label>Tanggal Tanggapan:</label>
                      <input type="date" name="tgl_tanggapan" class="">
                    </div>
                    <div class="form-group">
                      <label>Tanggapan:</label>
                      <textarea type="text" name="tanggapan" class=""></textarea>
                    </div>
                  <input type="hidden" name="created_at" value="{{ now()->timestamp }}">
                  <input type="hidden" name="updated_at" value="{{ now()->timestamp }}">
                </div>
                <div class="modal-footer">
                  <a href="{{ url('dataPengaduan') }}" class="btn btn-outline-secondary">Back</a>
                  {{-- <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button> --}}
                  <button type="submit" class="btn btn-outline-primary">Save changes</button>
                </div>
              </form>
            </div>
        </div>
    </div>
</x-app-layout>