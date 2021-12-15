<div id="modalidx" class="modal">
    <div class="modal-content" style="min-height: 400px;">
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
                  <td width="20%"><a class="btn cyan" href="javascript:;" onclick="PilihKode('<?=$sk->kode?>', '<?=$sk->kdindex?>')" id="Pilih">Pilih</a></td>
                  <td width="80%"><?=$sk->kode?></td>
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