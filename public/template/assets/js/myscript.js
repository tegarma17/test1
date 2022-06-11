const swal = $('.swal').data('swal');
if (swal) {
  Swal.fire({
    title: ' Data Berhasil ',
    text: swal,
    icon: 'success'
  });
}

const error = $('.swal').data('error');
if (error) {
  Swal.fire({
    title: ' Salah Username / Password ',
    text: error,
    icon: 'error'
  });
}

$(document).on('click', '#btn-edit', function () {
  $('.modal-body #id').val($(this).data('id'));
  $('.modal-body #nip').val($(this).data('nip'));
  $('.modal-body #tingkat_kelas').val($(this).data('tingkat_kelas'));
  $('.modal-body #nama_kelas').val($(this).data('nama_kelas'));
  $('.modal-body #nama_guru').val($(this).data('nama_guru'));
  $('.modal-body #tempat_lahir').val($(this).data('tempat_lahir'));
  $('.modal-body #nama_mapel').val($(this).data('nama_mapel'));
  $('.modal-body #alamat').val($(this).data('alamat'));
  $('.modal-body #tanggal').val($(this).data('tanggal'));
})

function myFunction() {
  var x = document.getElementById("Btn");
  x.disabled = false;
}
