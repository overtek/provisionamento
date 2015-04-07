/*
 * Sistema de Documentação do Provedor
 * Autor: Steve Evangelista
 * Versão: 1.0
 * 
 * Upgrade: Versão 1.1
 * Célio Martins
 */


function gravarONU() {
    $.ajax({
        url: "index.php?controle=Provisionamento&acao=cadastra",
        type: 'POST',
        data: $('#cadastroTelefonia').serialize(),
        success: function (result) {
            alert(result);
            $('#conteudo').append(result);
            location.reload();
        }
    });
}
;


function abrirCadastro() {
    limparforms('cadastroTelefonia');
    $('#cadastroTelefonia').attr("action", "index.php?controle=Provisionamento&acao=cadastra");

    new jBox('Modal', {
        width: 940,
        height: 400,
        title: 'Cadastro de Provisionamento',
        content: $('#cadastroTelefonia')
    }).open();
}


function editarCadastro(id) {
    $('#preloader').fadeIn();
    url = "index.php?controle=Provisionamento&acao=getCadastro&id=" + id;
    $.getJSON(url, function (array) {
        for (i = 0; i < array.length; i++) {
            $('input[name=login]').val(array[i].loginPPPoEONU);
            $('input[name=senha]').val(array[i].senhaPPPoEONU);
            $('input[name=numero1]').val(array[i].numero1ONU);
            $('input[name=controle1]').val(array[i].controle1ONU);
            $('input[name=numero2]').val(array[i].numero2ONU);
            $('input[name=controle2]').val(array[i].controle2ONU);
            $('input[name=mac]').val(array[i].macONU);
            $('input[name=nome]').val(array[i].nomeClienteONU);
            $('input[name=id]').val(array[i].idONU);
            $('select[name=cidade]').val(array[i].idCidade);
            $('select[name=tecnico]').val(array[i].idTecnico);
        }
        $('#preloader').fadeOut();
        new jBox('Modal', {
            width: 940,
            height: 400,
            title: 'Editar Cadastro de Provisionamento',
            content: $('#cadastroTelefonia')
        }).open();
    });
}

function garvar_Config() {
    if (($("[name=SSID]").val().length < 3) ||
            ($("[name=ProxyServer]").val().length < 3) ||
            ($("[name=RegistrarServer]").val().length < 3) ||
            ($("[name=UserAgentPort]").val().length < 2) ||
            ($("[name=TelnetPassword]").val().length < 3))
    {
        alert('Preencha os campos corretamente');
        return false;
    }
    $.ajax({
        url: "?controle=Provisionamento&acao=salvaConfiguracao",
        data: $('#form-config').serialize(),
        type: 'post',
        success: function (result) {
            alert(result);
        },
        error: function (result) {
            alert('Falha na execução ' + result);
        }
    });
}


function excluir_cliente(id) {
    var cli = $("#" + id).html();
    new jBox('Confirm', {
        title: 'Excluir Provisionamento de Cliente',
        confirmButton: 'Ok',
        cancelButton: 'Cancelar',
        content: 'Deseja excluir este Cliente: <b>' + id + ' - ' + cli + '</b>?',
        confirm: function () {
            $.ajax({
                url: "index.php?controle=Provisionamento&acao=deletaCliente&id=" + id,
                success: function (result) {
                    alert(result);
                    location.reload();
                },
                error: function (result) {
                    Alert('Falha na execução ' + result);
                }
            });
        }
    }).open();
}


function buscar_cliente() {
    var txt = $('#busca_cliente').val();
    if ((txt.length > 0) && (txt.length < 3)) {
        alert('Preencha corretamente o campo de busca');
        $('#busca_cliente').focus();
        4
        return false;
    } else {
        window.location = "?controle=Provisionamento&acao=carregaTabela&cliente=" + txt;
    }
    if (txt.length == 0) {
        window.location = "index.php";
    }
}


/*
 * Funções da tela de cadastro de Técnicos -----------------------------
 */

function cadastro_tecnico() {
    limparforms('formTecnico');
    $('input[name=senhaTecnico]').attr("type", "text");
    cadtecnico = new jBox('Modal', {
        width: 422,
        height: 275,
        title: 'Cadastro de T&eacute;cnico',
        content: $('#formTecnico')
    }).open();
}


