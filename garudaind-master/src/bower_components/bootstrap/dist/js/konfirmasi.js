//------------------------- Oper Konfirmasi Hapus karyawan ------------------------------
$(document).ready(function(){

$('#karyawan_hapus').on('show.bs.modal', function (event) {
var div = $(event.relatedTarget)
var id = div.data('id')
var modal = $(this)

modal.find('#hapus-karyawan').attr("href","?tampil=karyawan_hapus&id="+id);
})}
);



