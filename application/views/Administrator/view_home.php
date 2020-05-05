<div class="block-header">
    <h2>HOME</h2>
</div>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="alert bg-teal" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div class="row clearfix">
                <div class="col-lg-1" style="width: 40px">
                    <i class="material-icons">format_quote</i>
                </div>
                <div class="col-lg-11">
                    <?php
                        $warna=array(
                            "Ada dua perkara yang jika Anda Amalkan, Anda akan mendapatkan kebaikan dunia dan akhirat: Menerima sesuatu yang tidak Anda sukai, jika sesuatu itu disukai Allah. Dan membenci sesuatu yang Anda sukai, jika sesuatu itu dibenci oleh Allah.
                            <br><br><p style='float: right;font-size: 14px'>(Abu Hazim)</p>",
                        );
                        $i=date("w");
                        echo("<span style='font-size: 17px'>$warna[$i]</span>");
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="info-box-3 bg-blue hover-zoom-effect">
            <div class="icon">
                <i class="material-icons">account_balance_wallet</i>
            </div>
            <div class="content">
                <div class="text">SALDO SEKARANG</div>
                <?php
                    $query = $this->db->query("SELECT ROUND ( SUM(IF(status = 'Masuk', jumlah, 0))-(SUM(IF( status = 'Keluar', jumlah, 0))) ) AS subtotal FROM keuangan");

                    foreach ($query->result_array() as $rows) {
                      $dwet = $rows['subtotal'];
                      $arto = number_format($dwet,0,",",".");
                       echo "<div class='number'><b>Rp. $arto</b></div>";
                     } 
                 ?>
                
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="info-box-3 bg-green hover-zoom-effect">
            <div class="icon">
                <i class="material-icons">attach_money</i>
            </div>
            <div class="content">
                <div class="text">PEMASUKAN</div>
                <?php
                    $mlebu = $this->db->query("SELECT status , SUM(jumlah) AS masuk FROM keuangan WHERE status = 'Masuk'")->result_array();
                    foreach ($mlebu as $anu) {
                        $a = $anu['masuk'];
                        $b = number_format($a,0,",",".");
                        echo "<div class='number'><b>Rp. $b</b></div>";
                    }
                ?>
                
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="info-box-3 bg-red hover-zoom-effect">
            <div class="icon">
                <i class="material-icons">attach_money</i>
            </div>
            <div class="content">
                <div class="text">PENGELUARAN</div>
                <?php
                    $metu = $this->db->query("SELECT status , SUM(jumlah) AS keluar FROM keuangan WHERE status = 'keluar'")->result_array();
                    foreach ($metu as $anu1) {
                        $a1 = $anu1['keluar'];
                        $b1 = number_format($a1,0,",",".");
                        echo "<div class='number'><b>Rp. $b1</b></div>";
                    }
                ?>
                
            </div>
        </div>
    </div>
</div>