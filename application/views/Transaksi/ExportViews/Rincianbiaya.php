<!DOCTYPE html>
<html lang="en">
    <head>
    <title>View PDF Rincian Biaya</title>
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

?>

   

    <body>
    <?php foreach($export as $e){?>

    <header>
        <table width="100%" id="head">
                <tr>
                    <td width="30%" rowspan="2"><img src="<?= base_url().'assets'?>/app-assets/images/logo/BPKP_Logo_2_jpg.jpg" alt="materialize logo"></td>
                    <td style="text-align: center"><font style="font-size: 20px">BADAN PENGAWASAN KEUANGAN DAN PEMBANGUNAN<br>RINCIAN BIAYA PERJALANAN DINAS</font></td>
                </tr>
            </table>
    </header>
    
    <div class="body">

        <div style="padding-top: 30px"></div>

        <table width="100%"  cellpadding="2">
            <tr>
                <td width="15%" colspan="3">Lampiran SPD</td>
            </tr>

            <tr>
                <td width="15%">Nomor</td>
                <td width="2%">:</td>
                <td ><?=$e->nost?></td>
            </tr>

            <tr>
                <td width="15%">Tanggal</td>
                <td width="2%">:</td>
                <td ><?=cek_tgl($e->tglst)?></td>
            </tr>

        </table>

        <div style="padding-top: 10px"></div>

        <table width="100%" id="body" cellpadding="6" >
            
            <tr class="ttop">
                <td style="text-align: center;" class="ttop tbottom" width="3%">No</td>
                <td style="text-align: center;" class="ttop tbottom" width="45%">Perincian Biaya</td>
                <td style="text-align: center;" class="ttop tbottom" width="25%">Jumlah (Rp) </td>
                <td style="text-align: center;" class="ttop tbottom" width="25%">Keterangan</td>
            </tr>

            <tr>
                <td></td>
                <td>Biaya Perjalanan Dinas Pegawai<br>Dari tanggal <?=cek_tgl($e->tglberangkat)?> s.d. <?=cek_tgl($e->tglkembali)?></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>1</td>
                <td>Uang Harian<br>- <?=Explodekota($e->kotatujuan)?> : <?= $e->jmlhari ?> hari x <?=rupiah($e->tarifuangharian)?></td>
                <td style="text-align: right"><br><?=rupiah($e->totaluangharian)?></td>
                <td></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Uang Hotel<br>- <?=Explodekota($e->kotatujuan)?> : <?= ($e->jmlhari - 1) ?> hari = <?=rupiah($e->totalinap)?></td>
                <td style="text-align: right"><br><?=rupiah($e->totalinap)?></td>
                <td></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Uang Transport<br>- <?=Explodekota($e->kotaasal)?> - <?=Explodekota($e->kotatujuan)?></td>
                <td style="text-align: right"><br><?=rupiah($e->totaltravel)?></td>
                <td></td>
            </tr>
            <tr>
                <td>4</td>
                <td>Uang Representatif</td>
                <td style="text-align: right"><?=rupiah($e->tarifrep)?></td>
                <td></td>
            </tr>
            <tr class="ttop">
                <td class="ttop tbottom"></td>
                <td class="ttop tbottom" style="text-align: center">TOTAL</td>
                <td class="ttop tbottom" style="text-align: right"><?=rupiah($e->jumlah)?></td>
                <td class="ttop tbottom" ></td>
            </tr>
            <tr class="ttop">
                <td class="ttop tbottom" colspan="4">Terbilang : <?=terbilang($e->jumlah)?></td>
            </tr>
        </table>

    </div>

        <table width="100%"  id="borderedless" cellpadding="2">
            <tr>
                <td colspan="2"></td>
                <td width="30%"><?= ucwords(strtolower("$e->lokasi")) ?>, <?=cek_tgl($e->tglst)?></td>
            </tr>

            <tr>
                <td colspan="2">Telah dibayar uang sebesar </td>
                <td width="30%">Telah diterima uang sebesar</td>
            </tr>

            <tr>
                <td colspan="2"><?=terbilang($e->jumlah)?></td>
                <td width="30%"><?=terbilang($e->jumlah)?></td>
            </tr>

            <tr>
                <td>Bendahara Pengeluaran</td>
                <td></td>
                <td>Yang Menerima,</td>
            </tr>

            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td style="padding-top: 10%"></td>
                <td style="padding-top: 10%"></td>
                <td style="padding-top: 10%"></td>
            </tr>

            <tr>
                <td>Aditya Kurniawan</td>
                <td></td>
                <td><?=$e->nama?></td>
            </tr>
            <tr>
                <td>NIP. 198503272007011002</td>
                <td></td>
                <td>NIP.<?=$e->nip?></td>
            </tr>

        </table>

        <hr style="height:2x;background-color:#000;">

        <table width="100%"  id="borderedless" cellpadding="2">
            <tr>
                <td colspan="4"><b>PERHITUNGAN SPD RAMPUNG</b></td>
            </tr>

            <tr>
                <td width="30%">Ditetapkan Sejumlah</td>
                <td width="10%">Rp</td>
                <td width="20%" style="text-align: right"><?=$e->jumlah?></td>
                <td></td>
            </tr>

            <tr>
                <td width="30%">Yang telah dibayarkan semula</td>
                <td width="10%">Rp</td>
                <td width="20%" style="text-align: right"><?=$e->jumlah?></td>
                <td></td>
            </tr>

            <tr>
                <td width="30%">Sisa kurang/(lebih)</td>
                <td width="10%">Rp</td>
                <td width="20%" style="text-align: right">0</td>
                <td></td>
            </tr>

            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>Pejabat Pembuat Komitmen</td>
            </tr>

            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td style="padding-top: 10%"></td>
                <td style="padding-top: 10%"></td>
                <td style="padding-top: 10%"></td>
                <td style="padding-top: 10%"></td>
            </tr>

            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><u><?= $e->ppk_ttd ?></u></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>NIP. <?= $e->nip_ttd ?></td>
            </tr>

        </table>

            <div class="page_break"></div>
            <?php }?>
            
    
    </body>

   

   
</html>
