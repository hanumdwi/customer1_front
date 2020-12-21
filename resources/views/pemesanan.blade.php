@extends('layout/main')

  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>	

@section('container')

    <div class="hero-wrap hero-bread" style="background-image: url('asset/vegfoods/images/baground2.jpeg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
            <h1 class="mb-0 bread">Pemesanan</h1>
          </div>
        </div>
      </div>
	</div>
    </br>
    </br>

<section id="hero">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
        <div class="kotak">
          <div class="row">
            <div class="col-md-12 text-center">
            <h1>Formulir Pemesanan</h1>
              <hr>
            </div>
            <div class="col-md-8 text-left">
<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
            <form action="sewa_bus_category_store" method="post" accept-charset="utf-8">
               {{ csrf_field() }}
               <input type="hidden" name="token_rahasia" value="72827582Uduagd86275gbdahgahgfa">

                <p class="alert alert-primary">
                  Isi data pemesanan Anda dengan lengkap dan benar.
                </p>
                <div class="form-group row">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="TGL_SEWA" class="col-form-label">Start Date :</label>
                                        </div>
                                        <div class="col-lg-6">
                                        <label for="JAM_SEWA" class="col-form-label">Start Time :</label>
                                        
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6"><input type="date" class="form-control" id="TGL_SEWA_PAKET" name="TGL_SEWA_PAKET"></div>
                                        <div class="col-lg-6"><input type="time" class="form-control" id="JAM_SEWA_PAKET" name="JAM_SEWA_PAKET"></div>
                                    
                                    </div>
                                    </div>
                                    <div class="form-group row">
                                    <div class="row">
                                        <div class="col-lg-6">
                                        <label for="TGL_AKHIR_SEWA">End Date :</label>
                                        </div>
                                        <div class="col-lg-6">
                                        <label for="JAM_AKHIR_SEWA" class="col-form-label">End Time :</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6"><input type="date" class="form-control create-event-datepicker" id="TGL_AKHIR_SEW_PAKET" name="TGL_AKHIR_SEWA_PAKET"></div>
                                        <div class="col-lg-6"><input type="time" class="form-control" id="JAM_AKHIR_SEWA_PAKET" name="JAM_AKHIR_SEWA_PAKET"></div>
                                    
                                    </div>
                                    </div>
                                    </br>

            <!-- <div class="form-group row">
              <label class="col-sm-4 control-label text-right">Tanggal Sewa<span class="text-danger">*</span></label>
              <div class="col-sm-8">
                <input type="date" name="TANGGAL_SEWA_BUS" class="form-control tanggal">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-4 control-label text-right">Tanggal Akhir Sewa<span class="text-danger">*</span></label>
              <div class="col-sm-8">
                <input type="date" name="TANGGAL_AKHIR_SEWA" class="form-control tanggal">
              </div>
            </div> -->


            <div class="form-group row">
              <label class="col-sm-4 control-label text-right">Nama Anda<span class="text-danger">*</span></label>
              <div class="col-sm-8">
                <input type="text" name="NAMA_CUSTOMER" class="form-control" placeholder="Nama Anda" required>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-4 control-label text-right">Nomor HP/Whatsapp <span class="text-danger">*</span></label>
              <div class="col-sm-8">
                <input type="text" name="TELEPHONE" class="form-control" placeholder="Nomor HP/Whatsapp" required>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-4 control-label text-right">Email</label>
              <div class="col-sm-8">
                <input type="email" name="EMAIL_CUSTOMER" class="form-control" 
                placeholder="Email Anda" required>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-4 control-label text-right">Alamat</label>
              <div class="col-sm-8">
                <textarea name="ALAMAT" class="form-control" placeholder="Alamat"></textarea>
              </div>
            </div>

              <div class="form-group row">
                  <label class="col-sm-4 control-label"></label>
                  <div class="col-sm-8">
                    <div class="btn-group">
                        <button type="button" name="submit" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModal">
                          <i class="fa fa-save"></i>Choose Armada
                        </button>
                        <button type="reset" name="submit" class="btn btn-info btn-lg" value="reset">
                          <i class="fa fa-times"></i>Submit
                        </button>
                    </div>
                </div>
              </div>
              </form>
            </div>

            <div class="col-md-4">
                <img src="{{ url('asset/vegfoods/images/bismillah.jpg') }}" class="img img-thumbnail img-fluid" >  
            </div>
            <div class="col-md-12">
               <hr>
                <p>Anda sudah melakukan pembayaran? Silakan lakukan <a href="{{ url('konfirmasi') }}">Konfirmasi Pembayaran</a>.</p>
                <hr>
             </div>
                                      <!-- Modal -->
                                      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">
                                                  <div class="table-responsive">
                                                      <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                          <thead>
                                                              <tr>
                                                          <thead>
                                                            <tr role="row">
                                                              <th class="datatable-nosort sorting_disabled" rowspan="1" colspan="1">Armada</th>
                                                              <th class="datatable-nosort sorting_disabled" rowspan="1" colspan="1">Tujuan Sewa</th>
                                                              <th class="datatable-nosort sorting_disabled" rowspan="1" colspan="1">Price</th>
                                                            </tr>
                                                          </thead>
                                                          <tbody>
                                                            @foreach( $pricelist_sewa_armada as $p )
                                                            <tr role="row" class="odd" onclick="pilihBarang('{{ $p -> ID_PRICELIST }}')" style="cursor:pointer">
                                                              <td value="{{$p->ID_CATEGORY}}">{{ $p->NAMA_CATEGORY }}</td>
                                                              <td>{{ $p->TUJUAN_SEWA }}</td>
                                                              <td>
                                                                Rp <?php echo number_format($p->PRICELIST_SEWA,'0',',','.'); ?>
                                                              </td>
                                                            </tr>
                                                            @endforeach
                                                          </tbody>
                                                        </table>
                                                  </div>
                                                </div>
                                              </div>
                                            <div>

                 
          </div>
        </div>
      </div>
    </div>
  </div>
  </br>
  </br>
