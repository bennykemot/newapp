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
        $sumutravel +=$j->totaltravel;
        $sumuinap +=$j->totalinap;
        $sumurep +=$j->totalrep;
        $sumtotal +=$j->jumlah;
        }

?>


    <body>
    
    <div id="container">
                <div  style="text-align: center">
                    <p><h2>RINCIAN BIAYA PERJALANAN</h2></p>
                </div>


        <table width="100%" id="head">
                <tr>
                    <td width="15%">Nomor Cost Sheet</td> <td width="1%">:</td> <td width="60%">ISIANNYA</td>
                    <td width="2%"></td><td width="15%">Jumlah</td> <td width="1%">:</td> <td width="10%" style="text-align: right">2090084000</td>
                </tr>
                <tr>
                    <td>Nomor RKT/ Non RKT</td> <td>:</td> <td>ISIANNYA</td>
                     <td></td><td>Relasi Pagu</td> <td>:</td> <td style="text-align: right">111296319</td>
                </tr>
                <tr>
                    <td>Pembebanan</td> <td>:</td> <td><?=$export[0]->idxskmpnen?></td>
                     <td></td><td>Saldo Lalu</td> <td>:</td> <td style="text-align: right">1978787681</td>
                </tr>
                <tr>
                    <td>Maksud Perjalanan</td> <td>:</td> <td ><?=$export[0]->uraianst?></td>
                     <td></td><td>Pengajuan</td> <td>:</td> <td style="text-align: right">13810000</td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                     <td></td><td>Saldo Sekarang</td> <td>:</td> <td style="text-align: right">1964977681</td>
                </tr>

                
        </table>
        
        <div style="padding-top: 30px"></div>

        <table width="100%" style="border: 1px" >
                <thead style="text-align: center; vertical-align: middle; height:1px !important;">
                    <tr>
                        <td rowspan="2" width="3%">No</td>
                        <td rowspan="2" width="13%">Nama</td>
                        <td rowspan="2" width="13%">NIP</td>
                        <td rowspan="2" width="5%">GOL</td>
                        <td colspan="2">Kota</td>
                        <td colspan="2">Tanggal</td>
                        <td rowspan="2" width="3%">Jml Hari</td>
                        <td colspan="5">JUMLAH ( Rp )</td>
                    </tr>

                    <tr>
                        <td>Asal</td>
                        <td>Tujuan</td>
                        <td>Berangkat</td>
                        <td>Kembali</td>

                        <td>Lumpsum</td>
                        <td>Biaya Hotel</td>
                        <td>Transport</td>
                        <td>Rep</td>
                        <td>Total</td>

                    </tr>
                </thead>

                <tbody>
                    <?php $no=1; foreach($export as $e){ ?>
                    <tr>
                        <td style="text-align: center;"><?=$no++?></td>
                        <td><?=$e->nama?></td>
                        <td><?=$e->nip?></td>
                        <td style="text-align: center;"><?=$e->golongan?></td>
                        <td><?=Explodekota($e->kotaasal)?></td>
                        <td><?=Explodekota($e->kotatujuan)?></td>
                        <td><?=cek_tgl($e->tglberangkat)?></td>
                        <td><?=cek_tgl($e->tglkembali)?></td>
                        <td style="text-align: center;"><?=$e->jmlhari?></td>
                        <td style="text-align: right;"><?=rupiah($e->totaluangharian)?></td>
                        <td style="text-align: right;"><?=rupiah($e->totalinap)?></td>
                        <td style="text-align: right;"><?=rupiah($e->totaltravel)?></td>
                        <td style="text-align: right;"><?=rupiah($e->totalrep)?></td>
                        <td style="text-align: right;"><?=rupiah($e->jumlah)?></td>
                    </tr>
                    <?php } ?>
                
                    <tr>
                        <td colspan="7"></td>
                        <td>Jumlah</td>
                        <td style="text-align: center;"><?=$sumhari?></td>
                        <td style="text-align: right;"><?=rupiah($sumuangharian)?></td>
                        <td style="text-align: right;"><?=rupiah($sumutravel)?></td>
                        <td style="text-align: right;"><?=rupiah($sumuinap)?></td>
                        <td style="text-align: right;"><?=rupiah($sumurep)?></td>
                        <td style="text-align: right;"><?=rupiah($sumtotal)?></td>
                    </tr>
                    
                </tbody>

                    
            </table>

        
    </div>

    <div style="padding-top: 30px"></div>

    <footer>

            <table width="100%" style="border: 1px" id="footer">
                <thead style="text-align: center">
                    <tr >
                        <td colspan="2" width="25%">Menyetujui :</td>
                        <td colspan="2" width="25%">Memverifikasi :</td>
                        <td colspan="2" width="25%">Pejabat Pembuat Komitmen :</td>
                        <td colspan="2" width="25%">Yang Mengajukan :</td>
                    </tr>
                </thead>

                    <tr>
                        <td style="border-right-style: none; border-bottom-style: none;">Tanggal <br> Catatan </td><td style="border-left-style: none; border-bottom-style: none;"></td>
                        <td style="border-right-style: none; border-bottom-style: none;">Tanggal <br> Catatan </td><td style="border-left-style: none; border-bottom-style: none;"></td>
                        <td style="border-right-style: none; border-bottom-style: none;">Tanggal <br> Catatan </td><td style="border-left-style: none; border-bottom-style: none;"></td>
                        <td style="border-right-style: none; border-bottom-style: none;">Tanggal <br> Catatan </td><td style="border-left-style: none; border-bottom-style: none;"></td>
                    </tr>

                    <tr>
                        <td style="padding-bottom: 10%;border-top-style: none;border-bottom-style: none;" colspan="2"></td>
                        <td style="padding-bottom: 10%;border-top-style: none;border-bottom-style: none;" colspan="2"></td>
                        <td style="padding-bottom: 10%;border-top-style: none;border-bottom-style: none;" colspan="2"></td>
                        <td style="padding-bottom: 10%;border-top-style: none;border-bottom-style: none;" colspan="2"></td>
                    </tr>

                    <tfoot style="text-align: center">
                        <tr>
                            <td style="border-right-style: none;border-bottom-style: none;border-top-style: none;b"></td><td style="border-bottom-style: none;border-top-style: none;border-left-style: none;">Ernadhi Sudarmanto </td>
                            <td style="border-right-style: none;border-bottom-style: none;border-top-style: none;b"></td><td style="border-bottom-style: none;border-top-style: none;border-left-style: none;">Kwinhatmaka </td>
                            <td style="border-right-style: none;border-bottom-style: none;border-top-style: none;b"></td><td style="border-bottom-style: none;border-top-style: none;border-left-style: none;">Sumardi </td>
                            <td style="border-right-style: none;border-bottom-style: none;border-top-style: none;b"></td><td style="border-bottom-style: none;border-top-style: none;border-left-style: none;">Muslim Ridha Muthaher </td>
                        </tr>

                        <tr>
                            <td style="border-right-style: none;border-top-style: none;">NIP</td><td style="border-left-style: none;border-top-style: none;">196507041985031001 </td>
                            <td style="border-right-style: none;border-top-style: none;">NIP</td><td style="border-left-style: none;border-top-style: none;">196507241986031001 </td>
                            <td style="border-right-style: none;border-top-style: none;">NIP</td><td style="border-left-style: none;border-top-style: none;">197307251994021001 </td>
                            <td style="border-right-style: none;border-top-style: none;">NIP</td><td style="border-left-style: none;border-top-style: none;">196802161993031001 </td>
                        </tr>
                    </tfoot>
            </table>
        </footer>
    
    </body>

   
</html>
