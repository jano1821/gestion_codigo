<div class="row">
<div class="container">
<div class="panel panel-info">
<div class="panel-heading">
<div class="btn-group pull-right">
{{ link_to("menu/index", "<i class='glyphicon glyphicon-chevron-left'></i> Volver","class":"btn btn-info") }}
{{ link_to("cargo/new", "<i class='glyphicon glyphicon-plus'></i> Nuevo Cargo","class":"btn btn-info") }}
</div>
<h4><i class='glyphicon glyphicon-search'></i> Búsqueda de Cargos</h4>
</div>
<div class="page-header">
</div>

{{ content() }}

{{ form("cargo/search", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

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