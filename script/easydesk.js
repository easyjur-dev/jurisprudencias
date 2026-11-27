// EasyDesk no lugar do HubSpot (GTM-885): banner de cookies, UTMs e o formulario
// que libera o documento.
//
// O embed.js consulta o EasyDesk a cada carregamento, e o servico tem limite de
// leituras por minuto compartilhado com o site e o blog. Com ~3 milhoes de paginas
// aqui, carregar em toda visita esgotaria esse limite. Por isso ele so carrega na
// 1a pagina da sessao do navegador (banner de cookies e captura das UTMs) e quando
// a pessoa pede o formulario do documento, como o app faz desde o GTM-666.
(function () {
    // Mesmo loader e SRI do plugin WordPress do EasyDesk (versao 0.4.18).
    // Versoes antigas continuam servidas pelo hash, entao fixar e seguro.
    var LOADER = 'https://easydesk-forms.easyjur.com/assets/forms/v/70ebd51316ca88c8759a72f46fa12645e1901af696545fc57689d402bae5b5c7/embed.js';
    var INTEGRIDADE = 'sha384-Bf+W+1N7psRg97ye8TdCrkiiK6o868e/VblBwal12l/RA9M4vJvr/V+UuWw1NV18';
    var CHAVE_SESSAO = 'easydesk_juris_sessao';
    var carregamento = null;

    function carregaEasyDesk() {
        if (window.EasyDeskForms) {
            return Promise.resolve(true);
        }
        if (carregamento) {
            return carregamento;
        }
        carregamento = new Promise(function (resolve) {
            var script = document.createElement('script');
            script.src = LOADER;
            script.integrity = INTEGRIDADE;
            script.crossOrigin = 'anonymous';
            script.async = true;
            script.onload = function () {
                try {
                    window.sessionStorage.setItem(CHAVE_SESSAO, '1');
                } catch (erro) {}
                resolve(true);
            };
            // Sem o EasyDesk a pagina segue funcionando: o formulario mostra o
            // link "Abrir formulario em uma nova pagina".
            script.onerror = function () {
                carregamento = null;
                resolve(false);
            };
            document.head.appendChild(script);
        });
        return carregamento;
    }

    window.carregaEasyDesk = carregaEasyDesk;

    var primeiraPaginaDaSessao = true;
    try {
        primeiraPaginaDaSessao = !window.sessionStorage.getItem(CHAVE_SESSAO);
    } catch (erro) {}

    if (primeiraPaginaDaSessao) {
        carregaEasyDesk();
    }
})();
