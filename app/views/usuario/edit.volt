<div class="row">
<div class="container">
<div class="panel panel-info">
<div class="panel-heading">
<div class="btn-group pull-right">
        {{ link_to("usuario/index", "<i class='glyphicon glyphicon-chevron-left'></i> Volver","class":"btn btn-info") }}
</div>
<h4><i class='glyphicon glyphicon-edit'></i> Editar Usuario</h4>
</div>
<div class="page-header">
</div>

{{ content() }}

{{ form("usuario/save", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

<div class="table">
<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
    <label for="fieldUsername" class="control-label">Nombre de Usuario</label>
</div>
<div class="col-md-2">
        {{ text_field("userName", "size" : 30, "class" : "form-control", "id" : "fieldUsername") }}
    </div>
</div>

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
    <label for="fieldPassword" class="control-label">Password</label>
</div>
<div class="col-md-3">
        {{ password_field("password", "size" : 30, "class" : "form-control", "id" : "fieldPassword") }}
    </div>
</div>

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
    <label for="fieldEstadoregistro" class="control-label">Estado de Registro</label>
</div>
<div class="col-md-3">
        {{ select_static('estadoRegistro', [ '':'Seleccione Usuario...', 'S' : 'Activo', 'N' : 'Inactivo'], "class": "form-control") }}
    </div>
</div>


{{ hidden_field("idUsuario") }}

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