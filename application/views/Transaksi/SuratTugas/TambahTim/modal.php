<div id="Modalexport" class="modal">
    <div class="modal-content">
      <h4>Import Tim</h4>
            <div style="padding-top: 10px"></div>
        <div class="row">

            <form method="POST" id="form-import" enctype="multipart/form-data">
                        <div class="input-field col s12">
                            <!-- <div class="input-field col s2">Upload File</div> -->
                                <div class="col s5">
                                    <a class="gradient-45deg-indigo-light-blue btn col s12" onclick="Upload()"><i class="material-icons left">cloud_upload</i>Upload File</a>
                                </div>
                                <div class="input-field col s7 ">
                                    <input placeholder="File..." id="shad_file" name="shad_file" type="text" Readonly>
                                </div>
                        </div>

                            <input value="<?= $this->session->userdata("kdsatker"); ?>" id="kdsatker" name="kdsatker" type="text" hidden>

                        <div class="input-field col s2 ">
                            
                            <input type="file" id="file_" name="file_" accept=".xls,.xlsx" hidden>
                        </div>
                        <div style="padding-top: 10px"></div>
                <div class="col s12">
                    <div class="col s8"></div>
                    <div class="col s4">
                         <button class="btn indigo btn-upload col s12" id="btn-upload"> Simpan</button>
                    </div>
                </div>
            </form>

                <div class="col s8">
                    <a href="javascript:;" onclick="Template()"><p>* Klik untuk mengunduh template file tim</p></a>
                </div>

            <form id="FormTemplate" style="display: none">
            <input type="date" min="" max=""  id="tglberangkat" name="tglberangkat">
            <input type="date" min="" max=""  id="tglberangkat" name="tglberangkat">
            </form>
        </div>

            

    </div>
</div>