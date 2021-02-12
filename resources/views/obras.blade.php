@extends('layouts.layout-padrao')

@section('content')
<div class="container">
    
    <div class="card border">
        <div class="card-body">
            <h5 class="card-title" style="margin-bottom: 10px;">Obras</h5>
            <select class="select-obras" style="width: 40%;">
            <select>
            <table class="table table-ordered table-hover" id="tabela-obras" style="margin-top: 40px;">
                <thead>
                    <tr>
                        <th>ID</th>   
                        <th>Imagem</th>
                        <th>Código</th>
                        <th>Titulo</th>
                        <th>Edição</th>
                        <th>Autor</th>
                        <th>Data de Publicação</th>                        
                        <th>Editora</th>
                        <th>Estoque</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <button class="btn btn-sm btn-primary" role="button" onClick="novaObra()">Nova Obra</button>
        </div>
    </div>  
</div>

<div class="modal" tabindex="-1" role="dialog" id="dlg-nova-obra">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" class="form-horizontal" enctype="multipart/form-data" id="form-obra">
                <div class="modal-header">
                    <h5 class="modal-title">Nova Obra</h5>
                </div>

                <div class="modal-body">                    
                    <div class="form-group">
                        <label for="codigo-obra" class="control-label">Código</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="codigo-obra" name="codigo">
                            <div class="invalid-feedback">
                                Campo Obrigatório
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="titulo-obra" class="control-label">Título da Obra</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="titulo-obra" name="titulo">
                            <div class="invalid-feedback">
                                Campo Obrigatório
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="edicao-obra" class="control-label">Edição</label>
                        <div class="input-group">
                            <input type="number" class="form-control cpf" id="edicao-obra" name="edicao" min='1'>
                            <div class="invalid-feedback">
                                Campo Obrigatório
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="autor-obra" class="control-label">Autor da Obra</label>
                        <div class="input-group">
                            <select class="form-control" id="autor-obra" name="autor" style="width: 100%;">
                                
                            </select>
                            <div class="invalid-feedback">
                                Campo Obrigatório
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="data-publicacao-obra" class="control-label">Data de Publicação</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="data-publicacao-obra" name="data">
                            <div class="invalid-feedback">
                                Campo Obrigatório
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="editora-obra" class="control-label">Editora</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="editora-obra" name="editora">
                            <div class="invalid-feedback">
                                Campo Obrigatório
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="estoque-obra" class="control-label">Estoque</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="estoque-obra" name="estoque" min='1'>
                            <div class="invalid-feedback">
                                Campo Obrigatório
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div>
                            <label >Imagem</label>
                        </div>
                        <div class="input-group">                        
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="arquivo-obra" name="arquivo">
                                <div class="invalid-feedback">
                                    Campo Obrigatório
                                </div>
                                <label class="custom-file-label" for="inputGroupFile01">Escolha um Arquivo</label>
                            </div>               
                        </div>
                    </div>
                </div>

                <div class="modal-footer" id="form-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <button type="cancel" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="dlg-editar-obra">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" class="form-horizontal" enctype="multipart/form-data" id="form-editar-obra">

                <input type="hidden" name="_method" value="PUT">  

                <div class="modal-header">
                    <h5 class="modal-title">Editar Obra</h5>
                </div>

                <div class="modal-body">
                	<div class="form-group">
                        <input type="hidden" id="id-obra" class="form-control">
                    </div>                  
                    <div class="form-group">
                        <label for="codigo-obra" class="control-label">Código</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="editar-codigo-obra" name="editar-codigo">
                            <div class="invalid-feedback">
                                Campo Obrigatório
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="titulo-obra" class="control-label">Título da Obra</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="editar-titulo-obra" name="editar-titulo">
                            <div class="invalid-feedback">
                                Campo Obrigatório
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="edicao-obra" class="control-label">Edição</label>
                        <div class="input-group">
                            <input type="number" class="form-control cpf" id="editar-edicao-obra" name="editar-edicao">
                            <div class="invalid-feedback">
                                Campo Obrigatório
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="autor-obra" class="control-label">Autor da Obra</label>
                        <div class="input-group">
                            <select class="form-control" id="editar-autor-obra" name="editar-autor" style="width:100%;">
                                
                            </select>
                            <div class="invalid-feedback">
                                Campo Obrigatório
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="data-publicacao-obra" class="control-label">Data de Publicação</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="editar-data-publicacao-obra" name="editar-data">
                            <div class="invalid-feedback">
                                Campo Obrigatório
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="editora-obra" class="control-label">Editora</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="editar-editora-obra" name="editar-editora">
                            <div class="invalid-feedback">
                                Campo Obrigatório
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="estoque-obra" class="control-label">Estoque</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="editar-estoque-obra" name="editar-estoque">
                            <div class="invalid-feedback">
                                Campo Obrigatório
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div>
                            <label >Imagem</label>
                        </div>
                        <div class="input-group">                        
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="editar-arquivo-obra" name="editar-arquivo">
                                <label class="custom-file-label" for="inputGroupFile01">Escolha um Arquivo</label>
                            </div>               
                        </div>
                    </div>
                </div>

                <div class="modal-footer" id="form-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <button type="cancel" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </form>           
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="dlg-apagar-obra">
    <div class="modal-dialog" roles="document">
        <div class="modal-content" >
            <div class="modal-header">
                <h5 class="modal-title">Apagar Obra</h5>
            </div>
            <div class="modal-body">
                <p>Tem certeza que deseja apagar a Obra?</p>
            </div>
            <div class="modal-footer footer-apagar-obra">
                                
            </div>           
        </div>
    </div>
</div>
@endsection

@section('script-obras')
    <script src="{{ asset('js/main-obras.js') }}" type="text/javascript"></script>
@endsection
