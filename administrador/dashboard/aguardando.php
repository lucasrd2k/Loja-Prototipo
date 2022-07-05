<?php include_once "../../conexao.php";?>
<style>
      @media only screen and (max-width: 600px) {
  #pesquisar{
    margin-top:-15% !important;
    margin-left:65% !important;
  }
}
    .hm-gradient {
    background-image: linear-gradient(to top, #f3e7e9 0%, #e3eeff 99%, #e3eeff 100%);
}
.darken-grey-text {
    color: #2E2E2E;
}
.input-group.md-form.form-sm.form-2 input {
    border: 1px solid #bdbdbd;
    border-top-left-radius: 0.25rem;
    border-bottom-left-radius: 0.25rem;
}
.input-group.md-form.form-sm.form-2 input.purple-border {
    border: 1px solid #9e9e9e;
}
.input-group.md-form.form-sm.form-2 input[type=text]:focus:not([readonly]).purple-border {
    border: 1px solid #ba68c8;
    box-shadow: none;
}
.form-2 .input-group-addon {
    border: 1px solid #ba68c8;
}
.danger-text {
    color: #ff3547; 
}  
.success-text {
    color: #00C851; 
}
.table-bordered.red-border, .table-bordered.red-border th, .table-bordered.red-border td {
    border: 1px solid #ff3547!important;
}        
.table.table-bordered th {
    text-align: center;
}
</style>
<body class="hm-gradient">
    
    <main>
        
        <!--MDB Tables-->
        <div class="container mt-4">

            <div class="text-center darken-grey-text mb-4">
            <h1 class="font-bold mt-4 mb-3 h2" style="text-align:center; margin-top: 2%; font-weight: bold; color: #1C1C1C;">CLIENTES AGUARDANDO</h1>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <!-- Grid row -->
<input class="form-control" list="datalistOptions" style="border-bottom:solid; width:100%;" id="exampleDataList" placeholder="Pesquisar...">
<button type="submit" id="pesquisar" class="btn  mb-3" style="margin-top:-5%; margin-left:89%; background: #1C1C1C; color: white;">Pesquisar</button>

                    <!-- Grid row -->
                    <!--Table-->
                    <div class="table-responsive"> 
        
                    <table class="table table-striped">
                        <!--Table head-->
                        <thead style="text-align:center;">
                            <tr>
                                <th>Nome</th>
                                <th>Produto</th>
                                <th>Valor</th>
                                <th>whatsapp</th>
                                <th>endereço</th>
                                <th>quantidade</th>
                                <th>Deletar</th>
                            </tr>
                        </thead>
                        <!--Table head-->
                        <!--Table body-->
                        
                        <?php 
                        
                        $sql = "SELECT * FROM aguardando LIMIT 3";
                        $resultado = mysqli_query($conn, $sql);
                        while ($dados = mysqli_fetch_assoc($resultado)) {
                           
                    ?>
                        <tbody style="text-align:center;">
                            <tr>
                                <td><?php echo $dados["nome"];?></td>
                                <td><?php echo $dados["produto"];?></td>
                                <td><?php echo $dados["valor"];?></td>
                                <td><?php echo $dados["whatsapp"];?></td>
                                <td><?php echo $dados["endereco"];?></td>
                                <td><?php echo $dados["quantidade"];?></td>
                                <td><a href="deletar_aguardando.php?id=<?php echo $dados["id"];?>" class="btn btn-sm btn-danger"><i class="material-icons" style="font-size:20px">delete</i></td></a>
                            </tr>
                        </tbody>
                        <?php } ?>
                        <!--Table body-->
                    </table>
                    <!--Table-->
                </div>
            </div>            
                        </div>    
      
    </main>
  
</body>

