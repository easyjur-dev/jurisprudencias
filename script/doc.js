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

    let resultado
    try {
        resultado = await $.ajax({
            url: "https://magnoli.azurewebsites.net/api/document?" + params,
            //url: "http://localhost:7071/api/document?" + params,
        });
    } catch (erro) {
        console.error("Falha ao consultar o documento:", erro)
        return null
    }

    return Array.isArray(resultado) ? (resultado[0] || null) : (resultado || null)
}

// A API so reconhece os engines "stf", "stj" e "tst". Os sitemaps de STF e
// TST publicam as URLs com o prefixo "juris-" (ex.: /documento/juris-stf/...),
// que a API rejeita com HTTP 500. Como essas URLs ja estao indexadas no Google,
// o prefixo e removido aqui em vez de regerar os sitemaps.
function normalizaEngine(engine) {
    return String(engine || "").replace(/^juris-/, "")
}

// A API passou a devolver a data ja no formato ISO completo, com fuso
// ("1990-03-05T00:00:00+00:00"); antes vinha so a data ("1990-03-05").
// Concatenar "T04:00:00" no formato novo produz string invalida e o campo sai
// vazio na tela. Ler o valor como UTC tambem nao serve: no fuso do Brasil a
// data recua um dia na exibicao. Por isso fica so a parte da data e o horario
// fixo de 04:00 local, que e o que o codigo original garantia.
function normalizaData(valor) {
    if (!valor) return null
    const data = String(valor).slice(0, 10)
    return /^\d{4}-\d{2}-\d{2}$/.test(data) ? data + "T04:00:00" : null
}

// A URL da pagina e /juris/documento/<engine>/<id>, mas o navegador pode
// acrescentar query string e ancora: links de campanha chegam com
// "?utm_source=", "?gclid=" ou "?fbclid=" colados no id. Ler o ultimo trecho
// do endereco cru nesses casos produz "doc-abc123?utm_source=google", que a
// API nao reconhece. Usa o pathname, que ja exclui "?" e "#", e descarta
// segmentos vazios para tolerar barra no final.
function segmentosDaUrl() {
    return window.location.pathname.split('/').filter(function (parte) {
        return parte !== ""
    })
}

// A API responde HTTP 200 com o corpo [null] quando nao encontra o documento
// (id inexistente, ou id pertencente a outro tribunal). Sem esta verificacao a
// pagina quebra com "Cannot read properties of null" e fica inteiramente em
// branco, sem nenhuma indicacao do que houve.
function mostraDocumentoIndisponivel() {
    $(".titulo-modulo").text("Documento nao encontrado")
    $("#ementa").text("Nao foi possivel carregar este documento. Ele pode ter sido removido da base ou o endereco pode estar incorreto.")
    $("#relator").text("")
    $("#data-publicado").text("")
    $("#court-label").text("")
    $("#date-label").text("")
}

async function atualizaPaginaDocumento() {
    const bits = segmentosDaUrl()
    const id = bits.pop()
    const engine = normalizaEngine(bits.pop())

    const doc = await buscaDocumento(engine, id)

    if (!doc) {
        mostraDocumentoIndisponivel()
        return
    }

    doc.data_julgamento = normalizaData(doc.data_julgamento)
    doc.data_publicacao_fonte = normalizaData(doc.data_publicacao_fonte)

    window.document.title = "EasyJur Jurisprudência | " + doc.processo
    $(".titulo-modulo").text(doc.processo)
    $("#court-label").text(doc.orgao +  (doc.orgao_judicante == undefined ? "" : " - " + doc.orgao_judicante))
    $("#date-label").text(new Date(doc.data_julgamento).toLocaleDateString("pt-BR"))
    $("#ementa").text(doc.ementa)
    $("#relator").text(doc.relator)
    $("#data-publicado").text(new Date(doc.data_publicacao_fonte).toLocaleDateString("pt-BR"))

    texto_emenda = doc.ementa
    link_teor = doc.link_inteiro_teor
    link_busca = doc.link_consulta_processual
}


