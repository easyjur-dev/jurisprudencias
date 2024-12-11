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
    <header class="header">
        <div id="navbar">
            <div class="container p-4 d-flex justify-content-between align-items-center">
                <span class="navbar-brand mb-0 h1">
                    <a href="/juris/home">
                        <img id="logo" src="/juris/assets/img/logo_easyjur.png" alt="Logomarca EasyJur" style="width: 170px;">
                    </a>
                </span>
                <nav>
                    <ul id="list_jurisp" class="d-flex gap-3">
                        <li><a href="/juris/tst" class="fs-4">TST</a></li>
                        <li><a href="/juris/stj" class="fs-4">STJ</a></li>
                        <li><a href="/juris/stf" class="fs-4">STF</a></li>
                        <li><a href="/juris/busca" class="fs-4">Pesquisar</a></li>
                    </ul>
                </nav>


                <svg id="hamburger" class="ham hamRotate ham7" viewBox="0 0 100 100" width="50"
                    onclick="this.classList.toggle('active')" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                    <path class="line top"
                        d="m 70,33 h -40 c 0,0 -6,1.368796 -6,8.5 0,7.131204 6,8.5013 6,8.5013 l 20,-0.0013" />
                    <path class="line middle" d="m 70,50 h -40" />
                    <path class="line bottom"
                        d="m 69.575405,67.073826 h -40 c -5.592752,0 -6.873604,-9.348582 1.371031,-9.348582 8.244634,0 19.053564,21.797129 19.053564,12.274756 l 0,-40" />
                </svg>


                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
                    aria-labelledby="offcanvasRightLabel">
                    <div class="offcanvas-header">
                        <h5 id="offcanvasRightLabel" class="p-3">Selecione um Tribunal</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                            aria-label="Close" onclick="removeActive();"></button>
                    </div>
                    <div class="offcanvas-body">
                        <nav>
                            <ul id="mobile_list" class="d-flex text-start flex-column gap-4 mt-5 p-3">
                                <li>
                                    <i class="fa-solid fa-book"></i>
                                    <a href="/juris/tst" class="fs-4">TST</a>
                                </li>

                                <li>
                                    <i class="fa-solid fa-book"></i>
                                    <a href="/juris/stj" class="fs-4">STJ</a>
                                </li>

                                <li>
                                    <i class="fa-solid fa-book"></i>
                                    <a href="/juris/stf" class="fs-4">STF</a>
                                </li>

                                <li>
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                    <a href="/juris/busca" class="fs-4">Pesquisar</a>
                                </li>

                                <li>
                                    <span class="barra-abaixo mt-5">Conheça o ecossistema Easyjur</span>
                                </li>

                                <li>
                                    <svg viewBox="0 0 380 444" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M349.783 0.648304C348.7 1.06561 342.721 2.64036 336.496 4.14686C305.752 11.5893 254.937 26.1443 230.771 34.4327C218.96 38.4825 197.739 46.0019 195.261 47.0141C194.179 47.4568 188.642 49.6448 182.959 51.8765C96.4036 85.8666 39.9923 127.564 14.9627 176.055C4.55557 196.217 0.806688 211.863 0.155137 237.859C-0.404882 260.24 0.509457 263.776 3.58218 251.116C14.7648 205.053 59.1087 171.087 148.019 140.483C164.788 134.711 180.983 129.533 205.103 122.234C273.664 101.485 304.581 89.8935 315.677 80.7775C329.939 69.0596 349.656 28.845 352.713 5.23869C353.436 -0.342912 353.222 -0.677982 349.783 0.648304ZM255.298 150.682C254.757 150.846 250.992 151.838 246.933 152.887C235.669 155.797 209.065 163.207 199.69 166.046C192.156 168.328 184.24 170.847 169.672 175.597C140.871 184.989 105.096 200.723 83.5596 213.469C66.6202 223.496 59.0585 228.888 47.0806 239.482C18.7076 264.579 5.77107 291.024 5.81438 323.84C5.82324 330.132 6.1687 335.753 6.58305 336.333C7.02004 336.943 7.85761 334.945 8.57511 331.58C14.0503 305.927 37.5445 283.45 77.9929 265.167C96.2235 256.927 111.575 251.399 152.94 238.183C210.831 219.685 222.229 215.157 231.185 207.091C239.469 199.631 247.693 184.687 253.321 166.869C255.525 159.889 257.484 150.162 256.656 150.316C256.45 150.353 255.84 150.519 255.298 150.682ZM360.61 210.642C271.452 226.909 209.149 243.413 155.893 264.872C109.623 283.517 71.5964 307.232 47.9103 332.217C20.0186 361.638 6.52105 392.622 5.22483 430.201L4.75635 443.762L7.27299 436.442C16.812 408.687 34.3409 388.64 64.8526 370.594C76.3876 363.772 98.8592 353.475 113.079 348.497C118.222 346.698 124.422 344.511 126.858 343.638C132.932 341.464 156.536 334.688 169.672 331.349C175.626 329.836 183.377 327.863 186.895 326.965C190.414 326.068 202.151 323.302 212.977 320.82C285.532 304.187 301.806 299.783 323.999 290.774C337.452 285.313 347.976 274.55 360.465 253.48C368.767 239.473 375.192 224.56 378.839 210.831C379.549 208.16 379.436 207.992 376.992 208.058C375.56 208.097 368.188 209.26 360.61 210.642Z"
                                            fill="#F31D3F" />
                                    </svg>

                                    <a href="https://app.easyjur.com/acesso/login.php">Software Jurídico</a>
                                </li>

                                <li>
                                    <svg width="59" height="60" viewBox="0 0 59 60" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path id="Vector"
                                            d="M15.126 2.97533C17.6236 1.03856 20.6729 -0.0060514 23.806 0.00165549C24.8881 -0.0231824 25.9591 0.231818 26.9199 0.74308C27.8797 1.25434 28.6991 2.00533 29.3003 2.92657C29.9014 2.00533 30.7208 1.25434 31.6807 0.74308C32.6415 0.231818 33.7125 -0.0231824 34.7946 0.00165549C37.9277 -0.0060514 40.9769 1.03856 43.4745 2.97533C45.3972 4.50528 46.8804 6.624 47.4038 9.18517C48.6051 9.2789 49.7044 9.7889 50.6268 10.5576C52.0262 11.7201 53.0446 13.4638 53.6852 15.3087C54.6895 18.1774 54.9603 21.8336 53.9196 24.9459C54.1833 25.0735 54.444 25.2235 54.6965 25.3959C55.7039 26.0822 56.4687 27.0647 57.0335 28.2234C58.1429 30.4921 58.6006 33.657 58.6006 37.5006C58.6006 41.7792 57.0072 44.6517 54.9855 46.4254C53.8681 47.4068 52.5486 48.1181 51.125 48.5066C50.7592 50.599 49.7337 53.0215 48.1252 55.0764C46.0378 57.7575 42.8007 60 38.4561 60C35.0138 60 32.2748 58.05 30.4945 56.1376C30.0692 55.681 29.6701 55.1989 29.3003 54.6939C28.9305 55.199 28.5314 55.681 28.106 56.1376C26.3258 58.05 23.5908 60 20.1444 60C15.7999 60 12.5658 57.7575 10.4754 55.0764C8.97196 53.166 7.94339 50.9121 7.4756 48.5066C6.05201 48.1181 4.7325 47.4068 3.61505 46.4254C1.59333 44.6517 0 41.7755 0 37.5006C0 33.657 0.461727 30.4883 1.56705 28.2234C2.09143 27.087 2.89771 26.111 3.90402 25.3922C4.15156 25.2245 4.4112 25.0766 4.68097 24.9498C3.6403 21.8298 3.91208 18.1774 4.91536 15.3087C5.55593 13.4638 6.57438 11.7201 7.97372 10.5576C8.89617 9.7889 9.99544 9.28262 11.1967 9.18517C11.7242 6.624 13.2033 4.50528 15.126 2.97533ZM27.4695 9.37645V9.3389L27.4614 9.15145C27.4079 8.17386 27.2179 7.2091 26.8977 6.28645C26.6693 5.58993 26.2814 4.95983 25.7661 4.449C25.2245 3.96672 24.5233 3.71686 23.806 3.75155C21.4882 3.74341 19.2301 4.50962 17.3751 5.934C15.6756 7.28772 14.6501 9.12145 14.6501 11.2513C14.6501 11.5482 14.5804 11.8409 14.4481 12.1051C14.3167 12.3694 14.1248 12.5977 13.8894 12.7712C13.6539 12.9448 13.3821 13.0587 13.0952 13.1034C12.8083 13.1482 12.5153 13.1226 12.2404 13.0288C11.5514 12.7963 10.9361 12.9275 10.2803 13.4675C9.56299 14.0675 8.86384 15.1325 8.3617 16.5687C7.34023 19.5011 7.44631 23.0523 8.84868 25.2122C9.04873 25.5199 9.15584 25.8812 9.15584 26.2509H11.903C14.0884 26.2509 16.1849 27.1399 17.7307 28.7221C19.2756 30.3044 20.1444 32.4505 20.1444 34.6882V35.9444C21.366 36.3867 22.3955 37.257 23.0512 38.4014C23.707 39.546 23.9464 40.8909 23.7272 42.1987C23.5079 43.5065 22.8441 44.6929 21.854 45.5481C20.8628 46.4034 19.609 46.8724 18.3127 46.8724C17.0164 46.8724 15.7625 46.4034 14.7714 45.5481C13.7812 44.6929 13.1174 43.5065 12.8982 42.1987C12.6789 40.8909 12.9184 39.546 13.5741 38.4014C14.2298 37.257 15.2594 36.3867 16.4809 35.9444V34.6882C16.4809 32.1007 14.4309 30.0008 11.903 30.0008H5.4943C5.27505 30.0004 5.05784 29.9599 4.85274 29.8808L4.84161 29.9034C4.11719 31.3846 3.66254 33.8444 3.66254 37.5006C3.66254 40.7218 4.81635 42.5367 5.99947 43.5754C7.2705 44.693 8.67997 45.0004 9.15584 45.0004C9.64182 45.0004 10.1076 45.198 10.4511 45.5495C10.7946 45.9012 10.9876 46.3781 10.9876 46.8753C10.9876 48.2553 11.7201 50.6665 13.3316 52.7365C14.9027 54.7427 17.1629 56.2501 20.1444 56.2501C22.1955 56.2501 24.0333 55.0764 25.4549 53.5502C26.154 52.8002 26.6996 52.0239 27.0553 51.3865C27.2169 51.1038 27.3553 50.8078 27.4695 50.5015V20.626H23.4948C23.0634 21.877 22.2137 22.9315 21.0952 23.6029C19.9777 24.2741 18.6643 24.5193 17.3862 24.2949C16.1091 24.0706 14.9502 23.3911 14.1157 22.3767C13.2801 21.3622 12.8214 20.078 12.8214 18.7511C12.8214 17.4243 13.2801 16.1401 14.1157 15.1256C14.9502 14.1112 16.1091 13.4317 17.3862 13.2073C18.6643 12.983 19.9777 13.2281 21.0952 13.8994C22.2137 14.5708 23.0634 15.6252 23.4948 16.8762H27.4695V9.37645ZM31.1311 46.8716V50.4978C31.2452 50.804 31.3836 51.1 31.5453 51.3828C31.9039 52.0202 32.4465 52.7965 33.1427 53.5464C34.5673 55.0727 36.4091 56.2464 38.4561 56.2464C41.4377 56.2464 43.6978 54.7389 45.2689 52.7327C46.8804 50.6628 47.613 48.2516 47.613 46.8716C47.613 46.3743 47.8059 45.8974 48.1495 45.5458C48.493 45.1942 48.9587 44.9967 49.4447 44.9967C49.9206 44.9967 51.3301 44.6891 52.6011 43.5717C53.7842 42.533 54.938 40.7181 54.938 37.4969C54.938 33.8407 54.4803 31.3846 53.7589 29.8996C53.5175 29.3466 53.1386 28.8682 52.6597 28.5121C52.2474 28.2422 51.7645 28.1075 51.2755 28.1258C50.9441 28.1257 50.6188 28.0336 50.3349 27.8592C50.0509 27.6848 49.8186 27.4349 49.662 27.1359C49.5054 26.837 49.4316 26.5001 49.4478 26.1613C49.4629 25.8226 49.568 25.4945 49.7519 25.2122C51.1583 23.0523 51.2613 19.5011 50.2389 16.5687C49.7377 15.1325 49.0376 14.0638 48.3202 13.4675C47.6645 12.9275 47.0492 12.7925 46.3601 13.0288C46.0853 13.1226 45.7923 13.1482 45.5054 13.1034C45.2184 13.0587 44.9466 12.9448 44.7112 12.7712C44.4758 12.5977 44.2839 12.3694 44.1525 12.1051C44.0201 11.8409 43.9504 11.5482 43.9504 11.2513C43.9504 9.12145 42.9249 7.28772 41.2215 5.934C39.3685 4.51045 37.1113 3.74423 34.7946 3.75155C34.0772 3.71686 33.376 3.96672 32.8345 4.449C32.3172 4.95921 31.9282 5.58952 31.6989 6.28645C31.3503 7.266 31.1593 8.29676 31.1311 9.3389V43.1255H33.8782C36.4061 43.1255 38.4561 41.0255 38.4561 38.4381V31.557C37.2346 31.1148 36.205 30.2444 35.5493 29.1C34.8936 27.9554 34.6541 26.6105 34.8734 25.3027C35.0926 23.9949 35.7564 22.8086 36.7466 21.9534C37.7377 21.0981 38.9916 20.629 40.2879 20.629C41.5842 20.629 42.838 21.0981 43.8292 21.9534C44.8193 22.8086 45.4831 23.9949 45.7024 25.3027C45.9216 26.6105 45.6822 27.9554 45.0265 29.1C44.3707 30.2444 43.3412 31.1148 42.1196 31.557V38.4381C42.1196 40.6758 41.2508 42.8219 39.7059 44.4041C38.1601 45.9865 36.0636 46.8753 33.8782 46.8753L31.1311 46.8716ZM16.4809 18.7511C16.4809 19.2484 16.6739 19.7253 17.0174 20.0769C17.3609 20.4286 17.8267 20.626 18.3127 20.626C18.7987 20.626 19.2644 20.4286 19.608 20.0769C19.9515 19.7253 20.1444 19.2484 20.1444 18.7511C20.1444 18.2539 19.9515 17.777 19.608 17.4253C19.2644 17.0737 18.7987 16.8762 18.3127 16.8762C17.8267 16.8762 17.3609 17.0737 17.0174 17.4253C16.6739 17.777 16.4809 18.2539 16.4809 18.7511ZM40.2879 28.1258C40.7739 28.1258 41.2397 27.9283 41.5832 27.5767C41.9267 27.2251 42.1196 26.7482 42.1196 26.2509C42.1196 25.7537 41.9267 25.2768 41.5832 24.9251C41.2397 24.5735 40.7739 24.3759 40.2879 24.3759C39.8019 24.3759 39.3361 24.5735 38.9926 24.9251C38.6491 25.2768 38.4561 25.7537 38.4561 26.2509C38.4561 26.7482 38.6491 27.2251 38.9926 27.5767C39.3361 27.9283 39.8019 28.1258 40.2879 28.1258ZM18.3127 39.3755C17.8267 39.3755 17.3609 39.5731 17.0174 39.9247C16.6739 40.2763 16.4809 40.7532 16.4809 41.2505C16.4809 41.7478 16.6739 42.2247 17.0174 42.5763C17.3609 42.9279 17.8267 43.1255 18.3127 43.1255C18.7987 43.1255 19.2644 42.9279 19.608 42.5763C19.9515 42.2247 20.1444 41.7478 20.1444 41.2505C20.1444 40.7532 19.9515 40.2763 19.608 39.9247C19.2644 39.5731 18.7987 39.3755 18.3127 39.3755Z"
                                            fill="#151546" />
                                    </svg>

                                    <a href="https://app.jurisai.com.br/acesso/login.php" target="_blank">
                                        JurisAI
                                    </a>
                                </li>

                                <li>
                                    <i class="fa-solid fa-scale-balanced"></i>
                                    <a href="https://app.easyjur.com/legal_crm/index.php" target="_blank">
                                        Legal CRM
                                    </a>
                                </li>

                                <li>
                                    <i class="fa-solid fa-graduation-cap"></i>
                                    <a href="https://legalacademy.easyjur.com/" target="_blank">
                                        Legal academy
                                    </a>
                                </li>

                                <li>
                                    <i class="fa-solid fa-blog"></i>
                                    <a href="https://easyjur.com/blog/" target="_blank">
                                        Blog viver do direito
                                    </a>
                                </li>

                                <li>
                                    <span class="barra-abaixo mt-5">Acesse nossas redes</span>
                                </li>

                                <li>
                                    <i class="fa-brands fa-youtube"></i>
                                    <a href="https://www.youtube.com/@EasyJur" target="_blank">
                                        Youtube
                                    </a>
                                </li>


                                <li>
                                    <i class="fa-brands fa-square-instagram"></i>
                                    <a href="https://www.instagram.com/easyjur?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="
                                        target="_blank">
                                        Instagram
                                    </a>
                                </li>

                                <li>
                                    <i class="fa-brands fa-whatsapp"></i>
                                    <a type="button" target="_blank" data-bs-toggle="modal" data-bs-target="#hubspot_modal">
                                        Whatsapp
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
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
