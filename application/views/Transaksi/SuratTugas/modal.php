<div id="modalidx" class="modal" style="width: 80%">
    <div class="modal-content">
      <h4>Komponen/Sub Komponen</h4>
      <div style="padding-top: 10px"></div>
        <div class="row">

          <form class="col s12" id="Form">
            <div class="row">

            <div class="input-field col s12" hidden>
                <div class="input-field col s2"><label>Satker</label></div>

                <div class="input-field col s10 " >
                  <input placeholder="Kode Satker" id="kdsatker" name="kdsatker" type="text" value="<?=$this->session->userdata("kdsatker")?>">
                </div>
            </div>
						
						<div class="input-field col s12">
            <table id="KomponenSub" style="width:100%;display: block;height: 400px;overflow-y: scroll;">
              <tbody>
              <?php $a=1;foreach($subkomp as $sk){?>
                <tr>
                  <td style="min-width: 5%"><a class="btn cyan" href="javascript:;" onclick="PilihKode('<?=$sk->kode?>', '<?=$sk->kdindex?>', '<?=$sk->tahapan?>',)" id="Pilih">Pilih</a></td>
                  <td style="width: 30%"><?=$sk->kode?></td>
                  <td style="width: 40%"><?=$sk->nama_app?></td>
                  <td style="width: 40%"><?php if($sk->nama_tahapan == "All"){ echo '-';}else{echo $sk->nama_tahapan;}?></td>
                  <td style="min-width: 20%"><?=rupiah($sk->rupiah_tahapan)?></td>
                </tr></a>
                <?php $a++;}?>
                <?php $a=1;foreach($subkomppagu as $skp){?>
                <tr>
                  <td style="min-width: 5%"><a class="btn cyan" href="javascript:;" onclick="PilihKode_pagu('<?=$skp->kode?>', '<?=$skp->kdindex?>')" id="Pilih">Pilih</a></td>
                  <td style="width: 30%"><?=$skp->kode?></td>
                  <td style="width: 40%">-</td>
                  <td style="width: 40%">-</td>
                  <td style="min-width: 20%"><?=rupiah($skp->rupiah)?></td>
                </tr></a>
                <?php $a++;}?>
              </tbody>
            </table>

            
						</div>
							
             <input type="text" name="kdindex" id="kdindex" hidden>
            </div>
          </form>
        </div>
    </div>
</div>