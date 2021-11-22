<!DOCTYPE html>
<html lang="en">
    <head>
    <title>View PDF Pengeluaran Rill</title>
    </head>
    <style>
        body{
            font-family: Helvetica;
        }

        table#body, table#body td, table#body th {
        vertical-align: top;
        border-collapse: collapse;
        border: 1px solid black;
        }

        table#head,
        table#head td
        {
            border: none !important;
        }

        .ttd, .ttd-td, .ttd-th,
        {
            border: none !important;
        }

        /** Define the header rules **/
        header {
                position: fixed;
                top: 0cm;
                left: 0cm;
                right: 0cm;
                height: 2cm;
            }

        footer {
                position: fixed; 
                bottom: -10px; 
                left: 0px; 
                right: 0px;
                height: 230px; 
            }

            .body{
                padding-top: 10%;
                padding-bottom: 3%;
            }

        .page_break { page-break-before: always; }
        
    </style>

<?php

function cek_tgl($tanggal){
    $bulan = array (
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);
    
    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun
    
    return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }

?>

   

    <body>
    <?php for($i=0 ; $i < 3 ; $i++){?>

    <header>
            <table width="100%" id="head">
                <tr>
                    <td width="10%"><img src="<?= base_url().'assets'?>/app-assets/images/logo/BPKP_Logo_2.png" alt="materialize logo"></td>
                    <td style="text-align: center"><b>BADAN PENGAWASAN KEUANGAN DAN PEMBANGUNAN</td>
                </tr>
            </table>
            <hr style="height:2x;background-color:#000;">
    </header>
    
    <div class="body">

         <p align="center"><b>DAFTAR PENGELUARAN RIIL</b></p>


         <table width="100%"  cellpadding="2">
             <tr><td colspan="3">Yang bertandatangan dibawah ini :</td></tr>
            <tr>
                <td width="10%">Nama</td>
                <td width="2%">:</td>
                <td> Fenny Shera Luckyartha</td>
            </tr>

            <tr>
                <td width="10%">NIP</td>
                <td width="2%">:</td>
                <td>198709262009112001</td>
            </tr>

            <tr>
                <td width="10%">Jabatan</td>
                <td width="2%">:</td>
                <td>Auditor Pertama</td>
            </tr>

        </table>
        <p>Berdasarkan Surat Pejalanan Dinas (SPD) tanggal 15 March 2021 Nomor 645/SU03/3/2021<br>
            Dengan ini kami menyatakan sesungguhnya bahwa : <br>
            1. Biaya transport Pegawai dan/atau biaya penginapan di bawah ini yang tidak dapat diperoleh
            bukti - bukti pengeluarannya, meliputi :</p>

            <table width="100%" id="body" cellpadding="6" >
            
                <tr class="ttop">
                    <td style="text-align: center;" class="ttop tbottom" width="3%">No</td>
                    <td style="text-align: center;" class="ttop tbottom" width="55%">Uraian</td>
                    <td style="text-align: center;" class="ttop tbottom" width="25%">Jumlah (Rp) </td>
                </tr>

                <tr>
                    <td colspan="2" style="text-align: right">Jumlah</td>
                    <td>0.00</td>
            </table>

        <p>2. Jumlah uang tersebut pada angka 1 di atas benar-benar dikeluarkan untuk pelaksanaan
            perjalanan dinas dimaksud dan apabila di kemudian hari terdapat kelebihan atas pembayaran, kami
            bersedia untuk menyetorkan kelebihan tersebut ke kas negara.</p>

        <p>Demikian pernyataan ini kami buat dengan sebenarnya, untuk dipergunakan sebagaimana
            mestinya.</p>
        
    </div>

            <table width="100%" id="ttd" >
                <tbody>
                    <tr>
                        <td >Mengetahui/Menyetujui,</td>
                        <td width="10%"></td>
                        <td width="25%">Jakarta, 15 March 2021</td>
                    </tr>

                    <tr>
                        <td >Pejabat Pembuat Komitmen</td>
                        <td width="10%"></td>
                        <td width="25%">Yang Melakukan Perjalanan</td>
                    </tr>

                    <tr>
                        <td style="padding-top: 10%"></td>
                        <td style="padding-top: 10%"></td>
                        <td style="padding-top: 10%"></td>
                    </tr>

                    <tr>
                        <td >Sumardi</td>
                        <td width="10%"></td>
                        <td width="25%">Fenny Shera Luckyartha</td>
                    </tr>

                    <tr>
                        <td >NIP.197307251994021001</td>
                        <td width="10%"></td>
                        <td width="25%">NIP.198709262009112001</td>
                    </tr>

                </tbody>
            </table>
            <div class="page_break"></div>
            <?php }?>
            
    
    </body>

   

   
</html>
