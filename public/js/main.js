let SESSION_KEY = "pesanan_cos";
let orders = [];


const composeDatapesanan = (nama_cos,no_meja,pesanan,tgl_pesan) => {
    return {
        id: +new Date,
        nama_cos,
        no_meja,
        tgl_pesan,
        pesanan

    };
}

function makeorder(nama_psn,dtfoto,harga,qty,id) {  
    let box = document.createElement('div');
    $(box).attr({
        'class':'box-order d-flex mb-2'
    });
 
    let foto = document.createElement('img');
    $(foto).attr({
      'class' : 'img-fluid rounded',
      'style' : 'height: 100px; width: 200px',
      'src' : 'imagemenu/'+dtfoto,
      'alt' : nama_psn
    });
    let dtorder = document.createElement('div');
    $(dtorder).attr({
        "class":'dtorder ms-3'
    });
    dtorder.innerHTML = `
   <h2>${nama_psn}</h2>
   <span>Harga : Rp ${harga}</span> <br>
   <span>X${qty}</span>
    `;
 
    let btnhapus = document.createElement('div');
    $(btnhapus).attr({
        'class':'tombol-pesan ms-auto align-self-center'
    });
    btnhapus.innerHTML = `<button class="btn btn-danger hapus-pesanan" dt-id="${id}"><i class="fas fa-trash-alt"></i> Hapus Pesanan</button>`;
 
    box.append(foto,dtorder,btnhapus);
 
    return box;
  }

