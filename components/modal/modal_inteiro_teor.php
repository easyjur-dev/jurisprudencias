<div class="modal fade" id="visualiza_documento" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                            VISUALIZAR DOCUMENTO
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="card w-100">
                            <div class="card-header">Dados do Processo</div>
                            <div class="card-body">
                                <ul id="dados_processo" class="list-group">
                                    <li class="list-group-item d-flex justify-content-between controlador-lista">
                                        <span class="fw-semibold">Nº do Processo:</span>
                                        <span id="n_processo">2022/0331372-2</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between controlador-lista">
                                        <span class="fw-semibold">Órgão:</span>
                                        <span id="orgao">Superior Tribunal de Justiça - STJ</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between controlador-lista">
                                        <span class="fw-semibold">Órgão Judicante:</span>
                                        <span id="orgao_jud">T3 - TERCEIRA TURMA</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between controlador-lista">
                                        <span class="fw-semibold">Ministro Relator:</span>
                                        <span id="ministro_rel">MARCO AURÉLIO BELLIZZE</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between controlador-lista">
                                        <span class="fw-semibold">Data do Julgamento:</span>
                                        <span id="data_jug">19/06/2023</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between controlador-lista">
                                        <span class="fw-semibold">Data da Publicação:</span>
                                        <span id="data_pub">21/06/2023 </span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="card mt-3 w-100">
                            <div class="card-header d-flex justify-content-between align-items-baseline">
                                Ementa
                                <button class="btn botao-copia-modal" onclick="copiaEmenta();">
                                    <i class="fa-solid fa-copy"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <p id="ementa_descricao">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Beatae quo ipsum suscipit modi ullam corporis nesciunt,
                                    debitis dolore in mollitia nostrum harum consectetur a
                                    iste dignissimos dolor sequi quibusdam! Libero. Lorem
                                    ipsum dolor sit amet consectetur adipisicing elit. At
                                    recusandae fugiat aliquam consectetur corporis temporibus
                                    veritatis magni. Aut molestias tempore ea laudantium
                                    perspiciatis temporibus nesciunt aspernatur. Fuga cumque
                                    voluptatibus aliquid.
                                </p>
                                <a class="icon-link" onclick="mostraMaisEmenta()" style="cursor: pointer">
                                    <i id="mostra_menos" class="fa-regular fa-square-caret-down"></i>
                                    Mostrar Mais</a>
                            </div>
                        </div>

                        <div class="card mt-3 w-100">
                            <div class="card-header d-flex justify-content-between align-items-baseline">
                                Acordão
                                <button class="btn botao-copia-modal" onclick="copiaAcordao();">
                                    <i class="fa-solid fa-copy"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <p id="acordao_descricao">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Beatae quo ipsum suscipit modi ullam corporis nesciunt,
                                    debitis dolore in mollitia nostrum harum consectetur a
                                    iste dignissimos dolor sequi quibusdam! Libero. Lorem
                                    ipsum dolor sit amet consectetur adipisicing elit. At
                                    recusandae fugiat aliquam consectetur corporis temporibus
                                    veritatis magni. Aut molestias tempore ea laudantium
                                    perspiciatis temporibus nesciunt aspernatur. Fuga cumque
                                    voluptatibus aliquid.
                                </p>
                                <a id="mostra_acord" class="icon-link" onclick="mostraMaisAcordao()" style="cursor: pointer">
                                    <i id="mostra_menos_acordao" class="fa-regular fa-square-caret-down"></i>
                                    Mostrar Mais</a>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn botao-secundario d-flex align-items-center gap-2" id="imprimir_intero_teor" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#imprimi_intero_teor">
                            <i class="fa-solid fa-print"></i>
                            <span class="d-none d-md-block"> Imprimir</span>
                        </button>
                        <button type="button" class="btn botao-primario d-flex align-items-center gap-2">
                            <i class="fa-solid fa-download"></i>
                            <span class="d-none d-md-block"> Download da decisão</span>
                        </button>
                        <button type="button" class="btn botao-primario d-flex align-items-center gap-2">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <span class="d-none d-md-block"> Ver processo no tribunal</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>