<div class="row">
    <div class="container">
        <div class="panel panel-info">
            <div class="panel-heading">
	    <div class="btn-group pull-right">
                {{ link_to("menu/index", "<i class='glyphicon glyphicon-chevron-left'></i> Volver","class":"btn btn-info") }}
                {{ link_to("tipocodigo_modulo/new", "<i class='glyphicon glyphicon-plus'></i> Nuevo Tipo modulo","class":"btn btn-info") }}
            </div>
            <h4><i class='glyphicon glyphicon-search'></i> Búsqueda de Tipo Módulo</h4>
	</div>
        <div class="page-header">
        </div>

{{ content() }}

{{ form("tipocodigo_modulo/search", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

<div class="table">
                <div class="form-group">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-2">
    <label for="fieldIdtipocodigo" class="control-label">Tipo de Código</label>
    </div>
                    <div class="col-md-3">
        {% if tipoCodigo is defined %}
                            {{ select("idTipoCodigo", tipoCodigo,'useEmpty': true, 'emptyText': 'Seleccione un Tipo de Código...', 'emptyValue': '', 'using': ['idTipoCodigo', 'descripcionTipo'], "class" : "form-control") }}
                        {% endif %}
    </div>
</div>

<div class="form-group">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-2">
    <label for="fieldIdmodulo" class="control-label">Módulo</label>
    </div>
                    <div class="col-md-3">
        {% if modulo is defined %}
                            {{ select("idModulo", modulo,'useEmpty': true, 'emptyText': 'Seleccione Módulo...', 'emptyValue': '', 'using': ['idModulo', 'descripcionModulo'], "class" : "form-control") }}
                        {% endif %}
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