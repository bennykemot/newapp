<!DOCTYPE html>
<html lang="en">
    <head>
    <title>View PDF SPDBACK</title>
    </head>
    <style>
        body{
            font-family: Helvetica;
        }

        table, td {
        vertical-align: top;
        border-collapse: collapse !important;
        border: 1px solid black !important;

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
                padding-top: 0%;
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

    function Explodekota($kota){
        $data = explode("-",$kota);
        $result  = $data[2];
        return $result;
      
      }
      
      function rupiah($angka){
          
          $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
          return $hasil_rupiah;
       
      }

?>

   

    <body>
    <?php $no=1; foreach($export as $e){ ?>
        <div class="body">

            <table width="100%" id="body" cellpadding="6">

                    <tbody>
                        <tr>
                            <td width="5%" rowspan="4"></td>
                            <td rowspan="4" style="border-left-style: none;border-right-style: none; border-bottom-style: none"></td>
                            <td width="40%" rowspan="4" style="border-left-style: none"></td>
                            <!-- BATES KIRI -->
                            <td width="4%" rowspan="4" style="border-left-style: none;border-right-style: none; border-bottom-style: none">I.</td>
                            <td width="30%" style="border-left-style: none;border-right-style: none; border-bottom-style: none">
                                Berangkat dari<br>
                                ke<br>
                                pada tanggal
                            </td>
                            <td width="10%" colspan="2" style="border-left-style: none;border-right-style: none; border-bottom-style: none">
                                : <?=Explodekota($e->kotaasal)?><br>
                                : <?=Explodekota($e->kotatujuan)?><br>
                                : <?=cek_tgl($e->tglberangkat)?>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="3" style="text-align: center;border-left-style: none;border-right-style: none; border-bottom-style: none; border-top-style: none">Kepala Bagian Pelaporan Keuangan</td>
                        </tr>
                        <tr>
                            <td colspan="3" style="text-align: center; padding-top: 2%;border-left-style: none;border-right-style: none; border-bottom-style: none;border-top-style: none"></td>
                        </tr>
                        <tr>
                            <td colspan="3" style="text-align: center;border-left-style: none;border-right-style: none; border-bottom-style: none; border-top-style: none">Muslim Ridha Muthaher<br>NIP 196802161993031001</td>
                        </tr>

                        <!-- ---- -->

                        <?php for($j= 0 ; $j < 4 ; $j++){
                            if($j == 0){
                                $number = "II";
                            }else if($j == 1){
                                $number = "III";
                            }else if($j == 2){
                                $number = "IV";
                            }else if($j == 3){
                                $number = "V";
                            }
                            ?>


                        <tr>
                            <td width="5%" rowspan="4"></td>
                            <td width="5%" rowspan="4" style="border-left-style: none;border-right-style: none; border-bottom-style: none"><?= $number?>.</td>
                            <td width="40%" style="border-left-style: none;border-right-style: none; border-bottom-style: none">
                                Tiba di<br>
                                pada tanggal
                            </td>
                            <!-- BATES KIRI -->
                            <td width="4%" rowspan="4" style="border-right-style: none; border-bottom-style: none"></td>
                            <td width="30%" colspan="2" style="border-left-style: none;border-right-style: none; border-bottom-style: none">
                                Berangkat dari<br>
                                ke<br>
                                pada tanggal
                            </td>
                            <td width="20%" style="border-left-style: none;border-right-style: none; border-bottom-style: none">
                            </td>
                        </tr>

                        <tr>
                            <td style="border-left-style: none;border-right-style: none; border-bottom-style: none; border-top-style: none"></td>
                            <td colspan="3" style="border-left-style: none;border-right-style: none; border-bottom-style: none; border-top-style: none"></td>
                        </tr>
                        <tr>
                            <td style="padding-top: 2%;border-left-style: none;border-right-style: none; border-bottom-style: none;border-top-style: none"></td>
                            <td colspan="3" style="padding-top: 5%;border-left-style: none;border-right-style: none; border-bottom-style: none;border-top-style: none"></td>
                        </tr>
                        <tr>
                            <td style="border-left-style: none;border-right-style: none; border-bottom-style: none; border-top-style: none">. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .<br>NIP.</td>
                            <td colspan="3" style="border-left-style: none;border-right-style: none; border-bottom-style: none; border-top-style: none">. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .<br>NIP.</td>
                            
                        </tr>

                        <?php }?>

                        <tr>
                            <td width="5%" rowspan="5"></td>
                            <td width="5%" rowspan="5" style="border-left-style: none;border-right-style: none; border-bottom-style: none">VI.</td>
                            <td width="40%" style="border-left-style: none;border-right-style: none; border-bottom-style: none">
                                Tiba kembali di <br>( tempat kedudukan )<br>
                                pada tanggal<br>
                            </td>
                            <!-- BATES KIRI -->
                            <td width="4%" rowspan="5" style="border-right-style: none; border-bottom-style: none"></td>
                            <td width="40%" colspan="3" style="border-left-style: none;border-right-style: none; border-bottom-style: none">
                                Telah diperiksa dengan keterangan bahwa perjalanan tersebut atas perintahnya 
                                dan semata-mata untuk kepentingan jabatan dalam waktu yang sesingkat-singkatnya<br>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2" style="border-left-style: none;border-right-style: none; border-bottom-style: none; border-top-style: none">Pejabat Pembuat Komitmen</td>
                            <td colspan="2" style="border-left-style: none;border-right-style: none; border-bottom-style: none; border-top-style: none">Pejabat Pembuat Komitmen</td>
                            
                        </tr>

                        <tr>
                            <td style="border-left-style: none;border-right-style: none; border-bottom-style: none; border-top-style: none"></td>
                            <td style="border-left-style: none;border-right-style: none; border-bottom-style: none; border-top-style: none"></td>
                        </tr>
                        <tr>
                            <td style="padding-top: 2%;border-left-style: none;border-right-style: none; border-bottom-style: none;border-top-style: none"></td>
                            <td style="padding-top: 2%;border-left-style: none;border-right-style: none; border-bottom-style: none;border-top-style: none"></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="border-left-style: none;border-right-style: none; border-bottom-style: none; border-top-style: none"><?= $e->ppk_ttd ?><br>NIP. <?= $e->nip_ttd ?></td>
                            <td colspan="4" style="border-left-style: none;border-right-style: none; border-bottom-style: none; border-top-style: none"><?= $e->ppk_ttd ?><br>NIP. <?= $e->nip_ttd ?></td>
                            
                        </tr>

                        <tr>
                            <td width="5%" ></td>
                            <td width="5%" style="border-left-style: none;border-right-style: none; border-bottom-style: none">VII.</td>
                            <td colspan="5" style="border-left-style: none;border-bottom-style: none">
                               Catatan lain-lain<br>
                            </td>

                        </tr>

                        <tr>
                            <td width="5%" style="border-bottom-style: none;"></td>
                            <td width="5%" style="border-left-style: none;border-right-style: none; border-bottom-style: none">VIII.</td>
                            <td colspan="5" style="border-left-style: none;border-bottom-style: none">
                               PERHATIAN<br>
                            </td>

                        </tr>

                        <tr>
                            <td width="5%" style="border-bottom-style: none;border-top-style: none"></td>
                            <td width="5%" style="border-left-style: none;border-right-style: none; border-bottom-style: none;border-top-style: none"></td>
                            <td colspan="5" style="border-left-style: none;border-bottom-style: none;border-top-style: none">
                            <p style="text-align: justify">
                            PPK yang menerbitkan SPD, Pegawai yang melakukan perjalanan Dinas, para pejabat yang mengesahkan tanggal
                            berangkat/tiba, serta bendahara pengeluaran bertanggung jawab berdasarkan peraturan-peraturan Keuangan negara
                            apabila negara menderita rugi akibat kesalahan, kelalaian dan kealpaannya.<p>
                            </td>

                        </tr>

                        
                        

                        

                        
                        
                    </tbody>

                        
                </table>

                <div class="page_break"></div>
            
        </div>

            
            <?php }?>
            
    
    </body>

   

   
</html>
