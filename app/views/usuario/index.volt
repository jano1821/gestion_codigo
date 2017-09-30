<div class="page-header">
    <h1>
        Search usuario
    </h1>
    <p>
        {{ link_to("usuario/new", "Create usuario") }}
    </p>
</div>

{{ content() }}

{{ form("usuario/search", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

<div class="form-group">
    <label for="fieldIdusuario" class="col-sm-2 control-label">IdUsuario</label>
    <div class="col-sm-10">
        {{ text_field("idUsuario", "type" : "numeric", "class" : "form-control", "id" : "fieldIdusuario") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldUsername" class="col-sm-2 control-label">UserName</label>
    <div class="col-sm-10">
        {{ text_field("userName", "size" : 30, "class" : "form-control", "id" : "fieldUsername") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldPassword" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
        {{ text_field("password", "size" : 30, "class" : "form-control", "id" : "fieldPassword") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldEstadoregistro" class="col-sm-2 control-label">EstadoRegistro</label>
    <div class="col-sm-10">
        {{ text_field("estadoRegistro", "size" : 30, "class" : "form-control", "id" : "fieldEstadoregistro") }}
    </div>
</div>


<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ submit_button('Search', 'class': 'btn btn-default') }}
    </div>
</div>

</form>
