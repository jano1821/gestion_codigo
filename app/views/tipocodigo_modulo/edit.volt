<div class="row">
<div class="container">
<div class="panel panel-info">
<div class="panel-heading">
<div class="btn-group pull-right">
        {{ link_to("tipocodigo_modulo/index", "<i class='glyphicon glyphicon-chevron-left'></i> Volver","class":"btn btn-info") }}
</div>
<h4><i class='glyphicon glyphicon-edit'></i> Editar Código</h4>
</div>
<div class="page-header">
</div>

{{ content() }}

{{ form("tipocodigo_modulo/save", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

<div class="table">
<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
    <label for="fieldIdtipocodigo" class="control-label">Tipo Código</label>
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
{{ select("idModulo", modulo,'useEmpty': true, 'emptyText': 'Seleccione un Módulo...', 'emptyValue': '', 'using': ['idModulo', 'descripcionModulo'], "class" : "form-control") }}
{% endif %}
    </div>
</div>

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
    <label for="fieldCorrelativomodulo" class="control-label">Correlativo Módulo</label>
</div>
<div class="col-md-2">
        {{ text_field("correlativoModulo", "type" : "numeric", "class" : "form-control", "id" : "fieldCorrelativomodulo") }}
    </div>
</div>


{{ hidden_field("idHiddenTipoCodigo") }}
{{ hidden_field("idHiddenModulo") }}

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
</div>
<div class="col-md-2">
{{ submit_button('Guardar', 'class': 'btn btn-primary') }}
</div>
</div>

</div>
</form>
</div>
</div>