</section><!-- End Hero -->
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );

var barang = <?php echo json_encode($pricelist_sewa_armada); ?>;
	console.log(barang[0]["NAMA_CATEGORY"]);
	var colnum=0;

	function getVal(event){
		if (event.keyCode === 13) {
			modal();
		}
	}
	function pilihBarang(id){
		var index;
		for(var i=0;i<barang.length;i++){
			if(barang[i]["ID_PRICELIST"]==id){
				console.log(barang[i]);
				index=i;
				break;
			}
		}
		$("#myModal").modal("hide");

		var table = document.getElementById("keranjang");
		var row = table.insertRow(table.rows.length);
		row.setAttribute('id','col'+colnum);
		var id = 'col'+colnum;
		colnum++;

		var cell1 = row.insertCell(0);
		var cell2 = row.insertCell(1);
		var cell3 = row.insertCell(2);
		var cell4 = row.insertCell(3);
		var cell5 = row.insertCell(4);
		var cell6 = row.insertCell(5);
		var cell7 = row.insertCell(6);
		var cell8 = row.insertCell(7);
		
		console.log(index);
		cell1.innerHTML = '<input type="hidden" name="id['+barang[index]["ID_PRICELIST"]+']" value="'+barang[index]["ID_PRICELIST"]+'">'+barang[index]["ID_CATEGORY"];
		cell2.innerHTML = '<input type="hidden" name="cat['+barang[index]["ID_PRICELIST"]+']" value="'+barang[index]["ID_CATEGORY"]+'">'+barang[index]["NAMA_CATEGORY"];
		cell3.innerHTML = '<input type="hidden" name="tj['+barang[index]["ID_PRICELIST"]+']" value="'+barang[index]["TUJUAN_SEWA"]+'">'+barang[index]["TUJUAN_SEWA"];	
		cell4.innerHTML = '<input type="hidden" id="harga'+barang[index]["ID_PRICELIST"]+'" name="harga['+barang[index]["ID_PRICELIST"]+']" value="'+barang[index]["PRICELIST_SEWA"]+'">'+barang[index]["PRICELIST_SEWA"];
		cell5.innerHTML = '<input type="number" name="qty['+barang[index]["ID_PRICELIST"]+']" value="1" oninput="recount(\''+barang[index]["ID_PRICELIST"]+'\')" id="qty'+barang[index]["ID_PRICELIST"]+'" style="background:secondary; border:none; text-align:left; width=100%">';	
        cell6.innerHTML = '<input class="discount" type="number" name="discount['+barang[index]["ID_PRICELIST"]+']" value="0" oninput="recount(\''+barang[index]["ID_PRICELIST"]+'\')" id="discount'+barang[index]["ID_PRICELIST"]+'" style="background:primary; border:none; text-align:left; width=100%">';	
		cell7.innerHTML = '<input type="hidden" class="subtotal" name="subtotal['+barang[index]["ID_PRICELIST"]+']" value="'+barang[index]["PRICELIST_SEWA"]+'" id="subtotal'+barang[index]["ID_PRICELIST"]+'"><span id="subtotalval'+barang[index]["ID_PRICELIST"]+'">'+barang[index]["PRICELIST_SEWA"]+'</span>';
		cell8.innerHTML = '<button onclick="hapusEl(\''+id+'\')" class="btn btn-danger btn-block text-uppercase">Delete</button>';
        

		total();
		
	}
	function lm(i){
		var min =  document.getElementById("qty"+i).value;
		if(min <= 1){

		}else{
		min--;
		document.getElementById("qty"+i).value = min;
		recount(i);
		}
	}
	function ln(i){
		var plus =  document.getElementById("qty"+i).value;
		console.log(plus);
		plus++;
		document.getElementById("qty"+i).value = plus;
		console.log(plus);
		recount(i);
	}

	function total(){
		var subtotals = document.getElementsByClassName("subtotal");
		var total = 0;
		for(var i=0; i<subtotals.length;++i){
			total += Number(subtotals[i].value); 
		}
		document.getElementById("subtotal-val").innerHTML = total;
		var dp = parseInt(25/100*total);
		document.getElementById("dpbus").innerHTML = dp;
		var sisabayar = parseInt(75/100*total);
        document.getElementById("total-val").innerHTML = sisabayar;
        document.getElementById("tot").value = total;
        document.getElementById("depe").value = dp;
        document.getElementById("sb").value = sisabayar;
	}

	function recount(id){
		var price = document.getElementById("harga"+id).value;
		var diskon = document.getElementById("discount"+id).value;
		var sembarang = document.getElementById("qty"+id).value;
     
		var lego = Number(price*sembarang)-diskon; 
		document.getElementById("subtotal"+id).value = lego;
		document.getElementById("subtotalval"+id).innerHTML = lego;
		total();
	}

	function modal(){
		$("#myModal").modal("show");
		document.getElementById("myText").value = "";
	}
	function hapusEl(idCol) {
		document.getElementById(idCol).remove();
		total();
	}

    function hitunghargajualA(){
        console.log("function getHargaJual");
        var total = document.getElementById('total_payment1').value;
        var dp = document.getElementById('subtotal1').value;
        var x = document.getElementById('sisa_bayar1').value;
        var sisa = Number(total-dp);
         $('#sisa_bayar1').val(sisa);
       
        console.log(sisa);
        }

</script>



@endsection