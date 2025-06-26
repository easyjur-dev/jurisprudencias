<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="robots" content="index, follow" />
    <link rel="shortcut icon" href="/juris/assets/icons/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="/juris/assets/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="/juris/assets/date-picker/jquery-ui.min.css" />
    <link rel="stylesheet" href="/juris/assets/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="/juris/assets/jquery-confirm/v3.3.4/jquery-confirm.min.css">
    <link rel="stylesheet" href="/juris/assets/tippy/tippy.css">
    <link rel="stylesheet" href="/juris/css/style.css" />
    <!-- Add Canonical Link -->
    <?php
        // Dynamically generate the canonical URL
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? "https" : "http";
        $currentUrl = $protocol . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    ?>
    <link rel="canonical" href="<?php echo htmlspecialchars($currentUrl, ENT_QUOTES, 'UTF-8'); ?>" />



    <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/embed/v2.js"></script>
    <script>
        var texto_emenda, link_teor, link_busca;

        function copiaEmentaLocal() {
            navigator.clipboard.writeText(texto_emenda).then(function () {
                let toastEl = document.getElementById('copyToast');
                let toast = new bootstrap.Toast(toastEl);
                toast.show();
            }).catch(function (err) {
                console.error('Erro ao copiar a ementa: ', err);
            });
        }

        function allowUser() {
            $("#hubspot-juris_entry").html(`
                <div id="actions_after_form">
                    <a href="${link_teor}"class="fs-5 p-2" target="_blank">
                        <i class="fa-solid fa-file"></i>
                        <span class="d-none d-md-flex">Acessar Inteiro Teor</span>
                    </a>

                    <a href="${link_busca}"class="fs-5 p-2" target="_blank">
                        <i class="fa-regular fa-file"></i>
                        <span class="d-none d-md-flex">Acessar Consulta Processual</span>
                    </a>

                    <a class="fs-5 p-2" onclick="copiaEmentaLocal()">
                        <i class="fa-solid fa-copy"></i>
                        <span class="d-none d-md-flex">Copiar Ementa</span>
                    </a>
                </div>
            `);
        }


        hbspt.forms.create({
            region: "na1",
            portalId: "44225969",
            formId: "81c21e13-3e2e-4036-a549-611535b34226",
        });

        window.addEventListener('message', (event) => {
            if (
                event.data.type === 'hsFormCallback' &&
                event.data.eventName === 'onFormSubmitted'
            ) {

                allowUser()
            }
        });

    </script>

    <title>EasyJur Jurisprudências</title>
</head>

<body id="jurisprudencia_documento">
     <header>
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand" href="../index.html">
                    <img src="/juris/assets/img/EasyJur-Logo.png" height="30" width="140" alt="EasyJur Logo">
                </a>

                <!-- Botão Offcanvas (visível apenas em telas menores que md) -->
                <button class="navbar-toggler d-md-none border-0" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar normal (visível em telas md e maiores) -->
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ms-auto fs-5">
                        <li class="nav-item">
                            <a class="nav-link" href="../index.html">Início</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/juris/tst">TST</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/juris/stj">STJ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/juris/stf">STF</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/juris/busca">Pesquisar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Offcanvas (visível apenas em telas menores que md) -->
        <div class="offcanvas offcanvas-end d-md-none" tabindex="-1" id="offcanvasNavbar"
            aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                    <img src="/juris/assets/img/EasyJur-Logo.png" height="30" width="140" alt="EasyJur Logo">
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.html">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/juris/tst">TST</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/juris/stj">STJ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/juris/stf">STF</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/juris/busca">Pesquisar</a>
                    </li>
                    
                    <li class="nav-item mt-4">
                        <span class="nav-link disabled fw-bold">Conheça o ecossistema Easyjur</span>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="https://app.easyjur.com/acesso/login.php" target="_blank">
                            <i class="fas fa-balance-scale me-2"></i>Software Jurídico
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="https://app.jurisai.com.br/acesso/login.php" target="_blank">
                            <i class="fas fa-robot me-2"></i>JurisAI
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="https://app.easyjur.com/legal_crm/index.php" target="_blank">
                            <i class="fas fa-users me-2"></i>Legal CRM
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="https://legalacademy.easyjur.com/" target="_blank">
                            <i class="fas fa-graduation-cap me-2"></i>Legal Academy
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="https://easyjur.com/blog/" target="_blank">
                            <i class="fas fa-blog me-2"></i>Blog Viver do Direito
                        </a>
                    </li>
                    
                    <li class="nav-item mt-4">
                        <span class="nav-link disabled fw-bold">Acesse nossas redes</span>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.youtube.com/@EasyJur" target="_blank">
                            <i class="fab fa-youtube me-2"></i>YouTube
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.instagram.com/easyjur" target="_blank">
                            <i class="fab fa-instagram me-2"></i>Instagram
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#hubspot_modal">
                            <i class="fab fa-whatsapp me-2"></i>WhatsApp
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <main>
        <div class="heading-banner">
            <div class="container">
                <h1 class="fs-1 titulo-modulo"></h1>
                <div class="lh-1 mx-4">
                    <p id="court-label" class="fs-5 m-0 fw-bold"></p>
                    <p id="date-label" class="fs-5 m-0 fw-bold"></p>
                </div>
            </div>
        </div>

        <section>
            <div class="container">
                <div class="row py-5">
                    <div id="doc-info" class="col-lg-6 p-5 border position-relative">
                        <h2 class="fs-1 fw-bold">Ementa</h2>
                        <p id="ementa" class="fs-5"></p>
                        <p id="relator" class="fs-5 fw-bold"></p>
                        <p class="fs-5">Publicado em: <span id="data-publicado"></span></p>
                    </div>

                    <div class="col-lg-6">
                        <div class="px-0 px-md-5 mt-5 mt-lg-0">
                            <h3 class="fs-1">Acesse seu documento!</h3>
                            <p class="fs-5">Estamos muito contentes em poder compartilhar este documento com você. Para que
                                possamos enviar o
                                material com toda a segurança e rapidez, por favor, preencha o formulário abaixo.</p>
                            <div id="hubspot-juris_entry"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>



    <div class="toast-container position-fixed bottom-0 start-0 p-3">
        <div id="copyToast" class="toast align-items-center border-0" role="alert" aria-live="assertive"
            aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body fs-5">
                    Ementa copiada com sucesso!
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    </div>



    <script src="/juris/assets/jquery/jquery-3.7.1.min.js"></script>
    <script src="/juris/assets/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="/juris/assets/font-awesome/6.5.1/js/all.min.js"></script>
    <script src="/juris/assets/date-picker/jquery-ui.min.js"></script>
    <script src="/juris/assets/jquery-mask/1.14.16/jquery.mask.min.js"></script>
    <script src="/juris/assets/html2pdfjs/html2pdf.bundle.min.js"></script>
    <script src="/juris/assets/jquery-confirm/v3.3.4/jquery-confirm.min.js"></script>
    <script src="/juris/assets/tippy/popper.min.js"></script>
    <script src="/juris/assets/tippy/tippy-bundle.umd.js"></script>
    <script src="/juris/script/doc.js"></script>
    <script>
        atualizaPaginaDocumento()
    </script>

</body>

</html>
