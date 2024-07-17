const template_jurisprudencia = (item) => `
<tr>
    <td class="d-flex flex-column">
        <span class="dado-tabela">
            <span id="processo" class="titulo">Processo:</span>
            <span>${item.processo.raw}</span>
        </span>

        <span class="dado-tabela">
            <span id="orgao" class="titulo">Órgão:</span>
            <span>${item.orgao.raw}</span>
        </span>

        <span class="dado-tabela">
            <span id="orgao_judicante" class="titulo">Órgão Judicante:</span>
            <span>${item.orgao_judicante ? item.orgao_judicante.raw : item.orgado_judicante.raw}</span>
        </span>

        <span class="dado-tabela">
            <span id="ministro_relator" class="titulo">Ministro Relator:</span>
            <span>${item.relator.raw}</span>
        </span>

        <span class="dado-tabela">
            <span id="data_pubicacao" class="titulo">Data Publicação:</span>
            <span>${formatarDataISO(item.data_publicacao_fonte.raw)}</span>
        </span>

        <span class="dado-tabela">
            <span id="dataj" class="titulo">Data do Julgamento:</span>
            <span>${formatarDataISO(item.data_julgamento.raw)}</span>
        </span>

        <a class="icon-link d-none" href="#"><i class="fa-solid fa-download "></i> Download da decisão
        </a>
    </td>

    <td onclick="mostraPreviaEmenta('${item.id.raw}');">
        <div data-id="${item.id.raw}" class="previa-ementa">${item.ementa.raw}</div>
    </td>
    
    <td>
        <div class="conteudo-botoes d-flex align-items-center justify-content-center w-100">
            <div class="grid-acoes">
                <a class="btn botao-primario" style="width: 3rem" title="Ver dados do processo" onclick="abrirUrlJurisprudencia('${item.id.raw}')"> 
                    <i class="fa-solid fa-eye"></i>
                </a>
            </div>
        </div>
    </td>
</tr>
    `;

function fazBotaoPaginacao(pagina)
{
    return `
    <li class="page-item" id="page-btn-${pagina}"><a class="page-link">${pagina}</a></li>
    `;
}

function montaPaginasAnteriores(atual)
{
    let pagina = atual - 1
    let paginas = []

    while(pagina > 1 && paginas.length < 5)
    {
        paginas.unshift(fazBotaoPaginacao(pagina))
        pagina--
    }

    return paginas
}
function montaPaginasPosteriores(atual, max)
{
    let pagina = atual + 1
    let paginas = []

    while(pagina <= max && paginas.length < 5)
    {
        paginas.push(fazBotaoPaginacao(pagina))
        pagina++
    }

    return paginas
}

function retornaTemplatePaginacao(paginacao)
{

    let paginas = []
    const atual = paginacao.current

    paginas.push(fazBotaoPaginacao(1))
    if(atual !== 1)
    {
        paginas.push(...montaPaginasAnteriores(atual))
        paginas.push(fazBotaoPaginacao(atual))
    }
    paginas.push(...montaPaginasPosteriores(atual, paginacao.total_pages))

    


    $(".pagination-container").html(`
        <li class="page-item">
            <a class="page-link" id="page-prev">Anterior</a>
        </li>
        ${paginas.join(' ')}
        <li class="page-item">
            <a class="page-link" id="page-next">Proxímo</a>
        </li>
    `)


    $("#page-btn-"+atual).addClass('active')

    $(".page-item").click(e => {
        const id = e.delegateTarget.id
        const page = id.split('-btn-')[1]
        const dados_pesquisa = dadosPesquisa === undefined ? retornaDadosPesquisa() : dadosPesquisa
        carregaListaJurisprudencias(dados_pesquisa, page)
    })
    $("#page-prev").click(e => {
        if(atual === 1) return
        const dados_pesquisa = dadosPesquisa === undefined ? retornaDadosPesquisa() : dadosPesquisa
        carregaListaJurisprudencias(dados_pesquisa, atual - 1)
    })
    $("#page-next").click(e => {
        if(atual === paginacao.total_pages) return
        const dados_pesquisa = dadosPesquisa === undefined ? retornaDadosPesquisa() : dadosPesquisa
        carregaListaJurisprudencias(dados_pesquisa, atual + 1)
    })
}

function retornaTemplateJurisprudeciaLista(dados){
    return dados.map(template_jurisprudencia);
    
}

function formatarDataISO(dataISO) {
    const data = new Date(dataISO);
    return data.toLocaleDateString('pt-BR');
}

function mostraPreviaEmenta(id) {
    $(`.previa-ementa[data-id='${id}']`).toggleClass("mostrar-tudo");
}

function retornaUrlJurisprudencia(id){
    let baseUrl = '/documento/';
    console.log(id)
    return (baseUrl + id);
   
}

function abrirUrlJurisprudencia(id){
    const splitted = id.split('|')
    id = splitted[0] + '/' + splitted[1]
    const url = retornaUrlJurisprudencia(id);
    window.open(url, '_blank');
}