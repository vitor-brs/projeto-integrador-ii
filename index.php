<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de visitantes</title>


    
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>


    
</head>
<body class="bg-primary">
    
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-dark">
                        <div class="col-6 w-auto p-3 text-center text-white fw-light">
                            <img src="img/logoMuseuBranco.png"><h3><br><br>Museu de Computação ICMC USP<br><br></h3>
                            <br>
                            <p>ENDEREÇOS<br><br>
                                Museu de Computação Prof.Odelar Leite Linhares
                                Instituto de Ciências e Matemáticas e de Computação - ICMC
                                Universidade de São Paulo - USP
                                Avenida Trabalhador São-Carlense, nº 400, Centro.
                                CEP 13566-590 - São Carlos - SP
                                <br><br>
                                HORÁRIO DE FUNCIONAMENTO<br>
                                Segunda à Sexta-feira
                                das 8h00 às 18h00
                                <br><br>
                                CONTATO<br>
                                Telefone: (16) 3373-9146
                                E-mail: museu@icmc.usp.br
                                <br><br><br><br><br><br>
                                
                                
                            </p> 
                        </div>
                    </div>
                    
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-2 fw-light">Registro de Visitação</h1>
                                <h6 class="text-danger">*Campos com preenchimento obrigatório</h6>
                            </div>
                            <form method="POST" action="processa.php" id="myForm">
                                <div class="input-group input-group-sm mb-3 col-6 mx-auto">
                                    <span class="input-group-text" >Nome Visitante*</span>
                                    <input type="text" id="Nome" name="Nome" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                                  </div>
                    
                    
                                  <div class="input-group mb-3">
                                  <label class="input-group-text" for="inputGroupSelect01">Tipo Instituição*</label>
                                  <select class="form-select" required aria-label="Default select example" id="selectgrupos" name="selectgrupos">
                                    <option value="">Selecione o tipo de organização</option>
                                    <option value="Escola pública de ensino fundamental">Escola pública de ensino fundamental</option>
                                    <option value="Escola pública de ensino médio">Escola pública de ensino médio</option>
                                    <option value="Escola pública de ensino fundamental e médio">Escola pública de ensino fundamental e médio</option>
                                    <option value="Escola privada de ensino fundamental">Escola privada de ensino fundamental</option>
                                    <option value="Escola privada de ensino médio">Escola privada de ensino médio</option>
                                    <option value="Escola privada de ensino fundamental e médio">Escola privada de ensino fundamental e médio</option>
                                    <option value="Instituição pública de ensino superior">Instituição pública de ensino superior</option>
                                    <option value="Instituição privada de ensino superior">Instituição privada de ensino superior</option>
                                    <option value="Educação especial">Educação especial</option>
                                    <option value="Empresa pública">Empresa pública</option>
                                    <option value="Empresa privada">Empresa privada</option>
                                    <option value="ONG - Organização não governamental">ONG - Organização não governamental</option>
                                    <option value="Outros">Outros</option>
                                  </select>
                                  </div>
                    
                                  <div class="input-group input-group-sm mb-3 col-6 mx-auto">
                                    <span class="input-group-text">Telefone(Opcional)</span>
                                    <input type="text" id="Telefone" name="Telefone" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                  </div>
                        
                                  <div class="input-group input-group-sm mb-3 col-6 mx-auto" >
                                    <span class="input-group-text">E-mail*</span>
                                    <input type="text" class="form-control" id="email" name="email" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                                  </div>
                        
                                  

                                  <div class="row align-items-start border mx-auto">
                                    
                                        <div class="col">

                                            <p>Possui necessidade especial?*</p> 

                                        </div>
                                        <div class="col">
                                            
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault" onclick="funcaoCheck()">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                  Sim
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault2" id="flexRadioDefault2" onclick="funcaoCheck2()" checked>
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                  Não
                                                </label>
                                              </div>
                                              
                                        </div>
                                        <div class="input-group input-group-sm mb-3 p-3 mx-auto" >
                                            <span class="input-group-text">Indique qual necessidade</span>
                                            <input type="text" class="form-control" id="necessidade" name="necessidade" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                          </div>
                                    
                                </div>
                                  

                        
                                <h1 class="h4 text-gray-900 mb-4 fw-light text-center">Período de Visitação</h1>
                                  <h6 class="mb-3 text-center fw-light">Indique o período de datas que deseja agendar e a quantidade de visitantes</h6>
                                  <div class="d-grid gap-0 col-9 mx-auto">
                                      <div class="input-group mb-3">
                                        <span class="input-group-text">De*</span>
                                        <input type="date" class="form-control" placeholder="Data Inicial" id="campo_p_inicial" name="campo_p_inicial" required>
                                        <span class="input-group-text">Até*</span>
                                        <input type="date" class="form-control" placeholder="Data Final" id="campo_p_final" name="campo_p_final" required>
                                      </div>

                                      <div class="input-group input-group-sm mb-3 col-5" >
                                        <span class="input-group-text">Quantidade de visitantes*</span>
                                        <input type="text" class="form-control" id="qtdVisitante" name="qtdVisitante" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                                      </div>


                                  </div>

                                  
                    
                                  <h6 class="mb-3 text-center fw-light">Indique o segundo período de datas que deseja agendar e a quantidade de visitantes(Opcional)</h6>
                                  <div class="d-grid gap-0 col-9 mx-auto">
                                      <div class="input-group mb-3">
                                        <span class="input-group-text">De</span>
                                        <input type="date" class="form-control" placeholder="Data Inicial" id="campo_p_inicial_opt" name="campo_p_inicial_opt" value="">
                                        <span class="input-group-text">Até</span>
                                        <input type="date" class="form-control" placeholder="Data Final" id="campo_p_final_opt" name="campo_p_final_opt" value="">
                                      </div>
                                      <div class="input-group input-group-sm mb-3">
                                        <span class="input-group-text">Quantidade de visitantes(Opcional)</span>
                                        <input type="text" class="form-control" id="qtdVisitante2" name="qtdVisitante2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="0">
                                      </div>



                                  </div>
                                  
                                  

                                 
                                  <input type="hidden" id="status" name="status" value="Agendado">
                                  <input type="hidden" id="status2" name="status2" value="">
                        
                                  <br>
                                  <div class="d-grid gap-2 col-6 mx-auto mb-3">
                                    <button class="btn btn-primary rounded-pill" onclick="funcaoSubmit()" id="Enviar" name="Enviar">Enviar</button>
                                  </div>
                                  
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="login.php">Acesso à área restrita</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <script>
            function funcaoCheck(){
              
              const inputSim = document.getElementById("flexRadioDefault");

              if (inputSim.checked == true){
                document.getElementById("flexRadioDefault2").checked = false
                document.getElementById("necessidade").required = true
                
              }
            }
            function funcaoCheck2(){
              const inputNao = document.getElementById("flexRadioDefault2");
              if (inputNao.checked == true){
                document.getElementById("flexRadioDefault").checked = false
                document.getElementById("necessidade").required = false
              }

            }



            function funcaoSubmit() {
              

                inputDtInicialOpt = document.getElementById("campo_p_inicial_opt");
              inputDtFinalOpt = document.getElementById("campo_p_final_opt");
              if(inputDtInicialOpt.value != ""){
                document.getElementById("status2").value = "Agendado"
                document.getElementById("campo_p_final_opt").required = true;
                

              }else {
                document.getElementById("campo_p_final_opt").required = false;
              }
              if(inputDtFinalOpt.value != ""){
                document.getElementById("status2").value = "Agendado"
                document.getElementById("campo_p_inicial_opt").required = true;
              }else {
                document.getElementById("campo_p_inicial_opt").required = false;
              }
              if(inputDtInicialOpt.value != "" && inputDtFinalOpt.value != ""){
                document.getElementById("qtdVisitante2").required = true;
                if(document.getElementById("qtdVisitante2").value == "0"){
                document.getElementById("qtdVisitante2").value = "";
                }

              }else {
                document.getElementById("qtdVisitante2").required = false;
                document.getElementById("qtdVisitante2").value = "0";
              }
              
            
              
                
              
              
            }
          </script>





    </div>


    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Encerrar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecione "Logout" se estiver pronto para encerrar a sessão.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>