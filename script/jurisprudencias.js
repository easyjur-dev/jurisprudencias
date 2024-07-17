
function mostraPesquisaAvacada() {
  $(".inative").toggle();
  $("#acoes").toggleClass("mt-3");
  $("#icone_seta").toggleClass("fa-arrow-down fa-arrow-up");
}

function mostraMaisAcordao() {
  $("#acordao_descricao").toggleClass("expandir");
  $("#mostra_menos_acordao").toggleClass(
    "fa-square-caret-down fa-square-caret-up"
  );
}

function copiaEmenta() {
  mostraAlerta("As informações da ementa foram copiadas com sucesso.");
}

function copiaAcordao() {
  mostraAlerta("As informações do acordão foram copiadas com sucesso.");
}

function copiaInformacoesDoProcesso() {
  mostraAlerta("As informações do processo foram copiadas com sucesso.");
}

function imprimiInteroTeor() {
  var opcoes = {
    margin: 1,
    filename: "interero teor easyjur.pdf",
    image: { type: "jpeg", quality: 0.98 },
    html2canvas: { scale: 2 },
    jsPDF: { unit: "in", format: "letter", orientation: "portrait" },
  };

  html2pdf()
    .set(opcoes)
    .from($("#div_intero_teor_impressao")[0])
    .toPdf()
    .get("pdf")
    .then(function (pdf) {
      window.open(pdf.output("bloburl"), "_blank");
    });
}

function imprimiListagem() {
  var opcoes = {
    margin: 1,
    filename: "relação jurisprudências easyjur.pdf",
    image: { type: "jpeg", quality: 0.98 },
    html2canvas: { scale: 2 },
    jsPDF: { unit: "in", format: "letter", orientation: "portrait" },
  };

  html2pdf()
    .set(opcoes)
    .from($("#div_listagem_impressao")[0])
    .toPdf()
    .get("pdf")
    .then(function (pdf) {
      window.open(pdf.output("bloburl"), "_blank");
    });
}

function inicialisaCalendarioNosInputs(selector) {
  $(selector).datepicker({
    dateFormat: "dd/mm/yy",
    dayNames: [
      "Domingo",
      "Segunda",
      "Terça",
      "Quarta",
      "Quinta",
      "Sexta",
      "Sábado",
    ],
    dayNamesMin: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb"],
    dayNamesShort: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb"],
    monthNames: [
      "Janeiro",
      "Fevereiro",
      "Março",
      "Abril",
      "Maio",
      "Junho",
      "Julho",
      "Agosto",
      "Setembro",
      "Outubro",
      "Novembro",
      "Dezembro",
    ],
    monthNamesShort: [
      "Jan",
      "Fev",
      "Mar",
      "Abr",
      "Mai",
      "Jun",
      "Jul",
      "Ago",
      "Set",
      "Out",
      "Nov",
      "Dez",
    ],
    nextText: "Próximo",
    prevText: "Anterior",
    changeYear: true,
    yearRange: "c-100:c+20",
  });
}

$(function () {
  inicialisaCalendarioNosInputs("#data_inicio_publicacao");
  inicialisaCalendarioNosInputs("#data_fim_publicacao");
  inicialisaCalendarioNosInputs("#data_inicio_julgamento");
  inicialisaCalendarioNosInputs("#data_fim_julgamento");
});

function mostraAlerta(content) {
  $.alert({
    title: '<img src="assets/img/logo.png" style="width: 135px">',
    content: content,
    buttons: {
      alert: {
        text: "OK",
        btnClass: "btn-blue",
      },
    },
  });
}

function removeBlankAttributes(obj) {
    const result = {};
    for (const key in obj) {
        if (obj[key] !== null && obj[key] !== undefined && obj[key] !== "") {
            result[key] = obj[key];
        }
    }
    return result;
}

function carregaListaJurisprudencias(dadosPesquisa, page=1) {

  dadosPesquisa = removeBlankAttributes(dadosPesquisa)
  dadosPesquisa.page = page
  let params = (new URLSearchParams(dadosPesquisa)).toString()
  $.ajax({
    url: "https://magnolio.azurewebsites.net/api/search?"+params,
    //url: "http://localhost:7071/api/search?"+params,
    method: "GET",
    dataType: "json",
    beforeSend: function (xhr) {
      //mostrarLoader("Carregando lista de pop-ups cadastrados, por favor aguarde!");
    },
    success: function (response, textStatus, xhr) {
      let template_lista = retornaTemplateJurisprudeciaLista(response.results);
      $("#corpo_listagem_tabela").html(template_lista);

      let template_paginacao = retornaTemplatePaginacao(response.meta.page);
      $("#footer_paginacao_pop-up").html(template_paginacao);

      $("html, body").animate(
        {
          scrollTop: 0,
        },
        500
      );
    },
    error: function (xhr, textStatus, errorThrown) {
      //alert_erro_popup("Desculpe, ocorreu um erro ao carregar a listagem. Por favor, atualize a página e tente novamente.");
    },
    complete: function (xhr, textStatus) {
      // fecharLoader();
    },
  });
}


function retornaDadosPesquisa() {
  return {
    q: $("#nome_ementa_acordao").val() ?? ' ',
    with: $("#contem_palavra").val(),
    without: $("#nao_contem_palavra").val(),
    numeroProcesso: $("#numero_processo").val(),
    orgaoJudicante: $("#orgao_judicante").val(),
    relator: $("#ministo_relator").val(),
    data_pub_inicio: $("#data_inicio_publicacao").val().split('/').reverse().join('-'),
    data_pub_fim: $("#data_fim_publicacao").val().split('/').reverse().join('-'),
    data_julgamento_inicio: $("#data_inicio_julgamento").val().split('/').reverse().join('-'),
    data_julgamento_fim: $("#data_fim_julgamento").val().split('/').reverse().join('-'),
    classeProcessual: $("#classe_processo").val(),
    classeProcessual: $("#classe_processo").val(),
    ordemListagem: $("#ordenar_listagem").val(),

    checkboxSTJ: $('#checkbox_stj').is(':checked') ? 1 : 0,
    checkboxTST: $('#checkbox_tst').is(':checked') ? 1 : 0,
    checkboxSTF: $('#checkbox_stf').is(':checked') ? 1 : 0,
  };

}


function limparDadosPesquisa() {
  $("#nome_ementa_acordao").val('');
  $("#contem_palavra").val('');
  $("#nao_contem_palavra").val('');
  $("#numero_processo").val('');
  $("#orgao_judicante").val('');
  $("#ministo_relator").val('');
  $("#data_inicio_publicacao").val('');
  $("#data_fim_publicacao").val('');
  $("#data_inicio_julgamento").val('');
  $("#data_fim_julgamento").val('');
  $("#classe_processo").val('');
  $("#classe_processo").val('');
  $("#ordenar_listagem").val('');


  $('#checkbox_stj').prop('checked', false);
  $('#checkbox_tst').prop('checked', false);
  $('#checkbox_stf').prop('checked', false);
}


$('#search-btn').click(e => {

  e.preventDefault();
  const dadosPesquisa = retornaDadosPesquisa()
  carregaListaJurisprudencias(dadosPesquisa)
  return false
})
