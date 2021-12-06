<!DOCTYPE html>
<html lang="en">
    <head>
    <title>View PDF Perhitungan Rampung</title>
    </head>
    <style>
        body{
            font-family: Helvetica;
        }

        table#borderedless, table#borderedless td, table#borderedless th {
        vertical-align: top;
        /* border: none; */
        }

        table#head,
        table#head td
        {
            border: none;
        }

        table#body,
        table#body td
        {
            border-collapse: collapse;
            border-left: 1px solid black;
            border-right: 1px solid black;
        }
        


        .ttop{
            border-collapse: collapse;
            border-top: 1px solid black;
        }

        .tbottom{
            border-collapse: collapse;
            border-bottom: 1px solid black;
        }

        .tleft{
            border-collapse: collapse;
            border-left: 1px solid black;
        }

        .tright{
            border-collapse: collapse;
            border-right: 1px solid black;
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
                height: 10px; 
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
 
	// FUNGSI TERBILANG OLEH : MALASNGODING.COM
	// WEBSITE : WWW.MALASNGODING.COM
	// AUTHOR : https://www.malasngoding.com/author/admin
 
 
	function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
	}
 
	function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim(penyebut($nilai));
		} else {
			$hasil = trim(penyebut($nilai));
		}     		
		return $hasil;
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
      $total += $j->jumlah;
      }

?>

   

    <body>

    <header>
        <table width="100%" id="head">
                <tr>
                    <td style="text-align: center"><font style="font-size: 20px">BADAN PENGAWASAN KEUANGAN DAN PEMBANGUNAN<br>Perhitungan Rampung Biaya Perjalanan Dinas</font></td>
                </tr>
            </table>
            <hr>
    </header>
    
    <div class="body">

        <p>yang bertanda tangan di bawah ini</p>

        <table width="100%"  cellpadding="2">
            <tr>
                <td width="30%">Nama</td>
                <td width="2%">:</td>
                <td>Sumardi</td>
            </tr>

            <tr>
                <td width="30%">NIP</td>
                <td width="2%">:</td>
                <td >197307251994021001</td>
            </tr>

            <tr>
                <td width="30%">Jabatan</td>
                <td width="2%">:</td>
                <td >Pejabat Pembuat Komitmen</td>
            </tr>

        </table>

        <div style="padding-top: 10px"></div>

        <p>Berdasarkan Surat Permintaan Pembayaran (SPP) Nomor :<br>dengan ini kami pertanggungjawabkan realisasi biaya perjalanan dinas sebagai berikut :</p>

        <table width="100%" id="body" cellpadding="6" >
            
            <tr class="ttop">
                <td rowspan="2" style="text-align: center;" class="ttop tbottom" width="5%">No</td>
                <td rowspan="2" style="text-align: center;" class="ttop tbottom" width="25%">Nama</td>
                <td colspan="2" style="text-align: center;" class="ttop tbottom" width="25%">SSPD</td>
                <td rowspan="2" style="text-align: center;" class="ttop tbottom" width="15%">Pengajuan (Rp) </td>
                <td rowspan="2" style="text-align: center;" class="ttop tbottom" width="15%">Realisasi (Rp) </td>
                <td rowspan="2" style="text-align: center;" class="ttop tbottom" width="15%">Selisih (Rp) </td>
            </tr>

            <tr>
                <td style="text-align: center;" class="ttop tbottom" width="25%">Nomor</td>
                <td style="text-align: center;" class="ttop tbottom" width="15%">Tanggal</td>
            </tr>

            <?php $no=1; foreach($export as $e){ ?>

            <tr>
                <td class="ttop tbottom" ><?=$no++?></td>
                <td class="ttop tbottom" ><?=$e->nama?></td>
                <td class="ttop tbottom" ><?=$e->nost?></td>
                <td class="ttop tbottom" ><?=cek_tgl($e->tglst)?></td>
                <td style="text-align: right;" class="ttop tbottom" ><?=rupiah($e->jumlah)?></td>
                <td style="text-align: right;" class="ttop tbottom" ><?=rupiah($e->jumlah)?></td>
                <td style="text-align: right;" class="ttop tbottom" ><?=rupiah($e->jumlah - $e->jumlah)?></td>
            </tr>
           
            <?php } ?>
            <tr>
                <td style="text-align: center;" colspan="4" class="ttop tbottom" >TOTAL</td>
                <td style="text-align: right;" class="ttop tbottom" ><?=rupiah($total)?></td>
                <td style="text-align: right;" class="ttop tbottom" ><?=rupiah($total)?></td>
                <td style="text-align: right;" class="ttop tbottom" ><?=rupiah($total - $total)?></td>
            </tr>
          

            
        </table>

        <p>Jumlah tersebut telah dipertanggungjawabkan oleh pejabat/pegawai yang melakukan perjalanan dinas kepada kami dengan melampirkan bukti-bukti
        pengeluaran sesuai dengan Peraturan Menteri Keuangan Nomor:113/PMK.02/2012 tanggal 03 Juli 2012.<br><br>
        Bukti-bukti pengeluaran di atas kami simpan untuk kelengkapan administrasi dan keperluan pemeriksaan aparat pengawasan fungsional.
        </p>

    </div>

        <table width="100%"  id="borderedless" cellpadding="2">
            <tr>
                <td></td>
                <td width="30%">Jakarta, 15 Maret 2021</td>
            </tr>

            <tr>
                <td></td>
                <td width="30%">Pejabat Pembuat Komitmen</td>
            </tr>


            <tr>
                <td style="padding-top: 10%"></td>
                <td style="padding-top: 10%"></td>
            </tr>

            <tr>
                <td></td>
                <td>Sumardi</td>
            </tr>
            <tr>
                <td></td>
                <td>NIP. 197307251994021001</td>
            </tr>

        </table>
    </body>

   

   
</html>
