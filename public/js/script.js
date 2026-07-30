// script header
$(document).ready(function () {
    // const selectUF = $(".select-uf");

    // selectUF.on('change', function () {
    //     const selectedUF = $(this).val();
    //     if (selectedUF && selectedUF !== '') {
    //         window.location.href = base_url + selectedUF.toUpperCase();
    //     }
    // });

    // Validação básica do formulário
    const controleFormulario = $(".controleFormulario");

    controleFormulario.on('submit', function(e) {
        
    // Valida arquivos primeiro
    if (!validateFiles($fileInput[0])) {
        e.preventDefault();
        $fileInput.focus();
        return false; // para aqui
    }

    const emailVal =$(".email").val().trim();

    if(emailVal && !validarEmail(emailVal)) {
        alert("Email inválido!");
        $(".email").focus();
        e.preventDefault();
        return false;
    }

    // Valida CPF
    const cpfVal = $(".cpf").val().trim();
    if (cpfVal && !cpfValidator(cpfVal)) {
        alert("CPF inválido!");
        $(".cpf").focus();
        e.preventDefault();
        return false;
    }

    // Campos obrigatórios
    const vazios = $("[required]").filter(function () {
        return !$(this).val().trim();
    });
    if (vazios.length > 0) {
        e.preventDefault();
        vazios.first().focus();
        alert('Por favor, preencha todos os campos obrigatórios.');
        return false;
    }

    // reCAPTCHA
    if (typeof grecaptcha !== "undefined") {
        const recaptchaResponse = grecaptcha.getResponse();
        if (!recaptchaResponse) {
            e.preventDefault();
            alert('Por favor, complete o reCAPTCHA primeiro!');
            return false;
        }
    }

    // Validações adicionais
    if (typeof validarFormulario === "function" && !validarFormulario()) {
        e.preventDefault();
        return false;
    }

    // Evita múltiplos envios
    $('input[type="submit"]').prop('disabled', true);
});


    // mascáras
    $(".cpf").mask('000.000.000-00');
    $(".celular").mask('(00) 00000-0000');
    $(".cep").mask('00000-000');
    $(".numeroCrm").mask('0000000');
    $(".cep").on('blur', validarCEP);

    // Carregar cidades quando UF muda
    $(".uf").change(async function () {
        const uf = $(this).val();
        if (!uf) return;

        const urlCidades = `https://servicodados.ibge.gov.br/api/v1/localidades/estados/${uf}/municipios`;

        try {
            const response = await fetch(urlCidades);
            const cidades = await response.json();

            let options = '<option value="">Selecione</option>';
            cidades.forEach(cidade => {
                options += `<option value="${cidade.nome}">${cidade.nome}</option>`;
            });

            $(".cidade").html(options);
        } catch (error) {
            console.error("Erro ao carregar cidades:", error);
        }
    });

    // Desabilitar UF do CRM se já tiver valor

    const numeroCrm = $(".numeroCrm");
    const ufCrm = $(".UfCrm");
    const selectedUF = $('#inputUF').val();

    function preencherUfCrm() {
        const valorCampoNumeroCrm = numeroCrm.val().trim();

        if (valorCampoNumeroCrm.length > 0 && selectedUF) {
            ufCrm.val(selectedUF);
            
            if (selectedUF !== 'BR') {
                ufCrm.prop('disabled', true);

                if ($('#ufCrmHidden').length === 0) {
                    ufCrm.after(`<input type="hidden" id="ufCrmHidden" name="ufCrm" value="${selectedUF}">`);
                } else {
                    $('#ufCrmHidden').val(selectedUF);
                }
            }
        } else {
            ufCrm.val('').prop('disabled', false);
            $('#ufCrmHidden').remove();
        }
    }

    numeroCrm.on('blur', preencherUfCrm);



    // Mostrar nome do arquivo selecionado
    const $fileInput = $('#anexoInput');
    const $fileNameDisplay = $('#fileName');

    if ($fileInput.length && $fileNameDisplay.length) {
        $fileInput.on('change', function () {
            if (this.files.length > 0) {
                const file = this.files[0];
                $fileNameDisplay.html(`
                    <i class="bi bi-file-earmark-check text-success me-1"></i>
                    <strong>${file.name}</strong>
                `);
            } else {
                $fileNameDisplay.html(`
                    <i class="bi bi-file-earmark me-1"></i>
                    Nenhum arquivo selecionado
                `);
            }
        });
    }
});

