<!DOCTYPE html>
<html lang="en">
    <head>
    <title>View PDF Costsheet</title>
    </head>
    <style>
        body{
            font-family: Helvetica, sans-serif;
        }

    table, td, th {
        vertical-align: top;
        border-collapse: collapse;
        border: 1px solid black;
        }

        table {
            vertical-align: top;
            border-collapse: collapse;
            border: 1px solid black;
        }

        table#head,
        table#head td
        {
            border: none !important;
        }

        table#ttd,
        table#ttd td
        {
            border: none;
        }

        table#footer,
        {
            border: 1px solid black !important;
        }

        footer {
                position: fixed; 
                bottom: -10px; 
                left: 0px; 
                right: 0px;
                height: 230px; 
            }
        
    </style>

<?php

function cek_tgl($tanggal){
    $bulan = array (
        1 =>   'Jan',
        'Feb',
        'Mar',
        'Apr',
        'Mei',
        'Jun',
        'Jul',
        'Agust',
        'Sep',
        'Okt',
        'Nov',
        'Des'
    );
    $pecahkan = explode('-', $tanggal);
    
    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun
    
    return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }

    function Explodekota($kota){
        $data = explode("-",$kota);
        $result  = $data[2];
        return $result;
      
      }
      
      function rupiah($angka){
          
          $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
          return $hasil_rupiah;
       
      }

      foreach($export as $j){
        $sumhari +=$j->jmlhari;
        $sumuangharian +=$j->totaluangharian;
        $sumutransport +=$j->transport;
        $sumuinap +=$j->totalinap;
        $sumurep +=$j->totalrep;
        $sumtotal +=$j->jumlah;
        }

        function StatusPenandatangan($status,$jabatanST){
            $result="";
            if($status == 3){
                if($jabatanST == "Kepala Biro"){
                    $result = "Plh. Sekretaris Utama";
                }else if($jabatanST == "Direktur"){
                    $result = "Plh. Deputi";
                }
            }else{
                $result = $jabatanST;
            }
            return $result;
    
        }

?>


    <body>
    
    <div id="container">
                <div  style="text-align: center">
                    <p ><div style="font-size: 20px">DAFTAR NOMINATIF PERJALANAN DINAS</div>
                        <br>Nomor : <?=$export[0]->nost?>
                        <br>Dalam Rangka : <?=$export[0]->uraianst?></p>
                </div>

                <div style="padding-top: 20px"></div>

        <table width="100%" style="border: 1px" >
                <thead style="text-align: center; vertical-align: middle">
                    <tr>
                        <td rowspan="2" width="3%">No</td>
                        <td rowspan="2" width="13%">Nama</td>
                        <td rowspan="2" width="13%">NIP</td>
                        <td rowspan="2" width="5%">GOL</td>
                        <td rowspan="2">Asal</td>
                        <td rowspan="2">Tujuan</td>
                        <td colspan="2">Tanggal Pelaksanaan</td>
                        <td rowspan="2" width="3%"> Hari</td>

                        <td rowspan="2">Uang Harian</td>
                        <td rowspan="2">Biaya<br>Penginapan</td>
                        <td rowspan="2">Transport</td>
                        <td rowspan="2">Rep</td>
                        <td rowspan="2">Total</td>
                    </tr>

                    <tr>
                        <td>Berangkat</td>
                        <td>Kembali</td>
                    </tr>
                </thead>

                <tbody>
                    <?php $no=1; foreach($export as $e){
                        
                        if($e->jabatan == "PPNPN"){
                            $nip = "-";
                        }else{
                            $nip = $e->nip;
                        }?>
                        <tr>
                            <td style="text-align: center;"><?=$no?></td>
                            <td><?=$e->nama?></td>
                            
                            <td><?=$nip?></td>
                            <td style="text-align: center;"><?=$e->golongan?></td>
                            <td><?=Explodekota($e->kotaasal)?></td>
                            <td><?=Explodekota($e->kotatujuan)?></td>
                            <td><?=cek_tgl($e->tglberangkat)?></td>
                            <td><?=cek_tgl($e->tglkembali)?></td>
                            <td style="text-align: center;"><?=$e->jmlhari?></td>
                            <td style="text-align: right;"><?=rupiah($e->totaluangharian)?></td>
                            <td style="text-align: right;"><?=rupiah($e->totalinap)?></td>
                            <td style="text-align: right;"><?=rupiah($e->transport)?></td>
                            <td style="text-align: right;"><?=rupiah($e->totalrep)?></td>
                            <td style="text-align: right;"><?=rupiah($e->jumlah)?></td>
                        </tr>  
                    <?php $no++;} ?> 
                    
                    <tr>
                        <td colspan="7"></td>
                        <td>Jumlah</td>
                        <td style="text-align: center;"><?=$sumhari?></td>
                        <td style="text-align: right;"><?=rupiah($sumuangharian)?></td>
                        <td style="text-align: right;"><?=rupiah($sumuinap)?></td>
                        <td style="text-align: right;"><?=rupiah($sumutransport)?></td>
                        <td style="text-align: right;"><?=rupiah($sumurep)?></td>
                        <td style="text-align: right;"><?=rupiah($sumtotal)?></td>
                    </tr>
                </tbody>
                

                    
            </table>

        
    </div>

    <div style="padding-top: 30px"></div>

        <footer>
            <table width="100%" style="border: none" id="ttd">
                <thead style="text-align: left; ">
                    <tr >
                        <td width="25%">Mengetahui/Menyetujui</td>
                        <td width="50%"></td>
                        <td width="25%">Pejabat Pembuat Komitmen</td>
                    </tr>

                    <tr >
                        <td width="25%">Bendahara Pengeluaran</td>
                        <td width="50%"></td>
                        <td width="25%"></td>
                    </tr>

                    <tr>
                        <td style="padding-top: 10%"></td>
                        <td style="padding-top: 10%"></td>
                        <td style="padding-top: 10%"></td>
                    </tr>

                    <tr >
                        <td width="25%"><?= $bendahara[0]['nama'] ?></td>
                        <td width="50%"></td>
                        <td width="25%"><?= $e->ppk_nama ?></td>
                    </tr>

                    <tr >
                        <td width="25%">NIP. <?= $bendahara[0]['nip'] ?></td>
                        <td width="50%"></td>
                        <td width="25%">NIP. <?= $e->ppk_nip ?></td>
                    </tr>


                </thead>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </tfoot>
            </table>
        </footer>
    
    </body>

   
</html>
