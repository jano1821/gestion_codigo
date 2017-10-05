<div class="row">
    <div class="container">
        <div class="panel panel-info">
            <div class="panel-heading">
	    <div class="btn-group pull-right">
    {{ link_to("menu/index", "<i class='glyphicon glyphicon-chevron-left'></i> Volver","class":"btn btn-info") }}
                {{ link_to("tipocodigo/new", "<i class='glyphicon glyphicon-plus'></i> Nuevo Tipo codigo","class":"btn btn-info") }}
            </div>
            <h4><i class='glyphicon glyphicon-search'></i> Búsqueda de Tipo</h4>
	</div>
        <div class="page-header">
        </div>

{{ content() }}

{{ form("tipocodigo/search", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

<div class="table">
                <div class="form-group">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-2">
    <label for="fieldIdtipocodigo" class="control-label">Id Tipo</label>
</div>
                    <div class="col-md-2">
        {{ text_field("idTipoCodigo", "type" : "numeric", "class" : "form-control", "id" : "fieldIdtipocodigo") }}
    </div>
</div>

                <div class="form-group">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-2">
    <label for="fieldDescripciontipo" class="control-label">Descripcion de Tipo</label>
</div>
                    <div class="col-md-2">
        {{ text_field("descripcionTipo", "size" : 30, "class" : "form-control", "id" : "fieldDescripciontipo") }}
    </div>
</div>

                <div class="form-group">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-2">
    <label for="fieldEstadoregistro" class="control-label">Estado de Registro</label>
</div>
                    <div class="col-md-2">
        {{ select_static('estadoRegistro', [ '':'Seleccione Estado...', 'S' : 'Activo', 'N' : 'Inactivo'], "class": "form-control") }}
    </div>
</div>


<div class="form-group">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
    {{ submit_button('Buscar', 'class': 'col-sm-10 btn btn-primary') }}
                    </div>
                </div>
</div>
            </form>

    </div>
</div>