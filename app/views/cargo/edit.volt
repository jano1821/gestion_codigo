<div class="row">
<div class="container">
<div class="panel panel-info">
<div class="panel-heading">
<div class="btn-group pull-right">
{{ link_to("cargo/index", "<i class='glyphicon glyphicon-chevron-left'></i> Volver","class":"btn btn-info") }}
</div>
<h4><i class='glyphicon glyphicon-edit'></i> Editar Cargo</h4>
</div>
<div class="page-header">
</div>

{{ content() }}

{{ form("cargo/save", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

<div class="table">
<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
<label for="fieldDescripcioncargo" class="control-label">Descripcion de Cargo</label>
</div>
<div class="col-md-2">
{{ text_field("descripcionCargo", "size" : 30, "class" : "form-control", "id" : "fieldDescripcioncargo") }}
</div>
</div>


{{ hidden_field("idCargo") }}

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