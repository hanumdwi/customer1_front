@foreach($customer as $cus)
@endforeach

<div class="modal-body">
                                                
                                                
                                                <div class="form-group">
                                                    <label for="nama" class="col-form-label">Nama :</label>
                                                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $cus->NAMA_CUSTOMER }}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email" class="col-form-label">Email :</label>
                                                    <input type="email" class="form-control" id="email" name="email" value="{{ $cus->EMAIL_CUSTOMER }}" readonly>
                                                    </div>
                                                <div class="form-group">
                                                    <label for="telephone" class="col-form-label">Telephone :</label>
                                                    <input type="telephone" class="form-control" id="telephone" name="telephone" value="{{ $cus->TELEPHONE }}" readonly>
                                                    </div>
                                                <div class="form-group">
                                                    <label for="alamat" class="col-form-label">Alamat :</label>
                                                    <input type="alamat" class="form-control" id="alamat" name="alamat" value="{{ $cus->ALAMAT }}" readonly>
                                                    </div>
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <a href="cartawal">
                                                <button type="submit" class="btn btn-primary" id="edit">Next</button>
</a>
                                            </div>
                                            
                                            </div>