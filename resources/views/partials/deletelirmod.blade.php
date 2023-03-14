{{-- Delete LIR Modal --}}
<div class="modal fade" id="modal-delete-lir-{{ $prmid }}" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <?php /* <h4 class="modal-title"><i class="far fa-trash-alt fa-shake"></i> Hapus LIR</h4> */ ?>
                <h4 class="modal-title"><i class="far fa-trash-alt"></i> Hapus LIR</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-md-center text-wrap">Laporan IR per tgl {{$lir->tglir->format('d-m_Y')}} akan dihapus,
                    Anda yakin ?
                </p>
            </div>
            <div class="modal-footer justify-content-between">
                <form action="{{route('lir.destroy', $lir)}}" id="delete-form" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-primary bg-danger">Yakin</button>
                </form>
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tidak</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@push('js')
<script>
    $('#modal-delete-lir-{{ $prmid }}').modal({
        backdrop: true,
        show: false
    });
</Script>
@endpush