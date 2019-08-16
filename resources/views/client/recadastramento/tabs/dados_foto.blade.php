<div class="tab-pane" id="tab_7">

    <div class="panel panel-primary">

        <div class="panel-heading"><i class="fa fa-address-card"></i> Foto do Servidor</div>

        <div class="panel-body">
            <div class="row">
                <div class="col-sm-4">
                    <label>Opções da Webcam</label>
                </div>
                <div class="col-sm-6">
                    <label for="fotos2">Enviar imagem</label>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <button type="button" class="btn btn-info" onclick="abrirCamera();">
                        Abrir Câmera
                    </button>
                    <button type="button" class="btn btn-danger" onclick="fecharCamera();">
                        <i class="far fa-times-circle"></i>
                        Fechar Câmera
                    </button>
                    <button type="button" class="btn btn-primary" onclick="tirarFoto();">
                        <i class="fas fa-camera-retro"></i>
                        Tirar Foto
                    </button>

                </div>
                <div class="col-sm-4 col-sm-pull-2">
                    <input class="filestyle" type="file" name="fotos2" id="fotos2">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div id="wrapper-cam">

                    </div>
                    <div id="hidden-foto">

                    </div>
                </div>

                <div style="margin-top: 10px" class="col-md-6">

                    <div id="results"></div>

                </div>
            </div>


        </div>
    </div>

</div>
<!-- /.tab-pane -->