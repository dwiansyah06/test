<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">Dashboard</h1>
        <select id="search" class="form-control" style="margin-bottom: 20px;">
            <option selected disabled value="">Mode Search</option>
            <option value="diatas">Diatas Rp 3.000.000</option>
            <option value="dibawah">Dibawah/pas Rp 3.000.000</option>
        </select>
        <div id="tbl2"></div>
        <table class="table table-bordered table-hover" id="tbl1">
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Nama Karyawan</th>
                    <th>Gaji</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $total = 0;
                    $no = 1;
                    foreach($karyawan as $value):
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value->nama ?></td>
                    <td>Rp <?= number_format($value->gaji, 0, ",", ".") ?></td>
                    <td>
                        <center>
                            <?php  
                                if($value->gaji > 3000000){
                                    echo "<button id='bonus' class='btn btn-success btn-sm' data-toggle='modal' data-target='#modal-bonus' data-nama='".$value->nama."' data-gaji='".$value->gaji."'>Bonus</button>";
                                } else {
                                    echo "<span class='label label-danger'>Gaji anda tidak mencukupi</span>";
                                }
                            ?>
                        </center>
                    </td>
                </tr>
                <?php
                    $total += $value->gaji; 
                    endforeach; 
                ?>
                <tr>
                    <td colspan="2">Total</td>
                    <td colspan="2">Rp <?= number_format($total, 0, ",", ".") ?></td>
                </tr>
            </tbody>
        </table>

        <div id="data-bonus"></div>
    </div>
</div>

<div class="modal fade bs-example-modal-lg" id="modal-bonus" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <form id="form_bonus" method="post">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Hitung Bonus Karyawan</h4>
          </div>
          <div class="modal-body" id="modal-isi">
            <?php  
                foreach ($total_gaji as $row) {
                    echo "<input type='hidden' value='".$row->total_gaji."' name='total_gaji'></input>";
                }
            ?>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" id="nm_karyawan" class="form-control" name="nama" readonly>
            </div>
            <div class="form-group">
                <label>Gaji</label>
                <input type="text" id="gaji_karyawan" class="form-control" name="gaji" readonly>
            </div>
            <div class="form-group">
                <label>Masukan Total Nilai Bonus</label>
                <input id="dengan-rupiah" type="text" class="form-control" name="nilai_bonus" placeholder="Nilai Bonus" autocomplete="off" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary" value="Save Changes">
          </div>
        </div>
    </form>
  </div>
</div>

<script>
    $(document).ready(function(){
        function convert(bilangan)
        {
            var number_string = bilangan.toString(),
                sisa    = number_string.length % 3,
                rupiah  = number_string.substr(0, sisa),
                ribuan  = number_string.substr(sisa).match(/\d{3}/g);
                    
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            return rupiah;
        }

         /* Dengan Rupiah */
        var dengan_rupiah = document.getElementById('dengan-rupiah');
        dengan_rupiah.addEventListener('keyup', function(e)
        {
            dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
        });
        
        /* Fungsi */
        function formatRupiah(angka, prefix)
        {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split    = number_string.split(','),
                sisa     = split[0].length % 3,
                rupiah     = split[0].substr(0, sisa),
                ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
                
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }

        $(document).on("click", "#bonus", function(){
            var nama = $(this).data('nama');
            var gaji = $(this).data('gaji');
            var format = 'Rp. '+convert(gaji);

            $("#modal-isi #nm_karyawan").val(nama);
            $("#modal-isi #gaji_karyawan").val(format);
        });

        $("#form_bonus").submit(function(e){
            e.preventDefault();
            var data = $('#form_bonus').serialize();
            $.ajax({
                type: 'POST',
                url: "<?= base_url().'karyawan/count_bonus' ?>",
                data: data,
                success: function(result) {
                    var hasil = JSON.parse(result);
                    var html = '';

                    html += '<table class="table table-bordered table-hover">'+
                            '<thead>'+
                            '<tr>'+
                            '<th scope="col">Nomor</th>'+
                            '<th scope="col">Nama Karyawan</th>'+
                            '<th scope="col">Nilai Gaji</th>'+
                            '<th scope="col">Nilai Bonus</th>'+
                            '<tr>'+
                            '</thead>'+
                            '<tbody>'+
                            '<tr>'+
                            '<td>1</td>'+
                            '<td>'+hasil.nama+'</td>'+
                            '<td>Rp '+convert(hasil.gaji)+'</td>'+
                            '<td>Rp '+convert(hasil.bonus)+'</td>'+
                            '</tr>'+
                            '<tr>'+
                            '<td colspan="3">Total Bonus Yang didapat</td>'+
                            '<td>Rp '+convert(Math.round(hasil.nilai_bonus))+'</td>'+
                            '</tr>'+
                            '</tbody>'+
                            '</table>';

                    if (html != '') {
                        $('#data-bonus').html(html);
                    }

                    $('#modal-bonus').modal('hide');
                    document.getElementById('dengan-rupiah').value = null;
                }
            });
        });

        $('#search').change(function() {
            var value = $(this).find(':selected').val();
            $.ajax({
                type: 'POST',
                url: "<?= base_url().'karyawan/get_param' ?>",
                data: {
                    'param': value
                },
                success: function (data) {
                    $('#tbl1').remove();
                    var hasil = JSON.parse(data);
                    var html = '';
                    var tot = 0;
                    var i;

                    html += '<a href="" class="btn btn-primary btn-sm" style="margin-bottom: 10px;"><span class="fa fa-refresh"></span> Semua Data</a>'+
                            '<table class="table table-bordered table-hover">'+
                            '<thead>'+
                            '<tr>'+
                            '<th scope="col">Nomor</th>'+
                            '<th scope="col">Nama Karyawan</th>'+
                            '<th scope="col">Gaji</th>'+
                            '<th scope="col"><center>Action</center></th>'+
                            '<tr>'+
                            '</thead>'+
                            '<tbody>';

                    for(i=0; i<hasil.length; i++){
                        tot += parseInt(hasil[i].gaji);
                        var j = i+1;
                        html += '<tr>'+
                                '<td>'+j+'</td>'+
                                '<td>'+hasil[i].nama+'</td>'+
                                '<td>Rp. '+convert(hasil[i].gaji)+'</td>';
                        if (hasil[i].gaji > 3000000) {
                            html += '<td><center><button id="bonus" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-bonus" data-nama="'+hasil[i].nama+'" data-gaji="'+hasil[i].gaji+'">Bonus</button></center></td>';
                        } else {
                            html += '<td><center><span class="label label-danger">Gaji anda tidak mencukupi</span></center></td>';
                        }
                    }

                    html += '<tr>'+
                            '<td colspan="2">Total</td>'+
                            '<td colspan="2">Rp '+convert(tot)+'</td>'+
                            '</tr>'+
                            '</tbody></table>';

                    $('#tbl2').html(html);
                }
            });
        });
    });
</script>