<div class="page-header">
    <h1>
        Search tipocodigo
    </h1>
    <p>
        {{ link_to("tipocodigo/new", "Create tipocodigo") }}
    </p>
</div>

{{ content() }}

{{ form("tipocodigo/search", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

<div class="form-group">
    <label for="fieldIdtipocodigo" class="col-sm-2 control-label">IdTipoCodigo</label>
    <div class="col-sm-10">
        {{ text_field("idTipoCodigo", "type" : "numeric", "class" : "form-control", "id" : "fieldIdtipocodigo") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldDescripciontipo" class="col-sm-2 control-label">DescripcionTipo</label>
    <div class="col-sm-10">
        {{ text_field("descripcionTipo", "size" : 30, "class" : "form-control", "id" : "fieldDescripciontipo") }}
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
