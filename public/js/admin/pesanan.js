$('.edit-pesan').click(function(){
    let tr = $(this).parents()[1];
    console.log(tr);
})

$('.hapus-pesan').submit(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name=_token]').val()
        }
    });
    event.preventDefault();
    let nama = $(this).attr('data-nama');
    let id = $(this).attr('data-id');
    Swal.fire({
        icon:"question",
        title:"Hapus Pesanan",
        text:"Apa anda yakin akan menghapus Pesanan: "+nama,
        showCancelButton: true,
        showConfirmButton:true,
        reverseButtons:true,
    }).then((result)=>{
        if (result.isConfirmed) {
            $.ajax({
                url: '/admin/hapus_pesan/'+id,
                type: 'DELETE',
            });
            Swal.fire(
                "Pesanan Terhapus",
                "Pesanan "+nama+" Berhasil dihapus",
                "success"
            ).then((result)=>{
                window.location.reload();
            });
            
        }
    })
})