<?php
 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Web Apotek</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<style>

  footer {
    margin-top: 30px;
    padding: 3px;
    color: white;
    background-color: #0fb400;
    text-align: right;
    font-weight: bold;
 }
</style>
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #0fb400;">
      <div class="container">
        <a class="navbar-brand" href="#">Logo</a>
        <div>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="admin.php" ><svg class="bi bi-box-arrow-left" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M4.354 11.354a.5.5 0 0 0 0-.708L1.707 8l2.647-2.646a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708 0z"/>
                <path fill-rule="evenodd" d="M11.5 8a.5.5 0 0 0-.5-.5H2a.5.5 0 0 0 0 1h9a.5.5 0 0 0 .5-.5z"/>
                <path fill-rule="evenodd" d="M14 13.5a1.5 1.5 0 0 0 1.5-1.5V4A1.5 1.5 0 0 0 14 2.5H7A1.5 1.5 0 0 0 5.5 4v1.5a.5.5 0 0 0 1 0V4a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-.5.5H7a.5.5 0 0 1-.5-.5v-1.5a.5.5 0 0 0-1 0V12A1.5 1.5 0 0 0 7 13.5h7z"/>
              </svg></a>
            </li>
          </ul>
        </div>
      </div>   
  </nav>
       </header>
       <main style="margin-top: 100px;"> 
      <div class="container">
      <div class="row" >
        <div class="col-sm-6">
          <div class="card" style="height: 490px;">
            <div class="card-body">
                <form>
                    <h3>Transaksi</h3>
                    <br><br><br>
                    <div class="form-group">
                      <label for="formGroupExampleInput">kode trasaksi</label>
                      <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Kode Transaksi">
                    </div><br><br>
                    <div class="form-group">
                      <label for="formGroupExampleInput2">Pembayaran</label>
                      <select class="form-control" id="pilihbayar">
                        <option>-</option>
                      <option>Tunai</option>
                      <option>Debit</option>
                      <option>Kredit</option>
                    </select>
                    </div>
                  </form>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card ">
            <div class="card-body">
                <form>
                    <h3>Barang</h3><br>
                    <div class="form-group">
                      <label for="formGroupExampleInput">Nama Obat</label>
                      <select class="form-control" id="namaobat">
                      <option>-</option>
                        <?php
                        include "koneksi.php";
                        $query = "SELECT `KODEOBAT`,`NAMAOBAT` FROM `obat` WHERE 1";
                        $result = mysqli_query($conn,$query); 
                        
                        while ($data = mysqli_fetch_array($result)){
                          echo "<option value='$data[0]'>$data[1]</option>";
                        }
                        ?>
                    </select>
                    </div>
                      <div class="text-right">
                      <button class="btn btn-success" onclick="addRow" type="submit">Masukan Ke Keranjang</button>
                      </div>
                    </form>
            </div>
          </div>
        </div>
      </div>
    </div>
       <hr>
       <article id="product" class="container">
        <div>
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Kuantitas</th>
                        <th>Harga Satuan</th>
                        
                    </tr>
                </thead>
                
            </table>
        <div class="text-right">
            <br>
            <button class="btn btn-success" data-toggle="modal" data-target="#pmbyr" >Checkout</button>
            </div>
        </div>
      </article>
      </main>
      <footer>
        <p>Hiyahiya &#169; 2020</p>
      </footer>
      
      <div id="pmbyr" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Pembayaran</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              
            </div>
            <div class="modal-body">
              <form >
                <div class="form-group">
                  <label for="totalunit">Total Unit</label>
                  <input type="text" name="ttlunit" class="form-control" disabled/>
                </div>
                <div class="form-group">
                  <label for="Total Harga">Total Harga</label>
                  <input type="text" name="ttlharga" class="form-control" disabled/>
                </div>
                <div class="form-group">
                  <label for="jumlahbayar">Jumlah Bayar</label>
                  <input type="text" name="jmlbayar"  class="form-control" />
                </div>
                <div class="form-group">
                  <label for="Kembalian">Kembalian</label>
                  <input type="text" name="kembalian" class="form-control" disabled/>
                </div>
                <div class="text-right">
                  <button class="btn btn-success" >Selesai</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
     
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
       <script type="text/javascript">
       $(document).ready(function() {
    var t = $('#example').DataTable();
    t
    .column(0)
    .data()
    .unique();
    var counter = 1;
    $("select.form-control").change(function(){
      var selected = $("namaobat").val();
      $.ajax({
        url: "getdata.php?kode="+selected,
        dataType: "JSON",
        success: function(json){
          var obj = JSON.parse(json);
            t.row.add( [
              obj.kodeobat,
              obj.namaobat,
              '1',
              obj.hargabeli
            ]
            )
          
        }
      });
    });
 
    $('#addRow').on( 'click', function () {
      var selected = $("namaobat").val();
      $.ajax({
        url: "getdata.php?kode="+selected,
        dataType: "JSON",
        success: function(json){
          var obj = JSON.parse(json);
            t.row.add( [
              obj.kodeobat,
              obj.namaobat,
              '1',
              obj.hargabeli
            ]
            )
        }
      });
    } );
 
    // Automatically add a first row of data
    $('#addRow').click();

    
} );
      </script>
    </body>
</html>