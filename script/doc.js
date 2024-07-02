async function buscaDocumento(engine, id) {

    const dadosPesquisa = {
        id, engine
    }

    let params = (new URLSearchParams(dadosPesquisa)).toString()

    const resultado  = await  $.ajax({
        //url: "https://magnolio.azurewebsites.net/api/document?"+params,
        url: "http://localhost:7071/api/document?" + params,
    });

    return resultado[0]
}

async function atualizaPaginaDocumento(){
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
    console.log(doc)
}