// Funções de validação
function validarFormulario() {
    // Validação do CEP
    if (!validarCEP()) {
        return false;
    }

    return true;
}

    
// $('#telefone').on('blur', function () {
//     const val = $(this).val().replace(/[^\d]/g, '');
//     if (val.length > 0) {
//       if (val.length !== 11 || !phoneValidator(val)) {
//         alert('Informe um Celular válido!');
//         $(this).val('');
//       }
//     }
//   });

function cpfValidator(cpf) {
    cpf = cpf.replace(/[^\d]+/g, '');
    if (cpf == '') return false;
  
    if (cpf.length != 11 ||
      cpf == "00000000000" ||
      cpf == "11111111111" ||
      cpf == "22222222222" ||
      cpf == "33333333333" ||
      cpf == "44444444444" ||
      cpf == "55555555555" ||
      cpf == "66666666666" ||
      cpf == "77777777777" ||
      cpf == "88888888888" ||
      cpf == "99999999999")
      return false;
  
    let add = 0;
    for (let i = 0; i < 9; i++)
      add += parseInt(cpf.charAt(i)) * (10 - i);
    let rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
      rev = 0;
    if (rev != parseInt(cpf.charAt(9)))
      return false;
  
    add = 0;
    for (let i = 0; i < 10; i++)
      add += parseInt(cpf.charAt(i)) * (11 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
      rev = 0;
    if (rev != parseInt(cpf.charAt(10)))
      return false;
    return true;
  }


function validarCEP() {
    const $cep = $(".cep");
    const cepVal = $cep.val().replace(/\D/g, '');

    if (cepVal && cepVal.length !== 8) {
        alert('CEP inválido! Deve ter 8 dígitos.');
        $cep.focus();
        return false;
    }

    return true;
}

function validarEmail(email) {
    const regex = /^[a-zA-Z0-9]+([._-]?[a-zA-Z0-9]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z]{2,})+$/;
    return regex.test(email);
  }

// Consulta CEP
$(".cep").on('blur', function () {
    const $cep = $(this);
    const cepVal = $cep.val().replace(/\D/g, '');

    if (cepVal.length === 8) {
        $.ajax({
            url: 'https://viacep.com.br/ws/' + cepVal + '/json/',
            dataType: 'json',
            success: function (data) {
                if (!data.erro) {
                    $('.logradouro').val(data.logradouro || '');
                    $('.bairro').val(data.bairro || '');
                    $('.cidade').val(data.localidade || '');
                    $('.estado').val(data.uf || '');
                } else {
                    alert('CEP não encontrado!');
                }
            },
            error: function () {
                alert('Erro ao consultar o CEP.');
            }
        });
    }
}); 

const form = document.querySelector('.controleFormulario');
const anexoInput = document.getElementById('anexoInput');


function validateFiles(input) {
    const files = input.files;
    if (!files.length) return true;

    const allowedExtensions = ['png', 'jpg', 'jpeg', 'docx', 'doc', 'pdf']; 
    const maxSize = 5 * 1024 * 1024; 
    let invalidFiles = [];
    let tooBigFiles = [];

    for (let i = 0; i < files.length; i++) {
        const fileName = files[i].name.toLowerCase();
        const extension = fileName.substring(fileName.lastIndexOf('.') + 1);
        if (!allowedExtensions.includes(extension)) invalidFiles.push(files[i].name);
        if (files[i].size > maxSize) tooBigFiles.push(files[i].name);
    }

    if (invalidFiles.length) {
        alert('Arquivos não permitidos:\n' + invalidFiles.join('\n'));
        input.value = '';
        document.getElementById('fileName').textContent = 'Nenhum Arquivo Selecionado';
        return false;
    }

    if (tooBigFiles.length) {
        alert('Arquivos muito grandes:\n' + tooBigFiles.join('\n'));
        input.value = '';
        document.getElementById('fileName').textContent = 'Nenhum Arquivo Selecionado';
        return false;
    }

    document.getElementById('fileName').textContent = Array.from(files).map(f => f.name).join(', ');
    return true;
}

form.addEventListener('submit', function(e) {
    if (!validateFiles(anexoInput)) {
        e.preventDefault(); // impede envio se houver erro
    }
});