function editarTecnico(id) {
    url = "?controle=Tecnicos&acao=getTecnico&id=" + id;
    $.getJSON(url, function (array) {
        for (i = 0; i < array.length; i++) {
            $('input[name=codTecnico]').val(array[i].idTecnico);
            $('input[name=nomeTecnico]').val(array[i].nomeTecnico);
            $('input[name=senhaTecnico]').attr("type", "password");
            $('input[name=senhaTecnico]').val(array[i].senhaTecnico);
            $('input[name=emailTecnico]').val(array[i].emailTecnico);
        }
        cadtecnico = new jBox('Modal', {
            width: 422,
            height: 275,
            title: 'Editar Cadastro de T&eacute;cnico',
            content: $('#formTecnico')
        }).open();
    });
}

function Formgravar_Tecnico() {
    if (($("[name=nomeTecnico]").val().length < 3) ||
            ($("[name=emailTecnico]").val().length < 3) ||
            ($("[name=senhaTecnico]").val().length < 3))
    {
        return false;
    }
    $.ajax({
        url: "index.php?controle=Tecnicos&acao=cadastraTecnico",
        type: 'POST',
        data: $('#formTecnico').serialize(),
        success: function (result) {
            alert(result);
            cadtecnico.close();
            location.reload();
        },
        error: function (result) {
            alert("Erro ao gravar o técnico");
        }
    });
}


function gravar_Tecnico() {
    if (($("[name=nomeTecnico]").val().length < 3) ||
            ($("[name=emailTecnico]").val().length < 3) ||
            ($("[name=senhaTecnico]").val().length < 3))
    {
        return false;
    }
    $.ajax({
        url: "index.php?controle=Tecnicos&acao=cadastraTecnico",
        type: 'POST',
        data: $('#formTecnico').serialize(),
        success: function (result) {
            alert(result);
            cadtecnico.close();
            if (document.getElementById('codTecnico').value.length > 0) {
                location.reload();
            } else
            {
                $.get("index.php?controle=Provisionamento&acao=getTecnicos", function (lista) {
                    $('#LISTATEC').empty().append(utf8_decode(lista));
                });
            }
        },
        error: function (result) {
            alert("Erro ao gravar o técnico");
        }
    });
}

function excluir_Tecnico(id) {
    var tec = $("#" + id).html();
    new jBox('Confirm', {
        title: 'Excluir T&eacute;cnico',
        confirmButton: 'Ok',
        cancelButton: 'Cancelar',
        content: 'Deseja excluir este T&eacute;cnico: <b>' + id + ' - ' + tec + '</b>?',
        confirm: function () {
            $.ajax({
                url: "index.php?controle=Tecnicos&acao=deletaTecnico&id=" + id,
                success: function (result) {
                    alert(result);
                    location.reload();
                },
                error: function (result) {
                    Alert('Falha na execução ' + result);
                }
            });
        }
    }).open();
}

/*
 * Fim das Funções da tela de cadastro de Técnicos ---------------------
 */


/*
 * FunÃ§Ãµes da tela de cadastro de Cidades ------------------------------
 */

function cadastro_cidade() {
    limparforms('formCidade');
    cadcidade = new jBox('Modal', {
        width: 420,
        height: 175,
        title: 'Cadastro de Cidades',
        content: $('#formCidade')
    }).open();
}


function Form_cadCidade() {
    limparforms('formCidade');
    cadcidade = new jBox('Modal', {
        width: 422,
        height: 180,
        title: 'Cadastro de Cidades',
        content: $('#formCidade')
    }).open();
}


function editarCidade(id) {
    url = "?controle=Cidade&acao=getCidade&id=" + id;
    $.getJSON(url, function (array) {
        for (i = 0; i < array.length; i++) {
            $('input[name=idCidade]').val(array[i].idCidade);
            $('input[name=nomeCidade]').val(array[i].nomeCidade);
            $('select[name=idEstado]').val(array[i].idEstado);
        }
        cadcidade = new jBox('Modal', {
            width: 422,
            height: 180,
            title: 'Editar Cadastro de Cidade',
            content: $('#formCidade')
        }).open();
    });
}

