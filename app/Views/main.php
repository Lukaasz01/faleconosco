<?php echo view('includes/html_head'); ?>

<!-- Header -->

<?php echo view('includes/header'); ?>

<!-- Conteúdo Principal -->

<form class="controleFormulario needs-validation" action="<?php echo base_url(); ?>enviar_email"
    method="post" enctype="multipart/form-data" novalidate>
	<input type="hidden" name="ufFormulario" value="<?php echo $uf; ?>" />
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 bg-dark-white d-inline rounded-high">

                <div class="row bg-medium-green text-center rounded-high-top py-3">
                    <div class="col-12">
                        <p class="text-white fw-bold fs-2 m-0">Fale conosco</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 py-4 px-3 px-md-5 mb-3">
                        <div class="row">
                            <div class="col-12">
                                <p class="mb-4 text-danger fw-bold">ATENÇÃO:</p>

                                <ul class="ps-3 ps-md-4 mb-4">
                                    <li class="mb-2"> Este canal não é destinado ao envio de denúncia ética contra
                                        médicos.
                                    </li>
                                    <li>A denúncia ética deve ser dirigida ao Presidente do Conselho Regional de
                                        Medicina do local onde ocorreram os fatos a serem apurados.
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row px-2 px-md-3 mb-4">
                            <div class="col-12">
                                <?php if($get_uf != 'RJ'){ ?>
                                <p class="fs-5 inline-block topic-point"><b>Área de contato: <span
                                            class="text-danger">*</span></b></p>
                                <?php } else { ?>
                                <p class="fs-5 inline-block topic-point"><b>Assunto: <span
                                            class="text-danger">*</span></b></p>
                                <?php } ?>
                                <hr>

                                <div class="row">
                                    <div class="col-12 col-md-4 col-lg-4 form-group">

                                        <select name="areaContato" id="areaContato"
                                            class="form-select rounded-pill border-0 shadow-sm py-2 px-3" required>
                                            <option value="">Selecione</option>
                                            <?php 
                                    if(is_array($regional_email)){
                                        $area_count = 1;
                                        foreach($regional_email as $rei => $rev){
                                            if($area_count == $id_area){
                                                $is_selected = 'selected="selected"';
                                            } else {
                                                $is_selected = '';
                                            }
                                            ?>

                                            <option value="<?php echo $rei; ?>" <?php echo $is_selected; ?>>
                                                <?php echo $rei;?>
                                            </option>
                                            <?php
                                    $area_count++;
                                        }
                                    } else { ?>
                                            <option value="<?php echo $regional_email ; ?>">Geral</option>
                                            <?php } ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3 px-2 px-md-3 mb-3">
                            <div class="col-12">
                                <p class="fs-5 inline-block topic-point"><b>Caso seja médico, preencha abaixo com os
                                        dados de seu Regional</b></p>
                                <hr>
                                <div class="row px-2">
                                    <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                                        <label class="fw-bold">Número do CRM:
                                        </label>
                                        <input type="text" name="numeroCrm"
                                            class="form-control rounded-pill border-0 shadow-sm py-2 px-3 numeroCrm"
                                            maxlength="7">
                                    </div>
                                    <div class="col-6 col-md-4 col-lg-2">
                                        <label class="fw-bold">UF:
                                        </label>
                                        <select name="ufCrm" class="form-select rounded-pill border-0 shadow-sm py-2 px-3 UfCrm">
                                            <option value="Selecionar">Selecione</option>
                                            <option value="BR">BR</option>
                                            <option value="AC">AC</option>
                                            <option value="AL">AL</option>
                                            <option value="AM">AM</option>
                                            <option value="AP">AP</option>
                                            <option value="BA">BA</option>
                                            <option value="CE">CE</option>
                                            <option value="DF">DF</option>
                                            <option value="ES">ES</option>
                                            <option value="GO">GO</option>
                                            <option value="MA">MA</option>
                                            <option value="MG">MG</option>
                                            <option value="MT">MT</option>
                                            <option value="MS">MS</option>
                                            <option value="PA">PA</option>
                                            <option value="PB">PB</option>
                                            <option value="PE">PE</option>
                                            <option value="PI">PI</option>
                                            <option value="PR">PR</option>
                                            <option value="RJ">RJ</option>
                                            <option value="RN">RN</option>
                                            <option value="RS">RS</option>
                                            <option value="RO">RO</option>
                                            <option value="RR">RR</option>
                                            <option value="SC">SC</option>
                                            <option value="SP">SP</option>
                                            <option value="SE">SE</option>
                                            <option value="TO">TO</option>
                                        </select>
                                        <input type="hidden" id="inputUF" value="<?= $uf?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row px-md-3 mb-1">
                            <div class="col-12 col-md-6">
                                <p class="topic-point fs-5"><b>Dados Gerais</b></p>
                                <hr>
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label class="fw-bold">Nome Completo:
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="nomeCompleto"
                                            class="form-control rounded-pill border-0 shadow-sm py-2 px-3 nome"
                                            placeholder="Digite seu nome" id="validationCustom01" required>
                                        <div class="invalid-feedback">O campo Nome é obrigatório.</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label class="fw-bold">Email:
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="email"
                                            class="form-control rounded-pill border-0 shadow-sm py-2 px-3 email"
                                            placeholder="exemplo@seudominio.com" required>
                                        <div class="invalid-feedback">O campo Email é obrigatório.</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-lg-6 mb-3">
                                        <label class="fw-bold">CPF:
                                        </label>
                                        <input type="text" name="cpf"
                                            class="form-control rounded-pill border-0 shadow-sm py-2 px-3 cpf"
                                            maxlength="11">
                                    </div>
                                    <div class="col-12 col-lg-6 mb-3">
                                        <label class="fw-bold">Celular:
                                        </label>
                                        <input type="text" name="celular"
                                            class="form-control rounded-pill border-0 shadow-sm py-2 px-3 celular"
                                            maxlength="13">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <p class="topic-point fs-5"><b>Endereço</b></p>
                                <hr>

                                <div class="row">
                                    <div class="col-12 col-md-8 col-lg-5 mb-3">
                                        <label class="fw-bold">CEP:
                                        </label>
                                        <input type="text" name="cep"
                                            class="cep form-control rounded-pill border-0 shadow-sm py-2 px-3 cep"
                                            maxlength="8">
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-3 mb-3">
                                        <label class="fw-bold">Estado:
                                        </label>
                                        <select type="text" name="estado"
                                            class="form-control rounded-pill border-0 shadow-sm py-2 px-3 estado">
                                            <option value="Selecionar">--</option>
                                            <option value="AC">AC</option>
                                            <option value="AL">AL</option>
                                            <option value="AM">AM</option>
                                            <option value="AP">AP</option>
                                            <option value="BA">BA</option>
                                            <option value="CE">CE</option>
                                            <option value="DF">DF</option>
                                            <option value="ES">ES</option>
                                            <option value="GO">GO</option>
                                            <option value="MA">MA</option>
                                            <option value="MG">MG</option>
                                            <option value="MT">MT</option>
                                            <option value="MS">MS</option>
                                            <option value="PA">PA</option>
                                            <option value="PE">PE</option>
                                            <option value="PI">PI</option>
                                            <option value="PR">PR</option>
                                            <option value="PB">PB</option>
                                            <option value="RJ">RJ</option>
                                            <option value="RN">RN</option>
                                            <option value="RS">RS</option>
                                            <option value="RO">RO</option>
                                            <option value="RR">RR</option>
                                            <option value="SC">SC</option>
                                            <option value="SE">SE</option>
                                            <option value="SP">SP</option>
                                            <option value="TO">TO</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-lg-4 mb-3">
                                        <label class="fw-bold">Cidade:
                                        </label>
                                        <input type="text" name="cidade"
                                            class="cidade form-control rounded-pill border-0 shadow-sm py-2 px-3">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label class="col-12 fw-bold">Logradouro:
                                        </label>
                                        <input type="text" name="logradouro"
                                            class="logradouro form-control rounded-pill border-0 shadow-sm py-2 px-3">
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-3 mb-3">
                                        <label class="fw-bold">Número:
                                        </label>
                                        <input type="text" name="numero"
                                            class="form-control rounded-pill border-0 shadow-sm py-2 px-3">
                                    </div>
                                    <div class="col-8 col-md-8 col-lg-9 mb-3">
                                        <label class="fw-bold">Bairro:</label>
                                        <input type="text" name="bairro"
                                            class="bairro form-control rounded-pill border-0 shadow-sm py-2 px-3">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row g-3 px-2 px-md-4">
                            <div class="col-12">
                                <p class="topic-point fs-5"><b>Motivo do Contato: </b></p>
                                <hr>

                                <?php if($get_uf != 'RJ') { ?>
                                <label class="fw-bold">Assunto:
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="assunto"
                                    class="form-control rounded-pill border-0 shadow-sm py-2" required>
                                <div class="invalid-feedback">O campo Assunto é obrigatório.</div>
                                <?php } ?>

                            </div>
                            <div class="col-12">
                                <label class="fw-bold">Mensagem:
                                    <span class="text-danger">*</span>
                                </label>
                                <textarea class="col-12 form-control border-0 shadow-sm rounded-high outline-0"
                                    name="mensagem" rows="10" required></textarea>
                                <div class="invalid-feedback">O campo Mensagem é obrigatório.</div>
                            </div>
                            <div class="col-12">
                                <label class="fw-bold">Justificativa:
                                </label>
                                <textarea class="col-12 form-select border-0 shadow-sm rounded-high"
                                    name="justificativa" rows="10"></textarea>

                                <?php if($regional_anexo == true){ ?>
                                <div class="row my-2">
                                    <div class="col-12">
                                        <label class="d-flex fw-bold mb-2">Anexos:</label>
                                        <input type="file" accept="image/*,.pdf,.doc,.docx,.zip,.rar"
                                            class="form-control" name="anexo" id="anexoInput" multiple hidden>
                                        <label
                                            class="btn btn-success bg-bluish-green text-white border-0 rounded-pill px-3 py-2 mb-2"
                                            for="anexoInput">
                                            <i class="bi bi-cloud-upload me-2"></i>Selecionar Arquivo
                                        </label>
                                        <span class="text-muted mt-2 d-block" id="fileName">
                                            <i class="bi bi-file-earmark me-1"></i>Nenhum Arquivo Selecionado
                                        </span>
                                        <?php if(isset($tiposAceitosValidacao) == true){ ?>
                                        <div class="invalid-feedback">Tipo de arquivo não aceito.</div>
                                        <?php } ?>
                                    </div>
                                </div>

                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center align-items-center py-5 mb-4">
                    <div class="col-12 col-md-6 d-flex justify-content-center mb-5 mb-md-0">
                        <div class="g-recaptcha ms-5 ms-md-0" data-sitekey="6LftQdsrAAAAAOFVhiDuDoGtwuKTUHEGrDBYEiii">
                        </div>
                    </div>

                    <div class="col-6 d-flex justify-content-center align-items-center">
                        <button type="submit"
                            class="bg-bluish-green rounded-pill shadow-sm border-0 text-white fs-5 fw-bold px-6 py-2 hover-green-to-white botao">
                            Enviar
                        </button>
                    </div>

                </div>
            </div>
        </div>

    </div>
</form>



<?php echo view('includes/footer'); ?>


<?php if ($redirect_regional = true){ ?>

<script>
$('#areaContato').on('change', function(e) {
	let regionalEmail = JSON.parse('<?php echo json_encode($regional_email); ?>');
    if((regionalEmail[$(this).val()].search('http://') != -1) ||  (regionalEmail[$(this).val()].search('https://') != -1)){
		window.location.replace(regionalEmail[$(this).val()]);

	}
	return;
});
</script>

<?php }; ?>