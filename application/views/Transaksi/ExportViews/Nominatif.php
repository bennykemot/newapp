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
    
    <div id="container">
                <div  style="text-align: center">
                    <p ><div style="font-size: 20px">DAFTAR NOMINATIF PERJALANAN DINAS</div>
                        <br>Nomor :
                        <br>Dalam Rangka : melaksanakan pendampingan Pemeriksaan BPK RI atas Laporan Keuangan BPKP Tahun 2020 pada Perwakilan BPKP Provinsi Jawa Barat</p>
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
                    <tr>
                        <td style="text-align: center;">1</td>
                        <td>Nita Safitri</td>
                        <td>198701122008012001</td>
                        <td style="text-align: center;">III.b</td>
                        <td>Jakarta</td>
                        <td>Bandung</td>
                        <td>01-Mar-2021</td>
                        <td>05-Mar-2021</td>
                        <td style="text-align: center;">5</td>
                        <td style="text-align: right;">2,150,000</td>
                        <td style="text-align: right;">2,280,000</td>
                        <td style="text-align: right;">115,000</td>
                        <td style="text-align: right;">0</td>
                        <td style="text-align: right;">4,545,000</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">2</td>
                        <td>Nita Safitri</td>
                        <td>198701122008012001</td>
                        <td style="text-align: center;">III.b</td>
                        <td>Jakarta</td>
                        <td>Bandung</td>
                        <td>01-Mar-2021</td>
                        <td>05-Mar-2021</td>
                        <td style="text-align: center;">5</td>
                        <td style="text-align: right;">2,150,000</td>
                        <td style="text-align: right;">2,280,000</td>
                        <td style="text-align: right;">115,000</td>
                        <td style="text-align: right;">0</td>
                        <td style="text-align: right;">4,545,000</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">3</td>
                        <td>Nita Safitri</td>
                        <td>198701122008012001</td>
                        <td style="text-align: center;">III.b</td>
                        <td>Jakarta</td>
                        <td>Bandung</td>
                        <td>01-Mar-2021</td>
                        <td>05-Mar-2021</td>
                        <td style="text-align: center;">5</td>
                        <td style="text-align: right;">2,150,000</td>
                        <td style="text-align: right;">2,280,000</td>
                        <td style="text-align: right;">115,000</td>
                        <td style="text-align: right;">0</td>
                        <td style="text-align: right;">4,545,000</td>
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
                        <td width="25%">bendahara Pengeluaran</td>
                        <td width="50%"></td>
                        <td width="25%"></td>
                    </tr>

                    <tr>
                        <td style="padding-top: 10%"></td>
                        <td style="padding-top: 10%"></td>
                        <td style="padding-top: 10%"></td>
                    </tr>

                    <tr >
                        <td width="25%">Aditya Kurniawan</td>
                        <td width="50%"></td>
                        <td width="25%">Sumardi</td>
                    </tr>

                    <tr >
                        <td width="25%">NIP. 198503272007011002</td>
                        <td width="50%"></td>
                        <td width="25%">NIP. 197307251994021001</td>
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
