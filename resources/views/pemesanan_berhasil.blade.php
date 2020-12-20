

<section id="hero">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
        <div class="kotak">
          <div class="row">
            <div class="col-md-12 text-center">
              <h1>Pemesanan Berhasil</h1>
              <hr>
            </div>
            <p class="alert alert-success">
                Pemesanan Berhasil.
              </p>
            <div class="col-md-12">
              <p class="text-right">
                <a href="{{ url('invoice') }}" class="btn btn-danger btn-sm" target="_blank">
                  <i class="fa fa-file-pdf"></i> Cetak Bukti Pemesanan
                </a>
              </p>

              <p>Hai <strong>, berikut adalah data pesanan Anda. Kami akan segera memproses data pesanan tersebut.</p>

              <table class="table">
                <thead>
                  <tr>
                    <th width="25%">Kode Order</th>
                    <th width="1%">:</th>
                    <th width="74%">#INV-{{$sewa_bus->ID_SEWA_BUS}}</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Nama Produk</td>
                    <td>:</td>
                    <td>{{$sewa_bus_category->NAMA_CATEGORY}}</td>
                  </tr>
                  <tr>
                    <td>Tujuan</td>
                    <td>:</td>
                    <td><?php echo $pricelist_sewa_armada->TUJUAN_SEWA ?></td>
                  </tr>
                  <tr>
                    <td>Quantity</td>
                    <td>:</td>
                    <td><?php echo $sewa_bus_category->QUANTITY ?> Pcs</td>
                  </tr>
                  <tr>
                    <td>Harga Produk</td>
                    <td>:</td>
                    <td>Rp <?php echo number_format($pricelist_sewa_armada->PRICELIST_SEWA) ?></td>
                  </tr>
                  <tr>
                    <td>Total</td>
                    <td>:</td>
                    <td>Rp <?php echo number_format($sewa_bus_category->TOTAL) ?></td>
                  </tr>
                  <tr>
                    <td>DP</td>
                    <td>:</td>
                    <td>Rp <?php echo number_format($sewa_bus_category->DP) ?></td>
                  </tr>
                  <tr>
                    <td>DP</td>
                    <td>:</td>
                    <td>Rp <?php echo number_format($sewa_bus_category->SISA_BAYAR) ?></td>
                  </tr>
                  <tr>
                    <td>Nama Penerima</td>
                    <td>:</td>
                    <td><?php echo $customer->NAMA_CUSTOMER ?></td>
                  </tr>
                  <tr>
                    <td>Telepon/Whatapps</td>
                    <td>:</td>
                    <td><?php echo $customer->TELEPHONE ?></td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td><?php echo $customer->EMAIL_CUSTOMER ?></td>
                  </tr>
                  <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><?php echo nl2br($customer->ALAMAT) ?></td>
                  </tr>
                  
                </tbody>
              </table>
              <hr>
              <p>Jika Anda telah melakukan pembayaran. Anda dapat melakukan <a href="{{ url('konfirmasi') }}">Konfirmasi Pembayaran</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>