function Formgravar_Cidade() {
    if (($("[name=nomeCidade]").val().length < 3))
    {
        return false;
    }
    $.ajax({
        url: "index.php?controle=Cidade&acao=cadastraCidade",
        type: 'POST',
        data: $('#formCidade').serialize(),
        success: function (result) {
            alert(result);
            cadcidade.close();
            location.reload();
        },
        error: function (result) {
            alert("Erro ao gravar a Cidade");
        }
    });
}


function gravar_Cidade() {
    if (($("[name=nomeCidade]").val().length < 3))
    {
        return false;
    }
    $.ajax({
        url: "index.php?controle=Cidade&acao=cadastraCidade",
        type: 'POST',
        data: $('#formCidade').serialize(),
        success: function (result) {
            alert(result);
            cadcidade.close();
            if (document.getElementById('codCidade').value.length > 1) {
                location.reload();
            } else {
                $.get("index.php?controle=Provisionamento&acao=getCidades", function (lista) {
                    $('#LISTACIDADES').empty().append(utf8_decode(lista));
                });
            }

        },
        error: function (result) {
            alert("Erro ao gravar a Cidade");
        }
    });
}


function excluir_cidade(id) {
    var cit = $("#" + id).html();
    new jBox('Confirm', {
        title: 'Excluir Cidade',
        confirmButton: 'Ok',
        cancelButton: 'Cancelar',
        content: 'Deseja excluir esta Cidade: <b>' + id + ' - ' + cit + '</b>?',
        confirm: function () {
            $.ajax({
                url: "index.php?controle=Cidade&acao=deletaCidade&id=" + id,
                success: function (result) {
                    alert(result);
                    location.reload();
                },
                error: function (result) {
                    Alert('Falha na execuÃ§Ã£o ' + result);
                }
            });
        }
    }).open();
}

/*
 * Fim das funÃ§Ãµes do cadastro de cidades--------------------------------------------------------
 */


function limparforms(form) {
    $('#' + form).find('input').each(function () {
        if ($(this).attr("type") == "text")
            $(this).val('');
        if ($(this).attr("type") == "email")
            $(this).val('');
        if ($(this).attr("type") == "hidden")
            $(this).val('');
        if ($(this).attr("type") == "password")
            $(this).val('');
    });

}

$(function(){
    $("#busca_cliente").keyup(function (e) {
        if (e.which == 13) {
            buscar_cliente();
        }
     });
});


function utf8_decode(str_data) {
    var tmp_arr = [], i = 0, ac = 0, c1 = 0, c2 = 0, c3 = 0, c4 = 0;

    str_data += '';

    while (i < str_data.length) {
        c1 = str_data.charCodeAt(i);
        if (c1 <= 191) {
            tmp_arr[ac++] = String.fromCharCode(c1);
            i++;
        } else if (c1 <= 223) {
            c2 = str_data.charCodeAt(i + 1);
            tmp_arr[ac++] = String.fromCharCode(((c1 & 31) << 6) | (c2 & 63));
            i += 2;
        } else if (c1 <= 239) {
            // http://en.wikipedia.org/wiki/UTF-8#Codepage_layout
            c2 = str_data.charCodeAt(i + 1);
            c3 = str_data.charCodeAt(i + 2);
            tmp_arr[ac++] = String.fromCharCode(((c1 & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
            i += 3;
        } else {
            c2 = str_data.charCodeAt(i + 1);
            c3 = str_data.charCodeAt(i + 2);
            c4 = str_data.charCodeAt(i + 3);
            c1 = ((c1 & 7) << 18) | ((c2 & 63) << 12) | ((c3 & 63) << 6) | (c4 & 63);
            c1 -= 0x10000;
            tmp_arr[ac++] = String.fromCharCode(0xD800 | ((c1 >> 10) & 0x3FF));
            tmp_arr[ac++] = String.fromCharCode(0xDC00 | (c1 & 0x3FF));
            i += 4;
        }
    }
    return tmp_arr.join('');
}