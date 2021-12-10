<!-- <div class="col s12" >
      <div class="card">
        <div class="card-content">
          <h4 class="card-title col s10"></h4>
          <div class="row">
            <div class="col s12">
              <table id="tabel" class="bordered striped responsive-table" style="width: 100%">
                  <thead>
                    <tr>
                        <th style="width: 20%" >Kode</th>
                        <th style="width: 50%" >Uraian</th>
                        <th style="width: 20%" >Saldo App</th>
                        <th style="width: 10%" >Aksi</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php 
                            $no = $this->uri->segment('4') + 1;
                            $before ="";
                            foreach($mapp as $u){ 
                              if($u->kode != $before){
                              ?>
                              <tr>

                                <?php if ($u->kdlevel == "7"){ ?>
                                <td><a href="javascript:;" onclick="showDetailapp('<?= $u->kdindex ?>')"><?php echo $u->kode ?></a></td>
                                <?php } else{ 
                                  echo '<td>'.$u->kode.'</td>';

                                }; ?>

                                <td><?php echo $u->uraian ?></td>
                                <td class="text-right"><?php echo number_format($u->jumlah,0,',','.') ?></td>
                                <?php if ($u->kdlevel == "7" && $u->kode != "521811"){ ?>
                                <td style="text-align: center"><button type="button" class="btn-floating green" onclick="Add('<?= $u->kdindex ?>', '<?= $u->jumlah ?>', '<?= $u->kdkmpnen ?>', '<?= $u->kdskmpnen ?>')" ><i class="material-icons">add</i></button></td>
                                <?php } else{ 
                                  echo '<td></td>';
                              } ?>
                                
                                
                            </tr>
                          
                         <?php 
                         $before = $u->kode;}} ?>


                  </tbody>
                </table>
                <div id="page-length-option_paginate" class="dataTables_paginate paging_simple_numbers">
                <?= $this->pagination->create_links(); ?>
                </div>
               


                
            </div>
          </div>
        </div>
      </div>
    </div> -->