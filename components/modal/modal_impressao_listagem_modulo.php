<div class="modal fade" id="imprimi_listagem" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    IMPRIMIR RELAÇÃO DE JURISPRUDÊNCIAS
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="card w-100 p-5">
                    
                <!--conteudo-da-impressao-abaixo-->
                    <div id="div_listagem_impressao">
                        <div>
                            <img style="width: 135px;" src="assets/img/logo.png" alt="">
                        </div>

                        

                        <div class="d-flex flex-column mt-5">
                            <h1>Relação de Juriprudencias</h1>
                            <span>
                                <span class="fw-medium">Tema da pesquisa:</span>
                                <span id="tema_busca"> COVID 19</span>
                            </span>
                        </div>

                      
                        <div id="dados_do_processo" style="margin-top: 50px;">
                            <h3>Dados do Processo</h3>

                            <table id="lista_print">
                                <tr>
                                    <td>Nº do Processo:</td>
                                    <td id="n_prc">2022/0331372-2</td>
                                </tr>
                                <tr>
                                    <td>Órgão:</td>
                                    <td id="stj">Superior Tribunal de Justiça - STJ</td>
                                </tr>
                                <tr>
                                    <td>Órgão Judicante:</td>
                                    <td id="org_jud">T3 - TERCEIRA TURMA</td>
                                </tr>
                                <tr>
                                    <td>Ministro Relator:</td>
                                    <td id="min_rel">MARCO AURÉLIO BELLIZZE</td>
                                </tr>
                                <tr>
                                    <td>Data do Julgamento:</td>
                                    <td id="data_jud">19/06/2023</td>
                                </tr>
                                <tr>
                                    <td>Data da Publicação:</td>
                                    <td id="data_pub">21/06/2023</td>
                                </tr>
                            </table>

                            <h3 style="margin-top: 50px;">Ementa</h3>
                            <p id="ementa_print" class="mb-3">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem minus perferendis incidunt deleniti, dolores eligendi natus nesciunt. Officiis doloribus magnam magni, dolore beatae in, mollitia impedit maxime explicabo quo tenetur. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem minus perferendis incidunt deleniti, dolores eligendi natus nesciunt. Officiis doloribus magnam magni, dolore beatae in, mollitia impedit maxime explicabo quo tenetur. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem minus perferendis incidunt deleniti, dolores eligendi natus nesciunt. Officiis doloribus magnam magni, dolore beatae in, mollitia impedit maxime explicabo quo tenetur. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem minus perferendis incidunt deleniti, dolores eligendi natus nesciunt. Officiis doloribus magnam magni, dolore beatae in, mollitia impedit maxime explicabo quo tenetur.
                            </p>

                            <h3 style="margin-top: 50px;">Acordão</h3>
                            <p id="acordao_print">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem minus perferendis incidunt deleniti, dolores eligendi natus nesciunt. Officiis doloribus magnam magni, dolore beatae in, mollitia impedit maxime explicabo quo tenetur. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem minus perferendis incidunt deleniti, dolores eligendi natus nesciunt. Officiis doloribus magnam magni, dolore beatae in, mollitia impedit maxime explicabo quo tenetur. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem minus perferendis incidunt deleniti, dolores eligendi natus nesciunt. Officiis doloribus magnam magni, dolore beatae in, mollitia impedit maxime explicabo quo tenetur. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem minus perferendis incidunt deleniti, dolores eligendi natus nesciunt. Officiis doloribus magnam magni, dolore beatae in, mollitia impedit maxime explicabo quo tenetur.
                            </p>
                        </div>

                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn botao-secundario d-flex align-items-center gap-2" id="imprimir_intero_teor" onclick="imprimiListagem();">
                    <i class="fa-solid fa-print"></i>
                    <span class="d-none d-md-block"> Imprimir</span>
                </button>
            </div>
        </div>
    </div>
</div>