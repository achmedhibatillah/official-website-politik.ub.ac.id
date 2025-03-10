<table class="table mt-3">
    <thead class="table-danger">
        <tr>
            <th>No.</th>
            <th>Kode MK</th>
            <th>Mata Kuliah</th>
            <th class="text-center">SKS</th>
            <th class="text-center">Semester</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1 ?>
        @foreach($mk as $x)
        <tr>
            <td>{{ $i }}</td>
            <td>{{ $x->mk_id }}</td>
            <td><a class="m-0 td-none fw-bold" href="{{ url('admin-mata-kuliah/' . $x->mk_id) }}">{{ $x->mk_mk_ID }}</a><p class="m-0 fsz-10 text-secondary">{{ $x->mk_mk_EN }}</p></td>
            <td class="text-center">{{ $x->mk_sks }}</td>
            <td class="text-center">{{ $x->mk_semester }}</td>
            <td class="text-end">
                <a href="{{ url('admin-mata-kuliah/' . $x->mk_id) }}" class="btn btn-success btn-sm fsz-10 mt-1" style="width:55px;"><i class="fas fa-eye"></i> lihat</a>
                <a href="#" data-bs-toggle="modal" data-bs-target="#modalDel-{{ $x->mk_id }}" class="btn btn-danger btn-sm fsz-10 mt-1" style="width:55px;"><i class="fas fa-trash"></i> hapus</a>
            </td>
        </tr>
        <?php $i++ ?> 
        <!-- Modal -->
        <div class="modal fade" id="modalDel-{{ $x->mk_id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalDelLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalDelLabel">Hapus</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus mata kuliah ini?
                    <h5 class="m-0 fw-bold">{{ $x->mk_id }}</h5>
                    <h5 class="m-0 fw-bold">{{ $x->mk_mk_ID }}</h5>
                    <p class="m-0 text-secondary">{{ $x->mk_mk_EN }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="{{ url('admin-hapus-matkul/' . $x->mk_id) }}" class="btn btn-danger">Hapus</a>
                </div>
                </div>
            </div>
        </div>
        @endforeach
    </tbody>
</table>