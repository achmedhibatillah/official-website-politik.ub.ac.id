<h3 class="m-0">{{ $kurikulum->kurikulum_judul_ID }}</h3>
<p>{{ $kurikulum->kurikulum_judul_EN }}</p>
<hr>
@include('templates/session')
<table>
    <tr>
        <td>Mulai berlaku</td>
        <td>:</td>
        <td>{{ $kurikulum->kurikulum_mulai }}</td>
    </tr>
    <tr>
        <td>Dibuat pada</td>
        <td>:</td>
        <td>{{ $kurikulum->created_at }}</td>
    </tr>
    <tr>
        <td>Diedit pada</td>
        <td>:</td>
        <td>{{ ($kurikulum->created_at == $kurikulum->updated_at) ? 'Data belum pernah diedit.' : $kurikulum->updated_at }}</td>
    </tr>
</table>
<div class="mt-2">
    @if($kurikulum->kurikulum_silabus !== '')
    <a href="{{ url($kurikulum->kurikulum_silabus) }}" target="_blank" class="btn btn-success btn-sm lh-1 rounded m-0" style="width:120px;"><i class="fas fa-file-pdf"></i> lihat silabus</a>
    @else
    <a href="#" target="_blank" class="btn btn-secondary btn-sm lh-1 rounded m-0" style="width:120px;"><i class="fas fa-file-pdf"></i> silabus kosong</a>
    @endif
    <a href="{{ url('admin-edit-kurikulum/' . $kurikulum->kurikulum_id) }}" class="btn btn-warning btn-sm lh-1 rounded m-0" style="width:120px;"><i class="fas fa-edit"></i> edit</a>
    <a href="#" data-bs-toggle="modal" data-bs-target="#modalDel" class="btn btn-danger btn-sm lh-1 rounded m-0" style="width:120px;"><i class="fas fa-trash"></i> hapus</a>
</div>
<hr>
<div class="row m-0 p-0">
  <div class="col-lg-6 m-0 p-0 pe-1">
    <h5 class="m-0">Deskripsi <i class="lang-id"></i>:</h5>
    <div class="border-clr3 bg-light pt-4 p-3">{!! $kurikulum->kurikulum_deskripsi_ID !!}</div>
  </div>
  <div class="col-lg-6 m-0 p-0 ps-1">
    <h5 class="m-0">Deskripsi <i class="lang-en"></i>:</h5>
    <div class="border-clr3 bg-light pt-4 p-3">{!! $kurikulum->kurikulum_deskripsi_EN !!}</div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalDel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalDelLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalDelLabel">Hapus</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah Anda yakin ingin menghapus data "{{ $kurikulum->kurikulum_judul_ID }}"?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="{{ url('admin-hapus-kurikulum/' . $kurikulum->kurikulum_id) }}" class="btn btn-danger">Hapus</a>
      </div>
    </div>
  </div>
</div>