$(document).ready(function () {
    $('#jurisprudencia_documento').on('selectstart', function (e) {
        e.preventDefault();
        return false;
    });

    $('#jurisprudencia_documento').on('copy', function (e) {
        e.preventDefault();
        return false;
    });

    document.addEventListener('contextmenu', function (e) {
       e.preventDefault();
    });
});

function removeActive() {
    $('#hamburger').removeClass('active');
  }

tippy('#doc-info', {
    content: 'Cópia não permitida. Para ter acesso ao documento, por favor, preencha o formulário.',
    placement: 'top-start',
    arrow: false,
    animation: 'fade',
    followCursor: 'true'
});

hbspt.forms.create({
    region: "na1",
    portalId: "44225969",
    formId: "81c21e13-3e2e-4036-a549-611535b34226",
    target: "#hubspot-juris_entry"
});


async function buscaDocumento(engine, id) {

    const dadosPesquisa = {
        id, engine
    }

    let params = (new URLSearchParams(dadosPesquisa)).toString()

    const resultado = await $.ajax({
        url: "https://magnolio.azurewebsites.net/api/document?" + params,
        //url: "http://localhost:7071/api/document?" + params,
    });

    return resultado[0]
}

async function atualizaPaginaDocumento() {
    const path = window.document.URL
    const bits = path.split('/');
    const id = bits.pop()
    const engine = bits.pop()

    const doc = await buscaDocumento(engine, id)

    doc.data_julgamento += "T04:00:00"
    doc.data_publicacao_fonte += "T04:00:00"

    window.document.title = "EasyJur Jurisprudência | " + doc.processo
    $(".titulo-modulo").text(doc.processo)
    $("#court-label").text(doc.orgao + " - " + doc.orgao_judicante)
    $("#date-label").text(new Date(doc.data_julgamento).toLocaleDateString("pt-BR"))
    $("#ementa").text(doc.ementa)
    $("#relator").text(doc.relator)
    $("#data-publicado").text(new Date(doc.data_publicacao_fonte).toLocaleDateString("pt-BR"))

    texto_emenda = doc.ementa
    link_teor = doc.link_inteiro_teor
    link_busca = doc.link_consulta_processual
}


