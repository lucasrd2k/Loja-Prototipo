<?php include_once "../../conexao.php";?>
<style>
    @media only screen and (max-width: 600px) {
  #pesquisar{
    margin-top:-15% !important;
    margin-left:64% !important;
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
                <h1 class="font-bold mt-4 mb-3 h3" style="color: #1C1C1C;">PESQUISE UM PRODUTO CADASTRADO</h1>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <!-- Grid row -->
<input class="form-control" list="datalistOptions" style="border-bottom:solid; width:100%;" id="exampleDataList" placeholder="Pesquisar...">
<button type="submit" id="pesquisar" class="btn btn-dark mb-3" style="margin-top:-5%; margin-left:89%; background: #1C1C1C	 !important;">Pesquisar</button>

                    <!-- Grid row -->
                    <!--Table-->
                    <div class="table-responsive"> 

                    <table class="table table-striped">
                        <!--Table head-->
                        <thead style="text-align:center;">
                            <tr>
                                <th>Título</th>
                                <th>Categoria</th>
                                <th>Marca</th>
                                <th>Valor</th>
                                <th>Editar</th>
                                <th>Deletar</th>
                            </tr>
                        </thead>
                        <!--Table head-->
                        <!--Table body-->
                        
                        <?php 
                        
                        $sql = "SELECT * FROM produtos";
                        $resultado = mysqli_query($conn, $sql);
                        while ($dados = mysqli_fetch_assoc($resultado)) {
                        ?>
                        <tbody style="text-align:center;">
                            <tr>
                                <td><?php echo $dados["titulo"];?></td>
                                <td><?php echo $dados["categoria"];?></td>
                                <td><?php echo $dados["marca"];?></td>
                                <td><?php echo $dados["valor"];?></td>

                                <td><a class="btn btn-info" href="editar.php?id=<?php echo $dados["id"];?>"><i class="material-icons">edit</i></a></td>
                               <td><a class="btn btn-danger" href="deletar_produto.php?id=<?php echo $dados["id"];?>"><i class="material-icons">delete</i></a></td>
                            </tr>
                        </tbody>
                        <?php }?>
                        <!--Table body-->
                    </table>
                    <!--Table-->
                </div>
            </div>                
                        </div>
      
    </main>
  
</body>