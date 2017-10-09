<div class="row">
<div class="container">
<div class="panel panel-info">
<div class="panel-heading">
<div class="btn-group pull-right">
{{ link_to("modulo/index", "<i class='glyphicon glyphicon-chevron-left'></i> Volver","class":"btn btn-info") }}
</div>
<h4><i class='glyphicon glyphicon-edit'></i> Editar Código</h4>
</div>
<div class="page-header">
</div>

{{ content() }}

{{ form("modulo/save", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

<div class="table">
<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
<label for="fieldPrefijomodulo" class="control-label">PrefijoModulo</label>
</div>
<div class="col-md-2">
{{ text_field("PrefijoModulo", "size" : 30, "class" : "form-control", "id" : "fieldPrefijomodulo") }}
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

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
<label for="fieldDescripcionmodulo" class="control-label">Descripción Módulo</label>
</div>
<div class="col-md-3">
{{ text_field("descripcionModulo", "size" : 30, "class" : "form-control", "id" : "fieldDescripcionmodulo") }}
</div>
</div>

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
<label for="fieldFecharegistro" class="control-label">Fecha de Registro</label>
</div>
<div class="col-md-2">
{{ date_field("fechaRegistro", "size" : 30, "class" : "form-control", "id" : "fieldFecharegistro") }}
</div>
</div>

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
<label for="fieldEstadoregistro" class="control-label">Estado de Registro</label>
</div>
<div class="col-md-2">
{{ select_static('estadoRegistro', ['':'Seleccione Estado...', 'S' : 'Activo', 'N' : 'Inactivo'], "class": "form-control") }}
</div>
</div>


{{ hidden_field("idModulo") }}

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